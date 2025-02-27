<?php

if( !defined( 'ABSPATH') && !defined('WP_UNINSTALL_PLUGIN') ) 
	exit();

$gebb_status = 'gebb_id';
delete_post_meta_by_key( $gebb_status );
?>