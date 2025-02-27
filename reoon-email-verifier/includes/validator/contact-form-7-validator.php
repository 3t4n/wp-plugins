<?php

namespace REOONENV\Validator;

use REOONENV\api\ReoonApi;
use REOONENV\util\Util;


class ContactForm7Validator
{
    function reoonev_validate_emails($result, $tag)
    {

        
        if(isset($_POST[$tag->raw_name]))
        {
            $email = sanitize_email($_POST[$tag->raw_name]);
            

            $api = new ReoonApi();
            $validate = $api->ValidateEmail($email);

    
            if ($validate == false) {
                $result->invalidate( $tag, Util::get_error_message() );
            }
        }

      
      
        return $result;
        
    }
}
