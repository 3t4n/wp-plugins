<?php
/*
Info
===============================================================
Plugin Name:  DJ EmailPublish
Plugin URI: http://blog.derjohng.com/dj-email-publish/
Description: Publish your article to other blog by email. Visit <a href=options-general.php?page=dj-email-publish/dj-email-publish.php>Options/Email Publish</a> after activation of the plugin.
Version: 1.7.2
Date: 2013/07/19
Author: Der-Johng Sun
Author URI: http://blog.derjohng.com/

License:
===============================================================
 Copyright 2013  Der-Johng Sun  (email : derjohng@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

add_action('admin_menu', 'dj_email_publish_config_page');

// let wordpress below 2.2  use this.
function dj_emailpublish_wp_mail_old_style($to, $subject, $message, $encoding, $publish_type)
{
    $target_message;
    switch ($publish_type)
	{
		case 'Full Text':
			$target_message    = $message[1];	
			break;
		case 'Title Only':
			$target_message    = $message[2];	
			break;
		default: // Summary
		    $target_message    = $message[0];	
		     break;
	}
	
	$sender = get_settings("admin_email");
	if ($encoding=='none')
	{
		 $headers = "MIME-Version: 1.0\r\n" .
					"From: $sender\r\n" . 
					"Content-Type: text/html; charset=". get_settings('blog_charset') ."\r\n";
	}
	else
	{
		// base64
		$headers = "MIME-Version: 1.0\r\n" .
					"From: $sender\r\n" . 
					"Content-Type: text/html; charset=". get_settings('blog_charset') ."\r\n" .
					"Content-Transfer-Encoding: BASE64\r\n";
		$subject = '=?'. get_settings('blog_charset') .'?B?'.base64_encode($subject).'?='; 
		$target_message = base64_encode($target_message);
	}
	
	mail($to,$subject,$target_message, $headers);
}

// modified from wp_mail and using phpmailer.
function dj_emailpublish_wp_mail($to, $subject, $message, $encoding, $publish_type) {
	if (!file_exists(ABSPATH . WPINC . '/class-phpmailer.php') || $encoding=="none" )
	{
		dj_emailpublish_wp_mail_old_style($to, $subject, $message, $encoding, $publish_type);
		return;
	}
	
	// the following only for wordpress 2.2 or above.
	global $phpmailer;

	if ( !is_object( $phpmailer ) ) {
		require_once(ABSPATH . WPINC . '/class-phpmailer.php');
		require_once(ABSPATH . WPINC . '/class-smtp.php');
		$phpmailer = new PHPMailer();
	}

	$phpmailer->CharSet = "utf-8"; // default is iso-8859-1, that cause some problems.
	$phpmailer->ClearAddresses();
	$phpmailer->ClearCCs();
	$phpmailer->ClearBCCs();
	$phpmailer->ClearReplyTos();
	$phpmailer->ClearAllRecipients();
	$phpmailer->ClearCustomHeaders();

	$phpmailer->From = get_settings("admin_email");
	$phpmailer->FromName = get_settings('blogname');
	$phpmailer->AddAddress("$to", "");
	$phpmailer->Subject = $subject;
	
	$phpmailer->Encoding = $encoding;
	$dj_typesel_name = array('Summary', 'Full Text', 'Title Only');
	switch ($publish_type)
	{
		case 'Full Text':
			$phpmailer->Body    = $message[1];	
			break;
		case 'Title Only':
			$phpmailer->Body    = $message[2];	
			break;
		default: // Summary
		    $phpmailer->Body    = $message[0];	
		     break;
	}
	
	$phpmailer->AltBody = str_replace("<br>", '', $phpmailer->Body);
	$phpmailer->AltBody = str_replace("<br />", '', $phpmailer->AltBody);
	
	
 	$phpmailer->IsHTML(true); // all are html email..

	$smtphost = get_option("dj-email-publish_smtphost");
	if ($smtphost!="")
	{
		$phpmailer->IsSMTP();
		$phpmailer->Host = $smtphost;
		$phpmailer->Port = get_option("dj-email-publish_smtpport");
		
		$smtp_user = get_option("dj-email-publish_smtpusername");
		if ($smtp_user!="")
		{
			$phpmailer->SMTPAuth = true;
			$phpmailer->Username = $smtp_user;
			$phpmailer->Password = get_option("dj-email-publish_smtppass");
			if (get_option("dj-email-publish_smtpsecure")!="none")
			{
				$phpmailer->SMTPSecure = get_option("dj-email-publish_smtpsecure");
			}
		}
	} else $phpmailer->IsMail(); // set mailer to use php mail()

	do_action_ref_array('phpmailer_init', array(&$phpmailer));

	$result = $phpmailer->Send();

	return $result;
}

function dj_email_publish_config_page() 
{
	global $wpdb;
	// according to Yarak, original path slash will not work in Windows.
	$page = preg_replace('!^.*[\\\\/]wp-content[\\\\/][^\\\\/]*plugins[\\\\/]!', '', __FILE__);
	$page = str_replace('\\', '/', $page);
	
	if ( function_exists('add_submenu_page') )
		add_submenu_page('options-general.php', __('Email Publish'), __('Email Publish'), 1, $page, 'dj_email_publish_conf');
}



function dj_email_publish_listoptions($index)
{
    $indexx = $index+1;
	
	$optionidx = "dj_email_publish_email".$index;

	echo "<tr>\n";
	echo "<td>Email #". $indexx .":</td>\n";

    // email address
    echo "<td><input name=\"email". $indexx . "\" type=\"text\" value=\"". get_option($optionidx) ."\" size=\"40\" /></td>\n";

    // select fulltext, summary or title.
	$dj_typesel_name = array('Summary', 'Full Text', 'Title Only');
	$typeselidx = "dj_email_publish_publishtype". $index;
	$typesel = "posttype". $indexx;
	
	echo "<td><select name=\"". $typesel ."\">\n";
	for ($i=0; $i<3; ++$i)
	{
		echo "<option name=\"". $dj_typesel_name[$i]."\" value=\"". $dj_typesel_name[$i]."\" ";
		if (get_option($typeselidx)==$dj_typesel_name[$i]) { echo "selected"; }
		echo " >". $dj_typesel_name[$i]."</option>\n";
	}
	echo "</select></td>\n";
	
	// select encode type.
	// check wordpress version. must > 2.2
	if (file_exists(ABSPATH . WPINC . '/class-phpmailer.php'))
	{
		$dj_encodingtype = array('base64', '8bit', '7bit', 'binary',  'quoted-printable', 'none');
		$dj_encodingtype_count = 6;
	}
	else
	{
		$dj_encodingtype = array('base64',  'none');
		$dj_encodingtype_count = 2;
	}
	$encodeidx = "dj_email_publish_encode".$index;
	$encodesel = "emailencodetype". $indexx;
	
	echo "<td><select name=\"". $encodesel ."\">\n";
	for ($i=0; $i<$dj_encodingtype_count; ++$i)
	{
		echo "<option name=\"". $dj_encodingtype[$i]."\" value=\"". $dj_encodingtype[$i]."\" ";
		if (get_option($encodeidx)==$dj_encodingtype[$i]) { echo "selected"; }
		echo " >". $dj_encodingtype[$i]."</option>\n";
	}
	echo "</select></td>\n";
	
	// end of table.
	echo "</tr>\n";
}
	
function dj_email_publish_conf()
{
	// get the submit event and save the options.
	if ( isset($_REQUEST['submit']) ) 
	{
		for ($i=0; $i<5; ++$i)
		{
			$ii = $i+1;
			$emailoption = "dj_email_publish_email".$i;
			$emailvalue  = "email".$ii;
			update_option($emailoption, $_REQUEST[$emailvalue]);
			
			$encodeoption =    "dj_email_publish_encode".$i;
			$encodevalue  = "emailencodetype".$ii;
			update_option($encodeoption, $_REQUEST[$encodevalue]);
			
			$typeoption =    "dj_email_publish_publishtype".$i;
			$typevalue  = "posttype".$ii;
			update_option($typeoption, $_REQUEST[$typevalue]);
		}
		
		// update smtp options..
		update_option("dj-email-publish_smtphost", $_REQUEST['smtp_host']);
		update_option("dj-email-publish_smtpport", $_REQUEST['smtp_port']);
		update_option("dj-email-publish_smtpusername", $_REQUEST['smtp_username']);
		update_option("dj-email-publish_smtppass", $_REQUEST['smtp_password']);
		update_option("dj-email-publish_smtpsecure", $_REQUEST['smtp_secure']); 
		
		print '<div style="background-color: rgb(207, 235, 247);" id="message" class="updated fade"><p><strong>Email Publish: Options saved.</strong></p></div>';
	}
	else
	{
		if (get_option("dj-email-publish_smtpport")=="")
		{
			update_option("dj-email-publish_smtpport", "25");
		}
	}

// dj_email_publish_conf() includes the following.
?>
<div class="wrap">
	<h2><?php _e('Email Publish') ?></h2>
	<form  method="POST" id="dj_email_publish-conf" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=dj-email-publish/dj-email-publish.php">
		<h3>Emails:</h3>
		<ul>
		<table>
		<tr><td></td><td>Email Address</td><td>Publish Type</td><td>Email Encoding</td></tr>
		<?php	for ($i=0; $i<5; ++$i) { dj_email_publish_listoptions($i); } ?>
		</table>
		</ul>
		<p>Note: Summary Publish Type means that if &lt;!--more--&gt; is existed,
		  then send the post as summary, else as fulltext. </p>
		
		<br />
		<h3>SMTP:</h3>
		<ul>
		<table>
		<tr><td>Hostname</td><td>Port</td><td>Username</td><td>Password</td></tr>
		<td><input name="smtp_host" type="text" value="<?php echo get_option("dj-email-publish_smtphost");?>" size=30 /></td>
		<td><input name="smtp_port" type="text" value="<?php echo get_option("dj-email-publish_smtpport");?>" size=10 /></td>
		<td><input name="smtp_username" type="text" value="<?php echo get_option("dj-email-publish_smtpusername");?>" size=30 /></td>
		<td><input name="smtp_password" type="password" value="<?php echo get_option("dj-email-publish_smtppass");?>" size=30 /></td>
		</table>
		
		<h4>SMTP Secure</h4>
		<?php 
			$ssoption=get_option("dj-email-publish_smtpsecure"); 
			if ($ssoption!="ssl" && $ssoption!="tls") $ssoption="none";
		?>
		<input type="radio" name="smtp_secure" value="none" <?php if (empty($ssoption)||$ssoption=="none") {echo "checked";}?>> none
		<input type="radio" name="smtp_secure" value="ssl" <?php if ($ssoption=="ssl") {echo "checked";}?>> ssl
		<input type="radio" name="smtp_secure" value="tls" <?php if ($ssoption=="tls") {echo "checked";}?>> tls
		
		<p> Note: Remain SMTP options blank if you send mail via local mail.</p> 
		<p> Note: Emails with "Email Encoding: none" option will not be supported via SMTP method.</p>
		 <p>
		  <input type="submit" name="submit" value="<?php _e('Update Email Publish Options &raquo;'); ?>" />
	     </p>
	</form>
</div>

<?php
} // end of dj_email_publish_conf..


function dj_email_publish($post_ID) 
{
	if ($post_ID<=0) return $post_ID;
	
    // avoid duplicate call.
	$checklastid = get_option("dj_email_publish_lastID");
	if ($checklastid == $post_ID) return $post_ID;
	
	$mypost = wp_get_single_post($post_ID, ARRAY_A);
	$mytitle = $mypost['post_title'];
	
	// get diff time
	$dj_email_publish_now = time();
	$dj_email_publish_posttime = strtotime($mypost['post_date_gmt']." GMT");
	$dj_email_publish_diff = $dj_email_publish_now -$dj_email_publish_posttime;
	
	if ($dj_email_publish_diff>60) return $post_ID;
	
	// status must be 'publish' 
	$publish_checkcheck = ( current_user_can('publish_posts') );
	if (!publish_checkcheck) return $post_ID;
	
	// check whether the post is password-protected, worked with Wordpress >2.7
	if ( !empty($mypost['post_password']) ) return $post_ID;

	
	// replace '-'
	// $mytitle = stripslashes(str_replace("-", " ", $mytitle));
	
	$subject = $mytitle;
	$name = get_settings('blogname');
	
	// 3 types message.
	$message = array();
	// summary..
	list($messagettt, $extend) = explode('<!--more-->', $mypost['post_content']);
	if (!empty($extend))
	{
		$message[0] = $messagettt . "<br />(&nbsp;<a href=\"". get_permalink($post_ID) . "\" target=_blank>More...</a>&nbsp;)<br />\n";
	}
	else
	{
		$message[0] = $mypost['post_content'] . "<br /><hr /> Orignal From: <a href=\"". get_permalink($post_ID) . "\" target=_blank>". $mytitle . "</a><br />\n";
	}
	
	// fully text.
	$message[1] = $mypost['post_content'];
	$message[1] = $message[1] . "<br /><hr /> Orignal From: <a href=\"". get_permalink($post_ID) . "\" target=_blank>". $mytitle . "</a><br />\n";
	
	// only title..
	$message[2] = "<a href=\"". get_settings('siteurl') . "\">". get_settings('blogname') . "</a> have new article <br /><br />\n";
	$message[2] = $message[2] . "Title: <a href=\"". get_permalink($post_ID) . "\">". $mytitle . "</a><br />\n";

			
	for ($i=0; $i<3; ++$i)
	{
		 $message[$i] = str_replace("\n", "<br />\n", $message[$i] );  // default will filter out <br>?
	}
	
	for ($i=0; $i<5; ++$i)
	{
		$recipient = get_option("dj_email_publish_email".$i);
		$publish_type =  get_option("dj_email_publish_publishtype".$i);
		$encode = get_option("dj_email_publish_encode". $i);
		
		if(!empty($recipient)) 
		{
			dj_emailpublish_wp_mail($recipient, $subject, $message, $encode, $publish_type);
		}
	}
	
	// avoid duplicate call.
	update_option('dj_email_publish_lastID', $post_ID);
	
	return $post_ID;
}

add_action('publish_post', 'dj_email_publish', 1);

?>
