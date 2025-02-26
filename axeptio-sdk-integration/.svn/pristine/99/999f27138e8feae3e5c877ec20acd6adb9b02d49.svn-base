<?php

declare(strict_types=1);

namespace Axeptio\SDK\Cookies\CookieType;

use Axeptio\SDK\Cookies\Contract\CookieInterface;

class AllVendorCookies extends AbstractCookie implements CookieInterface
{
    protected const COOKIE_NAME = 'axeptio_all_vendors';

    protected array $vendors = [];

    public function setVendors(array $vendors): void
    {
        $this->vendors = $vendors;
    }

    public function getVendors(): array
    {
        return $this->vendors;
    }

    public function getCookieData(): string
    {
        return sprintf(',%s,', implode(',', $this->getVendors()));
    }

    public function getCookieName(): string
    {
        return self::COOKIE_NAME;
    }
}
