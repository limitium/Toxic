<?php

namespace Tox\PlaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tox\PlaceBundle\Entity\Domen
 */
class Domen
{
    
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var date $bought_at
     */
    private $bought_at;

    /**
     * @var string $whois
     */
    private $whois;

    /**
     * @var date $paid_unitl
     */
    private $paid_unitl;

    /**
     * @var integer $register_account_id
     */
    private $register_account_id;

    /**
     * @var integer $bot_id
     */
    private $bot_id;

    /**
     * @var Tox\SatelliteBundle\Entity\Satellite
     */
    private $Satellite;

    /**
     * @var Tox\SatelliteBundle\Entity\DomenHistory
     */
    private $History;

    /**
     * @var Tox\PlaceBundle\Entity\Indexed
     */
    private $Indexes;

    /**
     * @var Tox\PlaceBundle\Entity\RegisterAccount
     */
    private $RegisterAccount;

    /**
     * @var Tox\ParserBundle\Entity\Bot
     */
    private $Bot;

    public function __construct()
    {
        $this->History = new \Doctrine\Common\Collections\ArrayCollection();
    $this->Indexes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set bought_at
     *
     * @param date $boughtAt
     */
    public function setBoughtAt($boughtAt)
    {
        $this->bought_at = $boughtAt;
    }

    /**
     * Get bought_at
     *
     * @return date 
     */
    public function getBoughtAt()
    {
        return $this->bought_at;
    }

    /**
     * Set whois
     *
     * @param string $whois
     */
    public function setWhois($whois)
    {
        $this->whois = $whois;
    }

    /**
     * Get whois
     *
     * @return string 
     */
    public function getWhois()
    {
        return $this->whois;
    }

    /**
     * Set paid_unitl
     *
     * @param date $paidUnitl
     */
    public function setPaidUnitl($paidUnitl)
    {
        $this->paid_unitl = $paidUnitl;
    }

    /**
     * Get paid_unitl
     *
     * @return date 
     */
    public function getPaidUnitl()
    {
        return $this->paid_unitl;
    }

    /**
     * Set register_account_id
     *
     * @param integer $registerAccountId
     */
    public function setRegisterAccountId($registerAccountId)
    {
        $this->register_account_id = $registerAccountId;
    }

    /**
     * Get register_account_id
     *
     * @return integer 
     */
    public function getRegisterAccountId()
    {
        return $this->register_account_id;
    }

    /**
     * Set bot_id
     *
     * @param integer $botId
     */
    public function setBotId($botId)
    {
        $this->bot_id = $botId;
    }

    /**
     * Get bot_id
     *
     * @return integer 
     */
    public function getBotId()
    {
        return $this->bot_id;
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
     * Add Indexes
     *
     * @param Tox\PlaceBundle\Entity\Indexed $indexes
     */
    public function addIndexed(\Tox\PlaceBundle\Entity\Indexed $indexes)
    {
        $this->Indexes[] = $indexes;
    }

    /**
     * Get Indexes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIndexes()
    {
        return $this->Indexes;
    }

    /**
     * Set RegisterAccount
     *
     * @param Tox\PlaceBundle\Entity\RegisterAccount $registerAccount
     */
    public function setRegisterAccount(\Tox\PlaceBundle\Entity\RegisterAccount $registerAccount)
    {
        $this->RegisterAccount = $registerAccount;
    }

    /**
     * Get RegisterAccount
     *
     * @return Tox\PlaceBundle\Entity\RegisterAccount 
     */
    public function getRegisterAccount()
    {
        return $this->RegisterAccount;
    }

    /**
     * Set Bot
     *
     * @param Tox\ParserBundle\Entity\Bot $bot
     */
    public function setBot(\Tox\ParserBundle\Entity\Bot $bot)
    {
        $this->Bot = $bot;
    }

    /**
     * Get Bot
     *
     * @return Tox\ParserBundle\Entity\Bot 
     */
    public function getBot()
    {
        return $this->Bot;
    }

    public function __toString() {
        return $this->getName();
    }
}