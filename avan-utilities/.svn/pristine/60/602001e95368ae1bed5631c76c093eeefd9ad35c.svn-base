<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/** AVAN Utilities limit post revision ***/
$options = get_option( 'avanutilities_option' );
if( $options['avandb1'] != '0' ) {
	if(defined('WP_POST_REVISIONS')) {
		add_action('admin_notices', 'avan_notice_post_revisions');
		add_action('admin_head', 'avan_notice_notif');
	}
	else {
		define('WP_POST_REVISIONS', $options['avandb1'] );
	}
}
function avan_notice_post_revisions() {
	echo "<div class='notice notice-error avan-notice-revision'>";
		echo "<p>";
			echo "<strong>" . __('Avan Warning', 'avutilang') . ":</strong> ";
			echo __('WP_POST_REVISIONS is already enabled somewhere else on your site. We suggest only enabling this feature in one place. First check wp-config.php file', 'avutilang');
		echo "</p>";
	echo "</div>";
}
function avan_notice_notif() {
	echo '<style>.avan-notice-revision {
    color: #000;
    font-weight: bold;
    border-radius: 15px;
}</style>';
}