<?php
use News_Element\Khobish_Helper;

$fmeta = Khobish_Helper::king_buildermeta_to_string($settings['fmeta']);
$smeta = Khobish_Helper::king_buildermeta_to_string($settings['smeta']);

$query_args = Khobish_Helper::hero_slide_query($settings,'query');
$wp_query = new WP_Query($query_args);
require dirname(__FILE__) .'/'. sanitize_key($settings['tmpl']) .'.php';
?> 