<?php

if(!defined('ABSPATH')){
    die;
}

function minutos_Styles($hook){

    if($hook == 'toplevel_page_99' 
    || $hook == '99-minutos_page_ShippingMethods'  
    || $hook == '99-minutos_page_Orders' 
    || $hook == 'toplevel_page_vendors99'
    || $hook == '99-sucursales_page_add'
    || $hook == '99-sucursales_page_delete'
    || $hook == '99-minutos_page_shippingPDF')
    {
        wp_enqueue_style('test', plugins_url( '../view/src/css/styles.css' , __FILE__ ));
    }
}

add_action('admin_enqueue_scripts', 'minutos_Styles');