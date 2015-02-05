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
}
