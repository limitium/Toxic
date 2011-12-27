<?php

namespace Tox\ParserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\ParserBundle\Entity\Proxy
 */
class Proxy extends RawResult
{


    /**
     * @var integer $port
     */
    private $port;

    /**
     * @var string $proxy_type
     */
    private $proxy_type;

    /**
     * @var boolean $valid
     */
    private $valid;

    /**
     * @var datetime $checked_at
     */
    private $checked_at;

    /**
     * @var Tox\ParserBundle\Entity\UsedProxy
     */
    private $Used;

    public function __construct()
    {
        $this->Used = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set port
     *
     * @param integer $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * Get port
     *
     * @return integer 
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set proxy_type
     *
     * @param string $proxyType
     */
    public function setProxyType($proxyType)
    {
        $this->proxy_type = $proxyType;
    }

    /**
     * Get proxy_type
     *
     * @return string 
     */
    public function getProxyType()
    {
        return $this->proxy_type;
    }

    /**
     * Set valid
     *
     * @param boolean $valid
     */
    public function setValid($valid)
    {
        $this->valid = $valid;
    }

    /**
     * Get valid
     *
     * @return boolean 
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Set checked_at
     *
     * @param datetime $checkedAt
     */
    public function setCheckedAt($checkedAt)
    {
        $this->checked_at = $checkedAt;
    }

    /**
     * Get checked_at
     *
     * @return datetime 
     */
    public function getCheckedAt()
    {
        return $this->checked_at;
    }

    /**
     * Add Used
     *
     * @param Tox\ParserBundle\Entity\UsedProxy $used
     */
    public function addUsedProxy(\Tox\ParserBundle\Entity\UsedProxy $used)
    {
        $this->Used[] = $used;
    }

    /**
     * Get Used
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUsed()
    {
        return $this->Used;
    }
    /**
     * @var integer $ip
     */
    private $ip;


    /**
     * Set ip
     *
     * @param integer $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * Get ip
     *
     * @return integer 
     */
    public function getIp()
    {
        return $this->ip;
    }
}