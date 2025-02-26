<?php

declare(strict_types=1);

namespace Axeptio\SDK\Cookies\CookieType;

use Axeptio\SDK\Cookies\Contract\CookieInterface;

class AxeptioCookies extends AbstractCookie implements CookieInterface
{
    public const TOKEN_DATA = '$$token';
    public const DATE_DATA = '$$date';
    public const COOKIES_VERSION_DATA = '$$cookiesVersion';
    public const COMPLETE_DATA = '$$completed';
    protected const COOKIE_NAME = 'axeptio_cookies';

    protected string $userToken = '';
    protected array $userPreferences = [];

    public function getUserToken(): string
    {
        return $this->userToken;
    }

    public function setUserToken(string $userToken): void
    {
        $this->userToken = $userToken;
    }

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
        $defaultData = [
            self::TOKEN_DATA           => $this->getUserToken(),
            self::DATE_DATA            => date('c'),
            self::COOKIES_VERSION_DATA => true,
            self::COMPLETE_DATA        => true
        ];

        return json_encode(array_merge($defaultData, $this->getUserPreferences()));
    }

    public function getCookieName(): string
    {
        return self::COOKIE_NAME;
    }
}
