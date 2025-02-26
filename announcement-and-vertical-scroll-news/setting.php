<div class="wrap">
  <h2><?php echo wp_specialchars( 'Announcement' ); ?></h2>
  <?php
global $wpdb, $wp_version;

$gAnnounce_title = get_option('gAnnounce_title');
$gAnnounce_width = get_option('gAnnounce_width');
$gAnnounce_font = get_option('gAnnounce_font');
$gAnnounce_height = get_option('gAnnounce_height');
$gAnnounce_fontsize = get_option('gAnnounce_fontsize');
$gAnnounce_slidedirection = get_option('gAnnounce_slidedirection');
$gAnnounce_fontweight = get_option('gAnnounce_fontweight');
$gAnnounce_slidetimeout = get_option('gAnnounce_slidetimeout');
$gAnnounce_fontcolor = get_option('gAnnounce_fontcolor');
$gAnnounce_textalign = get_option('gAnnounce_textalign');
$gAnnounce_textvalign = get_option('gAnnounce_textvalign');
$gAnnounce_noannouncement = get_option('gAnnounce_noannouncement');
$gAnnounce_order = get_option('gAnnounce_order');

if ($_POST['gAnnounce_submit']) 
{	
	$gAnnounce_title = stripslashes($_POST['gAnnounce_title']);
	$gAnnounce_width = stripslashes($_POST['gAnnounce_width']);
	$gAnnounce_font = stripslashes($_POST['gAnnounce_font']);
	$gAnnounce_height = stripslashes($_POST['gAnnounce_height']);
	$gAnnounce_fontsize = stripslashes($_POST['gAnnounce_fontsize']);
	$gAnnounce_slidedirection = stripslashes($_POST['gAnnounce_slidedirection']);
	$gAnnounce_fontweight = stripslashes($_POST['gAnnounce_fontweight']);
	$gAnnounce_slidetimeout = stripslashes($_POST['gAnnounce_slidetimeout']);
	$gAnnounce_fontcolor = stripslashes($_POST['gAnnounce_fontcolor']);
	$gAnnounce_textalign = stripslashes($_POST['gAnnounce_textalign']);
	$gAnnounce_textvalign = stripslashes($_POST['gAnnounce_textvalign']);
	$gAnnounce_noannouncement = stripslashes($_POST['gAnnounce_noannouncement']);
	$gAnnounce_order = stripslashes($_POST['gAnnounce_order']);
	
	update_option('gAnnounce_title', $gAnnounce_title );
	update_option('gAnnounce_width', $gAnnounce_width );
	update_option('gAnnounce_font', $gAnnounce_font );
	update_option('gAnnounce_height', $gAnnounce_height );
	update_option('gAnnounce_fontsize', $gAnnounce_fontsize );
	update_option('gAnnounce_slidedirection', $gAnnounce_slidedirection );
	update_option('gAnnounce_fontweight', $gAnnounce_fontweight );
	update_option('gAnnounce_slidetimeout', $gAnnounce_slidetimeout );
	update_option('gAnnounce_fontcolor', $gAnnounce_fontcolor );
	update_option('gAnnounce_textalign', $gAnnounce_textalign );
	update_option('gAnnounce_textvalign', $gAnnounce_textvalign );
	update_option('gAnnounce_noannouncement', $gAnnounce_noannouncement );
	update_option('gAnnounce_order', $gAnnounce_order );
}
?>
  <div align="left" style="padding-top:5px;padding-bottom:5px;"> 
  <a href="options-general.php?page=announcement-and-vertical-scroll-news/announcement-and-vertical-scroll-news.php">Manage Page</a> 
  <a href="options-general.php?page=announcement-and-vertical-scroll-news/setting.php">Setting Page</a> </div>

  <form name="form_gAnnounce" method="post" action="">
    <table width='99%' border='0' cellspacing='0' cellpadding='3'>
      <tr>
        <td width='242'>&nbsp;</td>
        <td width='14'>&nbsp;</td>
        <td width='632'>&nbsp;</td>
        <td width='36' rowspan="12" align="center" valign="top"><?php if (function_exists (timepass)) timepass(); ?></td>
      </tr>
      <tr>
        <td>Title:</td>
        <td>&nbsp;</td>
        <td>Width (only number):</td>
      </tr>
      <tr>
        <td><input name='gAnnounce_title' type='text' id='gAnnounce_title'  value='<?php echo $gAnnounce_title; ?>' size="30" maxlength="100" /></td>
        <td>&nbsp;</td>
        <td><input name='gAnnounce_width' type='text' id='gAnnounce_width'  value='<?php echo $gAnnounce_width; ?>' size="30" maxlength="3" /></td>
      </tr>
      <tr>
        <td>Font: </td>
        <td>&nbsp;</td>
        <td>Height (only number):</td>
      </tr>
      <tr>
        <td><input name='gAnnounce_font'  type='text' id='gAnnounce_font' value='<?php echo $gAnnounce_font; ?>' size="30" /></td>
        <td>&nbsp;</td>
        <td><input name='gAnnounce_height' type='text' id='gAnnounce_height'  value='<?php echo $gAnnounce_height; ?>' size="30" maxlength="3" /></td>
      </tr>
      <tr>
        <td>Font Size(Ex:13px):</td>
        <td>&nbsp;</td>
        <td>Slide Direction(0=down-up;1=up-down:)</td>
      </tr>
      <tr>
        <td><input name='gAnnounce_fontsize' type='text' id='gAnnounce_fontsize'  value='<?php echo $gAnnounce_fontsize; ?>' size="30" maxlength="6" /></td>
        <td>&nbsp;</td>
        <td><input name='gAnnounce_slidedirection' type='text' id='gAnnounce_slidedirection'  value='<?php echo $gAnnounce_slidedirection; ?>' size="30" maxlength="1" /></td>
      </tr>
      <tr>
        <td>Font Weight(blod/normal):</td>
        <td>&nbsp;</td>
        <td>Slide Timeout (1000=1 second):</td>
      </tr>
      <tr>
        <td><input name='gAnnounce_fontweight' type='text' id='gAnnounce_fontweight'  value='<?php echo $gAnnounce_fontweight; ?>' size="30" maxlength="10" /></td>
        <td>&nbsp;</td>
        <td><input name='gAnnounce_slidetimeout' type='text' id='gAnnounce_slidetimeout'  value='<?php echo $gAnnounce_slidetimeout; ?>' size="30" maxlength="5" /></td>
      </tr>
      <tr>
        <td>Font Color (Ex: #000000):</td>
        <td>&nbsp;</td>
        <td>Text Valign (top/middle/bottom):</td>
      </tr>
      <tr>
        <td><input name='gAnnounce_fontcolor' type='text' id='gAnnounce_fontcolor'  value='<?php echo $gAnnounce_fontcolor; ?>' size="30" maxlength="20" /></td>
        <td>&nbsp;</td>
        <td><input name='gAnnounce_textvalign' type='text' id='gAnnounce_textvalign'  value='<?php echo $gAnnounce_textvalign; ?>' size="30" maxlength="6" /></td>
      </tr>
      <tr>
        <td>No Announcement Text:</td>
        <td>&nbsp;</td>
        <td>Text Alignt (left/center/right/justify):</td>
      </tr>
      <tr>
        <td><input name='gAnnounce_noannouncement' type='text' id='gAnnounce_noannouncement'  value='<?php echo $gAnnounce_noannouncement; ?>' size="30" maxlength="200" /></td>
        <td>&nbsp;</td>
        <td>
		<input name='gAnnounce_textalign' type='text' id='gAnnounce_textalign'  value='<?php echo $gAnnounce_textalign; ?>' size="30" maxlength="8" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3">Announcement Order </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3"><input name='gAnnounce_order' type='text' id='gAnnounce_order'  value='<?php echo $gAnnounce_order; ?>' size="10" maxlength="1" />
        ( 0 = Display order(it is available in manage page link), 1= Random Order) </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="40" colspan="3" align="left" valign="bottom"><input name="gAnnounce_submit" id="gAnnounce_submit" lang="publish" class="button-primary" value="Update Setting" type="submit" /></td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </form>
  <h2><?php echo wp_specialchars( 'Paste the below code to your desired template location!' ); ?></h2>
  <div style="padding-top:7px;padding-bottom:7px;"> <code style="padding:7px;"> &lt;?php if (function_exists (gAnnouncement)) gAnnouncement(); ?&gt; </code></div>
  <div align="left" style="padding-top:8px;padding-bottom:8px;"> 
  <a href="options-general.php?page=announcement-and-vertical-scroll-news/announcement-and-vertical-scroll-news.php">Manage Page</a> 
  <a href="options-general.php?page=announcement-and-vertical-scroll-news/setting.php">Setting Page</a> </div>
  Click manage page link to add/update/delete announcement. <br> 
  <h2><?php echo wp_specialchars( 'About Plugin' ); ?></h2>
  Plug-in created by <a target="_blank" href='http://www.gopiplus.com/'>Gopi</a>. <br> 
  <a target="_blank" href='http://www.gopiplus.com/work/2010/07/18/announcement-and-vertical-scroll-news/'>Click here</a> to post suggestion or comments or feedback. <br> 
  <a target="_blank" href='http://www.gopiplus.com/work/2010/07/18/announcement-and-vertical-scroll-news/'>Click here</a> to see live demo. <br> 
  <a target="_blank" href='http://www.gopiplus.com/work/plugin-list/'>Click here</a> to download my other plugins. <br> 
  <br>
</div>
