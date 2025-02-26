<?php

/* ------------------------------------------------------------------
 * To retrieve a value use: $eat_options[$prefix.'var']
 * ------------------------------------------------------------------*/

$prefix = 'eat_';

/* ------------------------------------------------------------------
 * Create list of themes
 * ------------------------------------------------------------------*/

// Check compatibility
$i = 0;
if (function_exists('wp_get_themes')) : 
    foreach (wp_get_themes() as $theme) :
        $installed_themes[] = array('label' => $theme->name, 'value' => $theme->template);
        $i++;
    endforeach;
else :
   $installed_themes = array_keys(get_themes());
endif;

/*
if( is_admin() ) {
	echo '<pre>';
	print_r($installed_themes);
	echo '</pre>';
}
*/


/* ------------------------------------------------------------------
 * Create the TABS
 * ------------------------------------------------------------------*/

$eat_custom_tabs = array(
		array(
			'label'=> __('Parameters', 'eat'),
			'id'	=> $prefix.'parameters'
		)
	);

/* ------------------------------------------------------------------
 * Options Field Array
 * ------------------------------------------------------------------*/

$eat_custom_meta_fields = array(
	
	/* -- TAB 1 -- */
	array(
		'id'	=> $prefix.'parameters', // Use data in $eat_custom_tabs
		'type'	=> 'tab_start'
	),

	array(
		'label'=> __('Please configure the options above', 'eat'),
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	
	array(
		'label'	=> __('Choose theme to display ', 'eat'),
		'desc'	=> __('Select the them to use for logged-in admins', 'eat'),
		'id'	=> $prefix.'theme',
		'type'	=> 'select',
		'options' => $installed_themes
	),
	
	array(
		'type'	=> 'tab_end'
	),
	/* -- /TAB 1 -- */



);

?>