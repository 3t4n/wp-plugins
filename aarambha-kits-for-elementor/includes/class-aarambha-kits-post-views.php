<?php

/**
 * Post Views
 *
 * @link       https://aarambhathemes.com/
 * @since      1.0.0
 *
 * @package    Aarambha_Kits
 * @subpackage Aarambha_Kits/includes
 */

 /**
  * class for post views
  *
  * @access public
  */
class Aarambha_Kits_Post_Views {

	/**
	 * Instance
	 *
	 * @access private
	 * @var object
	 */
	private static $instance;

	/**
	 * Returns the instance.
	 *
	 * @access public
	 * @return object
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor method.
	 *
	 * @access private
	 * @return void
	 */
	private function __construct() {

		// To keep the count accurate, lets get rid of prefetching
		remove_action( 'wp_head', array( $this, 'adjacent_posts_rel_link_wp_head' ), 10, 0 );

		// Add action to track post
		add_action( 'wp_head', array( $this, 'track_post_views' ), 10, 1 );

		add_action( 'manage_posts_custom_column', array( $this, 'columns_value' ), 10, 2 );

		// add the filter
		add_filter( 'manage_posts_columns', array( $this, 'manage_posts_columns' ), 10, 2 );

	}

	public function track_post_views( $post_id ) {
		if ( ! is_single() ) {
			return;
		}
		if ( empty( $post_id ) ) {
			global $post;
			$post_id = $post->ID;
		}
		$this->post_views_setup( $post_id );
	}

	public function columns_value( $column_name, $postID ) {
		if ( $column_name === 'post_views' ) {
			echo wp_kses_post($this->post_views_display( $postID ));
		}
	}

	public function manage_posts_columns( $defaults ) {
		$defaults['post_views'] = esc_html__( 'Total Views', 'aarambha-kits' );
		return $defaults;
	}

	public function post_views_setup( $postID ) {
		$count_key = 'aarambha_kits_total_views';
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

	public function post_views_display( $postID ) {
		$count_key = 'aarambha_kits_total_views';
		$count     = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			$count = 0;
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, $count );
			return sprintf( __( '<span class="views-count">%s Views</span>', 'aarambha-kits' ), absint($count) );
		} else {
			return sprintf( __( '<span class="views-count">%s Views</span>', 'aarambha-kits' ), absint($count) );
		}
	}
}

Aarambha_Kits_Post_Views::get_instance();
