<?php 
/*
Plugin Name: Plugin Display Page
Description: Add a page to your site to display a plugin you have developed 
Plugin URI: https://frametagmedia.com.au/digital-creative/wordpress-plugins/plugindisplaypage
Author: Frametag Media
Version: 1.0
License: GPL v2
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

// exit if file is called directly
if ( ! defined('ABSPATH') ) {
    exit; 
}

function pdpg_cpt_enqueue( $hook_suffix ){
    $cpt = 'pdpg_page';

    if( in_array($hook_suffix, array('post.php', 'post-new.php') ) ){
        $screen = get_current_screen();

        if( is_object( $screen ) && $cpt == $screen->post_type ){
        	wp_enqueue_script('plugindisplaypg', plugins_url('js/plugindisplaypg.js', __FILE__), array('jquery'));
        }
    }
}
add_action( 'admin_enqueue_scripts', 'pdpg_cpt_enqueue');

function pdpg_page_enqueue() {
	if (get_post_type() == 'pdpg_page') {
		wp_enqueue_style('plugindisplaypgstyle', plugins_url('css/plugindisplaypg.css', __FILE__));
	    wp_enqueue_style('owlcarouselstyle', plugins_url('css/owl.carousel.css', __FILE__));
	    wp_enqueue_style('owlthemestyle', plugins_url('css/owl.theme.default.min.css', __FILE__));
	    wp_enqueue_script('plugindisplaypg', plugins_url('js/plugindisplaypg.js', __FILE__), array('jquery'));
	    wp_enqueue_script('owlcarouseljs', plugins_url('js/owl.carousel.min.js', __FILE__), array('jquery'));
	}
}
add_action( 'wp_enqueue_scripts', 'pdpg_page_enqueue');

add_action('init', 'pdpg_create_post_type');
function pdpg_create_post_type() {
    register_post_type('pdpg_page',
        array(
            'labels' => array(
                'name' => __('Plugin Pages'),
                'singular_name' => __('Plugin Page')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'pluginpages'),
            'supports' => array('title'),
        )
    );
}

function product_category_taxonomy() {
$labels = array(
        'name'              => __( 'Plugin Tags' ),
        'singular_name'     => __( 'Plugin Tag' ),
        'search_items'      => __( 'Search Plugin Tags' ),
        'all_items'         => __( 'All Plugin Tags' ),
        'parent_item'       => __( 'Parent Plugin Tag' ),
        'parent_item_colon' => __( 'Parent Plugin Tag:' ),
        'edit_item'         => __( 'Edit Plugin Tag' ), 
        'update_item'       => __( 'Update Plugin Tag' ),
        'add_new_item'      => __( 'Add New Plugin Tag' ),
        'new_item_name'     => __( 'New Plugin Tag' ),
        'menu_name'         => __( 'Plugin Tags' ),
    ); 
    $args = array(
        'labels'            => $labels,
        'public'            =>  true,
        'show_in_nav_menus' =>  false,
        'has_archive'       =>  true,
        'rewrite'           =>  array('slug' => '/pluginpages', 'with_front' => true),
    );
    register_taxonomy( 'pdpg_tags', 'pdpg_page', $args );
}
add_action( 'init', 'product_category_taxonomy');

function pdpg_move_meta_box(){
    remove_meta_box( 'tagsdiv-pdpg_tags', 'pdpg_page', 'side' );
    add_meta_box('tagsdiv-pdpg_tags', __('Plugin Tags'), 'post_tags_meta_box', 'pdpg_page', 'normal', 'default', array('taxonomy' => 'pdpg_tags'));
}

add_action('admin_menu', 'pdpg_move_meta_box');

add_action('add_meta_boxes', 'pdpg_add_metaboxes');
function pdpg_add_metaboxes() {
    add_meta_box(
        'pdpg_plugin_name',
        'Plugin Name',
        'pdpg_plugin_text',
        'pdpg_page',
        'normal',
        'default',
        array('plugin_id' => 'pdpg_plugin_name', 'plugin_label' => 'Plugin Name')
    );

    add_meta_box(
        'pdpg_plugin_images',
        'Plugin Screenshots',
        'pdpg_plugin_images',
        'pdpg_page',
        'normal',
        'default',
        array('plugin_id' => 'pdpg_plugin_images', 'plugin_label' => 'Plugin Image')
    );
    
    add_meta_box(
        'pdpg_plugin_contributors',
        'Plugin Contributors',
        'pdpg_plugin_text',
        'pdpg_page',
        'normal',
        'default',
        array('plugin_id' => 'pdpg_plugin_contributors', 'plugin_label' => 'Plugin Contributors')
    );
    
    add_meta_box(
        'pdpg_plugin_requires',
        'Version Requirement',
        'pdpg_plugin_text',
        'pdpg_page',
        'normal',
        'default',
        array('plugin_id' => 'pdpg_plugin_requires', 'plugin_label' => 'Version Requirement')
    );
    add_meta_box(
        'pdpg_plugin_tested',
        'Version Tested',
        'pdpg_plugin_text',
        'pdpg_page',
        'normal',
        'default',
        array('plugin_id' => 'pdpg_plugin_tested', 'plugin_label' => 'Version Tested')
    );
    add_meta_box(
        'pdpg_plugin_license',
        'Plugin License',
        'pdpg_plugin_text',
        'pdpg_page',
        'normal',
        'default',
        array('plugin_id' => 'pdpg_plugin_license', 'plugin_label' => 'Plugin License')
    );
    add_meta_box(
        'pdpg_plugin_download',
        'Plugin Download',
        'pdpg_plugin_text',
        'pdpg_page',
        'normal',
        'default',
        array('plugin_id' => 'pdpg_plugin_download', 'plugin_label' => 'URL link to download the plugin')
    );
    add_meta_box(
        'pdpg_plugin_wppage',
        'WordPress Page',
        'pdpg_plugin_text',
        'pdpg_page',
        'normal',
        'default',
        array('plugin_id' => 'pdpg_plugin_wppage', 'plugin_label' => 'URL to the plugin\'s wordPress page')
    );
    add_meta_box(
        'pdpg_plugin_repo',
        'Source code',
        'pdpg_plugin_text',
        'pdpg_page',
        'normal',
        'default',
        array('plugin_id' => 'pdpg_plugin_repo', 'plugin_label' => 'Url link to the plugin\'s Git or SVN source code repository')
    );
    add_meta_box(
        'pdpg_plugin_description',
        'Plugin Description',
        'pdpg_plugin_textarea',
        'pdpg_page',
        'normal',
        'default',
        array('plugin_id' => 'pdpg_plugin_description', 'plugin_label' => 'Description of the plugin you are adding')
    );
    add_meta_box(
        'pdpg_plugin_installation',
        'Plugin Installation',
        'pdpg_plugin_textarea',
        'pdpg_page',
        'normal',
        'default',
        array('plugin_id' => 'pdpg_plugin_installation', 'plugin_label' => 'Instructions for how to install your plugin')
    );
    add_meta_box(
        'pdpg_plugin_faq',
        'Frequently Asked Questions',
        'pdpg_plugin_textarea',
        'pdpg_page',
        'normal',
        'default',
        array('plugin_id' => 'pdpg_plugin_faq', 'plugin_label' => '')
    );
    add_meta_box(
        'pdpg_plugin_changelog',
        'Plugin Changelog',
        'pdpg_plugin_textarea',
        'pdpg_page',
        'normal',
        'default',
        array('plugin_id' => 'pdpg_plugin_changelog', 'plugin_label' => 'Plugin Changelog')
    );
}

function pdpg_plugin_text($post, $metabox) {
	// Get the id for this metabox
	$plugin_id = $metabox['args']['plugin_id'];
	$plugin_label = $metabox['args']['plugin_label'];
    // Nonce field to validate form request came from current site
	wp_nonce_field( basename( __FILE__ ), $plugin_id . '_nonce');
	// Get the location data if it's already been entered
	$plugin_value = get_post_meta($post->ID, $plugin_id, true);
	// Output the field
	echo '<input type="text" id="' . $plugin_id . '" name="' . $plugin_id . '" value="' . esc_textarea( $plugin_value )  . '" class="widefat">';
    echo '<label for="' . $plugin_id . '">' . $plugin_label . '</label>';
}

function pdpg_plugin_textarea($post, $metabox) {
	// Get the id for this metabox
	$plugin_id = $metabox['args']['plugin_id'];
	$plugin_label = $metabox['args']['plugin_label'];
    // Nonce field to validate form request came from current site
	wp_nonce_field( basename( __FILE__ ), $plugin_id . '_nonce');
	// Get the location data if it's already been entered
	$plugin_value = get_post_meta($post->ID, $plugin_id, true);
	// Output the field
	echo '<textarea rows="5" id="' . $plugin_id . '" name="' . $plugin_id . '" class="widefat">' . esc_textarea( $plugin_value )  . '</textarea>';
    echo '<label for="' . $plugin_id . '">' . $plugin_label . '</label>';
}

function pdpg_plugin_images($post, $metabox) {
	wp_nonce_field( basename( __FILE__ ), 'pdpg_plugin_images_nonce');
	// Get the id for this metabox
	$plugin_id = $metabox['args']['plugin_id'];
	$plugin_label = $metabox['args']['plugin_label'];
	//Get the data if it's already been entered
	$plugin_value = get_post_meta($post->ID, $plugin_id, true);
	//Output the field
	echo '
        <div class="upload">
                <div id="' . $plugin_id . '_container">';
                    if ($plugin_value) {
                        $imageIds = explode(" ", $plugin_value);
                        foreach ($imageIds as $imageId) {
                            echo wp_get_attachment_image($imageId);
                        }
                    } else {
                        echo '<img src="' . plugins_url('assets/wordpress-logo.png', __FILE__) . '" alt="wordpress-logo" />';
                    }
                echo '</div>
            <div>
                <input type="hidden" name="' . $plugin_id . '" id="' . $plugin_id . '_ids" value="' . $plugin_value . '" />
                <button type="submit" class="upload_image_button button">Upload Images</button>
            </div>
        </div> ';
	
}

/**
 * Save the metabox data
 */
function pdpg_save_meta( $post_id, $post ) {
	// Return if the user doesn't have edit permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}
	//Create an array of all metaboxes, in future populate this from wp_metabox global so as to not ruin saving if a metabox is removed
	$metaboxes = array(
		'pdpg_plugin_name',
		'pdpg_plugin_images',
		'pdpg_plugin_contributors',
		'pdpg_plugin_requires',
		'pdpg_plugin_tested',
		'pdpg_plugin_license',
		'pdpg_plugin_download',
		'pdpg_plugin_wppage',
		'pdpg_plugin_repo',
		'pdpg_plugin_description',
		'pdpg_plugin_installation',
		'pdpg_plugin_faq',
		'pdpg_plugin_changelog'
	);
	
	$empty_metaboxes = true;
	//Cycle through the $metabox array of metabox names
	foreach ($metaboxes as $metabox) {
		// Verify this came from the our screen and with proper authorization,
		// because save_post can be triggered at other times.
		if (! wp_verify_nonce( $_POST[$metabox . '_nonce'], basename(__FILE__) ) ) {
			return $post_id;
		}
	    //If the $POST data for the metabox is set create an entry in the $events_meta array for that metabox and set the empty_metabox var to false
	    if (isset($_POST[$metabox])) {
	        $events_meta[$metabox] = esc_textarea($_POST[$metabox]);
	        $empty_metaboxes = false;
	    } else {
	    	$events_meta[$metabox] = '';
	    }
	}
	
	if ($empty_metaboxes) {
	    return $post_id;
	}
	
	// Now that we're authenticated, time to save the data.
	// This sanitizes the data from the field and saves it into an array $events_meta.

	// Cycle through the $events_meta array.
	foreach ( $events_meta as $key => $value ) :
		// Don't store custom data twice
		if ( 'revision' === $post->post_type) {
			return;
		}
		if ( get_post_meta( $post_id, $key, false ) ) {
			if ( get_post_meta($post_id, $key, false) == $value ) {
				return;
			} 
			// If the custom field already has a value, update it.
			update_post_meta( $post_id, $key, $value );
		} else {
			// If the custom field doesn't have a value, add it.
			add_post_meta( $post_id, $key, $value);
		}
		if ( ! $value ) {
			// Delete the meta key if there's no value
			delete_post_meta( $post_id, $key );
		}
	endforeach;
}
add_action( 'save_post', 'pdpg_save_meta', 1, 2 );

add_filter('single_template', 'pdpg_custom_template');

function pdpg_custom_template($single) {
    global $wp_query, $post;
    
    /* checks for single template by post type */
    if ($post->post_type == 'pdpg_page') {
        if ( file_exists(plugin_dir_path(__FILE__) . 'templates/single-pdpg_page.php')) {
            $single = plugin_dir_path(__FILE__) . 'templates/single-pdpg_page.php';
        }
    }
    return $single;
}

