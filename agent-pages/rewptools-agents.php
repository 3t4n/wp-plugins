<?php 
/**
 * Plugin Name: Real Estate Agent Pages by Real Estate WP Tools
 * Plugin URI: http://realestatewp.com
 * Description: A quick and easy way to add your agent bios, pictures, and contact information to your Wordpress website.
 * Version: 1.0
 * Author: BigUp Branding
 * Author URI: http://bigupbranding.com
 * Text Domain: rewptools
 */

// register the post type
add_action( 'init', 'rewptools_agents' );
function rewptools_agents() {
	$labels = array(
		'name'               => _x( 'Agents', 'post type general name', 'rewptools' ),
		'singular_name'      => _x( 'Agents', 'post type singular name', 'rewptools' ),
		'menu_name'          => _x( 'Agents', 'admin menu', 'rewptools' ),
		'name_admin_bar'     => _x( 'Agents', 'add new on admin bar', 'rewptools' ),
		'add_new'            => _x( 'Add New', 'agent', 'rewptools' ),
		'add_new_item'       => __( 'Add New Agent', 'rewptools' ),
		'new_item'           => __( 'New Agent', 'rewptools' ),
		'edit_item'          => __( 'Edit Agent', 'rewptools' ),
		'view_item'          => __( 'View Agent', 'rewptools' ),
		'all_items'          => __( 'All Agents', 'rewptools' ),
		'search_items'       => __( 'Search Agents', 'rewptools' ),
		'parent_item_colon'  => __( 'Parent Agents:', 'rewptools' ),
		'not_found'          => __( 'No Agents found.', 'rewptools' ),
		'not_found_in_trash' => __( 'No Agents found in Trash.', 'rewptools' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'agents' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-businessman',
		'supports'           => array( 'title', 'editor', 'page-attributes', 'thumbnail' )
	);
	register_post_type( 'agents', $args );
	flush_rewrite_rules();
}


// modify the_content() to include meta data
// add_filter( 'the_content', 'agents_the_content' ); 
// function agents_the_content( $content ) { 
//    if ( is_singular('agents') ) {

//    		$title = get_the_title();

// 		$structure = '	<div class="agent-container">
// 							<div class="agent-left">
// 								<div class="agent-image">Image Here</div>
// 								<div class="agent-name">' . $title . '</div>
// 								<div class="agent-title">' . 'Agent Title' . '</div>
// 							</div>
// 							<div class="agent-right">
// 								' . $content . '
// 							</div>
// 						</div>';

// 		// put it all together...
// 		$content = $structure;
		
// 		}

//    return $content;
// }



?>