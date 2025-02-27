<?php
/* 
Plugin Name: FW Anker
Version: 1.2.6
Plugin URI: http://www.wieser.at/wordpress/plugins
Description: Anker ist eine Einfach nutzung von HTML Anker <a name="anker"> und <a href="#anker> mit einem Shortcode [anker name="anker" href="anker" text="anker"]
Author: Franz Wieser
Author URI: http://www.wieser.at
Licenc:  GPLv2
*/ 
add_shortcode('anker','fwanker');

function fwanker($atts,$content=null) {

extract(shortcode_atts(array( 'name' => 'anfang', 'href' => 'anfang', 'text' => ''), $atts));

$fwanker = '<a name='.$name.' href=#'.$href.'>'.$text.$content.'</a>';
return $fwanker;
}
