<?php

namespace AppBundle\PartialData;

class PartialDataFactory
{
    const ROUND_RESULTS = 'round_results';

    public function __construct( $em) {
        $this->em = $em;
    }

    public function getPartialDataByPath($partialPath)
    {
        switch($partialPath) {
            case self::ROUND_RESULTS:
                $partialDataObject = new RoundResults($this->em);
                break;
            default:
                throw new Exception ('Unknown Partial');
        }

        return $partialDataObject->getPartialData();
    }
}