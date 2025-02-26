<?php
/**
 * filter and function for siteorigin
 *
 * @package Themez WP
 * @subpackage aazeen extension
 * @since aazeen_extension 1.0.0
 */

defined('ABSPATH') or die("No script kiddies please!");


function aazeen_extension_add_widget_tabs($tabs) {
    $tabs[] = array(
        'title' => __('Aazeen Widgets', 'aazeen-extension'),
        'filter' => array(
            'groups' => array('aazeen')
        )
    );

    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'aazeen_extension_add_widget_tabs', 20);

// Adding Icon for all Widgets
function aazeen_extension_widget_add_bundle_groups( $widgets ) {
	foreach ( $widgets as $class => &$widget ) {
		if ( preg_match( '/aazeen_(.*)/', $class, $matches ) ) {
			$widget['icon'] = 'dashicons dashicons-editor-code';
			$widget['groups'] = array( 'aazeen' );
		}
	}
	return $widgets;
}
add_filter( 'siteorigin_panels_widgets', 'aazeen_extension_widget_add_bundle_groups', 11 );


function aazeen_extension_so_scripts() {
   wp_add_inline_script( 'jquery-migrate', 'jQuery(document).ready(function(){   jQuery(".so-panel.widget").each(function (){   jQuery(this).attr("id", jQuery(this).find(".so_widget_id").attr("data-panel-id"))  });  });' );
}
add_action( 'wp_enqueue_scripts', 'aazeen_extension_so_scripts' );


# ------------------------------------------------------------------------
# SiteOrigin Pre-Built Page Builder Layouts
# ------------------------------------------------------------------------

function aazeen_extension_prebuilt_layouts($layouts) {

  global $AAZEEN_EXTEN_file, $AAZEEN_EXTEN_dir, $AAZEEN_EXTEN_uri;

  $layouts[ 'aboutus1' ] = array_merge(
  	array(
  		'name' => __('Aboutus1', 'aazeen-extension'),
      'screenshot' => $AAZEEN_EXTEN_uri . '/demo/aboutus1/demo.jpg',
  	),

  	json_decode( file_get_contents( $AAZEEN_EXTEN_dir . 'demo/aboutus1/demo.json' ), true )

  );
  $layouts[ 'servicepage' ] = array_merge(
    array(
      'name' => __('Service Page', 'aazeen-extension'),
      'screenshot' => $AAZEEN_EXTEN_uri . '/demo/service1/demo.jpg',
    ),

    json_decode( file_get_contents( $AAZEEN_EXTEN_dir . 'demo/service1/demo.json' ), true )

  );
  $layouts[ 'contact1' ] = array_merge(
    array(
      'name' => __('Contact us 1', 'aazeen-extension'),
      'screenshot' => $AAZEEN_EXTEN_uri . '/demo/contact1/demo.jpg',
    ),

    json_decode( file_get_contents( $AAZEEN_EXTEN_dir . 'demo/contact1/demo.json' ), true )

  );
  $layouts[ 'team' ] = array_merge(
    array(
      'name' => __('Team 01', 'aazeen-extension'),
      'screenshot' => $AAZEEN_EXTEN_uri . '/demo/team1/demo.jpg',
    ),

    json_decode( file_get_contents( $AAZEEN_EXTEN_dir . 'demo/team1/demo.json' ), true )

  );
	return $layouts;

}

add_filter('siteorigin_panels_prebuilt_layouts','aazeen_extension_prebuilt_layouts');


if( !function_exists('aazeen_extention_panels_panels_row_attributes') ) :
function aazeen_extention_panels_panels_row_attributes($attr) {
		if(empty($attr['style'])) $attr['style'] = '';
		$attr['style'] .= 'margin-bottom: 0px;';
	return $attr;
}
endif;
add_filter('siteorigin_panels_row_attributes', 'aazeen_extention_panels_panels_row_attributes', 10, 2);
