<?php 
/**
 * @package kw-youtube-index
 * @author Laurent Bertrand
 * @version 1.0
 */
require_once(dirname(__FILE__).'/kw-bonus-video.php');
require_once(dirname(__FILE__).'/kw-youtube-shortcode.php');
/*
 Plugin Name: Kw Youtube Index
 Plugin URI: http://kwark.allwebtuts.net
 Description: A simply way to Install multiple Youtube video channels + one bonus zone on your index page or in your theme or whatever you want. Video channels [shortcode] option for Wordpress page if you want. Video [shortcode] for all video from Youtube in article if you want.
 Author: Laurent Bertrand
 Version: 1.0
 Tags: kw-youtube,video-integration,video-channel,Youtube-video,theme-index,shortcode-id-video,youtube-integration
 
 Author URI: http://kwark.allwebtuts.net
 */
/**
 * @copyright 2011  Laurent Bertrand  ( email : kwark(at)allwebtuts.net )
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


/** Enable / Disable general Css  and parse css to frontend if enable **/

if ( get_option( 'kw_css' ) == true ) {
	wp_enqueue_style( 'kw_style', '/wp-content/plugins/Kw-Youtube-Index/css/general.css');
}

/** Enable / Disable option for Css video : Force align center **/

if ( get_option( 'kw_css1' ) == true ) {
	wp_enqueue_style( 'kw_style1', '/wp-content/plugins/Kw-Youtube-Index/css/style1.css');
}

if ( get_option( 'kw_css2' ) == true ) {
	wp_enqueue_style( 'kw_style2', '/wp-content/plugins/Kw-Youtube-Index/css/style2.css');
}

if ( get_option( 'kw_css3' ) == true ) {
	wp_enqueue_style( 'kw_style3', '/wp-content/plugins/Kw-Youtube-Index/css/style3.css');
}


/**<?php kw_video1_display(); ?> | <?php kw_video2_display(); ?> | <?php kw_video3_display(); ?> to diplaying zones in your theme **/

function kw_video1_display() {
	
		$kw_ead1 = get_option("kw_ead1"); 
		if ($kw_ead1 !== "disable") { ?>
<?php
				$kw_big_ad1 = get_option("kw_big_ad1");
				$kw_big_ad1 = stripslashes($kw_big_ad1);
				$kw_space = get_option("kw_space");
				$kw_space = stripslashes($kw_space);
				$kw_spacet = get_option("kw_spacet");
				$kw_spacet = stripslashes($kw_spacet);
				$kw_marginl1 = get_option("kw_marginl1");
				$kw_marginl1 = stripslashes($kw_marginl1);
				$kw_marginr1 = get_option("kw_marginr1");
				$kw_marginr1 = stripslashes($kw_marginr1);

				if($kw_big_ad1 == "") {
					echo '';
				}
				else {
					echo ''.$kw_spacet.'<div id="center1" style="margin-left:'.$kw_marginl1.';margin-right:'.$kw_marginr1.'"><div id="video1">'.$kw_big_ad1.'</div></div>'.$kw_space.'';
				}
				?>
<?php }
	}
	
function kw_video2_display() {
	
		$kw_ead2 = get_option("kw_ead2"); 
		if ($kw_ead2 !== "disable") { ?>
<?php
				$kw_big_ad2 = get_option("kw_big_ad2");
				$kw_big_ad2 = stripslashes($kw_big_ad2);
				$kw_space = get_option("kw_space");
				$kw_space = stripslashes($kw_space);
				$kw_spacet = get_option("kw_spacet");
				$kw_spacet = stripslashes($kw_spacet);
				$kw_marginl2 = get_option("kw_marginl2");
				$kw_marginl2 = stripslashes($kw_marginl2);
				$kw_marginr2 = get_option("kw_marginr2");
				$kw_marginr2 = stripslashes($kw_marginr2);
				

				if($kw_big_ad2 == "") {
					echo '';
				}
				else {
					echo ''.$kw_spacet.'<div id="center2" style="margin-left:'.$kw_marginl2.';margin-right:'.$kw_marginr2.'"><div id="video2">'.$kw_big_ad2.'</div></div>'.$kw_space.'';
				}
				?>
<?php }
	}
	
function kw_video3_display() {
	
		$kw_ead3 = get_option("kw_ead3"); 
		if ($kw_ead3 !== "disable") { ?>
<?php
				$kw_big_ad3 = get_option("kw_big_ad3");
				$kw_big_ad3 = stripslashes($kw_big_ad3);
				$kw_space = get_option("kw_space");
				$kw_space = stripslashes($kw_space);
				$kw_spacet = get_option("kw_spacet");
				$kw_spacet = stripslashes($kw_spacet);
				$kw_marginl3 = get_option("kw_marginl3");
				$kw_marginl3 = stripslashes($kw_marginl3);
				$kw_marginr3 = get_option("kw_marginr3");
				$kw_marginr3 = stripslashes($kw_marginr3);

				if($kw_big_ad3 == "") {
					echo '';
				}
				else {
					echo ''.$kw_spacet.'<div id="center3" style="margin-left:'.$kw_marginl3.';margin-right:'.$kw_marginr3.'"><div id="video3">'.$kw_big_ad3.'</div></div>'.$kw_space.'';
				}
				?>
<?php } 
	}
	
/**Add space **/

function kw_space() {
	echo "&nbsp;";
	}
function kw_spacet() {
	echo "&nbsp;";
	}
	
/**Hook [shortcode] for display channel in a page **/

add_shortcode( 'kwvideo1' , 'kw_video1_display' ); 
add_shortcode( 'kwvideo2' , 'kw_video2_display' );
add_shortcode( 'kwvideo3' , 'kw_video3_display' );

/**Add menu admin in the Apparence menu **/

add_action('admin_menu', 'kw_youtube_menu');

function kw_youtube_menu() {
	add_theme_page('Video Options', 'Videos channels', 'manage_options', 'kw-youtube-index', 'kw_wow');
}

/**Updates "wow_kw Settings" Page Form **/

function kw_wow(){
    if(isset($_POST['submitted']) && $_POST['submitted'] == "yes"){
		
        /**Get form data**/
		
		$kw_ead1 = $_POST['kw_ead1'];
		$kw_ead2 = $_POST['kw_ead2'];
		$kw_ead3 = $_POST['kw_ead3'];
		
		$kw_big_ad1 = stripslashes($_POST['kw_big_ad1']);
		$kw_big_ad2 = stripslashes($_POST['kw_big_ad2']);
		$kw_big_ad3 = stripslashes($_POST['kw_big_ad3']);
		
		update_option("kw_big_ad1", $kw_big_ad1);
		update_option("kw_ead1", $kw_ead1);
		
		update_option("kw_big_ad2", $kw_big_ad2);
		update_option("kw_ead2", $kw_ead2);
		
		update_option("kw_big_ad3", $kw_big_ad3);
		update_option("kw_ead3", $kw_ead3);

		update_option('kw_css', $_POST['kw_css']);
		update_option('kw_space', $_POST['kw_space']);
		update_option('kw_spacet', $_POST['kw_spacet']);
		
		update_option('kw_css1', $_POST['kw_css1']);
		update_option('kw_css2', $_POST['kw_css2']);
		update_option('kw_css3', $_POST['kw_css3']);
		
		update_option('kw_marginl1', $_POST['kw_marginl1']);
		update_option('kw_marginr1', $_POST['kw_marginr1']);
		update_option('kw_marginl2', $_POST['kw_marginl2']);
		update_option('kw_marginr2', $_POST['kw_marginr2']);
		update_option('kw_marginl3', $_POST['kw_marginl3']);
		update_option('kw_marginr3', $_POST['kw_marginr3']);
	
        echo "<div id=\"message\" class=\"updated fade\"><p><strong>Your settings have been saved.</strong></p></div>";
    }
		
?>
<?php /**Start Form **/?>

<div class="wrap">
<div id="theme-options-wrap">
  <div class="icon32" id="icon-tools"><br />
  </div>
  <h2> Video Channels Options</h2>
  <p>Take control of your theme, with multiples zones videos channels or video and Advertising flash zones with your own specific preferences.</p>
  <p>This three zones support html + css attribut, flash object and more... View readme text file for places one, two or three channel zone in your theme.</p>
  <div style="margin-left:620px; margin-top:69px;">
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="hidden" name="hosted_button_id" value="WZG8AR3WCN9H8">
      <input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110401-1/en_US/FR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
      <img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110401-1/fr_FR/i/scr/pixel.gif" width="1" height="1">
    </form>
  </div>
  <div style="margin-top:-70px;">
    <form method="post" name="wow_kw" target="_self">
      <div style="Display: block; height: 15px; width: 100%;"></div>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Enable / Disable / Define a Video zone</th>
          <td><select name="kw_ead1">
              <option value="enable"<?php if(get_option('kw_ead1') == "enable") { echo ' selected="selected"'; } ?>>
              <?php if(get_option('kw_ead1') == "enable") { echo "Enabled"; } else { echo "Enable"; } ?>
              </option>
              <option value="disable"<?php if(get_option('kw_ead1') == "disable") { echo ' selected="selected"'; } ?>>
              <?php if(get_option('kw_ead1') == "disable") { echo "Disabled"; } else { echo "Disable"; } ?>
              </option>
            </select>
            <p style="margin: 0px;">
              <?php if(get_option('kw_ead1') !== NULE) { ?>
              Video Space are currently <span style="color: #D13E12; font-weight: strong;">
              <?php $kw_ead1 = get_option('kw_ead1'); echo $kw_ead1; ?>
              </span>
              <?php } ?>
            </p></td>
        </tr>
        <tr valign="top" <?php $kw_ead1 = get_option('kw_ead1'); if ($kw_ead1 == "disable") { ?>style="display: none;"<?php } ?>>
          <th scope="row">Force align center</th>
          <td><input type='checkbox' name='kw_css1' value='1' <?php if ( get_option( 'kw_css1' ) ) { echo 'checked'; } ?>>
            <?php _e( 'Force align center for this channels.', 'kw-youtube-index' ); echo " <em>(" . __( "rapid solution for template integration if you do not know css. Work only for template integration.", "kw-youtube-index" ) . ")</em>"; ?></td>
        </tr>
        <tr valign="top" <?php $kw_ead1 = get_option('kw_ead1'); if ($kw_ead1 == "disable") { ?>style="display: none;"<?php } ?>>
        <th scope="row">or use margin attribut</th>
        <td><input type='text' style="width:125px;"  maxlength="6" name='kw_marginl1' id="kw_marginl1" value="<?php echo get_option("kw_marginl1"); ?>" /><?php _e( 'Define margin-left attribut.', 'kw-youtube-index' ); echo " <em>(" . __( "for [shortcode] integration.", "kw-youtube-shortcode" ) . ")</em>"; ?></td>
        </tr>
        <tr valign="top" <?php $kw_ead1 = get_option('kw_ead1'); if ($kw_ead1 == "disable") { ?>style="display: none;"<?php } ?>>
        <th scope="row">&nbsp;</th>
        <td><input type='text' style="width:125px;"  maxlength="6" name='kw_marginr1' id="kw_marginr1" value="<?php echo get_option("kw_marginr1"); ?>" /><?php _e( 'Define margin-right attribut.', 'kw-youtube-index' ); echo " <em>(" . __( "for [shortcode] integration.", "kw-youtube-index" ) . ")</em>"; ?>
          </td>
      </tr>
        <tr valign="top" <?php $kw_ead1 = get_option('kw_ead1'); if ($kw_ead1 == "disable") { ?>style="display: none;"<?php } ?>>
          <th scope="row">Video flash code</th>
          <td><p style="margin: 0px 0px 5px 0px;">Add Api "embed" flash channel or embed video and personnalise if you want</p>
              <p style="margin: 0px 0px 5px 0px;"><a href="http://style-cataclysm.com/forum/kw-youtube-index">Support</a> | <a href="http://code.google.com/intl/fr/apis/youtube/getting_started.html#custom_player">Api Youtube</a></p>
            <p style="margin: 0px 0px 5px 0px;">
              <textarea style="min-width:663px;min-height:135px;" maxlength="1000" name="kw_big_ad1" cols="60" rows="7" id="kw_big_ad1"><?php echo get_option("kw_big_ad1"); ?></textarea>
            </p></td>
        </tr>
        <tr valign="top">
          <th scope="row">Preview</th>
          <td><p style="margin: 0px 0px 5px 0px;">
              <?php 
		$kw_ead1 = get_option("kw_ead1"); 
		if ($kw_ead1 !== "disable") { ?>
              <?php
				$kw_big_ad1 = get_option("kw_big_ad1");
				$kw_big_ad1 = stripslashes($kw_big_ad1);

				if($kw_big_ad1 == "") {
					echo "&nbsp;";
				}
				else {
					echo $kw_big_ad1;
				}
				?>
              <?php } ?>
            </p></td>
        </tr>
        <tr valign="top">
          <th scope="row">Enable / Disable / Define a Video zone</th>
          <td><select name="kw_ead2">
              <option value="enable"<?php if(get_option('kw_ead2') == "enable") { echo ' selected="selected"'; } ?>>
              <?php if(get_option('kw_ead2') == "enable") { echo "Enabled"; } else { echo "Enable"; } ?>
              </option>
              <option value="disable"<?php if(get_option('kw_ead2') == "disable") { echo ' selected="selected"'; } ?>>
              <?php if(get_option('kw_ead2') == "disable") { echo "Disabled"; } else { echo "Disable"; } ?>
              </option>
            </select>
            <p style="margin: 0px;">
              <?php if(get_option('kw_ead2') !== NULE) { ?>
              Video Space are currently <span style="color: #D13E12; font-weight: strong;">
              <?php $kw_ead2 = get_option('kw_ead2'); echo $kw_ead2; ?>
              </span>
              <?php } ?>
            </p></td>
        </tr>
        <tr valign="top" <?php $kw_ead2 = get_option('kw_ead2'); if ($kw_ead2 == "disable") { ?>style="display: none;"<?php } ?>>
          <th scope="row">Force align center</th>
          <td><input type='checkbox' name='kw_css2' value='1' <?php if ( get_option( 'kw_css2' ) ) { echo 'checked'; } ?>>
            <?php _e( 'Force align center for this channels.', 'kw-youtube-index' ); echo " <em>(" . __( "rapid solution for template integration if you do not know css. Work only for template integration.", "kw-youtube-index" ) . ")</em>"; ?></td>
        </tr>
        <tr valign="top" <?php $kw_ead2 = get_option('kw_ead2'); if ($kw_ead2 == "disable") { ?>style="display: none;"<?php } ?>>
        <th scope="row">or use margin attribut</th>
        <td><input type='text' style="width:125px;"  maxlength="6" name='kw_marginl2' id="kw_marginl2" value="<?php echo get_option("kw_marginl2"); ?>" /><?php _e( 'Define margin-left attribut.', 'kw-youtube-index' ); echo " <em>(" . __( "for [shortcode] integration.", "kw-youtube-shortcode" ) . ")</em>"; ?></td>
        </tr>
        <tr valign="top" <?php $kw_ead2 = get_option('kw_ead2'); if ($kw_ead2 == "disable") { ?>style="display: none;"<?php } ?>>
        <th scope="row">&nbsp;</th>
        <td><input type='text' style="width:125px;"  maxlength="6" name='kw_marginr2' id="kw_marginr2" value="<?php echo get_option("kw_marginr2"); ?>" /><?php _e( 'Define margin-right attribut.', 'kw-youtube-index' ); echo " <em>(" . __( "for [shortcode] integration.", "kw-youtube-index" ) . ")</em>"; ?>
          </td>
      </tr>
        <tr valign="top" <?php $kw_ead2 = get_option('kw_ead2'); if ($kw_ead2 == "disable") { ?>style="display: none;"<?php } ?>>
          <th scope="row">Video flash code</th>
          <td><p style="margin: 0px 0px 5px 0px;">Add Api "embed" flash channel or embed video and personnalise if you want<br />
              <a href="http://style-cataclysm.com/forum/kw-youtube-index">Support</a> | <a href="http://code.google.com/intl/fr/apis/youtube/getting_started.html#custom_player">Api Youtube</a></p>
            <p style="margin: 0px 0px 5px 0px;">
              <textarea style="min-width:663px;min-height:135px;" maxlength="1000" name="kw_big_ad2" cols="60" rows="7" id="kw_big_ad2"><?php echo get_option("kw_big_ad2"); ?></textarea>
            </p></td>
        </tr>
        <tr valign="top">
          <th scope="row">Preview</th>
          <td><p style="margin: 0px 0px 5px 0px;">
              <?php 
		$kw_ead2 = get_option("kw_ead2"); 
		if ($kw_ead2 !== "disable") { ?>
              <?php
				$kw_big_ad2 = get_option("kw_big_ad2");
				$kw_big_ad2 = stripslashes($kw_big_ad2);

				if($kw_big_ad2 == "") {
					echo "&nbsp;";
				}
				else {
					echo $kw_big_ad2;
				}
				?>
              <?php } ?>
            </p></td>
        </tr>
        <tr valign="top">
          <th scope="row">Enable / Disable / Define a Video zone</th>
          <td><select name="kw_ead3">
              <option value="enable"<?php if(get_option('kw_ead3') == "enable") { echo ' selected="selected"'; } ?>>
              <?php if(get_option('kw_ead3') == "enable") { echo "Enabled"; } else { echo "Enable"; } ?>
              </option>
              <option value="disable"<?php if(get_option('kw_ead3') == "disable") { echo ' selected="selected"'; } ?>>
              <?php if(get_option('kw_ead3') == "disable") { echo "Disabled"; } else { echo "Disable"; } ?>
              </option>
            </select>
            <p style="margin: 0px;">
              <?php if(get_option('kw_ead3') !== NULE) { ?>
              Video Space are currently <span style="color: #D13E12; font-weight: strong;">
              <?php $kw_ead3 = get_option('kw_ead3'); echo $kw_ead3; ?>
              </span>
              <?php } ?>
            </p></td>
        </tr>
        <tr valign="top" <?php $kw_ead3 = get_option('kw_ead3'); if ($kw_ead3 == "disable") { ?>style="display: none;"<?php } ?>>
          <th scope="row">Force align center</th>
          <td><input type='checkbox' name='kw_css3' value='1' <?php if ( get_option( 'kw_css3' ) ) { echo 'checked'; } ?>>
            <?php _e( 'Force align center for this channels.', 'kw-youtube-index' ); echo " <em>(" . __( "rapid solution for template integration if you do not know css. Work only for template integration.", "kw-youtube-index" ) . ")</em>"; ?></td>
        </tr>
        <tr valign="top" <?php $kw_ead3 = get_option('kw_ead3'); if ($kw_ead3 == "disable") { ?>style="display: none;"<?php } ?>>
        <th scope="row">or use margin attribut</th>
        <td><input type='text' style="width:125px;"  maxlength="6" name='kw_marginl3' id="kw_marginl3" value="<?php echo get_option("kw_marginl3"); ?>" /><?php _e( 'Define margin-left attribut.', 'kw-youtube-index' ); echo " <em>(" . __( "for [shortcode] integration.", "kw-youtube-shortcode" ) . ")</em>"; ?></td>
        </tr>
        <tr valign="top" <?php $kw_ead3 = get_option('kw_ead3'); if ($kw_ead3 == "disable") { ?>style="display: none;"<?php } ?>>
        <th scope="row">&nbsp;</th>
        <td><input type='text' style="width:125px;"  maxlength="6" name='kw_marginr3' id="kw_marginr3" value="<?php echo get_option("kw_marginr3"); ?>" /><?php _e( 'Define margin-right attribut.', 'kw-youtube-index' ); echo " <em>(" . __( "for [shortcode] integration.", "kw-youtube-index" ) . ")</em>"; ?>
          </td>
      </tr>
        <tr valign="top" <?php $kw_ead3 = get_option('kw_ead3'); if ($kw_ead3 == "disable") { ?>style="display: none;"<?php } ?>>
          <th scope="row">Video flash code</th>
          <td><p style="margin: 0px 0px 5px 0px;">Add Api "embed" flash channel or embed video and personnalise if you want<br />
              <a href="http://style-cataclysm.com/forum/kw-youtube-index">Support</a> | <a href="http://code.google.com/intl/fr/apis/youtube/getting_started.html#custom_player">Api Youtube</a></p>
            <p style="margin: 0px 0px 5px 0px;">
              <textarea style="min-width:663px;min-height:135px;" maxlength="1000" name="kw_big_ad3" cols="60" rows="7" id="kw_big_ad3"><?php echo get_option("kw_big_ad3"); ?></textarea>
            </p></td>
        </tr>
        <tr valign="top">
          <th scope="row">Preview</th>
          <td><p style="margin: 0px 0px 5px 0px;">
              <?php 
		$kw_ead3 = get_option("kw_ead3"); 
		if ($kw_ead3 !== "disable") { ?>
              <?php
				$kw_big_ad3 = get_option("kw_big_ad3");
				$kw_big_ad3 = stripslashes($kw_big_ad3);

				if($kw_big_ad3 == "") {
					echo "&nbsp;";
				}
				else {
					echo $kw_big_ad3;
				}
				?>
              <?php } ?>
            </p></td>
        </tr>
        <tr valign="top">
          <th scope="row">Add a top space</th>
          <td><input type='checkbox' name='kw_spacet' value='1' <?php if ( get_option( 'kw_spacet' ) ) { echo 'checked'; } ?>>
            <?php _e( 'Add a light space @ the top of the channels for integration if you need.', 'kw-youtube-index' ); echo " <em>(" . __( "This options add a space @ the top of the channels", "kw-youtube-index" ) . ")</em>"; ?></td>
        </tr>
        <tr valign="top">
          <th scope="row">Add a bottom space</th>
          <td><input type='checkbox' name='kw_space' value='1' <?php if ( get_option( 'kw_space' ) ) { echo 'checked'; } ?>>
            <?php _e( 'Add a light space @ the bottom of the channels for integration if you need.', 'kw-youtube-index' ); echo " <em>(" . __( "This options add a space @ the bottom of the channels", "kw-youtube-index" ) . ")</em>"; ?></td>
        </tr>
        <tr valign="top">
          <th scope="row">Enable / Disable based css</th>
          <td><input type='checkbox' name='kw_css' value='1' <?php if ( get_option( 'kw_css' ) ) { echo 'checked'; } ?> />
            <?php _e( 'Enable the based css for video channels, for best css practice.', 'kw-youtube-index' ); echo " <em>(" . __( "Recommended", "kw-youtube-index" ) . ")</em>"; ?></td>
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
