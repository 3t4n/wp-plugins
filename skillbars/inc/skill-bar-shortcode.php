<?php
	if ( ! defined( 'ABSPATH' ) ) {
		die( "Can't load this file directly" );
	}

	/*==========================================================================
		Skill Bar shortcode callback function
	==========================================================================*/
	function skillbar_shortcode_register( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'id' => "",
			), $atts 
		);
		global $post;
		$postid = $atts['id'];

		// Fetch saved data or set default
		$skills_themes            = get_post_meta( $postid, 'skills_themes', true );
		$tp_title_fontsize_option = get_post_meta( $postid, 'tp_title_fontsize_option', true );
		$tp_title_font_case       = get_post_meta( $postid, 'tp_title_font_case', true );
		$tp_title_font_style      = get_post_meta( $postid, 'tp_title_font_style', true );
		$tp_item_border_radius    = get_post_meta( $postid, 'tp_item_border_radius', true );
		$skillbar_data            = get_post_meta( $postid, 'tp_skillbar_data', true );
	    if ( empty( $skillbar_data ) ) {
	        $skillbar_data = array(
	            array(
					'title'         => 'New Skill',
					'title_color'   => '#333333',
					'percentage'    => '80',
					'percent_color' => '#333333',
					'bg_color'      => '#dddddd',
					'color'         => '#333333',
	            ),
	        );
	    }

		ob_start();
		switch ( $skills_themes ) {
		    case 'theme1':

		        include __DIR__ . '/themes/style-1.php';

		        break;
		    case 'theme2':

		        include __DIR__ . '/themes/style-2.php';

		        break;
		    case 'theme3':

		        // include __DIR__ . '/themes/style-3.php';

		    break;
		    case 'theme4':

		        // include __DIR__ . '/themes/style-4.php';

		    break;
		}
		return ob_get_clean();
	}

	// shortcode hook
	add_shortcode( 'skillbars', 'skillbar_shortcode_register' );