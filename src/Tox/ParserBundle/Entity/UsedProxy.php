<?php

namespace Tox\ParserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\ParserBundle\Entity\UsedProxy
 */
class UsedProxy
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var datetime $used_at
     */
    private $used_at;

    /**
     * @var boolean $success
     */
    private $success;

    /**
     * @var Tox\ParserBundle\Entity\Source
     */
    private $Source;

    /**
     * @var Tox\ParserBundle\Entity\Proxy
     */
    private $Proxy;


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
     * Set used_at
     *
     * @param datetime $usedAt
     */
    public function setUsedAt($usedAt)
    {
        $this->used_at = $usedAt;
    }

    /**
     * Get used_at
     *
     * @return datetime 
     */
    public function getUsedAt()
    {
        return $this->used_at;
    }

    /**
     * Set success
     *
     * @param boolean $success
     */
    public function setSuccess($success)
    {
        $this->success = $success;
    }

    /**
     * Get success
     *
     * @return boolean 
     */
    public function getSuccess()
    {
        return $this->success;
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

    /**
     * Set Proxy
     *
     * @param Tox\ParserBundle\Entity\Proxy $proxy
     */
    public function setProxy(\Tox\ParserBundle\Entity\Proxy $proxy)
    {
        $this->Proxy = $proxy;
    }

    /**
     * Get Proxy
     *
     * @return Tox\ParserBundle\Entity\Proxy 
     */
    public function getProxy()
    {
        return $this->Proxy;
    }
    /**
     * @var integer $proxy_id
     */
    private $proxy_id;


    /**
     * Set proxy_id
     *
     * @param integer $proxyId
     */
    public function setProxyId($proxyId)
    {
        $this->proxy_id = $proxyId;
    }

    /**
     * Get proxy_id
     *
     * @return integer 
     */
    public function getProxyId()
    {
        return $this->proxy_id;
    }
}