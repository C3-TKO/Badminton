<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        var_dump( $this->get('app.round_ranking')->findByRoundId(1) );
        return $this->render('AppBundle:Default:index.html.twig', $this->get('app.round_results')->findByLastRound() );
    }
}