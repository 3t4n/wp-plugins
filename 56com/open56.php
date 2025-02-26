<?php
/**
 * @package open56
 */
/*
Plugin Name: open56 
Plugin URI:http://dev.56.com/wiki/doc-view-13.html 
Description:56 网开放平台为您的网站提供了全面的视频上传、转码、播放、分发、管理等服务，并通过开放接口（Open API）共享海量的视频数据，快速高效的搭建自己的视频平台，共享巨大流量带来的利益。您可以登录平台并创建应用，使用平台提供的接口，创建个性化的应用或者使用应用组件让您的网站拥有强大的视频功能。  
Version: 1.0
Author: 56.com 
Author URI: http://dev.56.com/
Developer: Louis Li 
License: GPLv2 or later
*/
//ini_set('display_errors',true);
//error_reporting(E_ALL & ~E_DEPRECATED);
add_action('plugins_loaded', 'open56_load');
function open56_load() {
	if ( ! is_admin() )
		return;
	include 'class.open56.php';
    $GLOBALS['open56'] = new open56( plugin_basename(__FILE__) );
}
