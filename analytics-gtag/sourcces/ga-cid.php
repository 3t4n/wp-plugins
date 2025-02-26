<?php
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");
session_start();

//kein kockie dann mach eines mit id
if ((!isset($_COOKIE['cid'])) && (!isset($_SESSION['cid']))) {
  $_SESSION['cid'] = sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
    mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
    mt_rand( 0, 0xffff ),
    mt_rand( 0, 0x0fff ) | 0x4000,
    mt_rand( 0, 0x3fff ) | 0x8000,
    mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
  );
}

//vorheriges sesion cockie 
if (isset($_COOKIE['cid'])) {
  $_SESSION['cid'] = $_COOKIE['cid'];
}

//aktualisiere das cookie
if (isset($_SESSION['cid'])) {
  setcookie("cid", $_SESSION['cid'], time()+3600*24*365);
}

$cid = $_SESSION['cid']; 
if ($_GET['return']=="cid") { echo $cid; }
?>