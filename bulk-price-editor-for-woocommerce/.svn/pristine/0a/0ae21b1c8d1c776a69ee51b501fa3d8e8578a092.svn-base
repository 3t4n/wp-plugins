<?php
	/**
	 * Plugin Name:       Bulk Price Editor for WooCommerce
	 * Requires Plugins:  woocommerce
	 * Description:       Edit product prices in bulk with ease. Change prices by fixed amount, percentage or replace with new prices.
	 * Version:           1.0.0
	 * Plugin URI:        https://price-editor.com
	 * Author:            U2Code
	 * Author URI:        https://u2code.com/
	 * License:           GNU General Public License v3.0
	 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
	 * Text Domain:       bulk-price-editor-for-woocommerce
	 * Domain Path:       /languages/
	 *
	 * WC requires at least: 6.0
	 * WC tested up to: 9.7
	 **/
	
	use BulkPriceEditor\BulkPriceEditorPlugin;
	
	// If this file is called directly, abort.
	if ( ! defined( 'WPINC' ) ) {
		die;
	}
	
	if ( version_compare( phpversion(), '7.4.0', '<' ) ) {
		
		add_action( 'admin_notices', function () {
			?>
			<div class='notice notice-error'>
				<p>
					Bulk Price Editor requires PHP version to be <b>7.4 or higher</b>. You run PHP
					version <?php echo esc_attr( phpversion() ); ?>
				</p>
			</div>
			<?php
		} );
		
		return;
	}
	
	call_user_func( function () {
		
		require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
		
		$plugin = new BulkPriceEditorPlugin( __FILE__ );
		
		if ( $plugin->checkRequirements() ) {
			
			register_activation_hook( __FILE__, array( $plugin, 'activate' ) );
			
			add_action( 'uninstall', array( BulkPriceEditorPlugin::class, 'uninstall' ) );
			
			$plugin->run();
		}
	} );

define('BULK_PRICE_EDITOR_PRODUCTION', true);
