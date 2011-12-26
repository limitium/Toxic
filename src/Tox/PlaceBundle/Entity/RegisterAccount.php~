<?php

namespace Tox\PlaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\PlaceBundle\Entity\RegisterAccount
 */
class RegisterAccount extends Account
{
  
    /**
     * @var Tox\PlaceBundle\Entity\Domen
     */
    private $Domens;

    /**
     * @var Tox\PlaceBundle\Entity\Register
     */
    private $Register;

    public function __construct()
    {
        $this->Domens = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add Domens
     *
     * @param Tox\PlaceBundle\Entity\Domen $domens
     */
    public function addDomen(\Tox\PlaceBundle\Entity\Domen $domens)
    {
        $this->Domens[] = $domens;
    }

    /**
     * Get Domens
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getDomens()
    {
        return $this->Domens;
    }

    /**
     * Set Register
     *
     * @param Tox\PlaceBundle\Entity\Register $register
     */
    public function setRegister(\Tox\PlaceBundle\Entity\Register $register)
    {
        $this->Register = $register;
    }

    /**
     * Get Register
     *
     * @return Tox\PlaceBundle\Entity\Register 
     */
    public function getRegister()
    {
        return $this->Register;
    }
}