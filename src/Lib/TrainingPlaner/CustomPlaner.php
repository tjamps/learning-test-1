<?php

namespace Lib\TrainingPlaner;

use Model\Training;

class CustomPlaner extends TrainingPlaner
{
    /** @var \Model\Session  */
    private $session;

    /**
     * CustomPlaner constructor.
     * 
     * @param Training $training
     * @param int $nbPartners
     */
    public function __construct(Training $training, $nbPartners)
    {
        $this->session = $this->createSession($training, $nbPartners);
    }

    /**
     * @return \Model\Session
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @return \DateTime
     */
    protected function generateDate()
    {
        return new \DateTime('+1 week');
    }
}