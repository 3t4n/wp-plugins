<?php

namespace REOONENV\Validator;

use REOONENV\api\ReoonApi;
use REOONENV\util\Util;


class ElementorFormValidator
{
    function reoonev_validate_emails($field, $record, $ajax_handler)
    {
       
        if ( isset( $field['value'] ) )
        {
            $email = $field['value'];

            $api = new ReoonApi();
            $validate = $api->ValidateEmail($email);
    
            if ($validate == false) {
                
                $ajax_handler->add_error( $field['id'], Util::get_error_message() );
    
            }
        }
        
       

    }
}
