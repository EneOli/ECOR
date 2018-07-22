<?php

namespace App\Service;

use App\Entity\Anlage;
use Exception;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class AnlagenManager
{

    private $serializer;

    public function __construct()
    {
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    public function anlagenAsJson($anlagen)
    {
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);
        $result = $serializer->serialize($anlagen, "json");

        return $result;
    }

    private function processFiles($rawFiles, $craneId)
    {
        $finalFiles = [];
        foreach ($rawFiles as $file) {
            foreach ($file as $filename => $data) {
                $path = "uploads/" . $craneId;
                if (!is_dir($path)) {
                    mkdir("uploads/" . $craneId, 0777, true);
                }
                $handle = fopen($path . "/" . $filename, 'w');
                $data = base64_decode(explode(",", $data, 2)[1]);
                fwrite($handle, $data);
                array_push($finalFiles, $path . "/" . $filename);
            }
        }

        return $finalFiles;
    }

    public function deleteFilesFolder(Anlage $entity)
    {
        $folder = "uploads/" . $entity->getCraneId();

        $it = new RecursiveDirectoryIterator($folder, RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator($it,
            RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($files as $file) {
            if ($file->isDir()) {
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }
        rmdir($folder);
    }

    public function deleteFile(Anlage $anlage, $filename)
    {
        $path = "uploads/" . $anlage->getCraneId() . "/" . $filename;
        try {
            unlink($path);
        }catch (Exception $e) {}

        $newFiles = $anlage->getFiles();
        foreach ($newFiles as $key => $value) {
            if ($value == $path) {
                unset($newFiles[$key]);
                $newFiles = array_values($newFiles);
            }
        }

        $anlage->setFiles($newFiles);
        return $anlage;
    }

    public function jsonToAnlage($json)
    {
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);
        $result = $serializer->deserialize($json, Anlage::class, "json");

        $result->setFiles($this->processFiles($result->getFiles(), $result->getCraneId()));

        return $result;
    }

    public
    function buildNewAnlage(Anlage $oldAnlage, $newRaw)
    {
        $newAnlage = $this->serializer->deserialize($newRaw, Anlage::class, "json");

        $obj_merged = (object)array_merge((array)$oldAnlage, (array)$newAnlage);

        foreach ($obj_merged as $k => $v) {
            if ($k !== "files")
                $oldAnlage->$k = $v;
        }

        $result = array_merge($this->processFiles($newAnlage->getFiles(), $oldAnlage->getCraneId()), $oldAnlage->getFiles());

        $oldAnlage->setFiles($result);

        return $oldAnlage;
    }
}