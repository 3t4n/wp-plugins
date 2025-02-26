<?php
/*
 * Live Preview - Product Options
 * https://sahu.media
 *
 * @package sahu_live_product_options
 * @copyright Copyright (c) 2020, SAHU MEDIA®
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/////////////////////////////
//////// ShortCodes /////////
/////////////////////////////

/////////////////////////////////////////////////////////
// Shortcode zum präsentieren des Formulars (Elementor //
/////////////////////////////////////////////////////////

	// Shortcode zum präsentieren des Customizer
	add_action( 'woocommerce_before_add_to_cart_form', 'sahu_live_lite_product_displayform', 10 );
	function sahu_live_lite_product_displayform() {
		global $post;
		global $product;
		global $woocommerce;
		
		// Check for the custom field value
		$product = wc_get_product( $post->ID );
		$single = $product->get_meta( 'singleproduct' ); 
		$doublepro = $product->get_meta( 'dobuleproduct' );
		
		$maxlenght_text_1 = $product->get_meta( 'maxtextlenght_text1' );
		$maxtextlenght_text_2 = $product->get_meta( 'maxtextlenght_text2' );
		
		$fontsize_text1 = $product->get_meta( 'fontsize_text1' );
		$fontsize_text2 = $product->get_meta( 'fontsize_text2' );	
		
		$specialchars = $product->get_meta( 'engravespecialchars' );
		
		$fieldname_text1 = $product->get_meta( 'fieldname_text1' );
		$fieldname_text2 = $product->get_meta( 'fieldname_text2' );
		
		$fontcolor_1 = $product->get_meta( 'fontcolor_1' );	
		
		$wanttextarea = $product->get_meta( 'wanttextarea' );
		
		if($single)
			{ 
	?>
			<div class="gravurmodul">
				<div class="inputs">
					<div class="row1 ">
						<div class="cell1">
							<label for="gravurfont"><?php echo __( 'Schriftart', 'sahu_live_product_options' );?></label>
								<select id="gravurfont" name="gfont">
								
<?php
									global $wpdb;
									$sahu_fonts_productoptions = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'sahu_productoption_fonts');
									foreach ( $sahu_fonts_productoptions as $sahu_fonts_productoption ) {
										
									  print '<option value="'.$sahu_fonts_productoption->fontname.'">'.$sahu_fonts_productoption->fontname.'</option>';
									  
									}
		
?>
								</select>
						</div>
						<div class="cell" id="gravur1">
							<label for="gravurtext"><?php print $fieldname_text1;?></label>
							<div class="textlimit"><span class="textlimit_actual">0</span>/<span class="textlimit_max"><?php print $maxlenght_text_1;?></span></div>
								<input type="text" id="gravurtext" name="gravurtext" maxlength="<?php print $maxlenght_text_1?>" class="marked">		
						</div>
	<?php 
			}

		if($doublepro)
			{  
	?>
						<div class="cell" id="gravur2">
								<label for="gravurtext2"><?php print $fieldname_text2;?></label>
								<div class="textlimit"><span class="textlimit_actual">0</span>/<span class="textlimit_max"><?php print $maxtextlenght_text_2;?></span></div>
								<input type="text" id="gravurtext2" name="gravurtext2" maxlength="<?php print $maxtextlenght_text_2;?>" class="marked">
						</div> 
					</div>						
	<?php }     
				
	}

?>