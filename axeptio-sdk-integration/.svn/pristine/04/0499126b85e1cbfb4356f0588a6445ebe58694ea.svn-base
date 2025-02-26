<?php

declare(strict_types=1);

namespace Axeptio\SDK\Cookies\CookieType;

abstract class AbstractCookie
{
    public const EXPIRES_OPTION_KEY = 'expires';
    public const PATH_OPTION_KEY = 'path';
    public const SECURE_OPTION_KEY = 'secure';
    public const HTTPONLY_OPTION_KEY = 'httponly';
    public const SAMESITE_OPTION_KEY = 'samesite';

    protected int $expiry = 86400;
    protected string $path = '/';
    protected bool $secure = true;
    protected bool $httponly = true;
    protected string $sameSite = 'Strict';

    abstract public function getCookieName(): string;

    abstract public function getCookieData(): string;

    public function set(): bool
    {
        /* @phpstan-ignore-next-line */
        return setcookie($this->getCookieName(), $this->getCookieData(), $this->getCookieOptions());
    }

    public function getCookieOptions(): array
    {
        return [
            self::EXPIRES_OPTION_KEY  => time() + $this->getExpiry(),
            self::PATH_OPTION_KEY     => $this->getPath(),
            self::SECURE_OPTION_KEY   => $this->isSecure(),
            self::HTTPONLY_OPTION_KEY => $this->isHttponly(),
            self::SAMESITE_OPTION_KEY => $this->getSamesite()
        ];
    }

    public function getExpiry(): int
    {
        return $this->expiry;
    }

    public function setExpiry(int $expiry): void
    {
        $this->expiry = $expiry;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function isSecure(): bool
    {
        return $this->secure;
    }

    public function setSecure(bool $secure): void
    {
        $this->secure = $secure;
    }

    public function isHttponly(): bool
    {
        return $this->httponly;
    }

    public function setHttponly(bool $httponly): void
    {
        $this->httponly = $httponly;
    }

    public function getSameSite(): string
    {
        return $this->sameSite;
    }

    public function setSameSite(string $sameSite): void
    {
        $this->sameSite = $sameSite;
    }
}
