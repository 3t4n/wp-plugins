<?php

namespace Pixelavo;

/* Exit if accessed directly */
if (!defined('ABSPATH')) {
    exit;
}

class PixelAjaxEventsData{
    
    private static $_instance = null;

    /**
     * Instance.
     * Initializes a singleton instance.
     * @return self class
     */
    static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    function __construct() {

        if(!pixelavo_check_exclude_roles()) {
            /** Ajax Events */
            add_action('wp_ajax_pixelavo_event', [$this, 'pixelavo_ajax_event']);
            add_action('wp_ajax_nopriv_pixelavo_event', [$this, 'pixelavo_ajax_event']);
            /** Ajax Events */
            add_action('wp_ajax_pixelavo_get_form_title', [$this, 'get_form_title']);
            add_action('wp_ajax_nopriv_pixelavo_get_form_title', [$this, 'get_form_title']);
        }
        
    }

    
    /**
     * Pixelavo ajax event.
     * Ajax call for pixelavo events.
     * @return void
     */
    function pixelavo_ajax_event() {
        check_ajax_referer('pixelavo_ajax_event_nonce', 'nonce');
        $event_name = sanitize_text_field($_POST['event_name']);
        $event_id = sanitize_text_field($_POST['event_id']);    
        $data = pixelavo_data_clean($_POST['data']);

        pixelavo_run_conversions_api($event_name, $data, $event_id);
        wp_send_json_success( [
            "data" => $data,
            "message" => sprintf( esc_html__( '%s server event run successfully', 'pixelavo' ), $event_name)
        ] );
        wp_die();
    }


    function get_form_title() {
        check_ajax_referer('pixelavo_ajax_event_nonce', 'nonce');
        $form_id = intval(sanitize_text_field($_POST['formId']));
        $form_name = sanitize_text_field($_POST['form']);
        $form_title = '';
        if($form_name === 'cf7') {
            $form = get_post($form_id);
            if ($form && 'wpcf7_contact_form' === $form->post_type) {
                $form_title = $form->post_title;
            }
        }

        if($form_name === 'wpform') {
            $form = wpforms()->form->get($form_id);
            if ($form) {
                $form_title = $form->post_title;
            }
        }

        if($form_name === 'fluentform') {
            $form = wpFluent()->table('fluentform_forms')->find($form_id);
            if ($form) {
                $form_title = $form->title;
            }
        }
        
        wp_send_json_success( $form_title);
        wp_die();
    }

}

/**
 * Initialize PixelAjaxEventsData Class
 */
PixelAjaxEventsData::instance();
