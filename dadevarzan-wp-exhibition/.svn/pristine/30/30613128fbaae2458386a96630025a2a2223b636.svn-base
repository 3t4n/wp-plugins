<?php
/**
 * Plugin Name: Dadevarzan WordPress exhibition plugin
 * Plugin URI: https://wordpress.org/plugins/dadevarzan-wp-exhibition
 * GitHub Plugin URI: https://github.com/dadevarzan/dadevarzan-wp-exhibition
 * Description: exhibition post type for wordpress
 * Version: 1.2.3
 * Author: Dadevarzan Team
 * Author URI: http://www.dadevarzan.com
 * Text Domain: dadevarzan-wp-exhibition
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( !class_exists( 'dadevarzanWpExhibition' ) ) {

    class dadevarzanWpExhibition
    {

        public static function initialize()
        {

            add_action( 'plugins_loaded', 'dadevarzanWpExhibition::load_text_domain' );
            add_action( 'init', 'dadevarzanWpExhibition::add_post_type' );
            add_action( 'init', 'dadevarzanWpExhibition::add_fields' );
            add_action('init', 'dadevarzanWpExhibition::add_taxonomy');
            add_action('init', 'dadevarzanWpExhibition::add_role_caps');
            add_action( 'plugins_loaded', 'dadevarzanWpExhibition::load_templates' );

        }

        public static function add_post_type()
        {

            $labels = array(
                "name" => __('Exhibition', 'dadevarzan-wp-exhibition'),
                "singular_name" => __('Exhibition', 'dadevarzan-wp-exhibition'),
                "all_items" => __('ALL Exhibition', 'dadevarzan-wp-exhibition'),
                "add_new" => __('Add Exhibition', 'dadevarzan-wp-exhibition'),
                "add_new_item" => __('Add New Exhibition', 'dadevarzan-wp-exhibition'),
            );

            $args = array(
                "label" => __('Exhibition', 'dadevarzan-wp-exhibition'),
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
                "rewrite" => array( "slug" => "exhibition", "with_front" => true ),
                "query_var" => true,
                "menu_icon" => "dashicons-media-interactive",
                "supports" => array( "title", "excerpt", "editor", "thumbnail", "comments", "author" ),
                "capability_type" => array('exhibition', 'exhibitions'),
                "map_meta_cap" => true,
                "taxonomies" => array( "exhibition_category" ),
            );

            register_post_type( 'exhibition', $args );

        }

        public static function add_fields()
        {

            if( function_exists('acf_add_local_field_group') ):

                acf_add_local_field_group(array(
                    'key' => 'group_59a3b8a9f10bd',
                    'title' => __('Exhibition', 'dadevarzan-wp-exhibition'),
                    'fields' => array(
                        array(
                            'key' => 'field_59a3bb17b4c8d',
                            'label' => __('Start Date', 'dadevarzan-wp-exhibition'),
                            'name' => 'xhbtn_start_date',
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
                            'key' => 'field_59a3bbbcb4c8e',
                            'label' => __('Duration', 'dadevarzan-wp-exhibition'),
                            'name' => 'xhbtn_duration',
                            'type' => 'number',
                            'instructions' => '',
                            'required' => 1,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => 3,
                            'prepend' => '',
                            'append' => __('Day', 'dadevarzan-wp-exhibition'),
                            'min' => 1,
                            'max' => '',
                            'step' => '',
                        ),
                        array(
                            'key' => 'field_59a3bc01b4c8f',
                            'label' => 'Address',
                            'name' => 'xhbtn_address',
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
                            'placeholder' => __('Tehran Exhibition Address', 'dadevarzan-wp-exhibition'),
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_59a3bc4ab4c90',
                            'label' => __('Salon', 'dadevarzan-wp-exhibition'),
                            'name' => 'xhbtn_salon',
                            'type' => 'text',
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
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_59a3bcd3b4c91',
                            'label' => __('Stand', 'dadevarzan-wp-exhibition'),
                            'name' => 'xhbtn_stand',
                            'type' => 'text',
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
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_59a3bd0db4c92',
                            'label' => __('Exhibition Gallery', 'dadevarzan-wp-exhibition'),
                            'name' => 'xhbtn_gallery',
                            'type' => 'gallery',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'min' => 1,
                            'max' => '',
                            'insert' => 'append',
                            'library' => 'all',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => 'jpg,gif,png,jpeg',
                        ),
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'post_type',
                                'operator' => '==',
                                'value' => 'exhibition',
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
                "name" => __('Exhibition Categories', 'dadevarzan-wp-exhibition'),
                "singular_name" => __('Exhibition Category', 'dadevarzan-wp-exhibition'),
                "all_items" => __('All Categories', 'dadevarzan-wp-exhibition'),
                "edit_item" => __('Edit Category', 'dadevarzan-wp-exhibition'),
                "add_new_item" => __('Add New Category', 'dadevarzan-wp-exhibition'),
            );

            $args = array(
                "label" => __('Exhibition Categories', 'dadevarzan-wp-exhibition'),
                "labels" => $labels,
                "public" => true,
                "hierarchical" => true,
                "show_ui" => true,
                "show_in_menu" => true,
                "show_in_nav_menus" => true,
                "query_var" => true,
                "rewrite" => array( 'slug' => 'exhibition_categories', 'with_front' => true, ),
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

            register_taxonomy( 'exhibition_category', array( 'exhibition' ), $args );

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
                $role->add_cap( 'read_exhibition' );
                $role->add_cap( 'edit_exhibition' );
                $role->add_cap( 'edit_exhibitions' );
                $role->add_cap( 'edit_private_exhibitions' );
                $role->add_cap( 'edit_published_exhibitions' );
                $role->add_cap( 'edit_others_exhibitions' );
                $role->add_cap( 'delete_exhibition' );
                $role->add_cap( 'delete_exhibitions' );
                $role->add_cap( 'delete_private_exhibitions' );
                $role->add_cap( 'delete_published_exhibitions' );
                $role->add_cap( 'delete_others_exhibitions' );
                $role->add_cap( 'publish_exhibitions' );
                $role->add_cap( 'read_private_exhibitions' );

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
                FLBuilder::register_templates( $layoutTemplatePath, array('group' => 'exhibition'));
            }

        }

        public static function load_text_domain()
        {
            load_plugin_textdomain( 'dadevarzan-wp-exhibition' , FALSE, basename( dirname( __FILE__ ) ) . '/languages'  );
        }

    }

    dadevarzanWpExhibition::initialize();

}
