<?php

use Dev4Press\Plugin\TopicPolls\Admin\Plugin as AdminPlugin;
use Dev4Press\Plugin\TopicPolls\Basic\DB;
use Dev4Press\Plugin\TopicPolls\Basic\Plugin;
use Dev4Press\Plugin\TopicPolls\Basic\Settings;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function gdpol() : Plugin {
	return Plugin::instance();
}

function gdpol_settings() : Settings {
	return Settings::instance();
}

function gdpol_db() : DB {
	return DB::instance();
}

function gdpol_admin() : AdminPlugin {
	return AdminPlugin::instance();
}
