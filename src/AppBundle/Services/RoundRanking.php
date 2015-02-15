<?php

namespace AppBundle\Services;
use Doctrine\ORM\EntityManager;

/**
 * Class RoundResults
 * @package AppBundle\Services
 */
class RoundRanking
{
    /**
     * @var \Doctrine\ORM\EntityManager|null
     */
    private $em = null;

    /**
     * @var array
     */
    private $ranking = array();

    public function __construct( EntityManager $em ) {
        $this->em = $em;
    }

    /**
     * @param $id    Identifies a round id
     * @return array Contains all game data of one round
     */
    public function findByRoundId($id)
    {
        $playerRepo     = $this->em->getRepository('AppBundle:Player');
        $gameRepo       = $this->em->getRepository('AppBundle:Game');
        $players        = $playerRepo->findByRoundId($id);
        $games          = $gameRepo->findByRoundId($id);

        foreach($players as $player) {
            $this->ranking[$player['id']]['name']         = $player['name'];
            $this->ranking[$player['id']]['games_played'] = 0;
            $this->ranking[$player['id']]['games_won']    = 0;
        }

        foreach($games as $game) {
            $idPlayerATeamA = $game['id_player_a_team_a'];
            $idPlayerBTeamA = $game['id_player_b_team_a'];
            $idPlayerATeamB = $game['id_player_a_team_b'];
            $idPlayerBTeamB = $game['id_player_b_team_b'];

            $this->ranking[$idPlayerATeamA]['games_played']++;
            $this->ranking[$idPlayerBTeamA]['games_played']++;
            $this->ranking[$idPlayerATeamB]['games_played']++;
            $this->ranking[$idPlayerBTeamB]['games_played']++;

            if ( $game['team_a_score'] > $game['team_b_score']) {
                $this->ranking[$idPlayerATeamA]['games_won']++;
                $this->ranking[$idPlayerBTeamA]['games_won']++;
            }
            else {
                $this->ranking[$idPlayerATeamB]['games_won']++;
                $this->ranking[$idPlayerBTeamB]['games_won']++;
            }
        }

        $this->calculateRatio();
        $this->sortByGamesWon();

        echo '<pre>';
        var_dump( $this->ranking );
        die();


        return true;
    }

    /**
     * @return int
     */
    public function findByLastRound()
    {
        $roundRepo = $this->em->getRepository('AppBundle:Round');

        return $this->findByRoundId($roundRepo->findLatestId());
    }


    private function sortByGamesWon() {
        return;
    }


    private function calculateRatio() {
        foreach($this->ranking as &$player) {
            $player['win_ratio'] = round( ( ( $player['games_won'] / $player['games_played'] ) * 100), 2);
        }
    }
}