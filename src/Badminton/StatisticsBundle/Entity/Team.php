<?php

namespace Badminton\StatisticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 */
class Team
{
    /**
     * @var boolean
     */
    private $idSpieler1;

    /**
     * @var boolean
     */
    private $idSpieler2;

    /**
     * @var boolean
     */
    private $idTeam;


    /**
     * Set idSpieler1
     *
     * @param boolean $idSpieler1
     * @return Team
     */
    public function setIdSpieler1($idSpieler1)
    {
        $this->idSpieler1 = $idSpieler1;

        return $this;
    }

    /**
     * Get idSpieler1
     *
     * @return boolean 
     */
    public function getIdSpieler1()
    {
        return $this->idSpieler1;
    }

    /**
     * Set idSpieler2
     *
     * @param boolean $idSpieler2
     * @return Team
     */
    public function setIdSpieler2($idSpieler2)
    {
        $this->idSpieler2 = $idSpieler2;

        return $this;
    }

    /**
     * Get idSpieler2
     *
     * @return boolean 
     */
    public function getIdSpieler2()
    {
        return $this->idSpieler2;
    }

    /**
     * Get idTeam
     *
     * @return boolean 
     */
    public function getIdTeam()
    {
        return $this->idTeam;
    }
    /**
     * @var boolean
     */
    private $idPlayerA;

    /**
     * @var boolean
     */
    private $idPlayerB;

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
     * Get id
     *
     * @return boolean 
     */
    public function getId()
    {
        return $this->id;
    }
}
