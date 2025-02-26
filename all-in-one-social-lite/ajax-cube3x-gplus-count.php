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
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$curl_results = curl_exec($ch);
curl_close($ch);
$json = json_decode($curl_results, true);
$count = intval($json[0]['result']['metadata']['globalCounts']['count']);
$data = array();
$data['plus_count'] = (string) $count;
$data['url'] = $url;
echo($_GET['callback'] . '(' . json_encode($data) . ')');
?>