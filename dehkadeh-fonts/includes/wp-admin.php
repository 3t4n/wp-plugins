<?php

add_action( 'admin_menu', 'register_dw_fonts_admin_page' );
function register_dw_fonts_admin_page() {
    // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page( __( 'Dehkadeh Fonts', 'dw-fonts' ), __( 'Dehkadeh Fonts', 'dw-fonts' ), 'edit_theme_options', 'dw-fonts', 'dw_wp_admin_page_option', 'dashicons-admin-customizer' );
}

function dw_wp_admin_page_option() {
    if ( !current_user_can( 'edit_theme_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }

    echo '<div class="wrap">';
        echo '<h1>' . __( 'Dehkadeh Fonts', 'dw-fonts' ) . '</h1>';
        echo '<p>' . __( 'This plugin is designed and developed by <b>Dehkadeh Wp</b>.', 'dw-fonts' ) . '</p>';
        echo '<p>' . __( '<b>Our services:</b> Wp original themes shopping center, Professional web design, Website optimization and SEO, Security and Speed config, Professional support, ...', 'dw-fonts' ) . '</p>';
        echo '<p>' . __( 'Please visit our website. <b>Dehkadeh Wp</b>: ', 'dw-fonts' ) . '<a href="https://dehkadeh-wp.ir/" target="_blank"><b>Dehkadeh-Wp.ir</b></a></p>';
        echo '<hr>';

        echo '<h2>' . __( 'How to use this plugin?', 'dw-fonts' ) . '</h2>';
        echo '<p>' . __( 'By using this plugin you can change the site\'s font easily. There are 120 fonts in the plugin and you can upload your own fonts too.', 'dw-fonts' ) . '</p>';
        echo '<p>' . sprintf( __( 'To change the font, go to <a href="%s"><b>Appearance &gt; Customize</b></a> and choose persian font.', 'dw-fonts' ), esc_url( admin_url( 'customize.php' ) )) . '</p>';
        echo '<p>' . __( 'To use <b>IranSans font</b>, please create a folder named <b>fonts</b> in the <b>wp-content</b> folder and upload the IranSans font in it.', 'dw-fonts' ) . '</p>';
        echo '<p>' . sprintf( __( 'IranSans font is a premium font and you can buy it from <a href="%s" target="_blank"><b>fontiran</b></a>. Also if you buy a wordpress theme from <a href="%s" target="_blank"><b>Dehkadeh-Wp</b></a>, you will get the IranSans font as free within the theme and you don\'t need to buy the font separately .', 'dw-fonts' ), 'http://fontiran.com/', 'https://dehkadeh-wp.ir/') . '</p>';
        echo '<p>' . sprintf( __( 'For more details and receive support, visit <a href="%s" target="_blank"><b>this page</b></a>.', 'dw-fonts' ), 'https://dehkadeh-wp.ir/wordpress/dehkadeh-fonts-plugin/') . '</p>';
    echo '</div>';

}