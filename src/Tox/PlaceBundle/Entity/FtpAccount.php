<?php

namespace Tox\PlaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\PlaceBundle\Entity\FtpAccount
 */
class FtpAccount extends Account
{

    /**
     * @var integer $host_account_id
     */
    private $host_account_id;

    /**
     * @var Tox\SatelliteBundle\Entity\Satellite
     */
    private $Satellites;

    /**
     * @var Tox\PlaceBundle\Entity\HostAccount
     */
    private $HostAccount;

    public function __construct()
    {
        $this->Satellites = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set host_account_id
     *
     * @param integer $hostAccountId
     */
    public function setHostAccountId($hostAccountId)
    {
        $this->host_account_id = $hostAccountId;
    }

    /**
     * Get host_account_id
     *
     * @return integer 
     */
    public function getHostAccountId()
    {
        return $this->host_account_id;
    }

    /**
     * Add Satellites
     *
     * @param Tox\SatelliteBundle\Entity\Satellite $satellites
     */
    public function addSatellite(\Tox\SatelliteBundle\Entity\Satellite $satellites)
    {
        $this->Satellites[] = $satellites;
    }

    /**
     * Get Satellites
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSatellites()
    {
        return $this->Satellites;
    }

    /**
     * Set HostAccount
     *
     * @param Tox\PlaceBundle\Entity\HostAccount $hostAccount
     */
    public function setHostAccount(\Tox\PlaceBundle\Entity\HostAccount $hostAccount)
    {
        $this->HostAccount = $hostAccount;
    }

    /**
     * Get HostAccount
     *
     * @return Tox\PlaceBundle\Entity\HostAccount 
     */
    public function getHostAccount()
    {
        return $this->HostAccount;
    }
}