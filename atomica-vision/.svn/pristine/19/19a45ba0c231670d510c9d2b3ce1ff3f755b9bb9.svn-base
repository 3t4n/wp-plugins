<?php

require_once( __DIR__ . '/atomica_vision_icon.php');

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( !function_exists("atomica_vision_admin_menu") ) {

    function atomica_vision_admin_menu()
    {
        $icon_data_uri = 'data:image/svg+xml;base64,' . AtomicaVisionIcon::get();
          add_menu_page(
            'Atomica Vision', // Title of the page
            'Atomica Vision', // Text to show on the menu link
            'manage_options', // Capability requirement to see the link
            'atomica-vision',
            'atomica_vision_admin_page',
            $icon_data_uri,
            4
        );
    }

}