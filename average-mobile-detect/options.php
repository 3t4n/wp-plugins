<div class="wrap">
<?php screen_icon();
      $domain_name =  preg_replace('/^www\./','',$_SERVER['SERVER_NAME']); ?>
  <h2>(Average) Mobile Detect</h2>
  <div class="update-nag">Average is changing its name to AddFunc (thank goodness). Therefore, this plugin has been republished as <a href="https://wordpress.org/plugins/addfunc-mobile-detect/" target="_blank">AddFunc Mobile Detect</a>. <a href="/wp-admin/plugin-install.php?tab=search&s=AddFunc+Mobile+Detect">Try this link for an easy install</a> (works in most WordPress 4+ installs). The "AddFunc version" is compatible with the "Average version," so installation and activation is risk-free. This also enables you to manually transfer all of your redirects to the "AddFunc version" if you're going to switch to it (although some values will automatically carry over from the "Average version"). Keeping both versions running simultaneously after transferring your redirects however, is not recommended. The "Average version" will remain available with minimal support until it becomes a burden for AddFunc (probably for many years to come, as of 2014). Any new features will only be added to the "AddFunc version," so it is of course the recommended version (at least moving forward). Thanks!</div>
  <div id="poststuff">
    <div id="post-body" class="metabox-holder columns-2">
      <div id="post-body-content">
  <form action="options.php" method="post" id="<?php echo $avrgmobdtctID; ?>_options_form" name="<?php echo $avrgmobdtctID; ?>_options_form">
<?php settings_fields($avrgmobdtctID.'_options'); ?>
        <label for="avrgmobdtct_redirect" ><strong>Mobile Redirect<span class="hideswitch"> Active</span>:</strong></label>
        <div style="display: inline;" class="offonswitch">
          <input type="checkbox" name="avrgmobdtct_redirect" class="offonswitch-checkbox" id="avrgmobdtct_redirect" value="1" <?php checked( '1', get_option('avrgmobdtct_redirect') ); ?> />
          <label class="offonswitch-label" for="avrgmobdtct_redirect">
            <div class="offonswitch-inner"></div>
            <div class="offonswitch-switch"></div>
          </label>
        </div>
      <p>
        <label for="the_mobile_site_uri" ><span class="dashicons dashicons-smartphone"></span> <strong>Mobile Website URL:</strong></label><br />
        <input id="the_mobile_site_uri" class="regular-text" type="text" name="the_mobile_site_uri" value="<?php
        if (!get_option('the_mobile_site_uri')){ echo 'http://'; }
        else { esc_attr_e( get_option('the_mobile_site_uri') ); }
        ?>" />
      </p>
      <p>
        <label for="non_mobile_site_uri" ><span class="dashicons dashicons-desktop"></span> <strong>Desktop Website URI:</strong></label><br />
        http://<input id="non_mobile_site_uri" class="all-options" type="text" name="non_mobile_site_uri" value="<?php
        if (!get_option('non_mobile_site_uri')){ echo $domain_name; }
        else { esc_attr_e( get_option('non_mobile_site_uri') ); }
        ?>" />/
      </p>
      <p><strong>Mobile Website Link Shortcode:</strong><br />
      <span class="shortcode">[mobilesitelink text="Override" class="override" page="override"]</span><br />
      <span class="shortcode">[mobilesitebutton text="Override" class="override" page="override"]</span><br />
      <span class="description">(mobilesitebutton only appears on mobile devices)</span></p>
<?php submit_button(); ?>
      <p class="description"><strong>Note:</strong> This version of Average Mobile Detect does not fully support subdomains in the Desktop Website URI field. This field is used to set the cookie for your desktop website, which tells it whether to redirect the device or not. However, you can still use a website that resides on a subdomain. To do this, omit all characters that come before the first period, but leave the period there (example: .your-website.com). Be aware that this will set the cookie for all subdomains pertaining to the root domain name (so in our example, the cookie would be set for all of these: m.your-website.com, www.your-website.com, other.your-website.com, even-unregistered-subdomains.your-website.com, etc.).</p>
  </form>
      </div> <!-- post-body-content -->
      <!-- sidebar -->
      <div id="postbox-container-1" class="postbox-container">
            <h2>Support Tickets</h2>
            <p>If you need custom support for this plugin (Average Mobile Detect) or any other Average or AddFunc plugin, you can purchase help with a support ticket below. Support tickets are responded to within 24 hours, but we answer them as soon as possible.</p>
            <p><strong>How it works</strong></p>
            <ol>
              <li>Purchase a support ticket below</li>
              <li>I contact you as soon as I can (no less than 24 hours) and help resolve your issue</li>
              <li>That's it!</li>
            </ol>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="hosted_button_id" value="2ALABGHC83M4W">
              <table>
                <tr>
                  <td><input type="hidden" name="on0" value="Name your ticket">Name your ticket</td>
                </tr>
                <tr>
                  <td><input type="text" name="os0" maxlength="200"></td>
                </tr>
                <tr>
                  <td><input type="hidden" name="on1" value="Best way to contact you">Best way to contact you</td>
                </tr>
                <tr>
                  <td><input type="text" name="os1" maxlength="200"></td>
                </tr>
              </table>
              <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-small.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
              <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
            <p><strong>Note</strong>: This is for&nbsp;<em>custom</em>&nbsp;needs for help, not problems with the plugin, or instructions that should already be explain in the description. If you feel there are important details omitted from the <a href="http://wordpress.org/plugins/average-mobile-detect/" target="_blank">Description</a>, <a href="http://wordpress.org/plugins/average-mobile-detect/installation/" target="_blank">Installation</a> steps, etc. of the plugin, please report them in the <a href="http://wordpress.org/support/plugin/average-mobile-detect" target="_blank">Support forum</a>. Thanks!</p>
      </div> <!-- #postbox-container-1 .postbox-container -->
    </div> <!-- #post-body .metabox-holder .columns-2 -->
    <br class="clear">
  </div> <!-- #poststuff -->
</div>