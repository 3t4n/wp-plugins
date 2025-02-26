<?php

/**
 * Editor page for the custom css
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Widgets
 */

function widgets_admin_css() {

	// Saving (updating) options over here
	if ( isset( $_POST['signals-css-submit'] ) ) {
		$signals_widgets_css 		= $_POST['signals-widgets-css'];

		// Updating the database entry
		$signals_widgets_options 	= array(
			'custom_css' => $signals_widgets_css
		);

		// Updating the options in the database and showing message to the user
		update_option( 'signals_widgets_options', $signals_widgets_options );
		$signals_err 				= '<div class="signals-alert signals-alert-success"><strong>' . __( 'Hey!', 'signals' ) . '</strong> ' . __( 'CSS has been updated in the database.', 'signals' ) . '</div>';
	}

	// Options for the custom css
	$signals_widgets_options 		= get_option( 'signals_widgets_options', array( 'custom_css' => '' ) );

	// View template for the editor panel
	require 'views/css.php';

}