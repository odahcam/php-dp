<?php

declare (strict_types = 1);

namespace Odahcam\DP\Tests;

use Odahcam\DP;

/**
 * Implemented Singleton test class.
 */
final class Facade1Test
{
    use DP\SingletonAdapterTrait;

    protected static $inside = InstantiableTest::class;
}
