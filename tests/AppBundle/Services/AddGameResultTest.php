<?php
/*
 * This file is part of the Badminton AppBundle (https://github.com/C3-TKO/Badminton).
 *
 * (c) Thomas Kolar <thomas.kolar@email.de>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */


namespace Tests\AppBundle\Services;
use AppBundle\Entity\Game;
use AppBundle\Entity\Team;

/**
 * Class AddGameResultTest
 * @package Tests\AppBundle\Services
 */
class AddGameResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests the main method of the add game service
     *
     * @test
     * @small
     *
     * @dataProvider addGameProvider
     *
     * @param \AppBundle\Entity\Game $game
     * @param \AppBundle\Entity\Team $winningTeam
     * @param $scoreLoosingTeam
     * @param \AppBundle\Entity\Game $expectation
     */
    public function addGame(Game $game, Team $winningTeam, $scoreLoosingTeam, Game $expectation)
    {
        $this->assertEquals($expectation, $game);
    }

    /**
     * DataProvider for the addGame test
     */
    public function addGameProvider()
    {
        $game            = new Game();
        $teamA           = new Team();
        $teamB           = new Team();
        $reflectionClass = new \ReflectionClass('\AppBundle\Entity\Team');

        $reflectionProperty = $reflectionClass->getProperty('id');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($teamA, 1);
        $reflectionProperty->setValue($teamB, 2);

        $game->setTeamA($teamA);
        $game->setTeamB($teamB);

        $expectedGame = clone $game;

        return [
            [
                'game'              => $game,
                'winningTeam'       => $teamA,
                'scoreLoosingTeam'  => 0,
                'expectation'       => $expectedGame->setTeamAScore(21)->setTeamBScore(0)
            ],
            [
                'game'              => $game,
                'winningTeam'       => $teamA,
                'scoreLoosingTeam'  => 19,
                'expectation'       => $expectedGame->setTeamAScore(21)->setTeamBScore(0)
            ],
            [
                'game'              => $game,
                'winningTeam'       => $teamA,
                'scoreLoosingTeam'  => 20,
                'expectation'       => $expectedGame->setTeamAScore(22)->setTeamBScore(0)
            ],
            [
                'game'              => $game,
                'winningTeam'       => $teamA,
                'scoreLoosingTeam'  => 29,
                'expectation'       => $expectedGame->setTeamAScore(30)->setTeamBScore(0)
            ]
        ];
    }
}