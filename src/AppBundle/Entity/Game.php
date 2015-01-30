<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 */
class Game
{
    /**
     * @var boolean
     */
    private $idRound;

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
     * Set idRound
     *
     * @param boolean $idRound
     * @return Game
     */
    public function setIdRound($idRound)
    {
        $this->idRound = $idRound;

        return $this;
    }

    /**
     * Get idRound
     *
     * @return boolean 
     */
    public function getIdRound()
    {
        return $this->idRound;
    }

    /**
     * Set idTeamA
     *
     * @param boolean $idTeamA
     * @return Game
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
     * @return Game
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
     * @return Game
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
     * @return Game
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
