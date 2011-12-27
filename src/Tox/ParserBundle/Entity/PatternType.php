<?php

namespace Tox\ParserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\ParserBundle\Entity\PatternType
 */
class PatternType
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
     * @var Tox\ParserBundle\Entity\MetaData
     */
    private $MetaData;

    /**
     * @var Tox\ParserBundle\Entity\SourceType
     */
    private $Type;

    public function __construct()
    {
        $this->MetaData = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add MetaData
     *
     * @param Tox\ParserBundle\Entity\MetaData $metaData
     */
    public function addMetaData(\Tox\ParserBundle\Entity\MetaData $metaData)
    {
        $this->MetaData[] = $metaData;
    }

    /**
     * Get MetaData
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMetaData()
    {
        return $this->MetaData;
    }

    /**
     * Set Type
     *
     * @param Tox\ParserBundle\Entity\SourceType $type
     */
    public function setType(\Tox\ParserBundle\Entity\SourceType $type)
    {
        $this->Type = $type;
    }

    /**
     * Get Type
     *
     * @return Tox\ParserBundle\Entity\SourceType 
     */
    public function getType()
    {
        return $this->Type;
    }
    /**
     * @var Tox\ParserBundle\Entity\Rule
     */
    private $Rules;


    /**
     * Add Rules
     *
     * @param Tox\ParserBundle\Entity\Rule $rules
     */
    public function addRule(\Tox\ParserBundle\Entity\Rule $rules)
    {
        $this->Rules[] = $rules;
    }

    /**
     * Get Rules
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getRules()
    {
        return $this->Rules;
    }
}