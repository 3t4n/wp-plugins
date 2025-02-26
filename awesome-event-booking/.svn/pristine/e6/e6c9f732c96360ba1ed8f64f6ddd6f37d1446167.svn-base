<?php
if ( !defined('ABSPATH') ) exit; // direct access disabled

/**
 * Register Custom Post Types Events, Location, Region, Manager, Booking
 *
 * @since    1.0.0
 */
function register_custom_post_types() {

	$labels = array(
		'name' => _x('Events', 'Post Type General Name', 'wp_event_booking'),
		'singular_name' => _x('Event', 'Post Type Singular Name', 'wp_event_booking'),
		'menu_name' => __('Events', 'wp_event_booking'),
		'name_admin_bar' => __('Events', 'wp_event_booking'),
		'archives' => __('Event Archives', 'wp_event_booking'),
		'attributes' => __('Event Attributes', 'wp_event_booking'),
		'parent_item_colon' => __('Parent Event:', 'wp_event_booking'),
		'all_items' => __('All Events', 'wp_event_booking'),
		'add_new_item' => __('Add New Event', 'wp_event_booking'),
		'add_new' => __('Add New Event', 'wp_event_booking'),
		'new_item' => __('New Event', 'wp_event_booking'),
		'edit_item' => __('Edit Event', 'wp_event_booking'),
		'update_item' => __('Update Event', 'wp_event_booking'),
		'view_item' => __('View Event', 'wp_event_booking'),
		'view_items' => __('View Events', 'wp_event_booking'),
		'search_items' => __('Search Event', 'wp_event_booking'),
		'not_found' => __('Not found', 'wp_event_booking'),
		'not_found_in_trash' => __('Not found in Trash', 'wp_event_booking'),
		'featured_image' => __('Featured Image', 'wp_event_booking'),
		'set_featured_image' => __('Set featured image', 'wp_event_booking'),
		'remove_featured_image' => __('Remove featured image', 'wp_event_booking'),
		'use_featured_image' => __('Use as featured image', 'wp_event_booking'),
		'insert_into_item' => __('Insert into event', 'wp_event_booking'),
		'uploaded_to_this_item' => __('Uploaded to this event', 'wp_event_booking'),
		'items_list' => __('Events list', 'wp_event_booking'),
		'items_list_navigation' => __('Events list navigation', 'wp_event_booking'),
		'filter_items_list' => __('Filter events list', 'wp_event_booking'),
	);

	$capabilities = array(
		'read_post'           => 'read_cpt_event',
		'edit_post'           => 'edit_cpt_event',
		'edit_posts'          => 'edit_cpt_events',
		'edit_others_posts'   => 'edit_others_cpt_events',
		'delete_post'         => 'delete_cpt_event',
		'delete_posts'        => 'delete_cpt_events',
		'delete_others_posts' => 'delete_others_cpt_events',
	);
	$args = array(
		'label' => __('event', 'wp_event_booking'),
		'description' => __('Events post type for booking events', 'wp_event_booking'),
		'labels' => $labels,
		'supports' => array('title', 'editor', 'thumbnail'),
		'taxonomies' => array('category', 'event_tag'),
		'hierarchical' => false,
		'public' => true,
		'capabilities' => $capabilities,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'menu_icon' => 'dashicons-calendar-alt',
	);
	register_post_type('cpt_events', $args);

	$capabilities = array(
		'read_post'          => 'read_event_booking',
		'edit_post'          => 'edit_event_booking',
		'edit_posts'         => 'edit_event_bookings',
		'delete_post'        => 'delete_event_booking',
		'delete_posts'       => 'delete_event_bookings',
	);

	register_post_type('event_booking',
		array(
			'public' => true,
			'show_in_menu' => 'edit.php?post_type=cpt_events',
			'capabilities' => $capabilities,
			'supports' => array(''),
			'labels' => array(
				'name' => _x('Event Booking', 'Post Type General Name', 'wp_event_booking'),
				'singular_name' => _x('Event Booking', 'Post Type Singular Name', 'wp_event_booking'),
				'menu_name' => __('Event Bookings', 'wp_event_booking'),
				'name_admin_bar' => __('Event Bookings', 'wp_event_booking'),
				'archives' => __('Event Booking Archives', 'wp_event_booking'),
				'attributes' => __('Event Booking Attributes', 'wp_event_booking'),
				'parent_item_colon' => __('Parent Event Booking:', 'wp_event_booking'),
				'all_items' => __('Event Bookings', 'wp_event_booking'),
				'add_new_item' => __('Add New Event Booking', 'wp_event_booking'),
				'add_new' => __('Add New Booking', 'wp_event_booking'),
				'new_item' => __('New Event Booking', 'wp_event_booking'),
				'edit_item' => __('Edit Event Booking', 'wp_event_booking'),
				'update_item' => __('Update Event Booking', 'wp_event_booking'),
				'view_item' => __('View Event Booking', 'wp_event_booking'),
				'view_items' => __('View Event Bookings', 'wp_event_booking'),
				'search_items' => __('Search Event Bookings', 'wp_event_booking'),
			),
		)
	);

	$capabilities = array(
		'read_post'              => 'read_event_location',
		'edit_post'              => 'edit_event_location',
		'edit_posts'             => 'edit_event_locations',
		'delete_post'            => 'delete_event_location',
		'delete_posts'           => 'delete_event_locations',
		'publish_posts'          => 'publish_event_locations',
		'edit_published_posts'   => 'edit_published_event_locations',
		'delete_published_posts' => 'delete_published_event_locations',
	);

	register_post_type('event_location',
		array(
			'public' => true,
			'show_in_menu' => 'edit.php?post_type=cpt_events',
			'supports' => array('title', 'editor'),
			'capabilities' => $capabilities,
			// 'taxonomies' => array( 'event_region' ),
			'labels' => array(
				'name' => _x('Locations', 'Post Type General Name', 'wp_event_booking'),
				'singular_name' => _x('Location', 'Post Type Singular Name', 'wp_event_booking'),
				'menu_name' => __('Locations', 'wp_event_booking'),
				'name_admin_bar' => __('Locations', 'wp_event_booking'),
				'archives' => __('Location Archives', 'wp_event_booking'),
				'attributes' => __('Location Attributes', 'wp_event_booking'),
				'parent_item_colon' => __('Parent Location:', 'wp_event_booking'),
				'all_items' => __('Locations', 'wp_event_booking'),
				'add_new_item' => __('Add New Location', 'wp_event_booking'),
				'add_new' => __('Add New', 'wp_event_booking'),
				'new_item' => __('New Location', 'wp_event_booking'),
				'edit_item' => __('Edit Location', 'wp_event_booking'),
				'update_item' => __('Update Location', 'wp_event_booking'),
				'view_item' => __('View Location', 'wp_event_booking'),
				'view_items' => __('View Locations', 'wp_event_booking'),
				'search_items' => __('Search Location', 'wp_event_booking'),
			),
		)
	);

	$capabilities = array(
		'read_post'              => 'read_location_region',
		'edit_post'              => 'edit_location_region',
		'edit_posts'             => 'edit_location_regions',
		'delete_post'            => 'delete_location_region',
		'delete_posts'           => 'delete_location_regions',
		'publish_posts'          => 'publish_location_regions',
		'edit_published_posts'   => 'edit_published_location_regions',
		'delete_published_posts' => 'delete_published_location_regions',
	);

	register_post_type('location_region',
		array(
			'public' => true,
			'show_in_menu' => 'edit.php?post_type=cpt_events',
			'show_in_nav_menus' => true,
			'capabilities'       => $capabilities,
			'labels' => array(
				'name' => _x('Regions', 'Post Type General Name', 'wp_event_booking'),
				'singular_name' => _x('Region', 'Post Type Singular Name', 'wp_event_booking'),
				'menu_name' => __('Regions', 'wp_event_booking'),
				'name_admin_bar' => __('Regions', 'wp_event_booking'),
				'archives' => __('Region Archives', 'wp_event_booking'),
				'attributes' => __('Region Attributes', 'wp_event_booking'),
				'parent_item_colon' => __('Parent Region:', 'wp_event_booking'),
				'all_items' => __('Regions', 'wp_event_booking'),
				'add_new_item' => __('Add New Region', 'wp_event_booking'),
				'add_new' => __('Add New', 'wp_event_booking'),
				'new_item' => __('New Region', 'wp_event_booking'),
				'edit_item' => __('Edit Region', 'wp_event_booking'),
				'update_item' => __('Update Region', 'wp_event_booking'),
				'view_item' => __('View Region', 'wp_event_booking'),
				'view_items' => __('View Regions', 'wp_event_booking'),
				'search_items' => __('Search Region', 'wp_event_booking'),
			),
		)
	);

	//
	$capabilities = array(
		'edit_post'              => 'edit_event_manager',
		'read_post'              => 'read_event_manager',
		'delete_post'            => 'delete_event_manager',
		'edit_posts'             => 'edit_event_managers',
		'publish_posts'          => 'publish_event_managers',
		'delete_posts'           => 'delete_event_managers',
		'delete_published_posts' => 'delete_published_event_managers',
		'edit_published_posts'   => 'edit_published_event_managers',
	);

	register_post_type('event_manager',
	
		array(
			'public' => true,
			'show_in_menu' => 'edit.php?post_type=cpt_events',
			'capabilities'       => $capabilities,
			'supports' => array('title'),
			'labels' => array(
				'name' => _x('Event Manager', 'Post Type General Name', 'wp_event_booking'),
				'singular_name' => _x('Event Manager', 'Post Type Singular Name', 'wp_event_booking'),
				'menu_name' => __('Event Managers', 'wp_event_booking'),
				'name_admin_bar' => __('Event Managers', 'wp_event_booking'),
				'archives' => __('Event Manager Archives', 'wp_event_booking'),
				'attributes' => __('Event Manager Attributes', 'wp_event_booking'),
				'parent_item_colon' => __('Parent Event Manager:', 'wp_event_booking'),
				'all_items' => __('Event Managers', 'wp_event_booking'),
				'add_new_item' => __('Add New Event Manager', 'wp_event_booking'),
				'add_new' => __('Add New', 'wp_event_booking'),
				'new_item' => __('New Event Manager', 'wp_event_booking'),
				'edit_item' => __('Edit Event Manager', 'wp_event_booking'),
				'update_item' => __('Update Event Manager', 'wp_event_booking'),
				'view_item' => __('View Event Manager', 'wp_event_booking'),
				'view_items' => __('View Event Managers', 'wp_event_booking'),
				'search_items' => __('Search Event Manager', 'wp_event_booking'),
			),
		)
	);

	// Labels for the taxonomy
	$labels = array(
		'name'              => _x( 'Event Tags', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Event Tag', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Event Tags', 'textdomain' ),
		'all_items'         => __( 'All Event Tags', 'textdomain' ),
		'parent_item'       => __( 'Parent Event Tag', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Event Tag:', 'textdomain' ),
		'edit_item'         => __( 'Edit Event Tag', 'textdomain' ),
		'update_item'       => __( 'Update Event Tag', 'textdomain' ),
		'add_new_item'      => __( 'Add New Event Tag', 'textdomain' ),
		'new_item_name'     => __( 'New Event Tag Name', 'textdomain' ),
		'menu_name'         => __( 'Event Tags', 'textdomain' ),
	);

	// Arguments for the taxonomy
	$args = array(
		'hierarchical'      => false, // Set to true for a category-like taxonomy
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'event-tag' ),
	);

	// Register the taxonomy for the custom post type
	register_taxonomy( 'event_tag', array( 'cpt_events' ), $args );

}
add_action('init', 'register_custom_post_types');


/**
 * update administrator capabilities
 */
function wpeb_update_administrator_capabilities() {
    // Get the administrator role
    $role = get_role( 'administrator' );

    if ( ! is_null( $role ) ) {
        // Add capabilities
        
        //cpt_event
        $role->add_cap( 'read_cpt_event' );
        $role->add_cap( 'edit_cpt_event' );
        $role->add_cap( 'edit_cpt_events' );
        $role->add_cap( 'edit_others_cpt_events' );
        $role->add_cap( 'delete_cpt_event' );
        $role->add_cap( 'delete_cpt_events' );
        $role->add_cap( 'delete_others_cpt_events' );
        
        //event_booking
        $role->add_cap( 'read_event_booking' );
        $role->add_cap( 'edit_event_booking' );
        $role->add_cap( 'edit_event_bookings' );
        $role->add_cap( 'delete_event_booking' );
        $role->add_cap( 'delete_event_bookings' );

        //event_manager
        $role->add_cap( 'read_event_manager' );
        $role->add_cap( 'edit_event_manager' );
        $role->add_cap( 'edit_event_managers' );
        $role->add_cap( 'delete_event_manager' );
        $role->add_cap( 'delete_event_managers' );
        $role->add_cap( 'publish_event_managers' );
        
        //event_location
        $role->add_cap( 'read_event_location' );
        $role->add_cap( 'edit_event_location' );
        $role->add_cap( 'edit_event_locations' );
        $role->add_cap( 'delete_event_location' );
        $role->add_cap( 'delete_event_locations' );
        $role->add_cap( 'publish_event_locations' );
        
        //location_region
        $role->add_cap( 'read_location_region' );
        $role->add_cap( 'edit_location_region' );
        $role->add_cap( 'edit_location_regions' );
        $role->add_cap( 'delete_location_region' );
        $role->add_cap( 'delete_location_regions' );
        $role->add_cap( 'publish_location_regions' );
    }
}
add_action( 'admin_init', 'wpeb_update_administrator_capabilities' );
