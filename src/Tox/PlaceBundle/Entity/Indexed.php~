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
     * @var boolean $in_index
     */
    private $in_index;

    /**
     * @var datetime $check_at
     */
    private $check_at;

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
     * Set in_index
     *
     * @param boolean $inIndex
     */
    public function setInIndex($inIndex)
    {
        $this->in_index = $inIndex;
    }

    /**
     * Get in_index
     *
     * @return boolean 
     */
    public function getInIndex()
    {
        return $this->in_index;
    }

    /**
     * Set check_at
     *
     * @param datetime $checkAt
     */
    public function setCheckAt($checkAt)
    {
        $this->check_at = $checkAt;
    }

    /**
     * Get check_at
     *
     * @return datetime 
     */
    public function getCheckAt()
    {
        return $this->check_at;
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