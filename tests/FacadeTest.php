<?php

declare (strict_types = 1);

namespace Odahcam\DP\Tests;

use Odahcam\DP\AbstractFacade;

/**
 * Implemented Singleton test class.
 */
final class FacadeTest extends AbstractFacade
{
    protected static $fakingFor = InstantiableTest::class;
}
