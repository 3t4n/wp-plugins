<?php

include 'C:/wamp/www/instagram/vendor/autoload.php';
require 'C:/wamp/www/instagram/vendor/mgp25/instagram-php/src/Instagram.php';

/////// CONFIG ///////
$username = 'nhakhtn';
$password = 'tnvs2016';
$debug = false;

$photo = 'test.jpg';     // path to the photo
$caption = 'abc123';     // caption
//////////////////////

$i = new \InstagramAPI\Instagram($username, $password, $debug);

try {
    $i->login();
} catch (Exception $e) {
    $e->getMessage();
    exit();
}

try {
    $i->uploadPhoto($photo, $caption);
} catch (Exception $e) {
    echo $e->getMessage();
}
