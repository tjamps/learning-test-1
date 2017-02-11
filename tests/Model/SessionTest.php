<?php

namespace test\Model;

use Model\Session;
use Model\Training;
use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    /** @var Session */
    private $session;

    /** @var  \ReflectionClass */
    private $reflectionClass;

    /** {@inheritdoc} */
    public function setUp()
    {
        $this->session = new Session;
        $this->reflectionClass = new \ReflectionClass($this->session);
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
        $property->setValue($this->session, $value);
    }

    /**
     * test getId
     */
    public function testGetId()
    {
        $this->prepareProperty('id', 42);

        $this->assertSame(42, $this->session->getId());
    }

    /**
     * @dataProvider sessionProvider
     */
    public function testGetter($property, $value)
    {
        $this->prepareProperty($property, $value);

        $getter = 'get' . ucfirst($property);

        $this->assertSame($value, $this->session->$getter());
    }

    /**
     * @dataProvider sessionProvider
     */
    public function testSetter($setterName, $value)
    {
        $setter = 'set' . ucfirst($setterName);

        $this->session->$setter($value);

        $this->assertAttributeSame($value, $setterName, $this->session);
    }

    /**
     * @return array
     */
    public function sessionProvider()
    {
        $date = new \DateTime('now');

        return [
            ['training', new Training],
            ['maxPartners', 12],
            ['date', $date],
        ];
    }
}
