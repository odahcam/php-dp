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
        // resets the number to zero
        SingletonAdaptedOne::increments(-SingletonAdaptedOne::getNumber());
        SingletonAdaptedTwo::increments(-SingletonAdaptedTwo::getNumber());
        
        $this->assertEquals(0, SingletonAdaptedOne::getNumber());
        $this->assertEquals(0, SingletonAdaptedTwo::getNumber());

        // sums new numbers
        SingletonAdaptedOne::increments(7);
        SingletonAdaptedTwo::increments(5);
        
        $this->assertEquals(7, SingletonAdaptedOne::getNumber());
        $this->assertEquals(5, SingletonAdaptedTwo::getNumber());

        $this->assertNotEquals(
            SingletonAdaptedOne::getNumber(), 
            SingletonAdaptedTwo::getNumber()
        );
    }
}
