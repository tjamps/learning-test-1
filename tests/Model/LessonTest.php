<?php

namespace test\Model;

use Model\Lesson;
use PHPUnit\Framework\TestCase;

class LessonTest extends TestCase
{
    /** @var Lesson */
    private $lesson;

    /** @var  \ReflectionClass */
    private $reflectionClass;

    /** {@inheritdoc} */
    public function setUp()
    {
        $this->lesson = new Lesson;
        $this->reflectionClass = new \ReflectionClass($this->lesson);
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
        $property->setValue($this->lesson, $value);
    }

    /**
     * test getId
     */
    public function testGetId()
    {
        $this->prepareProperty('id', 42);

        $this->assertSame(42, $this->lesson->getId());
    }

    /**
     * @dataProvider lessonProvider
     */
    public function testGetter($property, $value)
    {
        $this->prepareProperty($property, $value);

        $getter = 'get' . ucfirst($property);

        $this->assertSame($value, $this->lesson->$getter());
    }

    /**
     * @dataProvider lessonProvider
     */
    public function testSetter($setterName, $value)
    {
        $setter = 'set' . ucfirst($setterName);

        $this->lesson->$setter($value);

        $this->assertAttributeSame($value, $setterName, $this->lesson);
    }

    /**
     * @return array
     */
    public function lessonProvider()
    {
        return [
            ['name', 'my new name'],
            ['level', 11],
            ['position', 12],
            ['trainingId', 13],
        ];
    }
}
