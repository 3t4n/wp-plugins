<?php
	include('flexo-facebook-manager.php');
	
	
	$post_id	=	intval($_GET['p']);
	if($post_id > 0):
		if ( !isset($wp_did_header) ) {
			$wp_did_header = true;
			require_once( '../../../wp-load.php' );
			wp();
			//require_once( ABSPATH . WPINC . '/template-loader.php' );
		}
	endif;

	flexoFBManager::update_likes($post_id);
	echo "<pre>";
	print_r(flexoFBManager::post_vars($post_id));
	echo "ok";
?>