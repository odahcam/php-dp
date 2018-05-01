<?php

declare(strict_types=1);

namespace Odahcam\DP\Tests\Resources;

use Odahcam\DP;

/**
 * Implemented Singleton test class.
 */
final class SingletonTwo implements DP\SingletonInterface
{
    use DP\SingletonTrait, NumberIncrementTrait;
}
