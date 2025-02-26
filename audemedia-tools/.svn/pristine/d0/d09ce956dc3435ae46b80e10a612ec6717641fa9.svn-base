<?php
class Slider_Post_Type {

        function __construct() {
	    

		// Thumbnail support for Slider posts
		add_theme_support( 'post-thumbnails', array( 'Slider' ) );
		
		// Give the Slider menu item a unique icon
		add_action( 'admin_head', array( &$this, 'Slider_icon' ) );


	}
	
public static function Slider_init() {



	$labels = array(
			'name' => __( 'Slider', 'sliderposttype' ),
			'singular_name' => __( 'Slider Item', 'sliderposttype' ),
			'add_new' => __( 'Add New Item', 'sliderposttype' ),
			'add_new_item' => __( 'Add New Slider Item', 'sliderposttype' ),
			'edit_item' => __( 'Edit Slider Item', 'sliderposttype' ),
			'new_item' => __( 'Add New Slider Item', 'sliderposttype' ),
			'view_item' => __( 'View Item', 'sliderposttype' ),
			'search_items' => __( 'Search Slider', 'sliderposttype' ),
			'not_found' => __( 'No Slider items found', 'sliderposttype' ),
			'not_found_in_trash' => __( 'No Slider items found in trash', 'sliderposttype' )
		);
		
		$args = array(
	    'labels' => $labels,
	    'public' => true,
			'supports' => array( 'title', 'thumbnail'),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "slider"), // Permalinks format
			'menu_position' => 15,
			'has_archive' =>true,
			'exclude_from_search' => true
		);
		
		$args = apply_filters('sliderposttype_args', $args);
		if( current_theme_supports( 'audemedia_slider_cpt' ) ) {
		register_post_type( 'Slider', $args );
	}

		flush_rewrite_rules();
		
	}
	 
function Slider_icon() { ?>
	    <style type="text/css" media="screen">
	        #menu-posts-slider .wp-menu-image {
	            background: url(<?php echo plugin_dir_url( __FILE__ ); ?>images/slider-icon.png) no-repeat 6px 6px !important;
	        }
			#menu-posts-slider:hover .wp-menu-image, #menu-posts-slider.wp-has-current-submenu .wp-menu-image {
	            background-position:6px -18px !important;
	        }
			#icon-edit.icon32-posts-slider {background: url(<?php echo plugin_dir_url( __FILE__ ); ?>images/slider-32x32.png) no-repeat;}
	    </style>
	<?php }

}

new Slider_Post_Type;