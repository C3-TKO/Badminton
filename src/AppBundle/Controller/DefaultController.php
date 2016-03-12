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
        $session = $this->getRequest()->getSession();

        // Trying to resume a schedule from session
        if ($session->get('schedule') !== null) {
            $schedule = $this->get('app.schedule_normalizer')->normalize($session->get('schedule'));

            return $this->render('AppBundle:Default:scheduling_result.html.twig', array('schedule' => $schedule));
        }

        $form = $this->createForm(new CreateScheduleForm());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $matchMaker = $this->get('app.match_scheduler');
            $schedule   = $matchMaker->schedule($form->get('player_list')->getData());

            $session->set('schedule', $this->get('app.schedule_serializer')->serialize($schedule));

            return $this->render('AppBundle:Default:scheduling_result.html.twig', array('schedule' => $schedule));
        }

        return $this->render('AppBundle:Default:scheduling_form.html.twig', array('form' => $form->createView()));
    }
}