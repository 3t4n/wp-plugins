<?php
/*
Plugin Name: Featured Posts Scroll
Plugin URI: http://chasepettit.com
Description: A basic javascript based scrolling display of post titles and thumbnails.
Version: 1.25
Author: Chaser324
Author URI: http://chasepettit.com
License: GNU GPL2

/*  Copyright 2011  Chase Pettit  (email : chasepettit@gmail.com)

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


// Register activate/deactivate hooks for the plugin
register_activation_hook( __FILE__, 'fps_activate' );
register_deactivation_hook( __FILE__, 'fps_deactivate' );

//Create menu for configure page
add_action('admin_menu', 'fps_admin_actions');

//Add the necessary stylesheet & script
add_action('wp_print_styles', 'fps_add_style');
add_action('init', 'fps_add_script');

// Register new image thumbnail sizes
add_action('admin_init', 'fps_define_image_sizes');

// Array of pairs of variable names and default values.
global $fps_variables;
$fps_variables = array (
    'fps_max_posts' => '5',
    'fps_image_full_size' => '0',
    'fps_title_color' => 'ffffff',
    'fps_excerpt_color' => 'ffffff',
    'fps_heading_color' => 'b3320f',
    'fps_heading_text' => 'Featured Posts',
    'fps_bg_color' => '1b1b1b',
    'fps_textbg_color' => '000000',
    'fps_textbg_alpha' => '0.5',
    'fps_innershadow_color' => '000000',
    'fps_outershadow_color' => '000000',
    'fps_arrow_color' => 'orange',
    'fps_display_title' => '1',
    'fps_display_excerpt' => '1',
    'fps_display_heading' => '0',
    'fps_autoscroll' => '1',
    'fps_corner_radius' => '5px',
    'fps_dropshadow_x' => '0',
    'fps_dropshadow_y' => '5',
    'fps_dropshadow_blur' => '5',
    'fps_dropshadow_spread' => '0',
    'fps_outer_corner_radius' => '5px',
    'fps_outer_dropshadow_x' => '0',
    'fps_outer_dropshadow_y' => '5',
    'fps_outer_dropshadow_blur' => '5',
    'fps_outer_dropshadow_spread' => '0',
    'fps_height' => '245',
    'fps_width' => '550',
    'fps_display_slidenumbers' => '1',
    'fps_arrow_position' => 'below',
    'fps_arrow_custom_url' => '',
    'fps_selectedslide_textcolor' => 'ffffff',
    'fps_unselectedslide_textcolor' => 'ffffff',
    'fps_selectedslide_bgcolor' => '303030',
    'fps_unselectedslide_bgcolor' => '545454',
    'fps_selectedslide_bold' => '1',
    'fps_selectedslide_italics' => '0',
    'fps_unselectedslide_bold' => '1',
    'fps_unselectedslide_italics' => '0',
    'fps_slide_bgradius' => '2.0',
    'fps_selectedslide_dropshadow_x' => '0',
    'fps_selectedslide_dropshadow_y' => '2',
    'fps_selectedslide_dropshadow_blur' => '2',
    'fps_selectedslide_dropshadow_spread' => '0',
    'fps_selectedslide_inset' => '1',
    'fps_unselectedslide_dropshadow_x' => '0',
    'fps_unselectedslide_dropshadow_y' => '0',
    'fps_unselectedslide_dropshadow_blur' => '0',
    'fps_unselectedslide_dropshadow_spread' => '0',
    'fps_unselectedslide_inset' => '0',
    'fps_selectedslide_dropshadow_color' => '000000',
    'fps_unselectedslide_dropshadow_color' => '000000',
    'fps_slide_textshadow_x' => '0',
    'fps_slide_textshadow_y' => '1',
    'fps_slide_textshadow_blur' => '0',
    'fps_slide_textshadow_color' => '000000',
    'fps_title_font' => '',
    'fps_excerpt_font' => '',
    'fps_heading_font' => '',
    'fps_selectedslide_font' => '',
    'fps_unselectedslide_font' => '',
    'fps_title_fontstyle' => '',
    'fps_excerpt_fontstyle' => '',
    'fps_heading_fontstyle' => '',
    'fps_selectedslide_fontstyle' => '',
    'fps_unselectedslide_fontstyle' => '',
    'fps_title_fontvariant' => '',
    'fps_excerpt_fontvariant' => '',
    'fps_heading_fontvariant' => '',
    'fps_selectedslide_fontvariant' => '',
    'fps_unselectedslide_fontvariant' => '',
    'fps_title_fontweight' => 'bold',
    'fps_excerpt_fontweight' => '',
    'fps_heading_fontweight' => 'bold',
    'fps_selectedslide_fontweight' => 'bold',
    'fps_unselectedslide_fontweight' => 'bold',
    'fps_title_fontsize' => '12pt',
    'fps_excerpt_fontsize' => '10pt',
    'fps_heading_fontsize' => '18pt',
    'fps_selectedslide_fontsize' => '10pt',
    'fps_unselectedslide_fontsize' => '10pt',
    'fps_title_fontheight' => '',
    'fps_excerpt_fontheight' => '10pt',
    'fps_heading_fontheight' => '',
    'fps_selectedslide_fontheight' => '14pt',
    'fps_unselectedslide_fontheight' => '14pt',
    'fps_scroll_speed' => '1000',
    'fps_scroll_fadeInSpeed' => '200',
    'fps_scroll_fadeOutSpeed' => '100',
    'fps_scroll_interval' => '7000',
    'fps_image_bg_color' => '000000',
    'fps_image_scale' => '1',
    'fps_image_height_noscale' => '0',
    'fps_image_width_noscale' => '0',
    'fps_image_height_stretch' => '1',
    'fps_image_width_stretch' => '1',

    'fps_enable_static_caching' => '0'
);

/* Activate the plugin by creating/initializing all options */
function fps_activate()
{
    global $fps_variables;

    foreach ($fps_variables as $var=>$default) {
        $current_value = get_option($var);
        if ( empty($current_value) ) {
            update_option($var, $default);
        }
    }

    if (get_option('fps_enable_static_caching') == '1')
    {
        // Attempt to generate static JS file.
        ob_start();

            include(WP_PLUGIN_DIR.'/featured-posts-scroll/js/fps.js.php');

            $file_contents = ob_get_contents();
            $file_path = WP_PLUGIN_DIR.'/featured-posts-scroll/js/fps.js';
            $ret_val = file_put_contents($file_path, $file_contents);
        
        ob_end_clean();

        // Attempt to generate static CSS file.
        ob_start();

            include(WP_PLUGIN_DIR.'/featured-posts-scroll/css/fps.css.php');

            $file_contents = ob_get_contents();
            $file_path = WP_PLUGIN_DIR.'/featured-posts-scroll/css/fps.css';
            $ret_val = file_put_contents($file_path, $file_contents);
        
        ob_end_clean();
    }
}

/* Deactivate plugin by deleting all option data */
function fps_deactivate()
{
    global $fps_variables;

    foreach ($fps_variables as $var) {
        delete_option($var);
    }
}

/* Setup menu page creation */
function fps_admin_actions()
{
    $page = add_menu_page('Featured Posts Scroll', 'Featured Posts Scroll', 'manage_options', 'featured-posts-scroll', 'fps_admin');
    
    add_action( 'admin_print_styles-' . $page, 'fps_menu_styles' );
}

/* Display the admin page if user has permissions */
function fps_admin() {
    if ( !current_user_can('manage_options') )
        wp_die( __('You do not have sufficient permissions to access this page.') );
    include('featured-posts-scroll-admin.php');
}

/* Enqueue stylesheets needed on the admin page */
function fps_menu_styles()
{
    wp_enqueue_style( 'jcolorpicker-style', WP_PLUGIN_URL.'/featured-posts-scroll/css/colorpicker.css' );
    wp_enqueue_style( 'jquery-ui-tabs-css','http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/cupertino/jquery-ui.css' );
}

/* Enqueue styles necessary for the plugin */
function fps_add_style()
{
    wp_enqueue_style('fps-style', WP_PLUGIN_URL.'/featured-posts-scroll/css/featuredposts.css');
    
    if (get_option('fps_enable_static_caching') == '1' && file_exists(WP_PLUGIN_DIR.'/featured-posts-scroll/css/fps.css'))
    {
        wp_enqueue_style('fps-style-dynamic', WP_PLUGIN_URL.'/featured-posts-scroll/css/fps.css');
    }
    else
    {
        wp_enqueue_style('fps-style-dynamic', WP_PLUGIN_URL.'/featured-posts-scroll/css/fps.css.php');
    }
}

/* Enqueue scripts necessary for the plugin */
function fps_add_script()
{
    if (!is_admin()) {
        wp_enqueue_script('jquery');

        if(get_option('fps_enable_static_caching') == '1' && file_exists(WP_PLUGIN_DIR.'/featured-posts-scroll/js/fps.js'))
        {
            wp_enqueue_script('fps-js-dynamic', WP_PLUGIN_URL.'/featured-posts-scroll/js/fps.js');
        }
        else
        {
            wp_enqueue_script('fps-js-dynamic', WP_PLUGIN_URL.'/featured-posts-scroll/js/fps.js.php');
        }
    }
    else {
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_script('featuredpostslides-admin', WP_PLUGIN_URL.'/featured-posts-scroll/js/fps-admin.js');
        wp_enqueue_script('jcolorpicker', WP_PLUGIN_URL.'/featured-posts-scroll/js/colorpicker.js');
        wp_enqueue_script('admincolors', WP_PLUGIN_URL.'/featured-posts-scroll/js/admincolors.js');
    }
}

/* Define image sizes used by the plugin */
function fps_define_image_sizes()
{
    //add_theme_support( 'post-thumbnails' ); // Add support for posts
    $post_height = get_option('fps_height');
    $post_width = get_option('fps_width');
    $post_image_scale = get_option('fps_image_scale');
    $post_image_height_noscale = get_option('fps_image_height_noscale');
    $post_image_width_noscale = get_option('fps_image_width_noscale');

    $post_image_scale_bool = true;
    if ($post_image_scale == '0')
    {
        $post_image_scale_bool = false;
    }

    $post_width -= 45;
    $post_height -= 20;

    if ($post_image_height_noscale == '1' && $post_image_scale_bool == false)
    {
        $post_height = 9999;
    }

    if ($post_image_width_noscale == '1' && $post_image_scale_bool == false)
    {
        $post_width = 9999;
    }

    add_image_size( 'fps-post', ($post_width), ($post_height), $post_image_scale_bool );
}

/* Generate the plugin display */
function fps_show($atts)
{
    // Retrieve all admin options
    $max_posts = get_option('fps_max_posts');
    
    $post_display_title = get_option('fps_display_title');
    $post_display_excerpt = get_option('fps_display_excerpt');
    $post_display_heading = get_option('fps_display_heading');
    $post_display_slidenumbers = get_option('fps_display_slidenumbers');

    $post_heading_text = get_option('fps_heading_text');

    $post_arrow_position = get_option('fps_arrow_position');

    $fps_image_full_size = get_option('fps_image_full_size');

    $wrapper_classes .= "featured-posts-wrapper fps-single";
    $ul_classes .= "featured-posts fps-single";
    $bg_classes .= "featured-posts-background fps-single";
    $li_classes = "";

    // Generate the main output.    
    $output .= '<!--Automatic Image Slider w/ CSS & jQuery with some customization-->';

    // div#featured-posts-wrapper
    $output .= '<div class="'.$wrapper_classes.'">';
    
    // Display heading if option selected
    if ($post_display_heading == '1')
    {
        $output .= '<p class="featured-posts-header">'.$post_heading_text.'</p>';
    }

    // Add left arrow and open unordered list
    if ($post_arrow_position == 'sides' || $post_arrow_position == 'borderless')
    {
        $output .= '<div class="scrollFeaturedPostsLeft"></div>';
    }
    $output .= '<ul class="'.$ul_classes.'">';

    // Generate arguments for query
    $post_details = NULL;
    if ($atts == NULL)
    {
        $args = array(
            'numberposts'     => $max_posts,
            'offset'          => 0,
            'category'        => '',
            'orderby'         => 'post_date',
            'order'           => 'DESC',
            'include'         => '',
            'exclude'         => '',
            'post_type'       => 'post',
            'tag'             => '',
            'post_status'     => 'publish' );
    }
    else
    {
        $args = $atts;
        $args['numberposts'] = $max_posts;
        $args['post_status'] = 'publish';
    }
    $recent_posts = get_posts( $args );

    if ( count($recent_posts)< $max_posts ) {
        $max_posts = count($recent_posts);
    }

    // Save currently selected post if one exists
    global $post;
    $temp_post = $post;

    // Get details for each article retrieved in query
    foreach ( $recent_posts as $key=>$val ) 
    {
        setup_postdata($val);
        $post_details[$key]['post_title'] = $val->post_title;
        $post_details[$key]['post_excerpt'] = $val->post_excerpt;
        $post_details[$key]['post_permalink'] = get_permalink($val->ID);
        if (has_post_thumbnail($val->ID))
        {
            if ($fps_image_full_size == '0')
            {
                $post_details[$key]['post_img_src'] = wp_get_attachment_image_src( get_post_thumbnail_id($val->ID), 'fps-post');
            }
            else
            {
                $post_details[$key]['post_img_src'] = wp_get_attachment_image_src( get_post_thumbnail_id($val->ID), 'full');
            }
        }
        else
        {
            $post_details[$key]['post_img_src'][0] = '';
        }
    }

    // Restore previous post data if there was any.
    if ($temp_post != NULL)
    {
        $post = $temp_post;
        setup_postdata($post);
    }

    // Generate list item for each post retrieved in queue
    for ( $i = 0; $i < $max_posts; $i++ )
    {
        $post_permalink = $post_details[$i]['post_permalink'];
        $post_title = $post_details[$i]['post_title'];
        $post_excerpt = $post_details[$i]['post_excerpt'];
        $post_img = $post_details[$i]['post_img_src'][0];


        $output .= '<li class="'.$li_classes.'" >';
            $output .= '<div class="fps-image-div" >';
                $output .= '<a href="'.$post_permalink.'">';
                    $output .= '<img class="fps-image" src="'.$post_img.'" />';
                $output .= '</a>';
            $output .= '</div>';


            $output .= '<div class="fps-text">';
                if ($post_display_title == '1')
                {
                    $output .= '<a href="'.$post_permalink.'">';
                        $output .= '<p class="fps-title">'.$post_title.'</p>';
                    $output .= '</a>';
                }
                if ($post_display_excerpt == '1')
                {
                    $output .= '<a href="'.$post_permalink.'">';
                        $output .= '<p class="fps-excerpt">'.$post_excerpt.'</p>';
                    $output .= '</a>';
                }
            $output .= '</div>';
        $output .= '</li>';
    }
    $output .= '</ul>';
    if ($post_arrow_position == 'sides' || $post_arrow_position == 'borderless')
    {
        $output .= '<div class="scrollFeaturedPostsRight"></div>';
    }

    if ($post_display_slidenumbers == '1' && $post_arrow_position != 'borderless')
    {
        // Populate fps-slideNumberList li classes based on admin options
        $output .= '<ul class="fps-slideNumberList">';
        $output .= '<li class="fps-selectedSlide" title="'.$post_details[0]['post_title'].'">1</li>';
        for ( $i = 2; $i <= count($recent_posts) && $i <= $max_posts; $i++ )
        {
            $output .= '<li title="'.$post_details[($i-1)]['post_title'].'">'.$i.'</li>';
        }

        $output .= '</ul>';
    }

    if ($post_arrow_position == 'below')
    {
        $output .= '<div class="scrollFeaturedPostsRight-below"></div>';
        $output .= '<div class="scrollFeaturedPostsLeft-below"></div>';            
    }


    if ($post_arrow_position != 'borderless')
    {
        $output .= '<div class="'.$bg_classes.'"></div>';    
    }
    
    $output .= '</div>'; // div#featured-posts-wrapper
    
    return $output;
}

// Handle short code
function fps_shortcode_handler($atts)
{
    return fps_show($atts);
}

// Add the short code [fps]
add_shortcode('fps', 'fps_shortcode_handler');

?>