<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Plugin Name: AT Gallery
Description: A simple gallery plugin that lets users add bulk images to a gallery, display galleries with a shortcode, and show images in a lightbox.
Version: 1.0
Author: Aciano Technologies
Author URI: https://aciano.net/
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: at-gallery
*/

// Register Custom Post Type for Gallery
function ATGA_gallery_post_type() {
    $labels = array(
        'name'                  => 'Galleries',
        'singular_name'         => 'Gallery',
        'menu_name'             => 'AT Galleries',
        'name_admin_bar'        => 'Gallery',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Gallery',
        'new_item'              => 'New Gallery',
        'edit_item'             => 'Edit Gallery',
        'view_item'             => 'View Gallery',
        'all_items'             => 'All Galleries',
        'search_items'          => 'Search Galleries',
        'parent_item_colon'     => 'Parent Galleries:',
        'not_found'             => 'No galleries found.',
        'not_found_in_trash'    => 'No galleries found in Trash.',
        'featured_image'        => 'Gallery Image',
        'set_featured_image'    => 'Set gallery image',
        'remove_featured_image' => 'Remove gallery image',
        'use_featured_image'    => 'Use as featured image',
        'archives'              => 'Gallery Archives',
        'insert_into_item'      => 'Insert into gallery',
        'uploaded_to_this_item' => 'Uploaded to this gallery',
    );
    $args = array(
        'labels'               => $labels,
        'public'               => true,
        'has_archive'          => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'show_in_rest'         => true,
        'supports'             => array( 'title', 'editor', 'thumbnail' ),
        'menu_icon'            => 'dashicons-format-gallery',
    );
    register_post_type( 'atga', $args );
}
add_action( 'init', 'ATGA_gallery_post_type' );

// Add a custom meta box for the gallery images
function ATGA_gallery_images_meta_box() {
    add_meta_box(
        'atga_images',        // Meta box ID
        'Gallery Images',           // Title
        'ATGA_gallery_images_callback', // Callback function
        'atga',               // Post type
        'normal',                   // Context
        'high'                      // Priority
    );
}
add_action( 'add_meta_boxes', 'ATGA_gallery_images_meta_box' );

// Callback for displaying image upload interface in the admin
function ATGA_gallery_images_callback( $post ) {
    wp_nonce_field( 'atga_images_nonce', 'atga_images_nonce_field' );
    $images = get_post_meta( $post->ID, '_atga_images', true );

    // Escape post ID
    $post_id = esc_attr( $post->ID );

    echo '<div id="at-gallery-images-container">';
    if ( !empty( $images ) ) {
        foreach ( $images as $image_id ) {
            // Get the image HTML
            $image = wp_get_attachment_image( $image_id, 'thumbnail' ); // Get image HTML

            // Escape the image HTML (in this case, the img tag)
            echo '<div class="at-gallery-image-item" data-id="' . esc_attr( $image_id ) . '">
                    ' . wp_kses_post( $image ) . ' <!-- Escape the image HTML output -->
                    <button class="remove-image">Remove</button>
                  </div>';
        }
    }
    echo '</div>';

    echo '<button id="select-images" class="button">Select Images</button>';
    echo '<input type="hidden" id="at-gallery-images" name="atga_images" value="' . esc_attr( implode( ',', (array) $images ) ) . '" />';
}

// Enqueue media uploader scripts for the admin
function ATGA_gallery_enqueue_scripts($hook) {
    if ( 'post.php' !== $hook && 'post-new.php' !== $hook ) return;

    wp_enqueue_media();
    
    // Register and enqueue the plugin's custom script
    wp_register_script( 'at-gallery-scripts', plugin_dir_url( __FILE__ ) . 'js/at-gallery.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'at-gallery-scripts' );

    // Localize script for nonce
    wp_localize_script( 'at-gallery-scripts', 'atGallery', array(
        'nonce' => wp_create_nonce( 'atga_images_nonce' )
    ) );
}
add_action( 'admin_enqueue_scripts', 'ATGA_gallery_enqueue_scripts' );

// Enqueue styles for the gallery
function ATGA_Gallery_enqueue_styles() {
    // Register and enqueue the plugin's stylesheet
    $plugin_css_file = plugin_dir_path( __FILE__ ) . 'css/at-gallery.css';

    if ( file_exists( $plugin_css_file ) ) {
        $plugin_version = filemtime( $plugin_css_file );
    } else {
        $plugin_version = '1.0'; // Fallback version number
    }

    wp_register_style( 'at-gallery-style', plugin_dir_url( __FILE__ ) . 'css/at-gallery.css', array(), $plugin_version );
    wp_enqueue_style( 'at-gallery-style' );
}
add_action( 'wp_enqueue_scripts', 'ATGA_Gallery_enqueue_styles' );

// Save gallery images meta data
function ATGA_gallery_save_post( $post_id ) {
    if ( !isset( $_POST['atga_images_nonce_field'] ) || 
         !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['atga_images_nonce_field'] ) ), 'atga_images_nonce' ) ) {
        return $post_id;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    if ( isset( $_POST['atga_images'] ) ) {
        $images = array_map( 'intval', explode( ',', sanitize_text_field( wp_unslash( $_POST['atga_images'] ) ) ) );
        update_post_meta( $post_id, '_atga_images', $images );
    }

    return $post_id;
}
add_action( 'save_post', 'ATGA_gallery_save_post' );

// Shortcode to display gallery
function ATGA_gallery_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'id' => 0,
    ), $atts, 'atga' );

    if ( !$atts['id'] ) return '';

    $gallery_id = (int) $atts['id']; 
    $images = get_post_meta( $gallery_id, '_atga_images', true );

    if ( empty( $images ) ) return '';

    $output = '<div class="at-gallery"><ul class="at-gallery-frontendlist">';
    foreach ( $images as $image_id ) {
        $image = wp_get_attachment_image( $image_id, 'medium' ); 
        $image_url = wp_get_attachment_url( $image_id );

        $output .= '<li><a href="' . esc_url( $image_url ) . '" class="at-gallery-image" data-lightbox="gallery-' . esc_attr( $gallery_id ) . '">
                        ' . wp_kses_post( $image ) . '
                    </a></li>';
    }
    $output .= '</ul></div>';

    return $output;
}
add_shortcode( 'atga', 'ATGA_gallery_shortcode' );

// Display the shortcode in the admin page
function ATGA_gallery_add_shortcode_to_post( $post ) {
    if ( 'atga' === $post->post_type ) {
        echo '<p>Copy this shortcode to display the gallery: <code>[atga id="' . esc_attr( $post->ID ) . '"]</code></p>';
    }
}
add_action( 'edit_form_after_title', 'ATGA_gallery_add_shortcode_to_post' );

// Enqueue lightbox scripts and styles
function ATGA_gallery_enqueue_frontend_scripts() {
    // Register and enqueue the lightbox scripts and styles
    wp_register_script( 'lightbox-scripts', plugin_dir_url( __FILE__ ) . 'js/lightbox.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'lightbox-scripts' );
    
    wp_register_style( 'lightbox',  plugin_dir_url( __FILE__ ) . 'css/lightbox.min.css', array(), '1.0' );
    wp_enqueue_style( 'lightbox' );
}
add_action( 'wp_enqueue_scripts', 'ATGA_gallery_enqueue_frontend_scripts' );

// Initialize lightbox
function ATGA_gallery_lightbox_init() {
    wp_add_inline_script( 'lightbox-scripts', 'lightbox.option({
        "resizeDuration": 200,
        "wrapAround": true
    });' );
}
add_action( 'wp_footer', 'ATGA_gallery_lightbox_init' );
