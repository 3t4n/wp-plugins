<?php
/*
 Plugin Name: FACTO - Facturaci&oacute;n Electr&oacute;nica
 Description: Integraci&oacute;n de documentos electr&oacute;nicos (facturas y/o boletas afecta o exenta electr&oacute;nicas)
 Version:           3.0.3
 Author:      <a href="https://www.facto.cl/">FACTO</a>
 */

//cambia los .js



if (!defined('ABSPATH')) exit; // Exit if accessed directly


// Agrega la página de settings en plugins
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'facto_add_plugin_page_settings_link');

function facto_add_plugin_page_settings_link( $links ) {
    $links2[] = '<a href="' .
        admin_url( 'admin.php?page=facto_settings' ) .
        '">' . __('Ajustes') . '</a>';
    
        $links = array_merge($links2,$links);
        
        return $links;
}



require dirname(__FILE__)."/factofacturacionelectronica_lib.php";

/*
 * SETUP
 */

require dirname(__FILE__)."/factofacturacionelectronica_setup.php";

register_activation_hook(__FILE__, 'facto_fe_setup');

/*
 * ADMIN
 */

require dirname(__FILE__)."/factofacturacionelectronica_admin.php";

/*
 * CHECKOUT
 */

require dirname(__FILE__)."/factofacturacionelectronica_checkout.php";




?>