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
$spam_master_integrations_woocommerce = $wpdb->get_var( "SELECT spamvalue FROM {$spam_master_keys} WHERE spamkey = 'Option' AND spamtype = 'spam_master_integrations_woocommerce'" );
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.PreparedSQL.InterpolatedNotPrepared
$spam_master_status = $wpdb->get_var( "SELECT spamvalue FROM {$spam_master_keys} WHERE spamkey = 'Option' AND spamtype = 'spam_master_status'" );

if ( 'true' === $spam_master_honeypot_timetrap ) {
	if ( 'VALID' === $spam_master_status || 'MALFUNCTION_1' === $spam_master_status || 'MALFUNCTION_2' === $spam_master_status ) {

		if ( is_multisite() ) {
			add_filter( 'woocommerce_login_form_end', 'spam_master_honeypot_register_woo_field' );
			add_filter( 'woocommerce_process_login_errors', 'spam_master_honeypot_process_woo_login_errors', 10, 3 );
			add_filter( 'woocommerce_register_form_end', 'spam_master_honeypot_register_woo_field' );
			add_action( 'woocommerce_register_post', 'spam_master_honeypot_register_woocommerce_errors', 10, 3 );
			add_action( 'woocommerce_lostpassword_form', 'spam_master_honeypot_register_woo_field' );
			add_action( 'validate_password_reset', 'spam_master_honeypot_reset_woocommerce_errors', 10, 2 );
			add_filter( 'woocommerce_checkout_form_end', 'spam_master_honeypot_register_woo_field' );
			add_action( 'woocommerce_after_order_notes', 'spam_master_honeypot_register_woo_field' );
			add_action( 'woocommerce_checkout_process', 'spam_master_honeypot_process_checkout_errors' );
		} else {
			add_filter( 'woocommerce_login_form_end', 'spam_master_honeypot_register_woo_field' );
			add_filter( 'woocommerce_process_login_errors', 'spam_master_honeypot_process_woo_login_errors', 10, 3 );
			add_filter( 'woocommerce_register_form_end', 'spam_master_honeypot_register_woo_field' );
			add_action( 'woocommerce_register_post', 'spam_master_honeypot_register_woocommerce_errors', 10, 3 );
			add_action( 'woocommerce_lostpassword_form', 'spam_master_honeypot_register_woo_field' );
			add_action( 'validate_password_reset', 'spam_master_honeypot_reset_woocommerce_errors', 10, 2 );
			add_filter( 'woocommerce_checkout_form_end', 'spam_master_honeypot_register_woo_field' );
			add_action( 'woocommerce_after_order_notes', 'spam_master_honeypot_register_woo_field' );
			add_action( 'woocommerce_checkout_process', 'spam_master_honeypot_process_checkout_errors' );
		}

		/**
		 * Spam master woo honeypot fields.
		 *
		 * @return void
		 */
		function spam_master_honeypot_register_woo_field() {
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
