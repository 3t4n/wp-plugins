<?php
if(!isset($_POST['email_sender']) and !isset($_POST['email_recipient'])){exit();}
$email_sender=addslashes($_POST['email_sender']);$email_recipient=addslashes($_POST['email_recipient']);
if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is',$email_sender)){exit();}
$testomail="<h2>Ajax Contact Module</h2>".$email_sender." wants to be contacted.";
$mittente=$email_sender;
$headers = array();
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=UTF-8';
$headers[] = 'Content-Transfer-Encoding: 7bit';        
$headers[] = 'From: ' . $email_sender;
$soggetto="Ajax Contact Module";
mail($email_recipient,$soggetto,$testomail,join("\r\n", $headers));
setcookie("acmcookie", "done", time()+31104000,"/");
?>
