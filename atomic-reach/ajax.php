<?php

require_once 'inc.php';


$build = array();

$_GET['loadmore'] = 'true';
$ARPostList = new ARPostList($_GET);
$build['payload'] =   $ARPostList->draw();


echo json_encode($build);

