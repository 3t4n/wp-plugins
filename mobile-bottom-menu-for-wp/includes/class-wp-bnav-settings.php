<?php

/**
 * Handles plugin settings panels.
 *
 * @since      1.0.0
 *
 * @package    Wp_Bnav
 * @subpackage Wp_Bnav/includes
 */

/**
 * Register plugin settings panels.
 *
 * This class defines all code necessary to manage plugin settings.
 *
 * @since      1.0.0
 * @package    Wp_Bnav
 * @subpackage Wp_Bnav/includes
 * @author     WP Messiah <contact@wpmessiah.com>
 */
class Wp_Bnav_Settings {

    /**
     * Plugin settings prefix.
     *
     * @var string
     */
    public static $prefix = WP_BNAV_SLUG;

    /**
     * Plugin settings prefix.
     *
     * @var string
     */
    public static $menuPrefix = WP_BNAV_SLUG . '-menu';

    /**
     * Plugin settings slug.
     *
     * @var string
     */
    public static $slug = WP_BNAV_SLUG;

    /**
     * Plugin url.
     *
     * @var string
     */
    public static $plugin_file_url  = WP_BNAV_URL;

    public function __construct() {
        add_filter( 'wp_bnav_register_options_panel', array( $this, 'register_options_panel' ), 1, 2 );
    }

    /**
     * Default config for settings panel.
     *
     * @param $options_panel_func string Settings panel function name.
     * @param $options_panel_config array Settings panel configurations.
     *
     * @return array
     */
    public function register_options_panel($options_panel_func, $options_panel_config ) {
        return array(
            'func'   => $options_panel_func,
            'config' => $options_panel_config,
        );
    }

    /**
     * Generate settings with Codestar framework.
     */
    public function generate_settings() {
        // Plugin settings basic configurations
        $options_panel_func   = 'createOptions';
        $options_panel_config = [
            'menu_title' => WP_BNAV_SHORT_NAME . ' ' . __( 'Settings', 'wp-bnav' ),
            'menu_slug'  => self::$slug . '-settings',
            'framework_title' => WP_BNAV_SHORT_NAME . ' ' . __( 'Settings', 'wp-bnav' ),
            'framework_class'         => 'wp_bnav_framework',
            'footer_text' => sprintf(
                __('Enjoyed WP Mobile Bottom Menu? Please leave us a <a target="_blank" href="%s">★★★★★ rating.</a> We really appreciate your support!', 'wp-bnav'),
                esc_url('https://wordpress.org/support/plugin/mobile-bottom-menu-for-wp/reviews/#new-post')
            ) . ' ' . sprintf(
                __('Visit our plugin usage <a href="%s">documentation</a>.', 'wp-bnav'),
                esc_url('https://wpmessiah.com/docs/wp-mobile-bottom-menu/')
            ),
            'footer_credit'   => sprintf(
                __( 'A proud creation of <a href="%s">WP Messiah</a>', 'wp-bnav' ),
                esc_url( 'https://wpmessiah.com/' )
            ),
            'database'        => 'option',
            'transport'       => 'refresh',
            'capability'      => 'manage_options',
            'save_defaults'   => true,
            'enqueue_webfont' => true,
            'async_webfont'   => true,
            'output_css'      => true,
        ];

        // Register settings panel type
        $current_url = home_url($_SERVER['REQUEST_URI']);

        $options_panel_builder = apply_filters( 'wp_bnav_register_options_panel', $options_panel_func, $options_panel_config );

        if ($options_panel_builder['func'] == 'createCustomizeOptions') {
            $options_panel_config['show_in_customizer'] = true;
        }

        $options_panel_builder = apply_filters( 'wp_bnav_register_options_panel', $options_panel_func, $options_panel_config );
        CSF::{$options_panel_builder['func']}( self::$prefix, $options_panel_builder['config'] );
        CSF::createOptions( self::$prefix, $options_panel_builder['config']  );

        $parent = '';

        if ($options_panel_builder['func'] == 'createCustomizeOptions' && ! strpos($current_url, 'admin.php?page=wp-bnav-settings') !== false) {
            CSF::createSection(self::$prefix, array(
                'id' => self::$prefix,
                'title' => WP_BNAV_SHORT_NAME,
            ));
            $parent = self::$prefix;
        }

        $scroll_hide_premium_settings = apply_filters( 'wp_bnav_register_menu_hide_premium_settings', [] );
        $show_bottom_menu_page_settings = apply_filters( 'wp_bnav_register_show_bottom_menu_page_settings', [] );
        $hide_bottom_menu_page_settings = apply_filters( 'wp_bnav_register_hide_bottom_menu_page_settings', [] );

        CSF::createSection( self::$prefix, array(
            'parent' => $parent,
            'title'  => __('General settings', 'wp-bnav'),
            'fields' => array(
                array(
                    'id'    => 'enabled',
                    'type'  => 'switcher',
                    'title' => __( 'Enabled', 'wp-bnav' ),
                    'default' => true,
                    'desc'  => 'Set a BNAV Bottom Menu for showing a mobile menu from here <a href="/wp-admin/nav-menus.php">Menu</a>',
                ),
                ...$show_bottom_menu_page_settings,
                ...$hide_bottom_menu_page_settings,
                ...$scroll_hide_premium_settings,
                array(
                    'id'    => 'global_padding_bottom',
                    'type'  => 'number',
                    'title' => __( 'Padding From Bottom', 'wp-bnav' ),
                    'default' => '300',
                    'unit'        => 'px',
                ),
                array(
                    'id'    => 'breakpoint',
                    'type'  => 'number',
                    'title' => __( 'Breakpoint', 'wp-bnav' ),
                    'default' => '768'
                ),
                array(
                    'id'    => 'z-index',
                    'type'  => 'number',
                    'title' => __( 'Z-Index', 'wp-bnav' ),
                    'default' => ''
                ),
                array(
                    'id'          => 'wrap-background-type',
                    'type'        => 'select',
                    'title'       => __('Background type', 'wp-bnav'),
                    'options'     => array(
                        'background'  => __('Background color', 'wp-bnav'),
                        'gradiant'  => __('Gradiant', 'wp-bnav'),
                        'background-image'  => __('Background image', 'wp-bnav'),
                    ),
                    'default'     => 'background'
                ),
                array(
                    'id' => 'main-wrap-bg',
                    'type' => 'background',
                    'title' => __( 'Background color', 'wp-bnav' ),
                    'output_mode' => 'background-color',
                    'background_image' => false,
                    'background_position' => false,
                    'background_attachment' => false,
                    'background_repeat' => false,
                    'background_size' => false,
                    'output' =>  array('.bnav_bottom_nav_wrapper'),
                    'dependency' => ['wrap-background-type', '==', 'background'],
                    'default'                         => array(
                        'background-color'              => '#1e1e1e',
                      )
                ),
                array(
                    'id' => 'main-wrap-gradiant-bg',
                    'type' => 'background',
                    'title' => __( 'Gradiant', 'wp-bnav' ),
                    'background_gradient' => true,
                    'background_image' => false,
                    'background_position' => false,
                    'background_attachment' => false,
                    'background_repeat' => false,
                    'background_size' => false,
                    'output' =>  array('.bnav_bottom_nav_wrapper'),
                    'dependency' => ['wrap-background-type', '==', 'gradiant'],
                ),
                array(
                    'id' => 'main-wrap-bg-image',
                    'type' => 'background',
                    'title' => __( 'Background image', 'wp-bnav' ),
                    'background_color' => false,
                    'background_gradient' => false,
                    'background_origin' => true,
                    'background_clip' => true,
                    'background_blend_mode' => true,
                    'output' =>  array('.bnav_bottom_nav_wrapper'),
                    'dependency' => ['wrap-background-type', '==', 'background-image'],
                ),
                array(
                    'id'    => 'wrap-blur',
                    'type'    => 'number',
                    'title' => __('Blur', 'wp-bnav'),
                    'default' => 5,
                    'unit'        => 'px',
                ),
                array(
                    'id'     => 'main-wrap-border',
                    'type'   => 'border',
                    'title'  => __( 'Border', 'wp-bnav' ),
                    'output' => '.bnav_bottom_nav_wrapper'
                ),
                array(
                    'id'    => 'main-wrap-border-radius',
                    'type'  => 'spacing',
                    'output' =>  array('.bnav_bottom_nav_wrapper'),
                    'output_mode' => 'border-radius',
                    'title' => __( 'Border radius', 'wp-bnav' ),
                ),
                array(
                    'id'     => 'main-wrap-shadow',
                    'type'   => 'fieldset',
                    'title'  => __( 'Shadow', 'wp-bnav'),
                    'fields' => array(
                        array(
                            'id'    => 'enable-main-wrap-shadow',
                            'type'  => 'switcher',
                            'title' => __( 'Enabled', 'wp-bnav' ),
                            'default' => false,
                        ),
                        array(
                            'id'      => 'main-wrap-shadow-horizontal',
                            'type'    => 'number',
                            'unit'    => 'px',
                            'default' => '0',
                            'title'   => __( 'Horizontal', 'wp-bnav' ),
                        ),
                        array(
                            'id'      => 'main-wrap-shadow-vertical',
                            'type'    => 'number',
                            'unit'    => 'px',
                            'default' => '0',
                            'title'   => __( 'Vertical', 'wp-bnav' ),
                        ),
                        array(
                            'id'      => 'main-wrap-shadow-blur',
                            'type'    => 'number',
                            'unit'    => 'px',
                            'default' => '0',
                            'title'   => __( 'Blur', 'wp-bnav' ),
                        ),
                        array(
                            'id'      => 'main-wrap-shadow-spread',
                            'type'    => 'number',
                            'unit'    => 'px',
                            'default' => '0',
                            'title'   => __( 'Spread', 'wp-bnav' ),
                        ),
                        array(
                            'id'      => 'main-wrap-shadow-color',
                            'type'    => 'color',
                            'title'   => __( 'Color', 'wp-bnav' ),
                        ),
                    ),
                ),
                array(
                    'id'    => 'main-wrap-offset',
                    'type'  => 'spacing',
                    'output_mode' => 'margin',
                    'output' =>  array('.bnav_bottom_nav_wrapper'),
                    'title' => __( 'Margin', 'wp-bnav' ),
                ),
                array(
                    'id'    => 'main-wrap-padding',
                    'type'  => 'spacing',
                    'output_mode' => 'padding',
                    'output' => array('.bnav_bottom_nav_wrapper'),
                    'title' => __( 'Padding', 'wp-bnav' ),
                    'default'  => array(
                        'top'    => '0',
                        'right'  => '0',
                        'bottom' => '0',
                        'left'   => '0',
                        'unit'   => 'px',
                    ),
                ),
            )
        ) );


        // Cart menu settings
        $cart_menu_settings = apply_filters( 'wp_bnav_register_cart_menu_settings', [] );

        if ( ! $cart_menu_settings ) {
            $cart_menu_settings = array(
                array(
                    'type'    => 'subheading',
                    'content' => $this->get_premium_alert_message(),
                ),
            );
        }

        // Wishlist menu settings
        $wishlist_menu_settings = apply_filters( 'wp_bnav_register_wishlist_menu_settings', [] );

        if ( ! $wishlist_menu_settings ) {
            $wishlist_menu_settings = array(
                array(
                    'type'    => 'subheading',
                    'content' => $this->get_premium_alert_message(),
                ),
            );
        }



        // Sub menu settings
        $sub_menu_settings = apply_filters( 'wp_bnav_register_sub_menu_settings', [] );

        if ( ! $sub_menu_settings ) {
            $sub_menu_settings = array(
                array(
                    'type'    => 'subheading',
                    'content' => $this->get_premium_alert_message(),
                ),
            );
        }

        // Child menu settings
        $child_menu_settings = apply_filters( 'wp_bnav_register_child_menu_settings', [] );

        if ( ! $child_menu_settings ) {
            $child_menu_settings = array(
                array(
                    'type'    => 'subheading',
                    'content' => $this->get_premium_alert_message(),
                ),
            );
        }

        CSF::createSection( self::$prefix, array(
            'parent' => $parent,
            'title'  => __('Menu styles', 'wp-bnav'),
            'fields' => array(
                // Main menu
                array(
                    'type'    => 'heading',
                    'content' => __( 'Main menu', 'wp-bnav' ),
                ),
                array(
                    'id'    => 'main-nav-grid',
                    'type'  => 'number',
                    'title' => __('Number of grids', 'wp-bnav' ),
                    'default' => 6
                ),
                array(
                    'id'          => 'main-nav-alignment',
                    'type'        => 'select',
                    'title'       => __( 'Alignment', 'wp-bnav' ),
                    'options'     => array(
                      'center'  => 'Center',
                      'flex-start'  => 'Left',
                      'end'  => 'Right',
                    ),
                    'default'     => 'flex-start'
                ),
                array(
                    'id'       => 'main-nav-scrollbar',
                    'type'     => 'switcher',
                    'title'    => 'Menu item scrollbar',
                    'text_on'  => 'Yes',
                    'text_off' => 'No',
                  ),
                array(
                    'id'          => 'main-menu-background-type',
                    'type'        => 'select',
                    'title'       => __('Background type', 'wp-bnav'),
                    'options'     => array(
                        'background'  => __('Background color', 'wp-bnav'),
                        'gradiant'  => __('Gradiant', 'wp-bnav'),
                        'background-image'  => __('Background image', 'wp-bnav'),
                    ),
                    'default'     => 'background'
                ),
                array(
                    'id' => 'main-menu-nav-bg',
                    'type' => 'background',
                    'title' => __( 'Background color', 'wp-bnav' ),
                    'output_mode' => 'background-color',
                    'background_image' => false,
                    'background_position' => false,
                    'background_attachment' => false,
                    'background_repeat' => false,
                    'background_size' => false,
                    'output' =>  array('.bnav_main_menu_container ul.bnav_main_menu'),
                    'dependency' => ['main-menu-background-type', '==', 'background'],
                    'default'                         => array(
                        'background-color'              => 'rgba(45,45,59,0.95)',
                      )
                ),
                array(
                    'id' => 'main-nav-gradiant-bg',
                    'type' => 'background',
                    'title' => __( 'Gradiant', 'wp-bnav' ),
                    'background_gradient' => true,
                    'background_image' => false,
                    'background_position' => false,
                    'background_attachment' => false,
                    'background_repeat' => false,
                    'background_size' => false,
                    'output' =>  array('.bnav_main_menu_container ul.bnav_main_menu'),
                    'dependency' => ['main-menu-background-type', '==', 'gradiant'],
                ),
                array(
                    'id' => 'main-nav-bg-image',
                    'type' => 'background',
                    'title' => __( 'Background image', 'wp-bnav' ),
                    'background_color' => false,
                    'background_gradient' => false,
                    'background_origin' => true,
                    'background_clip' => true,
                    'background_blend_mode' => true,
                    'output' =>  array('.bnav_main_menu_container ul.bnav_main_menu'),
                    'dependency' => ['main-menu-background-type', '==', 'background-image'],
                ),
                array(
                    'id'    => 'main-nav-blur',
                    'type'    => 'number',
                    'title' => __('Blur', 'wp-bnav'),
                    'default' => 7.5,
                    'unit'        => 'px',
                ),
                array(
                    'id'    => 'main-menu-padding',
                    'type'  => 'spacing',
                    'output'      => '.bnav_main_menu_container ul.bnav_main_menu',
                    'output_mode' => 'padding',
                    'title' => __( 'Padding', 'wp-bnav' ),
                    'default'  => array(
                        'top'    => '15',
                        'right'  => '5',
                        'bottom' => '35',
                        'left'   => '5',
                        'unit'   => 'px',
                      ),
                ),
                array(
                    'id'    => 'main-menu-margin',
                    'type'  => 'spacing',
                    'output'      => '.bnav_main_menu_container ul.bnav_main_menu',
                    'output_mode' => 'margin',
                    'title' => __( 'Margin', 'wp-bnav' ),
                    'default'  => array(
                        'top'    => '0',
                        'right'  => '0',
                        'bottom' => '0',
                        'left'   => '0',
                        'unit'   => 'px',
                      ),
                ),
                array(
                    'id'    => 'main-menu-border',
                    'type'  => 'border',
                    'output'      => array('.bnav_bottom_nav_wrapper .bnav_main_menu'),
                    'title' => __( 'Border', 'wp-bnav' ),
                ),
                array(
                    'id'    => 'main-menu-border-radius',
                    'type'  => 'spacing',
                    'output_mode' => 'border-radius',
                    'output'      => array('.bnav_bottom_nav_wrapper .bnav_main_menu'),
                    'title' => __( 'Border radius', 'wp-bnav' ),
                ),
                array(
                    'id'    => 'main-nav-item-padding',
                    'type'  => 'spacing',
                    'output'      => '.bnav_bottom_nav_wrapper ul li > a .bnav_menu_items',
                    'output_mode' => 'padding',
                    'title' => __( 'Item padding', 'wp-bnav' ),
                    'default'  => array(
                        'right'    => '0',
                        'left' => '0',
                        'unit'   => 'px',
                      ),
                ),
                array(
                    'id'    => 'main-nav-item-margin',
                    'type'  => 'spacing',
                    'output'      => '.bnav_bottom_nav_wrapper ul li > a .bnav_menu_items',
                    'output_mode' => 'margin',
                    'title' => __( 'Item offset', 'wp-bnav' ),
                ),
                array(
                    'id'    => 'main-nav-item-border',
                    'type'  => 'border',
                    'output'      => '.bnav_bottom_nav_wrapper ul li > a .bnav_menu_items',
                    'title' => __( 'Item border', 'wp-bnav' ),
                ),
                array(
                    'id'    => 'main-nav-active-item-border',
                    'type'  => 'border',
                    'output'      => array('.bnav_bottom_nav_wrapper ul li > a .bnav_menu_items:hover'),
                    'title' => __( 'Item active border', 'wp-bnav' ),
                ),
                array(
                    'id'    => 'main-nav-item-border-radius',
                    'type'  => 'spacing',
                    'output'      => '.bnav_bottom_nav_wrapper ul li > a .bnav_menu_items',
                    'output_mode' => 'border-radius',
                    'title' => __( 'Item border radius', 'wp-bnav' ),
                ),
                array(
                    'id' => 'main-nav-item-bg',
                    'type' => 'background',
                    'title' => __( 'Item background', 'wp-bnav' ),
                    'output'      => '.bnav_bottom_nav_wrapper ul li > a .bnav_menu_items',
                    'output_mode' => 'background-color',
                    'background_image' => false,
                    'background_position' => false,
                    'background_attachment' => false,
                    'background_repeat' => false,
                    'background_size' => false,
                    'background_origin' => false,
                    'background_clip' => false,
                    'background_blend_mode' => false,
                    'background_image_preview' => false,
                ),
                array(
                    'id' => 'main-nav-active-item-bg',
                    'type' => 'background',
                    'title' => __( 'Item active background', 'wp-bnav' ),
                    'output'      => array('.bnav_bottom_nav_wrapper ul li > a .bnav_menu_items:hover', '.bnav_bottom_nav_wrapper ul li.current_page_item a .bnav_menu_items', '.bnav_bottom_nav_wrapper ul li.current_page_parent a .bnav_menu_items'),
                    'output_mode' => 'background-color',
                    'background_image' => false,
                    'background_position' => false,
                    'background_attachment' => false,
                    'background_repeat' => false,
                    'background_size' => false,
                    'background_origin' => false,
                    'background_clip' => false,
                    'background_blend_mode' => false,
                    'background_image_preview' => false
                ),
                array(
                    'id'          => 'main-nav-item-icon-visibility',
                    'type'        => 'select',
                    'title'       => __( 'Icon visibility', 'wp-bnav' ),
                    'options'     => array(
                        'show'  => __( 'Show', 'wp-bnav' ),
                        'hide'  => __( 'Hide', 'wp-bnav' ),
                        'active'  => __( 'Show when active', 'wp-bnav' ),
                        'hide-active'  => __( 'Hide when active', 'wp-bnav' ),
                    ),
                    'default'     => 'show',
                ),
                array(
                    'id'          => 'main-nav-item-icon-position',
                    'type'        => 'select',
                    'title'       => __( 'Icon position', 'wp-bnav' ),
                    'options'     => array(
                        'top'  => __( 'Top', 'wp-bnav' ),
                        'right'  => __( 'Right', 'wp-bnav' ),
                        'bottom'  => __( 'Bottom', 'wp-bnav' ),
                        'left'  => __( 'Left', 'wp-bnav' ),
                    ),
                    'default'     => 'top',
                ),
                array(
                    'id'    => 'main-nav-item-icon-offset',
                    'type'  => 'spacing',
                    'output'      => '.bnav_bottom_nav_wrapper ul li a .icon_wrapper',
                    'output_mode' => 'margin',
                    'title' => __( 'Icon offset', 'wp-bnav' ),
                    'default'  => array(
                        'top'    => '0',
                        'right'  => '0',
                        'bottom' => '10',
                        'left'   => '0',
                        'unit'   => 'px',
                      ),
                ),
                array(
                    'id'    => 'main-nav-item-icon-typography',
                    'type'  => 'typography',
                    'title' => __( 'Icon typography', 'wp-bnav' ),
                    'output'      => '.bnav_bottom_nav_wrapper ul li a .icon_wrapper i',
                    'font_family' => false,
                    'font_style' => false,
                    'line_height' => false,
                    'letter_spacing' => false,
                    'text_align' => false,
                    'text_transform' => false,
                    'default' => array(
                        'color'       => '#818799',
                        'font-size'   => '24',
                        'unit'        => 'px',
                      ),
                ),
                array(
                    'id'    => 'main-nav-active-item-icon-typography',
                    'type'  => 'typography',
                    'title' => __( 'Active icon typography', 'wp-bnav' ),
                    'output'      => array('.bnav_bottom_nav_wrapper ul li > a .bnav_menu_items:hover .icon_wrapper i', '.bnav_bottom_nav_wrapper ul li.current_page_item a .icon_wrapper i', '.bnav_bottom_nav_wrapper ul li.current_page_parent a .icon_wrapper i'),
                    'font_family' => false,
                    'font_style' => false,
                    'line_height' => false,
                    'letter_spacing' => false,
                    'text_align' => false,
                    'text_transform' => false,
                    'default' => array(
                        'color'       => '#d5ee9b',
                        'font-size'   => '24',
                        'unit'        => 'px',
                      ),
                ),
                array(
                    'id'          => 'main-nav-item-text-visibility',
                    'type'        => 'select',
                    'title'       => __( 'Text visibility', 'wp-bnav' ),
                    'options'     => array(
                        'show'  => __( 'Show', 'wp-bnav' ),
                        'hide'  => __( 'Hide', 'wp-bnav' ),
                        'active'  => __( 'Show when active', 'wp-bnav' ),
                        'hide-active'  => __( 'Hide when active', 'wp-bnav' ),
                    ),
                    'default'     => 'show',
                ),
                array(
                    'id'    => 'main-nav-item-typography',
                    'type'  => 'typography',
                    'output'      => array('.bnav_bottom_nav_wrapper ul li a .text_wrapper', '.bnav_main_menu_container .bnav_main_menu .bnav_menu_items .cart_total'),
                    'title' => __( 'Text typography', 'wp-bnav' ),
                    'default' => array(
                        'color'          => '#818797',
                        'font-size'      => '14',
                        'line-height'    => '17',
                        'letter-spacing' => '.48',
                        'unit'           => 'px',
                      ),
                ),

                array(
                    'id'    => 'main-nav-active-item-typography',
                    'type'  => 'typography',
                    'output'      => array('.bnav_bottom_nav_wrapper ul li a .bnav_menu_items:hover .text_wrapper', '.bnav_bottom_nav_wrapper ul li.current_page_item a .text_wrapper', '.bnav_bottom_nav_wrapper ul li.current_page_parent a .text_wrapper', '.bnav_bottom_nav_wrapper ul li.current_page_item a .bnav_menu_items .cart_total'),
                    'title' => __( 'Active text typography', 'wp-bnav' ),
                    'default' => array(
                        'color'          => '#FFFFFF',
                        'font-size'      => '14',
                        'line-height'    => '17',
                        'letter-spacing' => '.48',
                        'unit'           => 'px',
                      ),
                ),


                // Cart Menu
                array(
                    'type'    => 'heading',
                    'content' => __( 'Cart menu counter', 'wp-bnav' ),
                ),
                ...$cart_menu_settings,

                // Wishlist Menu
                array(
                    'type'    => 'heading',
                    'content' => __( 'Wishlist menu counter', 'wp-bnav' ),
                ),
                ...$wishlist_menu_settings,


                // Sub menu
                array(
                    'type'    => 'heading',
                    'content' => __( 'Sub menu', 'wp-bnav' ),
                ),
                ...$sub_menu_settings,

                // Child menu
                array(
                    'type'    => 'heading',
                    'content' => __( 'Child menu', 'wp-bnav' ),
                ),
                ...$child_menu_settings,
            )
        ) );

        // Search box
        $search_box_settings = apply_filters( 'wp_bnav_register_search_box_settings', [] );

        if ( ! $search_box_settings ) {
            $search_box_settings = array(
                array(
                    'type'    => 'subheading',
                    'content' => $this->get_premium_alert_message(),
                ),
            );
        }
        CSF::createSection( self::$prefix, array(
            'parent' => $parent,
            'title'  => __('Search box', 'wp-bnav'),
            'fields' => array(
                ...$search_box_settings,
            )
        ) );

        // List of available skins.
        $default_skins = array(
            'default_skin' => WP_BNAV_URL . 'admin/img/default_layout_preview_dark.png',
            'skin_one' => WP_BNAV_URL . 'admin/img/layout_preview_light_skin_one.png',
            'skin_two' => WP_BNAV_URL . 'admin/img/preview_layout_skin_two.png',
            'skin_three' => WP_BNAV_URL . 'admin/img/preview_layout_skin_three.png',
            'skin_four' => WP_BNAV_URL . 'admin/img/preview_layout_skin_four.png',
            'skin_five' => WP_BNAV_URL . 'admin/img/preview_layout_skin_five.png',
            'skin_six' => WP_BNAV_URL . 'admin/img/preview_layout_skin_six.png',
            'skin_seven' => WP_BNAV_URL . 'admin/img/preview_layout_skin_seven.png',
            'skin_eight' => WP_BNAV_URL . 'admin/img/preview_layout_skin_eight.png',
            'skin_nine' => WP_BNAV_URL . 'admin/img/preview_layout_skin_nine.png',
        );

        $skins = apply_filters( 'wp_bnav_get_skins', $default_skins );

        if ( ! $skins ) {
            $skins = $default_skins;
        }

        CSF::createSection( self::$prefix, array(
            'parent' => $parent,
            'title'  => __( 'Pre-made themes', 'wp-bnav' ),
            'fields' => array(
                array(
                    'id'       => 'premade_skins',
                    'type'     => 'fieldset',
                    'title'    => __( 'Click to import a skin', 'wp-bnav' ),
                    'subtitle' => sprintf( '<strong>%s</strong>: %s', __( 'Warning', 'wp-bnav' ), __( 'This is an irreversible action and will replace all your settings to match the selected skin', 'wp-bnav' ) ),
                    'class'    => 'premade_skins',
                    'fields'   => array(
                        array(
                            'id'      => 'premade_skin',
                            'type'    => 'image_select',
                            'class'   => 'image_selects',
                            'options' => $skins,
                            'default' => 'default_skin',
                        ),
                    ),
                ),
            ),
        ) );
        if ($options_panel_builder['func'] == 'createCustomizeOptions' && ! strpos($current_url, 'admin.php?page=wp-bnav-settings') !== false) {} else {
            CSF::createSection(self::$prefix, array(
                'title' => 'Edit With Customizer',
            ));
        }
        if( ! WP_BNAV_Utils::isProActivated() ) {
            // Free Vs Pro
            CSF::createSection( self::$prefix, array(
                'parent' => $parent,
                'title'  => __( 'Free Vs Pro', 'wp-bnav' ),
                'fields' => array(
                    array(
                        'type'    => 'subheading',
                        'content' => $this->Free_VS_Pro(),
                    ),
                ),
            ) );
        }

        $is_ai_activated = is_plugin_active('ai-image-alt-text-generator-for-wp/boomdevs-ai-image-alt-text-generator.php');

        if (!WP_BNAV_Utils::isProActivated() && !$is_ai_activated) {
            CSF::createSection( self::$prefix, array(
                'parent' => $parent,
                'title' => __('Ai AltText Generator', 'wp-bnav'),
                'fields' => array(
                    array(
                        'type' => 'subheading',
                        'content' => $this->AiAltTextGenerator(),
                    ),
                ),
            ));
        }
    }

    /**
     * Generate settings for menu with Codestar framework.
     */
    public function register_menu_settings() {
        CSF::createNavMenuOptions( self::$menuPrefix, [] );

        // Get premium settings
        $premium_settings = apply_filters( 'wp_bnav_register_menu_premium_settings', [] );

        CSF::createSection( self::$menuPrefix, array(
            'title'  => __( 'WP BNav', 'wp-bnav' ),
            'fields' => array(
                array(
                    'id'    => 'hide-text',
                    'type'  => 'switcher',
                    'title' => __( 'Hide text', 'wp-bnav' ),
                    'default' => false,
                ),
                array(
                    'id'    => 'show-icon',
                    'type'  => 'switcher',
                    'title' => __( 'Show icon', 'wp-bnav' ),
                    'default' => true,
                ),
                array(
                    'id'    => 'icon-mode',
                    'type'  => 'switcher',
                    'title' => __( 'Icon mode', 'wp-bnav' ),
                    'text_on' => __( 'Icon', 'wp-bnav'),
                    'text_off' => __( 'Image', 'wp-bnav'),
                    'text_width' => 80,
                    'default' => true,
                    'dependency' => ['show-icon', '==', 'true'],
                ),
                array(
                    'id'          => 'icon-position',
                    'type'        => 'select',
                    'title'       => __( 'Icon position', 'wp-bnav' ),
                    'options'     => array(
                        'none' => __('From global', 'wp-bnav'),
                        'top'  => __( 'Top', 'wp-bnav' ),
                        'right'  => __( 'Right', 'wp-bnav' ),
                        'bottom'  => __( 'Bottom', 'wp-bnav' ),
                        'left'  => __( 'Left', 'wp-bnav' ),
                    ),
                    'default'     => 'none',
                    'dependency' => ['show-icon', '==', 'true'],
                ),
                array(
                    'id'    => 'icon',
                    'type'  => 'icon',
                    'title' => __( 'Icon', 'wp-bnav' ),
                    'default' => 'fa fa-home',
                    'dependency' => [
                        ['show-icon', '==', 'true'],
                        ['icon-mode', '==', 'true'],
                    ]
                ),
                array(
                    'id'      => 'image',
                    'type'    => 'media',
                    'title'   => __( 'Image', 'wp-bnav' ),
                    'library' => 'image',
                    'dependency' => [
                        ['show-icon', '==', 'true'],
                        ['icon-mode', '==', 'false'],
                    ],
                ),
                array(
                    'id'    => 'active-icon',
                    'type'  => 'icon',
                    'title' => __( 'Active icon', 'wp-bnav' ),
                    'default' => 'fa fa-home',
                    'dependency' => [
                        ['show-icon', '==', 'true'],
                        ['icon-mode', '==', 'true'],
                    ]
                ),
                array(
                    'id'      => 'active-image',
                    'type'    => 'media',
                    'title'   => __( 'Active image', 'wp-bnav' ),
                    'library' => 'image',
                    'dependency' => [
                        ['show-icon', '==', 'true'],
                        ['icon-mode', '==', 'false'],
                    ],
                ),
                ...$premium_settings,
            )
        ) );
    }

    /**
     * Return plugin all settings.
     *
     * @return string|array Settings values.
     */
    public static function get_settings() {
        return get_option( Wp_Bnav_Settings::$prefix );
    }

    /**
     * Premium version alert.
     *
     * @return string
     */
    protected function get_premium_alert_message() {
        return sprintf( '%s <a href="https://wpmessiah.com/products/wp-mobile-bottom-menu/">%s</a>',
            __( 'This is a premium feature of WP Mobile Bottom Menu and requires the pro version of this plugin to unlock.', 'wp-bnav' ),
            __( 'Download Pro Now', 'wp-bnav' )
        );
    }

    /**
     * Free vs Pro.
     *
     * @return string
     */
    protected function Free_VS_Pro(){
        ob_start();
        ?>
        <div class="wp_bnav_main_wrapper">
            <div class="wp_bnav_header_wrapper">
                <div class="container">
                    <div class="title">
                        <h1>Unlock the pro features now</h1>
                    </div>
                    <div class="text">
                        <p>Confirm a well-crafted WP Mobile Bottom Menu that engages readers and search engines.</p>
                    </div>
                    <div class="header_btn">
                        <div class="left_btn">
                            <a class="button button-primary" target="_blank" href="https://demo.wpmessiah.com/bottom-menu/">View Demo</a>
                        </div>
                        <div class="right_btn">
                            <a class="button button-secondary" target="_blank" href="https://wpmessiah.com/products/wp-mobile-bottom-menu/">Get Pro Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wp_bnav_money_back_guarantee_wrapper">
                <div class="container">
                    <div class="money_back_guarantee_logo">
                       <img src="<?php echo self::$plugin_file_url . 'admin/img/money-back-logo.png' ?>" alt="money-back-logo">
                    </div>
                    <div class="money_back_guarantee_text">
                        <h3>14 Days Money Back Guarantee!</h3>
                        <p>Your satisfaction is guaranteed under our 100% No-Risk Double Guarantee. We will<br> happily <a target="_blank" href="https://wpmessiah.com/refund-policy/">refund</a> 100% of your money if you don’t think our plugin works well within 14 days.</p>
                    </div>
                    <div class="money_back_guarantee_btn">
                        <a class="button button-primary" target="_blank" href="https://wpmessiah.com/products/">View All Products</a>
                    </div>
                </div>
            </div>
            <div class="wp_bnav_pricing_wrapper">
                <div class="container">
                    <div class="wp_bnav_pricing_content">
                        <div class="wp_bnav_pricing_content_header">
                            <span>Get a quote</span>
                            <h2>Compare Plan</h2>
                            <p>It’s all here!  Check out the comparison of the pricing and features<br> before moving on to the pro version.</p>
                        </div>
                        <div class="wp_bnav_pricing_content_table">
                            <table class="pricing-table">
                                <thead>
                                <tr>
                                    <th>Feature</th>
                                    <th>Free</th>
                                    <th>Premium</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>More Eye-Catching & Stunning Premade Templates.</td>
                                    <td class="cross">X</td>
                                    <td><span class="tick">✓</span></td>
                                </tr>
                                <tr>
                                    <td>Image selection for menu backgrounds.</td>
                                    <td class="cross">X</td>
                                    <td><span class="tick">✓</span></td>
                                </tr>
                                <tr>
                                    <td>Multiple options for text visibility.</td>
                                    <td class="cross">X</td>
                                    <td><span class="tick">✓</span></td>
                                </tr>
                                <tr>
                                    <td>Submenu Support.</td>
                                    <td class="cross">X</td>
                                    <td><span class="tick">✓</span></td>
                                </tr>
                                <tr>
                                    <td>Various Submenu Customization.</td>
                                    <td class="cross">X</td>
                                    <td><span class="tick">✓</span></td>
                                </tr>
                                <tr>
                                    <td>Child menu support.</td>
                                    <td class="cross">X</td>
                                    <td><span class="tick">✓</span></td>
                                </tr>
                                <tr>
                                    <td>Various Child menu Customization.</td>
                                    <td class="cross">X</td>
                                    <td><span class="tick">✓</span></td>
                                </tr>
                                <tr>
                                    <td>Unlimited number of grids for Menu.</td>
                                    <td class="cross">X</td>
                                    <td><span class="tick">✓</span></td>
                                </tr>
                                <tr>
                                    <td>Search Box Custom Icon support.</td>
                                    <td class="cross">X</td>
                                    <td><span class="tick">✓</span></td>
                                </tr>
                                <tr>
                                    <td>A lot more </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wp_bnav_testimonial_wrapper">
                <div class="container">
                    <div class="wp_bnav_testimonial_content">
                        <div class="wp_bnav_testimonial_content_header">
                            <span>Testimonials</span>
                            <h2>What People Say</h2>
                            <p>We're dedicated to providing the best possible experience for our customers.<br> Here's what a few of them have to say about us</p>
                        </div>
                        <div class="testimonial-cards">
                            <div class="card">
                                <div class="logo">
                                    <img src="<?php echo self::$plugin_file_url . 'admin/img/Alex.png' ?>" alt="mark-hugh">
                                </div>
                                <div class="content">
                                    <p>"As an e-commerce store owner, WP Mobile Bottom Menu has boosted my sales. Easy setup and fantastic customization. Love it."</p>
                                </div>
                                <div class="details">
                                    <div class="name">
                                        <p>John</p>
                                        <span>Store Owner</span>
                                    </div>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="logo">
                                    <img src="<?php echo self::$plugin_file_url . 'admin/img/Jessica.png' ?>" alt="cody-fisher">
                                </div>
                                <div class="content">
                                    <p>"This plugin is a game-changer! The navigation has now become effortless, and my users are much happier as a result. Thanks, BoomDevs."</p>
                                </div>
                                <div class="details">
                                    <div class="name">
                                        <p>Emily</p>
                                        <span> Blogger</span>
                                    </div>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="logo">
                                    <img src="<?php echo self::$plugin_file_url . 'admin/img/John.png' ?>" alt="john-doe">
                                </div>
                                <div class="content">
                                    <p>"I've tried other plugins, but WP Mobile Bottom Menu is the best. Simple to install and my mobile traffic has gone up. Highly recommended."</p>
                                </div>
                                <div class="details">
                                    <div class="name">
                                        <p>Mark</p>
                                        <span>Marketer</span>
                                    </div>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wp_bnav_coupon_wrapper">
                <div class="container">
                    <div class="wp_bnav_coupon_content">
                        <div class="wp_bnav_coupon_content_header">
                            <h2>What People Say About us</h2>
                            <p>We're dedicated to providing the best possible experience for our customers.<br> Here's what a few of them have to say about us</p>
                            <a class="button button-primary" href="#">View Demo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    protected function AiAltTextGenerator()
    {
        ob_start();

        $target_url = esc_url(admin_url('/admin.php?page=ai-alt-text-generator'));

        ?>
        <div class="wp-bnav-custom-landing-wrapper">
            <div class="wp-bnav-custom-landing-inner-wrapper">
                <svg width="400" height="400" viewBox="0 0 301 301" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M150.5 0C160.537 0 169.239 6.94525 171.465 16.7328L183.361 69.0466C188.862 93.2434 207.757 112.138 231.954 117.639L284.268 129.535C294.054 131.761 301 140.463 301 150.5C301 160.537 294.054 169.239 284.268 171.465L231.954 183.361C207.757 188.862 188.862 207.757 183.361 231.954L171.465 284.268C169.239 294.054 160.537 301 150.5 301C140.463 301 131.761 294.054 129.535 284.268L117.639 231.954C112.138 207.757 93.2434 188.862 69.0462 183.361L16.7324 171.465C6.94557 169.239 0 160.537 0 150.5C0 140.463 6.94557 131.761 16.7324 129.535L69.0462 117.639C93.2434 112.138 112.138 93.2434 117.639 69.0466L129.535 16.7328C131.761 6.94525 140.463 0 150.5 0Z" fill="url(#paint0_linear_4758_366)"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M37 0C39.4676 0 41.607 1.70747 42.1541 4.11371L45.0787 16.9749C46.4313 22.9236 51.0764 27.5687 57.0252 28.9213L69.8864 31.8459C72.2924 32.393 74 34.5324 74 37C74 39.4676 72.2924 41.607 69.8864 42.1541L57.0252 45.0787C51.0764 46.4313 46.4313 51.0764 45.0787 57.0252L42.1541 69.8864C41.607 72.2924 39.4676 74 37 74C34.5324 74 32.393 72.2924 31.8459 69.8864L28.9213 57.0252C27.5687 51.0764 22.9236 46.4313 16.9748 45.0787L4.11361 42.1541C1.70755 41.607 0 39.4676 0 37C0 34.5324 1.70755 32.393 4.11361 31.8459L16.9748 28.9213C22.9236 27.5687 27.5687 22.9236 28.9213 16.9749L31.8459 4.11371C32.393 1.70747 34.5324 0 37 0Z" fill="url(#paint1_linear_4758_366)"/>
                    <defs>
                    <linearGradient id="paint0_linear_4758_366" x1="131.909" y1="-6.19706" x2="176.391" y2="274.25" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#6248FF" stop-opacity="0.15"/>
                    <stop offset="1" stop-color="#D525FF" stop-opacity="0.02"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_4758_366" x1="32.4294" y1="-1.52353" x2="43.3651" y2="67.4237" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#6248FF" stop-opacity="0.15"/>
                    <stop offset="1" stop-color="#D525FF" stop-opacity="0.02"/>
                    </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="wp-bnav-custom-landing-inside">
                <div class="wp-bnav-custom-landing-top">
                    <img src="<?php echo self::$plugin_file_url . 'admin/img/ai-mage-alt-text-generator.svg'; ?>" alt="wp-bnav-logo">
                    <h2>Every Image deserves an Alt Text for SEO Benefits</h2>
                    <p>Why don't you use an AI Solution?</p>
                    <a href="#" class="wp-bnav-custom-landing-install-btn" data-target-url = "<?php echo $target_url; ?>">
                        <span class="wp-bnav-custom-landing-install-btn-txt">Install Ai Alt Text - Free</span>
                        <span class="wp-bnav-custom-landing-install-btn-icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M3.8335 13.3346L3.8335 14.168C3.8335 15.5487 4.95278 16.668 6.3335 16.668L14.6668 16.668C16.0475 16.668 17.1668 15.5487 17.1668 14.168L17.1668 13.3346M13.8335 10.0013L10.5002 13.3346M10.5002 13.3346L7.16683 10.0013M10.5002 13.3346L10.5002 3.33464" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </a>
                    <div class="wp-bnav-landing-video-player">
                        <iframe src="https://www.youtube-nocookie.com/embed/fKAz49VtbUI?showinfo=0&amp;autoplay=0&amp;mute=0&amp;rel=0"
                            allow="autoplay" title="YouTube video player" frameborder="0"
                            allowfullscreen="">
                        </iframe>
                    </div>
                </div>
                <div class="wp-bnav-custom-landing-info-grid">
                    <div class="wp-bnav-custom-landing-single-wrap">
                        <div class="wp-bnav-custom-landing-single-info">
                            <div>
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.45692 8.50921L7.37987 4.55449C9.26926 1.99817 10.214 0.720009 11.0953 0.990112C11.9767 1.26021 11.9767 2.82788 11.9767 5.9632V6.25883C11.9767 7.38967 11.9767 7.95509 12.3381 8.30976L12.3572 8.32813C12.7263 8.6753 13.3148 8.6753 14.4918 8.6753C16.6098 8.6753 17.6688 8.6753 18.0267 9.31766C18.0326 9.32829 18.0384 9.33901 18.044 9.34981C18.3819 10.0021 17.7687 10.8317 16.5423 12.4909L13.6194 16.4456C11.73 19.0019 10.7852 20.2801 9.90386 20.01C9.02246 19.7399 9.02249 18.1722 9.02253 15.0368L9.02254 14.7413C9.02255 13.6105 9.02256 13.045 8.66123 12.6904L8.64211 12.672C8.27298 12.3248 7.68449 12.3248 6.5075 12.3248C4.38949 12.3248 3.33048 12.3248 2.97257 11.6825C2.96665 11.6718 2.96089 11.6611 2.95529 11.6503C2.61743 10.998 3.23059 10.1684 4.45692 8.50921Z" fill="url(#paint0_linear_2559_1148)"/>
                                <defs>
                                    <linearGradient id="paint0_linear_2559_1148" x1="2.86328" y1="0.95459" x2="19.8537" y2="2.63039" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#6248FF"/>
                                    <stop offset="0.595" stop-color="#D525FF"/>
                                    <stop offset="1" stop-color="#FFCD57"/>
                                    </linearGradient>
                                </defs>
                                </svg>
                            </div>
                            <h3>Automated Alt Text Generation</h3>
                            <p>Say goodbye to manually entering alt text for each image. Our plugin automatically generates alt text upon image upload, saving you time and effort.</p>
                        </div>
                        <div class="wp-bnav-custom-landing-single-info">
                            <div>
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.45692 8.50921L7.37987 4.55449C9.26926 1.99817 10.214 0.720009 11.0953 0.990112C11.9767 1.26021 11.9767 2.82788 11.9767 5.9632V6.25883C11.9767 7.38967 11.9767 7.95509 12.3381 8.30976L12.3572 8.32813C12.7263 8.6753 13.3148 8.6753 14.4918 8.6753C16.6098 8.6753 17.6688 8.6753 18.0267 9.31766C18.0326 9.32829 18.0384 9.33901 18.044 9.34981C18.3819 10.0021 17.7687 10.8317 16.5423 12.4909L13.6194 16.4456C11.73 19.0019 10.7852 20.2801 9.90386 20.01C9.02246 19.7399 9.02249 18.1722 9.02253 15.0368L9.02254 14.7413C9.02255 13.6105 9.02256 13.045 8.66123 12.6904L8.64211 12.672C8.27298 12.3248 7.68449 12.3248 6.5075 12.3248C4.38949 12.3248 3.33048 12.3248 2.97257 11.6825C2.96665 11.6718 2.96089 11.6611 2.95529 11.6503C2.61743 10.998 3.23059 10.1684 4.45692 8.50921Z" fill="url(#paint0_linear_2559_1148)"/>
                                <defs>
                                    <linearGradient id="paint0_linear_2559_1148" x1="2.86328" y1="0.95459" x2="19.8537" y2="2.63039" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#6248FF"/>
                                    <stop offset="0.595" stop-color="#D525FF"/>
                                    <stop offset="1" stop-color="#FFCD57"/>
                                    </linearGradient>
                                </defs>
                                </svg>
                            </div>
                            <h3>Bulk Alt Text Generation</h3>
                            <p>Have a large number of images? No problem! Our plugin can generate alt text in bulk, making it easy to optimize all your images at once.</p>
                        </div>
                    </div>
                    <div class="wp-bnav-custom-landing-single-wrap">
                        <div class="wp-bnav-custom-landing-single-info">
                            <div>
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.45692 8.50921L7.37987 4.55449C9.26926 1.99817 10.214 0.720009 11.0953 0.990112C11.9767 1.26021 11.9767 2.82788 11.9767 5.9632V6.25883C11.9767 7.38967 11.9767 7.95509 12.3381 8.30976L12.3572 8.32813C12.7263 8.6753 13.3148 8.6753 14.4918 8.6753C16.6098 8.6753 17.6688 8.6753 18.0267 9.31766C18.0326 9.32829 18.0384 9.33901 18.044 9.34981C18.3819 10.0021 17.7687 10.8317 16.5423 12.4909L13.6194 16.4456C11.73 19.0019 10.7852 20.2801 9.90386 20.01C9.02246 19.7399 9.02249 18.1722 9.02253 15.0368L9.02254 14.7413C9.02255 13.6105 9.02256 13.045 8.66123 12.6904L8.64211 12.672C8.27298 12.3248 7.68449 12.3248 6.5075 12.3248C4.38949 12.3248 3.33048 12.3248 2.97257 11.6825C2.96665 11.6718 2.96089 11.6611 2.95529 11.6503C2.61743 10.998 3.23059 10.1684 4.45692 8.50921Z" fill="url(#paint0_linear_2559_1148)"/>
                                    <defs>
                                        <linearGradient id="paint0_linear_2559_1148" x1="2.86328" y1="0.95459" x2="19.8537" y2="2.63039" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#6248FF"/>
                                        <stop offset="0.595" stop-color="#D525FF"/>
                                        <stop offset="1" stop-color="#FFCD57"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <h3>Language Flexibility</h3>
                            <p>Users have the option to choose the language in which the alt text is generated. This ensures that the generated descriptions are relevant and appropriate for the target audience.</p>
                        </div>
                        <div class="wp-bnav-custom-landing-single-info">
                            <div>
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.45692 8.50921L7.37987 4.55449C9.26926 1.99817 10.214 0.720009 11.0953 0.990112C11.9767 1.26021 11.9767 2.82788 11.9767 5.9632V6.25883C11.9767 7.38967 11.9767 7.95509 12.3381 8.30976L12.3572 8.32813C12.7263 8.6753 13.3148 8.6753 14.4918 8.6753C16.6098 8.6753 17.6688 8.6753 18.0267 9.31766C18.0326 9.32829 18.0384 9.33901 18.044 9.34981C18.3819 10.0021 17.7687 10.8317 16.5423 12.4909L13.6194 16.4456C11.73 19.0019 10.7852 20.2801 9.90386 20.01C9.02246 19.7399 9.02249 18.1722 9.02253 15.0368L9.02254 14.7413C9.02255 13.6105 9.02256 13.045 8.66123 12.6904L8.64211 12.672C8.27298 12.3248 7.68449 12.3248 6.5075 12.3248C4.38949 12.3248 3.33048 12.3248 2.97257 11.6825C2.96665 11.6718 2.96089 11.6611 2.95529 11.6503C2.61743 10.998 3.23059 10.1684 4.45692 8.50921Z" fill="url(#paint0_linear_2559_1148)"/>
                                    <defs>
                                        <linearGradient id="paint0_linear_2559_1148" x1="2.86328" y1="0.95459" x2="19.8537" y2="2.63039" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#6248FF"/>
                                        <stop offset="0.595" stop-color="#D525FF"/>
                                        <stop offset="1" stop-color="#FFCD57"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <h3>Automated Titles & Captions</h3>
                            <p>Enhance your Image SEO further by setting custom automated titles, captions, and descriptions for your images generated by AI.</p>
                        </div>
                    </div>
                    <div class="wp-bnav-custom-landing-single-wrap">
                        <div class="wp-bnav-custom-landing-single-info">
                            <div>
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.45692 8.50921L7.37987 4.55449C9.26926 1.99817 10.214 0.720009 11.0953 0.990112C11.9767 1.26021 11.9767 2.82788 11.9767 5.9632V6.25883C11.9767 7.38967 11.9767 7.95509 12.3381 8.30976L12.3572 8.32813C12.7263 8.6753 13.3148 8.6753 14.4918 8.6753C16.6098 8.6753 17.6688 8.6753 18.0267 9.31766C18.0326 9.32829 18.0384 9.33901 18.044 9.34981C18.3819 10.0021 17.7687 10.8317 16.5423 12.4909L13.6194 16.4456C11.73 19.0019 10.7852 20.2801 9.90386 20.01C9.02246 19.7399 9.02249 18.1722 9.02253 15.0368L9.02254 14.7413C9.02255 13.6105 9.02256 13.045 8.66123 12.6904L8.64211 12.672C8.27298 12.3248 7.68449 12.3248 6.5075 12.3248C4.38949 12.3248 3.33048 12.3248 2.97257 11.6825C2.96665 11.6718 2.96089 11.6611 2.95529 11.6503C2.61743 10.998 3.23059 10.1684 4.45692 8.50921Z" fill="url(#paint0_linear_2559_1148)"/>
                                    <defs>
                                        <linearGradient id="paint0_linear_2559_1148" x1="2.86328" y1="0.95459" x2="19.8537" y2="2.63039" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#6248FF"/>
                                        <stop offset="0.595" stop-color="#D525FF"/>
                                        <stop offset="1" stop-color="#FFCD57"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <h3>Prefix or Suffix Addition</h3>
                            <p>Add a unique touch to your alt text with customizable prefixes or suffixes. This feature is great for branding or adding specific keywords.</p>
                        </div>
                        <div class="wp-bnav-custom-landing-single-info">
                            <div>
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.45692 8.50921L7.37987 4.55449C9.26926 1.99817 10.214 0.720009 11.0953 0.990112C11.9767 1.26021 11.9767 2.82788 11.9767 5.9632V6.25883C11.9767 7.38967 11.9767 7.95509 12.3381 8.30976L12.3572 8.32813C12.7263 8.6753 13.3148 8.6753 14.4918 8.6753C16.6098 8.6753 17.6688 8.6753 18.0267 9.31766C18.0326 9.32829 18.0384 9.33901 18.044 9.34981C18.3819 10.0021 17.7687 10.8317 16.5423 12.4909L13.6194 16.4456C11.73 19.0019 10.7852 20.2801 9.90386 20.01C9.02246 19.7399 9.02249 18.1722 9.02253 15.0368L9.02254 14.7413C9.02255 13.6105 9.02256 13.045 8.66123 12.6904L8.64211 12.672C8.27298 12.3248 7.68449 12.3248 6.5075 12.3248C4.38949 12.3248 3.33048 12.3248 2.97257 11.6825C2.96665 11.6718 2.96089 11.6611 2.95529 11.6503C2.61743 10.998 3.23059 10.1684 4.45692 8.50921Z" fill="url(#paint0_linear_2559_1148)"/>
                                    <defs>
                                        <linearGradient id="paint0_linear_2559_1148" x1="2.86328" y1="0.95459" x2="19.8537" y2="2.63039" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#6248FF"/>
                                        <stop offset="0.595" stop-color="#D525FF"/>
                                        <stop offset="1" stop-color="#FFCD57"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <h3>Designed specifically for WordPress</h3>
                            <p>It's a WordPress plugin. Installing and using it is simple and you can use all existing images with it.</p>
                        </div>
                    </div>
                </div>
                <div class="wp-bnav-custom-landing-bottom">
                    <h2>Your Every Image Deserves an Alt Text<br>
                        Let's use AI to make it. </h2>
                        <a href="#" class="wp-bnav-custom-landing-install-btn" data-target-url = "<?php echo $target_url; ?>">
                            <span class="wp-bnav-custom-landing-install-btn-txt">Install Ai Alt Text - Free</span>
                            <span class="wp-bnav-custom-landing-install-btn-icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M3.8335 13.3346L3.8335 14.168C3.8335 15.5487 4.95278 16.668 6.3335 16.668L14.6668 16.668C16.0475 16.668 17.1668 15.5487 17.1668 14.168L17.1668 13.3346M13.8335 10.0013L10.5002 13.3346M10.5002 13.3346L7.16683 10.0013M10.5002 13.3346L10.5002 3.33464" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </a>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
    
}

function wp_bnav_customizer_menu() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {

            $('[data-tab-id="edit-with-customizer"]').hide();
            $('a[href="admin.php?page=wp-bnav-settings#tab=edit-with-customizer"]').each(function() {
                $(this).attr('href', 'customize.php');
            });
        });
    </script>
    <?php
}
add_action('admin_footer', 'wp_bnav_customizer_menu');