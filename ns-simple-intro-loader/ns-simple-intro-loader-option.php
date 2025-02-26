<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ns_dispsl_activate_set_options()
{
    add_option('ns_simple_loader_dimension', '');
}

register_activation_hook( __FILE__, 'ns_dispsl_activate_set_options');



function ns_dispsl_register_options_group()
{
    register_setting('ns_simple_loader_options_group', 'ns_simple_loader_dimension');      
    register_setting('ns_simple_loader_options_group', 'ns_disp_style');      
    register_setting('ns_simple_loader_options_group', 'ns_loader_text');      
}
 
add_action ('admin_init', 'ns_dispsl_register_options_group');

?>