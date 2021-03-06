<?php
/**
 * Created by PhpStorm.
 * User: C3-TKO <thomas.kolar@email.de>
 * Date: 18.03.15
 * Time: 21:32
 */

namespace AppBundle\Services\MatchScheduling;

use AppBundle\Entity\Game;
use Doctrine\Common\Collections\ArrayCollection;


class ScheduleSerializer {

    /**
     * Serializes a schedule into a json string
     *
     * @param ArrayCollection $schedule
     * @return string
     */
    public function serialize(ArrayCollection $schedule) {
        $games                  = $schedule->getValues();
        $serializedSchedule     = array();
        foreach($games as $game) {
            /**
             * @var $game Game
             */
            $serializedSchedule[] = array(
                                        'id'            => $game->getId(),
                                        'id_round'      => $game->getIdRound(),
                                        'id_team_a'     => $game->getTeamA()->getId(),
                                        'id_team_b'     => $game->getTeamB()->getId(),
                                        'team_a_score'  => $game->getTeamAScore(),
                                        'team_b_score'  => $game->getTeamBScore()
                                    );
        }

        return json_encode($serializedSchedule);
    }
}