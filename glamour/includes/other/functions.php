<?php

function glamour_get_iframe_url($raw = false) {
	global $wp;
	$iframe_url_raw = home_url( $wp->request );
	$type = isset($_GET['glmrmode']) ? sanitize_text_field( $_GET['glmrmode'] ) : 'global';

	$queries = explode("&", $wp->query_string);
	$args = array();
	if(!empty($queries)){
		foreach($queries as $query){
			$argArray = explode("=", $query);
			if(isset($argArray[0]) && isset($argArray[1])){
				$args[$argArray[0]] = $argArray[1];
			}
		}
	}

	if($raw){
		return add_query_arg( $args, $iframe_url_raw );
	}

	$iframe_url = add_query_arg( array_merge($args, array(
		'glmr' => 'yes',
		'glmrmode' => 'edit',
		'glmrtype' => $type
	)), $iframe_url_raw );

	return $iframe_url;
}