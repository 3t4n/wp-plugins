<?php

namespace REOONENV\Validator;

use REOONENV\api\ReoonApi;
use REOONENV\util\Util;


class FluentFormsValidator
{
    function reoonev_validate_emails(  $default, $field, $formData, $fields, $form)
    {      
		$fieldName = $field['name'];
		if (empty($formData[$fieldName])) {
			return $default;
		}
		$email = $formData[$fieldName];


        $api = new ReoonApi();
        $validate = $api->ValidateEmail($email);

        if ($validate == false) {            
            return Util::get_error_message();            
        }

        return $default;
    }
}
