<?php

namespace Tox\ParserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\ParserBundle\Entity\Rule
 */
class Rule
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $pattern
     */
    private $pattern;

    /**
     * @var Tox\ParserBundle\Entity\Source
     */
    private $Soruce;

    /**
     * @var Tox\ParserBundle\Entity\PatternType
     */
    private $Type;


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
     * Set pattern
     *
     * @param string $pattern
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * Get pattern
     *
     * @return string 
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * Set Soruce
     *
     * @param Tox\ParserBundle\Entity\Source $soruce
     */
    public function setSoruce(\Tox\ParserBundle\Entity\Source $soruce)
    {
        $this->Soruce = $soruce;
    }

    /**
     * Get Soruce
     *
     * @return Tox\ParserBundle\Entity\Source 
     */
    public function getSoruce()
    {
        return $this->Soruce;
    }

    /**
     * Set Type
     *
     * @param Tox\ParserBundle\Entity\PatternType $type
     */
    public function setType(\Tox\ParserBundle\Entity\PatternType $type)
    {
        $this->Type = $type;
    }

    /**
     * Get Type
     *
     * @return Tox\ParserBundle\Entity\PatternType 
     */
    public function getType()
    {
        return $this->Type;
    }

    public function __toString(){
        return $this->pattern;
    }
}