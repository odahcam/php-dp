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
trait SingletonFacadeTrait
{
    use SingletonTrait, PropertyValidationTrait;

    /**
     * Class reference property name.
     */
    private static $reference_prop_name = 'singleton';

    /**
     * Creates a new instance of static.
     */
    private static function newInstance()
    {
        $reference_prop_name = static::$reference_prop_name;

        static::validateProperty($reference_prop_name);

        return static::$$reference_prop_name::getInstance();
    }
}
