<?php

declare(strict_types=1);

namespace Axeptio\SDK\Tests\Unit\Cookies\CookieType;

use Axeptio\SDK\Cookies\CookieType\AbstractCookie;
use Axeptio\SDK\Cookies\CookieType\AllVendorCookies;
use PHPUnit\Framework\TestCase;

class AllVendorCookiesTest extends TestCase
{
    private AllVendorCookies $allVendorCookies;

    protected function setUp(): void
    {
        $this->allVendorCookies = new AllVendorCookies();
    }

    public function testGetCookieName(): void
    {
        $this->assertIsString($this->allVendorCookies->getCookieName());
        $this->assertTrue($this->allVendorCookies->getCookieName() === 'axeptio_all_vendors');
    }

    public function testExpiryData(): void
    {
        $this->allVendorCookies->setExpiry(300);
        $this->assertIsInt($this->allVendorCookies->getExpiry());
        $this->assertEquals(300, $this->allVendorCookies->getExpiry());
    }

    public function testPathData(): void
    {
        $this->allVendorCookies->setPath('/path');
        $this->assertIsString($this->allVendorCookies->getPath());
        $this->assertEquals('/path', $this->allVendorCookies->getPath());
    }

    public function testSecureData(): void
    {
        $this->allVendorCookies->setSecure(false);
        $this->assertIsBool($this->allVendorCookies->isSecure());
        $this->assertFalse($this->allVendorCookies->isSecure());
    }

    public function testHttpOnlyData(): void
    {
        $this->allVendorCookies->setHttponly(true);
        $this->assertIsBool($this->allVendorCookies->isHttponly());
        $this->assertTrue($this->allVendorCookies->isHttponly());
    }

    public function testSameSiteData(): void
    {
        $this->allVendorCookies->setSameSite('Not Strict');
        $this->assertIsString($this->allVendorCookies->getSameSite());
        $this->assertEquals('Not Strict', $this->allVendorCookies->getSameSite());
    }

    public function testGetCookieData(): void
    {
        $this->allVendorCookies->setVendors(['vendor1', 'vendor2', 'vendor3']);
        $this->assertEquals(',vendor1,vendor2,vendor3,', $this->allVendorCookies->getCookieData());

        $this->allVendorCookies->setVendors([]);
        $this->assertEquals(',,', $this->allVendorCookies->getCookieData());
    }

    public function testGetCookieOptions(): void
    {
        $this->allVendorCookies->setExpiry(1000);
        $this->allVendorCookies->setPath('/');
        $this->allVendorCookies->setSameSite('Strict');
        $this->allVendorCookies->setHttponly(true);
        $this->allVendorCookies->setSecure(false);

        $cookieOptions = $this->allVendorCookies->getCookieOptions();

        $this->assertIsArray($cookieOptions);
        $this->assertArrayHasKey(AbstractCookie::EXPIRES_OPTION_KEY, $cookieOptions);
        $this->assertTrue($cookieOptions[AbstractCookie::EXPIRES_OPTION_KEY] === time() + 1000);
        $this->assertArrayHasKey(AbstractCookie::PATH_OPTION_KEY, $cookieOptions);
        $this->assertTrue($cookieOptions[AbstractCookie::PATH_OPTION_KEY] === '/');
        $this->assertArrayHasKey(AbstractCookie::SAMESITE_OPTION_KEY, $cookieOptions);
        $this->assertTrue($cookieOptions[AbstractCookie::SAMESITE_OPTION_KEY] === 'Strict');
        $this->assertArrayHasKey(AbstractCookie::HTTPONLY_OPTION_KEY, $cookieOptions);
        $this->assertTrue($cookieOptions[AbstractCookie::HTTPONLY_OPTION_KEY]);
        $this->assertArrayHasKey(AbstractCookie::SECURE_OPTION_KEY, $cookieOptions);
        $this->assertFalse($cookieOptions[AbstractCookie::SECURE_OPTION_KEY]);
    }
}
