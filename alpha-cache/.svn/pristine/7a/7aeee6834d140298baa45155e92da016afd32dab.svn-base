<div class="sub-page" id="ACH_page_log" >
  <table border=0 cellspacing=5 cellpadding=0 width=760>
		<tr><td width="25%"></td><td width="25%"></td><td width="25%"></td><td width="25%"></td></tr>
		<tr valign="top">
			<td colspan=3>
			<p><?php echo __('You may enable logging to see caching details. It is useful to analyse what is going on. Don\'t use this for regular work.')?></p>
			<label>
			<input type="checkbox" name="isLogging" value="1" <?php echo empty($acs['isLogging']) ? '' : 'checked' ?> />
			<?php echo __('Enable logging')?></label><br />
			<small><?php echo __('Tick to activate logging.');?></small>
			</td>
			<td valign="middle">
			<input type="button" class="button-secondary-red" onclick="this.form.action.value='truncate log'; this.form.submit();"
				 value="<?php echo __('Truncate log file')?>" />
		  <input type="button" class="button-primary" onclick="this.form.action.value='refresh log'; this.form.submit();"
				 value="<?php echo __('Refresh')?>" />
			</td>
		</tr>
<?php if (!$check): ?>
		<tr valign="top">
			<td colspan=4>
				<p class="error"><?php echo __('Failed to open log file for writting. Check permissions on directory: ' . $plugin_directory)?></p>
			</td>
		</tr>
<?php endif; ?>
<?php if (empty($recs['count'])): ?>
		<tr valign="top">
			<td colspan=4>
				<p><?php echo __('Log file is empty.')?></p>
			</td>
		</tr>
<?php else: ?>
	<tr valign="top">
			<td colspan=4>
				<p><?php
				echo sprintf(__('Last records of %d (up to 100). <a href="%s" target="_blank" download="alpha_cache_log.txt">Get the file</a>. Log size: %s.'),
					$recs['count'],
					$logUrl,
					$logSizeMb,
				) ?></p>
			</td>
		</tr>
<?php endif; ?>
		<tr valign="top">
			<td colspan="4">
				<div class="recLogList">
<?php
	foreach ($recs['lastRecs'] as $rec) {
		$classes = ['recLine'];
		$classes[] = $rec->isHit ? 'rec-hit' : 'rec-miss';
		$classes[] = $rec->isCached ? 'rec-cached' : 'rec-not-cached';
		echo '<div class=" ' . implode(' ', $classes) . '">'
		  . '<div class="recLine_dtm">' . $rec->dtm . '</div>'
			. '<div class="recLine_request">' . htmlentities($rec->url) . '</div>'
			. '<div class="additional-data">'
			. 	'<div class="recLine_filename"><b>Key:</b>' . htmlentities($rec->filename) . '</div>'
			.   '<div class="recLine_agent"><b>Agent:</b>' . htmlentities($rec->agent) . '</div>'
			.	  '<div class="recLine_ip"><b>From:</b>' . htmlentities($rec->ip) . '</div>'
			.	  '<div class="recLine_state"><b>Result:</b>' . htmlentities($rec->state) . '</div>'
			. '</div>'
			. '</div>';
	}
?>
				</div>
			</td>
		</tr>
	</table>
</div>