<?php


/**
 *
 * Chooses the ArtistPress Artist Templates.
 *
 * @author      LTDI Studios
 * @since       1.0.0
 *
 */
function artistpress_artist_templates($original_template){
    if (get_query_var('post_type') !== 'artist'){
         return $original_template;
    }
    $artistOptions          = get_option('artistpress_artist_settings');
    $artistOptionShortcode  = esc_html($artistOptions['artist_use_shortcode']);
    if( $artistOptionShortcode == 'no'){
        if(is_singular('artist')){
            if ( file_exists( get_stylesheet_directory() . '/single-artistpress-artist.php')){
                 return get_stylesheet_directory() . '/single-artistpress-artist.php';
            }else{
                // Includes the file for creating the single show view
                return plugin_dir_path(__FILE__) . 'templates/single-artistpress-artist.php';
            }
        }
    }
    return $original_template;
}
add_action('template_include','artistpress_artist_templates');



/**
 *
 * Chooses the ArtistPress Show Templates.
 *
 * @author      LTDI Studios
 * @since       1.0.0
 *
 */
function artistpress_show_templates($original_template){
    if (get_query_var('post_type') !== 'show'){
        return $original_template;
    }

    $artistpress_show_list_settings = get_option('artistpress_show_list_settings');
    $showListUseShortcode = sanitize_text_field( $artistpress_show_list_settings['show_list_use_shortcode'] );

    if( $showListUseShortcode == 'no'){
        
        if(is_archive('show')){
            if ( file_exists( get_stylesheet_directory() . 'archive-artistpress-show.php')){
                 return get_stylesheet_directory() . '/archive-artistpress-show.php';
            }else{
                // Includes the file for creating the single show view
                return plugin_dir_path(__FILE__) . 'templates/archive-artistpress-show.php';
            }
        }
    }
    if(is_singular('show')){
        if ( file_exists( get_stylesheet_directory() . '/single-artistpress-show.php')){
         return get_stylesheet_directory() . '/single-artistpress-show.php';
        }else{
        // Includes the file for creating the single show view
        return plugin_dir_path(__FILE__) . 'templates/single-artistpress-show.php';
        }
    }
    return $original_template;
}
add_action('template_include','artistpress_show_templates');


/**
 *
 * Chooses the ArtistPress Gallery Templates.
 *
 * @author      LTDI Studios
 * @since       1.0.0
 *
 */
function artistpress_gallery_templates($original_template){
    if (get_query_var('post_type') !== 'artistpress-gallery'){
         return $original_template;
    }
    if(is_singular('artistpress-gallery')){
         if ( file_exists( get_stylesheet_directory() . '/single-artistpress-gallery.php')){
             return get_stylesheet_directory() . '/single-artistpress-gallery.php';
         }else{
            // Includes the file for creating the single show view
            return plugin_dir_path(__FILE__) . 'templates/single-artistpress-gallery.php';
         }
     }
     if(is_archive('artistpress-gallery')){
         if ( file_exists( get_stylesheet_directory() . '/archive-artistpress-gallery.php')){
             return get_stylesheet_directory() . '/archive-artistpress-gallery.php';
         }else{
            // Includes the file for creating the single show view
            return plugin_dir_path(__FILE__) . 'templates/archive-artistpress-gallery.php';
         }
     }     
     return $original_template;
}
add_action('template_include','artistpress_gallery_templates');