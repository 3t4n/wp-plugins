<?php

if (!defined('ABSPATH')) exit;

/**
 * Cargo las opciones por defecto
 */
function rdwapp_default_settings(){

    global $rdwapp_options;

    $rdwapp_options = array(
        "rd_plugins_name"       => sanitize_text_field(RDWAPP_NAME_PLUGINS),
        "active_plugin"         => sanitize_text_field(1),
        "rd_plugins_position"   => sanitize_text_field("r"),
        "whatsapp" => array(
            "config" => array(
                "color"         => sanitize_hex_color("#6a99d8"),
                "textButton"    => sanitize_text_field( __("RD Contacto", 'rd-wapp')),
                "textWelcome"   => sanitize_textarea_field( __("Configure un mensaje de Bienvenida para los usuarios. 🙂", 'rd-wapp'))
            ),
            "user" => array(
                "name"          => sanitize_text_field( __("Abraham Bolívar", 'rd-wapp')),
                "departament"   => sanitize_text_field(""),
                "numberCode"    => sanitize_text_field(""),
                "number"        => sanitize_text_field("+580000000000"),
                "message"       => sanitize_textarea_field( __( "👋 Configure un mensaje de Inicio para el Agente.", 'rd-wapp'))
            )
        ),
        "phone" => array(
            "text"              => sanitize_text_field(__("Llamanos: ", 'rd-wapp')),
            "numberCode"        => sanitize_text_field( ""),
            "number"            => sanitize_text_field("+580000000000")
        )
    );

    $default_options = apply_filters('rdwapp_options_free', $rdwapp_options);

    // Actualizo las opciones
    update_option('rdwapp_options_free', $default_options);

    // Creo una variable global con las opciones
    $rdseo_options = rdwapp_get_settings();

}

/**
 * Verifico el arreglo de las opciones del plugin
 */
function rdwapp_get_settings() {

    $options    = get_option('rdwapp_options_free');
    $settings   = is_array($options)  ? $options : array();

    return $settings;
}

/**
 * Creo el item en el menu de Wordpress
 */
add_action( 'admin_menu' , 'rdwapp_options_submenu_page' );
function rdwapp_options_submenu_page(){

    add_submenu_page(
        'tools.php',
        RDWAPP_NAME_PLUGINS,
        RDWAPP_NAME_PLUGINS,
        'manage_options',
        'rdwapp',
        'rdwapp_options_page'
    );

}

/**
 * Cargo la pagina de opciones en el Admin de WP
 */
function rdwapp_options_page(){
    if (is_admin()) {
        include_once(RDWAPP_DIR . "/admin/rdwapp_options_admin.php");
    }
}

/**
 * Cargo los css personalizados del plugins en el Admin
 */
add_action( 'admin_print_styles', 'rdwapp_custom_css' );
function rdwapp_custom_css(){
    wp_enqueue_style("rdwapp", RDWAPP_URL . "assets/css/rdwapp-style.css", "", RDWAPP_VERSION);

}

/**
 * Cargo ls JS personalizados del plugins en el Admin
 */
add_action( 'admin_enqueue_scripts',  'rdwapp_custom_js' );
function rdwapp_custom_js(){
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-alpha',  RDWAPP_URL . '/assets/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '2.1.3', true );
    wp_enqueue_script( 'custom',  RDWAPP_URL . '/assets/js/custom.js', array( 'wp-color-picker' ), '1.0.0', true );
}

/**
 * Cargo ls JS personalizados del plugins en el Tema
 */
add_action( 'wp_enqueue_scripts',  'rdwapp_front_custom_css' );
function rdwapp_front_custom_css(){
    wp_enqueue_style("rdwapp-style", RDWAPP_URL . "assets/css/rdwapp-style-front.css", "", RDWAPP_VERSION);
}

/**
 * Cargo ls JS personalizados del plugins en el Tema
 */
add_action( 'wp_enqueue_scripts',  'rdwapp_front_custom_js' );
function rdwapp_front_custom_js(){
    wp_enqueue_script( 'rdwapp-script',    RDWAPP_URL . "assets/js/rdwapp-script-front.js", array( 'jquery' ), RDWAPP_VERSION, true );
}



/**
 * Detectar si es un dispositivo mobil en php
 * https://stackoverflow.com/a/10989524
 * @return false|int
 */
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

?>