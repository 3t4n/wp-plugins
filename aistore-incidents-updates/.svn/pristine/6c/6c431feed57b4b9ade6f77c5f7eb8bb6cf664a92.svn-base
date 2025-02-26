<?php
/*
  Plugin Name: Aistore incidents updates
  Version: 4.1.1
  Plugin URI: #
  Author: susheelhbti
  Author URI: http://www.aistore2030.com/
  Description: In order to build a trust we should provide details about the website downtime etc to our all customers. Create a page and paste the shortcode [aistore_incidents] it will display all incidents.
 */
 
 
 
 
 // Register Custom Post Type
function aistore_incident() {

	$labels = array(
		'name'                  => _x( 'Incident', 'Incident General Name', 'text_domain' ),
		'singular_name'         => _x( 'Incident', 'Incident Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Incident', 'text_domain' ),
		'name_admin_bar'        => __( 'Incidents', 'text_domain' ),
		'archives'              => __( 'Incident Archives', 'text_domain' ),
		'attributes'            => __( 'Incident Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Incident:', 'text_domain' ),
		'all_items'             => __( 'All Incidents', 'text_domain' ),
		'add_new_item'          => __( 'Add New Incident', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Incident', 'text_domain' ),
		'edit_item'             => __( 'Edit Incident', 'text_domain' ),
		'update_item'           => __( 'Update Incident', 'text_domain' ),
		'view_item'             => __( 'View Incident', 'text_domain' ),
		'view_items'            => __( 'View Incidents', 'text_domain' ),
		'search_items'          => __( 'Search Incidents', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Incident', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Incident', 'text_domain' ),
		'items_list'            => __( 'Incidents list', 'text_domain' ),
		'items_list_navigation' => __( 'Incidents list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Incidents list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'incident',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Incident', 'text_domain' ),
		'description'           => __( 'Incident Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
		'rest_base'             => 'aistore_incident',
	);
	register_post_type( 'incident', $args );

}
add_action( 'init', 'aistore_incident', 0 );
 
 
 
  
function aistore_func( $atts ){


$incidents = get_posts( array(
    'post_type'      => 'incident', 
    'post_status'    => 'publish' 
) );
 
 $print="";
    foreach ( $incidents as $incident ) {
        $print   .= "<h2>".$incident->post_title ."</h2>";
        $print  .= "<p>".$incident->post_content ."</p>";
          $print  .= "<small>".$incident->post_date ."</small><hr/>"; 
        
    }
        return $print; 
}
add_shortcode( 'aistore_incidents', 'aistore_func' );




