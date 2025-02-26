<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'al_ext_config' ) ) {

	class al_ext_config {

		const PLUGIN_NAME = 'auto-logout-extended';
		const AL_EXT_CLASS_DIR = __DIR__ . '/class/';
		const AL_EXT_TRAIT_DIR = __DIR__ . '/trait/';
		const AL_EXT_DEFAULT_LOGOUT_TYPE = 1;
		const AL_EXT_DEFAULT_EXPIRE_DATE = 14;
		const AL_EXT_DEFAULT_EXPIRE_TIME = 60;
		const AL_EXT_TEMPLATE_DIR = __DIR__ . '/template/';
		const AL_EXT_REMEMBER_COOKIE = 'al_ext_remember';
		const AL_EXT_TMP_COOKIE = 'al_ext_logged_in';

		public static function get_default_logout_url() {
			return home_url( 'wp-admin' );
		}

	}

}