<?php 

if( !function_exists("atomica_vision_admin_page") ) { 
    function atomica_vision_admin_page()
    {
        include_once plugin_dir_path(__FILE__) . 'admin/index.php';
        return esc_html(atomica_vision_get_admin());
    } 
} 

