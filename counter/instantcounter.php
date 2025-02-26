<?php
/*
Plugin Name: Counter
Plugin URI: http://instant-counter.phpwelt.net/wordpress-plugin.html
Description: A simple visitor counter for WordPress. It is a simple widget. It also works with cached sites.
Author: Erik Sefkow
Version: 1.1
Author URI: http://www.phpwelt.net
*/


 
/*  
**		Copyright 2008 Erik Sefkow http://www.phpwelt.net
**
**    This program is free software; you can redistribute it and/or modify
**    it under the terms of the GNU General Public License as published by
**    the Free Software Foundation; either version 2 of the License, or
**    (at your option) any later version.
**
**    This program is distributed in the hope that it will be useful,
**    but WITHOUT ANY WARRANTY; without even the implied warranty of
**    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
**    GNU General Public License for more details.
**
**    You should have received a copy of the GNU General Public License
**    along with this program; if not, write to the Free Software
**    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
$c_version="1.1";
$c_rlc=7;

switch( WPLANG )
{
	case 'de_DE': 	$phpweltcounter_l = 0; $domain = 'de'; 	break;
	default: 	$phpweltcounter_l = 1; $domain = 'com'; 	break;
}

$phpweltcounter_lang = Array(

't1' => Array(
			'HTML-Code der davor eingef&uuml;gt wird:',
			'Htmlcode that will be inserted before counter: ',
		),
't2'=>array('HTML-Code der dahinter eingef&uuml;gt wird:',
			'Htmlcode that will be inserted behind counter:',
		),
't3'=>array('Reloadsperre:',
			'reloadbarrier',
		),
't4'=>array('Pfad zu Bildern (0-9):',
			'Path to pictures (0-9):',
		),
't5'=>array('Endung der Bilder (png/gif etc.):',
			'Fileextension (without leading dot, e.g.: "gif"):',
		),		
't6'=>array('Textausgabe',
			'raw text',
		),	
't7'=>array('Eigenes Design (siehe Pfad)',
			'my design (type in a sepezific path)',
		),		
't8'=>array('Statistik ansehen',
			'watch Logfile',
		),	
		);

	 
function phpweltinstantcounter_getopt($name){
	 
 
	if(get_option($name)===false) {
 

		add_option('phpweltinstantcounter_id',	phpweltinstantcounter_get_url("http://alterserver.phpwelt.net/portal/instcounter/wordpress-plugin/getnewid.php"),	'PHPWelt.net instantcounter',	'yes');
		add_option('phpweltinstantcounter_design',	"z1");
		add_option('phpweltinstantcounter_prehtml',	"<div align=\"center\">");
		add_option('phpweltinstantcounter_posthtml',	"</div>");
		add_option('phpweltinstantcounter_reload',	"3600");
		add_option('phpweltinstantcounter_designpath',	"");
		add_option('phpweltinstantcounter_designendung',	"");
		add_option('phpweltinstantcounter_vornullen',	0);
		add_option('phpweltinstantcounter_lastcache',	0);
		add_option('phpweltinstantcounter_alt',	0);
		 
	}
	if(get_option("phpweltinstantcounter_id")=="")update_option('phpweltinstantcounter_id',	phpweltinstantcounter_get_url("http://alterserver.phpwelt.net/portal/instcounter/wordpress-plugin/getnewid.php"));
	
	return get_option($name);
}
function phpweltinstantcounter_conf_save(){
	update_option('phpweltinstantcounter_design',	$_POST['design']);
	update_option('phpweltinstantcounter_prehtml',	stripslashes($_POST['phpweltinstantcounter_prehtml']));
	update_option('phpweltinstantcounter_posthtml',	stripslashes($_POST['posthtml']));
	update_option('phpweltinstantcounter_reload',	$_POST['reload']);
	update_option('phpweltinstantcounter_designpath',	$_POST['designpath']);
	update_option('phpweltinstantcounter_designendung',	$_POST['designendung']);
	update_option('phpweltinstantcounter_marker',	time());
	
}
if(isset($_POST['phpweltinstantcounter_prehtml'])){
		phpweltinstantcounter_conf_save();
	}

function phpweltinstantcounter_sidebar_widget ()
{
$lang=phpweltinstantcounter_getlang();
echo phpweltinstantcounter_getopt("phpweltinstantcounter_prehtml");
echo '<span id="counter"></span> 
<script language="JavaScript" type="text/javascript" src="http://img.vermessen.net/instcounter/ee.js"></script> 
<script>var style="margin:0px; display:inline; border:0px;";
var reload='.phpweltinstantcounter_getopt("phpweltinstantcounter_reload").';
var id='.phpweltinstantcounter_getopt("phpweltinstantcounter_id").';
var vornullen='.phpweltinstantcounter_getopt("phpweltinstantcounter_vornullen").';
var alterstand='.phpweltinstantcounter_getopt("phpweltinstantcounter_alt").';
var staturl="'.get_option('siteurl').'/wp-content/plugins/counter/showstat.php";
var marker="'.phpweltinstantcounter_getopt("phpweltinstantcounter_marker").'";
var design="'.phpweltinstantcounter_getopt("phpweltinstantcounter_design").'";';
if(phpweltinstantcounter_getopt("phpweltinstantcounter_design")=="owndesign")echo '	 	designpath="'.phpweltinstantcounter_getopt("phpweltinstantcounter_designpath").'";
var designendung="'.phpweltinstantcounter_getopt("phpweltinstantcounter_designendung").'";';
echo 'var lang="'.$lang.'";ee();</script><noscript><a href="http://www.sorben.org/counter/"><img border="0" src="http://img.vermessen.net/instcounter/keiner.png"></a></noscript> ';
echo phpweltinstantcounter_getopt("phpweltinstantcounter_posthtml");
}
function phpweltcounter_show(){phpweltinstantcounter_sidebar_widget ();}


function phpweltinstantcounter_getlang(){
	$lang=strpos(WPLANG,"_");
	if($lang!==false)$lang=substr(WPLANG,0,$lang);
	else $lang=WPLANG;
	if($lang=="")$lang="en";
	return $lang;
}
function phpweltinstantcounter_getstats($monat=0,$jahr=0){
 
	if($monat==0)$monat=date("m");
	if($jahr==0)$jahr=date("y");
	$lang=phpweltinstantcounter_getlang();
	$url="http://alterserver.phpwelt.net/portal/instcounter/stats.php?id=".phpweltinstantcounter_getopt("phpweltinstantcounter_id")."&monat=$monat&jahr=$jahr&lang=$lang&local=1&url=".get_option("siteurl");
	$name="statcache-".md5($url);
	#neuer monat
	if(date("m")!=date("m",get_option("phpweltinstantcounter_lastcache"))){
		$jahr2=$jahr;
		$monat2=$monat-1;
		if($monat2<1){
			$jahr2--;$monat2=12;
			if($jahr2<10)$jahr2="0$jahr2";
		}
	if($monat2<10 and substr($monat2,0,1)!="0")$monat2="0$monat2";
		$url2="http://alterserver.phpwelt.net/portal/instcounter/stats.php?id=".phpweltinstantcounter_getopt("phpweltinstantcounter_id")."&monat=$monat2&jahr=$jahr2&lang=$lang&local=1&url=".get_option("siteurl");
	$name2="statcache-".md5($url);
	}
	#std
	if(get_option($name)===false ){
		$text=phpweltinstantcounter_get_url($url);
		$t=phpweltinstantcounter_getopt("phpweltinstantcounter_lastcache");
		if($text!="fehler"){update_option("phpweltinstantcounter_lastcache",time());add_option($name,$text);}
	}
	elseif(($monat==date("m") && $jahr==date("y") && phpweltinstantcounter_getopt("phpweltinstantcounter_lastcache")<(time()+86400))){
		$text=phpweltinstantcounter_get_url($url);
		if($text!="fehler"){update_option($name,$text);update_option("phpweltinstantcounter_lastcache",time());}
	}
 
 	return get_option($name);
}

// Rest

function phpweltinstantcounter_listbookmarks(){
	$text= phpweltinstantcounter_get_url("http://instant-counter.phpwelt.net/wordpress-plugin/verfuegbar.php?url=".get_option("siteurl"));
	$text=(explode(chr(10),$text));
	return $text;

}

function phpweltinstantcounter_get_url($url)	{
 
	if (function_exists('file_get_contents')) {
		$file = file_get_contents($url);
	} else {
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$file = curl_exec($curl);
		curl_close($curl);
	}
	
	return $file;
}



// WIDGET

function phpweltinstantcounter_add_widget ()
{
	if (function_exists ('register_sidebar_widget'))
	{
		register_sidebar_widget (__('Counter', 'instantcounter'), 'phpweltinstantcounter_sidebar_widget');
		register_widget_control (__('Counter', 'instantcounter'), 'phpweltinstantcounter_widget_options', 300, 500);
	}
}
add_action ('init', 'phpweltinstantcounter_add_widget');
function phpweltinstantcounter_widget_options (){
 global $phpweltcounter_lang, $phpweltcounter_l;
 	$lang=strpos(WPLANG,"_");
	if($lang!==false)$lang=substr(WPLANG,0,$lang);
	else $lang=WPLANG;
	if($lang=="")$lang="en";
echo '
<form id="form1" name="form1" method="post" action="">
'.$phpweltcounter_lang["t1"][$phpweltcounter_l].'<br>
<textarea name="phpweltinstantcounter_prehtml" cols="36">'.phpweltinstantcounter_getopt("phpweltinstantcounter_prehtml").'</textarea><br><br>

';
echo '
<table width="100%" border="0">
  <tr>
    <td><input name="design" type="radio" ';
	  if(phpweltinstantcounter_getopt("phpweltinstantcounter_design")=="text")echo "checked ";
	echo ' value="text" /></td>
    <td>'.$phpweltcounter_lang["t6"][$phpweltcounter_l].'</td>
  </tr>


 ';
foreach (array("z1","z2")as $v){
  if($v!=""){echo '<tr>
      <td> <input name="design" type="radio" value="'.$v.'" ';
  
  if(phpweltinstantcounter_getopt("phpweltinstantcounter_design")==$v)echo "checked ";
  echo '></td>
    <td><img src="http://www.phpwelt.net/bilder/intantcouter/'.$v.'.png" border="0" /></td>
  </tr>
 ';}
}
echo '
  <tr>
    <td><input name="design" type="radio" value="owndesign" ';
 if(phpweltinstantcounter_getopt("phpweltinstantcounter_design")=="owndesign")echo "checked ";
    echo '/></td>
    <td>'.$phpweltcounter_lang["t7"][$phpweltcounter_l].'</td>
  </tr>
</table>
'.$phpweltcounter_lang["t4"][$phpweltcounter_l].' <input type="text" name="designpath" value="'.phpweltinstantcounter_getopt("phpweltinstantcounter_designpath").'"><br>
'.$phpweltcounter_lang["t5"][$phpweltcounter_l].' <input type="text" name="designendung" size="5" value="'.phpweltinstantcounter_getopt("phpweltinstantcounter_designendung").'"><br>

<br><br>

'.$phpweltcounter_lang["t2"][$phpweltcounter_l].'<br>
<textarea name="posthtml" cols="36">'.phpweltinstantcounter_getopt("phpweltinstantcounter_posthtml").'</textarea><br><br>
'.$phpweltcounter_lang["t3"][$phpweltcounter_l].' <input type="text" name="reload" value="'.phpweltinstantcounter_getopt("phpweltinstantcounter_reload").'"> Sek.<br>

<a target="_blank"  href="../wp-content/plugins/counter/showstat.php">'.$phpweltcounter_lang["t8"][$phpweltcounter_l].'</a><br><br>';
if(get_bloginfo("version")<2.5)  echo '<input name="submit" type="submit" value="Submit">';
echo '</form>



';
}
 
?>