<?php

declare(strict_types=1);

namespace Odahcam\DP\Tests;

use Odahcam\DP\Tests\Resources\{
    SingletonOne,
    SingletonTwo
};
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Odahcam\DP\SingletonTrait
 */
final class SingletonTraitTest extends TestCase
{
    /** @var array */
    protected $instances;

    protected function setUp()
    {
        $this->instances = [
            SingletonOne::getInstance(),
            SingletonOne::getInstance(),
            SingletonOne::getInstance(),  
            SingletonTwo::getInstance(),    
        ];
    }

    /**
     * @covers ::getInstance
     */
    public function testIfAllInstancesAreTheSame(): void
    {
        $this->assertEquals(
            SingletonOne::getInstance(), 
            $this->instances[0]
        );

        $this->assertEquals(
            SingletonOne::getInstance(), 
            $this->instances[1]
        );

        $this->assertEquals(
            SingletonOne::getInstance(), 
            $this->instances[2]
        );

        $this->assertEquals(
            SingletonTwo::getInstance(), 
            $this->instances[3]
        );

        $this->assertNotEquals(
            SingletonOne::getInstance(), 
            $this->instances[3]
        );
    }

    /**
     * @covers ::getInstance
     */
    public function testInstanceOfs(): void
    {
        $this->assertInstanceOf(
            SingletonOne::class,
            $this->instances[0]
        );

        $this->assertInstanceOf(
            SingletonOne::class,
            $this->instances[1]
        );

        $this->assertInstanceOf(
            SingletonOne::class,
            $this->instances[2]
        );

        $this->assertInstanceOf(
            SingletonTwo::class,
            $this->instances[3]
        );
    }

    /**
     * @coversNothing
     */
    public function testSingleInstance(): void
    {
        $this->instances[0]->increments(1);
        $this->instances[2]->increments(2);
        $this->instances[2]->increments(null);

        $this->assertEquals(4, $this->instances[1]->getNumber());
    }
}
