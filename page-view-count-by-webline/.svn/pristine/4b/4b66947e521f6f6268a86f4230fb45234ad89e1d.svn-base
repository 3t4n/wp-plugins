<?php

class adminAssets {

    private $jsHandler = 'page-view-data';
    
    public function __construct() {
        add_action('admin_enqueue_scripts', array($this, 'addJS'));
        add_action('admin_head', array($this, 'addCSS'));
    }
    
    public function addJS () {
        wp_register_script('view-count-date-range', VC_URL.'/admin/assets/js/date-range.js', array('jquery-ui-datepicker'));
        wp_register_script($this->jsHandler, VC_URL.'/admin/assets/js/page-view.js', array('view-count-date-range'));
        wp_enqueue_script( 'install-pvbw-js', VC_URL.'/admin/assets/js/install-plugin-pvbw.js',array('jquery'), '', true );
        add_thickbox();
    }
    
    public function addCSS () {
        wp_enqueue_style('date-range-css', VC_URL.'/admin/assets/css/date-range.css');
        wp_enqueue_style('pvbw-jquery-ui', VC_URL.'/admin/assets/css/jquery-ui.css');
        wp_enqueue_style('pvbw-css', VC_URL.'/admin/assets/css/style.css');
        wp_enqueue_style('view-count-admin-css', VC_URL.'/admin/assets/css/pvbw-admin-notices.css');
    }
    
    public function enqueueAssets () {
        
        wp_enqueue_script( 'jquery-ui-datepicker' );
        wp_enqueue_script( 'view-count-date-range' );   
        wp_enqueue_script( $this->jsHandler );
        wp_localize_script( $this->jsHandler, 'pageViewData', array('ajaxurl'=>admin_url( 'admin-ajax.php' )));
    }
}

$adminAssets = new adminAssets();