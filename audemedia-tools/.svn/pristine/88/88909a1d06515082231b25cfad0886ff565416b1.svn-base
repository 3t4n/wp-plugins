<?php
class Testimonials_Post_Type {

        function __construct() {
	    

		// Thumbnail support for Testimonials posts
		add_theme_support( 'post-thumbnails', array( 'Testimonials' ) );
		
		// Give the Testimonials menu item a unique icon
		add_action( 'admin_head', array( &$this, 'Testimonials_icon' ) );


	}
	
public static function Testimonials_init() {



	$labels = array(
			'name' => __( 'Testimonials', 'testimonialsposttype' ),
			'singular_name' => __( 'Testimonials Item', 'testimonialsposttype' ),
			'add_new' => __( 'Add New Item', 'testimonialsposttype' ),
			'add_new_item' => __( 'Add New Testimonials Item', 'testimonialsposttype' ),
			'edit_item' => __( 'Edit Testimonials Item', 'testimonialsposttype' ),
			'new_item' => __( 'Add New Testimonials Item', 'testimonialsposttype' ),
			'view_item' => __( 'View Item', 'testimonialsposttype' ),
			'search_items' => __( 'Search Testimonials', 'testimonialsposttype' ),
			'not_found' => __( 'No Testimonials items found', 'testimonialsposttype' ),
			'not_found_in_trash' => __( 'No Testimonials items found in trash', 'testimonialsposttype' )
		);
		
		$args = array(
	    	'labels' => $labels,
	    	'public' => true,
			'supports' => array( 'title', 'thumbnail', 'editor'),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "testimonials"), // Permalinks format
			'menu_position' => 15,
			'has_archive' => true,
			'exclude_from_search' => true
		);
		
		$args = apply_filters('testimonialsposttype_args', $args);
		if( current_theme_supports( 'audemedia_testimonials_cpt' ) ) {
		register_post_type( 'testimonials', $args );
	}

		flush_rewrite_rules();
		
	}
	 
function Testimonials_icon() { ?>
	    <style type="text/css" media="screen">
	        #menu-posts-testimonials .wp-menu-image {
	            background: url(<?php echo plugin_dir_url( __FILE__ ); ?>images/testimonials-icon.png) no-repeat 6px 6px !important;
	        }
			#menu-posts-testimonials:hover .wp-menu-image, #menu-posts-testimonials.wp-has-current-submenu .wp-menu-image {
	            background-position:6px -18px !important;
	        }
			#icon-edit.icon32-posts-testimonials {background: url(<?php echo plugin_dir_url( __FILE__ ); ?>images/testimonials-32x32.png) no-repeat;}
	    </style>
	<?php }

}

new Testimonials_Post_Type;