<?php

declare(strict_types=1);

namespace Odahcam\DP\Tests\Resources;

use Odahcam\DP;

/**
 * Implemented Singleton test class.
 */
final class Singleton2Test
{
    use DP\SingletonTrait, NumberIncrementTrait;
}
