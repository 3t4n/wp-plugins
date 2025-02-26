<?php
// BUTTON
function button_grey( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '#',
		'class'		=> '',
	), $atts));
	$out = "<a class=\"button1 $class\" href=\"" .$url. "\">" .do_shortcode($content). "</a>";
	return $out; }
add_shortcode('button', 'button_grey');
add_shortcode('button_grey', 'button_grey');

// BUTTON #2
function button_blue( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '#',
		'class'		=> '',
	), $atts));
	$out = "<a class=\"button2 $class\" href=\"" .$url. "\">" .do_shortcode($content). "</a>";
	return $out; }
add_shortcode('button_blue', 'button_blue');

// BUTTON #3
function button_green( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '#',
		'class'		=> '',
	), $atts));
	$out = "<a class=\"button3 $class\" href=\"" .$url. "\">" .do_shortcode($content). "</a>";
	return $out; }
add_shortcode('button_green', 'button_green');

// BUTTON #4
function button_orange( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '#',
		'class'		=> '',
	), $atts));
	$out = "<a class=\"button4 $class\" href=\"" .$url. "\">" .do_shortcode($content). "</a>";
	return $out; }
add_shortcode('button_orange', 'button_orange');

// BIG BUTTON
function big_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'url'		=> '#',
		'bgcolor' => '',
		'class'		=> '',
	), $atts));

	/* invent a color a little bit darker ------------------------ */
	/* from http://www.php.net/manual/en/function.hexdec.php#57303 */
	$row1 = $bgcolor; // color
	$c = 20;          // difference value
	$rgb = array(substr($row1,0,2), substr($row1,2,2), substr($row1,4,2));
	for($i=0; $i < 3; $i++) {
		if((hexdec($rgb[$i])-$c) >= 0) {
			$rgb[$i] = hexdec($rgb[$i])-$c;
			$rgb[$i] = dechex($rgb[$i]);
			if(hexdec($rgb[0]) <= 9) $rgb[$i] = "0".$rgb[$i];
		} else {
			$rgb[$i] = "00";
		}
	}
	$row2 = $rgb[0].$rgb[1].$rgb[2];

	$out = "<a class=\"bigbutton $class\" href=\"" .$url. "\"";
	if (!empty($bgcolor)) $out .= ' style="background-color: #'.$bgcolor.'; -moz-text-shadow: -1px -1px 0 #'.$row2.'; -webkit-text-shadow: -1px -1px 0 #'.$row2.'; text-shadow: -1px -1px 0 #'.$row2.';"';
	$out .= ">" .do_shortcode($content). "</a>";

	return $out; }
add_shortcode('big_button', 'big_button');

?>
