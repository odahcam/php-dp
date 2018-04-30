<?php

declare(strict_types=1);

namespace Odahcam\DP\Tests\Resources;

trait NumberIncrementTrait
{
    private $number = 1;

    /**
     * Increments a value to a private number.
     */
    public function increments(?int $num = 0): void
    {
        $this->number += $num;
    }

    /**
     * Returns the private number.
     */
    public function getNumber(): int
    {
        return $this->number;
    }
}