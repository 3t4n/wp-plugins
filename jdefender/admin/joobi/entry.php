<?php
defined('JOOBI_SECURE') or define( 'JOOBI_SECURE', true );

if(!defined('DS')) define('DS',DIRECTORY_SEPARATOR);
if ( !defined('JOOBI_FRAMEWORK') ) define( 'JOOBI_FRAMEWORK', 'wp4' );

if (!defined('JOOBI_FOLDER')) define('JOOBI_FOLDER', 'joobi' );
if (!defined('JOOBI_DS_ROOT')) define('JOOBI_DS_ROOT',dirname(dirname((__FILE__))).'/');
if (!defined('JOOBI_DS_CONFIG')) define( 'JOOBI_DS_CONFIG', dirname(__FILE__).'/');
if (!defined('JOOBI_DS_NODE')) define('JOOBI_DS_NODE',dirname(__FILE__). '/' .'node/');
if (!defined('JOOBI_LIB_CORE')) define('JOOBI_LIB_CORE',JOOBI_DS_NODE.'library/');
require_once( JOOBI_DS_NODE.'api/addon' . '/' .JOOBI_FRAMEWORK. '/' .JOOBI_FRAMEWORK.'.php');
if ( defined( 'IS_ADMIN' ) && IS_ADMIN && !empty($_SESSION['joobi']['installwithminilib']) ) {
	if ( !empty($_GET['stopinstall']) ) {
		unset($_GET['stopinstall']);
		unset($_SESSION['joobi']['install_status']);
		unset($_SESSION['joobi']['installwithminilib']);
	} else {
		require_once( JOOBI_LIB_CORE.'define.php');
		$process = WClass::get('install.process');
		$process->instup();
	}
}
$appName = 'WApplication_'. JOOBI_FRAMEWORK;
if (class_exists($appName)){
	if ( !isset($params) ) $params = null;
		if ( isset($module) ) $params->module = $module;
		$app = new $appName();
		if ( !isset($joobiEntryPoint) ) $joobiEntryPoint='';
		$html = $app->make( $joobiEntryPoint,$params );

} else {
	echo 'JOOBI ERROR 56397. Please contact support.';
	exit;
}
if ( !empty($html)) echo $html;
