<?php
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<h3>List of countries</h3>';
	echo countrieslist();
	
function countrieslist() {
	global $wpdb;
	$sql = $wpdb->prepare("SELECT * FROM ".$wpdb->prefix ."pays ORDER BY en");
	$countries=$wpdb->get_results($sql);
	foreach($countries as $country){
		$countrieslist .= $country->code.' - '.$country->en.'<br>';
	}
	return $countrieslist;
}

?>