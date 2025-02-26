<?php
/**
 * Main init class
 **/

namespace ArubaFe\Initialization;
if (!defined('ABSPATH')) die('No direct access allowed');

use ArubaFe\Admin\AdminInit as InitializzationAdminClass;
use ArubaFe\CheckoutBlocks\ArubaFeCheckoutBlocks;
use ArubaFe\Publics\PublicInit as InitializzationPublicClass;


class Init
{

    function __construct()
    {
        add_action('init', [$this, 'ffs_load_aruba_fe']);
        add_action('plugins_loaded', [$this, 'registerCheckoutBlocks']);
    }

    function ffs_load_aruba_fe()
    {
        $this->init();
    }

    private function init()
    {

        load_plugin_textdomain('aruba-fatturazione-elettronica', false, ARUBA_FE_PATH . '/languages');

        $this->loadAdminCode();
        $this->loadPubblicCode();
    }

    private function loadPubblicCode()
    {
        new InitializzationPublicClass();
    }

    private function loadAdminCode()
    {
        new InitializzationAdminClass();
    }

    public function registerCheckoutBlocks()
    {
        ArubaFeCheckoutBlocks::initialize();
    }


}
