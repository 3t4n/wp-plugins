<?php

declare(strict_types=1);

namespace Axeptio\SDK\Cookies\Builder;

use Axeptio\SDK\Cookies\Contract\CookieBuilderInterface;
use Axeptio\SDK\Cookies\CookieType\AllVendorCookies;

class AllVendorCookiesBuilder extends AbstractBuilder implements CookieBuilderInterface
{
    public function init(): void
    {
        $this->cookie = new AllVendorCookies();
    }

    public function setVendors(array $vendors): void
    {
        $this->cookie->setVendors($vendors);
    }

    public function create(): AllVendorCookies
    {
        $result = $this->cookie;
        $this->init();

        return $result;
    }
}
