<?php

namespace BULKYWP\Includes;

defined( 'ABSPATH' ) || exit;

class Support {


	protected static $instance = null;

	public function __construct() {
		$this->support();
	}

	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function support() {
		if ( ! class_exists( 'VillaTheme_Support' ) ) {
			include_once BULKYWP_CONST_F['plugin_dir'] . 'support/support.php';
		}

		new \VillaTheme_Support(
			array(
				'support'   => 'https://wordpress.org/support/plugin/wpbulky-wp-bulk-edit-post-types',
				'docs'      => 'http://docs.villatheme.com/?item=wpbulky',
				'review'    => 'https://wordpress.org/support/plugin/wpbulky-wp-bulk-edit-post-types/reviews/?rate=5#rate-response',
				'css'       => BULKYWP_CONST_F['dist_url'],
				'image'     => BULKYWP_CONST_F['img_url'],
				'slug'      => BULKYWP_CONST_F['full_slug'],
				'menu_slug' => 'vi_wpbulky_settings',
				'version'   => BULKYWP_CONST_F['version'],
				'pro_url'   => BULKYWP_CONST_F['pro_url'],
				'survey_url' => 'https://script.google.com/macros/s/AKfycbwM5XhOFF81UDs3MgfdDx_AYRqzpNcfHz-uVmM3bOMCZIvf0QfU_IHZvkaSei6tZFvp/exec'
			)
		);
	}

	public static function get_pro_version() {
		printf( '<a class="vi-ui button tiny" href="%s" target="_blank">%s</a>',
			esc_url( BULKYWP_CONST_F['pro_url'] ), esc_html__( 'Upgrade This Feature', 'wpbulky-wp-bulk-edit-post-types' ) );
	}
}