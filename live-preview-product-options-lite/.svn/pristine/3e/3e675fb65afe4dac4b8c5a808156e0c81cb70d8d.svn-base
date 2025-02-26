<?php
/*
 * Live Preview - Product Options
 * https://sahu.media
 *
 * @package sahu_live_product_options_lite
 * @copyright Copyright (c) 2020, SAHU MEDIA®
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Registriere Adminmenü

add_action( 'admin_menu', 'sahu_live_product_options_lite_admin_menu' );
function sahu_live_product_options_lite_admin_menu() {
    add_menu_page(
        __( 'Live Product Options', 'sahu_live_product_options_lite' ),
        __( 'Live Product Options', 'sahu_live_product_options_lite' ),
        'manage_options',
        'live-product-options-sahu',
        'sahu_live_product_options_lite_admin_page_contents',
        'dashicons-schedule',
        3
    );
}

// Lade Seiteninhalt + Einstellungen

function sahu_live_product_options_lite_admin_page_contents() {
    ?>
    <h1> <?php esc_html_e( 'Live Product Options - SAHU MEDIA ®', 'sahu_live_product_options_lite' ); ?> </h1>
	<?php
	
		echo __( '<h3>Einstellungen</h3><p>Hinterlege deine Lizenz und nehme die Einstellungen vor.</p>', 'sahu_live_product_options_lite' );
		
		if(get_locale() == 'de_DE'){
			echo '<a href="https://shop.sahu.media/p/woocommerce-live-editor/" target="_blank"><img src="'.plugin_dir_url(dirname(__FILE__,2)).'/images/pro.png"></a>';
		}else{
			echo '<a href="https://shop.sahu.media/p/woocommerce-live-editor/" target="_blank"><img src="'.plugin_dir_url(dirname(__FILE__,2)).'/images/pro_en.png"></a>';
		}
		
	//Get the active tab from the $_GET param
	$default_tab = null;
	$tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;
	
?>
  <!-- Our admin page content should all be inside .wrap -->
  <div class="wrap">
    <!-- Here are our tabs -->
    <nav class="nav-tab-wrapper">
      <a href="?page=live-product-options-sahu" class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>"><?php echo __( 'Pro-Version', 'sahu_live_product_options_lite' );?></a>
	  <a href="?page=live-product-options-sahu&tab=activeproducts" class="nav-tab <?php if($tab==='activeproducts'):?>nav-tab-active<?php endif;?>" ><?php echo __( 'Aktive Produkte', 'sahu_live_product_options_lite' );?></a>
	  <a href="?page=live-product-options-sahu&tab=fonts" class="nav-tab <?php if($tab==='fonts'):?>nav-tab-active<?php endif;?>" ><?php echo __( 'Schriftarten', 'sahu_live_product_options_lite' );?></a>
      <a href="?page=live-product-options-sahu&tab=shortcodes" class="nav-tab <?php if($tab==='shortcodes'):?>nav-tab-active<?php endif; ?>"><?php echo __( 'Nützliches / Shortcodes', 'sahu_live_product_options_lite' );?></a>
      <a href="?page=live-product-options-sahu&tab=video" class="nav-tab <?php if($tab==='video'):?>nav-tab-active<?php endif;?>" ><?php echo __( 'Video / Dokumentation', 'sahu_live_product_options_lite' );?></a>
	  <a href="?page=live-product-options-sahu&tab=elementor" class="nav-tab <?php if($tab==='elementor'):?>nav-tab-active<?php endif;?>" ><?php echo __( 'Elementor Guide', 'sahu_live_product_options_lite' );?></a>
    </nav>


    <div class="tab-content">
<?php switch($tab) :
      case 'shortcodes':
?>
    <h3><?php echo __( 'Dokumentation & Elementor', 'sahu_live_product_options_lite' );?></h3>
	<p><?php echo __( 'Wenn du mit Elementor (PRO) Single-Templates erstellst, nutze folgende Shortcodes:', 'sahu_live_product_options_lite' );?></p>
	<ul>
		<li><?php echo __( '[sahu_displaycustomizer] - Zum Darstellen des Editors', 'sahu_live_product_options_lite' );?></li>
		<li><?php echo __( '[sahu_displaysvgimg] - Zum Darstellen des Bildes', 'sahu_live_product_options_lite' );?></li>
	</ul>
	<p><?php echo __( 'Weitere Informationen erhälst in der Dokumentation.', 'sahu_live_product_options_lite' );?></p>
	<h3><?php echo __( 'Preview Editor', 'sahu_live_product_options_lite' );?></h3>
	<?php add_thickbox(); ?>
	<p><?php echo __( 'Rufe den Editor auf um die MPfade zu erhalten. <a href="https://sahu.media/modal_preview/previewimg.php?TB_iframe=true&width=800&height=700" class="thickbox">Klicke hier!</a>', 'sahu_live_product_options_lite' );?></p>
<?php	
      break;
	  case 'activeproducts':
		echo __( '<h2>Aktive Produkte</h2>', 'sahu_live_product_options_lite' );
		echo __( 'Bitte aktiviere die PRO-Version.', 'sahu_live_product_options_lite' );
      break;
	  case 'fonts':
		
		if(get_locale() == 'de_DE'){
			echo '<a href="https://shop.sahu.media/p/woocommerce-live-editor/" target="_blank"><img src="'.plugin_dir_url(dirname(__FILE__,2)).'/images/fonts-DE.png"></a>';
		}else{
			echo '<a href="https://shop.sahu.media/p/woocommerce-live-editor/" target="_blank"><img src="'.plugin_dir_url(dirname(__FILE__,2)).'/images/fonts-DE.png"></a>';
		}
		
      break;
      case 'video':
        if(get_user_locale() == 'de_DE'){
			echo '<iframe width="560" height="315" style="margin-top:10px;" style="margin-top:10px;" src="https://www.youtube.com/embed/KG_tgIOa2h0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
		}else{
			echo '<iframe width="560" height="315" style="margin-top:10px;" src="https://www.youtube.com/embed/mhnON-vUsNU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
		}
      break;
	  case 'elementor':
        if(get_user_locale() == 'de_DE'){
			echo '<iframe width="560" height="315" style="margin-top:10px;" style="margin-top:10px;" src="https://www.youtube.com/embed/Tdj7y6fWDM4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
		}else{
			echo '<iframe width="560" height="315" style="margin-top:10px;" src="https://www.youtube.com/embed/XJgGXVggZxs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
		}
      break;
      default:
		echo __( '<h2>Erwerbe die PRO-Version</h2>', 'sahu_live_product_options_lite' );
?>		
		<p><?php echo __( 'Erwerbe die PRO-Version und schalte den Live-Editor frei! Profitiere von einer menge Vorteile, wie:', 'sahu_live_product_options_lite' );?></p>
		<p><?php echo __( '<ul><li>Live-Vorschau des Textes</li><li>Vorschau Editor</li><li>Aktiviere Sonderzeichen</li><li>Elementor Features wie "ShortCodes"</li><li>Hinzufügen von Schriftarten (Cooming Soon)</li></ul>', 'sahu_live_product_options_lite' );?></p>
		<p><?php echo __( 'Hier geht es zur Webseite: <a href="https://shop.sahu.media/p/woocommerce-live-editor/" target="_blank">Shop</a>', 'sahu_live_product_options_lite' );?></p>
<?php
        break;
    endswitch; 
?>
    </div>
  </div>	
    <?php
}