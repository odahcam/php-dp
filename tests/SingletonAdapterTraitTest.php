<?php

declare(strict_types=1);

namespace Odahcam\DP\Tests;

use Odahcam\DP;
use Odahcam\DP\Tests\Resources\{
    Facade1Test, 
    Facade2Test, 
    FacadeFail1Test, 
    FacadeFail2Test, 
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
            Facade1Test::getInstance(), 
            Facade1Test::getInstance()
        );

        $this->assertInstanceOf(
            InstantiableTest::class,
            Facade1Test::getInstance()
        );
    }

    /**
     * @covers ::newInstance
     */
    public function testUndefinedAdaptPropertyException()
    {
        $this->expectException(DP\Exception\UndefinedProperty::class);

        FacadeFail1Test::getInstance();
    }

    /**
     * @covers ::newInstance
     */
    public function testInvalidPropertyException()
    {
        $this->expectException(DP\Exception\InvalidProperty::class);

        FacadeFail2Test::getInstance();
    }

    /**
     * @covers ::__callStatic
     * @covers ::newInstance
     */
    public function testSeparatedInstances()
    {
        Facade1Test::increments(7);
        Facade2Test::increments(5);
        
        $this->assertEquals(8, Facade1Test::getNumber());
        $this->assertEquals(6, Facade2Test::getNumber());

        $this->assertNotEquals(
            Facade1Test::getNumber(), 
            Facade2Test::getNumber()
        );
    }
}
