<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\CreateScheduleForm;
use AppBundle\Form\AddGameForm;
use AppBundle\Entity\Game;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }

    public function resultsAction()
    {
        return $this->render('AppBundle:Default:results.html.twig', $this->get('app.round_results')->findByLastRound() );
    }

    public function rankingAction()
    {
        return $this->render('AppBundle:Default:ranking.html.twig', $this->get('app.round_ranking')->findByLastRound() );
    }

    public function schedulingAction(Request $request)
    {
        $form = $this->createForm(new CreateScheduleForm());

        $form->handleRequest($request);

        return $this->render('AppBundle:Default:scheduling.html.twig', array('form' => $form->createView()));
    }

    public function addGameAction(Request $request)
    {
        $form = $this->createForm(new AddGameForm());

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em         = $this->getDoctrine()->getManager();
            $teamRepo   = $em->getRepository('AppBundle:Team');
            $teamA      = $teamRepo->findByPlayerIds($form->get('pata')->getData()->getId(), $form->get('pbta')->getData()->getId());
            $teamB      = $teamRepo->findByPlayerIds($form->get('patb')->getData()->getId(), $form->get('pbtb')->getData()->getId());

            $round = $em->find('AppBundle\Entity\Round', 2);

            $game = new Game();
            $game->setGames2TeamA($teamA);
            $game->setGames2TeamB($teamB);
            $game->setTeamAScore(21);
            $game->setTeamBScore(23);
            $game->setRound($round);

            $em->persist($game);
            $em->flush();

        }

        return $this->render('AppBundle:Default:add_game.html.twig', array('form' => $form->createView()));
    }
}