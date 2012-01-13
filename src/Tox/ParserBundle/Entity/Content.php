<?php

namespace Tox\ParserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\ParserBundle\Entity\Content
 */
class Content extends RawResult
{


    /**
     * @var text $data
     */
    private $data;


    /**
     * Set data
     *
     * @param text $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Get data
     *
     * @return text 
     */
    public function getData()
    {
        return $this->data;
    }
    /**
     * @var Tox\ParserBundle\Entity\MetaData
     */
    private $Meta;

    public function __construct()
    {
        $this->Meta = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add Meta
     *
     * @param Tox\ParserBundle\Entity\MetaData $meta
     */
    public function addMetaData(\Tox\ParserBundle\Entity\MetaData $meta)
    {
        $this->Meta[] = $meta;
    }

    /**
     * Get Meta
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMeta()
    {
        return $this->Meta;
    }
}