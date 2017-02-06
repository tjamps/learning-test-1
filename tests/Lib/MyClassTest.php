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
        $this->config = ['link' => 'value'];
        $this->myFakeClass = new MyFakeClass();
    }

    public function testMyMethodWithGoodKey()
    {
        $key = 'link';
        $expected = 'value';

        $myClass = $this->init();
        $result = $myClass->myMethod($key);

        $this->assertSame($expected, $result);
    }

    public function testMyMethodWithFalseKey()
    {
        $key = 'false';

        $myClass = $this->init();
        $result = $myClass->myMethod($key);

        $this->assertNull($result);
    }

    public function testMyMehodWithMorganKey()
    {
        $this->config['morgan'] = 'ajoutez ici un GENTIL commentaire';
        $key = 'morgan';
        $expected = 'gros mégalo';

        $myClass = $this->init();
        $result = $myClass->myMethod($key);

        $this->assertSame($expected, $result);
    }

    private function init()
    {
        return new Myclass($this->myFakeClass, $this->config);
    }
}