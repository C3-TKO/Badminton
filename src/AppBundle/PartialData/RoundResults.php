<?php

namespace AppBundle\PartialData;

class RoundResults extends AbstractPartialData
{
    public function getPartialData($parameters = array())
    {
        $gameRepo       = $this->em->getRepository('AppBundle:Game');
        $roundRepo      = $this->em->getRepository('AppBundle:Round');
        $lastRoundId    = $roundRepo->findLatestId();
        $games          = $gameRepo->findByRoundId($lastRoundId);
        $date           = \DateTime::createFromFormat('Y-m-d', $games[0]['date']);

        return array('date' => $date->format('d.m.y'), 'games' => $games);
    }
}