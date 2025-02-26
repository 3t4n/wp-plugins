<?php


namespace Attrace\Connector\API\Storage;


use Attrace\Connector\API\Model\IntegrationConfigModel;
use Attrace\Connector\API\Model\TransactionModel;

abstract class AbstractStorage
{
    protected $hasStore = true;

    protected $storageName;

    public function getAll($modelClass)
    {
        $functionName = "getAll" . $modelClass;
        return $this->{$functionName}();
    }


    public function get($key, $modelClass)
    {
        $functionName = "get" . $modelClass;
        return $this->{$functionName}($key);
    }

    public function delete($key, $modelClass)
    {
        $functionName = "delete" . $modelClass;
        return $this->{$functionName}($key);
    }

    public function set($key, $blob, $modelClass)
    {
        $functionName = "set" . $modelClass;
        return $this->{$functionName}($key, $blob);
    }    
    
    public function init($modelClass)
    {
        $functionName = "init" . $modelClass;
        $this->{$functionName}();
    }

    public function destroy($modelClass)
    {
        $functionName = "destroy" . $modelClass;
        $this->{$functionName}();
    }

    /**
     * @return mixed
     */
    public function hasStore()
    {
        return $this->hasStore;
    }

    /**
     * @return TransactionModel[]
     */
    public abstract function getTransactionsToProcess();

    public abstract function getRawTransactionBatch($from, $to, $limit, $next);

    public abstract function setTransaction($key, TransactionModel $tx);

    public abstract function setTransactionFields($hash, $data);

    public abstract function setIntegrationConfig($key, IntegrationConfigModel $config);

    public abstract function getAllIntegrationConfig();

    public abstract function getRawIntegrationConfigBatch($limit, $next);

    public abstract function getIntegrationConfig($key);

    public abstract function deleteIntegrationConfig($key);

    public abstract function getConfig($key);

    public abstract function deleteConfig($key);

    public abstract function getAllConfig();

    public abstract function setConfig($key, $value);

    public abstract function destroyConfig();

    public abstract function destroyIntegrationConfig();

    public abstract function destroyTransaction();

    public abstract function initConfig();

    public abstract function initIntegrationConfig();

    public abstract function initTransaction();

    /**
     * @return string
     */
    public function getStorageName()
    {
        return $this->storageName;
    }
}