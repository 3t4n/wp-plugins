<?php

//global $shortcode_tags;
//echo "<pre>"; print_r($shortcode_tags); echo "</pre>";

// FEATURED BOX
function asfp_featured( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'title'			=> '',
		'title_color'	=> 'FFF',
		'header_color'		=> '343f44',
		'height'		=> 'auto',
		'class'		=> '',
	), $atts));
	// check the title
	if ($title) {$t = '<div class="t" style="background-color:#'.$header_color.'; color:#'.$title_color.'">'.$title.'</div>' ;};
	// select the class
	if ($title) {$classstr = "c";} else {$classstr = "c2";};
	$before = '
		<div class="asfp_featured '.$class.'">
			'.$r.$t.'
		<div class="'.$classstr.'" style="height:'.$height.'">
	';
	$content = do_shortcode($content);
	$after = '</div></div>';
	return $before.$content.$after; 
	}
add_shortcode('feature_box', 'asfp_featured');

// DISABLE AUTOFORMATING POSTS
function my_formatter($content) {
	$new_content = '';
	$pattern_full = '{(\[noformat\].*?\[/noformat\])}is';
	$pattern_contents = '{\[noformat\](.*?)\[/noformat\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}
	return $new_content;
}
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');
add_filter('the_content', 'my_formatter');

// BASIC LIST
function asfp_basic_list( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'class'		=> '',
	), $atts));
	$content = str_replace('<ul>', '<ul class="basic_list '.$class.'">', do_shortcode($content));
	return $content; }
add_shortcode('basic_list', 'asfp_basic_list');

// CHECK LIST
function asfp_check_list( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'class'		=> '',
	), $atts));
	$content = str_replace('<ul>', '<ul class="check_list '.$class.'">', do_shortcode($content));
	return $content; }
add_shortcode('check_list', 'asfp_check_list');

// GREEN MESSAGE
function green_message( $atts, $content = null ) {
	$out = "<div class=\"green_message\">" .do_shortcode($content). "</div>";
	return $out; }
add_shortcode('green_message', 'green_message');

// BLUE MESSAGE
function blue_message( $atts, $content = null ) {
	$out = "<div class=\"blue_message\">" .do_shortcode($content). "</div>";
	return $out; }
add_shortcode('blue_message', 'blue_message');

// YELLOW MESSAGE
function yellow_message( $atts, $content = null ) {
	$out = "<div class=\"yellow_message\">" .do_shortcode($content). "</div>";
	return $out; }
add_shortcode('yellow_message', 'yellow_message');

// QUOTE
function asfp_quote( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'author'		=> '',
	), $atts));
	$out = "<div class=\"bgt\"><div class=\"bgb\"><blockquote class=\"center\">" .do_shortcode($content). " <div class=\"a\">" .$author. "</div></blockquote></div></div>";
	return $out; }
add_shortcode('quote', 'asfp_quote');

// QUOTE LEFT
function quote_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'author'		=> '',
	), $atts));
	$out = "<blockquote class=\"left\">" .do_shortcode($content). " <div class=\"a\">" .$author. "</div></blockquote>";
	return $out; }
add_shortcode('quote_left', 'quote_left');

// QUOTE RIGHT
function quote_right( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'author'		=> '',
	), $atts));
	$out = "<blockquote class=\"right\">" .do_shortcode($content). " <div class=\"a\">" .$author. "</div></blockquote>";
	return $out; }
add_shortcode('quote_right', 'quote_right');

// DROP CAP
function asfp_dropcap( $atts, $content = null ) {
	return '<span class="dropcap">' . do_shortcode($content) . '</span>'; }
add_shortcode('dropcap', 'asfp_dropcap');

// DROP CAP #2
function dropcap2( $atts, $content = null ) {
	return '<span class="dropcap2">' . do_shortcode($content) . '</span>'; }
add_shortcode('dropcap2', 'dropcap2');

// HIGHLIGHT YELLOW
function yellow( $atts, $content = null ) {
	return '<span class="highlight_yellow">' . do_shortcode($content) . '</span>'; }
add_shortcode('yellow', 'yellow');

// HIGHLIGHT BLUE
function blue( $atts, $content = null ) {
	return '<span class="highlight_blue">' . do_shortcode($content) . '</span>'; }
add_shortcode('blue', 'blue');

// HIGHLIGHT GREEN
function green( $atts, $content = null ) {
   return '<span class="highlight_green">' . do_shortcode($content) . '</span>'; }
add_shortcode('green', 'green');

// GOOGLE CHARTS
function asfp_chart_shortcode( $atts ) {
	extract(shortcode_atts(array(
	    'data' => '',
	    'colors' => '',
	    'size' => '500x250',
	    'bg' => 'FFFFFF',
	    'title' => '',
	    'labels' => '',
	    'advanced' => '',
	    'type' => 'pie'
	), $atts));

	switch ($type) {
		case 'line' :
			$charttype = 'lc'; break;
		case 'xyline' :
			$charttype = 'lxy'; break;
		case 'sparkline' :
			$charttype = 'ls'; break;
		case 'meter' :
			$charttype = 'gom'; break;
		case 'scatter' :
			$charttype = 's'; break;
		case 'venn' :
			$charttype = 'v'; break;
		case 'pie' :
			$charttype = 'p3'; break;
		case 'pie2d' :
			$charttype = 'p'; break;
		default :
			$charttype = $type;
		break;
	}

	if ($title) $string .= '&chtt='.$title.'';
	if ($labels) $string .= '&chl='.$labels.'';
	if ($colors) $string .= '&chco='.$colors.'';
	$string .= '&chs='.$size.'';
	$string .= '&chd=t:'.$data.'';
	$string .= '&chf=bg,s,'.$bg.'';

	return '<img title="'.$title.'" src="http://chart.apis.google.com/chart?cht='.$charttype.''.$string.$advanced.'" alt="'.$title.'" />';
}
add_shortcode('asfp_chart', 'asfp_chart_shortcode');

if (get_option('asfp_tabsjs')!=1) {

	// TABS 1-10
	function asfp_tabs( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'tab1'	=> '',
			'tab2'	=> '',
			'tab3'	=> '',
			'tab4'	=> '',
			'tab5'	=> '',
			'tab6'	=> '',
			'tab7'	=> '',
			'tab8'	=> '',
			'tab9'	=> '',
			'tab10'	=> '',
		), $atts));
		if ($tab1<>"") { $t1 = "<li><a href=\"#slide1\" class=\"active\">".$tab1."</a></li>"; }
		if ($tab2<>"") { $t2 = "<li><a href=\"#slide2\">".$tab2."</a></li>"; }
		if ($tab3<>"") { $t3 = "<li><a href=\"#slide3\">".$tab3."</a></li>"; }
		if ($tab4<>"") { $t4 = "<li><a href=\"#slide4\">".$tab4."</a></li>"; }
		if ($tab5<>"") { $t5 = "<li><a href=\"#slide5\">".$tab5."</a></li>"; }
		if ($tab6<>"") { $t6 = "<li><a href=\"#slide6\">".$tab6."</a></li>"; }
		if ($tab7<>"") { $t7 = "<li><a href=\"#slide7\">".$tab7."</a></li>"; }
		if ($tab8<>"") { $t8 = "<li><a href=\"#slide8\">".$tab8."</a></li>"; }
		if ($tab9<>"") { $t9 = "<li><a href=\"#slide9\">".$tab9."</a></li>"; }
		if ($tab10<>"") { $t10 = "<li><a href=\"#slide10\">".$tab10."</a></li>"; }
		$id = rand(0,9999);
		$out = "
			<div id=\"asfptabs".$id."\">
				<ul class=\"asfptabs\">
					".$t1."".$t2."".$t3."".$t4."".$t5."".$t6."".$t7."".$t8."".$t9."".$t10."
				</ul>
				<ul class=\"asfptabscontent\">
					".do_shortcode($content)."
				</ul>
			</div>
		";
		return $out; }
	add_shortcode('tabs', 'asfp_tabs');
	add_shortcode('asfp_tabs', 'asfp_tabs');
	
	// SLIDES 1-10
	function slide1( $atts, $content = null ) {
		$out = "<li id='slide1'>".do_shortcode($content)."</li>"; return $out; }
	add_shortcode('slide1', 'slide1');

	function slide2( $atts, $content = null ) {
		$out = "<li id='slide2' style=\"display: none\">".do_shortcode($content)."</li>"; return $out; }
	add_shortcode('slide2', 'slide2');

	function slide3( $atts, $content = null ) {
		$out = "<li id='slide3' style=\"display: none\">".do_shortcode($content)."</li>"; return $out; }
	add_shortcode('slide3', 'slide3');

	function slide4( $atts, $content = null ) {
		$out = "<li id='slide4' style=\"display: none\">".do_shortcode($content)."</li>"; return $out; }
	add_shortcode('slide4', 'slide4');

	function slide5( $atts, $content = null ) {
		$out = "<li id='slide5' style=\"display: none\">".do_shortcode($content)."</li>"; return $out; }
	add_shortcode('slide5', 'slide5');

	function slide6( $atts, $content = null ) {
		$out = "<li id='slide6' style=\"display: none\">".do_shortcode($content)."</li>"; return $out; }
	add_shortcode('slide6', 'slide6');

	function slide7( $atts, $content = null ) {
		$out = "<li id='slide7' style=\"display: none\">".do_shortcode($content)."</li>"; return $out; }
	add_shortcode('slide7', 'slide7');

	function slide8( $atts, $content = null ) {
		$out = "<li id='slide8' style=\"display: none\">".do_shortcode($content)."</li>"; return $out; }
	add_shortcode('slide8', 'slide8');

	function slide9( $atts, $content = null ) {
		$out = "<li id='slide9' style=\"display: none\">".do_shortcode($content)."</li>"; return $out; }
	add_shortcode('slide9', 'slide9');

	function slide10( $atts, $content = null ) {
		$out = "<li id='slide10' style=\"display: none\">".do_shortcode($content)."</li>"; return $out; }
	add_shortcode('slide10', 'slide10');

	
	// TOGGLE
	function asfp_toggle( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'title'		=> '',
			'class'		=> '',
		), $atts));
		$out .= '<div class="toggle '.$class.'" style="background-position:left 8px;">' .$title. '</div>';
		$out .= '<div class="toggle_content '.$class.'" style="display: none;">';
		$out .= '<div class="tc">';
		$out .= do_shortcode($content);
		$out .= '</div>';
		$out .= '</div>';
		return $out; }
	add_shortcode('toggle', 'asfp_toggle');
} else {
	function asfp_disabled_shortcodes() {
		return '<p>You have checked the box next to "Disable tabs &amp; toggle javascript?" on the Settings page for April\'s Super Functions Pack. If you want this shortcode to work, uncheck that box!';
	}
	add_shortcode('tabs', 'asfp_disabled_shortcodes');
	add_shortcode('toggle', 'asfp_disabled_shortcodes');
}

// CLEAR
function asfpclear( $atts, $content = null ) {
   return '<div class="clr">&nbsp;</div>'; }
add_shortcode('clear', 'asfpclear');
add_shortcode('cleanbreak', 'asfpclear');

// LINE
function asfpline( $atts, $content = null ) {
   return '<div class="hline"></div>'; }
add_shortcode('line', 'asfpline');

// Blank LINE
function blankline( $atts, $content = null ) {
   return '<div class="blankline">&nbsp;</div>'; }
add_shortcode('blankline', 'blankline');


// list sub-pages
function asfp_get_the_excerpt($post_id) {
  global $post;  
  $save_post = $post;
  $post = get_post($post_id);
  $output = get_the_excerpt();
  $post = $save_post;
  return $output;
}

function list_subpages_func($atts) {
	extract(shortcode_atts(array(
		'type' => 'bulletlist',
		'exclude'=>'',
	), $atts));
	global $post;
	$params = 'post_type=page&numberposts=-1&orderby=menu_order&order=ASC&depth=1&post_parent='.$post->ID;
	if (!empty($exclude)) $params .= '&exclude='.$exclude;
	$children = get_posts($params);
	if (!empty($children)) {
		switch($type) {
			case 'excerpt':
			 $str = '';
			 foreach ($children as $asfppost) {
			 	setup_postdata($asfppost);
			 	$str .= '<div class="asfp_childpages_excerpt">';
			 	$str .= '<h3><a href="'.get_permalink($asfppost->ID).'">'.$asfppost->post_title.'</a></h3>';
			 	$str .= '<p>'.asfp_get_the_excerpt($asfppost->ID).'</p>';
			 	$str .= '</div>';
			 }
			 break;
			default:
			 $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
			 $str = '<ul class="asfp_childpages_list">'.$children.'</ul>';
			 break;
		}
	}
	return $str;
}

add_shortcode('asfp_subpages','list_subpages_func');

// submenu shortcode (uses template_func)
function asfp_submenu_func($atts) {
	extract(shortcode_atts(array(
		'link_heading' => null,
		'depth' => null,
	), $atts));
	
	$atts['echo'] = false;
	$atts['widget_class'] = false;

	return asfp_subpages_nav(http_build_query($atts));
}
add_shortcode('asfp_submenu','asfp_submenu_func');


// javascript for pre-selecting a recipient on a cform
function preselect_recipient_func($atts) {
	extract(shortcode_atts(array(
		'fieldnumber'=>'1',
		'formid'=>'',
	), $atts));
	$str = '<script type="text/javascript">pre_choose_recipient('.$formid.')</script>';
	return $str;
}
add_shortcode('asfp_preselect_recipient','preselect_recipient_func');


// turn a thumbnail image into a photostack
function asfp_photostack_func($atts,$content=null) {
	$content = '<span class="asfp-photo-stack">'.do_shortcode($content).'</span>';
	return $content; 
}
add_shortcode('asfp_photostack','asfp_photostack_func');

?>