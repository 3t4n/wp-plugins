<?php
/**
 * Helper function used througout the plugin.
 *
 * @package Jbid
 */

namespace Jbid\Post_Filter;

if ( ! class_exists( 'Jbid\Post_Filter\Helpers' ) ) {

	/**
	 * A class for defining common helpers.
	 */
	class Helpers {

		/**
		 * Main class constructor.
		 */
		public function __construct() {
			add_action( 'wp_ajax_get_post_taxonomies', array( $this, 'get_post_taxonomies' ) );
			add_filter( 'paginate_links', array( $this, 'remove_pageno_frm_pagining_urls' ) );
			add_filter( 'excerpt_length', array( $this, 'modify_excerpt_length' ) );
		}

		/**
		 * Modifify the default excerpts length to 20 words.
		 *
		 * @param int $default_length The default excerpt words count.
		 */
		public function modify_excerpt_length( $default_length ) {

			// Make the default length to 20 words as per our req.
			$default_length = 20;

			// Add a custom filter to modify this value from user side.
			$modified_length = apply_filters( 'jbid_searchify_excerpts_length', $default_length );
			return intval( $modified_length );
		}

		/**
		 * Remove link to page no 1 from the first element and prev element
		 * from the generated pagination.
		 *
		 * @param string $page_link The page link.
		 */
		public function remove_pageno_frm_pagining_urls( $page_link ) {

			// @todo find a better way to handle it.
			$url_component = wp_parse_url( $page_link );
			if ( ! empty( $url_component['query'] ) ) {

				parse_str( $url_component['query'], $_qry_vars );

				// Remove pn=1 from the url only if the page no is 1.
				if ( ! empty( $_qry_vars['pn'] ) && 1 === intval( $_qry_vars['pn'] ) ) {

					if ( false !== strpos( $page_link, '?pn=1' ) ) {
						$page_link = str_replace( '?pn=1', '', $page_link );
					} elseif ( false !== strpos( $page_link, '&pn=1' ) ) {
						$page_link = str_replace( '&pn=1', '', $page_link );
					}
				}
			}
			return $page_link;
		}


		/**
		 * Get and return valid post orderoptions.
		 */
		public function get_post_order_options() {
			$default_options = array(
				'asc'  => 'A-Z',
				'desc' => 'Z-A',
			);
			$order_options   = apply_filters( 'jbid_searchify_post_orders', $default_options );

			return $order_options;
		}

		/**
		 * Get and return valid post orderby options.
		 */
		public function get_post_orderby_options() {
			$default_options = array(
				'title' => 'Title',
				'date'  => 'Date',
			);
			$orderby_options = apply_filters( 'jbid_searchify_post_orderby', $default_options );

			return $orderby_options;
		}

		/**
		 * Sanitize each key & values of an array.
		 *
		 * @param array $_arr An array whose keys and values to be sanitized.
		 */
		public function sanitize_array( $_arr ) {
			if ( ! empty( $_arr ) ) {
				$keys = array_keys( $_arr );
				$keys = array_map( 'sanitize_key', $keys );

				$values = array_values( $_arr );
				$values = array_map( 'sanitize_text_field', $values );

				return array_combine( $keys, $values );
			}

			// Return the same array as it is.
			return $_arr;
		}

		/**
		 * Get positive number for a provided value.
		 *
		 * @param int $number The interger value.
		 */
		public function get_abs_int( $number ) {
			return absint( $number );
		}

		/**
		 * Converts a associative array into a key value query string.
		 *
		 * @param array $get An array of values received from the user.
		 */
		public function get_http_query_str( $get ) {

			$qry_str = '';

			if ( ! empty( $get ) ) {
				foreach ( $get as $key => $val ) {
					$qry_str .= $key . '=' . $val . '&';
				}

				// Trim out the last &.
				$qry_str = rtrim( $qry_str, '&' );
			}

			return $qry_str;
		}

		/**
		 * Generate and return a pagination.
		 *
		 * @param int     $total_pages Total Pages counts.
		 * @param array   $_get        An array of query arg variables & its values.
		 * @param boolean $is_ajax     Whether an ajax is enabled or not.
		 */
		public function get_pagination( $total_pages, $_get = array(), $is_ajax = false ) {

			global $wp;

			// Trim out unnecessary vars.
			if ( isset( $_get['security'] ) ) {
				unset( $_get['security'] );
			}

			if ( isset( $_get['jbid_ss_id'] ) ) {
				unset( $_get['jbid_ss_id'] );
			}

			$base_url = home_url( add_query_arg( array(), $wp->request ) ) . '/';

			if ( $is_ajax && ! empty( $_get['pathname'] ) ) {
				$base_url = home_url( add_query_arg( array(), $wp->request ) ) . sanitize_text_field( $_get['pathname'] );
			}

			// Reset the page pathname.
			if ( ! empty( $_get['pathname'] ) ) {
				unset( $_get['pathname'] );
			}

			$current_slug = add_query_arg( array(), $wp->request );

			$paged = ! empty( $_get['pn'] ) ? absint( $_get['pn'] ) : 1;

			$_get['pn'] = '%#%';
			$permalinks = '';
			$format     = ( 1 < count( $_get ) ) ? '?pn=%#%' : '&pn=%#%';

			$paging_class = ! empty( $is_ajax ) ? 'jbid-ssearchify-pagination ajax-paging' : 'jbid-ssearchify-pagination';

			$qry_string = $this->get_http_query_str( $_get );

			$final_page_url = $base_url . '?' . $qry_string;

			// Generate a pagination.
			$pagination = '';

			$_paginate_links = paginate_links(
				array(
					'base'    => $final_page_url,
					'format'  => $format,
					'current' => max( 1, $paged ),
					'total'   => absint( $total_pages ),
					'type'    => 'array',
				)
			);

			if ( ! empty( $_paginate_links ) ) {
				$pagination .= '<div class="' . $paging_class . '">';
				$pagination .= '<ul class="jbid-ss-pagination">';

				// Generate a custom pagination.
				foreach ( $_paginate_links as $key => $val ) {
					// @todo escape the val.
					$pagination .= '<li>' . $val . '</li>';
				}

				$pagination .= '</ul>';
				$pagination .= '</div>';
			}

			return $pagination;
		}

		/**
		 * Get post order and order by details from the user sortby value.
		 *
		 * @param string $sortby The value of sort by input selected by user.
		 */
		public function get_post_order_by( $sortby ) {
			$_order_by = array();

			switch ( $sortby ) {
				case 'newest-first':
					$_order_by['orderby'] = 'date';
					$_order_by['order']   = 'DESC';
					break;
				case 'oldest-first':
				default:
					$_order_by['orderby'] = 'date';
					$_order_by['order']   = 'ASC';
					break;
			}
			return $_order_by;
		}


		/**
		 * Generate and return the sortby options input.
		 */
		public function get_sortby_options() {

			$default_options = array(
				''             => esc_html__( 'Select', 'smart-searchify' ),
				'oldest-first' => esc_html__( 'Oldest First', 'smart-searchify' ),
				'newest-first' => esc_html__( 'Newest First', 'smart-searchify' ),

			);

			$sortby_options = apply_filters( 'jbid_searchify_sortby_options', $default_options );
			return $sortby_options;
		}

		/**
		 * Generate and return the post orderby input.
		 *
		 * @param string $orderby The orderby value.
		 */
		public function get_post_orderby_input( $orderby ) {

			$data = '<div>';

			$data       .= '<strong>Order By</strong>';
			$data       .= '<p><select name="jbid-post-orderby" id="jbid-post-orderby" class="jbid-post-orderby" >';
			$options_arr = $this->get_post_orderby_options();

			foreach ( $options_arr as $key => $val ) {
				$data .= '<option value="' . esc_attr( $key ) . '"' . selected( $orderby, $key, false ) . '  >' . esc_html( $val ) . '</option>';
			}

			$data .= '</select></p>';
			$data .= '</div>';
			return $data;
		}

		/**
		 * Generate and return the post ordering input.
		 *
		 * @param string $order The order value.
		 */
		public function get_post_order_input( $order ) {

			$data = '<div>';

			$data       .= '<strong>Sort</strong>';
			$data       .= '<p><select name="jbid-post-order" id="jbid-post-order" class="jbid-post-order" >';
			$options_arr = $this->get_post_order_options();

			foreach ( $options_arr as $key => $val ) {
				$data .= '<option value="' . esc_attr( $key ) . '"' . selected( $order, $key, false ) . '  >' . esc_html( $val ) . '</option>';
			}

			$data .= '</select></p>';

			$data .= '</div>';
			return $data;
		}

		/**
		 * Defines and return a post filtering options.
		 *
		 * @param string $sort_by The field name by which the results to be ordered.
		 */
		public function get_post_orderby_sort_inputs( $sort_by ) {

			$data        = '<div class="jbid-sortby-wrap">';
			$data       .= '<label class="jbid-tax-title" for="jbid-post-sortby" >Sort By</label>';
			$data       .= '<select name="jbid-post-sortby" id="jbid-post-sortby" class="jbid-post-sortby" >';
			$options_arr = $this->get_sortby_options();

			foreach ( $options_arr as $key => $val ) {
				$data .= '<option value="' . esc_attr( $key ) . '"' . selected( $sort_by, $key, false ) . '  >' . esc_html( $val ) . '</option>';
			}

			$data .= '</select>';
			$data .= '</div>';
			return $data;
		}

		/**
		 * Get all post types except the page type.
		 */
		public function get_all_posts_types() {

			$args = array(
				'public'   => true,
				'_builtin' => false,
			);

			// Default post with option to select value.
			$filter_post_types = array(
				'post' => 'Post',
			);

			$post_types = get_post_types( $args );

			foreach ( $post_types as $post_type ) {
				$filter_post_types[ $post_type ] = ucwords( $post_type );
			}

			return $filter_post_types;
		}

		/**
		 * Fetch taxonomies registered for a given post.
		 *
		 * @param string $post_type The post type for which the taxonomy to be fetched.
		 * @param string $type      Type of taxonomy data to be returned complete object or just
		 *                          a list of taxonomy names.
		 */
		public function get_post_tax_lists( $post_type, $type = 'name' ) {
			$post_taxonomies    = array();
			$exclude_taxonomy   = array( 'post_format' );
			$taxonomies_objects = get_object_taxonomies( $post_type, 'objects' );

			foreach ( $taxonomies_objects as $tax_obj ) {
				if ( in_array( $tax_obj->name, $exclude_taxonomy, true ) ) {
					continue;
				}

				if ( 'object' === $type ) {
					$post_taxonomies[ $tax_obj->name ] = $tax_obj;
				} else {
					$post_taxonomies[ $tax_obj->name ] = $tax_obj->label;
				}
			}

			return $post_taxonomies;
		}

		/**
		 * Fetch post taxonomy
		 */
		public function get_post_taxonomies() {
			global $current_screen;

			$security = ! empty( $_POST['security'] ) ? sanitize_text_field( wp_unslash( $_POST['security'] ) ) : '';

			if ( ! check_ajax_referer( '_post_taxonomy', 'security' ) ) {

				wp_send_json_error( 'Invalid security token sent.' );
				wp_die();
			}

			// Check if the post type is valid or not, else set default to post.
			$post_type = ! empty( $_POST['post_type'] ) ? sanitize_text_field( wp_unslash( $_POST['post_type'] ) ) : 'post';
			$post_id   = ! empty( $_POST['post_id'] ) ? absint( sanitize_text_field( wp_unslash( $_POST['post_id'] ) ) ) : 0;

			// Fetch all white listed posts.
			$post_types = $this->get_all_posts_types();

			// Whitelist the post type.
			if ( array_key_exists( $post_type, $post_types ) ) {

				// Get all taxonomies of the fiven post types.
				$post_taxonomies = $this->get_post_tax_lists( $post_type );
				if ( ! empty( $_POST['plain'] ) && 'true' === $_POST['plain'] ) {
					wp_send_json_success( $post_taxonomies );
					wp_die();
				} else {

					$data = '';

					if ( 0 < $post_id ) {
						$pf_data    = get_post_meta( $post_id, 'jbid_ssearchify_data', true );
						$taxonomies = $pf_data['post_taxonomies'];

						foreach ( $taxonomies as $key => $taxonomy ) {

							$data     .= '<h3>' . esc_html( $taxonomy['tax_label'] ) . '</h3>';
							$is_enable = ! empty( $taxonomy['is_enable'] ) ? absint( $taxonomy['is_enable'] ) : 0;
							$data     .= '<div class="taxonomy-item">';
							$data     .= '<table class="form-table">';

							$data .= '<tr>';
							$data .= '<th>';
							$data .= '<label for="post_taxonomies[' . $key . '][is_enable]">' . esc_html__( 'Taxonomy', 'smart-searchify' ) . '</label>';
							$data .= '</th>';
							$data .= '<td>';
							$data .= '<input type="checkbox" name="post_taxonomies[' . $key . '][is_enable]" value="1" ' . checked( $is_enable, 1, false ) . ' >';
							$data .= '<input type="hidden" name="post_taxonomies[' . $key . '][tax_name]" value="' . esc_attr( $taxonomy['tax_name'] ) . '">';
							$data .= '<input type="hidden" name="post_taxonomies[' . $key . '][tax_label]" value="' . esc_attr( $taxonomy['tax_label'] ) . '">';
							
							/* translators: %s: The taxonomy label. */
							$data .= esc_html( sprintf( __( 'Enable %s taxonomy?', 'smart-searchify' ), strtolower( $taxonomy['tax_label'] ) ) );
							$data .= '<p class="description">' . __( 'Check this box to enable taxonomy filter on the landing page.', 'smart-searchify' ) . '</p>';
							$data .= '</td>';
							$data .= '</tr>';

							$data .= '<tr>';
							$data .= '<th><label for="post_taxonomies[' . $key . '][tax_render_type]">Rendering View</label></th>';
							$data .= '<td>';
							$data .= '<select name="post_taxonomies[' . $key . '][tax_render_type]" id="post_taxonomies[' . $key . '][tax_render_type]" >';
							$data .= '<option value="select" ' . selected( $taxonomy['tax_render_type'], 'select', false ) . '> Dropdown (Single Select) </option>';
							$data .= '<option value="multi-select" ' . selected( $taxonomy['tax_render_type'], 'multi-select', false ) . '> Dropdown (Multi Select) </option>';
							$data .= '<option value="radio" ' . selected( $taxonomy['tax_render_type'], 'radio', false ) . '> Radio (Single Select) </option>';
							$data .= '<option value="checkbox" ' . selected( $taxonomy['tax_render_type'], 'checkbox', false ) . '> Checkbox (Multi Select) </option>';
							$data .= '</select>';
							$data .= '<p class="description">' . esc_html__( "Select the layout for displaying the taxonomy input filter: choose 'Dropdown', 'Checkbox', 'Radio Button', or 'Multiselect' based on how you want users to interact with the filter.", 'smart-searchify' ) . '</p>';
							$data .= '</td>';
							$data .= '</tr>';

							$data .= '<tr>';
							$data .= '<th><label for="post_taxonomies[' . $key . '][tax_url_slug]" >URL Slug</label></th>';
							$data .= '<td>';
							$data .= '<input type="text" name="post_taxonomies[' . $key . '][tax_url_slug]" value="' . $taxonomy['tax_url_slug'] . '" />';
							$data .= '<p class="description">' . esc_html__( 'Enter a custom slug for the taxonomy URL. By default, the slug used during taxonomy registration will be applied, but you can modify it here if needed.', 'smart-searchify' ) . '</p>';
							$data .= '</td>';
							$data .= '</tr>';

							$data .= '<tr>';
							$data .= '<th><label for="post_taxonomies[' . $key . '][tax_heading]">Heading</label></th>';
							$data .= '<td><input type="text" name="post_taxonomies[' . $key . '][tax_heading]" value="' . $taxonomy['tax_heading'] . '" />';
							$data .= '<p class="description">' . esc_html__( 'Enter the title for the taxonomy. This title will be displayed above the taxonomy filter on the page.', 'smart-searchify' ) . '</p>';
							$data .= '</td>';
							$data .= '</tr>';

							$tax_post_count   = ! empty( $taxonomy['tax_post_count'] ) ? $taxonomy['tax_post_count'] : 0;
							$display_taxonomy = ! empty( $taxonomy['display_taxonomy'] ) ? $taxonomy['display_taxonomy'] : 0;

							$data .= '<tr>';
							$data .= '<th><label for="post_taxonomies[' . $key . '][tax_post_count]">Item Counts</label></th>';
							$data .= '<td>';
							$data .= '<input type="checkbox" name="post_taxonomies[' . $key . '][tax_post_count]" id="post_taxonomies[' . $key . '][tax_post_count]" value="1" ' . checked( '1', $tax_post_count, false ) . ' />Display Item Count';
							$data .= '<p class="description">' . esc_html__( 'Check this box to display the post item count next to each taxonomy term, showing how many item(s) are associated with it.', 'smart-searchify' ) . '</p>';
							$data .= '</td>';
							$data .= '</tr>';

							$data .= '<tr>';
							$data .= '<th><label class="post_taxonomies[' . $key . '][display_taxonomy]">Display Taxonomy Term</label>';
							$data .= '<td>';
							$data .= '<input type="checkbox" name="post_taxonomies[' . $key . '][display_taxonomy]" id="post_taxonomies[' . $key . '][display_taxonomy]" value="1" ' . checked( '1', $display_taxonomy, false ) . ' />Display Taxonomy Terms?';
							$data .= '<p class="description">' . esc_html__( 'Check this box to display the taxonomy term for each post item on the landing page.', 'smart-searchify' ) . '</p>';
							$data .= '</td>';
							$data .= '</tr>';

							$data .= '</table>';
							$data .= '</div>';
						}
					} else {

						$cnt = 0;

						// Create a taxonomy checkbox lists.
						foreach ( $post_taxonomies as $tax_name => $tax_label ) {
							$data .= '<h3>' . esc_html( $tax_label ) . '</h3>';
							$data .= '<div class="taxonomy-item">';
							$data .= '<table class="form-table">';
							$data .= '<tr>';

							$data .= '<th>';
							$data .= '<label for="post_taxonomies[' . $cnt . '][is_enable]">' . esc_html__( 'Taxonomy', 'smart-searchify' ) . '</label>';
							$data .= '</th>';
							$data .= '<td>';
							$data .= '<input type="checkbox" name="post_taxonomies[' . $cnt . '][is_enable]" value="1" >';
							$data .= '<input type="hidden" name="post_taxonomies[' . $cnt . '][tax_name]" value="' . esc_attr( $tax_name ) . '">';
							$data .= '<input type="hidden" name="post_taxonomies[' . $cnt . '][tax_label]" value="' . esc_attr( $tax_label ) . '">';
							
							/* translators: %s: The taxonomy label. */
							$data .= esc_html( sprintf( __( 'Enable %s taxonomy?', 'smart-searchify' ), strtolower( $tax_label ) ) );
							$data .= '<p class="description">' . __( 'Check this box to enable filter on the landing page.', 'smart-searchify' ) . '</p>';
							$data .= '</td>';
							$data .= '</tr>';

							$data .= '<tr>';
							$data .= '<th><label for="post_taxonomies[' . $cnt . '][tax_render_type]">Rendering View<label></th>';
							$data .= '<td><select name="post_taxonomies[' . $cnt . '][tax_render_type]" id="post_taxonomies[' . $cnt . '][tax_render_type]" >';
							$data .= '<option value="select"> Dropdown (Single Select) </option>';
							$data .= '<option value="multi-select"> Dropdown (Multi Select) </option>';
							$data .= '<option value="radio"> Radio (Single Select) </option>';
							$data .= '<option value="checkbox"> Checkbox (Multi Select) </option>';
							$data .= '</select>';
							$data .= '<p class="description">' . esc_html__( "Select the layout for displaying the taxonomy input filter: choose 'Dropdown', 'Checkbox', 'Radio Button', or 'Multiselect' based on how you want users to interact with the filter.", 'smart-searchify' ) . '</p>';
							$data .= '</td>';
							$data .= '</tr>';

							$data .= '<tr>';
							$data .= '<th><label for="post_taxonomies[' . $cnt . '][tax_url_slug]">URL Slug</label></th>';
							$data .= '<td><input type="text" name="post_taxonomies[' . $cnt . '][tax_url_slug]" value="" />';
							$data .= '<p class="description">' . esc_html__( 'Enter a custom slug for the taxonomy URL. By default, the slug used during taxonomy registration will be applied, but you can modify it here if needed.', 'smart-searchify' ) . '</p>';
							$data .= '</td>';
							$data .= '</tr>';

							$data .= '<tr>';
							$data .= '<th><label class="">Heading</label></th>';
							$data .= '<td>';
							$data .= '<input type="text" name="post_taxonomies[' . $cnt . '][tax_heading]" id="post_taxonomies[' . $cnt . '][tax_heading]" value="" />';
							$data .= '<p class="description">' . esc_html__( 'Enter the title for the taxonomy. This title will be displayed above the taxonomy filter on the page.', 'smart-searchify' ) . '</p>';
							$data .= '</td>';
							$data .= '</tr>';

							$data .= '<tr>';
							$data .= '<th><label class="post_taxonomies[' . $cnt . '][tax_post_count]">Post Count</label>';
							$data .= '<td>';
							$data .= '<input type="checkbox" name="post_taxonomies[' . $cnt . '][tax_post_count]" id="post_taxonomies[' . $cnt . '][tax_post_count]" value="1" />Display Post Count?';
							$data .= '<p class="description">' . esc_html__( 'Check this box to display the post count next to each taxonomy term, showing how many posts are associated with it.', 'smart-searchify' ) . '</p>';
							$data .= '</td>';
							$data .= '</tr>';

							$data .= '<tr>';
							$data .= '<th><label class="post_taxonomies[' . $cnt . '][display_taxonomy]">Display Taxonomy Term</label>';
							$data .= '<td>';
							$data .= '<input type="checkbox" name="post_taxonomies[' . $cnt . '][display_taxonomy]" id="post_taxonomies[' . $cnt . '][display_taxonomy]" value="1" />Display Taxonomy Terms?';
							$data .= '<p class="description">' . esc_html__( 'Check this box to display the taxonomy term for each post item on the landing page.', 'smart-searchify' ) . '</p>';
							$data .= '</td>';
							$data .= '</tr>';

							$data .= '</table>';
							$data .= '</div>';

							$cnt++;
						}
					}

					wp_send_json_success( $data );
					wp_die();
				}
			}

		}

		/**
		 * Get and returns the taxonmy terms for a given taxonomy.
		 *
		 * @param string $taxonomy The taxonomy for which the terms to be fetched.
		 */
		public function get_terms_by_tax_slug( $taxonomy ) {

			if ( empty( $taxonomy ) ) {

				// Return empty array.
				return array();

			} else {
				$terms_arg = array(
					'taxonomy'   => sanitize_text_field( $taxonomy ),
					'orderby'    => 'name',
					'order'      => 'DESC',
					'hide_empty' => true,
				);
				$terms     = get_terms( $terms_arg );
				return $terms;
			}

		}

		/**
		 * Fetch the post filter updated shortcode.
		 *
		 * @param int $post_id The Post ID of which the post meta to be fetched.
		 */
		public function get_pf_shortcode( $post_id ) {
			$pf_form_sc = get_post_meta( $post_id, 'jbid_ssearchify_sc', true );
			return $pf_form_sc;
		}

		/**
		 * Fetch the post filter form data saved in DB
		 * to prepopulate it while editing.
		 *
		 * @param int $post_id The Post ID of which the post meta to be fetched.
		 */
		public function get_pf_form_data( $post_id ) {

			$ssearchify_settings = get_post_meta( $post_id, 'jbid_ssearchify_data', true );

			if ( empty( $ssearchify_settings ) ) {
				$ssearchify_settings = array(
					'post_id'          => 0,
					'post_type'        => '-1',
					'post_per_page'    => 10,
					'post_ordering'    => 0,
					'ajax_filtering'   => 1,
					'submit_btn'       => 0,
					'display_author'   => 1,
					'display_excerpt'  => 0,
					'display_readmore' => 0,
					'display_publish_date' => 0,
					'layout_rendering' => 'grid',
					'filters_position' => 'top',
					'tax_operator'     => 'AND',
				);
			}

			return $ssearchify_settings;
		}


		/**
		 * Fetch the taxonomies of the post and its taxony terms and return plain data
		 * or the data in html form.
		 *
		 * @param int   $post_id The post ID.
		 * @param array $sc_tax  An array of shortcode taxonomy settings.
		 */
		public function get_post_taxonomy_terms( $post_id, $sc_tax = array() ) {

			$data = '';

			// _pr( 'sc_tax' );

			if ( isset( $sc_tax['post_taxonomies'] ) ) {
				foreach ( $sc_tax['post_taxonomies'] as $key => $tax_name ) {

					// Only add the taxonomy list if the setting is enabled to display it.
					if ( ! empty( $sc_tax['display_taxonomy'][ $key ] ) ) {
						$post_terms = wp_strip_all_tags( get_the_term_list( $post_id, $tax_name, '', ', ' ) );

						if ( empty( $post_terms ) ) {
							continue;
						}

						$data .= '<p>';
						$data .= '<strong>';
						$data .= esc_html( $sc_tax['tax_heading'][ $key ] );
						$data .= '</strong>';
						$data .= ': ' . $post_terms;
						$data .= '</p>';
					}
				}

			}
			return $data;
		}

		/**
		 * Get and return authors first & last name from author ID.
		 *
		 * @param mixed $user_id The user ID or the user object.
		 */
		public function get_user_fl_name( $user_id = null ) {

			if ( empty( $user_id ) ) {

				// Return nothing.
				return;

			} else {
				$cur_user = new \WP_User( $user_id );
 
				if ( $cur_user->first_name ) {

					if ( $cur_user->last_name ) {
						return $cur_user->first_name . ' ' . $cur_user->last_name;
					}

					return $cur_user->first_name;
				}
			}

		}
	}
}
