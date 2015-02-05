<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Round
 */
class Round
{
    /**
     * @var boolean
     */
    private $idSeason;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set idSeason
     *
     * @param boolean $idSeason
     * @return Round
     */
    public function setIdSeason($idSeason)
    {
        $this->idSeason = $idSeason;

        return $this;
    }

    /**
     * Get idSeason
     *
     * @return boolean 
     */
    public function getIdSeason()
    {
        return $this->idSeason;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Round
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
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
     * @var \AppBundle\Entity\Season
     */
    private $season;


    /**
     * Set season
     *
     * @param \AppBundle\Entity\Season $season
     * @return Round
     */
    public function setSeason(\AppBundle\Entity\Season $season = null)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get season
     *
     * @return \AppBundle\Entity\Season 
     */
    public function getSeason()
    {
        return $this->season;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $games;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->games = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add games
     *
     * @param \AppBundle\Entity\Game $games
     * @return Round
     */
    public function addGame(\AppBundle\Entity\Game $games)
    {
        $this->games[] = $games;

        return $this;
    }

    /**
     * Remove games
     *
     * @param \AppBundle\Entity\Game $games
     */
    public function removeGame(\AppBundle\Entity\Game $games)
    {
        $this->games->removeElement($games);
    }

    /**
     * Get games
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGames()
    {
        return $this->games;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $games_2_round;


    /**
     * Add games_2_round
     *
     * @param \AppBundle\Entity\Game $games2Round
     * @return Round
     */
    public function addGames2Round(\AppBundle\Entity\Game $games2Round)
    {
        $this->games_2_round[] = $games2Round;

        return $this;
    }

    /**
     * Remove games_2_round
     *
     * @param \AppBundle\Entity\Game $games2Round
     */
    public function removeGames2Round(\AppBundle\Entity\Game $games2Round)
    {
        $this->games_2_round->removeElement($games2Round);
    }

    /**
     * Get games_2_round
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGames2Round()
    {
        return $this->games_2_round;
    }
    /**
     * @var \AppBundle\Entity\Season
     */
    private $season_2_rounds;


    /**
     * Set season_2_rounds
     *
     * @param \AppBundle\Entity\Season $season2Rounds
     * @return Round
     */
    public function setSeason2Rounds(\AppBundle\Entity\Season $season2Rounds = null)
    {
        $this->season_2_rounds = $season2Rounds;

        return $this;
    }

    /**
     * Get season_2_rounds
     *
     * @return \AppBundle\Entity\Season 
     */
    public function getSeason2Rounds()
    {
        return $this->season_2_rounds;
    }
}
