<?php

declare(strict_types=1);

namespace Axeptio\SDK\Tests\Unit\Cookies\CookieType;

use Axeptio\SDK\Cookies\CookieType\AxeptioCookies;
use PHPUnit\Framework\TestCase;

class AxeptioCookiesTest extends TestCase
{
    private AxeptioCookies $axeptioCookies;

    protected function setUp(): void
    {
        $this->axeptioCookies = new AxeptioCookies();
    }

    public function testGetCookieName(): void
    {
        $this->assertIsString($this->axeptioCookies->getCookieName());
        $this->assertTrue($this->axeptioCookies->getCookieName() === 'axeptio_cookies');
    }

    public function testGetCookieData(): void
    {
        $userPreferences = ['vendor1', 'vendor2'];
        $userToken = 'USER_TOKEN';

        $this->axeptioCookies->setUserPreferences($userPreferences);
        $this->axeptioCookies->setUserToken($userToken);

        $defaultData = [
            AxeptioCookies::TOKEN_DATA => $this->axeptioCookies->getUserToken(),
            AxeptioCookies::DATE_DATA => date('c'),
            AxeptioCookies::COOKIES_VERSION_DATA => true,
            AxeptioCookies::COMPLETE_DATA => true
        ];

        $this->assertEquals(
            json_encode(array_merge($defaultData, $this->axeptioCookies->getUserPreferences())),
            $this->axeptioCookies->getCookieData()
        );
    }
}
