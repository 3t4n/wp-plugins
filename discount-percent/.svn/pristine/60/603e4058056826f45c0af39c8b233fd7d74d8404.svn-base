<?php 
/*
Plugin Name: Percent - Porcentaje de Descuento
Plugin URI: https://grafiweb.org/
Description: Este plugin te permite mostrar un porcentaje de descuento en vez de la palabra "Oferta" en Woocommerce
Version: 1.0
Author: Sócrates Crespo
Author URI: https://socratescrespo.com
License: GPLv2
*/

// Mostrar porcentaje de descuento en vez de la palabra "oferta"
if ( in_array( 'woocommerce/woocommerce.php', get_option( 'active_plugins' ) ) ){
	
	add_filter( 'woocommerce_sale_flash', 'percent_porcentaje_descuento', 10, 3 );
	function percent_porcentaje_descuento( $showText, $post, $product ) {
	
		if ( version_compare( '3.0.0' , WC()->version, '>' ) ) {
	
			if( $product->product_type == 'variable' ){
			
	    		    $regular_price = $product->max_variation_price;
	    		    $sale_price = $product->min_variation_sale_price;
	    		}
	    		else{
	    		    
	    		    $regular_price = $product->regular_price;
	    		    $sale_price = $product->sale_price;
	    		}
		}
		else{
	
			if( $product->get_type() == 'variable' ){
			
	    		    $regular_price = $product->get_variation_regular_price( 'max' );
	    		    $sale_price = $product->get_variation_sale_price( 'min' );
	    		}else{
	    		    
	    		    $regular_price = $product->get_regular_price();
	    		    $sale_price = $product->get_sale_price();
	    		}
		}
	    	
	    	$percent = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
	    	$showText = '<span class="onsale" style="z-index:999;">'. __('-', 'woocommerce' ). $percent . '%</span>';
		
	    	return $showText;
	}
}
