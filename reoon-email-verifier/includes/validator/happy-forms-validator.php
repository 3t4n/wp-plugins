<?php

namespace REOONENV\Validator;

use REOONENV\api\ReoonApi;
use REOONENV\util\Util;


class HappyFormsValidator
{
  function reoonev_validate_emails($validated_value, $part, $form, $request)
  {

    if ('email' !== $part['type']) {
      return $validated_value;
    }

    $form_id = $form["ID"];
    $email_field_id = $part["id"];
    $email = $request[$form_id . "_" . $email_field_id];


    if ($email) {

      $api = new ReoonApi();
      $validate = $api->ValidateEmail($email);

      if (false === $validate) {
        $validated_value = new \WP_Error(
          'error',
          Util::get_error_message()
        );
      }
    }


    return  $validated_value;
  }
}
