<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Game;
use AppBundle\Entity\Round;
use Symfony\Component\HttpFoundation\JsonResponse;

class AJAXController extends Controller
{
    public function addGameAction($teamA, $teamB, $teamAScore, $teamBScore)
    {
        $em         = $this->getDoctrine()->getManager();
        $teamRepo   = $em->getRepository('AppBundle:Team');
        $roundRepo  = $em->getRepository('AppBundle:Round');
        $teamA      = $teamRepo->find($teamA);
        $teamB      = $teamRepo->find($teamB);
        $date       = new \DateTime();
        $round      = $roundRepo->findOneBy(array('date' => $date));

        if( null === $round ) {
            $season = $round = $em->find('AppBundle\Entity\Season', $this->container->getParameter('current_season'));
            $round = new Round();
            $round->setDate($date);
            $round->setSeason($season);

            $em->persist($round);
            $em->flush();
        }

        $game = new Game();
        $game->setTeamA($teamA);
        $game->setTeamB($teamB);
        $game->setTeamAScore($teamAScore);
        $game->setTeamBScore($teamBScore);
        $game->setRound($round);

        $em->persist($game);
        $em->flush();

        return $response = new JsonResponse($game->getId());
    }

    /**
     * Adds a game result to the current sessions gameday
     *
     * @param int $idTeamA      The identifier for the first of the both competing teams
     * @param int $idTeamB      The identifier for the first of the both competing teams
     * @param int $idWinnerTeam The identifier for the team that won this game
     * @param int $looserScore  The score of the loosiong team
     */
    public function addGameResultAction($idTeamA, $idTeamB, $idWinnerTeam, $looserScore) {
        // Call some new service
        // return something to javascript;
    }
}