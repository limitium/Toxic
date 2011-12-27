<?php

namespace Tox\ParserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\ParserBundle\Entity\SourceType
 */
class SourceType
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
     * @var Tox\ParserBundle\Entity\Source
     */
    private $Sources;

    /**
     * @var Tox\ParserBundle\Entity\PatternType
     */
    private $Patterns;

    public function __construct()
    {
        $this->Sources = new \Doctrine\Common\Collections\ArrayCollection();
    $this->Patterns = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Add Patterns
     *
     * @param Tox\ParserBundle\Entity\PatternType $patterns
     */
    public function addPatternType(\Tox\ParserBundle\Entity\PatternType $patterns)
    {
        $this->Patterns[] = $patterns;
    }

    /**
     * Get Patterns
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPatterns()
    {
        return $this->Patterns;
    }
}