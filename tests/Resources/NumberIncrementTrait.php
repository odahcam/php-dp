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
    
    /**
     * Calcs the average of the received arguments.
     * Allows to test complex method calls like `::average(1, 2, 55, 4[, agr[x]]);`.
     */
    public function average(): ?int
    {
        $arguments = func_get_args();
        
        if (!$arguments || count($arguments) < 1) 
        {
            return null;
        }
        
        return array_sum($arguments) / func_num_args();
    }
}
