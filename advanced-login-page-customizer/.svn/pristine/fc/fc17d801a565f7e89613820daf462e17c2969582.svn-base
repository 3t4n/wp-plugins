<?php
/**
 * Handle admin setting.
 */
namespace Advanced_Login_Page_Customizer;

defined( 'ABSPATH' ) || exit;

class Menu_Pointer {

	/**
	 * Initiate class.
	 *
	 * @return void
	 */
	public static function init() {

		// Pointer
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'general_enqueue_admin_scripts' ) );
		add_action( 'wp_ajax_dismiss_wp_pointer', array( __CLASS__, 'dismiss_wp_pointer' ) );
	}

	public static function general_enqueue_admin_scripts() {
		if (
			! get_user_meta(
				get_current_user_id(),
				'alpc_menu_pointer_dismissed',
				true
			)
		) {
			wp_enqueue_style( 'wp-pointer' );
			wp_enqueue_script( 'wp-pointer' );

			$nonce = wp_create_nonce( 'alpc_menu_pointer' );
			wp_localize_script( 'wp-pointer', '_alpc_menu_pointer', array( 'alpc_nonce' => $nonce ) );
			// hook the pointer
			add_action( 'admin_print_footer_scripts', array( __CLASS__, 'pointer_content' ) );

		}
	}

	public static function pointer_content() {
		$plugin_data = get_plugin_data( ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_FILE );
		// var_dump( $plugin_data );
		$pointer_content  = '<h3>' . $plugin_data['Name'] . '</h3>';
		$pointer_content .= '<p>You can find <strong>' . $plugin_data['Name'] . '</strong> at <strong>Appearance → <a href="' . admin_url( 'themes.php?page=alpc-login-builder' ) . '">Login Customizer</a></strong></p>';
		?>
		<script type="text/javascript">
		//<![CDATA[
		jQuery(document).ready( function($) {
		//jQuery selector to point to
		$('#menu-appearance').pointer({
		content: '<?php echo $pointer_content; ?>',
		position: 'left',
		// anchor_id : '#menu-appearance',
		close: function() {
			jQuery.post(
				ajaxurl,
				{
					pointer: 'alpc-menu-pointer',
					action: 'dismiss_wp_pointer',
					alpc_nonce: window?._alpc_menu_pointer?.alpc_nonce,
				}
			);
		}
			}).pointer('open');
		});
		//]]>
		</script>
		<?php
	}

	public static function dismiss_wp_pointer() {
		if ( wp_verify_nonce( $_POST['alpc_nonce'], 'alpc_menu_pointer' ) ) {
			update_user_meta(
				get_current_user_id(),
				'alpc_menu_pointer_dismissed',
				true,
				true
			);
		}
		exit();
	}
}

Menu_Pointer::init();
