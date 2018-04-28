<?php

declare(strict_types=1);

namespace Odahcam\DP\Tests;

use Odahcam\DP\AbstractSingleton;

/**
 * Implemented Singleton test class.
 */
final class SingletonTest extends AbstractSingleton
{
    use NumberIncrementTrait;
}
