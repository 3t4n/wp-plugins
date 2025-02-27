<?php
/**
 * Plugin Name: Text CAPTCHA Contact Form 7
 * Plugin URI:  https://wordpress.org/plugins/text-captcha-contact-form-7
 * Description: Secure Contact Form 7 forms from bots and hackers. 
 * Version:     1.0.0
 * Author:      Saurav Sharma
 * Author URI:  https://phpesperto.com
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: text-captcha-contact-form-7
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

//----------------------------------------------------------------------
// Start session on init hook.
// Use session to match captcha text 
//----------------------------------------------------------------------

add_action( 'plugins_loaded', 'cf7_text_captcha_init' , 20 );
function cf7_text_captcha_init(){
	add_action( 'wpcf7_init', 'cf7_text_captcha_add_shortcode_captchacf7' );
	add_filter( 'wpcf7_validate_captchacf7*', 'cf7_text_captcha_validation_filter', 10, 2 );
}

//----------------------------------------------------------------------
// Method: Add new custom shortcode for Contact Form 7
//----------------------------------------------------------------------
function cf7_text_captcha_add_shortcode_captchacf7() {
	wpcf7_add_form_tag(
		array( 'captchacf7' , 'captchacf7*' ),
		'cf7_text_captcha_shortcode_handler', true );
}

//----------------------------------------------------------------------
// Method: Return HTML on frontend Contact Form 7
// Add custom CSS & JS
//----------------------------------------------------------------------
function cf7_text_captcha_shortcode_handler( $tag ) {
    // CSS
    wp_enqueue_style( 'cf7_text_captcha', plugins_url( '/assets/css/style.css', __FILE__ ));
    
    // JavaScript
    wp_enqueue_script( 'cf7_text_captcha', plugins_url( '/assets/js/script.js', __FILE__ ),array('jquery'));
    // Pass ajax_url to script.js
    // pass plugin_path to script.js
   wp_localize_script( 'cf7_text_captcha', 'ajax_object', array( 'plugin_path' => plugins_url(), 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
   
    //Contact Form 7 tags
	$tag = new WPCF7_FormTag( $tag );
    
	if ( empty( $tag->name ) )
		return '';

	$validation_error = wpcf7_get_validation_error( $tag->name );

	$class = wpcf7_form_controls_class( $tag->type, 'cf7_text_captcha' );


	if ( $validation_error )
		$class .= ' wpcf7-not-valid';

	$atts = array();

	$atts['size'] = $tag->get_size_option( '40' );
	$atts['maxlength'] = $tag->get_maxlength_option();
	$atts['minlength'] = $tag->get_minlength_option();

	if ( $atts['maxlength'] && $atts['minlength'] && $atts['maxlength'] < $atts['minlength'] ) {
		unset( $atts['maxlength'], $atts['minlength'] );
	}

	$atts['class'] = $tag->get_class_option( $class );
	$atts['id'] = $tag->get_id_option();
	$atts['tabindex'] = $tag->get_option( 'tabindex', 'int', true );

	if ( $tag->has_option( 'readonly' ) )
		$atts['readonly'] = 'readonly';

	if ( $tag->is_required() )
		$atts['aria-required'] = 'true';

	$atts['aria-invalid'] = $validation_error ? 'true' : 'false';

	$value = (string) reset( $tag->values );

	if ( $tag->has_option( 'placeholder' ) || $tag->has_option( 'watermark' ) ) {
		$atts['placeholder'] = $value;
		$value = '';
	}

	$value = $tag->get_default_option( $value );

	$value = wpcf7_get_hangover( $tag->name, $value );

	$scval = do_shortcode('['.$value.']');
	if( $scval != '['.$value.']' ){
		$value = esc_attr( $scval );
	}

	$atts['value'] = $value;

    //shortcode [captchacf7] with (*) and without (*)
	switch( $tag->basetype ){
		case 'captchacf7':
			$atts['type'] = 'text';
			break;
		default:
			$atts['type'] = 'text';
			break;
	}

	$atts['name'] = $tag->name;

	$atts = wpcf7_format_atts( $atts );

	return '<div class="main-cf7-captcha">'.sprintf('<span class="wpcf7-form-control-wrap %1$s"><input %2$s />%3$s</span>',sanitize_html_class( $tag->name ), $atts, $validation_error ).'</div><img src="'.plugins_url( 'include/image.php', __FILE__ ).'" alt="cf7captcha" id="image-captcha-cf7"><a href="javascript:void(0);" id="reload_captcha"><img src="'.plugins_url( 'assets/images/refresh.png', __FILE__ ).'" alt="Regenerate Captcha"></a>';
}

//----------------------------------------------------------------------
// Method: Validation on custom field
//----------------------------------------------------------------------
function cf7_text_captcha_validation_filter( $result, $tag ) {
	$tag = new WPCF7_FormTag( $tag );

	$name = $tag->name;

	$value = isset( $_POST[$name] ) ? sanitize_text_field($_POST[$name]): '';

	if ( 'captchacf7' == $tag->basetype ) {
		if ( $tag->is_required() && '' == $value ) {
			$result->invalidate( $tag, wpcf7_get_message( 'invalid_required' ) );
		}
		$cookie_name = "cf7_captchainput_";
		if ( array_key_exists( $cookie_name, $_COOKIE ) ) {
            $getCookie = sanitize_text_field($_COOKIE[$cookie_name]);
            if($getCookie!=md5($value)){
                $result->invalidate( $tag, 'Incorrect captcha' );
            }
        }
        else{
            $result->invalidate( $tag, wpcf7_get_message( 'invalid_required' ) );
        }
		setcookie($cookie_name, md5($digit), time() - 3600, "/");
	}

	if ( ! empty( $value ) ) {
		$maxlength = $tag->get_maxlength_option();
		$minlength = $tag->get_minlength_option();

		if ( $maxlength && $minlength && $maxlength < $minlength ) {
			$maxlength = $minlength = null;
		}

		$code_units = wpcf7_count_code_units( $value );

		if ( false !== $code_units ) {
			if ( $maxlength && $maxlength < $code_units ) {
				$result->invalidate( $tag, wpcf7_get_message( 'invalid_too_long' ) );
			} elseif ( $minlength && $code_units < $minlength ) {
				$result->invalidate( $tag, wpcf7_get_message( 'invalid_too_short' ) );
			}
		}
	}

	return $result;
}

add_action( 'wp_ajax_cf7_captcha_input_AjaxRequest', 'cf7InputCaptchaAjaxCallBack' );
add_action( 'wp_ajax_nopriv_cf7_captcha_input_AjaxRequest', 'cf7InputCaptchaAjaxCallBack' );
function cf7InputCaptchaAjaxCallBack() {
	echo plugins_url( 'include/image.php', __FILE__ ).'?'.rand();
    wp_die(); 
}
