<?php
include 'dynapoll_rpc.php';

$site = $_SERVER["SERVER_NAME"];

if (count($_POST) > 0)
{
	// survey_vote, new_answer, submit_vote, submit_answer are the variables
	extract($_POST);
	$user_ip = $_SERVER["REMOTE_ADDR"];

	if (isset($submit_vote))
	{
		if (isset($survey_vote))
		{
			// SEND $survey_code
			// SEND user_ip
			// SEND $survey_vote TO REQUEST TO SUBMIT VOTE

			$f=new xmlrpcmsg('submit_vote', array(new xmlrpcval($survey_code, "string"),
												new xmlrpcval($survey_vote, "string"),
												new xmlrpcval($user_ip, "string"),
												new xmlrpcval($site, "string")));

			$returned_html = send_rpc_request($f);
		}
		else
		{
			// JUST DO NOTHING?
		}
	}
	else
	{
		if (trim($new_answer) !== '')
		{
			// SEND $new_answer, $spam_answer, $survey_code TO RPC TO SUBMIT NEW ANSWER

			$f=new xmlrpcmsg('submit_answer', array(new xmlrpcval($survey_code, "string"),
												new xmlrpcval($new_answer, "string"),
												new xmlrpcval($spam_answer, "string"),
												new xmlrpcval($spam_number_1, "string"),
												new xmlrpcval($spam_number_2, "string"),
												new xmlrpcval($user_ip, "string"),
                                                new xmlrpcval($site, "string")));

			$returned_html = send_rpc_request($f);
		}
		else
		{
			// DO SOMETHING HERE OR JUST IGNORE
		}

	}
}
?>
<?php echo $returned_html; ?>