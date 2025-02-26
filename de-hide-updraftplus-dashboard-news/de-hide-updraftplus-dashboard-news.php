<?php
/**
 * A small plugin to hide UpdraftPlus related news from the admin dashboard.
 *
 * @link              https://dream-encode.com
 * @since             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       DE Hide UpdraftPlus Dashboard News
 * Description:       Some administrators that white-label their maintenance service may wish to hide UpdraftPlus "news" from appearing on the admin dashboard.
 * Version:           1.0.0
 * Author:            Dream-Encode
 * Author URI:        https://dream-encode.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

function de_hide_updraftplus_dashboard_news() {
	$transient_key = 'updraftplus_dashboard_news';
	$news 		   = get_transient( $transient_key );

	if ( ! $news ) {
		set_transient( $transient_key, '', 30 * DAY_IN_SECONDS );
	} else if ( strlen( $news ) ) {
		delete_transient( $transient_key );
		set_transient( $transient_key, '', 30 * DAY_IN_SECONDS );
	}
}

add_action( 'init', 'de_hide_updraftplus_dashboard_news' );
