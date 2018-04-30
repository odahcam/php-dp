<?php

declare(strict_types=1);

namespace Odahcam\DP\Tests\Resources;

use Odahcam\DP;

/**
 * Implemented Singleton test class.
 */
final class Singleton1Test
{
    use DP\SingletonTrait, NumberIncrementTrait;
}
