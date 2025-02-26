<?php

/*
 * Plugin Name: Easy EDD For Elementor
 * Plugin URI: https://wordpress.org/plugins/easy-edd-for-elementor/
 * Description: EDD Addon for Elementor. Make EDD more usable with Elementor.
 * Version: 1.0.1
 * Author: Plugin Buffet
 * Author URI: https://pluginbuffet.com
 * Text Domain: ele-edd-addon
 * Contributors: rafiahmedd,imtitun,pluginbuffet
 * License: GPLv2 or later
*/
require_once __DIR__ . '/vendor/autoload.php';

use EasyEddForElementor\Widgets\EasyEddForElementorProductsWidget;
use EasyEddForElementor\Widgets\EasyEddForElementorSelectedWidget;
use EasyEddForElementor\Widgets\EasyEddForElementorSliderWidget;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
// Don't activate this plugin if EDD is not active
register_activation_hook(
    __FILE__,
    function() {
        if ( ! class_exists( 'Easy_Digital_Downloads' ) ) {
            exit( 'Please install and activate <a href="https://wordpress.org/plugins/easy-digital-downloads/">Easy Digital Downloads</a> plugin first.' );
        }
    }
);

/**
 * Register EDD Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function registerAddonForEasyEDDForEl ( $widgets_manager )
{
    $widgets_manager->register( new EasyEddForElementorProductsWidget() );
    $widgets_manager->register( new EasyEddForElementorSelectedWidget() );
    $widgets_manager->register( new EasyEddForElementorSliderWidget() );
}
add_action('elementor/widgets/register', 'registerAddonForEasyEDDForEl');

// Let's register a new category for our widget
function registerAddonCategoryForEasyEDDForEl( $elements_manager ) {
    $elements_manager->add_category(
        'edd',
        [
            'title' => __( 'Easy EDD For Elementor', 'ele-edd-addon' ),
            'icon' => plugins_url( 'assets/images/icon.png', __FILE__ ),
            'active' => true,
        ]
    );

}
add_action( 'elementor/elements/categories_registered', 'registerAddonCategoryForEasyEDDForEl' );

if ( ! defined( 'EASY_EDD_FOR_ELEMENTOR_DIR' ) ) {
    define( 'EASY_EDD_FOR_ELEMENTOR_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'EASY_EDD_FOR_ELEMENTOR_ASSETS_DIR' ) ) {
    define( 'EASY_EDD_FOR_ELEMENTOR_ASSETS_DIR', plugin_dir_path( __FILE__ ) . "widgets/assets/" );
}

if (! defined( 'EASY_EDD_FOR_ELEMENTOR_ASSETS_URL' ) ) {
    define( 'EASY_EDD_FOR_ELEMENTOR_ASSETS_URL', plugin_dir_url( __FILE__ ) . "widgets/assets/" );
}