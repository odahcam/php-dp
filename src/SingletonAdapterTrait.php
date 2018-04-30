<?php

namespace Odahcam\DP;

/**
 * Handles a `$inside` class as a Singleton.
 */
trait SingletonAdapterTrait
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

        if (!static::$$needed_property)
        {
            throw new Exception\InvalidProperty(static::class . '::$' . $needed_property . ' is not valid!');
        }

        return new static::$inside;
    }
}
