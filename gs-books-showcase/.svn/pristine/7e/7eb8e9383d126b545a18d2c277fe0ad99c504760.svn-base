<?php

namespace GS_BOOKS;

use function GS_BOOKS_PRO\is_pro_valid;

defined( 'ABSPATH' ) || exit;

class ShortcodeBuilder {

	private $option_name          = 'gs_bookshowcase_settings';
	private $level_option_name    = 'gs_bookshowcase_level_settings';
	private $taxonomy_option_name = 'gs_books_taxonomy_settings';

	public function __construct() {

		add_action( 'admin_menu', array( $this, 'register_sub_menu' ), 30 );
		add_action( 'admin_enqueue_scripts', array( $this, 'scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'preview_scripts' ) );

		add_action( 'wp_ajax_gs_books_create_shortcode', array( $this, 'create_shortcode' ) );
		add_action( 'wp_ajax_gs_books_clone_shortcode', array( $this, 'clone_shortcode' ) );
		add_action( 'wp_ajax_gs_books_get_shortcode', array( $this, 'get_shortcode' ) );
		add_action( 'wp_ajax_gs_books_update_shortcode', array( $this, 'update_shortcode' ) );
		add_action( 'wp_ajax_gs_books_delete_shortcodes', array( $this, 'delete_shortcodes' ) );
		add_action( 'wp_ajax_gs_books_temp_save_shortcode_settings', array( $this, 'temp_save_shortcode_settings' ) );
		add_action( 'wp_ajax_gs_books_get_shortcodes', array( $this, 'get_shortcodes' ) );

		add_action( 'wp_ajax_gs_books_get_shortcode_pref', array( $this, 'get_shortcode_pref' ) );
		add_action( 'wp_ajax_gs_books_save_shortcode_pref', array( $this, 'save_shortcode_pref' ) );

		add_action( 'wp_ajax_gs_books_get_localization', array( $this, 'get_localization' ) );
		add_action( 'wp_ajax_gs_books_save_localization', array( $this, 'save_localization' ) );

		add_action( 'wp_ajax_gsbooks_get_taxonomy_settings', array($this, 'get_taxonomy_settings') );
		add_action( 'wp_ajax_gsbooks_save_taxonomy_settings', array($this, 'save_taxonomy_settings') );

		add_action( 'template_include', array( $this, 'populate_shortcode_preview' ) );
		add_action( 'show_admin_bar', array( $this, 'hide_admin_bar_from_preview' ) );

		// add_filter( 'body_class', array($this, 'add_shortcode_body_class') );

		return $this;
	}

	public function is_gs_books_shortcode_preview() {
		return isset( $_REQUEST['gs_books_shortcode_preview'] ) && ! empty( $_REQUEST['gs_books_shortcode_preview'] );
	}

	public function hide_admin_bar_from_preview( $visibility ) {
		if ( $this->is_gs_books_shortcode_preview() ) {
			return false;
		}

		return $visibility;
	}

	public function get_taxonomy_settings() {
		return $this->_get_taxonomy_settings( wp_doing_ajax() );
	}

	public function get_localization() {
		$localizations = get_option( $this->level_option_name, [] );

		if ( wp_doing_ajax() ) {
			wp_send_json_success( $localizations );
		}

		return $localizations;
	}

	public function _get_taxonomy_settings( $is_ajax ) {

		$settings = (array) get_option( $this->taxonomy_option_name, [] );
		$settings = $this->validate_taxonomy_settings( $settings );

		if ( $is_ajax ) {
			wp_send_json_success( $settings );
		}

		return $settings;

	}

	public function validate_taxonomy_settings( $settings ) {

		$defaults = $this->get_taxonomy_default_settings();

		if ( empty($settings) ) {
			$settings = $defaults;
		} else {
			foreach ( $settings as $setting_key => $setting_val ) {
				if ( str_contains($setting_key, '_label') && empty($setting_val) ) {
					$settings[$setting_key] = $defaults[$setting_key];
				}
			}
		}
		
		return array_map( 'sanitize_text_field', $settings );
	}

	public function get_tax_option( $option, $default = '' ) {
		$options  = (array) get_option( $this->taxonomy_option_name, [] );
		$defaults = $this->get_taxonomy_default_settings();
		$options  = array_merge($defaults, $options);

		if ( str_contains($option, '_label') && ( getoption('gs_member_enable_multilingual', 'off') == 'on' ) ) {
			return $defaults[$option];
		}

		if ( str_contains($option, '_label') && empty($options[$option]) ) {
			return $defaults[$option] ?? '';
		}

		if ( isset($options[$option]) ) return $options[$option];
		return $default;
	}

	public function save_taxonomy_settings() {
		
		check_ajax_referer( '_gs_books_admin_nonce_gs_' );
		
		if ( empty($_POST['tax_settings']) ) {
			wp_send_json_error( __('No settings provided', 'gsbookshowcase'), 400 );
		}

		$this->_save_taxonomy_settings( $_POST['tax_settings'], true );
	}

	public function _save_taxonomy_settings( $settings, $is_ajax ) {

		if ( empty($settings) ) $settings = [];

		$settings = $this->validate_taxonomy_settings( $settings );
		update_option( $this->taxonomy_option_name, $settings, 'yes' );
		
		// Clean permalink flush
		delete_option( 'GS_book_permalinks_flushed' );

		do_action( 'gs_book_tax_settings_update' );
		do_action( 'gsp_tax_settings_update' );
	
		if ( $is_ajax ) wp_send_json_success( __('Taxonomy settings saved', 'gsbookshowcase') );
	}

	public function add_shortcode_body_class( $classes ) {
		if ( $this->is_gs_books_shortcode_preview() ) {
			return array_merge( $classes, array( 'gsbooks-shortcode-preview--page' ) );
		}

		return $classes;
	}

	public function populate_shortcode_preview( $template ) {
		global $wp, $wp_query;

		if ( $this->is_gs_books_shortcode_preview() ) {

			// Create our fake post
			$post_id              = rand( 1, 99999 ) - 9999999;
			$post                 = new \stdClass();
			$post->ID             = $post_id;
			$post->post_author    = 1;
			$post->post_date      = current_time( 'mysql' );
			$post->post_date_gmt  = current_time( 'mysql', 1 );
			$post->post_title     = __( 'Shortcode Preview', 'gsbookshowcase' );
			$post->post_content   = sprintf( '[gs_bookshowcase preview="yes" id="%s"]', $_REQUEST['gs_books_shortcode_preview'] );
			$post->post_status    = 'publish';
			$post->comment_status = 'closed';
			$post->ping_status    = 'closed';
			$post->post_name      = 'fake-page-' . rand( 1, 99999 ); // append random number to avoid clash
			$post->post_type      = 'page';
			$post->filter         = 'raw'; // important!

			// Convert to WP_Post object
			$wp_post = new \WP_Post( $post );

			// Add the fake post to the cache
			wp_cache_add( $post_id, $wp_post, 'posts' );

			// Update the main query
			$wp_query->post                 = $wp_post;
			$wp_query->posts                = array( $wp_post );
			$wp_query->queried_object       = $wp_post;
			$wp_query->queried_object_id    = $post_id;
			$wp_query->found_posts          = 1;
			$wp_query->post_count           = 1;
			$wp_query->max_num_pages        = 1;
			$wp_query->is_page              = true;
			$wp_query->is_singular          = true;
			$wp_query->is_single            = false;
			$wp_query->is_attachment        = false;
			$wp_query->is_archive           = false;
			$wp_query->is_category          = false;
			$wp_query->is_tag               = false;
			$wp_query->is_tax               = false;
			$wp_query->is_author            = false;
			$wp_query->is_date              = false;
			$wp_query->is_year              = false;
			$wp_query->is_month             = false;
			$wp_query->is_day               = false;
			$wp_query->is_time              = false;
			$wp_query->is_search            = false;
			$wp_query->is_feed              = false;
			$wp_query->is_comment_feed      = false;
			$wp_query->is_trackback         = false;
			$wp_query->is_home              = false;
			$wp_query->is_embed             = false;
			$wp_query->is_404               = false;
			$wp_query->is_paged             = false;
			$wp_query->is_admin             = false;
			$wp_query->is_preview           = false;
			$wp_query->is_robots            = false;
			$wp_query->is_posts_page        = false;
			$wp_query->is_post_type_archive = false;

			// Update globals
			$GLOBALS['wp_query'] = $wp_query;
			$wp->register_globals();

			include GS_BOOKS_PLUGIN_DIR . 'includes/shortcode-builder/preview.php';

			return;
		}

		return $template;
	}

	public function register_sub_menu() {

		add_submenu_page(
			'edit.php?post_type=gs_bookshowcase',
			__( 'Shortcode', 'gsbookshowcase' ),
			__( 'Shortcode', 'gsbookshowcase' ),
			'manage_options',
			'gs-books-shortcode',
			array( $this, 'view' )
		);

		add_submenu_page(
			'edit.php?post_type=gs_bookshowcase',
			__( 'Install Demo', 'gsbookshowcase' ),
			__( 'Install Demo', 'gsbookshowcase' ),
			'manage_options',
			'gs-books-shortcode#/demo-data',
			array( $this, 'view' ), 20
		);
	}

	public function view() {
		include GS_BOOKS_PLUGIN_DIR . 'includes/shortcode-builder/page.php';
	}

	public function get_book_categories() {
		$_terms = get_terms(
			'bookshowcase_group',
			array(
				'hide_empty' => false,
			)
		);

		$terms = array();

		if ( ! is_wp_error( $_terms ) ) {
			foreach ( $_terms as $term ) {
				$terms[] = array(
					'label' => $term->name,
					'value' => $term->slug,
				);
			}
		}

		return $terms;
	}

	public function get_book_tags() {

		$_terms = get_terms(
			'gsb_tag',
			array(
				'hide_empty' => false,
			)
		);

		$terms = array();

		if ( ! is_wp_error( $_terms ) ) {
			foreach ( $_terms as $term ) {
				$terms[] = array(
					'label' => $term->name,
					'value' => $term->slug,
				);
			}
		}

		return $terms;
	}

	public function get_book_authors() {

		$_terms = get_terms(
			'gsb_author',
			array(
				'hide_empty' => false,
			)
		);

		$terms = array();

		if ( ! is_wp_error( $_terms ) ) {
			foreach ( $_terms as $term ) {
				$terms[] = array(
					'label' => $term->name,
					'value' => $term->slug,
				);
			}
		}

		return $terms;
	}

	public function get_book_genres() {

		$_terms = get_terms(
			'gsb_genre',
			array(
				'hide_empty' => false,
			)
		);

		$terms = array();

		if ( ! is_wp_error( $_terms ) ) {
			foreach ( $_terms as $term ) {
				$terms[] = array(
					'label' => $term->name,
					'value' => $term->slug,
				);
			}
		}

		return $terms;
	}

	public function get_book_series() {

		$_terms = get_terms(
			'gsb_series',
			array(
				'hide_empty' => false,
			)
		);

		$terms = array();

		if ( ! is_wp_error( $_terms ) ) {
			foreach ( $_terms as $term ) {
				$terms[] = array(
					'label' => $term->name,
					'value' => $term->slug,
				);
			}
		}

		return $terms;
	}

	public function get_book_languages() {

		$_terms = get_terms(
			'gsb_languages',
			array(
				'hide_empty' => false,
			)
		);

		$terms = array();

		if ( ! is_wp_error( $_terms ) ) {
			foreach ( $_terms as $term ) {
				$terms[] = array(
					'label' => $term->name,
					'value' => $term->slug,
				);
			}
		}

		return $terms;
	}

	public function get_book_publishers() {

		$_terms = get_terms(
			'gsb_publishers',
			array(
				'hide_empty' => false,
			)
		);

		$terms = array();

		if ( ! is_wp_error( $_terms ) ) {
			foreach ( $_terms as $term ) {
				$terms[] = array(
					'label' => $term->name,
					'value' => $term->slug,
				);
			}
		}

		return $terms;
	}

	public function get_book_countries() {

		$_terms = get_terms(
			'gsb_countries',
			array(
				'hide_empty' => false,
			)
		);

		$terms = array();

		if ( ! is_wp_error( $_terms ) ) {
			foreach ( $_terms as $term ) {
				$terms[] = array(
					'label' => $term->name,
					'value' => $term->slug,
				);
			}
		}

		return $terms;
	}

	public function scripts( $hook ) {

		if ( 'gs_bookshowcase_page_gs-books-shortcode' != $hook ) {
			return;
		}

		wp_register_style(
			'gs-zmdi-fonts',
			GS_BOOKS_PLUGIN_URI . '/assets/libs/material-design-iconic-font/css/material-design-iconic-font.min.css',
			'',
			GS_BOOKS_VERSION,
			'all'
		);

		wp_enqueue_style(
			'gs-books-shortcode',
			GS_BOOKS_PLUGIN_URI . '/assets/admin/css/gs-books-shortcode.min.css',
			array( 'gs-zmdi-fonts' ),
			GS_BOOKS_VERSION,
			'all'
		);

		$data = array(
			'nonce'    => wp_create_nonce( '_gs_books_admin_nonce_gs_' ),
			'ajaxurl'  => admin_url( 'admin-ajax.php' ),
			'adminurl' => admin_url(),
			'siteurl'  => home_url(),
		);

		$data['shortcode_settings'] = $this->get_shortcode_default_settings();
		$data['shortcode_options']  = $this->get_shortcode_default_options();
		$data['translations']       = $this->get_translation_srtings();
		$data['preference']         = $this->get_shortcode_default_prefs();
		$data['preference_options'] = $this->get_shortcode_prefs_options();
		$data['taxonomy_settings']  = $this->get_taxonomy_default_settings();
		$data['is_multilingual']    = $this->is_multilingual_enabled();
		$data['is_pro']    		    = is_pro_active() && is_pro_valid();

		$data['demo_data'] = array(
			'book_data'      => wp_validate_boolean( get_option( 'gsbooks_dummy_book_data_created' ) ),
			'shortcode_data' => wp_validate_boolean( get_option( 'gsbooks_dummy_shortcode_data_created' ) ),
		);

		if ( is_pro_active() && is_pro_valid() ) {
			wp_enqueue_script(
				'gs-books-shortcode',
				GS_BOOKS_PRO_PLUGIN_URI . '/assets/admin/js/gs-books-shortcode.min.js',
				array( 'jquery', 'wp-color-picker' ),
				GS_BOOKS_PRO_VERSION,
				true
			);
		} else {
			wp_enqueue_script(
				'gs-books-shortcode',
				GS_BOOKS_PLUGIN_URI . '/assets/admin/js/gs-books-shortcode.min.js',
				array( 'jquery', 'wp-color-picker' ),
				GS_BOOKS_VERSION,
				true
			);
		}

		wp_localize_script( 'gs-books-shortcode', '_gs_books_data', $data );
	}

	public function preview_scripts() {
		if ( ! $this->is_gs_books_shortcode_preview() ) {
			return;
		}

		wp_enqueue_style(
			'gs-books-shortcode-preview',
			GS_BOOKS_PLUGIN_URI . '/assets/css/gs-books-shortcode-preview.min.css',
			[],
			GS_BOOKS_VERSION,
			'all'
		);
	}

	public function gs_books_get_wpdb() {
		global $wpdb;

		if ( wp_doing_ajax() ) {
			$wpdb->show_errors = false;
		}

		return $wpdb;
	}

	public function gs_books_check_db_error() {
		$wpdb = $this->gs_books_get_wpdb();

		if ( $wpdb->last_error === '' ) {
			return false;
		}

		return true;
	}

	public function is_multilingual_enabled() {
		return $this->_get_shortcode_pref( false )['gs_member_enable_multilingual'] == 'on';
	}

	public function validate_shortcode_settings( $shortcode_settings ) {

		$shortcode_settings = shortcode_atts( $this->get_shortcode_default_settings(), $shortcode_settings );

		$shortcode_settings['theme']                           = sanitize_text_field( $shortcode_settings['theme'] );
		$shortcode_settings['view_type']                       = sanitize_text_field( $shortcode_settings['view_type'] );
		$shortcode_settings['gsb_filter_by']                   = sanitize_text_field( $shortcode_settings['gsb_filter_by'] );
		$shortcode_settings['filter_position']                 = sanitize_text_field( $shortcode_settings['filter_position'] );
		$shortcode_settings['filter_style']                    = sanitize_text_field( $shortcode_settings['filter_style'] );
		$shortcode_settings['gs_book_title_font']              = sanitize_text_field( $shortcode_settings['gs_book_title_font'] );
		$shortcode_settings['gs_book_fz']                      = intval( $shortcode_settings['gs_book_fz'] );
		$shortcode_settings['columns']                         = intval( $shortcode_settings['columns'] );
		$shortcode_settings['columns_tablet']                  = intval( $shortcode_settings['columns_tablet'] );
		$shortcode_settings['columns_mobile_portrait']         = intval( $shortcode_settings['columns_mobile_portrait'] );
		$shortcode_settings['columns_mobile']                  = intval( $shortcode_settings['columns_mobile'] );
		$shortcode_settings['link_type']                       = sanitize_text_field( $shortcode_settings['link_type'] );
		$shortcode_settings['gs_book_title']                   = wp_validate_boolean( $shortcode_settings['gs_book_title'] );
		$shortcode_settings['search_by_name']                  = wp_validate_boolean( $shortcode_settings['search_by_name'] );
		$shortcode_settings['search_by_isbn']                  = wp_validate_boolean( $shortcode_settings['search_by_isbn'] );
		$shortcode_settings['search_by_asin']                  = wp_validate_boolean( $shortcode_settings['search_by_asin'] );
		$shortcode_settings['search_by_countries']             = wp_validate_boolean( $shortcode_settings['search_by_countries'] );
		$shortcode_settings['search_by_publishers']            = wp_validate_boolean( $shortcode_settings['search_by_publishers'] );
		$shortcode_settings['search_by_languages']             = wp_validate_boolean( $shortcode_settings['search_by_languages'] );
		$shortcode_settings['search_by_tags']                  = wp_validate_boolean( $shortcode_settings['search_by_tags'] );
		$shortcode_settings['search_by_categories']            = wp_validate_boolean( $shortcode_settings['search_by_categories'] );
		$shortcode_settings['search_by_genres']                = wp_validate_boolean( $shortcode_settings['search_by_genres'] );
		$shortcode_settings['search_by_authors']               = wp_validate_boolean( $shortcode_settings['search_by_authors'] );
		$shortcode_settings['search_by_series']                = wp_validate_boolean( $shortcode_settings['search_by_series'] );
		$shortcode_settings['gs_book_pagination']              = wp_validate_boolean( $shortcode_settings['gs_book_pagination'] );
		$shortcode_settings['posts_per_page']                  = intval( $shortcode_settings['posts_per_page'] );
		$shortcode_settings['show_all']                        = wp_validate_boolean( $shortcode_settings['show_all'] );
		$shortcode_settings['show_all_text']                   = sanitize_text_field( $shortcode_settings['show_all_text'] );
		$shortcode_settings['gs_book_details']                 = wp_validate_boolean( $shortcode_settings['gs_book_details'] );
		$shortcode_settings['gs_book_store']                   = wp_validate_boolean( $shortcode_settings['gs_book_store'] );
		$shortcode_settings['gs_book_enable_multi_select']     = wp_validate_boolean( $shortcode_settings['gs_book_enable_multi_select'] );
		$shortcode_settings['gs_book_multi_select_ellipsis']   = wp_validate_boolean( $shortcode_settings['gs_book_multi_select_ellipsis'] );
		$shortcode_settings['gs_book_enable_clear_filters']    = wp_validate_boolean( $shortcode_settings['gs_book_enable_clear_filters'] );
		$shortcode_settings['desc_limit']                      = intval( $shortcode_settings['desc_limit'] );
		$shortcode_settings['gs_book_category']                = wp_validate_boolean( $shortcode_settings['gs_book_category'] );
		$shortcode_settings['gs_book_author']                  = wp_validate_boolean( $shortcode_settings['gs_book_author'] );
		$shortcode_settings['gs_child_tax']                    = wp_validate_boolean( $shortcode_settings['gs_child_tax'] );
		$shortcode_settings['gs_book_publish']                 = wp_validate_boolean( $shortcode_settings['gs_book_publish'] );
		$shortcode_settings['gs_book_publisher']               = wp_validate_boolean( $shortcode_settings['gs_book_publisher'] );
		$shortcode_settings['gs_book_translator']              = wp_validate_boolean( $shortcode_settings['gs_book_translator'] );
		$shortcode_settings['gs_book_isbn']                    = wp_validate_boolean( $shortcode_settings['gs_book_isbn'] );
		$shortcode_settings['gs_book_asin']                    = wp_validate_boolean( $shortcode_settings['gs_book_asin'] );
		$shortcode_settings['gs_book_pages']                   = wp_validate_boolean( $shortcode_settings['gs_book_pages'] );
		$shortcode_settings['gs_book_country']                 = wp_validate_boolean( $shortcode_settings['gs_book_country'] );
		$shortcode_settings['gs_book_language']                = wp_validate_boolean( $shortcode_settings['gs_book_language'] );
		$shortcode_settings['gs_book_dimension']               = wp_validate_boolean( $shortcode_settings['gs_book_dimension'] );
		$shortcode_settings['gs_book_fsize']                   = wp_validate_boolean( $shortcode_settings['gs_book_fsize'] );
		$shortcode_settings['gsb_slider_navs']                 = wp_validate_boolean( $shortcode_settings['gsb_slider_navs'] );
		$shortcode_settings['gsb_slider_dots']                 = wp_validate_boolean( $shortcode_settings['gsb_slider_dots'] );
		$shortcode_settings['gs_book_authorimg']               = wp_validate_boolean( $shortcode_settings['gs_book_authorimg'] );
		$shortcode_settings['gs_book_author_name']               = wp_validate_boolean( $shortcode_settings['gs_book_author_name'] );
		$shortcode_settings['gs_book_authordes']               = wp_validate_boolean( $shortcode_settings['gs_book_authordes'] );
		$shortcode_settings['gs_book_review']                  = wp_validate_boolean( $shortcode_settings['gs_book_review'] );
		$shortcode_settings['gs_book_rating']                  = wp_validate_boolean( $shortcode_settings['gs_book_rating'] );
		$shortcode_settings['gs_book_url']                     = wp_validate_boolean( $shortcode_settings['gs_book_url'] );
		$shortcode_settings['gs_store_img']                    = wp_validate_boolean( $shortcode_settings['gs_store_img'] );
		$shortcode_settings['gs_book_sin_nxt_prev']            = wp_validate_boolean( $shortcode_settings['gs_book_sin_nxt_prev'] );
		$shortcode_settings['num']                             = intval( $shortcode_settings['num'] );
		$shortcode_settings['order']                           = sanitize_text_field( $shortcode_settings['order'] );
		$shortcode_settings['gs_filter_cat_pos']               = sanitize_text_field( $shortcode_settings['gs_filter_cat_pos'] );
		$shortcode_settings['group']                           = array_map( 'sanitize_text_field', $shortcode_settings['group'] );
		$shortcode_settings['exclude_group']                   = array_map( 'sanitize_text_field', $shortcode_settings['exclude_group'] );
		$shortcode_settings['include_tags']                    = array_map( 'sanitize_text_field', $shortcode_settings['include_tags'] );
		$shortcode_settings['exclude_tags']                    = array_map( 'sanitize_text_field', $shortcode_settings['exclude_tags'] );
		$shortcode_settings['orderby']                         = sanitize_text_field( $shortcode_settings['orderby'] );
		$shortcode_settings['group_order_by']                  = sanitize_text_field( $shortcode_settings['group_order_by'] );
		$shortcode_settings['group_order']                     = sanitize_text_field( $shortcode_settings['group_order'] );
		$shortcode_settings['gs_book_fntw']                    = sanitize_text_field( $shortcode_settings['gs_book_fntw'] );
		$shortcode_settings['gs_book_fnstyl']                  = sanitize_text_field( $shortcode_settings['gs_book_fnstyl'] );
		$shortcode_settings['gs_sin_book_txt_align']           = sanitize_text_field( $shortcode_settings['gs_sin_book_txt_align'] );
		$shortcode_settings['gs_book_thumbnail_sizes']         = sanitize_text_field( $shortcode_settings['gs_book_thumbnail_sizes'] );
		$shortcode_settings['gs_book_thumbnail_sizes_details'] = sanitize_text_field( $shortcode_settings['gs_book_thumbnail_sizes_details'] );
		$shortcode_settings['popup_style']                     = sanitize_text_field( $shortcode_settings['popup_style'] );
		// $shortcode_settings['store_display']                     = sanitize_text_field( $shortcode_settings['store_display'] );
		$shortcode_settings['gs_book_name_color']              = sanitize_text_field( $shortcode_settings['gs_book_name_color'] );
		$shortcode_settings['gs_book_rating_color']            = sanitize_text_field( $shortcode_settings['gs_book_rating_color'] );
		$shortcode_settings['gs_book_label_fz']                = intval( $shortcode_settings['gs_book_label_fz'] );
		$shortcode_settings['gs_book_label_color']             = sanitize_text_field( $shortcode_settings['gs_book_label_color'] );
		$shortcode_settings['gs_books_btn_nav_cls_color']      = sanitize_text_field( $shortcode_settings['gs_books_btn_nav_cls_color'] );
		$shortcode_settings['gs_filter_enabled']               = wp_validate_boolean( $shortcode_settings['gs_filter_enabled'] );
		$shortcode_settings['shortcode_settings']              = wp_validate_boolean( $shortcode_settings['shortcode_settings'] );
		$shortcode_settings['isAutoplay']                      = wp_validate_boolean( $shortcode_settings['isAutoplay'] );
		$shortcode_settings['gsb_navs_style']                  = sanitize_text_field( $shortcode_settings['gsb_navs_style'] );
		$shortcode_settings['gsb_navs_pos']                    = sanitize_text_field( $shortcode_settings['gsb_navs_pos'] );
		$shortcode_settings['gsb_dots_style']                  = sanitize_text_field( $shortcode_settings['gsb_dots_style'] );
		$shortcode_settings['speed']                           = intval( $shortcode_settings['speed'] );
		$shortcode_settings['autoplay_delay']                  = intval( $shortcode_settings['autoplay_delay'] );
		$shortcode_settings['slides_per_group']                = intval( $shortcode_settings['slides_per_group'] );
		$shortcode_settings['pause_on_hover']                  = wp_validate_boolean( $shortcode_settings['pause_on_hover'] );
		$shortcode_settings['infinite_loop']                   = wp_validate_boolean( $shortcode_settings['infinite_loop'] );
		$shortcode_settings['reverse_direction']               = wp_validate_boolean( $shortcode_settings['reverse_direction'] );

		return $shortcode_settings;
	}

	public function get_taxonomy_default_settings() {

		$free_tax = [

			// Category Taxonomy
			'enable_group_tax'         => 'on',
			'group_tax_label'          => __('Category', 'gsbookshowcase'),
			'group_tax_plural_label'   => __('Categories', 'gsbookshowcase'),
			'enable_group_tax_archive' => 'on',
			'group_tax_archive_slug'   => 'bookshowcase_group',

			// Tag Taxonomy
			'enable_tag_tax'           => 'on',
			'tag_tax_label'            => __('Tag', 'gsbookshowcase'),
			'tag_tax_plural_label'     => __('Tags', 'gsbookshowcase'),
			'enable_tag_tax_archive'   => 'on',
			'tag_tax_archive_slug'     => 'gsb_tag',
		];

		$pro_tax = [
			// Author Taxonomy
			'enable_author_tax'           => 'on',
			'author_tax_label'            => __('Author', 'gsbookshowcase'),
			'author_tax_plural_label'     => __('Authors', 'gsbookshowcase'),
			'enable_author_tax_archive'   => 'on',
			'author_tax_archive_slug'     => 'gsb_author',

			// Genre Taxonomy
			'enable_genre_tax'           => 'on',
			'genre_tax_label'            => __('Genre', 'gsbookshowcase'),
			'genre_tax_plural_label'     => __('Genres', 'gsbookshowcase'),
			'enable_genre_tax_archive'   => 'on',
			'genre_tax_archive_slug'     => 'gsb_genre',

			// Series Taxonomy
			'enable_series_tax'           => 'on',
			'series_tax_label'            => __('Series', 'gsbookshowcase'),
			'series_tax_plural_label'     => __('Series', 'gsbookshowcase'),
			'enable_series_tax_archive'   => 'on',
			'series_tax_archive_slug'     => 'gsb_series',

			// Languages Taxonomy
			'enable_language_tax'           => 'on',
			'language_tax_label'            => __('Language', 'gsbookshowcase'),
			'language_tax_plural_label'     => __('Languages', 'gsbookshowcase'),
			'enable_language_tax_archive'   => 'on',
			'language_tax_archive_slug'     => 'gsb_languages',

			// Publishers Taxonomy
			'enable_publisher_tax'           => 'on',
			'publisher_tax_label'            => __('Publisher', 'gsbookshowcase'),
			'publisher_tax_plural_label'     => __('Publishers', 'gsbookshowcase'),
			'enable_publisher_tax_archive'   => 'on',
			'publisher_tax_archive_slug'     => 'gsb_publishers',

			// Countries Taxonomy
			'enable_country_tax'           => 'on',
			'country_tax_label'            => __('Country', 'gsbookshowcase'),
			'country_tax_plural_label'     => __('Countries', 'gsbookshowcase'),
			'enable_country_tax_archive'   => 'on',
			'country_tax_archive_slug'     => 'gsb_countries',
		];

		return is_pro_active() ? array_merge($free_tax, $pro_tax) : $free_tax;

	}

	protected function get_gs_books_shortcode_db_columns() {
		return array(
			'shortcode_name'     => '%s',
			'shortcode_settings' => '%s',
			'created_at'         => '%s',
			'updated_at'         => '%s',
		);
	}

	public function _get_shortcode( $shortcode_id, $is_ajax = false ) {

		if ( empty( $shortcode_id ) ) {
			if ( $is_ajax ) {
				wp_send_json_error( __( 'Shortcode ID missing', 'gsbookshowcase' ), 400 );
			}
			return false;
		}

		$shortcode = wp_cache_get( 'gs_book_shortcode' . $shortcode_id, 'gs_book_showcase' );

		// Return the cache if found
		if ( $shortcode !== false ) {
			if ( $is_ajax ) {
				wp_send_json_success( $shortcode );
			}
			return $shortcode;
		}

		$wpdb      = $this->gs_books_get_wpdb();
		$shortcode = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}gs_books WHERE id = %d LIMIT 1", absint( $shortcode_id ) ), ARRAY_A );

		if ( $shortcode ) {
			$shortcode['shortcode_settings'] = json_decode( $shortcode['shortcode_settings'], true );
			$shortcode['shortcode_settings'] = $this->validate_shortcode_settings( $shortcode['shortcode_settings'] );

			wp_cache_add( 'gs_book_shortcode' . $shortcode_id, $shortcode, 'gs_book_showcase' );

			if ( $is_ajax ) {
				wp_send_json_success( $shortcode );
			}
			return $shortcode;
		}

		if ( $is_ajax ) {
			wp_send_json_error( __( 'No shortcode found', 'gsbookshowcase' ), 404 );
		}

		return false;
	}

	public function _get_shortcodes( $shortcode_ids = array(), $is_ajax = false, $minimal = false ) {
		$wpdb   = $this->gs_books_get_wpdb();
		$fields = $minimal ? 'id, shortcode_name' : '*';

		if ( empty( $shortcode_ids ) ) {
			$shortcodes = $wpdb->get_results( "SELECT {$fields} FROM {$wpdb->prefix}gs_books ORDER BY id DESC", ARRAY_A );
		} else {
			$how_many     = count( $shortcode_ids );
			$placeholders = array_fill( 0, $how_many, '%d' );
			$format       = implode( ', ', $placeholders );
			$query        = "SELECT {$fields} FROM {$wpdb->prefix}gs_books WHERE id IN($format)";
			$shortcodes   = $wpdb->get_results( $wpdb->prepare( $query, $shortcode_ids ), ARRAY_A );
		}

		// check for database error
		if ( $this->gs_books_check_db_error() ) {
			wp_send_json_error( sprintf( __( 'Database Error: %s' ), $wpdb->last_error ) );
		}

		if ( $is_ajax ) {
			wp_send_json_success( $shortcodes );
		}

		return $shortcodes;
	}

	public function create_shortcode() {

		// validate nonce && check permission
		if ( ! check_admin_referer( '_gs_books_admin_nonce_gs_' ) || ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( __( 'Unauthorised Request', 'gsbookshowcase' ), 401 );
		}

		$shortcode_settings = ! empty( $_POST['shortcode_settings'] ) ? $_POST['shortcode_settings'] : '';
		$shortcode_name     = ! empty( $_POST['shortcode_name'] ) ? $_POST['shortcode_name'] : __( 'Undefined', 'gsbookshowcase' );

		if ( empty( $shortcode_settings ) || ! is_array( $shortcode_settings ) ) {
			wp_send_json_error( __( 'Please configure the settings properly', 'gsbookshowcase' ), 206 );
		}

		$shortcode_settings = $this->validate_shortcode_settings( $shortcode_settings );
		$wpdb               = $this->gs_books_get_wpdb();

		$data = array(
			'shortcode_name'     => $shortcode_name,
			'shortcode_settings' => json_encode( $shortcode_settings ),
			'created_at'         => current_time( 'mysql' ),
			'updated_at'         => current_time( 'mysql' ),
		);

		$wpdb->insert(
			"{$wpdb->prefix}gs_books",
			$data,
			$this->get_gs_books_shortcode_db_columns()
		);

		// check for database error
		if ( $this->gs_books_check_db_error() ) {
			wp_send_json_error( sprintf( __( 'Database Error: %s' ), $wpdb->last_error ), 500 );
		}

		// send success response with inserted id
		wp_send_json_success(
			array(
				'message'      => __( 'Shortcode created successfully', 'gsbookshowcase' ),
				'shortcode_id' => $wpdb->insert_id,
			)
		);
	}

	public function clone_shortcode() {
		// validate nonce && check permission
		if ( ! check_admin_referer( '_gs_books_admin_nonce_gs_' ) || ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( __( 'Unauthorised Request', 'gsbookshowcase' ), 401 );
		}

		$clone_id = ! empty( $_POST['clone_id'] ) ? $_POST['clone_id'] : '';

		if ( empty( $clone_id ) ) {
			wp_send_json_error( __( 'Clone Id not provided', 'gsbookshowcase' ), 400 );
		}

		$clone_shortcode = $this->_get_shortcode( $clone_id, false );

		if ( empty( $clone_shortcode ) ) {
			wp_send_json_error( __( 'Clone shortcode not found', 'gsbookshowcase' ), 404 );
		}

		$shortcode_settings = $clone_shortcode['shortcode_settings'];
		$shortcode_name     = $clone_shortcode['shortcode_name'] . ' ' . __( '- Cloned', 'gsbookshowcase' );
		$shortcode_settings = $this->validate_shortcode_settings( $shortcode_settings );

		$wpdb = $this->gs_books_get_wpdb();

		$data = array(
			'shortcode_name'     => $shortcode_name,
			'shortcode_settings' => json_encode( $shortcode_settings ),
			'created_at'         => current_time( 'mysql' ),
			'updated_at'         => current_time( 'mysql' ),
		);

		$wpdb->insert(
			"{$wpdb->prefix}gs_books",
			$data,
			$this->get_gs_books_shortcode_db_columns()
		);

		// check for database error
		if ( $this->gs_books_check_db_error() ) {
			wp_send_json_error( sprintf( __( 'Database Error: %s' ), $wpdb->last_error ), 500 );
		}

		// Get the cloned shortcode
		$shotcode = $this->_get_shortcode( $wpdb->insert_id, false );

		// send success response with inserted id
		wp_send_json_success(
			array(
				'message'   => __( 'Shortcode cloned successfully', 'gsbookshowcase' ),
				'shortcode' => $shotcode,
			)
		);
	}

	public function get_shortcode() {
		$shortcode_id = ! empty( $_GET['id'] ) ? absint( $_GET['id'] ) : null;
		$this->_get_shortcode( $shortcode_id, wp_doing_ajax() );
	}

	public function update_shortcode( $shortcode_id = null, $nonce = null ) {

		if ( ! check_admin_referer( '_gs_books_admin_nonce_gs_' ) || ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( __( 'Unauthorised Request', 'gsbookshowcase' ), 401 );
		}

		$shortcode_id = ! empty( $_POST['id'] ) ? $_POST['id'] : null;

		if ( empty( $shortcode_id ) ) {
			wp_send_json_error( __( 'Shortcode ID missing', 'gsbookshowcase' ), 400 );
		}

		$_shortcode = $this->_get_shortcode( $shortcode_id, false );

		if ( empty( $_shortcode ) ) {
			wp_send_json_error( __( 'No shortcode found to update', 'gsbookshowcase' ), 404 );
		}

		$shortcode_name     = ! empty( $_POST['shortcode_name'] ) ? sanitize_text_field( $_POST['shortcode_name'] ) : sanitize_text_field( $_shortcode['shortcode_name'] );
		$shortcode_settings = ! empty( $_POST['shortcode_settings'] ) ? $_POST['shortcode_settings'] : $_shortcode['shortcode_settings'];

		// Remove dummy indicator on update
		if ( isset( $shortcode_settings['gsbooks-demo_data'] ) ) {
			unset( $shortcode_settings['gsbooks-demo_data'] );
		}

		$shortcode_settings = $this->validate_shortcode_settings( $shortcode_settings );
		$wpdb               = $this->gs_books_get_wpdb();

		$data = array(
			'shortcode_name'     => $shortcode_name,
			'shortcode_settings' => json_encode( $shortcode_settings ),
			'updated_at'         => current_time( 'mysql' ),
		);

		$num_row_updated = $wpdb->update(
			"{$wpdb->prefix}gs_books",
			$data,
			array( 'id' => absint( $shortcode_id ) ),
			$this->get_gs_books_shortcode_db_columns()
		);

		if ( $this->gs_books_check_db_error() ) {
			wp_send_json_error( sprintf( __( 'Database Error: %1$s', 'gsbookshowcase' ), $wpdb->last_error ), 500 );
			return false;
		}

		do_action( 'gs_books_shortcode_updated', $num_row_updated );
		do_action( 'gsp_shortcode_updated', $num_row_updated );

		wp_send_json_success(
			array(
				'message'      => __( 'Shortcode updated', 'gsbookshowcase' ),
				'shortcode_id' => $num_row_updated,
			)
		);
	}

	public function delete_shortcodes() {
		if ( ! check_admin_referer( '_gs_books_admin_nonce_gs_' ) || ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( __( 'Unauthorised Request', 'gsbookshowcase' ), 401 );
		}

		$ids = isset( $_POST['ids'] ) ? $_POST['ids'] : null;

		if ( empty( $ids ) ) {
			wp_send_json_error( __( 'No shortcode ids provided', 'gsbookshowcase' ), 400 );
		}

		$wpdb  = $this->gs_books_get_wpdb();
		$count = count( $ids );
		$ids   = implode( ',', array_map( 'absint', $ids ) );

		$wpdb->query( "DELETE FROM {$wpdb->prefix}gs_books WHERE ID IN($ids)" );

		if ( $this->gs_books_check_db_error() ) {
			wp_send_json_error( sprintf( __( 'Database Error: %s' ), $wpdb->last_error ), 500 );
		}

		$m = _n( 'Shortcode has been deleted', 'Shortcodes have been deleted', $count, 'gsbookshowcase' );

		wp_send_json_success( array( 'message' => $m ) );
	}

	public function get_shortcodes() {
		$this->_get_shortcodes( null, wp_doing_ajax() );
	}

	public function get_shortcode_default_settings() {

		return array(
			'theme'                           => 'style-01',
			'view_type'                       => 'grid',
			'gsb_filter_by'                   => 'category',
			'filter_position'                 => 'left',
			'filter_style'                    => 'filter--default',
			'gs_book_title_font'              => 'Roboto, sans-serif',
			'gs_book_fz'                      => '',
			'columns'                         => '3',
			'columns_tablet'                  => '4',
			'columns_mobile_portrait'         => '6',
			'columns_mobile'                  => '12',
			'link_type'                       => 'single_page',
			'show_all'                        => true,
			'gs_book_title'                   => true,
			'search_by_name'                  => true,
			'search_by_isbn'                  => true,
			'search_by_asin'                  => true,
			'search_by_countries'             => true,
			'search_by_publishers'            => true,
			'search_by_languages'             => true,
			'search_by_tags'                  => true,
			'search_by_categories'            => true,
			'search_by_authors'               => true,
			'search_by_series'                => true,
			'search_by_genres'                => true,
			'gs_book_pagination'              => false,
			'posts_per_page'                  => 10,
			'gs_book_details'                 => true,
			'gs_book_store'                   => true,
			'gs_book_enable_multi_select'     => false,
			'gs_book_multi_select_ellipsis'   => false,
			'gs_book_enable_clear_filters'    => true,
			'desc_limit'                      => 100,
			'gs_book_category'                => true,
			'gs_book_author'                  => true,
			'gs_child_tax'                    => false,
			'gs_book_publish'                 => true,
			'gs_book_publisher'               => true,
			'gs_book_translator'              => true,
			'gs_book_isbn'                    => true,
			'gs_book_asin'                    => true,
			'gs_book_pages'                   => true,
			'gs_book_country'                 => true,
			'gs_book_language'                => true,
			'gs_book_dimension'               => true,
			'gs_book_fsize'                   => true,
			'gsb_slider_navs'                 => true,
			'gsb_slider_dots'                 => true,
			'gs_book_authorimg'               => true,
			'gs_book_author_name'               => true,
			'gs_book_authordes'               => true,
			'gs_book_review'                  => true,
			'gs_book_rating'                  => true,
			'gs_book_url'                     => true,
			'gs_store_img'                    => true,
			'gs_book_sin_nxt_prev'            => true,
			'num'                             => -1,
			'order'                           => 'DESC',
			'gs_filter_cat_pos'               => 'left',
			'group'                           => array(),
			'exclude_group'                   => array(),
			'include_tags'                    => array(),
			'exclude_tags'                    => array(),
			'include_authors'                 => array(),
			'exclude_authors'                 => array(),
			'include_genres'                  => array(),
			'exclude_genres'                  => array(),
			'include_series'                  => array(),
			'exclude_series'                  => array(),
			'include_languages'               => array(),
			'exclude_languages'               => array(),
			'include_publishers'              => array(),
			'exclude_publishers'              => array(),
			'include_countries'               => array(),
			'exclude_countries'               => array(),
			'orderby'                         => 'menu_order',
			'group_order_by'                  => 'term_order',
			'group_order'                     => 'ASC',
			'gs_book_fntw'                    => 'normal',
			'gs_book_fnstyl'                  => 'normal',
			'gs_sin_book_txt_align'           => 'left',
			'gs_book_thumbnail_sizes'         => 'large',
			'gs_book_thumbnail_sizes_details' => 'details',
			'popup_style'                     => 'style_one',
			'show_all_text'                   => 'Show All',
			'gs_book_name_color'              => '',
			'gs_book_rating_color'            => '',
			'gs_book_label_fz'                => 17,
			'gs_book_label_color'             => '',
			'gs_books_btn_nav_cls_color'      => '',
			'gs_filter_enabled'               => false,
			'shortcode_settings'              => false,
			'isAutoplay'                      => false,
			'gsb_navs_style'                  => 'nav--default',
			'gsb_navs_pos'                    => 'carousel-navs-pos--bottom',
			'gsb_dots_style'                  => 'dot--default',
			'image_filter'                    => 'none',
			'hover_image_filter'              => 'none',
			'speed'                           => 5000,
			'autoplay_delay'                  => 5000,
			'slides_per_group'                => 1,
			'pause_on_hover'                  => false,
			'isAutoplay'                      => false,
			'infinite_loop'                   => false,
			'reverse_direction'               => false,
		);
	}

	public function temp_save_shortcode_settings() {

		if ( ! check_admin_referer( '_gs_books_admin_nonce_gs_' ) || ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( __( 'Unauthorised Request', 'gsbookshowcase' ), 401 );
		}

		$temp_key           = isset( $_POST['temp_key'] ) ? $_POST['temp_key'] : null;
		$shortcode_settings = isset( $_POST['shortcode_settings'] ) ? $_POST['shortcode_settings'] : null;

		if ( empty( $temp_key ) ) {
			wp_send_json_error( __( 'No temp key provided', 'gsbookshowcase' ), 400 );
		}

		if ( empty( $shortcode_settings ) ) {
			wp_send_json_error( __( 'No temp settings provided', 'gsbookshowcase' ), 400 );
		}

		delete_transient( $temp_key );

		$shortcode_settings = $this->validate_shortcode_settings( $shortcode_settings );
		set_transient( $temp_key, $shortcode_settings, 86400 ); // save the transient for 1 day

		wp_send_json_success(
			array(
				'message' => __( 'Temp data saved', 'gsbookshowcase' ),
			)
		);
	}

	public function get_translation_srtings() {
		return array(
			'single_page'                          => __( 'Single Page', 'gsbookshowcase' ),
			'single_page_info'                     => __( 'Single Page', 'gsbookshowcase' ),
			'popup_style'                          => __( 'PopUp Style', 'gsbookshowcase' ),
			'store_display'                        => __( 'Store', 'gsbookshowcase' ),
			'popup_style__details'                 => __( 'PopUp Style', 'gsbookshowcase' ),
			'gs_book_thumbnail_sizes'              => __( 'Thumbnail', 'gsbookshowcase' ),
			'details-control'                      => __( 'Details Control', 'gsbookshowcase' ),
			'define-maximum-number-of-characters'  => __( 'Define maximum number of characters in Member details. Default 100', 'gsbookshowcase' ),
			'enable-multilingual'                  => __( 'Enable Multilingual', 'gsbookshowcase' ),
			'enable-multilingual--details'         => __( 'Enable Multilingual mode to translate below strings using any Multilingual plugin like wpml or loco translate.', 'gsbookshowcase' ),
			'add_formats'                          => __( 'Add Formats', 'gsbookshowcase' ),
			'add_formats_help'                     => __( 'Add Formats', 'gsbookshowcase' ),
			'allowed_book_format'                  => __( 'Allowed Formats', 'gsbookshowcase' ),
			'allowed_book_format_info'             => __( 'Allowed Formats', 'gsbookshowcase' ),
			'slides_per_group'                     => __( 'Per Group', 'gsbookshowcase' ),
			'carousel_enabled'                     => __( 'Enable Carousel', 'gsbookshowcase' ),
			'carousel_enabled_details'             => __( 'Enable carousel for this theme, it may not available for certain theme', 'gsbookshowcase' ),
			'filter_enabled'                       => __( 'Enable Filter', 'gsbookshowcase' ),
			'filter_enabled_details'               => __( 'Enable filter for this theme, it may not available for certain theme', 'gsbookshowcase' ),
			'filter-position'                      => __( 'Filter Position', 'gsbookshowcase' ),
			'gs_child_tax'                         => __( 'Child Taxonomy', 'gsbookshowcase' ),
			'link_type'                            => __( 'Link Type', 'gsbookshowcase' ),
			'book-single'                          => __( 'Book Single', 'gsbookshowcase' ),
			'book-single-info'                     => __( 'Select Book Single Style', 'gsbookshowcase' ),
			'author-single'                        => __( 'Author Single', 'gsbookshowcase' ),
			'author-single-info'                   => __( 'Select Author Single Style', 'gsbookshowcase' ),
			'gs-book-author'                       => __( 'Author', 'gsbookshowcase' ),
			'gs-book-author-info'                  => __( 'Select Book Author Style', 'gsbookshowcase' ),
			'title-color'                          => __( 'Title Color', 'gsbookshowcase' ),
			'title-color-desc'                     => __( 'Select Title Color for Book Name.', 'gsbookshowcase' ),
			'label-font-size'                      => __( 'Label Font Size', 'gsbookshowcase' ),
			'label-font-size-desc'                 => __( 'Set Font Size for Book Label', 'gsbookshowcase' ),
			'font-style'                           => __( 'Font Style', 'gsbookshowcase' ),
			'font-style-desc'                      => __( 'Select Font Weight for Book Name', 'gsbookshowcase' ),
			'font-weight'                          => __( 'Font Weight', 'gsbookshowcase' ),
			'font-weight-info'                     => __( 'Select Font Weight for Book Name', 'gsbookshowcase' ),
			'font-size'                            => __( 'Font Size', 'gsbookshowcase' ),
			'font-size-desc'                       => __( 'Set Font Size for Book Name', 'gsbookshowcase' ),
			'desc-char-control'                    => __( 'Description Character Control', 'gsbookshowcase' ),
			'desc-char-control-info'               => __( 'Set max no of characters in Book details. Default 100 & Max 300', 'gsbookshowcase' ),
			'book-link-target'                     => __( 'Book Link Target', 'gsbookshowcase' ),
			'gsb_currency'                             => __( 'Currency', 'gsbookshowcase' ),
			'book-link-target-info'                => __( 'Specify target to load the Links, Default New Tab', 'gsbookshowcase' ),
			'book-name'                            => __( 'Book Name', 'gsbookshowcase' ),
			'book-info'                            => __( 'Show or Hide All Books Name', 'gsbookshowcase' ),
			'book-details-info'                    => __( 'Show or Hide All Books Details', 'gsbookshowcase' ),
			'book-author'                          => __( 'Book Author', 'gsbookshowcase' ),
			'book-author-info'                     => __( 'Show or Hide All Books Author', 'gsbookshowcase' ),
			'book-publish-date'                    => __( 'Book Publish Date', 'gsbookshowcase' ),
			'book-publish-date-info'               => __( 'Show or Hide All Books Publish Date', 'gsbookshowcase' ),
			'book-publisher'                       => __( 'Book publisher', 'gsbookshowcase' ),
			'book-publisher-info'                  => __( 'Show or Hide All Books Publisher', 'gsbookshowcase' ),
			'book-url'                             => __( 'Book URL', 'gsbookshowcase' ),
			'book-url-info'                        => __( 'Show or Hide All Books URL', 'gsbookshowcase' ),
			'localization-title'                   => __( 'Localization', 'gsbookshowcase' ),
			'localization-subtitle'                => __( 'Global setting for localization strings', 'gsbookshowcase' ),
			'author'                               => __( 'Author', 'gsbookshowcase' ),
			'publish'                              => __( 'Publish', 'gsbookshowcase' ),
			'publisher'                            => __( 'CO Publisher', 'gsbookshowcase' ),
			'translator'                           => __( 'Translator', 'gsbookshowcase' ),
			'format'                               => __( 'Format', 'gsbookshowcase' ),
			'isbn'                                 => __( 'ISBN', 'gsbookshowcase' ),
			'asin'                                 => __( 'ASIN', 'gsbookshowcase' ),
			'save-settings'						   => __( 'Save Settings', 'gsbookshowcase' ),

			'bulk-import'                 		   => __('Bulk Import', 'gsbookshowcase'),
			'bulk-import-description' 			   => __('Add Book Showcase faster by GS Bulk Import feature', 'gsbookshowcase'),

			'image_filter' 						   => __( 'Image Filter', 'gsbookshowcase' ),
			'hover_image_filter' 				   => __( 'Image Filter Hover', 'gsbookshowcase' ),

			// Group Taxonomy
			'enable_group_tax'					   => __( 'Enable Taxonomy', 'gsbookshowcase' ),
			'group_tax_label'					   => __( 'Taxonomy Label', 'gsbookshowcase' ),
			'group_tax_plural_label'			   => __( 'Taxonomy Plural Label', 'gsbookshowcase' ),
			'enable_group_tax_archive'			   => __( 'Enable Taxonomy Archive', 'gsbookshowcase' ),
			'group_tax_archive_slug'			   => __( 'Taxonomy Archive Slug', 'gsbookshowcase' ),

			// Tag Taxonomy
			'enable_tag_tax'					   => __( 'Enable Taxonomy', 'gsbookshowcase' ),
			'tag_tax_label'					       => __( 'Taxonomy Label', 'gsbookshowcase' ),
			'tag_tax_plural_label'			       => __( 'Taxonomy Plural Label', 'gsbookshowcase' ),
			'enable_tag_tax_archive'			   => __( 'Enable Taxonomy Archive', 'gsbookshowcase' ),
			'tag_tax_archive_slug'			       => __( 'Taxonomy Archive Slug', 'gsbookshowcase' ),

			// Author Taxonomy
			'enable_author_tax'					   => __( 'Enable Taxonomy', 'gsbookshowcase' ),
			'author_tax_label'					       => __( 'Taxonomy Label', 'gsbookshowcase' ),
			'author_tax_plural_label'			       => __( 'Taxonomy Plural Label', 'gsbookshowcase' ),
			'enable_author_tax_archive'			   => __( 'Enable Taxonomy Archive', 'gsbookshowcase' ),
			'author_tax_archive_slug'			       => __( 'Taxonomy Archive Slug', 'gsbookshowcase' ),

			// Genre Taxonomy
			'enable_genre_tax'					   => __( 'Enable Taxonomy', 'gsbookshowcase' ),
			'genre_tax_label'					       => __( 'Taxonomy Label', 'gsbookshowcase' ),
			'genre_tax_plural_label'			       => __( 'Taxonomy Plural Label', 'gsbookshowcase' ),
			'enable_genre_tax_archive'			   => __( 'Enable Taxonomy Archive', 'gsbookshowcase' ),
			'genre_tax_archive_slug'			       => __( 'Taxonomy Archive Slug', 'gsbookshowcase' ),

			// Series Taxonomy
			'enable_series_tax'					   => __( 'Enable Taxonomy', 'gsbookshowcase' ),
			'series_tax_label'					       => __( 'Taxonomy Label', 'gsbookshowcase' ),
			'series_tax_plural_label'			       => __( 'Taxonomy Plural Label', 'gsbookshowcase' ),
			'enable_series_tax_archive'			   => __( 'Enable Taxonomy Archive', 'gsbookshowcase' ),
			'series_tax_archive_slug'			       => __( 'Taxonomy Archive Slug', 'gsbookshowcase' ),

			// Publisher Taxonomy
			'enable_publisher_tax'					   => __( 'Enable Taxonomy', 'gsbookshowcase' ),
			'publisher_tax_label'					       => __( 'Taxonomy Label', 'gsbookshowcase' ),
			'publisher_tax_plural_label'			       => __( 'Taxonomy Plural Label', 'gsbookshowcase' ),
			'enable_publisher_tax_archive'			   => __( 'Enable Taxonomy Archive', 'gsbookshowcase' ),
			'publisher_tax_archive_slug'			       => __( 'Taxonomy Archive Slug', 'gsbookshowcase' ),			// Publisher Taxonomy
			
			// Langugae Taxonomy
			'enable_language_tax'					   => __( 'Enable Taxonomy', 'gsbookshowcase' ),
			'language_tax_label'					   => __( 'Taxonomy Label', 'gsbookshowcase' ),
			'language_tax_plural_label'			       => __( 'Taxonomy Plural Label', 'gsbookshowcase' ),
			'enable_language_tax_archive'			   => __( 'Enable Taxonomy Archive', 'gsbookshowcase' ),
			'language_tax_archive_slug'			       => __( 'Taxonomy Archive Slug', 'gsbookshowcase' ),

			// Country Taxonomy
			'enable_country_tax'					   => __( 'Enable Taxonomy', 'gsbookshowcase' ),
			'country_tax_label'					       => __( 'Taxonomy Label', 'gsbookshowcase' ),
			'country_tax_plural_label'			       => __( 'Taxonomy Plural Label', 'gsbookshowcase' ),
			'enable_country_tax_archive'			   => __( 'Enable Taxonomy Archive', 'gsbookshowcase' ),
			'country_tax_archive_slug'			       => __( 'Taxonomy Archive Slug', 'gsbookshowcase' ),

			'taxonomies-page' 					   => __('Taxonomies', 'gsbookshowcase'),
			'taxonomies-page--des' 				   => __('Global settings for Taxonomies', 'gsbookshowcase'),

			'taxonomy_group' 					   => $this->get_tax_option( 'group_tax_plural_label' ),
			'taxonomy_tag' 						      => $this->get_tax_option( 'tag_tax_plural_label' ),
			'author_tag' 						    => $this->get_tax_option( 'author_tax_plural_label' ),
			'genre_tag' 						       => $this->get_tax_option( 'genre_tax_plural_label' ),
			'series_tag' 						    => $this->get_tax_option( 'series_tax_plural_label' ),
			'languages_tag' 						   => $this->get_tax_option( 'language_tax_plural_label' ),
			'publisher_tag' 						   => $this->get_tax_option( 'publisher_tax_plural_label' ),
			'countries_tag' 						   => $this->get_tax_option( 'country_tax_plural_label' ),

			'pages'                                => __( 'Pages', 'gsbookshowcase' ),
			'show_all'                             => __( 'Show All', 'gsbookshowcase' ),
			'show_all_text'                        => __( 'Show All', 'gsbookshowcase' ),
			'country'                              => __( 'Country', 'gsbookshowcase' ),
			'language'                             => __( 'Language', 'gsbookshowcase' ),
			'dimension'                            => __( 'Dimension', 'gsbookshowcase' ),
			'filter_style'                         => __( 'Filter Styles', 'gsbookshowcase' ),
			'file-size-e-book'                     => __( 'File size(e-book)', 'gsbookshowcase' ),
			'reader-s-review'                      => __( 'Reader\'s Review', 'gsbookshowcase' ),
			'rating'                               => __( 'Rating', 'gsbookshowcase' ),
			'book-url'                             => __( 'Book URL', 'gsbookshowcase' ),
			'store'                                => __( 'Store', 'gsbookshowcase' ),
			'description'                          => __( 'Description', 'gsbookshowcase' ),
			'author-details'                       => __( 'Author Details', 'gsbookshowcase' ),
			'book-details'                         => __( 'Book Details', 'gsbookshowcase' ),
			'download'                             => __( 'Download', 'gsbookshowcase' ),
			'show-all-publisher'                   => __( 'Show All Publisher', 'gsbookshowcase' ),
			'search-by-book-name'                  => __( 'Search By Book Name', 'gsbookshowcase' ),
			'all'                                  => __( 'All', 'gsbookshowcase' ),
			'select-book-name'                     => __( 'Select Book Name', 'gsbookshowcase' ),
			'author--details'                      => __( 'Replace preferred text for Author', 'gsbookshowcase' ),
			'publish--details'                     => __( 'Replace preferred text for Publish', 'gsbookshowcase' ),
			'publisher--details'                   => __( 'Replace preferred text for Publisher', 'gsbookshowcase' ),
			'translator--details'                  => __( 'Replace preferred text for Translator', 'gsbookshowcase' ),
			'format--details'                      => __( 'Replace preferred text for Format', 'gsbookshowcase' ),
			'isbn--details'                        => __( 'Replace preferred text for ISBN', 'gsbookshowcase' ),
			'asin--details'                        => __( 'Replace preferred text for ASIN', 'gsbookshowcase' ),
			'pages--details'                       => __( 'Replace preferred text for Pages', 'gsbookshowcase' ),
			'country--details'                     => __( 'Replace preferred text for Country', 'gsbookshowcase' ),
			'language--details'                    => __( 'Replace preferred text for Language', 'gsbookshowcase' ),
			'dimension--details'                   => __( 'Replace preferred text for Dimension', 'gsbookshowcase' ),
			'file-size-e-book--details'            => __( 'Replace preferred text for File size(e-book)', 'gsbookshowcase' ),
			'reader-s-review--details'             => __( 'Replace preferred text for Reader\'s Review', 'gsbookshowcase' ),
			'rating--details'                      => __( 'Replace preferred text for Rating', 'gsbookshowcase' ),
			'book-url--details'                    => __( 'Replace preferred text for Book URL', 'gsbookshowcase' ),
			'store--details'                       => __( 'Replace preferred text for Store', 'gsbookshowcase' ),
			'description--details'                 => __( 'Replace preferred text for Description', 'gsbookshowcase' ),
			'author-details--details'              => __( 'Replace preferred text for Author Details', 'gsbookshowcase' ),
			'book-details--details'                => __( 'Replace preferred text for Book Details (Theme 15 & 16 : Flip & Flip 3D)', 'gsbookshowcase' ),
			'download--details'                    => __( 'Replace preferred text for Download (Theme 16 : Flip 3D)', 'gsbookshowcase' ),
			'show-all-publisher--details'          => __( 'Replace preferred text (Theme 14 & 18 : Filter & Single, Filter & Search)', 'gsbookshowcase' ),
			'search-by-book-name--details'         => __( 'Replace preferred text (Theme 18 : Filter & Search)', 'gsbookshowcase' ),
			'all--details'                         => __( 'Replace preferred text for All (Filter Theme)', 'gsbookshowcase' ),
			'select-book-name--details'            => __( 'Replace preferred text (Theme 14 : Filter & Single)', 'gsbookshowcase' ),
			'save-localization'                    => __( 'Save Localization', 'gsbookshowcase' ),
			'gs_book_title'                        => __( 'Book Name', 'gsbookshowcase' ),
			'search_by_name'                       => __( 'Filter By Name', 'gsbookshowcase' ),
			'search_by_isbn'                       => __( 'Filter By ISBN', 'gsbookshowcase' ),
			'search_by_asin'                       => __( 'Filter By ASIN', 'gsbookshowcase' ),
			'search_by_countries'                  => __( 'Filter By Countries', 'gsbookshowcase' ),
			'search_by_publishers'                 => __( 'Filter By Publishers', 'gsbookshowcase' ),
			'search_by_languages'                  => __( 'Filter By Languages', 'gsbookshowcase' ),
			'search_by_tags'                       => __( 'Filter By Tags', 'gsbookshowcase' ),
			'search_by_categories'                 => __( 'Filter By Categories', 'gsbookshowcase' ),
			'search_by_genres'                     => __( 'Filter By Genres', 'gsbookshowcase' ),
			'search_by_authors'                    => __( 'Filter By Authors', 'gsbookshowcase' ),
			'search_by_series'                     => __( 'Filter By Series', 'gsbookshowcase' ),
			'gs_book_pagination'                   => __( 'Pagination', 'gsbookshowcase' ),
			'posts_per_page'                       => __( 'Per Page', 'gsbookshowcase' ),
			'gs_book_title__details'               => __( 'Show or Hide All Books Name', 'gsbookshowcase' ),
			'gs_book_details'                      => __( 'Book Details', 'gsbookshowcase' ),
			'gs_book_store'                        => __( 'Book Store', 'gsbookshowcase' ),
			'gs_book_enable_multi_select'          => __( 'Multi Select', 'gsbookshowcase' ),
			'gs_book_multi_select_ellipsis'          => __( 'Multi Select Elipsis', 'gsbookshowcase' ),
			'gs_book_details__details'             => __( 'Show or Hide All Books Details', 'gsbookshowcase' ),
			'gs_book_category'                     => __( 'Book Category', 'gsbookshowcase' ),
			'gs_book_category__details'            => __( 'Show or Hide All Books Category', 'gsbookshowcase' ),
			'gs_book_author'                       => __( 'Book Author', 'gsbookshowcase' ),
			'gs_book_author__details'              => __( 'Show or Hide All Books Author', 'gsbookshowcase' ),
			'gs_book_publish'                      => __( 'Book Publish Date', 'gsbookshowcase' ),
			'gs_book_publish__details'             => __( 'Show or Hide All Books Publish Date', 'gsbookshowcase' ),
			'gs_book_publisher'                    => __( 'Book publisher', 'gsbookshowcase' ),
			'gs_book_publisher__details'           => __( 'Show or Hide All Books Publisher', 'gsbookshowcase' ),
			'gs_book_translator'                   => __( 'Book Translator', 'gsbookshowcase' ),
			'gs_book_translator__details'          => __( 'Show or Hide All Books Translator', 'gsbookshowcase' ),
			'gs_book_isbn'                         => __( 'Book ISBN', 'gsbookshowcase' ),
			'gs_book_isbn__details'                => __( 'Show or Hide All Books ISBN', 'gsbookshowcase' ),
			'gs_book_asin'                         => __( 'Book ASIN', 'gsbookshowcase' ),
			'include_tags'                         => __( 'Tags', 'gsbookshowcase' ),
			'exclude_tags'                         => __( 'Tags', 'gsbookshowcase' ),
			'gs_book_asin__details'                => __( 'Show or Hide All Books ASIN', 'gsbookshowcase' ),
			'gs_book_pages'                        => __( 'Book Pages', 'gsbookshowcase' ),
			'gs_book_pages__details'               => __( 'Show or Hide All Books Pages', 'gsbookshowcase' ),
			'gs_book_country'                      => __( 'Book Country', 'gsbookshowcase' ),
			'gs_book_country__details'             => __( 'Show or Hide All Books Country', 'gsbookshowcase' ),
			'gs_book_language'                     => __( 'Book Language', 'gsbookshowcase' ),
			'gs_book_language__details'            => __( 'Show or Hide All Books Language', 'gsbookshowcase' ),
			'gs_book_dimension'                    => __( 'Book Dimension', 'gsbookshowcase' ),
			'gs_book_dimension__details'           => __( 'Show or Hide All Books dimension', 'gsbookshowcase' ),
			'gs_book_fsize'                        => __( 'Book File Size (e-book)', 'gsbookshowcase' ),
			'gs_book_fsize__details'               => __( 'Show or Hide All Books File Size for e-book', 'gsbookshowcase' ),
			'gs_book_author_name'                    => __( 'Book Author Name', 'gsbookshowcase' ),
			'gs_book_authorimg'                    => __( 'Book Author Image', 'gsbookshowcase' ),
			'gs_book_authorimg__details'           => __( 'Show or Hide All Books Author Image', 'gsbookshowcase' ),
			'gs_book_authordes'                    => __( 'Book Author Details', 'gsbookshowcase' ),
			'gs_book_authordes__details'           => __( 'Show or Hide All Books Author Details', 'gsbookshowcase' ),
			'gs_book_review'                       => __( 'Book Review', 'gsbookshowcase' ),
			'gs_book_review__details'              => __( 'Show or Hide All Books Review', 'gsbookshowcase' ),
			'gs_book_rating'                       => __( 'Book Rating', 'gsbookshowcase' ),
			'gs-filter-by'                         => __( 'Filter By', 'gsbookshowcase' ),
			'gs_book_rating__details'              => __( 'Show or Hide All Books Rating', 'gsbookshowcase' ),
			'gs_book_url'                          => __( 'Book URL', 'gsbookshowcase' ),
			'gs_store_img'                         => __( 'Store Image', 'gsbookshowcase' ),
			'gs_book_url__details'                 => __( 'Show or Hide All Books URL', 'gsbookshowcase' ),
			'gs_book_sin_nxt_prev'                 => __( 'Next / Previous', 'gsbookshowcase' ),
			'gs_book_sin_nxt_prev__details'        => __( 'Show or Hide Next / Previous link at Single Book Template', 'gsbookshowcase' ),
			'enable-clear-filters' 				   => __( 'Reset Filters Button', 'gsbookshowcase' ),
			'enable-clear-filters--help' 		   => __( 'Enable Reset all filters button in filter themes, Default is Off', 'gsbookshowcase' ),

			// STYLE
			'include_authors'                      => __( 'Include Authors', 'gsbookshowcase' ),
			'exclude_authors'                      => __( 'Exclude Authors', 'gsbookshowcase' ),
			'include_genres'                       => __( 'Include Genres', 'gsbookshowcase' ),
			'exclude_genres'                       => __( 'Exclude Genres', 'gsbookshowcase' ),
			'include_series'                       => __( 'Include Series', 'gsbookshowcase' ),
			'exclude_series'                       => __( 'Exclude Series', 'gsbookshowcase' ),
			'include_languages'                    => __( 'Include Languages', 'gsbookshowcase' ),
			'exclude_languages'                    => __( 'Exclude Languages', 'gsbookshowcase' ),
			'include_publishers'                   => __( 'Include Publishers', 'gsbookshowcase' ),
			'exclude_publishers'                   => __( 'Exclude Publishers', 'gsbookshowcase' ),
			'include_countries'                    => __( 'Include Countries', 'gsbookshowcase' ),
			'exclude_countries'                    => __( 'Exclude Countries', 'gsbookshowcase' ),
			'gs_book_title_font'                   => __( 'Font Family', 'gsbookshowcase' ),
			'gs-book-fz'                           => __( 'Font Size', 'gsbookshowcase' ),
			'gs-book-fz--details'                  => __( 'Set Font Size for Book Name', 'gsbookshowcase' ),
			'gs-book-fntw'                         => __( 'Font Weight', 'gsbookshowcase' ),
			'gs-book-fntw--details'                => __( 'Select Font Weight for Book Name', 'gsbookshowcase' ),
			'gs-book-fnstyl'                       => __( 'Font Style', 'gsbookshowcase' ),
			'speed'                                => __( 'Speed', 'gsbookshowcase' ),
			'autoplay'                             => __( 'Autoplay', 'gsbookshowcase' ),
			'autoplay_delay'                       => __( 'Autoplay Delay', 'gsbookshowcase' ),
			'gsb-slider-navs'                      => __( 'Slider Navs', 'gsbookshowcase' ),
			'gsb-slider-navs'                      => __( 'Slider Navs', 'gsbookshowcase' ),
			'gsb-slider-dots'                      => __( 'Slider Dots', 'gsbookshowcase' ),
			'gsb-navs-pos'                         => __( 'Navs Position', 'gsbookshowcase' ),
			'gsb_dots_style'                       => __( 'Dot Style', 'gsbookshowcase' ),
			'gsb_navs_style'                       => __( 'Navs Style', 'gsbookshowcase' ),
			'pause_on_hover'                       => __( 'Pause on Hover', 'gsbookshowcase' ),
			'infinite_loop'                        => __( 'Infinite Loop', 'gsbookshowcase' ),
			'reverse_direction'                    => __( 'Reverse Direction', 'gsbookshowcase' ),
			'gs-book-fnstyl--details'              => __( 'Select Font Weight for Book Name', 'gsbookshowcase' ),
			'gs-book-name-color'                   => __( 'Font Color', 'gsbookshowcase' ),
			'gs_book_rating_color'                 => __( 'Rating Color', 'gsbookshowcase' ),
			'gs-book-rating-color--details'        => __( 'Select Rating Color', 'gsbookshowcase' ),
			'gs-book-name-color--details'          => __( 'Select color for Book Name', 'gsbookshowcase' ),
			'gs-book-label-fz'                     => __( 'Label Font Size', 'gsbookshowcase' ),
			'gs-book-label-fz--details'            => __( 'Set Font Size for Book Label', 'gsbookshowcase' ),
			'gs-book-label-color'                  => __( 'Label Font Color', 'gsbookshowcase' ),
			'gs-book-label-color--details'         => __( 'Select color for Book Label', 'gsbookshowcase' ),
			'gs-books-btn-nav-ctrl-color'          => __( 'Popup Btn, Nav & Close Color', 'gsbookshowcase' ),
			'gs-books-btn-nav-ctrl-color--details' => __( 'Select color for Popup Btn, Nav & Close Button', 'gsbookshowcase' ),
			'gs-filter-cat-pos'                    => __( 'Filter Category Position', 'gsbookshowcase' ),
			'gs-filter-cat-pos--details'           => __( 'Select Filter Category Position', 'gsbookshowcase' ),
			'gs_sin_book_txt_align'                => __( 'Book Details Text Alignment', 'gsbookshowcase' ),
			'gs_sin_book_txt_align--details'       => __( 'Select Book Details Text Alignment at Single Book Template', 'gsbookshowcase' ),

			// OLD
			'theme'                                => __( 'Style & Theming', 'gsbookshowcase' ),
			'theme--placeholder'                   => __( 'Select Theme', 'gsbookshowcase' ),
			'theme--help'                          => __( 'Select preferred Style & Theme', 'gsbookshowcase' ),
			'view_type'                            => __( 'View Type', 'gsbookshowcase' ),
			'view-type--help'                      => __( 'Select preferred View Type', 'gsbookshowcase' ),
			'posts'                                => __( 'Books/ Authors', 'gsbookshowcase' ),
			'posts--placeholder'                   => __( 'Books', 'gsbookshowcase' ),
			'posts--help'                          => __( 'Set max book numbers you want to show, set -1 for all books', 'gsbookshowcase' ),
			'order'                                => __( 'Order', 'gsbookshowcase' ),
			'order--placeholder'                   => __( 'Order', 'gsbookshowcase' ),
			'order-by'                             => __( 'Order By', 'gsbookshowcase' ),
			'group_order'                          => __( 'Group Order', 'gsbookshowcase' ),
			'group_order_by'                       => __( 'Group Order By', 'gsbookshowcase' ),
			'group_order'                          => __( 'Group Order', 'gsbookshowcase' ),
			'order-by--placeholder'                => __( 'Order By', 'gsbookshowcase' ),
			'group'                                => __( 'Categories', 'gsbookshowcase' ),
			'group__help'                          => __( 'Select specific book group to show that specific group books', 'gsbookshowcase' ),
			'exclude_group'                        => __( 'Categories', 'gsbookshowcase' ),
			'exclude_group__help'                  => __( 'Select specific book group to hide that specific group books', 'gsbookshowcase' ),
			'install-demo-data'                    => __( 'Install Demo Data', 'gsbookshowcase' ),
			'install-demo-data-description'        => __( 'Quick start with GS Book Showcase by installing the demo data', 'gsbookshowcase' ),
			'preference'                           => __( 'Preference', 'gsbookshowcase' ),
			'save-preference'                      => __( 'Save Preference', 'gsbookshowcase' ),
			'custom-css'                           => __( 'Custom CSS', 'gsbookshowcase' ),
			'shortcodes'                           => __( 'Shortcodes', 'gsbookshowcase' ),
			'create-shortcode'                     => __( 'Create Shortcode', 'gsbookshowcase' ),
			'create-new-shortcode'                 => __( 'Create New Shortcode', 'gsbookshowcase' ),
			'shortcode'                            => __( 'Shortcode', 'gsbookshowcase' ),
			'name'                                 => __( 'Name', 'gsbookshowcase' ),
			'action'                               => __( 'Action', 'gsbookshowcase' ),
			'actions'                              => __( 'Actions', 'gsbookshowcase' ),
			'edit'                                 => __( 'Edit', 'gsbookshowcase' ),
			'clone'                                => __( 'Clone', 'gsbookshowcase' ),
			'delete'                               => __( 'Delete', 'gsbookshowcase' ),
			'delete-all'                           => __( 'Delete All', 'gsbookshowcase' ),
			'pref-search-all-fields' 				=> __('Include fields when search', 'gsbookshowcase'),
			'pref-search-all-fields-details' 		=> __('Enable searching through all fields', 'gsbookshowcase'),
			'create-a-new-shortcode-and'           => __( 'Create a new shortcode & save it to use globally in anywhere', 'gsbookshowcase' ),
			'edit-shortcode'                       => __( 'Edit Shortcode', 'gsbookshowcase' ),
			'general-settings'                     => __( 'General Settings', 'gsbookshowcase' ),
			'style-settings'                       => __( 'Style Settings', 'gsbookshowcase' ),
			'query-settings'                       => __( 'Query Settings', 'gsbookshowcase' ),
			'shortcode-name'                       => __( 'Shortcode Name', 'gsbookshowcase' ),
			'name-of-the-shortcode'                => __( 'Name of the Shortcode', 'gsbookshowcase' ),
			'save-shortcode'                       => __( 'Save Shortcode', 'gsbookshowcase' ),
			'preview-shortcode'                    => __( 'Preview Shortcode', 'gsbookshowcase ' ),

			'desktop'                              => __( 'Desktop', 'gsbookshowcase' ),
			'tablet'                               => __( 'Tablet', 'gsbookshowcase' ),
			'mobile_landscape'                     => __( 'Large Mobile', 'gsbookshowcase' ),
			'mobile'                               => __( 'Mobile', 'gsbookshowcase' ),

			'columns'                              => __( 'Columns', 'gsbookshowcase' ),

			'columns__details'                     => __( 'Select column for desktop', 'gsbookshowcase' ),
			'columns_tablet__details'              => __( 'Select column for tablet', 'gsbookshowcase' ),
			'columns_mobile_portrait__details'     => __( 'Select column for large display mobile', 'gsbookshowcase' ),
			'columns_mobile__details'              => __( 'Select column for mobile', 'gsbookshowcase' ),

		);
	}

	public function get_shortcode_default_localization() {
		return array(
			'gsb_more_text_modify'             => Helpers::get_translation( 'gsb_more_text_modify' ),
			'gsb_author_text_modify'           => Helpers::get_translation( 'gsb_author_text_modify' ),
			'gsb_publish_text_modify'          => Helpers::get_translation( 'gsb_publish_text_modify' ),
			'gsb_publisher_text_modify'        => Helpers::get_translation( 'gsb_publisher_text_modify' ),
			'gsb_translator_text_modify'       => Helpers::get_translation( 'gsb_translator_text_modify' ),
			'gsb_format_text_modify'           => Helpers::get_translation( 'gsb_format_text_modify' ),
			'gsb_isbn_text_modify'             => Helpers::get_translation( 'gsb_isbn_text_modify' ),
			'gsb_asin_text_modify'             => Helpers::get_translation( 'gsb_asin_text_modify' ),
			'gsb_pages_text_modify'            => Helpers::get_translation( 'gsb_pages_text_modify' ),
			'gsb_country_text_modify'          => Helpers::get_translation( 'gsb_country_text_modify' ),
			'gsb_language_text_modify'         => Helpers::get_translation( 'gsb_language_text_modify' ),
			'gsb_dimension_text_modify'        => Helpers::get_translation( 'gsb_dimension_text_modify' ),
			'gsb_filesize_text_modify'         => Helpers::get_translation( 'gsb_filesize_text_modify' ),
			'gsb_readers_text_modify'          => Helpers::get_translation( 'gsb_readers_text_modify' ),
			'gsb_rating_text_modify'           => Helpers::get_translation( 'gsb_rating_text_modify' ),
			'gsb_bookURL_text_modify'          => Helpers::get_translation( 'gsb_bookURL_text_modify' ),
			'gsb_store_text_modify'            => Helpers::get_translation( 'gsb_store_text_modify' ),
			'gsb_description_text_modify'      => Helpers::get_translation( 'gsb_description_text_modify' ),
			'gsb_authordetails_text_modify'    => Helpers::get_translation( 'gsb_authordetails_text_modify' ),
			'gsb_bookdetailsflip_text_modify'  => Helpers::get_translation( 'gsb_bookdetailsflip_text_modify' ),
			'gsb_download_text_modify'         => Helpers::get_translation( 'gsb_download_text_modify' ),
			'gsb_showallpublisher_text_modify' => Helpers::get_translation( 'gsb_showallpublisher_text_modify' ),
			'gsb_searchby_text_modify'         => Helpers::get_translation( 'gsb_searchby_text_modify' ),
			'gsb_bookname_text_modify'         => Helpers::get_translation( 'gsb_bookname_text_modify' ),
		);
	}

	public function get_shortcode_options_themes() {

		$free_themes = array(
			array(
				'label' => __( 'Style 01 (New)', 'gsbookshowcase' ),
				'value' => 'style-01',
			),
			array(
				'label' => __( 'Horizontal 03 (New)', 'gsbookshowcase' ),
				'value' => 'horizontal-03',
			),
			array(
				'label' => __( 'Theme 01 (Square)', 'gsbookshowcase' ),
				'value' => 'gs_book_theme1',
			)
		);

		$pro_themes = array(			

			array(
				'label' => __( 'Style 02 (New)', 'gsbookshowcase' ),
				'value' => 'style-02',
			),
			array(
				'label' => __( 'Style 03 (New)', 'gsbookshowcase' ),
				'value' => 'style-03',
			),
			array(
				'label' => __( 'Style 04 (New)', 'gsbookshowcase' ),
				'value' => 'style-04',
			),
			array(
				'label' => __( 'Style 05 (New)', 'gsbookshowcase' ),
				'value' => 'style-05',
			),
			array(
				'label' => __( 'Style 06 (New)', 'gsbookshowcase' ),
				'value' => 'style-06',
			),
			array(
				'label' => __( 'Style 07 (New)', 'gsbookshowcase' ),
				'value' => 'style-07',
			),
			array(
				'label' => __( 'Style 08 (New)', 'gsbookshowcase' ),
				'value' => 'style-08',
			),
			array(
				'label' => __( 'Style 09 (New)', 'gsbookshowcase' ),
				'value' => 'style-09',
			),
			array(
				'label' => __( 'Horizontal 01 (New)', 'gsbookshowcase' ),
				'value' => 'horizontal-01',
			),
			array(
				'label' => __( 'Horizontal 02 (New)', 'gsbookshowcase' ),
				'value' => 'horizontal-02',
			),
			array(
				'label' => __( 'Horizontal 04 (New)', 'gsbookshowcase' ),
				'value' => 'horizontal-04',
			),
			array(
				'label' => __( 'Flip 01 (New)', 'gsbookshowcase' ),
				'value' => 'flip-01',
			),
			array(
				'label' => __( 'Flip 02 (New)', 'gsbookshowcase' ),
				'value' => 'flip-02',
			),
			array(
				'label' => __( 'Flip 03 (New)', 'gsbookshowcase' ),
				'value' => 'flip-03',
			),
			array(
				'label' => __( 'Flip 04 (New)', 'gsbookshowcase' ),
				'value' => 'flip-04',
			),
			array(
				'label' => __( 'Flip 05 (New)', 'gsbookshowcase' ),
				'value' => 'flip-05',
			),
			array(
				'label' => __( '3D Style 01 (New)', 'gsbookshowcase' ),
				'value' => 'three-d-style-01',
			),
			array(
				'label' => __( '3D Style 02 (New)', 'gsbookshowcase' ),
				'value' => 'three-d-style-02',
			),
			array(
				'label' => __( '3D Style 03 (New)', 'gsbookshowcase' ),
				'value' => 'three-d-style-03',
			),
			array(
				'label' => __( '3D Style 04 (New)', 'gsbookshowcase' ),
				'value' => 'three-d-style-04',
			),
			array(
				'label' => __( 'Author Style 01', 'gsbookshowcase' ),
				'value' => 'author-style-01',
			),
			array(
				'label' => __( 'Author Style 02', 'gsbookshowcase' ),
				'value' => 'author-style-02',
			),
			array(
				'label' => __( 'Author Style 03', 'gsbookshowcase' ),
				'value' => 'author-style-03',
			),
			array(
				'label' => __( 'Widget 01', 'gsbookshowcase' ),
				'value' => 'widget-01',
			),
			array(
				'label' => __( 'Widget 02', 'gsbookshowcase' ),
				'value' => 'widget-02',
			),
			array(
				'label' => __( 'Widget 03', 'gsbookshowcase' ),
				'value' => 'widget-03',
			)

		);

		if ( ! is_pro_active() ) {
			$pro_themes = array_map( function( $item ) {
				$item['pro'] = true;
				return $item;
			}, $pro_themes );
		}

		return array_merge( $free_themes, $pro_themes );
	}

	public function get_view_types() {

		$free_types = [
			array(
				'label' => __( 'Grid', 'gsbookshowcase' ),
				'value' => 'grid',
			),
			array(
				'label' => __( 'Slider', 'gsbookshowcase' ),
				'value' => 'slider',
			)
		];

		$pro_types = [
			array(
				'label' => __( 'Filter', 'gsbookshowcase' ),
				'value' => 'filter',
			)
		];

		if ( ! is_pro_active() ) {
			$pro_types = array_map( function( $item ) {
				$item['pro'] = true;
				return $item;
			}, $pro_types );
		}

		return array_merge( $free_types, $pro_types );
		
	}

	public function get_google_fonts() {

		$google_fonts = array(
			array(
				'label' => __( 'Roboto', 'gsbookshowcase' ),
				'value' => 'Roboto, sans-serif',
			),
			array(
				'label' => __( 'Open Sans', 'gsbookshowcase' ),
				'value' => 'Open Sans, sans-serif',
			),
			array(
				'label' => __( 'Poppins', 'gsbookshowcase' ),
				'value' => 'Poppins, sans-serif',
			),
		);

		return $google_fonts;
	}

	public function get_shortcode_options_image_sizes() {

		$sizes = get_intermediate_image_sizes();

		$result = array();

		foreach ( $sizes as $size ) {
			$result[] = array(
				'label' => ucwords( preg_replace( '/_|-/', ' ', $size ) ),
				'value' => $size,
			);
		}

		return $result;
	}

	public function get_link_types() {
		return array(
			array(
				'label' => __( 'Single Page', 'gsbookshowcase' ),
				'value' => 'single_page',
			),
			array(
				'label' => __( 'Popup', 'gsbookshowcase' ),
				'value' => 'popup',
			),
		);
	}

	public function get_columns() {

		return array(
			array(
				'label' => __( '1 Column', 'gsbookshowcase' ),
				'value' => '12',
			),
			array(
				'label' => __( '2 Columns', 'gsbookshowcase' ),
				'value' => '6',
			),
			array(
				'label' => __( '3 Columns', 'gsbookshowcase' ),
				'value' => '4',
			),
			array(
				'label' => __( '4 Columns', 'gsbookshowcase' ),
				'value' => '3',
			),
			array(
				'label' => __( '5 Columns', 'gsbookshowcase' ),
				'value' => '2_4',
			),
			array(
				'label' => __( '6 Columns', 'gsbookshowcase' ),
				'value' => '2',
			),
		);
	}

	public function get_shortcode_default_options() {
		return array(
			'gs_book_title_font'      => $this->get_google_fonts(),
			'theme'                   => $this->get_shortcode_options_themes(),
			'view_type'               => $this->get_view_types(),
			'columns'                 => $this->get_columns(),
			'columns_tablet'          => $this->get_columns(),
			'gsb_navs_style'          => $this->get_navs_styles(),
			'filter_style'            => $this->get_filter_styles(),
			'gsb_filter_by'           => array(
				array(
					'label' => __( 'Categories', 'gsbookshowcase' ),
					'value' => 'category',
				),
				array(
					'label' => __( 'Tags', 'gsbookshowcase' ),
					'value' => 'tag',
				),
			),
			'filter_position'         => array(
				array(
					'label' => __( 'Left', 'gsbookshowcase' ),
					'value' => 'left',
				),
				array(
					'label' => __( 'Center', 'gsbookshowcase' ),
					'value' => 'center',
				),
				array(
					'label' => __( 'Right', 'gsbookshowcase' ),
					'value' => 'right',
				),
			),
			'gsb_navs_pos'            => $this->get_navs_pos(),
			'gsb_dots_style'          => $this->get_dot_style(),
			'columns_mobile_portrait' => $this->get_columns(),
			'columns_mobile'          => $this->get_columns(),
			'link_type'               => $this->get_link_types(),
			'gs_book_thumbnail_sizes' => $this->get_shortcode_options_image_sizes(),
			'popup_style'             => $this->get_popup_styles(),
			'gs_filter_cat_pos'       => array(
				array(
					'label' => __( 'Center', 'gsbookshowcase' ),
					'value' => 'center',
				),
				array(
					'label' => __( 'Left', 'gsbookshowcase' ),
					'value' => 'left',
				),
				array(
					'label' => __( 'Right', 'gsbookshowcase' ),
					'value' => 'right',
				),
			),
			'group'                   => $this->get_book_categories(),
			'exclude_group'           => $this->get_book_categories(),
			'include_tags'            => $this->get_book_tags(),
			'exclude_tags'            => $this->get_book_tags(),
			'include_authors'         => $this->get_book_authors(),
			'exclude_authors'         => $this->get_book_authors(),
			'include_genres'          => $this->get_book_genres(),
			'exclude_genres'          => $this->get_book_genres(),
			'include_series'          => $this->get_book_series(),
			'exclude_series'          => $this->get_book_series(),
			'include_languages'       => $this->get_book_languages(),
			'exclude_languages'       => $this->get_book_languages(),
			'include_publishers'      => $this->get_book_publishers(),
			'exclude_publishers'      => $this->get_book_publishers(),
			'include_countries'       => $this->get_book_countries(),
			'exclude_countries'       => $this->get_book_countries(),
			'orderby'                 => array(
				array(
					'label' => __( 'Custom Order', 'gsbookshowcase' ),
					'value' => 'menu_order',
				),
				array(
					'label' => __( 'Book ID', 'gsbookshowcase' ),
					'value' => 'ID',
				),
				array(
					'label' => __( 'Book Name', 'gsbookshowcase' ),
					'value' => 'title',
				),
				array(
					'label' => __( 'Date', 'gsbookshowcase' ),
					'value' => 'date',
				),
				array(
					'label' => __( 'Random', 'gsbookshowcase' ),
					'value' => 'rand',
				),
			),
			'group_order_by'          => array(
				array(
					'label' => __( 'Custom Order', 'gsbookshowcase' ),
					'value' => 'term_order',
				),
				array(
					'label' => __( 'Group ID', 'gsbookshowcase' ),
					'value' => 'term_id',
				),
				array(
					'label' => __( 'Group Name', 'gsbookshowcase' ),
					'value' => 'name',
				),
			),
			'group_order'             => array(
				array(
					'label' => __( 'DESC', 'gsbookshowcase' ),
					'value' => 'DESC',
				),
				array(
					'label' => __( 'ASC', 'gsbookshowcase' ),
					'value' => 'ASC',
				),
			),
			'order'                   => array(
				array(
					'label' => __( 'DESC', 'gsbookshowcase' ),
					'value' => 'DESC',
				),
				array(
					'label' => __( 'ASC', 'gsbookshowcase' ),
					'value' => 'ASC',
				),
			),
			'gs_book_fntw'            => array(
				array(
					'label' => __( 'Normal', 'gsbookshowcase' ),
					'value' => 'normal',
				),
				array(
					'label' => __( 'Bold', 'gsbookshowcase' ),
					'value' => 'bold',
				),
				array(
					'label' => __( 'Light', 'gsbookshowcase' ),
					'value' => 'light',
				),
			),
			'gs_book_fnstyl'          => array(
				array(
					'label' => __( 'Normal', 'gsbookshowcase' ),
					'value' => 'normal',
				),
				array(
					'label' => __( 'Italic', 'gsbookshowcase' ),
					'value' => 'italic',
				),
			),
			'gs_sin_book_txt_align'   => array(
				array(
					'label' => __( 'Left', 'gsbookshowcase' ),
					'value' => 'left',
				),
				array(
					'label' => __( 'Center', 'gsbookshowcase' ),
					'value' => 'center',
				),
				array(
					'label' => __( 'Right', 'gsbookshowcase' ),
					'value' => 'right',
				),
			),
			'image_filter' 			  => $this->get_image_filter_effects(),
			'hover_image_filter' 	  => $this->get_image_filter_effects(),
			'gs_member_enable_clear_filters'  => false,
		);
	}

	public function get_popup_styles() {

		$free_popups = array(				
			array(
				'label' => __( 'Style One', 'gsbookshowcase' ),
				'value' => 'style_one',
			),
		);

		$pro_popups = array(
			array(
				'label' => __( 'Style Two', 'gsbookshowcase' ),
				'value' => 'style_two',
			),
			array(
				'label' => __( 'Style Three', 'gsbookshowcase' ),
				'value' => 'style_three',
			),
			array(
				'label' => __( 'Style Four', 'gsbookshowcase' ),
				'value' => 'style_four',
			),
			array(
				'label' => __( 'Style Five', 'gsbookshowcase' ),
				'value' => 'style_five',
			),
		);

		if ( ! is_pro_active() ) {
			$pro_popups = array_map( function( $item ) {
				$item['pro'] = true;
				return $item;
			}, $pro_popups );
		}

		return array_merge( $free_popups, $pro_popups );
	} 

	public function get_image_filter_effects() {

		$effects = [
			[
				'label' => __( 'None', 'gsbookshowcase' ),
				'value' => 'none'
			],
			[
				'label' => __( 'Blur', 'gsbookshowcase' ),
				'value' => 'blur'
			],
			[
				'label' => __( 'Brightness', 'gsbookshowcase' ),
				'value' => 'brightness'
			],
			[
				'label' => __( 'Contrast', 'gsbookshowcase' ),
				'value' => 'contrast'
			],
			[
				'label' => __( 'Grayscale', 'gsbookshowcase' ),
				'value' => 'grayscale'
			],
			[
				'label' => __( 'Hue Rotate', 'gsbookshowcase' ),
				'value' => 'hue_rotate'
			],
			[
				'label' => __( 'Invert', 'gsbookshowcase' ),
				'value' => 'invert'
			],
			[
				'label' => __( 'Opacity', 'gsbookshowcase' ),
				'value' => 'opacity'
			],
			[
				'label' => __( 'Saturate', 'gsbookshowcase' ),
				'value' => 'saturate'
			],
			[
				'label' => __( 'Sepia', 'gsbookshowcase' ),
				'value' => 'sepia'
			]
		];

		return $effects;
	}

	public function get_navs_styles() {

		return array(

			array(
				'label' => __( 'Default', 'gsbookshowcase' ),
				'value' => 'nav--default',
			),
			array(
				'label' => __( 'Style 01', 'gsbookshowcase' ),
				'value' => 'nav--style-01',
			),
			array(
				'label' => __( 'Style 02', 'gsbookshowcase' ),
				'value' => 'nav--style-02',
			),
			array(
				'label' => __( 'Style 03', 'gsbookshowcase' ),
				'value' => 'nav--style-03',
			),
			array(
				'label' => __( 'Style 04', 'gsbookshowcase' ),
				'value' => 'nav--style-04',
			),
			array(
				'label' => __( 'Style 05', 'gsbookshowcase' ),
				'value' => 'nav--style-05',
			),
			array(
				'label' => __( 'Style 06', 'gsbookshowcase' ),
				'value' => 'nav--style-06',
			),
			array(
				'label' => __( 'Style 07', 'gsbookshowcase' ),
				'value' => 'nav--style-07',
			),
			array(
				'label' => __( 'Style 08', 'gsbookshowcase' ),
				'value' => 'nav--style-08',
			),
			array(
				'label' => __( 'Style 09', 'gsbookshowcase' ),
				'value' => 'nav--style-09',
			),
			array(
				'label' => __( 'Style 10', 'gsbookshowcase' ),
				'value' => 'nav--style-10',
			),
			array(
				'label' => __( 'Style 11', 'gsbookshowcase' ),
				'value' => 'nav--style-11',
			),
		);
	}

	public function get_filter_styles() {
		return array(
			array(
				'label' => __( 'Default', 'gsbookshowcase' ),
				'value' => 'filter--default',
			),
			array(
				'label' => __( 'Style 01', 'gsbookshowcase' ),
				'value' => 'filter--style-01',
			),
			array(
				'label' => __( 'Style 02', 'gsbookshowcase' ),
				'value' => 'filter--style-02',
			),
			array(
				'label' => __( 'Style 03', 'gsbookshowcase' ),
				'value' => 'filter--style-03',
			),
			array(
				'label' => __( 'Style 04', 'gsbookshowcase' ),
				'value' => 'filter--style-04',
			),
			array(
				'label' => __( 'Style 05', 'gsbookshowcase' ),
				'value' => 'filter--style-05',
			),
			array(
				'label' => __( 'Style 06', 'gsbookshowcase' ),
				'value' => 'filter--style-06',
			),
			array(
				'label' => __( 'Style 07', 'gsbookshowcase' ),
				'value' => 'filter--style-07',
			),
			array(
				'label' => __( 'Style 08', 'gsbookshowcase' ),
				'value' => 'filter--style-08',
			),
			array(
				'label' => __( 'Style 09', 'gsbookshowcase' ),
				'value' => 'filter--style-09',
			),
			array(
				'label' => __( 'Style 10', 'gsbookshowcase' ),
				'value' => 'filter--style-10',
			),
		);
	}

	public function get_dot_style() {

		return array(
			array(
				'label' => __( 'Default', 'gsbookshowcase' ),
				'value' => 'dot--default',
			),
			array(
				'label' => __( 'Style 01', 'gsbookshowcase' ),
				'value' => 'dot--style-01',
			),
			array(
				'label' => __( 'Style 02', 'gsbookshowcase' ),
				'value' => 'dot--style-02',
			),
			array(
				'label' => __( 'Style 03', 'gsbookshowcase' ),
				'value' => 'dot--style-03',
			),
			array(
				'label' => __( 'Style 04', 'gsbookshowcase' ),
				'value' => 'dot--style-04',
			),
			array(
				'label' => __( 'Style 05', 'gsbookshowcase' ),
				'value' => 'dot--style-05',
			),
			array(
				'label' => __( 'Style 06', 'gsbookshowcase' ),
				'value' => 'dot--style-06',
			),
			array(
				'label' => __( 'Style 07', 'gsbookshowcase' ),
				'value' => 'dot--style-07',
			),
			array(
				'label' => __( 'Style 08', 'gsbookshowcase' ),
				'value' => 'dot--style-08',
			),
			array(
				'label' => __( 'Style 09', 'gsbookshowcase' ),
				'value' => 'dot--style-09',
			),
			array(
				'label' => __( 'Style 10', 'gsbookshowcase' ),
				'value' => 'dot--style-10',
			),
		);
	}

	public function get_navs_pos() {

		return array(
			array(
				'label' => __( 'Bottom', 'gsbookshowcase' ),
				'value' => 'carousel-navs-pos--bottom',
			),
			array(
				'label' => __( 'Center', 'gsbookshowcase' ),
				'value' => 'carousel-navs-pos--center',
			),
			array(
				'label' => __( 'Center Outside', 'gsbookshowcase' ),
				'value' => 'carousel-navs-pos--center-outside',
			),
			array(
				'label' => __( 'Center Inside', 'gsbookshowcase' ),
				'value' => 'carousel-navs-pos--center-inside',
			),
			array(
				'label' => __( 'Top Right', 'gsbookshowcase' ),
				'value' => 'carousel-navs-pos--top-right',
			),
			array(
				'label' => __( 'Top Center', 'gsbookshowcase' ),
				'value' => 'carousel-navs-pos--top-center',
			),
			array(
				'label' => __( 'Top Left', 'gsbookshowcase' ),
				'value' => 'carousel-navs-pos--top-left',
			),
			array(
				'label' => __( 'Verticle Right', 'gsbookshowcase' ),
				'value' => 'carousel-navs-pos--verticle-right',
			),
			array(
				'label' => __( 'Verticle Left', 'gsbookshowcase' ),
				'value' => 'carousel-navs-pos--verticle-left',
			),
		);
	}

	public function get_shortcode_default_prefs() {
		return array(
			'gs_book_nxt_prev'              => false,
			'gs_member_enable_multilingual' => false,
			'gs_member_search_all_fields'   => false,
			'gs_book_details'               => false,
			'gs_book_enable_multi_select'   => false,
			'gs_book_author'                => false,
			'gs_child_tax'                  => false,
			'gs_book_publish_date'          => false,
			'gs_book_publisher'             => false,
			'gs_book_url'                   => false,
			'gs_store_img'                  => true,
			'gs_books_custom_css'           => '',
			'gs_book_font_size'             => '',
			'gs_book_char_control'          => 40,
			'gs_book_label_font_size'       => 20,
			'bs_style'                      => 'bs_style_two',
			'single_page'                   => 'default',
			'style_themeing'                => 'grid',
			'at_style'                      => 'at_style_one',
			'gs_author'                     => 'gs_author_one',
			'link_target'                   => 'new_tab',
			'gsb_currency'                      => '&#36;_usd',
			'store_display'                 => 'image',
			'font_weight'                   => 'normal',
			'font_style'                    => 'normal_font',
		);
	}

	public function get_shortcode_prefs_options() {

		return array(

			'single_page'     => $this->get_single_pages(),

			'theme_and_style' => array(
				array(
					'label' => __( 'Hover(LITE)', 'gsbookshowcase' ),
					'value' => 'hover',
				),
				array(
					'label' => __( 'Grid(Pro)', 'gsbookshowcase' ),
					'value' => 'grid',
				),
				array(
					'label' => __( 'Left Sqr(Pro)', 'gsbookshowcase' ),
					'value' => 'left_sqr',
				),
				array(
					'label' => __( 'Right Sqr(Pro)', 'gsbookshowcase' ),
					'value' => 'right_sqr',
				),
				array(
					'label' => __( 'Slider(Pro)', 'gsbookshowcase' ),
					'value' => 'slider',
				),
				array(
					'label' => __( 'Slider and Hover(Pro)', 'gsbookshowcase' ),
					'value' => 'slider_hover',
				),
				array(
					'label' => __( 'Popup(Pro)', 'gsbookshowcase' ),
					'value' => 'popup',
				),
				array(
					'label' => __( 'Filter(Pro)', 'gsbookshowcase' ),
					'value' => 'filter',
				),
				array(
					'label' => __( 'Grey(Pro)', 'gsbookshowcase' ),
					'value' => 'grey',
				),
				array(
					'label' => __( 'To Single(Pro)', 'gsbookshowcase' ),
					'value' => 'to_single',
				),
			),
			'book_single'     => array(
				array(
					'label' => __( 'Style 01', 'gsbookshowcase' ),
					'value' => 'bs_style_one',
				),
				array(
					'label' => __( 'Style 02', 'gsbookshowcase' ),
					'value' => 'bs_style_two',
				),
				array(
					'label' => __( 'Style 03', 'gsbookshowcase' ),
					'value' => 'bs_style_three',
				),
			),
			'at_single'       => $this->get_author_singles(),
			'gsb_author'      => array(
				array(
					'label' => __( 'Style 01', 'gsbookshowcase' ),
					'value' => 'gs_author_one',
				),
				array(
					'label' => __( 'Style 02', 'gsbookshowcase' ),
					'value' => 'gs_author_two',
				),
				array(
					'label' => __( 'Style 03', 'gsbookshowcase' ),
					'value' => 'gs_author_three',
				),
			),
			'gsb_currency'        => array(
				array(
					'label' => __( '🇺🇸 United States - USD', 'gsbookshowcase' ),
					'value' => '&#36;_usd',
				),
				array(
					'label' => __( '🇨🇦 Canada - CAD', 'gsbookshowcase' ),
					'value' => '&#36;_canada',
				),
				array(
					'label' => __( '🇬🇧 United Kingdom - GBP', 'gsbookshowcase' ),
					'value' => '&#163;',
				),
				array(
					'label' => __( '🇪🇺 Eurozone - EUR', 'gsbookshowcase' ),
					'value' => '&#8364;',
				),
				array(
					'label' => __( '🇦🇺 Australia - AUD', 'gsbookshowcase' ),
					'value' => '&#36;_aus',
				),
				array(
					'label' => __( '🇮🇳 India - INR', 'gsbookshowcase' ),
					'value' => '&#8377;',
				),
				array(
					'label' => __( '🇧🇩 Bangladesh - BDT', 'gsbookshowcase' ),
					'value' => '&#2547;',
				),
				array(
					'label' => __( '🇯🇵 Japan - JPY', 'gsbookshowcase' ),
					'value' => '&#165;_japan',
				),
				array(
					'label' => __( '🇨🇳 China - CNY', 'gsbookshowcase' ),
					'value' => '&#165;_china',
				),
				array(
					'label' => __( '🇧🇷 Brazil - BRL', 'gsbookshowcase' ),
					'value' => '&#82;&#36;',
				),
				array(
					'label' => __( '🇿🇦 South Africa - ZAR', 'gsbookshowcase' ),
					'value' => '&#82;',
				),
				array(
					'label' => __( '🇸🇬 Singapore - SGD', 'gsbookshowcase' ),
					'value' => '&#36;_sin', // Dollar
				),
				array(
					'label' => __( '🇳🇿 New Zealand - NZD', 'gsbookshowcase' ),
					'value' => '&#36;_new', // Dollar
				),
				array(
					'label' => __( '🇷🇺 Russia - RUB', 'gsbookshowcase' ),
					'value' => '&#8381;', // Russian Ruble
				),
				array(
					'label' => __( '🇰🇷 South Korea - KRW', 'gsbookshowcase' ),
					'value' => '&#8361;', // South Korean Won
				),
				array(
					'label' => __( '🇲🇽 Mexico - MXN', 'gsbookshowcase' ),
					'value' => '&#36;_mex', // Peso
				),
				array(
					'label' => __( '🇵🇰 Pakistan - PKR', 'gsbookshowcase' ),
					'value' => '&#8360;', // Pakistani Rupee
				),
				array(
					'label' => __( '🇹🇭 Thailand - THB', 'gsbookshowcase' ),
					'value' => '&#3647;', // Thai Baht
				),
				array(
					'label' => __( '🇲🇾 Malaysia - MYR', 'gsbookshowcase' ),
					'value' => '&#82;&#77;', // Malaysian Ringgit
				),
				array(
					'label' => __( '🇵🇭 Philippines - PHP', 'gsbookshowcase' ),
					'value' => '&#8369;', // Philippine Peso
				),
				array(
					'label' => __( '🇻🇳 Vietnam - VND', 'gsbookshowcase' ),
					'value' => '&#8363;', // Vietnamese Dong
				),
				array(
					'label' => __( '🇸🇦 Saudi Arabia - SAR', 'gsbookshowcase' ),
					'value' => '&#65020;', // Saudi Riyal
				),
				array(
					'label' => __( '🇦🇪 United Arab Emirates - AED', 'gsbookshowcase' ),
					'value' => '&#1583;&#46;&#1573;', // UAE Dirham
				),
				array(
					'label' => __( '🇹🇷 Turkey - TRY', 'gsbookshowcase' ),
					'value' => '&#8378;', // Turkish Lira
				),
				array(
					'label' => __( '🇮🇩 Indonesia - IDR', 'gsbookshowcase' ),
					'value' => '&#82;&#112;', // Indonesian Rupiah
				),
				array(
					'label' => __( '🇳🇬 Nigeria - NGN', 'gsbookshowcase' ),
					'value' => '&#8358;', // Nigerian Naira
				),
			),
			'store_display'             => $this->store_display(),
			'gs_link_target'  => array(
				array(
					'label' => __( 'New Tab', 'gsbookshowcase' ),
					'value' => 'new_tab',
				),
				array(
					'label' => __( 'Same Window', 'gsbookshowcase' ),
					'value' => 'same_window',
				),
			),
			'gs_font_weight'  => array(
				array(
					'label' => __( 'Normal', 'gsbookshowcase' ),
					'value' => 'normal',
				),
				array(
					'label' => __( 'Bold', 'gsbookshowcase' ),
					'value' => 'bold',
				),
				array(
					'label' => __( 'Lighter', 'gsbookshowcase' ),
					'value' => 'lighter',
				),
			),
			'gs_font_style'   => array(
				array(
					'label' => __( 'Normal', 'gsbookshowcase' ),
					'value' => 'normal_font',
				),
				array(
					'label' => __( 'Bold', 'gsbookshowcase' ),
					'value' => 'bold_font',
				),
				array(
					'label' => __( 'Lighter', 'gsbookshowcase' ),
					'value' => 'lighter_font',
				),
			),

		);
	}

	public function store_display() {

			$free_stores = [
				array(
					'label' => __( 'Button', 'gsbookshowcase' ),
					'value' => 'btn',
				)
			];

			$pro_stores = [
				array(
					'label' => __( 'Image', 'gsbookshowcase' ),
					'value' => 'image',
				),
				array(
					'label' => __( 'Both', 'gsbookshowcase' ),
					'value' => 'both',
				)
			];

			if ( ! is_pro_active() ) {
				$pro_stores = array_map( function( $item ) {
					$item['pro'] = true;
					return $item;
				}, $pro_stores );
			}
	
			return array_merge( $free_stores, $pro_stores );
	} 

	public function get_single_pages() {

		$free_singles = [
			array(
				'label' => __( 'Default', 'gsbookshowcase' ),
				'value' => 'default',
			)
		];

		$pro_singles = [
			array(
				'label' => __( 'Style 01', 'gsbookshowcase' ),
				'value' => 'style_one',
			),
			array(
				'label' => __( 'Style 02', 'gsbookshowcase' ),
				'value' => 'style_two',
			),
			array(
				'label' => __( 'Style 03', 'gsbookshowcase' ),
				'value' => 'style_three',
			),
			array(
				'label' => __( 'Style 04', 'gsbookshowcase' ),
				'value' => 'style_four',
			)
		];

		if ( ! is_pro_active() ) {
			$pro_singles = array_map( function( $item ) {
				$item['pro'] = true;
				return $item;
			}, $pro_singles );
		}

		return array_merge( $free_singles, $pro_singles );
	} 

	public function get_author_singles() {

		$free_authors = [];

		$pro_authors  = [
			array(
				'label' => __( 'Style 01', 'gsbookshowcase' ),
				'value' => 'at_style_one',
			),
			array(
				'label' => __( 'Style 02', 'gsbookshowcase' ),
				'value' => 'at_style_two',
			),
			array(
				'label' => __( 'Style 03', 'gsbookshowcase' ),
				'value' => 'at_style_three',
			)
		];

		if ( ! is_pro_active() ) {
			$pro_authors = array_map( function( $item ) {
				$item['pro'] = true;
				return $item;
			}, $pro_authors );
		}
		
		return array_merge( $free_authors, $pro_authors );
	} 

	public function _save_shortcode_pref( $settings, $is_ajax ) {

		// Maybe add validation?
		update_option( $this->option_name, $settings, 'yes' );

		// Clean permalink flush
		delete_option( 'GS_Books_plugin_permalinks_flushed' );

		do_action( 'gs_books_preference_update' );

		do_action( 'gsp_preference_update' );

		if ( $is_ajax ) {
			wp_send_json_success( __( 'Preference saved', 'gsbookshowcase' ) );
		}
	}

	public function save_shortcode_pref() {

		check_ajax_referer( '_gs_books_admin_nonce_gs_' );

		if ( empty( $_POST['prefs'] ) ) {
			wp_send_json_error( __( 'No preference provided', 'gsbookshowcase' ), 400 );
		}

		$this->_save_shortcode_pref( $_POST['prefs'], true );
	}

	public function _get_shortcode_pref( $is_ajax ) {

		$pref = get_option( $this->option_name );

		if ( empty( $pref ) ) {
			$pref = $this->get_shortcode_default_prefs();
			$this->_save_shortcode_pref( $pref, false );
		}

		if ( $is_ajax ) {
			wp_send_json_success( $pref );
		}

		return $pref;
	}

	public function get_shortcode_pref() {

		$this->_get_shortcode_pref( wp_doing_ajax() );
	}

	public function _get_localization( $is_ajax ) {

		$localization = get_option( $this->level_option_name );

		if ( empty( $localization ) ) {
			$localization = $this->get_shortcode_default_localization();
			$this->_save_localization( wp_create_nonce( '_gs_books_admin_nonce_gs_' ), $localization, false );
		}

		if ( $is_ajax ) {
			wp_send_json_success( $localization );
		}

		return $localization;
	}

	public function _save_localization( $nonce, $settings, $is_ajax ) {

		if ( ! wp_verify_nonce( $nonce, '_gs_books_admin_nonce_gs_' ) ) {

			if ( $is_ajax ) {
				wp_send_json_error( __( 'Unauthorised Request', 'gsbookshowcase' ), 401 );
			}
			return false;

		}

		$settings = stripslashes_deep( $settings );

		// Maybe add validation?
		update_option( $this->level_option_name, $settings, 'yes' );

		// Clean permalink flush
		delete_option( 'GS_Books_plugin_permalinks_flushed' );

		if ( $is_ajax ) {
			wp_send_json_success( __( 'Localization saved', 'gsbookshowcase' ) );
		}
	}

	public function save_localization( $nonce = null ) {

		if ( ! $nonce ) {
			$nonce = wp_create_nonce( '_gs_books_admin_nonce_gs_' );
		}

		if ( empty( $_POST['localization'] ) ) {
			wp_send_json_error( __( 'No localization provided', 'gsbookshowcase' ), 400 );
		}

		$this->_save_localization( $nonce, $_POST['localization'], true );
	}

	static function maybe_create_shortcodes_table() {

		global $wpdb;

		$gs_books_db_version = '1.0';

		if ( get_option( "{$wpdb->prefix}gs_books_db_version" ) == $gs_books_db_version ) {
			return; // vail early
		}

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		$sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}gs_books (
            id BIGINT(20) unsigned NOT NULL AUTO_INCREMENT,
            shortcode_name TEXT NOT NULL,
            shortcode_settings LONGTEXT NOT NULL,
            created_at DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
            updated_at DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
            PRIMARY KEY (id)
        )" . $wpdb->get_charset_collate() . ';';

		if ( get_option( "{$wpdb->prefix}gs_books_db_version" ) < $gs_books_db_version ) {
			dbDelta( $sql );
		}

		update_option( "{$wpdb->prefix}gs_books_db_version", $gs_books_db_version );
	}

	public function create_dummy_shortcodes() {

		$request = wp_remote_get( GS_BOOKS_PLUGIN_URI . '/includes/demo-data/gs-books-dummy-shortcodes.json', array( 'sslverify' => false ) );

		if ( is_wp_error( $request ) ) {
			return false;
		}

		$shortcodes = wp_remote_retrieve_body( $request );
		$shortcodes = json_decode( $shortcodes, true );

		$wpdb = $this->gs_books_get_wpdb();

		if ( ! $shortcodes || ! count( $shortcodes ) ) {
			return;
		}

		foreach ( $shortcodes as $shortcode ) {

			$shortcode['shortcode_settings']                      = json_decode( $shortcode['shortcode_settings'], true );
			$shortcode['shortcode_settings']['gsbooks-demo_data'] = true;

			$data = array(
				'shortcode_name'     => $shortcode['shortcode_name'],
				'shortcode_settings' => json_encode( $shortcode['shortcode_settings'] ),
				'created_at'         => current_time( 'mysql' ),
				'updated_at'         => current_time( 'mysql' ),
			);

			$wpdb->insert( "{$wpdb->prefix}gs_books", $data, $this->get_gs_books_shortcode_db_columns() );

		}
	}

	public function delete_dummy_shortcodes() {

		$wpdb   = $this->gs_books_get_wpdb();
		$needle = 'gsbooks-demo_data';

		$wpdb->query( "DELETE FROM {$wpdb->prefix}gs_books WHERE shortcode_settings like '%$needle%'" );
	}
}
