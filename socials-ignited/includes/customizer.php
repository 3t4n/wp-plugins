<?php
/**
 * Registers Customizer panels, sections, and controls.
 *
 * @param WP_Customize_Manager $wp_customize Reference to the customizer's manager object.
 */
function cisiw_customize_register( $wp_customize ) {
	$wp_customize->add_panel( 'socials_ignited', array(
		'title'                    => esc_html_x( 'Socials Ignited', 'customizer section title', 'socials-ignited' ),
		'priority'                 => 70,
		'auto_expand_sole_section' => true,
	) );
	$wp_customize->add_section( 'socials_ignited_networks', array(
		'title'       => esc_html_x( 'Social networks', 'customizer section title', 'socials-ignited' ),
		'panel'       => 'socials_ignited',
		'description' => __( 'Below you can fill in the URLs of your profiles on the most popular social networks and pull them in the Socials Ignited Widget without having to manually create them.', 'socials-ignited' ),
		'priority'    => 100,
	) );

	$networks    = cisiw_get_social_networks();
	$social_mods = array();

	foreach ( $networks as $network ) {
		$social_mod = 'socials_ignited_networks_' . $network['name'];

		$wp_customize->add_setting( $social_mod, array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( $social_mod, array(
			'type'    => 'url',
			'section' => 'socials_ignited_networks',
			/* translators: %s is a social network's name, e.g.: Facebook URL */
			'label'   => esc_html( sprintf( _x( '%s URL', 'social network url', 'socials-ignited' ), $network['label'] ) ),
		) );
	}

	$wp_customize->add_setting( 'socials_ignited_networks_rss_feed', array(
		'default'           => get_bloginfo( 'rss2_url' ),
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'socials_ignited_networks_rss_feed', array(
		'type'    => 'url',
		'section' => 'socials_ignited_networks',
		'label'   => esc_html__( 'RSS Feed', 'socials-ignited' ),
	) );
}
