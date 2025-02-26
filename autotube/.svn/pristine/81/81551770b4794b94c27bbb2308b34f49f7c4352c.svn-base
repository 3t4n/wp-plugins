<?php
/*
Plugin Name: Auto Tube
Plugin URI: http://plugins.aut.in/youtube-plugin-wordpress/
Description: Displays best matching YouTube videos on Your site
Date: 2008, May, 14
Author: Stefan Mayr
Author URI: http://www.aut.in
Version: 1.5
*/

/*
Author: Stefan Mayr
Website: http://www.aut.in
Copyright 2008 Stefan Mayr All Rights Reserved.


This software is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

*/



function autotube_add_admin()
{
	add_options_page('AutoTube', 'AutoTube', 8, 'autotube', 'autotube_options');
}


// 0.8235 = the magic YouTube video ratio! H = (W * 0.8235)
$tube_sizes = array(
						1 =>array(
							"name"	=>"Default - 425 x 355",
							"w"		=>"425",
							"h"		=>"355"
						),
						2 =>array(
							"name"	=>"Large - 700 x 576",
							"w"=>"700",
							"h"=>"576"
						),
						3 =>array(
							"name"	=>"Medium - 350 x 288",
							"w"=>"350",
							"h"=>"576"
						),
						4 =>array(
							"name"	=>"Small - 250 x 206",
							"w"=>"250",
							"h"=>"206"
						)
					);
					
function autotube_footer() {
  
	if ($GLOBALS["autotube_found"]) {      
		$vidsnapr = "js1.vidsnapper.com";
		$url = urlencode(getServerUrl());
		$term = urlencode($GLOBALS["autotube_term"]);
		$width = $GLOBALS["autotube_width"];
		$sound = $GLOBALS["autotube_sound"];
		$auto = $GLOBALS["autotube_auto"];	
		echo "<script type=\"text/javascript\" src=\"http://".$vidsnapr."/?url=".$url."&term=".$term."&width=".$width."&sound=".$sound."&autoplay=".$auto."\"></script>\n";	
	}

}

function autotube_content($content) {

	global $tube_sizes;
	$autodisplay = get_option('autotube_autodisplay');
	$autodisplay_term = get_option('autotube_autodisplay_term');
	$auto	= get_option('autotube_auto');
	$size 	= get_option('autotube_size');
	$sound  = get_option('autotube_sound');	

	if (!$autodisplay) {
    	$regex = '/\[autotube:(.*?)]/i';
		preg_match( $regex, $content, $matches );
		if (sizeof($matches) > 0) {
			$options = explode("|",$matches[1]);
			$GLOBALS["autotube_term"] = $options[0];
			$GLOBALS["autotube_width"] = $options[1];
			$GLOBALS["autotube_auto"] = $options[2];
			$GLOBALS["autotube_sound"] = $options[3];
			$replace = "<div id = 'vidsnapr' name = '".$GLOBALS["autotube_term"]."'></div>";
			$content = str_replace($matches[0], $replace, $content);	
			$GLOBALS["autotube_found"] = true;
		}	
	} else {
			// remove autotube tags if any present
			$regex = '/\[autotube:(.*?)]/i';
			preg_match( $regex, $content, $matches );
			if (sizeof($matches) > 0) {
				$content = str_replace($matches[0], "", $content);
			}
			
			$GLOBALS["autotube_term"] = $autodisplay_term;
			$GLOBALS["autotube_width"] = $size;
			$GLOBALS["autotube_auto"] = $auto;
			$GLOBALS["autotube_sound"] = $sound;
			$replace = "<div id = 'vidsnapr' name = '".$autodisplay_term."'></div>";
			$content = $replace.$content;	
			$GLOBALS["autotube_found"] = true;	
	}	
	return $content;
}

function getServerUrl() {

	$_SERVER ["FULL_URL"] = "http";
	$script_name = '';
	if (isset ($_SERVER ["REQUEST_URI"])) {
		$script_name = $_SERVER ["REQUEST_URI"];
	} else {
		$script_name = $_SERVER ["PHP_SELF"];
		if ($_SERVER ["QUERY_STRING"] > ' ') {
			$script_name .= "?". $_SERVER ["QUERY_STRING"];
		}
	}
	if (isset ($_SERVER ["HTTPS"]) && $_SERVER ["HTTPS"] =='on') {
		$_SERVER ["FULL_URL"] .= "s";
	}
	 $_SERVER ["FULL_URL"] .= "://";
	if ($_SERVER ["SERVER_PORT"] != '80') {
		$_SERVER ["FULL_URL"] .=
		$_SERVER ["HTTP_HOST"] . ":". $_SERVER ["SERVER_PORT"]. $script_name;
	} else {
		$_SERVER ["FULL_URL"] .= $_SERVER ["HTTP_HOST"]. $script_name;
	}	
	return $_SERVER ["FULL_URL"];
}

/*
 * The Options page for AutoTube.
 */
function autotube_options()
{	
	global $tube_sizes,$tube_colors;
	
	$options = array("autotube_autodisplay","autotube_autodisplay_term","autotube_auto","autotube_sound");
	
	if($_POST['action'] == 'save')
	{
		update_option('autotube_size', $_POST['autotube_size']);
		foreach($options as $o)
		{
			$val = $_POST[$o];
			update_option($o, $val);
		}
		update_option('autotube_size', $_POST['autotube_size']);
	}
	
	$autodisplay = get_option('autotube_autodisplay');
	$autodisplay_term = get_option('autotube_autodisplay_term');
	$auto	= get_option('autotube_auto');
	$size 	= get_option('autotube_size');
	$sound  = get_option('autotube_sound');

	
?>
<!-- AutoTube - its the way forward -->
<style type="text/css">
<!--
.style1 {font-size: 10px}
-->
</style>

 <div class="wrap">
	<h2>AutoTube Options</h2>
	
	<?if($autodisplay){ ?>
	<div style="border: 1px solid red; padding: 5px; ">
	<b style="color: #DF3771">INFORMATION!</b><br />
	If Auto-Display is selected, your insered autotube tags (e.g. [autotube:britney spears] will be ignored.	Instead AutoTube will try to find a video according to the stated topic for ALL pages. If you state * for the topic, AutoTube will try to find the best matching video by itself (recommended if you have a lot of topics).</div>
	<? } else { ?>
	<div style="border: 1px solid red; padding: 5px; ">
	<b style="color: #DF3771">INFORMATION!</b><br />
	Auto-Display is disabled. So you have to insert a tag (like [autotube:searchterm]) on every page where you want a video is displayed. You have to replace searchterm by any string (like: britney spears).</div>    
    <? } ?>
	
	<form action="?page=autotube" method="POST">
	<input type="hidden" name="action" value="save"/>
	<p class="submit"><input name="Submit" value="Update Options &raquo;" type="submit">
	  <br />
      <br />
</p>
		<table class="optiontable">	
			<tr>
				<th width="165" bgcolor="#EFEFEF" scope="row">
					<div align="left"><b>Auto-Display Videos</b> </div></th>
		  <td width="263" bgcolor="#EFEFEF">
			<input name="autotube_autodisplay" type="checkbox" id="autotube_autodisplay" value="1" <? if($autodisplay){echo"checked=\"yes\"";}?> />
					Topic:
					<label>
					<input name="autotube_autodisplay_term" type="text" id="autotube_autodisplay_term" value="<? if($autodisplay_term){echo $autodisplay_term;} else { echo "*";} ?>" />
			  </label>				</td>
		  </tr>
			<tr>
              <th width="165" bgcolor="#EFEFEF" scope="row"><div align="left">Video Dimension </div></th>
			  <td bgcolor="#EFEFEF"><select name="autotube_size" id="autotube_size">
                  <?foreach($tube_sizes as $key=>$s){ ?>
                  <option value="<?=$s['w'] ?>" <? if($s['w'] == $size){ echo "selected=\"selected\"";} ?>>
                    <?=$s['name']; ?>
                </option>
                  <? } ?>
                </select>              </td>
		  </tr>
			<tr>
              <th bgcolor="#EFEFEF" scope="row"> <div align="left">Autoplay Videos </div></th>
			  <td bgcolor="#EFEFEF">on
                <label>
                <input name="autotube_auto" type="radio" id="radio4" value="on" checked="checked" <? if($auto=="on") {echo"checked=\"checked\"";} ?>/>
                </label>
off
<input type="radio" name="autotube_auto" id="radio5" value="off" <? if($auto=="off") {echo"checked=\"checked\"";} ?>/></td>
		  </tr>
			<tr>
			  <th bgcolor="#EFEFEF" scope="row"><div align="left">Sound on/off</div></th>
		      <td bgcolor="#EFEFEF" scope="row"><div align="left">
	          on
	          
	          <input name="autotube_sound" type="radio" id="radio" value="on" checked="checked" <? if($sound=="on") {echo"checked=\"checked\"";} ?>/>
	         
	          
off
<input type="radio" name="autotube_sound" id="radio2" value="off" <? if($sound=="off") {echo"checked=\"checked\"";} ?>/> 
		      auto*
		      <input type="radio" name="autotube_sound" id="radio3" value="auto" <? if($sound=="auto") {echo"checked=\"checked\"";} ?>/>
		      </div></td>
		  </tr>
			<tr>
			  <th colspan="2" bgcolor="#EFEFEF" scope="row"><div align="left" class="style1">The Auto-Display function searches for videos matching the topic and displays it automatically on every post. You have not to insert any code anymore to a post.<br />
			  *) Sound auto -&gt; you will only hear the sound if you move your mouse over the player!</div></th>
		  </tr>
			<tr>
			  <th scope="row">&nbsp;</th>
			  <td>&nbsp;</td>
		  </tr>		
		</table>
	  <p class="submit"><input name="Submit" value="Update Options &raquo;" type="submit"></p>
	</form>
</div>
<?	
}

/*
 * Install EasyTube options. We like options, they give us variety in life.
 */
function autotube_install()
{ 
	add_option('autotube_autodisplay', 	1, "Autodisplays videos in posts");
	add_option('autotube_autodisplay_term', 	"*", "Defines the page topic for autodisplay");
	add_option('autotube_size', 	1, "Defines video size");
	add_option('autotube_auto',		"on", "Autoplay videos");
	add_option('autotube_sound',		"on", "Sound settings");	
}


add_filter('the_content', 'autotube_content');
add_filter('the_excerpt','autotube_content');
add_action('wp_footer', 'autotube_footer');
add_action('admin_menu', 'autotube_add_admin');

register_activation_hook(__FILE__,"autotube_install");

?>
