<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Desinstalación del plugin.
 *
 * @package Autogestiones_Plugin
 */

// Si se accede a este archivo directamente, aborta.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

// Elimina la opción de la base de datos.
delete_option( 'autg_plugin_options' );