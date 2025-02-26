<?php
if (preg_match('/\W/', $_GET['callback'])) {
    header('HTTP/1.1 400 Bad Request');
    exit();
 }
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json; charset=utf-8');
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    if ('/' != substr($url, -1))
        $url = $url . '/';
} else {
    die($_GET['callback'] . '({"error":"Invalid Input"})');
}
$response = file_get_contents('http://www.stumbleupon.com/services/1.01/badge.getinfo?url='.$url);
echo($_GET['callback'] . '(' . $response . ')');
?>