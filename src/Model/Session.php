<?php

namespace Model;

class Session
{
    /** @var  int */
    private $id;
    
    /** @var  DateTime */
    private $date;

    /** @var  Training */
    private $training;

    /** @var  int */
    private $maxPartners;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param Training $training
     */
    public function setTraining(Training $training)
    {
        $this->training = $training;
    }

    /**
     * @return Training
     */
    public function getTraining()
    {
        return $this->training;
    }

    /**
     * @param int $maxPartners
     */
    public function setMaxPartners($maxPartners)
    {
        $this->maxPartners = $maxPartners;
    }

    /**
     * @return int
     */
    public function getMaxPartners()
    {
        return $this->maxPartners;
    }
}