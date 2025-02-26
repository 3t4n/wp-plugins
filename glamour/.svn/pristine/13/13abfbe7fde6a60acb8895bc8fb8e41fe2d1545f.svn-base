<?php

namespace glamour\other;

class CSS_File extends \glamour\other\Base{
    const FILE_BASE_DIR = '/glamour/css/';

    private $post_id = '';

    private $_file = '';
    private $_global_file = '';

    private $_path = '';
    private $_global_path = '';

    private $_url = '';
    private $_global_url = '';

    private $_css = '';
    private $_global_css = '';

    private $_time = '';
    private $_global_time = '';

    function __construct() {
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue_css'), 999 );
    }

    public function enqueue_css() {
        
        $this->set_post_id();
        $this->set_url_path();
        $this->set_time();
        
        $type = isset($_GET['glmrtype']) ? sanitize_text_field( $_GET['glmrtype'] ) : false;

        if ( ! is_dir( dirname( $this->_path ) ) ) {
			wp_mkdir_p( dirname( $this->_path ) );
        }

        if(!$type || $type != 'single'){
            $this->enqueue_single();
        }

        if(!$type || $type != 'global'){
            $this->enqueue_global();
        }
    }

    public function enqueue_global() {
        if( file_exists( $this->_global_path ) ){
            wp_enqueue_style( 'glamour-global', $this->_global_url, array(), $this->_global_time );
        } else {
            $global_css = get_option( '_glamour_global_css', array() );
            $this->process_css_object($global_css, false);

            if ( !empty($this->_global_css) && wp_is_writable( dirname( $this->_global_path ) ) ) {
                $file_created = file_put_contents( $this->_global_path, $this->_global_css );

                if($file_created !== false){
                    $this->_global_time = time();
                    $this->update_option();
                    wp_enqueue_style( 'glamour-global', $this->_global_url, array(), $this->_global_time );
                }
            }
        }
    }

    public function enqueue_single() {
        $slug = (is_single() || is_page()) ? 'post-' . $this->post_id : $this->get_option_name();
    
        if( file_exists( $this->_path ) ){
            wp_enqueue_style( 'glamour-' . $slug, $this->_url, array(), $this->_time );
        } else {
            $single_css = $this->get_css_object();
            $this->process_css_object($single_css);

            if ( !empty($this->_css) && wp_is_writable( dirname( $this->_path ) ) ) {
                $file_created = file_put_contents( $this->_path, $this->_css );

                if($file_created !== false){
                    $this->_time = time();
                    $this->update_meta();
                    wp_enqueue_style( 'glamour-' . $slug, $this->_url, array(), $this->_time );
                }
            }
        }
    }

    public function update_meta(){
        if(is_single() || is_page()){
            update_post_meta( $this->post_id, '_glamour_css_time', $this->_time );
        } else {
            $option = $this->get_option_name();
            update_option( '_glamour_' .  $option . '_css_time', $this->_time );
        }
    }

    public function update_option() {
        update_option( '_glamour_global_css_time', $this->_global_time );
    }

    public function set_time() {
        if(is_single() || is_page()){
            $this->_time = get_post_meta( $this->post_id, '_glamour_css_time', true );
        } else {
            $option = $this->get_option_name();
            $this->_time = get_option( '_glamour_' .  $option . '_css_time', '' );
        }
        $this->_global_time = get_option( '_glamour_global_css_time', '' );
    }

    public function set_post_id() {
        global $wp_query;

        if (isset($wp_query->queried_object)) {
            $this->post_id = @$wp_query->queried_object->ID;
        } else {
            $this->post_id = get_the_ID();
        }
    }

    public function set_url_path(){
        $wp_upload_dir = wp_upload_dir( null, false );

        if(is_single() || is_page()){
            $this->_file = 'post-' . $this->post_id . '.css';
        } else {
            $option = $this->get_option_name();
            $this->_file = $option . '.css';
        }
        
        $this->_global_file = 'glamour.css';

        $this->_path = $wp_upload_dir['basedir'] . self::FILE_BASE_DIR . $this->_file;
        $this->_global_path = $wp_upload_dir['basedir'] . self::FILE_BASE_DIR . $this->_global_file;

        $this->_url = set_url_scheme($wp_upload_dir['baseurl'] . self::FILE_BASE_DIR . $this->_file);
        $this->_global_url = set_url_scheme($wp_upload_dir['baseurl'] . self::FILE_BASE_DIR . $this->_global_file);
    }

    public function process_css(){
        $single_css = $this->get_css_object();
        $this->process_css_object($single_css);

        $global_css = get_option( '_glamour_global_css', array() );
        $this->process_css_object($global_css, false);
    }

    private function process_css_object($css_values, $single = true){
        $prefixer = Glamour_Prefixer::instance();
        
        if(!empty($css_values) && is_array($css_values)){
            foreach($css_values as $selector => $css_media){
                if(!empty($css_media) && is_array($css_media)){
                    foreach($css_media as $media => $css_status){
                        if(!empty($css_status) && is_array($css_status)){
                            $css_string = '';

                            if($media != 'all'){
                                $media_list = $this->get_default_media();
                                $current_media = isset($media_list[$media]) && !empty($media_list[$media]) ? $media_list[$media] : false;

                                
                                if($current_media){
                                    $media_width_list = array();

                                    if(isset($current_media['min']) && !empty($current_media['min'])){
                                        $media_width_list[] = '(min-width: ' . $current_media['min'] . ')';
                                    }
                                    if(isset($current_media['max']) && !empty($current_media['max'])){
                                        $media_width_list[] = '(max-width: ' . $current_media['max'] . ')';
                                    }

                                    $css_string .= '@media ';
                                    $css_string .= implode(' and ',  $media_width_list);
                                    $css_string .= ' {';
                                }

                            }

                            foreach($css_status as $status => $css_props){
                                if(!empty($css_props) && is_array($css_props)){
                                    $css_status = ($status == 'normal') ? '' : ':' . $status;
                                    $css_string .= $selector . $css_status . '{';

                                    foreach($css_props as $prop => $css_value){
                                        $important = (isset($css_value['value']) && !empty($css_value['important']) && $css_value['important'] == 'true') ? ' !important' : '';
                                        $css_string .= (isset($css_value['value']) && !empty($css_value['value'])) ? $prefixer->prefix_it($prop, $css_value['value'], $important) : '';
                                    }

                                    $css_string .= '}';
                                }
                            }

                            if($media != 'all' && isset($current_media) && $current_media){
                                $css_string .= '}';
                            }

                            if($single){
                                $this->_css .= $css_string;
                            } else {
                                $this->_global_css .= $css_string;
                            }
                        }
                    }
                }
            }
        }
    }
    
    private function get_css_object(){
        if(is_single() || is_page()){
            return get_post_meta( $this->post_id, '_glamour_post_css', true );
        } else {
            $option = $this->get_option_name();
            return get_option( '_glamour_' . $option . '_css', array() );
        }
    }
}
