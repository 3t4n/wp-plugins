<?php
/**
 * Plugin Name: Kantbtrue about me
 * Plugin URI: https://wordpress.org/plugins/kantbtrue-about-me/
 * Description: An elegant about me widget and profile widget for blogs.
 * Version: 1.2.11
 * Requires at least: 5.0
 * Requires PHP: 5.0
 * Author: Kantbtrue
 * Author URI: https://twitter.com/kantbtrue
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: kantbtrue-about-me
 * Domain Path: /languages
 */

// If it is called directly, abort
if ( !defined( 'WPINC' ) ) {
	die;
}

// Constant
define( 'KBTAM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'KBTAM_VERSION', '1.2' );

// Include
include plugin_dir_path( __FILE__ ) . 'inc/activate.php';
include plugin_dir_path( __FILE__ ) . 'inc/styles.php';
include plugin_dir_path( __FILE__ ) . 'inc/scripts.php';
include plugin_dir_path( __FILE__ ) . 'class/class-kbtam-widget.php';

// Activate
register_activation_hook( plugin_dir_path( __FILE__ ), 'KBTAM_activate' );

// Register Widget
add_action( 'widgets_init', function() {
	register_widget( 'KBTAM_Widget' );
});

// Add user feedback.
// Add the activation date to the options table.
if ( ! get_option( 'kbtam_activation_date' ) ) {
	add_option( 'kbtam_activation_date', date( 'Y-m-d' ) );
}
// On content update,  add update date to the options table.
add_option( 'kbtam_content_updated', '' );

// Check whether to show the rating notice for plugin or not.
// If user rated or don't what to rate the plugin, then don't show the rating notice.
// Value: 1 - rated, 0 - not rated or rate later, -1 - not interested to rate.
add_option( 'kbtam_show_rating', '0' );

/**
 * Add feedback notice.
 *
 * @since 1.2.1
 * @return void|string
 */
function kbtam_show_rating_notice() {
	$output = '';
	$kbtam_show_rating = get_option( 'kbtam_show_rating' );
	if ( $kbtam_show_rating === '1' || $kbtam_show_rating === '-1' ) {
		return;
	}
	if ( $kbtam_show_rating === '0' ) {
		$kbtam_activation_date = get_option( 'kbtam_activation_date' );
		$kbtam_content_updated = get_option( 'kbtam_content_updated' );
		if ( $kbtam_content_updated == '' ) {
			return;
		}
		$kbtam_content_updated = new DateTime( $kbtam_content_updated );
		$kbtam_activation_date = new DateTime( $kbtam_activation_date );
		$kbtam_diff_intrval = round( ( $kbtam_content_updated->format( 'U' ) - $kbtam_activation_date->format( 'U' ) ) / (60 * 60 * 24) );
		// Show the rating notice after 7 days from second time updating the plugin.
		if ( $kbtam_diff_intrval >= 7 ) {
			ob_start();
			?>
			<div class="notice notice-info is-dismissible kbtam-feedback-notice">
				<p><?php _e( 'Hey, I noticed you have been using <strong>Kantbtrue about me</strong> for a while now. May I ask you to give it a <strong>5-star rating</strong> on WordPress?', 'kantbtrue-about-me' ); ?></p>
				<p><a href="https://wordpress.org/support/plugin/kantbtrue-about-me/reviews/?rate=5#new-post" target="_blank" class="button button-primary"><?php _e( 'Ok, you deserve it', 'kantbtrue-about-me' ); ?></a></p>
				<p><button data-rating="1" class="kbtam-feedback-btn button"><?php _e( 'I already did', 'kantbtrue-about-me' ); ?></button></p>
				<p><button data-rating="-1" class="kbtam-feedback-btn button"><?php _e( 'Not interested', 'kantbtrue-about-me' ); ?></button></p>
			</div>
			<?php
			$output = ob_get_clean();
		}
	}
	echo $output;
}
add_action( 'admin_notices', 'kbtam_show_rating_notice' );

/**
 * Update database with user feedback.
 *
 * @since 1.2.1
 * @return void|string
 */
function kbtam_send_feedback() {
	// Check for nonce security.
	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['nonce'] ), 'KBTAM_nonce' ) ) {
		wp_die( esc_html__( 'Not permitted.', 'kantbtrue-about-me' ) );
	}

	// Update database as per the user feedback.
	$kbtam_show_rating = $_POST['show_rating'];
	if ( $kbtam_show_rating === '1' ) {
		update_option( 'kbtam_show_rating', '1' );
	} elseif ( $kbtam_show_rating === '-1' ) {
		update_option( 'kbtam_show_rating', '-1' );
	}

	// Send response.
	$res = array(
		'status' => 'success',
		'rating' => $kbtam_show_rating,
	);
	wp_send_json($res);
}
add_action( 'wp_ajax_kbtam_feedback', 'kbtam_send_feedback' );

/**
 * Show Black Friday discount notice.
 *
 * @since 1.2.11
 * @return void
 */
function kbtam_show_black_friday_notice() {
	// Check if the notice has already been dismissed.
	if ( get_option( 'kbtam_black_friday_dismissed' ) ) {
		return;
	}
	?>
	<div class="notice notice-success is-dismissible kbtam-black-friday-notice">
		<p><?php _e( 'Black Friday Deal! Get 50% off with coupon code <strong>FRIDAY50</strong>. Don\'t miss out!', 'kantbtrue-about-me' ); ?></p>
		<p><button id="kbtam-black-friday-btn" class="button button-primary"><?php _e( 'Get Deal', 'kantbtrue-about-me' ); ?></button></p>
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('#kbtam-black-friday-btn').on('click', function() {
				window.location.href = 'https://kantbtrue.gumroad.com/l/aboutmepro';
			});
		});
	</script>
	<?php
}
add_action( 'admin_notices', 'kbtam_show_black_friday_notice' );

/**
 * Handle dismissing the Black Friday notice.
 *
 * @since 1.2.11
 * @return void
 */
function kbtam_dismiss_black_friday_notice() {
	// Check for nonce security.
	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['nonce'] ), 'KBTAM_nonce' ) ) {
		wp_die( esc_html__( 'Not permitted.', 'kantbtrue-about-me' ) );
	}

	// Update the option to mark the notice as dismissed.
	update_option( 'kbtam_black_friday_dismissed', true );

	// Send response.
	$res = array(
		'status' => 'success',
	);
	wp_send_json($res);
}
add_action( 'wp_ajax_kbtam_dismiss_black_friday', 'kbtam_dismiss_black_friday_notice' );