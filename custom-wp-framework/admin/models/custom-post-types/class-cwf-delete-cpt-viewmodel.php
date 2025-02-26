<?php

namespace Custom_WP_Framework\Admin\Models\Custom_Post_Types;

// Exit if accessed directly.
if ( ! defined ( 'ABSPATH' ) ) { 
	exit(); 
} 

// Load required classes.
use Custom_WP_Framework\Includes\Core\Custom_Post_Types\CWF_CPT;
use Custom_WP_Framework\Includes\Core\Exceptions;

/**
 * Viewmodel for deleting custom post types.
 * 
 * @since   1.0.0
 */
class CWF_Delete_CPT_ViewModel {

    /**
     * Custom post type array.
     * 
     * @since   1.0.0
     * @var     CWF_CPT       $cpt
     */
    public $cpt;

    /**
     * Whether custom post type(s) were successfully deleted.
     * 
     * @since   1.0.0
     * @var     bool        $success
     */
    public $success;

    /**
     * Default constructor.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function __construct() {

        /**
         * Create new instance of cpt;
         */
        $this->cpt = new CWF_CPT();

        /**
         * Initialise success flag and set to null. 
         */
        $this->success = null;

    }

    /**
     * Validate data of viewmodel.
     * 
     * @since   1.0.0
     * @param   void
     * @return  bool
     */
    public function validate() {

        /**
         * Check that data submitted.
         */
        if( empty( $_POST ) ) {

            /**
             * Throw exception if data not submitted.
             */
            throw new Exceptions\CWF_Exception_101();
        }

        /**
         * Verify WP nonce is valid.
         */
        if( ! isset( $_POST['cwf_delete_cpt_nonce_field'] ) 
            || ! wp_verify_nonce( $_POST['cwf_delete_cpt_nonce_field'], 'cwf_delete_cpt' ) ) {
            
            /**
             * Throw exception if nonce could not be verified. 
             */
            throw new Exceptions\CWF_Exception_102();
        }

        /**
         * Verify post type id is provided and valid format.
         */
        if ( ! isset( $_POST['cwf-cpt-id'] ) ) {

            /**
             * Throw exception if post type id is not provided.
             */
            throw new Exceptions\CWF_Exception_103();
        }

        return true;
    }
}