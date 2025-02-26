<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.


add_action( 'admin_enqueue_scripts', 'aida_enqueue_scripts' );

add_filter( 'plugin_action_links_' . AIDA_PLUGIN_BASE, 'plugin_action_links' );
add_filter( 'elementor/admin/dashboard_overview_widget/footer_actions', 'dashboard_widget_links' );


function aida_enqueue_scripts() {
    wp_enqueue_script( 'aida-admin', AIDA_ASSETS_URL . 'js/admin.js', array('jquery'), AIDA_VERSION, true );
    wp_enqueue_style( 'aida-admin', AIDA_ASSETS_URL . 'css/admin.css', AIDA_VERSION );
}

/**
 * Plugin action links.
 *
 * Adds action links to the plugin list table
 *
 * Fired by `plugin_action_links` filter.
 *
 * @since 1.0.0
 * @access public
 *
 * @param array $links An array of plugin action links.
 *
 * @return array An array of plugin action links.
 */
function plugin_action_links( $links ) {
    $aida_plugin_page_url = 'aida-templates';
    $import_link = sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'admin.php?page=' .$aida_plugin_page_url ), __( 'Import Templates', 'aida' ) );

    array_unshift( $links, $import_link );

    return $links;
}


function dashboard_widget_links( $additions_actions ) {
    $aida_plugin_page_url = 'aida-templates';
    $additions_actions['aida'] =
         [
            'title' => __( 'Import templates', 'aida' ),
            'link' => admin_url( 'admin.php?page=' .$aida_plugin_page_url ),
        ];

    return $additions_actions;
}