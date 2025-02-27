<?php

namespace ShopMagicVendor\Getresponse\Sdk\Client\Authentication;

use ShopMagicVendor\Psr\Http\Message\RequestInterface;
/**
 * Interface AuthenticationProvider
 * @package Getresponse\Sdk\Client\Authentication
 */
interface AuthenticationProvider
{
    /**
     * @param RequestInterface $request
     * @return RequestInterface
     */
    public function authenticate(RequestInterface $request);
}
