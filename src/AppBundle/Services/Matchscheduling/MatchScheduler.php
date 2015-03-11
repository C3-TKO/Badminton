<?php

namespace AppBundle\Services\MatchScheduling;

use AppBundle\Entity\Game;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Class MatchScheduler
 * @package AppBundle\Services\MatchScheduling
 */
class MatchScheduler
{
    const PLAYERS_PLAYING_PER_MATCH         = 4;
    const MAX_NUMBER_PLAYERS                = 7;
    const AVERAGE_NUMBER_OF_GAMES_PER_ROUND = 12;

    /**
     * List of players participating in one round
     * @var ArrayCollection Player[]
     */
    private $playerList = null;


    private $playerCombinations = array();

    private $matchUpsPerCombination = array();

    /**
     * @var ArrayCollection Game[]
     */
    private $schedule = null;

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
        $this->em       = $em;
        $this->schedule = new ArrayCollection();
    }

    
    /**
     * Creates a schedule for a given collection of players
     *
     * @param ArrayCollection $playerList Player[]
     * @return ArrayCollection Game[]
     */
    public function schedule(ArrayCollection $playerList)
    {
        $this->setPlayerList($playerList);
        $this->getAllPlayerCombinations($this->playerList, self::PLAYERS_PLAYING_PER_MATCH);

        shuffle($this->playerCombinations);

        #$this->listBreakingPlayers();

        for($i = 1; $i < count($this->playerList); $i++) {
            $this->spreadBreaks();
            /*
            echo '----- Durchgang ' . $i . ': -----<br />';
            $this->listBreakingPlayers();
            */
        }

        foreach($this->playerCombinations as $combination) {
            $this->matchUpsPerCombination[] = $this->getMatchesPerCombination($combination);
        }

        $this->populateSchedule();

        /*
        foreach($this->schedule as $match) {
            echo $match . '<br />';
        }
        */

        return $this->schedule;
    }


    /**
     * Sets the player list and performs some checks
     *
     * @param ArrayCollection $playerList
     */
    private function setPlayerList(ArrayCollection $playerList) {
        if (null === $playerList) {
            throw new Exception('Please provide a player list by invoking ' . __CLASS__ . '->setPlayerList()');
        }
        if ($playerList->count() < self::PLAYERS_PLAYING_PER_MATCH) {
            throw new Exception('The player list must contain at least ' . self::PLAYERS_PLAYING_PER_MATCH . ' players');
        }
        if ($playerList->count() > self::MAX_NUMBER_PLAYERS) {
            throw new Exception('The player list must not contain more than ' . self::MAX_NUMBER_PLAYERS . ' players');
        }

        $this->playerList = $playerList;
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


    /**
     * Tries to spread out the breaks for all players
     */
    private function spreadBreaks() {

        reset($this->playerCombinations);
        $maxConsecutiveBreaks = count($this->getPlayersInBreak(current($this->playerCombinations)));

        $breaks = array();
        foreach($this->playerList as $player) {
            $breaks[$player->getId()] = 0;
        }

        $countPlayerCombinations = count($this->playerCombinations);

        for($i = 0; $i < $countPlayerCombinations; $i++) {
            $breakers = $this->getPlayersInBreak($this->playerCombinations[$i]);

            $temp = array();
            foreach($breakers as $breaker) {
                $temp[] = $breaker->getId();
            }

            foreach($breaks as $key => &$break) {
                if(in_array($key, $temp)) {
                    $break++;
                }
                else {
                    $break = 0;
                }
            }

            // Looking for a max con violation
            foreach($breaks as $break) {
                if($break > $maxConsecutiveBreaks) {
                    $this->swapCombination($this->playerCombinations[$i]);

                    // Resetting the consecutive counters
                    array_walk($breaks, function (&$value) { $value = 0;});
                }
            }
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
        #shuffle($players);

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


    /**
     * Populates a schedule of games
     */
    private function populateSchedule() {
        while(count($this->schedule) <= round(self::AVERAGE_NUMBER_OF_GAMES_PER_ROUND * 1.2) ) {
            for ($i = 0; $i < 3; $i++) {
                foreach($this->matchUpsPerCombination as $matchUps) {
                    $game       = new Game();
                    $teamRepo   = $this->em->getRepository('AppBundle:Team');
                    $teamA      = $teamRepo->findByPlayers(array_pop($matchUps[$i]), array_pop($matchUps[$i]));
                    $teamB      = $teamRepo->findByPlayers(array_pop($matchUps[$i]), array_pop($matchUps[$i]));
                    $game->setTeamA($teamA);
                    $game->setTeamB($teamB);
                    $this->schedule->add($game);
                }
            }
        }
    }


    /**
     * Gets all players that are having a break during the match of the given combination
     *
     * @param   array                       $combination
     * @return  ArrayCollection Player[]
     */
    private function getPlayersInBreak($combination) {
        $breakingPlayers = clone $this->playerList;

        foreach($combination as $playerPlaying) {
            $playerPlaying->getId();

            foreach($breakingPlayers as $index => $player2Remove) {
                if($player2Remove->getId() === $playerPlaying->getId()) {
                    $breakingPlayers->remove($index);
                }
            }

        }

        return $breakingPlayers;
    }


    private function listBreakingPlayers() {

        foreach($this->playerCombinations as $combination) {

            $breakingPlayers = $this->getPlayersInBreak($combination);

            echo ' Pause für -> ';

            foreach ($breakingPlayers as $breakingPlayer) {
                echo $breakingPlayer->getName() . ' ';
            }

            echo '<br />';
        }
    }


    private function swapCombination($combinationToSwap) {



        // Finding index of the combination to swap
        foreach($this->playerCombinations as $key => $combination) {
            if ($combination === $combinationToSwap) {

                $topHalf    = $this->getBreakIndexForCombinationInArray($combinationToSwap, 0, 7);
                $bottomHalf = $this->getBreakIndexForCombinationInArray($combinationToSwap, 7, 7);

                unset($this->playerCombinations[$key]);

                #var_dump($topHalf, $bottomHalf);

                if ($topHalf > $bottomHalf) {
                    $this->playerCombinations = array_reverse($this->playerCombinations);
                    #var_dump('reverse');
                    #$this->listBreakingPlayers();
                    #die();
                }

                array_unshift($this->playerCombinations, $combinationToSwap);

                if ($topHalf > $bottomHalf) {
                    $this->playerCombinations = array_reverse($this->playerCombinations);
                }
                break;
            }
        }
    }


    /**
     * This method sums up all occurrences of breaks for either one of the players of a given combination within a range
     * ol the list of combinations. This sum will be referred to as BreakIndex
     *
     * @param $combination
     * @param $combinationSubSetOffset
     * @param $combinationSubSetLength
     * @return int
     */
    private function getBreakIndexForCombinationInArray($combination, $combinationSubSetOffset, $combinationSubSetLength) {

        // Get players for the BreakIndex
        $breakingPlayers    = $this->getPlayersInBreak($combination);
        $breakDex           = 0;

        // Traversing the specified subset of combinations
        for($i = 0; $i < $combinationSubSetLength; $i++) {

            $subSetBreakingPlayers = $this->getPlayersInBreak($this->playerCombinations[$i + $combinationSubSetOffset]);

            // Checking if one of the breaking players is having another break within the combination subset.
            foreach ($subSetBreakingPlayers as $subSetBreakingPlayer) {
                foreach($breakingPlayers as $breakingPlayer) {
                    if ($breakingPlayer === $subSetBreakingPlayer) {
                        $breakDex++;
                    }
                }
            }
        }

        return $breakDex;
    }
}
