<?php
/**
 * Plugin Name: Grid Button for Learndash
 * Plugin URI: https://wptrat.com/grid-button-for-learndash/
 * Description: Grid Button for Learndash is the ultimate way to define custom texts and styles for courses buttons on the LearnDash Course Grid.
 * Author: Luis Rock
 * Author URI: https://wptrat.com/
 * Version: 1.0.1
 * Text Domain: trgb-grid-button
 * Domain Path: /languages
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package LearnDash Button Text
 */

if ( ! defined( 'ABSPATH' ) ) exit;
		
// Check if LearnDash is active. If not, deactivate...
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if( !is_plugin_active('sfwd-lms/sfwd_lms.php' ) ) {
    add_action( 'admin_init', 'trgb_deactivate' );
    add_action( 'admin_notices', 'trgb_admin_notice' );
    function trgb_deactivate() {
        deactivate_plugins( plugin_basename( __FILE__ ) );
    }
    // Notice
    function trgb_admin_notice() { ?>
        <div class="notice notice-error is-dismissible">
            <p>
                <strong>
                    <?php echo esc_html_e( 'LearnDash LMS is not active: BUTTON TEXT FOR LEARNDASH needs it, that\'s why was deactivated', 'trgb-grid-button' ); ?>
                </strong>
            </p>
            <button type="button" class="notice-dismiss">
                <span class="screen-reader-text">
                    Dismiss this notice.
                </span>
            </button>
        </div><?php
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] ); 
        }        
    }
}

require_once('admin/trgb-settings.php');
require_once('includes/functions.php');


//ADMIN CSS
function trgb_enqueue_admin_script( $hook ) {
    global $trgb_settings_page;
	if( $hook != $trgb_settings_page ) {
        return;
    }
    wp_enqueue_style('trgb_admin_style', plugins_url('assets/css/trgb_admin.css',__FILE__ ));
    wp_register_script ('trgb_admin_js', plugins_url('assets/js/trgb_admin.js',__FILE__ ), [],'1.0.0',true);
    wp_enqueue_script('trgb_admin_js');
}
add_action( 'admin_enqueue_scripts', 'trgb_enqueue_admin_script' );

add_filter( 
    'learndash_course_grid_custom_button_text', 
    'trgb_course_grid_custom_button_text', 
    999,
    2
);

add_filter(
    'learndash_course_grid_html_output', 
    'trgb_course_grid_custom_button_style',
    999,
    4
);