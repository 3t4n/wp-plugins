<?php
/**
 * Plugin Name: Dadevarzan Beaver Builder Modules
 * Plugin URI: https://wordpress.org/plugins/dadevarzan-beaver-builder-modules
 * GitHub Plugin URI: https://github.com/dadevarzan/dadevarzan-beaverbuilder-modules
 * Description: Dadevarzan beaver builder custom modules and ready to use saved beaver builder layouts, templates, rows and modules.
 * Version: 1.5.0
 * Author: Dadevarzan Team
 * Author URI: http://www.dadevarzan.com
 * Text Domain: dadevarzan-beaverbuilder-modules
 */

define( 'FL_DADEVARZAN_DIR', plugin_dir_path( __FILE__ ) );
define( 'FL_DADEVARZAN_URL', plugins_url( '/', __FILE__ ) );
define( 'FL_MODULE_DADEVARZAN_DIR', FL_DADEVARZAN_DIR . 'modules/' );
define( 'FL_MODULE_DADEVARZAN_URL', FL_DADEVARZAN_URL . 'modules/' );

/**
 * Custom modules
 */
function fl_load_module_dadevarzan() {

	if ( class_exists( 'FLBuilder' ) ) {

        require_once FL_MODULE_DADEVARZAN_DIR . 'date-and-time/date-and-time.php';
        require_once FL_MODULE_DADEVARZAN_DIR . 'powered-by/powered-by.php';
        require_once FL_MODULE_DADEVARZAN_DIR . 'yoast-breadcrumbs/yoast-breadcrumbs.php';
	    require_once FL_MODULE_DADEVARZAN_DIR . 'scroll-add-class/scroll-add-class.php';
	    require_once FL_MODULE_DADEVARZAN_DIR . 'iran-map/iran-map.php';
	}
}
add_action( 'init', 'fl_load_module_dadevarzan' );

function dv_plugin_load_plugin_text_domain() {
    load_plugin_textdomain( 'dadevarzan-beaverbuilder-modules', FALSE, basename( dirname( __FILE__ ) ) . '/languages'  );
}

add_action( 'plugins_loaded', 'dv_plugin_load_plugin_text_domain' );

function dv_beaverbuilder_templates_load() {

    /**
     * Return if the builder isn't installed or if the current
     * version doesn't support registering templates.
     */
    if ( ! class_exists( 'FLBuilder' ) || ! method_exists( 'FLBuilder', 'register_templates' ) ) {
        return;
    }

    $templatePath = FL_DADEVARZAN_DIR . 'data/templates/templates.dat';
    if ( file_exists( $templatePath ) ) {
        FLBuilder::register_templates( $templatePath );
    }

    $templatePath = FL_DADEVARZAN_DIR . 'data/templates/header.dat';
    if ( file_exists( $templatePath ) ) {
        FLBuilder::register_templates( $templatePath );
    }

    $templatePath = FL_DADEVARZAN_DIR . 'data/templates/footer.dat';
    if ( file_exists( $templatePath ) ) {
        FLBuilder::register_templates( $templatePath );
    }
	
	//Only Enable Saved Rows on Development sites (webexir.com subdomains)
	if ( strpos(get_site_url(), 'webexir.com') !== false ) {
		$rowTemplatePath = FL_DADEVARZAN_DIR . 'data/rows/templates.dat';
		if ( file_exists( $rowTemplatePath ) ) {
			FLBuilder::register_templates( $rowTemplatePath );
		}
	}
	
    $moduleTemplatePath = FL_DADEVARZAN_DIR . 'data/modules/templates.dat';
    if ( file_exists( $moduleTemplatePath ) ) {
        FLBuilder::register_templates( $moduleTemplatePath );
    }

    $layoutTemplatePath = FL_DADEVARZAN_DIR . 'data/layouts/templates.dat';
    if ( file_exists( $layoutTemplatePath ) && class_exists( 'FLThemeBuilder' ) ) {
        FLBuilder::register_templates( $layoutTemplatePath );
    }

}

add_action( 'plugins_loaded', 'dv_beaverbuilder_templates_load' );
//beaver builder Field type for ACF
if (class_exists('acf', false)) {
    require_once FL_DADEVARZAN_DIR . 'integrations/acf.php';
    add_action( 'acf/include_field_types', 'dv_acf_field_fl_builder::init' );
}
