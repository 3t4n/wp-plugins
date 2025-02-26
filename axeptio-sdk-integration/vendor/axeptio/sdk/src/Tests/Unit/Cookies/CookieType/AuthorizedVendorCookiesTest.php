<?php

declare(strict_types=1);

namespace Axeptio\SDK\Tests\Unit\Cookies\CookieType;

use Axeptio\SDK\Cookies\CookieType\AuthorizedVendorCookies;
use PHPUnit\Framework\TestCase;

class AuthorizedVendorCookiesTest extends TestCase
{
    private AuthorizedVendorCookies $authorizedVendorCookies;

    protected function setUp(): void
    {
        $this->authorizedVendorCookies = new AuthorizedVendorCookies();
    }

    public function testGetCookieName(): void
    {
        $this->assertIsString($this->authorizedVendorCookies->getCookieName());
        $this->assertTrue($this->authorizedVendorCookies->getCookieName() === 'axeptio_authorized_vendors');
    }

    public function testGetCookieData(): void
    {
        $this->authorizedVendorCookies->setUserPreferences(['vendor1']);
        $this->assertEquals(',vendor1,', $this->authorizedVendorCookies->getCookieData());

        $this->authorizedVendorCookies->setUserPreferences([]);
        $this->assertEquals(',,', $this->authorizedVendorCookies->getCookieData());
    }
}
