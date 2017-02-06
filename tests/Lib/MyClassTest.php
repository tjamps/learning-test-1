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

        // on lance l'action
        // on vérifie le résultat
    }

    public function testMyMethodWithFalseKey()
    {
        $key = 'false';
        $expected = null;

        // on lance l'action
        // on vérifie le résultat
    }

    public function testMyMehodWithMorganKey()
    {
        $this->config['morgan'] = 'ajoutez ici un GENTIL commentaire';
        $key = 'morgan';
        $expected = 'gros mégalo';

        // on lance l'action
        // on vérifie le résultat
    }
}