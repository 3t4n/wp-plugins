<?php

declare(strict_types=1);

namespace Axeptio\SDK\Tests\Unit\Cookies;

use Axeptio\SDK\Cookies\AxeptioCookieManager;
use Axeptio\SDK\Cookies\Contract\CookieInterface;
use Axeptio\SDK\Cookies\CookieType\AllVendorCookies;
use Axeptio\SDK\Cookies\CookieType\AuthorizedVendorCookies;
use Axeptio\SDK\Cookies\CookieType\AxeptioCookies;
use Axeptio\SDK\Cookies\Exception\UndefinedCookie;
use PHPUnit\Framework\TestCase;

class AxeptioCookiesManagerTest extends TestCase
{
    private AxeptioCookies $axeptioCookies;
    private AllVendorCookies $allVendorCookies;
    private AuthorizedVendorCookies $authorizedVendorCookies;
    private AxeptioCookieManager $axeptioCookieManager;

    protected function setUp(): void
    {
        $this->axeptioCookies = $this->createMock(AxeptioCookies::class);
        $this->allVendorCookies = $this->createMock(AllVendorCookies::class);
        $this->authorizedVendorCookies = $this->createMock(AuthorizedVendorCookies::class);

        $this->axeptioCookieManager = new AxeptioCookieManager();
    }

    public function testGetCookiesInstances(): void
    {
        $this->assertIsArray($this->axeptioCookieManager->getCookiesInstances());
    }

    public function testAddAxeptioCookies(): void
    {
        $this->axeptioCookieManager->addAxeptioCookies($this->axeptioCookies);
        $cookiesInstances = $this->axeptioCookieManager->getCookiesInstances();

        $this->assertArrayHasKey(AxeptioCookies::class, $cookiesInstances);
        $this->assertIsObject($cookiesInstances[AxeptioCookies::class]);
        $this->assertTrue($cookiesInstances[AxeptioCookies::class] instanceof CookieInterface);
    }

    public function testAddAuthorizedVendorCookies(): void
    {
        $this->axeptioCookieManager->addAuthorizedVendorCookies($this->authorizedVendorCookies);
        $cookiesInstances = $this->axeptioCookieManager->getCookiesInstances();

        $this->assertArrayHasKey(AuthorizedVendorCookies::class, $cookiesInstances);
        $this->assertIsObject($cookiesInstances[AuthorizedVendorCookies::class]);
        $this->assertTrue($cookiesInstances[AuthorizedVendorCookies::class] instanceof CookieInterface);
    }

    public function testAddAllVendorCookies(): void
    {
        $this->axeptioCookieManager->addAllVendorCookies($this->allVendorCookies);
        $cookiesInstances = $this->axeptioCookieManager->getCookiesInstances();

        $this->assertArrayHasKey(AllVendorCookies::class, $cookiesInstances);
        $this->assertIsObject($cookiesInstances[AllVendorCookies::class]);
        $this->assertTrue($cookiesInstances[AllVendorCookies::class] instanceof CookieInterface);
    }

    public function testSetWithNoDefinedCookie(): void
    {
        $this->expectException(UndefinedCookie::class);
        $this->axeptioCookieManager->set();
    }

    public function testSetWithAxeptioCookiesDefined(): void
    {
        $this->axeptioCookieManager->addAxeptioCookies($this->axeptioCookies);

        $this->expectException(UndefinedCookie::class);
        $this->axeptioCookieManager->set();
    }

    public function testSetWithAxeptioCookiesDefinedAndAuthorizedVendorCookiesDefined(): void
    {
        $this->axeptioCookieManager->addAxeptioCookies($this->axeptioCookies);
        $this->axeptioCookieManager->addAuthorizedVendorCookies($this->authorizedVendorCookies);

        $this->expectException(UndefinedCookie::class);
        $this->axeptioCookieManager->set();
    }

    public function testWhenAllCookiesAreDefined(): void
    {
        $this->expectNotToPerformAssertions();
        $this->axeptioCookieManager->addAxeptioCookies($this->axeptioCookies);
        $this->axeptioCookieManager->addAuthorizedVendorCookies($this->authorizedVendorCookies);
        $this->axeptioCookieManager->addAllVendorCookies($this->allVendorCookies);

        $this->axeptioCookieManager->set();
    }
}
