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


    /**
     * Resets the schedule stored in the session and redirects to the form for player selection
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function scheduleResetAction()
    {
        $session = $this->getRequest()->getSession();
        $session->remove('schedule');

        return $this->redirect($this->generateUrl('scheduling'));
    }
}