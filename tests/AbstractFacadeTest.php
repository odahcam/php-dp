<?php

declare(strict_types=1);

namespace Odahcam\DP\Tests;

use PHPUnit\Framework\TestCase;

final class AbstractFacadeTest extends TestCase
{
    public function testSingleInstanceFacade(): void
    {
        FacadeTest::increments(1);
        
        $this->assertEquals(2, FacadeTest::getNumber());
        
        $this->assertEquals(
            FacadeTest::getInstance(), 
            FacadeTest::getInstance()
        );

        $this->assertInstanceOf(
            InstantiableTest::class,
            FacadeTest::getInstance()
        );
    }
}
