<?php
/*
Plugin Name: Ayar Unicode Converter
Plugin URI: http://www.ayarunicodegroup.com/
Description: Automatic unicode font converter for ayar and zawgyi font for burmese language. Automatic translation for digits, time and date to burmese base on locale setting. Can work on multilingual sites. New English Calendar Design with images in calendar Header bar.Substitute text with appropiate image for calendar week days.Representation of week days and images are Sunday=Galon Bird,Monday=Tiger,Tuesday=Lion,Wednesday=Elephant,Thusday=Rat,Friday=Guinea-pig,Saturday=Dragon. Burmese Calendar Widget. And every single digits translate into burmese automatically.  <a href="http://www.ayarunicodegroup.com/">Documentation</a>.
Author: Sithu Thwin
Author URI: http://www.http://www.ayarunicodegroup.com/
Version: 3.0-beta_2
Tested up to: 3.1
*/
if(defined('A2Z_VERSION')) return;
define('A2Z_VERSION', '3.0-beta_2');
define('A2Z_PLUGIN_PATH', dirname(__FILE__));
define('A2Z_PLUGIN_FOLDER', basename(A2Z_PLUGIN_PATH));

if(defined('WP_ADMIN') && defined('FORCE_SSL_ADMIN') && FORCE_SSL_ADMIN){
    define('A2Z_PLUGIN_URL', rtrim(str_replace('http://','https://',get_option('siteurl')),'/') . '/'. PLUGINDIR . '/' . basename(dirname(__FILE__)) );
}else{
    define('A2Z_PLUGIN_URL', rtrim(get_option('siteurl'),'/') . '/'. PLUGINDIR . '/' . basename(dirname(__FILE__)) );
}
/*Language loader*/
if (function_exists('load_plugin_textdomain')) {
        load_plugin_textdomain( 'a2z', false, A2Z_PLUGIN_FOLDER . '/languages');
}

// Converts Latin digits to Burmese ones
if(!function_exists('latin_2_burmese')){
function latin_2_burmese($number) {
  $latin = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9'); 
  $burmese = array('​၀', '​၁', '​၂', '​၃', '​၄', '​၅', '​၆', '​၇', '​၈', '​၉');
  return str_replace($latin, $burmese, $number);
}
}
if (get_bloginfo('language') == 'my-MM' ){
foreach ( array('number_format_i18n','date_i18n','mysql2date','date_format','the_date','the_date_xml','current_time','get_date_from_gmt','get_the_time','iso8601_to_datetime','forum_date_format','comments_number','date') as $filters ) {
	add_filter( $filters, 'latin_2_burmese',$number );
}
}
function get_mmcalendar($initial = true, $echo = true) {
	global $wpdb, $m, $monthnum, $year, $wp_locale, $posts;

	$cache = array();
	$key = md5( $m . $monthnum . $year );
	if ( $cache = wp_cache_get( 'get_mmcalendar', 'calendar' ) ) {
		if ( is_array($cache) && isset( $cache[ $key ] ) ) {
			if ( $echo ) {
				echo $cache[$key];
				return;
			} else {
				return $cache[$key];
			}
		}
	}

	if ( !is_array($cache) )
		$cache = array();

	// Quick check. If we have no posts at all, abort!
	if ( !$posts ) {
		$gotsome = $wpdb->get_var("SELECT 1 as test FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' LIMIT 1");
		if ( !$gotsome ) {
			$cache[ $key ] = '';
			wp_cache_set( 'get_mmcalendar', $cache, 'calendar' );
			return;
		}
	}

	if ( isset($_GET['w']) )
		$w = ''.intval($_GET['w']);

	// week_begins = 0 stands for Sunday
	$week_begins = intval(get_option('start_of_week'));

	// Let's figure out when we are
	if ( !empty($monthnum) && !empty($year) ) {
		$thismonth = ''.zeroise(intval($monthnum), 2);
		$thisyear = ''.intval($year);
	} elseif ( !empty($w) ) {
		// We need to get the month from MySQL
		$thisyear = ''.intval(substr($m, 0, 4));
		$d = (($w - 1) * 7) + 6; //it seems MySQL's weeks disagree with PHP's
		$thismonth = $wpdb->get_var("SELECT DATE_FORMAT((DATE_ADD('${thisyear}0101', INTERVAL $d DAY) ), '%m')");
	} elseif ( !empty($m) ) {
		$thisyear = ''.intval(substr($m, 0, 4));
		if ( strlen($m) < 6 )
				$thismonth = '01';
		else
				$thismonth = ''.zeroise(intval(substr($m, 4, 2)), 2);
	} else {
		$thisyear = gmdate('Y', current_time('timestamp'));
		$thismonth = gmdate('m', current_time('timestamp'));
	}

	$unixmonth = mktime(0, 0 , 0, $thismonth, 1, $thisyear);

	// Get the next and previous month and year with at least one post
	$previous = $wpdb->get_row("SELECT DISTINCT MONTH(post_date) AS month, YEAR(post_date) AS year
		FROM $wpdb->posts
		WHERE post_date < '$thisyear-$thismonth-01'
		AND post_type = 'post' AND post_status = 'publish'
			ORDER BY post_date DESC
			LIMIT 1");
	$next = $wpdb->get_row("SELECT	DISTINCT MONTH(post_date) AS month, YEAR(post_date) AS year
		FROM $wpdb->posts
		WHERE post_date >	'$thisyear-$thismonth-01'
		AND MONTH( post_date ) != MONTH( '$thisyear-$thismonth-01' )
		AND post_type = 'post' AND post_status = 'publish'
			ORDER	BY post_date ASC
			LIMIT 1");

	/* translators: Calendar caption: 1: month name, 2: 4-digit year */
	$calendar_caption = _x('%1$s %2$s', 'calendar caption');
	 if (get_bloginfo('language') == 'my-MM' ){	
	$calendar_output = '<table id="wp-calendar" summary="' . esc_attr__('Calendar') . '">
	<caption><script type="text/javascript">document.write("'. sprintf($calendar_caption, $wp_locale->get_month($thismonth), date('Y', $unixmonth)) .'".convertDigit());</script></caption>
	<thead>
	<tr>';} else {
	$calendar_output = '<table id="wp-calendar" summary="' . esc_attr__('Calendar') . '">
	<caption>' . sprintf($calendar_caption, $wp_locale->get_month($thismonth), date('Y', $unixmonth)) . '</caption>
	<thead>
	<tr>';
	}

	$myweek = array();

	for ( $wdcount=0; $wdcount<=6; $wdcount++ ) {
		$myweek[] = $wp_locale->get_weekday(($wdcount+$week_begins)%7);
	}

	foreach ( $myweek as $wd => $img) {
		$day_name = (true == $initial) ?  $wp_locale->get_weekday_initial($img) : $wp_locale->get_weekday_abbrev($img);
		$wd = esc_attr($wd);
		$url = A2Z_PLUGIN_URL;
		$myweek[$i] = $wd;
		$wdimg = (($week_begins+$wd)%7);
		$i++;
		$calendar_output .= "\n\t\t<th scope=\"col\" title=\"$img\" id=\"$wdimg-day\" class=\"$wdimg-day\" width=\"25px;\" height=\"25px;\"><img src=\"$url/img/$wdimg.png\" alt=\"$img\"></th>";

	}

	$calendar_output .= '
	</tr>
	</thead>

	<tfoot>
	<tr>';

	if ( $previous ) {
		$calendar_output .= "\n\t\t".'<td colspan="4" id="prev"><a href="' . get_month_link($previous->year, $previous->month) . '" title="' . sprintf(__('View posts for %1$s %2$s'), $wp_locale->get_month($previous->month), date('Y', mktime(0, 0 , 0, $previous->month, 1, $previous->year))) . '">&laquo; ' . $wp_locale->get_month_abbrev($wp_locale->get_month($previous->month)) . '</a></td>';
	} else {
		$calendar_output .= "\n\t\t".'<td colspan="4" id="prev" class="pad">&nbsp;</td>';
	}

	$calendar_output .= "\n\t\t".'<td class="pad">&nbsp;</td>';

	if ( $next ) {
		$calendar_output .= "\n\t\t".'<td colspan="4" id="next"><a href="' . get_month_link($next->year, $next->month) . '" title="' . esc_attr( sprintf(__('View posts for %1$s %2$s'), $wp_locale->get_month($next->month), date('Y', mktime(0, 0 , 0, $next->month, 1, $next->year))) ) . '">' . $wp_locale->get_month_abbrev($wp_locale->get_month($next->month)) . ' &raquo;</a></td>';
	} else {
		$calendar_output .= "\n\t\t".'<td colspan="4" id="next" class="pad">&nbsp;</td>';
	}

	$calendar_output .= '
	</tr>
	</tfoot>

	<tbody>
	<tr>';

	// Get days with posts
	$dayswithposts = $wpdb->get_results("SELECT DISTINCT DAYOFMONTH(post_date)
		FROM $wpdb->posts WHERE MONTH(post_date) = '$thismonth'
		AND YEAR(post_date) = '$thisyear'
		AND post_type = 'post' AND post_status = 'publish'
		AND post_date < '" . current_time('mysql') . '\'', ARRAY_N);
	if ( $dayswithposts ) {
		foreach ( (array) $dayswithposts as $daywith ) {
			$daywithpost[] = $daywith[0];
		}
	} else {
		$daywithpost = array();
	}

	if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'camino') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'safari') !== false)
		$ak_title_separator = "\n";
	else
		$ak_title_separator = ', ';

	$ak_titles_for_day = array();
	$ak_post_titles = $wpdb->get_results("SELECT ID, post_title, DAYOFMONTH(post_date) as dom "
		."FROM $wpdb->posts "
		."WHERE YEAR(post_date) = '$thisyear' "
		."AND MONTH(post_date) = '$thismonth' "
		."AND post_date < '".current_time('mysql')."' "
		."AND post_type = 'post' AND post_status = 'publish'"
	);
	if ( $ak_post_titles ) {
		foreach ( (array) $ak_post_titles as $ak_post_title ) {

				$post_title = esc_attr( apply_filters( 'the_title', $ak_post_title->post_title, $ak_post_title->ID ) );

				if ( empty($ak_titles_for_day['day_'.$ak_post_title->dom]) )
					$ak_titles_for_day['day_'.$ak_post_title->dom] = '';
				if ( empty($ak_titles_for_day["$ak_post_title->dom"]) ) // first one
					$ak_titles_for_day["$ak_post_title->dom"] = $post_title;
				else
					$ak_titles_for_day["$ak_post_title->dom"] .= $ak_title_separator . $post_title;
		}
	}


	// See how much we should pad in the beginning
	$pad = calendar_week_mod(date('w', $unixmonth)-$week_begins);
	if ( 0 != $pad )
		$calendar_output .= "\n\t\t".'<td colspan="'. esc_attr($pad) .'" class="pad">&nbsp;</td>';

	$daysinmonth = intval(date('t', $unixmonth));
	for ( $day = 1; $day <= $daysinmonth; ++$day ) {
		if ( isset($newrow) && $newrow )
			$calendar_output .= "\n\t</tr>\n\t<tr>\n\t\t";
		$newrow = false;
$wd = calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear)));
if ($wd=='0')
$wdn='sun';
if ($wd=='1')
$wdn='mon';
if ($wd=='2')
$wdn='tues';
if ($wd=='3')
$wdn='wed';
if ($wd=='4')
$wdn='thurs';
if ($wd=='5')
$wdn='fri';
if ($wd=='6')
$wdn='sat';
		if ( $day == gmdate('j', current_time('timestamp')) && $thismonth == gmdate('m', current_time('timestamp')) && $thisyear == gmdate('Y', current_time('timestamp')) )
			$calendar_output .= '<td id="today">';
		else
			$calendar_output .= "<td class=\"$wdn\">";

		if ( in_array($day, $daywithpost) ) // any posts today?
				if (get_bloginfo('language') == 'my-MM' ){	$calendar_output .= '<a href="' . get_day_link($thisyear, $thismonth, $day) . "\" title=\"" . esc_attr($ak_titles_for_day[$day]) . "\"><script type='text/javascript'>document.write('$day'.convertDigit());</script></a>";
				}else {$calendar_output .= '<a href="' . get_day_link($thisyear, $thismonth, $day) . "\" title=\"" . esc_attr($ak_titles_for_day[$day]) . "\">$day</a>";}
		else if (get_bloginfo('language') == 'my-MM' ){	
		$calendar_output .= '<script type="text/javascript">document.write("';
			$calendar_output .= $day;
			$calendar_output .= '".convertDate());</script>';
			} else {
		$calendar_output .= $day;	
		}
		$calendar_output .= '</td>';

		if ( 6 == calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins) )
			$newrow = true;
	}

	$pad = 7 - calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins);
	if ( $pad != 0 && $pad != 7 )
		$calendar_output .= "\n\t\t".'<td class="pad" colspan="'. esc_attr($pad) .'">&nbsp;</td>';

	$calendar_output .= "\n\t</tr>\n\t</tbody>\n\t</table>";

	$cache[ $key ] = $calendar_output;
	wp_cache_set( 'get_mmcalendar', $cache, 'calendar' );

	if ( $echo )
		echo $calendar_output;
	else
		return $calendar_output;

}
add_filter('get_calendar','get_mmcalendar');
function a2z_head() {
?>
<LINK rel="stylesheet" type="text/css" href="<?php echo A2Z_PLUGIN_URL; ?>/ayar-style.css" />
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" type="image/x-icon" />
<style type='text/css'>
/* Created by: Sithu Thwin (frisithu82@gmail.com) on 2/25/2010 -- */
@font-face {
  font-family: 'Ayar';
  src: url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar.eot');
  src: local('Ayar'),
	url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar.woff') format('woff'),
    url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar.ttf') format('opentype'),
	url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar.svgz#webfontsnhuR0D6') format('svg'),
	url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar.svg#webfontsnhuR0D6') format('svg');
	font-weight: normal;
	font-style: normal;
    unicode-range:U+1000-1097;
    text-rendering: optimizeLegibility;
  }
@font-face {
  font-family: 'Ayar Kasone';
  src: url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar.eot');
  src: local('Ayar Kasone'),
	url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar_kasone.woff') format('woff'),
    url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar_kasone.ttf') format('opentype'),
	url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar_kasone.svgz#webfonty96Ct56S') format('svg'),
	url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar_kasone.svg#webfonty96Ct56S') format('svg');
	font-weight: bold;
	font-style: normal;
    unicode-range:U+1000-1097;
    text-rendering: optimizeLegibility;
  }
@font-face {
  font-family: 'Ayar Takhu';
  src: url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar_takhu.eot');
  src: local('Ayar Takhu'),
	url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar_takhu.woff') format('woff'),
    url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar_takhu.ttf') format('opentype'),
	url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar_takhu.svgz#webfontPga0uKRT') format('svg'),
	url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar_takhu.svg#webfontPga0uKRT') format('svg');
	font-weight: bold;
	font-style: normal;
    unicode-range:U+1000-1097;
    text-rendering: optimizeLegibility;
  }
@font-face {
  font-family: 'Ayar Juno';
  src: url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar_juno.eot');
  src: local('Ayar Juno'),
	url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar_juno.woff') format('woff'),
    url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar_juno.ttf') format('opentype'),
	url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar_juno.svgz#webfontn0PFpV0z') format('svg'),
	url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar_juno.svg#webfontn0PFpV0z') format('svg');
	font-weight: bold;
	font-style: normal;
    unicode-range:U+1000-1097;
    text-rendering: optimizeLegibility;
  }
@font-face {
  font-family: 'Ayar Wazo';
  src: url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar_wazo.eot');
  src: local('Ayar Wazo'),
	url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar_wazo.woff') format('woff'),
    url('<?php echo A2Z_PLUGIN_URL; ?>/eot/Ayar_Wazo.ttf') format('opentype'),
	url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar_wazo.svgz#webfontFNSUhG79') format('svg'),
	url('<?php echo A2Z_PLUGIN_URL; ?>/eot/ayar_wazo.svg#webfontFNSUhG79') format('svg');
	font-weight: normal;
	font-style: normal;
    unicode-range:U+1000-1097;
    text-rendering: optimizeLegibility;
  }

    @font-face {
    font-family: Zawgyi-One;
    font-style:  oblique;
    font-weight: 700;
    src: url(<?php echo A2Z_PLUGIN_URL; ?>/eot/ZAWGYIO0.eot);
  }
    @font-face {
    font-family: Zawgyi-One;
    font-style:  normal;
    font-weight: normal;
    src: url(<?php echo A2Z_PLUGIN_URL; ?>/eot/ZAWGYIO3.eot);
  }
  @font-face {
    font-family: Zawgyi-One;
    font-style:  normal;
    font-weight: 700;
    src: url(<?php echo A2Z_PLUGIN_URL; ?>/eot/ZAWGYIO2.eot);
  }
  @font-face {
    font-family: Zawgyi-One;
    font-style:  oblique;
    font-weight: normal;
    src: url(<?php echo A2Z_PLUGIN_URL; ?>/eot/ZAWGYIO1.eot);
  }
  @font-face {
    font-family: Zawgyi-One;
    src: url(<?php echo A2Z_PLUGIN_URL; ?>/eot/Zawgyi-One.ttf) ; /* TTF file for CSS3 browsers */
    unicode-range:U+1000-1097;
  }
*{font-family: ayar,"ayar juno","ayar takhu","ayar kasone","ayar nayon","ayar wazo","ayar wagaung","ayar tawthalin","ayar thadingyut","ayar tazaungmone","ayar typewriter";}
#body{
<?php 
date_default_timezone_set('Asia/Rangoon');//here set your timezone;
$url = A2Z_PLUGIN_URL;
$img = date(l);
echo "background: url('$url/img/$img.png');";
?>
    }
#wd{
<?php 
$img = date(N);
if(($img == '7') || ($img == '6')){
echo "color:red;";}
else {
echo "color:#fff;";
}
?>
}
#wp-calendar tbody{font-size:12px !important; background:url(<?php echo A2Z_PLUGIN_URL; ?>/img/shadow.png) repeat !important;}
#wp-calendar tbody td{color:#777;font-weight:bold;background:url(<?php echo A2Z_PLUGIN_URL; ?>/img/tdshadow.png) repeat !important;margin:1px !important;}
#wp-calendar tbody td.sun{color:#fff;background:url(<?php echo A2Z_PLUGIN_URL; ?>/img/sunbk.png) repeat !important;}
#wp-calendar tbody td.sat{color:#fff;background:url(<?php echo A2Z_PLUGIN_URL; ?>/img/satbk.png) repeat !important;}
#wp-calendar caption {background:url(<?php echo A2Z_PLUGIN_URL; ?>/img/shadow.png) repeat !important;}
	/*this is end of burmese css from a2z*/
	</style>
<!--[if IE]>
<style type='text/css'>
a{ font-family:Ayar,Ayar Juno,Ayar Takhu, Ayar Wazo, Tahoma, Arial, Helvetica, serif; text-rendering: optimizeLegibility;}
#adminmenu .wp-submenu a{font:normal 11px/18px Ayar,Ayar Juno,Ayar Takhu, Ayar Wazo, Tahoma, Arial, Helvetica, serif; text-rendering: optimizeLegibility;}
#adminmenu a.menu-top,#adminmenu .wp-submenu-head{font:normal 13px/18px Ayar,Ayar Juno,Ayar Takhu, Ayar Wazo, Tahoma, Arial, Helvetica, serif; text-rendering: optimizeLegibility;}
#footer,#footer a{font-family:Ayar,Ayar Juno,Ayar Takhu, Ayar Wazo, Tahoma, Arial, Helvetica, serif; text-rendering: optimizeLegibility;}
p.help,p.description,span.description,.form-wrap p{font-family:Ayar,Ayar Juno,Ayar Takhu, Ayar Wazo, Tahoma, Arial, Helvetica, serif; text-rendering: optimizeLegibility;}
#utc-time,#local-time{font-family:Ayar,Ayar Juno,Ayar Takhu, Ayar Wazo, Tahoma, Arial, Helvetica, serif; text-rendering: optimizeLegibility;}
</style>
<![endif]-->
<script src="<?php echo A2Z_PLUGIN_URL; ?>/js/burmese.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="<?php echo A2Z_PLUGIN_URL; ?>/js/zgayar.js"></script>
<script type="text/javascript" src="<?php echo A2Z_PLUGIN_URL; ?>/js/ayarzg.js"></script>
<script type="text/javascript">
original_content_font = 'ayar,"ayar juno","ayar takhu","ayar kasone","ayar nayon","ayar wazo","ayar wagaung","ayar tawthalin","ayar thadingyut","ayar tazaungmone","ayar typewriter"';
display_content_font = 'ayar,"ayar juno","ayar takhu","ayar kasone","ayar nayon","ayar wazo","ayar wagaung","ayar tawthalin","ayar thadingyut","ayar tazaungmone","ayar typewriter"';

function init() {
// quit if this function has already been called
if (arguments.callee.done) return;

// flag this function so we don't do the same thing twice
arguments.callee.done = true;

if (original_content_font == 'zawgyi-one'){
toA();
}
else if (original_content_font == 'ayar'){
toZ();
}
if (display_content_font == 'zawgyi-one'){
toZ();
}
else if (display_content_font == 'ayar'){
toA();
}
};

/* for Mozilla */
if (document.addEventListener) {
document.addEventListener("DOMContentLoaded", init, false);
}

window.onload = init;
</script>

<script>
function stoperror(){
return true
}
window.onerror=stoperror;
</script>

<?php
}
add_action('wp_head', 'a2z_head');
add_action('admin_head', 'a2z_head');
add_action('login_head', 'a2z_head');
add_action('register_head', 'a2z_head');

 function a2z_footer() {
?>
<!-- /*a2z footer*/ -->

<div class="otf">
<a id="A" class="selected" href="javascript:" onclick="if 
(this.className=='selected')return;toA();this.className='selected';document.getElementById('Z').className=''">
AYAR FONT</a>
</div>
<div class="otf" style="right: 0px;">
<a id="Z" href="javascript:" onclick="if 
(this.className=='selected')return;toZ();this.className='selected';document.getElementById('A').className=''">

ZAWGYI FONT</a>
</div>
<script type="text/javascript" src="http://ayar.co/script/xhr.js"></script>
<script type="text/javascript" src="http://ayar.co/script/clickeffect.js"></script>
<script type="text/javascript">
siteclick_base="http://ayar.co/plugin.php?page=1&q=";
siteclick_translatable="";
siteclick_target="_blank";
siteclick_tip="";
</script>
<?php
}
add_action('wp_footer', 'a2z_footer');
add_action('login_form', 'a2z_footer');
add_action('register_form', 'a2z_footer');
add_action('retrieve_password', 'a2z_footer');
add_action('password_reset', 'a2z_footer');
add_action('lostpassword_form', 'a2z_footer');
add_action('admin_footer', 'a2z_footer');

function mon_calendar() {  ?>
<div style="padding:0px;align:center;" id="body"><div id="imgBackground">
<script type="text/javascript" src="<?php echo A2Z_PLUGIN_URL; ?>/js/moncal.js"></script>
</div></div>
 <?php } 
function widget_mon_calendar($args) {
	extract($args); 
	echo $before_widget;
			echo $args['before_title'];
	_e('Mon Calendar','a2z');
			echo $args['after_title'];
	mon_calendar();
	echo $after_widget; 
}
register_sidebar_widget(__('Mon Calendar','a2z'), 'widget_mon_calendar');
function burmese_calendar() {  ?>
<div style="padding:0px;align:center;" id="body"><div id="imgBackground">
<script type="text/javascript" src="<?php echo A2Z_PLUGIN_URL; ?>/js/mmcal.js"></script>
</div></div>
 <?php } 
function widget_burmese_calendar($args) {
	extract($args); 
	echo $before_widget;
			echo $args['before_title'];
	_e('Burmese Calendar','a2z');
			echo $args['after_title'];
	burmese_calendar();
	echo $after_widget; 
}
register_sidebar_widget(__('Burmese Calendar','a2z'), 'widget_burmese_calendar');
function admin_css(){
	global $wp_styles;
	$handle="admin_css";
	$src= A2Z_PLUGIN_URL.'/admin_css.css';
	wp_register_style( $handle, $src);
	wp_enqueue_style( 'admin_css',0);
}
if (get_bloginfo('language') == 'my-MM' ){
add_action('admin_init','admin_css',0);
}
?>