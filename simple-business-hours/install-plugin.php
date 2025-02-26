<?php global $wpdb;
//sbh_business_hours table
$BusinessHoursTable = $wpdb->prefix . "sbh_business_hours";
$BusinessHoursTable_sql = "CREATE TABLE IF NOT EXISTS `$BusinessHoursTable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loc_id` int(11) NOT NULL,
  `monday` text NOT NULL,
  `tuesday` text NOT NULL,
  `wednesday` text NOT NULL,
  `thursday` text NOT NULL,
  `friday` text NOT NULL,
  `saturday` text NOT NULL,
  `sunday` text NOT NULL,
  PRIMARY KEY (`id`)
);";
$wpdb->query($BusinessHoursTable_sql);

$monday    =  serialize(array( 'start_time' => '10:00 AM', 'end_time' => '5:00 PM', 'close' => 'no'));
$tuesday   =  serialize(array( 'start_time' => '10:00 AM', 'end_time' => '5:00 PM', 'close' => 'no'));
$wednesday =  serialize(array( 'start_time' => '10:00 AM', 'end_time' => '5:00 PM', 'close' => 'no'));
$thursday  =  serialize(array( 'start_time' => '10:00 AM', 'end_time' => '5:00 PM', 'close' => 'no'));
$friday    =  serialize(array( 'start_time' => '10:00 AM', 'end_time' => '5:00 PM', 'close' => 'no'));
$saturday  =  serialize(array( 'start_time' => '10:00 AM', 'end_time' => '5:00 PM', 'close' => 'no'));
$sunday    =  serialize(array( 'start_time' => 'none', 'end_time' => 'none', 'close' => 'yes'));

//insert default business hours in simple_business_hours table
$BusinessHoursTableInsert_sql = "INSERT INTO `$BusinessHoursTable` (
`id` ,
`loc_id` ,
`monday` ,
`tuesday` ,
`wednesday` ,
`thursday` ,
`friday` ,
`saturday` ,
`sunday`
) VALUES ( '1', '1', '$monday', '$tuesday', '$wednesday', '$thursday', '$friday', '$saturday', '$sunday');";
$wpdb->query($BusinessHoursTableInsert_sql);

//sbh_business_holidays table
$HolidayTableName = $wpdb->prefix . "sbh_holidays";
$HolidayTableName_sql = "CREATE TABLE IF NOT EXISTS `$HolidayTableName` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `repeat` VARCHAR( 10 ) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
);";
$wpdb->query($HolidayTableName_sql);

//create sbh_business_locations table
$LocationTableName = $wpdb->prefix . "sbh_locations";
$LocationTableName_sql = "CREATE TABLE IF NOT EXISTS `$LocationTableName` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(50) NOT NULL,
  `add_line_1` int(30) NOT NULL,
  `add_line_2` varchar(30) NOT NULL,
  `add_line_3` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
);";
$wpdb->query($LocationTableName_sql); 

$sbh_settings_array = array(
 'business_start_day' => 1,
 'display_settings' => 'vertical',
 'day_name_as' => 'short',
 'time_format' => 12,
 'default_business_lcation' => 1,
);

add_option('sbh_settings_array', $sbh_settings_array);
?>