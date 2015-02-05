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
}
