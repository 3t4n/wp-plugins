<?php

function wpda_nf($val) {
	$region = get_option('wpda_region');
	switch($region) {
		default:
		case 'us':
			return '$'.number_format($val, 2, '.', ',');
		break;
		case 'uk':
			return '£'.number_format($val, 2, '.', ',');
		break;
		case 'de':
		case 'at':
		case 'ch':
			return number_format($val, 2, ',', '.').' €';
		break;
	}
}

function wpda_json_decode($json, $assoc = true, $depth = 512, $options = 0) {
	$json = trim($json);
	$json = str_replace(array("\n","\r"),"\\n", $json);
	$json = preg_replace('/([{,]+)(\s*)([^"]+?)\s*:/','$1"$3":', $json);
	$json = preg_replace('/(,)\s*}$/','}', $json);

	if(version_compare(phpversion(), '5.4.0', '>=')) {
		$json = json_decode($json, $assoc, $depth, $options);
	}
	elseif(version_compare(phpversion(), '5.3.0', '>=')) {
		$json = json_decode($json, $assoc, $depth);
	}
	else {
		$json = json_decode($json, $assoc);
	}

	return $json;
}

?>
