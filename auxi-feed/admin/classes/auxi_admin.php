<?php

/**
 * Created by PhpStorm.
 * User: slsdeveloper
 * Date: 12/4/15
 * Time: 8:25 PM
 */
class auxi_admin {


	public function auxi_admin_assets() {
		wp_register_script( 'admin_0-js', plugins_url( 'admin/assets/js/twitter_admin_feed.js', __FILE__ ), '', '1.0', true );
		wp_enqueue_script( 'admin-1-js', plugins_url( 'admin/assets/js/twitter_admin_feed.js', __FILE__ ) );
		wp_register_script( 'validate-0-js', plugins_url( 'admin/assets/js/jquery-validation/dist/jquery.validate.js', __FILE__ ), '', '1.0', true );
		wp_enqueue_script( 'validate-1-js', plugins_url( 'admin/assets/js/jquery-validation/dist/jquery.validate.js', __FILE__ ) );
		wp_enqueue_style( 'admin-style-css', plugins_url( 'admin/assets/css/admin_style.css', __FILE__ ), array() );
	}

/*
	public function auxi_is_user_admin() {

		if ( current_user_can( "manage_options" ) ) {

			self::auxi_get_admin_assets();
			$this->user_ID    = get_current_user_id();
			$this->admin_page = $this->ui_elements->get_admin_page();

		} else {
			return;
		}
	}

	public function auxi_get_admin_assets() {
		if ( ! isset( $_GET['page'] ) ) {
			return;
		} else {

			$page_name = $_GET['page'];
			if ( $page_name == "tw00001" ) {
				add_action( 'admin_enqueue_scripts', array( $this, 'auxi_load_admin_assets' ) );

			} else {
				return;
			}
		}
	}

*/

}