<?php 

	$widgets = get_option( 'sidebars_widgets' );

	foreach ( (array)$widgets as $index => $sidebar ) {
		foreach ( (array)$sidebar as $widget_id ) 
		if( FALSE === strpos( $widget_id, 'ait' ) ) {
			unset( $wp_registered_widgets[$widget_id] );
		}
		else {
			$sidebar_name = $index;
		}
	}

	@dynamic_sidebar( $sidebar_name );

?>