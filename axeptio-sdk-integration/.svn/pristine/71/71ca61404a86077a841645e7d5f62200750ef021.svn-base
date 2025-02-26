<?php

declare(strict_types=1);

namespace Axeptio\SDK\Cookies\Builder;

use Axeptio\SDK\Cookies\Contract\CookieBuilderInterface;
use Axeptio\SDK\Cookies\CookieType\AxeptioCookies;

class AxeptioCookiesBuilder extends AbstractBuilder implements CookieBuilderInterface
{
    public function init(): void
    {
        $this->cookie = new AxeptioCookies();
    }

    public function setUserPreferences(array $userPreferences): void
    {
        $this->cookie->setUserPreferences($userPreferences);
    }

    public function setUserToken(string $userToken): void
    {
        $this->cookie->setUserToken($userToken);
    }

    public function create(): AxeptioCookies
    {
        $result = $this->cookie;
        $this->init();

        return $result;
    }
}
