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

        $this->getAllCombinations($this->playerList->get(0), $this->playerList->get(1), $this->playerList->get(2), $this->playerList->get(3));
    }

    private function getAllCombinations(Player $player1, Player $player2, Player $player3, Player $player4) {

        /**
         * @todo Either find a working combination generator or implement on yourself
         */
        $test = array($player1, $player2, $player3, $player4);
        shuffle($test);

        echo $player1->getId() . ' => ' . $player1->getName() . '<br/>';
        echo $player2->getId() . ' => ' . $player2->getName() . '<br/>';
        echo $player3->getId() . ' => ' . $player3->getName() . '<br/>';
        echo $player4->getId() . ' => ' . $player4->getName() . '<br/>';

        echo '<br/><br/>';

        foreach($test as $shuffledPlayer) {
            echo $shuffledPlayer->getId() . ' => ' . $shuffledPlayer->getName() . '<br/>';
        }
    }
}
