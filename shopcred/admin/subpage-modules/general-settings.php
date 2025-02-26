<?php
/**
 * 
 * Plugin Dashboard Settings
 * 
 * @package ShopCred WooBuilder
 */
namespace ShopCred;

use ShopCred\Base\Page_Module as Page_Module_Base;
use ShopCred\Dashboard as Dashboard;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class General_Setting extends Page_Module_Base {

	public function get_page_slug() {
		if (!function_exists('is_plugin_active')) {
			include_once(ABSPATH . 'wp-admin/includes/plugin.php');
		}
		$is_plugin_active = is_plugin_active(SPC_PLUGIN_PRO_FOLDER_NAME_TYPE1.'/shopcred-pro.php');
		
		if($is_plugin_active) {
			return 'shopcred-pro-general-settings';
		} else {
			return 'shopcred-general-settings';
		}
	}

	public function get_parent_slug() {

		return 'settings-page';
	}

	public function get_page_name() {

		return esc_html__( 'Woo Builder Settings', 'shop-cred' );
	}

	public function get_category() {

		return 'shopcred-builder-settings';
	}

	public function get_page_link() {

		return Dashboard::get_instance()->get_dashboard_page_url( $this->get_parent_slug(), $this->get_page_slug() );
	}

	public function enqueue_module_assets() {
		// wp_enqueue_style(
		// 	'shopcred-pro-admin-css',
		// 	base_init()->plugin_admin_url( 'assets/css/settings-page.css' ),
		// 	false,
		// 	'1.0.0'
		// );

		wp_enqueue_script(
			'shopcred-admin-vue-components',
			base_init()->plugin_admin_url( 'assets/js/settings-config.js' ),
			array( 'cx-vue-ui' ),
			'1.0.0',
			true
		);

		wp_localize_script(
			'shopcred-admin-vue-components',
			'ShopCredSettingsConfig',
			apply_filters( 'shopcred/admin/settings-page/localized-config', shopCred_admin_settings_config()->get_localize_data() )
		);
	}

	public function page_config( $config = array(), $page = false, $subpage = false ) {

		$config['pageModule'] = $this->get_parent_slug();
		$config['subPageModule'] = $this->get_page_slug();

		return $config;
	}

	public function page_templates( $templates = array(), $page = false, $subpage = false ) {

		$templates['shopcred-general-settings'] = base_init()->plugin_admin_path( 'templates/settings-templates/general-settings.php' );
    
		return $templates;
	}
}