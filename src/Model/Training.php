<?php

namespace Model;

class Training
{
    /** @var  int */
    private $id;

    /** @var  string */
    private $name;

    /** @var  array */
    private $lessons;

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getLessons()
    {
        return $this->lessons;
    }

    /**
     * @param int $lessonId
     * @return Lesson|null
     */
    public function getLesson($lessonId)
    {
        return (array_key_exists($lessonId, $this->lessons)) ? $this->lessons[$lessonId] : null;
    }

    /**
     * @param Lesson $lesson
     * @throws \Exception
     */
    public function addLesson(Lesson $lesson)
    {
        if (array_key_exists($lesson->getId(), $this->lessons)) {
            throw new \Exception('this lesson already exists');
        }

        $this->lessons[$lesson->getId()] = $lesson;
    }

    /**
     * @param int $lessonId
     * @throws \Exception
     */
    public function removeLesson($lessonId)
    {
        if (!array_key_exists($lessonId, $this->lessons)) {
            throw new \Exception('this lesson does not exists');
        }

        unset($this->lessons[$lessonId]);
    }
}