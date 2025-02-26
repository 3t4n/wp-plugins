<?php

declare(strict_types=1);

namespace Axeptio\SDK\Cookies\Builder;

use Axeptio\SDK\Cookies\Contract\CookieInterface;

abstract class AbstractBuilder
{
    protected CookieInterface $cookie;

    abstract public function init(): void;

    public function __construct()
    {
        $this->init();
    }

    public function setExpiry(int $expiry): void
    {
        $this->cookie->setExpiry($expiry);
    }

    public function setPath(string $path): void
    {
        $this->cookie->setPath($path);
    }

    public function setSecure(bool $secure): void
    {
        $this->cookie->setSecure($secure);
    }

    public function setHttponly(bool $httponly): void
    {
        $this->cookie->setHttponly($httponly);
    }

    public function setSameSite(string $sameSite): void
    {
        $this->cookie->setSameSite($sameSite);
    }
}
