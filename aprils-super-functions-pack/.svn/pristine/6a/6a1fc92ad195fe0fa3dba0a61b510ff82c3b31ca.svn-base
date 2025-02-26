<?php
// ICO MAIL
function ico_mail( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'email'		=> 'mailbox@website.tld',
	), $atts));
	$out = "<a class=\"asfpicon ico_mail\" href=\"mailto:" .$email. "\">" .do_shortcode($content). "</a>";
	return $out; }
add_shortcode('ico_mail', 'ico_mail');

// ICO PHONE
function ico_phone( $atts, $content = null ) {
	$out = "<span class=\"asfpicon ico_phone\">" .do_shortcode($content). "</span>";
	return $out; }
add_shortcode('ico_phone', 'ico_phone');

// ICO HOME
function ico_home( $atts, $content = null ) {
	$out = "<span class=\"asfpicon ico_home\">" .do_shortcode($content). "</span>";
	return $out; }
add_shortcode('ico_home', 'ico_home');

// ICO MALE
function ico_male( $atts, $content = null ) {
	$out = "<span class=\"asfpicon ico_male\">" .do_shortcode($content). "</span>";
	return $out; }
add_shortcode('ico_male', 'ico_male');

// ICO FEMALE
function ico_female( $atts, $content = null ) {
	$out = "<span class=\"asfpicon ico_female\">" .do_shortcode($content). "</span>";
	return $out; }
add_shortcode('ico_female', 'ico_female');

// ICO STAR
function ico_star( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '',
		'target'	=> '',
	), $atts));
	if ($url) {$out = '<a class="asfpicon ico_star" href="'.$url.'" target="'.$target.'">'.do_shortcode($content).'</a>';}
	else {$out = '<span class="asfpicon ico_star">'.do_shortcode($content).'</span>';};
	return $out; }
add_shortcode('ico_star', 'ico_star');

// ICO NEW
function ico_new( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '',
		'target'	=> '',
	), $atts));
	if ($url) {$out = '<a class="asfpicon ico_new" href="'.$url.'" target="'.$target.'">'.do_shortcode($content).'</a>';}
	else {$out = '<span class="asfpicon ico_new">'.do_shortcode($content).'</span>';};
	return $out; }
add_shortcode('ico_new', 'ico_new');

// ICO SUPPORT
function ico_support( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '',
		'target'	=> '',
	), $atts));
	if ($url) {$out = '<a class="asfpicon ico_support" href="'.$url.'" target="'.$target.'">'.do_shortcode($content).'</a>';}
	else {$out = '<span class="asfpicon ico_support">'.do_shortcode($content).'</span>';};
	return $out; }
add_shortcode('ico_support', 'ico_support');

// ICO EXCEL
function ico_excel( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '#',
		'target'	=> '',
	), $atts));
	$out = '<a class="asfpicon ico_excel" href="'.$url.'" target="'.$target.'">'.do_shortcode($content).'</a>';
	return $out; }
add_shortcode('ico_excel', 'ico_excel');

// ICO DOWNLOAD
function ico_download( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '#',
		'target'	=> '',
	), $atts));
	$out = '<a class="asfpicon ico_download" href="'.$url.'" target="'.$target.'">'.do_shortcode($content).'</a>';
	return $out; }
add_shortcode('ico_download', 'ico_download');

// ICO MONITOR
function ico_monitor( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '',
		'target'	=> '',
	), $atts));
	if ($url) {$out = '<a class="asfpicon ico_monitor" href="'.$url.'" target="'.$target.'">'.do_shortcode($content).'</a>';}
	else {$out = '<span class="asfpicon ico_monitor">'.do_shortcode($content).'</span>';};
	return $out; }
add_shortcode('ico_monitor', 'ico_monitor');

// ICO DOLLAR
function ico_dollar( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '',
		'old'		=> '',
		'off'		=> '',
		'target'	=> '',
	), $atts));
	if ($off) {$of = '<span class="off">-'.$off.'% OFF</span>';}
	if ($old) {$ol = '<span class="oldprice">'.$old.'</span>';}
	if ($url) {$out = '<a class="asfpicon ico_dollar" href="'.$url.'" target="'.$target.'">'.do_shortcode($content).'</a>'.$ol.$of;}
	else {$out = '<span class="asfpicon ico_dollar">'.do_shortcode($content).''.$ol.$of.'</span>';};
	return $out; }
add_shortcode('ico_dollar', 'ico_dollar');

// ICO PAINTCAN
function ico_paintcan( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '',
		'target'	=> '',
	), $atts));
	if ($url) {$out = '<a class="asfpicon ico_paintcan" href="'.$url.'" target="'.$target.'">'.do_shortcode($content).'</a>';}
	else {$out = '<span class="asfpicon ico_paintcan">'.do_shortcode($content).'</span>';};
	return $out; }
add_shortcode('ico_paintcan', 'ico_paintcan');

// ICO CHART PIE
function ico_pie( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '',
		'target'	=> '',
	), $atts));
	if ($url) {$out = '<a class="asfpicon ico_pie" href="'.$url.'" target="'.$target.'">'.do_shortcode($content).'</a>';}
	else {$out = '<span class="asfpicon ico_pie">'.do_shortcode($content).'</span>';};
	return $out; }
add_shortcode('ico_pie', 'ico_pie');

// ICO BASKET
function ico_basket( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '',
		'target'	=> '',
	), $atts));
	if ($url) {$out = '<a class="asfpicon ico_basket" href="'.$url.'" target="'.$target.'">'.do_shortcode($content).'</a>';}
	else {$out = '<span class="asfpicon ico_basket">'.do_shortcode($content).'</span>';};
	return $out; }
add_shortcode('ico_basket', 'ico_basket');

// ICO DATABASE
function ico_database( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '',
		'target'	=> '',
	), $atts));
	if ($url) {$out = '<a class="asfpicon ico_database" href="'.$url.'" target="'.$target.'">'.do_shortcode($content).'</a>';}
	else {$out = '<span class="asfpicon ico_database">'.do_shortcode($content).'</span>';};
	return $out; }
add_shortcode('ico_database', 'ico_database');

// ICO FIND
function ico_find( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '',
		'target'	=> '',
	), $atts));
	if ($url) {$out = '<a class="asfpicon ico_find" href="'.$url.'" target="'.$target.'">'.do_shortcode($content).'</a>';}
	else {$out = '<span class="asfpicon ico_find">'.do_shortcode($content).'</span>';};
	return $out; }
add_shortcode('ico_find', 'ico_find');

// ICO KEY
function ico_key( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '',
		'target'	=> '',
	), $atts));
	if ($url) {$out = '<a class="asfpicon ico_key" href="'.$url.'" target="'.$target.'">'.do_shortcode($content).'</a>';}
	else {$out = '<span class="asfpicon ico_key">'.do_shortcode($content).'</span>';};
	return $out; }
add_shortcode('ico_key', 'ico_key');

// ICO ARROW
function ico_arrow( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '',
		'target'	=> '',
	), $atts));
	if ($url) {$out = '<a class="asfpicon ico_arrow" href="'.$url.'" target="'.$target.'">'.do_shortcode($content).'</a>';}
	else {$out = '<span class="asfpicon ico_arrow">'.do_shortcode($content).'</span>';};
	return $out; }
add_shortcode('ico_arrow', 'ico_arrow');

?>
