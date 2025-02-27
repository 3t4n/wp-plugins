<?php

namespace WcGetnet\WordPress;

use CoffeeCode\WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register and enqueues assets.
 */
class AdminServiceProvider implements ServiceProviderInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function register( $container ) {
		// Nothing to register.
	}

	/**
	 * {@inheritDoc}
	 */	
	public function bootstrap( $container ) {
		add_action( 'admin_init', [$this, 'verifyActiveWoocommerce'] );
		add_action( 'admin_head', [$this, 'removeAdminMessages'] );
	}

    public function removeAdminMessages() {
		if(!$this->isGetnetSettingsTab()) {
			return;
		}

		remove_all_actions( 'admin_notices' );
	}

	public function isGetnetSettingsTab() {
		$current_screen = get_current_screen();

		return 'woocommerce_page_getnet-settings' === $current_screen->id || $this->isGetnetPeymentMethodSettingsTab();
	}

	public function isGetnetPeymentMethodSettingsTab() {
		$currentSection = isset( $_GET["section"] ) ? $_GET["section"] : '' ;

		$getnetSection = [
			"getnet-pix", 
			"getnet-creditcard", 
			"getnet-billet" 
		];

		return in_array($currentSection, $getnetSection);
	}

	/**
	 * Disable getnet plugin when woocommerce is not active
	 *
	 * @return void
	 */
	public static function verifyActiveWoocommerce(){
		if (!class_exists('WooCommerce')) {
			add_action('admin_notices', 'add_woocommerce_notices');
        	deactivate_plugins('wc-checkout-getnet/wc-checkout-getnet.php');
		}
	}

	/**
	 * Show wordpress message error when user tries to activate getnet plugin
	 * with woocommerce not actived.
	 *
	 * @return void
	 */
	public static function notActiveWithoutWC(){
		if (class_exists('WooCommerce')) {
			return;
		}

		wp_die(
			__( "<b>Atenção:</br></b> </br> É necessário instalar e ativar o plugin <b>WooCommerce</b> para que o Plugin Getnet funcione corretamente!" ),
            __( 'Coffee Code - Getnet for WooCommerce' ),
            array(
                'back_link' => true,
            )
        );
	}

}