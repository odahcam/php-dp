<?php

declare (strict_types = 1);

namespace Odahcam\DP\Tests;

use Odahcam\DP;

/**
 * Implemented Singleton test class.
 */
final class FacadeFail2Test
{
    use DP\SingletonAdapterTrait;

    // wrongly defined
    protected static $adapt = null;
}
