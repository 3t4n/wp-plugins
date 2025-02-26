<div class="sub-page" id="ACH_page_2" >
	<table border=0 cellspacing=5 cellpadding=0 width=760>
		<tr><td width="25%"></td><td width="25%"></td><td width="25%"></td><td width="25%"></td></tr>
		<tr valign="top">
			<td colspan=4>
				<p><?php echo __('It`s all about cache.')?></p>
			</td>
		</tr>
		<tr valign="top">
			<td colspan=2>
			<label for="cache_lifetime"><b><?php echo __('Cache lifetime')?></b></label><br />
			<small><?php echo __('Set lifetime of single cache record in seconds.');?></small>
			</td><td colspan=2>
			<input type="text" style="text-align: right;" name="cache_lifetime" size="10" value="<?php echo htmlspecialchars($acs['cache_lifetime'])?>" /> <?php echo __('s.')?>
			</td><td align="right">
				<input type="button" class="button-secondary-red" onclick="this.form.action.value='clear cache data'; this.form.submit();"
					 value="<?php echo __('Clear cache')?>" />
			</td>
		</tr>
		<tr valign="top">
			<td colspan=2>
			<label for="dbmaintain_period"><b><?php echo __('Maintain period')?></b></label><br />
			<small><?php echo __('Periodically it checks and cache clean-ups. All expired cache data will be removed.');?></small>
			</td><td colspan=2>
			<input type="text" style="text-align: right;" name="dbmaintain_period" size="10" value="<?php echo htmlspecialchars($acs['dbmaintain_period'])?>" /> <?php echo __('s.')?>
			</td>
		</tr>
		<tr valign="top">
			<td colspan=2>
			<b><?php echo __('Last maintain')?></b><br />
			<small><?php echo __('When clean-up cache routine was ran last time.');?></small>
			</td><td colspan=2><?php echo !empty($acs['last-maintain']) ? date('j M Y H:i', $acs['last-maintain']) . ' GTM' : __('Never')?></td>
		</tr>
		<tr valign="top">
			<td colspan=2>
			<label for="cache-dir"><b><?php echo __('Cached files directory')?></b></label><br />
			<small><?php echo __('Where cached files actually will placed.');?></small>
			</td><td colspan=2>
			<textarea readonly style="width: 100%; resize: none;"><?php echo htmlspecialchars($acs['cache-dir'])?></textarea>
			</td>
		</tr>
		<tr valign="top">
			<td colspan=2>
			<label for="cache-dir"><b><?php echo __('Disk usage stats')?></b></label><br />
			</td><td colspan=2>
<?php

		echo "<table border=1 cellpadding=5 cellspacing=0 width=100% style='border-collapse: collapse'><tr>
			<th>" . __('User name') . "</th>
			<th>" . __('Urls') . "</th>
			<th>" . __('Size') . "</th></tr>";

		if (!empty($stats)) {
			foreach($stats as $host => $data) {
				echo '<tr><td colspan="3">' . $host. '</td></tr>';

				foreach($data as $usrID => $usr) {
					if ($usrID === 'total') continue;
					echo "<tr><td>" . ($usrID ? htmlspecialchars($usrID) : __('Anonymous')) . '</td><td td align=center>' . $usr['cnt']
					. '</td><td align=right>' . AlphaCacheClass::inttoMB($usr['size']) .  '</td></tr>';
				}
				echo '<tr><td colspan="2">' . __('total for') . ' ' . $host . '</td><td td align=right>' . AlphaCacheClass::inttoMB($stats[$host]['total']) . '</td></tr>';
			}
		}
		echo '</table>';
?>
			</td>
		</tr>

		<tr>
			<td colspan="4">
			</td>
		</tr>
	</table>
</div>