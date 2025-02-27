<?php
/*
Version: 1.0.0
Author:Creative pig
Author URI: www.creativepig.net
*/
class Setting {
	private $plugin_name;
	

	public function __construct( $plugin_name ) {

		$this->plugin_name = $plugin_name;
			}

	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name . 'owl-carousel_css', LOGO_URL . '/classes/assets/css/client_css.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( $this->plugin_name . 'owl-carousel_css1', LOGO_URL . '/classes/assets/css/owl.carousel.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( $this->plugin_name . 'font-awesome', LOGO_URL . '/classes/assets/css/font-awesome.min.css', array(), '1.0.0', 'all' );
	



	}
	

	public function enqueue_scripts() {
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( $this->plugin_name . 'carousel-owl', LOGO_URL . '/classes/assets/js/owl.carousel.min.js', '','',false );
		wp_enqueue_script( $this->plugin_name . '.modernizr.custom', LOGO_URL . '/classes/assets/js/modernizr.custom.js', '','',false );
		wp_enqueue_script( $this->plugin_name . '.bootstrap_min', LOGO_URL . '/classes/assets/js/bootstrap.min.js', '','',false );
	
	
			
		

	}
	
	public function custom_post_types(){

		// Register Client Post Type
		$labels = array(
			'name'               => _x( 'Client Carousel', 'post type general name', 'cp' ),
			'singular_name'      => _x( 'Client Carousel', 'post type singular name', 'cp' ),
			'menu_name'          => _x( 'Client Carousel', 'admin menu', 'cp' ),
			'name_admin_bar'     => _x( 'Client Carousel', 'add new on admin bar', 'cp' ),
			'add_new'            => _x( 'Add Client Carousel', LOGO_CAROUSEL, 'cp' ),
			'add_new_item'       => __( 'Add Client Carousel', 'cp' ),
			'new_item'           => __( 'New Client Carousel', 'cp' ),
			'edit_item'          => __( 'Edit Client Carousel', 'cp' ),
			'view_item'          => __( 'View Client Carousel', 'cp' ),
			'all_items'          => __( 'All Client Carousel', 'cp' ),
			'search_items'       => __( 'Search Client Carousel', 'cp' ),
			'parent_item_colon'  => __( 'Parent Client Carousel:', 'cp' ),
			'not_found'          => __( 'No npcl found.', 'cp' ),
			'not_found_in_trash' => __( 'No npcl found in Trash.', 'cp' )
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => false,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_icon'          => 'dashicons-format-image',
			'supports'           => array( 'title', 'thumnail' )
			
			);

		register_post_type( LOGO_CAROUSEL, $args );

	}
	
}
