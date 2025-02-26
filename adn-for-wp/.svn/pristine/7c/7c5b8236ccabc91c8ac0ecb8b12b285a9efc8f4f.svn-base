<?php
//currently not used
function share_on() {
	global $wpdb;
	$sql = 'SELECT adn_share FROM '.$wpdb->prefix.'adnwp_settings WHERE id="1"';
	$return = $wpdb->get_row($sql);
	if ($return->adn_share == "1") {
		return true;
	}
	else {
		return false;
	}
}

function share_settings() {
	global $wpdb;
	$sql = 'SELECT * FROM '.$wpdb->prefix.'adnwp_settings WHERE id="1"';
	$return = $wpdb->get_row($sql);
	return $return;
}

function save_share($val, $pval) {
	global $wpdb;
	$sql = 'SELECT adn_share FROM '.$wpdb->prefix.'adnwp_settings WHERE id="1"';
	$update_insert = $wpdb->get_row($sql);

	if ($update_insert) {
		$sql = 'UPDATE '.$wpdb->prefix.'adnwp_settings SET adn_share="'.$val.'", posts_only="'.$pval.'" WHERE id="1"';
	}
	else {
		$sql = 'INSERT INTO '.$wpdb->prefix.'adnwp_settings (adn_share, posts_only) VALUES ("'.$val.'", "'.$pval.'")';
	}
	$res = $wpdb->query($sql);
}
?>