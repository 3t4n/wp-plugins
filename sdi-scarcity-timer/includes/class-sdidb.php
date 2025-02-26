<?php
/**
 * @package sdi-scarcity
 * @version 0.1
 */

 class SdiDb
 {
 	
 	public $wp;

 	/**
 	 * @var $wpdb
 	 */
 	public $db;

 	public  $prefix;

 	public function __construct()
 	{
 		global $wpdb;
 		$this->db = $wpdb;
 		$this->prefix = $wpdb->prefix;
 	}

 	/**
     * Pass all methods directly 
     *
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, $args = []) 
    {
        return call_user_func_array([$this->db, $method], $args);
    }

 	/**
 	 * Called when activating the plugin
 	 */
 	public  static function activatePlugin()
 	{
 		global $wpdb;
 		$db = $wpdb;

 		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

 		$tableList = $db->get_results("SHOW TABLES");

		$charset_collate = $db->get_charset_collate();
		
		// scarcity_timer
		$table_name = $db->prefix."sdi_scarcity_timer";

		if (!in_array($table_name, $tableList)) {
			$sql = "CREATE TABLE $table_name (
			  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
			  `name` VARCHAR(100) NOT NULL ,  
			  `start_datetime` datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			  `end_datetime` datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			  `headline` VARCHAR(200) NULL ,  
			  `headline_placement` VARCHAR(200) NULL ,  
			  `display` VARCHAR(200) NULL ,  
			  `redirect` VARCHAR(200) NULL ,  
			  `product_id` mediumint(9) DEFAULT '0' NOT NULL,
			  PRIMARY KEY  (id)
			) $charset_collate;";

			dbDelta( $sql );
		}
		
		// sdi_scarcity_timer_user
		$table_name = $db->prefix."sdi_scarcity_timer_users";

		if (!in_array($table_name, $tableList)) {
			
			$sql = "CREATE TABLE $table_name ( 
				`id` INT(100) NOT NULL AUTO_INCREMENT , 
				`timer_id` INT(100) NOT NULL , 
			 	`ip` VARCHAR(100) NOT NULL ,  
			 	`meta` TEXT NOT NULL ,  
				`start_datetime` INT(15) NOT NULL ,    
			 PRIMARY KEY  (`id`)) ENGINE = InnoDB;";

			dbDelta( $sql );
		}
 	}

 	/**
 	 * Called when deactivating the plugin
 	 */
 	public  function deactivatePlugin()
 	{

 	}

 	/**
 	 * Called when deactivating the plugin
 	 * @param string $tableName 
 	 * @param array $args 
 	 * @return array
 	 */
 	public function find($tableName, $args = [])
 	{
 		if (empty($args['fields'])) {
 			$fields = '*';
 		} elseif(!is_array($args['fields'])) {
 			$fields = $args['fields'];
 		} else {
 			$fields = implode(',', $args['fields']);
 		}

 		$where = '';
 		if (!empty($args['condition'])) {
 			$where = ' WHERE '.$args['condition'];
 		}
 		$order = '';
 		if (!empty($args['orderby'])) {
 			$order = ' ORDER BY ' .$args['orderby'];
 			if (!empty($args['order'])) {
 				$order .= $args['order'];
 			} else {
 				$order .= ' ASC';
 			}
 		}

 		$limit = '';
 		if (!empty($args['limit'])) {
 			$limit = $args['limit'];
 		}
 		$sql = "SELECT ".$fields." FROM `".$this->prefix.$tableName."` ".$where." ".$order. " ". $limit;
 		return $this->get_results($sql, ARRAY_A);
 	}

 	/**
 	 * Get a single row
 	 * @param string $tableName 
 	 * @param array $args 
 	 * @return array|boolean
 	 */
 	public function getRow($tableName, $args = [])
 	{
 		$row = $this->find($tableName, $args);
 		if (empty($row)) {
 			return false;
 		} else {
 			return $row[0];
 		}
 	}
 }