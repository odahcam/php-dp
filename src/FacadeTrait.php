<?php

namespace Odahcam\DP;

/**
 * Abstracted Facade pattern.
 */
trait FacadeTrait
{
    use SingletonTrait;

    /**
     * Who is this class faking for, full qualifyied className.
     *
     * @var string
     */
    // protected static $inside;

    /**
     * Creates a new instance of static.
     */
    private static function createNewInstance()
    {
        $needed_property = 'inside';

        if (!property_exists(static::class, $needed_property)) 
        {
            throw new Exception\InsideNotDefiend(static::class . '::$' . $needed_property . ' is not defined! Please provide a full qualified classname for the property static::$' . $needed_property . '.', 1);
        }

        return new static::$inside;
    }

    /**
     * {@inheritDoc}
     */
    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = self::createNewInstance();
        }

        return static::$instance;
    }

    /**
     * Handle dynamic, static calls to the object.
     *
     * @param  string  $method
     * @param  array   $args
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
