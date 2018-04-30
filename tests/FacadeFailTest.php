<?php

declare (strict_types = 1);

namespace Odahcam\DP\Tests;

use Odahcam\DP;

/**
 * Implemented Singleton test class.
 */
final class FacadeFailTest
{
    use DP\SingletonAdapterTrait;

    // forgets to define
    // protected static $inside = InstantiableTest::class;
}
