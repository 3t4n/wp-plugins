<?php

namespace REOONENV\Validator;

use REOONENV\api\ReoonApi;
use REOONENV\util\Util;


class WPCommentFormValidator
{
	function reoonev_validate_emails($commentdata)
	{
		$user_email = isset($commentdata['comment_author_email']) ? $commentdata['comment_author_email'] : "";

		if ($user_email) {
			$api = new ReoonApi();
			$validate = $api->ValidateEmail($user_email);

			if ($validate == false) {
				// Ensure the error message is escaped to prevent XSS vulnerabilities
				wp_die(esc_html(Util::get_error_message()));
			}
		}
	}
}
