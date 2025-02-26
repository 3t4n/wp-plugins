<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adds a 'Settings' action link to the Accountable Press row on the Plugins admin page.
 * 
 * @since 1.0.0
 * 
 * @param array $actions An array of plugin action links.
 * @param string $plugin_file Path to the plugin file relative to the plugins directory.
 * @param array $plugin_data An array of plugin data.
 * @param string $context The plugin context. By default this can include 'all', 'active', 'inactive', 'recently_activated', 'upgrade', 'mustuse', 'dropins', and 'search'.
 * 
 * @return array
 */
function accountable_press_add_settings_link( $actions, $plugin_file, $plugin_data, $context ) {
	$plugin_actions['settings'] = sprintf(
		'<a href="%s">' . _x( 'Settings', 'Text for Accountable Press plugin settings link', 'accountable-press' ) . '</a>',
		admin_url( 'options-general.php?page=accountable-press-settings' )
	);

	return array_merge( $plugin_actions, $actions );
}

add_filter( 'plugin_action_links_' . plugin_basename( ACCOUNTABLE_PRESS_FILE ), 'accountable_press_add_settings_link', 10, 4 );

/**
 * Add the Accountable Press link to the Settings admin menu.
 * 
 * @since 1.0.0
 */
function accountable_press_add_admin_menu() {
	add_options_page(
		__( 'Accountable Press Settings', 'accountable-press' ),
		__( 'Accountable Press', 'accountable-press' ),
		'manage_options',
		'accountable-press-settings',
		'accountable_press_show_settings_page'
	);
}

add_action( 'admin_menu', 'accountable_press_add_admin_menu' );

/**
 * Display the Accountable Press settings page.
 * 
 * @since 1.0.0
 */
function accountable_press_show_settings_page() {
	$account_id = get_option( 'accountable_press_account_id', '' );

	include ACCOUNTABLE_PRESS_PATH . 'admin/settings-template.php';
}

function accountable_press_save_settings() {
	if ( isset( $_POST['save_accountable_press_settings'] ) && current_user_can( 'manage_options' ) ) {
		$nonce = isset( $_POST['_wpnonce'] ) ? sanitize_key( $_POST['_wpnonce'] ) : null;

		if ( ! wp_verify_nonce( $nonce, 'save_accountable_press_settings' ) ) {
			$GLOBALS['accountable_press_notice'] = array(
				'status'	=> 'error',
				'message'	=> __( 'Accountable Press settings were not saved because the form has expired. Try again.', 'accountable-press' )
			);
			return;
		}

		$account_id = sanitize_text_field( $_POST['accountable_press_account_id'] );
		update_option( 'accountable_press_account_id', $account_id );

		$GLOBALS['accountable_press_notice'] = array(
			'status'	=> 'success',
			'message'	=> __( 'Settings saved.', 'accountable-press' )
		);
	}
}

add_action( 'admin_init', 'accountable_press_save_settings' );

function accountable_press_settings_message() {
	if ( isset( $GLOBALS['accountable_press_notice'] ) && is_array( $GLOBALS['accountable_press_notice'] ) ) {
		?>
		<div class="accountable-press-notice notice notice-<?php echo $GLOBALS['accountable_press_notice']['status']; ?>">
			<p><?php echo $GLOBALS['accountable_press_notice']['message']; ?></p>
		</div>
		<?php
	}
}

add_action( 'admin_notices', 'accountable_press_settings_message' );

function accountable_press_hide_other_notices() {
	if ( ! isset( $_GET['page'] ) || $_GET['page'] !== 'accountable-press-settings') {
		return;
	}

	?>
	<style>
		div.wrap > div.notice {
			display: none;
		}
		div.wrap > div.notice.accountable-press-notice {
			display: block;
		}
	</style>
	<?php
}

add_action( 'admin_head', 'accountable_press_hide_other_notices' );