<?php

namespace Model;

class Lesson
{
    /** @var  int */
    private $id;

    /** @var  sting */
    private $name;

    /** @var  int */
    private $level;

    /** @var  int */
    private $position;

    /** @var  int */
    private $trainingId;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return sting
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $position
     */
    public function setPostion($position)
    {
        $this->position = $position;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $trainingId
     */
    public function setTrainingId($trainingId)
    {
        $this->trainingId = $trainingId;
    }

    /**
     * @return int
     */
    public function getTrainingId()
    {
        return $this->trainingId;
    }
}