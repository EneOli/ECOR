<?php

namespace App\Controller;

use App\Entity\Anlage;
use App\Entity\Location;
use App\Entity\TechnicalData;
use App\Service\AnlagenManager;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnlagenController extends Controller
{
    /**
     * @Route("/api/anlagen", methods={"GET"})
     */
    public function getAnlagen(AnlagenManager $anlagenManager)
    {
        $em = $this->getDoctrine()->getManager();
        $anlagen = $em->getRepository(Anlage::class)->findAll();

        $result = $anlagenManager->anlagenAsJson($anlagen);


        return new Response($result);
    }

    /**
     * @Route("/api/test", methods={"GET"})
     */
    public function test(AnlagenManager $anlagenManager)
    {
        $em = $this->getDoctrine()->getManager();
        $anlage = new Anlage();
        $location = new Location();
        $technical = new TechnicalData();
        $technical->setControl("Blub");

        $location->setLocation("Handrup");
        $anlage->setLocation($location);
        $anlage->setTechnical($technical);

        $em->persist($anlage);
        $em->flush();


        return new Response("OK");
    }


    /**
     * @Route("/api/anlage", methods={"POST"})
     */
    public function postAnlage(AnlagenManager $anlagenManager, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $anlage = $anlagenManager->jsonToAnlage($request->getContent());
        //$anlage->setLocation((object)$anlage->getLocation());
        $em->persist($anlage);
        $em->flush();

        return new JsonResponse("OK");
    }

    /**
     * @Route("/api/anlage/{id}", methods={"PUT"})
     * @param AnlagenManager $anlagenManager
     * @param Request $request
     * @param $id
     */
    public function putAnlage(AnlagenManager $anlagenManager, Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $oldAnlage = $em->getRepository(Anlage::class)->find($id);
        $newAnlage = $anlagenManager->buildNewAnlage($oldAnlage, $request->getContent());
        $em = $this->getDoctrine()->getManager();
        $em->persist($newAnlage);
        $em->flush();

        return new JsonResponse("OK");
    }

    /**
     * @Route("/api/anlage/{id}", methods={"DELETE"})
     */
    public function deleteAnlage(AnlagenManager $anlagenManager, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $anlage = $em->getRepository(Anlage::class)->find($id);

        try {
            $anlagenManager->deleteFilesFolder($anlage);
        } catch (Exception $exception) {
        }

        $em->remove($anlage);
        $em->flush();
        return new JsonResponse("OK");
    }

    /**
     * @Route("/api/anlage/{id}/{file}", methods={"DELETE"})
     */
    public function deleteAnlagenFile(AnlagenManager $anlagenManager, $id, $file)
    {
        $em = $this->getDoctrine()->getManager();
        $anlage = $em->getRepository(Anlage::class)->find($id);
        $anlage = $anlagenManager->deleteFile($anlage, $file);

        $em->persist($anlage);
        $em->flush();

        return new JsonResponse("OK");
    }
}

?>