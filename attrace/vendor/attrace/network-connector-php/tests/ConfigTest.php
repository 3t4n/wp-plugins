<?php


namespace Attrace\Connector\Test;


use Attrace\Connector\Client;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Exceptions\AttraceException;

class ConfigTest extends TestCase
{
	
    /**
     * Test that true does in fact equal true
     */
    public function testClientValidConfig()
    {
        $config =
            [
                Constants::CONFIG_ATTRACE_KEY     => 'SOME_KEY',
                Constants::CONFIG_ATTRACE_NETWORK => 'testnet'
            ];
        self::assertNotTrue($this->throwsException($config));
        $config =
            [
                Constants::CONFIG_ATTRACE_KEY     => 'SOME_KEY',
                Constants::CONFIG_ATTRACE_NETWORK => 'betanet'
            ];
        self::assertNotTrue($this->throwsException($config));
        $config =
            [
                Constants::CONFIG_ATTRACE_KEY                => 'SOME_KEY',
                Constants::CONFIG_ATTRACE_NETWORK            => 'lonet',
                Constants::CONFIG_ATTRACE_DISCOVERY_MANIFEST => 'https://lonet',
            ];
        self::assertNotTrue($this->throwsException($config));
    }

    public function testClientInvalidConfigNetworkMissing()
    {
        $config =
            [
                Constants::CONFIG_ATTRACE_KEY => 'SOME_KEY',
            ];

		try {
			new Client($config);
		} catch(AttraceException $e) {
			self::assertTrue($e->getCode() === AttraceException::ATTRACE_NETWORK_MISSING);
		}
    }


    public function testClientInvalidConfigInvalidNetwork()
    {
        $config =
            [
                Constants::CONFIG_ATTRACE_KEY     => 'SOME_KEY',
                Constants::CONFIG_ATTRACE_NETWORK => 'invalid_network',
            ];

		try {
			new Client($config);
		} catch(AttraceException $e) {
			self::assertTrue($e->getCode() === AttraceException::ATTRACE_NETWORK_INVALID);
		}
    }

    public function testClientInvalidConfigNoManifest()
    {
        $config =
            [
                Constants::CONFIG_ATTRACE_KEY     => 'SOME_KEY',
                Constants::CONFIG_ATTRACE_NETWORK => 'lonet',
            ];

		try {
			new Client($config);
		} catch(AttraceException $e) {
			self::assertTrue($e->getCode() === AttraceException::ATTRACE_DISCOVERY_MANIFEST_MISSING);
		}
    }
    
    /**
     * Check if client creations throws exception
     *
     * @param $config
     * @return bool | string
     */
    private function throwsException($config)
    {
        try {
            new Client($config);
        } catch (AttraceException $e) {
            return $e->getCode();
        }
        return false;
    }

}
