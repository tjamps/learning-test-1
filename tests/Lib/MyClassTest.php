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
    }

    public function testMyMethodWithFalseKey()
    {
        $key = 'false';
        $expected = null;

        $myClass = $this->init();
        $result = $myClass->myMethod($key);
    }

    public function testMyMehodWithMorganKey()
    {
        $this->config['morgan'] = 'ajoutez ici un GENTIL commentaire';
        $key = 'morgan';
        $expected = 'gros mégalo';

        $myClass = $this->init();
        $result = $myClass->myMethod($key);
    }

    private function init()
    {
        return new Myclass($this->myFakeClass, $this->config);
    }
}