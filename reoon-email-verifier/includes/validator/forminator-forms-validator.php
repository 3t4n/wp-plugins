<?php

namespace REOONENV\Validator;

use REOONENV\api\ReoonApi;
use REOONENV\util\Util;


class ForminatorFormsValidator
{
    function reoonev_validate_emails($submit_errors, $form_id, $field_data_array)
    {
        $email_key="";
        foreach ($_POST as $key => $value) {
            if (stripos($key, 'email') !== false ) {
                $email_key = $key;
                break;
            }
        }

        if($email_key)
        {
            if(isset($_POST[$email_key]))
            {
                $email = sanitize_email($_POST[$email_key]);
                $api = new ReoonApi();
                $validate = $api->ValidateEmail($email);

                if ($validate == false) {
                    $submit_errors[][ $email_key] =  Util::get_error_message();                
                }
            }
            
        }
        
        return $submit_errors;
    }
}
