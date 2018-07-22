<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnlageRepository")
 */
class Anlage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $craneId;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $manufactor;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $manufactorCraneNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $liftingGearFactoryNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $engineGroup;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ropeModel;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $ropeDiameter;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $ropeLength;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $control;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $loadCapacityCat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $loadCapacityBridge;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $totalWeight;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $span;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $impellerDiameterCat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $impellerDiameterCrane;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $hallNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $FieldOfActivity;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $construtionYear;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $overhaul;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $proportionOfOverhaul;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     */
    private $remarks;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $craneDesignation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $liftingGearDesignation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $files;

    /**
     * @return mixed
     */
    public function getManufactorCraneNumber()
    {
        return $this->manufactorCraneNumber;
    }

    /**
     * @param mixed $manufactorCraneNumber
     */
    public function setManufactorCraneNumber($manufactorCraneNumber): void
    {
        $this->manufactorCraneNumber = $manufactorCraneNumber;
    }

    /**
     * @return mixed
     */
    public function getLiftingGearFactoryNumber()
    {
        return $this->liftingGearFactoryNumber;
    }

    /**
     * @param mixed $liftingGearFactoryNumber
     */
    public function setLiftingGearFactoryNumber($liftingGearFactoryNumber): void
    {
        $this->liftingGearFactoryNumber = $liftingGearFactoryNumber;
    }

    /**
     * @return mixed
     */
    public function getEngineGroup()
    {
        return $this->engineGroup;
    }

    /**
     * @param mixed $engineGroup
     */
    public function setEngineGroup($engineGroup): void
    {
        $this->engineGroup = $engineGroup;
    }

    /**
     * @return mixed
     */
    public function getRopeModel()
    {
        return $this->ropeModel;
    }

    /**
     * @param mixed $ropeModel
     */
    public function setRopeModel($ropeModel): void
    {
        $this->ropeModel = $ropeModel;
    }

    /**
     * @return mixed
     */
    public function getRopeDiameter()
    {
        return $this->ropeDiameter;
    }

    /**
     * @param mixed $ropeDiameter
     */
    public function setRopeDiameter($ropeDiameter): void
    {
        $this->ropeDiameter = $ropeDiameter;
    }

    /**
     * @return mixed
     */
    public function getRopeLength()
    {
        return $this->ropeLength;
    }

    /**
     * @param mixed $ropeLength
     */
    public function setRopeLength($ropeLength): void
    {
        $this->ropeLength = $ropeLength;
    }

    /**
     * @return mixed
     */
    public function getControl()
    {
        return $this->control;
    }

    /**
     * @param mixed $control
     */
    public function setControl($control): void
    {
        $this->control = $control;
    }

    /**
     * @return mixed
     */
    public function getLoadCapacityCat()
    {
        return $this->loadCapacityCat;
    }

    /**
     * @param mixed $loadCapacityCat
     */
    public function setLoadCapacityCat($loadCapacityCat): void
    {
        $this->loadCapacityCat = $loadCapacityCat;
    }

    /**
     * @return mixed
     */
    public function getLoadCapacityBridge()
    {
        return $this->loadCapacityBridge;
    }

    /**
     * @param mixed $loadCapacityBridge
     */
    public function setLoadCapacityBridge($loadCapacityBridge): void
    {
        $this->loadCapacityBridge = $loadCapacityBridge;
    }

    /**
     * @return mixed
     */
    public function getTotalWeight()
    {
        return $this->totalWeight;
    }

    /**
     * @param mixed $totalWeight
     */
    public function setTotalWeight($totalWeight): void
    {
        $this->totalWeight = $totalWeight;
    }

    /**
     * @return mixed
     */
    public function getSpan()
    {
        return $this->span;
    }

    /**
     * @param mixed $span
     */
    public function setSpan($span): void
    {
        $this->span = $span;
    }

    /**
     * @return mixed
     */
    public function getImpellerDiameterCat()
    {
        return $this->impellerDiameterCat;
    }

    /**
     * @param mixed $impellerDiameterCat
     */
    public function setImpellerDiameterCat($impellerDiameterCat): void
    {
        $this->impellerDiameterCat = $impellerDiameterCat;
    }

    /**
     * @return mixed
     */
    public function getImpellerDiameterCrane()
    {
        return $this->impellerDiameterCrane;
    }

    /**
     * @param mixed $impellerDiameterCrane
     */
    public function setImpellerDiameterCrane($impellerDiameterCrane): void
    {
        $this->impellerDiameterCrane = $impellerDiameterCrane;
    }

    /**
     * @return mixed
     */
    public function getHallNumber()
    {
        return $this->hallNumber;
    }

    /**
     * @param mixed $hallNumber
     */
    public function setHallNumber($hallNumber): void
    {
        $this->hallNumber = $hallNumber;
    }

    /**
     * @return mixed
     */
    public function getFieldOfActivity()
    {
        return $this->FieldOfActivity;
    }

    /**
     * @param mixed $FieldOfActivity
     */
    public function setFieldOfActivity($FieldOfActivity): void
    {
        $this->FieldOfActivity = $FieldOfActivity;
    }

    /**
     * @return mixed
     */
    public function getConstrutionYear()
    {
        return $this->construtionYear;
    }

    /**
     * @param mixed $construtionYear
     */
    public function setConstrutionYear($construtionYear): void
    {
        $this->construtionYear = $construtionYear;
    }

    /**
     * @return mixed
     */
    public function getOverhaul()
    {
        return $this->overhaul;
    }

    /**
     * @param mixed $overhaul
     */
    public function setOverhaul($overhaul): void
    {
        $this->overhaul = $overhaul;
    }

    /**
     * @return mixed
     */
    public function getProportionOfOverhaul()
    {
        return $this->proportionOfOverhaul;
    }

    /**
     * @param mixed $proportionOfOverhaul
     */
    public function setProportionOfOverhaul($proportionOfOverhaul): void
    {
        $this->proportionOfOverhaul = $proportionOfOverhaul;
    }

    /**
     * @return mixed
     */
    public function getCraneId()
    {
        return $this->craneId;
    }

    /**
     * @param mixed $craneId
     */
    public function setCraneId($craneId): void
    {
        $this->craneId = $craneId;
    }

    /**
     * @return mixed
     */
    public function getManufactor()
    {
        return $this->manufactor;
    }

    /**
     * @param mixed $manufactor
     */
    public function setManufactor($manufactor): void
    {
        $this->manufactor = $manufactor;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    public function getId()
    {
        return $this->id;
    }


    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        if ($this->$name)
            return $this->$name;
    }

    public function getRemarks(): ?string
    {
        return $this->remarks;
    }

    public function setRemarks(?string $remarks): self
    {
        $this->remarks = $remarks;

        return $this;
    }

    public function getCraneDesignation(): ?string
    {
        return $this->craneDesignation;
    }

    public function setCraneDesignation(?string $craneDesignation): self
    {
        $this->craneDesignation = $craneDesignation;

        return $this;
    }

    public function getLiftingGearDesignation(): ?string
    {
        return $this->liftingGearDesignation;
    }

    public function setLiftingGearDesignation(?string $liftingGearDesignation): self
    {
        $this->liftingGearDesignation = $liftingGearDesignation;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getFiles(): ?array
    {
        return $this->files;
    }

    public function setFiles(?array $files): self
    {
        $this->files = $files;

        return $this;
    }
}
