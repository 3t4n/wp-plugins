<?php
class Evdpl_FAQ_Admin {
    private $version;
    private $dir;
    public function __construct( $version ) {
        
        $this->version = $version;
        $this->dir = trailingslashit( plugin_dir_path( __FILE__ ) );
        $this->url = trailingslashit( plugin_dir_url( __FILE__ ) );
        register_activation_hook( __FILE__,         array( $this, 'activation' ) );
        register_deactivation_hook( __FILE__,       array( $this, 'deactivation' ) );
        add_action( 'init',                         array( $this, 'content_types' ) );
        add_action( 'wp_enqueue_scripts',           array( $this, 'enq_scripts' ) );
        add_action( 'admin_enqueue_scripts',        array( $this, 'enq_admin_scripts' ) );
        add_action( 'manage_posts_custom_column',   array( $this, 'column_action' ) );
        add_filter( 'manage_faq_posts_columns',     array( $this, 'columns_filter' ) );
       
        add_shortcode( 'faq-accordion', array( $this, 'faq_shortcode' ) );
        $faq_is_admin = is_admin();
        if ( true === $faq_is_admin ) {
            add_action( 'admin_init',  array( $this, 'faq_admin_actions' ) );
            add_action( 'admin_menu',  array( $this, 'faq_admin_menu' ), 100 );
        }
    }
    function activation() {
        $this->content_types();
        flush_rewrite_rules();
    }
    function deactivation() {
        global $wpdb;
        $sql_table_user_meta_cart = "DELETE FROM `" . $wpdb->prefix . "usermeta` WHERE meta_key LIKE  '%faq_%'";
        $wpdb->get_results( $sql_table_user_meta_cart );
        flush_rewrite_rules();
    }
    function content_types() {
        $defaults = $this->defaults();
        register_post_type( $defaults['post_type']['slug'], $defaults['post_type']['args'] );
        register_taxonomy( $defaults['taxonomy']['slug'], $defaults['post_type']['slug'],  $defaults['taxonomy']['args'] );
    }
    function defaults() {
        $defaults = array(
            'post_type' => array(
                'slug'  => 'faq',
                'args'  => array(
                    'labels' => array(
                        'name'                  => __( 'FAQ',                       'evdpl-faq' ),
                        'menu_name'             => __( 'EVDPL FAQs', 'evdpl-faq' ),
                        'singular_name'         => __( 'FAQ',                       'evdpl-faq' ),
                        'all_items'             => __( 'All FAQs', 'evdpl-faq' ),
                        'add_new'               => __( 'Add New',                   'evdpl-faq' ),
                        'add_new_item'          => __( 'Add New FAQ',               'evdpl-faq' ),
                        'edit'                  => __( 'Edit',                      'evdpl-faq' ),
                        'edit_item'             => __( 'Edit FAQ',                  'evdpl-faq' ),
                        'new_item'              => __( 'New FAQ',                   'evdpl-faq' ),
                        'view'                  => __( 'View FAQs',                 'evdpl-faq' ),
                        'view_item'             => __( 'View FAQ',                  'evdpl-faq' ),
                        'search_items'          => __( 'Search FAQ',                'evdpl-faq' ),
                        'not_found'             => __( 'No FAQs found',             'evdpl-faq' ),
                        'not_found_in_trash'    => __( 'No FAQs found in Trash',    'evdpl-faq' )
                    ),
                    'public'            => false,
                    'query_var'         => true,
                    'menu_position'     => 20,
                    'exclude_from_search' => true,
                    'show_ui'             => true,
                    'menu_icon'             => plugin_dir_url( __FILE__ ).'../assets/images/logo.png',
                    'has_archive'       => false,
                    'supports'          => array( 'title', 'editor', 'revisions', 'page-attributes' ),
                    'rewrite'           => array( 'with_front' => false )
                )
            ),
            'taxonomy' => array(
                'slug' => 'faq-category',
                'args' => array(
                    'labels' => array(
                        'name'                          => __( 'FAQ Categories',              'evdpl-faq' ),
                        'singular_name'                 => __( 'FAQ Category',                'evdpl-faq' ),
                        'search_items'                  => __( 'FAQ Search Categories',       'evdpl-faq' ),
                        'popular_items'                 => __( 'FAQ Popular Categories',      'evdpl-faq' ),
                        'all_items'                     => __( 'All FAQ Categories',          'evdpl-faq' ),
                        'parent_item'                   => null,
                        'parent_item_colon'             => null,
                        'edit_item'                     => __( 'Edit FAQ Category' ,                           'evdpl-faq' ),
                        'update_item'                   => __( 'Update FAQ Category',                          'evdpl-faq' ),
                        'add_new_item'                  => __( 'Add New FAQ Category',                         'evdpl-faq' ),
                        'new_item_name'                 => __( 'New FAQ Category Name',                        'evdpl-faq' ),
                        'separate_items_with_commas'    => __( 'Separate FAQ categories with commas',          'evdpl-faq' ),
                        'add_or_remove_items'           => __( 'Add or remove FAQ categories',                 'evdpl-faq' ),
                        'choose_from_most_used'         => __( 'Choose from the most used FAQ categories',     'evdpl-faq' ),
                        'menu_name'                     => __( 'FAQ Categories',                               'evdpl-faq' ),
                    ),
                    'public'                    => false,
                    'hierarchical'              => false,
                    'show_ui'                   => true,
                    'update_count_callback'     => '_update_post_term_count',
                    'query_var'                 => true,
                    'rewrite'                   => array( 'with_front' => false )
                )
            )
        );
        return apply_filters( 'evdpl_faq_defaults', $defaults );
    }
     function load_scripts() {
        wp_enqueue_script( 'evdpl-faq-js' );
        if( apply_filters( 'pre_register_evdpl_faq_jqui_css', true ) ) {
            global $wp_scripts;
            $ui = $wp_scripts->query( 'jquery-ui-core' );
            $css_args = apply_filters( 'evdpl_jqueryui_css_reg', array(
                'url' =>  $this->url . '../assets/css/themes/smoothness/jquery.ui.theme.css',
                'ver' => $this->version,
                'dep' => false
            ) );
            wp_enqueue_style( 'evdpl-faq', $this->url . '../assets/css/evdpl-faq.css', false, $this->version );
            wp_enqueue_style( 'jquery-ui-smoothness', $css_args['url'], $css_args['dep'], $css_args['ver'] );
        }
            wp_enqueue_style( 'evdpl-faq', $this->url . '../assets/css/evdpl-faq.css', false, $this->version );
     }
    function faq_shortcode( $atts, $content = null ) {
        
        $this->load_scripts();
        if( isset( $atts['showposts'] ) ) {
            if( $atts['showposts'] != "all" and $atts['showposts'] > 0 ) {
                $atts['posts_per_page'] = $atts['showposts'];
            }
        }
        $f = new Evdpl_FAQ_Display;
        return $f->loop( $atts );
    }
    function enq_scripts() {
       wp_register_script( 'evdpl-faq-js', $this->url . '../assets/js/evdpl-faq.js', array( 'jquery-ui-accordion' ), $this->version );
    }
    function enq_admin_scripts() {
        wp_enqueue_style( 'evdpl-faq-admin', $this->url . '../assets/css/admin.css', false, $this->version );
    }
    function columns_filter( $columns ) {
        $columns = array(
            "cb"            => '<input type="checkbox" />',
            "title"         => __( 'Title', 'evdpl-faq' ),
            "faq_content"   => __( 'Description', 'evdpl-faq' ),
            "faq_categories"=> __( 'Category', 'evdpl-faq' ),
            "faq_shortcode" => __( 'Shortcode', 'evdpl-faq' ),
            "date"          => __( 'Date', 'evdpl-faq' )
        );
        return $columns;
    }
    function column_action( $column ) {
        global $post;
        switch( $column ) {
            case "faq_content":
                the_excerpt();
                break;
            case "faq_categories":
                echo get_the_term_list( $post->ID, 'category', '', ', ', '' );
                break;
            case "faq_shortcode":
                printf( '[faq-accordion p=%d]', get_the_ID() );
                break;
            default:
                break;
        }
    }
    public function faq_admin_actions() {
    
        $faq_version_in_db = get_option( 'faq_version' ); 
        if ( $faq_version_in_db != $this->version ){
            update_option( 'faq_version', $this->version );
        }
        do_action ( 'faq_activate' );
    }
    public function faq_admin_menu () {
        do_action ('faq_add_submenu');
    }
}