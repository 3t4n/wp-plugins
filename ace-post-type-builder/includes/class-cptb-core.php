<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Cptb_Type_Builder {

    private static $instance;

    public static function instance() {
        if ( ! isset( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function init() {
        register_activation_hook( __FILE__, array( $this, 'cptb_activate' ) );
        register_deactivation_hook( __FILE__, array( $this, 'cptb_deactivate' ) );
        
        $this->includes();
        
        add_action( 'init', array( $this, 'register_dynamic_post_types' ) );
        add_action( 'init', array( $this, 'register_dynamic_taxonomies' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'cptb_load_admin_assets' ) );
       // add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
       add_action('admin_menu', array($this, 'register_admin_menu'));
        add_action( 'admin_post_cptb_save_post_type', array( $this, 'cptb_save_custom_post_type' ) );

        add_action( 'admin_post_cptb_save_taxonomy', array( $this, 'cptb_save_custom_taxonomy' ) );

        // Elementor Compatibility
        add_action('elementor/init', array( $this, 'cptb_make_elementor_compatible' ));
        //for delete post type & taxonomy
        add_action( 'admin_post_cptb_delete_post_type', array( $this, 'cptb_delete_custom_post_type' ) );
        add_action('admin_post_cptb_delete_taxonomy', array($this, 'cptb_delete_custom_taxonomy'));

        //for edit taxonomy 
        add_action('admin_post_cptb_update_taxonomy', array($this, 'cptb_update_custom_taxonomy'));   

        add_action('admin_post_cptb_update_post_type', array($this, 'cptb_update_custom_post_type'));


    }

    private function includes() {
        require_once CPTB_PLUGIN_DIR . 'includes/cptb-post-types.php';
        require_once CPTB_PLUGIN_DIR . 'includes/cptb-taxonomies.php';
    }

    public function cptb_activate() {
        $this->register_dynamic_post_types();
        $this->register_dynamic_taxonomies();
        flush_rewrite_rules(); 
    }
    
    public function cptb_deactivate() {
        flush_rewrite_rules();
    }

    public function register_dynamic_post_types() {
        $post_types = get_option('cptb_custom_post_types', array());
        foreach ($post_types as $post_type) {
            CPTB_Post_Types::register_dynamic($post_type);
        }
        flush_rewrite_rules(); 
    }
    

    // Register dynamically created taxonomies
    public function register_dynamic_taxonomies() {
        $taxonomies = get_option('cptb_custom_taxonomies', array());
    
        foreach ($taxonomies as $taxonomy) {
            if (isset($taxonomy['slug']) && isset($taxonomy['post_type'])) {
                $post_types = get_post_types(array('name' => $taxonomy['post_type']), 'objects');
    
                if (empty($post_types)) {
                    continue; 
                }
                $labels = array(
                    'name'              => $taxonomy['plural'],
                    'singular_name'     => $taxonomy['singular'],
                    // Translators: %s is the plural name of the taxonomy
                    'search_items'      => sprintf(__('Search %s', 'ace-post-type-builder'), $taxonomy['plural']),
                    // Translators: %s is the plural name of the taxonomy
                    'all_items'         => sprintf(__('All %s', 'ace-post-type-builder'), $taxonomy['plural']),
                    // Translators: %s is the singular name of the taxonomy
                    'parent_item'       => $taxonomy['hierarchical'] ? sprintf(__('Parent %s', 'ace-post-type-builder'), $taxonomy['singular']) : null,
                    // Translators: %s is the singular name of the taxonomy
                    'parent_item_colon' => $taxonomy['hierarchical'] ? sprintf(__('Parent %s:', 'ace-post-type-builder'), $taxonomy['singular']) : null,
                    // Translators: %s is the singular name of the taxonomy
                    'edit_item'         => sprintf(__('Edit %s', 'ace-post-type-builder'), $taxonomy['singular']),
                    // Translators: %s is the singular name of the taxonomy
                    'update_item'       => sprintf(__('Update %s', 'ace-post-type-builder'), $taxonomy['singular']),
                    // Translators: %s is the singular name of the taxonomy
                    'add_new_item'      => sprintf(__('Add New %s', 'ace-post-type-builder'), $taxonomy['singular']),
                    // Translators: %s is the singular name of the taxonomy
                    'new_item_name'     => sprintf(__('New %s Name', 'ace-post-type-builder'), $taxonomy['singular']),
                   // translators: %s: plural name of the taxonomy
                    'menu_name' => sprintf(__('All %s', 'ace-post-type-builder'), $taxonomy['plural']),
                );

                $args = array(
                    'labels'            => $labels,
                    'public'            => isset($taxonomy['public']) ? (bool)$taxonomy['public'] : true,
                    'hierarchical'      => isset($taxonomy['hierarchical']) ? (bool)$taxonomy['hierarchical'] : false,
                    'show_admin_column' => true,
                    'show_ui'           => true,  
                    'show_in_rest'      => true,  
                    'show_in_menu'      => true,
                    'rewrite'           => array('slug' => sanitize_title($taxonomy['slug'])),
                );

                register_taxonomy($taxonomy['slug'], $taxonomy['post_type'], $args);
            }
        }
    }

    // Elementor compatibility
    public function cptb_make_elementor_compatible() {
        if (did_action('elementor/loaded')) {
            add_filter('elementor/query/get_query_args', function($query_args) {
                $custom_post_types = get_option('cptb_custom_post_types', array());
                $post_type_slugs = wp_list_pluck($custom_post_types, 'slug');

                if (!empty($post_type_slugs)) {
                    $query_args['post_type'] = array_merge($query_args['post_type'], $post_type_slugs);
                }

                return $query_args;
            });
        }
    }
    

    // Load admin scripts and styles
    public function cptb_load_admin_assets($hooks) {

        if ($hooks == 'apt-builder_page_cptb-templates') {
            wp_enqueue_script( 'cptb-pagination-js', CPTB_PLUGIN_URL . 'assets/js/cptb-pagination.js', array( 'jquery' ), CPTB_PLUGIN_VERSION, true );

            wp_localize_script('cptb-pagination-js', 'cptb_pagination_object', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'nonce'   => wp_create_nonce('cptb_create_pagination_nonce_action')
            ));

            wp_enqueue_style( 'cptb-admin-pagination-css', CPTB_PLUGIN_URL . 'assets/css/admin-pagination.css', array(), CPTB_PLUGIN_VERSION );
            wp_enqueue_style( 'cptb-admin-boostrap-css', CPTB_PLUGIN_URL . 'assets/css/bootstrap.min.css', array(), CPTB_PLUGIN_VERSION );
        }

        wp_enqueue_style( 'cptb-admin-css', CPTB_PLUGIN_URL . 'assets/css/admin-styles.css', array(), CPTB_PLUGIN_VERSION );
        wp_enqueue_script( 'cptb-admin-js', CPTB_PLUGIN_URL . 'assets/js/admin-scripts.js', array( 'jquery' ), CPTB_PLUGIN_VERSION, true );
    }

    // Add admin menu
    public function register_admin_menu() {
        add_menu_page(
            'Post Type Builder',
            'APT Builder',
            'manage_options',
            'cptb-builder',
            array($this, 'cptb_dash_page'),
            'dashicons-admin-tools',
            6
        );
        add_submenu_page(
            'cptb-builder',
            'Manage Post Types',
            'Post Types',
            'manage_options',
            'cptb-post-types',
            array($this, 'cptb_post_types_page')
        );
        add_submenu_page(
            'cptb-builder',
            'Manage Taxonomies',
            'Taxonomies',
            'manage_options',
            'cptb-taxonomies',
            array($this, 'cptb_taxonomies_page')
        );
        add_submenu_page(
            'cptb-builder',
            'Templates',
            'Templates (250+)',
            'manage_options',
            'cptb-templates',
            array($this, 'cptb_templates_page')
        );
    }


    //for admin page

    // Callback for taxonomies submenu
    public function cptb_dash_page() {
        include plugin_dir_path(__FILE__) . '../templates/cptb_dashboard_page.php';
    }


    // Callback for post types submenu 
    public function cptb_post_types_page() {
        include plugin_dir_path(__FILE__) . '../templates/cptb-admin-page.php';
    }

    // Callback for taxonomies submenu
    public function cptb_taxonomies_page() {
        include plugin_dir_path(__FILE__) . '../templates/cptb-taxonomies-page.php';
    }

    // // Callback for taxonomies submenu
    public function cptb_templates_page() {
        include plugin_dir_path(__FILE__) . '../templates/cptb-templates-page.php';
    }

    // Save custom post type
    public function cptb_save_custom_post_type() {
        if ( ! isset( $_POST['cptb_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash($_POST['cptb_nonce']) ), 'cptb_save_post_type' ) ) {
            return;
        }

        $new_post_type = array(
            'name'           => isset($_POST['post_type_name']) ? sanitize_text_field(wp_unslash($_POST['post_type_name'])) : '',
            'slug'           => isset($_POST['post_type_slug']) ? sanitize_title(wp_unslash($_POST['post_type_slug'])) : '',
            'supports'       => isset($_POST['supports']) ? array_map('sanitize_text_field', wp_unslash($_POST['supports'])) : $supports,
            'public'         => isset($_POST['public']) ? 1 : 0,
            'has_archive'    => isset($_POST['has_archive']) ? 1 : 0,
            'menu_position'  => isset($_POST['menu_position']) ? intval(wp_unslash($_POST['menu_position'])) : 0,
            'labels'         => array(
                'name'          => isset($_POST['post_type_label_name']) ? sanitize_text_field(wp_unslash($_POST['post_type_label_name'])) : '',
                'singular_name' => isset($_POST['post_type_singular_name']) ? sanitize_text_field(wp_unslash($_POST['post_type_singular_name'])) : '',
            ),
        );        

        $post_types = get_option( 'cptb_custom_post_types', array() );
        $post_types[ $new_post_type['slug'] ] = $new_post_type;

        update_option( 'cptb_custom_post_types', $post_types );

        wp_redirect( admin_url( 'admin.php?page=cptb-post-types&message=1' ) );
        exit;
    }


// Save custom taxonomy
public function cptb_save_custom_taxonomy() {
    if (!isset($_POST['cptb_nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash($_POST['cptb_nonce']) ), 'cptb_save_taxonomy')) {
        return;
    }

    if (empty($_POST['taxonomy_slug']) || empty($_POST['taxonomy_singular']) || empty($_POST['taxonomy_plural']) || empty($_POST['post_type'])) {
        wp_die(esc_html__('Please fill in all required fields.', 'ace-post-type-builder'));
    }

    $taxonomy_slug = sanitize_title(wp_unslash($_POST['taxonomy_slug']));
    $taxonomy_singular = sanitize_text_field(wp_unslash($_POST['taxonomy_singular']));
    $taxonomy_plural = sanitize_text_field(wp_unslash($_POST['taxonomy_plural']));
    $post_type = sanitize_text_field(wp_unslash($_POST['post_type']));
    $hierarchical = isset($_POST['hierarchical']) ? true : false;
    $public = isset($_POST['public']) ? true : false;

    $labels = array(
        'name'              => $taxonomy_plural,
        'singular_name'     => $taxonomy_singular,


        'search_items'      => sprintf(
            /* translators: %s: taxonomy plural name */
            __('Search %s', 'ace-post-type-builder'), 
            $taxonomy_plural
        ),
        'all_items'         => sprintf(
            /* translators: %s: taxonomy plural name */
            __('All %s', 'ace-post-type-builder'), 
            $taxonomy_plural
        ),
        'parent_item'       => $hierarchical ? sprintf(
            /* translators: %s: taxonomy singular name */
            __('Parent %s', 'ace-post-type-builder'), 
            $taxonomy_singular
        ) : null,
        'parent_item_colon' => $hierarchical ? sprintf(
            /* translators: %s: taxonomy singular name */
            __('Parent %s:', 'ace-post-type-builder'), 
            $taxonomy_singular
        ) : null,
        'edit_item'         => sprintf(
            /* translators: %s: taxonomy singular name */
            __('Edit %s', 'ace-post-type-builder'), 
            $taxonomy_singular
        ),
        'update_item'       => sprintf(
            /* translators: %s: taxonomy singular name */
            __('Update %s', 'ace-post-type-builder'), 
            $taxonomy_singular
        ),
        'add_new_item'      => sprintf(
            /* translators: %s: taxonomy singular name */
            __('Add New %s', 'ace-post-type-builder'), 
            $taxonomy_singular
        ),
        'new_item_name'     => sprintf(
            /* translators: %s: taxonomy singular name */
            __('New %s Name', 'ace-post-type-builder'), 
            $taxonomy_singular
        ),
        

        'menu_name'         => $taxonomy_plural, // This doesn't need translation.

    );

    $args = array(
        'labels'            => $labels,
        'public'            => $public,
        'hierarchical'      => $hierarchical,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => $taxonomy_slug),
    );

    if (!taxonomy_exists($taxonomy_slug)) {
        register_taxonomy($taxonomy_slug, $post_type, $args);
    }

    $taxonomies = get_option('cptb_custom_taxonomies', array());
    $taxonomies[$taxonomy_slug] = array(
        'slug'          => $taxonomy_slug,
        'singular'      => $taxonomy_singular,
        'plural'        => $taxonomy_plural,
        'post_type'     => $post_type,
        'hierarchical'  => $hierarchical,
        'public'        => $public,
    );
    update_option('cptb_custom_taxonomies', $taxonomies);
    if (!term_exists($taxonomy_singular, $taxonomy_slug)) {
        if (is_wp_error($term_data)) {
            wp_die(esc_html__('Error creating taxonomy term: ', 'ace-post-type-builder') . esc_html($term_data->get_error_message()));
        }
    }

    wp_redirect(admin_url('admin.php?page=cptb-taxonomies&message=1'));
    exit;
}

//for delete post type

public function cptb_delete_custom_post_type() {
    if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'cptb_delete_post_type_' . ( isset( $_GET['post_type'] ) ? sanitize_text_field( wp_unslash( $_GET['post_type'] ) ) : '' ) ) ) {
        wp_die( esc_html__( 'Invalid nonce.', 'ace-post-type-builder' ) );
    }
    $post_types = get_option('cptb_custom_post_types', array());
    if ( isset( $post_types[$_GET['post_type']] ) ) {
        unset( $post_types[$_GET['post_type']] );
        update_option( 'cptb_custom_post_types', $post_types );
        wp_redirect( admin_url( 'admin.php?page=cptb-post-types&message=3' ) );
        exit;
    }
    wp_redirect( admin_url( 'admin.php?page=cptb-post-types&message=4' ) );
    exit;
}

//for delete taxonomy

public function cptb_delete_custom_taxonomy() {
    if ( ! isset( $_GET['taxonomy'] ) ) {
        wp_redirect( admin_url( 'admin.php?page=cptb-taxonomies&deletemessage=3' ) );
        exit;
    }

    $taxonomy_slug = sanitize_text_field( $_GET['taxonomy'] );
    $taxonomies = get_option( 'cptb_custom_taxonomies', array() );

    if ( isset( $taxonomies[ $taxonomy_slug ] ) ) {
        unset( $taxonomies[ $taxonomy_slug ] );
        update_option( 'cptb_custom_taxonomies', $taxonomies );
        wp_redirect( admin_url( 'admin.php?page=cptb-taxonomies&deletemessage=2' ) );
        exit;
    } else {
        wp_redirect( admin_url( 'admin.php?page=cptb-taxonomies&deletemessage=4' ) );
        exit;
    }
}

//for edit taxonomy 
public function cptb_update_custom_taxonomy() {
    if (!isset($_POST['cptb_nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash($_POST['cptb_nonce']) ), 'cptb_update_taxonomy')) {
        return;
    }

    $original_slug = sanitize_text_field($_POST['original_taxonomy_slug']);
    $taxonomy_slug = sanitize_title($_POST['taxonomy_slug']);
    $taxonomy_singular = sanitize_text_field($_POST['taxonomy_singular']);
    $taxonomy_plural = sanitize_text_field($_POST['taxonomy_plural']);
    $post_type = sanitize_text_field($_POST['post_type']);
    $hierarchical = isset($_POST['hierarchical']) ? true : false;
    $public = isset($_POST['public']) ? true : false;

    $taxonomies = get_option('cptb_custom_taxonomies', array());
    if (isset($taxonomies[$original_slug])) {
        unset($taxonomies[$original_slug]); 

        // Add updated taxonomy
        $taxonomies[$taxonomy_slug] = array(
            'slug'          => $taxonomy_slug,
            'singular'      => $taxonomy_singular,
            'plural'        => $taxonomy_plural,
            'post_type'     => $post_type,
            'hierarchical'  => $hierarchical,
            'public'        => $public,
        );

        update_option('cptb_custom_taxonomies', $taxonomies);
        wp_redirect(admin_url('admin.php?page=cptb-taxonomies&message=2'));  // Success message
        exit;
    }

    wp_redirect(admin_url('admin.php?page=cptb-taxonomies&message=3'));  // Error message
    exit;
}

//end

//for edit custom post types 
public function cptb_update_custom_post_type() {
    if ( ! isset( $_POST['cptb_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash($_POST['cptb_nonce']) ), 'cptb_update_post_type' ) ) {
        return;
    }

    $original_slug = sanitize_text_field( $_POST['original_post_type_slug'] );
    $updated_post_type = array(
        'name'           => sanitize_text_field( $_POST['post_type_name'] ),
        'slug'           => sanitize_title( $_POST['post_type_slug'] ),
       // 'supports'       => array_map( 'sanitize_text_field', $_POST['supports'] ),
        'supports'       => $supports,
        'public'         => isset( $_POST['public'] ) ? 1 : 0,
        'has_archive'    => isset( $_POST['has_archive'] ) ? 1 : 0,
        'menu_position'  => intval( $_POST['menu_position'] ),
        'labels'         => array(
            'name'          => sanitize_text_field( $_POST['post_type_label_name'] ),
            'singular_name' => sanitize_text_field( $_POST['post_type_singular_name'] ),
        ),
    );

    $post_types = get_option( 'cptb_custom_post_types', array() );
    if ( isset( $post_types[ $original_slug ] ) ) {
        unset( $post_types[ $original_slug ] );
    }

    $post_types[ $updated_post_type['slug'] ] = $updated_post_type;
    update_option( 'cptb_custom_post_types', $post_types );

    wp_redirect( admin_url( 'admin.php?page=cptb-post-types&message=2' ) );
    exit;
}

}