<?php

namespace REOONENV\Validator;

use REOONENV\api\ReoonApi;
use REOONENV\util\Util;


class WPFormsValidator
{
    function reoonev_validate_emails( $field_id, $field_submit, $form_data)
    {

        $email = $field_submit;

        $api = new ReoonApi();
        $validate = $api->ValidateEmail($email);

        if ($validate == false) {            
            wpforms()->process->errors[ $form_data['id'] ][ $field_id ] = Util::get_error_message();
            return;
        }

        
    }
}
