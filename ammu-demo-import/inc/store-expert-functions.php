<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}


/**
 *  Set Import files
 */

if ( ! function_exists( 'ammu_demo_import_store_expert_import_files' ) ) :
function ammu_demo_import_store_expert_import_files() {

	return array(
        array(
            'import_file_name'           => esc_html__('Demo 1', 'ammu-demo-import'),
            'import_file_url'          => AMMU_DEMO_IMPORT_URL . 'ocdi/store-expert/demo1/storeexpert.xml',
            'import_widget_file_url'   => AMMU_DEMO_IMPORT_URL . 'ocdi/store-expert/demo1/store-expert-widgets.wie',
            'import_customizer_file_url' => AMMU_DEMO_IMPORT_URL . 'ocdi/store-expert/demo1/store-expert-export.dat',    
            'import_preview_image_url'     => AMMU_DEMO_IMPORT_URL . 'ocdi/store-expert/demo1/demo1.png',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to change some menu links. Please check documentation for more information', 'spiraclethemes-site-library' ),
            'preview_url'                  => 'https://www.ammuthemes.com/store-expert/',
        ),
        array(
            'import_file_name'           => esc_html__('Demo 2', 'ammu-demo-import'),
            'import_file_url'          => AMMU_DEMO_IMPORT_URL . 'ocdi/store-expert/demo2/storeexpert.xml',
            'import_widget_file_url'   => AMMU_DEMO_IMPORT_URL . 'ocdi/store-expert/demo2/store-expert-widgets.wie',
            'import_customizer_file_url' => AMMU_DEMO_IMPORT_URL . 'ocdi/store-expert/demo2/store-expert-export.dat',       
            'import_preview_image_url'     => AMMU_DEMO_IMPORT_URL . 'ocdi/store-expert/demo2/demo2.png',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to change some menu links. Please check documentation for more information', 'spiraclethemes-site-library' ),
            'preview_url'                  => 'https://www.ammuthemes.com/store-expert/',
        ),
    );
}
endif;
add_filter( 'pt-ocdi/import_files', 'ammu_demo_import_store_expert_import_files' );


if ( ! function_exists( 'ammu_demo_import_store_expert_after_import_setup' ) ) :
function ammu_demo_import_store_expert_after_import_setup( $selected_import ) {
	// Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
    $top_menu = get_term_by( 'name', 'Top Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'catnav' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
            'topnav' => $top_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
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
add_action( 'pt-ocdi/after_import', 'ammu_demo_import_store_expert_after_import_setup' );


function ammu_demo_import_store_expert_check_pro_plugin() {
	if ( ! function_exists( 'ocdi_register_plugins' ) ) :
		function ocdi_register_plugins( $plugins ) {
		 
		  	// List of plugins used by all theme demos.
		  	$theme_plugins = [
			    [ 
			      'name'     => 'WooCommerce',
			      'slug'     => 'woocommerce',
			      'required' => true,
			    ],
			    [ 
			      'name'     => 'Regenerate Thumbnails',
			      'slug'     => 'regenerate-thumbnails',
			      'required' => true,
			    ],
                [ 
                  'name'     => 'Wishlist by YITH',
                  'slug'     => 'yith-woocommerce-wishlist',
                  'required' => true,
                ],
                [ 
                  'name'     => 'Quick View by YITH',
                  'slug'     => 'yith-woocommerce-quick-view',
                  'required' => true,
                ],
                [ 
                  'name'     => 'Advance Product Search',
                  'slug'     => 'th-advance-product-search',
                  'required' => true,
                ],
		  	];
		 
		  	return array_merge( $plugins, $theme_plugins );
		}
	endif;
	add_filter( 'ocdi/register_plugins', 'ocdi_register_plugins' );
}
add_action( 'admin_init', 'ammu_demo_import_store_expert_check_pro_plugin' );


/**
 * Add CSS.
 */
if ( ! function_exists( 'ammu_demo_import_store_expert_dynamic_css' ) ) :
function ammu_demo_import_store_expert_dynamic_css() {
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
add_action( 'admin_head', 'ammu_demo_import_store_expert_dynamic_css' );