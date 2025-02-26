<?php

if(!defined('ABSPATH')){
    die;
}

require_once plugin_dir_path( __DIR__ ) . 'view/classes/View99.php';

//Función que recupera el HTML de las Vistas
function minutos_adminMenu(){
    $view99 = new Minutos_View99;
    return $view99->noventayNueveMinutos();
}

//Función que recupera el HTML del submenú
function minutos_subMenu1(){
    $view99 = new Minutos_View99;
    return $view99->subMenuShippingMethods();
}

//Función que recupera el HTML del submenú
function minutos_subMenu2(){
    $view99 = new Minutos_View99;
    return $view99->subMenuOrders();
}

function minutos_subMenu3(){
    $view99 = new Minutos_View99;
    return $view99->shippingPDF();
}

//Función que recupera el HTLM de las vistas para las sucursales 
function minutos_vendorsMenu(){
    $view99 = new Minutos_View99;
    return $view99->noventayNueveMinutosPlaces();
}

//Función que recupera el HTML para añadir direcciones
function minutos_addVendor(){
    $view99 = new Minutos_View99;
    return $view99->addLocation();
}
//Termina función que recupera el HTML para añadir direcciones

//Función que crea un top-menu en el admin
function noventayNueveMinutos_adminPage()
{
    add_menu_page( 
        '99 minutos',
        '99 minutos',
        'manage_options',
        '99', // Es el id de este menú
        'minutos_adminMenu', //Aquí va la función que recupera el HTML de las Vistas
        plugin_dir_url( __DIR__ ) . 'view/src/img/logowhite.png',
        20
    );
    add_submenu_page( 
        '99', //Aquí le decimos que queremos que sea un submenú del menú 99 minutos
        'Métodos de envío',
        'Métodos de envío',
        'manage_options',
        'ShippingMethods', //id
        'minutos_subMenu1' //Función que recupera el HTML del submenú
     );
     add_submenu_page( 
        '99', //Aquí le decimos que queremos que sea un submenú del menú 99 minutos
        'Órdenes',
        'Órdenes',
        'manage_options',
        'Orders', //id
        'minutos_subMenu2' //Función que recupera el HTML del submenú
     );
     add_submenu_page(
        '99', //Aquí le decimos que queremos que sea un submenú del menú 99 minutos
        'Impresión de guías',
        'Impresión de guías',
        'manage_options',
        'shippingPDF', //id
        'minutos_subMenu3' //Función que recupera el HTML del submenú
     );
}

function noventayNueveMinutos_vendorsPage()
{
    add_menu_page( 
        'Sucursales',
        '99 - Sucursales',
        'manage_options',
        'vendors99', //id
        'minutos_addVendor', //Función
        plugin_dir_url( __DIR__ ) . 'view/src/img/logowhite.png',
        21
     );
     add_submenu_page( 
        'vendors99', //Aquí le decimos que queremos que sea un submenú del menú 99 minutos
        'Añadir',
        'Añadir',
        'manage_options',
        'add', //id
        'minutos_vendorsMenu' //Función que recupera el HTML del submenú
     );
}

add_action('admin_menu', 'noventayNueveMinutos_adminPage');
add_action('admin_menu', 'noventayNueveMinutos_vendorsPage');