<?php

namespace Custom_WP_Framework\Includes\Core\Exceptions;

// Exit if accessed directly.
if ( ! defined ( 'ABSPATH' ) ) { 
	exit(); 
} 

/**
 * Custom exception for when no request data is received.
 * 
 * @since   1.0.0
 */
class CWF_Exception_101 extends \Exception {

    public function __construct() {

        $this->code = 'CWF101';

        $this->message = __( 'No data submitted.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN );
    
    }
}