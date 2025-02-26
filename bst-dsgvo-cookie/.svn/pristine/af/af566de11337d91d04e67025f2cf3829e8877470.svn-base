<?php
/*
* Plugin Name: BST DSGVO Cookie 
* Plugin URI: https://bst.software
* Description: Einfaches, responsives Cookie Pop-up ohne viel Schnick Schnack. EU-DSGVO konform.
* Version: 1.2.9
* Author: BST Software (Autor: Arnold Margolf)
* Author URI: https://bst.software
* Text Domain: bst-dsgvo-cookie
* Domain Path: /languages/
* Copyright 2018, 2019, 2020, 2021  Arnold Margolf  (email : amargolf@bst-systemtechnik.de)
*/

/*******************************
* Plugin activation
*******************************/

function bst_plugin_install() {
	// checks version of wordpress and deactives if lower than 3.1
    if (version_compare( get_bloginfo('version'), '4.5', '<')) {
        deactivate_plugins(basename(__FILE__)); // Deactiviere das Plugin
		wp_die( 'Deine Wordpress Version muss > 4.5 sein' );
    }
}
register_activation_hook(__FILE__, 'bst_plugin_install');

function bst_load_plugin_textdomain() {
  load_plugin_textdomain( 'bst-dsgvo-cookie', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'bst_load_plugin_textdomain' );

/*******************************
* Default option values
*******************************/

function bst_value($option) {
	$bst_options = get_option('bst_settings');
	$defaults = array (
		'enable' => 'checked',
		'front-only' => 0,
		'fixed-to-bottom' => 'checked',
		'message' => "Wir benutzen Cookies um die Nutzerfreundlichkeit der Webseite zu verbessen. Durch Deinen Besuch stimmst Du dem zu.",
		'accept' => 'Verstanden',
		'more-info' => 'Weitere Informationen',
		'policy-url' => '/deine-datenschutzerklärung',
		'font' => 'Arial',
		'width' => 90,
		'max-width' => 1280,
		'padding' => 10,
		'background' => '#333333',
		'border' => '#555555',
		'border-size' => '0',
		'text-color' => '#FFFFFF',
		'button-bg' => '#067cd1',
		'button-textcolor' => '#FFFFFF',
		'button-hovercolor' => '#CCCCCC',
		'button-color' => '#FFFFFF',
		'link-color' => '#CCCCCC',
		'button_typ' => 1,
		'show-info' => '1',
		'target' => '_self',
		'policy-site' => '',
		
	);
	echo (isset($bst_options[$option])) ? $bst_options[$option] : $defaults[$option];
}
function get_bst_value($option) {
	$bst_options = get_option('bst_settings');
	$defaults = array (
		'enable' => 'checked',
		'front-only' => 0,
		'fixed-to-bottom' => 'checked',
		'message' => "Wir benutzen Cookies um die Nutzerfreundlichkeit der Webseite zu verbessen. Durch Deinen Besuch stimmst Du dem zu.",
		'accept' => 'Verstanden',
		'more-info' => 'Weitere Informationen',
		'policy-url' => '/deine-datenschutzerklaerung',
		'font' => 'Arial',
		'width' => 90,
		'max-width' => 1280,
		'padding' => 5,
		'background' => '#333333',
		'border' => '#555555',
		'border-size' => '0',
		'text-color' => '#FFFFFF',
		'button-bg' => '#067cd1',
		'button-textcolor' => '#FFFFFF',
		'button-hovercolor' => '#CCCCCC',
		'link-color' => '#CCCCCC',
		'button_typ' => 1,
		'show-info' => '1',
		'target' => '_self',
		'policy-site' => '',
	
	);
	return (isset($bst_options[$option])) ? $bst_options[$option] : $defaults[$option];
}

/*******************************
* The cookie banner markup
*******************************/

function bstInsert() {
	
	$bst_options = get_option('bst_settings');
		
	function bstContent() { ?>
       
		<?php
		
		$bst_btn_bg1 = get_bst_value('button-bg');
		$bst_btn_bg2 = get_bst_value('button-hovercolor');
		$bst_show_info = 1;

		$bst_iimage = get_option( 'siteurl' ) . '/wp-content/plugins/bst-dsgvo-cookie/includes/img/eu-info.png';

		$fixed = "";
		if ( get_bst_value('fixed-to-bottom') == 1) { $fixed = " bst-panel-fixed"; } else {$fixed = " bst-panel-fixed-top"; }

		$target = "_self";
		if ( get_bst_value('target') == 1) { $target = "_blank"; } else {$target = "_self"; }

		?>
		<div id="BSTDSGVOCookiInfo" style="display:none">
			<div style="font-size:28px;margin-top:0px;margin-bottom:5px;padding-top:0px;">Hinweispflicht zu Cookies</div>
			<p style="font-size:14px;line-height:18px;margin-bottom:5px">Webseitenbetreiber müssen, um Ihre Webseiten DSGVO konform zu publizieren, ihre Besucher auf die Verwendung von Cookies hinweisen und darüber informieren, dass bei weiterem Besuch der Webseite von der Einwilligung des Nutzers 
in die Verwendung von Cookies ausgegangen wird.</p>
<P style="font-size:14px;font-weight:bold;line-height:18px;margin-bottom:20px">Der eingeblendete Hinweis Banner dient dieser Informationspflicht.</p>
<P style="font-size:14px;font-weight:normal;line-height:18px;margin-bottom:20px">Sie können das Setzen von Cookies in Ihren Browser Einstellungen allgemein oder für bestimmte Webseiten verhindern. 
Eine Anleitung zum Blockieren von Cookies finden Sie 
<a class="bst-popup-link" title="Cookies blockieren, deaktivieren und löschen" href="https://bst.software/aktuelles/cookies-blockieren-deaktivieren-und-loeschen-browser-einstellungen/" target="_blank" rel="nofollow">
hier.</a></p>

<div class="bst-copyright" style="font-size:12px;line-height:14px"><span class="bst-copyright-span1">
WordPress Plugin Entwicklung von </span><a class="bst-popup-link" title="Offizielle Pluginseite besuchen" href="https://bst.software/aktuelles/dsgvo-cookie-hinweis-bst-dsgvo-cookie-wordpress-plugin/" target="_blank" rel="nofollow">
<span class="bst-copyright-span2">BST Software</span></a> </div>
		</div>
		
 		<div class="bst-panel group<?php echo $fixed; ?>" style="background:<?php bst_value('background'); ?>; border-bottom:<?php bst_value('border-size'); ?>px solid <?php bst_value('border'); ?>; font-family:'<?php bst_value('font'); ?>';">
		<span class="bst-info" title="Erfahren Sie mehr zu diesem Cookie Hinweis [BST DSGVO Cookie]"></span>
		<script type="text/javascript">
			
			var bst_btn_bg1 = <?php echo json_encode($bst_btn_bg1) ?>;
			var bst_btn_bg2 = <?php echo json_encode($bst_btn_bg2) ?>;
			var bst_show_info = <?php echo json_encode($bst_show_info) ?>;

			jQuery( document ).ready(function() {
				jQuery('.bst-accept-btn').hover(
					function(){
						jQuery(this).css('background-color', '');
        				jQuery(this).css('background-color', bst_btn_bg2);
    				},
    				function(){
						jQuery(this).css('background-color', '');
        				jQuery(this).css('background-color',  bst_btn_bg1);
    				});
			});

			if (bst_show_info==1) {	
				bsti = document.querySelector('.bst-info');
				bsti.addEventListener('click', function (e) {       
					vex.dialog.alert({
    				unsafeMessage: jQuery('#BSTDSGVOCookiInfo').html(),
					showCloseButton: false,
    				escapeButtonCloses: true,
    				overlayClosesOnClick: true,
    				className: 'vex-theme-flat-attack'
    				})
    			});
			}

		</script>
			<div class="bst-wrapper group" style="width:<?php bst_value('width'); ?>%; max-width:<?php bst_value('max-width'); ?>px; padding:<?php bst_value('padding'); ?>px 0;">
			    <div class="bst-msg" style="font-family:<?php bst_value('font'); ?>; color:<?php bst_value('text-color'); ?>;"><?php bst_value('message'); ?></div>
                <div class="bst-links">						
						<?php 
							if (get_bst_value('button_typ') ==1) {
						?>
							<button type="button" class="btn btn-primary btn-lg gradient bst-accept" onlick="#"><a href="#"><?php bst_value('accept'); ?></a></button>
						<?php 
							} else if(get_bst_value('button_typ')==2) {
						?>
							<a style="background:<?php bst_value('button-bg'); ?>; 
									  color:<?php bst_value('button-textcolor'); ?>;
									  font-family:'<?php bst_value('font'); ?>';" class="bst-accept-btn" href="#"><?php bst_value('accept'); ?></a>
						<?php  
							} else {
						?>
							<button type="button" class="btn btn-primary btn-lg gradient bst-accept" onlick="#"><a href="#"><?php bst_value('accept'); ?></a></button>
						<?php 	
							}
						?>	
                    <a style="font-family:'<?php bst_value('font'); ?>'; color:<?php bst_value('link-color'); ?>;" href="<?php bst_value('policy-url'); ?>" class="bst-info-btn" target="<?php bst_value('target'); ?>"><?php bst_value('more-info'); ?></a>
                </div>
				<div class="float"></div>
            </div>
        </div>
	
	<?php 
	}

	// Enabled
	if ($bst_options['enable']==1) {
		// If disabled
		if ( $bst_options['enable'] == 0 ) {
			return;
		}
	} else {
		// If not set it will fall back to the default(0) and exit here.
		return;
	}
	
	// Front page only
	if (isset($bst_options['front-only'])) {
		// If front page only has been selected
		if ( $bst_options['front-only'] == 1 ) {
			// Show only on front page
			if (is_front_page()) {
				echo bstContent();
			}
		}
	} else {
		// If not set it will fall back to the default(0) and display on all pages.
		echo bstContent();
	}
	
}

/*******************************
* Includes
*******************************/

include_once( plugin_dir_path( __FILE__ ) . 'includes/enqueue.php');

if ( is_admin() ) {
	include_once( plugin_dir_path( __FILE__ ) . 'includes/admin-seite.php'); 
	include_once( plugin_dir_path( __FILE__ ) . 'includes/admin-menu.php'); 
	include_once( plugin_dir_path( __FILE__ ) . 'includes/register-settings.php'); 
}

/*******************************
* Actions
*******************************/
add_action('wp_footer', 'bstInsert');
?>