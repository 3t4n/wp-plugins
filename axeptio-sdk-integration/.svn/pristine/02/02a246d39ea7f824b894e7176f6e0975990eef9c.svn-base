<?php

declare(strict_types=1);

namespace Axeptio\SDK\Cookies\Contract;

interface CookieInterface
{
    public function set(): bool;

    public function getExpiry(): int;

    public function setExpiry(int $expiry): void;

    public function getPath(): string;

    public function setPath(string $path): void;

    public function isSecure(): bool;

    public function setSecure(bool $secure): void;

    public function isHttponly(): bool;

    public function setHttponly(bool $httponly): void;

    public function getSameSite(): string;

    public function setSameSite(string $sameSite): void;
}
