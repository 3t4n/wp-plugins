<?php
/**
 * Class DV_FLMegaMenu
 *
 * This class enables Mega Menu to beaver builder child theme.
 */

class DV_FLMegaMenu
{
    public function initialize()
    {
        add_filter( 'walker_nav_menu_start_el', 'DV_FLMegaMenu::navigation_description', 10, 4 );
        remove_filter('nav_menu_description', 'strip_tags');
        add_filter( 'wp_nav_menu', array($this,'menu_shortcodes') );
    }

    public static function navigation_description( $item_output, $item, $depth, $args ) {

        if ( !empty( $item->description ) ) {
            $item_output = str_replace( $args->link_after . '</a>', '<p class="menu-item-description">' . $item->description . '</p>' . $args->link_after . '</a>', $item_output );
        }

        return $item_output;
    }

    public function menu_shortcodes( $menu_item ){
        return do_shortcode( $menu_item );
    }
}
