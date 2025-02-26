<?php
global $wpdb;
$staffbook_sql = "CREATE TABLE IF NOT EXISTS `lordlinus_class_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(256) NOT NULL,
  `exp` varchar(256) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
);";
$wpdb->query($staffbook_sql); 
$classbook_sql = "CREATE TABLE IF NOT EXISTS `lordlinus_class_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `staff_name` varchar(256) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
);";
$wpdb->query($classbook_sql);
$classshift_sql = "CREATE TABLE IF NOT EXISTS `lordlinus_class_shift` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`class_id` int(11) 	NOT NULL,
	`no_of_seats` varchar(256) NOT NULL,
	`start_time` varchar(256) NOT NULL, 
	`end_time` varchar(256) NOT NULL,
	  PRIMARY KEY (`id`)
);";
$wpdb->query($classshift_sql);
$classbooking_sql = "CREATE TABLE IF NOT EXISTS `lordlinus_class_cooking` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`class_id` int(11) 	NOT NULL,
	`staff_id` varchar(256) NOT NULL,
	`shift_id` varchar(256) NOT NULL, 
	`appdate` varchar(256) NOT NULL,
	`name` varchar(256) NOT NULL,
	`email` varchar(256) NOT NULL,
	`phone` varchar(256) NOT NULL,
	`note` text NOT NULL,
	`noofcandi` varchar(255) NOT NULL,
	  PRIMARY KEY (`id`)
);";
$wpdb->query($classbooking_sql);
?>