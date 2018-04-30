<?php

declare (strict_types = 1);

namespace Odahcam\DP\Tests\Resources;

use Odahcam\DP;

/**
 * Implemented Singleton test class.
 */
final class Facade1Test
{
    use DP\SingletonAdapterTrait;

    protected static $adapt = InstantiableTest::class;
}
