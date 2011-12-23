<?php

namespace Tox\PlaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\PlaceBundle\Entity\Account
 */
class Account
{
    /**
     * @var text $id
     */
    private $id;

    /**
     * @var text $username
     */
    private $username;

    /**
     * @var string $password
     */
    private $password;

    /**
     * @var text $descriminator
     */
    private $descriminator;


    /**
     * Get id
     *
     * @return text 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param text $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return text 
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
     * Set descriminator
     *
     * @param text $descriminator
     */
    public function setDescriminator($descriminator)
    {
        $this->descriminator = $descriminator;
    }

    /**
     * Get descriminator
     *
     * @return text 
     */
    public function getDescriminator()
    {
        return $this->descriminator;
    }
}