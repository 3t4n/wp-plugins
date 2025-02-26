<?php

class LinerInSite {
	private static $initiated = false;

	/* public methods */

	public static function init() {
		if (!self::$initiated) {
			self::init_hooks();
		}
	}

	public static function do_activation() {

	}

	public static function do_deactivation() {

	}

	/* private methods */

	private static function init_hooks() {
		self::$initiated = true;
		self::load_js();
	}
	
	private static function load_js() {
		wp_enqueue_script('liner-in-site-js', 'https://connect.getliner.com/sdk/sdk-in-site.js', false);
		wp_enqueue_script('liner-in-site-js');
	}
}
