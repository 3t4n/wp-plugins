<?php
/*
Plugin Name:	Template Builder for SiteOrigin
Description: 	Build your themes templates SiteOrigin.
Version: 		1.0.3
Author: 		Echelon
License: 		GPL3
License URI: 	https://www.gnu.org/licenses/gpl-3.0.txt
*/

if ( !class_exists('EchelonSO') ) {
	
	class EchelonSO {
		
		public function __construct() {
			
			add_filter( 'archive_template', array($this, 'archive_template') );
			add_filter( 'category_template', array($this, 'archive_template') );
			add_filter( 'template_include', array($this, 'template_include') );
			add_filter( 'search_template', array($this, 'search_template') );
			add_filter( 'single_template', array($this, 'single_template') );
			add_filter( '404_template', array($this, 'x404_template') );
			add_filter( 'manage_echelonso_layout_posts_columns', array($this, 'layout_admin_columns') );
			
			add_action( 'plugins_loaded', array($this, 'plugins_loaded') );
			add_action( 'pre_get_posts', array($this, 'pre_get_posts') );
			add_action( 'manage_echelonso_layout_posts_custom_column' , array($this, 'layout_admin_column'), 10, 2 );
			
			if (is_admin()) {
				require_once dirname( __FILE__ ) . '/inc/tgm/class-tgm-plugin-activation.php';
				add_action( 'tgmpa_register', array($this, 'register_required_plugins') );
				add_action( 'wp_ajax_ajax_conditional_logic', array($this, 'ajax_conditional_logic') );
				add_action( 'admin_enqueue_scripts', array($this, 'ajax_conditional_logic_js') );
			}
		}
		
		/*
		*
		*	AJAX Conditional Logic
		*
		*/
		
		public function ajax_conditional_logic() {
			include('inc/ajax-conditional-logic.php');
		}
		
		/*
		*
		*	AJAX Conditional Logic JS
		*
		*/
		
		public function ajax_conditional_logic_js() {
			wp_enqueue_script('ajax_conditional_logic_js', plugin_dir_url(__FILE__) . 'inc/ajax-conditional-logic.js');
		}
		
		/*
		*
		*	Admin Columns
		*
		*/
		
		public function layout_admin_columns($columns) {
			include('inc/admin-columns.php');
			return $columns;
		}
		
		public function layout_admin_column($column, $post_id) {
			include('inc/admin-column.php');
			return $column;
		}
		
		/*
		*
		*	Required Plugins
		*
		*/
		
		public function register_required_plugins() {
			include('inc/required-plugins.php');
			tgmpa( $plugins, $config );
		}
		
		/*
		*
		*	ACF Local JSON Load
		*
		*/
		
		public function acf_json_load_point( $paths ) {
			$paths[] = $path = dirname( __FILE__ ) . '/inc/acf-json/load';
			return $paths;
		}
		
		/*
		*
		*	PLugins Loaded
		*
		*/
		
		public function plugins_loaded() {
			add_filter( 'siteorigin_widgets_widget_folders', array($this, 'siteorigin_widgets_widget_folders') );
			add_filter( 'siteorigin_panels_settings_defaults', array( $this, 'settings_defaults' ) );
			add_filter( 'siteorigin_panels_settings_fields', array( $this, 'settings_fields') );
			add_filter( 'acf/settings/load_json', array($this, 'acf_json_load_point') );
			add_filter( 'acf/load_field/name=acftt_post_type', array( $this, 'acf_post_type_choices') );
			add_filter('siteorigin_widgets_active_widgets', array( $this, 'activate_widgets'));
			if (is_admin()) {
				add_filter('acf/settings/google_api_key', array( $this, 'acf_google_api_key'));
			}
		}
		
		/*
		*
		* ACF API Key
		*
		*/
		
		public function acf_google_api_key($fields) {
			if ( !empty(siteorigin_panels_setting('eso_acf_google_api_key')) ) {
				return siteorigin_panels_setting( 'eso_acf_google_api_key');
			}
			return $fields;
		}
		
		/*
		*
		*	Widget folders
		*
		*/
		
		public function siteorigin_widgets_widget_folders($folders) {
			$folders['echelonso_acf_tt_acf'] = plugin_dir_path(__FILE__) . 'widgets/acf/';
			$folders['echelonso_acf_tt_func'] = plugin_dir_path(__FILE__) . 'widgets/func/';
			$folders['echelonso_acf_tt_eso'] = plugin_dir_path(__FILE__) . 'widgets/eso/';
			$folders = apply_filters('echelonso_widget_folders', $folders);
			return $folders;
		}
		
		/*
		*
		* Settings Defauls
		*
		*/
		
		function settings_defaults( $defaults ) {
			return $defaults;
		}
		
		/*
		*
		* Settings Fields
		*
		*/
		
		public function settings_fields($fields) {
			include('inc/settings.php');
			return $fields;
		}
		
		/*
		*
		*	Form Teaser
		*
		*/
		
		function form_teaser() {
			return  '';
		}
		
		/*
		*
		*	Plugin Text Domain
		*
		*/
		
		function plugin_text_domain() {
			return  'echelonso';
		}
		
		/*
		*
		*	ACF Select Post Type
		*
		*/
		
		function acf_post_type_choices( $field ) {
			
			$field['choices'] = array();
			$choices = get_post_types( array('public' => true, '_builtin' => false) );
			
			$field['choices']['post'] = 'post';
			
			if( is_array($choices) ) {
				foreach( $choices as $choice ) {
					$field['choices'][ $choice ] = $choice;
				}
			}
			
			unset($field['choices']['echelonso_layout']);
			return $field;
			
		}
		
		/*
		*
		*	Get echelonso_layout names
		*
		*/
		
		function get_layout_select_options() {
			
			$args = array(
				'post_type'=> 'echelonso_layout',
				'posts_per_page' => -1,
				'orderby' => 'post_title',
				'order' => 'ASC'
			);
			
			$the_query = new WP_Query( $args );
			
			$options = array();
			
			$options[0] = __('Search Result', $this->plugin_text_domain());
			
			if ( $the_query->have_posts() ) {
				foreach ($the_query->posts as $k => $v) {
					$options[$v->ID] = $v->post_title;
				}
			}
			
			return $options;
		}
		
		/*
		*
		*	Get ACF Field Object
		*
		*/
		
		function get_acf_field_object($instance, $sub = false) {
			if ( !function_exists('get_field_object') || !function_exists('get_field') ) {
				return false;
			}
			global $post;
			include('inc/get-acf-field-object.php');
			return $return;
		}
		
		/*
		*
		*	Get Posts Per Page
		*
		*/
		
		function pre_get_posts($query) {
			include('inc/pre-get-posts.php');
			return;
		}
		
		/*
		*
		*	Template Include
		*
		*/
		
		public function template_include( $template ) {
			if (is_home()) {
				return $this->archive_template($template);
			}
			return $template;
		}
		
		/*
		*
		*	Archive Template
		*
		*/
		
		public function archive_template( $template ) {
			
			if (have_posts()) {
				
				if (is_author()) {
					
					$posts = get_posts(array(
						'numberposts'	=> -1,
						'post_type'		=> 'echelonso_layout',
						'meta_key'		=> 'acftt_layout_type',
						'meta_value'	=> 'author_archive'
					));
					
				} else {
					
					$posts = get_posts(array(
						'numberposts'	=> -1,
						'post_type'		=> 'echelonso_layout',
						'meta_query' => array(
							array(
								'key'     => 'acftt_post_type',
								'value'   => get_post_type(),
							),
							array(
								'key'     => 'acftt_layout_type',
								'value'   => 'archive',
							),
						),
						
					));
				}
				
				if ( !empty($posts) ) {
					global $echelon_template;
					$echelon_template = $posts[0]->ID;
					$template = dirname( __FILE__ ) . '/templates/archive.php';
				}
				
				return $template;
				
			} else {
				
				$posts = get_posts(array(
					'numberposts'	=> -1,
					'post_type'		=> 'echelonso_layout',
					'meta_key'		=> 'acftt_layout_type',
					'meta_value'	=> 'nothing_found'
				));
				
				if ( !empty($posts) ) {
					global $echelon_template;
					$echelon_template = $posts[0]->ID;
					$template = dirname( __FILE__ ) . '/templates/render.php';
				}
				
				return $template;
				
			}
			
			return $template;
		}
		
		/*
		*
		*	Search Template
		*
		*/
		
		public function search_template( $template ) {
			if (have_posts()) {
				
				$posts = get_posts(array(
					'numberposts'	=> -1,
					'post_type'		=> 'echelonso_layout',
					'meta_key'		=> 'acftt_layout_type',
					'meta_value'	=> 'search'
				));
				
				if ( !empty($posts) ) {
					global $echelon_template;
					$echelon_template = $posts[0]->ID;
					$template = dirname( __FILE__ ) . '/templates/search.php';
				}
				
				return $template;
				
			} else {
				
				$posts = get_posts(array(
					'numberposts'	=> -1,
					'post_type'		=> 'echelonso_layout',
					'meta_key'		=> 'acftt_layout_type',
					'meta_value'	=> 'nothing_found'
				));
				
				if ( !empty($posts) ) {
					global $echelon_template;
					$echelon_template = $posts[0]->ID;
					$template = dirname( __FILE__ ) . '/templates/render.php';
				}
				
				return $template;
				
			}
			
			return $template;
			
		}
		
		/*
		*
		*	404 Template
		*
		*/
		
		public function x404_template( $template ) {
			$posts = get_posts(array(
				'numberposts'	=> -1,
				'post_type'		=> 'echelonso_layout',
				'meta_key'		=> 'acftt_layout_type',
				'meta_value'	=> 'x404'
			));
			
			if ( !empty($posts) ) {
				global $echelon_template;
				$echelon_template = $posts[0]->ID;
				$template = dirname( __FILE__ ) . '/templates/render.php';
			}
			
			return $template;
		}
		
		/*
		*
		*	Single Template
		*
		*/
		
		public function single_template( $template ) {
			
			$posts = get_posts(array(
				'numberposts'	=> -1,
				'post_type'		=> 'echelonso_layout',
				'meta_query' => array(
					array(
						'key'     => 'acftt_post_type',
						'value'   => get_post_type(),
					),
					array(
						'key'     => 'acftt_layout_type',
						'value'   => 'single',
					),
				),
				
			));
			
			if ( !empty($posts) ) {
				global $echelon_template;
				$echelon_template = $posts[0]->ID;
				$template = dirname( __FILE__ ) . '/templates/single.php';
			}
			
			return $template;
		}
		
		/*
		*
		*	Activate Widgets
		*
		*/
		
		public function activate_widgets($widgets) {
			include('inc/activate-widgets.php');
			return $widgets;
		}
		
	}
	
	global $acftt;
	
	$acftt = new EchelonSO();
	
}
