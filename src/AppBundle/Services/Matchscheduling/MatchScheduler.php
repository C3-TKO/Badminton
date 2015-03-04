<?php

namespace AppBundle\Services\MatchScheduling;

use AppBundle\Entity\Player;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class RoundResults
 * @package AppBundle\Services
 */
class MatchScheduler
{
    /**
     * @var ArrayCollection Player[]
     */
    private $playerList = array();

    public function setPlayerList( ArrayCollection $playerList ) {
        $this->playerList = $playerList;
    }

    public function schedule()
    {
        if ($this->playerList->count() !== 4) {
            throw new \Exception('Aktuell kann nur für 4 Spieler ein Spielplan erstellt werden!');
        }

        $test = $this->assign4PlayerMatches($this->playerList->get(0), $this->playerList->get(1), $this->playerList->get(2), $this->playerList->get(3));

        /*
        foreach($test as $match) {
            $player1 = array_shift($match);
            $player2 = array_shift($match);
            $player3 = array_shift($match);
            $player4 = array_shift($match);
            echo $player1->getName(). ' & ' .$player2->getName(). ' vs. '.$player3->getName(). ' & '. $player4->getName().'<br/>';
        }
        */
    }

    /**
     * Assigns a group of 4 players randomly to all three possible double pairing combinations
     *
     * A & B vs. C & D
     * A & C vs. B & D
     * A & D vs. B & C
     *
     * @param Player $player1
     * @param Player $player2
     * @param Player $player3
     * @param Player $player4
     * @return array
     */
    private function assign4PlayerMatches(Player $player1, Player $player2, Player $player3, Player $player4) {


        $shuffledPlayers = array($player1, $player2, $player3, $player4);
        shuffle($shuffledPlayers);

        $randomizedPlayer2PositionAssociation = array(
                                                'a' => array_shift($shuffledPlayers),
                                                'b' => array_shift($shuffledPlayers),
                                                'c' => array_shift($shuffledPlayers),
                                                'd' => array_shift($shuffledPlayers));

        $result = array(
            array($randomizedPlayer2PositionAssociation['a'], $randomizedPlayer2PositionAssociation['b'],$randomizedPlayer2PositionAssociation['c'],$randomizedPlayer2PositionAssociation['d']),
            array($randomizedPlayer2PositionAssociation['a'], $randomizedPlayer2PositionAssociation['c'],$randomizedPlayer2PositionAssociation['b'],$randomizedPlayer2PositionAssociation['d']),
            array($randomizedPlayer2PositionAssociation['a'], $randomizedPlayer2PositionAssociation['d'],$randomizedPlayer2PositionAssociation['b'],$randomizedPlayer2PositionAssociation['c'])
        );

        return $result;
    }
}
