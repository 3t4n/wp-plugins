<?php

namespace REOONENV\Validator;

use REOONENV\api\ReoonApi;
use REOONENV\util\Util;


class WCCheckoutFormValidator
{
    function reoonev_validate_emails()
    {
        $email = sanitize_email($_POST['billing_email']);

        $api = new ReoonApi();
        $validate = $api->ValidateEmail($email);

        if ($validate == false) {
            wc_add_notice( Util::get_error_message(), 'error' );
        }

    }
}
