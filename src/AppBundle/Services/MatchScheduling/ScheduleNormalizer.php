<?php
/**
 * Created by PhpStorm.
 * User: C3-TKO <thomas.kolar@email.de>
 * Date: 18.03.15
 * Time: 21:32
 */

namespace AppBundle\Services\MatchScheduling;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Game;
use Doctrine\Common\Collections\ArrayCollection;


class ScheduleNormalizer {


    /**
     * @var EntityManager
     */
    private $em = null;


    /**
     * DIC constructor
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }


    /**
     * Serializes a schedule into a json string
     *
     * @param $serializedSchedule
     * @return ArrayCollection
     */
    public function normalize($serializedSchedule) {
        $flatGames          = json_decode($serializedSchedule);
        $normalizedSchedule = new ArrayCollection();

        $gameRepo = $this->em->getRepository('AppBundle:Game');
        $teamRepo = $this->em->getRepository('AppBundle:Team');

        foreach($flatGames as $flatGame) {

            if ($flatGame->id !== null) {
                $normalizedGame = $gameRepo->find($flatGame->id);
            }
            else {
                $normalizedGame = new Game();
                $teamA          = $teamRepo->find($flatGame->id_team_a);
                $teamB          = $teamRepo->find($flatGame->id_team_b);

                $normalizedGame->setTeamA($teamA);
                $normalizedGame->setTeamB($teamB);

                if ($flatGame->team_a_score !== null) {
                    $normalizedGame->setTeamAScore($flatGame->team_a_score);
                }

                if ($flatGame->team_b_score !== null) {
                    $normalizedGame->setTeamBScore($flatGame->team_b_score);
                }
            }

            $normalizedSchedule->add($normalizedGame);
        }

        return $normalizedSchedule;
    }
}