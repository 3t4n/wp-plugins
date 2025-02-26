<?php
/**
 * WordPress Settings Framework
 *
 * @author  Gilbert Pellegrom, James Kemp
 * @link    https://github.com/gilbitron/WordPress-Settings-Framework
 * @license MIT
 */

/**
 * Define your settings
 *
 * The first parameter of this filter should be wpsf_register_settings_[options_group],
 * in this case "my_example_settings".
 *
 * Your "options_group" is the second param you use when running new WordPressSettingsFramework()
 * from your init function. It's important as it differentiates your options from others.
 *
 * To use the tabbed example, simply change the second param in the filter below to 'wpsf_tabbed_settings'
 * and check out the tabbed settings function on line 156.
 */

add_filter( 'wpsf_register_settings_cdb', 'cdb_settings' );


/**
 * Set wpsf settings.
 *
 * @since    1.0.0
 * 
 * @param 	 array 	$wpsf_settings
 */
function cdb_settings( $wpsf_settings ) {
	$wpsf_settings[] = array(
		'section_id'          => 'cdb_settings',
		'section_title'       => 'Settings',
		'section_description' => 'Fill-in settings for your very own custom dashboard background!',
		'section_order'       => 5,
		'fields'              => array(
			array(
				'id'      => 'background_image',
				'title'   => 'Background image',
				'type'    => 'file',
				'default' => '',
			),
			array(
				'id'      => 'footer_text_color',
				'title'   => 'Footer text color',
				'desc'    => 'Text color for footer text readability.',
				'type'    => 'color',
				'default' => '#ffffff',
			),
			array(
				'id'      => 'border_radius',
				'title'   => 'Border radius',
				'desc'    => 'The border radius of .wrap and .editor-writing-flow in pixels.',
				'type'    => 'number',
				'default' => 2.5,
			),
			array(
				'id'      => 'grayscale_filter',
				'title'   => 'Grayscale filter',
				'desc'    => 'Black and white filter for your background image.',
				'type'    => 'checkbox',
				'default' => 0,
			),
			array(
				'id'      => 'blur_filter',
				'title'   => 'Blur filter',
				'desc'    => 'Blur filter for your background image for 3 pixels.',
				'type'    => 'checkbox',
				'default' => 0,
			),
		),
	);

	return $wpsf_settings;
}
