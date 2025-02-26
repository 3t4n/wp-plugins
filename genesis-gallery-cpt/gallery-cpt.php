<?php
/**
 * Plugin Name: Genesis Gallery CPT
 * Plugin URI: https://llama-press.com
 * Description: Use this plugin to add a Gallery CPT to be used with the "fancy-gallery" sortcode or a LlamaPress gallery page template,
 *              this plugin can only be used with the Genesis framework..
 * Version: 1.0
 * Author: LlamaPress
 * Author URI: https://llama-press.com
 * License: GPL2
 */

/*  Copyright 2014  LlamaPress LTD  (email : info@llama-press.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
/**
 * This class creates a custom post type lp-gallery, this post type allows the user to create 
 * gallery items to display in the Gallery page template.
 *
 * @since 1.0
 * @link https://llama-press.com
 */
class lpGallery { 
    /**
    * Initiate functions
    *
    * @since 1.0
    * @link https://llama-press.com
    */
    public function __construct( ){
        
        /* Create gallery custom post type */
        add_action( 'genesis_init', array( $this, 'gallery_post_type' ) );

        /* Register gallery Taxonomy */
        add_action( 'genesis_init', array( $this, 'create_gallery_tax' ) );
        
        /* Move the featured image under the title in gallery edit page */
        add_action('do_meta_boxes', array( $this, 'customposttype_image_box' ) );
    
        /* Remove permalink section from gallery items edit post screen  */
        add_action('admin_print_styles-post.php', array( $this, 'posttype_admin_css' ) ); 
        
        
        /* create text domain */
        load_plugin_textdomain( 'lp', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );   
    
        /** Creates gallery featured image for archive grid */
        add_image_size( 'lp-gallery', 330, 230, TRUE );

    }

    /**
    * Create Gallery custom post type.
    * 
    * This function creates the Gallery custom post type which allows users to greate gallery items and display them using the gallery page template
    *
    * @since 1.0
    * @link https://llama-press.com
    */
    public function gallery_post_type() {
        register_post_type( 'lp-gallery',
            array(
                'labels' => array(
                    'name' => __( 'Gallery' ),
                    'singular_name' => __( 'Gallery item' ),
                    'all_items' => __('All Gallery items'),
                    'add_new' => _x('Add new Gallery item', 'Gallery item'),
                    'add_new_item' => __('Add new Gallery'),
                    'edit_item' => __('Edit Gallery item'),
                    'new_item' => __('New Gallery item'),
                    'view_item' => __('View Gallery item'),
                    'search_items' => __('Search Gallery items'),
                    'not_found' =>  __('No Gallery items found'),
                    'not_found_in_trash' => __('No Gallery items found in trash'), 
                    'parent_item_colon' => ''
                ),
                'exclude_from_search' => true,
                'has_archive' => true,
                'hierarchical' => true,
                'show_in_nav_menus' => true,
                'taxonomies'   => array( 'lp-gallery-cat' ),
                'public' => true,
                'menu_icon' => 'dashicons-format-gallery',
                'rewrite' => array( 'slug' => 'gallery' ),
                'supports' => array( 'title', 'thumbnail', 'excerpt', 'page-attributes' ),
                'query_var'           => false,
            )
        );
    }

    /**
    * Create gallery categories.
    * 
    * This function creates categories for gallery items
    *
    * @since 1.0
    * @link https://llama-press.com
    */
    public function create_gallery_tax() {
        register_taxonomy(
            'lp-gallery-cat',
            'lp-gallery',
            array(
                'label' => __( 'Gallery Category' ),
                'hierarchical' => true,
            )
        );
    }
    
    /**
    * Move featured image.
    * 
    * This function moves the featured image under the title area on the post edit screen, credit to http://jleuze.com/
    *
    * @since 1.0
    * @link https://llama-press.com
    */
    public function customposttype_image_box() {

            remove_meta_box( 'postimagediv', 'lp-gallery', 'side' );

            add_meta_box('postimagediv', __('Custom Image'), 'post_thumbnail_meta_box', 'lp-gallery', 'normal', 'high');

    }
    
    /**
    * Remove permalink.
    * 
    * We dont need to display the permalink or the view post link on the edit screen so this function removes it.
    * 
    * @since 1.0
    * @link https://llama-press.com
    */
    public function posttype_admin_css() {
        global $post_type;
        if($post_type == 'lp-gallery') {
            echo '<style type="text/css">#edit-slug-box, #view-post-btn, #post-preview, .updated #edit-slug-box, .preview{ display: none !important; }</style>';
        }
    }
    
}

$gallery = new lpGallery();
?>