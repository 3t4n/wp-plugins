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

/**Add menu admin in the Apparence menu **/

add_action('admin_menu', 'kw_shortcode_menu');

function kw_shortcode_menu() {
	add_theme_page('Shortcode Options', 'Videos shortcode', 'manage_options', 'wow-youtube-shortcode', 'kw_short');
}
/**Hook Shortcode for Wordpress **/

add_shortcode('kwyoutube','kw_youtube_short');

/**Get id from Shortcode **/

function kw_youtube_short( $atts, $content = null )
{

    extract( shortcode_atts( array(
        'id' => '',
      ), $atts ) );
	  
	$id = trim($id);
	$kw_spaces = get_option("kw_spaces");
	$kw_spaces = stripslashes($kw_spaces);
	$kw_width = get_option("kw_width");
	$kw_width = stripslashes($kw_width);
	$kw_height = get_option("kw_height");
	$kw_height = stripslashes($kw_height);
	$kw_bgcolor = get_option("kw_bgcolor");
	$kw_bgcolor = stripslashes($kw_bgcolor);
	$kw_api = get_option("kw_api");
	$kw_api = stripslashes($kw_api);
   
return ''.$kw_spaces.'<object width="'.$kw_width.'" height="'.$kw_height.'"><param name="movie" value="http://www.youtube.com/v/'.$id.''.$kw_api.'" /><param name="allowFullScreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="bgcolor" value="'.$kw_bgcolor.'"><embed type="application/x-shockwave-flash" width="'.$kw_width.'" height="'.$kw_height.'" src="http://www.youtube.com/v/'.$id.''.$kw_api.'" bgcolor="'.$kw_bgcolor.'" allowscriptaccess="always" allowfullscreen="true"></embed></object>'.$kw_spaces.'';
}

function kw_spaces() {
	echo "&nbsp;";
	}
	
//color1=0x2A1710&color2=0xE79800&border=1&fs=1&hl=fr_FR&rel=0&hd=1

function kw_short(){
    if(isset($_POST['submitted']) && $_POST['submitted'] == "yes"){
		
        /**Get form data**/
		
		$kw_width = stripslashes($_POST['kw_width']);
		$kw_height = stripslashes($_POST['kw_height']);
		$kw_api = stripslashes($_POST['kw_api']);
		$kw_bgcolor = stripslashes($_POST['kw_bgcolor']);
		
		update_option("kw_width", $kw_width);
		update_option("kw_height", $kw_height);
		update_option("kw_api", $kw_api);
		update_option("kw_bgcolor", $kw_bgcolor);
		
		update_option('kw_width', $_POST['kw_width']);
		update_option('kw_height', $_POST['kw_height']);
		update_option('kw_api', $_POST['kw_api']);
		update_option('kw_bgcolor', $_POST['kw_bgcolor']);
		update_option('kw_spaces', $_POST['kw_spaces']);
	
        echo "<div id=\"message\" class=\"updated fade\"><p><strong>Your settings have been saved.</strong></p></div>";
    }
		
?>
<?php /**Start Form **/?>

<div class="wrap">
<div id="theme-options-wrap">
  <div class="icon32" id="icon-tools"><br />
  </div>
  <h2> Videos shortcode options for articles integration</h2>
  <p>Take control of your theme, with infinite videos in your articles with Youtube Api integrations</p>
  <div style="margin-left:620px; margin-top:69px;">
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
      <input type="hidden" name="cmd" value="_s-xclick" />
      <input type="hidden" name="hosted_button_id" value="WZG8AR3WCN9H8" />
      <input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110401-1/en_US/FR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" />
      <img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110401-1/fr_FR/i/scr/pixel.gif" width="1" height="1" />
    </form>
  </div>
  <form method="post" name="kw_short" target="_self" id="kw_short">
    <div style="Display: block; height: 15px; width: 100%;"></div>
    <table class="form-table">
      <tr valign="top">
        <th scope="row">Define width attribut</th>
        <td><input type='text' style="width:125px;"  maxlength="6" name='kw_width' id="kw_width" value="<?php echo get_option("kw_width"); ?>" /><?php _e( 'Define width attribut.', 'kw-youtube-shortcode' ); echo " <em>(" . __( "for Your embed videos in articles integration of a video with [kwyoutube id=&quot;&quot;] (em or px is necessary)", "kw-youtube-shortcode" ) . ")</em>"; ?>
          </td>
      </tr>
      <tr valign="top">
        <th scope="row">Define height attribut</th>
        <td><input type='text' style="width:125px;"  maxlength="6" name='kw_height' id="kw_height" value="<?php echo get_option("kw_height"); ?>" /><?php _e( 'Define height attribut.', 'kw-youtube-shortcode' ); echo " <em>(" . __( "for Your embed videos in articles integration of a video with [kwyoutube id=&quot;&quot;] (em or px is necessary)", "kw-youtube-shortcode" ) . ")</em>"; ?>
          </td>
      </tr>
      <tr valign="top">
        <th scope="row">Define Bg color attribut</th>
        <td><input type='text' style="width:125px;"  maxlength="12" name='kw_bgcolor' id="kw_bgcolor" value="<?php echo get_option("kw_bgcolor"); ?>" />
          <?php _e( 'Color code', 'kw-youtube-shortcode' ); echo " <em>" . __( "<a href=\"http://www.code-couleur.com/\">http://www.code-couleur.com</a>", "kw-youtube-shortcode" ) . "</em>"; ?></td>
      </tr>
      <tr valign="top">
        <th scope="row">Define Your Api Youtube</th>
        <td><input type='text' style="width:250px;"  maxlength="250" name='kw_api' id="kw_api" value="<?php echo get_option("kw_api"); ?>" />
          <?php _e( 'e.g. Api Youtube', 'kw-youtube-shortcode' ); echo " <em>" . __( "?color1=0x2A1710&amp;color2=0xE79800&amp;border=1&amp;fs=1&amp;hl=fr_FR&amp;rel=0&amp;hd=1 <br /><a href=\"http://code.google.com/intl/fr/apis/youtube/player_parameters.html\">Api Youtube parameters</a>", "kw-youtube-shortcode" ) . "</em>"; ?></td>
      </tr>
      <tr valign="top">
          <th scope="row">Add top and bottom space</th>
          <td><input type='checkbox' name='kw_spaces' value='1' <?php if ( get_option( 'kw_spaces' ) ) { echo 'checked'; } ?>>
            <?php _e( 'Add light spaces.', 'kw-youtube-shortcode' ); echo " <em>(" . __( "This options add a space @ the top and @ the bottom of the videos in your articles for integration.", "kw-youtube-shortcode" ) . ")</em>"; ?></td>
        </tr>
    </table>
    <p class="submit">
        <input name="submitted" type="hidden" value="yes" />
        <input type="submit" name="Submit" value="Update &raquo;" />
      </p>
    <div style="Display: block; height: 15px; width: 100%;"></div>
  </form>
</div>
<?php 
}
?>
