<?php

namespace Tox\PlaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\PlaceBundle\Entity\Indexed
 */
class Indexed
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var boolean $in
     */
    private $in;

    /**
     * @var Tox\PlaceBundle\Entity\Domen
     */
    private $Domen;

    /**
     * @var Tox\PlaceBundle\Entity\SearchEngine
     */
    private $SearchEngine;


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
     * Set in
     *
     * @param boolean $in
     */
    public function setIn($in)
    {
        $this->in = $in;
    }

    /**
     * Get in
     *
     * @return boolean 
     */
    public function getIn()
    {
        return $this->in;
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
     * Set SearchEngine
     *
     * @param Tox\PlaceBundle\Entity\SearchEngine $searchEngine
     */
    public function setSearchEngine(\Tox\PlaceBundle\Entity\SearchEngine $searchEngine)
    {
        $this->SearchEngine = $searchEngine;
    }

    /**
     * Get SearchEngine
     *
     * @return Tox\PlaceBundle\Entity\SearchEngine 
     */
    public function getSearchEngine()
    {
        return $this->SearchEngine;
    }
}