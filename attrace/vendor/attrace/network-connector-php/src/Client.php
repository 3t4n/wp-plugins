<?php

namespace Attrace\Connector;

use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Exceptions\AttraceException;
use Attrace\Connector\MasterTag\TagManager;
use Attrace\Connector\Service\Service;
use Attrace\Connector\Util\Log;

class Client
{

    /**
     * Config fields:
     * attrace_key: When there is no Account on the request, this key is used as fallback.
     * attrace_network: lonet, testnet, betanet
     * attrace_discovery_manifest: Only required for lonet
     */
    private $config;


    /** @var Service $service */
    private $service;

    /** @var TagManager $tagManager */
    private $tagManager;


    /**
     * Create a new Skeleton Instance
     * @param array $config Configuration
     * @throws AttraceException
     */
    public function __construct(Array $config)
    {
        $this->checkConfig($config);
        if (isset($config['debug'])) {
            Log::$debug = true;
        }
        $this->config = $config;
        
        
    }


    /**
     * Check config
     *
     * @param array $config
     * @throws AttraceException
     */
    private function checkConfig(Array $config)
    {
        if (!isset($config[Constants::CONFIG_ATTRACE_NETWORK])) {
            throw new AttraceException(AttraceException::ATTRACE_NETWORK_MISSING, 'Missing \'' . Constants::CONFIG_ATTRACE_NETWORK . '\' in config');
        }

        if (!in_array($config[Constants::CONFIG_ATTRACE_NETWORK], ['lonet', 'testnet', 'betanet'])) {
            throw new AttraceException(AttraceException::ATTRACE_NETWORK_INVALID, 'Invalid \'' . Constants::CONFIG_ATTRACE_NETWORK . '\' in config: ' . $config[Constants::CONFIG_ATTRACE_NETWORK] . ' should be lonet, testnet or betanet');
        }

        if ($config[Constants::CONFIG_ATTRACE_NETWORK] !== 'lonet') {
            return;
        }

        if (!isset($config[Constants::CONFIG_ATTRACE_DISCOVERY_MANIFEST])) {
            throw new AttraceException(AttraceException::ATTRACE_DISCOVERY_MANIFEST_MISSING, 'Missing \'' . Constants::CONFIG_ATTRACE_DISCOVERY_MANIFEST . '\' in config, this is required when using the lonet network');
        }
    }

    /**
     * @return Service
     * @throws AttraceException
     */
    public function getService()
    {
        //dynamic creation
        if (!$this->service) {
            /**
             * init service
             */
            $this->service = new Service($this->config[Constants::CONFIG_ATTRACE_NETWORK], isset($this->config[Constants::CONFIG_ATTRACE_DISCOVERY_MANIFEST])?$this->config[Constants::CONFIG_ATTRACE_DISCOVERY_MANIFEST]: null);
        }
        return $this->service;
    }

    /**
     * @return TagManager
     */
    public function getTagManager()
    {
		if (!$this->tagManager) {
			/**
			 * init Mtag
			 */
			$this->tagManager = new TagManager();
		}
		
        return $this->tagManager;
    }


}
