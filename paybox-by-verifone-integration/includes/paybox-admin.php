<?php

/**
 * Paybox Admin.
 *
 * @class Paybox
 * @version	1.0.0.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

add_menu_page(__('Paybox', 'paybox'), __('Paybox', 'paybox'), 'manage_paybox', 'paybox', null, null, '55.5');

/**
 * Paybox_Admin class.
 */
class Paybox_Admin {

    /**
     * Constructor
     */
    public function __construct() {
        
    }

}

return new Paybox_Admin();
