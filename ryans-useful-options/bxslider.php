<?php

/*-------------- REGISTER BX SLIDER CSS FILE --------------------------*/

function rpf_register_bx_css() {	

	$bxvalue = myprefix_get_theme_option( 'include-bx-slider-css-js' );


	if( $bxvalue == 'yes' ) { 
	wp_register_style( 'bxslider', plugin_dir_url( __FILE__ ) . 'css/jquery.bxslider.css' );
	wp_enqueue_style( 'bxslider' );
	}
	

    }
    add_action( 'wp_enqueue_scripts', 'rpf_register_bx_css' );


/*-------------- REGISTER BX SLIDER JS FILE AND WRITE TO JS FILE --------------------------*/
    
function rpf_register_bx_js() {

	$bxvalue = myprefix_get_theme_option( 'include-bx-slider-css-js' );
	$bxclass = myprefix_get_theme_option( 'bx-slider-ul-class' );
	if( $bxvalue == 'yes' ) {
		wp_enqueue_script( 'bxslider', plugin_dir_url( __FILE__ ) . 'js/jquery.bxslider.js', array(), null , false );
		
		if( $bxclass != '' ) {
			$bxjswrite = "$(document).ready(function(){ $('.$bxclass').bxSlider({ auto: true, adaptiveHeight: true, pager: false, mode:'fade' }); });";
			$bxjsfile = plugin_dir_path( __FILE__ ) . 'js/jquery.docready.bxslider.js';
			if( file_exists($bxjsfile) ) { unlink($bxjsfile); clearstatcache(); }
			$bxj = fopen( $bxjsfile , 'w');
			fwrite($bxj, $bxjswrite );
			fclose($bxj);
		}
		wp_enqueue_script( 'bxslider-docready', plugin_dir_url( __FILE__ ) . 'js/jquery.docready.bxslider.js', array(), null , false ); 
		}


	}
	add_action( 'wp_enqueue_scripts', 'rpf_register_bx_js' );