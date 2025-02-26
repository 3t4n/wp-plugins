<?php

// Ensure this file is only included from the main plugin
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class AioShortcodesAdminBar {

    // Constructor to hook into necessary actions
    public function __construct() {
        add_action( 'admin_bar_menu', array( $this, 'aiosc_add_admin_bar_menu' ), 5000 );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) ); // Enqueue the admin CSS
    }

   // Add custom admin bar menu for AIO Shortcodes and Other Shortcodes under a single widget
public function aiosc_add_admin_bar_menu( $wp_admin_bar ) {
    global $post;

    // Check if there's content to display
    if ( isset( $post->ID ) ) {
        $content = get_post_field( 'post_content', $post->ID );
        $shortcodes = $this->get_used_shortcodes( $content );

        // Separate AIO shortcodes and Other shortcodes into two arrays
        $aio_shortcodes = array_filter( $shortcodes, function( $shortcode ) {
            return strpos( $shortcode, 'aio_' ) === 0; // AIO shortcodes
        });

        $other_shortcodes = array_filter( $shortcodes, function( $shortcode ) {
            return strpos( $shortcode, 'aio_' ) !== 0; // Other shortcodes
        });

        // Get the total number of AIO shortcodes and Other shortcodes
        $aio_count = count( $aio_shortcodes );
        $other_count = count( $other_shortcodes );

        // Add a single parent item for AIO Shortcodes and Other Shortcodes with the total count and an icon
       $wp_admin_bar->add_node( array(
    'id'    => 'aio-shortcodes-widget',
    'title' => '<span class="aio-shortcodes-widget-title" style="display: flex; align-items: center;">' . 
               '<img src="' . plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/aio-menu-img.png" style="width: 18px; height: 18px; margin-right: 6px; margin-top: 4px; }" />' . 
               'AIO Shortcodes [' . ( $aio_count + $other_count ) . ']</span>', // Total count of shortcodes
    'meta'  => array( 'class' => 'ab-sub-wrapper' ),
    'href'  => '#'
));



        // Add category titles within the widget
        if ( $aio_count > 0 ) {
            $wp_admin_bar->add_node( array(
                'id'    => 'aio-shortcodes-title',
                'title' => 'Active AIO Shortcodes (' . $aio_count . ')',
                'parent' => 'aio-shortcodes-widget',
               'meta'  => array( 'class' => 'category-title' ),
               'href'  => '#'
            ));

            // Add submenu items for AIO Shortcodes under the AIO category
            foreach ( $aio_shortcodes as $shortcode ) {
                $wp_admin_bar->add_node( array(
                    'id'    => 'aio-shortcode-' . sanitize_title( $shortcode ),
                    'title' => '[' . $shortcode . ']', // Wrap shortcode with []
                    'parent' => 'aio-shortcodes-title',
                    'meta'  => array( 'class' => 'shortcode-item' ),
                ));
            }
        }

        if ( $other_count > 0 ) {
    $wp_admin_bar->add_node( array(
        'id'    => 'other-shortcodes-title',
        'title' => 'Other Shortcodes Used (' . $other_count . ')',
        'parent' => 'aio-shortcodes-widget',
        'meta'  => array( 'class' => 'category-title' ),
        'href'  => '#'
    ));

            // Add submenu items for Other Shortcodes under the Other category
            foreach ( $other_shortcodes as $shortcode ) {
                $wp_admin_bar->add_node( array(
                    'id'    => 'other-shortcode-' . sanitize_title( $shortcode ),
                    'title' => '[' . $shortcode . ']', // Wrap shortcode with []
                    'parent' => 'other-shortcodes-title',
                    'meta'  => array( 'class' => 'shortcode-item' ),
                ));
            }
        }


// Add 'Extras' link to useful resources
$wp_admin_bar->add_node( array(
    'id'    => 'aio-shortcodes-extras',
    'title' => 'Extras',
    'parent' => 'aio-shortcodes-widget',
    'meta'  => array( 'class' => 'category-title' ),
    'href'  => '#'
));



        // Add useful links under 'Extras'
        $wp_admin_bar->add_node( array(
            'id'    => 'aio-shortcodes-useful-links',
            'title' => 'Available Shortcodes',
            'parent' => 'aio-shortcodes-extras',
            'href'  => 'https://aioshortcodes.com/shortcodes/?utm_source=admin-bar&utm_medium=site-admin-bar&utm_campaign=aio-plugin',
            'meta'  => array( 'target' => '_blank' )
        ));

        $wp_admin_bar->add_node( array(
            'id'    => 'aio-shortcodes-documentation',
            'title' => 'Documentation',
            'parent' => 'aio-shortcodes-extras',
            'href'  => 'https://aioshortcodes.com/docs/?utm_source=admin-bar&utm_medium=site-admin-bar&utm_campaign=aio-plugin',
            'meta'  => array( 'target' => '_blank' )
        ));

        $wp_admin_bar->add_node( array(
            'id'    => 'aio-shortcodes-support',
            'title' => 'Free Support',
            'parent' => 'aio-shortcodes-extras',
            'href'  => 'https://wordpress.org/support/plugin/aio-shortcodes/',
            'meta'  => array( 'target' => '_blank' )
        ));

        $wp_admin_bar->add_node( array(
            'id'    => 'aio-shortcodes-rating',
            'title' => '5 Star Rating',
            'parent' => 'aio-shortcodes-extras',
            'href'  => 'https://wordpress.org/support/plugin/aio-shortcodes/reviews/?rate=5#new-post',
            'meta'  => array( 'target' => '_blank' )
        ));
    }
}

    
    
    
    

    // Extract shortcodes from the content
    private function get_used_shortcodes( $content ) {
        preg_match_all( '/\[(.*?)\]/', $content, $matches );
        return array_unique( $matches[1] ); // Return unique shortcodes.
    }

   // Enqueue the admin CSS
public function enqueue_admin_styles() {
    // Ensure styles are only added on the admin panel and not affecting the editor
    if ( is_admin() ) {
        $custom_style_css = '
        /* Style the category titles for shortcodes */
        #wp-admin-bar-aio-shortcodes-widget .category-title {
            font-weight: bold;
            font-size: 13px;
            color: #0073aa;
        }

        /* Style the individual shortcode items */
        #wp-admin-bar-aio-shortcodes-widget .shortcode-item {
            font-weight: normal;
            font-size: 12px;
            margin-left: 10px;
            font-style: italic;
            color: #555;
        }

        /* Additional styling for the whole admin bar widget */
        #wp-admin-bar-aio-shortcodes-widget .ab-sub-wrapper {
            padding: 5px;
        }

        /* Specific styles for the extras section */
        #wp-admin-bar-aio-shortcodes-widget #aio-shortcodes-extras {
            font-size: 12px;
            margin-top: 10px;
        }

        #wp-admin-bar-aio-shortcodes-widget #aio-shortcodes-extras a {
            color: #0073aa;
        }

        /* Avoid interfering with other admin bar elements */
        body.wp-admin #wpadminbar {
            background-color: #23282d; /* Default dark background for admin bar */
        }
        ';
        wp_add_inline_style( 'admin-bar', $custom_style_css );
    }
}


}
// Initialize the AioShortcodesAdminBar class
new AioShortcodesAdminBar();

?>
