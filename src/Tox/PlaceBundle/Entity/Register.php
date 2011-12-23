<?php

namespace Tox\PlaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\PlaceBundle\Entity\Register
 */
class Register
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $url
     */
    private $url;

    /**
     * @var Tox\PlaceBundle\Entity\RegisterAccount
     */
    private $Accounts;

    public function __construct()
    {
        $this->Accounts = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
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
     * Add Accounts
     *
     * @param Tox\PlaceBundle\Entity\RegisterAccount $accounts
     */
    public function addRegisterAccount(\Tox\PlaceBundle\Entity\RegisterAccount $accounts)
    {
        $this->Accounts[] = $accounts;
    }

    /**
     * Get Accounts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getAccounts()
    {
        return $this->Accounts;
    }
}