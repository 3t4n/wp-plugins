<?php
/**
 * Plugin Name: Dadevarzan WordPress event plugin
 * Plugin URI: https://wordpress.org/plugins/dadevarzan-wp-event
 * GitHub Plugin URI: https://github.com/dadevarzan/dadevarzan-wp-event
 * Description: event post type for wordpress
 * Version: 1.1.9
 * Author: Dadevarzan Team
 * Author URI: http://www.dadevarzan.com
 * Text Domain: dadevarzan-wp-event
 * Domain Path: /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( !class_exists( 'dadevarzanWpEvent' ) ) {

    class dadevarzanWpEvent
    {

        public static function initialize()
        {
            add_action( 'plugins_loaded', 'dadevarzanWpEvent::load_text_domain' );
            add_action( 'init', 'dadevarzanWpEvent::add_post_type' );
            add_action( 'init', 'dadevarzanWpEvent::add_fields' );
            add_action('init', 'dadevarzanWpEvent::add_taxonomy');
            add_action('init', 'dadevarzanWpEvent::add_role_caps');
            add_action( 'plugins_loaded', 'dadevarzanWpEvent::load_templates' );

        }

        public static function add_post_type()
        {

            $labels = array(
                "name" => __('Events', 'dadevarzan-wp-event'),
                "singular_name" => __('Event', 'dadevarzan-wp-event'),
                "all_items" => __('All Events', 'dadevarzan-wp-event'),
                "add_new" => __('Add Event', 'dadevarzan-wp-event'),
                "add_new_item" => __('Add New Event', 'dadevarzan-wp-event'),
                "edit_item" => __('Edit Event', 'dadevarzan-wp-event'),
                "new_item" => __('New Event', 'dadevarzan-wp-event'),
                "view_item" => __('View Event', 'dadevarzan-wp-event'),
            );

            $args = array(
                "label" => __('Event', 'dadevarzan-wp-event'),
                "labels" => $labels,
                "description" => "",
                "public" => true,
                "publicly_queryable" => true,
                "show_ui" => true,
                "show_in_rest" => true,
                "rest_base" => "",
				"show_in_nav_menus" => true,
                "has_archive" => true,
                "show_in_menu" => true,
                "exclude_from_search" => false,
                "hierarchical" => false,
                "rewrite" => array( "slug" => "event", "with_front" => true ),
                "query_var" => true,
                "menu_icon" => "dashicons-calendar-alt",
                "supports" => array( "title", "excerpt", "editor", "thumbnail", "comments", "author" ),
                "capability_type" => array('event', 'events'),
                "map_meta_cap" => true,
                "taxonomies" => array( "event_category" ),
            );

            register_post_type( "event", $args );

        }

        public static function add_fields()
        {

            if( function_exists('acf_add_local_field_group') ):

                acf_add_local_field_group(array(
                    'key' => 'group_59e6f35b3f72b',
                    'title' => 'Event',
                    'fields' => array(
                        array(
                            'key' => 'field_59e6f382e1bc2',
                            'label' => 'Gallery',
                            'name' => 'cnf_gallery',
                            'type' => 'gallery',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'min' => '',
                            'max' => '',
                            'insert' => 'append',
                            'library' => 'all',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => 'jpg,jpeg,gif,png,wbmp',
                        ),
                        array(
                            'key' => 'field_59e6f520e1bc3',
                            'label' => 'Link to event website',
                            'name' => 'cnf_url',
                            'type' => 'url',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                        ),
                        array(
                            'key' => 'field_59e6f574e1bc4',
                            'label' => 'Event date',
                            'name' => 'cnf_date_start',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 1,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_59e6f6aae1bc5',
                            'label' => 'Status',
                            'name' => 'cnf_status',
                            'type' => 'select',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'choices' => array(
                                __('Participant', 'dadevarzan-wp-event') => __('Participant', 'dadevarzan-wp-event'),
                                __('Sponsor', 'dadevarzan-wp-event') => __('Sponsor', 'dadevarzan-wp-event'),
                                __('Organizer', 'dadevarzan-wp-event') => __('Organizer', 'dadevarzan-wp-event'),
                            ),
                            'default_value' => array(
                                0 => __('Participant', 'dadevarzan-wp-event'),
                            ),
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 0,
                            'ajax' => 0,
                            'return_format' => 'value',
                            'placeholder' => '',
                        ),
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'post_type',
                                'operator' => '==',
                                'value' => 'event',
                            ),
                        ),
                    ),
                    'menu_order' => 0,
                    'position' => 'acf_after_title',
                    'style' => 'default',
                    'label_placement' => 'top',
                    'instruction_placement' => 'label',
                    'hide_on_screen' => '',
                    'active' => 1,
                    'description' => '',
                ));

            endif;

        }

        public static function add_taxonomy()
        {

            $labels = array(
                "name" => __('Event Categories', 'dadevarzan-wp-event'),
                "singular_name" => __('Event Category', 'dadevarzan-wp-event'),
            );

            $args = array(
                "label" => __('Event Categories', 'dadevarzan-wp-event'),
                "labels" => $labels,
                "public" => true,
                "hierarchical" => true,
                "show_ui" => true,
                "show_in_menu" => true,
                "show_in_nav_menus" => true,
                "query_var" => true,
                "rewrite" => array( 'slug' => 'event_category', 'with_front' => true, ),
                "show_in_nav_menus" => true,
                "show_admin_column" => true,
                "show_in_rest" => true,
                "rest_base" => "",
                "show_in_quick_edit" => true,
                'capabilities' => array(
                    'manage_terms' => 'manage_categories',
                    'edit_terms' => 'manage_categories',
                    'delete_terms' => 'manage_categories',
                    'assign_term' => 'manage_categories',
                    'assign_terms' => 'manage_categories',
                ),
            );

            register_taxonomy( 'event_category', array( 'event' ), $args );

        }

        public static function add_role_caps()
        {

            // Add the roles you'd like to administer the custom post types
            $roles = array('wpseo_editor', 'wpseo_manager', 'shop_manager', 'editor', 'administrator');

            // Loop through each role and assign capabilities
            foreach($roles as $the_role) {

                $role = get_role($the_role);

                if ( empty($role) ) {
                    continue;
                }

                $role->add_cap( 'read' );
                $role->add_cap( 'read_event' );
                $role->add_cap( 'edit_event' );
                $role->add_cap( 'edit_events' );
                $role->add_cap( 'edit_private_events' );
                $role->add_cap( 'edit_published_events' );
                $role->add_cap( 'edit_others_events' );
                $role->add_cap( 'delete_event' );
                $role->add_cap( 'delete_events' );
                $role->add_cap( 'delete_private_events' );
                $role->add_cap( 'delete_published_events' );
                $role->add_cap( 'delete_others_events' );
                $role->add_cap( 'publish_events' );
                $role->add_cap( 'read_private_events' );

            }

        }

        public static function load_templates() {

            /**
             * Return if the builder isn't installed or if the current
             * version doesn't support registering templates.
             */
            if ( ! class_exists( 'FLBuilder' ) || ! method_exists( 'FLBuilder', 'register_templates' ) ) {
                return;
            }

            $layoutTemplatePath = plugin_dir_path( __FILE__ ) . 'data/templates.dat';
            if ( file_exists( $layoutTemplatePath ) && class_exists( 'FLThemeBuilder' ) ) {
                FLBuilder::register_templates( $layoutTemplatePath, array('group' => 'event'));
            }

        }

        public static function load_text_domain()
        {
            load_plugin_textdomain( 'dadevarzan-wp-event' , FALSE, basename( dirname( __FILE__ ) ) . '/languages'  );
        }

    }

    dadevarzanWpEvent::initialize();

}
