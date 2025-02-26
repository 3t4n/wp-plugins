<?php
/**
 *
 * @package bootitems-library
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) :
    die;
endif;


/**
 *  Set Import files
 */

if ( ! function_exists( 'bootitems_library_helphealth_medical_set_import_files' ) ) :
function bootitems_library_helphealth_medical_set_import_files() {

return array(
        array(
            'import_file_name'           => esc_html__('Demo 1', 'bootitems-library'),
            'import_file_url'            => 'https://bootitems.com/files/helphealth-medical/content.xml',
            'import_widget_file_url'     => 'https://bootitems.com/files/helphealth-medical/widgets.wie',
            'import_customizer_file_url' => 'https://bootitems.com/files/helphealth-medical/customizer.dat',    
            'import_preview_image_url'   => 'https://bootitems.com/files/helphealth-medical/demo.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to change some menu links. Please check documentation for more information', 'bootitems-library' ),
            'preview_url'                => 'https://bootitems.com/wp/helphealth-medica/',
        ),
    );
}
endif;
add_filter( 'pt-ocdi/import_files', 'bootitems_library_helphealth_medical_set_import_files' );



if ( ! function_exists( 'bootitems_library_helphealth_medical_after_import_setup' ) ) :
function bootitems_library_helphealth_medical_after_import_setup( $selected_import ) {
	//Assign menus to their locations
	$main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );
	set_theme_mod( 'nav_menu_locations', array(
	      'primary' => $main_menu->term_id,
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
add_action( 'pt-ocdi/after_import', 'bootitems_library_helphealth_medical_after_import_setup' );


/**
 * Add CSS.
 */
if ( ! function_exists( 'bootitems_library_helphealth_medical_dynamic_css' ) ) :
function bootitems_library_helphealth_medical_dynamic_css() {
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
add_action( 'admin_head', 'bootitems_library_helphealth_medical_dynamic_css' );