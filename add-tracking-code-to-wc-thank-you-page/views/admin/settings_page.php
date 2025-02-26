<?php
/*
*	@PACKAGE Tracking Code To Thank You
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function tctty_setting_page_callback($settings, $current_section){ 

/**
	 * Check the current section is what we want
	 **/
	if ( $current_section == 'tctty' ) {
		$tctty_nsetting = array();
		// Add Title to the Settings
		$tctty_nsetting[] = array( 'name' => __( 'WC Tracking Code', 'tctty' ), 'type' => 'title', 
			'desc' => __( 'The following options are used to put tracking code on thank you page', 'tctty' ), 
			'id' => 'tctty' );
		// Add first checkbox option
		$tctty_nsetting[] = array(
			'name'     => __( 'Add Your Tracking Code here', 'tctty' ),
			'desc_tip' => __( 'Note:Dont include script tag', 'tctty' ),
			'id'       => 'tctty_tr_code',
			'type'     => 'textarea',
			'css'      => 'min-width:300px;',
			'desc'     => __( '', 'tctty' ),
		);
		// Add second text field option
		$tctty_nsetting[] = array(
			'name'     => __( 'Code Title', 'tctty' ),
			'desc_tip' => __( 'This will add a title to your slider', 'tctty' ),
			'id'       => 'tctty_label',
			'type'     => 'text',
			'desc'     => __( 'Any title you want can be added to your slider with this option!', 'tctty' ),
		);
		
		$tctty_nsetting[] = array( 'type' => 'sectionend', 'id' => 'tctty' );
		return $tctty_nsetting;
	
		/**
		 * If not, return the standard settings
		 **/
		} else {
			return $settings;
	}	
}