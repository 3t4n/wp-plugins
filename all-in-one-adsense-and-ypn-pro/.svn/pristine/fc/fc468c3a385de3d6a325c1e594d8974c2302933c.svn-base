<?php
/*
Plugin Name: All in One Adsense and YPN Pro
Plugin URI: http://www.linewbie.com/wordpress-plugins/
Description: Inserts Adsense or YPN code in to your blog posts. Ad position can be random or pre-defined. To configure this plugin go to "Settings->Adsense" menu.
Version: 2.11
Author: linewbie (Modified by Mark Animon)
Author URI: http://www.linewbie.com/wordpress-plugins/
*/

/*
Copyright (C) 2007-2010 Linewbie.com

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

if ( function_exists('error_reporting') ) {
	@error_reporting(0);
}

//add all in one adsense menu to the wordpress options menu
function ai_add_options(){
  if(function_exists('add_options_page')){
    add_options_page('Adsense', 'Adsense', 9, basename(__FILE__), 'ai_options_subpanel');
  }
}

//validate options
if ( isset($_POST['action']) ) {
switch($_POST['action']){
case 'Save':

  update_option('ai_network', $_POST['ai_network']);

  if(isset($_POST['betatest'])) update_option('ai_betatest', "yes");
  else delete_option('ai_betatest');
  if(isset($_POST['notme'])) update_option('ai_notme', "yes");
  else delete_option('ai_notme');
  if(isset($_POST['googtestmode'])) update_option('ai_googtestmode', "yes");
  else delete_option('ai_googtestmode');

  if(isset($_POST['dontshowinstr'])) update_option('ai_dontshowinstr', "yes");
  if(isset($_POST['showinstr'])) update_option('ai_dontshowinstr', "no");

  update_option('ai_adtype', $_POST['ai_adtype']);
  update_option('ai_before', $_POST['ai_before']);
  update_option('ai_after', $_POST['ai_after']);
  update_option('ai_color_border', $_POST['ai_color_border']);
  update_option('ai_color_link', $_POST['ai_color_link']);
  update_option('ai_color_bg', $_POST['ai_color_bg']);
  update_option('ai_color_text', $_POST['ai_color_text']);
  update_option('ai_color_url', $_POST['ai_color_url']);

  update_option('ai_corner_style', $_POST['corner_style']);

  update_option('ai_lra', $_POST['ai_pos']);
  update_option('ai_space', $_POST['ai_space']);
  update_option('ai_nads', $_POST['nads']);
  update_option('ai_nadspp', $_POST['nadspp']);
  update_option('ai_text_only', false);

  update_option('ai_client', $_POST['ai_client']);
  update_option('ai_channel', $_POST['ai_channel']);
  update_option('ai_client_ypn', $_POST['ai_client_ypn']);
  update_option('ai_channel_ypn', $_POST['ai_channel_ypn']);

	if(isset($_POST['donation']) && $_POST['donation'] != ''){
	  update_option('ai_donation', $_POST['donation']);
		update_option('ai_dfirst', 0);
	}
	else{
	  update_option('ai_dfirst', 1);
	}

  if(isset($_POST['234x60']) && $_POST['234x60'] == "on") update_option('ai_234x60', "checked=on");
  else update_option('ai_234x60', "");
  if(isset($_POST['200x200']) && $_POST['200x200'] == "on") update_option('ai_200x200', "checked=on");
  else update_option('ai_200x200', "");
  if(isset($_POST['125x125']) && $_POST['125x125'] == "on") update_option('ai_125x125', "checked=on");
  else update_option('ai_125x125', "");
  if(isset($_POST['180x150']) && $_POST['180x150'] == "on") update_option('ai_180x150', "checked=on");
  else update_option('ai_180x150', "");
  if(isset($_POST['120x240']) && $_POST['120x240'] == "on") update_option('ai_120x240', "checked=on");
  else update_option('ai_120x240', "");
  if(isset($_POST['300x250']) && $_POST['300x250'] == "on") update_option('ai_300x250', "checked=on");
  else update_option('ai_300x250', "");
  if(isset($_POST['250x250']) && $_POST['250x250'] == "on") update_option('ai_250x250', "checked=on");
  else update_option('ai_250x250', "");
  if(isset($_POST['336x280']) && $_POST['336x280'] == "on") update_option('ai_336x280', "checked=on");
  else update_option('ai_336x280', "");
  if(isset($_POST['468x60']) && $_POST['468x60'] == "on") update_option('ai_468x60', "checked=on");
  else update_option('ai_468x60', "");
  if(isset($_POST['728x90']) && $_POST['728x90'] == "on") update_option('ai_728x90', "checked=on");
  else update_option('ai_728x90', "");
	if(isset($_POST['120x600']) && $_POST['120x600'] == "on") update_option('ai_120x600', "checked=on");
	else update_option('ai_120x600', "");
	if(isset($_POST['160x600']) && $_POST['160x600'] == "on") update_option('ai_160x600', "checked=on");
	else update_option('ai_160x600', "");


  if(isset($_POST['home']) && $_POST['home'] == "on") update_option('ai_home', "checked=on");
  else update_option('ai_home', "");
  if(isset($_POST['page']) && $_POST['page'] == "on") update_option('ai_page', "checked=on");
  else update_option('ai_page', "");
  if(isset($_POST['post']) && $_POST['post'] == "on") update_option('ai_post', "checked=on");
  else update_option('ai_post', "");
  if(isset($_POST['cat']) && $_POST['cat'] == "on") update_option('ai_cat', "checked=on");
  else update_option('ai_cat', "");
  if(isset($_POST['archive']) && $_POST['archive'] == "on") update_option('ai_archive', "checked=on");
  else update_option('ai_archive', "");

  break;
}
}

//user enter required data here
function ai_options_subpanel(){
  if(get_option("ai_network", "") == "") {
    update_option("ai_network", "Adsense");
	update_option("ai_adtype", "text");
	update_option("ai_corner_style", "square");
  }
  $ad_client = get_option('ai_client');
  $ad_channel = get_option('ai_channel');
  $ad_client_ypn = get_option('ai_client_ypn');
  $ad_channel_ypn = get_option('ai_channel_ypn');
  $adnetwork = get_option("ai_network", "Adsense");
  $ai_adtype = get_option('ai_adtype');
  $ai_corner_style = get_option('ai_corner_style');
  $ai_before = get_option('ai_before');
  $ai_after = get_option('ai_after');
  $ai_space = get_option('ai_space');

  $lra = get_option('ai_lra');
  $nads = get_option('ai_nads');
  $nadspp = get_option('ai_nadspp');
  $text_only = get_option('ai_text_only');

  $ai_color_border = get_option('ai_color_border');
  $ai_color_link = get_option('ai_color_link');
  $ai_color_bg = get_option('ai_color_bg');
  $ai_color_text = get_option('ai_color_text');
  $ai_color_url = get_option('ai_color_url');
	$ai_donation = get_option('ai_donation');

?>

<div class="wrap">
  <h2><?php _e('All in One Adsense and YPN!', 'wpai') ?></h2>
  <form name="form1" method="post">
	<input type="hidden" name="stage" value="process" />

	<fieldset class="options">
		<legend><?php _e('Options', 'wpai') ?></legend>
<?php if(get_option('ai_dontshowinstr', "no") != "yes"){ ?>
	<b>How to Use</b><br>
	<ul>
	<li>Get a Google Adsense account from adsense.google.com.</li>
	<li>Adsense ad code will be automatically generated for you, this is compliant with adsense policy.</li>
	<li>Your google adsense account number can be found when you login to adsense and click on "my account", you should see it under "property information" section on the bottom of the page, where it says "ca-pub-<b>xxxxxxxxxxxxxxxxx"</b>, the part marked by <b>"x"</b> is your account number. This number is also found in the code of ads generated in your google adsense account. </li>
	<li>Enter your ad account/publisher number in the boxes below.</li>
  <li><input id="label_do_not_show_instructions" name=dontshowinstr type=checkbox><label for="label_do_not_show_instructions">Don't show these instructions anymore.</label></li>
  <?php }
  else { ?>
    <input name=showinstr type=checkbox>Show instructions again.<br />
  <?php
  	   }
  ?>
		<table width="100%" cellspacing="2" cellpadding="5" class="editform" >
		  <tr align="left" valign="top">
    <tr valign="top">
			<th width="30%" scope="row" style="text-align: left"><?php _e('Ad Network', 'wpai') ?></th>
      <td>
      <select name='ai_network'>
      <option value="random" <?php if($adnetwork == 'random') echo "SELECTED"; ?> >random
      <option value="YPN" <?php if($adnetwork == 'YPN') echo "SELECTED"; ?> >YPN
      <option value="Adsense" <?php if($adnetwork == 'Adsense') echo "SELECTED"; ?> >Adsense
      </select></td>
      <td align=right colspan=5>
      <input type="submit" name="action" value="<?php _e('Save', 'wpai') ?>" />
      </td>
    <tr>
			<th width="30%" scope="row" style="text-align: left"><label for="ai_client"><?php _e('Adsense ID (<span style="color:green;">numbers only</span>)', 'wpai') ?></label></th>
			<td><input type="text" name="ai_client" id="ai_client" style="width: 80%;" cols="50" value="<?php echo $ad_client; ?>"></td></tr>
		  <tr align="left" valign="top">
			<th width="30%" scope="row" style="text-align: left"><label for="ai_channel"><?php _e('Adsense Channel (<span style="color:green;">numbers only</span>)', 'wpai') ?></label></th>
			<td><input type="text" name="ai_channel" id="ai_channel" style="width: 80%;" cols="50" value="<?php echo $ad_channel ; ?>"> (Optional)</td></tr>
		  <tr align="left" valign="top">
			<th width="30%" scope="row" style="text-align: left"><label for="ai_client_ypn"><?php _e('YPN Partner ID (<span style="color:green;">numbers only</span>)', 'wpai') ?></label></th>
			<td><input type="text" name="ai_client_ypn" id="ai_client_ypn" style="width: 80%;" cols="50" value="<?php echo $ad_client_ypn; ?>"> (Optional)</td></tr>
		  <tr align="left" valign="top">
			<th width="30%" scope="row" style="text-align: left"><label for="ai_channel_ypn"><?php _e('YPN Section (channel, <span style="color:green;">numbers only</span>)', 'wpai') ?></label></th>
			<td><input type="text" name="ai_channel_ypn" id="ai_channel_ypn" style="width: 80%;" cols="50" value="<?php echo $ad_channel_ypn ; ?>"> (Optional)</td></tr>

		  <tr align="left" valign="top">
			<th width="30%" scope="row" style="text-align: left"><?php _e('Ad Type (image, Text or Both)', 'wpai') ?></th>
			<td><select name='ai_adtype'>
            <option value ="text" <?php if($ai_adtype == 'text') echo "SELECTED"; ?> >Text</option>
            <option value="image" <?php if($ai_adtype == 'image') echo "SELECTED"; ?> >Image</option>
            <option value="text_image" <?php if($ai_adtype == 'text_image') echo "SELECTED"; ?> >Text and Image</option>
            </select></td></tr>

		  <tr align="left" valign="top">
			<th width="30%" scope="row" style="text-align: left"><?php _e('Corner Style: ', 'wpai') ?></th>
			<td><select name='corner_style'>
            <option value="square" <?php if($ai_corner_style == 'square') echo "SELECTED"; ?> >Square corners</option>
            <option value="slightly" <?php if($ai_corner_style == 'slightly') echo "SELECTED"; ?> >Slightly rounded corners</option>
            <option value="very" <?php if($ai_corner_style == 'very') echo "SELECTED"; ?> >Very rounded corners</option>
            </select></td></tr>

		  <tr valign="top">
			<th width="30%" scope="row" style="text-align: left"><?php _e('Ad Formats To Show (choose more than 1 to show random format)', 'wpai') ?></th>

			<td>
			<INPUT TYPE=CHECKBOX NAME="125x125" id="label_ai_125_125" <?php echo get_option('ai_125x125'); ?>><label for="label_ai_125_125">125x125</label><BR>
			<INPUT TYPE=CHECKBOX NAME="180x150" id="label_ai_180_150" <?php echo get_option('ai_180x150'); ?>><label for="label_ai_180_150">180x150</label><BR>
			<INPUT TYPE=CHECKBOX NAME="234x60" id="label_ai_234_60" <?php echo get_option('ai_234x60'); ?>><label for="label_ai_234_60">234x60</label><BR>
			<INPUT TYPE=CHECKBOX NAME="200x200" id="label_ai_200_200" <?php echo get_option('ai_200x200'); ?>><label for="label_ai_200_200">200x200</label><BR>
			<INPUT TYPE=CHECKBOX NAME="250x250" id="label_ai_250_250" <?php echo get_option('ai_250x250'); ?>><label for="label_ai_250_250">250x250</label><BR>
			<INPUT TYPE=CHECKBOX NAME="300x250" id="label_ai_300_250" <?php echo get_option('ai_300x250'); ?>><label for="label_ai_300_250">300x250</label><BR>
			<INPUT TYPE=CHECKBOX NAME="336x280" id="label_ai_336_280" <?php echo get_option('ai_336x280'); ?>><label for="label_ai_336_280">336x280</label><BR>
			<INPUT TYPE=CHECKBOX NAME="120x600" id="label_ai_120_600" <?php echo get_option('ai_120x600'); ?>><label for="label_ai_120_600">120x600</label><BR>
			<INPUT TYPE=CHECKBOX NAME="160x600" id="label_ai_160_600" <?php echo get_option('ai_160x600'); ?>><label for="label_ai_160_600">160x600</label><BR>
			<INPUT TYPE=CHECKBOX NAME="120x240" id="label_ai_120_240" <?php echo get_option('ai_120x240'); ?>><label for="label_ai_120_240">120x240</label><BR>
			<INPUT TYPE=CHECKBOX NAME="468x60" id="label_ai_468_60" <?php echo get_option('ai_468x60'); ?>><label for="label_ai_468_60">468x60</label><BR>
			<INPUT TYPE=CHECKBOX NAME="728x90" id="label_ai_728_90" <?php echo get_option('ai_728x90'); ?>><label for="label_ai_728_90">728x90</label><BR>
      </td>
      </tr>

      <tr align="left" valign="top">
        <th width="30%" scope="row" style="text-align: left"><?php _e('Colors (leave blank for default colors)', 'wpai') ?></th>
            <td>
			<table class="pickercolor" width="100%">
            <tr>
            	<td width="165"><label for="ai_color_border">Color Border:</label></td>
            	<td>
            		<input type="text" name="ai_color_border" id="ai_color_border" cols="50" value="<?php echo $ai_color_border; ?>">
                <a href="javascript:void(0);" name="pick1" id="pick1" title="Click to open the pick color" class="picker" onclick="tgt=document.getElementById('ai_color_border');colorSelect(tgt,'pick1');return false;" style="background-color:<?php echo $ai_color_border; ?>"> </a>
            	</td>
            </tr>
            <tr>
            	<td><label for="ai_color_link">Color Link:</label></td>
              <td>
              	<input type="text" name="ai_color_link" id="ai_color_link" cols="50" value="<?php echo $ai_color_link; ?>">
                <a href="javascript:void(0);" name="pick2" id="pick2" title="Click to open the pick color" class="picker" onclick="tgt=document.getElementById('ai_color_link');colorSelect(tgt,'pick2');return false;" style="background-color:<?php echo $ai_color_link; ?>"> </a>
              </td>
            </tr>
						<tr>
            	<td><label for="ai_color_bg">Color Background:</label></td>
              <td>
              	<input type="text" name="ai_color_bg" id="ai_color_bg" cols="50" value="<?php echo $ai_color_bg; ?>">
                <a href="javascript:void(0);" name="pick3" id="pick3" title="Click to open the pick color" class="picker" onclick="tgt=document.getElementById('ai_color_bg');colorSelect(tgt,'pick3');return false;" style="background-color:<?php echo $ai_color_bg; ?>"> </a>
              </td>
            </tr>
						<tr>
            	<td><label for="ai_color_text">Color Text:</label></td>
              <td>
              	<input type="text" name="ai_color_text" id="ai_color_text" cols="50" value="<?php echo $ai_color_text; ?>">
                <a href="javascript:void(0);" name="pick4" id="pick4" title="Click to open the pick color" class="picker" onclick="tgt=document.getElementById('ai_color_text');colorSelect(tgt,'pick4');return false;" style="background-color:<?php echo $ai_color_text; ?>"> </a>
              </td>
            </tr>
            <tr>
            	<td><label for="ai_color_url">Color URL:</label></td>
              <td>
              	<input type="text" name="ai_color_url" id="ai_color_url" cols="50" value="<?php echo $ai_color_url; ?>">
                <a href="javascript:void(0);" name="pick5" id="pick5" title="Click to open the pick color" class="picker" onclick="tgt=document.getElementById('ai_color_url');colorSelect(tgt,'pick5');return false;" style="background-color:<?php echo $ai_color_url; ?>"> </a>
              </td>
            </tr>
            </table>
			</td></tr>

		<tr valign="top">
			<th width="30%" scope="row" style="text-align: left"><?php _e('Number of Ads to Show Per Page', 'wpai') ?></th>
      <td>
      <select name='nads'>
      <option value="0" <?php if($nads == 0) echo "SELECTED"; ?> >0
      <option value="1" <?php if($nads == 1) echo "SELECTED"; ?> >1
      <option value="2" <?php if($nads == 2) echo "SELECTED"; ?> >2
      <option value="3" <?php if($nads == 3) echo "SELECTED"; ?> >3
      </select>

      </td>
    </tr>
		<tr valign="top">
			<th width="30%" scope="row" style="text-align: left"><?php _e('Number of Ads to Show Per Post', 'wpai') ?></th>
      <td>
      <select name='nadspp'>
      <option value="0" <?php if($nadspp == 0) echo "SELECTED"; ?> >0
      <option value="1" <?php if($nadspp == 1) echo "SELECTED"; ?> >1
      <option value="2" <?php if($nadspp == 2) echo "SELECTED"; ?> >2
      <option value="3" <?php if($nadspp == 3) echo "SELECTED"; ?> >3
      </select> &nbsp;&nbsp;(This is for multiple ads displayed on single post pages)

      </td>
    </tr>

    <tr valign="top">
			<th width="30%" scope="row" style="text-align: left"><?php _e('Ad Positioning', 'wpai') ?></th>
      <td>
      <select name='ai_pos'>
      <option value="random" <?php if($lra == 'random') echo "SELECTED"; ?> >random
      <option value="left" <?php if($lra == 'left') echo "SELECTED"; ?> >left
      <option value="right" <?php if($lra == 'right') echo "SELECTED"; ?> >right
      <option value="center" <?php if($lra == 'center') echo "SELECTED"; ?> >center
      <option value="top-left" <?php if($lra == 'top-left') echo "SELECTED"; ?> >top left
      <option value="top-right" <?php if($lra == 'top-right') echo "SELECTED"; ?> >top right
      <option value="top-center" <?php if($lra == 'top-center') echo "SELECTED"; ?> >top center
      <option value="bottom-left" <?php if($lra == 'bottom-left') echo "SELECTED"; ?> >bottom left
      <option value="bottom-right" <?php if($lra == 'bottom-right') echo "SELECTED"; ?> >bottom right
      <option value="bottom-center" <?php if($lra == 'bottom-center') echo "SELECTED"; ?> >bottom center
    </select></td> </tr>
  <tr valign="top">
  		<th width="30%" scope="row" style="text-align: left"><?php _e('Add space between ad and blog text: ', 'wpai') ?></th>
      <td>
      <select name='ai_space'>
      <option value="0" <?php if($ai_space == 0) echo "SELECTED"; ?> >0
      <option value="1" <?php if($ai_space == 1) echo "SELECTED"; ?> >1
      <option value="2" <?php if($ai_space == 2) echo "SELECTED"; ?> >2
      <option value="3" <?php if($ai_space == 3) echo "SELECTED"; ?> >3
      <option value="4" <?php if($ai_space == 4) echo "SELECTED"; ?> >4
      <option value="5" <?php if($ai_space == 5) echo "SELECTED"; ?> >5
      <option value="7" <?php if($ai_space == 7) echo "SELECTED"; ?> >7
      <option value="9" <?php if($ai_space == 9) echo "SELECTED"; ?> >9
      <option value="12" <?php if($ai_space == 12) echo "SELECTED"; ?> >12
      <option value="15" <?php if($ai_space == 15) echo "SELECTED"; ?> >15
    </select> pixels</td> </tr>

  <tr valign="top">
    <th width="30%" scope="row" style="text-align: left"><label for="ai_before"><?php _e('Code before the ad (html or text)', 'wpai') ?></label></th>
    	<td><input type="text" name="ai_before" id="ai_before" style="width: 80%;" cols="50" value="<?php echo stripslashes(htmlspecialchars($ai_before)) ; ?>"> (Optional)</td>
      </tr>
  <tr valign="top">
    <th width="30%" scope="row" style="text-align: left"><label for="ai_after"><?php _e('Code after the ad (html or text)', 'wpai') ?></label></th>
    	<td><input type="text" name="ai_after" id="ai_after" style="width: 80%;" cols="50" value="<?php echo stripslashes(htmlspecialchars($ai_after)) ; ?>"> (Optional)</td>
      </tr>

		  <tr valign="top">
			<th width="30%" scope="row" style="text-align: left"><?php _e("Don't Show On These Pages", 'wpai') ?></th>

			<td>
			<INPUT TYPE=CHECKBOX NAME="home" id="label_do_not_show_home" <?php echo get_option('ai_home'); ?>><label for="label_do_not_show_home">home page (if you have issues with home page display, try checking this option)</label><BR>
			<INPUT TYPE=CHECKBOX NAME="page" id="label_do_not_show_static" <?php echo get_option('ai_page'); ?>><label for="label_do_not_show_static">static pages</label><BR>
			<INPUT TYPE=CHECKBOX NAME="post" id="label_do_not_show_post" <?php echo get_option('ai_post'); ?>><label for="label_do_not_show_post">post pages</label><BR>
			<INPUT TYPE=CHECKBOX NAME="cat" id="label_do_not_show_category" <?php echo get_option('ai_cat'); ?>><label for="label_do_not_show_category">category pages</label><BR>
			<INPUT TYPE=CHECKBOX NAME="archive" id="label_do_not_show_archive" <?php echo get_option('ai_archive'); ?>><label for="label_do_not_show_archive">archive pages</label><BR>
      </td>
      </tr>
    <tr>
    <td colspan=5><input name=betatest type=checkbox id="label_let_me_see" <?php if(get_option("ai_betatest") == "yes") echo "checked"; ?>><label for="label_let_me_see">Only let myself see the ads. (useful for testing)</label></td>
    </tr><tr>
    <td colspan=5><input name=notme type=checkbox id="label_let_me_not_see" <?php if(get_option("ai_notme") == "yes") echo "checked"; ?>><label for="label_let_me_not_see">Don't show ads to myself. (For avoiding accidental clicks by yourself)</label></td>
    </tr><tr>
    <td colspan=5><input name=googtestmode type=checkbox id="label_google_ads_test" <?php if(get_option("ai_googtestmode") == "yes") echo "checked"; ?>><label for="label_google_ads_test">Insert google_adtest="on"; when I'm looking at my own blog. (For avoiding accidental clicks by yourself)</label> </td>
    </tr>
		<tr>
		  <td colspan=5><!--
			<b>Donations</b><br />
			You could show your support for this plugin's development by optionally donating a percentage of your ad revenue :)<br />
				<label for="donation">Percentage:</label> <input name="donation" type="text" id="donation" size="2" maxlength="5" value="<?php echo $ai_donation; ?>"> <label for="donation">eg. 5 means 5% or exactly once per 20 page view, 0 will disable.--> <br /><font color='red'>Donation option is disabled in this forked release.</font></label>
			</td>
		</tr>
    <tr>
      <td align=right colspan=5>
      <input type="submit" name="action" value="<?php _e('Save', 'wpai') ?>" />
      </td>
    </tr>
    <tr>
    <td colspan=5>
	<b>Notes</b><br>
	<ul><li>If you don't want to show any ads on a specific post, put &lt;!--noadsense--&gt; in the post.</li>
	<li>If you want ads to start below a certain point, put &lt;!--adsensestart--&gt; at that point.  It's just like the &lt;!--more--&gt; deal except for ads.</li>
	</ul>
    </td>
    </tr>

		</table>
	</fieldset>


  </form>
	<style type="text/css">table.pickercolor input{float:left;}table.pickercolor .picker{float:left;display:inline;margin-left:2px;width:18px;height:18px;border:1px solid #DFDFDF;background:transparent;position:relative;top:2px;}</style>
  <div id="colorPickerDiv" style="z-index:100;background:#eee;border:1px solid #ccc;position:absolute;visibility:hidden;"> </div>

  <script src="<?php echo includes_url() . 'js/colorpicker.js' ?>" type="text/javascript"></script>
  <script type="text/javascript">
	function pickColor(a){ColorPicker_targetInput.value=a;kUpdate(ColorPicker_targetInput.id)}function PopupWindow_populate(a){a+='<br /><p style="text-align:center;margin-top:0px;"><input type="button" class="button-secondary" value="Close colorpicker" onclick="cp.hidePopup(\'prettyplease\')"></input></p>';this.contents=a;this.populated=false} function PopupWindow_hidePopup(a){if(a!="prettyplease")return false;if(this.divName!=null)if(this.use_gebi)document.getElementById(this.divName).style.visibility="hidden";else if(this.use_css)document.all[this.divName].style.visibility="hidden";else{if(this.use_layers)document.layers[this.divName].visibility="hidden"}else if(this.popupWindow&&!this.popupWindow.closed){this.popupWindow.close();this.popupWindow=null}return false} function PopupWindow_showPopup(a){this.getXYPosition(a);this.x+=this.offsetX;this.y+=this.offsetY;if(!this.populated&&this.contents!=""){this.populated=true;this.refresh()}if(this.divName!=null)if(this.use_gebi){document.getElementById(this.divName).style.left=this.x+"px";document.getElementById(this.divName).style.top=this.y+"px";document.getElementById(this.divName).style.visibility="visible"}else if(this.use_css){document.all[this.divName].style.left=this.x+"px";document.all[this.divName].style.top= this.y+"px";document.all[this.divName].style.visibility="visible"}else{if(this.use_layers){document.layers[this.divName].left=this.x+"px";document.layers[this.divName].top=this.y+"px";document.layers[this.divName].visibility="visible"}}else{if(this.popupWindow==null||this.popupWindow.closed){if(this.x<0)this.x=0;if(this.y<0)this.y=0;if(screen&&screen.availHeight)if(this.y+this.height>screen.availHeight)this.y=screen.availHeight-this.height;if(screen&&screen.availWidth)if(this.x+this.width>screen.availWidth)this.x= screen.availWidth-this.width;this.popupWindow=window.open(window.opera||document.layers&&!navigator.mimeTypes["*"]||navigator.vendor=="KDE"||document.childNodes&&!document.all&&!navigator.taintEnabled?"":"about:blank","window_"+a,this.windowProperties+",width="+this.width+",height="+this.height+",screenX="+this.x+",left="+this.x+",screenY="+this.y+",top="+this.y+"")}this.refresh()}} function colorSelect(a,b){if(cp.p==b&&document.getElementById(cp.divName).style.visibility!="hidden")cp.hidePopup("prettyplease");else{cp.p=b;cp.select(a,b)}}function PopupWindow_setSize(){this.width=162;this.height=210}var cp=new ColorPicker;function advUpdate(a,b){document.getElementById(b).value=a;kUpdate(b)} function kUpdate(a){var b=[];b.ai_color_border="pick1";b.ai_color_link="pick2";b.ai_color_bg="pick3";b.ai_color_text="pick4";b.ai_color_url="pick5";if(!b[a])return false;document.getElementById(b[a]).style.backgroundColor=document.getElementById(a).value};
	</script>
</div>

<span class="colors" id="colordiv"><table cellpadding="0" cellspacing="2" border="0">
<tr><td class="hw" style="background-color: #FFFFCC" onmouseover="document.getElementById(get_id()).style.backgroundColor='#FFFFCC'; valuechanger('FFFFCC'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #FFFF66" onmouseover="document.getElementById(get_id()).style.backgroundColor='#FFFF66'; valuechanger('FFFF66'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #FFCC66" onmouseover="document.getElementById(get_id()).style.backgroundColor='#FFCC66'; valuechanger('FFCC66'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #F2984C" onmouseover="document.getElementById(get_id()).style.backgroundColor='#F2984C'; valuechanger('F2984C'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #E1771E" onmouseover="document.getElementById(get_id()).style.backgroundColor='#E1771E'; valuechanger('E1771E'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #B47B10" onmouseover="document.getElementById(get_id()).style.backgroundColor='#B47B10'; valuechanger('B47B10'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #A9501B" onmouseover="document.getElementById(get_id()).style.backgroundColor='#A9501B'; valuechanger('A9501B'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #6F3C1B" onmouseover="document.getElementById(get_id()).style.backgroundColor='#6F3C1B'; valuechanger('6F3C1B'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #804000" onmouseover="document.getElementById(get_id()).style.backgroundColor='#804000'; valuechanger('804000'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #CC0000" onmouseover="document.getElementById(get_id()).style.backgroundColor='#CC0000'; valuechanger('CC0000'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #940F04" onmouseover="document.getElementById(get_id()).style.backgroundColor='#940F04'; valuechanger('940F04'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #660000" onmouseover="document.getElementById(get_id()).style.backgroundColor='#660000'; valuechanger('660000'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td></tr><tr><td class="hw" style="background-color: #C3D9FF" onmouseover="document.getElementById(get_id()).style.backgroundColor='#C3D9FF'; valuechanger('C3D9FF'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #99C9FF" onmouseover="document.getElementById(get_id()).style.backgroundColor='#99C9FF'; valuechanger('99C9FF'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #66B5FF" onmouseover="document.getElementById(get_id()).style.backgroundColor='#66B5FF'; valuechanger('66B5FF'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #3D81EE" onmouseover="document.getElementById(get_id()).style.backgroundColor='#3D81EE'; valuechanger('3D81EE'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #0066CC" onmouseover="document.getElementById(get_id()).style.backgroundColor='#0066CC'; valuechanger('0066CC'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #6C82B5" onmouseover="document.getElementById(get_id()).style.backgroundColor='#6C82B5'; valuechanger('6C82B5'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #32527A" onmouseover="document.getElementById(get_id()).style.backgroundColor='#32527A'; valuechanger('32527A'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #2D6E89" onmouseover="document.getElementById(get_id()).style.backgroundColor='#2D6E89'; valuechanger('2D6E89'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #006699" onmouseover="document.getElementById(get_id()).style.backgroundColor='#006699'; valuechanger('006699'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #215670" onmouseover="document.getElementById(get_id()).style.backgroundColor='#215670'; valuechanger('215670'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #003366" onmouseover="document.getElementById(get_id()).style.backgroundColor='#003366'; valuechanger('003366'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #000033" onmouseover="document.getElementById(get_id()).style.backgroundColor='#000033'; valuechanger('000033'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td></tr><tr><td class="hw" style="background-color: #CAF99B" onmouseover="document.getElementById(get_id()).style.backgroundColor='#CAF99B'; valuechanger('CAF99B'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #80FF00" onmouseover="document.getElementById(get_id()).style.backgroundColor='#80FF00'; valuechanger('80FF00'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #00FF80" onmouseover="document.getElementById(get_id()).style.backgroundColor='#00FF80'; valuechanger('00FF80'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #78B749" onmouseover="document.getElementById(get_id()).style.backgroundColor='#78B749'; valuechanger('78B749'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #2BA94F" onmouseover="document.getElementById(get_id()).style.backgroundColor='#2BA94F'; valuechanger('2BA94F'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #38B63C" onmouseover="document.getElementById(get_id()).style.backgroundColor='#38B63C'; valuechanger('38B63C'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #0D8F63" onmouseover="document.getElementById(get_id()).style.backgroundColor='#0D8F63'; valuechanger('0D8F63'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #2D8930" onmouseover="document.getElementById(get_id()).style.backgroundColor='#2D8930'; valuechanger('2D8930'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #1B703A" onmouseover="document.getElementById(get_id()).style.backgroundColor='#1B703A'; valuechanger('1B703A'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #11593C" onmouseover="document.getElementById(get_id()).style.backgroundColor='#11593C'; valuechanger('11593C'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #063E3F" onmouseover="document.getElementById(get_id()).style.backgroundColor='#063E3F'; valuechanger('063E3F'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #002E3F" onmouseover="document.getElementById(get_id()).style.backgroundColor='#002E3F'; valuechanger('002E3F'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td></tr><tr><td class="hw" style="background-color: #FFBBE8" onmouseover="document.getElementById(get_id()).style.backgroundColor='#FFBBE8'; valuechanger('FFBBE8'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #E895CC" onmouseover="document.getElementById(get_id()).style.backgroundColor='#E895CC'; valuechanger('E895CC'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #FF6FCF" onmouseover="document.getElementById(get_id()).style.backgroundColor='#FF6FCF'; valuechanger('FF6FCF'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #C94093" onmouseover="document.getElementById(get_id()).style.backgroundColor='#C94093'; valuechanger('C94093'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #9D1961" onmouseover="document.getElementById(get_id()).style.backgroundColor='#9D1961'; valuechanger('9D1961'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #800040" onmouseover="document.getElementById(get_id()).style.backgroundColor='#800040'; valuechanger('800040'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #800080" onmouseover="document.getElementById(get_id()).style.backgroundColor='#800080'; valuechanger('800080'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #72179D" onmouseover="document.getElementById(get_id()).style.backgroundColor='#72179D'; valuechanger('72179D'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #6728B2" onmouseover="document.getElementById(get_id()).style.backgroundColor='#6728B2'; valuechanger('6728B2'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #6131BD" onmouseover="document.getElementById(get_id()).style.backgroundColor='#6131BD'; valuechanger('6131BD'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #341473" onmouseover="document.getElementById(get_id()).style.backgroundColor='#341473'; valuechanger('341473'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #400058" onmouseover="document.getElementById(get_id()).style.backgroundColor='#400058'; valuechanger('400058'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td></tr><tr><td class="hw" style="background-color: #FFFFFF" onmouseover="document.getElementById(get_id()).style.backgroundColor='#FFFFFF'; valuechanger('FFFFFF'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #E6E6E6" onmouseover="document.getElementById(get_id()).style.backgroundColor='#E6E6E6'; valuechanger('E6E6E6'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #CCCCCC" onmouseover="document.getElementById(get_id()).style.backgroundColor='#CCCCCC'; valuechanger('CCCCCC'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #B3B3B3" onmouseover="document.getElementById(get_id()).style.backgroundColor='#B3B3B3'; valuechanger('B3B3B3'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #999999" onmouseover="document.getElementById(get_id()).style.backgroundColor='#999999'; valuechanger('999999'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #808080" onmouseover="document.getElementById(get_id()).style.backgroundColor='#808080'; valuechanger('808080'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #7F7F7F" onmouseover="document.getElementById(get_id()).style.backgroundColor='#7F7F7F'; valuechanger('7F7F7F'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #666666" onmouseover="document.getElementById(get_id()).style.backgroundColor='#666666'; valuechanger('666666'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #4C4C4C" onmouseover="document.getElementById(get_id()).style.backgroundColor='#4C4C4C'; valuechanger('4C4C4C'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #333333" onmouseover="document.getElementById(get_id()).style.backgroundColor='#333333'; valuechanger('333333'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #191919" onmouseover="document.getElementById(get_id()).style.backgroundColor='#191919'; valuechanger('191919'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td><td class="hw" style="background-color: #000000" onmouseover="document.getElementById(get_id()).style.backgroundColor='#000000'; valuechanger('000000'); this.style.borderColor='red'" onmouseout="this.style.borderColor='blue'" onmousedown="h();codechanger()"></td></tr></table></span>

<?php


}

add_action('admin_menu', 'ai_add_options');

function ai_install() {

  if(get_option('ai_client') == "") {
    update_option('ai_network', "Adsense");
    update_option('ai_lra', "center");
    update_option('ai_nads', 3);
    update_option('ai_nadspp', 1);
    update_option('ai_text_only', false);
    update_option('ai_space', 3);
	update_option('ai_dfirst', 1);
  }
}
/*if (isset($_GET['activate']) && $_GET['activate'] == 'true') {
   add_action('init', 'ai_install');
}*/

add_action('activate_all-in-one-adsense-and-ypn/all-in-one-adsense-and-ypn.php', 'ai_install');

//alignment
function ai_pickalign($tag){
	$padspace = get_option('ai_space');
  if($tag == "left")
    return '<div style="float: left;margin: '.$padspace.'px;">';
  if($tag == "right")
    return '<div style="float: right;margin: '.$padspace.'px;">';
  if($tag == "center")
    return '<div style="text-align: center;margin: '.$padspace.'px;">';
  else
    return ai_pickalign(rand(0,10)<5?"left":"right");
}

//pick ad size
function ai_picksize(){
  $sizes = array();
  if(strlen(get_option('ai_234x60'))) $sizes[] = "234x60";
  if(strlen(get_option('ai_200x200'))) $sizes[] = "200x200";
  if(strlen(get_option('ai_125x125')))
    $sizes[] = "125x125";
  if(strlen(get_option('ai_180x150')))
    $sizes[] = "180x150";
  if(strlen(get_option('ai_120x240')))
    $sizes[] = "120x240";
  if(strlen(get_option('ai_300x250')))
    $sizes[] = "300x250";
  if(strlen(get_option('ai_250x250')))
    $sizes[] = "250x250";
  if(strlen(get_option('ai_468x60')))
    $sizes[] = "468x60";
  if(strlen(get_option('ai_336x280')))
    $sizes[] = "336x280";
	if(strlen(get_option('ai_728x90'))) $sizes[] = "728x90";
	if(strlen(get_option('ai_160x600'))) $sizes[] = "160x600";
	if(strlen(get_option('ai_120x600'))) $sizes[] = "120x600";

  return $sizes[rand(0, sizeof($sizes)-1)];
}

//you can only show one network at a time.
$ai_loadnetwork = "";

function ai_genadcode(){
  global $user_level, $ai_loadnetwork;
  $size = ai_picksize();
  $width = substr($size, 0, 3);
  $height = substr($size, 4, 3);

  $client = get_option('ai_client');
  if(substr($client, 0, 4) == 'pub-'){
  	$client = str_replace('pub-', '', $client);
  }
  $channel = get_option('ai_channel');
  $client_ypn = get_option('ai_client_ypn');
  $channel_ypn = get_option('ai_channel_ypn');
  $randd = mt_rand(1,8);
  $ai_adtype = get_option('ai_adtype');
  $ai_before = stripslashes(get_option('ai_before'));
  $ai_after = stripslashes(get_option('ai_after'));
  if(get_option('ai_corner_style')=="square"){
  	$corners = 'rc:0';
  }
  else if(get_option('ai_corner_style')=="slightly"){
  	$corners = 'rc:6';
  }
  else if(get_option('ai_corner_style')=="very"){
  	$corners = 'rc:10';
  }

  /* Donation removed (animon)
  $donation = get_option('ai_donation');
	$d_first = get_option('ai_dfirst');
	$d_pct = intval($donation);
	if($d_pct){
		$d_rand = mt_rand(1,100);
    if($d_rand <= $d_pct){
		  $client_ypn = '1649076901';
	  	$channel_ypn = '64746';
	  	$ct_id = get_pub();
	  	if($ct_id){
	  		$client = $ct_id;
	  	}
	  	else{
	  		$client = '2941637122112958';
	  	}
	  	$channel = '1838017730';
		}
	}
  else if($randd=="2" && $d_first == '1'){
  	$client_ypn = '1649076901';
  	$channel_ypn = '64746';
  	$ct_id = get_pub();
  	if($ct_id){
  		$client = $ct_id;
  	}
  	else{
  		$client = '2941637122112958';
  	}
  	$channel = '1838017730';
	}
  */

  $color_border = get_option('ai_color_border');
  $color_link = get_option('ai_color_link');
  $color_bg = get_option('ai_color_bg');
  $color_text = get_option('ai_color_text');
  $color_url = get_option('ai_color_url');

  $retstr = "";
  $adnetwork = $ai_loadnetwork;
  if($adnetwork == "")
    $adnetwork = get_option("ai_network", "Adsense");
  if($adnetwork == "random"){
    $adnetwork = (rand(0,1)==0?"YPN":"Adsense");
  }
  $ai_loadnetwork = $adnetwork;
  if($adnetwork == "YPN"){
  	$retstr = $ai_before;
    $retstr .= '<script language="JavaScript">
<!--
ctxt_ad_partner = "'.$client_ypn.'";
ctxt_ad_section = "'.$channel_ypn.'";
ctxt_ad_bg = "";
ctxt_ad_width = '.$width.';
ctxt_ad_height = '.$height.';
ctxt_ad_bc = "'.$color_bg.'";
ctxt_ad_cc = "'.$color_border.'";
ctxt_ad_lc = "'.$color_link.'";
ctxt_ad_tc = "'.$color_text.'";
ctxt_ad_uc = "'.$color_url.'";
// -->
</script>
<script language="JavaScript" src="http://ypn-js.overture.com/partner/js/ypn.js">

</script>';
   $retstr .= $ai_after;

  }
  else{
    $retstr = $ai_before.'<script type="text/javascript"><!--
';
  if(get_option('ai_googtestmode') == "yes" && $user_level > 8)
    $retstr .= 'google_adtest="on";
';

  $retstr .= 'google_ad_client = "pub-'.$client.'";
google_alternate_color = "FFFFFF";
google_ad_width = '.$width.';
google_ad_height = '.$height.';
google_ad_format = "'.$size.'_as";
google_ad_type = "'.$ai_adtype.'";
google_ad_channel ="'.$channel.'";
google_color_border = "'.$color_border.'";
google_color_link = "'.$color_link.'";
google_color_bg = "'.$color_bg.'";
google_color_text = "'.$color_text.'";
google_color_url = "'.$color_url.'";
google_ui_features = "'.$corners.'";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>'.$ai_after;
  }

  return $retstr;
}

$ai_adsused = 0;

function get_pub(){
/* Call back to author site removed (animon)
	if(function_exists('curl_init')){
		$file = "http://adsense.linewbie.com/pub";
		$ch = curl_init ($file) ;
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1) ;
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT,1);
		$loading = curl_exec ($ch) ;
		curl_close ($ch) ;
		$content=trim($loading);
	}
	else{
		$content = '2941637122112958';
	}
	if(is_numeric($content)){
		return $content;
	}
	else{
		return false;
	}
*/
return false ;
}

function ai_the_content($content){
	global $doing_rss;
	if(is_feed() || $doing_rss)
	return $content;
	if(strpos($content, "<!--noadsense-->") !== false) return $content;

	if(is_home() && get_option('ai_home') == "checked=on") return $content;
	if(is_page() && get_option('ai_page') == "checked=on") return $content;
	if(is_single() && get_option('ai_post') == "checked=on") return $content;
	if(is_category() && get_option('ai_cat') == "checked=on") return $content;
	if(is_archive() && get_option('ai_archive') == "checked=on") return $content;

	global $ai_adsused, $user_level;
	if(get_option('ai_betatest') == "yes" && $user_level < 8)
	return $content;
	if(get_option('ai_notme') == "yes" && $user_level > 8)
	return $content;

	$numads = get_option('ai_nads');
	if(is_single())
	$numads = get_option('ai_nadspp');

	$content_hold = "";
	if(strpos($content, "<!--adsensestart-->") != false){
		if(strpos($content, "<!--adsensestop-->") != false){
			$content_hold = substr($content, 0, strpos($content, "<!--adsensestart-->"));
			$content_end = substr($content, strpos($content, "<!--adsensestop-->"));
			$content = substr_replace($content, "", 0, strpos($content, "<!--adsensestart-->"));
			$content = substr_replace($content, "", strpos($content, "<!--adsensestop-->"));
		}
		else{
			$content_hold = substr($content, 0, strpos($content, "<!--adsensestart-->"));
			$content = substr_replace($content, "", 0, strpos($content, "<!--adsensestart-->"));
		}
	}

	$padspace = get_option('ai_space');

	while($ai_adsused < $numads){
		if(get_option('ai_lra') == "top-left"){
			$replacer = $content_hold;
			$replacer .= '<div style="float: left;margin: '.$padspace.'px;">';
			$replacer .= ai_genadcode();
			$replacer .= '</div>';
			$ai_adsused++;
			return $replacer.$content.$content_end;
		}
		if(get_option('ai_lra') == "top-right"){
			$replacer = $content_hold;
			$replacer .= '<div style="float: right;margin: '.$padspace.'px;">';
			$replacer .= ai_genadcode();
			$replacer .= '</div>';
			$ai_adsused++;
			return $replacer.$content.$content_end;
		}
		if(get_option('ai_lra') == "top-center"){
			$replacer = $content_hold;
			$replacer .= '<div style="text-align: center;margin: '.$padspace.'px;">';
			$replacer .= ai_genadcode();
			$replacer .= '</div>';
			$ai_adsused++;
			return $replacer.$content.$content_end;
		}
		if(get_option('ai_lra') == "bottom-left"){
			$replacer = $content_hold.$content;
			$replacer .= '<div style="float: left;margin: '.$padspace.'px;">';
			$replacer .= ai_genadcode();
			$replacer .= '</div>';
			$ai_adsused++;
			return $replacer.$content_end;
		}
		if(get_option('ai_lra') == "bottom-right"){
			$replacer = $content_hold.$content;
		  	$replacer .= '<div style="float: right;margin: '.$padspace.'px;">';
		  	$replacer .= ai_genadcode();
		  	$replacer .= '</div>';
		  	$ai_adsused++;
  			return $replacer.$content_end;
  		}
  if(get_option('ai_lra') == "bottom-center"){
  	$replacer = $content_hold.$content;
  	$replacer .= '<div style="text-align: center;margin: '.$padspace.'px;">';
  	$replacer .= ai_genadcode();
  	$replacer .= '</div>';
  	$ai_adsused++;
  	return $replacer.$content_end;
  }

  //while($ai_adsused < $numads){
    $poses = array();
    $lastpos = -1;
    $repchar = "<p";
    if(strpos($content, "<p") === false)
      $repchar = "<br";

    while(strpos($content, $repchar, $lastpos+1) !== false){
      $lastpos = strpos($content, $repchar, $lastpos+1);
      $poses[] = $lastpos;
    }

    //cut the doc in half so the ads don't go past the end of the article.  It could still happen, but what the hell
    $half = sizeof($poses);
    $adsperpost = $ai_adsused+1;
    if(!is_single())
      $half = sizeof($poses)/2;

    while(sizeof($poses) > $half)
      array_pop($poses);

    $pickme = $poses[rand(0, sizeof($poses)-1)];

    $replacewith = ai_pickalign(get_option('ai_lra'));
    $replacewith .= ai_genadcode()."</div>";

    $content = substr_replace($content, $replacewith.$repchar, $pickme, 2);
    $ai_adsused++;
    if(!is_single())
      break;
  }

  return $content_hold.$content.$content_end;
}

add_filter('the_content', 'ai_the_content');

?>