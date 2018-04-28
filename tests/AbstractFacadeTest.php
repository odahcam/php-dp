<?php

declare(strict_types=1);

namespace Odahcam\DP\Tests;

use Odahcam\DP;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Odahcam\DP\FacadeTrait
 */
final class AbstractFacadeTest extends TestCase
{
    /**
     * @covers ::getInstance
     * @covers ::createNewInstance
     */
    public function testSingleInstanceFacade(): void
    {        
        $this->assertEquals(
            FacadeTest::getInstance(), 
            FacadeTest::getInstance()
        );

        $this->assertInstanceOf(
            InstantiableTest::class,
            FacadeTest::getInstance()
        );
    }

    /**
     * @covers ::createNewInstance
     */
    public function testInsideException()
    {
        $this->expectException(DP\Exception\InsideNotDefiend::class);

        FacadeFailTest::getInstance();
    }

    /**
     * @covers ::__callStatic
     * @covers ::createNewInstance
     */
    public function testSeparatedInstances()
    {
        FacadeTest::increments(7);
        Facade2Test::increments(5);
        
        $this->assertEquals(8, FacadeTest::getNumber());
        $this->assertEquals(6, Facade2Test::getNumber());

        $this->assertNotEquals(
            FacadeTest::getNumber(), 
            Facade2Test::getNumber()
        );
    }
}
