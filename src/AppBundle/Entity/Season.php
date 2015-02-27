<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Season
 */
class Season
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
     * @return Season
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $rounds;

    /**
     * @var \AppBundle\Entity\Season
     */
    private $season;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rounds = new ArrayCollection();
    }

    /**
     * Add rounds
     *
     * @param \AppBundle\Entity\Round $rounds
     * @return Season
     */
    public function addRound(\AppBundle\Entity\Round $rounds)
    {
        $this->rounds[] = $rounds;

        return $this;
    }

    /**
     * Remove rounds
     *
     * @param \AppBundle\Entity\Round $rounds
     */
    public function removeRound(\AppBundle\Entity\Round $rounds)
    {
        $this->rounds->removeElement($rounds);
    }

    /**
     * Get rounds
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRounds()
    {
        return $this->rounds;
    }

    /**
     * Set season
     *
     * @param \AppBundle\Entity\Season $season
     * @return Season
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
    private $rounds_2_season;


    /**
     * Add rounds_2_season
     *
     * @param \AppBundle\Entity\Round $rounds2Season
     * @return Season
     */
    public function addRounds2Season(\AppBundle\Entity\Round $rounds2Season)
    {
        $this->rounds_2_season[] = $rounds2Season;

        return $this;
    }

    /**
     * Remove rounds_2_season
     *
     * @param \AppBundle\Entity\Round $rounds2Season
     */
    public function removeRounds2Season(\AppBundle\Entity\Round $rounds2Season)
    {
        $this->rounds_2_season->removeElement($rounds2Season);
    }

    /**
     * Get rounds_2_season
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRounds2Season()
    {
        return $this->rounds_2_season;
    }
}
