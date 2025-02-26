<?php
defined('ABSPATH') or die;
define('JOOBI_SECURE',true);
$p=isset($_REQUEST['netcom']) ? $_REQUEST['netcom']:'';
if(!empty($p)) {
if($p == 1) $p='netcom';
// define('JOOBI_FRAMEWORK_CONFIG_FILE','wp-config.php');
// define('JOOBI_FRAMEWORK_OVERRIDE','wp4');
// define('JOOBI_FRAMEWORK_CONFIG','wordpress');
define('JOOBI_FRAMEWORK',$p);
}
require( dirname(__FILE__). DIRECTORY_SEPARATOR  . 'entry.php' );