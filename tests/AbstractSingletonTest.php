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

        $instance1->increment(2);
        $instance3->increment(2);

        $this->assertEquals(4, $instance2->getNumber());
        
        $this->assertEquals(
            SingletonTest::getInstance(), 
            $instance1
        );

        $this->assertInstanceOf(
            SingletonTest::class,
            $instance3
        );
    }
}
