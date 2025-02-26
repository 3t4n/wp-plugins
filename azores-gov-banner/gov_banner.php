<?php
/**
* Plugin Name: Azores Gov Banner
* Description: A custom plugin to enable Azores Gov Banner
* Version: 3.0
* Author: Luis Melo
* Author URI: http://luisfbmelo.com/
**/

define( 'AZGB__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'AZGB__PLUGIN_URL', plugin_dir_url( __FILE__ ) );

add_action('init', 'AZGB_init');

//	Init header action
function AZGB_init(){
	add_action('wp_footer', 'AZGB_add_banner');
	add_action('wp_enqueue_scripts', 'AZGB_assets');
}

//	Add assets
function AZGB_assets(){
	wp_enqueue_style('azoresgov/css', plugin_dir_url(__FILE__) . 'assets/css/style.css', false, null);
}


//	Add view with HTML
function AZGB_add_banner(){ ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/postscribe/2.0.8/postscribe.min.js"></script>
	<script>
		(function(){
			theParent = document.getElementsByTagName("body");
			theKid = document.createElement("div");
			theKid.setAttribute('class', 'gov-header');
			theKid.setAttribute('id', 'gov-header');

			// prepend theKid to the beginning of theParent
			theParent[0].insertBefore(theKid, theParent[0].firstChild);

			postscribe('#gov-header', '<script language="javascript" charset="ISO-8859-1" src="https://www.azores.gov.pt/PortalAzoresgov/external/comum/barra/2018/barraLive.center.static.div.pt.https.js" type="text/javascript" ><\/script>');
		})()
	</script>
<?php }