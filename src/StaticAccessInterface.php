<?php

namespace Odahcam\DP; // Design Patterns

/**
 * How static access should be implemented.
 */
interface StaticAccessInterface
{ 
    /**
     * Works like a proxy, calling a instance and applying the 
     * statically requested `$method` in the instance.
     */
    static function __callStatic(string $method, array $args = null)/* : any */;
}
