<?php

namespace tests\Lib;

use Lib\MyClass;
use Lib\MyFakeClass;
use PHPUnit\Framework\TestCase;

class MyClassTest extends TestCase
{
    /** @var  MyFakeClass */
    private $myFakeClass;

    /** @var  array */
    private $config;

    public function setUp()
    {
        $this->config = [];
        $this->myFakeClass = new MyFakeClass();
    }

    /**
     * @dataProvider myMethodProvider
     */
    public function testMyMethod($key, $value, $expected)
    {
        $this->config[$key] = $value;

        $myClass = $this->init();
        $result = $myClass->myMethod($key);

        $this->assertSame($expected, $result);
    }

    public function myMethodProvider()
    {
        return [
            ['link', 'value', 'value'],
            [null, null, null],
            ['morgan', 'morgan', 'gros mégalo'],
        ];
    }

    private function init()
    {
        return new Myclass($this->myFakeClass, $this->config);
    }
}