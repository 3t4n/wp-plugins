<?php
defined( 'ABSPATH' ) || die();

class WL_Add_Pinterest_Menu {


	public static function create_menu() {
		global $submenu;

		/* Create Menu */
		$admin_dboard = add_menu_page( __( 'Pinterest Follow', WEBLIZAR_PINTEREST_TD ), __( 'Pinterest Follow', WEBLIZAR_PINTEREST_TD ), 'manage_options', 'weblizar_pinterest_plug', array( 'WL_Add_Pinterest_Menu', 'weblizar_pinterest_add_follow_menu' ), 'dashicons-pinterest', '10' );

		add_action( 'admin_print_styles-' . $admin_dboard, array( 'WL_Add_Pinterest_Menu', 'dboard_assets' ) );

		/* Create Sub Menu */
		$weblizar_add_pinerest_configure_menu = add_submenu_page( 'weblizar_pinterest_plug', __( 'Configure', WEBLIZAR_PINTEREST_TD ), __( 'Configure', WEBLIZAR_PINTEREST_TD ), 'manage_options', 'weblizar_add_pinterest_config', array( 'WL_Add_Pinterest_Menu', 'weblizar_add_pinterest_shortcode_submenu' ) );
		add_action( 'admin_print_styles-' . $weblizar_add_pinerest_configure_menu, array( 'WL_Add_Pinterest_Menu', 'dboard_assets' ) );
	} /*end menu and submenu function -  create_menu*/

	public static function weblizar_pinterest_add_follow_menu() {       ?>
		<div class="container-fluid wl_apf_container">
			<div class="wl_apf_lite_help col-md-12">
				<div class="row">
					<div class="wl-apf_settings col-md-12">
						<div class="col-md-12 col-xs-12 wl-apf-setting-title">
							<div class="product_name wl-apf-title-setting"><?php esc_html_e( 'How To Configure', WEBLIZAR_PINTEREST_TD ); ?></div>
						</div>
						<div class="col-md-12 col-xs-12 wl_apf_steps">
							<h4 class="title"><?php esc_html_e( '1 : Add Pinterest Follow Button into Widget', WEBLIZAR_PINTEREST_TD ); ?></h4>
							<p><?php esc_html_e( '1. Go to Appearance->Widgets', WEBLIZAR_PINTEREST_TD ); ?></p>
							<p>
								<?php esc_html_e( '2. Here, Click on', WEBLIZAR_PINTEREST_TD ); ?>&nbsp;&nbsp;<img src="<?php echo esc_url( WEBLIZAR_PINTEREST_PLUGIN_URL . '/img/plus.PNG' ); ?>" class="img-responsive">&nbsp;&nbsp;<?php esc_html_e( 'button and find Add Pinterest Follow Button Widget ', WEBLIZAR_PINTEREST_TD ); ?> </p>
							<p><?php esc_html_e( '3. Add it into sidebar, footer', WEBLIZAR_PINTEREST_TD ); ?></p>

						</div>

					</div>
				</div>
			</div>
		</div>
		<?php

	}

	public static function weblizar_add_pinterest_shortcode_submenu() {
		 $widget_url = home_url() . '/wp-admin/widgets.php';
		?>
		<script type="text/javascript">
			window.location.replace("<?php echo $widget_url; ?>");
		</script>
		<?php
	}

	public static function dboard_assets() {
		wp_enqueue_style( 'custom_css', WEBLIZAR_PINTEREST_PLUGIN_URL . 'css/custom.css' );
		wp_enqueue_script( 'jquery' );
	}
} // end class WL_Add_Pinterest_Menu
