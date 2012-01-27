<?php

namespace Tox\PlaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\PlaceBundle\Entity\Host
 */
class HttpAccount extends Account
{



    /**
     * @var string $login_field
     */
    private $login_field;

    /**
     * @var string $password_field
     */
    private $password_field;

    /**
     * @var string $url
     */
    private $url;


    /**
     * Set login_field
     *
     * @param string $loginField
     */
    public function setLoginField($loginField)
    {
        $this->login_field = $loginField;
    }

    /**
     * Get login_field
     *
     * @return string 
     */
    public function getLoginField()
    {
        return $this->login_field;
    }

    /**
     * Set password_field
     *
     * @param string $passwordField
     */
    public function setPasswordField($passwordField)
    {
        $this->password_field = $passwordField;
    }

    /**
     * Get password_field
     *
     * @return string 
     */
    public function getPasswordField()
    {
        return $this->password_field;
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
}