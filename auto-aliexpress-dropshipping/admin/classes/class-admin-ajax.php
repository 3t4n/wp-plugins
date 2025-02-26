<?php
/**
 * Auto_Aliexpress_Admin_AJAX Class
 *
 * @since  1.0.0
 * @package Auto Aliexpress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Auto_Aliexpress_Admin_AJAX' ) ) :

class Auto_Aliexpress_Admin_AJAX {

    /**
     * Auto_Aliexpress_Admin_AJAX constructor.
     *
     * @since 1.0
     */
    public function __construct() {

        // WP Ajax Actions.
        add_action( 'wp_ajax_auto_aliexpress_save_campaign', array( $this, 'save_campaign' ) );
        add_action( 'wp_ajax_auto_aliexpress_run_campaign', array( $this, 'run_campaign_action' ) );
        add_action( 'wp_ajax_auto_aliexpress_select_integration', array( $this, 'select_integration' ) );
        add_action( 'wp_ajax_auto_aliexpress_save_api_data', array( $this, 'save_api_data' ) );
        add_action( 'wp_ajax_auto_aliexpress_generate_campaign', array( $this, 'generate_campaign' ) );


    }

    /**
     * Generate Campaign
     *
     * @since 1.0.0
     */
    public function generate_campaign() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( ! wp_verify_nonce($_POST['_ajax_nonce'], 'auto-aliexpress') ) {
            wp_send_json_error( __( 'You are not allowed to perform this action', Auto_Aliexpress::DOMAIN ) );
        }

        if ( isset( $_POST['fields_data'] ) ) {

            $fields  = $_POST['fields_data'];
            $form_model = new Auto_Aliexpress_Custom_Form_Model();
            $status = Auto_Aliexpress_Custom_Form_Model::STATUS_PUBLISH;

            // Default update frequency is 60 minutes
            $default_update_frequency = 5;
            $default_update_frequency_unit = 'Minutes';

            // Sanitize settings
            $settings = $fields;

            // Campaign Next Run Time
            $time_length = auto_aliexpress_calculate_next_time($default_update_frequency, $default_update_frequency_unit);
            $settings['next_run_time'] = time() + $time_length;

            $settings['aliexpress_selected_source'] = 'search';
            $settings['update_frequency'] = $default_update_frequency;
            $settings['update_frequency_unit'] = $default_update_frequency_unit;

            // Set Settings to model
            $form_model->settings = $settings;

            // status
            $form_model->status = $status;

            // Save data
            $id = $form_model->save();

            if (!$id) {
                wp_send_json_error( $id );
            }else{
                wp_send_json_success( $id );
            }

        } else {

            wp_send_json_error( __( 'User submit data are empty!', Auto_Aliexpress::DOMAIN ) );
        }


    }

    /**
     * Run Campaign
     *
     * @since 1.0.0
     */
    public function run_campaign_action() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( ! wp_verify_nonce($_POST['_ajax_nonce'], 'auto-aliexpress') ) {
            wp_send_json_error( esc_html__( 'You are not allowed to perform this action', Auto_Aliexpress::DOMAIN ) );
        }

        if ( isset( $_POST['fields_data'] ) ) {

            $fields  = $_POST['fields_data'];
            $id      = isset( $fields['campaign_id'] ) ? $fields['campaign_id'] : null;
            $id      = intval( $id );
            if ( !is_null( $id ) || $id > 0 ) {
                $model = Auto_Aliexpress_Custom_Form_Model::model()->load( $id );
            }

            if($model){
              $result = $model->run_campaign();
              wp_send_json_success( $result );
            }else{
              wp_send_json_error( esc_html__( 'Campaign not defined!', Auto_Aliexpress::DOMAIN ) );
            }

        } else {
            wp_send_json_error( esc_html__( 'User submit data are empty!', Auto_Aliexpress::DOMAIN ) );
        }



    }

    /**
     * Save Campaign
     *
     * @since 1.0.0
     */
    public function save_campaign() {

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( ! wp_verify_nonce($_POST['_ajax_nonce'], 'auto-aliexpress') ) {
            wp_send_json_error( esc_html__( 'You are not allowed to perform this action', Auto_Aliexpress::DOMAIN ) );
        }

        if ( isset( $_POST['fields_data'] ) ) {

            $fields  = $_POST['fields_data'];
            $id      = isset( $fields['campaign_id'] ) ? $fields['campaign_id'] : null;
            $id      = intval( $id );
            $title   = sanitize_text_field( $fields['aliexpress_campaign_name'] );
            $status  = isset( $fields['campaign_status'] ) ? sanitize_text_field( $fields['campaign_status'] ) : '';

            if ( is_null( $id ) || $id <= 0 ) {
                $form_model = new Auto_Aliexpress_Custom_Form_Model();
                $action     = 'create';

                if ( empty( $status ) ) {
                    $status = Auto_Aliexpress_Custom_Form_Model::STATUS_DRAFT;
                }
            } else {
                $form_model = Auto_Aliexpress_Custom_Form_Model::model()->load( $id );
                $action     = 'update';

                if ( ! is_object( $form_model ) ) {
                    wp_send_json_error( esc_html__( "Form model doesn't exist", Auto_Aliexpress::DOMAIN ) );
                }

                if ( empty( $status ) ) {
                    $status = $form_model->status;
                }

            }

            // Sanitize settings
            $settings = auto_aliexpress_sanitize_field( $fields );

            // Campaign Next Run Time
            $time_length = auto_aliexpress_calculate_next_time($fields['update_frequency'], $fields['update_frequency_unit']);
            $settings['next_run_time'] = time() + $time_length;

            // Set Settings to model
            $form_model->settings = $settings;

            // status
            $form_model->status = $status;

            // Save data
            $id = $form_model->save();

            if (!$id) {
                wp_send_json_error( $id );
            }else{
                wp_send_json_success( $id );
            }

        } else {

            wp_send_json_error( esc_html__( 'User submit data are empty!', Auto_Aliexpress::DOMAIN ) );
        }

    }

    /**
 * Select Integration
 *
 * @since 1.0.0
 */
    public function select_integration() {

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( ! wp_verify_nonce($_POST['_ajax_nonce'], 'auto-aliexpress') ) {
            wp_send_json_error( esc_html__( 'You are not allowed to perform this action', Auto_Aliexpress::DOMAIN ) );
        }

        if ( isset( $_POST['template'] ) ) {
            $template = auto_aliexpress_load_popup($_POST['template']);
            wp_send_json_success( $template );
        }

    }

    /**
     * Save API Data
     *
     * @since 1.0.0
     */
    public function save_api_data() {

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( ! wp_verify_nonce($_POST['_ajax_nonce'], 'auto-aliexpress') ) {
            wp_send_json_error( esc_html__( 'You are not allowed to perform this action', Auto_Aliexpress::DOMAIN ) );
        }


        if ( isset( $_POST['fields_data'] ) ) {
            // Sanitize api data
            $api_data = auto_aliexpress_sanitize_field( $_POST['fields_data'] );
            auto_aliexpress_save_addon_data($api_data);
            $message = '<strong>' . $api_data['slug'] . '</strong> ' . esc_html__( 'has been connected successfully.' );

            wp_send_json_success( $message );
        }else {
            wp_send_json_error( esc_html__( 'User submit data are empty!', Auto_Aliexpress::DOMAIN ) );
        }

    }


}

endif;
