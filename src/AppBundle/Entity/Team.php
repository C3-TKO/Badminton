<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 */
class Team
{
    /**
     * @var boolean
     */
    private $idPlayerA;

    /**
     * @var boolean
     */
    private $idPlayerB;

    /**
     * @var integer
     */
    private $name;

    /**
     * @var boolean
     */
    private $id;


    /**
     * Set idPlayerA
     *
     * @param boolean $idPlayerA
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
     * @return boolean 
     */
    public function getIdPlayerA()
    {
        return $this->idPlayerA;
    }

    /**
     * Set idPlayerB
     *
     * @param boolean $idPlayerB
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
     * @return boolean 
     */
    public function getIdPlayerB()
    {
        return $this->idPlayerB;
    }

    /**
     * Set name
     *
     * @param integer $name
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
     * @return integer 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get id
     *
     * @return boolean 
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $players_a;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->players_a = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add players_a
     *
     * @param \AppBundle\Entity\Player $playersA
     * @return Team
     */
    public function addPlayersA(\AppBundle\Entity\Player $playersA)
    {
        $this->players_a[] = $playersA;

        return $this;
    }

    /**
     * Remove players_a
     *
     * @param \AppBundle\Entity\Player $playersA
     */
    public function removePlayersA(\AppBundle\Entity\Player $playersA)
    {
        $this->players_a->removeElement($playersA);
    }

    /**
     * Get players_a
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlayersA()
    {
        return $this->players_a;
    }
    /**
     * @var \AppBundle\Entity\Player
     */
    private $teams_a;


    /**
     * Set teams_a
     *
     * @param \AppBundle\Entity\Player $teamsA
     * @return Team
     */
    public function setTeamsA(\AppBundle\Entity\Player $teamsA = null)
    {
        $this->teams_a = $teamsA;

        return $this;
    }

    /**
     * Get teams_a
     *
     * @return \AppBundle\Entity\Player 
     */
    public function getTeamsA()
    {
        return $this->teams_a;
    }
    /**
     * @var \AppBundle\Entity\Player
     */
    private $teams_b;


    /**
     * Set teams_b
     *
     * @param \AppBundle\Entity\Player $teamsB
     * @return Team
     */
    public function setTeamsB(\AppBundle\Entity\Player $teamsB = null)
    {
        $this->teams_b = $teamsB;

        return $this;
    }

    /**
     * Get teams_b
     *
     * @return \AppBundle\Entity\Player 
     */
    public function getTeamsB()
    {
        return $this->teams_b;
    }
    /**
     * @var \AppBundle\Entity\Game
     */
    private $teams_a_2_game;


    /**
     * Set teams_a_2_game
     *
     * @param \AppBundle\Entity\Game $teamsA2Game
     * @return Team
     */
    public function setTeamsA2Game(\AppBundle\Entity\Game $teamsA2Game = null)
    {
        $this->teams_a_2_game = $teamsA2Game;

        return $this;
    }

    /**
     * Get teams_a_2_game
     *
     * @return \AppBundle\Entity\Game 
     */
    public function getTeamsA2Game()
    {
        return $this->teams_a_2_game;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $team_player_a;


    /**
     * Add team_player_a
     *
     * @param \AppBundle\Entity\Game $teamPlayerA
     * @return Team
     */
    public function addTeamPlayerA(\AppBundle\Entity\Game $teamPlayerA)
    {
        $this->team_player_a[] = $teamPlayerA;

        return $this;
    }

    /**
     * Remove team_player_a
     *
     * @param \AppBundle\Entity\Game $teamPlayerA
     */
    public function removeTeamPlayerA(\AppBundle\Entity\Game $teamPlayerA)
    {
        $this->team_player_a->removeElement($teamPlayerA);
    }

    /**
     * Get team_player_a
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeamPlayerA()
    {
        return $this->team_player_a;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $team_player_a_2_game;


    /**
     * Add team_player_a_2_game
     *
     * @param \AppBundle\Entity\Game $teamPlayerA2Game
     * @return Team
     */
    public function addTeamPlayerA2Game(\AppBundle\Entity\Game $teamPlayerA2Game)
    {
        $this->team_player_a_2_game[] = $teamPlayerA2Game;

        return $this;
    }

    /**
     * Remove team_player_a_2_game
     *
     * @param \AppBundle\Entity\Game $teamPlayerA2Game
     */
    public function removeTeamPlayerA2Game(\AppBundle\Entity\Game $teamPlayerA2Game)
    {
        $this->team_player_a_2_game->removeElement($teamPlayerA2Game);
    }

    /**
     * Get team_player_a_2_game
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeamPlayerA2Game()
    {
        return $this->team_player_a_2_game;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $team_player_b_2_game;


    /**
     * Add team_player_b_2_game
     *
     * @param \AppBundle\Entity\Game $teamPlayerB2Game
     * @return Team
     */
    public function addTeamPlayerB2Game(\AppBundle\Entity\Game $teamPlayerB2Game)
    {
        $this->team_player_b_2_game[] = $teamPlayerB2Game;

        return $this;
    }

    /**
     * Remove team_player_b_2_game
     *
     * @param \AppBundle\Entity\Game $teamPlayerB2Game
     */
    public function removeTeamPlayerB2Game(\AppBundle\Entity\Game $teamPlayerB2Game)
    {
        $this->team_player_b_2_game->removeElement($teamPlayerB2Game);
    }

    /**
     * Get team_player_b_2_game
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeamPlayerB2Game()
    {
        return $this->team_player_b_2_game;
    }
    /**
     * @var \AppBundle\Entity\Player
     */
    private $teams_2_player_a;

    /**
     * @var \AppBundle\Entity\Player
     */
    private $teams_2_player_b;


    /**
     * Set teams_2_player_a
     *
     * @param \AppBundle\Entity\Player $teams2PlayerA
     * @return Team
     */
    public function setTeams2PlayerA(\AppBundle\Entity\Player $teams2PlayerA = null)
    {
        $this->teams_2_player_a = $teams2PlayerA;

        return $this;
    }

    /**
     * Get teams_2_player_a
     *
     * @return \AppBundle\Entity\Player 
     */
    public function getTeams2PlayerA()
    {
        return $this->teams_2_player_a;
    }

    /**
     * Set teams_2_player_b
     *
     * @param \AppBundle\Entity\Player $teams2PlayerB
     * @return Team
     */
    public function setTeams2PlayerB(\AppBundle\Entity\Player $teams2PlayerB = null)
    {
        $this->teams_2_player_b = $teams2PlayerB;

        return $this;
    }

    /**
     * Get teams_2_player_b
     *
     * @return \AppBundle\Entity\Player 
     */
    public function getTeams2PlayerB()
    {
        return $this->teams_2_player_b;
    }
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
}
