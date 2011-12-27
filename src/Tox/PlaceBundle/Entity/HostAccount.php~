<?php

namespace Tox\PlaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\PlaceBundle\Entity\HostAccount
 */
class HostAccount extends HttpAccount
{

    /**
     * @var Tox\PlaceBundle\Entity\FtpAccount
     */
    private $FtpAccounts;

    /**
     * @var Tox\PlaceBundle\Entity\Host
     */
    private $Host;

    public function __construct()
    {
        $this->FtpAccounts = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add FtpAccounts
     *
     * @param Tox\PlaceBundle\Entity\FtpAccount $ftpAccounts
     */
    public function addFtpAccount(\Tox\PlaceBundle\Entity\FtpAccount $ftpAccounts)
    {
        $this->FtpAccounts[] = $ftpAccounts;
    }

    /**
     * Get FtpAccounts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getFtpAccounts()
    {
        return $this->FtpAccounts;
    }

    /**
     * Set Host
     *
     * @param Tox\PlaceBundle\Entity\Host $host
     */
    public function setHost(\Tox\PlaceBundle\Entity\Host $host)
    {
        $this->Host = $host;
    }

    /**
     * Get Host
     *
     * @return Tox\PlaceBundle\Entity\Host 
     */
    public function getHost()
    {
        return $this->Host;
    }
}