<?php
/**
 * @package sdi-scarcity
 * @version 0.1
 */

define('SDI_PLUGIN_NAME', 'SDI Scarcity');
define('SDI_TEXT_DOMAIN', 'sdiscarcity');
define('SDI_ADMIN_PATH', SDI_PLUGIN_PATH . '/admin/');
define('SDI_PLUGIN_URL', plugins_url('sdi-scarcity'));

require_once(dirname(__FILE__)."/common-functions.php");
require_once(dirname(__FILE__)."/class-sdidb.php");
require_once(dirname(__FILE__)."/class-admin.php");
require_once(dirname(__FILE__)."/class-sdiscarcity.php");
require_once(dirname(__FILE__)."/class-campaign.php");

if (is_admin()) {
	require_once(dirname(__FILE__)."/admin-hooks.php");
} else {
	require_once(dirname(__FILE__)."/hooks.php");
}