<?php
/**
 * Questo file è parte del plugin WooCommerce v3.x di Fattura24
 * Autore: Fattura24.com <info@fattura24.com>
 *
 * chiamata API GetPdc
 */
namespace Fattura24;

if (!defined('ABSPATH')) exit;

require_once FATT_24_CODE_ROOT . 'api/api_wrapper.php';


/**
 * Restituisce la chiamata API per l'elenco pdc
 */
function fatt_24_get_pdc() {
    return fatt_24_api_call('GetPdc', array(), FATT_24_API_SOURCE);
}