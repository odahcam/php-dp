<?php

namespace Odahcam\DP;

/**
 * Handles a `$adapt` class as a Singleton.
 * This class is not a singleton itself, it's a static class.
 * Keep in mind that the given class can still be instantiated
 * directly as long as this class will not make any changes to 
 * the given class, but just wraps it to adapt it's usage
 * as a singleton-like.
 */
trait SingletonAdapterTrait
{
    use SingletonTrait;

    /**
     * Who is this class faking for, full qualifyied className.
     *
     * @var string
     */
    // protected static $adapt;

    /**
     * Creates a new instance of static.
     */
    private static function createNewInstance()
    {
        $needed_property = 'inside';

        if (!property_exists(static::class, $needed_property))
        {
            throw new Exception\UndefinedAdaptProperty(static::class . '::$' . $needed_property . ' is not defined! Please provide a full qualified classname for the property static::$' . $needed_property . '.', 1);
        }

        if (!static::$$needed_property)
        {
            throw new Exception\InvalidProperty(static::class . '::$' . $needed_property . ' is not valid!');
        }

        return new static::$adapt;
    }
}
