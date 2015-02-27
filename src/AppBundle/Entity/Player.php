<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 */
class Player
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set name
     *
     * @param string $name
     * @return Player
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var \AppBundle\Entity\Team
     */
    private $team_a;


    /**
     * Set team_a
     *
     * @param \AppBundle\Entity\Team $teamA
     * @return Player
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $team_player_a;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->team_player_a = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add team_player_a
     *
     * @param \AppBundle\Entity\Team $teamPlayerA
     * @return Player
     */
    public function addTeamPlayerA(\AppBundle\Entity\Team $teamPlayerA)
    {
        $this->team_player_a[] = $teamPlayerA;

        return $this;
    }

    /**
     * Remove team_player_a
     *
     * @param \AppBundle\Entity\Team $teamPlayerA
     */
    public function removeTeamPlayerA(\AppBundle\Entity\Team $teamPlayerA)
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
    private $team_player_b;


    /**
     * Add team_player_b
     *
     * @param \AppBundle\Entity\Team $teamPlayerB
     * @return Player
     */
    public function addTeamPlayerB(\AppBundle\Entity\Team $teamPlayerB)
    {
        $this->team_player_b[] = $teamPlayerB;

        return $this;
    }

    /**
     * Remove team_player_b
     *
     * @param \AppBundle\Entity\Team $teamPlayerB
     */
    public function removeTeamPlayerB(\AppBundle\Entity\Team $teamPlayerB)
    {
        $this->team_player_b->removeElement($teamPlayerB);
    }

    /**
     * Get team_player_b
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeamPlayerB()
    {
        return $this->team_player_b;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $player_a_2_teams;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $player_b_2_teams;


    /**
     * Add player_a_2_teams
     *
     * @param \AppBundle\Entity\Team $playerA2Teams
     * @return Player
     */
    public function addPlayerA2Team(\AppBundle\Entity\Team $playerA2Teams)
    {
        $this->player_a_2_teams[] = $playerA2Teams;

        return $this;
    }

    /**
     * Remove player_a_2_teams
     *
     * @param \AppBundle\Entity\Team $playerA2Teams
     */
    public function removePlayerA2Team(\AppBundle\Entity\Team $playerA2Teams)
    {
        $this->player_a_2_teams->removeElement($playerA2Teams);
    }

    /**
     * Get player_a_2_teams
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlayerA2Teams()
    {
        return $this->player_a_2_teams;
    }

    /**
     * Add player_b_2_teams
     *
     * @param \AppBundle\Entity\Team $playerB2Teams
     * @return Player
     */
    public function addPlayerB2Team(\AppBundle\Entity\Team $playerB2Teams)
    {
        $this->player_b_2_teams[] = $playerB2Teams;

        return $this;
    }

    /**
     * Remove player_b_2_teams
     *
     * @param \AppBundle\Entity\Team $playerB2Teams
     */
    public function removePlayerB2Team(\AppBundle\Entity\Team $playerB2Teams)
    {
        $this->player_b_2_teams->removeElement($playerB2Teams);
    }

    /**
     * Get player_b_2_teams
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlayerB2Teams()
    {
        return $this->player_b_2_teams;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $teams_player_a;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $teams_player_b;


    /**
     * Add teams_player_a
     *
     * @param \AppBundle\Entity\Team $teamsPlayerA
     * @return Player
     */
    public function addTeamsPlayerA(\AppBundle\Entity\Team $teamsPlayerA)
    {
        $this->teams_player_a[] = $teamsPlayerA;

        return $this;
    }

    /**
     * Remove teams_player_a
     *
     * @param \AppBundle\Entity\Team $teamsPlayerA
     */
    public function removeTeamsPlayerA(\AppBundle\Entity\Team $teamsPlayerA)
    {
        $this->teams_player_a->removeElement($teamsPlayerA);
    }

    /**
     * Get teams_player_a
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeamsPlayerA()
    {
        return $this->teams_player_a;
    }

    /**
     * Add teams_player_b
     *
     * @param \AppBundle\Entity\Team $teamsPlayerB
     * @return Player
     */
    public function addTeamsPlayerB(\AppBundle\Entity\Team $teamsPlayerB)
    {
        $this->teams_player_b[] = $teamsPlayerB;

        return $this;
    }

    /**
     * Remove teams_player_b
     *
     * @param \AppBundle\Entity\Team $teamsPlayerB
     */
    public function removeTeamsPlayerB(\AppBundle\Entity\Team $teamsPlayerB)
    {
        $this->teams_player_b->removeElement($teamsPlayerB);
    }

    /**
     * Get teams_player_b
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeamsPlayerB()
    {
        return $this->teams_player_b;
    }
}
