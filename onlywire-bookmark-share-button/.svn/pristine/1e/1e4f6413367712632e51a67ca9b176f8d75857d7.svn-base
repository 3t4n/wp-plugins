<?php
define( "SITE_NAME" , "OnlyWire");
define( "SITE_URL" , "https://onlywire.com");

include ("ow_api.php");
// this file takes care of posting the response data to onlywire to confirm user's authetication
extract($_GET);

$data = checkUser($auth_user, $auth_pw);
echo $data;
?>