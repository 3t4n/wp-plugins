<?php

namespace REOONENV\Validator;

use REOONENV\api\ReoonApi;
use REOONENV\util\Util;


class NinjaFormsValidator
{
    function reoonev_validate_emails($form_data)
    {
        foreach ($form_data["fields"] as $f) {

            
            //email field
            if (stripos($f["key"], "email") !== false) {
                $email = $f["value"];

                $api = new ReoonApi();
                $validate = $api->ValidateEmail($email);

                if ($validate == false) {
                    $form_data['errors']['fields'][$f["id"]] = Util::get_error_message();
                }
            }
        }


        return $form_data;
    }
}
