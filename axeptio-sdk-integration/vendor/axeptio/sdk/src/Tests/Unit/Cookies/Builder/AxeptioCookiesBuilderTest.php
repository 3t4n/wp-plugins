<?php

declare(strict_types=1);

namespace Axeptio\SDK\Tests\Unit\Cookies\Builder;

use Axeptio\SDK\Cookies\Builder\AxeptioCookiesBuilder;
use PHPUnit\Framework\TestCase;

class AxeptioCookiesBuilderTest extends TestCase
{
    private AxeptioCookiesBuilder $axeptioCookiesBuilder;

    protected function setUp(): void
    {
        $this->axeptioCookiesBuilder = new AxeptioCookiesBuilder();
    }

    public function testCookieCreate(): void
    {
        $this->axeptioCookiesBuilder->setExpiry(3000);
        $this->axeptioCookiesBuilder->setPath('/');
        $this->axeptioCookiesBuilder->setSameSite('Strict');
        $this->axeptioCookiesBuilder->setHttponly(true);
        $this->axeptioCookiesBuilder->setSecure(false);
        $this->axeptioCookiesBuilder->setUserPreferences(['vendor1', 'vendor2', 'vendor3']);
        $this->axeptioCookiesBuilder->setUserToken('USER_TOKEN');

        $result = $this->axeptioCookiesBuilder->create();

        $this->assertIsObject($result);
        $this->assertEquals(3000, $result->getExpiry());
        $this->assertEquals('/', $result->getPath());
        $this->assertEquals('Strict', $result->getSameSite());
        $this->assertTrue($result->isHttponly());
        $this->assertFalse($result->isSecure());
        $this->assertEquals('USER_TOKEN', $result->getUserToken());

        $userPreferences = $result->getUserPreferences();
        $this->assertIsArray($userPreferences);
        $this->assertTrue(count($userPreferences) === 3);
        $this->assertTrue($userPreferences[0] === 'vendor1');
        $this->assertTrue($userPreferences[1] === 'vendor2');
        $this->assertTrue($userPreferences[2] === 'vendor3');
        $this->assertFalse(isset($userPreferences[3]));
    }
}
