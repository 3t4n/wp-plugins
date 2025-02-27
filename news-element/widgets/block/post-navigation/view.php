<?php
use News_Element\Khobish_Helper; 
use Elementor\Plugin;

if (Plugin::instance()->editor->is_edit_mode()){
    $id = $settings['prev_id'];
} else {
	global $wp_query; 
	$id = $wp_query->post->ID;
}


$previous_post_id = Khobish_Helper::thepack_get_previous_post_id($id);
$next_post_id = Khobish_Helper::thepack_get_next_post_id($id);

require dirname(__FILE__) .'/'. sanitize_key($settings['tmpl']) .'.php';
?> 