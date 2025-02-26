<?php
/**
 * Plugin Name: Hexasmal : Communes et codes postaux par API La Poste
 * Description: Récupération des communes par code postal grâce à l'API DataNova La Poste
 * Version: 1.4.4.2
 * Plugin Slug: hexasmal_cp
 * Author: Fluenx
 * Requires at least: 4.0
 * Tested up to: 6.4
 * Author URI: http://solutions.fluenx.com/
 * Text Domain: hexasmal_cp
 */


/**
 * 1.4.3 libelle d'acheminement
 * 1.4.2 image + bump
 * 1.4 nom de champs ACF
 * 1.3 ajouté le choix des lieux dits (ligne_5)
0.1.3 ajouté controle sur les pages edit shipping et edit billing ("mon compte")
0.1.2 ajouté controle optionnel sur adresse facturation
0.1.1 Ajouté la possibilité d'avoir plusieurs pays
**/

defined('HEXASMAL_CP_NAME') 	or define( 'HEXASMAL_CP_NAME', 	plugin_basename( __FILE__ ) ); // plugin name as known by WP.
defined('HEXASMAL_CP_SLUG') 	or define( 'HEXASMAL_CP_SLUG', 	'hexasmal_cp' );// plugin slug (should match above meta: Text Domain).
defined('HEXASMAL_CP_DIR') 		or define( 'HEXASMAL_CP_DIR', 		dirname( __FILE__ ) ); // our directory.
defined('HEXASMAL_CP_PATH') 	or define( 'HEXASMAL_CP_PATH', 	realpath(__DIR__)  ); // our directory.
defined('HEXASMAL_CP_URL') 		or define( 'HEXASMAL_CP_URL', 		plugins_url( '', __FILE__ ) );


defined('HEXASMAL_CP_APIURL')	or define('HEXASMAL_CP_APIURL','https://datanova.legroupe.laposte.fr/api/records/1.0/search/?dataset=laposte_hexasmal&rows=30&facet=code_commune_insee&facet=nom_de_la_commune&facet=code_postal&facet=libell_d_acheminement&refine.code_postal=');

try {
	require_once( HEXASMAL_CP_PATH . '/hexasmal-functions.php' );
	require_once( HEXASMAL_CP_PATH . '/hexasmal-shortcodes.php' );
	require_once( HEXASMAL_CP_PATH . '/hexasmal-admin.php' );
	require_once( HEXASMAL_CP_PATH . '/hexasmal-javascript.php' );
	
	
	
	
} catch (Exception $e) {
	if(current_user_can( 'manage_options' )) {
		print_r($e);
	}
}


/**
 * Ajoute les actions sur les formulaires WooCommerce
 **/
add_action('wp','hexasmal_maybe_hook');
function hexasmal_maybe_hook() {
	if ( class_exists( 'WooCommerce' ) ) {	

		$type = 'billing_address';
		add_action(
			'woocommerce_after_edit_address_form_billing',
			function() use($type) { 
			hexasmal_add_verification($type);
			}
		);
		$type = 'shipping_address';
		add_action(
			'woocommerce_after_edit_address_form_shipping',
			function() use($type) { 
			hexasmal_add_verification($type);
			}
		);
		
		if(get_option('hexasmal_add_on_WC_cart')) {
			// Page panier
			$type = 'shipping_calculator';
			add_action('woocommerce_after_shipping_calculator',	
				function() use($type) { 
				hexasmal_add_verification($type);
			});
	}
		if(get_option('hexasmal_add_on_WC_order_shipping')) {
			// Page commande : shipping
			$type = 'shipping_form';
			add_action('woocommerce_after_checkout_shipping_form',	
				function() use($type) { 
				hexasmal_add_verification($type);
			});
		}
		// Page commande : billing
		if(get_option('hexasmal_add_on_WC_order_billing')) {
			$type = 'billing_form';
			add_action('woocommerce_after_checkout_billing_form',	
			function() use($type) { 
			hexasmal_add_verification($type);
		});			
		}


		// Page de commande : billing
		$type = 'order_billing_address';
		add_action('woocommerce_admin_order_data_after_billing_address', 
			function() use($type) {
				hexasmal_add_verification($type);
			});




	}
		add_action('wp_footer','hexasmal_cp_javascript');
}


add_action('admin_init','hexasmal_maybe_hook_admin');
function hexasmal_maybe_hook_admin() {
	if ( class_exists( 'WooCommerce' ) ) {	

		$type = 'order_billing_address';
		add_action('woocommerce_admin_order_data_after_billing_address', 
			function() use($type) {
				hexasmal_add_verification($type);
			});

		$type = 'order_shipping_address';
		add_action('woocommerce_admin_order_data_after_shipping_address', 
			function() use($type) {
				hexasmal_add_verification($type);
			});

		add_action('admin_footer','hexasmal_cp_javascript');

	}
}


add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'hexasmal_plugin_action_links' );
function hexasmal_plugin_action_links( $links ) {
 $links = array_merge( 
 	array(
 		'<a href="' . esc_url( admin_url( '/options-general.php?page=hexasmal_cp.php' ) ) . '">' . __( 'Réglages', 'hexasmal' ) . '</a>'
 	), 
 	$links 
 );
 return $links;
}

