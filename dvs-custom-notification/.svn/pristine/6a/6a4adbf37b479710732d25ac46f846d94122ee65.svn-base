<?php
/*
Plugin Name: DVS Custom Notification
Plugin URI: http://www.finderonly.net/projects/
Description: Custom Notification by DVS enables to write announcement/ notification or call to action to visitor using any HTML or javascript code. This plugin is fully customizeable, 2 notification types (styles), resizeable notification box, 9 placement options (compass) and super fast loads.
Author: Deddy SM
Author URI: http://www.finderonly.net
Version: 1.0.1

DVS Custom Notification
Copyright (C) 2012, Deddy S. Munawar - az.elminwarie@gmail.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
// DEFINE BASE PLUGIN URL
define('DVSQN_URL', WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) );

// SET DEFAULT OPTION
register_activation_hook(__FILE__,'dvs_cnote_option');

// KEEP YOUR DATABASE CLEAN WHEN DISABLED
register_deactivation_hook( __FILE__, 'dvs_cnote_option_remove' );

function dvs_cnote_option() {
	if (function_exists('current_user_can')) {
		if (!current_user_can('manage_options')) return;
	} else {
		global $user_level;
		get_currentuserinfo();
		if ($user_level < 8) return;
	}
	if (function_exists('add_options_page')) {
		add_options_page(__('DVS Custom Notification'), __('Custom Notification'), 'manage_options', 'DVS-Custom-Notification', 'dvs_cnote_option_page');
	}
}
function dvs_cnote_option_remove() {
delete_option('dvs_cnote');
}

add_action('admin_menu', 'dvs_cnote_option');
$dvs_cnote_options['show_cnote'] = '';
$dvs_cnote_options['cnote_instance'] = 'Write Your Notification here...';
$dvs_cnote_options['cnote_custom_code'] = '';
$dvs_cnote_options['cnote_position'] = 'top';
$dvs_cnote_options['bg_start_color'] = '#25587E';
$dvs_cnote_options['bg_end_color'] = '#387AAB';
$dvs_cnote_options['show_cnote_2'] = '';
$dvs_cnote_options['cnote_instance_2'] = 'Write Your Notification here...';
$dvs_cnote_options['cnote2_title'] = 'Custom Notification';
$dvs_cnote_options['cnote2_width'] = '240px';
$dvs_cnote_options['cnote2_height'] = '100px';
$dvs_cnote_options['cnote2_position'] = '2';
$dvs_cnote_options['dvs_credit'] = 'Y';
add_option('dvs_cnote', $dvs_cnote_options);

function dvs_cnote_option_page(){
	global $wpdb;
	if (isset($_POST['update_options'])) {
        $options['show_cnote'] = trim($_POST['show_cnote'],'{}');
		$options['cnote_instance'] = trim($_POST['cnote_instance'],'{}');
		$options['cnote_custom_code'] = trim($_POST['cnote_custom_code'],'{}');
		$options['cnote_position'] = trim($_POST['cnote_position'],'{}');
		$options['bg_start_color'] = trim($_POST['bg_start_color'],'{}');
		$options['bg_end_color'] = trim($_POST['bg_end_color'],'{}');
		$options['show_cnote_2'] = trim($_POST['show_cnote_2'],'{}');
		$options['cnote_instance_2'] = trim($_POST['cnote_instance_2'],'{}');
		$options['cnote2_title'] = trim($_POST['cnote2_title'],'{}');
		$options['cnote2_width'] = trim($_POST['cnote2_width'],'{}');
		$options['cnote2_height'] = trim($_POST['cnote2_height'],'{}');
		$options['cnote2_position'] = trim($_POST['cnote2_position'],'{}');
		$options['dvs_credit'] = trim($_POST['dvs_credit'],'{}');
		update_option('dvs_cnote', $options);
		echo '<div class="updated"><p>' . __('Options saved') . '</p></div>';
	} else {
		$options = get_option('dvs_cnote');
	}
?>
<link rel='stylesheet' href='<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/inc/admin.css' type='text/css' media='screen' />
<div class="wrap">
<h2>DVS Custom Notification Setting</h2>
<div class="metabox-holder">
	<div class="postbox-container" style="width:69%;margin-right:5px">
	<div class="postbox"><h3>Like this Plugin?</h3>
		<div class="inside">
		<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Ffacebook.com%2FD.Artchitext&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;font=lucida+grande&amp;colorscheme=light&amp;height=31" scrolling="no" frameborder="0" style="border:none;overflow:hidden;width:450px; height:31px;" allowTransparency="true"></iframe><br/><span>I'm actively listening to your feedback and fixing problems, any suggestions are kindly welcome. Please let me know if you like the plugin too!</span>
		</div>
	</div>
	<form method="post" action="">
	<div class="postbox"><h3>Notification Type 1</h3>
		<div class="inside">
		<input type="checkbox" name="show_cnote" value="show" <?php if ($options['show_cnote'] == 'show') echo 'checked="checked"'; ?> />&nbsp; <b>Show Notification</b><br/>
		<b><?php _e('Notification Placement: ') ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="cnote_position" size="9" value="<?php echo $options['cnote_position']; ?>" />&nbsp;&nbsp;&nbsp;(Use top or bottom only)<br/>
		<textarea name="cnote_instance" rows="5" cols="100"><?php echo htmlspecialchars(stripcslashes($options['cnote_instance'])); ?></textarea>
		<br/>Use plain text or any HTML code, even javascripts are allowed. To make it more attractive you can add special effects like smooth scrolling. <a href="http://www.finderonly.net/projects/4-in-1-widget-by-dvs-must-used-plugin/#scrollercode" target="_blank">Get scroller code...</a><br/>
		<b>Custom Code</b><br/>
		<textarea name="cnote_custom_code" rows="4" cols="100"><?php echo htmlspecialchars(stripcslashes($options['cnote_custom_code'])); ?></textarea>
		<br/>Use this to show your facebook or twitter URL with icon, etc. or use the following code as example:<br/>
		<div id="spoiler">
<input style="font-size: 11px; font-weight: bold; margin: 5px; padding: 0px;" onclick="if (this.parentNode.parentNode.getElementsByTagName('div')['show'].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')['show'].style.display = ''; this.parentNode.parentNode.getElementsByTagName('div')['hide'].style.display = 'none'; this.innerText = ''; this.value = 'Close'; } else { this.parentNode.parentNode.getElementsByTagName('div')['show'].style.display = 'none'; this.parentNode.parentNode.getElementsByTagName('div')['hide'].style.display = ''; this.innerText = ''; this.value = 'See Again'; }" name="button" type="button" value="View Example" />
<div id="show" style="border:1px solid #eeeeee;display:none;margin:5px;padding:3px;width:97%;">
<code>&lt;a href=&quot;<b>YourTwitterURL</b>&quot; target=&quot;_blank&quot; title=&quot;<u>Follow Me!</u>&quot;&gt;&lt;img src=&quot;<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/img/twitter.png&quot; width=&quot;25&quot; height=&quot;25&quot;>&lt;/a&gt; &lt;a href=&quot;<b>YourFacebookURL</b>&quot; target=&quot;_blank&quot; title=&quot;<u>Find Us on Facebook</u>&quot;&gt;&lt;img src=&quot;<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/img/fb.png&quot; width=&quot;25&quot; height=&quot;25&quot;>&lt;/a&gt; &lt;a href=&quot;<b>OthersURL</b>&quot; target=&quot;_blank&quot; title=&quot;<u>???</u>&quot;&gt;&lt;img src=&quot;<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/img/heart.png&quot;&gt;&lt;/a&gt;</code>
</div><div id="hide"></div></div>
<b>Background</b>
<p style="margin-top:0">The background uses gradient effect from two color, choose yours.<br/>
		<b>Start Color:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="bg_start_color" size="9" value="<?php echo $options['bg_start_color']; ?>" style="background-color:<?php echo $options['bg_start_color']; ?>;color:white"/><br/>
		<b>End Color:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="bg_end_color" size="9" value="<?php echo $options['bg_end_color']; ?>" style="background-color:<?php echo $options['bg_end_color']; ?>;color:white"/></p>	
	<div style="height:24px;float:right;width:65%;padding-top:5px;margin-top:-55px;background:<?php echo $options['bg_start_color']; ?>;background:-moz-linear-gradient(top, <?php echo $options['bg_start_color']; ?> 0%, <?php echo $options['bg_end_color']; ?> 75%);
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo $options['bg_start_color']; ?>), color-stop(75%,<?php echo $options['bg_end_color']; ?>));
	background:-webkit-linear-gradient(top, <?php echo $options['bg_start_color']; ?> 0%,<?php echo $options['bg_end_color']; ?> 75%);
	background:-o-linear-gradient(top, <?php echo $options['bg_start_color']; ?> 0%,<?php echo $options['bg_end_color']; ?> 75%);
	background:-ms-linear-gradient(top, <?php echo $options['bg_start_color']; ?> 0%,<?php echo $options['bg_end_color']; ?> 75%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $options['bg_start_color']; ?>', endColorstr='<?php echo $options['bg_end_color']; ?>',GradientType=0);
	background:linear-gradient(top, <?php echo $options['bg_start_color']; ?> 0%,<?php echo $options['bg_end_color']; ?> 75%);"><center><span style="font-family:Michroma;font-size:13px;letter-spacing:0.3em;"class="feedburnerFeedBlock"><a href="http://www.finderonly.net/projects/"target="blank"><font color="white">Custom Notification by DVS</font></a></span></center>
		</div>
		</div>
	</div>
	<div class="postbox"><h3>Notification Type 2</h3>
		<div class="inside">
		<input type="checkbox" name="show_cnote_2" value="show" <?php if ($options['show_cnote_2'] == 'show') echo 'checked="checked"'; ?> />&nbsp;<b>Show Notification2</b><br/>
	<b>Notification Title:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="cnote2_title" size="25" value="<?php echo $options['cnote2_title']; ?>"/><br/>
	<b>Notification Size:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Width:<input type="text" name="cnote2_width" size="5" value="<?php echo $options['cnote2_width']; ?>"/> Height:<input type="text" name="cnote2_height" size="5" value="<?php echo $options['cnote2_height']; ?>"/>
	<br/>
	<b>Notification Position:</b><br/>
	<input name="cnote2_position" type="radio" value="9"<?php checked('9', $options['cnote2_position']) ?>> Center<br/>
	<input name="cnote2_position" type="radio" value="1"<?php checked('1', $options['cnote2_position']) ?>> Right Top<br/>
	<input name="cnote2_position" type="radio" value="7"<?php checked('7', $options['cnote2_position']) ?>> Right Middle <br/>
	<input name="cnote2_position" type="radio" value="2"<?php checked('2', $options['cnote2_position']) ?>> Right Bottom<br/>
	<input name="cnote2_position" type="radio" value="6"<?php checked('6', $options['cnote2_position']) ?>> Center Bottom<br/>
	<input name="cnote2_position" type="radio" value="3"<?php checked('3', $options['cnote2_position']) ?>> Left Bottom<br/>
	<input name="cnote2_position" type="radio" value="8"<?php checked('8', $options['cnote2_position']) ?>> Left Middle<br/>
	<input name="cnote2_position" type="radio" value="4"<?php checked('4', $options['cnote2_position']) ?>> Left Top<br/>
	<input name="cnote2_position" type="radio" value="5"<?php checked('5', $options['cnote2_position']) ?>> Center Top<br/>
	<textarea name="cnote_instance_2" rows="5" cols="100"><?php echo htmlspecialchars(stripcslashes($options['cnote_instance_2'])); ?></textarea>
	<span>Besides notification, you can also use this plugin to insert any widget based on html/ javascript code, like this facebook fan page (replace with yours).</span>
		<div id="spoiler">
	<input style="font-size: 11px; font-weight: bold; margin: 5px; padding: 0px;" onclick="if (this.parentNode.parentNode.getElementsByTagName('div')['show'].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')['show'].style.display = ''; this.parentNode.parentNode.getElementsByTagName('div')['hide'].style.display = 'none'; this.innerText = ''; this.value = 'Close'; } else { this.parentNode.parentNode.getElementsByTagName('div')['show'].style.display = 'none'; this.parentNode.parentNode.getElementsByTagName('div')['hide'].style.display = ''; this.innerText = ''; this.value = 'See Again'; }" name="button" type="button" value="View Code" />
	<div id="show" style="border:1px solid #eeeeee;display:none;margin:5px;padding:3px;width:97%;">
	<code>&lt;iframe src=&quot;http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Ffacebook.com%2F<b>D.Artchitext</b>&amp;amp;layout=standard&amp;amp;show_faces=true&amp;amp;width=220&amp;amp;action=like&amp;amp;font=lucida+grande&amp;amp;colorscheme=light&amp;amp;height=65&quot; scrolling=&quot;no&quot; frameborder=&quot;0&quot; style=&quot;border:none; overflow:hidden; width:220px; height:65px;&quot; allowTransparency=&quot;true&quot;&gt;&lt;/iframe&gt;</code>
	</div><div id="hide"></div></div>
		</div>
	</div>
		</div>
		<!--SIDEBAR-->
	<div class="postbox-container" style="width:23%;">
	<div class="postbox "><h3>Donation &amp; Support</h3>
		<div class="inside">
		<p>I have spent hundreds of hours creating <font color="red">this free plugin</font>.Please consider making a donation. $20, $10, $5, or $3,any small amount will be much appreciated, Thank you!
		<center><a style="cursor:pointer;" onclick="href='https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=PWTB4H5VHZUWE'" target="_blank"><img src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" width="160" height="47" alt="Donate via PayPal to support Plugin development"></a>
		</center>If you like this plugin, please show your appreciaton by giving your Good Rate for <a href="http://wordpress.org/extend/plugins/dvs-custom-notification/" target="_blank">this plugin at wordpress.org</a> or maybe just give the Author a credit. Your smile is my satisfaction.</p><span><input type="checkbox" name="dvs_credit" value="Y" <?php if ($options['dvs_credit'] == 'Y') echo 'checked="checked"'; ?> />&nbsp;<?php _e('<span title="In small &quot;?&quot;, I&#039;m thanking You if you do.">Thanks credit</span>') ?></span>
		</div>
	</div>
	<div class="postbox "><h3>Other Plugins</h3>
		<div class="inside">
		<ul><li><a href="http://www.finderonly.net/projects/4-in-1-widget-by-dvs-must-used-plugin/"target="_blank">4 in 1 Widget</a>, a small but powerfull plugin contains Random Featured Posts, Mp3 Player, Quick Notice + ShareButton in one.</li>
		<li><a href="http://www.finderonly.net/projects/stylish-embeddable-flash-mp3-player/"target="_blank">Stylish Mp3 Player</a>, an Mp3 Player based on flash. Enable multi file playing, autostart, shuffle, and repeat funtionality.</li></ul>
		</div>
	</div>
	<div class="postbox "><h3>Latest From DVS</h3>
		<script language="JavaScript" src="http://feeds.feedburner.com/internet-multimedia-tips?format=sigpro&nItems=3&openLinks=new&displayDate=false&displayEnclosures=true" type="text/javascript"></script>
		<script language="JavaScript" src="http://feeds.feedburner.com/d-artchitextweblog?format=sigpro&nItems=2&openLinks=new" type="text/javascript"></script>
	</div>	
	</div>
<!--END SIDEBAR-->
<div style="clear:both"></div>
<tr><td><input type="submit" name="update_options" value="<?php _e('Save Changes') ?>"  style="font-weight:bold;margin-bottom:5px" /></td></tr>
	</form>
	</div>
</div>
	<div class="postbox-container" style="width: 99%;">
<div class="metabox-holder">
		<div id="copyright" class="postbox" align="center">
		<p>Copyright &copy; 2011 - <script type="text/javascript" language="JavaScript">var today = new Date();document.write(today.getFullYear());</script> by D-Artchitext on DVS&trade; (<a href="http://www.finderonly.net"target="_blank">Damn's Virtual Studio</a>).<br/>Feel free to <a href="mailto:az.elminwarie@gmail.com">contact me</a> if you need help with the plugin.</p>
		</div>
	</div>
</div>

<?php	
}
function show_dvs_cnote() {
global $wpdb;
   $options = get_option('dvs_cnote');
   if ($options['show_cnote'] != 'show') return;
   if (empty($options['cnote_instance'])) {
      $cnote_instance = 'Write Your Notification here...';
   } else {
      $cnote_instance = $options['cnote_instance'];
   }
   if (empty($options['cnote_custom_code'])) {
      $cnote_custom_code = '';
   } else {
      $cnote_custom_code = $options['cnote_custom_code'];
   }
   echo "<!-- Quick Notification by DVS v1.0.1 - http://www.finderonly.net/projects/ -->\n<div id='DVS_cnote_env' align='center'><div class='liner'></div><div class='cnote_bg'>";
   // custom code
   echo "<div id='dvs_custom_code'>";
   echo stripcslashes($options['cnote_custom_code']); 
   echo "</div>";
   echo "<div id='cnote_content'>";
   echo stripcslashes($options['cnote_instance']);
   echo "</div>";
   // close
   echo"<div id='cnote_close'><a href='#' onclick='document.getElementById(&quot;DVS_cnote_env&quot;).style.display=&quot;none&quot;;return false;'title='Close'><img width='13' height='13' src='",DVSQN_URL."/img/close.png' alt='x' /></a>";
   if ($options['dvs_credit'] == 'Y') {	
	echo "<a href='http://www.finderonly.net/projects/'title='Custom Notification by DVS'target='_blank'><span style='float:right;margin:-1px -5px 0;padding:0px 0 0 0;color:#eeeeee;font-size:9pt;font-family:Times New Roman'>?</span></a>";	
	} else {
	echo "\n<!-- Oops, no credit intact, FYI Custom Notification plugin can be found at http://www.finderonly.net/projects/ -->\n";
	}
   echo"</div>";
   echo "</div></div>";
   echo "<div id='cnote_open'><a href='#' onclick='document.getElementById(&quot;DVS_cnote_env&quot;).style.display=&quot;block&quot;;return false;' >Show Notification</a></div>";
   include_once ('inc/nomobile_bar.php');
}
// TYPE 2
function show_dvs_cnote_2() {
global $wpdb;
   $options = get_option('dvs_cnote');
   if ($options['show_cnote_2'] != 'show') return;
   if (empty($options['cnote_instance_2'])) {
      $cnote_instance_2 = 'Write Your Notification here...';
   } else {
      $cnote_instance_2 = $options['cnote_instance_2'];
   }
   if (empty($options['cnote2_title'])) {
      $cnote2_title = 'Custom Notification';
   } else {
      $cnote2_title = $options['cnote2_title'];
   }
   if ($options['cnote2_position'] == '1') {
   echo "<div id='DVS_cnote_2'><div id='pos1'>";
   } elseif ($options['cnote2_position'] == '2'){
   echo "<div id='DVS_cnote_2'><div id='pos2'>";
   } elseif ($options['cnote2_position'] == '3'){
   echo "<div id='DVS_cnote_2'><div id='pos3'>";
   } elseif ($options['cnote2_position'] == '4'){
   echo "<div id='DVS_cnote_2'><div id='pos4'>";
   } elseif ($options['cnote2_position'] == '5'){
   echo "<div id='DVS_cnote_2'><div id='pos5'>";
   } elseif ($options['cnote2_position'] == '6'){
   echo "<div id='DVS_cnote_2'><div id='pos6'>";
   } elseif ($options['cnote2_position'] == '7'){
   echo "<div id='DVS_cnote_2'><div id='pos7'>";
   } elseif ($options['cnote2_position'] == '8'){
   echo "<div id='DVS_cnote_2'><div id='pos8'>";
   } elseif ($options['cnote2_position'] == '9'){
   echo "<div id='DVS_cnote_2'><div id='pos9'>";
   }
   echo"<div id='cnote_title'><a href='#' onclick='document.getElementById(&quot;DVS_cnote_2&quot;).style.display=&quot;none&quot;;return false;'title='Close'><img width='11' height='11' src='",DVSQN_URL."/img/close.png' alt='x' style='padding-top:5px' /></a> <span style='font-weight:bold'>$cnote2_title</span>";
   if ($options['dvs_credit'] == 'Y') {	
	echo "<a href='http://www.finderonly.net/projects/'title='Custom Notification by DVS'target='_blank'><span style='float:right;padding:5px 2px 0 0;color:#eeeeee;font-size:8pt;font-family:Times New Roman'>?</span></a>";	
	} else {
	echo "\n<!-- Oops, no credit intact, FYI Custom Notification plugin can be found at http://www.finderonly.net/projects/ -->\n";
	}
	echo"</div>";
	echo"<div class='cnote_content_2'>";
   echo stripcslashes($options['cnote_instance_2']);
	echo"</div>";
	echo"</div>
</div>";
   if ($options['cnote2_position'] == '1') {
   echo "<div id='cnote_open_2'><div id='open_1'><a href='#' onclick='document.getElementById(&quot;DVS_cnote_2&quot;).style.display=&quot;block&quot;;return false;' >$cnote2_title</a></div></div>";
   }   elseif ($options['cnote2_position'] == '2'){
   echo "<div id='cnote_open_2'><div id='open_2'><a href='#' onclick='document.getElementById(&quot;DVS_cnote_2&quot;).style.display=&quot;block&quot;;return false;' >$cnote2_title</a></div></div>";
   }   elseif ($options['cnote2_position'] == '3'){
   echo "<div id='cnote_open_2'><div id='open_3'><a href='#' onclick='document.getElementById(&quot;DVS_cnote_2&quot;).style.display=&quot;block&quot;;return false;' >$cnote2_title</a></div></div>";
   }   elseif ($options['cnote2_position'] == '4'){
   echo "<div id='cnote_open_2'><div id='open_4'><a href='#' onclick='document.getElementById(&quot;DVS_cnote_2&quot;).style.display=&quot;block&quot;;return false;' >$cnote2_title</a></div></div>";
   }
   elseif ($options['cnote2_position'] == '5'){
   echo "<div id='cnote_open_2'><div id='open_5'><a href='#' onclick='document.getElementById(&quot;DVS_cnote_2&quot;).style.display=&quot;block&quot;;return false;' >$cnote2_title</a></div></div>";
   } elseif ($options['cnote2_position'] == '6'){
   echo "<div id='cnote_open_2'><div id='open_6'><a href='#' onclick='document.getElementById(&quot;DVS_cnote_2&quot;).style.display=&quot;block&quot;;return false;' >$cnote2_title</a></div></div>";
   } elseif ($options['cnote2_position'] == '7'){
   echo "<div id='cnote_open_2'><div id='open_7'><a href='#' onclick='document.getElementById(&quot;DVS_cnote_2&quot;).style.display=&quot;block&quot;;return false;' >$cnote2_title</a></div></div>";
   } elseif ($options['cnote2_position'] == '8'){
   echo "<div id='cnote_open_2'><div id='open_8'><a href='#' onclick='document.getElementById(&quot;DVS_cnote_2&quot;).style.display=&quot;block&quot;;return false;' >$cnote2_title</a></div></div>";
   }
   include_once ('inc/nomobile_compass.php');
}
// CSS
function dvs_cnote_css() {
global $wpdb;
   $options = get_option('dvs_cnote');
      if (empty($options['bg_start_color'])) {
      $bg_start_color = '#25587E';
   } else {
      $bg_start_color = $options['bg_start_color'];
   }
   if (empty($options['bg_end_color'])) {
      $bg_end_color = '#387AAB';
   } else {
      $bg_end_color = $options['bg_end_color'];
   }
   if (empty($options['cnote2_width'])) {
      $cnote2_width = '240px';
   } else {
      $cnote2_width = $options['cnote2_width'];
   }
   if (empty($options['cnote2_height'])) {
      $cnote2_height = '100px';
   } else {
      $cnote2_height = $options['cnote2_height'];
   }
   if (empty($options['cnote_position'])) {
      $cnote_position = 'top';
   } else {
      $cnote_position = $options['cnote_position'];
   }
// width divider
	$halfer=2;// keep position centered by half negatif margin
	$width_half=$cnote2_width/$halfer.'px';
// height divider
	$height_half=$cnote2_height/$halfer.'px';
	echo "<!-- Quick Notification by DVS v1.0.1 - http://www.finderonly.net/projects/ -->
<style type='text/css' media='screen'>
#DVS_cnote_env{width:100%;height:33px;margin:0;position:fixed;$cnote_position:0px;left:0px;z-index:99999;}#cnote_open{position:fixed;right:1.7em;$cnote_position:0px;margin:21px 0;font-weight:bold;}
.liner{background:$bg_start_color;background-image:-webkit-gradient(radial,50% 50%,0,50% 50%,333, from($bg_start_color),to($bg_end_color));background-image:-moz-radial-gradient(center 45deg,circle cover,$bg_start_color,$bg_end_color);background:-o-radial-gradient(center,$bg_start_color 0%,$bg_end_color 75%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='$bg_start_color',endColorstr='$bg_end_color',GradientType=1);height:3px;}
.cnote_bg{background:$bg_start_color;background:-moz-linear-gradient(top,$bg_start_color 0%,$bg_end_color 75%);	background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,$bg_start_color),color-stop(75%,$bg_end_color));background:-webkit-linear-gradient(top,$bg_start_color 0%,$bg_end_color 75%);background:-o-linear-gradient(top,$bg_start_color 0%,$bg_end_color 75%);background:-ms-linear-gradient(top,$bg_start_color 0%,$bg_end_color 75%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='$bg_start_color',endColorstr='$bg_end_color',GradientType=0);background:linear-gradient(top,$bg_start_color 0%,$bg_end_color 75%);height:34px;}
#dvs_custom_code{float:left;margin:5px 2px 0 10px;width:12%;color:#FFFFFF;text-align:left;letter-spacing:.1em;}
#cnote_content{float:left;color:#FFF;font-family:Michroma,Comic Sans MS,calibri;font-size:12pt;padding-top:3px;width:82%;}
#cnote_content a{text-decoration:none;color:#A1FEFF;border-bottom:thin dotted}
#cnote_content a:hover{text-decoration:none;color:#52F3FF;}
#cnote_close{float:left;margin:11px 0 0 9px;width:3%}
/* notification type 2*/
#DVS_cnote_2,#pos1,#pos2,#pos3,#pos4,#pos5,#pos6,#pos7,#pos8,#pos9{width:$cnote2_width;height:$cnote2_height;position:fixed;z-index:1000;border:2px groove #F5F5F5;overflow:auto;background:white;}
#pos1{top:0px;right:0;}
#pos2{bottom:0;right:0;}
#pos3{bottom:0;left:0;}
#pos4{top:0;left:0;}
#pos5{left:50%;margin-left:-$width_half;top:0px;}
#pos6{left:50%;margin-left:-$width_half;bottom:0px;}
#pos7{right:0px;margin-top:-$height_half;top:50%;}
#pos8{left:0px;margin-top:-$height_half;top:50%;}
#pos9{left:50%;top:50%;margin-top:-$height_half;margin-left:-$width_half;}
#open_1{top:0px;right:1.7em;}
#open_2{bottom:0;right:1.7em;}
#open_3{bottom:0;left:1.7em;}
#open_4{top:0;left:1.7em;}
#open_5{top:0;left:50%;margin-left:-100px!important;}
#open_6{bottom:0;left:50%;margin-left:-100px!important;}
#open_7{top:50%;right:0px;margin-top:-$height_half!important;}
#open_8{top:50%;left:0px;margin-top:-$height_half!important;}
#cnote_open_2,#open_1,#open_2,#open_3,#open_4,#open_5,#open_6,#open_7,#open_8{position:fixed;margin-top:7px;margin-bottom:11px;font-weight:bold;}
#cnote_title{font-variant:small-caps;font-size:13px;font-family:Verdana,sans-serif;text-align:left;padding:0 0 5px 3px;color:white;height:17px;background:-moz-linear-gradient(right,$bg_end_color 0%,$bg_start_color 40%);background:-webkit-gradient(linear,left 80,right 10,color-stop(0.40,$bg_start_color),color-stop(1,$bg_end_color));background:-o-linear-gradient(top, $bg_start_color 0%,$bg_end_color 75%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='$bg_start_color', endColorstr='$bg_end_color',GradientType=0);}
.cnote_content_2{padding:2px 3px 0 3px;margin:0px;}
</style>
";
}

add_action('wp_head', 'dvs_cnote_css',2);
add_action('wp_footer', 'show_dvs_cnote');
add_action('wp_footer', 'show_dvs_cnote_2');
?>