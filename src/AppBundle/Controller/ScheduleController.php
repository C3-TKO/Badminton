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

            return $this->render('AppBundle:Default:scheduling_result.html.twig');
        }

        $form = $this->createForm(new CreateScheduleForm());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $matchMaker = $this->get('app.match_scheduler');
            $schedule   = $matchMaker->schedule($form->get('player_list')->getData());

            $session->set('schedule', $this->get('app.schedule_serializer')->serialize($schedule));

            return $this->render('AppBundle:Default:scheduling_result.html.twig');
        }

        return $this->render('AppBundle:Default:scheduling_form.html.twig', array('form' => $form->createView()));
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
        $session = $this->container->get('session');

        $schedule = $this->get('app.schedule_normalizer')->normalize($session->get('schedule'));

        return $this->render('AppBundle:Default:schedule.html.twig', array('schedule' => $schedule));
    }

    /**
     * @TODO Assign preliminary ids to games of the schedule. These ids are not to be persisted. They will be used to reference games in the schedule while updating them with a real id from the database
     */

    /**
     * Adds a score for one game of the schedule
     *
     * @param $teamA
     * @param $teamB
     * @param $teamAScore
     * @param $teamBScore
     * @return JsonResponse
     */
    public function addScoreAction($teamA, $teamB, $teamAScore, $teamBScore)
    {
        $em         = $this->getDoctrine()->getManager();
        $teamRepo   = $em->getRepository('AppBundle:Team');
        $roundRepo  = $em->getRepository('AppBundle:Round');
        $teamA      = $teamRepo->find($teamA);
        $teamB      = $teamRepo->find($teamB);
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
     * Updates the schedule stored within the session by adding one games score and assigning the id from the
     * persistance layer
     *
     * @TODO: Implement properly
     *
     * @param Game $game
     */
    private function updateAction(Game $game) {
        $session    = $this->container->get('session');
        $schedule   = $session->get('schedule');


    }
}