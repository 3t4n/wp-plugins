<?php

declare(strict_types=1);

namespace Axeptio\SDK\Cookies\CookieType;

use Axeptio\SDK\Cookies\Contract\CookieInterface;

class AuthorizedVendorCookies extends AbstractCookie implements CookieInterface
{
    protected const COOKIE_NAME = 'axeptio_authorized_vendors';

    protected array $userPreferences = [];

    public function getUserPreferences(): array
    {
        return $this->userPreferences;
    }

    public function setUserPreferences(array $userPreferences): void
    {
        $this->userPreferences = $userPreferences;
    }

    public function getCookieData(): string
    {
        return sprintf(',%s,', implode(',', array_filter($this->getUserPreferences())));
    }

    public function getCookieName(): string
    {
        return self::COOKIE_NAME;
    }
}
