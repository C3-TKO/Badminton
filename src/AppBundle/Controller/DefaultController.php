<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig',
            $this->get('app.partial_data_factory')->getPartialDataByPath( 'round_results' )
        );
    }
}