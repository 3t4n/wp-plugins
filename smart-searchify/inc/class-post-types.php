<?php
/**
 * Define plugin specific custom post types and custom taxonomies.
 *
 * @package Jbid
 */

namespace Jbid\Post_Filter;

if ( ! class_exists( 'Jbid\Post_Filter\Post_Types' ) ) {

	/**
	 * A class for defining common helpers.
	 */
	class Post_Types {


		/**
		 * var $helpers
		 */
		private $helpers;

		/**
		 * Main class constructor.
		 *
		 * @param object $helpers The helper class object.
		 */
		public function __construct( $helpers ) {
			$this->helpers = $helpers;
		}

		/**
		 * Add/Call action/filter hook as required.
		 */
		public function init() {

			// Register a CPT.
			add_action( 'init', array( $this, 'register_custom_posts' ) );
			add_action( 'add_meta_boxes', array( $this, 'custom_fields_meta_box' ) );
			add_action( 'save_post_jbid_smart_searchify', array( $this, 'save_ssearchify_metabox' ), 10, 3 );
			add_action( 'manage_jbid_smart_searchify_posts_columns', array( $this, 'update_ssearchify_posts_columns' ), 10, 1 );
			add_action( 'manage_jbid_smart_searchify_posts_custom_column', array( $this, 'ssearchify_custom_column_values' ), 10, 2 );
		}


		/**
		 * Add custom columns for the jbid_post_filter post types.
		 *
		 * @param array $columns An array of default columns list.
		 */
		public function update_ssearchify_posts_columns( $columns ) {
			$new_columns['cb']                 = $columns['cb'];
			$new_columns['title']              = $columns['title'];
			$new_columns['jbid_ssearchify_sc'] = esc_html__( 'Searchify Shortcode','smart-searchify' );
			$new_columns['date']               = $columns['date'];

			return $new_columns;
		}


		/**
		 * Add a custom admin column values for a custom post.
		 *
		 * @param string $column  The column name.
		 * @param int    $post_id The Post ID.
		 */
		public function ssearchify_custom_column_values( $column, $post_id ) {
			switch ( $column ) {
				case 'jbid_ssearchify_sc':
					echo esc_html( get_post_meta( $post_id, 'jbid_ssearchify_sc', true ) );
					break;
				default:
					break;

			}
		}

		/**
		 * Gereate smart searchify shortcode on saving smart searchify post.
		 *
		 * @param array   $post_data An array of post data.
		 * @param boolean $atts     Whether to return a atts array.
		 */
		public function create_smart_searchify_sc_atts( $post_data = array(), $atts = false ) {

			if ( empty( $post_data ) ) {
				return;
			}

			$_atts = array();

			$_shortcode_id = absint( $post_data['id'] );

			$pf_shortcode = '[jbid_smart_searchify id="' . $_shortcode_id . '"]';

			$valid_post_types = $this->helpers->get_all_posts_types();
			$_atts['id']      = $_shortcode_id;
			$post_type        = (
				(
				! empty( $post_data['post_type'] )
				&& array_key_exists( $post_data['post_type'], $valid_post_types )
				) ?
				sanitize_text_field( $post_data['post_type'] ) :
				'post'
			);

			$_atts['post_type'] = $post_type;

			$_atts['post_ordering']    = $post_data['post_ordering'];
			$_atts['post_per_page']    = $post_data['post_per_page'];
			$_atts['ajax_filtering']   = $post_data['ajax_filtering'];
			$_atts['submit_btn']       = $post_data['submit_btn'];
			$_atts['layout_rendering'] = $post_data['layout_rendering'];
			$_atts['filters_position'] = $post_data['filters_position'];
			$_atts['display_author']   = $post_data['display_author'];
			$_atts['display_excerpt']  = $post_data['display_excerpt'];
			$_atts['display_readmore'] = $post_data['display_readmore'];
			$_atts['display_publish_date'] = $post_data['display_publish_date'];

			// Add taxonomies only if the post filtering is enabled.
			$post_taxonomies = $post_data['post_taxonomies'];

			$tax_lists        = array();
			$tax_render_type  = array();
			$tax_heading      = array();
			$tax_url_slug     = array();
			$tax_post_count   = array();
			$display_taxonomy = array();

			foreach ( $post_taxonomies as $key => $post_tax ) {

				if ( empty( $post_tax['is_enable'] ) ) {
					continue;
				}

				$tax_lists[]       = sanitize_text_field( $post_tax['tax_name'] );
				$tax_render_type[] = ! empty( $post_tax['tax_render_type'] ) ? sanitize_text_field( $post_tax['tax_render_type'] ) : 'select';
				$tax_heading[]     = ! empty( $post_tax['tax_heading'] ) ? sanitize_text_field( $post_tax['tax_heading'] ) : $post_tax['tax_label'];

				if ( ! empty( $post_tax['tax_url_slug'] ) ) {
					$_custom_tax_slug = str_replace(
						' ',
						'-',
						strtolower(
							sanitize_text_field(
								trim( $post_tax['tax_url_slug'] )
							)
						)
					);

					$tax_url_slug[] = $_custom_tax_slug;
				}

				$tax_post_count[]   = ! empty( $post_tax['tax_post_count'] ) ? 1 : 0;
				$display_taxonomy[] = ! empty( $post_tax['display_taxonomy'] ) ? 1 : 0;
			}

			$tax_lists        = implode( ',', $tax_lists );
			$tax_render_type  = implode( ',', $tax_render_type );
			$tax_heading      = implode( ',', $tax_heading );
			$tax_url_slug     = implode( ',', $tax_url_slug );
			$tax_post_count   = implode( ',', $tax_post_count );
			$display_taxonomy = implode( ',', $display_taxonomy );

			$_atts['taxonomy']         = $tax_lists;
			$_atts['tax_render_type']  = $tax_render_type;
			$_atts['tax_heading']      = $tax_heading;
			$_atts['tax_url_slug']     = $tax_url_slug;
			$_atts['tax_post_count']   = $tax_post_count;
			$_atts['display_taxonomy'] = $display_taxonomy;

			if ( $atts ) {
				return $_atts;
			} else {
				return $pf_shortcode;
			}

		}

		/**
		 * Save custom fields of smart searchify posts.-+
		 *
		 * @param int    $post_id  The Post ID.
		 * @param object $post     The post object.
		 * @param bool   $update   If the post is updated or saved.
		 */
		public function save_ssearchify_metabox( $post_id, $post, $update ) {

			$_post = $_POST; // phpcs:ignore

			// Verify nonce.
			$__nounce = ! empty( $_post['_jbid_ss_nonce'] ) ? sanitize_text_field( wp_unslash( $_post['_jbid_ss_nonce'] ) ) : '';

			if ( ! wp_verify_nonce( $__nounce, 'smart_searchify_sc_filter' )
			) {
				return;
			}

			// Bail out if this is an autosave.
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}

			// Check if the user has permission to edit this post.
			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}

			$post_filter_data = array();
			if ( ! empty( $_POST['post_filter_type'] ) ) {
				$post_filter_data = array(
					'id'               => $post_id,
					'post_type'        => ( ! empty( $_post['post_filter_type'] ) ) ? sanitize_text_field( wp_unslash( $_POST['post_filter_type'] ) ) : 'post',
					'post_per_page'    => ( ! empty( $_post['post_per_page'] ) ) ? intval( $_post['post_per_page'] ) : 10,
					'post_ordering'    => ( ! empty( $_post['post_ordering'] ) ) ? intval( $_post['post_ordering'] ) : 0,
					'ajax_filtering'   => ( ! empty( $_post['ajax_filtering'] ) ) ? intval( $_post['ajax_filtering'] ) : 0,
					'submit_btn'       => ( ! empty( $_post['submit_btn'] ) ) ? intval( $_post['submit_btn'] ) : 0,
					'display_author'   => ( ! empty( $_post['display_author'] ) ) ? intval( $_post['display_author'] ) : 0,
					'display_excerpt'  => ( ! empty( $_post['display_excerpt'] ) ) ? intval( $_post['display_excerpt'] ) : 0,
					'display_readmore' => ( ! empty( $_post['display_readmore'] ) ) ? intval( $_post['display_readmore'] ) : 0,
					'display_publish_date' => ( ! empty( $_post['display_publish_date'] ) ) ? intval( $_post['display_publish_date'] ) : 0,
					'layout_rendering' => ( ! empty( $_post['layout_rendering'] ) ) ? sanitize_text_field( wp_unslash( $_post['layout_rendering'] ) ) : 'grid',
					'filters_position' => ( ! empty( $_post['filters_position'] ) ) ? sanitize_text_field( wp_unslash( $_post['filters_position'] ) ) : 'top',
					'post_taxonomies'  => ( ! empty( $_post['post_taxonomies'] ) ) ? wp_unslash( $_post['post_taxonomies'] ) : array(), // @todo Find a better way to sanitize an array.
				);
			}

			// Get and save the shortcode.
			$post_filter_sc       = $this->create_smart_searchify_sc_atts( $post_filter_data );
			$jbid_ssearchify_atts = $this->create_smart_searchify_sc_atts( $post_filter_data, true );

			update_post_meta( $post_id, 'jbid_ssearchify_sc', $post_filter_sc );
			update_post_meta( $post_id, 'jbid_ssearchify_atts', $jbid_ssearchify_atts );
			update_post_meta( $post_id, 'jbid_ssearchify_data', $post_filter_data );

		}

		/**
		 *  Register custom posts for creating a shortcode.
		 */
		public function register_custom_posts() {
			$args = array(
				'labels'              => array(
					'name'          => esc_html__( 'Searchify Shortcodes','smart-searchify' ),
					'singular_name' => esc_html__( 'Searchify Shortcode','smart-searchify' ),
					'all_items'     => esc_html__( 'All Shortcodes','smart-searchify' ),
					'add_new_item'  => esc_html__( 'Add New','smart-searchify' ),
					'edit_item'     => esc_html__( 'Edit','smart-searchify' ),
					'view_item'     => esc_html__( 'View','smart-searchify' ),
				),
				'public'              => false,
				'has_archive'         => false,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => false,
				'capability_type'     => 'post',
				'supports'            => array( 'title' ),
				'exclude_from_search' => true,
				'menu_position'       => 80,
				'menu_icon'           => 'dashicons-filter',
			);

			register_post_type( 'jbid_smart_searchify', $args );

		}

		/**
		 * Add a meta box for holding custom fields.
		 */
		public function custom_fields_meta_box() {
			add_meta_box(
				'post_filter_shortcode',
				'Shortcode Inputs',
				array( $this, 'add_meta_box_input_fields' ),
				'jbid_smart_searchify',
				'normal',
				'high'
			);
		}

		/**
		 * Add input fields required for generating post filter shortcodes.
		 */
		public function add_meta_box_input_fields() {
			global $post;
			$screen = get_current_screen();

			$all_posts_types = $this->helpers->get_all_posts_types();
			$pf_shortcode    = $this->helpers->get_pf_shortcode( $post->ID );
			$form_data       = $this->helpers->get_pf_form_data( $post->ID );

			if ( ! empty( $pf_shortcode ) ) {
				echo '<div class="shortcode">Copy this shortcode and paste it into your post, page, or text widget content:</div><div id="current-pf-shortcode" class="pf-shortcode-wrap">' . esc_html( $pf_shortcode ) . '</div>';
			}

			include_once JBIPF_DIR_PATH . 'tpls/post-filter-form.php';
		}


	}
}
