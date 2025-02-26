<?php

/*

Plugin Name: Adsense Float

Version: 1.3

Description: This plugin will increase your site revenue tremendously. It shows google adsense vertical ads at left site of your site, which maximizes the CTR and revenue of your site.<br />
This plugin is compatible with google adsense policies.

You can also use it with any other ad network.

Author: Ahsan Sana

Author URI: http://www.ahsan.pk

Plugin URI: http://www.ahsan.pk/2011/05/wp-plugin-adsense-float/

*/

/*  Copyright 2011  ahsan.pk  



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

/* Version check */

global $wp_version;

$exit_msg='Adsense Float requires WordPress 2.8 or newer.

<a href="http://codex.wordpress.org/Upgrading_WordPress">Please

update!</a>';

if (version_compare($wp_version,"2.8","<"))

{

exit ($exit_msg);

}



add_action('admin_menu', 'adsense_float_menu');



function adsense_float_menu() {

	add_options_page('Adsense Float Settings', 'Adsense Float', 'manage_options', 'adsense-float', 'adsense_float_options_page');



	

//call register settings function

	add_action( 'admin_init', 'adsense_float_admin_init' );

function adsense_float_admin_init() {

	//register our settings

	register_setting( 'adsense_float_options', 'adsense_float_plugin_options');

}



function adsense_float_options_page() {

	?><div class="wrap">

<h2>Adsense Float</h2>



<form action="options.php" method="post">

<?php settings_fields( 'adsense_float_options' ); ?>

<?php $options = get_option('adsense_float_plugin_options'); ?>

<table width="700" border="1">

  <tr>

    <td align="left" valign="top"><p>Adsense Adcode:</p>
      <p style="font-size:10pt;">
        Please enter adsense code for 160x600 vertical ads only.
      </p></td>

    <td><textarea name="adsense_float_plugin_options[adsense_adcode]" cols="50" rows="10"><?php echo $options['adsense_adcode']; ?></textarea></td>

  </tr>

  <tr>

    <td align="right">&nbsp;</td>

    <td>&nbsp;</td>

  </tr>
   <td align="right"><input type="checkbox" name="adsense_float_plugin_options[credit]" value="1" <?php checked('1', $options['credit']); ?> /></td>
    <td>Disable Powered by Adsense Float link<br />
      Please consider writing a post about this plugin before disabling this option</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><p>&nbsp;</p>
      <p>This plugin will show one  author's ad per hundred impressions. By using this plugin you consent to display author's ad on your site.<br />
        Option to disable it will be made available in future versions.
      </p></td>
  </tr>
</table>
<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" /></form>

  <a href="http://bit.ly/adfloat" target="_new">Adsense Float Homepage</a> <a href="http://bit.ly/adfloat" target="_new">Help</a></br></br><a href="http://www.twitter.com/AdsenseFloat"><img src="http://twitter-badges.s3.amazonaws.com/follow_me-c.png" alt="Follow AdsenseFloat on Twitter"/></a></br></br>

<?php

}





}



function show_float_adsense() { 

 ?>

<div id="gad" style="position:fixed;left: 0px;top:2px;">

<?php

$options = get_option('adsense_float_plugin_options');
$url=get_site_url();
$auth_ad = "<script type=\"text/javascript\"><!--
google_ad_client = \"ca-pub-2969289166335945\";
/* Float Plugin */
google_ad_slot = \"2867187333\";
google_ad_width = 160;
google_ad_height = 600;
//-->
</script>
<script type=\"text/javascript\"
src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">
</script>";
if ($options['adsense_adcode'] == "")
   		echo $auth_ad;
		else
			{
				$random= mt_rand(1,100);
				if ($random == 47)
				echo $auth_ad;
				else echo $options['adsense_adcode'];
			}
			


if ($options['credit'] != 1) 
		echo "</br><p style=\"font-size:8pt;\"> Powered by <a href=\"http://www.ahsan.pk/2011/05/wp-plugin-adsense-float/\" target=\"_new\">Adsense Float</a></p>";
echo "</div>";
}

add_action('wp_footer', 'show_float_adsense');
add_action('wp_head', 'place_in_header');

function place_in_header ()
{
   echo "<style type=\"text/css\">
	html { margin-left: 160px !important; }
	* html body { margin-left: 160px !important; }
</style>";
}

?>