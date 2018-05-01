<?php

declare (strict_types = 1);

namespace Odahcam\DP\Tests\Resources;

use Odahcam\DP;

/**
 * Implemented Singleton test class.
 */
final class SingletonAdaptedFailOne implements DP\SingletonInterface
{
    use DP\SingletonAdapterTrait;

    // forgets to define
    // protected static $adapt = InstantiableTest::class;
}
