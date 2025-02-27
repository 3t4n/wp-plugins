<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

/**
 * Responsible for displaying plugin notices.
 *
 * @since 1.2.11
 */
class Notices {

	/**
	 * Class constructor.
	 *
	 * @since 1.2.11
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'gsbookshowcase_review_notice' ) );

		// add_action('admin_notices', 'gs_admin_tickr_notice');
		// add_action('admin_init', 'gstickr_nag_ignore');
		// add_action( 'admin_init', 'gsadmin_signup_notice' );
	}

	/**
	 * Make notices functional.
	 *
	 * @since 1.2.11
	 */
	public function gsbookshowcase_review_notice() {
		$this->reviewDismiss();
		$this->reviewPending();

		$activation_time  = get_site_option( 'gsbookshowcase_active_time' );
		$review_dismissal = get_site_option( 'gsbookshowcase_review_dismiss' );
		$maybe_later      = get_site_option( 'gsbookshowcase_maybe_later' );

		if ( 'yes' === $review_dismissal ) {
			return;
		}

		if ( ! $activation_time ) {
			add_site_option( 'gsbookshowcase_active_time', time() );
		}

		$daysinseconds = 259200; // 3 Days in seconds.

		if ( 'yes' === $maybe_later ) {
			$daysinseconds = 604800; // 7 Days in seconds.
		}

		if ( time() - $activation_time > $daysinseconds ) {
			add_action( 'admin_notices', array( $this, 'reviewNotice' ) );
		}
	}

	/**
	 * For the notice preview.
	 *
	 * @since 1.2.11
	 */
	public function reviewNotice() {
		$scheme      = ( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_QUERY ) ) ? '&' : '?';
		$url         = $_SERVER['REQUEST_URI'] . $scheme . 'gsbookshowcase_review_dismiss=yes';
		$dismiss_url = wp_nonce_url( $url, 'gsbookshowcase-review-nonce' );

		$_later_link = $_SERVER['REQUEST_URI'] . $scheme . 'gsbookshowcase_review_later=yes';
		$later_url   = wp_nonce_url( $_later_link, 'gsbookshowcase-review-nonce' );
		?>
		<div class="gsbook-review-notice">
			<div class="gsbook-review-thumbnail">
				<img src="<?php echo GS_BOOKS_PLUGIN_URI . '/assets/img/icon-large.png'; ?>" alt="">
			</div>
			<div class="gsbook-review-text">
				<h3><?php _e( 'Leave A Review?', 'gsbookshowcase' ); ?></h3>
				<p><?php _e( 'We hope you\'ve enjoyed using <b>GS Book Showcase</b>! Would you consider leaving us a review on WordPress.org?', 'gsbookshowcase' ); ?></p>
				<ul class="gsbook-review-ul">
					<li>
						<a href="https://wordpress.org/support/plugin/gs-books-showcase/reviews/" target="_blank">
							<span class="dashicons dashicons-external"></span>
							<?php _e( 'Sure! I\'d love to!', 'gsbookshowcase' ); ?>
						</a>
					</li>
					<li>
						<a href="<?php echo $dismiss_url; ?>">
							<span class="dashicons dashicons-smiley"></span>
							<?php _e( 'I\'ve already left a review', 'gsbookshowcase' ); ?>
						</a>
					</li>
					<li>
						<a href="<?php echo $later_url; ?>">
							<span class="dashicons dashicons-calendar-alt"></span>
							<?php _e( 'Maybe Later', 'gsbookshowcase' ); ?>
						</a>
					</li>
					<li>
						<a href="https://www.gsplugins.com/support/" target="_blank">
							<span class="dashicons dashicons-sos"></span>
							<?php _e( 'I need help!', 'gsbookshowcase' ); ?>
						</a>
					</li>
					<li>
						<a href="<?php echo $dismiss_url; ?>">
							<span class="dashicons dashicons-dismiss"></span>
							<?php _e( 'Never show again', 'gsbookshowcase' ); ?>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<style>
		.gsbook-review-notice {
			padding: 15px 15px 15px 0;
			background-color: #fff;
			border-radius: 3px;
			margin: 20px 20px 0 0;
			border-left: 4px solid transparent;
		}
		.gsbook-review-notice:after {
			content: '';
			display: table;
			clear: both;
		}
		.gsbook-review-thumbnail {
			width: 114px;
			float: left;
			line-height: 80px;
			text-align: center;
			border-right: 4px solid transparent;
		}
		.gsbook-review-thumbnail img {
			width: 72px;
			vertical-align: middle;
			opacity: .85;
			-webkit-transition: all .3s;
			-o-transition: all .3s;
			transition: all .3s;
		}
		.gsbook-review-thumbnail img:hover {
			opacity: 1;
		}
		.gsbook-review-text {
			overflow: hidden;
		}
		.gsbook-review-text h3 {
			font-size: 24px;
			margin: 0 0 5px;
			font-weight: 400;
			line-height: 1.3;
		}
		.gsbook-review-text p {
			font-size: 13px;
			margin: 0 0 5px;
		}
		.gsbook-review-ul {
			margin: 0;
			padding: 0;
		}
		.gsbook-review-ul li {
			display: inline-block;
			margin-right: 15px;
		}
		.gsbook-review-ul li a {
			display: inline-block;
			color: #10738B;
			text-decoration: none;
			padding-left: 26px;
			position: relative;
		}
		.gsbook-review-ul li a span {
			position: absolute;
			left: 0;
			top: -2px;
		}
	</style>

		<?php
	}

	/**
	 * For dismiss notice.
	 *
	 * @since 1.2.11
	 */
	public function reviewDismiss() {
		if ( ! is_admin() ||
			! current_user_can( 'manage_options' ) ||
			! isset( $_GET['_wpnonce'] ) ||
			! wp_verify_nonce( sanitize_key( wp_unslash( $_GET['_wpnonce'] ) ), 'gsbookshowcase-review-nonce' ) ||
			! isset( $_GET['gsbookshowcase_review_dismiss'] ) ) {
			return;
		}

		add_site_option( 'gsbookshowcase_review_dismiss', 'yes' );
	}

	/**
	 * For maybe later update.
	 *
	 * @since 1.2.11
	 */
	public function reviewPending() {
		if ( ! is_admin() ||
			! current_user_can( 'manage_options' ) ||
			! isset( $_GET['_wpnonce'] ) ||
			! wp_verify_nonce( sanitize_key( wp_unslash( $_GET['_wpnonce'] ) ), 'gsbookshowcase-review-nonce' ) ||
			! isset( $_GET['gsbookshowcase_review_later'] ) ) {
			return;
		}

		// Reset Time to current time.
		update_site_option( 'gsbookshowcase_active_time', time() );
		update_site_option( 'gsbookshowcase_maybe_later', 'yes' );
	}

	public function gs_admin_tickr_notice() {
		global $current_user;
		$user_id = $current_user->ID;

		if ( ! get_user_meta( $user_id, 'gstickr_nag_ignore' ) ) {
			$protocol      = is_ssl() ? 'https' : 'http';
			$promo_content = wp_remote_get( $protocol . '://gsplugins.com/gs_plugins_list/admin_notice.php' );
			?>
			<div class="notice notice-info" style="position: relative;">
			<?php
				echo $promo_content['body'];
				printf(
					__( '<a href="%1$s" style="text-decoration: none; background: #fff;right:6px;top: 10px; float:right;position: absolute;"><span class="dashicons dashicons-dismiss"></span> </a>' ),
					admin_url( 'index.php?&gstickr_nag_ignore=0' )
				);
			?>
			</div>
			<?php
		}
	}

	public function gstickr_nag_ignore() {
		global $current_user;
		$user_id = $current_user->ID;

		/* If user clicks to ignore the notice, add that to their user meta */
		if ( isset( $_GET['gstickr_nag_ignore'] ) && '0' == $_GET['gstickr_nag_ignore'] ) {
			add_user_meta( $user_id, 'gstickr_nag_ignore', 'true', true );
			add_site_option( 'gstickr_active_time', time() );
		}

		$daysinseconds   = 259200; // 3 Days in seconds.
		$activation_time = get_site_option( 'gstickr_active_time' );

		if ( time() - $activation_time > $daysinseconds ) {
			delete_option( 'gstickr_active_time' );
			delete_user_meta( $user_id, 'gstickr_nag_ignore' );
		}
	}

	public function gsadmin_signup_notice() {
		$this->gsadmin_signup_pending();

		$activation_time = get_site_option( 'gsadmin_active_time' );
		$maybe_later     = get_site_option( 'gsadmin_maybe_later' );

		if ( ! $activation_time ) {
			add_site_option( 'gsadmin_active_time', time() );
		}

		if ( 'yes' == $maybe_later ) {
			$daysinseconds = 604800; // 7 Days in seconds.
			if ( time() - $activation_time > $daysinseconds ) {
				add_action( 'admin_notices', array( $this, 'gsadmin_signup_notice_message' ) );
			}
		} else {
			add_action( 'admin_notices', array( $this, 'gsadmin_signup_notice_message' ) );
		}

	}

	/**
	 * For the notice signup.
	 *
	 * @since 1.2.11
	 */
	public function gsadmin_signup_notice_message() {
		$scheme      = ( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_QUERY ) ) ? '&' : '?';
		$_later_link = $_SERVER['REQUEST_URI'] . $scheme . 'gsadmin_signup_later=yes';
		$later_url   = wp_nonce_url( $_later_link, 'gsadmin-signup-nonce' );
		?>
		<div class=" gstesti-admin-notice updated gsteam-review-notice">
			<div class="gsteam-review-text">
				<h3><?php _e( 'GS Plugins Affiliate Program is now LIVE!', 'gsbookshowcase' ); ?></h3>
				<p><?php _e( 'Join GS Plugins affiliate program. Share our 80% OFF lifetime bundle deals or any plugin with your friends/followers and earn up to 50% commission.', '' ); ?> <a href="https://www.gsplugins.com/affiliate-registration/?utm_source=wporg&utm_medium=admin_notice&utm_campaign=aff_regi" target="_blank"><?php _e( 'Click here to sign up.', 'gsbookshowcase' ); ?></a></p>
				<ul class="gsteam-review-ul">
					<li style="display: inline-block;margin-right: 15px;">
						<a href="<?php echo $later_url; ?>" style="display: inline-block;color: #10738B;text-decoration: none;position: relative;">
							<span class="dashicons dashicons-dismiss"></span>
							<?php _e( 'Hide Now', 'gsbookshowcase' ); ?>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<?php
	}

	/**
	 * For Maybe Later signup.
	 *
	 * @since 1.2.11
	 */
	function gsadmin_signup_pending() {
		if ( ! is_admin() ||
			! current_user_can( 'manage_options' ) ||
			! isset( $_GET['_wpnonce'] ) ||
			! wp_verify_nonce( sanitize_key( wp_unslash( $_GET['_wpnonce'] ) ), 'gsadmin-signup-nonce' ) ||
			! isset( $_GET['gsadmin_signup_later'] ) ) {

			return;
		}
		// Reset Time to current time.
		update_site_option( 'gsadmin_maybe_later', 'yes' );
	}
}
