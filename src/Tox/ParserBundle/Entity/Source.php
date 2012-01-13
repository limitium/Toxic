<?php

namespace Tox\ParserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tox\ParserBundle\Entity\Source
 */
class Source {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $url
     */
    private $url;

    /**
     * @var Tox\ParserBundle\Entity\SourceAccount
     */
    private $Account;

    /**
     * @var Tox\ParserBundle\Entity\RawResult
     */
    private $Results;

    /**
     * @var Tox\ParserBundle\Entity\Rule
     */
    private $Rules;

    /**
     * @var Tox\ParserBundle\Entity\UsedProxy
     */
    private $UsedProxy;

    /**
     * @var Tox\SatelliteBundle\Entity\Theme
     */
    private $Theme;

    /**
     * @var Tox\ParserBundle\Entity\Schedule
     */
    private $Schedule;

    /**
     * @var Tox\ParserBundle\Entity\SourceType
     */
    private $Type;

    public function __construct() {
        $this->Results = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Rules = new \Doctrine\Common\Collections\ArrayCollection();
        $this->UsedProxy = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url) {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    public function getDomen() {
        preg_match("/http:\/\/(.*?)\//i", $this->getUrl(), $m);
        return $m[1];
    }

    /**
     * Set Account
     *
     * @param Tox\ParserBundle\Entity\SourceAccount $account
     */
    public function setAccount(\Tox\ParserBundle\Entity\SourceAccount $account) {
        $this->Account = $account;
    }

    /**
     * Get Account
     *
     * @return Tox\ParserBundle\Entity\SourceAccount
     */
    public function getAccount() {
        return $this->Account;
    }

    /**
     * Add Results
     *
     * @param Tox\ParserBundle\Entity\RawResult $results
     */
    public function addRawResult(\Tox\ParserBundle\Entity\RawResult $results) {
        $this->Results[] = $results;
    }

    /**
     * Get Results
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getResults() {
        return $this->Results;
    }

    /**
     * Add Rules
     *
     * @param Tox\ParserBundle\Entity\Rule $rules
     */
    public function addRule(\Tox\ParserBundle\Entity\Rule $rules) {
        $this->Rules[] = $rules;
    }

    /**
     * Set Rules
     *
     * @param Doctrine\Common\Collections\ArrayCollection  $rules
     */
    public function setRulesDoctrine(\Doctrine\Common\Collections\ArrayCollection $rules) {
        $this->Rules[] = $rules;
    }

    /**
     * Get Rules
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getRules() {
        return $this->Rules;
    }

    public function getRule($name) {
        foreach ($this->Rules as $rule) {
            if ($rule->getType()->getName() == $name) {
                return $rule;
            }
        }
    }

    public function removeRule(\Tox\ParserBundle\Entity\Rule $rule) {
        $this->Rules->removeElement($rule);
    }

    /**
     * Add UsedProxy
     *
     * @param Tox\ParserBundle\Entity\UsedProxy $usedProxy
     */
    public function addUsedProxy(\Tox\ParserBundle\Entity\UsedProxy $usedProxy) {
        $this->UsedProxy[] = $usedProxy;
    }

    /**
     * Get UsedProxy
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getUsedProxy() {
        return $this->UsedProxy;
    }

    /**
     * Set Theme
     *
     * @param Tox\SatelliteBundle\Entity\Theme $theme
     */
    public function setTheme(\Tox\SatelliteBundle\Entity\Theme $theme) {
        $this->Theme = $theme;
    }

    /**
     * Get Theme
     *
     * @return Tox\SatelliteBundle\Entity\Theme
     */
    public function getTheme() {
        return $this->Theme;
    }

    /**
     * Set Schedule
     *
     * @param Tox\ParserBundle\Entity\Schedule $schedule
     */
    public function setSchedule(\Tox\ParserBundle\Entity\Schedule $schedule) {
        $this->Schedule = $schedule;
    }

    /**
     * Get Schedule
     *
     * @return Tox\ParserBundle\Entity\Schedule
     */
    public function getSchedule() {
        return $this->Schedule;
    }

    /**
     * Set Type
     *
     * @param Tox\ParserBundle\Entity\SourceType $type
     */
    public function setType(\Tox\ParserBundle\Entity\SourceType $type) {
        $this->Type = $type;
    }

    /**
     * Get Type
     *
     * @return Tox\ParserBundle\Entity\SourceType
     */
    public function getType() {
        return $this->Type;
    }

    public function __toString() {
        return $this->name;
    }
}