<?php

class Awesome_Accordions_Admin
{

    private $plugin_name;
    private $version;
    private $tabs;

    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;

        include __DIR__ . "/class-tabs.php";
        
        $this->tabs = new Awesome_Accordions_Tabs($this->plugin_name);
        
        add_action('add_meta_boxes', array($this, 'add_metabox'), 101);
        add_action('save_post', array($this, 'save_metabox'), 10, 2);

        add_action('wp_ajax_accordion_new_element', array($this, 'accordion_new_element'));
        add_action('wp_ajax_accordion_save_data', array($this, 'accordion_save_data'));

        add_action('wp_ajax_show_aws_tiny_plugin_modal', array($this, 'show_aws_tiny_plugin_modal'));

        add_filter('manage_aws-accordions_posts_columns', array($this, 'aws_accordions_edit_columns'));
        add_action('manage_aws-accordions_posts_custom_column', array($this, 'aws_accordions_custom_columns'));

        add_filter('mce_buttons_3', array($this, 'remove_bootstrap_buttons'), 999);
        add_filter('mce_buttons', array($this, 'remove_toggle_button'), 999);

        add_filter('mce_buttons', array($this, "register_buttons"));
        add_filter('mce_external_plugins', array($this, 'register_tinymce_javascript'));

        
    }

    public function remove_bootstrap_buttons($buttons) {

        global $post;

        if ($post && isset($post->ID) && get_post_type($post->ID) === "aws-accordions")
        {
            return array();
        }
        else
        {
            return $buttons;
        }
    }

    public function remove_toggle_button($buttons) {

        global $post;

        if ($post && isset($post->ID) && get_post_type($post->ID) === "aws-accordions")
        {
            $remove = array('css_components_toolbar_toggle');
            return array_diff($buttons, $remove);
        }
        else
        {
            return $buttons;
        }
    }

    public function aws_accordions_edit_columns($columns) {

        $new_columns = array();

        foreach ($columns as $key => $value)
        {

            if ($key === "date")
            {
                $new_columns["shortcode"] = __('Shortcode', 'awesome-accordions');
            }

            $new_columns[$key] = $value;
        }

        return $new_columns;
    }

    public function aws_accordions_custom_columns($column) {

        if ($column === 'shortcode')
        {
            echo "[awesome-accordions id='" . get_the_ID() . "' ]";
        }
    }

    public function enqueue_styles() {
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/awesome-accordions-admin.css', array(), $this->version, 'all');
    }

    public function enqueue_scripts() {
        wp_enqueue_script("accordions-backend", plugin_dir_url(__FILE__) . 'js/awesome-accordions-admin.js', array('jquery', 'jquery-ui-core', 'jquery-ui-sortable'), $this->version, false);
    }

    function register_tinymce_javascript($plugin_array) {
        $plugin_array['aws-accordions'] = plugins_url('/js/acc-plugin.js', __FILE__);
        return $plugin_array;
    }

    function register_buttons($buttons) {
        array_push($buttons, "||", 'aws-accordions');
        return $buttons;
    }

    public function awesome_accordions_cpt() {

        $labels = array(
            'name'               => _x('Accordion', 'post type general name'),
            'singular_name'      => _x('Accordions', 'post type singular name'),
            'menu_name'          => _x('Accordions', 'admin menu'),
            'name_admin_bar'     => _x('Accordions', 'add new on admin bar'),
            'add_new'            => _x('Add New', ''),
            'add_new_item'       => __('Add New Accordions'),
            'edit_item'          => __('Edit Accordions'),
            'new_item'           => __('New Accordions'),
            'all_items'          => __('All Accordions'),
            'view_item'          => __('View Accordions'),
            'search_items'       => __('Search Accordion'),
            'not_found'          => __('No Accordion found'),
            'not_found_in_trash' => __('No Accordion found in Trash'),
            'parent_item_colon'  => __('Parent Accordion:'),
        );

        $publicly_queryable = false;
        
        $views = get_option('awesome-accordions-views');
        
        if( empty($views) ):
            $publicly_queryable = false;
        else:
            
            if( isset($views["flag"]) && isset($views["posts"]) ):

                $publicly_queryable = true;

            endif;
            
        endif;
        
        $args = array(
            'hierarchical'       => true,
            'labels'             => $labels,
            'public'             => $publicly_queryable,
            'publicly_queryable' => $publicly_queryable,
            'description'        => __('Description.'),
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'accordions'),
            'capability_type'    => 'page',
            'has_archive'        => true,
            'menu_position'      => 22,
            "show_in_rest"       => $publicly_queryable,
            'menu_icon'          => 'dashicons-editor-justify',
            'supports'           => array('title',)
        );

        register_post_type('aws-accordions', $args);
    }

    public function add_metabox() {
        add_meta_box(
                'baccordion-meta-settings', __('Accordion Settings', $this->plugin_name), array($this, 'render_metabox'), 'aws-accordions', 'advanced', 'default'
        );

        if (!class_exists('Awesome_Accordions_Pro_Admin'))
        {

            add_meta_box(
                    'baccordion-shortcode', __('Shortcode', $this->plugin_name), array($this, 'render_shortcode'), 'aws-accordions', 'side', 'default'
            );
        }
    }

    public function render_metabox() {
        include __DIR__ . "/partials/main.php";
        include __DIR__ . "/partials/layover-tinymce.php";
    }

    public function render_shortcode() {
        echo "[awesome-accordions id='" . get_the_ID() . "' toggle ='true']";
    }

    public function awesome_accordions_admin_page() {
        add_submenu_page('edit.php?post_type=aws-accordions', 'Accordions', __('Settings', 'awesome-accordions'), 'manage_options', 'awesome-accordions-settings', array($this, 'awesome_admin_tabs'));
    }

    public function awesome_admin_tabs() {

        $this->tabs->init_tabs();
        
    }

    public function save_metabox() {

        if (get_post_type() !== "aws-accordions")
        {
            return true;
        }

        $accordions = filter_input(INPUT_POST, "accordions", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

        if ($accordions && $accordions !== "")
        {
            update_post_meta(get_the_ID(), "accordions", $accordions);
        }
        else
        {
            update_post_meta(get_the_ID(), "accordions", array());
        }
    }

    public function accordion_save_data() {

        $post_id = filter_input(INPUT_POST, "post_id", FILTER_DEFAULT);
        $accs    = filter_input(INPUT_POST, "accs", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

        update_post_meta($post_id, 'accordions', $accs);

        echo json_encode($accs);

        die();
    }

    public function accordion_new_element() {

        $new_editor_id = filter_input(INPUT_POST, "id", FILTER_DEFAULT);

        include __DIR__ . "/partials/new_element.php";

        die();
    }

    public function show_aws_tiny_plugin_modal() {

        $accordions = get_posts(array(
            "post_type"      => array("aws-accordions"),
            "post_status"    => "publish",
            "posts_per_page" => -1
        ));

        include __DIR__ . "/partials/layover-tinymce.php";

        die();
    }

}
