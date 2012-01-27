<?php

namespace Tox\SatelliteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\SatelliteBundle\Entity\Image
 */
class Image
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
     * @var Tox\SatelliteBundle\Entity\Post
     */
    private $Images;


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
     * Set Images
     *
     * @param Tox\SatelliteBundle\Entity\Post $images
     */
    public function setImages(\Tox\SatelliteBundle\Entity\Post $images)
    {
        $this->Images = $images;
    }

    /**
     * Get Images
     *
     * @return Tox\SatelliteBundle\Entity\Post 
     */
    public function getImages()
    {
        return $this->Images;
    }
}