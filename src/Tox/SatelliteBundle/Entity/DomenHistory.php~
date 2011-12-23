<?php

namespace Tox\SatelliteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\SatelliteBundle\Entity\DomenHistory
 */
class DomenHistory
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var date $changet_at
     */
    private $changet_at;

    /**
     * @var Tox\SatelliteBundle\Entity\Satellite
     */
    private $Satellite;

    /**
     * @var Tox\PlaceBundle\Entity\Domen
     */
    private $Domen;


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
     * Set changet_at
     *
     * @param date $changetAt
     */
    public function setChangetAt($changetAt)
    {
        $this->changet_at = $changetAt;
    }

    /**
     * Get changet_at
     *
     * @return date 
     */
    public function getChangetAt()
    {
        return $this->changet_at;
    }

    /**
     * Set Satellite
     *
     * @param Tox\SatelliteBundle\Entity\Satellite $satellite
     */
    public function setSatellite(\Tox\SatelliteBundle\Entity\Satellite $satellite)
    {
        $this->Satellite = $satellite;
    }

    /**
     * Get Satellite
     *
     * @return Tox\SatelliteBundle\Entity\Satellite 
     */
    public function getSatellite()
    {
        return $this->Satellite;
    }

    /**
     * Set Domen
     *
     * @param Tox\PlaceBundle\Entity\Domen $domen
     */
    public function setDomen(\Tox\PlaceBundle\Entity\Domen $domen)
    {
        $this->Domen = $domen;
    }

    /**
     * Get Domen
     *
     * @return Tox\PlaceBundle\Entity\Domen 
     */
    public function getDomen()
    {
        return $this->Domen;
    }
}