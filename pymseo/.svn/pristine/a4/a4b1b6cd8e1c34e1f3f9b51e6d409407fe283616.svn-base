<?php
// ###############################
// Disable embeds
// ##############################
 
	function fun_pymseo_disable_embeds() {
		remove_action( 'rest_api_init', 'wp_oembed_register_route' ); // Remove the REST API endpoint.
		add_filter( 'embed_oembed_discover', '__return_false' ); // Turn off oEmbed auto discovery.
		remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 ); // Don't filter oEmbed results.
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links' ); // Remove oEmbed discovery links.
		remove_action( 'wp_head', 'wp_oembed_add_host_js' ); // Remove oEmbed-specific JavaScript from the front-end and back-end.
		add_filter( 'tiny_mce_plugins', 'fun_pymseo_disable_embeds_tiny_mce_plugin' ); // filter to remove TinyMCE emojis
		add_filter( 'rewrite_rules_array', 'fun_pymseo_disable_embeds_rewrites' ); // Remove all embeds rewrite rules.
		remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 ); // Remove filter of the oEmbed result before any HTTP requests are made.
	}
	add_action( 'init', 'fun_pymseo_disable_embeds', 9999 );
	function fun_pymseo_disable_embeds_tiny_mce_plugin($plugins) {
		return array_diff($plugins, array('wpembed'));
	}
	function fun_pymseo_disable_embeds_rewrites($rules) {
		foreach($rules as $rule => $rewrite) {
			if(false !== strpos($rewrite, 'embed=true')) {
				unset($rules[$rule]);
			}
		}
		return $rules;
	}

?>