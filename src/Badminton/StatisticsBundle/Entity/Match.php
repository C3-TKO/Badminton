<?php

namespace Badminton\StatisticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Match
 */
class Match
{
    /**
     * @var boolean
     */
    private $idMatchday;

    /**
     * @var boolean
     */
    private $idTeamA;

    /**
     * @var boolean
     */
    private $idTeamB;

    /**
     * @var boolean
     */
    private $teamAScore;

    /**
     * @var boolean
     */
    private $teamBScore;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set idMatchday
     *
     * @param boolean $idMatchday
     * @return Match
     */
    public function setIdMatchday($idMatchday)
    {
        $this->idMatchday = $idMatchday;

        return $this;
    }

    /**
     * Get idMatchday
     *
     * @return boolean 
     */
    public function getIdMatchday()
    {
        return $this->idMatchday;
    }

    /**
     * Set idTeamA
     *
     * @param boolean $idTeamA
     * @return Match
     */
    public function setIdTeamA($idTeamA)
    {
        $this->idTeamA = $idTeamA;

        return $this;
    }

    /**
     * Get idTeamA
     *
     * @return boolean 
     */
    public function getIdTeamA()
    {
        return $this->idTeamA;
    }

    /**
     * Set idTeamB
     *
     * @param boolean $idTeamB
     * @return Match
     */
    public function setIdTeamB($idTeamB)
    {
        $this->idTeamB = $idTeamB;

        return $this;
    }

    /**
     * Get idTeamB
     *
     * @return boolean 
     */
    public function getIdTeamB()
    {
        return $this->idTeamB;
    }

    /**
     * Set teamAScore
     *
     * @param boolean $teamAScore
     * @return Match
     */
    public function setTeamAScore($teamAScore)
    {
        $this->teamAScore = $teamAScore;

        return $this;
    }

    /**
     * Get teamAScore
     *
     * @return boolean 
     */
    public function getTeamAScore()
    {
        return $this->teamAScore;
    }

    /**
     * Set teamBScore
     *
     * @param boolean $teamBScore
     * @return Match
     */
    public function setTeamBScore($teamBScore)
    {
        $this->teamBScore = $teamBScore;

        return $this;
    }

    /**
     * Get teamBScore
     *
     * @return boolean 
     */
    public function getTeamBScore()
    {
        return $this->teamBScore;
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
}
