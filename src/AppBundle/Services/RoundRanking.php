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

    /**
     * @var array
     */
    private $playerStats = array();



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
            $this->playerStats[$player['id']]['id']           = $player['id'];
            $this->playerStats[$player['id']]['name']         = $player['name'];
            $this->playerStats[$player['id']]['games_played'] = 0;
            $this->playerStats[$player['id']]['games_won']    = 0;
        }

        foreach($games as $game) {
            $idPlayerATeamA = $game['id_player_a_team_a'];
            $idPlayerBTeamA = $game['id_player_b_team_a'];
            $idPlayerATeamB = $game['id_player_a_team_b'];
            $idPlayerBTeamB = $game['id_player_b_team_b'];
            $this->playerStats[$idPlayerATeamA]['games_played']++;
            $this->playerStats[$idPlayerBTeamA]['games_played']++;
            $this->playerStats[$idPlayerATeamB]['games_played']++;
            $this->playerStats[$idPlayerBTeamB]['games_played']++;

            if ( $game['team_a_score'] > $game['team_b_score']) {
                $this->playerStats[$idPlayerATeamA]['games_won']++;
                $this->playerStats[$idPlayerBTeamA]['games_won']++;
            }
            else {
                $this->playerStats[$idPlayerATeamB]['games_won']++;
                $this->playerStats[$idPlayerBTeamB]['games_won']++;
            }
        }

        $this->calculateRatio();
        $this->sortByGamesWon();

        $date = \DateTime::createFromFormat('Y-m-d', $games[0]['date']);

        return array('date' => $date->format('d.m.y'), 'ranking' => $this->ranking);
    }

    /**
     * @return int
     */
    public function findByLastRound()
    {
        $roundRepo = $this->em->getRepository('AppBundle:Round');

        return $this->findByRoundId($roundRepo->findLatestId());
    }


    /**
     * Sorts the return array by number of won games
     */
    private function sortByGamesWon() {
        Foreach($this->playerStats as $playerStatsKey => $playerStatsValue) {
            $this->ranking[$playerStatsKey] = $playerStatsValue['games_won'];
        }

        arsort($this->ranking);

        foreach($this->ranking as $key => &$value ) {
            $value = $this->playerStats[$key];
        }
    }

    /**
     * Calculates the ration of won games over played games
     */
    private function calculateRatio() {
        foreach($this->playerStats as &$playerStat) {
            $playerStat['win_ratio'] = round( ( ( $playerStat['games_won'] / $playerStat['games_played'] ) * 100), 2);
        }
    }
}