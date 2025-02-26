<?php
/**
 * Set and get posts views
 *
 * @link       https://aarambhathemes.com/
 * @since      1.0.0
 *
 * @package    Aarambha_Kits
 * @subpackage Aarambha_Kits/includes/elementor
 * @author     Aarambha Themes <aarambhathemes@gmail.com>
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // If this file is called directly, abort.
}

class Aarambha_Kits_Posts_View {

	/**
	 * Main Instance
	 *
	 * Insures that only one instance of Aarambha_Kits_Posts_View exists in memory at any one
	 * time. Also prevents needing to define globals all over the place.
	 *
	 * @since    1.0.0
	 * @access   public
	 *
	 * @return object
	 */
	public static function instance() {

		// Store the instance locally to avoid private static replication
		static $instance = null;

		// Only run these methods if they haven't been ran previously
		if ( null === $instance ) {
			$instance = new Aarambha_Kits_Posts_View();
		}

		// Always return the instance
		return $instance;
	}

	/**
	 *  Run functionality with hooks
	 *
	 * @since    1.0.0
	 * @access   public
	 *
	 * @return void
	 */
	public function run() {

		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

		add_action( 'wp_head', array( $this, 'track_post_views' ) );

		add_filter(
			'manage_posts_columns',
			function( $defaults ) {
				$defaults['post_views'] = esc_html__( 'Total Views', 'aarambha-kits' );
				return $defaults;
			}
		);
		add_action(
			'manage_posts_custom_column',
			function( $column_name, $postID ) {
				if ( $column_name === 'post_views' ) {
					echo wp_kses_post($this->post_view_display( $postID ));
				}
			},
			5,
			2
		);

	}

	public function track_post_views( $post_id ) {
		if ( ! is_single() ) {
			return;
		}
		if ( empty( $post_id ) ) {
			global $post;
			$post_id = $post->ID;
		}
		$this->post_view_setup( $post_id );
	}

	public function post_view_setup( $postID ) {
		$count_key = 'aarambha_kits_posts_view';
		$count     = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			$count = 0;
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, $count );
		} else {
			$count++;
			update_post_meta( $postID, $count_key, $count );
		}
	}

	public function post_view_display( $postID ) {
		$count_key = 'aarambha_kits_posts_view';
		$count     = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			$count = 0;
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, $count );
			return sprintf( __( '<span class="post-views">%s Views</span>', 'aarambha-kits' ), absint($count) );
		} else {
			return sprintf( __( '<span class="post-views">%s Views</span>', 'aarambha-kits' ), absint($count) );
		}
	}
}

/**
 * Create Instance for Aarambha_Kits_Posts_View
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 *
 * @return object
 */
if ( ! function_exists( 'aarambha_kits_posts_view' ) ) {

	function aarambha_kits_posts_view() {

		return Aarambha_Kits_Posts_View::instance();
	}

	aarambha_kits_posts_view()->run();
}
