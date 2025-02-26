<?php

/**
 * Description of E2WL_DebugPageController
 *
 * @author andrey
 *
 * @autoload: e2wl_before_admin_menu
 */
if (!class_exists('E2WL_DebugPageController')) {

    class E2WL_DebugPageController extends E2WL_AbstractAdminPage
    {
        public function __construct()
        {
            if (defined('E2WL_DEBUG_PAGE') && E2WL_DEBUG_PAGE) {
                parent::__construct("Debug", "Debug", 'manage_options', 'e2wl_debug');
            }
        }

        public function render($params = array())
        {
            echo '<br/><b>DEBUG</b><br/>';
        }
    }

}
