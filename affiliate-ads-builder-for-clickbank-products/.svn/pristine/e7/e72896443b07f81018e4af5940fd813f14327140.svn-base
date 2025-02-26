<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

require (ABSPATH . WPINC . '/pluggable.php');


if  (isset($_REQUEST['action']) && $_GET['action']=='mycbgenie_ads_view' ){



	$tracking_id	=	$_GET['tracking_id'];
	$account_id		=	get_option('mycbgenie_account_no');

	
	if ( trim($account_id)=='33333') {
		echo '<div align=center style="width:500px; border:1px solid grey; padding:20px; background:lightyellow;">
			It seems that you have not updated your <b>MyCBGenie Account #ID</b> in the settings page of the plugin.. <br><br>You cannot continue.
			</div>';

		exit;
	}
	
	
	$id				=	sanitize_text_field($_GET['id']);
	
	if ( is_null($tracking_id) || ($tracking_id==NULL) || (empty($tracking_id))  ) {
		$tracking_id	=	sanitize_text_field(get_option('mycbgenie_cb_tracking_id'));
	}
	else{
		$tracking_id	=	sanitize_text_field($tracking_id);
	}
	
	$url=('http://mycbgenie.com/php/redirect/redirect.php?type=ads&id='.$id.'&tracking_id='.$tracking_id.'&account_id='.$account_id);


wp_redirect($url,301); exit;
}

?>
