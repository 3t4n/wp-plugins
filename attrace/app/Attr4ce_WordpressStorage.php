<?php


use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Controller\IntegrationConfigController;
use Attrace\Connector\API\Controller\TransactionController;
use Attrace\Connector\API\Model\ConfigModel;
use Attrace\Connector\API\Model\IntegrationConfigModel;
use Attrace\Connector\API\Model\TransactionModel;
use Attrace\Connector\API\Storage\AbstractStorage;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Exceptions\AttraceException;

/**
 * Class Attr4ce_WordpressStorage
 *
 * Extension of normal Mysql Storage
 */
class Attr4ce_WordpressStorage extends AbstractStorage
{
    const KEY   = 'a_key';
    const VALUE = 'a_value';
    protected $storageName = "wordpress-storage";

    public static function initStorage()
    {
        $storage = new Attr4ce_WordpressStorage();
        IntegrationConfigController::getInstance()->setStorage($storage);
        TransactionController::getInstance()->setStorage($storage);
        ConfigController::getInstance()->setStorage($storage);
    }

    /**
     * Wordpress storage for this crap
     */
    public function getConfig($key)
    {
        if ($key == ConfigModel::PROTOCOLMODE) {
            return ConfigModel::PROTOCOLMODE_FALLBACK;
        }
        $options = get_option(Attr4ce_Constants::OPTION_GROUP);
        return isset($options[$key]) ? $options[$key] : null;
    }

    public function getAllConfig()
    {
        $return = get_option(Attr4ce_Constants::OPTION_GROUP);;
        $return[ConfigModel::PROTOCOLMODE] = ConfigModel::PROTOCOLMODE_FALLBACK;
        return $return;
    }

    public function setConfig($key, $value)
    {
        //do NOT user this from settings page.
        $options       = get_option(Attr4ce_Constants::OPTION_GROUP);
        $options[$key] = $value;

        update_option(Attr4ce_Constants::OPTION_GROUP, $options);
    }

    public function deleteConfig($key)
    {
        //do NOT user this from settings page.
        $options = get_option(Attr4ce_Constants::OPTION_GROUP);
        if (isset($options[$key])) {
            unset($options[$key]);
        }

        update_option(Attr4ce_Constants::OPTION_GROUP, $options);
    }


    /**
     * Transactions
     *
     */

    public function getTransactionsToProcess()
    {
        global $wpdb;
        $table  = $this->getPrefix() . Constants::TABLE_TX;
        $res    = $wpdb->get_results("SELECT * FROM {$table} WHERE synced = 0 AND retries < " . Constants::TX_RETRIES . " ORDER BY ts limit " . Constants::TX_BATCH, ARRAY_A);
        $return = [];
        foreach ($res as $row) {
            try {
                $tx = TransactionModel::createFromBinary($row[self::VALUE]);
                $tx->setRetries($row['retries']);
                $return[] = $tx;
            } catch (AttraceException $e) {
                echo "ERROR";
                echo $e->toString();
            }
        }
        return $return;
    }

    public function getRawTransactionBatch($from, $to, $limit, $next)
    {
        global $wpdb;
        $table = $this->getPrefix() . Constants::TABLE_TX;

        if (!$next) {
            $sqlStatement = $wpdb->prepare("SELECT * FROM {$table} WHERE ts >= %d AND ts < %d ORDER BY ts DESC LIMIT %d ", [$from, $to, $limit]);
        } else {
            $sqlStatement = $wpdb->prepare("SELECT * FROM {$table} WHERE ts >= %d AND ts < %d AND id < %d ORDER BY ts DESC LIMIT %d ", [$from, $to, $next, $limit]);
        }

        $res = $wpdb->get_results($sqlStatement, ARRAY_A);

        $lastId = null;
        $newRes = [];
        foreach ($res as $entry) {
            $entry['value'] = base64_encode($entry[self::VALUE]);
            unset($entry[self::VALUE]);

            $entry['key'] = $entry[self::KEY];
            unset($entry[self::KEY]);

            //convert null strings to proper null;
            if ($entry['metadata'] == "null") {
                $entry['metadata'] = null;
            }

            //force convert int fields in case of wrong database type conversion
            foreach (['retries', 'synced', 'ts'] as $intField) {
                $entry[$intField] = intval($entry[$intField]);
            }


            //Id should should be string too
            $entry['id'] = $entry['id'] . "";
            $lastId      = $entry['id'];
            foreach ($entry as $ky => $value) {
                $newEntry[ucfirst($ky)] = $entry[$ky];
            }
            $newRes[] = $newEntry;
        }
        return [
            'Items' => $newRes,
            'Next'  => $lastId
        ];
    }

    public function setTransaction($key, \Attrace\Connector\API\Model\TransactionModel $tx)
    {
        $table = $this->getPrefix() . Constants::TABLE_TX;
        $data  = [
            self::KEY   => $key,
            'ts'        => $tx->getProtocolTransaction()->getTimestamp(),
            self::VALUE => $tx->getProtocolTransaction()->serializeToString(),
            'metadata'  => json_encode($tx->getMetadata()),
        ];
        $this->upsert($table, $data);
    }

    public function setTransactionFields($hash, $data)
    {
        global $wpdb;
        $table = $this->getPrefix() . Constants::TABLE_TX;
        $wpdb->update($table, $data, [self::KEY => $hash]);
    }

    /**
     * Integration Config
     *
     */


    public function setIntegrationConfig($key, \Attrace\Connector\API\Model\IntegrationConfigModel $config)
    {
        $table = $this->getPrefix() . Constants::TABLE_INTEGRATION_CONFIG;
        $data  = [
            self::KEY   => $key,
            self::VALUE => $config->getProtocolIntegrationConfig()->serializeToJsonString()
        ];
        $this->upsert($table, $data);
    }

    public function getAllIntegrationConfig()
    {
        global $wpdb;
        $table  = $this->getPrefix() . Constants::TABLE_INTEGRATION_CONFIG;
        $res    = $wpdb->get_results("SELECT * FROM {$table}", ARRAY_A);
        $return = [];
        foreach ($res as $row) {
            $config = new IntegrationConfigModel();
            $config->setData($row[self::VALUE]);
            $return[] = $config;
        }
        return $return;
    }

    public function getRawIntegrationConfigBatch($limit, $next)
    {
        global $wpdb;
        $table  = $this->getPrefix() . Constants::TABLE_INTEGRATION_CONFIG;
        $sql    = $wpdb->prepare("SELECT * FROM {$table} WHERE id > %d ORDER BY id limit %d ",  [$next, $limit]);
        $res    = $wpdb->get_results($sql, ARRAY_A);
        $lastId = 0;
        $newRes = [];
        foreach ($res as $entry) {
            $newRes[]    = json_decode($entry[self::VALUE], true);
            $entry['id'] = $entry['id'] . "";
            $lastId      = $entry['id'];
        }
        return [
            'Items' => $newRes,
            'Next'  => $lastId
        ];
    }

    public function getIntegrationConfig($key)
    {
        global $wpdb;
        $table = $this->getPrefix() . Constants::TABLE_INTEGRATION_CONFIG;
        $sql   = $wpdb->prepare("SELECT * FROM {$table} WHERE " . self::KEY . " =  %s", [$key]);
        $res   = $wpdb->get_row($sql, ARRAY_A);
        if (!isset($res[self::VALUE])) {
            return null;
        }
        $config = new IntegrationConfigModel();
        $config->setData($res[self::VALUE]);
        return $config;
    }

    public function deleteIntegrationConfig($key)
    {
        global $wpdb;
        $table = $this->getPrefix() . Constants::TABLE_INTEGRATION_CONFIG;
        $wpdb->delete($table, [self::KEY => $key]);
    }


    public function destroyConfig()
    {
        //skip handled by Wordpress
    }

    public function destroyIntegrationConfig()
    {
        //skip handled by Wordpress
    }

    public function destroyTransaction()
    {
        //skip handled by Wordpress
    }

    public function initConfig()
    {
        //skip handled by Wordpress
    }

    public function initIntegrationConfig()
    {
        //skip handled by Wordpress
    }

    public function initTransaction()
    {
        //skip handled by Wordpress
    }

    /**
     * @return mixed
     */
    public function getPrefix()
    {
        global $wpdb;
        return $wpdb->prefix;
    }


    /**
     * First we check if there exists a row with the _key column as specified
     * If yes, update
     * If no, insert
     *
     * Tried this with on duplicate key, but this gives hell in WP.
     *
     * @param $table
     * @param $data
     */
    public function upsert($table, $data)
    {
        global $wpdb;
        if (isset($data[self::KEY])) {
            $key    = $data[self::KEY];
            $sql    = $wpdb->prepare("SELECT * FROM {$table} where " . self::KEY . " =  %s", [$key]);
            $result = $wpdb->get_row($sql);
            if ($result) {
                //update the data
                $wpdb->update($table, $data, [self::KEY => $key]);
                return;
            }
        }
        //insert the data
        $wpdb->insert($table, $data);
    }

}