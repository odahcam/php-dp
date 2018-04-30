<?php

namespace Odahcam\DP; // Design Patterns

/**
 * Singleton pattern.
 */
interface StaticAccessInterface
{ 
    static function __callStatic(string $method, array $args = null);
}
