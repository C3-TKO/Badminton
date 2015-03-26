<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 */
class Team
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idPlayerA;

    /**
     * @var integer
     */
    private $idPlayerB;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $team_a_game;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $team_b_game;

    /**
     * @var \AppBundle\Entity\Player
     */
    private $player_a;

    /**
     * @var \AppBundle\Entity\Player
     */
    private $player_b;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->team_a_game = new \Doctrine\Common\Collections\ArrayCollection();
        $this->team_b_game = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set idPlayerA
     *
     * @param integer $idPlayerA
     * @return Team
     */
    public function setIdPlayerA($idPlayerA)
    {
        $this->idPlayerA = $idPlayerA;

        return $this;
    }

    /**
     * Get idPlayerA
     *
     * @return integer 
     */
    public function getIdPlayerA()
    {
        return $this->idPlayerA;
    }

    /**
     * Set idPlayerB
     *
     * @param integer $idPlayerB
     * @return Team
     */
    public function setIdPlayerB($idPlayerB)
    {
        $this->idPlayerB = $idPlayerB;

        return $this;
    }

    /**
     * Get idPlayerB
     *
     * @return integer 
     */
    public function getIdPlayerB()
    {
        return $this->idPlayerB;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Team
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Add team_a_game
     *
     * @param \AppBundle\Entity\Game $teamAGame
     * @return Team
     */
    public function addTeamAGame(\AppBundle\Entity\Game $teamAGame)
    {
        $this->team_a_game[] = $teamAGame;

        return $this;
    }

    /**
     * Remove team_a_game
     *
     * @param \AppBundle\Entity\Game $teamAGame
     */
    public function removeTeamAGame(\AppBundle\Entity\Game $teamAGame)
    {
        $this->team_a_game->removeElement($teamAGame);
    }

    /**
     * Get team_a_game
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeamAGame()
    {
        return $this->team_a_game;
    }

    /**
     * Add team_b_game
     *
     * @param \AppBundle\Entity\Game $teamBGame
     * @return Team
     */
    public function addTeamBGame(\AppBundle\Entity\Game $teamBGame)
    {
        $this->team_b_game[] = $teamBGame;

        return $this;
    }

    /**
     * Remove team_b_game
     *
     * @param \AppBundle\Entity\Game $teamBGame
     */
    public function removeTeamBGame(\AppBundle\Entity\Game $teamBGame)
    {
        $this->team_b_game->removeElement($teamBGame);
    }

    /**
     * Get team_b_game
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeamBGame()
    {
        return $this->team_b_game;
    }

    /**
     * Set player_a
     *
     * @param \AppBundle\Entity\Player $playerA
     * @return Team
     */
    public function setPlayerA(\AppBundle\Entity\Player $playerA = null)
    {
        $this->player_a = $playerA;

        return $this;
    }

    /**
     * Get player_a
     *
     * @return \AppBundle\Entity\Player 
     */
    public function getPlayerA()
    {
        return $this->player_a;
    }

    /**
     * Set player_b
     *
     * @param \AppBundle\Entity\Player $playerB
     * @return Team
     */
    public function setPlayerB(\AppBundle\Entity\Player $playerB = null)
    {
        $this->player_b = $playerB;

        return $this;
    }

    /**
     * Get player_b
     *
     * @return \AppBundle\Entity\Player 
     */
    public function getPlayerB()
    {
        return $this->player_b;
    }


    /**
     * Stringify
     *
     * @return string
     */
    public function __toString() {
        return $this->getPlayerA()->getName() . ' & ' . $this->getPlayerB()->getName();
    }
}
