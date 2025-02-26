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

// Loading widget folders
function aazeen_extension_so_widgets( $folders ) {
	$folders[] = plugin_dir_path(__FILE__) . '/inc/widgets-so/';
	return $folders;
}
add_filter( 'siteorigin_widgets_widget_folders', 'aazeen_extension_so_widgets' );

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


/**
 * SiteOrigin Panels Addition.
 *
 * @package aazeen_extension
 */

// Show animation fields only when animations are enabled from customizer options

	add_filter( 'siteorigin_panels_widget_style_groups', 'aazeen_extension_pagebuilder_animation_tab', 2, 3 );
	add_filter( 'siteorigin_panels_widget_style_fields', 'aazeen_extension_pagebuilder_animation_tab_fields', 1, 3 );
	add_filter( 'siteorigin_panels_widget_style_attributes', 'aazeen_extension_pagebuilder_animation_tab_attributes', 9, 2 );

  add_filter( 'siteorigin_panels_widget_style_groups', 'aazeen_extension_pagebuilder_gradient_tab', 2, 3 );
	add_filter( 'siteorigin_panels_widget_style_fields', 'aazeen_extension_pagebuilder_gradient_tab_fields', 1, 3 );
	add_filter( 'siteorigin_panels_widget_style_attributes', 'aazeen_extension_pagebuilder_gradient_tab_attributes', 9, 2 );

/**
 * Animations Tab
 */
function aazeen_extension_pagebuilder_animation_tab( $groups ) {

	$groups['animation'] = array(
		'name'     => esc_html__( 'Animation', 'aazeen-extension' ),
		'priority' => 30
	);

	return $groups;
}

/**
 * Animation Tab Fields
*/
function aazeen_extension_pagebuilder_animation_tab_fields( $fields )
{
	/**/
	$animations = array(
	''           => 'No Animations',
	'bounce'     => 'Bounce',
	'flash'      => 'Flash',
	'pulse'      => 'Pulse',
	'rubberBand' => 'Rubber Band',
	'shake'      => 'Shake',
	'swing'      => 'Swing',
	'tada'       => 'Tada',
	'wobble'     => 'Wobble',
	'jello'      => 'Jello',

	'bounceIn'       => 'Bounce',
	'bounceInDown'   => 'Bounce In Down',
	'bounceInLeft'   => 'Bounce In Left',
	'bounceInRight'  => 'Bounce In Right',
	'bounceInUp'     => 'Bounce In Up',
	'bounceOut'      => 'Bounce Out',
	'bounceOutDown'  => 'Bounce Out Down',
	'bounceOutLeft'  => 'Bounce Out Left',
	'bounceOutRight' => 'Bounce Out Right',
	'bounceOutUp'    => 'Bounce Out Up',

	'fadeIn'          => 'Fade In',
	'fadeInDown'      => 'Fade In Down',
	'fadeInDownBig'   => 'Fade In Down Big',
	'fadeInLeft'      => 'Fade In Left',
	'fadeInLeftBig'   => 'Fade In Left Big',
	'fadeInRight'     => 'Fade In Right',
	'fadeInRightBig'  => 'Fade In Right Big',
	'fadeInUp'        => 'Fade In Up',
	'fadeInUpBig'     => 'Fade In Up Big',
	'fadeOut'         => 'Fade Out',
	'fadeOutDown'     => 'Fade Out Down',
	'fadeOutDownBig'  => 'Fade Out Big',
	'fadeOutLeft'     => 'Fade Out Left',
	'fadeOutLeftBig'  => 'Fade Out Right',
	'fadeOutRight'    => 'Fade Out Right',
	'fadeOutRightBig' => 'Fade Out Right Big',
	'fadeOutUp'       => 'Fade Out Up',
	'fadeOutUpBig'    => 'Fade Out Up Big',

	'flipInX'  => 'Flip Horizontal',
	'flipInY'  => 'Flip Vertical',
	'flipOutX' => 'Flip Out Horizontal',
	'flipOutY' => 'Flip Out Vertical',

	'lightSpeedIn'  => 'Light Speed In',
	'lightSpeedOut' => 'Light Speed Out',

	'rotateIn'           => 'Rotate In',
	'rotateInDownLeft'   => 'Rotate In Down Left',
	'rotateInDownRight'  => 'Rotate In Down Right',
	'rotateInUpLeft'     => 'Rotate In Up Left',
	'rotateInUpRight'    => 'Rotate In Up Right',
	'rotateOut'          => 'Rotate Out',
	'rotateOutDownLeft'  => 'Rotate Out Down Left',
	'rotateOutDownRight' => 'Rotate Out Down Right',
	'rotateOutUpLeft'    => 'Rotate Out Up Left',
	'rotateOutUpRight'   => 'Rotate Out Up Right',

	'hinge' => 'Hinge',

	'rollIn'  => 'Roll In',
	'rollOut' => 'Roll Out',

	'zoomIn'       => 'Zoom In',
	'zoomInDown'   => 'Zoom In Down',
	'zoomInLeft'   => 'Zoom In Left',
	'zoomInRight'  => 'Zoom In Right',
	'zoomInUp'     => 'Zoom In Up',
	'zoomOut'      => 'Zoom Out',
	'zoomOutDown'  => 'Zoom Out Down',
	'zoomOutLeft'  => 'Zoom Out Left',
	'zoomOutRight' => 'Zoom Out Right',
	'zoomOutUp'    => 'Zoom Out Up',

	'slideInLeft'    => 'Slide In Left',
	'slideInDown'    => 'Slide In Down',
	'slideInRight'   => 'Slide In Right',
	'slideInUp'      => 'Slide In Up',
	'slideOutDown'   => 'Slide Out Down',
	'slideOutLeft'   => 'Slide Out Left',
	'slideOutRight'  => 'Slide Out Right',
	'slideOutUp'     => 'Slide Out Up',
	);


	$fields['animation_type'] = array(
		'name'        => esc_html__( 'Type', 'aazeen-extension' ),
		'type'        => 'select',
		'options'     => (array)$animations,
		'group'       => 'animation',
		'description' => wp_kses_post( 'Pick an animation style. Use this <a href="http://daneden.github.io/animate.css/">site</a> .', 'aazeen-extension' ),
		'priority'    => 5
	);

	$fields['animation_duration'] = array(
		'name'        => esc_html__( 'Duration', 'aazeen-extension' ),
		'type'        => 'text',
		'group'       => 'animation',
		'description' => esc_html__( 'Change the animation duration. Measured in seconds.', 'aazeen-extension' ),
		'priority'    => 10
	);

	$fields['animation_delay'] = array(
	'name'        => esc_html__( 'Delay', 'aazeen-extension' ),
	'type'        => 'text',
	'group'       => 'animation',
	'description' => esc_html__( 'Delay before the animation starts. Measured in seconds', 'aazeen-extension' ),
	'priority'    => 15
	);

	$fields['animation_offset'] = array(
		'name'        => esc_html__( 'Offset', 'aazeen-extension' ),
		'type'        => 'text',
		'default'     => '10',
		'group'       => 'animation',
		'description' => esc_html__( 'Distance to start the animation (related to the browser bottom)', 'aazeen-extension' ),
		'priority'    => 20
	);

	$fields['animation_iteration'] = array(
		'name' => esc_html__( 'Iteration', 'aazeen-extension' ),
		'type' => 'select',
		'options' => array(
			'1' => esc_html__( 'Don\'t Repeat', 'aazeen-extension' ),
			'2' => esc_html__( 'Repeat 2x', 'aazeen-extension' ),
			'3' => esc_html__( 'Repeat 3x', 'aazeen-extension' ),
			'4' => esc_html__( 'Repeat 4x', 'aazeen-extension' ),
		),
		'group'       => 'animation',
		'description' => esc_html__( 'Number of times the animation is repeated', 'aazeen-extension' ),
		'priority'    => 25
	);

	return $fields;
}

/**
 * Suffice Animation Tab Attributes to be displayed on frontend
 */
function aazeen_extension_pagebuilder_animation_tab_attributes( $atts, $value ) {

	if ( empty( $value['animation_type'] ) ) {
		return $atts;
	}

	// Add the animate class to the class attribute.
	if ( ! empty( $value['animation_type'] ) ) {
		array_push($atts['class'], 'wow');
		array_push($atts['class'], $value['animation_type']);
	}

	if ( ! empty( $value['animation_duration'] ) ) {
		$atts['data-wow-duration'] = $value['animation_duration'].'s';
	}

	if ( ! empty( $value['animation_delay'] ) ) {
		$atts['data-wow-delay'] = $value['animation_delay'].'s';
	}

	if ( ! empty( $value['animation_offset'] ) ) {
		$atts['data-wow-offset'] = $value['animation_offset'];
	}

	if ( ! empty($value['animation_iteration'] ) ) {
		$atts['data-wow-iteration'] = $value['animation_iteration'];
	}

	return $atts;
}


/**
 * SiteOrigin Panels Addition gradient.
 *
 * @package aazeen_extension
 */
  add_filter( 'siteorigin_panels_widget_style_groups', 'aazeen_extension_pagebuilder_gradient_tab', 2, 3 );
	add_filter( 'siteorigin_panels_widget_style_fields', 'aazeen_extension_pagebuilder_gradient_tab_fields', 1, 3 );
	add_filter( 'siteorigin_panels_widget_style_attributes', 'aazeen_extension_pagebuilder_gradient_tab_attributes', 9, 2 );

  /**
   * Animations Tab
   */
  function aazeen_extension_pagebuilder_gradient_tab( $groups ) {

  	$groups['gradient'] = array(
  		'name'     => esc_html__( 'Gradient Background', 'aazeen-extension' ),
  		'priority' => 30
  	);

  	return $groups;
  }



  /**
   * Animation Tab Fields
  */
  function aazeen_extension_pagebuilder_gradient_tab_fields( $fields )
  {
    $array2 = array();
    for ($x = 0; $x <= 30; $x++)
    {
        $array2[] = 'gradient_'.$x.'';
    }


  	$fields['gradient_type'] = array(
  		'name'        => esc_html__( 'Type', 'aazeen-extension' ),
  		'type'        => 'select',
  		'options'     => (array)$array2,
  		'group'       => 'gradient',
  		'description' => wp_kses_post( 'Pick an gradient background style.', 'aazeen-extension' ),
  		'priority'    => 5
  	);


  	return $fields;
  }

  /**
   * Aazeen Animation Tab Attributes to be displayed on frontend
   */
  function aazeen_extension_pagebuilder_gradient_tab_attributes( $atts, $value ) {

  	if ( empty( $value['gradient_type'] ) ) {
  		return $atts;
  	}
$gradient = $value['gradient_type'];
  	// Add the animate class to the class attribute.
  	if ( ! empty( $value['gradient_type'] ) ) {
  		array_push($atts['class'], 'gradient_'.$gradient.'');
  	}

  	return $atts;
  }


  if( !function_exists('aazeen_extention_panels_panels_row_attributes') ) :
  function aazeen_extention_panels_panels_row_attributes($attr) {
  		if(empty($attr['style'])) $attr['style'] = '';
  		$attr['style'] .= 'margin-bottom: 0px;';
  	return $attr;
  }
  endif;
  add_filter('siteorigin_panels_row_attributes', 'aazeen_extention_panels_panels_row_attributes', 10, 2);

  
