<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die( '-1' );
}

if ( ! is_multisite() ) {
	delete_user_meta( get_current_user_id(), 'qltgm-user-rating' );
	delete_option( 'qltgm' );
}
