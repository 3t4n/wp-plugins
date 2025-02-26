<?php

	if ( ! defined( 'ABSPATH' ) )
		exit; # Exit if accessed directly

	# shortocde
	function atmswc_post_query( $atts, $content = null ){

		$atts = shortcode_atts(
			array(
				'id' => "",
				), $atts);
		global $post, $paged;
		$postid = $atts['id'];

		$atmswc_cat_name   		   = get_post_meta( $postid, 'atmswc_cat_name', true );
		$atmswc_theme_id           = get_post_meta( $postid, 'theme_id', true );
		$atmswc_order_by           = get_post_meta( $postid, 'atmswc_order_by', true );
		$atmswc_order_type         = get_post_meta( $postid, 'atmswc_order_type', true );

		$atmswccat 	=  array();
		$num 		= count( $atmswc_cat_name );
		for( $j=0; $j<$num; $j++ ){
			array_push($atmswccat, $atmswc_cat_name[$j]);
		}

		$args = array(
			'post_type' 	 	=> 'atmswc',
			'post_status'	 	=> 'publish',
			'posts_per_page' 	=> -1,
			'orderby'	   	   	=> $atmswc_order_by,
			'order'			 	=> $atmswc_order_type,
			'tax_query' 	 	=> array(
				array(
					'taxonomy'  => 'atmswc_cat',
					'field' 	=> 'id',
					'terms'     => $atmswccat,
				)
			)
		);

		$query 	= new WP_Query( $args );
    	$output = '';    

		switch ( $atmswc_theme_id ) {
		    case '1':
		        require_once( ATMSWC_PLUGIN_DIR.'styles/style-one.php' );
		        break;
		    case '2':
		        require_once( ATMSWC_PLUGIN_DIR.'styles/style-two.php' );
		        break;
		    case '3':
		        require_once( ATMSWC_PLUGIN_DIR.'styles/style-three.php' );
		        break;
		    case '4':
		        require_once( ATMSWC_PLUGIN_DIR.'styles/style-four.php' );
		        break;
		    case '5':
		        require_once( ATMSWC_PLUGIN_DIR.'styles/style-five.php' );
		        break;
		    case '6':
		        require_once( ATMSWC_PLUGIN_DIR.'styles/style-six.php' );
		        break;
		    case '7':
		        require_once( ATMSWC_PLUGIN_DIR.'styles/style-seven.php' );
		        break;
		    case '8':
		        require_once( ATMSWC_PLUGIN_DIR.'styles/style-eight.php' );
		        break;
		    case '9':
		        require_once( ATMSWC_PLUGIN_DIR.'styles/style-nine.php' );
		        break;
		    case '10':
		        require_once( ATMSWC_PLUGIN_DIR.'styles/style-ten.php' );
		        break;
		    case '11':
		        require_once( ATMSWC_PLUGIN_DIR.'styles/style-eleven.php' );
		        break;
		    case '12':
		        require_once( ATMSWC_PLUGIN_DIR.'styles/style-twelve.php' );
		        break;
		} 

		return $output; 			
	}
	add_shortcode( 'team_builder', 'atmswc_post_query' );