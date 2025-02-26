
<?php

			$EMAIL_HEADER = "From: ".get_option('blogname')." <".get_option('admin_email').">\r\n";
			$EMAIL_HEADER .= "MIME-Version: 1.0\r\n";
			$EMAIL_HEADER .= "X-Priority: 1\r\n";
			$EMAIL_HEADER .= "X-MSmail-Priority: High\r\n";
			$SUBJECT="[".get_option('blogname')."] Your username and password (awreg)";
			$MESSAGE="Username: ".$user->user_login."\r\nPassword: ".$user_pass."\r\n".site_url("wp-login.php", 'login') . "\r\n";
            //  This is very likely superfluous.  Maybe could be used 
			// when registering for blog through the comment interface.
			//mail($user->user_email,$SUBJECT,$MESSAGE,$EMAIL_HEADER);
?>