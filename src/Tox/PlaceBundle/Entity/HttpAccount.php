<?php

namespace Tox\PlaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\PlaceBundle\Entity\HttpAccount
 */
class HttpAccount extends Account
{

    /**
     * @var string $login_field
     */
    private $login_field;

    /**
     * @var string $password_fied
     */
    private $password_fied;

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
     * Set password_fied
     *
     * @param string $passwordFied
     */
    public function setPasswordFied($passwordFied)
    {
        $this->password_fied = $passwordFied;
    }

    /**
     * Get password_fied
     *
     * @return string 
     */
    public function getPasswordFied()
    {
        return $this->password_fied;
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