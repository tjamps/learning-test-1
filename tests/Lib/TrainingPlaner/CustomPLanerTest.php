<?php

namespace tests\Lib\TrainingPlaner;

use Lib\TrainingPlaner\CustomPlaner;
use Model\Session;
use Model\Training;
use PHPUnit\Framework\TestCase;

class CustomPlanerTest extends TestCase
{
    /** @var  Training */
    private $training;

    public function setUp()
    {
        $this->training = new Training();
    }

    public function testGetSession()
    {
        $customPlaner = $this->init();

        $this->assertInstanceOf(Session::class, $customPlaner->getSession());
    }
    
    private function init()
    {
        return new CustomPlaner($this->training, 5);
    }
}