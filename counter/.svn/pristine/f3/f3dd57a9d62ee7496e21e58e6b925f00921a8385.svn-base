<?php
$root = dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) ;
if ( file_exists ( $root . '/wp-load.php' ) ) {
	// WordPress 2.6
	require_once ( $root . '/wp-load.php' ) ;
} else { 
	// Vor WordPress 2.6
	require_once ( $root . '/wp-config.php' ) ;
	require_once($root.'/wp-includes/functions.php');
}
#$url = WP_PLUGIN_URL."/plugin-name/images/hello.jpg";
#$directory = WP_PLUGIN_DIR."/plugin-name/images/hello.jpg";
$jahr=$_GET["jahr"];
if($jahr=="")$jahr=0;
$monat=$_GET["monat"];
if($monat=="")$monat=0;
echo phpweltinstantcounter_getstats($monat,$jahr);
 ?>