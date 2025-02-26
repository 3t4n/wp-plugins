<?php
defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );
include AVUTI_PLUG_FOLDER . 'include/global.php';
if ( avan_getoption( 'avuti_wptweaks' ) ){
	include_once AVUTI_PLUG_FOLDER . 'include/speed/wp.php';
}
if ( avan_getoption( 'avuti_wootweak') ){
	include_once AVUTI_PLUG_FOLDER . 'include/speed/woo.php';
}
if ( avan_getoption( 'avuti_dbtweak') ){
	include_once AVUTI_PLUG_FOLDER . 'include/speed/dbase.php';
}
if ( avan_getoption( 'avuti_short') ){
	include AVUTI_PLUG_FOLDER . 'include/shortcode/func.php';
}
