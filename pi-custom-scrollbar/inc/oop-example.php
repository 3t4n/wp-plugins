<?php

/**
 * WordPress settings API demo class
 *
 * @author Tareq Hasan
 */
if (!class_exists('Pi_setting_api_options')) :
    class Pi_setting_api_options
    {

        private $settings_api;

        function __construct()
        {
            $this->settings_api = new Pi_setting_api;

            add_action('admin_init', array($this, 'admin_init'));
            add_action('admin_menu', array($this, 'admin_menu'));
        }

        function admin_init()
        {

            //set the settings
            $this->settings_api->set_sections($this->get_settings_sections());
            $this->settings_api->set_fields($this->get_settings_fields());

            //initialize settings
            $this->settings_api->admin_init();
        }

        function admin_menu()
        {
            add_menu_page('Scrollbar', 'Scrollbar', 'manage_options', 'pi_scrollbar', array($this, 'plugin_page'));
        }


        function get_settings_sections()
        {
            $sections = array(
                array(
                    'id'    => 'pi_custom_scrollbar_options',
                    'title' => __('PI Custom Scrollbar Setting', 'pi')
                )

            );
            return $sections;
        }

        /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
        function get_settings_fields()
        {
            $settings_fields = array(
                'pi_custom_scrollbar_options' => array(
                    array(
                        'name'              => 'color_picker',
                        'label'             => __('Scrollbar Color', 'pi'),
                        'desc'              => __('Set Scrollbar Color', 'pi'),
                        'type'              => 'color',
                        'default'           => 'Title',
                        'sanitize_callback' => 'sanitize_text_field'
                    ),
                    array(
                        'name'              => 'cursorwidth',
                        'label'             => __('Cursor Width', 'pi'),
                        'desc'              => __('Type Cursor WIdth', 'pi'),
                        'placeholder'       => __('1.99', 'pi'),
                        'min'               => 0,
                        'max'               => 100,
                        'step'              => '6',
                        'type'              => 'number',
                        'default'           => '6',
                        'sanitize_callback' => 'floatval'
                    ),
                    array(
                        'name'        => 'cursorborder',
                        'label'       => __('Type Cursor Border', 'pi'),
                        'desc'        => __('Type Cursro Border Example: border 1px solid #fff', 'pi'),
                        'placeholder' => __('1px solid #fff', 'pi'),
                        'type'        => 'text'
                    ),
                    array(
                        'name'        => 'cursorborder_redious',
                        'label'       => __('Type Cursor Border Radius', 'pi'),
                        'desc'        => __('Type Cursro Border Radius Example: 5px', 'pi'),
                        'placeholder' => __('50px'),
                        'type'        => 'text'
                    ),
                    array(
                        'name'        => 'scrolling_speed',
                        'label'       => __('Type Scrolling Speed', 'pi'),
                        'desc'        => __('Type Scrolling Sped Number example: 100', 'pi'),
                        'placeholder' => __('100'),
                        'type'        => 'number'
                    ),
                ),

            );

            return $settings_fields;
        }

        function plugin_page()
        {
            echo '<div class="wrap">';

            $this->settings_api->show_navigation();
            $this->settings_api->show_forms();

            echo '</div>';
        }

        /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
        function get_pages()
        {
            $pages = get_pages();
            $pages_options = array();
            if ($pages) {
                foreach ($pages as $page) {
                    $pages_options[$page->ID] = $page->post_title;
                }
            }

            return $pages_options;
        }
    }
endif;
