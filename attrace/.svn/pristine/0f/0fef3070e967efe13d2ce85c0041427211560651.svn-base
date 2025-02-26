<?php


namespace Attrace\Connector\API\Storage;


use Attrace\Connector\API\Model\IntegrationConfigModel;
use Attrace\Connector\API\Model\TransactionModel;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Exceptions\AttraceException;
use PDO;
use PDOException;

class MysqlStorage extends AbstractStorage
{

    //connection
    private $conn;

    private $prefix = '';

    protected $storageName = "mysql";

    /**
     * MysqlStorage constructor.
     * @param $servername
     * @param $username
     * @param $password
     * @param $dbname
     * @param int $port
     * @param string $charset
     * @throws AttraceException
     */
    public function __construct($servername, $username, $password, $dbname, $port = 3306, $charset = 'utf8mb4')
    {
        $dsn     = "mysql:host=$servername;port=$port;dbname=$dbname;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $this->conn = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            throw new AttraceException((int)$e->getCode(), $e->getMessage());
        }
    }

    public function __destruct()
    {
        $this->conn = null;
    }


    //ConfigModel Model
    public function initConfig()
    {
        $table = $this->getPrefix() . Constants::TABLE_CONFIG;
        $sql =
            "CREATE TABLE IF NOT EXISTS `$table` (
              `key` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
              `value` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
             PRIMARY KEY (`key`)
            )";
        $this->conn->query($sql);
        //Init
    }


    //ConfigModel Model
    public function destroyConfig()
    {
        $this->destroyTable(Constants::TABLE_CONFIG);
    }

    public function destroyIntegrationConfig()
    {
        $this->destroyTable(Constants::TABLE_INTEGRATION_CONFIG);
    }

    public function destroyTransaction()
    {
        $this->destroyTable(Constants::TABLE_TX);
    }


    public function getConfig($key)
    {
        $table = $this->getPrefix() . Constants::TABLE_CONFIG;
        $stmt  = $this->conn->prepare("select `value` from $table where `key` = :key");
        $stmt->execute(['key' => $key]);
        $res = $stmt->fetch();
        if (isset($res['value'])) {
            return $res['value'];
        }
        return null;
    }

    public function getAllConfig()
    {
        $table = $this->getPrefix() . Constants::TABLE_CONFIG;
        $stmt  = $this->conn->prepare("select * from $table");
        $stmt->execute();
        $res = $stmt->fetchAll();
		if(empty($res))
			return [];
		
        $return = [];
        foreach ($res as $row) {
            $return[$row['key']] = $row['value'];
        }
        return $return;
    }

    public function setConfig($key, $value)
    {
        $table = $this->getPrefix() . Constants::TABLE_CONFIG;
        $data  = [
            'key'   => $key,
            'value' => $value
        ];
        $this->upsert($table, $data);
    }

    public function deleteConfig($key)
    {
        $table = $this->getPrefix() . Constants::TABLE_CONFIG;

        $stmt = $this->conn->prepare("delete from $table where `key` = :key");

        $stmt->execute(['key' => $key]);
    }

    //
    //ConfigModel Model
    public function initIntegrationConfig($integrationConfigs = null)
    {
        $table = $this->getPrefix() . Constants::TABLE_INTEGRATION_CONFIG;
        
		$sql =
			"CREATE TABLE IF NOT EXISTS `$table` (
		  `id` int NOT NULL AUTO_INCREMENT,
		  `key` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
		  `value` text CHARACTER SET utf8 COMMENT 'IntegrationConfig JSON',
		 PRIMARY KEY (`id`)
		)";
		$this->conn->query($sql);

        if (!$integrationConfigs) {
            return;
        }
        //insert seeded integration configs
        foreach ($integrationConfigs as $blob) {
            $config = new IntegrationConfigModel();
            $config->setData($blob);
            $this->setIntegrationConfig($config->getUniqueKey(), $config);
        }
    }

    public function setIntegrationConfig($key, IntegrationConfigModel $config)
    {
        $table = $this->getPrefix() . Constants::TABLE_INTEGRATION_CONFIG;
        $data  = [
            'key'   => $key,
            'value' => $config->getProtocolIntegrationConfig()->serializeToJsonString()
        ];
        $this->upsert($table, $data);
    }

    public function getIntegrationConfig($key)
    {
        $table = $this->getPrefix() . Constants::TABLE_INTEGRATION_CONFIG;

        $stmt = $this->conn->prepare("select `value` from $table where `key` = :key");
        $stmt->execute(['key' => $key]);
        $res = $stmt->fetch();
        if (!isset($res['value'])) {
            return null;
        }
        $config = new IntegrationConfigModel();
        $config->setData($res['value']);
        return $config;
    }

    public function deleteIntegrationConfig($key)
    {
        $table = $this->getPrefix() . Constants::TABLE_INTEGRATION_CONFIG;

        $stmt = $this->conn->prepare("delete from $table where `key` = :key");

        $stmt->execute(['key' => $key]);
    }

    public function getAllIntegrationConfig()
    {
        $table = $this->getPrefix() . Constants::TABLE_INTEGRATION_CONFIG;
        $stmt  = $this->conn->prepare("select * from $table");
        $stmt->execute();
        $res    = $stmt->fetchAll();
        $return = [];
        foreach ($res as $row) {
            $config = new IntegrationConfigModel();
            $config->setData($row['value']);
            $return[] = $config;
        }
        return $return;
    }

    public function getRawIntegrationConfigBatch($limit, $next = 0)
    {
        $table        = $this->getPrefix() . Constants::TABLE_INTEGRATION_CONFIG;
        $sqlStatement = "select * from $table where `id` > ? order by `id` limit ? ";
        $stmt         = $this->conn->prepare($sqlStatement);

        $stmt->execute([$next, $limit]);
        $res = $stmt->fetchAll();

        $lastId = 0;
        $newRes = [];
        foreach ($res as $entry) {
            $newRes[]    = json_decode($entry['value'], true);
            $entry['id'] = $entry['id'] . "";
            $lastId      = $entry['id'];
        }
        return [
            'Items' => $newRes,
            'Next'  => $lastId
        ];
    }


    public function initTransaction()
    {

        $table = $this->getPrefix() . Constants::TABLE_TX;
        
		$sql = "CREATE TABLE IF NOT EXISTS `$table` (
		  `id` int NOT NULL AUTO_INCREMENT,
		  `key` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Transaction Hash (can be checked on the network explorer)',
		  `value` blob NOT NULL COMMENT 'Protobuf Binary',
		  `ts` bigint( 0 ) NOT NULL COMMENT 'Timestamp in milliseconds',
		  `retries` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Number of retries',
		  `synced` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Flag if this transaction is published',
		  `error` text CHARACTER SET utf8 COMMENT 'Error information of last try',
		  `metadata` text CHARACTER SET utf8 COMMENT 'JSON encoded private metadata of this transaction',
		  PRIMARY KEY (`id`),
		  KEY index_ts (`ts`),
		  KEY index_key (`key`)
		)";
		
		return $this->conn->query($sql);
    }

    /**
     * @param $key
     * @param TransactionModel $tx
     */
    public function setTransaction($key, TransactionModel $tx)
    {
        $table = $this->getPrefix() . Constants::TABLE_TX;
        $data  = [
            'key'      => $key,
            'ts'       => $tx->getProtocolTransaction()->getTimestamp(),
            'value'    => $tx->getProtocolTransaction()->serializeToString(),
            'metadata' => json_encode($tx->getMetadata()),
        ];
        $this->upsert($table, $data);
    }

    /**
     * @param $key
     * @return TransactionModel|null
     * @throws AttraceException
     */
    public function getTransaction($key)
    {
        $table = $this->getPrefix() . Constants::TABLE_TX;
        $stmt  = $this->conn->prepare("select * from $table where `key` = :key");
        $stmt->execute(['key' => $key]);
        $res = $stmt->fetch();
        if (isset($res['value'])) {
            $tx = TransactionModel::createFromBinary($res['value']);
            $tx->setMetadata(json_decode($res['metadata'], true));
            $tx->setRetries($res['retries']);
            return $tx;
        }
        return null;
    }

    /**
     * @return array|TransactionModel[]
     */
    public function getTransactionsToProcess()
    {
        $table = $this->getPrefix() . Constants::TABLE_TX;
        $stmt  = $this->conn->prepare("select * from $table where synced = 0 and retries < " . Constants::TX_RETRIES . " order by `ts` limit " . Constants::TX_BATCH);
        $stmt->execute();
        $res    = $stmt->fetchAll();
        $return = [];
        foreach ($res as $row) {
            try {
                $tx = TransactionModel::createFromBinary($row['value']);
                $tx->setRetries($row['retries']);
                $return[] = $tx;
            } catch (AttraceException $e) {
                echo "ERROR";
                echo $e->toString();
            }
        }
        return $return;
    }

    public function getRawTransactionBatch($from, $to, $limit, $next = 0)
    {
        $table = $this->getPrefix() . Constants::TABLE_TX;

        if (!$next) {
            $sqlStatement = "select * from $table where `ts` >= ? and `ts` < ? order by `ts` desc limit ? ";
            $stmt         = $this->conn->prepare($sqlStatement);
            $stmt->execute([$from, $to, $limit]);
        } else {
            $sqlStatement = "select * from $table where `ts` >= ? and `ts` < ? and `id` < ? order by `ts` desc limit ? ";
            $stmt         = $this->conn->prepare($sqlStatement);
            $stmt->execute([$from, $to, $next, $limit]);
        }


        $res = $stmt->fetchAll();

        $lastId = null;
        $newRes = [];
        foreach ($res as $entry) {
            $entry['value'] = base64_encode($entry['value']);
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


    public function setTransactionFields($hash, $data)
    {

        $table = $this->getPrefix() . Constants::TABLE_TX;

        $colArr   = [];
        $valueArr = [];
        foreach ($data as $col => $value) {
            $colArr[]   = "`$col` = ?";
            $valueArr[] = $value;
        }
        $cols       = implode(', ', $colArr);
        $stmt       = $this->conn->prepare(
            "update $table set $cols where `key` = ?"
        );
        $valueArr[] = $hash;
        $stmt->execute($valueArr);
    }

    /**
     * @return mixed
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param mixed $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = str_replace('.', '_', trim($prefix));
    }

    /**
     * upsert table, key - val array
     *
     * @param $table
     * @param $data
     */
    public function upsert($table, $data)
    {
        $updateArr = [];
		foreach($data as $key => $value) {
			$updateArr[] = '`' . $key . '` = ?';
		}
		$update = implode(', ', $updateArr);
		
		$sql  = "INSERT INTO {$table}
                SET {$update}
                ON DUPLICATE KEY UPDATE {$update}";
		$stmt = $this->conn->prepare($sql);
		$values = array_values($data);
		$stmt->execute(array_merge($values, $values));
	}

    public function destroyTable($table)
    {
        $table = $this->getPrefix() . $table;
        
        $sql =
            "DROP TABLE IF EXISTS `$table`";
        $this->conn->query($sql);
        //destroyed
    }

}
