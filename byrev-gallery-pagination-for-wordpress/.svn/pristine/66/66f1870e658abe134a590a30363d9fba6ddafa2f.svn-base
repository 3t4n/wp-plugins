<?php

function reload_jquery() {
		if (function_exists('mfbfw_init')) { reload_fancybox_for_wordpress_gallery();  }  /*** FancyBox for WordPress - Jos&eacute; Pardilla fancybox ***/
		elseif (function_exists('fancybox')) { reload_fancybox_gallery();  }  /*** FancyBox - Kevin Sylvestre ***/			       	  
		elseif (function_exists('lightbox_gallery')) { reload_light_box_gallery(); } /*** Light Box - Hiroaki Miyashita ***/
		elseif (class_exists('SLB_Lightbox')) { reload_simple_lightbox(); } /*** Simple Lightbox - Archetyped ***/
		elseif (function_exists('slimbox')) { reload_slimbox_gallery(); } /*** Slimbox - Kevin Sylvestre ***/		
		elseif (function_exists('slimbox_styles')) { reload_slimbox_plugin_gallery(); } /*** Slimbox plugin - Peppe Argento ***/
		elseif (function_exists('wp_slimbox_activate')) { reload_slimbox2_gallery(); } /*** Slimbox2 - Greg Yingling ***/	
	}
	
	#======== reload light box plugins  ======
	function reload_slimbox2_gallery() {		
		echo '
		<script type="text/javascript">
		'.file_get_contents(WP_PLUGIN_DIR."/wp-slimbox2/javascript/slimbox2_autoload.js").'		
		</script>
		';
	}
		
	function reload_slimbox_plugin_gallery() {
		echo '
		<script type="text/javascript">		
		window.addEvent("domready", Slimbox.scanPage);
		</script>			
		';
	}	
	
	function reload_slimbox_gallery() {
		slimbox();
	}
	
	function reload_fancybox_for_wordpress_gallery() {
		mfbfw_init();
	}
	
	function reload_fancybox_gallery() {
		fancybox();
	}	
	
	function reload_simple_lightbox() {
		global $slb;
      	$slb->client_init();	
	}
	
	function reload_light_box_gallery() {
	echo "
		<script type=\"text/javascript\">
		jQuery('a[rel*=lightbox]').lightBox();
		jQuery('.gallery a').tooltip({track:true, delay:0, showURL: false});
		jQuery('.gallery1 a').lightBox({captionPosition:'gallery'});
		</script>
	";
	}

?>