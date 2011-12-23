<?php

namespace Tox\ParserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\ParserBundle\Entity\Source
 */
class Source
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
     * @var string $url
     */
    private $url;

    /**
     * @var Tox\ParserBundle\Entity\RawText
     */
    private $RawPages;

    /**
     * @var Tox\SatelliteBundle\Entity\Theme
     */
    private $Theme;

    public function __construct()
    {
        $this->RawPages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
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
     * Set Theme
     *
     * @param Tox\SatelliteBundle\Entity\Theme $theme
     */
    public function setTheme(\Tox\SatelliteBundle\Entity\Theme $theme)
    {
        $this->Theme = $theme;
    }

    /**
     * Get Theme
     *
     * @return Tox\SatelliteBundle\Entity\Theme 
     */
    public function getTheme()
    {
        return $this->Theme;
    }
}