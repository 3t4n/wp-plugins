<?php
/**
 * The universal widget  functionality of the plugin.
 *
 * @link      http://longvietweb.com
 * @since      1.0.0
 *
 * @package    Advanced_Custom_Widget
 * @subpackage Advanced_Custom_Widget/admin
 */

/**
 * The universal widget  functionality of the plugin.
 *
 * @package    Advanced_Custom_Widget
 * @subpackage Advanced_Custom_Widget/admin
 * @author     LongViet .
 */
class Advanced_Custom_Widget_Custom_Style {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
	
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    string    $plugin_name		The name of this plugin.
	 * @param    string    $version			The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
	
	/**
	 * Add custom select  to the widget form.
	 *
	 * Use the acw_exclude_widgets filter to remove the  from specified widgets,
	 * and the acw_include_widgets filter to ONLY add the  to specified widgets.
	 *
	 * The acw_include_widgets filter will always take precedence over the acw_exclude_widgets filter.
	 *
	 * @since	1.0.0
	 */
	public function widget_form( $widget, $return, $instance ) {
		
		// Add custom select 
		$defaults = array(
			'show_options' => 0,
			'color' => '',
			'widget_text_position' => '',
			'background_color' => '',
			'background_image' => '',
			'background_repeat' => 'repeat',
			'background_attachment' => 'scroll',
			'background_position' => 'left top',
			'background_size' => 'auto',
			'padding_top' => 0,
			'padding_right' => 0,
			'padding_bottom' => 0,
			'padding_left' => 0,
			'margin_top' => 0,
			'margin_right' => 0,
			'margin_bottom' => 0,
			'margin_left' => 0,
			'custom_classes' => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		// Form markup
		include( plugin_dir_path( __FILE__ ) . '/add-advanced-custom-widget-style-form.php' );
			
	}
	
	/**
	 * Process the widget's options to be saved.
	 *
	 * @since	1.0.0
	 */
	public function widget_update( $instance, $new_instance, $old_instance ) {
		
		$instance['show_options'] = strip_tags( $new_instance['show_options'] );
		$instance['color'] = strip_tags( sanitize_hex_color( $new_instance['color'] ) );
		$instance['widget_text_position'] = strip_tags( $new_instance['widget_text_position'] );
		$instance['background_color'] = strip_tags( sanitize_hex_color( $new_instance['background_color'] ) );
		$instance['background_image'] = esc_url( $new_instance['background_image'] );
		$instance['background_repeat'] = strip_tags( $new_instance['background_repeat'] );
		$instance['background_attachment'] = strip_tags( $new_instance['background_attachment'] );
		$instance['background_position'] = strip_tags( $new_instance['background_position'] );
		$instance['background_size'] = strip_tags( $new_instance['background_size'] );
		$instance['padding_top'] = absint( $new_instance['padding_top'] );
		$instance['padding_right'] = absint( $new_instance['padding_right'] );
		$instance['padding_bottom'] = absint( $new_instance['padding_bottom'] );
		$instance['padding_left'] = absint( $new_instance['padding_left'] );
		$instance['margin_top'] = absint( $new_instance['margin_top'] );
		$instance['margin_right'] = absint( $new_instance['margin_right'] );
		$instance['margin_bottom'] = absint( $new_instance['margin_bottom'] );
		$instance['margin_left'] = absint( $new_instance['margin_left'] );
		$instance['custom_classes'] = strip_tags( $new_instance['custom_classes'] );
		return $instance;
		
	}
	
	/**
	 * Set default widget options.
	 *
	 * @since	1.0.0
	 */
	public function get_defaults() {
		
		return array(
			'show_options' => 0,
			'color' => '',
			'widget_text_position' => '',
			'background_color' => '',
			'background_image' => '',
			'background_repeat' => 'repeat',
			'background_attachment' => 'scroll',
			'background_position' => 'left top',
			'background_size' => 'auto',
			'padding_top' => 0,
			'padding_right' => 0,
			'padding_bottom' => 0,
			'padding_left' => 0,
			'margin_top' => 0,
			'margin_right' => 0,
			'margin_bottom' => 0,
			'margin_left' => 0,
			'custom_classes' => '',
		);
		
	}
	
	/**
	 * Get the widget's ID.
	 *
	 * @since	1.0.0
	 */
	public function get_widget_id( $widget ) {
		
		preg_match( '/-([0-9]+)$/', $widget, $matches );
		return $matches[1];
		
	}
	
	/**
	 * Filter the widget's sidebar parameters.
	 *
	 * @since	1.1.0
	 * @param   array   $params
	 * @return  array   $params
	 */
	public function sidebar_params( $params ) {
		
		global $wp_registered_widgets;
		
		// Check if widget has options
		if ( empty( $wp_registered_widgets[$params[0]['widget_id']]['callback'][0]->option_name ) ) {
			return $params;
		}
		
		// Retrieve the widget options
		$defaults = $this->get_defaults();
		$widget_id = $this->get_widget_id( $params[0]['widget_id'] );
		$options = get_option( $wp_registered_widgets[$params[0]['widget_id']]['callback'][0]->option_name );
		$options[$widget_id] = wp_parse_args( $options[$widget_id], $defaults );
		
		$show_options = $options[$widget_id]['show_options'];
		$color = $options[$widget_id]['color'];
		$background_color = $options[$widget_id]['background_color'];
		$background_image = $options[$widget_id]['background_image'];
		$background_repeat = $options[$widget_id]['background_repeat'];
		$background_attachment = $options[$widget_id]['background_attachment'];
		$background_position = $options[$widget_id]['background_position'];
		$background_size = $options[$widget_id]['background_size'];
		$padding_top = $options[$widget_id]['padding_top'];
		$padding_right = $options[$widget_id]['padding_right'];
		$padding_bottom = $options[$widget_id]['padding_bottom'];
		$padding_left = $options[$widget_id]['padding_left'];
		$margin_top = $options[$widget_id]['margin_top'];
		$margin_right = $options[$widget_id]['margin_right'];
		$margin_bottom = $options[$widget_id]['margin_bottom'];
		$margin_left = $options[$widget_id]['margin_left'];
		$custom_classes = $options[$widget_id]['custom_classes'];
		
		// Get the widget's position in the sidebar
		$sidebars_widgets = get_option( 'sidebars_widgets', array() );
		$position_id = array_search( $params[0]['widget_id'], $sidebars_widgets[$params[0]['id']] );
		
		// Text color
    	if ( !empty( $options[$widget_id]['color'] ) ) {
    		$color = $options[$widget_id]['color'];
			$color = 'color:'.$color.';';
    	} else {
	    	$color = '';
    	}
		
		// Select Position
    	if ( !empty( $options[$widget_id]['widget_text_position'] ) ) {
    		$widget_text_position = $options[$widget_id]['widget_text_position'];
			$widget_text_position = 'text-align:'.$widget_text_position.';';
    	} else {
	    	$widget_text_position = '';
    	}
		
		// Background color
    	if ( !empty( $options[$widget_id]['background_color'] ) ) {
    		$background_color = $options[$widget_id]['background_color'];
    	} else {
	    	$background_color = '';
    	}
    	
    	// Background image
    	if ( !empty( $options[$widget_id]['background_image'] ) ) {
    		$background_image = ' ' . "url('" . $options[$widget_id]['background_image'] . "')";
    	} else {
	    	$background_image = '';
    	}
    	
    	// Background repeat
    	if ( !empty( $options[$widget_id]['background_repeat'] ) ) {
    		$background_repeat = ' ' . $options[$widget_id]['background_repeat'];
    	} else {
	    	$background_repeat = '';
    	}
    	
    	// Background attachment
    	if ( !empty( $options[$widget_id]['background_attachment'] ) ) {
    		$background_attachment = ' ' . $options[$widget_id]['background_attachment'];
    	} else {
	    	$background_attachment = '';
    	}
    	
    	// Background position
    	if ( !empty( $options[$widget_id]['background_position'] ) ) {
    		$background_position = ' ' . $options[$widget_id]['background_position'];
    	} else {
	    	$background_position = '';
    	}
    	
    	// Background size
    	if ( !empty( $options[$widget_id]['background_size'] ) && 'none' !== $options[$widget_id]['background_size'] ) {
    		$background_size = 'background-size:' . $options[$widget_id]['background_size'] . ';';
    	} else {
	    	$background_size = '';
    	}
    	
    	// Padding
    	$padding_top = $options[$widget_id]['padding_top'];
    	$padding_right = $options[$widget_id]['padding_right'];
    	$padding_bottom = $options[$widget_id]['padding_bottom'];
    	$padding_left = $options[$widget_id]['padding_left'];
    	$padding = 'padding:' . $padding_top . 'px ' . $padding_right . 'px ' . $padding_bottom . 'px ' . $padding_left . 'px;';
    	if ( 'padding:0px 0px 0px 0px;' == $padding ) {
        	$padding = '';
    	}
    	
    	// Margin
    	$margin_top = $options[$widget_id]['margin_top'];
    	$margin_right = $options[$widget_id]['margin_right'];
    	$margin_bottom = $options[$widget_id]['margin_bottom'];
    	$margin_left = $options[$widget_id]['margin_left'];
    	$margin = 'margin:' . $margin_top . 'px ' . $margin_right . 'px ' . $margin_bottom . 'px ' . $margin_left . 'px;';
    	if ( 'margin:0px 0px 0px 0px;' == $margin ) {
        	$margin = '';
    	}
    	
    	// Inline styles
    	if ( ( !empty($background_color) || !empty($background_image) || !empty($padding) || !empty($margin) ) ) {
	    	if ( !empty($background_color) && !empty($background_image) ) {
		    	$background = 'background:'.$background_color.$background_image.$background_repeat.$background_attachment.$background_position.';';
		    } elseif ( empty($background_color) && !empty($background_image) ) {
			    $background = 'background:'.$background_image.$background_repeat.$background_attachment.$background_position.';';
		    } elseif ( !empty($background_color) && empty($background_image) ) {
			    $background = 'background:'.$background_color.';';
		    } else {
			    $background = '';
		    }
		    $style = ' style="'.$background.$background_size.$padding.$margin.'"';
    	} else {
	    	$style = '';
    	}
    	
    	// Custom Classes
    	if ( !empty( $options[$widget_id]['custom_classes'] ) ) {
    		$custom_classes = ' ' . $options[$widget_id]['custom_classes'];
    	} else {
	    	$custom_classes = '';
    	}
		
		// Ouput the widget custom style and markup
		
		$params[ 0 ][ 'before_widget' ] = preg_replace( '/class="/', 'style="'.$color.$background.$background_size.$padding.$margin.$widget_text_position.'" class="'.$custom_classes.' ', $params[ 0 ][ 'before_widget' ], 1 );
		
			
		return $params;
		
	}

}
