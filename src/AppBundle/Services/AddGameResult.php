<?php
/*
 * This file is part of the Badminton AppBundle (https://github.com/C3-TKO/Badminton).
 *
 * (c) Thomas Kolar <thomas.kolar@email.de>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace AppBundle\Services;
use AppBundle\Entity\Game;
use AppBundle\Entity\Team;

/**
 * Class AddGameResult
 * @package AppBundle\Services
 */
class AddGameResult
{
    const BADMINTON_MIN_SCORE_LOOSER = 0;  // Each team starts with zero points
    const BADMINTON_MAX_SCORE_LOOSER = 29; // 30 points is the maximum score in badminton. Therefore the looser must not have more then 29 points

    /**
     * Adds a game result
     *
     * @param Game $game
     * @param Team $winningTeam
     * @param $scoreLoosingTeam
     *
     * @throws \OutOfRangeException
     *
     * @return Game
     */
    public function addGameResult(Game $game, Team $winnerTeam, $looserTeamScore)
    {
        if( $looserTeamScore < self::BADMINTON_MIN_SCORE_LOOSER ||
            $looserTeamScore > self::BADMINTON_MAX_SCORE_LOOSER) {
            throw new \OutOfRangeException(
                sprintf(
                    'The score of the loosing team must be within the range of %s - %s',
                    self::BADMINTON_MIN_SCORE_LOOSER,
                    self::BADMINTON_MAX_SCORE_LOOSER)
            );
        }


        return $game;
    }


    /**
     * Determines the score of the winning team
     *
     * @param $looserTeamScore
     *
     * @return int
     */
    private function determineWinnerTeamScore($looserTeamScore)
    {
        if ($looserTeamScore === 29) {
            return 30;
        }
        if ($looserTeamScore > 19) {
            return $looserTeamScore + 2;
        }

        return 21;
    }
}
