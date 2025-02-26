<?php

/**
 * Defines plugin specific post types.
 *
 * @package Jbid
 */

namespace Jbid\Post_Filter;

if (! class_exists('Jbid\Post_Filter\Shortcodes')) {

	/**
	 * A class for defining common helpers.
	 */
	class Shortcodes
	{

		/**
		 * var $helpers
		 */
		private $helpers;


		/**
		 * Main class constructor.
		 */
		public function __construct($helpers)
		{
			$this->helpers = $helpers;
			add_action('init', array($this, 'register_shortcodes'));

			add_action('wp_ajax_get_searchify_rst', array($this, 'get_searchify_rst'));
			add_action('wp_ajax_nopriv_get_searchify_rst', array($this, 'get_searchify_rst'));
		}


		/**
		 * Regsiter shortcodes.
		 */
		public function register_shortcodes()
		{
			add_shortcode('jbid_smart_searchify', array($this, 'smart_searchify_cb'));
		}


		/**
		 * Build a taxonomy slug & taxonomy name array where a key is taxonomy name
		 * which can be custom/user supplied.
		 *
		 * @param array $tax_props An array of taxonomy props/attributes saved during saving
		 * Saving the shortcode.
		 */
		public function get_tax_url_slug_name($tax_props)
		{
			$data = array();
			if (isset($tax_props['post_taxonomies']) && !empty($tax_props['post_taxonomies'])) {
				foreach ($tax_props['post_taxonomies'] as $key => $value) {
					if (! empty($tax_props['tax_url_slug'][$key])) {
						$key          = $tax_props['tax_url_slug'][$key];
						$data[$key] = $value;
					} else {
						// Here in this case the slug & name is same.
						$key          = $value;
						$data[$key] = $value;
					}
				}
			}
			return $data;
		}


		/**
		 * Fetch the taxonomy from the custom taxonomy slug used on frontend.
		 *
		 * @param string $tax_slug     The custom taxonomy slug if any.
		 * @param array  $sc_tax_props Taxonomy props used in the shortcode.
		 */
		public function get_tax_name_url_slug($tax_slug, $sc_tax_props)
		{

			$tax_slug_name = $this->get_tax_url_slug_name($sc_tax_props);

			if (! empty($tax_slug_name[$tax_slug])) {
				return $tax_slug_name[$tax_slug];
			} else {
				return;
			}
		}


		/**
		 * Fetch the url query vars and build a taxonomy query and return it.
		 *
		 * @param array $atts The shortcode props in array form and the user supplied data.
		 */
		public function get_tax_query_frm_query_vars($atts)
		{

			$tax_query = array();
			$_get      = $atts['form_data'];

			// Strip out the page no from the $get_array.
			// But only if it has a pn key.
			if (array_key_exists('pn', $_get)) {
				array_pop($_get);
			}

			if (! empty($_get)) {

				foreach ($_get as $tax_slug => $tax_terms) {

					if (empty($tax_terms)) {
						continue;
					}

					if (false !== strpos($tax_terms, ',')) {
						$tax_terms = explode(',', $tax_terms);
					}

					$tax_name = $this->get_tax_name_url_slug($tax_slug, $atts['sc_tax_props']);

					if (! empty($tax_name)) {
						if (is_array($tax_terms)) {
							$tax_query[] = array(
								'taxonomy' => sanitize_text_field($tax_name),
								'field'    => 'slug',
								'terms'    => $tax_terms,
								'operator' => 'IN',
							);
						} else {
							$tax_query[] = array(
								'taxonomy' => sanitize_text_field($tax_name),
								'field'    => 'slug',
								'terms'    => sanitize_text_field($tax_terms),
							);
						}
					}
				}

				// If taxonomy is more than 1.
				if (1 < count($tax_query)) {

					// @todo better to whitelist this option to be done latter.
					$tax_relation = ! empty($atts['tax_relation']) ? sabitize_text_field(strtoupper($atts['tax_relation'])) : 'AND';

					$tax_query['relation'] = $tax_relation;
				}
			}

			return $tax_query;
		}


		/**
		 * Get list of post for a given post types or its total posts count.
		 *
		 * @param array  $atts   The shortcode attributes and other custom filled data.
		 * @param string $return The return value post or posts count.
		 */
		public function get_filtered_posts_count($atts, $return = 'post')
		{

			// Whitelist post type.
			$post_type = post_type_exists($atts['post_type']) ? $atts['post_type'] : 'post';

			if ('count' === $return) {

				$args = array(
					'post_type'   => $post_type,
					'post_status' => 'publish',
					'numberposts' => -1,
				);

				$tax_query = $this->get_tax_query_frm_query_vars($atts);
				if (! empty($tax_query)) {
					$args['tax_query'] = $tax_query;
				}

				$all_posts  = get_posts($args);
				$post_count = count($all_posts);

				// Return total posts.
				return $post_count;
			} else {

				// Extract the current page number.
				$paged          = ! empty($atts['form_data']['pn']) ? absint($atts['form_data']['pn']) : 1;
				$posts_per_page = $atts['post_per_page'] ? absint($atts['post_per_page']) : 10;

				$args = array(
					'post_type'   => $post_type,
					'post_status' => 'publish',
					'numberposts' => $posts_per_page,
					'paged'       => $paged,
				);

				$tax_query = $this->get_tax_query_frm_query_vars($atts);
				if (! empty($tax_query)) {
					$args['tax_query'] = $tax_query;
				}

				$sortby_options = $this->helpers->get_sortby_options();

				if (
					! empty($atts['form_data']['sortby']) &&
					array_key_exists($atts['form_data']['sortby'], $sortby_options)
				) {
					$_order_by = $this->helpers->get_post_order_by($atts['form_data']['sortby']);
				}

				if (! empty($_order_by)) {
					$args['orderby'] = $_order_by['orderby'];
					$args['order']   = $_order_by['order'];
				}

				$latest_posts = get_posts($args);

				return $latest_posts;
			}
		}

		/**
		 * Check and return whether the return button should be visible or not.
		 *
		 * @param array $get An array of search argument.
		 */
		public function reset_btn_visibility($get)
		{

			if (! empty($get)) {

				if (! empty($get['sortby'])) {
					unset($get['sortby']);
				}

				if (! empty($get['security'])) {
					unset($get['security']);
				}

				if (! empty($get['jbid_ss_id'])) {
					unset($get['jbid_ss_id']);
				}

				if (! empty($get['pathname'])) {
					unset($get['pathname']);
				}

				if (! empty($get['_locale'])) {
					unset($get['_locale']);
				}
			}

			if (
				empty($get) ||
				(1 === count($get) && ! empty($get['pn']))
			) {
				return false;
			} else {
				return true;
			}
		}

		/**
		 * Loop through the posts lists and generate a final html output
		 * for rendering.
		 *
		 * @param array $sc_atts    An array of shortcode settings.
		 * @param array $post_lists An array of posts.
		 */
		public function get_post_lists_html($sc_atts, $post_lists)
		{

			$layout_class = ! empty($sc_atts['layout_rendering']) ? sanitize_text_field($sc_atts['layout_rendering']) . '-view' : 'list-view';

			if (! empty($post_lists)) {
				$data = '<ul class="jbid-post-items ' . sanitize_html_class($layout_class) . '">';

				// @todo Find a better way for it.
				foreach ($post_lists as $key => $post) {
					$post_permalink = get_the_permalink($post->ID);

					$data .= '<li class="post-item">';

					// Featured image url.
					if (has_post_thumbnail($post->ID)) {
						$data .= '<div class="featured-img-wrap">';

						$image_size = apply_filters('jbid_searchify_post_thumbnail_size', 'medium');
						$data      .= get_the_post_thumbnail($post->ID, $image_size);
						$data      .= '</div>';
					}

					$data .= '<div class="post-details">';

					$post_title = apply_filters('the_title', $post->post_title, $post->ID);

					$data .= '<h3 class="post-title"><a href="' . esc_url($post_permalink) . '">' . esc_html($post->post_title) . '</a></h3>';
					$data .= '<p class="post-meta">';
					if (empty($sc_atts['display_publish_date'])) {
						$data .= '<span class="published-on">' . get_the_date('F j, Y', $post->ID) . '</span>';
					}
					// @todo Make a own custom function.

					if (! empty($sc_atts['display_author'])) {
						$author_name = $this->helpers->get_user_fl_name($post->post_author);
						if (! empty($author_name)) {
							$data .= '<span class="published-by">' . esc_html($author_name) . '</span>';
						}
					}

					$data .= '</p>';

					if (! empty($sc_atts['display_excerpt'])) {

						$post_excerpt = apply_filters('the_excerpt', get_the_excerpt($post->ID));

						$p_excerpts = apply_filters('the_excerpt', $post_excerpt);

						// Escaping not required as it has been taken care.
						// The lenght is set to 20 words as asked. Will make dynamic later,
						$data .= '<p class="post-excerpts">' .  wp_trim_words($post_excerpt, 20) . '</p>';
					}

					$data .= $this->helpers->get_post_taxonomy_terms($post->ID, $sc_atts['sc_tax_props']);

					if (! empty($sc_atts['display_readmore'])) {
						$read_more = apply_filters('jbid_searchify_post_read_more_txt', esc_html__('Read More', 'smart-searchify'));
						$data     .= '<p class="read-more"><a href="' . esc_url($post_permalink) . '">' . esc_html($read_more) . '</a></p>';
					}

					$data .= '</div>';
					$data .= '</li>';
				}

				$data .= '</ul>';
				return $data;
			} else {
				$no_result_msg = apply_filters('jbid_searchify_no_result_msg', esc_html__('Oops! Nothing found.', 'smart-searchify'));
				$data          = '<div class="no-result"><p>' . esc_html($no_result_msg) . '</p></div>';
				return $data;
			}
		}

		/**
		 * Generate post type filters based on categories and other taxonomies.
		 * Supports different rendering types like radio buttons, checkboxes, multi-select, and dropdowns.
		 *
		 * @param array $args Array of arguments defining taxonomies, rendering types, headings, etc.
		 * @param array $_get Array of values received from form submission for pre-filling the filters.
		 *
		 * @return string HTML string containing the rendered filters.
		 */

		public function get_post_tax_filters($args, $_get = array())
		{
			$data = '';

			// Ensure arguments contain required data before proceeding
			if (!empty($args) && !empty($args['post_taxonomies'])) {
				foreach ($args['post_taxonomies'] as $key => $taxonomy_slug) {
					// Fetch the correct taxonomy_slug from the tax_url_slug.
					$tax_terms = $this->helpers->get_terms_by_tax_slug($taxonomy_slug);

					if (!empty($tax_terms)) {

						$data     .= '<div class="jbid-tax-container">';

						// @todo: This code block should be moved to its own function.
						switch ($args['tax_render_type'][$key]) {
							case 'radio':
								$data   .= '<div class="jbid-tax-input radio-wrap" >';
								$data   .= '<p class="jbid-tax-title">' . esc_html($args['tax_heading'][$key]) . '</p>';
								$counter = 1;
								foreach ($tax_terms as $_key => $tax_term) {

									$input_name = ! empty($args['tax_url_slug'][$key]) ? $args['tax_url_slug'][$key] : $args['post_taxonomies'][$key];
									$data      .= '<div class="input-control">';
									$data      .= '<input type="radio"
										name="' . esc_attr($input_name) . '"
										id="' . esc_attr($input_name . '_' . $counter) . '"
										value="' . esc_attr($tax_term->slug) . '"';

									if (! empty($_get[$input_name]) && ($tax_term->slug === $_get[$input_name])) {
										$data .= 'checked="checked" ';
									}

									$data .= ' >';
									$data .= '<label for="' . esc_attr($input_name . '_' . $counter) . '">' . esc_html($tax_term->name);

									if ($args['tax_post_count'][$key]) {
										$data .= ' (' . esc_html($tax_term->count) . ')';
									}

									$data .= '</label>';
									$data .= '</div>';
									$counter++;
								}
								$data .= '</div>';
								break;
							case 'checkbox':
								$data   .= '<div class="jbid-tax-input checkbox-wrap">';
								$data   .= '<p class="jbid-tax-title">' . esc_html($args['tax_heading'][$key]) . '</p>';
								$counter = 1;
								foreach ($tax_terms as $_key => $tax_term) {
									$input_name = ! empty($args['tax_url_slug'][$key]) ? $args['tax_url_slug'][$key] : $args['post_taxonomies'][$key];
									$data      .= '<div class="input-control">';
									$data      .= '<input type="checkbox"
										name="' . esc_attr($input_name) . '[]"
										id ="' . esc_attr($input_name . '_' . $counter) . '" 
										value="' . esc_attr($tax_term->slug) . '"';

									if (! empty($_get[$input_name]) && false !== strpos($_get[$input_name], $tax_term->slug)) {
										$data .= ' checked="checked" ';
									}

									$data .= '><label for="' . esc_attr($input_name . '_' . $counter) . '">' . esc_html($tax_term->name);

									if ($args['tax_post_count'][$key]) {
										$data .= ' (' . esc_html($tax_term->count) . ')';
									}
									$data .= '</label>';
									$data .= '</div>';
									$counter++;
								}
								$data .= '</div>';
								break;
							case 'multi-select':
								$input_name = ! empty($args['tax_url_slug'][$key]) ? $args['tax_url_slug'][$key] : $args['post_taxonomies'][$key];

								$data .= '<div class="jbid-tax-input multi-select-wrap" >';
								$data .= '<label class="jbid-tax-title" for="' . $input_name . '">' . esc_html($args['tax_heading'][$key]) . '</label>';

								$data             .= '<select name="' . esc_attr($input_name) . '" id="' . esc_attr($input_name) . '" multiple class="multi-select">';
								$none_option_label = apply_filters('jbid_searchify_select_none_label', __('Reset', 'smart-searchify'));

								foreach ($tax_terms as $_key => $tax_term) {
									$data .= '<option
										value="' . esc_attr($tax_term->slug) . '"';

									if (! empty($_get[$input_name]) && false !== strpos($_get[$input_name], $tax_term->slug)) {
										$data .= ' selected="selected" ';
									}

									$data .= '>' . esc_html($tax_term->name);

									if ($args['tax_post_count'][$key]) {
										$data .= ' (' . esc_html($tax_term->count) . ')';
									}

									$data .= '</option>';
								}
								$data .= '</select>';
								$data .= '</div>';
								break;

							default:
								$input_name = ! empty($args['tax_url_slug'][$key]) ? $args['tax_url_slug'][$key] : $args['post_taxonomies'][$key];

								$data .= '<div class="jbid-tax-input select-wrap" >';
								$data .= '<label class="jbid-tax-title" for="' . $input_name . '">' . esc_html($args['tax_heading'][$key]) . '</label>';

								$data             .= '<select name="' . esc_attr($input_name) . '" id="' . esc_attr($input_name) . '" >';
								$none_option_label = apply_filters('jbid_searchify_select_none_label', __('All', 'smart-searchify'));
								$data             .= '<option value="">' . esc_html($none_option_label) . '</option>';
								foreach ($tax_terms as $_key => $tax_term) {
									$data .= '<option
										value="' . esc_attr($tax_term->slug) . '"';

									if (! empty($_get[$input_name]) && false !== strpos($_get[$input_name], $tax_term->slug)) {
										$data .= ' selected="selected" ';
									}
									$data .= '>' . esc_html($tax_term->name);
									if ($args['tax_post_count'][$key]) {
										$data .= ' (' . esc_html($tax_term->count) . ')';
									}
									$data .= '</option>';
								}
								$data .= '</select>';
								$data .= '</div>';
								break;
						}
						$data .= '</div>';
					}
				}
			}
			return $data;
		}

		/**
		 * Build up the filters and html for the smart searchify shortcode.
		 *
		 * @param array $_atts An array of options.
		 */
		public function get_smart_searchify_data($_atts)
		{

			$show_submit_btn = false;

			$_get = $_atts['form_data'];
			$page = ! empty($_get['page']) ? absint($_get['page']) : 1;

			$data = '';

			$output = '';

			$frm_pos_cls = ! empty($_atts['filters_position']) ? 'display-' . sanitize_text_field($_atts['filters_position']) : 'display-top';

			$output .= '<div class="jbid-smart-searchify ' . (('display-left' === $frm_pos_cls) ? 'left-filters' : 'top-filters') . '" id="jbid-smart-searchify" >';

			$tax_details = '';

			// Break it into its own block;
			if (! empty($_atts['taxonomy'])) {

				if (false === strpos($_atts['taxonomy'], ',')) {
					$tax_details = array(
						'post_type'        => $_atts['post_type'],
						'post_taxonomies'  => array($_atts['taxonomy']),
						'tax_render_type'  => array($_atts['tax_render_type']),
						'tax_heading'      => array($_atts['tax_heading']),
						'tax_url_slug'     => array($_atts['tax_url_slug']),
						'tax_post_count'   => array($_atts['tax_post_count']),
						'display_taxonomy' => array($_atts['display_taxonomy']),
					);
				} else {
					$taxonomies      = explode(',', $_atts['taxonomy']);
					$tax_render_type = explode(',', $_atts['tax_render_type']);
					$tax_heading     = explode(',', $_atts['tax_heading']);

					$tax_url_slug = '';
					if (! empty($_atts['tax_url_slug'])) {
						$tax_url_slug = explode(',', $_atts['tax_url_slug']);
					}

					$tax_post_count   = explode(',', $_atts['tax_post_count']);
					$display_taxonomy = explode(',', $_atts['display_taxonomy']);

					$tax_details = array(
						'post_type'        => $_atts['post_type'],
						'post_taxonomies'  => $taxonomies,
						'tax_render_type'  => $tax_render_type,
						'tax_heading'      => $tax_heading,
						'tax_url_slug'     => $tax_url_slug,
						'tax_post_count'   => $tax_post_count,
						'display_taxonomy' => $display_taxonomy,
					);
				}
			}

			$filter_op = $this->get_post_tax_filters($tax_details, $_get);
			// $filter_op = true;
			$output .= '<div class="filters"><button type="button" class="filter-button">Filters</button></div>';
			$list_fullwidth_wrap = false;
			if (! empty($_atts['post_ordering']) && 'left' === $_atts['filters_position']) {
				$output      .= '<div class="jbid-sortby-left">';
				$sort_options = $this->helpers->get_sortby_options();

				$sort_by = (! empty($_get['sortby']) && array_key_exists($_get['sortby'], $sort_options)) ? $_get['sortby'] : '';

				$post_ordering = $this->helpers->get_post_orderby_sort_inputs($sort_by);
				$output       .= $post_ordering;
				$output .= '</div>';
			}

			if (empty($filter_op) && 'left' === $_atts['filters_position']) {
				$list_fullwidth_wrap = true;
				$output .= '<div class="jbid-form-wrapper hide-left-filter ' . sanitize_html_class($frm_pos_cls) . '">';
			} else {
				$output .= '<div class="jbid-form-wrapper ' . sanitize_html_class($frm_pos_cls) . '">';
			}

			$output .= '<div class="form-sortby-wrapper">';

			$output .= '<form name="jbid-searchify-frm" id="jbid-searchify-frm" class="jbid-searchify-frm" >';
			$output .= '<div class="jbid-filters-wrap">';
			$output .= $filter_op;

			$sub_reset_btns = '';
			if (! empty($_atts['submit_btn'])) {

				$submit_btn_label = apply_filters('jbid_searchify_sbm_btn_label', esc_html__('Submit', 'smart-searchify'));

				// Display reset button only if there are filters available.
				$sub_reset_btns .= '<input type="submit" name="jbid-sbm-btn" id="jbid-sbm-btn" class="jbid-btn submit" value="' . esc_attr($submit_btn_label) . '" />';
			}

			$reset_btn_label = apply_filters('jbid_searchify_reset_btn_label', esc_html__('Reset', 'smart-searchify'));

			if (! empty($this->reset_btn_visibility($_get))) {
				$sub_reset_btns .= '<input type="reset" name="jbid-reset-btn" id="jbid-reset-btn" class="jbid-btn reset" value="' . esc_attr($reset_btn_label) . '" />';
			}

			if (! empty($sub_reset_btns)) {
				$output .= '<div class="btn-wrapper">' . $sub_reset_btns . '</div>';
			}

			$output .= '</div>';

			$output .= '<input type="hidden" name="jbid-cur-page" id="jbid-cur-page" value="' . $page . '" />';
			$output .= '<input type="hidden" name="jbid-is-ajax" id="jbid-is-ajax" value="' . intval($_atts['ajax_filtering']) . '" />';
			$output .= '<input type="hidden" name="jbid-ssearchify-id" id="jbid-ssearchify-id" value="' . intval($_atts['id']) . '" />';
			$output .= '</form>';

			if (! empty($_atts['post_ordering']) && 'top' === $_atts['filters_position']) {

				$sort_options = $this->helpers->get_sortby_options();

				$sort_by = (! empty($_get['sortby']) && array_key_exists($_get['sortby'], $sort_options)) ? $_get['sortby'] : '';

				$post_ordering = $this->helpers->get_post_orderby_sort_inputs($sort_by);
				$output       .= $post_ordering;
			}

			$output .= '</div>';
			$output .= '</div>';

			$output .= '<div class="' . ($list_fullwidth_wrap ? 'jbid-lists-wrap full-width' : 'jbid-lists-wrap') . '" >';

			if (! empty($_atts['ajax_filtering'])) {
				$output .= '<div class="jbid-ajax-loader" id="jbid-ajax-loader" ><div class="loader-icon"></div></div>';
			}

			// Add an shortcode taxonomy data to the $_atts array.
			$_atts['sc_tax_props'] = $tax_details;

			$posts_list  = $this->get_filtered_posts_count($_atts);
			$total_posts = $this->get_filtered_posts_count($_atts, 'count');

			// @todo delete below lone its jo more applicable.
			// $_post_taxonmies = $this->helpers->get_post_tax_lists( $_atts['post_type'] );

			$posts_html  = $this->get_post_lists_html($_atts, $posts_list);
			$total_pages = ceil($total_posts / $_atts['post_per_page']);

			// Pagination.
			$pagination = $this->helpers->get_pagination($total_pages, $_get, intval($_atts['ajax_filtering']));
			$output    .= $posts_html;
			$output    .= $pagination;

			$output .= '</div>';

			return $output;
		}


		/**
		 * Renders the smart searchify shortcode output.
		 *
		 * @param array  $atts    An array of attributes.
		 * @param string $content The text provided between the start and closing tag.
		 */
		public function smart_searchify_cb($atts, $content = null)
		{
			ob_start();

			$sc_id = intval($atts['id']);

			$main_atts = get_post_meta($sc_id, 'jbid_ssearchify_atts', true);

			$filters = array();

			$_get = wp_unslash($_GET); // phpcs:ignore

			$default = array(
				'id'               => '0',
				'post_type'        => 'post',
				'post_per_page'    => '10',
				'display_author'   => '1',
				'display_excerpt'  => '0',
				'display_readmore' => '0',
				'display_publish_date' => '0',
				'post_ordering'    => '0',
				'ajax_filtering'   => '0',
				'submit_btn'       => '0',
				'layout_rendering' => '0',
				'filters_position' => '0',
				'taxonomy'         => '',
				'tax_render_type'  => '',
				'tax_heading'      => '',
				'tax_url_slug'     => '',
				'tax_post_count'   => '0',
				'display_taxonomy' => '0',
			);

			$_atts = shortcode_atts($default, $main_atts);

			// Push the form filters data.
			$_atts['form_data'] = $_get;

			$data = $this->get_smart_searchify_data($_atts);

			return $data;
		}

		/**
		 * Filters the Searchify result without page loading.
		 */
		public function get_searchify_rst()
		{

			$query_str = wp_unslash($_POST['data']); // phpcs:ignore

			$_post = array();

			parse_str($query_str, $_post);

			$shortcode_id = absint($_post['jbid_ss_id']);

			if (! empty($shortcode_id)) {

				$searchify_atts = get_post_meta($shortcode_id, 'jbid_ssearchify_atts', true);

				$searchify_atts['form_data'] = $_post;

				$data = $this->get_smart_searchify_data($searchify_atts);

				wp_send_json_success($data);
				wp_die();
			}
		}
	}
}
