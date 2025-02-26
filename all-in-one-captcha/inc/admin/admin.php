<?php
/**
 * Admin functions
 *
 * @package AIOC
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register menu page.
 *
 * @since 1.0.0
 */
function aioc_register_menu() {
	add_submenu_page( 'options-general.php', esc_html__( 'All In One Captcha', 'all-in-one-captcha' ), esc_html__( 'All In One Captcha', 'all-in-one-captcha' ), 'manage_options', 'aioc-options', 'aioc_options_page' );
}

add_action( 'admin_menu', 'aioc_register_menu' );

/**
 * Render admin page.
 *
 * @since 1.0.0
 */
function aioc_options_page() {
	?>
	<div class="wrap aioc-wrap">
		<div class="aioc-header">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<p>
				<?php
				/* translators: 1: version */
				printf( esc_html__( 'Version: %s', 'all-in-one-captcha' ), esc_html( AIOC_VERSION ) );
				?>
			</p>
			<div class="aioc-quick-links">
				<a href="https://aiocaptcha.com/" class="button button-secondary" target="_blank">Plugin Page</a>
				<a href="https://aiocaptcha.com/docs/" class="button button-secondary" target="_blank">Documentation</a>
				<a href="https://aiocaptcha.com/pricing/" class="button button-primary" target="_blank">Upgrade to Pro</a>
			</div>
		</div>

		<div class="aioc-main">
			<div class="aioc-main-inner">
				<div class="aioc-main-content">
					<?php
					$tabs = array(
						'captcha-general'     => esc_html__( 'Captcha General', 'all-in-one-captcha' ),
						'captcha-integration' => esc_html__( 'Captcha Integrations', 'all-in-one-captcha' ),
						'login-settings'      => esc_html__( 'Login Settings', 'all-in-one-captcha' ),
					);
					?>
					<div class="aioc-tabs-nav">
						<?php $count = 1; ?>
						<?php foreach ( $tabs as $tab => $tab_name ) : ?>
							<h2><a href="#aioc-<?php echo esc_attr( $tab ); ?>" class="tab-nav tab-captcha<?php echo ( 1 === $count ) ? ' active' : ''; ?>"><?php echo esc_html( $tab_name ); ?></a></h2>
							<?php
							++$count;
						endforeach;
						?>
					</div>
					<div class="aioc-tabs-content-wrap">
						<?php $count = 1; ?>
						<?php foreach ( $tabs as $tab => $tab_name ) : ?>
							<div id="aioc-<?php echo esc_attr( $tab ); ?>" class="aioc-tab-content<?php echo ( 1 === $count ) ? ' active' : ''; ?>">
								<?php require_once AIOC_DIR . '/inc/admin/interface/tab-' . $tab . '.php'; ?>
							</div>
							<?php
							++$count;
						endforeach;
						?>
					</div>
				</div>
			</div>
		</div>

	</div>
	<?php
}

/**
 * Load admin assets.
 *
 * @since 1.0.0
 *
 * @param string $hook Hook name.
 */
function aioc_load_admin_assets( $hook ) {
	$pointer         = get_option( 'aioc_pointer' );
	$pointer_content = ! empty( $pointer ) ? wp_kses_post( $pointer ) : '';

	if ( ! empty( $pointer_content ) ) {
		wp_enqueue_style( 'wp-pointer' );
		wp_enqueue_script( 'wp-pointer' );
		wp_enqueue_script( 'aioc-pointer-script', AIOC_URL . '/build/pointer.js', array( 'jquery' ), AIOC_VERSION, true );
		wp_localize_script(
			'aioc-pointer-script',
			'AIOC_POINTER',
			array(
				'ajaxurl'         => admin_url( 'admin-ajax.php' ),
				'nonce'           => wp_create_nonce( 'admin-ajax-nonce' ),
				'pointer_title'   => esc_html__( 'All In One Captcha', 'all-in-one-captcha' ),
				'pointer_content' => $pointer_content,
			)
		);
	}

	if ( 'settings_page_aioc-options' === $hook ) {
		wp_enqueue_style( 'aioc-admin-style', AIOC_URL . '/build/admin.css', array(), AIOC_VERSION );
		wp_enqueue_script( 'aioc-admin-script', AIOC_URL . '/build/admin.js', array( 'jquery' ), AIOC_VERSION, true );
		wp_localize_script(
			'aioc-admin-script',
			'AIOC',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'nonce'   => wp_create_nonce( 'admin-ajax-nonce' ),
				'i18n'    => array(
					'success'           => esc_html__( 'Captcha verified successfully.', 'all-in-one-captcha' ),
					'error'             => esc_html__( 'Error verifying Captcha.', 'all-in-one-captcha' ),
					'loading'           => esc_html__( 'Loading&hellip;', 'all-in-one-captcha' ),
					'verify_message'    => esc_html__( 'Please submit "Verify Now"', 'all-in-one-captcha' ),
					'verify_message_v2' => esc_html__( 'Please check the captcha and submit "Verify Now"', 'all-in-one-captcha' ),
				),
			)
		);
	}
}

add_action( 'admin_enqueue_scripts', 'aioc_load_admin_assets' );

/**
 * Save captcha form data.
 *
 * @since 1.0.0
 */
function aioc_save_form_data() {
	if ( isset( $_POST['aioc-nonce'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['aioc-nonce'] ) ), 'aioc-captcha-nonce' ) ) {
		wp_safe_redirect( admin_url( 'options-general.php?page=aioc-options' ) );
		exit;
	}

	if ( isset( $_POST['aioc-submit'] ) ) {
		$tab_id        = ! empty( $_POST['aioc-tab-id'] ) ? sanitize_text_field( wp_unslash( $_POST['aioc-tab-id'] ) ) : '';
		$option_key    = ! empty( $_POST['aioc-form-key'] ) ? sanitize_text_field( wp_unslash( $_POST['aioc-form-key'] ) ) : '';
		$values        = ! empty( $_POST[ $option_key ] ) ? aioc_validate_options_before_save( $_POST[ $option_key ], $tab_id ) : ''; //phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.Security.ValidatedSanitizedInput.MissingUnslash
		$update_values = ! empty( $_POST[ $option_key ] ) ? aioc_return_merge_options( $option_key, $values ) : '';
		aioc_save_form_option( $option_key, $update_values );

		$redirect_link = admin_url( 'options-general.php?page=aioc-options' );
		$query_array   = array( 'aioc-updated' => true );
		if ( ! empty( $tab_id ) ) {
			$query_array['aioc-tab'] = sanitize_text_field( $tab_id );
		}

		$redirect_link = add_query_arg(
			$query_array,
			$redirect_link
		);
		wp_safe_redirect( $redirect_link );
		exit;

	}
}

add_action( 'admin_init', 'aioc_save_form_data' );

/**
 * Return merge options.
 *
 * @since 1.0.0
 *
 * @param string $option_key Key name.
 * @param array  $values Update values.
 * @return array $option_values Merge values.
 */
function aioc_return_merge_options( $option_key, $values ) {
	$key           = get_option( $option_key );
	$option_values = ! empty( $key ) ? $key : aioc_get_default_options( $option_key );
	if ( ! empty( $values ) || $option_values ) {
		foreach ( $values as $key => $value ) {
			$option_values[ $key ] = $value;
		}
	}
	return $option_values;
}

/**
 * Save form in option table.
 *
 * @since 1.0.0
 *
 * @param string $option_key Key name.
 * @param array  $update_values Update values.
 */
function aioc_save_form_option( $option_key, $update_values ) {
	if ( ! empty( $option_key ) || ! empty( $update_values ) ) {
		update_option( $option_key, $update_values );
	}
}

/**
 * Render admin notice success.
 *
 * @since 1.0.0
 */
function aioc_admin_notice_success() {

	$update = isset( $_GET['aioc-updated'] ) ? (int) $_GET['aioc-updated'] : 0; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( $update ) {
		?>
		<div class="notice notice-success is-dismissible">
			<p><?php esc_html_e( 'Settings saved.', 'all-in-one-captcha' ); ?></p>
		</div>
		<?php
	}
}

add_action( 'admin_notices', 'aioc_admin_notice_success' );
