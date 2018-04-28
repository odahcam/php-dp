<?php

declare(strict_types=1);

namespace Odahcam\DP\Tests;

use PHPUnit\Framework\TestCase;

final class AbstractSingletonTest extends TestCase
{
    public function testSingleInstance(): void
    {
        $instance1 = SingletonTest::getInstance();
        $instance2 = SingletonTest::getInstance();
        $instance3 = SingletonTest::getInstance();

        $instance1->increments(1);
        $instance3->increments(1);

        $this->assertEquals(3, $instance2->getNumber());
        
        $this->assertEquals(
            SingletonTest::getInstance(), 
            $instance1,
            $instance2,
            $instance3
        );

        $this->assertInstanceOf(
            SingletonTest::class,
            $instance3
        );
    }
}
