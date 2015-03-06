<?php

namespace AppBundle\Services\MatchScheduling;

use AppBundle\Entity\Player;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Class MatchScheduler
 * @package AppBundle\Services\MatchScheduling
 */
class MatchScheduler
{
    const PLAYERS_PLAYING_PER_MATCH = 4;
    const MAX_NUMBER_PLAYERS = 7;

    /**
     * List of players participating in one round
     * @var ArrayCollection Player[]
     */
    private $playerList = null;

    private $playerCombinations = array();

    private $matchUpsPerCombination = array();

    private $schedule = array();

    public function setPlayerList(ArrayCollection $playerList)
    {
        $this->playerList = $playerList;
    }

    public function schedule()
    {
        if (null === $this->playerList) {
            throw new Exception('Please provide a player list by invoking ' . __CLASS__ . '->setPlayerList()');
        }
        if ($this->playerList->count() < self::PLAYERS_PLAYING_PER_MATCH) {
            throw new Exception('The player list must contain at least ' . self::PLAYERS_PLAYING_PER_MATCH . ' players');
        }
        if ($this->playerList->count() > self::MAX_NUMBER_PLAYERS) {
            throw new Exception('The player list must not contain more than ' . self::MAX_NUMBER_PLAYERS . ' players');
        }

        $this->getAllPlayerCombinations($this->playerList, self::PLAYERS_PLAYING_PER_MATCH);

        #shuffle($this->playerCombinations);
        $this->spreadBreaks();

        foreach($this->playerCombinations as $combination) {
            $this->matchUpsPerCombination[] = $this->getMatchesPerCombination($combination);
        }

        $this->populateSchedule();

        // When having not enough matches within the schedule - re-attach the schedule until the desired number of
        // minimum matches is reached
        while(count($this->schedule) < 20 ) {
            $this->populateSchedule();
        }

        foreach($this->schedule as $match) {
            $this->dumpMatchUp($match);
        }
    }

    /**
     * Retrieves all player combinations for match setups
     *
     * @param ArrayCollection $n Complete set of all available players
     * @param integer $k
     */
    private function getAllPlayerCombinations(ArrayCollection $n, $k)
    {

        $result = array();
        for ($i = 0; $i < $k; $i++) {
            $result[] = null;
        }

        $this->returnAllCombinationsOfKElementsFromN($n, $k, 0, $result);

    }


    /**
     * Returns all unordered and unique combinations of k elements out of a set of n completely available elements.
     *
     * @param ArrayCollection $n All available elements
     * @param integer $k Number of desired elements to be combined
     * @param integer $draw This is the number of draws already performed
     * @param array $drawnKs Contains the already drawn elements (k)
     */
    private function returnAllCombinationsOfKElementsFromN(ArrayCollection $n, $k, $draw, $drawnKs)
    {
        if ($k === 0) {
            $this->playerCombinations[] = $drawnKs;
            return;
        }
        for ($i = $draw; $i <= (count($n) - $k); $i++) {
            $countDrawnKs = count($drawnKs);
            $drawnKs[$countDrawnKs - $k] = $n->get($i);
            $this->returnAllCombinationsOfKElementsFromN($n, $k - 1, $i + 1, $drawnKs);
        }
    }


    private function spreadBreaks() {


        foreach($this->playerCombinations as $combi) {

            $allPlayers = clone $this->playerList;

            foreach($combi as $playerPlaying) {
                $playerPlaying->getId();

                foreach($allPlayers as $index => $player2Remove) {
                    if($player2Remove->getId() === $playerPlaying->getId()) {
                        echo $player2Remove->getName() . ' ';
                        $allPlayers->remove($index);
                    }
                }

            }

            echo ' Pause für -> ';

            foreach ($allPlayers as $breakPlayer) {
                echo $breakPlayer->getName() . ' ';
            }

            echo '<br />';
        }
    }


    /**
     * Assigns a group of 4 players randomly to all three possible double pairing combinations
     *
     * A & B vs. C & D
     * A & C vs. B & D
     * A & D vs. B & C
     *
     * @param array $players
     * @return array
     */
    private function getMatchesPerCombination($players)
    {
        shuffle($players);

        $randomizedPlayer2PositionAssociation = array(
            'a' => array_shift($players),
            'b' => array_shift($players),
            'c' => array_shift($players),
            'd' => array_shift($players));

        $result = array(
            array($randomizedPlayer2PositionAssociation['a'], $randomizedPlayer2PositionAssociation['b'], $randomizedPlayer2PositionAssociation['c'], $randomizedPlayer2PositionAssociation['d']),
            array($randomizedPlayer2PositionAssociation['a'], $randomizedPlayer2PositionAssociation['c'], $randomizedPlayer2PositionAssociation['b'], $randomizedPlayer2PositionAssociation['d']),
            array($randomizedPlayer2PositionAssociation['a'], $randomizedPlayer2PositionAssociation['d'], $randomizedPlayer2PositionAssociation['b'], $randomizedPlayer2PositionAssociation['c'])
        );

        return $result;
    }


    private function populateSchedule() {
        for ($i = 0; $i < 3; $i++) {
            foreach($this->matchUpsPerCombination as $matchUps) {
                $this->schedule[] = $matchUps[$i];
            }
        }
    }


    private function dumpMatchUp($match) {

            $player1 = array_shift($match);
            $player2 = array_shift($match);
            $player3 = array_shift($match);
            $player4 = array_shift($match);
            echo $player1->getName() . ' & ' . $player2->getName() . ' vs. ' . $player3->getName() . ' & ' . $player4->getName() . '<br/>';

    }
}
