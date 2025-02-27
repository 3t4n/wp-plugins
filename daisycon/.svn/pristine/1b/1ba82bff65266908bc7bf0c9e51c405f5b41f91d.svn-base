<?php
/* Daisycon vergelijkers
 * File: database.php
 *
 * To create the database for the plugin and to update the tables if necessary.
 *
 */

global $wpdb;

$table_name = $wpdb->prefix.'daisycon_tools';
$tools = [
	'accounting',
	'all_in_one',
	'car_insurance',
	'car_lease',
	'dating',
	'energy_be',
	'energy_nl',
	'funeral_insurance',
	'general',
	'health_insurance',
	'market_research',
	'prefill_energy_be',
	'prefill_energy_nl',
	'vacation',
	'wine',
];
// Sort added to be absolutely sure it will match database after update
sort($tools);

// Check for fresh install
if ($wpdb->get_var("SHOW TABLES LIKE '" . $table_name . "'") != $table_name)
{
	createData($table_name, $tools);
}
// Check for upgrade from 3.2 to 4.0
elseif (1 === count($wpdb->get_results("SHOW COLUMNS IN `" . $table_name . "`")))
{
	$media_id = $wpdb->get_var("SELECT media_id FROM `" . $table_name . "`");
	$drop_it  = $wpdb->query("DROP TABLE `" . $table_name ."`;");
	createData($table_name, $tools);

	if (false === empty($media_id))
	{
		$test = $wpdb->insert($table_name . '_settings',
			[
				'profile_id' => '1',
				'name'       => 'media_id',
				'value'      => $media_id,
			]
		);
	}
}
// Check for upgrade from 4.0 to any new version with added tools
else
{
	$check_column_tool = $wpdb->get_results("DESCRIBE `" . $table_name . "` `tool`");

	preg_match_all('/\'(?<tool>[^\']+)\'/', $check_column_tool[0]->Type, $matches, PREG_PATTERN_ORDER);
	$columnTool = $matches['tool'];
	sort($columnTool);

	if ($columnTool !== $tools)
	{
		// Add missing columns to set options
		$query_1 = "ALTER TABLE `" . $table_name . "` CHANGE `tool` `tool` SET(" . getToolsDb($tools) . ") CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL";
		$wpdb->query($query_1);

		// Remove invalid profiles (those who are missing a tool name, due mismatch with earlier set configuration)
		$query_2 = "DELETE FROM `" . $table_name . "` WHERE `tool`='' AND `id`!='1'";
		$wpdb->query($query_2);

		// Update the general profile if needed (this could be missing, due mismatch with earlier set configuration)
		$query_3 = "UPDATE `" . $table_name . "` SET `tool`='general' WHERE `id`='1'";
		$wpdb->query($query_3);
	}
}

function getToolsDb($tools)
{
	return '\'' . implode('\',\'', $tools) . '\'';
}

function createData($table_name, $tools)
{
	global $wpdb;

	// daisycon_tools
	$query_1 = "
		CREATE TABLE `".$table_name."` (
		  `id` int(11) NOT NULL,
		  `tool` set(" . getToolsDb($tools) . ") NOT NULL,
		  `profile` varchar(100) COLLATE utf8_unicode_ci NOT NULL
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
	$wpdb->query($query_1);

	$query_2 = "
		INSERT INTO `".$table_name."` (`id`, `tool`, `profile`) VALUES
		(1, 'general', 'General');";
	$wpdb->query($query_2);

	$query_3 = "
		ALTER TABLE `".$table_name."`
		  ADD PRIMARY KEY (`id`),
		  ADD UNIQUE KEY `tool_profile` (`tool`,`profile`);";
	$wpdb->query($query_3);

	$query_4 = "
		ALTER TABLE `".$table_name."`
		  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
	$wpdb->query($query_4);

	// daisycon_tools_settings
	$query_5 = "
		CREATE TABLE `".$table_name."_settings` (
		  `profile_id` int(10) UNSIGNED NOT NULL,
		  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
		  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL
		  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
	$wpdb->query($query_5);

	$query_6 = "
		ALTER TABLE `".$table_name."_settings` ADD UNIQUE KEY `profile_id_name` (`profile_id`,`name`);";
	$wpdb->query($query_6);
}
