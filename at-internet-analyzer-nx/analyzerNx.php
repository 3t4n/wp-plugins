<?php
/*
Plugin Name: AnalyzerNx
Plugin URI: http://www.atinternet.com/
Description: Analyzer NX Plugin for Wordpress
Author: AT INTERNET
Author URI: http://www.atinternet.com/
Version: 1.1.005
*/
require_once realpath(dirname(__file__) . '/lib/config_analyzerNx.php');
require_once realpath(dirname(__file__) . '/lib/functions.inc.php');		
add_action('wp_footer', 'xt_print');
?>