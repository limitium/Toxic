<?php

namespace Tox\SatelliteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\SatelliteBundle\Entity\Post
 */
class Post
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var text $content
     */
    private $content;

    /**
     * @var string $file_name
     */
    private $file_name;

    /**
     * @var boolean $is_page
     */
    private $is_page;

    /**
     * @var Tox\SatelliteBundle\Entity\Satellite
     */
    private $Satellite;


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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set file_name
     *
     * @param string $fileName
     */
    public function setFileName($fileName)
    {
        $this->file_name = $fileName;
    }

    /**
     * Get file_name
     *
     * @return string 
     */
    public function getFileName()
    {
        return $this->file_name;
    }

    /**
     * Set is_page
     *
     * @param boolean $isPage
     */
    public function setIsPage($isPage)
    {
        $this->is_page = $isPage;
    }

    /**
     * Get is_page
     *
     * @return boolean 
     */
    public function getIsPage()
    {
        return $this->is_page;
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
}