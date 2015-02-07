<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        // temporarily abuse this controller to see if this all works
        $roundRepo = $em->getRepository('AppBundle:Round');

        $games  = $roundRepo->findLastRoundGames();
        $date   = \DateTime::createFromFormat('Y-m-d', $games[0]['date'] );

        return $this->render('AppBundle:Default:index.html.twig', array('date' => $date->format('d.m.y'), 'games' => $games ));
    }
}