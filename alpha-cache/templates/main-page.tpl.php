<div class="sub-page" id="ACH_page_1" >
  <table border=0 cellspacing=5 cellpadding=0 width=760>
		<tr><td width="25%"></td><td width="25%"></td><td width="25%"></td><td width="25%"></td></tr>
		<tr valign="top">
			<td colspan=3>
			<label for="avoid_urls"><b><?php echo __('Set rules to avoid caching necessary urls')?></b></label><br />
			<small><?php echo __('One line - one rule, here you should use <a target="_blank" href="http://www.php.net/manual/en/pcre.pattern.php">PCRE Patterns</a>.')?></small><br />
			<textarea name="avoid_urls" rows="5" cols="60"><?php echo htmlspecialchars($acs['avoid_urls'])?></textarea><br />
			</td><td>

			</td>
		</tr>
		<tr valign="top">
			<td colspan=2>
			<label for="users_nocache"><b><?php echo __('Don`t cache these users')?></b></label><br />
			<small><?php echo __('Input logins separated by comma or use user`s list.');?></small><br />
			<textarea id="users_nocache" name="users_nocache" rows="5" cols="60"><?php echo htmlspecialchars($acs['users_nocache'])?></textarea>
			</td>
			<td colspan=2>
			<br/>
			<small><?php echo __('You can use multi-select.')?></small><br />
			<select id="user_selector" name="users" multiple size="5" style="width: 350px;">
<?php
	foreach($users as $v) {
		echo "<option value=\"{$v->user_login}\">{$v->user_login} ({$v->user_email})</option>";
	}
?>
			</select><br />
			<input type="button" class="button" onclick="
	var slk = document.getElementById('user_selector');
	var st = Array();

	for (var i = 0; i<slk.options.length; i++)
		if (slk.options[i].selected) {
			st[st.length] = slk.options[i].value;
		}
	var txa = document.getElementById('users_nocache');
	var tagList = txa.value.split(/\s*,\s*/);

	if (tagList.length == 1 && tagList[0] == '') tagList = Array();

	for (j = 0; j < st.length; j++) {
		var exst = false;

		for (i = 0; i < tagList.length; i++) {
			if (tagList[i] == st[j]) {
				exst = true;
			}
		}
		if (!exst) {
			tagList[tagList.length] = st[j];
		}
	}

	txa.value = tagList.join(', ');
				" value="<?php echo __('Add to list')?>" />
			</td>
		</tr>

		<tr valign="top">
			<td colspan=3>
			<label >
			<input type="checkbox" name="doStat" value="1" <?php echo empty($acs['doStat']) ? '' : 'checked' ?> />
			<?php echo __('Count hits and misses to cache.')?></label>
<?php
	if (!empty($acs['doStat'])) {
		echo '<br /><i>';

		if ($acs['hits'] + $acs['miss']) {
			$total = $acs['hits'] + $acs['miss'];
			$ratio = sprintf("%01.2f", $acs['hits'] / $total * 100);

			echo __("We have $ratio % of cached queries of $total total requests.");
		} else {
			echo __("We have no statistics yet.");
		}
		echo "</i>";
	}
?>
			</td><td align="right">
<?php
			if (!empty($acs['doStat'])):
?>
				<input type="button" class="button-secondary-red" onclick="this.form.action.value='clear statistics'; this.form.submit();"
					 value="<?php echo __('Clear stats')?>" />
<?php
			endif;
?>

			</td>
		</tr>

		<tr valign="top">
			<td colspan=4>
			<label>
			<input type="checkbox" name="chAnon" value="1" <?php echo empty($acs['chAnon']) ? '' : 'checked'?> />
			<?php echo __('Do cache only for anonymous users.')?></label><br />
			</td>
		</tr>

		<tr valign="top">
			<td colspan=4>
			<label>
			<input type="checkbox" name="disableOnBots" value="1" <?php echo empty($acs['disableOnBots']) ? '' : 'checked'?> />
			<?php echo __('Don\'t create cache on bot requests.')?></label><br />
			</td>
		</tr>

		<tr valign="top">
			<td colspan=4>
			<label>
			<input type="checkbox" name="chTRACK" value="1" <?php echo empty($acs['chTRACK']) ? '' : 'checked' ?> />
			<?php echo __('Clean cache for updated posts/comments')?></label>
			</td>
		</tr>

		<tr valign="top">
			<td colspan=4>
			<label>
			<input type="checkbox" name="multythemes" value="1" <?php echo empty($acs['multythemes']) ? '' : 'checked' ?> />
			<?php echo __('Multy theme site')?></label><br />
			<small><?php echo __('Check it if your website uses plugins like «Any mobile theme switcher», which allows to use more then one theme.');?></small>
			</td>
		</tr>

		<tr valign="top">
			<td colspan=4>
			<label>
			<input type="checkbox" name="getIns" value="1" <?php echo empty($acs['getIns']) ? '' : 'checked' ?> />
			<?php echo __('GET vars insensitive')?></label><br />
			<small><?php echo __('Cache will ignore GET parameters (everything after ? in url address). So page /?a=1 will be equal to /?a=2.');?>
			      <?php echo __('Also you may provide list of GET parameters to ignore (space separated keys like "param1 param2 param3").');?><br />
						<?php echo __('If provided only they will be ignored.');?></small><br />
			<textarea name="ignore_gets" rows="3" cols="60"><?php echo htmlspecialchars($acs['ignore_gets'])?></textarea><br />

			</td>
		</tr>
	</table>
</div>
