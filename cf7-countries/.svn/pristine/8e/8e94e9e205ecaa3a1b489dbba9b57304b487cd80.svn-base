<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://atelierlabo.com
 * @since      1.0.0
 *
 * @package    Cf7_Countries
 * @subpackage Cf7_Countries/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * @package    Cf7_Countries
 * @subpackage Cf7_Countries/public
 * @author     Atelier Labo <wp@atelierlabo.com>
 */
class Atlb_Cf7_Countries_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
		add_filter( 'wpcf7_validate_countries', array($this, 'atlb_cf7_validate_countries') , 10, 2 );
		add_filter( 'wpcf7_validate_countries*', array($this, 'atlb_cf7_validate_countries'), 10, 2 );
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Cf7_Countries_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cf7_Countries_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cf7-countries-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Cf7_Countries_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cf7_Countries_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cf7-countries-public.js', array( 'jquery' ), $this->version, false );

	}
	
	public function custom_add_form_tag_countries_handler( $tag ) {
		
	    if ( empty( $tag->name ) ) {
			return '';
		}
	
		$validation_error = wpcf7_get_validation_error( $tag->name );
	
		$class = wpcf7_form_controls_class( $tag->type );
	
		if ( $validation_error ) {
			$class .= ' wpcf7-not-valid';
		}
	
		$atts = array();
	
		$atts['class'] = $tag->get_class_option( $class );
		$atts['id'] = $tag->get_id_option();
		$atts['tabindex'] = $tag->get_option( 'tabindex', 'signed_int', true );
	
		if ( $tag->is_required() ) {
			$atts['aria-required'] = 'true';
		}
	
		$atts['aria-invalid'] = $validation_error ? 'true' : 'false';
	
		$include_blank = $tag->has_option( 'include_blank' );
		$first_as_label = $tag->has_option( 'first_as_label' );
		$multiple = false;
		
		if ( $tag->has_option( 'size' ) ) {
			$size = $tag->get_option( 'size', 'int', true );
	
			if ( $size ) {
				$atts['size'] = $size;
			} elseif ( $multiple ) {
				$atts['size'] = 4;
			} else {
				$atts['size'] = 1;
			}
		}
	
		
		$values = $tag->values;
		$labels = $tag->labels;
		
		$countries = Atlb_Cf7_Countries::countries();
		
		foreach($countries as $country) {
			$values[] = $country;
			$labels[] = $country;
		}
		
	
		$default_choice = $tag->get_default_option( null, array(
			'multiple' => $multiple,
			'shifted' => $include_blank,
		) );
	
		if ( $include_blank
		or empty( $values ) ) {
			array_unshift( $labels, '---' );
			array_unshift( $values, '' );
		} elseif ( $first_as_label ) {
			$values[0] = '';
		}
	
		$html = '';
		$hangover = wpcf7_get_hangover( $tag->name );
	
		foreach ( $values as $key => $value ) {
			if ( $hangover ) {
				$selected = in_array( $value, (array) $hangover, true );
			} else {
				$selected = in_array( $value, (array) $default_choice, true );
			}
	
			$item_atts = array(
				'value' => $value,
				'selected' => $selected ? 'selected' : '',
			);
	
			$item_atts = wpcf7_format_atts( $item_atts );
	
			$label = isset( $labels[$key] ) ? $labels[$key] : $value;
	
			$html .= sprintf( '<option %1$s>%2$s</option>',
				$item_atts, esc_html( $label ) );
		}
	
		if ( $multiple ) {
			$atts['multiple'] = 'multiple';
		}
	
		$atts['name'] = $tag->name . ( $multiple ? '[]' : '' );
	
		$atts = wpcf7_format_atts( $atts );
	
		$html = sprintf(
			'<span class="wpcf7-form-control-wrap %1$s"><select %2$s>%3$s</select>%4$s</span>',
			sanitize_html_class( $tag->name ), $atts, $html, $validation_error );
	
		return $html;
	}
	
	public function atlb_cf7_validate_countries( $result, $tag ) {
		$name = $tag->name;
	
		if ( isset( $_POST[$name] )
		and is_array( $_POST[$name] ) ) {
			foreach ( $_POST[$name] as $key => $value ) {
				if ( '' === $value ) {
					unset( $_POST[$name][$key] );
				}
			}
		}
	
		$empty = ! isset( $_POST[$name] ) || empty( $_POST[$name] ) && '0' !== $_POST[$name];
	
		if ( $tag->is_required() and $empty ) {
			$result->invalidate( $tag, wpcf7_get_message( 'invalid_required' ) );
		}
	
		return $result;
	}
}
