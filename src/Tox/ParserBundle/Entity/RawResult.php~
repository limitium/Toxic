<?php

namespace Tox\ParserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\ParserBundle\Entity\RawResult
 */
class RawResult
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var datetime $created_at
     */
    private $created_at;

    /**
     * @var string $url
     */
    private $url;

    /**
     * @var Tox\ParserBundle\Entity\Source
     */
    private $Source;


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
     * Set created_at
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
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
     * Set Source
     *
     * @param Tox\ParserBundle\Entity\Source $source
     */
    public function setSource(\Tox\ParserBundle\Entity\Source $source)
    {
        $this->Source = $source;
    }

    /**
     * Get Source
     *
     * @return Tox\ParserBundle\Entity\Source 
     */
    public function getSource()
    {
        return $this->Source;
    }
}