<?php
/**
 * Plugin Name:         Any Post Import Export with ACF
 * Plugin URI:          https://profiles.wordpress.org/iflairwebtechnologies
 * Description:         A plugin to import and export specific posts content, custom fields, and featured images
 * Version:             1.1.2
 * Author:              iFlair Web Technologies Pvt. Ltd.
 * Author URI:          https://iflair.com/
 * Text Domain:         any-post-import-export-with-acf
 * License:             GPLv2 or later
 */

// PREVENT DIRECT ACCESS
if (!defined('ABSPATH')) {
    exit;
}
add_action('wp_enqueue_scripts', 'apie_enqueue_style_and_script' );
function apie_enqueue_style_and_script()
{
    wp_enqueue_style('apie-custom', plugin_dir_url(__FILE__) . 'assets/css/style.css', array(), time());

    wp_enqueue_script('jquery');
    wp_enqueue_script('apie-front-script', plugin_dir_url(__FILE__) . 'assets/js/scripts.js', array(), time(),false);
    wp_localize_script('apie-front-script', 'admin_ajax_object',array( 'ajax_url' => admin_url( 'admin-ajax.php' ),'curr_user' => get_current_user_id(),'nonce' => wp_create_nonce('ajax-nonce') ) );
}

// ADMIN ENQUEUE JQUERY AND CSS FILE FOR BACKEND
add_action('admin_enqueue_scripts', 'apie_admin_enqueue_style_and_script');
function apie_admin_enqueue_style_and_script()
{
    wp_enqueue_script('apie-admin-script', plugin_dir_url(__FILE__) . 'assets/js/admin_script.js', array('jquery'), time(),false);
    wp_localize_script('apie-admin-script', 'admin_ajaxObj', array('ajax_url' => admin_url('admin-ajax.php'), 'curr_user' => get_current_user_id()));

    wp_enqueue_style('apie-admin-style', plugin_dir_url(__FILE__) . 'assets/css/admin_style.css', array(), time());
}
// END, ADMIN ENQUEUE JQUERY AND CSS FILE FOR BACKEND

// CHECK IF ACF OR ACF PRO IS ACTIVE
function apie_check_acf_activation() {
    if (!is_plugin_active('advanced-custom-fields/acf.php') && !is_plugin_active('advanced-custom-fields-pro/acf.php')) {
        add_action('admin_notices', 'apie_acf_inactive_notice');
    }
}
add_action('admin_init', 'apie_check_acf_activation');

// FUNCTION TO DISPLAY NOTICE
function apie_acf_inactive_notice() {
    ?>
    <div class="notice notice-error">
        <p><?php esc_html_e('Any Post Import Export with ACF requires the Advanced Custom Fields plugin or Advanced Custom Fields Pro to be active. Please install and activate one of them.', 'any-post-import-export-with-acf'); ?></p>
    </div>
    <?php
}

// INCLUDE REQUIRED FILES
require_once plugin_dir_path(__FILE__) . 'includes/export-functions.php';
require_once plugin_dir_path(__FILE__) . 'includes/import-functions.php';
require_once plugin_dir_path(__FILE__) . 'includes/acf-functions.php';
require_once plugin_dir_path(__FILE__) . 'includes/media-functions.php';
require_once plugin_dir_path(__FILE__) . 'includes/utils.php';

// INCLUDE ACF IF NOT ALREADY INCLUDED
if (!class_exists('ACF')) {
    include_once(plugin_dir_path(__FILE__) . 'advanced-custom-fields/acf.php');
}

/**
 * ADD EXPORT LINK TO POST/PAGE ROW ACTIONS.
 */
function apie_add_post_row_actions($actions, $post) {
    // CHECK IF THE POST TYPE IS 'POST' OR 'PAGE'
    if ($post->post_type === 'post' || $post->post_type === 'page') {
        // GENERATE THE EXPORT URL WITH NONCE FOR SECURITY
        $export_url = wp_nonce_url(
            admin_url('admin-post.php?action=apie_export_post&post_id=' . $post->ID), 
            'apie_export_post'
        );
        
        // ADD THE EXPORT ACTION LINK TO THE ACTIONS ARRAY
        $actions['apie_export'] = '<a href="' . esc_url($export_url) . '">' . esc_html__('Export', 'any-post-import-export-with-acf') . '</a>';
    }

    // RETURN THE ACTIONS ARRAY
    return $actions;
}

// HOOK INTO POST_ROW_ACTIONS FILTER FOR POSTS
add_filter('post_row_actions', 'apie_add_post_row_actions', 10, 2);

// HOOK INTO PAGE_ROW_ACTIONS FILTER FOR PAGES
add_filter('page_row_actions', 'apie_add_post_row_actions', 10, 2);

/**
 * ADD IMPORT BUTTON AND FORM TO THE ADMIN FOOTER.
 */
function apie_add_import_button_script() {
    $screen = get_current_screen();
    if ($screen->base === 'edit' && ($screen->post_type === 'post' || $screen->post_type === 'page')) {
        ?>
        <div class="apie_import_btn_wrap">
            <li class="apie-import-button" id="apie-import-btn">
                <a href="#" class="button"><?php esc_attr_e('Import', 'any-post-import-export-with-acf'); ?></a>
            </li>
        </div>
        <div class="apie_import_form_wrap">
            <div class="wrap1" style="">
                <h1><?php printf( esc_html__( 'Import %s', 'any-post-import-export-with-acf' ), esc_html( $screen->post_type ) ); ?></h1>
                <form id="apie-import-form" method="post" enctype="multipart/form-data" action="<?php echo esc_url(admin_url('admin-post.php?action=apie_import_post')); ?>">
                    <input type="hidden" name="_wpnonce" value="<?php echo esc_attr(wp_create_nonce('apie_import_post')); ?>">
                    <label for="import_file"><?php esc_html__('Choose JSON File:', 'any-post-import-export-with-acf'); ?></label>
                    <input type="file" name="import_file" id="import_file">
                    <button type="submit" class="button button-primary">
                        <?php esc_html__('Import', 'any-post-import-export-with-acf'); ?>
                    </button>
                    <div id="validation-message" style="color: red; display: none;">
                        <?php esc_html__('Please select a file to import.', 'any-post-import-export-with-acf'); ?>
                    </div>
                </form>
            </div>
        </div>
        <?php
    }
}
add_action('admin_footer', 'apie_add_import_button_script');

// ADD EXPORT AND IMPORT ACTIONS
add_action('admin_post_apie_export_post', 'apie_export_post_action');
add_action('admin_post_apie_import_post', 'apie_import_post_action');