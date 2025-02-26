<!-- Start Anti-Spam Zapper Admin Page -->
<div class="wrap">
    <h2>Anti-Spam Zapper</h2>

    <a style="margin-top:10px !important;display: inline-block;" href="https://www.designsmoke.com/anti-spam-zapper-wordpress-plugin/" rel="external"><img src="<?php echo plugin_dir_url(__FILE__);  ?>/admin-header.png" alt="anti-spam zapper logo" style="max-width:100%;height:auto;"></a>
    <p><?php echo __('Anti-Spam Zapper is a free and open-source plugin that allows you to stop nearly all spam comments on your blog, without annoying CAPTCHAs or questions.', 'anti-spam-zapper'); ?></p>
    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    	<?php $GLOBALS['AntiSpamZapper']->the_nonce(); ?>
    	<table class="form-table">
			<tbody>


				<tr>
					<th scope="row" valign="top"><?php echo __('Enable Credits', 'anti-spam-zapper'); ?></th>
					<td>
						<label>
							<input type="hidden" name="<?php echo $GLOBALS['AntiSpamZapper']->get_field_name('antispamzp_enable_credits'); ?>" value="0" />
							<input type="checkbox" name="<?php echo $GLOBALS['AntiSpamZapper']->get_field_name('antispamzp_enable_credits'); ?>" value="1" <?php echo ($GLOBALS['AntiSpamZapper']->get_setting('antispamzp_enable_credits') ? 'checked' : ''); ?>/>
							<br />
							<?php echo __('Enable credits to show your support for Anti-Spam Zapper, and lets your commenters know that they\'re protected.', 'anti-spam-zapper'); ?>
						</label>
					</td>
				</tr>


				<tr>
					<th scope="row" valign="top"><?php echo __('Enable Blacklist', 'anti-spam-zapper'); ?></th>
					<td>
						<label>
							<input type="hidden" name="<?php echo $GLOBALS['AntiSpamZapper']->get_field_name('antispamzp_enable_blacklist'); ?>" value="0" />
							<input type="checkbox" name="<?php echo $GLOBALS['AntiSpamZapper']->get_field_name('antispamzp_enable_blacklist'); ?>" value="1" <?php echo ($GLOBALS['AntiSpamZapper']->get_setting('antispamzp_enable_blacklist') ? 'checked' : ''); ?>/>
							<br />
							<?php echo __('Enables the included blacklist, updated with the plugin. Disable this if you notice legitimate comments marked as spam.', 'anti-spam-zapper'); ?>
						</label>
					</td>
				</tr>
			</tbody>
    	</table>
	<br><br>
    	<input class="button-primary" type="submit" value="<?php echo __('Save Settings', 'anti-spam-zapper'); ?>" />
	<br><br><hr><br><br>
	<?php echo __('Want to protect your contact forms and get more features?', 'anti-spam-zapper'); ?>
	<a href="https://www.designsmoke.com/anti-spam-zapper-wordpress-plugin/">Click here to get Anti-Spam Zapper PRO for 15% off!</a>
	<br><br><strong>Premium Features:</strong>
	<ul style="list-style: inside;margin-top:0;">
		<li>Extra human checks, blocks nearly all robots without annoying CAPTCHAs!</li>
		<li>The most up-to-date spam blacklists</li>
		<li>Integration with the most popular contact form plugins</li>
	</ul>
    </form>
</div>