<?php 
/**
 * @package kw-youtube-index
 * @author Laurent Bertrand
 * @version 1.0.1
 */

/**
 * @copyright 2011  Laurent Bertrand  ( email : kwark1(at)style-cataclysm.com )
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
 
 
/**
 * Bootstrap file for getting the ABSPATH constant to wp-load.php
 * This is requried when a plugin requires access not via the admin screen.
 *
 * If the wp-load.php file is not found, then an error will be displayed
 *
 * @package WordPress
 * @since Version 2.6
 */

/**<?php kw_bonus_display(); ?> One zone bonus **/

function kw_bonus_display() {
	
		$kw_eadb = get_option("kw_eadb"); 
		if ($kw_eadb !== "disable") { ?>
<?php
				$kw_adb = get_option("kw_adb");
				$kw_adb = stripslashes($kw_adb);

				if($kw_adb == "") {
					echo "&nbsp;";
				}
				else {
					echo "<div id=\"bonus_video\">$kw_adb</div>&nbsp;";
				}
				?>
<?php }
	}
	
/**Hook [shortcode] for function display **/

add_shortcode( 'kwvideobonus' , 'kw_bonus_display' ); 

/**Add menu admin in the Apparence menu **/

add_action('admin_menu', 'kw_bonus_menu');

function kw_bonus_menu() {
	add_theme_page('Bonus Options', 'Video bonus zone', 'manage_options', 'kw-youtube-bonus', 'kw_video');
}

function kw_video(){
    if(isset($_POST['submitted']) && $_POST['submitted'] == "yes"){
		
        /**Get form data**/
		
		$kw_eadb = $_POST['kw_eadb'];
		
		$kw_adb = stripslashes($_POST['kw_adb']);
		
		update_option("kw_adb", $kw_adb);
		update_option("kw_eadb", $kw_eadb);
	
        echo "<div id=\"message\" class=\"updated fade\"><p><strong>Your settings have been saved.</strong></p></div>";
    }
		
?>
<?php /**Start Form for Video**/?>

<div class="wrap">
<div id="theme-options-wrap">
  <div class="icon32" id="icon-tools"><br />
  </div>
  <h2> One Video zone bonus</h2>
  <p>Take control of your theme, with a one video zone bonus with your own specific preferences.</p>
  <p>This zone support html + css attribut, flash object and more... View readme text file for place this zone in your theme.</p>
  <div style="margin-left:620px; margin-top:69px;">
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="hidden" name="hosted_button_id" value="WZG8AR3WCN9H8">
      <input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110401-1/en_US/FR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
      <img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110401-1/fr_FR/i/scr/pixel.gif" width="1" height="1">
    </form>
  </div>
  <div style="margin-top:-70px;">
    <form method="post" name="kw_video" target="_self">
      <div style="Display: block; height: 15px; width: 100%;"></div>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Enable / Disable / Define a Video zone:</th>
          <td><select name="kw_eadb">
              <option value="enable"<?php if(get_option('kw_eadb') == "enable") { echo ' selected="selected"'; } ?>>
              <?php if(get_option('kw_eadb') == "enable") { echo "Enabled"; } else { echo "Enable"; } ?>
              </option>
              <option value="disable"<?php if(get_option('kw_eadb') == "disable") { echo ' selected="selected"'; } ?>>
              <?php if(get_option('kw_eadb') == "disable") { echo "Disabled"; } else { echo "Disable"; } ?>
              </option>
            </select>
            <p style="margin: 0px;">
              <?php if(get_option('kw_eadb') !== NULE) { ?>
              Video Space are currently <span style="color: #D13E12; font-weight: strong;">
              <?php $kw_eadb = get_option('kw_eadb'); echo $kw_eadb; ?>
              </span>
              <?php } ?>
            </p></td>
        </tr>
        <tr valign="top" <?php $kw_eadb = get_option('kw_eadb'); if ($kw_eadb == "disable") { ?>style="display: none;"<?php } ?>>
          <th scope="row">Video flash code</th>
          <td><p style="margin: 0px 0px 5px 0px;">Add Api "embed" flash channel or embed video where you want and personnalise if you want<br />
              <a href="http://style-cataclysm.com/">View fun exemple with two 3D models</a> | <a href="http://style-cataclysm.com/forum/kw-youtube-index">Support</a> | <a href="http://code.google.com/intl/fr/apis/youtube/getting_started.html#custom_player">Api Youtube</a></p>
            <p style="margin: 0px 0px 5px 0px;">
              <textarea style="min-width:663px;min-height:135px;" name="kw_adb" cols="60" rows="7" id="kw_adb"><?php echo get_option("kw_adb"); ?></textarea>
            </p></td>
        </tr>
        <tr valign="top">
          <th scope="row">Preview</th>
          <td><p style="margin: 0px 0px 5px 0px;">
              <?php 
		$kw_eadb = get_option("kw_eadb"); 
		if ($kw_eadb !== "disable") { ?>
              <?php
				$kw_adb = get_option("kw_adb");
				$kw_adb = stripslashes($kw_adb);

				if($kw_adb == "") {
					echo "&nbsp;";
				}
				else {
					echo $kw_adb;
				}
				?>
              <?php } ?>
            </p></td>
        </tr>
      </table>
      <p class="submit">
        <input name="submitted" type="hidden" value="yes" />
        <input type="submit" name="Submit" value="Update &raquo;" />
      </p>
      <div style="Display: block; height: 15px; width: 100%;"></div>
    </form>
  </div>
</div>
<?php 
}
?>
