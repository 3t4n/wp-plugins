<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}


/**
 *  Set Import files
 */

if ( ! function_exists( 'ammu_demo_import_real_estate_vital_import_files' ) ) :
function ammu_demo_import_real_estate_vital_import_files() {

	return array(
        array(
            'import_file_name'           => esc_html__('Main Demo', 'ammu-demo-import'),
            'import_file_url'          => AMMU_DEMO_IMPORT_URL . 'ocdi/real-estate-vital/demo1/demo1-content.xml',
            'import_widget_file_url'   => AMMU_DEMO_IMPORT_URL . 'ocdi/real-estate-vital/demo1/demo1-widgets.wie',
            'import_customizer_file_url' => AMMU_DEMO_IMPORT_URL . 'ocdi/real-estate-vital/demo1/demo1-customizer.dat',    
            'import_preview_image_url'     => AMMU_DEMO_IMPORT_URL . 'ocdi/real-estate-vital/demo1/demo1.png',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to change some menu links. Please check documentation for more information', 'spiraclethemes-site-library' ),
            'preview_url'                  => 'https://www.ammuthemes.com/real-estate-vital/',
        ),
        array(
            'import_file_name'           => esc_html__('Demo with Latest Posts', 'ammu-demo-import'),
            'import_file_url'          => AMMU_DEMO_IMPORT_URL . 'ocdi/real-estate-vital/demo2/demo2-content.xml',
            'import_widget_file_url'   => AMMU_DEMO_IMPORT_URL . 'ocdi/real-estate-vital/demo2/demo2-widgets.wie',
            'import_customizer_file_url' => AMMU_DEMO_IMPORT_URL . 'ocdi/real-estate-vital/demo2/demo2-customizer.dat',    
            'import_preview_image_url'     => AMMU_DEMO_IMPORT_URL . 'ocdi/real-estate-vital/demo2/demo2.png',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to change some menu links. Please check documentation for more information', 'spiraclethemes-site-library' ),
            'preview_url'                  => 'https://www.ammuthemes.com/real-estate-vital/',
        ),
    );
}
endif;
add_filter( 'pt-ocdi/import_files', 'ammu_demo_import_real_estate_vital_import_files' );


if ( ! function_exists( 'ammu_demo_import_real_estate_vital_after_import_setup' ) ) :
function ammu_demo_import_real_estate_vital_after_import_setup( $selected_import ) {
	// Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'catnav' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
        )
    );

    //Assign front & blog page
    $front_page = get_page_by_title( 'Home' );  
    $blog_page = get_page_by_title( 'Blog' );  

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page -> ID );    
    update_option( 'page_for_posts', $blog_page -> ID ); 
    
}
endif;
add_action( 'pt-ocdi/after_import', 'ammu_demo_import_real_estate_vital_after_import_setup' );


function ammu_demo_import_real_estate_vital_check_pro_plugin() {
	if ( ! function_exists( 'ocdi_register_plugins' ) ) :
		function ocdi_register_plugins( $plugins ) {
		 
		  	// List of plugins used by all theme demos.
		  	$theme_plugins = [
			    [ 
			      'name'     => 'Essential Real Estate',
			      'slug'     => 'essential-real-estate',
			      'required' => true,
			    ],
			    [ 
			      'name'     => 'Regenerate Thumbnails',
			      'slug'     => 'regenerate-thumbnails',
			      'required' => true,
			    ],
		  	];
		 
		  	return array_merge( $plugins, $theme_plugins );
		}
	endif;
	add_filter( 'ocdi/register_plugins', 'ocdi_register_plugins' );
}
add_action( 'admin_init', 'ammu_demo_import_real_estate_vital_check_pro_plugin' );


/**
 * Add CSS.
 */
if ( ! function_exists( 'ammu_demo_import_real_estate_vital_dynamic_css' ) ) :
function ammu_demo_import_real_estate_vital_dynamic_css() {
	?>
  		<style type="text/css" id="colon-admin-style">
    		.ocdi-install-plugins-content-content label:nth-child(-n+3) {
				display: none !important;
			}

			.ocdi-install-plugins-content-content .ocdi-content-notice--warning {
				display: none;
			}
  		</style>
	<?php 
}
endif;
add_action( 'admin_head', 'ammu_demo_import_real_estate_vital_dynamic_css' );