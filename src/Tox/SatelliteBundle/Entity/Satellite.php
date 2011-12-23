<?php

namespace Tox\SatelliteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\SatelliteBundle\Entity\Satellite
 */
class Satellite
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $ftp_account_id
     */
    private $ftp_account_id;

    /**
     * @var Tox\PlaceBundle\Entity\Domen
     */
    private $Domen;

    /**
     * @var Tox\SatelliteBundle\Entity\Post
     */
    private $Posts;

    /**
     * @var Tox\SatelliteBundle\Entity\DomenHistory
     */
    private $History;

    /**
     * @var Tox\PlaceBundle\Entity\FtpAccount
     */
    private $FtpAccount;

    /**
     * @var Tox\SatelliteBundle\Entity\Theme
     */
    private $Theme;

    public function __construct()
    {
        $this->Posts = new \Doctrine\Common\Collections\ArrayCollection();
    $this->History = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set ftp_account_id
     *
     * @param integer $ftpAccountId
     */
    public function setFtpAccountId($ftpAccountId)
    {
        $this->ftp_account_id = $ftpAccountId;
    }

    /**
     * Get ftp_account_id
     *
     * @return integer 
     */
    public function getFtpAccountId()
    {
        return $this->ftp_account_id;
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

    /**
     * Add Posts
     *
     * @param Tox\SatelliteBundle\Entity\Post $posts
     */
    public function addPost(\Tox\SatelliteBundle\Entity\Post $posts)
    {
        $this->Posts[] = $posts;
    }

    /**
     * Get Posts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->Posts;
    }

    /**
     * Add History
     *
     * @param Tox\SatelliteBundle\Entity\DomenHistory $history
     */
    public function addDomenHistory(\Tox\SatelliteBundle\Entity\DomenHistory $history)
    {
        $this->History[] = $history;
    }

    /**
     * Get History
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getHistory()
    {
        return $this->History;
    }

    /**
     * Set FtpAccount
     *
     * @param Tox\PlaceBundle\Entity\FtpAccount $ftpAccount
     */
    public function setFtpAccount(\Tox\PlaceBundle\Entity\FtpAccount $ftpAccount)
    {
        $this->FtpAccount = $ftpAccount;
    }

    /**
     * Get FtpAccount
     *
     * @return Tox\PlaceBundle\Entity\FtpAccount 
     */
    public function getFtpAccount()
    {
        return $this->FtpAccount;
    }

    /**
     * Set Theme
     *
     * @param Tox\SatelliteBundle\Entity\Theme $theme
     */
    public function setTheme(\Tox\SatelliteBundle\Entity\Theme $theme)
    {
        $this->Theme = $theme;
    }

    /**
     * Get Theme
     *
     * @return Tox\SatelliteBundle\Entity\Theme 
     */
    public function getTheme()
    {
        return $this->Theme;
    }
}