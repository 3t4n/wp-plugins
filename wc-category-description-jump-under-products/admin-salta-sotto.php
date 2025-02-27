<?php
/*
  Plugin Name: Move Category Description Under Products for WooCommerce
  Description: Sposta la descrizione della categoria WooCommerce sotto i prodotti. Solo la parte contenuta nello shortcode verrà spostata.
  Author: Marco Barbadoro
  Author URI: https://www.marcobarbadoro.it
  Plugin URI: https://www.marcobarbadoro.it/woo/tag-prodotto/vcv/
  License: GPLv2 or later
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Version: 1.0.2
  Requires at least: 6.0
  Tested up to: 6.7
  WC requires at least: 7.0
  WC tested up to: 9.5
*/


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Previene l'accesso diretto ai file.
}

// Dichiarare la compatibilità con HPOS.
add_action( 'before_woocommerce_init', function() {
    if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 
            'custom_order_tables', 
            __FILE__, 
            true 
        );
    }
});

// Verifica se WooCommerce è attivo.
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 
    ( function_exists( 'is_plugin_active' ) && is_plugin_active( 'woocommerce/woocommerce.php' ) ) ) {
    
    // Verifica che il file esista.
    if ( file_exists( plugin_dir_path( __FILE__ ) . 'salta-sotto.php' ) ) {
        include( plugin_dir_path( __FILE__ ) . 'salta-sotto.php' );
    } else {
        // Logga un messaggio di errore nel debug log di WordPress.
        error_log( 'Il file salta-sotto.php non è stato trovato nel plugin Move Category Description.' );
    }
} else {
    // Aggiunge una notifica se WooCommerce non è attivo.
    add_action( 'admin_notices', function() {
        echo '<div class="error"><p><strong>Move Category Description Under Products:</strong> Questo plugin richiede WooCommerce attivo per funzionare correttamente.</p></div>';
    });
}