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
}
