<?php
/**
 * Load spam master woo signature.
 *
 * @package Spam Master
 */

global $wpdb, $blog_id;
// Add Table & Load Spam Master Options.
if ( is_multisite() ) {
	$spam_master_keys = $wpdb->get_blog_prefix( $blog_id ) . 'spam_master_keys';
} else {
	$spam_master_keys = $wpdb->prefix . 'spam_master_keys';
}
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.PreparedSQL.InterpolatedNotPrepared
$spam_master_honeypot_timetrap = $wpdb->get_var( "SELECT spamvalue FROM {$spam_master_keys} WHERE spamkey = 'Option' AND spamtype = 'spam_master_honeypot_timetrap'" );
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.PreparedSQL.InterpolatedNotPrepared
$spam_master_honeypot_timetrap_speed = $wpdb->get_var( "SELECT spamvalue FROM {$spam_master_keys} WHERE spamkey = 'Option' AND spamtype = 'spam_master_honeypot_timetrap_speed'" );
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.PreparedSQL.InterpolatedNotPrepared
$spam_master_integrations_buddypress = $wpdb->get_var( "SELECT spamvalue FROM {$spam_master_keys} WHERE spamkey = 'Option' AND spamtype = 'spam_master_integrations_buddypress'" );
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.PreparedSQL.InterpolatedNotPrepared
$spam_master_status = $wpdb->get_var( "SELECT spamvalue FROM {$spam_master_keys} WHERE spamkey = 'Option' AND spamtype = 'spam_master_status'" );

if ( 'true' === $spam_master_honeypot_timetrap ) {
	if ( 'VALID' === $spam_master_status || 'MALFUNCTION_1' === $spam_master_status || 'MALFUNCTION_2' === $spam_master_status ) {

		if ( is_multisite() ) {
			add_filter( 'bp_before_registration_submit_buttons', 'spam_master_honeypot_buddy_field' );
		} else {
			add_filter( 'bp_before_registration_submit_buttons', 'spam_master_honeypot_buddy_field' );
		}

		/**
		 * Spam master buddypress honey fields.
		 */
		function spam_master_honeypot_buddy_field() {
			global $wpdb, $blog_id;

			$bp    = buddypress();
			$html  = '<div class="register-section" id="security-section">';
			$html .= '<div class="editfield">';
			$html .= '<p class="spam-master-hidden">';
			$html .= '<label for="spammaster_extra_field_1" class="spam-master-hidden">' . esc_attr( __( 'Mother Name', 'spam_master' ) ) . '<br>';
			$html .= '<input class="spam-master-hidden input" type="text" name="spammaster_extra_field_1" id="spammaster_extra_field_1" placeholder="Insert your mother second name" autocomplete="off" value="" />';
			$html .= '</label>';
			$html .= '</p>';
			$html .= '<p class="spam-master-hidden">';
			$html .= '<label for="spammaster_extra_field_2" class="spam-master-hidden">' . esc_attr( __( 'Mother Last Name', 'spam_master' ) ) . '<br>';
			$html .= '<input class="spam-master-hidden input" type="text" name="spammaster_extra_field_2" id="spammaster_extra_field_2" placeholder="Insert your father second name" autocomplete="off" value="" />';
			$html .= '</label>';
			$html .= '</p>';
			$html .= '</div>';
			$html .= '</div>';
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $html;
		}
	}
}
