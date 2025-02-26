<?php

namespace Level_Wp\Affiliate_Advantage\Providers;

use Level_Wp\Affiliate_Advantage\Plugin;
use Level_Wp\Affiliate_Advantage\Controllers\affiliate_advantage_Controller;

class Init_Service_Provider extends Base_Service_Provider {

	/**
	 * @inheritDoc
	 */
	public function register() {
        add_action( 'init', [ $this, 'run' ] );
		Plugin::get_instance()->freemius()->add_filter( 'hide_freemius_powered_by', [ $this, 'hide_freemius_powered_by' ] );
	}

	/**
	 * @inheritDoc
	 */
	public function run() {

	}

	public function hide_freemius_powered_by() {
		return true;
	}
}