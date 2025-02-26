<?php
/**
 * @descclass Wooquote imports scripts and css 
 */
/*

*@TODO bootstrap Product sayfasini kaydirip kullanilmaz hale getiriyor

*custom hook tanımlanip pluginin etki alani cıkartıldıgında bu kosul degıstırılecektır.

* @desc Appsila Setting sayfasina ozgu olarak bootstrap css dosyasi kosuludur.

*

*/
if ($pagenow == 'admin.php') {
    
    appsila_wqt_load_admin_php_page_special_files_wpScriptCSSImports();
    
}else if ($checkExceptionOfadminProgressWooCommerce==false&&($checkCartPageUri!==false||$checkShopProductPage!==false)) {
    
    appsila_wqt_enqueue_all_load_wpScriptCSSImports();
    
    appsila_wqt_load_admin_php_page_special_files_wpScriptCSSImports();
    
}

/*
 * Appsila Plugin style-css files enqueue_style loading from this function
 */
function appsila_wqt_enqueue_styles_load_wpScriptCSSImports(){
    
    wp_register_style('my_stylesheet1', plugins_url('/../css/appsila-wooquote-main.css', __FILE__));
    
    wp_enqueue_style('my_stylesheet1');
    
    wp_register_style('my_stylesheet2', plugins_url('/../css/setting.css', __FILE__));
    
    wp_enqueue_style('my_stylesheet2');
    
}

/*
 * Appsila Plugin javascript  files enqueue_script loading from this function
 */
function appsila_wqt_enqueue_scripts_load_wpScriptCSSImports(){
    
    wp_enqueue_script('jquery');
    
    wp_enqueue_script ( 'custom-script', plugins_url('/../js/appsila-wooquote-main.js', __FILE__));
    
    wp_enqueue_script ( 'custom-script2', plugins_url('/../js/setting.js', __FILE__));
    
}

/**

* @desc Bootstap Dosyalrını yukler.

* @see $pagenow degiskeninden admin php kontrolu yapıp true ise ekler
*/

function appsila_wqt_load_admin_php_page_special_files_wpScriptCSSImports(){
    
    wp_enqueue_style('bootstrap_css', plugins_url('/../css/bootstrap.css', __FILE__));
    
    wp_enqueue_style('bootstrap_toggle_css', plugins_url('/../css/bootstrap-toggle.min.css', __FILE__));
    
    wp_register_script ( 'bootstrap_js', plugins_url('/../js/bootstrap.js', __FILE__));
    
    wp_enqueue_script ( 'bootstrap_js');
    
    wp_register_script ( 'bootstrap_toggle_js', plugins_url('/../js/bootstrap-toggle.min.js', __FILE__));
    
    wp_enqueue_script ( 'bootstrap_toggle_js');
    
}

/*

*Appsila Plugin enqueue_script action all combined and loading from this file

*/

function  appsila_wqt_enqueue_all_load_wpScriptCSSImports(){
    
    appsila_wqt_enqueue_styles_load_wpScriptCSSImports();
    
    appsila_wqt_enqueue_scripts_load_wpScriptCSSImports();
    
}

add_action( 'wp_enqueue_scripts', 'appsila_wqt_enqueue_all_load_wpScriptCSSImports' );

add_action( 'wp_head', 'appsila_wqt_enqueue_all_load_wpScriptCSSImports' );

add_action( 'admin_enqueue_scripts', 'appsila_wqt_enqueue_all_load_wpScriptCSSImports' );

add_action( 'admin_head', 'appsila_wqt_enqueue_all_load_wpScriptCSSImports' );
?>