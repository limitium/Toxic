<?php

namespace Tox\ParserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\ParserBundle\Entity\Schedule
 */
class Schedule
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $timeout
     */
    private $timeout;

    /**
     * @var Tox\ParserBundle\Entity\Source
     */
    private $Source;

    public function __construct()
    {
        $this->Source = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set timeout
     *
     * @param integer $timeout
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }

    /**
     * Get timeout
     *
     * @return integer 
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * Add Source
     *
     * @param Tox\ParserBundle\Entity\Source $source
     */
    public function addSource(\Tox\ParserBundle\Entity\Source $source)
    {
        $this->Source[] = $source;
    }

    /**
     * Get Source
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSource()
    {
        return $this->Source;
    }

    public function __toString(){
        $start = new \DateTime('@0');
        $end = new \DateTime('@'.$this->timeout);
        $interval = $end->diff($start);
        return  $interval->format('%d %H:%I:%S');
    }
}