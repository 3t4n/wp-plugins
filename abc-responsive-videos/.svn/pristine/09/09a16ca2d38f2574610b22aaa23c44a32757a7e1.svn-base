<?php
class ABC_Responsive_Videos_Customizer {
    /**
     * Construct the plugin object
	 *
	 * @since 1.0.0
	 */
    public function __construct() {
		add_action( 'customize_register', array( $this, 'customize_register' ) );
    }

	/**
	 * Adds theme options to the Customizer screen
	 *
	 * This function is attached to the 'customize_register' action hook.
	 *
	 * @param	class $wp_customize
	 *
	 * @since 1.0.0
	 */
	public function customize_register( $wp_customize ) {
		## Responsive Video section
		$wp_customize->add_section( 'abc_responsive_videos', array(
			'title' => __( 'Responsive Videos', 'abc_responsive_videos' ),
			'priority' => 50,
			'description' => __( '<strong>NOTE:</strong> Use the class <em>responsiveignore</em> on your actual video containers if you want them to be ignored by this plugin.', 'abc_responsive_videos' ),
		) );
		// setting
		$wp_customize->add_setting( 'abc_responsive_videos_selector', array(
			'default' => '#page',
			'sanitize_callback' => 'esc_attr',
		) );
		// control
		$wp_customize->add_control( 'abc_responsive_videos_selector', array(
			'label'    => __( 'Class or ID', 'abc_responsive_videos' ),
			'section'  => 'abc_responsive_videos',
			'priority' => 1,
			'type'     => 'text',
			'description' => __( 'You can change the option below to any container Class or ID you want.', 'abc_responsive_videos' ),
		) );
	}
}
$abc_responsive_videos_customizer = new ABC_Responsive_Videos_Customizer();