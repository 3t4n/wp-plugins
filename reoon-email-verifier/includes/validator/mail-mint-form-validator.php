<?php

namespace REOONENV\Validator;

use REOONENV\api\ReoonApi;
use REOONENV\util\Util;


class MailMintFormsValidator
{
  function reoonev_validate_emails( $form_id, $contact)
  {

    
   
    $email = $contact->get_email();    
    if ($email) {

      $api = new ReoonApi();
      $validate = $api->ValidateEmail($email);

      if (false === $validate) {

        $response = array(
            'status'  => 'failed',
            'message' => Util::get_error_message(),
        );
        echo wp_json_encode( $response, true );
        die();


      }
    }

  }
}
