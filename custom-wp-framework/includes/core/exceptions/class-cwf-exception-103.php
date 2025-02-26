<?php

namespace Custom_WP_Framework\Includes\Core\Exceptions;

/**
 * Custom exception if ID value field not defined.
 * 
 * @since   1.0.0
 */
class CWF_Exception_103 extends \Exception {

    public function __construct() {

        $this->code = 'CWF103';

        $this->message = __( 'ID value not valid.', CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN );
 
    }
}