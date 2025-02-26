<?php
/**
 * Plugin Name: Dadevarzan WordPress branch plugin
 * Plugin URI: https://wordpress.org/plugins/dadevarzan-wp-branch
 * GitHub Plugin URI: https://github.com/dadevarzan/dadevarzan-wp-branch
 * Description: branch post type for wordpress
 * Version: 1.3.4
 * Author: Dadevarzan Team
 * Author URI: http://www.dadevarzan.com
 * Text Domain: dadevarzan-wp-branch
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( !class_exists( 'dadevarzanWpBranch' ) ) {

    class dadevarzanWpBranch
    {

        const TAX_NAME = 'branch_category';

        public static function initialize()
        {

            add_action( 'plugins_loaded', 'dadevarzanWpBranch::load_text_domain' );
            add_action( 'init', 'dadevarzanWpBranch::add_post_type' );
            add_action( 'init', 'dadevarzanWpBranch::add_fields' );
            add_action('init', 'dadevarzanWpBranch::add_taxonomy' );
            add_action('init', 'dadevarzanWpBranch::add_role_caps');
            add_action( 'plugins_loaded', 'dadevarzanWpBranch::load_templates' );

            add_action( 'pre_get_posts', 'dadevarzanWpBranch::filter_branches' );
            add_shortcode('dv-branch-filter', 'dadevarzanWpBranch::filter_archive' );
            if( class_exists('BB_PowerPack') ) {
                add_shortcode('dv-branch-table-view', 'dadevarzanWpBranch::table_view_shortcode');
            }
        }

        public static function add_post_type()
        {

            $labels = array(
                "name" => __('Branch', 'dadevarzan-wp-branch'),
                "singular_name" => __('Branch', 'dadevarzan-wp-branch'),
                "all_items" => __('ALL Branch', 'dadevarzan-wp-branch'),
                "add_new" => __('Add Branch', 'dadevarzan-wp-branch'),
                "add_new_item" => __('Add New Branch', 'dadevarzan-wp-branch'),
                "menu_name" => __( "Branch", "dadevarzan-wp-branch" ),
                "not_found" => __( "Branch not found", "" ),
            );

            $args = array(
                "label" => __('Branch', 'dadevarzan-wp-branch'),
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
                "rewrite" => array( "slug" => "branch", "with_front" => true ),
                "query_var" => true,
                "menu_icon" => "dashicons-networking",
                "supports" => array( "title", "excerpt", "editor", "thumbnail", "comments", "author" ),
                "capability_type" => array('branch', 'branches'),
                "map_meta_cap" => true,
                "taxonomies" => array( "branch_category " ),
            );

            register_post_type( "branch", $args );

        }

        public static function add_fields()
        {

            if( function_exists('acf_add_local_field_group') ):

                acf_add_local_field_group(array(
                    'key' => 'group_59f82812f07c6',
                    'title' => __('Branch', 'dadevarzan-wp-branch'),
                    'fields' => array(
                        array(
                            'key' => 'field_59f82847ce47c',
                            'label' => __('Address', 'dadevarzan-wp-branch'),
                            'name' => 'dv-brnch-address',
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
                            'key' => 'field_59f82f61f5bc1',
                            'label' => __('Phone', 'dadevarzan-wp-branch'),
                            'name' => 'dv-brnch-phone',
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
                            'key' => 'field_59f83765f5bc5',
                            'label' => __('Fax', 'dadevarzan-wp-branch'),
                            'name' => 'dv-brnch-fax',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '-',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_59f83784f5bc6',
                            'label' => __('Postal code', 'dadevarzan-wp-branch'),
                            'name' => 'dv-brnch-postalcode',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '-',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_5a225d76110f0',
                            'label' => __('Map position', 'dadevarzan-wp-branch'),
                            'name' => 'dv-brnch-googlemap',
                            'type' => 'wysiwyg',
                            'instructions' => __('Help', 'dadevarzan-wp-branch').' :https://mizbanfa.net/blog/cms/wordpress/wordpress-map-for-ir-domain/',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'tabs' => 'text',
                            'media_upload' => 0,
                            'toolbar' => 'full',
                            'delay' => 0,
                        ),
                        array(
                            'key' => 'field_59f82f72f5bc2',
                            'label' => __('Owner name', 'dadevarzan-wp-branch'),
                            'name' => 'dv-brnch-manager-name',
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
                            'key' => 'field_59f830fdf5bc3',
                            'label' => __('Owner image', 'dadevarzan-wp-branch'),
                            'name' => 'dv-brnch-manager-image',
                            'type' => 'image',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'array',
                            'preview_size' => 'full',
                            'library' => 'all',
                            'min_width' => 100,
                            'min_height' => 100,
                            'min_size' => '',
                            'max_width' => 500,
                            'max_height' => 500,
                            'max_size' => '',
                            'mime_types' => 'jpeg,jpg,png,gif',
                        ),
                        array(
                            'key' => 'field_59f836d1f5bc4',
                            'label' => __('Owner email', 'dadevarzan-wp-branch'),
                            'name' => 'dv-brnch-manager-email',
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
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'post_type',
                                'operator' => '==',
                                'value' => 'branch',
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

                acf_add_local_field_group(array(
                    'key' => 'group_5a48d09aac9ec',
                    'title' => 'branch taxonomy',
                    'fields' => array(
                        array(
                            'key' => 'field_5a48d0c28833c',
                            'label' => __('Banner Image', 'dadevarzan-wp-branch'),
                            'name' => 'dv-brnch-cat-image',
                            'type' => 'image',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'array',
                            'preview_size' => 'thumbnail',
                            'library' => 'all',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => 'jpeg,jpg,gif,png',
                        ),
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'taxonomy',
                                'operator' => '==',
                                'value' => 'branch_category',
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
                "name" => __('Branch Categories', 'dadevarzan-wp-branch'),
                "singular_name" => __('Branch Category', 'dadevarzan-wp-branch'),
                "menu_name" => __('Branch Category', 'dadevarzan-wp-branch'),
                "all_items" => __('All Categories', 'dadevarzan-wp-branch'),
                "edit_item" => __('Edit Category', 'dadevarzan-wp-branch'),
                "add_new_item" => __('Add New Category', 'dadevarzan-wp-branch'),
            );

            $args = array(
                "label" => __('Branch Categories', 'dadevarzan-wp-branch'),
                "labels" => $labels,
                "public" => true,
                "hierarchical" => true,
                "show_ui" => true,
                "show_in_menu" => true,
                "show_in_nav_menus" => true,
                "query_var" => true,
                "rewrite" => array( 'slug' => dadevarzanWpBranch::TAX_NAME, 'with_front' => true, ),
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

            register_taxonomy( 'branch_category', array( 'branch' ), $args );

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
                $role->add_cap( 'read_branch' );
                $role->add_cap( 'edit_branch' );
                $role->add_cap( 'edit_branches' );
                $role->add_cap( 'edit_private_branches' );
                $role->add_cap( 'edit_published_branches' );
                $role->add_cap( 'edit_others_branches' );
                $role->add_cap( 'delete_branch' );
                $role->add_cap( 'delete_branches' );
                $role->add_cap( 'delete_private_branches' );
                $role->add_cap( 'delete_published_branches' );
                $role->add_cap( 'delete_others_branches' );
                $role->add_cap( 'publish_branches' );
                $role->add_cap( 'read_private_branches' );

            }

        }

        public function table_view_shortcode( $attributes )
        {

            define('BRANCH_TABLE_URL', WP_PLUGIN_URL . '/bbpowerpack/modules/pp-table/');

            wp_enqueue_style( 'branch-table-frontend', BRANCH_TABLE_URL.'css/frontend.css' );
            wp_enqueue_style( 'branch-table-tablesaw', BRANCH_TABLE_URL.'css/tablesaw.css' );
            wp_enqueue_script( 'branch-table-tablesaw', BRANCH_TABLE_URL.'js/tablesaw.js', array('jquery'));
            wp_enqueue_script( 'branch-table-tablesaw-triger', plugin_dir_url( __FILE__ ).'public/js/table-view.js', array('jquery'));

            $headers = array(
                __('Title', 'dadevarzan-wp-branch'),
                __('Phone', 'dadevarzan-wp-branch'),
                __('Address', 'dadevarzan-wp-branch'),
            );

            $rows = array();
            if ( have_posts() ) : while ( have_posts() ) : the_post();
                $rows[] = (object) array(
                    'label' => get_the_title(),
                    'cell' => array(
                        '<a href="'.esc_url(get_permalink()).'">'.esc_html(get_the_title()).'</a>',
                        get_field('dv-brnch-phone'),
                        get_field('dv-brnch-address'),
                    ),
                );
            endwhile;

            endif;

            wp_reset_postdata();

            $tblSettings = (object) array(
                'header' => $headers,
                'sortable' => '',
                'scrollable' => 'swipe',
                'header_text_alignment' => 'center',
                'header_vertical_alignment' => 'middle',
                'rows_text_alignment' => 'center',
                'rows_vertical_alignment' => 'middle',
                'rows' => $rows,
            );

            $uniqueID = uniqid();

            ob_start();
            echo '<div class="fl-node-'.$uniqueID.'">';
            FLBuilder::render_module_html( 'pp-table', $tblSettings );
            echo '</div>';

            echo '<style>';
            FLBuilder::render_module_css( 'pp-table', $uniqueID, $tblSettings );
            echo '</style>';

            return ob_get_clean();
        }

        public static function filter_branches( $query )
        {

            if ( is_admin() || !$query->is_main_query() )
                return;

            if( !is_tax( dadevarzanWpBranch::TAX_NAME ) && !is_post_type_archive('branch'))
                return;

            $query->set( 'posts_per_page', -1 );

            if (!empty($_GET['search'])) {
                $query->set( 's',esc_sql($_GET['search'] ));
            }

        }

        public function filter_archive( $attributes )
        {
            if( !is_tax( dadevarzanWpBranch::TAX_NAME ) && !is_post_type_archive('branch'))
                return null;

            $select_taxonomy_arr = array();

            $queried_object = get_queried_object();
            $select_taxonomy_arr[] = $queried_object->term_id;

            $children = array();
            if (!empty($queried_object->term_id)) {
                $children = get_terms( dadevarzanWpBranch::TAX_NAME, array(
                    'child_of' => $queried_object->term_id,
                    'parent' => $queried_object->term_id,
                ) );
            }

            $siblings = get_terms(dadevarzanWpBranch::TAX_NAME , array(
                'child_of' => $queried_object->parent,
                'parent' => $queried_object->parent,
            ) );

            $parents = array();
            if (!empty($queried_object->term_id)) {
                $parents = get_ancestors( $queried_object->term_id, dadevarzanWpBranch::TAX_NAME, 'taxonomy' );
            }

            $result = '<form method="get" name="search-branch" class="dv-search-branch-form">';
            $result .= '<div class="dv-branch-filter-container">';

            if (count($parents)) {

                $parents = array_reverse($parents);
                $select_taxonomy_arr = array_merge($select_taxonomy_arr, $parents);

                foreach ($parents as $parentID) {
                    $parent = get_term_by('id', $parentID, dadevarzanWpBranch::TAX_NAME);
                    $parentSiblings = get_terms(dadevarzanWpBranch::TAX_NAME , array(
                        'child_of' => $parent->parent,
                        'parent' => $parent->parent,
                    ) );
                    $result .= self::generate_select_box_filter($parentSiblings, $select_taxonomy_arr);

                }
            }

            $result .= self::generate_select_box_filter($siblings, $select_taxonomy_arr);

            if (count($children)) {
                $result .= self::generate_select_box_filter($children, $select_taxonomy_arr);
            }

            $result .= '<div class="dv-branch-filter-text">';
            $result .= '<input type="text" name="search" placeholder="'.__('Search', 'dadevarzan-wp-branch').'" class="dv-branch-search" value="'.(!empty($_GET['search']) ? esc_attr($_GET['search']) : '').'">';
            $result .= '</div>';
            $result .= '<div class="dv-branch-filter-submit">';
            $result .= '<input type="submit" name="go" class="dv-branch-search" value="'.__('Filter', 'dadevarzan-wp-branch').'">';
            $result .= '</div>';

            $result .= '</div>';
            $result .= '</form>';

            return $result;
        }

        protected function generate_select_box_filter($taxonomies, $select_taxonomy_arr)
        {
            if (count($taxonomies)) {
                $result = '<div class="dv-branch-filter-select">';
                $result .= '<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">';
                $result .= '<option value="">'.__('Select', 'dadevarzan-wp-branch').'</option>';

                foreach ($taxonomies as $taxonomy) {
                    $result .= '<option value="'.esc_attr(get_term_link($taxonomy)).'" '.(in_array($taxonomy->term_id, $select_taxonomy_arr) ? 'selected="selected"' : '').'>'.esc_html($taxonomy->name).'</option>';
                }

                $result .= '</select>';
                $result .= '</div>';

                return $result;
            }

            return '';
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
                FLBuilder::register_templates( $layoutTemplatePath, array('group' => 'branch'));
            }

        }

        public static function load_text_domain()
        {
            load_plugin_textdomain( 'dadevarzan-wp-branch' , FALSE, basename( dirname( __FILE__ ) ) . '/languages'  );
        }

    }

    dadevarzanWpBranch::initialize();
}
