<?php
function ab_customise_core(){
	global $ab_options_set;
	
	/*----------------------------------------
	This sets up the custom editor styles
	------------------------------------------*/
	if(isset($ab_options_set['mce_styles'])){
		if (!function_exists('myCustomTinyMCE')){
			function myCustomTinyMCE($init){
				global $ab_options_set;
				$init['theme_advanced_buttons2_add_before'] = 'styleselect';
				$init['theme_advanced_styles'] = $ab_options_set['mce_styles'];
				return $init;
			}
		}
		add_filter('tiny_mce_before_init', 'myCustomTinyMCE',10,1);
	}
	
	/*----------------------------------------
	This sets up the custom contact options
	------------------------------------------*/
	if(isset($ab_options_set['custom_contact']) || isset($ab_options_set['contact_remove'])){
		function add_twitter_contactmethod($contactmethods){
			global $ab_options_set;
			if(isset($ab_options_set['custom_contact'])){
				$contacts=$ab_options_set['custom_contact'];
				foreach($contacts as $key=>$contact){
					$contactmethods[$key] = $contact;
				}
			}
			
			if(isset($ab_options_set['custom_contact'])){
				$remove=$ab_options_set['contact_remove'];
				foreach($remove as $rem){
					unset($contactmethods[$rem]);
				}
			}
			return $contactmethods;
		}
		add_filter('user_contactmethods','add_twitter_contactmethod',10,1);
	}
	
	/*----------------------------------------
	This sets up the custom post taxonomies
	------------------------------------------*/
	if(isset($ab_options_set['post_types'])){
		add_action('init', 'ab_post_taxonomies', 8);
		function ab_post_taxonomies(){
			global $ab_options_set;
			foreach($ab_options_set['post_types'] as $post_type){
				//Set Up Categories
				if($post_type['categories']==TRUE){
					register_taxonomy(
						strtolower(str_replace(' ', '-', $post_type['plural'])),
						strtolower(str_replace(' ', '-', $post_type['singular'])),
						array(
							'hierarchical' => true,
							'label' => $post_type['singular'] .' Categories',
							'query_var' => true,
							'rewrite' => true,
							'has_archive' => true
						)
					);
				}
				//Set Up Tags
				if($post_type['tags']==TRUE){
					register_taxonomy(
						strtolower(str_replace(' ', '-', $post_type['singular'])) .'-tags',
						strtolower(str_replace(' ', '-', $post_type['singular'])),
						array(
							'hierarchical' => false,
							'label' => $post_type['singular'] .' Tags',
							'query_var' => true,
							'rewrite' => true,
							'has_archive' => true
						)
					);
				}
			}
		}
	}
	/*----------------------------------------
	This sets up the custom post types
	------------------------------------------*/
	if(isset($ab_options_set['post_types'])){
		add_action('init', 'ab_post_types', 8);
		function ab_post_types(){
			global $ab_options_set;
			foreach($ab_options_set['post_types'] as $post_type){
				$labels = array(
					'name' => _x($post_type['plural'], 'post type general name'),
					'singular_name' => _x($post_type['singular'], 'post type singular name'),
					'add_new' => _x('Add New', $post_type['singular']),
					'add_new_item' => __('Add New ' .$post_type['singular']),
					'edit_item' => __('Edit ' .$post_type['singular']),
					'new_item' => __('New ' .$post_type['singular']),
					'view_item' => __('View ' .$post_type['singular']),
					'search_items' => __('Search ' .$post_type['plural']),
					'not_found' =>  __('No ' .$post_type['plural'] .' found'),
					'not_found_in_trash' => __('No ' .$post_type['plural'] .' found in Trash'),
					'parent_item_colon' => ''
				);
				register_post_type( $post_type['singular'],
					array(
						'labels' => $labels,
						'public' => true,
						'supports' => $post_type['supports'],
						'menu_position' => 5,
						'capability_type' => 'post',
						'show_ui' => true,
						'show_in_menu' => true,
						'has_archive' => true,
						'taxonomies' => array(strtolower(str_replace(' ', '-', $post_type['plural'])),
											  strtolower(str_replace(' ', '-', $post_type['singular'])) .'-tags')
					)
				);
			}
		}
	}
	
	/*----------------------------------------
	attach the tracking code to wp_footer()
	------------------------------------------*/
	function print_tracking(){
		echo get_option('ab_tracking');
	}
	if(isset($ab_options_set['tracking'])){
		add_action('wp_footer', 'print_tracking');
	}
	
}
add_filter('init','ab_customise_core',10,1);
?>