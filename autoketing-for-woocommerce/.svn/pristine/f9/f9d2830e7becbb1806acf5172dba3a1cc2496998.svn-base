<?php
defined( 'ABSPATH' ) || exit();
use autoLoading\autoLoading;
$GLOBALS['API_KEY'] = get_option( 'autoketing_key_login' );
add_action( 'admin_menu','autoketing_admin_menu'  ,1000 );
add_action( 'woocommerce_new_order','autoketing_get_order',1000,2 );
add_action( 'init', 'Autoketing_startSession', 100 );
add_action('init', 'autoketing_get_config',1000);
register_deactivation_hook( FILENAMEAUTOKETING, function(){
    $sessionname = 'autoketing_login'.$GLOBALS['API_KEY'];
    setcookie( $sessionname , "", time()- 60, "/","", 0);
    delete_option( 'autoketing_key_login' );   
});
if( !function_exists( 'autoketing_get_config' ) ){
    function autoketing_get_config(){
        require_once  AUTOKETING_PLUGIN_DIRNAME.'includes/autoketing-config.php';
    }
}
if( !function_exists( 'autoketing_admin_menu' ) ){
    function autoketing_admin_menu(){
        add_menu_page(__( 'Autoketing Menu Page','autoketing' ),__( 'Autoketing','autoketing' ),'edit_theme_options',
            'auto_keting' ,
            function () {
                AutoKeting::check_woo_active() ?
                include_once  AUTOKETING_PLUGIN_DIRNAME. 'templates/autoketing_admin_template.php' :
                include_once  AUTOKETING_PLUGIN_DIRNAME. 'templates/autoketing-setup-woo-template.php';             
            },
            AUTOKETING_PLUGIN_BASENAME.'assets/images/icons/icon-autoketing.png?a','55.8'          
        );
            
    }
    
}
if( !function_exists( 'autoketing_enqueue_custom_admin_style' ) ){
    function autoketing_enqueue_custom_admin_style() {    
        $ver = uniqid();
        wp_enqueue_style( 'animate_css', AUTOKETING_PLUGIN_BASENAME . 'assets/admin/css/animate.css', false );
        wp_enqueue_style( 'custom_wp_admin_css', AUTOKETING_PLUGIN_BASENAME . 'assets/admin/css/admin.css?'.$ver, false );
    } 
}  
add_action( 'admin_enqueue_scripts', 'autoketing_enqueue_custom_admin_style' );
if( !function_exists( 'autoketing_enqueue_admin_script' ) ){
    function autoketing_enqueue_admin_script() {
        wp_enqueue_script( 'autoketing-animation',AUTOKETING_PLUGIN_BASENAME.'assets/admin/js/wow.min.js', array( 'jquery' ) );    
        wp_enqueue_script( 'autoketing-admin',AUTOKETING_PLUGIN_BASENAME.'assets/admin/js/admin.js', array( 'jquery' ) );
        wp_localize_script( 'autoketing-admin', 'autoAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );       
    }
}
add_action( 'admin_enqueue_scripts', 'autoketing_enqueue_admin_script' );
if( !function_exists( 'Autoketing_startSession' ) ){
    function Autoketing_startSession() {        
        $sessionname = 'autoketing_login'.$GLOBALS['API_KEY'];
        if( !isset( $_COOKIE[ $sessionname ] ) ){   
            if( $GLOBALS['API_KEY'] != null ){
                setcookie($sessionname, true, 0 , "/");
                setcookie('keyLogin', $GLOBALS['API_KEY'] , 0 , "/");
            }
        }
    }
}
add_action( 'wp_enqueue_scripts', 'autoketing_enqueue_script' );
if( !function_exists( 'autoketing_enqueue_script' ) ){
    function autoketing_enqueue_script(){
        wp_enqueue_script( 'autoketing-frontend',AUTOKETING_PLUGIN_BASENAME.'/assets/frontend/js/frontend.js', array( 'jquery' ) );           
        if( $GLOBALS['API_KEY'] != null ){
            wp_enqueue_script( 'autoketing-currency','https://currency-app-dot-woo-product-sdk.uc.r.appspot.com/dist/currency-embed.js', array(),null,true );
        }
        do_action( 'autoketing_add_currency' );
    }
}
?>
