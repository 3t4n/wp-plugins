<?php

namespace Maantheme\Addons;

/**
 * The admin class
 */
class Admin {

    /**
     * Initialize the class
     */
    function __construct() {
        $this->dispatch_actions();
    }

    /**
     * Dispatch and bind actions
     *
     * @return void
     */
    public function dispatch_actions() {
        new Admin\Menu();
        new Admin\Base();
        if (class_exists('CSF')){
            require_once MAAN_ELEMENTOR_ADDONS_PATH . '/includes/Admin/Pages/settings.php';
        }
    }
}