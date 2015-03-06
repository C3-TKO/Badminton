<?php

namespace AppBundle\Services;
use Doctrine\ORM\EntityManager;

/**
 * Class RoundResults
 * @package AppBundle\Services
 */
class RoundResults
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
        $gameRepo       = $this->em->getRepository('AppBundle:Game');
        $games          = $gameRepo->findByRoundId($id);
        $date           = \DateTime::createFromFormat('Y-m-d', $games[0]['date']);

        return array('date' => $date->format('d.m.y'), 'games' => $games);
    }

    /**
     * @return int
     */
    public function findByLastRound()
    {
        $roundRepo = $this->em->getRepository('AppBundle:Round');

        return $this->findByRoundId($roundRepo->findLatestId());
    }


    public function getPaginationBoundaries() {
        $roundRepo = $this->em->getRepository('AppBundle:Round');

        return array('min' => 1, 'max' => $roundRepo->findLatestId());
    }
}
