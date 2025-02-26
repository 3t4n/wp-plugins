<?php
/*
Plugin Name: AWEOS Offcanvas Menu for Divi 
Plugin URI:  https://developer.wordpress.org/plugins/aweos-offcanvas-menu/
Description: Displays an offcanvas menu
Version:     2.0.7
Author:      AWEOS GmbH
Author URI:  https://aweos.de
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: aweos-offcanvas-menu
Domain Path: /languages
*/

// Ersetze Minify durch WordPress eigene Funktionen
function awoc_minify_css($css) {
    // Entferne Kommentare
    $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
    // Entferne Leerzeichen
    $css = str_replace(["\r\n", "\r", "\n", "\t", '  ', '    ', '    '], '', $css);
    return $css;
}

function awoc_register_offcanvas_menu()
{
    register_nav_menu('offcanvas-menu', __('Offcanvas Menu'));
}
add_action('init', 'awoc_register_offcanvas_menu');

add_action('wp_enqueue_scripts', 'awoc_offcanvas_asset');
function awoc_offcanvas_asset()
{
    wp_enqueue_style('awoc_offcanvas_style', plugin_dir_url(__FILE__) . 'public/css/app.css', [], '1.4.3');
    
    if (!is_customize_preview()) {
        wp_enqueue_script('awoc_offcanvas_script', plugin_dir_url(__FILE__) . 'public/js/app.js', ['jquery'], '1.4.3', true);
    }
}

add_action('customize_preview_init', 'awoc_enqueue_offcanvas_refresh_js');
function awoc_enqueue_offcanvas_refresh_js()
{
    wp_enqueue_script('awoc_offcanvas_customize', plugin_dir_url(__FILE__).'public/js/customize.js', array( 'jquery','customize-preview' ));
    if (is_customize_preview()) {
        wp_enqueue_script('awoc_offcanvas_script', plugin_dir_url(__FILE__).'public/js/app.js', ['jquery'], '', true);
    }
}

//---------------------------------- Settings -----------------------------------
function awoc_offcanvas_customizer($wp_customize)
{
    $colorControlClass = 'WP_Customize_Color_Control';

    // Styling für Überschriften und Controls
    $wp_customize->add_setting('awoc_customizer_styles', array(
        'default' => '',
        'sanitize_callback' => 'esc_html'
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'awoc_customizer_styles', array(
        'type' => 'hidden',
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_customizer_styles',
        'priority' => 1,
        'description' => '<style>
            /* Styling für Gruppenüberschriften */
            .customize-control-hidden .customize-control-title {
                font-size: 16px !important;
                font-weight: 600 !important;
                padding: 5px 0 5px !important;
                border-bottom: 2px solid #00000069 !important;
                margin-bottom: 5px !important;
                color: #1e1e1e !important;
                text-transform: uppercase !important;
            }
            
            /* Styling für einzelne Einstellungen */
            .customize-control:not([id*="_heading"]) .customize-control-title {
                font-size: 13px !important;
                font-weight: normal !important;
                margin: 5px 0 !important;
                color: #50575e !important;
            }
            
            /* Abstand zwischen Gruppen */
            .customize-control[id*="_heading"] {
                margin-top: 10px !important;
            }
            
            /* Erste Gruppe braucht keinen extra Abstand */
            #customize-control-awoc_basic_heading {
                margin-top: 0 !important;
            }

            /* Padding auf 0 setzen */
            .customize-control-checkbox,
            .customize-control-nav_menu_auto_add .customize-inside-control-row,
            .customize-control-nav_menu_auto_add > label {
                padding: 0 !important;
                padding-top: 2px !important;
                
            }
        </style>'
    )));

    // Hauptsektion für Off-Canvas-Menu (unter Header & Navigation)
    $wp_customize->add_section('awoc_offcanvas_section', array(
        'title' => __('Off-Canvas-Menu', 'awoc_offcanvas'),
        'panel' => 'et_divi_header_panel',
        'priority' => 30
    ));

    // GRUPPE 1: GRUNDLEGENDE EINSTELLUNGEN (10-19)
    $wp_customize->add_setting('awoc_basic_heading', array(
        'default' => '',
        'sanitize_callback' => 'esc_html'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'awoc_basic_heading', array(
        'label' => '⚙️ ' . __('Basic Settings', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_basic_heading',
        'type' => 'hidden',
        'priority' => 10
    )));

    $wp_customize->add_setting('awoc_offcanvas_max_width_setting', array(
        'default' => '980',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control('awoc_max_width_control', array(
        'type' => 'text',
        'label' => __('Max Width', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_offcanvas_max_width_setting',
        'priority' => 13,
    ));

    $wp_customize->add_setting('awoc_offcanvas_always_active_setting', array(
        'default' => false,
        'transport' => 'refresh'
    ));
    $wp_customize->add_control('awoc_offcanvas_always_active_control', array(
        'type' => 'checkbox',
        'label' => __('Always active', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_offcanvas_always_active_setting',
        'priority' => 12,
        'description' => '<style>
            input[type="checkbox"] {
                display: none; /* Verstecke die Standard-Checkbox */
            }

            input[type="checkbox"] + label {
                position: relative;
                padding-left: 25px; /* Platz für das benutzerdefinierte Design */
                cursor: pointer;
                user-select: none; /* Verhindert Textauswahl */
            }

            input[type="checkbox"] + label:before {
                content: "";
                position: absolute;
                left: 0;
                top: 50%;
                transform: translateY(-50%);
                width: 16px; /* Breite der benutzerdefinierten Checkbox */
                height: 16px; /* Höhe der benutzerdefinierten Checkbox */
                border: 2px solid #2271b1; /* Rahmenfarbe */
                border-radius: 4px; /* Abgerundete Ecken */
                background: white; /* Hintergrundfarbe */
            }

            input[type="checkbox"]:checked + label:before {
                background: #2271b1; /* Hintergrundfarbe, wenn ausgewählt */
                border-color: #2271b1; /* Rahmenfarbe, wenn ausgewählt */
            }

            input[type="checkbox"]:checked + label:after {
                content: "✔"; /* Häkchen-Symbol */
                position: absolute;
                left: 5px; /* Position des Häkchens */
                top: 50%;
                transform: translateY(-50%);
                color: white; /* Häkchenfarbe */
                font-size: 12px; /* Größe des Häkchens */
            }
        </style>'
    ));

    // GRUPPE 2: HAUPTMENÜ-DESIGN (20-29)
    $wp_customize->add_setting('awoc_main_menu_heading', array(
        'default' => '',
        'sanitize_callback' => 'esc_html'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'awoc_main_menu_heading', array(
        'label' => '🎨 ' . __('Main Menu Design', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_main_menu_heading',
        'type' => 'hidden',
        'priority' => 20
    )));

    $wp_customize->add_setting('awoc_offcanvas_background_color_setting', array(
        'default' => '#000000',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new $colorControlClass($wp_customize, 'awoc_offcanvas_background_color_control', array(
        'label' => __('Background Color', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_offcanvas_background_color_setting',
        'priority' => 21
    )));

    $wp_customize->add_setting('awoc_offcanvas_font_color_setting', array(
        'default' => '#222',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new $colorControlClass($wp_customize, 'awoc_offcanvas_font_color_control', array(
        'label' => __('Font Color', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_offcanvas_font_color_setting',
        'priority' => 22
    )));

    $wp_customize->add_setting('awoc_offcanvas_border_color_setting', array(
        'default' => '#c5c5c5',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new $colorControlClass($wp_customize, 'awoc_offcanvas_border_color_control', array(
        'label' => __('Border-Color between links', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_offcanvas_border_color_setting',
        'priority' => 23
    )));

    // GRUPPE 3: AKTIVE ELEMENTE (30-39)
    $wp_customize->add_setting('awoc_active_items_heading', array(
        'default' => '',
        'sanitize_callback' => 'esc_html'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'awoc_active_items_heading', array(
        'label' => '✨ ' . __('Active Items', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_active_items_heading',
        'type' => 'hidden',
        'priority' => 30
    )));

    $wp_customize->add_setting('awoc_offcanvas_open_font_setting', array(
        'default' => '#444444',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new $colorControlClass($wp_customize, 'awoc_offcanvas_open_font_control', array(
        'label' => __('Font color for open item', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_offcanvas_open_font_setting',
        'priority' => 31
    )));

    $wp_customize->add_setting('awoc_offcanvas_open_background_setting', array(
        'default' => 'orange',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new $colorControlClass($wp_customize, 'awoc_offcanvas_open_background_control', array(
        'label' => __('Background Color for open Item', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_offcanvas_open_background_setting',
        'priority' => 32
    )));

    // GRUPPE 4: UNTERMENÜ-DESIGN (40-49)
    $wp_customize->add_setting('awoc_submenu_heading', array(
        'default' => '',
        'sanitize_callback' => 'esc_html'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'awoc_submenu_heading', array(
        'label' => '📑 ' . __('Submenu Design', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_submenu_heading',
        'type' => 'hidden',
        'priority' => 40
    )));

    $wp_customize->add_setting('awoc_offcanvas_submenu_background_setting', array(
        'default' => '#dddddd',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new $colorControlClass($wp_customize, 'awoc_offcanvas_submenu_background_control', array(
        'label' => __('Background for submenu', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_offcanvas_submenu_background_setting',
        'priority' => 41
    )));

    $wp_customize->add_setting('awoc_offcanvas_right_arrow_background_setting', array(
        'default' => '#000',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new $colorControlClass($wp_customize, 'awoc_offcanvas_right_arrow_background_control', array(
        'label' => __('Background for right arrow on main elements', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_offcanvas_right_arrow_background_setting',
        'priority' => 42
    )));

    $wp_customize->add_setting('awoc_offcanvas_submenu_right_arrow_background_setting', array(
        'default' => '#333',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new $colorControlClass($wp_customize, 'awoc_offcanvas_submenu_right_arrow_background_control', array(
        'label' => __('Background for right arrow on submenu elements', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_offcanvas_submenu_right_arrow_background_setting',
        'priority' => 43
    )));

    $wp_customize->add_setting('awoc_offcanvas_right_arrow_font_color_setting', array(
        'default' => '#333',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new $colorControlClass($wp_customize, 'awoc_offcanvas_right_arrow_font_color_control', array(
        'label' => __('Font color for right arrow', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_offcanvas_right_arrow_font_color_setting',
        'priority' => 44
    )));

    // GRUPPE 5: RECHTE BORDER (50-59)
    $wp_customize->add_setting('awoc_right_border_heading', array(
        'default' => '',
        'sanitize_callback' => 'esc_html'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'awoc_right_border_heading', array(
        'label' => '↔️ ' . __('Right Border', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_right_border_heading',
        'type' => 'hidden',
        'priority' => 50
    )));

    $wp_customize->add_setting('awoc_offcanvas_show_right_border_setting', array(
        'default' => true,
        'transport' => 'refresh'
    ));
    $wp_customize->add_control('awoc_offcanvas_show_right_border_control', array(
        'type' => 'checkbox',
        'label' => __('Display Right Border', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_offcanvas_show_right_border_setting',
        'priority' => 51
    ));

    $wp_customize->add_setting('awoc_offcanvas_border_right_color_setting', array(
        'default' => '#ffffff',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new $colorControlClass($wp_customize, 'awoc_offcanvas_border_right_color_control', array(
        'label' => __('Right Border Color', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_offcanvas_border_right_color_setting',
        'priority' => 52
    )));

    $wp_customize->add_setting('awoc_offcanvas_right_border_width_setting', array(
        'default' => '1',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control('awoc_offcanvas_right_border_width_control', array(
        'type' => 'range',
        'label' => __('Right Border Width', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_offcanvas_right_border_width_setting',
        'input_attrs' => array(
            'min' => 1,
            'max' => 10,
            'step' => 1,
            'class' => 'awoc-range-slider'
        ),
        'priority' => 53,
        'description' => '<style>
            .customize-control input[type=range] {
                width: 100% !important;
                accent-color: #2271b1;
            }
            .awoc-range-tooltip {
                background: #2271b1;
                color: white;
                padding: 2px 8px;
                border-radius: 4px;
                font-size: 12px;
                display: inline-block;
                margin-left: 0px; 
                vertical-align: start;
            }
        </style>
        <span class="awoc-range-tooltip">1px</span>
        <script>
        jQuery(document).ready(function($) {
            var rangeInput = $("#customize-control-awoc_offcanvas_right_border_width_control input[type=range]");
            var tooltip = $("#customize-control-awoc_offcanvas_right_border_width_control .awoc-range-tooltip");
            
            // Initial value
            tooltip.text(rangeInput.val() + "px");
            
            // Update on change
            rangeInput.on("input change", function() {
                tooltip.text($(this).val() + "px");
            });
        });
        </script>'
    ));

    // GRUPPE 6: UI ELEMENTE (60-69)
    $wp_customize->add_setting('awoc_ui_elements_heading', array(
        'default' => '',
        'sanitize_callback' => 'esc_html'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'awoc_ui_elements_heading', array(
        'label' => '🔧 ' . __('UI Elements', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_ui_elements_heading',
        'type' => 'hidden',
        'priority' => 60
    )));

    $wp_customize->add_setting('awoc_offcanvas_scrollbar_thumb_setting', array(
        'default' => '#ffffff',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new $colorControlClass($wp_customize, 'awoc_offcanvas_scrollbar_thumb_control', array(
        'label' => __('Scrollbar thumb color', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_offcanvas_scrollbar_thumb_setting',
        'priority' => 61
    )));

    $wp_customize->add_setting('awoc_offcanvas_close_background_setting', array(
        'default' => '#222222',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new $colorControlClass($wp_customize, 'awoc_offcanvas_close_background_control', array(
        'label' => __('Close button background', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_offcanvas_close_background_setting',
        'priority' => 62
    )));

    $wp_customize->add_setting('awoc_offcanvas_close_color_setting', array(
        'default' => '#222',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new $colorControlClass($wp_customize, 'awoc_offcanvas_close_color_control', array(
        'label' => __('Close button color', 'awoc_offcanvas'),
        'section' => 'awoc_offcanvas_section',
        'settings' => 'awoc_offcanvas_close_color_setting',
        'priority' => 63
    )));
}
add_action('customize_register', 'awoc_offcanvas_customizer', 1, 100);

function awoc_generate_inline_css() {
    $always_active = get_theme_mod('awoc_offcanvas_always_active_setting', false);
    $max_width = get_theme_mod('awoc_offcanvas_max_width_setting', '980');
    $always_active = filter_var($always_active, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    $max_width = absint($max_width);
    
    // Hole den Status der Right Border Checkbox
    $show_right_border = get_theme_mod('awoc_offcanvas_show_right_border_setting', true);
    $right_border_color = get_theme_mod('awoc_offcanvas_border_right_color_setting', '#ffffff');
    
    $css = '
    #offcanvas_container {
        background-color: ' . get_theme_mod('awoc_offcanvas_background_color_setting', '#000000') . ';
    }
    ';
    
    // Right Border CSS nur wenn aktiviert
    if ($show_right_border) {
        $css .= '
        #offcanvas_container {
            border-right: 1px solid ' . $right_border_color . ';
        }
        ';
    }
    
    if ($always_active === true) {
        // Always Active Mode CSS
        $css .= '
        /* Force hide default menu and show mobile menu when always active */
        @media (min-width: 981px) {
            #et_mobile_nav_menu {
                display: block !important;
            }
            #top-menu-nav, #top-menu {
                display: none !important;
            }
        }
        ';
    } else {
        // Custom breakpoint CSS
        $css .= '
        /* Custom responsive breakpoint */
        @media (max-width: ' . $max_width . 'px) {
            #et_mobile_nav_menu {
                display: block !important;
            }
            #top-menu-nav, #top-menu {
                display: none !important;
            }
        }
        @media (min-width: ' . ($max_width + 1) . 'px) {
            #et_mobile_nav_menu {
                display: none !important;
            }
           
        }
        ';
    }
    
    // Rest des bestehenden CSS
    $css .= '
    #offcanvas_container .ps__rail-y {
        background-color: ' . get_theme_mod('awoc_offcanvas_border_right_color_setting', '#ffffff') . ';
    }
    
    #offcanvas_container .ps__thumb-y {
        background-color: ' . get_theme_mod('awoc_offcanvas_scrollbar_thumb_setting', '#ffffff') . ';
    }
    
    #offcanvas_menu_inner li.menu-item > a {
        border-bottom: 1px ' . get_theme_mod('awoc_offcanvas_border_color_setting', '#c5c5c5') . ' solid;
        color: ' . get_theme_mod('awoc_offcanvas_font_color_setting', '#222') . ';
    }

    #offcanvas_menu_inner li.menu-item.visible > a {
        color: ' . get_theme_mod('awoc_offcanvas_open_font_setting', '#444444') . ';
        background-color: ' . get_theme_mod('awoc_offcanvas_open_background_setting', 'orange') . ';
    }

    #offcanvas_container #offcanvas_menu_inner > li.menu-item.menu-item-has-children.visible > a,
    #offcanvas_container #offcanvas_menu_inner > li.menu-item.menu-item-has-children.visible > ul.sub-menu li.menu-item.menu-item-has-children.visible > a {
        color: ' . get_theme_mod('awoc_offcanvas_open_font_setting', '#FF5733') . '; /* Schriftfarbe für den Hauptmenüpunkt und alle übergeordneten Punkte */
        background-color: ' . get_theme_mod('awoc_offcanvas_open_background_setting', 'orange') . '; /* Hintergrundfarbe für den Hauptmenüpunkt */
    }

    #offcanvas_menu_inner .sub-menu {
        background-color: ' . get_theme_mod('awoc_offcanvas_submenu_background_setting', '#dddddd') . ';
    }

    #offcanvas_menu_inner li.menu-item-has-children > a:after {
        color: ' . get_theme_mod('awoc_offcanvas_right_arrow_font_color_setting', '#333') . ';
    }

    #offcanvas_container .close-sidebar-inner {
        background-color: ' . get_theme_mod('awoc_offcanvas_close_background_setting', '#222222') . ';
        color: ' . get_theme_mod('awoc_offcanvas_close_color_setting', '#222') . ';
    }

    // Check
    #offcanvas_menu_inner li.menu-item.menu-item-has-children.visible > a {
        color: ' . get_theme_mod('awoc_offcanvas_open_font_setting', '#444444') . '; /* Schriftfarbe für den Hauptmenüpunkt */
        background-color: ' . get_theme_mod('awoc_offcanvas_open_background_setting', 'orange') . '; /* Hintergrundfarbe für den Hauptmenüpunkt */
    }

    #offcanvas_container #offcanvas_menu_inner > li.menu-item.menu-item-has-children.visible > a {
        color: ' . get_theme_mod('awoc_offcanvas_open_font_setting', '#444444') . '; /* Schriftfarbe für den Hauptmenüpunkt */
        background-color: ' . get_theme_mod('awoc_offcanvas_open_background_setting', 'orange') . '; /* Hintergrundfarbe für den Hauptmenüpunkt */
    }
    ';
    
    $css .= '
    /* Pfeil-Styling - Basis für alle Pfeile */
    #offcanvas_menu_inner li.menu-item-has-children > a {
        position: relative;
        padding-right: 40px;
    }
    
    #offcanvas_menu_inner li.menu-item-has-children > a:after {
        content: "\\f054";
        font-family: "FontAwesome";
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%) scale(0.7);
        font-size: 14px;
        line-height: 1;
        text-align: center;
    }
    
    /* Hauptmenü-Pfeile mit Kreis */
    #offcanvas_container #offcanvas_menu_inner > li.menu-item-has-children > a:after {
        background-color: ' . get_theme_mod('awoc_offcanvas_right_arrow_background_setting', '#000') . ';
        border-radius: 0;
        width: 25px;
        height: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        margin-right: 0;
        color: #ffffff;
    }
    
    /* Untermenü-Pfeile */
    #offcanvas_container #offcanvas_menu_inner li.menu-item-has-children > a:after {
        background-color: ' . get_theme_mod('awoc_offcanvas_submenu_right_arrow_background_setting', '#333') . ';
        border-radius: 0;
        width: 25px;
        height: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 12px;
        margin-right: 5px;
        color: #ffffff;
    }
    
    #offcanvas_menu_inner li.menu-item-has-children.visible > a:after {
        transform: translateY(-50%) rotate(90deg);
        transition: transform 0.2s ease;
    }
    
    #offcanvas_menu_inner .sub-menu {
        display: none;
        margin-left: 0;
        margin-top: 0;
        margin-bottom: 0;
        padding: 0;
    }
    
    /* Verbesserte Struktur für verschachtelte Menüs */
    #offcanvas_menu_inner li.menu-item-has-children {
        position: relative;
    }
    
    /* Vertikale Linien */
    #offcanvas_menu_inner .sub-menu {
        position: relative;
        margin-left: 20px;
        // border-left: 0px solid ' . get_theme_mod('awoc_offcanvas_border_color_setting', '#c5c5c5') . '; 
        margin-top: 0;
        margin-bottom: 0;
        padding-top: 0;
        padding-bottom: 0;
    }
    
    /* Einrückungen für alle Ebenen */
    #offcanvas_menu_inner .sub-menu li > a {
        padding-left: 0;
        display: block;
    }
    
    /* Hintergrundfarben */
    #offcanvas_menu_inner .sub-menu li > a {
        background-color: ' . get_theme_mod('awoc_offcanvas_submenu_background_setting', '#dddddd') . ';
    }
    
    /* Letztes Element in jedem Untermenü */
    #offcanvas_menu_inner .sub-menu li:last-child > a {
        border-bottom: none;
    }
    
    /* Container für Untermenüs */
    #offcanvas_menu_inner .sub-menu {
        display: none;
        background-color: ' . get_theme_mod('awoc_offcanvas_submenu_background_setting', '#dddddd') . ';
    }
    
    /* Open Item Background */
    #offcanvas_menu_inner li.menu-item.visible > a {
        background-color: ' . get_theme_mod('awoc_offcanvas_open_background_setting', 'orange') . ';
    }
    ';
    
    /* Scrollbar Styling */
    $css .= '
    #offcanvas_container {
        scrollbar-width: thin;
        scrollbar-color: ' . get_theme_mod('awoc_offcanvas_scrollbar_thumb_setting', '#ffffff') . ' transparent;
    }
    
    #offcanvas_container::-webkit-scrollbar {
        width: 8px;
    }
    
    #offcanvas_container::-webkit-scrollbar-track {
        background: transparent;
    }
    
    #offcanvas_container::-webkit-scrollbar-thumb {
        background-color: ' . get_theme_mod('awoc_offcanvas_scrollbar_thumb_setting', '#ffffff') . ';
        border-radius: 4px;
    }
    ';
    
    $css .= '
    /* ETmodules Icon Styles */
    #offcanvas_container #offcanvas_menu_inner > li.menu-item-has-children > a:after {
        content: "5";
        transform: rotate(0deg);
        transition: transform 0.2s;
        font-family: ETmodules !important;
        text-shadow: 0 0;
        font-style: normal;
        font-variant: normal;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-transform: none;
        speak: none;
        vertical-align: middle;
        height: 0;
        width: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.3rem;
        background-color: ' . get_theme_mod('awoc_offcanvas_arrow_background_setting', '#7cba3d') . ';
        border-radius: 3px;
        margin-right: 5px;
        color: #ffffff;
    }
    ';
    
    /* Hauptmenü-Pfeile */
    $css .= '
    #offcanvas_container #offcanvas_menu_inner > li.menu-item.menu-item-has-children > a:after {
        content: "5";
        font-family: ETmodules !important;
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        width: auto;
        height: auto;
        font-size: 1.3rem;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: ' . get_theme_mod('awoc_offcanvas_right_arrow_background_setting', '#000') . ' !important;
        color: #ffffff;
        transition: transform 0.2s;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /* Untermenü-Pfeile */
    #offcanvas_container #offcanvas_menu_inner > li.menu-item > ul.sub-menu li.menu-item-has-children > a:after {
        content: "5";
        font-family: ETmodules !important;
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        width: auto;
        height: auto;
        font-size: 1.3rem;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: ' . get_theme_mod('awoc_offcanvas_submenu_right_arrow_background_setting', '#333') . ' !important;
        color: #ffffff;
        transition: transform 0.2s;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /* Gemeinsame Rotation */
    #offcanvas_container #offcanvas_menu_inner li.menu-item-has-children.visible > a:after {
        transform: translateY(-50%) rotate(90deg);
    }
    ';
    
    return awoc_minify_css($css);
}

add_action('wp_head', 'awoc_offcanvas_inline_style');
function awoc_offcanvas_inline_style() {
    echo '<style type="text/css">';
    echo awoc_generate_inline_css();
    echo '</style>';
}

add_action('wp_footer', 'awoc_display_offcanvas_menu');
function awoc_display_offcanvas_menu()
{
 
    
    // Hole die Werte aus den Theme Mods
    $always_active = get_theme_mod('awoc_offcanvas_always_active_setting', false);
    $max_width = get_theme_mod('awoc_offcanvas_max_width_setting', '980');
    

    // Explizite Typumwandlung und Validierung
    $max_width = absint($max_width);
    // Stellen Sie sicher, dass $always_active wirklich ein Boolean ist
    $always_active = filter_var($always_active, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    
    // Setze data-max nur auf 'false' wenn always_active true ist
    $data_max = $always_active === true ? 'false' : (string)$max_width;
    

    // Debug-Kommentare im HTML
    echo "<!-- AWOC Debug Start -->\n";
    echo "<!-- always_active (raw): " . esc_html(var_export($always_active, true)) . " -->\n";
    echo "<!-- max_width (raw): " . esc_html(var_export($max_width, true)) . " -->\n";
    echo "<!-- data_max: " . esc_html(var_export($data_max, true)) . " -->\n";
    
    echo '<div id="offcanvas_container" data-max="' . esc_attr($data_max) . '">';
    echo '<div class="close-sidebar-inner"><span>Schließen</span><span class="fa"></span></div>';
    echo wp_nav_menu([
        'theme_location' => 'offcanvas-menu',
        'container' => '',
        'fallback_cb' => '',
        'menu_class' => 'menu',
        'menu_id' => 'offcanvas_menu_inner',
        'echo' => false
    ]);
    dynamic_sidebar('offcanvas-inner-widget');
    echo '</div>';
    echo '<div class="offcanvas-menu-background"></div>';
}

add_action('widgets_init', 'awoc_offcanvas_add_bottom_sidebar');
function awoc_offcanvas_add_bottom_sidebar()
{
    register_sidebar([
        'name' => __('Below Offcanvas Menu', 'awoc_offcanvas'),
        'id' => 'offcanvas-inner-widget',
        'description' => __('Displays in the offcanvas mobile menu below the menu items', 'awoc_offcanvas'),
        'before_widget' => '<div class="widget-content">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ]);
}

// Füge das generierte CSS zum Header hinzu
add_action('wp_head', 'awoc_generate_custom_css');
function awoc_generate_custom_css() {
    ?>
    <style type="text/css">
        /* Basis-Styles für das Offcanvas-Menü */
        #offcanvas_container {
            background-color: <?php echo get_theme_mod('awoc_offcanvas_background_color_setting', '#000000'); ?>;
            <?php if(get_theme_mod('awoc_offcanvas_show_right_border_setting', true)): ?>
            border-right: <?php echo get_theme_mod('awoc_offcanvas_right_border_width_setting', '1'); ?>px solid <?php echo get_theme_mod('awoc_offcanvas_border_right_color_setting', '#ffffff'); ?> !important;
            <?php endif; ?>
        }

        #offcanvas_menu_inner li.menu-item > a {
            color: <?php echo get_theme_mod('awoc_offcanvas_font_color_setting', '#ffffff'); ?>;
            border-bottom: 1px solid <?php echo get_theme_mod('awoc_offcanvas_border_color_setting', '#c5c5c5'); ?>;
        }

        #offcanvas_menu_inner li.menu-item.visible > a {
            background-color: <?php echo get_theme_mod('awoc_offcanvas_active_bg_setting', '#orange'); ?>;
            color: <?php echo get_theme_mod('awoc_offcanvas_active_color_setting', '#ffffff'); ?>;
        }

        /* Close Button Styles - Spezifischere Selektoren */
        body #offcanvas_container .close-sidebar-inner,
        html body #offcanvas_container div.close-sidebar-inner {
            background: <?php echo get_theme_mod('awoc_offcanvas_close_background_setting', '#222222'); ?> !important;
            background-color: <?php echo get_theme_mod('awoc_offcanvas_close_background_setting', '#222222'); ?> !important;
        }
        
        #offcanvas_container .close-sidebar-inner span {
            color: <?php echo get_theme_mod('awoc_offcanvas_close_color_setting', '#ffffff'); ?> !important;
        }

        /* Always Active Styles */
        <?php if(get_theme_mod('awoc_offcanvas_always_active_setting', false)): ?>
        @media (min-width: 981px) {
            #et_mobile_nav_menu {
                display: block !important;
            }
            #top-menu-nav, #top-menu {
                display: none !important;
            }
        }
        <?php else: ?>
        /* Custom Max Width Breakpoint */
        @media (max-width: <?php echo get_theme_mod('awoc_offcanvas_max_width_setting', '980'); ?>px) {
            #et_mobile_nav_menu {
                display: block !important;
            }
            #top-menu-nav, #top-menu {
                display: none !important;
            }
        }
        @media (min-width: <?php echo get_theme_mod('awoc_offcanvas_max_width_setting', '980'); ?>px) {
            #et_mobile_nav_menu {
                display: none !important;
            }
            #top-menu-nav, #top-menu {
                display: block !important;
                display: flex !important; 
            }
        }
        <?php endif; ?>
    </style>
    <?php
}

// Füge das JavaScript für die Menü-Interaktion hinzu
add_action('wp_footer', 'awoc_add_menu_interaction_script');
function awoc_add_menu_interaction_script() {
    ?>
    <script>
    jQuery(document).ready(function($) {
        // Füge Click/Touch Event Handler hinzu
        jQuery('#offcanvas_menu_inner li.menu-item-has-children > a').on('click touchend', function(e) {
            e.preventDefault(); // Verhindere Standard-Link-Verhalten
            
            var $menuItem = jQuery(this).parent();
            var $subMenu = $menuItem.children('.sub-menu');
            var $arrow = jQuery(this).find('.et-pb-arrow-down');
            
            // Toggle active class und rotate arrow
            $menuItem.toggleClass('visible');
            
            // Slide toggle für smooth animation
            $subMenu.slideToggle(300);
            
            return false;
        });

        // Verhindere Bubble-Up von Touch-Events auf Links ohne Untermenüs
        jQuery('#offcanvas_menu_inner li:not(.menu-item-has-children) > a').on('click touchend', function(e) {
            // Erlaube normales Link-Verhalten
            return true;
        });
    });
    </script>

    <style>
    /* Pfeil-Styling */
    #offcanvas_menu_inner li.menu-item-has-children > a:after {
        content: "3";
        font-family: ETmodules !important;
        font-size: 16px;
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%) rotate(0deg);
        transition: transform 0.3s ease;
    }

    /* Gedrehter Pfeil für sichtbare Untermenüs */
    #offcanvas_menu_inner li.menu-item-has-children.visible > a:after {
        transform: translateY(-50%) rotate(180deg);
    }

    /* Untermenü-Styling */
    #offcanvas_menu_inner .sub-menu {
        display: none; /* Initial versteckt */
        padding-left: 20px;
    }

    /* Hover-Effekte für bessere UX */
    #offcanvas_menu_inner li.menu-item-has-children > a {
        position: relative;
        cursor: pointer;
    }

    #offcanvas_menu_inner li.menu-item-has-children > a:hover:after {
        opacity: 0.8;
    }

    /* Touch-Geräte Optimierung */
    @media (hover: none) {
        #offcanvas_menu_inner li.menu-item-has-children > a {
            -webkit-tap-highlight-color: transparent;
        }
    }
    </style>

    <style>
    .et-pb-arrow-down {
        transition: transform 0.3s ease; /* Sanfte Drehung */
    }

    .et-pb-arrow-down.rotated {
        transform: rotate(180deg); /* Drehung um 180 Grad */
    }
    </style>
    <?php
}
