<?php
/**
 * File: class-amtc-meta-theme-color.php
 *
 * Class wrapper for storing color option and outputting meta tag to <head>
 *
 * @package pwwp_amtc
 */

if ( ! class_exists( 'AMTC_Meta_Theme_Color' ) ) {
	/**
	 * This class is used to output a meta value to the <head> for 'theme-color'. It
	 * also also creates customizer options for the user to choose a color.
	 *
	 * Chrome and Opera will use it as the addressbar color for users on mobile
	 * while they browse a site.
	 */
	class AMTC_Meta_Theme_Color {

		/**
		 * Constructer function where the class instantiates.
		 *
		 * Used to add actions we need to create customizer options and output to <head>
		 */
		public function __construct() {

			// Add options to the customizer to set addressbar color.
			add_action( 'customize_register', array( $this, 'add_customizer_options' ) );
			// Add action to output meta value for theme color in header.
			add_action( 'wp_head', array( $this, 'output_meta_theme_color' ) );

		}

		/**
		 * Get option for color and output in a 'theme-color' meta tag in <head>.
		 *
		 * @param string $color hex_value of a color.
		 *
		 * @return void
		 */
		public function output_meta_theme_color( $color = false ) {
			// do we have a color being passed?
			if ( $color ) {
				// color passed cast it to $theme_color.
				$theme_color = $color;
			} else {
				// no color passed to function, grab from options.
				$theme_color = get_option( 'amtc_theme-color ', false );
			}
			// do we have a valid hex color?
			if ( sanitize_hex_color( $theme_color ) ) {
				$output = '<meta name="theme-color" content="' . $theme_color . '">';
				echo $output; // WPCS: XSS OK.
			}
		}

		/**
		 * Create options inputs in customizer.
		 *
		 * @param object $wp_customize object holding customizer options.
		 */
		public function add_customizer_options( $wp_customize ) {

			$wp_customize->add_section(
				'addressbar_theme_color_header',
				array(
				   'title'    => esc_html__( 'Addressbar Theme Color', 'amtc' ),
				   'priority' => 30,
				)
			);

			$wp_customize->add_setting(
				'amtc_theme-color',
				array(
				   'default'			=> '',
				   'type'				=> 'option',
				   'sanitize_callback' 	=> 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'amtc_theme-color',
					array(
						'label'      => __( 'Adressbar Color', 'mytheme' ),
						'section'    => 'addressbar_theme_color_header',
						'settings'   => 'amtc_theme-color',
					)
				)
			);

		}

	}

} // End if().
