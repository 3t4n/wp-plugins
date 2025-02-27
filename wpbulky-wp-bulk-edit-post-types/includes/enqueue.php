<?php

namespace BULKYWP\Includes;

use BULKYWP\Admin\History;

defined( 'ABSPATH' ) || exit;

class Enqueue {

	protected static $instance = null;

	public function __construct() {
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'remove_other_plugin_scripts' ], PHP_INT_MAX );
	}

	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function register_styles( $styles, $libs = false ) {
		$src = $libs ? BULKYWP_CONST_F['libs_url'] : BULKYWP_CONST_F['dist_url'];
//		$suffix = $libs ? '.min.css' : '.css';
		$suffix = $libs || ! ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? '.min.css' : '.css';

		$styles = explode( ',', str_replace( ' ', '', $styles ) );
		foreach ( $styles as $style ) {
			wp_register_style( BULKYWP_CONST_F['assets_slug'] . $style, $src . $style . $suffix, '', BULKYWP_CONST_F['version'] );
		}
	}

	public function register_scripts( $scripts, $libs = false ) {
		$suffix = SCRIPT_DEBUG ? '' : '.min';
		$suffix = $libs ? '.min' : $suffix;

		$src = $libs ? BULKYWP_CONST_F['libs_url'] : BULKYWP_CONST_F['dist_url'];
		foreach ( $scripts as $script => $depend ) {
			wp_register_script( BULKYWP_CONST_F['assets_slug'] . $script, $src . $script . $suffix . '.js', (array) $depend, BULKYWP_CONST_F['version'], true );
		}
	}

	public function enqueue_styles( $styles ) {
		$styles = explode( ',', str_replace( ' ', '', $styles ) );
		foreach ( $styles as $style ) {
			wp_enqueue_style( BULKYWP_CONST_F['assets_slug'] . $style );
		}
	}

	public function enqueue_scripts( $scripts ) {
		$scripts = explode( ',', str_replace( ' ', '', $scripts ) );
		foreach ( $scripts as $script ) {
			wp_enqueue_script( BULKYWP_CONST_F['assets_slug'] . $script );
		}
	}

	public function admin_enqueue_scripts() {
		$post_types = Data::get_param( 'post_types' );

		$screen = get_current_screen()->id;

		$this->register_styles( 'header,tab,menu,segment,form,table,checkbox,dropdown,transition,popup,accordion,select2,button,input,label,list,dimmer,modal,message,icon,jsoneditor,jsuite,jexcel,', true );

		$this->register_styles( 'settings,editor' );

		$lib_scripts = [
			'transition'  => [ 'jquery' ],
			'dropdown'    => [ 'jquery' ],
			'modal'       => [ 'jquery' ],
			'dimmer'      => [ 'jquery' ],
			'select2'     => [ 'jquery' ],
			'accordion'   => [ 'jquery' ],
			'address-1.6' => [ 'jquery' ],
			'tab'         => [ 'jquery' ],
			'jsuite'      => [],
			'jsoneditor'  => [],
		];

		$scripts = [
			'jexcel'   => [],
			'editor'   => [ 'jquery' ],
			'settings' => [ 'jquery' ]
		];

		$this->register_scripts( $lib_scripts, true );
		$this->register_scripts( $scripts );


		switch ( $screen ) {
			case 'toplevel_page_vi_wpbulky_settings':
				$this->enqueue_styles( 'form,icon,input,menu,tab,checkbox,button,segment,select2,settings' );
				$this->enqueue_scripts( 'address-1.6,tab,select2,settings' );
				break;

			default:
				$post_type = str_replace( 'wpbulky_page_vi_wpbulky_edit_', '', $screen );

				if ( empty( $post_types ) ) {
					break;
				}

				if ( ! in_array( $post_type, $post_types ) ) {
					break;
				}

				global $wpbulky_post_type;
				$wpbulky_post_type = $post_type;

				wp_enqueue_media();
				wp_enqueue_editor();
				wp_enqueue_script( 'jquery-ui-sortable' );

				$this->enqueue_styles( 'checkbox,accordion,jsoneditor,popup,tab,table,dimmer,modal,message,label,input,form,header,select2,transition,dropdown,icon,segment,menu,button,jsuite,jexcel,editor' );
				$this->enqueue_scripts( 'accordion,jsoneditor,tab,dimmer,modal,select2,transition,dropdown,jsuite,jexcel,editor' );

				$columns    = BulkyWP_Data()->get_columns_type();
				$id_mapping = array_keys( $columns );

				wp_localize_script( BULKYWP_CONST_F['assets_slug'] . 'editor', 'wpbulkyParams', [
					'ajaxUrl'       => admin_url( 'admin-ajax.php' ),
					'nonce'         => wp_create_nonce( 'vi_wpbulky_nonce' ),
					'columns'       => wp_json_encode( array_values( $columns ) ),
					'idMapping'     => $id_mapping,
					'idMappingFlip' => array_flip( $id_mapping ),
					'metaFields'    => get_option( "vi_wpbulky_{$post_type}_meta_fields" ),
					'settings'      => BulkyWP_Data()->get_settings(),
					'historyPages'  => History::instance()->count_history_pages(),
					'adminUrl'      => admin_url(),
					'frontendUrl'   => site_url(),
					'postType'      => $post_type
				] );

				wp_localize_script( BULKYWP_CONST_F['assets_slug'] . 'editor', 'wpbulkyI18n', [
					'i18n' => I18n::i18n()
				] );

				break;
		}

		$_post_type = str_replace( 'edit-', '', $screen );

		if ( ! empty( $post_types ) ) {
			if ( in_array( $_post_type, $post_types ) ) {
				$this->register_scripts( [ 'admin' => [ 'jquery' ] ] );
				$this->enqueue_scripts( 'admin' );
				$params = [
					'postType' => $_post_type,
					'url'      => admin_url( "admin.php?page=vi_wpbulky_edit_{$_post_type}" ),
					'text'     => esc_html__( 'Go to Bulk Editor page', 'wpbulky-wp-bulk-edit-post-types' )
				];

				wp_localize_script( BULKYWP_CONST_F['assets_slug'] . 'admin', 'wpBulkyParams', $params );
			}
		}

	}

	public function remove_other_plugin_scripts() {
		$screen = get_current_screen()->id;

		if ( substr( $screen, 13, 16 ) === 'vi_wpbulky_edit_' || $screen === 'toplevel_page_vi_wpbulky_settings' ) {
			global $wp_scripts;
			$scripts = $wp_scripts->registered;
			foreach ( $scripts as $k => $script ) {
				if ( strpos( $script->src, WP_CONTENT_URL ) !== false && strpos( $script->handle, BULKYWP_CONST_F['assets_slug'] ) === false ) {
					if ( $script->handle === 'query-monitor' ) {
						continue;
					}
					unset( $wp_scripts->registered[ $k ] );
					wp_dequeue_script( $script->handle );
				}
			}
		}
	}
}