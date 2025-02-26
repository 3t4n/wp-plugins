<?php
/**
 * Plugin Name: Ht Service
 * Description: Roofing Service WordPress Plugin
 * Plugin URI: http://demo.wphash.com/shieldem
 * Version: 1.1.3
 * Author: HT Plugins
 * Author URI: https://htplugins.com/
 * License:  GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: htservice
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'HTSERVICE_VERSION', '1.1.3' );
define( 'HTSERVICE_ADDONS_PL_URL', plugins_url( '/', __FILE__ ) );
define( 'HTSERVICE_ADDONS_PL_PATH', plugin_dir_path( __FILE__ ) );
define( 'HTSERVICE_ADDONS_PL_ROOT', __FILE__ );

// Required File
require_once HTSERVICE_ADDONS_PL_PATH.'includes/helper-function.php';
require_once HTSERVICE_ADDONS_PL_PATH.'init.php';
require_once HTSERVICE_ADDONS_PL_PATH.'admin/init.php';

add_filter('single_template', 'htservice_single_template_modify');

function htservice_single_template_modify($single) {
    global $post;
    /* Checks for single template by post type */
    if ( $post->post_type == 'htservice' ) {
        if ( file_exists( HTSERVICE_ADDONS_PL_PATH . 'includes/single-htservice.php' ) ) {
            return HTSERVICE_ADDONS_PL_PATH . 'includes/single-htservice.php';
        }
    }
    return $single;
}

add_filter('archive_template', 'htservice_archive_modify');

function htservice_archive_modify($archive) {
    global $post;
    /* Checks for archive template by post type */
    if ( $post->post_type == 'htservice' ) {
        if ( file_exists( HTSERVICE_ADDONS_PL_PATH . 'includes/archive-htservice.php' ) ) {
            return HTSERVICE_ADDONS_PL_PATH . 'includes/archive-htservice.php';
        }
    }
    return $archive;
}

/**
 * Get the value of a settings field
 *
 * @param string $option settings field name
 * @param string $section the section name this field belongs to
 * @param string $default default text if it's not found
 *
 * @return mixed
 */
function htservice_get_option( $option, $section, $default = '' ) {
    $options = get_option( $section );
    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }
    return $default;
}


// Check Plugins is Installed or not
function htservice_is_plugins_active( $pl_file_path = NULL ){
    $installed_plugins_list = get_plugins();
    return isset( $installed_plugins_list[$pl_file_path] );
}
// This notice for Cmb2 is not installed or activated or both.

function htservice_check_cmb2_status(){
    $cmb2 = 'cmb2/init.php';
    if( htservice_is_plugins_active($cmb2) ) {
        if( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        $activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $cmb2 . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $cmb2 );
        $message = __( '<strong>HT Service Plugin</strong> Requires Cmb2 plugin to be active. Please activate Cmb2 to continue.', 'htservice' );
        $button_text = __( 'Activate CMB2', 'htservice' );
    } else {
        if( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        $activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=cmb2' ), 'install-plugin_cmb2' );
        $message = sprintf( __( '<strong>htservice Addons for Cmb2</strong> requires %1$s"Cmb2"%2$s plugin to be installed and activated. Please install Cmb2 to continue.', 'htservice' ), '<strong>', '</strong>' );
        $button_text = __( 'Install Cmb2', 'htservice' );
    }
    $button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';
    printf( '<div class="error"><p>%1$s</p>%2$s</div>', __( $message ), $button );
}


if( ! defined( 'CMB2_LOADED' )) {
    add_action( 'admin_init', 'htservice_check_cmb2_status' );
}

/*
 * Display tabs related to Serives in admin when user
 * viewing/editing Movie/category/tags.
 */
function htservice_tabs($view) {
    if ( ! is_admin() ) {
        return;
    }
    $admin_tabs = apply_filters(
        'htservice_tabs_info',
        array(

            10 => array(
                "link" => "edit.php?post_type=htservice",
                "name" => __( "Service", "htservice" ),
                "id"   => "edit-htservice",
            ),

            20 => array(
                "link" => "edit-tags.php?taxonomy=htservice_category&post_type=htservice",
                "name" => __( "Categories", "htservice" ),
                "id"   => "edit-htservice_category",
            ),

        )
    );
    ksort( $admin_tabs );
    $tabs = array();
    foreach ( $admin_tabs as $key => $value ) {
        array_push( $tabs, $key );
    }
    $pages = apply_filters(
        'htservice_admin_tabs_on_pages',
        array( 'edit-htservice', 'edit-htservice_category', 'htservice' )
    );
    $admin_tabs_on_page = array();
    foreach ( $pages as $page ) {
        $admin_tabs_on_page[ $page ] = $tabs;
    }

    $current_page_id = get_current_screen()->id;
    $current_user    = wp_get_current_user();
    if ( ! in_array( 'administrator', $current_user->roles ) ) {
        return;
    }
    if ( ! empty( $admin_tabs_on_page[ $current_page_id ] ) && count( $admin_tabs_on_page[ $current_page_id ] ) ) {
        echo '<h2 class="nav-tab-wrapper lp-nav-tab-wrapper">';
        foreach ( $admin_tabs_on_page[ $current_page_id ] as $admin_tab_id ) {

            $class = ( $admin_tabs[ $admin_tab_id ]["id"] == $current_page_id ) ? "nav-tab nav-tab-active" : "nav-tab";
            echo '<a href="' . admin_url( $admin_tabs[ $admin_tab_id ]["link"] ) . '" class="' . $class . ' nav-tab-' . $admin_tabs[ $admin_tab_id ]["id"] . '">' . $admin_tabs[ $admin_tab_id ]["name"] . '</a>';
        }
        echo '</h2>';
    }
    return $view;
}

add_filter('views_edit-htservice','htservice_tabs');
add_action('htservice_category_pre_add_form','htservice_tabs');

add_action( 'wsa_form_bottom_pro_themes', 'htservice_pro_tab_advertise' );
function htservice_pro_tab_advertise(){
    echo '<h3> <a target="_blank" href="https://demo.hasthemes.com/wp/shield/sheild-wp.html">
Shield - Roofing Service WordPress Theme</a><h3/> <a target="_blank" href="https://demo.hasthemes.com/wp/shield/sheild-wp.html"><img alt="Roofing Service" src="https://themeforest.img.customer.envatousercontent.com/files/346303361/01_preview_shield.__large_preview.jpg?auto=compress%2Cformat&q=80&fit=crop&crop=top&max-h=8000&max-w=590&s=cf93fc23b5681cb99d5b494ee9f5e440"></a>';
}

/**
* Elementor Version check
* Return boolean value
*/
function htservice_is_elementor_version( $operator = '<', $version = '2.6.0' ) {
    return defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, $version, $operator );
}

// Compatibility with elementor version 3.6.1
function htservice_widget_register_manager($widget_class){
    $widgets_manager = \Elementor\Plugin::instance()->widgets_manager;
    
    if ( htservice_is_elementor_version( '>=', '3.5.0' ) ){
        $widgets_manager->register( $widget_class );
    }else{
        $widgets_manager->register_widget_type( $widget_class );
    }
}