<?php

namespace ShopMagicVendor\Getresponse\Sdk;

use ShopMagicVendor\Getresponse\Sdk\Client\Debugger\DataCollector;
use ShopMagicVendor\Getresponse\Sdk\Client\Debugger\Debugger;
use ShopMagicVendor\Getresponse\Sdk\Client\Debugger\DebugLogger;
use ShopMagicVendor\Getresponse\Sdk\Client\Debugger\Logger;
use ShopMagicVendor\Getresponse\Sdk\Client\Exception\InvalidDomainException;
use ShopMagicVendor\Getresponse\Sdk\Client\GetresponseClient;
use ShopMagicVendor\Getresponse\Sdk\Client\Handler\CurlRequestHandler;
use ShopMagicVendor\Getresponse\Sdk\Authentication\ApiKey;
use ShopMagicVendor\Getresponse\Sdk\Authentication\OAuth;
use ShopMagicVendor\Getresponse\Sdk\Environment\GetResponse;
use ShopMagicVendor\Getresponse\Sdk\Environment\GetResponseEnterprisePL;
use ShopMagicVendor\Getresponse\Sdk\Environment\GetResponseEnterpriseUS;
/**
 * Class GetresponseClientFactory
 * @package Getresponse\Sdk\Client
 */
class GetresponseClientFactory
{
    /**
     * @param string $apiKey
     * @return GetresponseClient
     */
    public static function createWithApiKey($apiKey)
    {
        return new GetresponseClient(new CurlRequestHandler(), new GetResponse(), new ApiKey($apiKey));
    }
    /**
     * @param string $apiKey
     * @param string $domain
     * @return GetresponseClient
     * @throws InvalidDomainException
     */
    public static function createEnterprisePLWithApiKey($apiKey, $domain)
    {
        return new GetresponseClient(new CurlRequestHandler(), new GetResponseEnterprisePL($domain), new ApiKey($apiKey));
    }
    /**
     * @param string $apiKey
     * @param string $domain
     * @return GetresponseClient
     * @throws InvalidDomainException
     */
    public static function createEnterpriseUSWithApiKey($apiKey, $domain)
    {
        return new GetresponseClient(new CurlRequestHandler(), new GetResponseEnterpriseUS($domain), new ApiKey($apiKey));
    }
    /**
     * @param string $accessToken
     * @return GetresponseClient
     */
    public static function createWithAccessToken($accessToken)
    {
        return new GetresponseClient(new CurlRequestHandler(), new GetResponse(), new OAuth($accessToken));
    }
    /**
     * @param string $accessToken
     * @param string $domain
     * @return GetresponseClient
     * @throws InvalidDomainException
     */
    public static function createEnterprisePLWithAccessToken($accessToken, $domain)
    {
        return new GetresponseClient(new CurlRequestHandler(), new GetResponseEnterprisePL($domain), new OAuth($accessToken));
    }
    /**
     * @param string $accessToken
     * @param string $domain
     * @return GetresponseClient
     * @throws InvalidDomainException
     */
    public static function createEnterpriseUSWithAccessToken($accessToken, $domain)
    {
        return new GetresponseClient(new CurlRequestHandler(), new GetResponseEnterpriseUS($domain), new OAuth($accessToken));
    }
    /**
     * @param GetresponseClient $client
     * @return Debugger
     */
    public static function createDebugger(GetresponseClient $client)
    {
        $dataCollector = new DataCollector();
        $client->setLogger(new Logger(new DebugLogger($dataCollector)));
        return new Debugger($dataCollector);
    }
}
