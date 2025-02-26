<?php
namespace ShopCred;

/**
 * 
 * Plugin Dashboard Settings
 * 
 * @package ShopCred Pro
 */

use ShopCred\Base\Page_Module as Page_Module_Base;
use ShopCred\Dashboard as Dashboard;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Available_Blocks extends Page_Module_Base {

	public function get_page_slug() {

		return 'shopcred-available-blocks';
	}

	public function get_parent_slug() {

		return 'settings-page';
	}

	public function get_page_name() {

		return esc_html__( 'Blocks Settings', 'ShopCred' );
	}

	public function get_category() {

		return 'shopcred-builder-settings';
	}

	public function get_page_link() {

		return Dashboard::get_instance()->get_dashboard_page_url( $this->get_parent_slug(), $this->get_page_slug() );
	}

	public function enqueue_module_assets() {

		wp_enqueue_script(
			'shopcred-admin-vue-components',
			base_init()->plugin_admin_url( 'assets/js/setting-pages.js' ),
			array( 'cx-vue-ui' ),
			'1.0.0',
			true
		);

		wp_enqueue_script(
			'shopcred-settings-components',
			base_init()->plugin_admin_url( 'assets/js/settings-config.js' ),
			array( 'cx-vue-ui' ),
			'1.0.0',
			true
		);

		wp_localize_script(
			'shopcred-settings-components',
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

		$templates['shopcred-available-blocks'] = base_init()->plugin_admin_path( 'templates/settings-templates/available-blocks.php' );
    
		return $templates;
	}
}