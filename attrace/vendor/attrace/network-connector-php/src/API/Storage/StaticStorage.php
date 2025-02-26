<?php


namespace Attrace\Connector\API\Storage;


use Attrace\Connector\API\Model\IntegrationConfigModel;
use Attrace\Connector\API\Model\TransactionModel;
use Attrace\Connector\Exceptions\AttraceException;


/**
 * Static storage is just to preconfigure everything, without possibility to insert or update entries
 *
 * Class StaticStorage
 * @package Attrace\Connector\API\Storage
 */
class StaticStorage extends AbstractStorage
{
    protected $storageName = "static";

    protected $hasStore = false;

    private $config;
    private $integrationConfigs;


    public function __construct($config = [], $integrationConfigs = []) {
        $this->config  = $config;
        $this->integrationConfigs  = $integrationConfigs;
    }


    public function set($key, $blob, $modelClass)
    {
        throw new AttraceException(AttraceException::NOT_SUPPORTED, "This method is not supported within Static Storage");
    }


    public function getConfig($key)
    {
        return isset($this->config[$key]) ? $this->config[$key] : null;
    }

    public function getAllConfig()
    {
        return $this->config;
    }


    public function getIntegrationConfig($key)
    {
        throw new AttraceException(AttraceException::NOT_SUPPORTED, "Generic function not supported");
    }

    public function getAllIntegrationConfig()
    {
        $return = [];
        foreach ($this->integrationConfigs as $blob) {
            $config = new IntegrationConfigModel();
            $config->setData($blob);
            $return[] = $config;
        }
        return $return;
    }

    public function getTransactionsToProcess()
    {
        return null;
    }

    public function setTransaction($key, TransactionModel $tx)
    {
        return null;
    }

    public function setTransactionFields($hash, $data)
    {
        return null;
    }

    public function setIntegrationConfig($key, IntegrationConfigModel $config)
    {
        return null;
    }

    public function setConfig($key, $value)
    {
        return null;
    }

    public function deleteIntegrationConfig($key)
    {
        // TODO: Implement deleteIntegrationConfig() method.
    }

    public function deleteConfig($key)
    {
        // TODO: Implement deleteConfig() method.
    }

    public function getRawTransactionBatch($from, $to, $limit, $offset)
    {
        // TODO: Implement getRawTransactionBatch() method.
    }

    public function getRawIntegrationConfigBatch($limit, $offset)
    {
        // TODO: Implement getRawIntegrationConfigBatch() method.
    }

    public function destroyConfig()
    {
        // TODO: Implement destroyConfig() method.
    }

    public function destroyIntegrationConfig()
    {
        // TODO: Implement destroyIntegrationConfig() method.
    }

    public function destroyTransaction()
    {
        // TODO: Implement destroyTransaction() method.
    }

    public function initConfig()
    {
        // TODO: Implement initConfig() method.
    }

    public function initIntegrationConfig()
    {
        // TODO: Implement initIntegrationConfig() method.
    }

    public function initTransaction()
    {
        // TODO: Implement initTransaction() method.
    }
}
