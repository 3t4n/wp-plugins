<?php
		// if uninstall.php is not called by WordPress, die
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}


		delete_option( 'mywhatsapp_option_name' );

		delete_option( 'text' );

		delete_option( 'Waiowhatsapphelpbut' );

		delete_option( 'floatingwhatsapp' );

		delete_option( 'onlyfloatmobile' );

		delete_option( 'Waiowhatsapphelpshortcss' );

