<?php

if (function_exists('kirki')) {

	Kirki::add_panel( 'finest_panel', array(

	    'priority'    => 10,
	    'title'       => esc_html__( 'Quick View Option', 'finest-quickview' ),
	) );

	// General
	if ( file_exists(  FINEST_QUICKVIEW_INC . 'customizer/general.php' ) ) {
		require_once(  FINEST_QUICKVIEW_INC . 'customizer/general.php' );
	}

	// Style
	if ( file_exists(  FINEST_QUICKVIEW_INC . 'customizer/style.php' ) ) {
		require_once(  FINEST_QUICKVIEW_INC . 'customizer/style.php' );
	}


}
