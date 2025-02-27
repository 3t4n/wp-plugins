<?php

namespace REOONENV\Validator;

use REOONENV\api\ReoonApi;
use REOONENV\util\Util;
use FormidablePro\Library\Api\FormApi;

class FormiddableFormsValidator
{
    function reoonev_validate_emails($errors, $field, $value)
    {
          // Only validate email fields
    if ($field->type !== 'email') {
        return $errors;
    }


    $api = new ReoonApi();
    $result = $api->ValidateEmail($value);

    if($result==false)
    {
        $errors['field' . $field->id] = Util::get_error_message();
    }


    return $errors;
    }
}
