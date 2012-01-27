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
     * @var text $body
     */
    private $body;

    /**
     * @var string $file_name
     */
    private $file_name;

    /**
     * @var boolean $is_page
     */
    private $is_page;

    /**
     * @var boolean $is_posted
     */
    private $is_posted;

    /**
     * @var Tox\SatelliteBundle\Entity\Image
     */
    private $Post;

    /**
     * @var Tox\SatelliteBundle\Entity\Satellite
     */
    private $Satellite;

    /**
     * @var Tox\ParserBundle\Entity\Content
     */
    private $Content;

    public function __construct()
    {
        $this->Post = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set body
     *
     * @param text $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * Get body
     *
     * @return text 
     */
    public function getBody()
    {
        return $this->body;
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
     * Set is_posted
     *
     * @param boolean $isPosted
     */
    public function setIsPosted($isPosted)
    {
        $this->is_posted = $isPosted;
    }

    /**
     * Get is_posted
     *
     * @return boolean 
     */
    public function getIsPosted()
    {
        return $this->is_posted;
    }

    /**
     * Add Post
     *
     * @param Tox\SatelliteBundle\Entity\Image $post
     */
    public function addImage(\Tox\SatelliteBundle\Entity\Image $post)
    {
        $this->Post[] = $post;
    }

    /**
     * Get Post
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPost()
    {
        return $this->Post;
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
     * Set Content
     *
     * @param Tox\ParserBundle\Entity\Content $content
     */
    public function setContent(\Tox\ParserBundle\Entity\Content $content)
    {
        $this->Content = $content;
    }

    /**
     * Get Content
     *
     * @return Tox\ParserBundle\Entity\Content 
     */
    public function getContent()
    {
        return $this->Content;
    }
}