<?php
/*
Plugin Name: Disable File Editor
Plugin URI: http://www.nikunjsoni.co.in/
Description: This plugin will disable file editing tool in your WordPress admin panel.
Version: 1.6
Author: Nikunj Soni
Author URI: http://www.nikunjsoni.co.in/
Text Domain: Disable-File-Editor
*/


if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed this file directly
} 

if( !defined('DISALLOW_FILE_EDIT') ){
	define( 'DISALLOW_FILE_EDIT', true );
}

?>