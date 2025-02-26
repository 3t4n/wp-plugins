<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class ARMICN_NAV_WALKER {

    private static $_instance = null;


    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        add_action('plugins_loaded', [$this, 'init']);
    }

    public function init() {
        add_filter('walker_nav_menu_start_el', [$this, 'add_icon_to_nav_menu'], 10, 4);
    }

    public function add_icon_to_nav_menu($item_output, $item, $depth, $args) {

    
        $icon_styles = '';
        $armicn_options = !empty(get_option('armicn_options')) ? get_option('armicn_options') : [];
        $armicn_icon_position = isset($armicn_options['icon_position']) ? $armicn_options['icon_position'] : 'left';
        $ar_menu_icons = get_post_meta( $item->ID, 'ar_menu_icons', true ) == true ? get_post_meta( $item->ID, 'ar_menu_icons', true ) : [];
        $menu_item_icon_source = isset($ar_menu_icons['content']['icon_source']) ? $menu_item_icon_source = $ar_menu_icons['content']['icon_source'] : '';
        

        if(isset($ar_menu_icons['css'])){
    

            $armicn_css = $ar_menu_icons['css'];
            
            $armicn_icon_position = (isset($armicn_css['icon_position']) && !empty($armicn_css['icon_position']) && $item->ID) ? $armicn_css['icon_position'] : null;
            
            // Handle icon styles
            $icon_properties = [
                'icon_color' => 'color',
                'icon_font_size' => ($menu_item_icon_source == 'custom') ? 'height' : 'font-size',
                'icon_margin_left' => 'margin-left',
                'icon_margin_right' => 'margin-right',
                'icon_margin_top' => 'margin-top',
                'icon_margin_bottom' => 'margin-bottom'
            ];
            
            foreach ($icon_properties as $css_key => $css_property) {
                if (isset($armicn_css[$css_key]) && !empty($armicn_css[$css_key])) {
                    $icon_styles .= $css_property . ':' . $armicn_css[$css_key] . ';';
                }
            }
            
    
        }
    

        $menu_item_icon = '';
        if ( !empty($ar_menu_icons['content']['icon_source']) && !empty($ar_menu_icons['content']['icon'])) {

            $icon_class = ($armicn_icon_position == 'right') ? 'icon-right' : 'icon-left';

            if ($menu_item_icon_source == 'dashicon' || $menu_item_icon_source == 'fontawesome' || $menu_item_icon_source == 'themify') {
                $menu_item_icon = sprintf(
                    '<span class="armicn menu-icon %s %s" style="%s"></span>',
                    $icon_class,
                    $ar_menu_icons['content']['icon'],
                    $icon_styles
                );
            }

        }


        // Add icon before or after menu text
        if (!empty($menu_item_icon)) {
            $item_output = str_replace(
                $args->link_before . $item->title,
                $armicn_icon_position == 'right' 
                    ? $args->link_before . $item->title . $menu_item_icon 
                    : $args->link_before . $menu_item_icon . $item->title,
                $item_output
            );
        }


        return $item_output;
    }
}

ARMICN_NAV_WALKER::instance();
