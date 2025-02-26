<?php

use Attrace\Connector\API\Model\ConfigModel;
use Attrace\Connector\API\Model\IntegrationConfigModel;
use Attrace\Connector\Constants\Constants;
use Attrace\Connector\Util\Util;

include_once 'lib/Attr4ce_Constants.php';
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

class Attr4ce_Update
{


    public function init()
    {
        $this->checkAndExecuteUpdates();
    }


    /**
     * Use this for migrations. Currently this is all handles by Attrace connector storage, so not needed.
     */
    function checkAndExecuteUpdates()
    {
        global $wpdb;

        //integrationn config

        $table_name = $wpdb->prefix . Constants::TABLE_INTEGRATION_CONFIG;

        $charset_collate = $wpdb->get_charset_collate();
        $sql             = "CREATE TABLE $table_name (
          id mediumint(9) NOT NULL AUTO_INCREMENT,
          a_key varchar(255) CHARACTER SET utf8 DEFAULT '' NOT NULL COMMENT 'Unique key constructed by agreement hash plus delegate public address',
          a_value text CHARACTER SET utf8 COMMENT 'IntegrationConfig JSON',
          PRIMARY KEY  (id),
		  KEY index_key (a_key)          
        ) $charset_collate;";

        dbDelta($sql);

        $table_name = $wpdb->prefix . Constants::TABLE_TX;


        $sql = "CREATE TABLE $table_name (
          id mediumint(9) NOT NULL AUTO_INCREMENT,
          a_key varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Transaction Hash (can be checked on the network explorer)',
		  a_value blob NOT NULL COMMENT 'Protobuf Binary',
		  ts bigint( 0 ) NOT NULL COMMENT 'Timestamp in milliseconds',
		  retries tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Number of retries',
		  synced tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Flag if this transaction is published',
		  error text CHARACTER SET utf8 COMMENT 'Error information of last try',
		  metadata text CHARACTER SET utf8 COMMENT 'JSON encoded private metadata of this transaction',
          PRIMARY KEY  (id),
		  KEY index_ts (ts),
		  KEY index_key (a_key)          
        ) $charset_collate;";


        dbDelta($sql);


        $currentVersion = get_option(Attr4ce_Constants::OPTION_GROUP_DB, -1);
        if ($currentVersion == 5) {
            //we need to migrate the integration without the prefix to current one
            $old_table  = Constants::TABLE_INTEGRATION_CONFIG;
            $res    = $wpdb->get_results("SELECT * FROM {$old_table}", ARRAY_A);
            $return = [];

            $table = $wpdb->prefix . Constants::TABLE_INTEGRATION_CONFIG;
            foreach ($res as $data) {
                $key    = $data['key'];
                //check if not exists
                $sql   = $wpdb->prepare("SELECT * FROM {$table} where a_key =  %s", [$key]);
                $result = $wpdb->get_row($sql);
                unset($data['key']);
                $data['a_key'] = $key;
                $data['a_value'] = $data['value'];
                unset($data['value']);
                if (!$result) {
                    $wpdb->insert($table, $data);
                }
            }
        }

        update_option(Attr4ce_Constants::OPTION_GROUP_DB, Attr4ce_Constants::DB_CURRENT_VERSION);



    }

}