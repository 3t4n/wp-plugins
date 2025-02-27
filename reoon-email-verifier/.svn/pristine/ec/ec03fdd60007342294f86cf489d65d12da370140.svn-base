<?php

namespace REOONENV\Validator;

use REOONENV\api\ReoonApi;
use REOONENV\util\Util;


class GravityFormsValidator
{
    function reoonev_validate_emails($validation_result)
    {
        $form = $validation_result['form'];        
        

        // Loop through all form fields
        foreach ($form['fields'] as &$field) {

            // Check if the field type is email
            if ($field->type == 'email') {

                // Get the email address
                $email = rgpost('input_' . $field->id);

                $api = new ReoonApi();
                $result = $api->ValidateEmail($email);

                // Check the email validation status
                if ($result == false) {
                    $validation_result['is_valid'] = false;
                    $field->failed_validation = true;
                    $field->validation_message = Util::get_error_message();
                }
            }
        }

        return $validation_result;
    }
}
