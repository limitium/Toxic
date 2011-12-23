<?php

namespace Tox\PlaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\PlaceBundle\Entity\SearchEngine
 */
class SearchEngine
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
     * @var Tox\PlaceBundle\Entity\Indexed
     */
    private $Indexes;

    public function __construct()
    {
        $this->Indexes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add Indexes
     *
     * @param Tox\PlaceBundle\Entity\Indexed $indexes
     */
    public function addIndexed(\Tox\PlaceBundle\Entity\Indexed $indexes)
    {
        $this->Indexes[] = $indexes;
    }

    /**
     * Get Indexes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIndexes()
    {
        return $this->Indexes;
    }
}