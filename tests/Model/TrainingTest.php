<?php

namespace test\Model;

use Model\Training;
use Model\Lesson;
use PHPUnit\Framework\TestCase;

class TrainingTest extends TestCase
{
    /** @var Training */
    private $training;

    /** @var  \ReflectionClass */
    private $reflectionClass;

    /** {@inheritdoc} */
    public function setUp()
    {
        $this->training = new Training();
        $this->reflectionClass = new \ReflectionClass($this->training);
    }

    /**
     * initialize model property
     *
     * @param string $property
     * @param mixed $value
     */
    private function prepareProperty($property, $value)
    {
        $property = $this->reflectionClass->getProperty($property);
        $property->setAccessible(true);
        $property->setValue($this->training, $value);
    }

    private function prepareLesson()
    {
        $lesson = new Lesson();
        $reflectionClass = new \ReflectionClass($lesson);

        $property = $reflectionClass->getProperty('id');
        $property->setAccessible(true);
        $property->setValue($lesson, 1);

        return $lesson;
    }

    /**
     * test getId
     */
    public function testGetId()
    {
        $this->prepareProperty('id', 42);

        $this->assertSame(42, $this->training->getId());
    }

    /**
     * test getLessons
     */
    public function testGetLessons()
    {
        $this->prepareProperty('lessons', []);

        $this->assertSame([], $this->training->getLessons());
    }

    /**
     * test getLesson with valid number
     */
    public function testGetLessonWithExisingLessonId()
    {
        $this->prepareProperty('lessons', [1 => 'test']);

        $this->assertSame('test', $this->training->getLesson(1));
    }

    /**
     * test getLesson with invalid number
     */
    public function testGetLessonWithoutExistingLessonId()
    {
        $this->prepareProperty('lessons', []);

        $this->assertSame(null, $this->training->getLesson(1));
    }

    /**
     * test add Lesson
     */
    public function testAddLesson()
    {
        $lesson = $this->prepareLesson();
        $this->prepareProperty('lessons', []);

        $this->training->addLesson($lesson);

        $this->assertAttributeSame([$lesson->getId() => $lesson], 'lessons', $this->training);
    }

    /**
     * @throws \Exception
     */
    public function testAddLessonWithExistingLesson()
    {
        $lesson = $this->prepareLesson();
        $this->prepareProperty('lessons', [$lesson->getId() => $lesson]);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('this lesson already exists');

        $this->training->addLesson($lesson);
    }

    /**
     * test remove lesson
     */
    public function testRemoveLesson()
    {
        $lesson = $this->prepareLesson();
        $this->prepareProperty('lessons', [$lesson->getId() => $lesson]);
        
        $this->training->removeLesson($lesson->getId());

        $this->assertAttributeSame([], 'lessons', $this->training);
    }

    /**
     * @throws \Exception
     */
    public function testRemoveLessonWithoutExistingLesson()
    {
        $lesson = $this->prepareLesson();
        $this->prepareProperty('lessons', []);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('this lesson does not exists');

        $this->training->removeLesson($lesson->getId());
    }

    /**
     * @dataProvider trainingProvider
     */
    public function testGetter($property, $value)
    {
        $this->prepareProperty($property, $value);

        $getter = 'get' . ucfirst($property);

        $this->assertSame($value, $this->training->$getter());
    }

    /**
     * @dataProvider trainingProvider
     */
    public function testSetter($setterName, $value)
    {
        $setter = 'set' . ucfirst($setterName);

        $this->training->$setter($value);

        $this->assertAttributeSame($value, $setterName,$this->training);
    }

    /**
     * @return array
     */
    public function trainingProvider()
    {
        return [
            ['name', 'my new name'],
        ];
    }
}
