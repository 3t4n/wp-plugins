<?php

/**
 * The file that defines Shortcodes class
 *
 * A class definition that includes functions used for Shortcodes.
 *
 * @since      1.0
 *
 */

/**
 * Shortcodes class.
 *
 * This is used to define functions for Shortcodes.
 *
 * @since      1.0
 */
class Fancy_Facebook_Comments_Shortcodes {

	/**
	 * Options saved in database.
	 *
	 * @since    1.0
	 */
	private $options;

	/**
	 * Member to assign object of Fancy_Facebook_Comments_Public Class.
	 *
	 * @since    1.0
	 */
	private $public_class_object;

	/**
	 * Assign plugin options to private member $options.
	 *
	 * @since    1.0
	 */
	public function __construct( $options, $public_class_object ) {

		$this->options = $options;
		$this->public_class_object = $public_class_object;

	}

	/** 
	 * Shortcode for Facebook Comments
	 *
	 * @since    1.0
	 */ 
	public function facebook_comments_shortcode( $params ) {

		extract( shortcode_atts( array(
			'style' => '',
			'title' => '',
			'url' => '',
			'heading_tag' => 'div',
			'theme' => 'light',
			'num_comments' => '',
			'order_by' => 'social',
			'language' => 'en_GB',
			'dont_load_sdk' => '',
			'width' => '',
		), $params ) );

		$html = '<div style="' . esc_attr( $style ) . '" class="heateor_ffc_facebook_comments">';
		if( $title != '' ) {
			$allowed_class = array(
		    	'class' => 'heateor_ffc_facebook_comments_title'
		    );

			$allowed_html = array(
			    'div'  => $allowed_class,
			    'p'    => $allowed_class,
			    'span' => $allowed_class,
			    'h1'   => $allowed_class,
			    'h2'   => $allowed_class,
			    'h3'   => $allowed_class,
			    'h4'   => $allowed_class,
			    'h5'   => $allowed_class,
			    'h6'   => $allowed_class
			);

			$temp_html = '<' . esc_html( $heading_tag ) . ' class="heateor_ffc_facebook_comments_title">' . esc_html( $title ) . '</' . esc_html( $heading_tag ) . '>';
			$html .= wp_kses( $temp_html, $allowed_html );
		}
		$html .= '<style type="text/css">.fb-comments,.fb-comments span,.fb-comments span iframe[style]{min-width:100%!important;width:100%!important}</style>';
		if ( ! $dont_load_sdk ) {
			$html .= '<script type="text/javascript">!function(e,n,t){var o,c=e.getElementsByTagName(n)[0];e.getElementById(t)||(o=e.createElement(n),o.id=t,o.src="//connect.facebook.net/' . esc_js( $language ) . '/sdk.js#xfbml=1&version=v20.0",c.parentNode.insertBefore(o,c))}(document,"script","facebook-jssdk");</script>';
		}
		$html .= $this->public_class_object->facebook_comments_moderation_optin();
		$html .= $this->public_class_object->facebook_comments_notifier_optin();
		$target_url = html_entity_decode( esc_url( $this->public_class_object->get_http_protocol() . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ) );
		$target_url = $this->public_class_object->generate_facebook_comments_url( $target_url );
		
		$html .= '<div class="fb-comments" data-href="' . ( $url == '' ? $target_url : esc_url_raw( $url ) ) . '"';
	    $html .= ' data-numposts="' . intval( $num_comments ) . '"';
	    $html .= ' data-colorscheme="' . esc_attr( $theme ) . '"';
	    $html .= ' data-order-by="' . esc_attr( $order_by ) . '"';
	    $html .= ' data-width="' . ( $width == '' ? '100%' : esc_attr( $width ) ) . '"';
	    $html .= ' ></div></div>';
	    $html .= $this->public_class_object->facebook_comments_moderation_optin_script();
	    $html .= $this->public_class_object->facebook_comments_notifier_optin_script();
		
		return $html;
	
	}

}
