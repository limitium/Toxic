<?php

namespace Tox\ParserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\ParserBundle\Entity\MetaData
 */
class MetaData
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var text $context
     */
    private $context;


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
     * Set context
     *
     * @param text $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * Get context
     *
     * @return text 
     */
    public function getContext()
    {
        return $this->context;
    }
}