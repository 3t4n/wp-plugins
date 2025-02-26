<?php

namespace glamour\editor;

class Editor extends \glamour\other\Base{
    const FILE_BASE_DIR = '/glamour/css/';
    
    public function __construct() {
        add_action ('template_include', array($this, 'glamour_handle_actions'), 999);
        add_action ('wp_footer', array($this, 'load_editor_assets'));
        add_action( 'wp_enqueue_scripts', array($this, 'frame_assets') );

        add_action( 'wp_ajax_glamour_save_css_data', array($this, 'glamour_save_css_data') );
        add_action( 'wp_ajax_glamour_clear_css_cache', array($this, 'glamour_clear_css_cache') );
    }

    public function glamour_handle_actions($template){
        if( isset($_GET['glamour']) && $_GET['glamour'] == 'edit'  && is_user_logged_in() && current_user_can('manage_options') ){
            show_admin_bar( false );
            $template = GLMR_PATH . '/includes/editor/editor-view.php';
        }

        return $template;
    }

    public function load_editor_assets(){
        global $wp_query;

        if(isset($_GET['glamour']) && $_GET['glamour'] == 'edit'  && is_user_logged_in() && current_user_can('manage_options')){
            $min = '.min';

            if(defined('GLAMOUR_DEBUG') && GLAMOUR_DEBUG){
                $min = '';
            }

            wp_enqueue_media();
            wp_enqueue_script( 'react', GLMR_URL . 'assets/js/react'.$min.'.js', array(), true );
            wp_enqueue_script( 'react-dom', GLMR_URL . 'assets/js/react-dom'.$min.'.js', array(), true );
            wp_enqueue_script( 'glamour-editor', GLMR_URL . 'assets/js/glamour-editor'.$min.'.js', array(), true );

            $mode = isset($_GET['glmrmode']) && !empty($_GET['glmrmode']) ? sanitize_text_field( $_GET['glmrmode'] ) : 'global';

        
            if (isset($wp_query->queried_object)) {
                $post_id = @$wp_query->queried_object->ID;
            } else {
                $post_id = get_the_ID();
            }

            $glamour_settings = array(
                'ajax_url' => admin_url( 'admin-ajax.php' ),
                'fonts' => get_option( 'glamour_google_fonts', array() ),
                'nonce' => wp_create_nonce( 'glamour_nonce' ),
                'pageUrl' => esc_url( glamour_get_iframe_url(true) ),
                'mode' => $mode,
                'media' => get_option( '_glamour_media_list', $this->get_default_media() ),
                'styles' => $this->get_style_data($mode),
                'meta' => (is_single() || is_page()) && $mode == 'single',
                'postid' => $post_id,
                'option' => $this->get_option_name(),
                'homeUrl' => home_url(),
                'colors' => get_option( '_glamour_colors', $this->get_default_color() ),
            );
            wp_localize_script( 'glamour-editor', 'glmrSettings ', $glamour_settings );
        }

        if(isset($_GET['glmr']) && $_GET['glmr'] == 'yes'  && is_user_logged_in() && current_user_can('manage_options')){
            ?>
            <div class="glamour-container" id="glamour-container"></div>
            <?php
        }
    }

    public function frame_assets() {
        if(isset($_GET['glmr']) && $_GET['glmr'] == 'yes'  && is_user_logged_in() && current_user_can('manage_options')){
            $min = '.min';

            if(defined('GLAMOUR_DEBUG') && GLAMOUR_DEBUG){
                $min = '';
            }

            wp_enqueue_style( 'glamour-frame', GLMR_URL . 'assets/css/glamour-frame' . $min . '.css' );
        }
    }

    public function glamour_save_css_data() {
        if(! isset( $_POST['nonce'] ) ){
            wp_send_json_error( 'Invalid nonce' );
            die();
        }
        if ( isset( $_POST['nonce'] ) && ! wp_verify_nonce( sanitize_key( $_POST['nonce'] ), 'glamour_nonce' ) ) {
            wp_send_json_error( 'Invalid nonce' );
            die();
        }

        $data = (isset($_POST['css']) && !empty($_POST['css'])) ? $_POST['css'] : array();
        $type = (isset($_POST['type']) && !empty($_POST['type'])) ? sanitize_text_field( $_POST['type'] ) : 'global';
        $saveToMeta = (isset($_POST['meta']) && !empty($_POST['meta'])) ? (int) $_POST['meta'] : 0;
        $optionName = (isset($_POST['option']) && !empty($_POST['option'])) ? sanitize_text_field( $_POST['option'] ) : '';
        $postId = (isset($_POST['postid']) && !empty($_POST['postid'])) ? (int) $_POST['postid'] : 0;
        $colors = (isset($_POST['colors']) && !empty($_POST['colors'])) ? $_POST['colors'] : array();

        $status = false;
        $color_status = false;
        $file = '';

        $color_status = update_option( '_glamour_colors', $colors );

        if( $type == 'global'){
            $status = update_option( '_glamour_global_css', $data );
            $file = 'glamour.css';
        } else if($saveToMeta && $postId){
            $status = update_post_meta( $postId, '_glamour_post_css', $data );
            $file = 'post-' . $postId . '.css';
        } else if($optionName){
            $status = update_option( '_glamour_' . $optionName . '_css', $data );
            $file = $optionName . '.css';
        } else {
            wp_send_json_error( 'Some data missing' );
		    wp_die();
        }

        if($status || $color_status){
            $this->delete_css_file($file);
            wp_send_json_success( 'Success!' );
            wp_die();
        } else {
            wp_send_json_error( 'Unknown error!' );
            wp_die();
        }
    }

    public function delete_css_file( $file ) {
        $wp_upload_dir = wp_upload_dir( null, false );
        $path = $wp_upload_dir['basedir'] . '/glamour/css/' . $file;
		if ( file_exists( $path ) ) {
			unlink( $path );
		}
    }
    
    public function get_style_data($mode) {
        global $wp_query;

        if($mode == 'global'){
            return get_option( '_glamour_global_css', array() );
        } else {
            if(is_single() || is_page()){
                if (isset($wp_query->queried_object)) {
                    $post_id = @$wp_query->queried_object->ID;
                } else {
                    $post_id = get_the_ID();
                }
                $css = get_post_meta( $post_id, '_glamour_post_css', true );
                if(empty($css)){
                    $css = array();
                }
                return $css;
            } else {
                $option = $this->get_option_name();

                return get_option( '_glamour_' . $option . '_css', array() );
            }
        }
    }

    public function glamour_clear_css_cache(){
        if(!isset( $_POST['nonce'] )){
            wp_send_json_error( 'Invalid nonce' );
            die();
        }

        if ( isset( $_POST['nonce'] ) && ! wp_verify_nonce( sanitize_key( $_POST['nonce'] ), 'glamour_nonce' ) ) {
            wp_send_json_error( 'Invalid nonce' );
            die();
        }

        $wp_upload_dir = wp_upload_dir( null, false );

        $dir = $wp_upload_dir['basedir'] . self::FILE_BASE_DIR;

        global $wp_filesystem;

        $status = $wp_filesystem->rmdir($dir, true);

        if($status){
            wp_send_json_success( 'Error!' );
        } else {
            wp_send_json_error( 'Success!' );
        }
    }
}