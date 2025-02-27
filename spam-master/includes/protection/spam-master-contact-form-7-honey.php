<?php
/**
 * Load spam master contact form 7 signature.
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
$spam_master_integrations_contact_form_7 = $wpdb->get_var( "SELECT spamvalue FROM {$spam_master_keys} WHERE spamkey = 'Option' AND spamtype = 'spam_master_integrations_contact_form_7'" );
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.PreparedSQL.InterpolatedNotPrepared
$spam_master_status = $wpdb->get_var( "SELECT spamvalue FROM {$spam_master_keys} WHERE spamkey = 'Option' AND spamtype = 'spam_master_status'" );

if ( 'true' === $spam_master_honeypot_timetrap ) {
	if ( 'VALID' === $spam_master_status || 'MALFUNCTION_1' === $spam_master_status || 'MALFUNCTION_2' === $spam_master_status ) {

		if ( is_multisite() ) {
			add_filter( 'wpcf7_form_elements', 'spam_master_add_honeypot_to_contact_form_7', 10, 1 );
		} else {
			add_filter( 'wpcf7_form_elements', 'spam_master_add_honeypot_to_contact_form_7', 10, 1 );
		}

		/**
		 * Spam master contact form 7 fields.
		 *
		 * @param content $content for honey.
		 *
		 * @return content
		 */
		function spam_master_add_honeypot_to_contact_form_7( $content ) {
			global $wpdb, $blog_id;

			$spam_master_field_1 = '<p class="spam-master-hidden">
						<label class="spam-master-hidden" for="spammaster_extra_field_1">Insert your mother second name<br>
						<input class="spam-master-hidden input" type="text" name="spammaster_extra_field_1" id="spammaster_extra_field_1" autocomplete="off" value="" />
						</label>
						</p>';
			$spam_master_field_2 = '<p class="spam-master-hidden">
						<label class="spam-master-hidden" for="spammaster_extra_field_2">Insert your father second name<br>
						<input class="spam-master-hidden input" type="text" name="spammaster_extra_field_2" id="spammaster_extra_field_2" autocomplete="off" value="" />
						</label>
						</p>';
			$new_content         = $spam_master_field_1;
			$new_content        .= $spam_master_field_2;
			$new_content        .= $content;
			return $new_content;
		}
	}
}
