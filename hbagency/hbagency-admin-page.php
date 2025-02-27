<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if(preg_match('/^[a-zA-Z0-9]{8}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{12}$/', get_option('hbagency_wp_website_id'))) {
	include_once('views/admin_main_settings.php');
} else {
	include_once('views/admin_registration.php');
}


