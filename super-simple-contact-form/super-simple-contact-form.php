<?php
/*
Plugin Name: Super Simple Contact Form
Plugin URI: https://shinraholdings.com/plugins/super-simple-contact-form/
Description: An absurdly simple contact form plugin. Just type [contact]. There are no options.
Version: 1.6.2
Author: bitacre
Author URI: https://github.com/lmlsna
	Copyright 2018 Shinra Web Holdings (https://shinraholdings.com)
*/


/**
 * SUPER SIMPLE CONTACT FORM
 * Primary class file
 */
if( !class_exists( 'superSimpleContactForm' ) ) : // collision check
class superSimpleContactForm {


/**
 * CONSTRUCTOR
 * Runs automatically on class init
 */
function __construct() {
	/** enqueue stylesheet */
	add_action( 'wp_enqueue_scripts', array( &$this, 'enqueue_stylesheet' ) );

	/** load textdomain for internationalization */
	add_action( 'plugins_loaded', array( &$this, 'load_textdomain' ) );

	/** register [contact] shortcode */ 
	add_shortcode( 'contact', array( &$this, 'shortcode' ) );

	/** show captcha information (unless closed) */
	if( !get_option( 'sscf-captcha-info' ) )
		add_action( 'wp_dashboard_setup', array( &$this, 'captcha_info' ) ); // setup dashboard


}

/**
 * SHORTCODE
 * Actual HTML output for the [contact] shortcode
 */
function shortcode() {
	/** if form was not yet submitted: */
	if( !array_key_exists( 'submit', $_POST ) ) 
		return $this->draw_form(); // draw the contact form

	/** if form was submitted (without email) */
	elseif( empty( $_POST['sscf_from'] ) )
		return $this->draw_form( __( 'You forgot to include your email address!', 'super-simple-contact-form' ) ); // redraw w/ error msg

	/** if form was submitted (without a message) */
	elseif( empty( $_POST['sscf_message'] ) )
		return $this->draw_form( __( 'You forgot to include a message!', 'super-simple-contact-form' ) ); // redraw w/ error msg

	/** if form was submitted (properly) */
	else 
		return $this->send_email(); // send the email, show OK message	
}

// SEND EMAIL
function send_email() { 
	$args = array(); // init blank arguments array

	/** (TO) send email to */
	$args['to'] = get_option( 'admin_email' ); 

	/** (PREFIX) prefix for subject line */
	$args['prefix'] = '[Super Simple Contact Form] ';

	/** (SUBJECT) use default if no subject given */
	$args['subject'] = ( empty( $_POST['sscf_subject'] )
		? __( '(no subject)', 'super-simple-contact-form' ) // (no subject)
		: $_POST['sscf_subject'] );

	/** (NAME) use blank if no name given */
	$args['name'] = ( empty( $_POST['sscf_name'] ) 
		? '' // blank value without trailing space
		: $_POST['sscf_name'] . ' ' ); // name with trailing space

	/** (FROM) required field */
	$args['from'] = $_POST['sscf_from'];

	/** (MESSAGE) required field */
	$args['message'] = $_POST['sscf_message'];

	/** build the email headers */
	$args['headers'] = sprintf( 'From: %1$s<%2$s>' . "\r\n", 
		$args['name'], 
		$args['from'] );

	/** mail it */
	mail( $args['to'], $args['prefix'] . $args['subject'], $args['message'], $args['headers'] );

	/** wp_mail it */
	// wp_mail($args['to'], $args['subject'], $args['message'], $args['headers'] );

	return '<p class="sscf-report">' . __( 'Your message was sent successfully!', 'super-simple-contact-form' ) . '</p>';
}

function draw_form( $notify='' ) { 
	/** translated labels */
	$labels = array(
		'name' => __( 'Your name:', 'super-simple-contact-form' ),
		'from' => __( 'Your email:', 'super-simple-contact-form' ),
		'subject' => __( 'Subject:', 'super-simple-contact-form' ),
		'message' => __( 'Message:', 'super-simple-contact-form' ),
		'notify' => ( empty( $notify ) 
			? '' 
			: '<div class="sscf-notify"><span>' . $notify . '</span></div>' )
	);

	/** sanitized values */
	$values = array(
		'name' => ( isset( $_POST['sscf_name'] ) 
			? $_POST['sscf_name']
			: '' ),
		'from' => ( isset( $_POST['sscf_from'] ) 
			? $_POST['sscf_from']
			: '' ),
		'subject' => ( isset( $_POST['sscf_subject'] ) 
			? $_POST['sscf_subject']
			: '' ),
		'message' => ( isset( $_POST['sscf_message'] ) 
			? $_POST['sscf_message']
			: '' )
	);

	/** extra classes */
	$class = array(
		'from' => ( empty( $_POST['sscf_from'] ) && array_key_exists( 'submit', $_POST ) 
			? 'class="sscf-forgot" ' // trailing space
			: '' ),
		'message' => ( empty( $_POST['sscf_message'] ) && array_key_exists( 'submit', $_POST ) 
			? 'class="sscf-forgot" ' // trailing space
			: '' )
	);

	// build return string
	return '
<!-- Super Simple Contact Form -->
<!-- Support URL: http://shinraholdings.com/plugins/super-simple-contact-form/ -->

<div class="sscf-wrapper">
	<form action="" method="post">
		' . $labels['notify'] . '
		<p id="sscf-name-wrapper" class="sscf-input-wrapper">
			<label for="sscf_name">' . $labels['name'] . '</label>
			<input type="text" name="sscf_name" id="sscf_name" value="' . $values['name'] . '" />
		</p>

		<p id="sscf-from-wrapper" class="sscf-input-wrapper">
			<label for="sscf_from">' . $labels['from'] . '</label>
			<input ' . $class['from'] . 'type="text" name="sscf_from" id="sscf_from" value="' . $values['from'] . '" />
			</p>

		<p id="sscf-subject-wrapper" class="sscf-input-wrapper">
			<label for="sscf_subject">' . $labels['subject'] . '</label>
			<input type="text" name="sscf_subject" id="sscf_subject" value="' . $values['subject'] . '" />
		</p>

		<p id="sscf-message-wrapper" class="sscf-input-wrapper">
			<label for="sscf_message">' . $labels['message'] . '</label>
			<textarea ' . $class['message'] . 'name="sscf_message" id="sscf_message" cols="45" rows="5">' . $values['message'] . '</textarea>
		</p>

		<p id="sscf-submit-wrapper">
			<input type="submit" name="submit" id="submit" value="Send" class="sscf-submit"/>
		</p>

		<p class="sscf-clear"></p>

	</form>
</div><!-- /.sscf-wrapper -->

<!-- // Super Simple Contact Form -->
';
}


/**
 * ENQUEUE STYLESHEET
 * Enqueues the CSS stylesheet when the shortcode is called
 */
function enqueue_stylesheet() {
	$src = trailingslashit( plugin_dir_url( __FILE__ ) ) . 'sscf-style.css';
	wp_register_style( 'sscf-style',  $src );
    wp_enqueue_style( 'sscf-style' );
}

/**
 * CAPTCHA INFORMATION WIDGET
 * Gives 1 time information about the captcha version in a dashboard widget
 */
function captcha_info() {
	if( isset( $_POST['sscf-action'] ) ) {
		if( $_POST['sscf-action'] == 'Close Forever' ) {
			update_option( 'sscf-captcha-info', 1 );
			return;
		} 
	}
	wp_add_dashboard_widget( 'super-simple-contact-form-captcha-info', 'Super Simple Contact Form: reCAPTCHA', array( &$this, 'captcha_info_cb' ) );
}


/**
 * CAPTCHA CALLBACK
 * Callback function for the 1 time captcha information dashboard widget
 */
function captcha_info_cb() { ?>

	<form action="" method="post">

	<p><a href="<?php echo admin_url( 'plugins.php#super-simple-contact-form' ); ?>">This plugin</a> is now available with a reCAPTCHA human verification system for just $5. This will basically eliminate any contact form spam you are getting.</p>

	<h3>Learn more on this plugin&rsquo;s <a href="https://shinraholdings.com/plugins/super-simple-contact-form/captcha/" title="Learn more about reCaptcha and this plugin" target="_blank" style="font-weight: bold; text-decoration: none;">homepage</a>.</h3>

	<p style="text-align:right;">
		<input class="primary button" type="submit" name="sscf-action" value="Close Forever" />
	</p>
        </form>
    <?php
	}

/**
 * LOAD TEXTDOMAIN
 * Enables internationalization
 */
function load_textdomain() {
	$lang_dir = trailingslashit( basename( dirname( __FILE__ ) ) ) . 'lang/';
	load_plugin_textdomain( 'super-simple-contact-form', false, $lang_dir );
}

} // end class
endif; // end collision check


/** NEW INSTANCE GET! */
new superSimpleContactForm;
?>
