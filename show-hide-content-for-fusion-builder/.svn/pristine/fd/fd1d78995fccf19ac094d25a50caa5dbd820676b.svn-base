<?php
/** 
* Plugin Name:    Show Hide Content for Fusion Builder
* Plugin URI:     http://zetamatic.com
* Description:    This Plugin generates an extra element for Fusion Builder. It allows you to quickly create a button that shows/hides the content of your website. It helps your website look clean and compact, also allows users to click and see more information if they want. Some advantages of this are: robot defense, confirmation of user intent, page loads faster. It will work for every post, pages and custom post types.

* Author:         Zetamatic
* Version:        1.0.0
* Text Domain:    show-hide-content-fusion-builder
* Domain Path:    /languages/
* Author URI:     http://zetamatic.com/shop
*
* @package show_hide_content_fusion_builder
*/


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if ( ! defined( 'SHCFB_PLUGIN_FILE' ) ) {
   define( 'SHCFB_PLUGIN_FILE', __FILE__ );
}

// Define plugin version
define( 'SHCFB_PLUGIN_VERSION', '1.0.0' );


if ( ! class_exists( 'FusionBuilder' ) ) {
    add_action( 'admin_notices', 'shcfb_missing_fusion_builder_notice' );
    return;
} else {
    // Include the Show_Hide_Content_Fusion_Builder class.
    require_once dirname( __FILE__ ) . '/inc/class-show-hide-content.php';
}


/**
 * Admin notice for minimum PHP version.
 *
 * Warning when the site doesn't have the minimum required PHP version.
 *
 * @since 1.0.0
 *
 * @return void
 */
function shcfb_missing_fusion_builder_notice() {

    if ( isset( $_GET['activate'] ) ) {
        unset( $_GET['activate'] );
    }

    /* translators: 1. URL link. */
    echo wp_kses_post( '<div class="error"><p><strong>' . sprintf( esc_html__( 'Show Hide Content for Fusion Builder plugin requires FusionBuilder to be installed and active. Fusion Builder is the visual drag & drop plugin, free with Avada. You can download %s here.', 'show-hide-content-fusion-builder' ), '<a href="https://themeforest.net/item/avada-responsive-multipurpose-theme/2833226?ref=ThemeFusion" target="_blank">Avada | Fusion Builder</a>' ) . '</strong></p></div>' );
}
