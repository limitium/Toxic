<?php

namespace Tox\ParserBundle\Entity;

use Tox\PlaceBundle\Entity\HttpAccount;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\ParserBundle\Entity\SourceAccount
 */
class SourceAccount extends HttpAccount
{

    /**
     * @var Tox\ParserBundle\Entity\Source
     */
    private $Source;


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