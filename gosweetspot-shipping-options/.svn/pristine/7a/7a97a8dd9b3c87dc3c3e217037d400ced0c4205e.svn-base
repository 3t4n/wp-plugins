<?php
namespace Gss\Utils;

defined( 'ABSPATH' ) || exit;

\add_filter( 'plugin_action_links_gosweetspot-shipping-options/gss-shipping-options.php', __NAMESPACE__ . "\gss_add_plugin_page_settings_link", 10, 2 );
function gss_add_plugin_page_settings_link( $links ) {
    /*
     * Insert the link at the beginning
     */
    $in = '<a href="admin.php?page=wc-settings&tab=shipping&section=gss_shipping_method">' . __( 'Settings', GOSWEETSPOT_DOMAIN ) . '</a>';
    array_unshift( $links, $in );

    return $links;
}
