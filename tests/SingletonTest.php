<?php

declare(strict_types=1);

namespace Odahcam\DP\Tests;

use Odahcam\DP;

/**
 * Implemented Singleton test class.
 */
final class SingletonTest
{
    use DP\SingletonTrait, NumberIncrementTrait;
}
