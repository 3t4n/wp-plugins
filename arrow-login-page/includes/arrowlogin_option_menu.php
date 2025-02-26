<?php
add_action( 'admin_menu', function(){

add_menu_page( "Customizer", "Arrow Login","manage_options","arrow_login_page_customizer", 'arrowlogin_option_menu', '' ,30 );
add_submenu_page( "arrow_login_page_customizer", "Support", "Support", "manage_options", "arrow_login_page_customizer_support", function(){
	include_once( 'arrowlogin-support-page.php' );

} );

    add_meta_box('clickitfbf_support_meta','Support:',function() {
        ?>
        <a href="http://clickitplugins.com/support/" target="_blank" class="clickitfbf-action-btn">Get Support</a>
        <?php
     },nackle_get_screen_id('arrow_login_page_customizer'),'side','core');



});
function nackle_get_screen_id( $slug ){
    global $_parent_pages;
    $parent = array_key_exists( $slug, $_parent_pages ) ? $_parent_pages[$slug] : '';
    return get_plugin_page_hookname( $slug, $parent );
}

function arrowlogin_option_menu(){
	add_option( 'arrowPluginFirstTime', 'yes');

    ?>
    <h2><?php _e('Arrow Login Page Customizer', 'arrowlogin'); ?></h2>
    <p><?php _e('Arrow Login Page Customizer is a plugin which makes you beautify your login page using Wordpress Customizer. In customizer, you can preview your changes before you save them.', 'arrowlogin'); ?></p>
    <p><?php _e('In Customizer, navigate to Arrow Login Page Customizer', 'arrowlogin'); ?>.</p>

    <a href="<?php echo get_admin_url(); ?>customize.php?url=<?php echo wp_login_url(); ?>&call=arrow-login-customizer" id="submit" class="button button-primary"><?php _e('Get Started!', 'arrowlogin'); ?></a>

    <?php

}

function arrowlogin_register_option_menu(){
    add_theme_page('Arrow Login Page Customizer', 'Arrow Login Page Customizer', 'manage_options', 'arrow_login_page_customizer', 'arrowlogin_option_menu');
}

add_action( 'admin_menu', 'arrowlogin_register_option_menu' );

function arrowlogin_admin_style() {
//  wp_enqueue_style( 'admin_style', CLICKLOGIN_PATH . '/css/arrowlogin-option-menu.css',array(), CLICKLOGIN_VERSION, false );
}
add_action( 'admin_enqueue_scripts', 'arrowlogin_admin_style' );
?>