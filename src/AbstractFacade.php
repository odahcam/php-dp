<?php

namespace Odahcam\DP;

abstract class AbstractFacade extends AbstractSingleton
{
    /**
     * Who is this class faking for, full qualifyied className.
     *
     * @var string
     */
    protected static $fakingFor;

    /**
     * {@inheritDoc}
     */
    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new static::$fakingFor;
        }

        return static::$instance;
    }

    /**
     * Handle dynamic, static calls to the object.
     *
     * @param  string  $method
     * @param  array  $args
     *
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        $instance = static::getInstance();

        switch (count($args)) {
            case 0:
                return $instance->{$method}();

            case 1:
                return $instance->{$method}($args[0]);

            case 2:
                return $instance->{$method}($args[0], $args[1]);

            case 3:
                return $instance->{$method}($args[0], $args[1], $args[2]);

            case 4:
                return $instance->{$method}($args[0], $args[1], $args[2], $args[3]);

            default:
                return call_user_func_array([$instance, $method], $args);
        }
    }
}
