<?php

namespace forge12\floating_menu\component {

    use forge12\floating_menu\component\floatingmenu\FloatingMenu;
    use forge12\floating_menu\WP_Customize_Control_Multiselect;
    use forge12\floating_menu\WP_Customize_Control_Menu;
    use forge12\floating_menu\WP_Customize_Control_PostTypes;
    use forge12\floating_menu\WP_Customize_Control_Pages;

    if (!defined('ABSPATH')) {
        exit;
    }

    /**
     * This class is responsible to add the options for the custom floating menus to the WordPress
     * customizer to make it easier to style the menus.
     *
     * @since v1.3
     */
    class Extend_Customizer
    {
        public function __construct()
        {
            add_action('customize_register', [$this, 'run']);
            add_action('customize_save_after', [$this, 'save']);
        }

        /**
         * This function updates the settings set by the backend. Required to syncronize the backend settings and the
         * frontend customizer values.
         *
         * @return void
         */
        public function save()
        {
            /*
             * Get all floating menus added by the user
             */
            $floating_menus = get_posts(['post_type' => 'floating_menu', 'numberposts' => -1]);

            /*
             * Post Types
             */
            $list_of_post_types = get_post_types();
            sort($list_of_post_types);

            /*
             * Loop through all menus to create the options for the layout.
             */
            foreach ($floating_menus as /** @var \WP_Post $menu */ $menu) {
                $FloatingMenu = new FloatingMenu($menu);
                $Settings = $FloatingMenu->getSettings();

                foreach ($Settings as $key => $value) {
                    if ($key != 'pages_post_type') {
                        $Settings[$key] = get_theme_mod($menu->post_name . '_' . $key, $value);
                    }
                }

                /*
                 * Add the post types to the settings
                 */
                $Settings['pages_post_type'] = json_decode($menu->post_name . '_pages_post_type', true);

                /*
                foreach ($list_of_post_types as $post_type) {
                    if (get_theme_mod($menu->post_name . '_pages_post_type_' . $post_type) == 1) {
                        $Settings['pages_post_type'][] = $post_type;
                    }
                }*/

                update_post_meta($menu->ID, '_floating_settings', $Settings);
            }
        }

        /**
         * Add settings to the customizer for the given menu.
         *
         * @param \WP_Customize_manager $WP_Customize_Manager
         * @param \WP_Post              $menu
         *
         * @return void
         */
        private function add_menu_item($WP_Customize_Manager, $menu)
        {
            $FloatingMenu = new FloatingMenu($menu);

            /*
             * Add a section for each menu
             */
            $WP_Customize_Manager->add_section($menu->post_name, [
                'title' => __($menu->post_title, 'f12_floating_menu'),
                'priority' => 120,
                'panel' => 'floating-menu'
            ]);

            /*
             * Add required controller for each section
             */
            //remove_theme_mod($menu->post_name.'_floating_links');

            /*
             * Add Position
             */
            $WP_Customize_Manager->add_setting($menu->post_name . '_position', [
                'default' => $FloatingMenu->getOption('position')
            ]);

            $WP_Customize_Manager->add_control(
                new \WP_Customize_Control(
                    $WP_Customize_Manager,
                    $menu->post_name . '_position',
                    array(
                        'label' => __('Position:', 'f12_floating_menu'),
                        'section' => $menu->post_name,
                        'type' => 'select',
                        'choices' => [
                            'hidden' => __('Hidden', 'f12_floating_menu'),
                            'left' => __('Left', 'f12_floating_menu'),
                            'top' => __('Top', 'f12_floating_menu'),
                            'right' => __('Right', 'f12_floating_menu'),
                            'bottom' => __('Bottom', 'f12_floating_menu'),
                            'bottomright' => __('Lower Right', 'f12_floating_menu'),
                            'upperright' => __('Upper Right', 'f12_floating_menu'),
                            'upperleft' => __('Upper Left', 'f12_floating_menu'),
                            'lowerleft' => __('Lower Left', 'f12_floating_menu')
                        ],
                        'description' => __('Please select the Position of the Floating Menu.', 'f12_floating_menu')
                    )
                )
            );

            /*
             * Add Display on Desktop
             */
            $WP_Customize_Manager->add_setting($menu->post_name . '_display_responsive_desktop', [
                'default' => $FloatingMenu->getOption('display_responsive_desktop')
            ]);

            $WP_Customize_Manager->add_control(
                new \WP_Customize_Control(
                    $WP_Customize_Manager,
                    $menu->post_name . '_display_responsive_desktop',
                    array(
                        'label' => __('Display on Desktop:', 'f12_floating_menu'),
                        'section' => $menu->post_name,
                        'type' => 'select',
                        'choices' => [
                            'default' => __('Default', 'f12_floating_menu'),
                            'visible' => __('Visible', 'f12_floating_menu'),
                            'hidden' => __('Hidden', 'f12_floating_menu'),
                        ],
                        'description' => __('Please select if the menu should be displayed on desktop devices.', 'f12_floating_menu')
                    )
                )
            );

            /*
             * Add Display on Tablets
             */
            $WP_Customize_Manager->add_setting($menu->post_name . '_display_responsive_tablet', [
                'default' => $FloatingMenu->getOption('display_responsive_tablet')
            ]);

            $WP_Customize_Manager->add_control(
                new \WP_Customize_Control(
                    $WP_Customize_Manager,
                    $menu->post_name . '_display_responsive_tablet',
                    array(
                        'label' => __('Display on Tablets:', 'f12_floating_menu'),
                        'section' => $menu->post_name,
                        'type' => 'select',
                        'choices' => [
                            'default' => __('Default', 'f12_floating_menu'),
                            'visible' => __('Visible', 'f12_floating_menu'),
                            'hidden' => __('Hidden', 'f12_floating_menu'),
                        ],
                        'description' => __('Please select if the menu should be displayed on tablet devices.', 'f12_floating_menu')
                    )
                )
            );

            /*
             * Add Display on Smartphones
             */
            $WP_Customize_Manager->add_setting($menu->post_name . '_display_responsive_mobile', [
                'default' => $FloatingMenu->getOption('display_responsive_mobile')
            ]);

            $WP_Customize_Manager->add_control(
                new \WP_Customize_Control(
                    $WP_Customize_Manager,
                    $menu->post_name . '_display_responsive_mobile',
                    array(
                        'label' => __('Display on Smartphones:', 'f12_floating_menu'),
                        'section' => $menu->post_name,
                        'type' => 'select',
                        'choices' => [
                            'default' => __('Default', 'f12_floating_menu'),
                            'visible' => __('Visible', 'f12_floating_menu'),
                            'hidden' => __('Hidden', 'f12_floating_menu'),
                        ],
                        'description' => __('Please select if the menu should be displayed on smartphone devices.', 'f12_floating_menu')
                    )
                )
            );

            /*
             * Set font Size
             */
            $WP_Customize_Manager->add_setting($menu->post_name . '_font_size', [
                'default' => $FloatingMenu->getOption('font_size')
            ]);

            $WP_Customize_Manager->add_control(
                new \WP_Customize_Control(
                    $WP_Customize_Manager,
                    $menu->post_name . '_font_size',
                    array(
                        'label' => __('Font Size:', 'f12_floating_menu'),
                        'section' => $menu->post_name,
                        'type' => 'text',
                        'description' => __('Define the font size of the label in px.', 'f12_floating_menu')
                    )
                )
            );

            /*
             * Set Icon Size
             */
            $WP_Customize_Manager->add_setting($menu->post_name . '_attachment_size', [
                'default' => $FloatingMenu->getOption('attachment_size')
            ]);

            $WP_Customize_Manager->add_control(
                new \WP_Customize_Control(
                    $WP_Customize_Manager,
                    $menu->post_name . '_attachment_size',
                    array(
                        'label' => __('Icon Size:', 'f12_floating_menu'),
                        'section' => $menu->post_name,
                        'type' => 'text',
                        'description' => __('Define the size of the icons in px.', 'f12_floating_menu')
                    )
                )
            );

            /*
             * Set Padding
             */
            $WP_Customize_Manager->add_setting($menu->post_name . '_icon_padding', [
                'default' => $FloatingMenu->getOption('icon_padding')
            ]);

            $WP_Customize_Manager->add_control(
                new \WP_Customize_Control(
                    $WP_Customize_Manager,
                    $menu->post_name . '_icon_padding',
                    array(
                        'label' => __('Icon Padding:', 'f12_floating_menu'),
                        'section' => $menu->post_name,
                        'type' => 'text',
                        'description' => __('Define the padding around the icon.', 'f12_floating_menu')
                    )
                )
            );

            /*
             * Set Background Color
             */
            $WP_Customize_Manager->add_setting($menu->post_name . '_background_color', [
                'default' => $FloatingMenu->getOption('background_color')
            ]);

            $WP_Customize_Manager->add_control(
                new \WP_Customize_Color_Control(
                    $WP_Customize_Manager,
                    $menu->post_name . '_background_color',
                    array(
                        'label' => __('Background Color:', 'f12_floating_menu'),
                        'section' => $menu->post_name,
                        'description' => __('Define the background color for the floating menu items.', 'f12_floating_menu')
                    )
                )
            );

            /*
             * Set Background Color Hover
             */
            $WP_Customize_Manager->add_setting($menu->post_name . '_background_color_hover', [
                'default' => $FloatingMenu->getOption('background_color_hover')
            ]);

            $WP_Customize_Manager->add_control(
                new \WP_Customize_Color_Control(
                    $WP_Customize_Manager,
                    $menu->post_name . '_background_color_hover',
                    array(
                        'label' => __('Background Color (hover):', 'f12_floating_menu'),
                        'section' => $menu->post_name,
                        'description' => __('Define the background color for the floating menu items on hover.', 'f12_floating_menu')
                    )
                )
            );

            /*
             * Set Link Color
             */
            $WP_Customize_Manager->add_setting($menu->post_name . '_link_color', [
                'default' => $FloatingMenu->getOption('link_color')
            ]);

            $WP_Customize_Manager->add_control(
                new \WP_Customize_Color_Control(
                    $WP_Customize_Manager,
                    $menu->post_name . '_link_color',
                    array(
                        'label' => __('Link Color:', 'f12_floating_menu'),
                        'section' => $menu->post_name,
                        'description' => __('Define the color of the links on hover.', 'f12_floating_menu')
                    )
                )
            );

            /*
             * Set Link Color Hover
             */
            $WP_Customize_Manager->add_setting($menu->post_name . '_link_color_hover', [
                'default' => $FloatingMenu->getOption('link_color_hover')
            ]);

            $WP_Customize_Manager->add_control(
                new \WP_Customize_Color_Control(
                    $WP_Customize_Manager,
                    $menu->post_name . '_link_color_hover',
                    array(
                        'label' => __('Link Color (hover):', 'f12_floating_menu'),
                        'section' => $menu->post_name,
                        'description' => __('Define the color of the links on hover.', 'f12_floating_menu')
                    )
                )
            );

            /*
             * Add Distance Animation
             */
            $WP_Customize_Manager->add_setting($menu->post_name . '_animation_distance', [
                'default' => $FloatingMenu->getOption('animation_distance')
            ]);

            $WP_Customize_Manager->add_control(
                new \WP_Customize_Control(
                    $WP_Customize_Manager,
                    $menu->post_name . '_animation_distance',
                    array(
                        'label' => __('Distance Animation:', 'f12_floating_menu'),
                        'section' => $menu->post_name,
                        'type' => 'select',
                        'choices' => [
                            'default' => __('Default', 'f12_floating_menu'),
                            'enabled' => __('Enabled', 'f12_floating_menu'),
                            'disabled' => __('Disabled', 'f12_floating_menu')
                        ],
                        'description' => __('If enabled, the opacity of the menu will be calculated by the distance of the mouse pointer. The close the mouse pointer comes to the menu, the less the opacity becomes.', 'f12_floating_menu')
                    )
                )
            );

            /*
             * Add Distance Animation
             */
            $WP_Customize_Manager->add_setting($menu->post_name . '_animation_slideout', [
                'default' => $FloatingMenu->getOption('animation_slideout')
            ]);

            $WP_Customize_Manager->add_control(
                new \WP_Customize_Control(
                    $WP_Customize_Manager,
                    $menu->post_name . '_animation_slideout',
                    array(
                        'label' => __('Slide-Out Animation:', 'f12_floating_menu'),
                        'section' => $menu->post_name,
                        'type' => 'select',
                        'choices' => [
                            'default' => __('Default', 'f12_floating_menu'),
                            'enabled' => __('Enabled', 'f12_floating_menu'),
                            'disabled' => __('Disabled', 'f12_floating_menu')
                        ],
                        'description' => __('If enabled, only the icon will be displayed and the text will become visible after the mouse enters the icon. Ensure you have enabled the "Show Link Option" label for the each link.', 'f12_floating_menu')
                    )
                )
            );

            /*
             * Add Distance Animation
             */
            $WP_Customize_Manager->add_setting($menu->post_name . '_display_settings', [
                'default' => $FloatingMenu->getOption('display_settings')
            ]);

            $WP_Customize_Manager->add_control(
                new \WP_Customize_Control(
                    $WP_Customize_Manager,
                    $menu->post_name . '_display_settings',
                    array(
                        'label' => __('Display Settings:', 'f12_floating_menu'),
                        'section' => $menu->post_name,
                        'type' => 'select',
                        'choices' => [
                            'default' => __('Default', 'f12_floating_menu'),
                            'full' => __('Full', 'f12_floating_menu'),
                            'icon' => __('Only Icon', 'f12_floating_menu')
                        ],
                        'description' => __('If enabled, the icon and the the text will be displayed together. Otherwise only the icon will be displayed. If enabled, the "Slide-Out Animation" will be disabled.', 'f12_floating_menu')
                    )
                )
            );

            /*
             * Add Post Types
             */
            $WP_Customize_Manager->add_setting($menu->post_name . '_pages_post_type', [
                'default' => $FloatingMenu->getPostTypes()
            ]);

            $WP_Customize_Manager->add_control(new WP_Customize_Control_PostTypes(
                $WP_Customize_Manager,
                $menu->post_name . '_pages_post_type',
                array(
                    'label' => __('Post Types', 'f12_floating_menu'),
                    'section' => $menu->post_name,
                    'type' => 'post_type',
                    'description' => __('Limit the visibility of the floating menu to specific post types', 'f12_floating_menu')
                )
            ));

            /*
             * Add Pages
             */
            $WP_Customize_Manager->add_setting($menu->post_name . '_pages', array(
                'default' => $FloatingMenu->getOption('pages'),
            ));

            //add control
            $WP_Customize_Manager->add_control(new WP_Customize_Control_Pages(
                $WP_Customize_Manager,
                $menu->post_name . '_pages',
                array(
                    'label' => __('Pages', 'f12_floating_menu'),
                    'section' => $menu->post_name,
                    'type' => 'pages',
                    'description' => __('Limit the visibility of the floating menu to specific pages.', 'f12_floating_menu')
                )
            ));
        }

        /**
         * @param \WP_Customize_manager $WP_Customize_Manager
         *
         * @return void
         */
        public function run($WP_Customize_Manager)
        {
            require_once(plugin_dir_path(dirname(dirname(__FILE__))) . '/core/WP_Customize_Control_Multiselect.class.php');
            require_once(plugin_dir_path(dirname(dirname(__FILE__))) . '/core/WP_Customize_Control_Menu.class.php');
            require_once(plugin_dir_path(dirname(dirname(__FILE__))) . '/core/WP_Customize_Control_PostTypes.class.php');
            require_once(plugin_dir_path(dirname(dirname(__FILE__))) . '/core/WP_Customize_Control_Pages.class.php');

            /*
             * Add a custom panel
             */
            $WP_Customize_Manager->add_panel('floating-menu', [
                'priority' => 120,
                'capability' => 'manage_options',
                'title' => __('Floating Menu', 'f12_floating_menu'),
                'description' => __('Customize the layout of your floating menus.', 'f12_floating_menu')
            ]);

            /*
             * Get all floating menus added by the user
             */
            $floating_menus = get_posts(['post_type' => 'floating_menu', 'numberposts' => -1]);

            /*
             * Loop through all menus to create the options for the layout.
             */
            foreach ($floating_menus as /** @var \WP_Post $menu */ $menu) {

                $this->add_menu_item($WP_Customize_Manager, $menu);
            }
        }
    }

    /*
     * Init the Object
     */
    $EC = new Extend_Customizer();
}