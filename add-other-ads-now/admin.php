<?php
/*
Copyright (C) 2010 www.prima-posizione.it

This file is part of the program "AdOther Now!"

AdOther Now! is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or (at
your option) any later version.

AdOther Now! is distributed in the hope that it will be useful, but
WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

AdOther Now! is supported by ad space sharing. Unless you configure
the program (following the instructions on its admin page) and
explicitly turn off the sharing, you agree to run its developer's ads
on your site(s). By using the program, you are agreeing to this
condition, and confirming that your sites abide by Google's policies
and terms of service.
*/

?>
<div class="wrap" style="width:850px">

<h2>AdOther Now! Setup <a href="http://validator.w3.org/" target="_blank"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" title="AdOther Now! Admin Page is certified Valid XHTML 1.0 Transitional" height="31" width="88" class="alignright"/></a></h2>

<form method="post" name="adsenser" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
<table class="form-table">
<tr><th scope="row"><h3><?php printf(__('Options (for the %s theme)', 'easy-adsenser'), $mThemeName); ?> </h3></th></tr>
</table>

<table class="form-table" width="100%">
<tr valign="top">
<td width="400">
<b><?php _e('Ad Blocks in Your Posts', 'easy-adsenser') ; ?></b><br />
<?php _e('[Appears in your posts and pages]', 'easy-adsenser') ; ?><br />
<textarea cols="50" rows="15" name="adsOtherNowText" style="width: 96%; height: 240px;"><?php echo(stripslashes(htmlspecialchars($adNwOptions['ad_text']))) ?></textarea>
</td>
<td>
<center>
<b><?php _e('Ad Alignment', 'easy-adsenser') ; ?></b>&nbsp;
<b><?php _e('(Where to show?)', 'easy-adsenser') ; ?></b>
</center>
<table bgcolor="white" width="450">
<tr align="center" valign="middle">
<td>&nbsp;</td><td><?php _e('Align Left', 'easy-adsenser') ; ?> </td><td><?php _e('Center', 'easy-adsenser') ; ?> </td><td><?php _e('Align Right', 'easy-adsenser') ; ?> </td><td><?php _e('Suppress', 'easy-adsenser') ; ?></td></tr>
<tr align="center" valign="middle">
<td><?php _e('Top', 'easy-adsenser') ; ?></td>
<td>
<input type="radio" id="adsOtherNowShowLeadin_left" name="adsOtherNowShowLeadin" value="float:left" <?php if ($adNwOptions['show_leadin'] == "float:left") { echo('checked="checked"'); }?> />
</td><td>
<input type="radio" id="adsOtherNowShowLeadin_center" name="adsOtherNowShowLeadin" value="text-align:center" <?php if ($adNwOptions['show_leadin'] == "text-align:center") { echo('checked="checked"'); }?> />
</td><td>
<input type="radio" id="adsOtherNowShowLeadin_right" name="adsOtherNowShowLeadin" value="float:right" <?php if ($adNwOptions['show_leadin'] == "float:right") { echo('checked="checked"'); }?> />
</td><td>
<input type="radio" id="adsOtherNowShowLeadin_no" name="adsOtherNowShowLeadin" value="no" <?php if ($adNwOptions['show_leadin'] == "no") { echo('checked="checked"'); }?> />
</td></tr>
<tr align="center" valign="middle">
<td><?php _e('Middle', 'easy-adsenser') ; ?></td>
<td>
<input type="radio" id="adsOtherNowShowMidtext_left" name="adsOtherNowShowMidtext" value="float:left" <?php if ($adNwOptions['show_midtext'] == "float:left") { echo('checked="checked"'); }?> />
</td><td>
<input type="radio" id="adsOtherNowShowMidtext_center" name="adsOtherNowShowMidtext" value="text-align:center" <?php if ($adNwOptions['show_midtext'] == "text-align:center") { echo('checked="checked"'); }?> />
</td><td>
<input type="radio" id="adsOtherNowShowMidtext_right" name="adsOtherNowShowMidtext" value="float:right" <?php if ($adNwOptions['show_midtext'] == "float:right") { echo('checked="checked"'); }?> />
</td><td>
<input type="radio" id="adsOtherNowShowMidtext_no" name="adsOtherNowShowMidtext" value="no" <?php if ($adNwOptions['show_midtext'] == "no") { echo('checked="checked"'); }?> />
</td></tr>
<tr align="center" valign="middle">
<td><?php _e('Bottom', 'easy-adsenser') ; ?></td>
<td>
<input type="radio" id="adsOtherNowShowLeadout_left" name="adsOtherNowShowLeadout" value="float:left" <?php if ($adNwOptions['show_leadout'] == "float:left") { echo('checked="checked"'); }?> />
</td><td>
<input type="radio" id="adsOtherNowShowLeadout_center" name="adsOtherNowShowLeadout" value="text-align:center" <?php if ($adNwOptions['show_leadout'] == "text-align:center") { echo('checked="checked"'); }?> />
</td><td>
<input type="radio" id="adsOtherNowShowLeadout_right" name="adsOtherNowShowLeadout" value="float:right" <?php if ($adNwOptions['show_leadout'] == "float:right") { echo('checked="checked"'); }?> />
</td><td>
<input type="radio" id="adsOtherNowShowLeadout_no" name="adsOtherNowShowLeadout" value="no" <?php if ($adNwOptions['show_leadout'] == "no") { echo('checked="checked"'); }?> />
</td>
</tr>
<tr><td colspan="5">
<br style="line-height: 7px;" />
<b><?php _e('Suppress AdOther Ad Blocks on:', 'easy-adsenser') ; ?></b>&nbsp;&nbsp;
<input type="checkbox" id="adNwKillPages" name="adNwKillPages" value="true" <?php if ($adNwOptions['kill_pages']) { echo('checked="checked"'); }?> /> <a href="http://codex.wordpress.org/Pages" target="_blank" title="<?php _e('Click to see the difference between posts and pages', 'easy-adsenser') ; ?>"><?php _e('Pages (Ads only on Posts)', 'easy-adsenser') ; ?></a><br />
<label for="adNwKillAttach" title="<?php _e('Pages that show attachments', 'easy-adsenser') ; ?>">
<input type="checkbox" id="adNwKillAttach" name="adNwKillAttach" <?php if ($adNwOptions['kill_attach']) { echo('checked="checked"'); }?> /> <?php _e('Attachment Page', 'easy-adsenser') ; ?></label>&nbsp;&nbsp;
<label for="adNwKillHome" title="<?php _e('Home Page and Front Page are the same for most blogs', 'easy-adsenser') ; ?>">
<input type="checkbox" id="adNwKillHome" name="adNwKillHome" <?php if ($adNwOptions['kill_home']) { echo('checked="checked"'); }?> /> <?php _e('Home Page', 'easy-adsenser') ; ?></label>&nbsp;&nbsp;
<label for="adNwKillFront" title="<?php _e('Home Page and Front Page are the same for most blogs', 'easy-adsenser') ; ?>">
<input type="checkbox" id="adNwKillFront" name="adNwKillFront" <?php if ($adNwOptions['kill_front']) { echo('checked="checked"'); }?> /> <?php _e('Front Page', 'easy-adsenser') ; ?></label>&nbsp;&nbsp;
<br />
<label for="adNwKillCat" title="<?php _e('Pages that come up when you click on category names', 'easy-adsenser') ; ?>">
<input type="checkbox" id="adNwKillCat" name="adNwKillCat" <?php if ($adNwOptions['kill_cat']) { echo('checked="checked"'); }?> /> <?php _e('Category Pages', 'easy-adsenser') ; ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
<label for="adNwKillTag" title="<?php _e('Pages that come up when you click on tag names', 'easy-adsenser') ; ?>">
<input type="checkbox" id="adNwKillTag" name="adNwKillTag" <?php if ($adNwOptions['kill_tag']) { echo('checked="checked"'); }?> /> <?php _e('Tag Pages', 'easy-adsenser') ; ?></label>&nbsp;&nbsp;&nbsp;
<label for="adNwKillArchive" title="<?php _e('Pages that come up when you click on year/month archives', 'easy-adsenser') ; ?>">
<input type="checkbox" id="adNwKillArchive" name="adNwKillArchive" <?php if ($adNwOptions['kill_archive']) { echo('checked="checked"'); }?> /> <?php _e('Archive Pages', 'easy-adsenser') ; ?></label>&nbsp;&nbsp;
</td></tr>
</table>

</td>
</tr>
</table>

<div class="submit">
<input type="submit" name="update_adsOtherNowSettings" value="<?php _e('Save Changes', 'easy-adsenser') ?>" title="<?php _e('Save the changes as specified above', 'easy-adsenser') ?>" onmouseover="Tip('<?php _e('Save the changes as specified above', 'easy-adsenser') ?>',WIDTH, 240, TITLE, 'Save Settings')" onmouseout="UnTip()"/>
<input type="submit" name="reset_adsOtherNowSettings"  value="<?php _e('Reset Options', 'easy-adsenser') ?>" onmouseover="TagToTip('help3',WIDTH, 240, TITLE, 'DANGER!', BGCOLOR, '#ffcccc', FONTCOLOR, '#800000',BORDERCOLOR, '#c00000')" onmouseout="UnTip()"/>
<input type="submit" name="clean_db"  value="<?php _e('Clean Database', 'easy-adsenser') ?>" onmouseover="TagToTip('help4',WIDTH, 280, TITLE, 'DANGER!', BGCOLOR, '#ffcccc', FONTCOLOR, '#800000',BORDERCOLOR, '#c00000')" onmouseout="UnTip()"/>
<input type="submit" name="kill_me"  value="<?php _e('Uninstall', 'easy-adsenser') ?>" onmouseover="TagToTip('help5',WIDTH, 280, TITLE, 'DANGER!', BGCOLOR, '#ffcccc', FONTCOLOR, '#800000',BORDERCOLOR, '#c00000')" onmouseout="UnTip()"/>
</div>
</form>



<?php echo '</div>' ; ?>
