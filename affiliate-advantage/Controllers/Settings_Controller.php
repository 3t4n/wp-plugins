<?php


namespace Level_Wp\Affiliate_Advantage\Controllers;


use Level_Wp\Affiliate_Advantage\Helpers\View;
use Level_Wp\Affiliate_Advantage\Plugin;

class Settings_Controller extends Base_Controller {

	public function display_general_settings() {
		_e( 'Settings that change the general behaviour of Smart Affiliate Links.', 'affiliate-advantage' );
	}

	public function display_links_settings() {
		_e( 'Settings that specifically affect the behaviour & appearance of your affiliate links.', 'affiliate-advantage' );
	}

	public function display_setting_field( $args ) {
		$view    = 'settings.' . $args['field'];
		$prefix  = Plugin::get_instance()->prefix;
		$setting = get_option( $args['field'] );

		View::render( $view, compact( 'prefix' ) );
	}

}
