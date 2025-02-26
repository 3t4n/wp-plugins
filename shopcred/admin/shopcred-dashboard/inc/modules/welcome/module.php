<?php
namespace  ShopCred\Modules\Welcome;

use ShopCred\Base\Page_Module as Page_Module_Base;
use ShopCred\Dashboard as Dashboard;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Module extends Page_Module_Base {

	/**
	 * Returns module slug
	 *
	 * @return void
	 */
	public function get_page_slug() {
		return 'welcome-page';
	}

	/**
	 * [get_subpage_slug description]
	 * @return [type] [description]
	 */
	public function get_parent_slug() {
		return false;
	}

	/**
	 * [get_page_name description]
	 * @return [type] [description]
	 */
	public function get_page_name() {
		return esc_html__( 'Welcome', 'shopcred' );
	}

	/**
	 * [get_category description]
	 * @return [type] [description]
	 */
	public function get_category() {
		return false;
	}

	/**
	 * [get_page_link description]
	 * @return [type] [description]
	 */
	public function get_page_link() {
		return Dashboard::get_instance()->get_dashboard_page_url( $this->get_page_slug(), $this->get_parent_slug() );
	}

	/**
	 * [init description]
	 * @return [type] [description]
	 */
	public function init() {

	}

	/**
	 * Enqueue module-specific assets
	 *
	 * @return void
	 */
	public function enqueue_module_assets() {

		wp_enqueue_script(
			'shopcred-welcome-page',
			Dashboard::get_instance()->get_dashboard_url() . 'assets/js/welcome-page.js',
			array( 'cx-vue-ui' ),
			Dashboard::get_instance()->get_dashboard_version(),
			true
		);
	}

	/**
	 * License page config
	 *
	 * @param  array  $config  [description]
	 * @param  string $subpage [description]
	 * @return [type]          [description]
	 */
	public function page_config( $config = array(), $page = false, $subpage = false ) {

		$config['pageModule']        = $this->get_page_slug();
		$config['extrasConfig']      = Dashboard::get_instance()->data_manager->get_dashboard_config( 'extras' );
		$config['generalConfig']     = Dashboard::get_instance()->data_manager->get_dashboard_config( 'general' );
		$config['adminUrl']          = admin_url();
		$config['categoryList']      = Dashboard::get_instance()->module_manager->get_subpage_category_list('settings-page');
		
		return $config;
	}

	/**
	 * Add welcome component template
	 *
	 * @param  array  $templates [description]
	 * @param  string $subpage   [description]
	 * @return [type]            [description]
	 */
	public function page_templates( $templates = array(), $page = false, $subpage = false ) {
		// check if the pro plugin installed or not
		if(is_plugin_active(SPC_PLUGIN_PRO_FOLDER_NAME_TYPE1.'/shopcred-pro.php')){
			$templates['welcome-page']           = WP_CONTENT_DIR . '/plugins/shopcred-pro/admin/shopcred-dashboard/views/welcome/main.php';
		} else {
			$templates['welcome-page']           = Dashboard::get_instance()->get_view( 'welcome/main' );
		}
		
		$templates['plugin-settings-toggle'] = Dashboard::get_instance()->get_view( 'settings/plugin-settings-toggle' );

		return $templates;
	}
}
