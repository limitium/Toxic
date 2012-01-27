<?php

namespace Tox\PlaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\PlaceBundle\Entity\Host
 */
class Host
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
     * @var string $username
     */
    private $username;

    /**
     * @var string $password
     */
    private $password;

    /**
     * @var text $ns_servers
     */
    private $ns_servers;

    /**
     * @var Tox\PlaceBundle\Entity\HostAccount
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
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set ns_servers
     *
     * @param text $nsServers
     */
    public function setNsServers($nsServers)
    {
        $this->ns_servers = $nsServers;
    }

    /**
     * Get ns_servers
     *
     * @return text 
     */
    public function getNsServers()
    {
        return $this->ns_servers;
    }

    /**
     * Add Accounts
     *
     * @param Tox\PlaceBundle\Entity\HostAccount $accounts
     */
    public function addHostAccount(\Tox\PlaceBundle\Entity\HostAccount $accounts)
    {
        $this->Accounts[] = $accounts;
    }

    public function removeHostAccount(\Tox\PlaceBundle\Entity\HostAccount $account)
    {
        $this->Accounts->removeElement($account);
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
    /**
     * @var string $url
     */
    private $url;


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
}