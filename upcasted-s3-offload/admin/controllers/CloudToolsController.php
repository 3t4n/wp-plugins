<?php

/**
 * Class CloudToolsController
 */
class CloudToolsController {
    public function upcasted_offload_connect() {
        try {
            // Verify the nonce for security
            if ( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'wp_rest' ) ) {
                wp_send_json_error( array(
                    'message' => __( 'Invalid nonce.', 'your-plugin-textdomain' ),
                ), 403 );
                return;
            }
            // Check user capabilities (optional but recommended for sensitive operations)
            if ( !current_user_can( 'manage_options' ) ) {
                wp_send_json_error( array(
                    'message' => __( 'Unauthorized action.', 'your-plugin-textdomain' ),
                ), 403 );
                return;
            }
            // Sanitize and encrypt the input values
            $accessKeyId = ( !empty( $_POST['access_key_id'] ) ? CloudCredentialsEncryption::getInstance()->encrypt( sanitize_text_field( wp_unslash( $_POST['access_key_id'] ) ) ) : null );
            $secretAccessKey = ( !empty( $_POST['secret_access_key'] ) ? CloudCredentialsEncryption::getInstance()->encrypt( sanitize_text_field( wp_unslash( $_POST['secret_access_key'] ) ) ) : null );
            $region = ( !empty( $_POST['region'] ) ? sanitize_text_field( wp_unslash( $_POST['region'] ) ) : null );
            $customEndpoint = ( !empty( $_POST['custom_endpoint'] ) ? sanitize_text_field( wp_unslash( preg_replace( "(^https?://)", "", $_POST['custom_endpoint'] ) ) ) : null );
            // Reinitialize the Cloud Application
            CloudApplication::destroy();
            $cloudApp = CloudApplication::getInstance(
                $accessKeyId,
                $secretAccessKey,
                $region,
                $customEndpoint
            );
            // Return the list of buckets
            wp_send_json_success( $cloudApp->cloudManipulator->get_buckets(), 200 );
        } catch ( Exception $exception ) {
            // Send a detailed error message in JSON format
            wp_send_json_error( array(
                'message' => sprintf( __( '<p>There was an error connecting to the object storage server:</p> 
                         <code>%s</code>
                         <p>Usually, if you get an error here you should double check:</p>
                         <ol>
                             <li>Check if your credentials are correct (Key and Secret)</li>
                             <li>Check if the region is correct</li>
                             <li>Check if your custom endpoint is correct. If you don\'t use AWS S3 then you should set a custom endpoint.</li>
                             <li>Check if the IAM user has full permissions over the bucket</li>
                         </ol>', 'your-plugin-textdomain' ), esc_html( $exception->getMessage() ) ),
            ), 500 );
        }
    }

    public function upcasted_init() {
        try {
            // Verify the nonce for security
            if ( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'wp_rest' ) ) {
                wp_send_json_error( array(
                    'message' => __( 'Invalid nonce.', 'upcasted-s3-offload' ),
                ), 403 );
                return;
            }
            // Check user capabilities (optional but recommended for sensitive operations)
            if ( !current_user_can( 'manage_options' ) ) {
                wp_send_json_error( array(
                    'message' => __( 'Unauthorized action.', 'upcasted-s3-offload' ),
                ), 403 );
                return;
            }
            // Sanitize and process the bucket name
            $bucket = ( isset( $_POST['bucket'] ) ? sanitize_text_field( wp_unslash( $_POST['bucket'] ) ) : null );
            if ( empty( $bucket ) ) {
                wp_send_json_error( array(
                    'message' => __( 'Bucket name is required.', 'upcasted-s3-offload' ),
                ), 400 );
                return;
            }
            // Initialize the CloudApplication with the provided bucket
            CloudApplication::getInstance()->upcasted_init( $bucket );
            // Send success response
            wp_send_json_success( __( 'Cloud application initialized successfully.', 'upcasted-s3-offload' ), 200 );
        } catch ( Exception $exception ) {
            // Handle exceptions and send an error response
            wp_send_json_error( array(
                'message' => sprintf( __( 'An error occurred during initialization: %s', 'upcasted-s3-offload' ), esc_html( $exception->getMessage() ) ),
            ), ( $exception->getCode() ?: 500 ) );
        }
    }

    public function upcasted_get_number_of_files() {
        try {
            wp_send_json( CloudApplication::getInstance()->upcasted_get_number_of_files( sanitize_post( $_POST['meta_type'] ) ), 200 );
        } catch ( Exception $exception ) {
            wp_send_json( $exception->getMessage(), $exception->getCode() );
        }
    }

}
