<?php

declare(strict_types=1);

namespace Axeptio\SDK\Cookies;

use Axeptio\SDK\Cookies\Contract\CookieInterface;
use Axeptio\SDK\Cookies\CookieType\AllVendorCookies;
use Axeptio\SDK\Cookies\CookieType\AuthorizedVendorCookies;
use Axeptio\SDK\Cookies\CookieType\AxeptioCookies;
use Axeptio\SDK\Cookies\Exception\UndefinedCookie;
use LogicException;

class AxeptioCookieManager
{
    private array $cookieInstances = [
        AxeptioCookies::class          => null,
        AuthorizedVendorCookies::class => null,
        AllVendorCookies::class        => null
    ];

    public function getCookiesInstances(): array
    {
        return $this->cookieInstances;
    }

    public function addAxeptioCookies(AxeptioCookies $axeptioCookies): void
    {
        $this->cookieInstances[AxeptioCookies::class] = $axeptioCookies;
    }

    public function addAuthorizedVendorCookies(AuthorizedVendorCookies $authorizedVendorCookies): void
    {
        $this->cookieInstances[AuthorizedVendorCookies::class] = $authorizedVendorCookies;
    }

    public function addAllVendorCookies(AllVendorCookies $allVendorCookies): void
    {
        $this->cookieInstances[AllVendorCookies::class] = $allVendorCookies;
    }

    /**
     * @throws UndefinedCookie
     */
    public function set(): void
    {
        $this->ensureAllCookieAreDefined();
        $this->setCookies();
    }

    public function setCookies(): void
    {
        foreach ($this->cookieInstances as $instance) {
            $instance->set();
        }
    }

    public function ensureAllCookieAreDefined(): void
    {
        foreach ($this->cookieInstances as $namespace => $instance) {
            if ($instance === null) {
                $className = explode('\\', $namespace);
                $className = array_pop($className);

                throw new UndefinedCookie(
                    "$className has not be set.
                    You must call the add$className method with a $className parameter.
                    You can build this param by using the {$className}Builder"
                );
            }

            if (!$instance instanceof CookieInterface) {
                throw new LogicException(sprintf(
                    '%s must implement %s',
                    $namespace,
                    CookieInterface::class
                ));
            }
        }
    }
}
