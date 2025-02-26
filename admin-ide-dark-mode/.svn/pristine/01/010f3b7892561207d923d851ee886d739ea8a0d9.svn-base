<?php

defined( 'ABSPATH' ) || exit;

/**
 * Get AIDM nonce
 */
function aidm_get_nonce_id() {
    return 'aidm_admin';
}

/**
 * Get AIDM text domain
 */
function aidm_get_text_domain() {
    return 'aidm';
}

/**
 * Add Aidm link on settings menu
 */
function aidm_add_menu() {
    add_submenu_page(
        'options-general.php',
        __( 'IDE Theme', aidm_get_text_domain() ),
        __( 'IDE Theme', aidm_get_text_domain() ),
        'manage_options',
        AIDM_FORM_ID,
        'aidm_load_home_page'
    );
}

/**
 * Return true if on aidm home page ( and admin post process )
 */
function aidm_is_home_page() {
    return (
        (
            isset ($_GET['page'] ) 
            && $_GET['page'] == AIDM_FORM_ID 
        )
        || 
        (
            isset ( $_POST['action'] ) 
            && $_POST['action'] == AIDM_POST_ID 
        )
    ? 
        true
    :
        false
    );
}

/**
 * Return true if on plugins.php page ( and admin ajax process )
 */
function aidm_is_plugins_page() {
    global $pagenow;

    return ( 
        $pagenow == 'plugins.php' 
        || 
        (
            isset ( $_POST['action'] ) 
            && $_POST['action'] == AIDM_AJAX_ID
        )
    ?
        true
    :
        false
    );
}

/**
 * Load home page
 */
function aidm_load_home_page() {
    require_once( AIDM_VIEWS_DIR.'aidm-form.php' );
}

/**
 * Get user AIDM theme preference
 */
function aidm_get_user_admin_ide_theme_preference() {
    $user_id = get_current_user_id();
    $meta_key = 'aidm-theme-preference';

    return get_user_meta( $user_id, $meta_key, true );
}

/**
 * load translations
 */
function aidm_load_textdomain() {
    $plugin_extension = '-'.determine_locale().'.mo';

    load_textdomain( 
        aidm_get_text_domain(), 
        AIDM_LANG_DIR.AIDM_PLUGIN_ID.$plugin_extension
    );
}


