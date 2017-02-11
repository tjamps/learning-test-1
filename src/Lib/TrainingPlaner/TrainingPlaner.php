<?php

namespace Lib\TrainingPlaner;

use Model\Session;
use Model\Training;

class TrainingPlaner
{
    /**
     * @param Training $training
     * @param int $nbPartner
     * @param \DateTime|null $date
     * @return Session
     */
    protected function createSession(Training $training, $nbPartner, \DateTime $date = null)
    {
        $date = ($date) ?: $this->generateDate();

        $session = new Session();
        $session->setTraining($training);
        $session->setMaxPartners($nbPartner);
        $session->setDate($date);

        return $session;
    }

    /**
     * @return \DateTime
     */
    protected function generateDate()
    {
        return new \DateTime('now');
    }
}