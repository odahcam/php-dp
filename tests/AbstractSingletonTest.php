<?php

declare(strict_types=1);

namespace Odahcam\DP\Tests;

use PHPUnit\Framework\TestCase;

final class AbstractSingletonTest extends TestCase
{
    /** @var array */
    protected $instances;

    protected function setUp()
    {
        $this->instances = [
            SingletonTest::getInstance(),
            SingletonTest::getInstance(),
            SingletonTest::getInstance(),    
        ];
    }

    public function testSingleInstance(): void
    {
        $this->instances[0]->increments(1);
        $this->instances[2]->increments(2);

        $this->assertEquals(4, $this->instances[1]->getNumber());
    }

    public function testIfAllInstancesAreTheSame(): void
    {
        $this->assertEquals(
            SingletonTest::getInstance(), 
            $this->instances[0]
        );

        $this->assertEquals(
            SingletonTest::getInstance(), 
            $this->instances[1]
        );

        $this->assertEquals(
            SingletonTest::getInstance(), 
            $this->instances[2]
        );
    }

    public function testInstanceOfs(): void
    {
        $this->assertInstanceOf(
            SingletonTest::class,
            $this->instances[0]
        );

        $this->assertInstanceOf(
            SingletonTest::class,
            $this->instances[1]
        );

        $this->assertInstanceOf(
            SingletonTest::class,
            $this->instances[2]
        );
    }
}
