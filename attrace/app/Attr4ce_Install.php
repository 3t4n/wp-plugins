<?php

use Attrace\Connector\Constants\Constants;

include_once 'lib/Attr4ce_Constants.php';

class Attr4ce_Install
{
	
    public function install()
    {
        $this->createTable();
    }

    private function createTable()
    {
        update_option(Attr4ce_Constants::OPTION_GROUP_DB, Attr4ce_Constants::DB_CURRENT_VERSION);
    }
	
	public function uninstall()
	{
		//wp_clear_scheduled_hook(Attr4ce_Constants::QUEUE_HOOK); // wp_schedule_event() didn't use anymore
	}
	
	public function deleteAll()
	{
		$this->dropTable();
	}
	
	function dropTable()
	{
		GLOBAL $wpdb;
		
		foreach([Constants::TABLE_TX, Constants::TABLE_CONFIG, Constants::TABLE_INTEGRATION_CONFIG] as $table) {
			$sql = "DROP TABLE IF EXISTS {$wpdb->prefix}{$table}";
			$wpdb->query($sql);
		}
		
		delete_option(Attr4ce_Constants::OPTION_GROUP_DB);
	}
	
}
