<?php

declare (strict_types = 1);

namespace Odahcam\DP\Tests\Resources;

use Odahcam\DP;

/**
 * Implemented Singleton test class.
 */
final class SingletonAdaptedFailTwo implements DP\SingletonInterface
{
    use DP\SingletonAdapterTrait;

    // wrongly defined
    protected static $adapt = null;
}
