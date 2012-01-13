<?php

namespace Tox\ParserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\ParserBundle\Entity\MetaData
 */
class MetaData
{
  

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $data
     */
    private $data;

    /**
     * @var Tox\ParserBundle\Entity\Content
     */
    private $Content;

    /**
     * @var Tox\ParserBundle\Entity\PatternType
     */
    private $PatternType;


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
     * Set data
     *
     * @param string $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Get data
     *
     * @return string 
     */
    public function getData()
    {
        return $this->data;
    }



    /**
     * Set content
     *
     * @param  Tox\ParserBundle\Entity\Content $contentId
     */
    public function setContent($content)
    {
        $this->Content = $content;
    }

    /**
     * Get content
     *
     * @return  Tox\ParserBundle\Entity\Content
     */
    public function getContent()
    {
        return $this->Content;
    }

    /**
     * Set PatternType
     *
     * @param Tox\ParserBundle\Entity\PatternType $patternType
     */
    public function setPatternType(\Tox\ParserBundle\Entity\PatternType $patternType)
    {
        $this->PatternType = $patternType;
    }

    /**
     * Get PatternType
     *
     * @return Tox\ParserBundle\Entity\PatternType 
     */
    public function getPatternType()
    {
        return $this->PatternType;
    }
}