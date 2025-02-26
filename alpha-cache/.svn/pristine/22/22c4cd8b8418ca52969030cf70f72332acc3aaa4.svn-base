<div class="sub-page" id="ACH_page_11" >
  <table border=0 cellspacing=5 cellpadding=0 width=760>
		<tr><td width="25%"></td><td width="25%"></td><td width="25%"></td><td width="25%"></td></tr>

<?php if (!$isHtaccessWritable): ?>
		<tr valign="top">
			<td colspan=4>
				<p class="error"><?php echo __('Failed to open .htaccess file for writting. Check permissions on this file in the document root: ' . ABSPATH)?></p>
			</td>
		</tr>
<?php endif; ?>

		<tr valign="top">
			<td colspan=4>
			<p><?php echo __('Next switchers can decrease server load and traffic volume for Apache web servers.')?></p>
			<label>
			<input type="checkbox" name="speed-expire" value="1" <?php echo empty($acs['speed-expire']) ? '' : 'checked' ?> />
			<?php echo __('Activate browser cache')?></label><br />
			<small><?php echo __('This checkbox plays with Apache mod_headers and mod_expires params.');?></small>
			</td>
		</tr>

		<tr valign="top">
			<td colspan=4>
			<label>
			<input type="checkbox" name="speed-deflate" value="1" <?php echo empty($acs['speed-deflate']) ? '' : 'checked' ?> />
			<?php echo __('Activate server side compression')?></label><br />
			<small><?php echo __('This checkbox plays with Apache mod_deflate params.');?></small>
			</td>
		</tr>
	</table>
</div>