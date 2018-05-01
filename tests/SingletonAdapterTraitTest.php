<?php

declare(strict_types=1);

namespace Odahcam\DP\Tests;

use Odahcam\DP;
use Odahcam\DP\Tests\Resources\{
    SingletonAdaptedOne, 
    SingletonAdaptedTwo, 
    SingletonAdaptedFailOne, 
    SingletonAdaptedFailTwo, 
    InstantiableTest
};
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Odahcam\DP\SingletonAdapterTrait
 */
final class SingletonAdapterTraitTest extends TestCase
{
    /**
     * @covers ::getInstance
     * @covers ::newInstance
     */
    public function testSingleAdaptedInstance(): void
    {        
        $this->assertEquals(
            SingletonAdaptedOne::getInstance(), 
            SingletonAdaptedOne::getInstance()
        );

        $this->assertInstanceOf(
            InstantiableTest::class,
            SingletonAdaptedOne::getInstance()
        );
    }

    /**
     * @covers ::newInstance
     */
    public function testUndefinedAdaptPropertyException()
    {
        $this->expectException(DP\Exception\UndefinedProperty::class);

        SingletonAdaptedFailOne::getInstance();
    }

    /**
     * @covers ::newInstance
     */
    public function testInvalidPropertyException()
    {
        $this->expectException(DP\Exception\InvalidProperty::class);

        SingletonAdaptedFailTwo::getInstance();
    }

    /**
     * @covers ::__callStatic
     * @covers ::newInstance
     */
    public function testSeparatedInstances()
    {
        SingletonAdaptedOne::increments(7);
        SingletonAdaptedTwo::increments(5);
        
        $this->assertEquals(8, SingletonAdaptedOne::getNumber());
        $this->assertEquals(6, SingletonAdaptedTwo::getNumber());

        $this->assertNotEquals(
            SingletonAdaptedOne::getNumber(), 
            SingletonAdaptedTwo::getNumber()
        );
    }
}
