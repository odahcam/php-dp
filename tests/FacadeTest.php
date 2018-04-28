<?php

declare (strict_types = 1);

namespace Odahcam\DP\Tests;

use Odahcam\DP;

/**
 * Implemented Singleton test class.
 */
final class FacadeTest
{
    use DP\FacadeTrait;

    protected static $inside = InstantiableTest::class;
}
