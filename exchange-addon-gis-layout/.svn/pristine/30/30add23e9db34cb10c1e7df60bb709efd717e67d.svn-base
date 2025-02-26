<?php
/**
 * Adds our templates directory to the list of directories
 * searched by Exchange
 *
 * @since 1.0.0
 *
 * @param array $template_path existing array of paths Exchange will look in for templates
 * @param array $template_names existing array of file names Exchange is looking for in $template_paths directories
 * @return array Modified template paths
*/
function it_exchange_addon_gis_layout_register_templates( $template_paths, $template_names ) {
	// Bail if not looking for one of our templates
	$add_path = false;
	$templates = array(
                'content-store/loops/product-info.php',
                'content-store/elements/product.php',
                'content-store/elements/description.php'
	);
	foreach( $templates as $template ) {
            
            if ( in_array( $template, (array) $template_names ) ) {
                $add_path = true; 
            }
	}
        
	if ( ! $add_path )
		return $template_paths;

        array_unshift($template_paths, dirname( __FILE__ ) . '/templates');

	return $template_paths;
}
add_filter( 'it_exchange_possible_template_paths', 'it_exchange_addon_gis_layout_register_templates', 10, 2 );