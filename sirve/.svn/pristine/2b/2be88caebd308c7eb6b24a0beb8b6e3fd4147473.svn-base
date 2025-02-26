<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
class HTSirve {
    const MINIMUM_PHP_VERSION = '7.0';
    
    private static $_instance = null;

    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        add_action('init', [$this, 'i18n' ]);
        add_action('plugins_loaded', [$this, 'init' ]);
        add_action('wp_enqueue_scripts', [$this,'assets_management']);
        
        // archive Page 
        if(get_option('sirve_use_theme_archive') != 'yes'){
            add_filter('archive_template', [$this, 'sirve_archive_modify']);
        }
        // Create List Template
        $this->templates = array();
        add_filter('theme_page_templates', [ $this, 'sirve_template' ]);
        add_filter('template_include', [$this, 'view_sirve_template']);
        $this->templates = ['sirve-full-width-page-template.php' => __('Sirve Full Width Page', 'sirve')];

        // Register New Listing Page
        register_activation_hook( SIRVE_PL_ROOT, [$this, 'sirve_insert_page_on_activation']);
    }

    public function i18n() {
        load_plugin_textdomain( 'sirve', false, dirname( plugin_basename( SIRVE_PL_ROOT ) ) . '/languages/' );
        
    }

    public function init() {

        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ]);
            return;
        }
        // Plugins Required File
        $this->includes();
    }

    public function admin_notice_minimum_php_version() {

        if ( isset( $_GET['activate']) ) unset( $_GET['activate']);
        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'sirve' ),
            '<strong>' . esc_html__( 'Sirve', 'sirve' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'sirve' ) . '</strong>',
             self::MINIMUM_PHP_VERSION
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    //Add List Template  
    public function sirve_template( $posts_templates ) {
		$posts_templates = array_merge( $posts_templates, $this->templates );
		return $posts_templates;
	}

    //List Template View  
    public function view_sirve_template( $template ) {
		// Get global post
		global $post;
		// Return template if post is empty
		if ( ! $post ) {
			return $template;
		}
		// Return default template if we don't have a custom one defined
		if ( ! isset( $this->templates[get_post_meta( $post->ID, '_wp_page_template', true )]) ) {
			return $template;
		} 
		$file = SIRVE_PL_FRONTEND.'/templates/'. get_post_meta( $post->ID, '_wp_page_template', true);
		// Just to be safe, we check if the file exist first
		if ( file_exists( $file ) ) {
			return $file;
		} else {
			echo esc_attr( $file );
		}
		// Return template
		return $template;
	}

    // Active Plugin Create new List Page
    function sirve_insert_page_on_activation() {
        
        if ( ! current_user_can( 'activate_plugins' ) ) return;
        $page_slug = 'sirve'; 
        $new_page = array(
            'post_type'     => 'page',              
            'post_title'    => esc_html__('Sirve Page','sirve'),    
            'post_content'  => '<!-- wp:shortcode -->[sirve_page]<!-- /wp:shortcode -->',  
            'post_status'   => 'publish',                                
            'post_name'     => $page_slug,
            'page_template' => 'sirve-full-width-page-template.php'
        );
        if (!get_page_by_path( $page_slug, OBJECT, 'page')) {
            wp_insert_post($new_page);
        }
    }
 
    /*
    * Assest Management
    */
    public function assets_management( $hook ){
        global $post;
        $elementor_editor_mode_check = false;
        if( class_exists( '\Elementor\Plugin' ) && ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) ){
            $elementor_editor_mode_check = true;
        }

        $sirve_queried_object =  get_queried_object();

        if ( ( is_object( $post ) && isset( $post->post_content ) && ( $elementor_editor_mode_check  || $post->post_type == 'sirve' || has_shortcode( $post->post_content, 'sirve_page' ) || has_shortcode( $post->post_content, 'sirve' ))) || isset($sirve_queried_object->taxonomy) && $sirve_queried_object->taxonomy == 'sirve_category') {
            //Sirve CSS
            wp_enqueue_style( 'sirve-css', SIRVE_PL_URL . 'assets/css/style.css', '', SIRVE_VERSION );
            wp_add_inline_style('sirve-css', sirve_coustom_css());
            wp_enqueue_style( 'dashicons' );
            //Sirve JS
            wp_enqueue_script( 'sirve-main', SIRVE_PL_URL . 'assets/js/main.js','', SIRVE_VERSION, TRUE );
            wp_enqueue_script( 'sirve-filter', SIRVE_PL_URL . 'assets/js/sirve-filter.js',array('jquery'), SIRVE_VERSION, TRUE );
            //Localize Scripts
            $localizeargs = array(
                'ajaxurl'           => admin_url( 'admin-ajax.php' ),
                'ajaxnonce'         => wp_create_nonce( 'sirve_itemsa_nonce' ),
            );
            wp_localize_script( 'sirve-filter', 'sirve', $localizeargs );   
        }
    }

    // Sirve archive Page
    public function sirve_archive_modify($archive) {
        global $post;
        $sirve_queried_object =  get_queried_object();
       
        /* Checks for archive template by post type */
        if ( !$post == null && $post->post_type == 'sirve' || isset($sirve_queried_object->taxonomy) && $sirve_queried_object->taxonomy == 'sirve_category') {
            if ( file_exists( SIRVE_PL_FRONTEND . 'archive-sirve.php' ) ) {
                return SIRVE_PL_FRONTEND . 'archive-sirve.php';
            }
        }
        return $archive;
    }
    

    public function includes() {
        require_once SIRVE_PL_PATH.'/include/class.sirve-filter.php';
        require_once SIRVE_PL_PATH.'/include/shortcodes.php';
        require_once SIRVE_PL_INCLUDE.'/sirve_post_render.php';
        require_once SIRVE_PL_INCLUDE.'/plugin_global_function.php';
    }
}