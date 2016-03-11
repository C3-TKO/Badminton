<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\CreateScheduleForm;
use AppBundle\Entity\Round;


/**
 * Class ScheduleController
 *
 * @package AppBundle\Controller
 */
class ScheduleController extends Controller
{
    /**
     * Handles the scheduling main requests:
     * - Loading a schedule from session
     * - Displaying the player selection form
     * - Rendering the a schedule after successfully entering a player selection
     *
     * @TODO: Refactor this action into single responsible actions
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function schedulingAction(Request $request)
    {
        $session = $this->container->get('session');

        // Trying to resume a schedule from session
        if ($session->get('schedule') !== null) {
            $schedule = $this->get('app.schedule_normalizer')->normalize($session->get('schedule'));

            return $this->render('AppBundle:Schedule:scheduling_result.html.twig');
        }

        $form = $this->createForm(CreateScheduleForm::class);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $matchMaker = $this->get('app.match_scheduler');
            $schedule   = $matchMaker->schedule($form->get('player_list')->getData());

            $session->set('schedule', $this->get('app.schedule_serializer')->serialize($schedule));

            return $this->render('AppBundle:Schedule:scheduling_result.html.twig');
        }

        return $this->render('AppBundle:Schedule:scheduling_form.html.twig', array('form' => $form->createView()));
    }


    /**
     * Resets the schedule stored in the session and redirects to the form for player selection
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function scheduleAction()
    {
        $session = $this->container->get('session');
        $session->remove('schedule');

        return $this->redirect($this->generateUrl('scheduling'));
    }


    /**
     * Loads the schedule. Will be called asynchronously via AJAX. Delivers DOM elements that describe the schedule.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loadAction() {
        $session    = $this->container->get('session');
        $schedule   = $this->get('app.schedule_normalizer')->normalize($session->get('schedule'));

        return $this->render('AppBundle:Schedule:schedule.html.twig', array('schedule' => $schedule));
    }


    /**
     * Updates the schedule by adding a games score
     *
     * @param $index        Identifies the game within the schedule
     * @param $teamAScore   Score of team a
     * @param $teamBScore   Score of team b
     * @return JsonResponse
     */
    public function updateAction($index, $teamAScore, $teamBScore)
    {
        $session    = $this->container->get('session');
        $schedule   = $this->get('app.schedule_normalizer')->normalize($session->get('schedule'));
        $game       = $schedule->get($index - 1);
        $em         = $this->getDoctrine()->getManager();
        $roundRepo  = $em->getRepository('AppBundle:Round');
        $date       = new \DateTime();
        $round      = $roundRepo->findOneBy(array('date' => $date));

        if (null === $round) {
            $season = $round = $em->find('AppBundle\Entity\Season', $this->container->getParameter('current_season'));
            $round  = new Round();
            $round->setDate($date);
            $round->setSeason($season);

            $em->persist($round);
            $em->flush();
        }

        $game->setTeamAScore($teamAScore);
        $game->setTeamBScore($teamBScore);
        $game->setRound($round);

        $em->persist($game);
        $em->flush();

        $schedule->set($index -1, $game);

        $session->set('schedule', $this->get('app.schedule_serializer')->serialize($schedule));

        return $response = new JsonResponse(true);
    }


    /**
     * Flushes the schedule from session
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function flushAction()
    {
        $session = $this->container->get('session');
        $session->remove('schedule');

        return $this->redirect($this->generateUrl('scheduling'));
    }
}