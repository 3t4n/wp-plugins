<?php

Class SPAB_Shortcodes {


	/*
	 * Constructor funtions that adds all shortcodes
	 *
	 */
	function __construct() {

		add_shortcode( 'socialpug_author_box', __CLASS__ . '::socialpug_author_box' );

	}


	/*
	 * Displays the author box
	 *
	 */
	public static function socialpug_author_box( $atts ) {

		$author_box = new SPAB_Author_Box_Outputter;

		return $author_box->get_box_output();

	}

}

new SPAB_Shortcodes;