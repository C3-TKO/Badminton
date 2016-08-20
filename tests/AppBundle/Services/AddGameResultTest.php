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
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use AppBundle\Entity\Game;
use AppBundle\Entity\Team;

/**
 * Class AddGameResultTest
 * @package Tests\AppBundle\Services
 */
class AddGameResultTest extends KernelTestCase
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    private static $container;

    /**
     * @var \AppBundle\Services\AddGameResult
     */
    private static $addGameResultService;

    /**
     * Used within the addGameResultsDataProvider
     *
     * @var array
     */
    private static $testResults = [
        [
            'winnerScore' => 21,
            'looserScore' => 0

        ],
        [
            'winnerScore' => 21,
            'looserScore' => 19

        ],
        [
            'winnerScore' => 22,
            'looserScore' => 20

        ],
        [
            'winnerScore' => 30,
            'looserScore' => 29

        ]
    ];


    /**
     * - Boots the symfony kernel
     * - Gets the DI container
     * - Gets the test subject service
     */
    public static function setUpBeforeClass()
    {
        // Start the symfony kernel
        self::bootKernel();

        // Get the DI container
        self::$container = self::$kernel->getContainer();

        // Now we can instantiate our service (if you want a fresh one for
        // each test method, do this in setUp() instead
        self::$addGameResultService = self::$container->get('app.add_game_result');
    }


    /**
     * Tests the main method of the add game service
     *
     * @test
     * @small
     * @covers determineWinnerTeamScore
     *
     * @dataProvider addGameResultDataProvider
     *
     * @param \AppBundle\Entity\Game $game
     * @param \AppBundle\Entity\Team $winningTeam
     * @param $scoreLoosingTeam
     * @param \AppBundle\Entity\Game $expectation
     */
    public function addGameResult(Game $game, Team $winningTeam, $scoreLoosingTeam, Game $expectation)
    {
        $this->assertEquals($expectation, self::$addGameResultService->addGameResult($game, $winningTeam, $scoreLoosingTeam));
    }

    /**
     * @test
     * @expectedException \OutOfRangeException
     * @dataProvider addGameExpectExceptionDataProvider
     */
    public function addGameExpectException($scoreLoosingTeam)
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


        self::$addGameResultService->addGameResult($game, $teamA, $scoreLoosingTeam);
    }

    /**
     * DataProvider for the addGame test
     */
    public function addGameResultDataProvider()
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

        $return = [];

        foreach(self::$testResults as $index => $testResult) {
            ${'game'.$index}         = clone $game;
            ${'expectedGame'.$index} = clone $expectedGame;

            $return[] = [
                'game'              => ${'game'.$index},
                'winningTeam'       => $teamA,
                'scoreLoosingTeam'  => $testResult['looserScore'],
                'expectation'       => ${'expectedGame'.$index}->setTeamAScore($testResult['winnerScore'])->setTeamBScore($testResult['looserScore'])
            ];
        }

        return $return;
    }

    public function addGameExpectExceptionDataProvider()
    {
        return[
            [
                'scoreLoosingTeam' => -1
            ],
            [
                'scoreLoosingTeam' => 30
            ]
        ];
    }
}