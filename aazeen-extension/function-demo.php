<?php
/**
 * aazeen extension
 *
 * @package Themez WP
 * @subpackage aazeen extension
 * @since aazeen_extension 1.0.0
 */

 defined('ABSPATH') or die("No script kiddies please!");

  function aazeen_extension_import_files() {
   global $AAZEEN_EXTEN_file, $AAZEEN_EXTEN_dir, $AAZEEN_EXTEN_uri;
   $plugin_active = (! is_plugin_active( 'siteorigin-panels/siteorigin-panels.php' ) || ! is_plugin_active( 'widgets-for-siteorigin/widgets-for-siteorigin.php' ));



	return array(
		array(
			'import_file_name'             => 'Default',
			'categories'                   => array( 'Home Page' ),
			'local_import_file'            => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/default/demo.xml',
			'local_import_widget_file'     => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/default/demo.wie',
			'local_import_customizer_file' => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/default/demo.dat',
			'import_preview_image_url'     => $AAZEEN_EXTEN_uri . "/demo/default/demo.jpg",
			'preview_url'                  => 'http://themezdemo.com/aazeen/default/',
		),
    array(
      'import_file_name'             => 'Business 1',
      'categories'                   => array( 'Home Page' ),
      'local_import_file'            => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/business1/demo.xml',
      'local_import_widget_file'     => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/business1/demo.wie',
      'local_import_customizer_file' => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/business1/demo.dat',
      'import_preview_image_url'     => $AAZEEN_EXTEN_uri . "/demo/business1/demo.jpg",
      'preview_url'                  => 'http://themezdemo.com/aazeen/business-01/',
    ),
    array(
      'import_file_name'             => 'Restaurant 1',
      'categories'                   => array( 'Home Page' ),
      'local_import_file'            => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/restaurant1/demo.xml',
      'local_import_widget_file'     => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/restaurant1/demo.wie',
      'local_import_customizer_file' => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/restaurant1/demo.dat',
      'import_preview_image_url'     => $AAZEEN_EXTEN_uri . "/demo/restaurant1/demo.jpg",
      'preview_url'                  => 'http://themezdemo.com/aazeen/restaurant-01/',
    ),

    array(
      'import_file_name'             => 'Business 2',
      'categories'                   => array( 'Home Page','PRO' ),
      'import_preview_image_url'     => $AAZEEN_EXTEN_uri . "/demo/business2/demo.jpg",
      'preview_url'                  => 'http://themezdemo.com/aazeen/business-02/',
      'import_notice'                 => '<p style="background:  red;padding:  20px;color:  white;font-size:  16px;border-radius:  6px;"> '.esc_html__('Only For PRO','aazeen-extension').' </p>',
    ),
    array(
      'import_file_name'             => 'Wedding 1',
      'categories'                   => array( 'Home Page' ),
      'local_import_file'            => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/wedding1/demo.xml',
      'local_import_widget_file'     => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/wedding1/demo.wie',
      'local_import_customizer_file' => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/wedding1/demo.dat',
      'import_preview_image_url'     => $AAZEEN_EXTEN_uri . "/demo/wedding1/demo.jpg",
      'preview_url'                  => 'http://themezdemo.com/aazeen/wedding-01/',
      'import_notice'                => $plugin_active ? '<p> '.esc_html__('For this preset required plugin SiteOrigin Page Builder','text').' </p><a class="button-primary  button" style="background: red;border: red;text-shadow: unset;" href="' .esc_url( admin_url( 'plugins.php?page=tgmpa-install-plugins' ) ).'" target="_blank">Install</a>' : NULL,
    ),
    array(
      'import_file_name'             => 'Beauty 1',
      'categories'                   => array( 'Home Page' ),
      'local_import_file'            => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/beauty/demo.xml',
      'local_import_widget_file'     => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/beauty/demo.wie',
      'local_import_customizer_file' => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/beauty/demo.dat',
      'import_preview_image_url'     => $AAZEEN_EXTEN_uri . "/demo/beauty/demo.jpg",
      'preview_url'                  => 'http://themezdemo.com/aazeen/beauty/',
    ),
    array(
      'import_file_name'             => 'Shop 1',
      'categories'                   => array( 'Home Page','PRO' ),
      'import_preview_image_url'     => $AAZEEN_EXTEN_uri . "/demo/shop1/demo.png",
      'preview_url'                  => 'http://themezdemo.com/aazeen/shop-01/',
      'import_notice'                 => '<p style="background:  red;padding:  20px;color:  white;font-size:  16px;border-radius:  6px;"> '.esc_html__('Only For PRO','aazeen-extension').' </p>',
    ),

    array(
      'import_file_name'             => 'About us 1',
      'categories'                   => array( 'Pages' ),
      'local_import_file'            => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/aboutus1/demo.xml',
      'local_import_widget_file'     => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/aboutus1/demo.json',
      'import_preview_image_url'     => $AAZEEN_EXTEN_uri . "/demo/aboutus1/demo.jpg",
      'preview_url'                  => 'http://themezdemo.com/aazeen/pages/about-us-1/',
      'import_notice'                => $plugin_active ? '<p> '.esc_html__('For this preset required plugin SiteOrigin Page Builder','text').' </p><a class="button-primary  button" style="background: red;border: red;text-shadow: unset;" href="' .esc_url( admin_url( 'plugins.php?page=tgmpa-install-plugins' ) ).'" target="_blank">Install</a>' : NULL,
    ),
    array(
      'import_file_name'             => 'Service Page',
      'categories'                   => array( 'Pages' ),
      'local_import_file'            => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/service1/demo.xml',
      'local_import_widget_file'     => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/service1/demo.json',
      'import_preview_image_url'     => $AAZEEN_EXTEN_uri . "/demo/service1/demo.jpg",
      'preview_url'                  => 'http://themezdemo.com/aazeen/pages/our-services/',
      'import_notice'                => $plugin_active ? '<p> '.esc_html__('For this preset required plugin SiteOrigin Page Builder','text').' </p><a class="button-primary  button" style="background: red;border: red;text-shadow: unset;" href="' .esc_url( admin_url( 'plugins.php?page=tgmpa-install-plugins' ) ).'" target="_blank">Install</a>' : NULL,


    ),
    array(
      'import_file_name'             => 'Contact us',
      'categories'                   => array( 'Pages' ),
      'local_import_file'            => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/contact1/demo.xml',
      'local_import_widget_file'     => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/contact1/demo.json',
      'import_preview_image_url'     => $AAZEEN_EXTEN_uri . "/demo/contact1/demo.jpg",
      'preview_url'                  => 'http://themezdemo.com/aazeen/pages/contact-us/',
      'import_notice'                => $plugin_active ? '<p> '.esc_html__('For this preset required plugin SiteOrigin Page Builder','text').' </p><a class="button-primary  button" style="background: red;border: red;text-shadow: unset;" href="' .esc_url( admin_url( 'plugins.php?page=tgmpa-install-plugins' ) ).'" target="_blank">Install</a>' : NULL,
    ),
    array(
      'import_file_name'             => 'Team 01',
      'categories'                   => array( 'Pages' ),
      'local_import_file'            => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/team1/demo.xml',
      'local_import_widget_file'     => trailingslashit( $AAZEEN_EXTEN_dir ) . 'demo/team1/demo.json',
      'import_preview_image_url'     => $AAZEEN_EXTEN_uri . "/demo/team1/demo.jpg",
      'preview_url'                  => 'http://themezdemo.com/aazeen/pages/our-team-01/',
      'import_notice'                => $plugin_active ? '<p> '.esc_html__('For this preset required plugin SiteOrigin Page Builder','text').' </p><a class="button-primary  button" style="background: red;border: red;text-shadow: unset;" href="' .esc_url( admin_url( 'plugins.php?page=tgmpa-install-plugins' ) ).'" target="_blank">Install</a>' : NULL,
    ),

	);
}
add_filter( 'pt-ocdi/import_files', 'aazeen_extension_import_files' );



add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

if ( ! function_exists( 'aazeen_extension_after_import' ) ) :
function aazeen_extension_after_import( ) {

        //Set Menu
        $top_menu = get_term_by('name', 'custom', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array(
              'primary' => $top_menu->term_id,
             )
        );
        //Set Front page
    $page = get_page_by_title( 'Home');
    if ( isset( $page->ID ) ) {
     update_option( 'page_on_front', $page->ID );
     update_option( 'show_on_front', 'page' );
    }

}
add_action( 'pt-ocdi/after_import', 'aazeen_extension_after_import' );
endif;

function aazeen_extension_time_of_single_ajax_call() {
	return 10;
}
add_action( 'pt-ocdi/time_for_one_ajax_call', 'aazeen_extension_time_of_single_ajax_call' );
