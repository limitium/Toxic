<?php

namespace Tox\ParserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\ParserBundle\Entity\Bot
 */
class Bot
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $vkid
     */
    private $vkid;

    /**
     * @var string $first_name
     */
    private $first_name;

    /**
     * @var string $last_name
     */
    private $last_name;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var string $phone
     */
    private $phone;

    /**
     * @var Tox\PlaceBundle\Entity\Domen
     */
    private $Domens;

    public function __construct()
    {
        $this->Domens = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set vkid
     *
     * @param integer $vkid
     */
    public function setVkid($vkid)
    {
        $this->vkid = $vkid;
    }

    /**
     * Get vkid
     *
     * @return integer 
     */
    public function getVkid()
    {
        return $this->vkid;
    }

    /**
     * Set first_name
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
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
}