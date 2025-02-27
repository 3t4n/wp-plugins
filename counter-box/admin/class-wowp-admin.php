<?php

/**
 * Class WOWP_Admin
 *
 * The main admin class responsible for initializing the admin functionality of the plugin.
 *
 * @package    CounterBox
 * @subpackage Admin
 * @author     Dmytro Lobov <dev@wow-company.com>, Wow-Company
 * @copyright  2024 Dmytro Lobov
 * @license    GPL-2.0+
 */

namespace CounterBox;

use CounterBox\Admin\AdminActions;
use CounterBox\Admin\Dashboard;

defined( 'ABSPATH' ) || exit;

class WOWP_Admin {
	public function __construct() {
		Dashboard::init();
		AdminActions::init();
		$this->includes();

		add_action( WOWP_Plugin::PREFIX . '_admin_header_links', [ $this, 'plugin_links' ] );
		add_filter( WOWP_Plugin::PREFIX . '_save_settings', [ $this, 'save_settings' ] );
		add_action( WOWP_Plugin::PREFIX . '_admin_load_assets', [ $this, 'load_assets' ] );
	}

	public function includes(): void {
		require_once plugin_dir_path( __FILE__ ) . 'class-settings-helper.php';
	}

	public function plugin_links(): void {
		?>
        <div class="wpie-links">
            <a href="<?php echo esc_url( WOWP_Plugin::info( 'pro' ) ); ?>" target="_blank">PRO Plugin</a>
            <a href="<?php echo esc_url( WOWP_Plugin::info( 'docs' ) ); ?>" target="_blank">Documentation</a>
            <a href="<?php echo esc_url( WOWP_Plugin::info( 'rating' ) ); ?>" target="_blank" class="wpie-color-orange">Rating</a>
            <a href="<?php echo esc_url( WOWP_Plugin::info( 'change' ) ); ?>" target="_blank">Check Version</a>
        </div>
		<?php
	}

	public function save_settings() {
		$param = ! empty( $_POST['param'] ) ? map_deep( wp_unslash( $_POST['param'] ), 'sanitize_text_field' ) : [];

		if ( isset( $_POST['param']['content'] ) ) {
			$content_param    = wp_kses_post( wp_unslash( $_POST['param']['content'] ) );
			$param['content'] = wp_encode_emoji( $content_param );
		}

		return $param;
	}

	public function allowed_properties( $allowed_properties ) {
		$allowed_properties[] = 'display';
		$allowed_properties[] = 'list-style';

		return $allowed_properties;
	}

	public function sanitize_text( $text ): string {
		return sanitize_text_field( wp_unslash( $text ) );
	}


	public function load_assets(): void {
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'wp-tinymce' );
		wp_enqueue_editor();
	}


}