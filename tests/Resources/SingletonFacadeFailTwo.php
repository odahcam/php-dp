<?php

declare (strict_types = 1);

namespace Odahcam\DP\Tests\Resources;

use Odahcam\DP;

/**
 * Implemented Singleton test class.
 */
final class SingletonFacadeFailTwo implements DP\SingletonInterface
{
    use DP\SingletonFacadeTrait;

    protected static $singleton = null;
}
