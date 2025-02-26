<?php

/**
 * Class Appswiperslider_App_Swiper_Slider_Columns_Manage
 */

if (!class_exists('Appswiperslider_App_Swiper_Slider_Columns_Manage')):
	class Appswiperslider_App_Swiper_Slider_Columns_Manage
	{


		/**
		 * Modify columns in the admin list table.
		 */
		public function add_new_appswiperslider_columns_callback($columns)
		{
			$new_columns = array(
				'cb'             => '<input type="checkbox" />',
				'title'          => esc_html__('Title', 'app-swiper-slider'),
				'featured_image' => esc_html__('App Screen', 'app-swiper-slider'),
				'screen_cat'       => esc_html__('Screen Category', 'app-swiper-slider'),
				'client_url'     => esc_html__('Screen URL', 'app-swiper-slider'),
				'author'         => esc_html__('Author', 'app-swiper-slider'),
				'date'           => esc_html__('Date', 'app-swiper-slider'),
			);

			return $new_columns;
		}

		/**
		 * Display custom column content.
		 */
		public function manage_appswiperslider_posts_custom_column_callback($column, $post_ID)
		{
			switch ($column) {
				case 'featured_image':
					if (has_post_thumbnail($post_ID)) {
						echo get_the_post_thumbnail($post_ID, [40, 40]);
					} else {
						echo esc_html__('No image', 'app-swiper-slider');
					}
					break;

				case 'screen_cat':
					$terms = get_the_terms($post_ID, 'appswiperslider_cat');
					if (!empty($terms) && !is_wp_error($terms)) {
						$term_names = wp_list_pluck($terms, 'name');
						echo esc_html(implode(', ', array_map('esc_html', $term_names)));
					} else {
						echo esc_html__('No categories', 'app-swiper-slider');
					}
					break;

				case 'client_url':
					$client_url = get_post_meta($post_ID, 'client_url', true);
					if ($client_url) {
						echo '<a href="' . esc_url($client_url) . '" target="_blank">' . esc_html($client_url) . '</a>';
					} else {
						echo esc_html__('No URL', 'app-swiper-slider');
					}
					break;
			}
		}
		/**
		 * Add sortable columns to the `appswiperslider` post type.
		 *
		 * @param array $columns Existing sortable columns.
		 * @return array Modified sortable columns.
		 */
		public function appswiperslider_sortable_columns($columns)
		{
			// Ensure that the column keys match the ones used when registering columns.
			$columns['featured_image'] = 'featured_image'; // Sortable by featured image.
			$columns['screen_cat']       = 'screen_cat';       // Sortable by logo category.
			$columns['client_url']     = 'client_url';     // Sortable by client URL.
			$columns['author']         = 'author';         // Sortable by author.

			return $columns;
		}
	} //end class

endif;
