<?php 
try {
	$uname = trim(get_option('netgo_pi_user_name')); 
	$rss4 = new DOMDocument();
	$rss4->load('http://pinterest.com/'.$uname.'/feed.rss');  //Enter your pinterest username
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} 
$feed4 = array();
$pins = $rss4->getElementsByTagName('item');
if(count($pins) > 0){
	foreach ($pins as $pin) {
		$item = array ( 
			'title' => $pin->getElementsByTagName('title')->item(0)->nodeValue,
			'image' => $pin->getElementsByTagName('image')->item(0)->nodeValue,
			'link' => $pin->getElementsByTagName('link')->item(0)->nodeValue,
			'date' => $pin->getElementsByTagName('pubDate')->item(0)->nodeValue,
			'description' => $pin->getElementsByTagName('description')->item(0)->nodeValue,
		);
		array_push($feed4, $item);
	}
}  
?>