<?php
include "../../../wp-load.php";
require(ABSPATH . WPINC . '/registration.php');
$username = $_GET['username'];
$useremail = $_GET['email'];
if($useremail === true){
  $found = username_exists( $username );
  $foun = email_exists($username);
  if($found == null && $foun == false)
  {
    echo "Invalid username or E-mail";
  }
}
else{
$found = username_exists( $username );
if($found){
  echo "Valid UserName";
}
else{
  $foun = email_exists($useremail);
  if($foun){
    echo "Valid Email";
  }
  else{
   echo "ok";
  }
}
}

?>