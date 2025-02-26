<?php
/**
 * Plugin Name: Advanced Show and Hide Password
 * Plugin URI: https://codedecorator.com
 * Description: Code Decorator Advanced Show and Hide Password plugin.
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Version: 1.0.0
 * Requires PHP: 8.0
 * Author: CodeDecorator
 * Author URI: https://codedecorator.com
 * @package CodeDecorator
 */

defined('ABSPATH') || exit;

// Define plugin constants
define('CODEDECORATOR_SHP_VERSION', '1.0.0');
define('CODEDECORATOR_SHP_ABSPATH', plugin_dir_path(__FILE__));
define('CODEDECORATOR_SHP_PLUGIN_FILE', __FILE__);
define('CODEDECORATOR_SHP_PLUGIN_URL', plugin_dir_url(__FILE__));
define('CODEDECORATOR_SHP_ASSETS_URL', plugin_dir_url(__FILE__) . 'assets/');
define('CODEDECORATOR_SHP_IMAGES_URL', CODEDECORATOR_SHP_ASSETS_URL . 'images/');
define('CODEDECORATOR_SHP_PLUGIN_MINIMUM_PHP_VERSION', '8.0');

// Check if the current PHP version meets the minimum requirement
if ( ! version_compare( phpversion(), CODEDECORATOR_SHP_PLUGIN_MINIMUM_PHP_VERSION, '>=' ) ) {
	add_action(
		'admin_notices',
		function () {
			?>
			<div class="notice notice-error is-dismissible hts-theme-settings">
				<p>
					<?php /* translators: %s: PHP version */ ?>
					<strong><?php echo esc_html__( 'Attention:', 'advance-show-hide-password' ); ?></strong> <?php printf( esc_html__( 'The Advanced Show/Hide Password plugin requires minimum PHP version of <b>%s</b>.', 'advance-show-hide-password' ), esc_html( CODEDECORATOR_SHP_PLUGIN_MINIMUM_PHP_VERSION ) ); ?>
				</p>
				<p>
					<?php /* translators: %s: PHP version */ ?>
					<?php printf( esc_html__( 'You are running <b>%s</b> PHP version.', 'advance-show-hide-password' ), esc_html( phpversion() ) ); ?>ß
				</p>
			</div>
			<?php
		}
	);

	return;
}

add_action('wp_enqueue_scripts', 'codedecorator_shp_enqueue_script');
function codedecorator_shp_enqueue_script()
{
    wp_register_script(
        'codedecorator_shp_script',
        CODEDECORATOR_SHP_ASSETS_URL . 'js/advance-show-hide-password-global-scripts.js',
        array('jquery'),
        CODEDECORATOR_SHP_VERSION,
        true // Load in footer
    );

    // Adding 'defer' attribute
    add_filter('script_loader_tag', function($tag, $handle) {
        if ('codedecorator_shp_script' !== $handle) {
            return $tag;
        }
        return str_replace(' src', ' defer="defer" src', $tag);
    }, 10, 2);

    wp_enqueue_script('codedecorator_shp_script');

    wp_register_style(
        'codedecorator_shp_style',
        CODEDECORATOR_SHP_ASSETS_URL . 'css/style.css',
        array(),
        CODEDECORATOR_SHP_VERSION
    );
    wp_enqueue_style('codedecorator_shp_style');
}