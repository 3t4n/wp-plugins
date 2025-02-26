<?php

if (!class_exists('Appswiperslider_App_Swiper_Slider_Custom_Post_Type')) :
	class Appswiperslider_App_Swiper_Slider_Custom_Post_Type
	{

		// Method for registering custom post type and taxonomy
		public function register()
		{
			$main_labels = [
				'name'                  => __('All Screens', 'app-swiper-slider'),
				'singular_name'         => __('App Screen Slider', 'app-swiper-slider'),
				'add_new'               => __('Add New Screen', 'app-swiper-slider'),
				'all_items'             => __('All Screens', 'app-swiper-slider'),
				'add_new_item'          => __('Add New Screen', 'app-swiper-slider'),
				'edit_item'             => __('Edit Screen', 'app-swiper-slider'),
				'new_item'              => __('New Screen', 'app-swiper-slider'),
				'view_item'             => __('View Screen', 'app-swiper-slider'),
				'search_items'          => __('Search Screen', 'app-swiper-slider'),
				'not_found'             => __('No Screen found', 'app-swiper-slider'),
				'not_found_in_trash'    => __('No Screen found in Trash', 'app-swiper-slider'),
				'menu_name'             => __('App Screen', 'app-swiper-slider'),
			];

			$main_args = [
				'labels'                => $main_labels,
				'public'                => true,
				'exclude_from_search'   => true,
				'publicly_queryable'    => false,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'query_var'             => true,
				'rewrite'               => ['slug' => 'appswiperslider'],  // Prefixed slug
				'capability_type'       => 'page',
				'has_archive'           => true,
				'hierarchical'          => false,
				'menu_position'         => 5,
				'menu_icon'             => 'dashicons-smartphone',
				'supports'              => ['title', 'thumbnail'],
			];

			// Register the custom post type
			register_post_type('appswiperslider', $main_args);

			// Taxonomy labels
			$cat_labels = [
				'name'              => __('Screen Categories', 'app-swiper-slider'),
				'singular_name'     => __('Screen Category', 'app-swiper-slider'),
				'search_items'      => __('Search Categories', 'app-swiper-slider'),
				'all_items'         => __('All Screen Categories', 'app-swiper-slider'),
				'parent_item'       => __('Parent Screen Category', 'app-swiper-slider'),
				'parent_item_colon' => __('Parent Screen Category:', 'app-swiper-slider'),
				'edit_item'         => __('Edit Screen Category', 'app-swiper-slider'),
				'update_item'       => __('Update Screen Category', 'app-swiper-slider'),
				'add_new_item'      => __('Add New Screen Category', 'app-swiper-slider'),
				'new_item_name'     => __('New Screen Category Name', 'app-swiper-slider'),
				'menu_name'         => __('Screen Categories', 'app-swiper-slider'),
			];

			$cat_args = [
				'hierarchical'      => true,
				'labels'            => $cat_labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => ['slug' => 'appswiperslider-cat'],  // Prefixed slug
			];

			// Register the taxonomy
			register_taxonomy('appswiperslider_cat', ['appswiperslider'], $cat_args);

			// Flush rewrite rules to ensure the custom post type and taxonomy are available
			flush_rewrite_rules();
		}
	}
endif;
