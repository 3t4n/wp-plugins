<?php

namespace ShopMagicVendor\Getresponse\Sdk\Authentication;

use ShopMagicVendor\Getresponse\Sdk\Client\Authentication\AuthenticationProvider;
use ShopMagicVendor\Psr\Http\Message\RequestInterface;
/**
 * Class OAuth
 * @package Getresponse\Sdk\Authentication
 */
class OAuth implements AuthenticationProvider
{
    public const HEADER_PREFIX = 'Bearer ';
    /**
     * @var string
     */
    private $accessToken;
    /**
     * OAuth constructor.
     * @param string $accessToken
     */
    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }
    /**
     * @param RequestInterface $request
     * @return RequestInterface
     */
    public function authenticate(RequestInterface $request)
    {
        return $request->withHeader('Authorization', self::HEADER_PREFIX . $this->accessToken);
    }
}
