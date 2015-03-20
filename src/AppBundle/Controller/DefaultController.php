<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\CreateScheduleForm;
use AppBundle\Form\AddGameForm;
use AppBundle\Entity\Game;
use AppBundle\Entity\Season;
use AppBundle\Entity\Round;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }

    public function resultsAction($idRound = null)
    {
        $resultsService             = $this->get('app.round_results');
        $pagination['pagination']   = $resultsService->getPaginationBoundaries();

        if (null === $idRound) {
            $pagination['pagination']['current']    = $pagination['pagination']['max'];
            $twigVars                               = array_merge($pagination, $resultsService->findByLastRound());
        }
        else {
            $pagination['pagination']['current']    = $idRound;
            $twigVars                               = array_merge($pagination, $resultsService->findByRoundId($idRound));
        }

        return $this->render('AppBundle:Default:results.html.twig', $twigVars);
    }

    public function rankingAction($idRound = null)
    {
        $rankingService             = $this->get('app.round_ranking');
        $pagination['pagination']   = $rankingService->getPaginationBoundaries();

        if (null === $idRound) {
            $pagination['pagination']['current']    = $pagination['pagination']['max'];
            $twigVars                               = array_merge($pagination, $rankingService->findByLastRound());
        }
        else {
            $pagination['pagination']['current']    = $idRound;
            $twigVars                               = array_merge($pagination, $rankingService->findByRoundId($idRound));
        }

        return $this->render('AppBundle:Default:ranking.html.twig', $twigVars);
    }

    public function schedulingAction(Request $request)
    {
        $form = $this->createForm(new CreateScheduleForm());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $matchMaker = $this->get('app.match_scheduler');
            $schedule   = $matchMaker->schedule($form->get('player_list')->getData());

            return $this->render('AppBundle:Default:scheduling_result.html.twig', array('schedule' => $schedule));
        }

        return $this->render('AppBundle:Default:scheduling_form.html.twig', array('form' => $form->createView()));
    }

    public function addGameAction(Request $request)
    {
        $form = $this->createForm(new AddGameForm());
        $game = null;

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em         = $this->getDoctrine()->getManager();
            $teamRepo   = $em->getRepository('AppBundle:Team');
            $roundRepo  = $em->getRepository('AppBundle:Round');
            $teamA      = $teamRepo->findByPlayers($form->get('pata')->getData(), $form->get('pbta')->getData());
            $teamB      = $teamRepo->findByPlayers($form->get('patb')->getData(), $form->get('pbtb')->getData());
            $date       = $form->get('date')->getData();
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
            $game->setTeamAScore($form->get('score_team_a')->getData());
            $game->setTeamBScore($form->get('score_team_b')->getData());
            $game->setRound($round);

            $em->persist($game);
            $em->flush();
        }

        return $this->render('AppBundle:Default:add_game.html.twig', array('form' => $form->createView(), 'game' => $game ));
    }
}