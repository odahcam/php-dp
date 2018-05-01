<?php

declare(strict_types=1);

namespace Odahcam\DP\Tests;

use Odahcam\DP;
use Odahcam\DP\Tests\Resources\{
    SingletonFacadeOne, 
    SingletonFacadeTwo, 
    SingletonFacadeFailOne, 
    SingletonFacadeFailTwo, 
    SingletonOne,
    SingletonTwo
};
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Odahcam\DP\SingletonFacadeTrait
 */
final class SingletonFacadeTraitTest extends TestCase
{
    /**
     * @covers ::getInstance
     * @covers ::newInstance
     */
    public function testSingleAdaptedInstance(): void
    {        
        $this->assertEquals(
            SingletonFacadeOne::getInstance(), 
            SingletonFacadeOne::getInstance()
        );

        $this->assertInstanceOf(
            SingletonOne::class,
            SingletonFacadeOne::getInstance()
        );

        $this->assertInstanceOf(
            SingletonTwo::class,
            SingletonFacadeTwo::getInstance()
        );
    }

    /**
     * @covers ::newInstance
     */
    public function testUndefinedAdaptPropertyException()
    {
        $this->expectException(DP\Exception\UndefinedProperty::class);

        SingletonFacadeFailOne::getInstance();
    }

    /**
     * @covers ::newInstance
     */
    public function testInvalidPropertyException()
    {
        $this->expectException(DP\Exception\InvalidProperty::class);

        SingletonFacadeFailTwo::getInstance();
    }

    /**
     * @covers ::__callStatic
     * @covers ::newInstance
     */
    public function testSeparatedInstances()
    {
        // resets the number to zero
        SingletonFacadeOne::increments(-SingletonFacadeOne::getNumber());
        SingletonFacadeTwo::increments(-SingletonFacadeTwo::getNumber());
        
        $this->assertEquals(0, SingletonFacadeOne::getNumber());
        $this->assertEquals(0, SingletonFacadeTwo::getNumber());

        // sums new numbers
        SingletonFacadeOne::increments(7);
        SingletonFacadeTwo::increments(5);
        
        $this->assertEquals(7, SingletonFacadeOne::getNumber());
        $this->assertEquals(5, SingletonFacadeTwo::getNumber());

        $this->assertNotEquals(
            SingletonFacadeOne::getNumber(), 
            SingletonFacadeTwo::getNumber()
        );
    }
}
