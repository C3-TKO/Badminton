<?php

namespace AppBundle\Services\MatchScheduler;
use AppBundle\Entity\Player;

/**
 * Class RoundResults
 * @package AppBundle\Services
 */
class MatchScheduler
{
    /**
     * @var Player[]
     */
    private $playerList = array();

    public function addPlayer( Player $player ) {
        $this->playerList[] = $player;
    }

    public function schedule() {

    }
}
