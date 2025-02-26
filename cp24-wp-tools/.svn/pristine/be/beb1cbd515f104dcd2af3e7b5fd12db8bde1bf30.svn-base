<?php

namespace CP24\Tools\Inc\Layout\Page;

defined( 'ABSPATH' ) || exit;

use CP24\Tools\Inc\Settings;
use CP24\Tools\Inc\Init;

class Page {
	/**
	 * Constructor method.
	 *
	 * @since 1.2.0
	 */
	public function __construct() {
		add_filter( 'theme_page_templates', [ $this, 'add_cp24_page_templates_to_edit_screen' ], 10 );
		add_filter( 'template_include',  [ $this, 'load_cp24_page_templates' ], 10 );
	}

	/**
	 * Add CP24 page templates to the edit screen.
	 *
	 * @since 1.2.0
	 */
	public function add_cp24_page_templates_to_edit_screen( $templates ) {
		$templates['cp24_default'] = 'CP24 Default';

		return $templates;
	}

	/**
	 * Load CP24 page templates.
	 *
	 * @since 1.2.0
	 */
	public function load_cp24_page_templates( $template ) {
		$default_template = CP24_MULTI_SMTP_PATH . 'inc/layout/page/page-templates/default.php';

		if ( file_exists( $default_template ) && is_page_template( 'cp24_default' ) ) {
            return $default_template;
        }

		return $template;
	}
}

