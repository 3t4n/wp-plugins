<?php

declare(strict_types=1);

namespace Axeptio\SDK\Tests\Unit\Cookies\Builder;

use Axeptio\SDK\Cookies\Builder\AuthorizedVendorCookiesBuilder;
use PHPUnit\Framework\TestCase;

class AuthorizedVendorCookiesBuilderTest extends TestCase
{
    private AuthorizedVendorCookiesBuilder $authorizedVendorCookiesBuilder;

    protected function setUp(): void
    {
        $this->authorizedVendorCookiesBuilder = new AuthorizedVendorCookiesBuilder();
    }

    public function testCookieCreate(): void
    {
        $this->authorizedVendorCookiesBuilder->setExpiry(2000);
        $this->authorizedVendorCookiesBuilder->setPath('/');
        $this->authorizedVendorCookiesBuilder->setSameSite('Strict');
        $this->authorizedVendorCookiesBuilder->setHttponly(true);
        $this->authorizedVendorCookiesBuilder->setSecure(false);
        $this->authorizedVendorCookiesBuilder->setUserPreferences(['vendor']);

        $result = $this->authorizedVendorCookiesBuilder->create();

        $this->assertIsObject($result);
        $this->assertEquals(2000, $result->getExpiry());
        $this->assertEquals('/', $result->getPath());
        $this->assertEquals('Strict', $result->getSameSite());
        $this->assertTrue($result->isHttponly());
        $this->assertFalse($result->isSecure());

        $userPreferences = $result->getUserPreferences();
        $this->assertIsArray($userPreferences);
        $this->assertTrue(count($userPreferences) === 1);
        $this->assertTrue($userPreferences[0] === 'vendor');
        $this->assertFalse(isset($userPreferences[1]));
    }
}
