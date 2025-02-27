<?php

namespace REOONENV\Validator;

use REOONENV\api\ReoonApi;
use REOONENV\util\Util;


class BestWebsoftFormsValidator
{
  function reoonev_validate_emails()
  {

    global $cntctfrm_error_message;

    // if wp-login.php is been called for login to dashboard, skip the check.
    if ($_SERVER['REQUEST_URI'] == '/wp-login.php' || $_SERVER['REQUEST_URI'] == '/wp-login.php?loggedout=true')
      return true;

    if (!empty($_POST['cntctfrm_contact_email']) && $_POST['cntctfrm_contact_email'] != '') {
      $email = sanitize_email($_POST['cntctfrm_contact_email']);
      if ($email != '') {
        $api = new ReoonApi();
        $validate = $api->ValidateEmail($email);

        if (false === $validate) {
          $feedback['is_valid'] = false;
          $cntctfrm_error_message['error_email'] =  Util::get_error_message();
        }
      }
    }    
    if (isset($entry['email'])) {
      $email = $entry['email'];
    }

    return $cntctfrm_error_message;
  }
}
