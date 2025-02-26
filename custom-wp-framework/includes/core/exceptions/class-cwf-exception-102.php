<?php

namespace Custom_WP_Framework\Includes\Core\Exceptions;

/**
 * Custom exception if nonce is invalid.
 * 
 * @since   1.0.0
 */
class CWF_Exception_102 extends \Exception {

    public function __construct() {

        $this->code = 'CWF102';

        $this->message = __( 'Security token could not be validated.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN );
    
    }
}