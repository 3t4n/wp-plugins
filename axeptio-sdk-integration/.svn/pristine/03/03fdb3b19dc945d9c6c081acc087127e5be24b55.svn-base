<?php

declare(strict_types=1);

namespace Axeptio\SDK\Cookies\Builder;

use Axeptio\SDK\Cookies\Contract\CookieBuilderInterface;
use Axeptio\SDK\Cookies\CookieType\AuthorizedVendorCookies;

class AuthorizedVendorCookiesBuilder extends AbstractBuilder implements CookieBuilderInterface
{
    public function init(): void
    {
        $this->cookie = new AuthorizedVendorCookies();
    }

    public function setUserPreferences(array $userPreferences): void
    {
        $this->cookie->setUserPreferences($userPreferences);
    }

    public function create(): AuthorizedVendorCookies
    {
        $result = $this->cookie;
        $this->init();

        return $result;
    }
}
