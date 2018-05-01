<?php

declare (strict_types = 1);

namespace Odahcam\DP\Tests\Resources;

use Odahcam\DP;

/**
 * Implemented Singleton test class.
 */
final class SingletonFacadeFailOne implements DP\SingletonInterface
{
    use DP\SingletonFacadeTrait;

    // protected static $singleton = SingletonOne::class;
}
