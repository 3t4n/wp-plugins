<?php
require_once('../../../../wp-load.php');
$keydata = '';
$public_key =  get_option('feedify_public_key');

if(isset($public_key) && $public_key != ''){
	$data = array('peky'=>$public_key) ;
	$keydata = json_encode($data);
}
echo esc_html($keydata);
 
die();
?>