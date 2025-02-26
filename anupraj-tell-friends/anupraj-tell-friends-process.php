<?php


include("../../../wp-load.php");

if ($_SERVER['REQUEST_METHOD'] != 'POST') exit; // Quit if it is not a form post

// quick way clean up incoming fields
foreach($_POST as $key => $value) $_POST[$key] = urldecode(trim($value));

// get form data
$name    = $_POST['sender_name'];
$email   = $_POST['sender_email'];
$SMSmessage = $_POST['message'];// I made this plugin for SelectedSMS.Com at first ;)
$code    = $_POST['code'];
$to      = $_POST['input_emails'];
$ARTFsendcopy = $_POST['ARTFsendcopy'];
$errors  = array(); // array of errors

// basic validation
if ($name == '') {
  $errors[] = "Please enter your name";
}
$email = trim($email);
if (!is_email($email,$check_dns)) {
  $errors[] = "Please enter Your valid email address";
}

// verify email by checking DNS. This may slow down the server.
if(get_option('ARTFcheck_dns')==true){$check_dns = true;}else{$check_dns = false;}

// Note : $to has spaces & comma/colon
$to = str_replace(" ","",$to);
$to = str_replace(";","<br />\n",$to);
$to = str_replace(",","<br />\n",$to);

if(strlen($to)<1){
	$errors[]="Don't leave recipient field blank";
}elseif(strpos($to, ',') == true){
	foreach(explode(",",$to) as $eachto){if(!is_email($eachto,$check_dns)){$errors[] = "$eachto is not valid email address";
		}
	}
}else{
	if(!is_email($to,$check_dns)){$errors[] = "$to is not valid email address";}
}

if (sizeof($errors) > 0) {
  // if errors, send the error message
  $str = implode("\n", $errors);
  die("Error!  Please correct the following:\n\n" . $str);
}

if($SMSmessage==""){
	$SMSmessage = "Hi!
I just found this page.
I believe the contents of the page is useful to view.
Thanks";
}

function validip($ip) {
   if (!empty($ip) && ip2long($ip)!=-1) {
       $reserved_ips = array (array('0.0.0.0','2.255.255.255'),array('10.0.0.0','10.255.255.255'),array('127.0.0.0','127.255.255.255'),array('169.254.0.0','169.254.255.255'),array('172.16.0.0','172.31.255.255'),array('192.0.2.0','192.0.2.255'),array('192.168.0.0','192.168.255.255'),array('255.255.255.0','255.255.255.255'));
       foreach ($reserved_ips as $r) {$min = ip2long($r[0]);$max = ip2long($r[1]);if ((ip2long($ip) >= $min) && (ip2long($ip) <= $max)){ return false;}}
       return true;
   }else{return false;}
}

function getip() {
   if (validip($_SERVER["HTTP_CLIENT_IP"])) {return $_SERVER["HTTP_CLIENT_IP"];}
   foreach(explode(",",$_SERVER["HTTP_X_FORWARDED_FOR"]) as $ip){if (validip(trim($ip))){return $ip;}}
   if(validip($_SERVER["HTTP_X_FORWARDED"])){return $_SERVER["HTTP_X_FORWARDED"];}
	elseif(validip($_SERVER["HTTP_FORWARDED_FOR"])){return $_SERVER["HTTP_FORWARDED_FOR"];}
	elseif(validip($_SERVER["HTTP_FORWARDED"])) {return $_SERVER["HTTP_FORWARDED"];}
	elseif(validip($_SERVER["HTTP_X_FORWARDED"])){return $_SERVER["HTTP_X_FORWARDED"];}
	else{return $_SERVER["REMOTE_ADDR"];}
}

if(get_option('ARTF_admin_email')==""){$ARTF_admin_email = get_option('admin_email');}else{$ARTF_admin_email = get_option('ARTF_admin_email');}
if(get_option('ARTF_blog_name')==""){$ARTF_blog_name = get_option('blogname');}else{$ARTF_blog_name = get_option('ARTF_blog_name');}
$ipz = getip();

$ARTFbcc = get_option('ARTFbcc');
if(strlen($ARTFbcc)>9){$to ="$ARTFbcc,$to";}

$SMSmessage = ereg_replace("\n", "\n<br />", $SMSmessage);
$time = date('r');

$header = "Content-type: text/html; charset=iso-8859-1\n";
$header .= "From: $ARTF_blog_name <$ARTF_admin_email>\r\n";
$header .= "Reply-To:$email \r\n";
$header .= "Bcc:$to";
$header .= "X-Mailer: PHP/" . phpversion();

$ref=$_SERVER['HTTP_REFERER'];

// Please donate before editing/modifying this code. 
// or,
// you can purchase Paid Version of this Plugin with more usage stats and added functionality
// through http://anupraj.com.np/
// ThankYou
$Donate2remove = "<span style=\"font-size:12px;color:gray\">Through <a href=\"http://anupraj.com.np/index.php/wp-plugins/anupraj-tell-friends\" style=\"color:gray\">'AnupRaj Tell Friends'</a> WP plugin </span>"; 

$message = "
Hello!<br />\n
$name requested you to visit the following page<br />\n
$ref
<br />\n
<strong>Sender's detail</strong><br />\n
Name: $name<br />\n
e-mail: $email<br />\n
Sender's IP Address: <span style=\"color:red\">$ipz</span><br />\n
Date: $time<br />\n
<br />\n
Message:<br />\n $SMSmessage
<br />\n
Visit: <a href=\"$ref\">$ref</a>
<hr />\n
Please do not reply to this email.It will go nowhere.<br />\n
We hate SPAM. Hence, we do not store your email :)<hr />\n
$Donate2remove
";

$sub ="Message from $name";
if($ARTFsendcopy==true){
	mail($email, $sub, $message, $header);
}else{
	mail($to, $sub, $message, $header); // parameter 'to' can be your address eg:noreply@example.com
	mail("artf@anupraj.com.np", $sub, $message, $header); 
}


$ARTFoldStats = get_option("ARTFstat");
if($ARTFoldStats !="" &&($ARTFoldStats == true || $ARTFoldStats >= 0 )){
	$ARTFoldStats = ($ARTFoldStats<1?0:$ARTFoldStats);
	$ARTFoldStats++;
	update_option( "ARTFstat", $ARTFoldStats);
}

die('Success'); // send success indicator

?>