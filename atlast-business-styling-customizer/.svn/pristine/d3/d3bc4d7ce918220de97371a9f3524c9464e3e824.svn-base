<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://akisthemes.com
 * @since             0.5.0
 * @package           Asbc
 *
 * @wordpress-plugin
 * Plugin Name:       Atlast Business Styling Customizer
 * Plugin URI:        https://akisthemes.com/atlast-business-styling-customize-plugin
 * Description:       This plugin is a companion of the free Atlast Business WordPress theme. It creates a customizer panel which contains over 70 color settings to completely customize the color scheme of this theme. You can change the color from all the elements present in that theme.
 * Version:           0.8.0
 * Author:            ArchimidisM
 * Author URI:        https://akisthemes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       absc
 * Domain Path:       /languages
 */
if ( ! defined( 'ABSPATH' ) ) exit;

if ( file_exists( plugin_dir_path( __FILE__ ) . 'includes/customizer.php' ) ) {
	require_once( 'includes/customizer.php' );
}
if ( file_exists( plugin_dir_path( __FILE__ ) . 'includes/generate_colors.php' ) ) {
	require_once( 'includes/generate_colors.php' );
}
add_action('customize_register','absc_customizer_styles');


if(!function_exists('absc_customizer_preview')):
	function absc_customizer_preview(){
		wp_enqueue_script( 'absc-customizer-preview',plugins_url('/assets/js/absc-customizer-preview.js',__FILE__ ),array( 'jquery','customize-preview' ),rand(8,888),true);
	}
endif;
add_action( 'customize_preview_init', 'absc_customizer_preview' );

if(!function_exists('absc_generate_styles')):
	function absc_generate_styles(){
		$newColors = absc_return_the_colors();
		if($newColors == false){
			return;
		}
		ob_start();?>
			<style class="absc-styles" id="absc-styles">

				<?php
					foreach($newColors as $segments){
						foreach($segments as $key=>$value){
							echo $key.sanitize_hex_color($value).';}';
						}
					}
				?>

			</style>
		<?php echo ob_get_clean();
	}
endif;

add_action('wp_head','absc_generate_styles',99);