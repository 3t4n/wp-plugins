<?php
/**
 * Plugin Name: Additional JS
 * Plugin URI: https://wordpress.org/
 * Description: Allows Javascript code to be added to a site using the customizer.
 * Author: ModularWP
 * Author URI: https://modularwp.com/
 * Version: 1.0.4
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: additional_js_textdomain
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adds an Additional JS setting to the Customizer
 *
 * @since  1.0.0
 * @param  $wp_customize
 * @return void
 */
function mdlr_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'custom_js', array(
		'title'    => __( 'Additional JS', 'textdomain' ),
		'priority' => 190,
	) );

	$wp_customize->add_setting( 'custom_js', array(
		'type' => 'option',
	) );

	$wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'custom_html', array(
		'code_type' => 'javascript',
		'settings'  => 'custom_js',
		'section'   => 'custom_js',
	) ) );
}
add_action( 'customize_register', 'mdlr_customize_register' );

/**
 * Outputs Additional JS to site footer
 *
 * @since  1.0.0
 * @return void
 */
function mdlr_additional_js_output() {
	$js = get_option( 'custom_js', '' );

	if ( !empty( $js ) ) {
		?>
			<script type="text/javascript">
				<?php echo $js . "\n"; ?>
			</script>
		<?php
	}
}
add_action( 'wp_footer', 'mdlr_additional_js_output' );

/**
 * Loads customizer styles
 *
 * @since  1.0.0
 * @return void
 */
function mdlr_additional_js_styles() {
	wp_enqueue_style( 'additional-js-styles', plugins_url( '/styles.css', __FILE__ ) );
}
add_action( 'customize_controls_enqueue_scripts', 'mdlr_additional_js_styles' ); ?>