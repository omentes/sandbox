<?php

namespace Design\Creational\Singleton;

class Singleton
{
    protected static $instances = [];

    protected function __construct()
    {
        // do nothing
    }

    protected function __clone()
    {
        // do nothing
    }

    public function __sleep()
    {
        throw new \Exception("Cannot serialize singleton");
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot deserialize singleton");
    }

    public static function getInstance()
    {
        $subclass = static::class;
        if (!isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static;
        }
        return self::$instances[$subclass];
    }
}
