<?php
/*
Plugin Name: DashView
Plugin URI: http://wordpress.org/extend/plugins/dashview/
Description: DashView - The overview for the Admin
Version: 0.2
Author: kamerarauschen
Author URI: http://kamerarauschen.info
Licence: GPLv2
*/
/*  Copyright 2011  Dirk Regler  (email : admin@kamerarauschen.info)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (!defined('dashview_VERSION')) define('dashview_VERSION', '0.2');
if (!defined('dashview_PATH')) define('dashview_PATH', dirname(__FILE__));
if (!defined('dashview_URL')) define('dashview_URL', WP_PLUGIN_URL . '/dashview');

load_plugin_textdomain('dashview', false, 'dashview/i18n');

require_once( 'plugin_view.php' );

function add_admin_header() {
	print('
<link rel="stylesheet" href="'.dashview_URL.'/design/dashview.css" type="text/css" />
<script type="text/javascript">
<!--
function start() {
	time();
	window.setInterval("time()", 1000);
}
function time() {
	var now = new Date();
	hours   = now.getHours();
	minutes = now.getMinutes();
	seconds = now.getSeconds();

	thetime  = (hours < 10) ? "0" + hours + ":" : hours + ":";
	thetime += (minutes < 10) ? "0" + minutes + ":" : minutes + ":";
	thetime += (seconds < 10) ? "0" + seconds : seconds;

	element = document.getElementById("time");
	element.innerHTML = thetime;
}
//-->
</script>
');
}
add_action('admin_head', 'add_admin_header');

function generate_Date_Time(){
    $datum = date("d.m.Y");
    //$uhrzeit = date("H:i");
    echo "<div id='time_dashview'>" .$datum   ."  ";
    print ('
    <body onload="start();">
    <span id="time"></span>
    ');
    echo "</div>";
}

add_action( 'admin_notices', 'generate_Date_Time' );


function get_alexa_popularity($url)
{
global $alexa_backlink, $alexa_reach;
    $alexaxml = "http://xml.alexa.com/data?cli=10&dat=nsa&url=".$url;

    $xml_parser = xml_parser_create();
    $data=file_get_contents_curl($alexaxml);
    xml_parse_into_struct($xml_parser, $data, $vals, $index);
    xml_parser_free($xml_parser);
    $index_popularity = $index['POPULARITY'][0];
    $index_reach = $index['REACH'][0];
    $index_linksin = $index['LINKSIN'][0];
    //echo $index_popularity."<br />";
    //print_r($vals[$index_popularity]);
    $alexarank = $vals[$index_popularity]['attributes']['TEXT'];
    $alexa_backlink = $vals[$index_linksin]['attributes']['NUM'];
    $alexa_reach = $vals[$index_reach]['attributes']['RANK'];

    return $alexarank;
}


function alexa_backlink($url)
{
    global $alexa_backlink;
    if ($alexa_backlink!=0)
    {
        return $alexa_backlink;
    } else {
        $rank=get_alexa_popularity($url);
        return $alexa_backlink;
    }
}


function alexa_reach_rank($url)
{
    global $alexa_reach;
    if ($alexa_reach!=0)
    {
        return $alexa_reach;
    } else {
        $rank=get_alexa_popularity($url);
        return $alexa_reach;
    }
}


function file_get_contents_curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}


function GoogleBL($domain){
	$url="http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=link:".$domain."&filter=0";
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt ($ch, CURLOPT_HEADER, 0);
	curl_setopt ($ch, CURLOPT_NOBODY, 0);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	$json = curl_exec($ch);
	curl_close($ch);
	$data=json_decode($json,true);
	if($data['responseStatus']==200)
	return $data['responseData']['cursor']['resultCount'];
	else
	return false;
}
function GoogleIP($domain){
	$url="http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=site:".$domain."&filter=0";
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt ($ch, CURLOPT_HEADER, 0);
	curl_setopt ($ch, CURLOPT_NOBODY, 0);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	$json = curl_exec($ch);
	curl_close($ch);
	$data=json_decode($json,true);
	if($data['responseStatus']==200)
	return $data['responseData']['cursor']['resultCount'];
	else
	return false;
}

function getDMOZListings($domain) {
  $request = "http://data.alexa.com/data?cli=10&amp;url=" . $domain;
  $data = getPageData($request);
  preg_match('/<SITE BASE="(.*?)" TITLE="(.*?)" DESC="(.*?)">/si', $data, $s);
  $value1 = ($s[1]) ? $s[1] : "";
  $value2 = ($s[2]) ? $s[2] : "";
  $value3 = ($s[3]) ? $s[3] : "";
  preg_match('/<CAT ID="(.*?)" TITLE="(.*?)" CID="(.*?)"\/>/si', $data, $c);
  $value4 = ($c[1]) ? $c[1] : "";
  $value5 = ($c[2]) ? $c[2] : "";
  $value6 = ($c[3]) ? $c[3] : "";
  $string = "";
  if($value4) {
    $string = "<a href=\"http://www.dmoz.org/" . str_replace("Top/","", $value4) . "\" title=\"" . $value2 . " - " . $value3 . "\">" . $value5 . "</a>";
  }
  else $string = "". __('Not listed', 'dashview');
  return $string;
}

function getPageData($url) {
  if(function_exists('curl_init')) {
    $ch = curl_init($url); // initialize curl with given url
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // add useragent
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // write the response to a variable
    if((ini_get('open_basedir') == '') && (ini_get('safe_mode') == 'Off')) {
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow redirects if any
    }
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); // max. seconds to execute
    curl_setopt($ch, CURLOPT_FAILONERROR, 1); // stop when it encounters an error
    return @curl_exec($ch);
  }
  else {
    return @file_get_contents($url);
  }
}


function generate_dashview(){
    echo "<div id='top_dashview'>";
	echo '<table width="500" border="0">';
	echo  "<tr>"."<td>"."DashView ".dashview_VERSION."</td>";
	echo '</tr>';
    echo '</table>';
    echo "</div>";
	echo "<div id='content_dashview'>";
    echo '<table width="500" border="0">';
    echo "<tr>"."<td>". __('Your IP address is: ', 'dashview')."</td>"."<td>".$_SERVER["REMOTE_ADDR"]."</td>";
	$ip = $_SERVER['REMOTE_ADDR'];
	$host = gethostbyaddr($ip);
	echo "<tr>"."<td>". __('Your Hostname is: ', 'dashview')."</td>"."<td>"."$host"."</td>";
	echo "<tr>"."<td>"."<hr>"."</td>"."<td>"."<hr>"."</td>"; //Leerzeile
	echo "<tr>"."<td>". __('Servername: ', 'dashview')."</td>"."<td>",$_SERVER['SERVER_NAME']."</td>";
	echo "<tr>"."<td>". __('Serversoftware: ', 'dashview')."</td>"."<td>",$_SERVER['SERVER_SOFTWARE']."</td>";
	echo "<tr>"."<td>". __('Gateway-Interface: ', 'dashview')."</td>"."<td>",$_SERVER['GATEWAY_INTERFACE']."</td>";
	$PHPVersion = phpversion();
    echo "<tr>"."<td>". __('Your phpversion is: ', 'dashview')."</td>"."<td>". $PHPVersion."</td>";
    echo "<tr>"."<td>". __('Your server-IP is: ', 'dashview')."</td>"."<td>". $_SERVER['SERVER_ADDR']."</td>";
	//GET SERVER LOADS
    $loadresult = @exec('uptime');
    preg_match("/averages?: ([0-9\.]+),[\s]+([0-9\.]+),[\s]+([0-9\.]+)/",$loadresult,$avgs);
    //GET SERVER UPTIME
    $uptime = explode(' up ', $loadresult);
    $uptime = explode(',', $uptime[1]);
    $uptime = $uptime[0].', '.$uptime[1];
    $data_load .= "<tr>"."<td>".__('Server Load Averages:', 'dashview')."</td>"."<td>". " $avgs[1], $avgs[2], $avgs[3]\n"."</td>"; //Server Load Averages
    $data_uptime .= "<tr>"."<td>". __('Server Uptime:', 'dashview')."</td>"."<td>"." $uptime"."</td>";                             //Server Uptime
	echo $data_load;
    echo $data_uptime;
    $gesamt = 0;
    mysql_select_db("dbname");
    $query = "Show Table Status";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result))
         {
         $summe = $row["Index_length"] + $row["Data_length"];
         // echo "<br>" . "Tabelle " . $row["Name"] . ": $summe byte<br>";
         $gesamt += $summe;
    }
    $ergebnis1 = $gesamt / (1024*1024);
    $ergebnis2 = round($ergebnis1, 2);
    $adress1 = __('   Data bank tables Overview', 'dashview');
    $link1   = dashview_URL;
    echo "<tr>"."<td>". __('Database size: ', 'dashview')."</td>"."<td>". $ergebnis2 ."MB"."</td>";
    mysql_close();
	echo "<tr>"."<td>"."<hr>"."</td>"."<td>"."<hr>"."</td>"; //Leerzeile
    $url = $_SERVER['HTTP_HOST'];
    echo "<tr>"."<td>". __('Alexa ranking: ', 'dashview')."</td>"."<td>".get_alexa_popularity($url)."</td>"."</td>"."<td>"."<a href=\"http://www.alexa.com\" target=\"_blank\">Alexa.com</a>"; //Output: Alexa ranking
    echo "<tr>"."<td>". __('Alexa backlink: ', 'dashview')."</td>"."<td>".alexa_backlink($url)."</td>"."</td>"; //Output: Alexa backlink
	$domain=$_SERVER['SERVER_NAME']; //your domain name
	echo "<tr>"."<td>". __('Google backlink: ', 'dashview')."</td>"."<td>".GoogleBL($domain)."</td>"."</td>"; //Output: Google backlink
    echo "<tr>"."<td>". __('Google indexed page: ', 'dashview')."</td>"."<td>".GoogleIP($domain)."</td>"."</td>"; //Output: Google indizierte Seite (mittels API-Abruf)
    echo "<tr>"."<td>". __('DMOZ listing:', 'dashview')."</td>"."<td>".getDMOZListings($domain)."</td>";
	echo '</tr>';
    echo '</table>';
    echo '</div>';
}


add_action('activity_box_end', 'generate_dashview');


function dashview_nav() {
    add_menu_page("DashView", "DashView-DB-View", "manage_options", "DashView", "dashview_complete", plugin_dir_url( __FILE__ ).'/design/dv_icon_klein.png');
    }

add_action("admin_menu","dashview_nav");

function dashview_complete() {
	echo "<div id='top_dashview_complete'>" . "DashView  " . dashview_VERSION ."&emsp;&emsp;&emsp;&emsp;&emsp;".__('DB Table-View', 'dashview')."</div>";
	echo "<div id='content_dashview_complete'>";
	echo "<br>";
     $gesamt = 0;
     mysql_select_db("dbname");
     $query = "Show Table Status";
     $result = mysql_query($query);
     echo "<div id='complete_dashview'>";
     echo '<table width="595" border="0">';
     while ($row = mysql_fetch_array($result))
     {
     $summe = $row["Index_length"] + $row["Data_length"];
     echo "<tr>"."<td width=\"100\">" . __('Table: ', 'dashview')."</td>"."<td width=\"380\">" . $row["Name"] . "</td>"."<td width=\"100\">" .":$summe byte". "</td>" ;
     $gesamt += $summe;
     }
     echo '</tr>';
     echo '</table>';
     echo "</div>";
     $ergebnis1 = $gesamt / (1024*1024);
     $ergebnis2 = round($ergebnis1, 2);
     echo "</div>";
     echo "<div id='content_dashview_complete'>"."<b>" . __('Database size: ', 'dashview'). $ergebnis2 ."MB"."</b>"."</div>";
     mysql_close();
}
?>