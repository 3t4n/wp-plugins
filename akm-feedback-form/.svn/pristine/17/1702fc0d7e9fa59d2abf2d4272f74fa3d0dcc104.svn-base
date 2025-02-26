<?php

/*
Plugin Name: AKM Feedback Form
Plugin URI: http://www.akaalmedia.com/
Description: Just insert the [AKMFORM] shortcode in pages of your WordPress site to display a simple and easy to use Feedback form.
Version: 1.0.1
Author: Akaal Media
Author URI: http://www.akaalmedia.com
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

This program is free software; you can redistribute it and/or modify 
it under the terms of the GNU General Public License as published by 
the Free Software Foundation; version 2 of the License.

This program is distributed in the hope that it will be useful, 
but WITHOUT ANY WARRANTY; without even the implied warranty of 
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the 
GNU General Public License for more details. 

You should have received a copy of the GNU General Public License 
along with this program; if not, write to the Free Software 
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA 
*/
function akm_widget() {
   echo akaal_contact_form('');
}

register_sidebar_widget("AKM Feedback Form", "akm_widget");
add_shortcode('AKMFORM', 'akaal_contact_form');
function akm_scripts() {
	wp_enqueue_style( 'akm-style', plugins_url('css/akm-contact-form.css', __FILE__ ));
	wp_enqueue_script( 'akm-script', plugins_url('js/akm-default.js', __FILE__ ), array( 'jquery' ));
}

add_action( 'wp_enqueue_scripts', 'akm_scripts');


function akaal_contact_form($atts)
{

$out.='<h3 class="widget-title">Feedback!</h3> 
<a name="akm-contact-form"></a>';
global $_POST;
global $post;
$FormErrors=FALSE;

if ($_POST['akm-send-msg'] && !$FormErrors) 
{  
$out.='<div class="akm-contact-form">
<span class="akm-tk">Thanks for you message!</span>
';
$emailakm= sanitize_email($_POST['akmemail']);
$nameakm= sanitize_text_field($_POST['akmname']);
$msgakm= sanitize_text_field($_POST['akmmsg']);
$now=date("Y-m-d H:i:s",time());
global $_SERVER;
$ipaddress=$_SERVER['REMOTE_ADDR'];
$email_html ="
<table border='0' cellpadding='5' cellspacing='0' width='50%'>
<tbody>
<tr>
<th style='text-align:left;'>From: </th>
<td>".$nameakm."</td>
</tr>
<tr>
<th style='text-align:left;'>Email: </th>
<td>".$emailakm."</td>
</tr>
<tr>
<th style='text-align:left;'>Message: </th>
<td>".$msgakm."</td>
</tr>
<tr>
<td colspan='2'>&nbsp;</td>
</tr>
<tr>
<th style='text-align:left;'>On: </th>
<td>".$now."</td>
</tr>
<tr>
<th style='text-align:left;'>IP address: </th>
<td>".$ipaddress."</td>
</tr>
</tbody>
</table>
";
 
$subject  = "Feedback from ".$nameakm;			
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.get_option('blogname').' <'.get_option('admin_email').'>  ';
  
 mail(get_option('admin_email'), $subject, $email_html, $headers);

$out.='</div>';
}

//if (!$_POST OR ($FormErrors && $_POST['akm-send-msg']))
//{
$out.='
<div class="akm-contact-form">
<form action="'. get_permalink().'#akm-contact-form" method="post" id="akmform" name="akmform">
<input id="akmname" type="text" name="akmname" value="Name"/>
<input id="akmemail" type="text" name="akmemail" value="Email"/>
<textarea id="akmsg" name="akmmsg">Message</textarea>
<input id="akmsend" type="submit" name="akm-send-msg" value="send"/>
</form>
</div>
<div style="clear: both;"></div>  
';
//}
 return $out;
}
 
?>