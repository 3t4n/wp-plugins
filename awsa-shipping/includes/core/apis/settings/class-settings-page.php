<?php

namespace AWSA_Core\APIs\Settings;

use AWSA_Core\APIs\Settings\Page;

class Settings_Page {

	/**
	 * @var Settings_Page
	 */
	protected static $instance;

	/**
	 * @return Settings_Page
	 */
	public static function instance(): Settings_Page {

		if ( is_null( self::$instance ) ) {

			self::$instance = new self();
		}

		return self::$instance;
	}

	public function init(): void {

		add_action( 'admin_post_awsa_settings_page', array( $this, 'update_settings_page' ) );
	}

	public function update_settings_page(): void {

		Page\Settings_Page::instance()->save_settings();
	}

	public function display( $page_slug = '' ): void {

		Page\Display_Page::instance( $page_slug )->display_settings();
	}

}
