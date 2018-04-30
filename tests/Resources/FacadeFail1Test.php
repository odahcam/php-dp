<?php

declare (strict_types = 1);

namespace Odahcam\DP\Tests\Resources;

use Odahcam\DP;

/**
 * Implemented Singleton test class.
 */
final class FacadeFail1Test
{
    use DP\SingletonAdapterTrait;

    // forgets to define
    // protected static $adapt = InstantiableTest::class;
}
