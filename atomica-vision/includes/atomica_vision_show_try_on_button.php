<?php 

if( !function_exists("atomica_vision_show_try_on_button") ) { 
    function atomica_vision_show_try_on_button()
    {
        include_once plugin_dir_path(__FILE__) . 'vision/button.php';
        return esc_html(atomica_vision_get_button());
    }
 
}