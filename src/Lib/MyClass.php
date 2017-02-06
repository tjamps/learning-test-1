<?php

namespace Lib;

class MyClass
{
    /** @var  MyFakeClass */
    private $myFakeClass;

    /** @var  array */
    private $config;

    /**
     * MyClass constructor.
     * @param MyFakeClass $myFakeClass
     * @param array $config
     */
    public function __construct(MyFakeClass $myFakeClass, array $config)
    {
        $this->myFakeClass = $myFakeClass;
        $this->config = $config;
    }

    /**
     * @param $value
     * @return mixed|null
     */
    public function myMethod($key)
    {
        if (!array_key_exists($key, $this->config)) {
            return null;
        }

        if (array_key_exists('morgan', $this->config)) {
            return 'gros mégalo';
        }

        return $this->config[$key];
    }
}