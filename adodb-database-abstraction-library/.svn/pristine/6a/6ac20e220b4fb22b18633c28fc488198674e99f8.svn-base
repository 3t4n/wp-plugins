<?php
/*
Plugin Name: ADOdb Database Abstraction Library by Occhio
Plugin URI: http://wordpress.org/plugins/adodb-database-abstraction-library-by-occhio/
Description: Allows you to use the ADOdb Database Abstraction Library. If the WP_Query-function does not supplies you with enough freedom.
Author: Occhio webdevelopment
Version: 1.03
Author URI: http://www.occhio.nl
*/ 


/**
 * WordPress ADOdb Database Abstraction Library class
 * Usage: var_dump(Adodb::get_instance()->Execute("UPDATE `wp_users` SET user_nicename = 'me' WHERE id = 1 "));
 * Usage: var_dump(Adodb::get_instance()->GetAll("SELECT * FROM `wp_users`"));
 * Usage: print_r(Adodb::get_instance()->GetRow("SELECT user_nicename FROM `wp_users` WHERE id = 1"));
 * Usage: print_r(Adodb::get_instance()->GetCol("SELECT user_nicename FROM `wp_users`"));
 * Usage: print_r(Adodb::get_instance()->GetAssoc("SELECT id, user_nicename FROM `wp_users`"));
 * Usage: echo Adodb::get_instance()->GetOne("SELECT user_nicename FROM `wp_users`");
 */
if (!class_exists("Adodb")) {
	include('class-adodb.php');
}

// test: var_dump(Adodb::get_instance()->GetOne("SELECT user_nicename FROM `wp_users`"));
?>