<?php

declare (strict_types = 1);

namespace Odahcam\DP\Tests;

use Odahcam\DP\AbstractSingleton;

/**
 * Implemented Singleton test class.
 */
final class SingletonTest extends AbstractSingleton
{
    private $_number;

    /**
     * Increments a value to a private number.
     */
    public function increments(int $num = 0): void
    {
        $this->_number += $num;
    }

    /**
     * Returns the private number.
     */
    public function getNumber(): int
    {
        return $this->_number || 0;
    }
}
