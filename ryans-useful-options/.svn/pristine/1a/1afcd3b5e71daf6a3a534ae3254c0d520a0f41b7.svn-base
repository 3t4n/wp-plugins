<?php

function rpf_harmonia() {
	$harmoniavalue = myprefix_get_theme_option( 'include-harmonia-javascript' );
	$menuclass = myprefix_get_theme_option( 'main-menu-ul-class' );

	if( $harmoniavalue == 'yes' ) {
		wp_enqueue_script( 'harmonia', plugin_dir_url( __FILE__ ) . 'js/jquery.harmonia.js', array(), null , false );
		
		if( $menuclass != '' ) {
			$File = plugin_dir_path( __FILE__ ) . 'js/jquery.docready.harmonia.js';
			if( file_exists($File) ) { unlink($File); clearstatcache(); }
			$Handle = fopen($File, 'w');
			$Data = "jQuery(document).ready(function() { jQuery.fn.harmonia.defaults.idSelect = 'foo'; jQuery('.$menuclass').harmonia();});";
			fwrite($Handle, $Data);
			fclose($Handle);
			
		}
		wp_enqueue_script( 'harmonia-docready', plugin_dir_url( __FILE__ ) . 'js/jquery.docready.harmonia.js', array(), null , false );
	}
}
add_action('wp_enqueue_scripts','rpf_harmonia');


function rpf_add_harmonia_css_to_head() { ?>
	


<style>

@media only screen and (max-width: 992px) {
	#foo.form-control { display:block; !important;}
	ul.<?php echo $GLOBALS['menuclass']; ?> { display:none; }
	}
		
@media only screen and (min-width: 992px) {
	#foo.form-control { display:none; }
	ul.<?php echo $GLOBALS['menuclass']; ?> { display:block; !important; }
	}
	

</style>	
	<?php
	}

add_action('wp_head','rpf_add_harmonia_css_to_head');