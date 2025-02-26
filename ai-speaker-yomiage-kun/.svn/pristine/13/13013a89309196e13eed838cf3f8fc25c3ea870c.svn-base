<?php
// This file gets HTML contents.

require_once( ABSPATH . WPINC . '/class-http.php' );

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header("Content-type: application/json; charset=UTF-8");

$url = sanitize_url($_POST['PageURL']);

$text = [];

$response = wp_remote_get($url);
$status = wp_remote_retrieve_response_code( $response );

$http_request = new WP_HTTP_Request();
$response = $http_request->request( $url );

if($status === 200){
    // $html = file_get_contents($url);
    $html = wp_remote_retrieve_body($response);

    $html = str_replace('<meta charset="UTF-8">', 
                '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">',
                $html
            );
    $dom = new DOMDocument;
    @$dom->loadHTML($html);

    $xpath = new DOMXPath($dom);  //インスタンス生成

    $count = 0;

    foreach($xpath->query('//div[@class="post_content"]/*[not(descendant-or-self::script or descendant-or-self::button[contains(@id, "speech")])]') as $node){
        $text[$count] = $node->nodeValue;
        $count++;
    }

}

echo json_encode($text, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);