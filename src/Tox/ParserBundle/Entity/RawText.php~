<?php

namespace Tox\ParserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\ParserBundle\Entity\RawText
 */
class RawText
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var text $content
     */
    private $content;

    /**
     * @var Tox\SatelliteBundle\Entity\Theme
     */
    private $Theme;

    /**
     * @var Tox\ParserBundle\Entity\Source
     */
    private $Source;


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

    /**
     * Set Source
     *
     * @param Tox\ParserBundle\Entity\Source $source
     */
    public function setSource(\Tox\ParserBundle\Entity\Source $source)
    {
        $this->Source = $source;
    }

    /**
     * Get Source
     *
     * @return Tox\ParserBundle\Entity\Source 
     */
    public function getSource()
    {
        return $this->Source;
    }
}