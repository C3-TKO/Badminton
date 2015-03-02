<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 */
class Game
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idRound;

    /**
     * @var integer
     */
    private $idTeamA;

    /**
     * @var integer
     */
    private $idTeamB;

    /**
     * @var integer
     */
    private $teamAScore;

    /**
     * @var integer
     */
    private $teamBScore;

    /**
     * @var \AppBundle\Entity\Round
     */
    private $round;

    /**
     * @var \AppBundle\Entity\Team
     */
    private $team_a;

    /**
     * @var \AppBundle\Entity\Team
     */
    private $team_b;


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
     * Set idRound
     *
     * @param integer $idRound
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
     * @return integer 
     */
    public function getIdRound()
    {
        return $this->idRound;
    }

    /**
     * Set idTeamA
     *
     * @param integer $idTeamA
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
     * @return integer 
     */
    public function getIdTeamA()
    {
        return $this->idTeamA;
    }

    /**
     * Set idTeamB
     *
     * @param integer $idTeamB
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
     * @return integer 
     */
    public function getIdTeamB()
    {
        return $this->idTeamB;
    }

    /**
     * Set teamAScore
     *
     * @param integer $teamAScore
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
     * @return integer 
     */
    public function getTeamAScore()
    {
        return $this->teamAScore;
    }

    /**
     * Set teamBScore
     *
     * @param integer $teamBScore
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
     * @return integer 
     */
    public function getTeamBScore()
    {
        return $this->teamBScore;
    }

    /**
     * Set round
     *
     * @param \AppBundle\Entity\Round $round
     * @return Game
     */
    public function setRound(\AppBundle\Entity\Round $round = null)
    {
        $this->round = $round;

        return $this;
    }

    /**
     * Get round
     *
     * @return \AppBundle\Entity\Round 
     */
    public function getRound()
    {
        return $this->round;
    }

    /**
     * Set team_a
     *
     * @param \AppBundle\Entity\Team $teamA
     * @return Game
     */
    public function setTeamA(\AppBundle\Entity\Team $teamA = null)
    {
        $this->team_a = $teamA;

        return $this;
    }

    /**
     * Get team_a
     *
     * @return \AppBundle\Entity\Team 
     */
    public function getTeamA()
    {
        return $this->team_a;
    }

    /**
     * Set team_b
     *
     * @param \AppBundle\Entity\Team $teamB
     * @return Game
     */
    public function setTeamB(\AppBundle\Entity\Team $teamB = null)
    {
        $this->team_b = $teamB;

        return $this;
    }

    /**
     * Get team_b
     *
     * @return \AppBundle\Entity\Team 
     */
    public function getTeamB()
    {
        return $this->team_b;
    }
}
