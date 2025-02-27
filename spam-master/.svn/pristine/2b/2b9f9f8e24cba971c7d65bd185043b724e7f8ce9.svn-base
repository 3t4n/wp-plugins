<?php
/**
 * Load spam master honeypot.
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
$spam_master_status = $wpdb->get_var( "SELECT spamvalue FROM {$spam_master_keys} WHERE spamkey = 'Option' AND spamtype = 'spam_master_status'" );
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.PreparedSQL.InterpolatedNotPrepared
$spam_master_honeypot_timetrap = $wpdb->get_var( "SELECT spamvalue FROM {$spam_master_keys} WHERE spamkey = 'Option' AND spamtype = 'spam_master_honeypot_timetrap'" );
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.PreparedSQL.InterpolatedNotPrepared
$spam_master_honeypot_timetrap_speed = $wpdb->get_var( "SELECT spamvalue FROM {$spam_master_keys} WHERE spamkey = 'Option' AND spamtype = 'spam_master_honeypot_timetrap_speed'" );

if ( 'VALID' === $spam_master_status || 'MALFUNCTION_1' === $spam_master_status || 'MALFUNCTION_2' === $spam_master_status ) {

	if ( 'true' === $spam_master_honeypot_timetrap ) {
		// MULTISITE HOOKS.
		if ( is_multisite() ) {
			add_action( 'signup_extra_fields', 'spam_master_honeypot_register_field' );
			add_action( 'register_form', 'spam_master_honeypot_register_field' );
			add_action( 'login_form', 'spam_master_honeypot_register_field' );
			add_filter( 'lostpassword_form', 'spam_master_honeypot_register_field' );
			add_action( 'comment_form_before_fields', 'spam_master_honeypot_register_field' );
		} else {
			// SINGLE SITE HOOKS.
			add_action( 'register_form', 'spam_master_honeypot_register_field' );
			add_action( 'login_form', 'spam_master_honeypot_register_field' );
			add_filter( 'lostpassword_form', 'spam_master_honeypot_register_field' );
			add_action( 'comment_form_before_fields', 'spam_master_honeypot_register_field' );
		}

		/**
		 * Spam master honeypot fields.
		 *
		 * @return void
		 */
		function spam_master_honeypot_register_field() {
			global $wpdb, $blog_id;

			?>
			<p class="spam-master-hidden">
			<label for="spammaster_extra_field_1" class="spam-master-hidden"><?php echo esc_attr( __( 'Insert your mother second name', 'spam_master' ) ); ?><br>
			<input class="spam-master-hidden input" type="text" name="spammaster_extra_field_1" id="spammaster_extra_field_1" placeholder="Mother Name" autocomplete="off" value="" />
			</label>
			</p>
			<p class="spam-master-hidden">
			<label for="spammaster_extra_field_2" class="spam-master-hidden"><?php echo esc_attr( __( 'Insert your father second name', 'spam_master' ) ); ?><br>
			<input class="spam-master-hidden input" type="text" name="spammaster_extra_field_2" id="spammaster_extra_field_2" placeholder="Mother Last Name" autocomplete="off" value="" />
			</label>
			</p>
			<?php
			// END FIELD.
		}
	}
}
