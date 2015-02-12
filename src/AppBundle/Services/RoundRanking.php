<?php

namespace AppBundle\Services;
use Doctrine\ORM\EntityManager;

/**
 * Class RoundResults
 * @package AppBundle\Services
 */
class RoundRanking
{
    /**
     * @var \Doctrine\ORM\EntityManager|null
     */
    private $em = null;

    public function __construct( EntityManager $em ) {
        $this->em = $em;
    }

    /**
     * @param $id    Identifies a round id
     * @return array Contains all game data of one round
     */
    public function findByRoundId($id)
    {
        #do something;
        return true;
    }

    /**
     * @return int
     */
    public function findByLastRound()
    {
        $roundRepo = $this->em->getRepository('AppBundle:Round');

        return $this->findByRoundId($roundRepo->findLatestId());
    }
}