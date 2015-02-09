<?php

namespace AppBundle\PartialData;

use Doctrine\ORM\EntityManager;

abstract class AbstractPartialData
{
    protected $em = null;

    public function __construct( EntityManager $em ) {
        $this->setEM( $em );
    }

    public function getPartialData($parameters = array())
    {
        return array();
    }

    protected function setEM(EntityManager $em) {
        $this->em = $em;
    }
}