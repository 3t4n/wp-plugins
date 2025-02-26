<?php
	
	global $wpdb;
	
	$table_name = $wpdb->prefix . 'amazon_settings';
	
	$sql_api_key = "SELECT api_key from $table_name";
	$sql_secret_key = "SELECT secret_key from $table_name";
	$sql_associate_id = "SELECT associate_id from $table_name";
	$sql_country = "SELECT country from $table_name";
	
	$api_key = $wpdb->get_var($sql_api_key);	//'AKIAJZK6ISU5HUN4LSBQ'
	$secret_key = $wpdb->get_var($sql_secret_key);	//'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'
	$associate_id = $wpdb->get_var($sql_associate_id);	//'thewpc-20'
	$country = $wpdb->get_var($sql_country);  //'com'

	define('AWS_API_KEY', $api_key);
	define('AWS_API_SECRET_KEY', $secret_key);
	define('AWS_ASSOCIATE_TAG', $associate_id);
	define('AWS_COUNTRY', $country);

?>