<?php

class RakamLinkTrackingPublic {

	public function __construct() {
		add_filter( 'page_link', array( $this, 'rakam_link_tracking'), 10, 1 );
		add_filter( 'post_type_link', array( $this, 'rakam_link_tracking'), 10, 1 );
	}
	
	public function rakam_link_tracking( $link ) {
		$result = $link;
		$parameters = filter_input_array(INPUT_GET);
		if ( $parameters ) {
			$rakam_link_tracking_options = get_option( 'rakam_link_tracking_option_name' );
			if ( array_key_exists('query_parameter_names_0', $rakam_link_tracking_options) ) {
				$query_parameter_names_0 = $rakam_link_tracking_options['query_parameter_names_0'];
				if ( $query_parameter_names_0 ) {
					
					$parse_url = parse_url($link);
					$params = explode(',', $query_parameter_names_0);
					
					$query = array();
					foreach( $params as $param ) {
						$param = trim( $param );
						if ( array_key_exists($param, $parameters) ) {
							$query[$param] = $parameters[$param];
						}
					}
					
					if ( count($query) > 0 ) {
						$base_url = sprintf('%s://%s%s', $parse_url['scheme'], $parse_url['host'], $parse_url['path']);
						$result = sprintf('%s?%s', $base_url, http_build_query( $query ) );					
					}
				
				}
			}			
		}
		return $result;
	}

}