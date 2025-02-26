<div class="wrap" style="width:850px">

<h2>AdSense Immediately! Setup</h2>
<form method="post" name="adsenser" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
<table class="form-table">
<tr><th scope="row"><h3><?php printf(__('Options (for the %s theme)', 'easy-adsenser'), $mThemeName); ?> </h3></th></tr>
</table>

<table class="form-table" width="100%" align="top">
<tr valign="top">
<td width="400">
<b><?php _e('Ad Blocks in Your Posts', 'easy-adsenser') ; ?></b><br />
<?php _e('[Appears in your posts and pages]', 'easy-adsenser') ; ?><br />
<textarea cols="50" rows="15" name="adsenserText" style="width: 96%; height: 240px;"><?php echo(stripslashes(htmlspecialchars($adNwOptions['ad_text']))) ?></textarea>
</td>
<td>
<center>
<b><?php _e('Ad Alignment', 'easy-adsenser') ; ?></b>&nbsp;
<b><?php _e('(Where to show?)', 'easy-adsenser');?></b>
</center>
<table bgcolor="white" width="450">
<tr align="center" valign="middle">
<td>&nbsp;</td><td><?php _e('Align Left', 'easy-adsenser') ; ?> </td><td><?php _e('Center', 'easy-adsenser') ; ?> </td><td><?php _e('Align Right', 'easy-adsenser') ; ?> </td><td><?php _e('Suppress', 'easy-adsenser') ; ?></td></tr>
<tr align="center" valign="middle">
<td><?php _e('Top', 'easy-adsenser') ; ?></td>
<td>
<input type="radio" id="adsenserShowLeadin_left" name="adsenserShowLeadin" value="float:left" <?php if ($adNwOptions['show_leadin'] == "float:left") { echo('checked="checked"'); }?> />
</td><td>
<input type="radio" id="adsenserShowLeadin_center" name="adsenserShowLeadin" value="text-align:center" <?php if ($adNwOptions['show_leadin'] == "text-align:center") { echo('checked="checked"'); }?> />
</td><td>
<input type="radio" id="adsenserShowLeadin_right" name="adsenserShowLeadin" value="float:right" <?php if ($adNwOptions['show_leadin'] == "float:right") { echo('checked="checked"'); }?> />
</td><td>
<input type="radio" id="adsenserShowLeadin_no" name="adsenserShowLeadin" value="no" <?php if ($adNwOptions['show_leadin'] == "no") { echo('checked="checked"'); }?> />
</td></tr>
<tr align="center" valign="middle">
<td><?php _e('Middle', 'easy-adsenser') ; ?></td>
<td>
<input type="radio" id="adsenserShowMidtext_left" name="adsenserShowMidtext" value="float:left" <?php if ($adNwOptions['show_midtext'] == "float:left") { echo('checked="checked"'); }?> />
</td><td>
<input type="radio" id="adsenserShowMidtext_center" name="adsenserShowMidtext" value="text-align:center" <?php if ($adNwOptions['show_midtext'] == "text-align:center") { echo('checked="checked"'); }?> />
</td><td>
<input type="radio" id="adsenserShowMidtext_right" name="adsenserShowMidtext" value="float:right" <?php if ($adNwOptions['show_midtext'] == "float:right") { echo('checked="checked"'); }?> />
</td><td>
<input type="radio" id="adsenserShowMidtext_no" name="adsenserShowMidtext" value="no" <?php if ($adNwOptions['show_midtext'] == "no") { echo('checked="checked"'); }?> />
</td></tr>
<tr align="center" valign="middle">
<td><?php _e('Bottom', 'easy-adsenser') ; ?></td>
<td>
<input type="radio" id="adsenserShowLeadout_left" name="adsenserShowLeadout" value="float:left" <?php if ($adNwOptions['show_leadout'] == "float:left") { echo('checked="checked"'); }?> />
</td><td>
<input type="radio" id="adsenserShowLeadout_center" name="adsenserShowLeadout" value="text-align:center" <?php if ($adNwOptions['show_leadout'] == "text-align:center") { echo('checked="checked"'); }?> />
</td><td>
<input type="radio" id="adsenserShowLeadout_right" name="adsenserShowLeadout" value="float:right" <?php if ($adNwOptions['show_leadout'] == "float:right") { echo('checked="checked"'); }?> />
</td><td>
<input type="radio" id="adsenserShowLeadout_no" name="adsenserShowLeadout" value="no" <?php if ($adNwOptions['show_leadout'] == "no") { echo('checked="checked"'); }?> />
</td>
</tr>
<tr><td colspan="5">
<br style="line-height: 7px;" />
<b><?php _e('Suppress AdSense Ad Blocks on:', 'easy-adsenser') ; ?></b>&nbsp;&nbsp;
<input type="checkbox" id="adNwKillPages" name="adNwKillPages" value="true" <?php if ($adNwOptions['kill_pages']) { echo('checked="checked"'); }?> /> <?php _e('Pages', 'easy-adsenser') ; ?></a><br />
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
<input type="submit" name="update_adsenseSettings" value="<?php _e('Save Changes', 'easy-adsenser') ?>" title="<?php _e('Save the changes as specified above', 'easy-adsenser') ?>" onmouseover="Tip('<?php _e('Save the changes as specified above', 'easy-adsenser') ?>',WIDTH, 240, TITLE, 'Save Settings')" onmouseout="UnTip()"/>
<input type="submit" name="reset_adsenseSettings"  value="<?php _e('Reset Options', 'easy-adsenser') ?>" onmouseover="TagToTip('help3',WIDTH, 240, TITLE, 'DANGER!', BGCOLOR, '#ffcccc', FONTCOLOR, '#800000',BORDERCOLOR, '#c00000')" onmouseout="UnTip()"/>
<input type="submit" name="clean_db"  value="<?php _e('Clean Database', 'easy-adsenser') ?>" onmouseover="TagToTip('help4',WIDTH, 280, TITLE, 'DANGER!', BGCOLOR, '#ffcccc', FONTCOLOR, '#800000',BORDERCOLOR, '#c00000')" onmouseout="UnTip()"/>
<input type="submit" name="kill_me"  value="<?php _e('Uninstall', 'easy-adsenser') ?>" onmouseover="TagToTip('help5',WIDTH, 280, TITLE, 'DANGER!', BGCOLOR, '#ffcccc', FONTCOLOR, '#800000',BORDERCOLOR, '#c00000')" onmouseout="UnTip()"/>
<script type="text/javascript">var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));</script><script type="text/javascript">try {var pageTracker = _gat._getTracker("UA-693123-10");pageTracker._trackPageview();} catch(err) {}</script>
</div>
</form>
<?php echo '</div>' ; ?>
