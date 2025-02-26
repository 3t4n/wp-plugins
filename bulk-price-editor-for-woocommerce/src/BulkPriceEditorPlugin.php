<?php namespace BulkPriceEditor;

use Automattic\WooCommerce\Utilities\FeaturesUtil;
use BulkPriceEditor\Actions\ActionsManager;
use BulkPriceEditor\Core\AdminNotifier;
use BulkPriceEditor\Core\FileManager;
use BulkPriceEditor\Core\ServiceContainerTrait;
use BulkPriceEditor\EditorPage\PriceEditorPage;
use BulkPriceEditor\ProductsTable\Services\AjaxHandler;

/**
 * Class BulkPriceEditorPlugin
 *
 * @package BulkPriceEditor
 */
class BulkPriceEditorPlugin {
	
	use ServiceContainerTrait;
	
	const VERSION = '1.0.0';
	
	public function __construct( string $mainFile ) {
		// Coreco
		$this->getContainer()->add( 'fileManager', new FileManager( $mainFile ) );
		$this->getContainer()->add( 'adminNotifier', new AdminNotifier() );
		
		$this->saveActivationTime();
		$this->declareCompatibilities();
	}
	
	public function declareCompatibilities() {
		add_action( 'before_woocommerce_init', function () {
			if ( class_exists( FeaturesUtil::class ) ) {
				
				$mainFile = $this->getContainer()->getFileManager()->getMainFile();
				
				FeaturesUtil::declare_compatibility( 'custom_order_tables', $mainFile );
				FeaturesUtil::declare_compatibility( 'cart_checkout_blocks', $mainFile );
				FeaturesUtil::declare_compatibility( 'product_block_editor', $mainFile );
			}
		} );
	}
	
	public function initializationHooks() {
		add_filter( 'plugin_row_meta', array( $this, 'addPluginsMeta' ), 10, 2 );
	}
	
	public function checkRequirements(): bool {
		if ( ! function_exists( 'is_plugin_active' ) ) {
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
		
		// Check if WooCommerce is active
		if ( ! ( is_plugin_active( 'woocommerce/woocommerce.php' ) || is_plugin_active_for_network( 'woocommerce/woocommerce.php' ) ) ) {
			/* translators: %s: required plugin */
			$message = sprintf( __( '<b>Bulk Price Editor</b> plugin requires %s to be installed and activated.',
				'bulk-price-editor-for-woocommerce' ),
				'<a target="_blank" href="https://wordpress.org/plugins/woocommerce/">WooCommerce</a>' );
			
			$this->getContainer()->getAdminNotifier()->push( $message, AdminNotifier::ERROR );
			
			return false;
		}
		
		return true;
	}
	
	/**
	 * Entry point when every requirement is passed
	 */
	public function run() {
		
		$this->initializationHooks();
		
		new PriceEditorPage();
		new ActionsManager();
		
		// Init Services
		add_action( 'init', function () {
			$this->getContainer()->initService( AjaxHandler::class );
		} );
	}
	
	public function addPluginsMeta( $links, $file ) {
		
		if ( strpos( $file, 'bulk-price-editor-for-woocommerce' ) === false ) {
			return $links;
		}
		
		$links['docs'] = '<a target="_blank" href="' . self::getDocumentationURL() . '">' . __( 'Documentation',
				'bulk-price-editor-for-woocommerce' ) . '</a>';
		
		return $links;
	}
	
	/**
	 * Fired during plugin uninstall
	 */
	public static function uninstall() {
		delete_option( 'bpe_plugin_activation_timestamp' );
	}
	
	/**
	 * Plugin activation
	 */
	public function activate() {}
	
	public static function getDocumentationURL(): string {
		return '#';
	}
	
	public function saveActivationTime() {
		if ( ! get_option( 'bpe_plugin_activation_timestamp', false ) ) {
			update_option( 'bpe_plugin_activation_timestamp', time() );
		}
	}
	
	public static function getPluginActivationDate(): ?int {
		return intval( get_option( 'bpe_plugin_activation_timestamp', 0 ) );
	}
}
