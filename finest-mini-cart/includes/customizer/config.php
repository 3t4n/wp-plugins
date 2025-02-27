<?php

if (function_exists('kirki')) {

	Kirki::add_panel( 'fmc_panel', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Floating Cart for WooCommerce', 'finest-mini-cart' ),
	) );



	// General
	if ( file_exists(  FMC_INC . 'customizer/general.php' ) ) {
		require_once(  FMC_INC . 'customizer/general.php' );
	}
	// translations
	if ( file_exists(  FMC_INC . 'customizer/translations.php' ) ) {
		require_once(  FMC_INC . 'customizer/translations.php' );
	}
	// Style
	if ( file_exists(  FMC_INC . 'customizer/visibility.php' ) ) {
		require_once(  FMC_INC . 'customizer/visibility.php' );
	}


	 if ( file_exists(  FMC_INC . 'customizer/cart-style.php' ) ) {
	 	require_once(  FMC_INC . 'customizer/cart-style.php' );
	 }


	if ( file_exists(  FMC_INC . 'customizer/cart-icon-box-style.php' ) ) {
		require_once(  FMC_INC . 'customizer/cart-icon-box-style.php' );
	}

	if ( file_exists(  FMC_INC . 'customizer/product-box.php' ) ) {
		require_once(  FMC_INC . 'customizer/product-box.php' );
	}


}
