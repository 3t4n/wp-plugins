<?php
class Services_Post_Type {

        function __construct() {
	    

		// Thumbnail support for services posts
		add_theme_support( 'post-thumbnails', array( 'services' ) );
		
		// Give the services menu item a unique icon
		add_action( 'admin_head', array( &$this, 'services_icon' ) );


	}
	
public static function services_init() {



	$labels = array(
			'name' => __( 'Services', 'servicesposttype' ),
			'singular_name' => __( 'Services Item', 'servicesposttype' ),
			'add_new' => __( 'Add New Item', 'servicesposttype' ),
			'add_new_item' => __( 'Add New Services Item', 'servicesposttype' ),
			'edit_item' => __( 'Edit Services Item', 'servicesposttype' ),
			'new_item' => __( 'Add New Services Item', 'servicesposttype' ),
			'view_item' => __( 'View Item', 'servicesposttype' ),
			'search_items' => __( 'Search Services', 'servicesposttype' ),
			'not_found' => __( 'No services items found', 'servicesposttype' ),
			'not_found_in_trash' => __( 'No services items found in trash', 'servicesposttype' )
		);
		
		$args = array(
	    	'labels' => $labels,
	    	'public' => true,
			'supports' => array( 'title', 'editor', 'excerpt', 'comments', 'revisions' ),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "services"), // Permalinks format
			'menu_position' => 10,
			'has_archive' => true,
			'exclude_from_search' => true
		);
		
		$args = apply_filters('servicesposttype_args', $args);
		if( current_theme_supports( 'audemedia_services_cpt' ) ) {
		register_post_type( 'services', $args );
	}

		flush_rewrite_rules();
		
	}
	 
function services_icon() { ?>
	    <style type="text/css" media="screen">
	        #menu-posts-services .wp-menu-image {
	            background: url(<?php echo plugin_dir_url( __FILE__ ); ?>images/services-icon.png) no-repeat 6px 6px !important;
	        }
			#menu-posts-services:hover .wp-menu-image, #menu-posts-services.wp-has-current-submenu .wp-menu-image {
	            background-position:6px -18px !important;
	        }
			#icon-edit.icon32-posts-services {background: url(<?php echo plugin_dir_url( __FILE__ ); ?>images/services-32x32.png) no-repeat;}
	    </style>
	<?php }

}

new Services_Post_Type;