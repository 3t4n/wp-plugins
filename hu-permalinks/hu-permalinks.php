<?php
/*
Plugin Name: HU Permalinks
Plugin URI: http://wordpress.org/plugins/hu-permalinks/
Description: Fixing the hungarian letters with accents in the permalinks.
Version: 1.02
Author: Gr&aacute;vuj Mikl&oacute;s Henrich
Author URI: http://www.henrich.ro
*/

define( 'HUP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

add_filter('name_save_pre', 'hu_permalinks', 0);

function hu_permalinks($permalink) {
	$hun = array('"','+','!','%','=','(',')','Ö','ö','Ü','ü','Ó','ó','Õ','õ','Ú','ú','É','é','Á','á','Û','û','Í','í','?',',',':','.','_','-');
	$alt = array('','','','','-','','','o','o','u','u','o','o','o','o','u','u','e','e','a','a','u','u','i','i','','','','','','-');
	if ($permalink) return $permalink;
	global $wpdb;
	$hu_permalink = stripslashes($_POST['post_title']);
	$hu_permalink = str_replace($hun, $alt, $hu_permalink);
	$hu_permalink = str_replace(" ", "-", $hu_permalink);
	return $hu_permalink;
}
?>