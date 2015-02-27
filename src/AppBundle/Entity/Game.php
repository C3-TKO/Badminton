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
     * @var integer
     */
    private $id;


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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var \AppBundle\Entity\Round
     */
    private $round;


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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $game_2_team_a;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->game_2_team_a = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add game_2_team_a
     *
     * @param \AppBundle\Entity\Team $game2TeamA
     * @return Game
     */
    public function addGame2TeamA(\AppBundle\Entity\Team $game2TeamA)
    {
        $this->game_2_team_a[] = $game2TeamA;

        return $this;
    }

    /**
     * Remove game_2_team_a
     *
     * @param \AppBundle\Entity\Team $game2TeamA
     */
    public function removeGame2TeamA(\AppBundle\Entity\Team $game2TeamA)
    {
        $this->game_2_team_a->removeElement($game2TeamA);
    }

    /**
     * Get game_2_team_a
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGame2TeamA()
    {
        return $this->game_2_team_a;
    }
    /**
     * @var \AppBundle\Entity\Team
     */
    private $games_2_team_a;


    /**
     * Set games_2_team_a
     *
     * @param \AppBundle\Entity\Team $games2TeamA
     * @return Game
     */
    public function setGames2TeamA(\AppBundle\Entity\Team $games2TeamA = null)
    {
        $this->games_2_team_a = $games2TeamA;

        return $this;
    }

    /**
     * Get games_2_team_a
     *
     * @return \AppBundle\Entity\Team 
     */
    public function getGames2TeamA()
    {
        return $this->games_2_team_a;
    }
    /**
     * @var \AppBundle\Entity\Team
     */
    private $games_2_team_b;


    /**
     * Set games_2_team_b
     *
     * @param \AppBundle\Entity\Team $games2TeamB
     * @return Game
     */
    public function setGames2TeamB(\AppBundle\Entity\Team $games2TeamB = null)
    {
        $this->games_2_team_b = $games2TeamB;

        return $this;
    }

    /**
     * Get games_2_team_b
     *
     * @return \AppBundle\Entity\Team 
     */
    public function getGames2TeamB()
    {
        return $this->games_2_team_b;
    }
    /**
     * @var \AppBundle\Entity\Round
     */
    private $round_2_games;


    /**
     * Set round_2_games
     *
     * @param \AppBundle\Entity\Round $round2Games
     * @return Game
     */
    public function setRound2Games(\AppBundle\Entity\Round $round2Games = null)
    {
        $this->round_2_games = $round2Games;

        return $this;
    }

    /**
     * Get round_2_games
     *
     * @return \AppBundle\Entity\Round 
     */
    public function getRound2Games()
    {
        return $this->round_2_games;
    }
    /**
     * @var \AppBundle\Entity\Team
     */
    private $team_a;

    /**
     * @var \AppBundle\Entity\Team
     */
    private $team_b;


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
