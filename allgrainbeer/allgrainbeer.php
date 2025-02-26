<?php
/*
	Plugin Name: AllGrain.Beer
	Description: Adds oEmbed support for AllGrain.Beer - Try adding a recipe URL to your post or page!
	Version: 1.0.0
	Author: Gabriel Nagmay
	Author URI: http://gabriel@nagmay.com
	License: GPL2
*/

wp_oembed_add_provider( '#http://(www\.)?allgrain\.beer/recipes/\d+/?#i', 'http://allgrain.beer/recipes/oembed/', true ); 
