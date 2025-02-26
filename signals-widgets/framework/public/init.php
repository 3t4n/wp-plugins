<?php

/**
 * Public facing side of the plugin.
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Widgets
 */

function signals_widgets_init() {

	// Video widget for displaying videos in the sidebar
	require_once SIGNALS_WIDGETS_PATH . 'framework/admin/widgets/video.php';

	// Subscribe widget for subscribe form connected to MailChimp list
	require_once SIGNALS_WIDGETS_PATH . 'framework/admin/widgets/subscribe.php';

	// Personal widget for showing personal information
	require_once SIGNALS_WIDGETS_PATH . '/framework/admin/widgets/personal.php';

	// Ads widget for displaying AD in 125 x 125 px format along with text
	require_once SIGNALS_WIDGETS_PATH . 'framework/admin/widgets/ads.php';

	// Social widget for showing social media profiles
	require_once SIGNALS_WIDGETS_PATH . 'framework/admin/widgets/social.php';

	// Flickr widget for showing user photos from Flickr
	require_once SIGNALS_WIDGETS_PATH . 'framework/admin/widgets/flickr.php';

	// Dribbble widget for showing shots from Dribbble
	require_once SIGNALS_WIDGETS_PATH . 'framework/admin/widgets/dribbble.php';

	// Instagram widget for showing photos from Instagram
	require_once SIGNALS_WIDGETS_PATH . 'framework/admin/widgets/instagram.php';

}
add_action( 'widgets_init', 'signals_widgets_init' );



// Adding the public side of css and js
function widgets_public_scripts() {

	wp_enqueue_style( 'signals-widgets-public', SIGNALS_WIDGETS_URL . '/framework/public/css/public.css' );

	// Register and Enqueue the base js file
	wp_register_script( 'signals-widgets-public', SIGNALS_WIDGETS_URL . '/framework/public/js/public.js', array( 'jquery' ), '0.1', true );
	wp_enqueue_script( 'signals-widgets-public' );

}
add_action( 'wp_enqueue_scripts', 'widgets_public_scripts' );



// Inserting custom css to the header if it's set by the user
function widgets_custom_css() {

	// Getting the option from the database
	$signals_widgets_options = get_option( 'signals_widgets_options' );

	if ( isset( $signals_widgets_options['custom_css'] ) && ! empty( $signals_widgets_options['custom_css'] ) ) {
		echo '<style>' . stripslashes( $signals_widgets_options['custom_css'] ) . '</style>' . "\r\n";
	}

}
add_action( 'wp_head', 'widgets_custom_css' );