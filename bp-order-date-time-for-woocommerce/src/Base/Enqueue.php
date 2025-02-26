<?php
/**
 * @package BP Delivery For Woocommerce
 */

namespace Bright_Delivery_for_Woocommerce\Base;

use Bright_Delivery_for_Woocommerce\Bootstrap;


class Enqueue extends BaseController {

    const MAIN_JS = 'main_js';
    const MAIN_CSS = 'main_css';

    /**
     * Registers the scripts and styles the plugin
     *
     * @since 1.0.0
     * @access public
     *
     * @return void
     */
    public function register() {

        //add_action( 'wp_enqueue_scripts', [$this, 'add_scripts'] );
        //add_action( 'admin_enqueue_scripts', [$this, 'add_scripts'] );
    }

    /**
     * Callback of admin_enqueue_scripts
     *
     * @since 1.0.0
     * @access public
     *
     * @return void
     */
    public function add_scripts(){


    }

}
