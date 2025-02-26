<?php
include "../../../wp-load.php";
$username = $_GET['username'];
$userpass = $_GET['pass'];
$user_info=get_userdatabylogin($username);
if($user_info == false){
  echo "Invalid UserName";
}
else{
  $status = wp_check_password( $userpass, $user_info->user_pass, $user_in->ID );
  if($status == false){
    echo "Invalid Password";
  }
 else {
    echo "ok";
  }
}
?>