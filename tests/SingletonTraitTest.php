<?php

declare(strict_types=1);

namespace Odahcam\DP\Tests;

use Odahcam\DP\Tests\Resources\{
    Singleton1Test,
    Singleton2Test
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
            Singleton1Test::getInstance(),
            Singleton1Test::getInstance(),
            Singleton1Test::getInstance(),  
            Singleton2Test::getInstance(),    
        ];
    }

    /**
     * @covers ::getInstance
     */
    public function testIfAllInstancesAreTheSame(): void
    {
        $this->assertEquals(
            Singleton1Test::getInstance(), 
            $this->instances[0]
        );

        $this->assertEquals(
            Singleton1Test::getInstance(), 
            $this->instances[1]
        );

        $this->assertEquals(
            Singleton1Test::getInstance(), 
            $this->instances[2]
        );

        $this->assertEquals(
            Singleton2Test::getInstance(), 
            $this->instances[3]
        );

        $this->assertNotEquals(
            Singleton1Test::getInstance(), 
            $this->instances[3]
        );
    }

    /**
     * @covers ::getInstance
     */
    public function testInstanceOfs(): void
    {
        $this->assertInstanceOf(
            Singleton1Test::class,
            $this->instances[0]
        );

        $this->assertInstanceOf(
            Singleton1Test::class,
            $this->instances[1]
        );

        $this->assertInstanceOf(
            Singleton1Test::class,
            $this->instances[2]
        );

        $this->assertInstanceOf(
            Singleton2Test::class,
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
