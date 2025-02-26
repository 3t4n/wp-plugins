<?php

if(!class_exists('Glamour_Plugin')) {


class Glamour_Plugin {
    public static $instance = null;
    private $_editor;
    private $_css_file;
    private $_admin_bar;

    public function __clone() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'glamour' ), '1.0.0' );
    }
    
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'glamour' ), '1.0.0' );
    }

    private function __construct() {

        $this->init();
	}
    
    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        
		return self::$instance;
    }
    
    public function init(){
        $this->includes();
        
        add_action( 'admin_menu', array($this, 'about_page') );

        $this->_editor = new glamour\editor\Editor();
        $this->_css_file = new glamour\other\CSS_File();
        $this->_admin_bar = new glamour\other\Admin_Bar();
    }
    
    private function includes(){
        include_once GLMR_PATH . '/includes/other/class-prefixer.php';
        include_once GLMR_PATH . '/includes/other/functions.php';
        include_once GLMR_PATH . '/includes/other/abstract-class-base.php';
        include_once GLMR_PATH . '/includes/other/class-admin-bar.php';
        include_once GLMR_PATH . '/includes/editor/class-editor.php';
        include_once GLMR_PATH . '/includes/other/class-css-file.php';
    }

    public function about_page() {
        $about_page = add_menu_page(
            __( 'Glamour', 'glamour' ),
            'Glamour',
            'manage_options',
            'glamour',
            array($this, 'about_page_view'),
            'dashicons-admin-customizer',
            99
        );

        add_action( 'admin_head-' . $about_page, array($this, 'load_about_page_assets') );
    }

    public function load_about_page_assets(){
        wp_enqueue_style( 'glamour-admin-google-font', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400|Roboto:300,400');
    }

    public function about_page_view()
    {
        include GLMR_PATH . '/includes/other/about.php';
    }
}

Glamour_Plugin::instance();
}