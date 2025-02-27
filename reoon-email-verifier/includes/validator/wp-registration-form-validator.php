<?php

namespace REOONENV\Validator;

use REOONENV\api\ReoonApi;
use REOONENV\util\Util;


class WPRegistrationFormValidator
{
    function reoonev_validate_emails($errors, $sanitized_user_login, $user_email )
    {

        

        $api = new ReoonApi();
        $validate = $api->ValidateEmail($user_email);


        if ($validate == false) {
            
            $errors->add( 'email_error', Util::get_error_message() );
        }

        return $errors;
        
    }
}
