<?php

declare(strict_types=1);

namespace Odahcam\DP\Tests;

use Odahcam\DP;
use PHPUnit\Framework\TestCase;

final class AbstractFacadeTest extends TestCase
{
    public function testSingleInstanceFacade(): void
    {        
        $this->assertEquals(
            FacadeTest::getInstance(), 
            FacadeTest::getInstance()
        );
    }

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

    public function testRightClassInstance()
    {    
        $this->assertInstanceOf(
            InstantiableTest::class,
            FacadeTest::getInstance()
        );
    }

    public function testInsideException()
    {
        $this->expectException(DP\Exception\InsideNotDefiend::class);

        FacadeFailTest::getInstance();
    }
}
