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
trait PropertyValidationTrait
{
    /**
     * Creates a new instance of static.
     */
    private static function validateProperty(?string $prop_name): bool
    {
        if (!property_exists(static::class, $prop_name))
        {
            throw new Exception\UndefinedProperty(static::class . '::$' . $prop_name . ' is not defined! Please provide a full qualified classname for the property static::$' . $prop_name . '.', 1);
        }

        if (!static::$$prop_name)
        {
            throw new Exception\InvalidProperty(static::class . '::$' . $prop_name . ' is not valid!');
        }

        return true;
    }
}
