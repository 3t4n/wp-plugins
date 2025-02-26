<?php
/**
 * Exclsive Blocks Helper.
 *
 * @package Exclsive Blocks
 */
namespace ShopCred;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Helper' ) ) {

	/**
	 * Class Helper.
	 */
	final class Helper {

		/**
		 * Member Variable
		 *
		 * @since 1.0.0
		 * @var instance
		 */
		private static $instance;

		/**
		 *  Initiator
		 *
		 * @since 1.0.0
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Returns Query.
		 *
		 * @param array  $attributes The block attributes.
		 * @param string $block_type The Block Type.
		 * @since 1.0.0
		 */
		public static function get_query( $attributes, $block_type ) {

			// Block type is grid/masonry/carousel/timeline.
			$query_args = array(
				'posts_per_page'      => ( isset( $attributes['postsToShow'] ) ) ? $attributes['postsToShow'] : 6,
				'post_status'         => 'publish',
				'post_type'           => ( isset( $attributes['postType'] ) ) ? $attributes['postType'] : 'product',
				'order'               => ( isset( $attributes['order'] ) ) ? $attributes['order'] : 'desc',
				'orderby'             => ( isset( $attributes['orderBy'] ) ) ? $attributes['orderBy'] : 'date',
				'ignore_sticky_posts' => 1,
				'paged'               => 1,
			);

			if ( isset($attributes['excludeCurrentPost']) && $attributes['excludeCurrentPost'] ) {
				$query_args['post__not_in'] = array( get_the_ID() );
			}

			if ( isset( $attributes['categories'] ) && '' !== $attributes['categories'] ) {
				$query_args['tax_query'][] = array(
					'taxonomy' => ( isset( $attributes['taxonomyType'] ) ) ? $attributes['taxonomyType'] : 'product_cat',
					'field'    => 'id',
					'terms'    => $attributes['categories'],
					'operator' => 'IN',
				);
			}

			if ( 'grid' === $block_type && isset( $attributes['displayProductPagination'] ) && true === $attributes['displayProductPagination'] ) {

				if ( get_query_var( 'paged' ) ) {

					$paged = get_query_var( 'paged' );

				} elseif ( get_query_var( 'page' ) ) {

					$paged = get_query_var( 'page' );

				} else {

					$paged = 1;

				}
				$query_args['posts_per_page'] = $attributes['postsToShow'];
				$query_args['paged']          = $paged;

			}	

			if ( 'grid' === $block_type && isset( $attributes['loadMoreProduct'] ) && true === $attributes['loadMoreProduct'] && isset( $attributes['paged'] ) ) {

				if ( get_query_var( 'paged' ) ) {

					$paged = get_query_var( 'paged' );
					$query_args['paged']  = $paged;
					$query_args['posts_per_page'] = $attributes['postsToShow'];
					$query_args['paged']          = $paged;
					$query_args['offset'] = (int)$attributes['offset'] + ( ( (int)$paged - 1 ) * (int)$attributes['postsToShow'] );

				} elseif ( get_query_var( 'page' ) ) {

					$paged = get_query_var( 'page' );
					$query_args['paged']  = $paged;
					$query_args['posts_per_page'] = $attributes['postsToShow'];
					$query_args['paged']          = $paged;
					$query_args['offset'] = (int)$attributes['offset'] + ( ( (int)$paged - 1 ) * (int)$attributes['postsToShow'] );

				} else {
					$paged = $attributes['paged'];
					$query_args['paged']  = $paged;
					$query_args['posts_per_page'] = $attributes['postsToShow'];
					$query_args['paged']          = $paged;
					$query_args['offset'] = (int)$attributes['offset'] + ( ( (int)$paged - 1 ) * (int)$attributes['postsToShow'] );
					
				}
			
				
			}

			if ( 'masonry' === $block_type && isset( $attributes['paginationType'] ) && 'none' !== $attributes['paginationType'] && isset( $attributes['paged'] ) ) {

				$query_args['paged'] = $attributes['paged'];

			}
	
			$query_args = apply_filters( "spc_post_query_args_{$block_type}", $query_args, $attributes );

			return new \WP_Query( $query_args );
		}

		/**
		 * Get Post Types.
		 *
		 * @since 1.0.0
		 * @access public
		 */
		public static function get_post_types() {

			$post_types = get_post_types(
				array(
					'public'       => true,
					'show_in_rest' => true,
				),
				'objects'
			);

			$options = array();

			foreach ( $post_types as $post_type ) {
				// if ( 'product' === $post_type->name ) {
				// 	continue;
				// }

				if ( 'attachment' === $post_type->name ) {
					continue;
				}

				$options[] = array(
					'value' => $post_type->name,
					'label' => $post_type->label,
				);
			}

			return apply_filters( 'spc_loop_post_types', $options );
		}

		/**
		 * Get all taxonomies.
		 *
		 * @since 1.0.0
		 * @access public
		 */
		public static function get_related_taxonomy() {

			$post_types = self::get_post_types();

			$return_array = array();

			foreach ( $post_types as $key => $value ) {
				$post_type = $value['value'];

				$taxonomies = get_object_taxonomies( $post_type, 'objects' );
				$data       = array();

				foreach ( $taxonomies as $tax_slug => $tax ) {
					if ( ! $tax->public || ! $tax->show_ui || ! $tax->show_in_rest ) {
						continue;
					}

					$data[ $tax_slug ] = $tax;

					$terms = get_terms( $tax_slug );

					$related_tax = array();

					if ( ! empty( $terms ) ) {
						foreach ( $terms as $t_index => $t_obj ) {
							$related_tax[] = array(
								'id'    => $t_obj->term_id,
								'name'  => $t_obj->name,
								'child' => get_term_children( $t_obj->term_id, $tax_slug ),
							);
						}
						$return_array[ $post_type ]['terms'][ $tax_slug ] = $related_tax;
					}
				}

				$return_array[ $post_type ]['taxonomy'] = $data;

			}

			return apply_filters( 'spc_post_loop_taxonomies', $return_array );
		}

		/**
		 * Taxonomoy Data List.
		 * 
		 * @since 1.0.0
		 * @param STRING | Taxonomy Name
		 * @return ARRAY | Taxonomy Slug and Name as a ARRAY
		 */
		public static function filter_taxonomy_list() {
			$terms_name = '';
			$prams = 'product_cat';
			$terms = get_terms( $prams, array(
				'hide_empty' => true,
			));

			if( !empty($terms) ){
				$terms_name .= '<li class="spc-ajax-filter-item filter-item current"  data-filter="*">'. esc_html__( "All" ) . '</li>';
				foreach ($terms as $val) {
					// $terms_name .= $val->name;
					$terms_name .= '<li class="spc-ajax-filter-item filter-item" data-filter=".'. esc_attr( $val->slug ) .'"><span class="' . esc_attr( $val->slug ) .'">' .  esc_html( $val->name ) . '</span><span class="cat-count">' .  esc_html( $val->count ) . '</span></li>' ;
				}
			}
			return $terms_name;
		}

		/**
		 * Tag List Data List.
		 * 
		 * @since 1.0.0
		 * @param STRING | Tag Name
		 * @return ARRAY | Tag Slug and Name as a ARRAY
		 */
		public static function filter_tags_list() {
			$terms_name = '';
			$prams = 'product_tag';
			$terms = get_terms( $prams, array(
				'hide_empty' => true,
			));

			if( !empty($terms) ){
				$terms_name .= '<li class="filter-item current"  data-filter="*">'. esc_html__( "All" ) . '</li>';
				foreach ($terms as $val) {
					// $terms_name .= $val->name;
					$terms_name .= '<li class="filter-item" data-filter=".'. esc_attr( $val->slug ) .'"><span class="' . esc_attr( $val->slug ) .'">' .  esc_html( $val->name ) . '</span><span class="cat-count">' .  esc_html( $val->count ) . '</span></li>' ;
				}
			}
			return $terms_name;
		}

		/**
		 * Get all taxonomies list.
		 *
		 * @since 1.0.0
		 * @access public
		 */
		public static function get_taxonomy_list() {

			$post_types = self::get_post_types();

			$return_array = array();

			foreach ( $post_types as $key => $value ) {
				$post_type = $value['value'];

				$taxonomies = get_object_taxonomies( $post_type, 'objects' );
				$data       = array();

				$get_singular_name = get_post_type_object( $post_type );
				foreach ( $taxonomies as $tax_slug => $tax ) {
					if ( ! $tax->public || ! $tax->show_ui || ! $tax->show_in_rest ) {
						continue;
					}

					$data[ $tax_slug ] = $tax;

					$terms = get_terms( $tax_slug );

					$related_tax_terms = array();

					if ( ! empty( $terms ) ) {
						foreach ( $terms as $t_index => $t_obj ) {
							$related_tax_terms[] = array(
								'id'            => $t_obj->term_id,
								'name'          => $t_obj->name,
								'count'         => $t_obj->count,
								'link'          => get_term_link( $t_obj->term_id ),
								'singular_name' => $get_singular_name->labels->singular_name,
								'slug' 			=> $t_obj->slug,
							);
						}

						$return_array[ $post_type ]['terms'][ $tax_slug ] = $related_tax_terms;
					}

					$newcategoriesList = get_terms(
						$tax_slug,
						array(
							'hide_empty' => true,
							'parent'     => 0,
						)
					);

					$related_tax = array();

					if ( ! empty( $newcategoriesList ) ) {
						foreach ( $newcategoriesList as $t_index => $t_obj ) {
							$child_arg     = array(
								'hide_empty' => true,
								'parent'     => $t_obj->term_id,
							);
							$child_cat     = get_terms( $tax_slug, $child_arg );
							$child_cat_arr = $child_cat ? $child_cat : null;
							$related_tax[] = array(
								'id'            => $t_obj->term_id,
								'name'          => $t_obj->name,
								'count'         => $t_obj->count,
								'link'          => get_term_link( $t_obj->term_id ),
								'singular_name' => $get_singular_name->labels->singular_name,
								'children'      => $child_cat_arr,
								'slug' 			=> $t_obj->slug,
							);

						}

						$return_array[ $post_type ]['without_empty_taxonomy'][ $tax_slug ] = $related_tax;

					}

					$newcategoriesList_empty_tax = get_terms(
						$tax_slug,
						array(
							'hide_empty' => false,
							'parent'     => 0,
						)
					);

					$related_tax_empty_tax = array();

					if ( ! empty( $newcategoriesList_empty_tax ) ) {
						foreach ( $newcategoriesList_empty_tax as $t_index => $t_obj ) {
							$child_arg_empty_tax     = array(
								'hide_empty' => false,
								'parent'     => $t_obj->term_id,
							);
							$child_cat_empty_tax     = get_terms( $tax_slug, $child_arg_empty_tax );
							$child_cat_empty_tax_arr = $child_cat_empty_tax ? $child_cat_empty_tax : null;
							$related_tax_empty_tax[] = array(
								'id'            => $t_obj->term_id,
								'name'          => $t_obj->name,
								'count'         => $t_obj->count,
								'link'          => get_term_link( $t_obj->term_id ),
								'singular_name' => $get_singular_name->labels->singular_name,
								'children'      => $child_cat_empty_tax_arr,
								'slug' 			=> $t_obj->slug,
							);
						}

						$return_array[ $post_type ]['with_empty_taxonomy'][ $tax_slug ] = $related_tax_empty_tax;

					}
				}
				$return_array[ $post_type ]['taxonomy'] = $data;

			}

			return apply_filters( 'spc_taxonomies_list', $return_array );
		}

		
		/**
		 * Gives the paged Query var.
		 *
		 * @param Object $query Query.
		 * @return int $paged Paged Query var.
		 * @since 1.0.0
		 */
		public static function get_paged( $query ) {

			global $paged;

			// Check the 'paged' query var.
			$paged_qv = $query->get( 'paged' );

			if ( is_numeric( $paged_qv ) ) {
				return $paged_qv;
			}

			// Check the 'page' query var.
			$page_qv = $query->get( 'page' );

			if ( is_numeric( $page_qv ) ) {
				return $page_qv;
			}

			// Check the $paged global?
			if ( is_numeric( $paged ) ) {
				return $paged;
			}

			return 0;
		}

		/** 
		 * Check if Excluisve Shop is enabled
		 */
		public static function is_shopcred() {
            if ( function_exists( 'is_shop' ) && is_shop() && ( get_option( 'shopcred-pro-settings' ) != null && get_option( 'shopcred-pro-settings' )['enable_spc_shop_page_template']) ) {
                return true;
            }
            return false;
        }

		/**
		 * Builds the base url.
		 *
		 * @param string $permalink_structure Premalink Structure.
		 * @param string $base Base.
		 * @since 1.0.0
		 */
		public static function build_base_url( $permalink_structure, $base ) {
			// Check to see if we are using pretty permalinks.
			if ( ! empty( $permalink_structure ) ) {

				if ( strrpos( $base, 'paged-' ) ) {
					$base = substr_replace( $base, '', strrpos( $base, 'paged-' ), strlen( $base ) );
				}

				// Remove query string from base URL since paginate_links() adds it automatically.
				// This should also fix the WPML pagination issue that was added since 1.10.2.
				if ( count( $_GET ) > 0 ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
					$base = strtok( $base, '?' );
				}

				// Add trailing slash when necessary.
				if ( '/' === substr( $permalink_structure, -1 ) ) {
					$base = trailingslashit( $base );
				} else {
					$base = untrailingslashit( $base );
				}
			} else {
				$url_params = wp_parse_url( $base, PHP_URL_QUERY );

				if ( empty( $url_params ) ) {
					$base = trailingslashit( $base );
				}
			}

			return $base;
		}

        /**
		 * Get size information for all currently-registered image sizes.
		 *
		 * @global $_wp_additional_image_sizes
		 * @uses   get_intermediate_image_sizes()
		 * @link   https://codex.wordpress.org/Function_Reference/get_intermediate_image_sizes
		 * @since  1.0.0
		 * @return array $sizes Data for all currently-registered image sizes.
		 */
		public static function get_image_sizes() {

			global $_wp_additional_image_sizes;

			$sizes       = get_intermediate_image_sizes();
			$image_sizes = array();

			$image_sizes[] = array(
				'value' => 'full',
				'label' => esc_html__( 'Full', 'shopcred' ),
			);

			foreach ( $sizes as $size ) {
				if ( in_array( $size, array( 'thumbnail', 'medium', 'medium_large', 'large' ), true ) ) {
					$image_sizes[] = array(
						'value' => $size,
						'label' => ucwords( trim( str_replace( array( '-', '_' ), array( ' ', ' ' ), $size ) ) ),
					);
				} else {
					$image_sizes[] = array(
						'value' => $size,
						'label' => sprintf(
							'%1$s (%2$sx%3$s)',
							ucwords( trim( str_replace( array( '-', '_' ), array( ' ', ' ' ), $size ) ) ),
							$_wp_additional_image_sizes[ $size ]['width'],
							$_wp_additional_image_sizes[ $size ]['height']
						),
					);
				}
			}

			$image_sizes = apply_filters( 'spc_post_featured_image_sizes', $image_sizes );

			return $image_sizes;
		}


		/**
		 * Returns the Paged Format.
		 *
		 * @param string $permalink_structure Premalink Structure.
		 * @param string $base Base.
		 * @since 1.0.0
		 */
		public static function paged_format( $permalink_structure, $base ) {

			$page_prefix = empty( $permalink_structure ) ? 'paged' : 'page';

			if ( ! empty( $permalink_structure ) ) {
				$format  = substr( $base, -1 ) !== '/' ? '/' : '';
				$format .= $page_prefix . '/';
				$format .= '%#%';
				$format .= substr( $permalink_structure, -1 ) === '/' ? '/' : '';
			} elseif ( empty( $permalink_structure ) || is_search() ) {
				$parse_url = wp_parse_url( $base, PHP_URL_QUERY );
				$format    = empty( $parse_url ) ? '?' : '&';
				$format   .= $page_prefix . '=%#%';
			}

			return $format;
		}


		/**
		 * Best Selling Product Raw Query
		 * 
		 * @since 1.1.0
		 * @return ARRAY | Return Best Selling Products
		 */
		public static function get_best_selling_products($date) {
			global $wpdb;
			return (array) $wpdb->get_results("
				SELECT p.ID as id, COUNT(oim2.meta_value) as count
				FROM {$wpdb->prefix}posts p
				INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta oim
					ON p.ID = oim.meta_value
				INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta oim2
					ON oim.order_item_id = oim2.order_item_id
				INNER JOIN {$wpdb->prefix}woocommerce_order_items oi
					ON oim.order_item_id = oi.order_item_id
				INNER JOIN {$wpdb->prefix}posts as o
					ON o.ID = oi.order_id
				WHERE p.post_type = 'product'
				AND p.post_status = 'publish'
				AND o.post_status IN ('wc-processing','wc-completed')
				AND o.post_date >= '$date'
				AND oim.meta_key = '_product_id'
				AND oim2.meta_key = '_qty'
				GROUP BY p.ID
				ORDER BY COUNT(oim2.meta_value) + 0 DESC
			");
		}

		/**
		 * Products terms id
		 * 
		 * @since 1.1.0
		 * @return ARRAY | Return Products terms id
		 */
		public static function get_terms_id($id, $type) {
			$data = array();
			$arr = get_the_terms($id, $type);
			if (is_array($arr)) {
				foreach ($arr as $key => $val) {
					$data[] = $val->term_id;
				}
			}
			return $data;
		}

		public static function get_shopcred_addons_status()
		{
			if (!in_array( 'shopcred-addons/shopcred-addons.php', apply_filters( 'active_plugins', get_option( 'active_plugins' )))) {	
				// Considering not installed or not activated
				return array(
					"status" => 0,
					"msg" => "Not installed",
					"site_url" => "https://wpshopcred.com/"
				);
			}

			return array(
				"status" => 1,
				"msg" => "Installed",
				"site_url" => get_site_url()."/wp-admin/admin.php?page=spca-settings"
			);
		}
			
	}

	/**
	 *  Prepare if class 'Helper' exist.
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Helper::get_instance();
}
