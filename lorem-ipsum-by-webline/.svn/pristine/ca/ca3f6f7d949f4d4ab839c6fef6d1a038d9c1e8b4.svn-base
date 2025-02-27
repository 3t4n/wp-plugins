<?php
function lipsum_wli_shortcode_function($atts)
{
	//shortcode defaults options values
	extract( shortcode_atts(
			array(
				'paragraphs' => '5',
				'length'	=> 'small',
				'decoration' => '',
				'links' =>'',
				'unorder_list'=>'',
				'order_list'=>'',
				'description_list'=>'',
				'blockquotes'=>'',
				'code'=>'',
				'headers'=>'',
				'capital'=>'',
				'prude'=>'',
				'text'=>'',
				
			), $atts )
	);
	//Find content using lorem ipsum api url
	$url = "http://loripsum.net/api/$paragraphs/$length/$decoration/$links/$unorder_list/$order_list/$description_list/$blockquotes/$code/$headers/$capital/$prude/$text";
	
	
	$request = new WP_Http;
	$result = $request->request($url);
	$content = array();
	
	if (isset($result->errors)) {
		// display error message of some sort
	} else {
		$content = $result['body'];
		
	}
	$return_string = "";
	$return_string .= $content.'<br/>';

	return $return_string;
}
add_shortcode( 'lorem_ipsum_wli', 'lipsum_wli_shortcode_function' );
?>