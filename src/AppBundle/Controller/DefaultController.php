<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em             = $this->getDoctrine()->getManager();
        $gameRepo       = $em->getRepository('AppBundle:Game');
        $roundRepo      = $em->getRepository('AppBundle:Round');
        $lastRoundId    = $roundRepo->findLatestId();
        $games          = $gameRepo->findByRoundId($lastRoundId);
        $date           = \DateTime::createFromFormat('Y-m-d', $games[0]['date']);

        return $this->render('AppBundle:Default:index.html.twig', array('date' => $date->format('d.m.y'), 'games' => $games));
    }
}