<?php

declare(strict_types=1);

namespace Axeptio\SDK\Tests\Unit\Cookies\Builder;

use Axeptio\SDK\Cookies\Builder\AllVendorCookiesBuilder;
use PHPUnit\Framework\TestCase;

class AllVendorCookiesBuilderTest extends TestCase
{
    private AllVendorCookiesBuilder $allVendorCookieBuilder;

    protected function setUp(): void
    {
        $this->allVendorCookieBuilder = new AllVendorCookiesBuilder();
    }

    public function testCookieCreate(): void
    {
        $this->allVendorCookieBuilder->setExpiry(1000);
        $this->allVendorCookieBuilder->setPath('/');
        $this->allVendorCookieBuilder->setSameSite('Strict');
        $this->allVendorCookieBuilder->setHttponly(true);
        $this->allVendorCookieBuilder->setSecure(true);
        $this->allVendorCookieBuilder->setVendors(['vendor1', 'vendor2']);

        $result = $this->allVendorCookieBuilder->create();

        $this->assertIsObject($result);
        $this->assertEquals(1000, $result->getExpiry());
        $this->assertEquals('/', $result->getPath());
        $this->assertEquals('Strict', $result->getSameSite());
        $this->assertTrue($result->isHttponly());
        $this->assertTrue($result->isSecure());

        $vendors = $result->getVendors();
        $this->assertIsArray($vendors);
        $this->assertTrue(count($vendors) === 2);
        $this->assertTrue($vendors[0] === 'vendor1');
        $this->assertTrue($vendors[1] === 'vendor2');
        $this->assertFalse(isset($vendors[2]));
    }
}
