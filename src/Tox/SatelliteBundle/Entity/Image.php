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
    private $Post;


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
     * Set Post
     *
     * @param Tox\SatelliteBundle\Entity\Post $post
     */
    public function setPost(\Tox\SatelliteBundle\Entity\Post $post)
    {
        $this->Post = $post;
    }

    /**
     * Get Post
     *
     * @return Tox\SatelliteBundle\Entity\Post 
     */
    public function getPost()
    {
        return $this->Post;
    }

    public function __toString() {
        return $this->getName();
    }
}