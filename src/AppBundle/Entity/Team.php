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
}
