<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matchday
 */
class Matchday
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
     * @return Matchday
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
     * @return Matchday
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
}
