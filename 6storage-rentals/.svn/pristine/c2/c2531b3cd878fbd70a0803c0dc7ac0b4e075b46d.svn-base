<?php

namespace SixStorageOnline\models;


use SixStorageOnline\helper\Database\Six_Storage_DatabaseModel;

class Six_Storage_LeadTable extends Six_Storage_DatabaseModel {

	/**
	 * @var string
	 */
	protected $table = 'LeadTable';

	/**
	 * Default data
	 *
	 * @var array
	 */
	protected $default_data = [
		'id'                    => 0,
		'firstName'             => '',
		'lastName'              => '',
		'email'                 => '',
		'mobile'                => '',
		'address'               => '',
		'state'                 => '',
		'country'               => '',
		'city'                  => '',
		'zipCode'               => '',
		'leadSource'            => '',
		'storage_type'          => '',
		'location'              => '',
		'preferred_size'        => '',
		'preferred_movein_date' => '',
		'contactPreference'     => '',
		'message'               => '',
		'created_at'            => null,
		'updated_at'            => null,
		'deleted_at'            => null,
	];

	/**
	 * Data format
	 *
	 * @var array
	 */
	protected $data_format = [
		'%d',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
	];


	/* Create table */


	public function create_table() {
		global $wpdb;
		$table_name = $wpdb->prefix . $this->table;
		$collate    = $wpdb->get_charset_collate();

		$table_schema = "CREATE TABLE IF NOT EXISTS {$table_name} (
`id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
`firstName` varchar(255) DEFAULT NULL,
`lastName` varchar(255) DEFAULT NULL,
`email` varchar(255) DEFAULT NULL,
`mobile` varchar(255)  DEFAULT NULL,
`address`varchar(255)  DEFAULT NULL,
`state` varchar(255)  DEFAULT NULL,
`country` varchar(255)  DEFAULT NULL,
`city` varchar(255)  DEFAULT NULL,
`zipCode` varchar(255)  DEFAULT NULL,
`leadSource` varchar(255)  DEFAULT NULL,
`storage_type` varchar(255)  DEFAULT NULL,
`location` varchar(255)  DEFAULT NULL,
`preferred_size` varchar(255)  DEFAULT NULL,
`preferred_movein_date` varchar(255)  DEFAULT NULL,
`contactPreference` varchar(255)  DEFAULT NULL,
`message` varchar(255)  DEFAULT NULL,
`created_at` datetime DEFAULT NULL,
`updated_at` datetime DEFAULT NULL,
`deleted_at` datetime DEFAULT NULL,
PRIMARY KEY (`id`)
) $collate;";
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $table_schema );
	}

}

?>