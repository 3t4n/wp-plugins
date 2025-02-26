<div class="wrap">
<?php screen_icon();
      $domain_name =  preg_replace('/^www\./','',$_SERVER['SERVER_NAME']); ?>
  <h2>(Average) WYSIWYG Helper</h2>
  <div class="update-nag">Average is changing its name to AddFunc (good thing). Therefore, this plugin has been improved and republished as <a href="https://wordpress.org/plugins/addfunc-wysiwyg-helper/" target="_blank">AddFunc WYSIWYG Helper</a>. <a href="/wp-admin/plugin-install.php?tab=search&s=AddFunc+WYSIWYG+Helper">Try this link for an easy install</a> (this link works in most WordPress 4+ installs). In the "AddFunc version", the WYSIWYG Helper settings are a user preference rather than a universal preference that can only be managed by an Administrator. The "AddFunc version" is compatible with the "Average version," so installation and activation is risk-free. Just deactivate the old one, install/activate the new one, turn it on in your user profile preferences and you're done. Switching to the "AddFunc version" is optional. The "Average version" will remain available with minimal support until it becomes a burden for AddFunc (probably for many years to come, as of 2015). Any new features will only be added to the "AddFunc version," so it is of course the recommended version (at least moving forward). Thanks!</div>
  <div id="poststuff">
    <div id="post-body" class="metabox-holder columns-2">
      <div id="post-body-content">
	<form action="options.php" method="post" id="<?php echo $avrgwysiwygID; ?>_options_form" name="<?php echo $avrgwysiwygID; ?>_options_form">
	<?php settings_fields($avrgwysiwygID.'_options'); ?>
        <label for="wysiwym_display" >Show WYSIWYM</label>
        <div style="display: inline;" class="noyesswitch">
          <input type="checkbox" name="wysiwym_display" class="noyesswitch-checkbox" id="wysiwym_display" value="1" <?php checked( '1', get_option('wysiwym_display') ); ?> />
          <label class="noyesswitch-label" for="wysiwym_display">
            <div class="noyesswitch-inner"></div>
            <div class="noyesswitch-switch"></div>
          </label>
        </div>
        <br />
        <label for="cancel_mce_defaults" >Cancel Default Styles</label>
        <div style="display: inline;" class="noyesswitch">
          <input type="checkbox" name="cancel_mce_defaults" class="noyesswitch-checkbox" id="cancel_mce_defaults" value="1" <?php checked( '1', get_option('cancel_mce_defaults') ); ?> />
          <label class="noyesswitch-label" for="cancel_mce_defaults">
            <div class="noyesswitch-inner"></div>
            <div class="noyesswitch-switch"></div>
          </label>
        </div>
        <p class="description hideswitch">Overrides default caption styles (that's all, so far).</p>
<?php submit_button(); ?>
	</form>
      </div> <!-- post-body-content -->
			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">
            <h2>Support Tickets</h2>
            <p>If you need custom support for this plugin (Average WYSIWYG Helper) or any other Average plugin, you can purchase help with a support ticket below. Support tickets are responded to within 24 hours, but we answer them as soon as possible.</p>
            <p><strong>How it works</strong></p>
            <ol>
              <li>Purchase a support ticket below</li>
              <li>I contact you as soon as I can (no less than 24 hours) and help resolve your issue</li>
              <li>That's it!</li>
            </ol>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input name="cmd" type="hidden" value="_s-xclick" />
  <input name="hosted_button_id" type="hidden" value="45JKXJDBN9AME" />
              <table><tbody><tr>
                <td><input name="on0" type="hidden" value="Please give your ticket a name" />Please give your ticket a name</td>
                </tr>
                <tr>
                  <td><input maxlength="200" name="os0" type="text" /></td>
                </tr>
                <tr>
                  <td><input name="on1" type="hidden" value="Best way to contact you" />Best way to contact you</td>
                </tr>
                <tr>
                  <td><input maxlength="200" name="os1" type="text" /></td>
                </tr></tbody></table>
              <input alt="PayPal - The safer, easier way to pay online!" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" type="image" />
              <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-small.png" alt="Buy now with PayPal" />
        </form>
            <p><strong>Note</strong>: This is for&nbsp;<em>custom</em>&nbsp;needs for help, not problems with the plugin, or instructions that should already be explain in the description. If you feel there are important details omitted from the <a href="http://wordpress.org/plugins/average-wysiwyg-helper/" target="_blank">Description</a>, <a href="http://wordpress.org/plugins/average-wysiwyg-helper/installation/" target="_blank">Installation</a> steps, etc. of the plugin, please report them in the <a href="http://wordpress.org/support/plugin/average-wysiwyg-helper" target="_blank">Support forum</a>. Thanks!</p>
			</div> <!-- #postbox-container-1 .postbox-container -->
		</div> <!-- #post-body .metabox-holder .columns-2 -->
		<br class="clear">
	</div> <!-- #poststuff -->
</div>