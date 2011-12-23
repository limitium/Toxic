<?php

namespace Tox\SatelliteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\SatelliteBundle\Entity\Theme
 */
class Theme
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var Tox\SatelliteBundle\Entity\Satellite
     */
    private $Satellites;

    /**
     * @var Tox\ParserBundle\Entity\RawText
     */
    private $RawPages;

    /**
     * @var Tox\ParserBundle\Entity\Source
     */
    private $Sources;

    public function __construct()
    {
        $this->Satellites = new \Doctrine\Common\Collections\ArrayCollection();
    $this->RawPages = new \Doctrine\Common\Collections\ArrayCollection();
    $this->Sources = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add Satellites
     *
     * @param Tox\SatelliteBundle\Entity\Satellite $satellites
     */
    public function addSatellite(\Tox\SatelliteBundle\Entity\Satellite $satellites)
    {
        $this->Satellites[] = $satellites;
    }

    /**
     * Get Satellites
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSatellites()
    {
        return $this->Satellites;
    }

    /**
     * Add RawPages
     *
     * @param Tox\ParserBundle\Entity\RawText $rawPages
     */
    public function addRawText(\Tox\ParserBundle\Entity\RawText $rawPages)
    {
        $this->RawPages[] = $rawPages;
    }

    /**
     * Get RawPages
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getRawPages()
    {
        return $this->RawPages;
    }

    /**
     * Add Sources
     *
     * @param Tox\ParserBundle\Entity\Source $sources
     */
    public function addSource(\Tox\ParserBundle\Entity\Source $sources)
    {
        $this->Sources[] = $sources;
    }

    /**
     * Get Sources
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSources()
    {
        return $this->Sources;
    }
}