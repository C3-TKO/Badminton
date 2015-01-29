<?php

namespace Badminton\StatisticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matchday
 */
class Matchday
{
    /**
     * @var boolean
     */
    private $idSeason;

    /**
     * @var boolean
     */
    private $matchday;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var integer
     */
    private $idMatchday;


    /**
     * Set idSeason
     *
     * @param boolean $idSeason
     * @return Matchday
     */
    public function setIdSeason($idSeason)
    {
        $this->idSeason = $idSeason;

        return $this;
    }

    /**
     * Get idSeason
     *
     * @return boolean 
     */
    public function getIdSeason()
    {
        return $this->idSeason;
    }

    /**
     * Set matchday
     *
     * @param boolean $matchday
     * @return Matchday
     */
    public function setMatchday($matchday)
    {
        $this->matchday = $matchday;

        return $this;
    }

    /**
     * Get matchday
     *
     * @return boolean 
     */
    public function getMatchday()
    {
        return $this->matchday;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Matchday
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get idMatchday
     *
     * @return integer 
     */
    public function getIdMatchday()
    {
        return $this->idMatchday;
    }
}
