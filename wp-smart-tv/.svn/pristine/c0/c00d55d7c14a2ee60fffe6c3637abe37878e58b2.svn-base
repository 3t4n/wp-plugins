<?php

class Wp_Smart_Tv_licenses {
    
    public function __construct() {
        if (defined('WPSTV_LIC_ACT')) {
            $this->build_license_page();
        }
    }
    
    public function build_license_page() {
        $prefix = 'wpstv_license_';
        
        $args = array(
            'id'           => 'wpstv_license',
            'title'        => esc_html__( 'Licenses', 'wp-smart-tv' ),
            'menu_title'   => esc_html__( 'License Manager', 'wp-smart-tv' ),
            //'capability'   => 'manage_options',
            'object_types' => array( 'options-page' ),
            'option_key'      => 'wpstv_license',
            'parent_slug'  => 'rovidx_smart_tv_options',
            'tab_group'    => 'rovidx_smart_tv_options',
            'tab_title'    => 'License Manager',
        );
        
        $cmb = new_cmb2_box( $args );
    }  
}