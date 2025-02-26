<?php
/*
Plugin Name: Embed Steam store widget
Description: For any game with a visible purchase option in the Steam store, you can create a widget with information about your product, current price, any discounts, and a purchase button to help you promote and display your title anywhere.
Version: 1.0
Author: Xhats.com
Author URI: https://xhats.com/
*/
add_action( 'init', function()
{
    wp_embed_register_handler(
        'myvi',
        '#https://store\.steampowered\.com/app/([^/]+)/([^/]+)/*#',
        'embed_steam_store_handler'
    );
} );


function embed_steam_store_handler( $matches, $attr, $url, $rawattr )
{
    $embed = sprintf(
        '<iframe src="https://store.steampowered.com/widget/%1$s"
         width="600" height="400" frameborder="0"></iframe>',
        esc_attr( $matches[1] )
    );
    return apply_filters( 'embed_steam_store_handler', $embed, $matches, $attr, $url, $rawattr );
}
