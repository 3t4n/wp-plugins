<?php
/*
Plugin Name: Intelli TV video
Description: Easily insert an Intelli TV video to your WordPress article by pasting an Intelli TV video link in your editor.
Version: 1.0.1
Author: Intelli TV
Author URI: https://intelli.tv
License: GPLv2 or later
Text Domain: intellitv-iframe-block-gutenberg
*/


require_once('includes/hooks.php');
$block = new intelli_iframe_blocks('intellitv-iframe-block-gutenberg');