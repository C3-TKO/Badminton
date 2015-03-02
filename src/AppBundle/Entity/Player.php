<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 */
class Player
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $teams_player_a;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $teams_player_b;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->teams_player_a = new \Doctrine\Common\Collections\ArrayCollection();
        $this->teams_player_b = new \Doctrine\Common\Collections\ArrayCollection();
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
