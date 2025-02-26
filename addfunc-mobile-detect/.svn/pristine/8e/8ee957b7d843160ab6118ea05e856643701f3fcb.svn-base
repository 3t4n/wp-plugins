<div class="wrap">
<?php screen_icon();
      $domain_name =  preg_replace('/^www\./','',$_SERVER['SERVER_NAME']); ?>
  <h2>Mobile Detect</h2>
  <div id="poststuff" class="wp-core-ui">
    <div id="post-body" class="metabox-holder columns-2">
      <div id="post-body-content">
  <form action="options.php" method="post" id="<?php echo $aFmobdtctID; ?>_options_form" name="<?php echo $aFmobdtctID; ?>_options_form">
<?php settings_fields($aFmobdtctID.'_options'); ?>
      <ul>
        <li>
          <input class="aFswitch" type="checkbox" name="aFmobdtct_redirect" id="aFmobdtct_redirect" value="1" <?php checked( '1', get_option('aFmobdtct_redirect')); ?> />
          <label class="aFswitch" for="aFmobdtct_redirect" ><strong>Mobile Redirect</strong> <span class="aFswitch" style="display:none;"><b class="wp-ui-highlight" data-default="0">ON</b><b data-default="1">OFF</b></span></label>
        </li>
      </ul>
      <p>
        <label for="the_mobile_site_uri" ><span class="dashicons dashicons-smartphone"></span> <strong>Mobile Website URL:</strong></label><br />
        <input id="the_mobile_site_uri" class="regular-text" type="text" name="the_mobile_site_uri" value="<?php
        if (!get_option('the_mobile_site_uri')){ echo 'http://'; }
        else { esc_attr_e( get_option('the_mobile_site_uri') ); }
        ?>" />
      </p>
      <p>
        <span class="dashicons dashicons-tablet"></span> <input type="checkbox" name="aFmobdtct_tablets" id="aFmobdtct_tablets" value="1" <?php checked( '1', get_option('aFmobdtct_tablets')); ?> />
        <label for="aFmobdtct_tablets" > <strong>Treat tablets the same as mobile devices</strong><br /><span class="description">Tablets are treated the same as desktops by default.</span></label>
      </p>
      <p>
        <label for="non_mobile_site_uri" ><span class="dashicons dashicons-desktop"></span> <strong>Desktop Website URI:</strong></label><br />
        http(s)://<input id="non_mobile_site_uri" class="all-options" type="text" name="non_mobile_site_uri" value="<?php
        if (!get_option('non_mobile_site_uri')){ echo $domain_name; }
        else { esc_attr_e( get_option('non_mobile_site_uri') ); }
        ?>" />/
      </p>
      <ul>
        <li>
          <input class="aFswitch aFpre" type="checkbox" name="aFmobdtct_front" id="aFmobdtct_front" value="false" <?php checked( 'false', get_option('aFmobdtct_front')); ?> />
          <label class="aFswitch aFpre" for="aFmobdtct_front" ><span class="aFswitch" style="display:none;"><b data-default="1">DO</b><b class="wp-ui-primary" data-default="0">DON'T</b></span> <strong><span class="aFhideTxt">Don't </span><span class="aFup">r</span>edirect the Front page</strong> (static home page)</label>
        </li>
        <li>
          <input class="aFswitch aFpre" type="checkbox" name="aFmobdtct_page" id="aFmobdtct_page" value="false" <?php checked( 'false', get_option('aFmobdtct_page')); ?> />
          <label class="aFswitch aFpre" for="aFmobdtct_page" ><span class="aFswitch" style="display:none;"><b data-default="1">DO</b><b class="wp-ui-primary" data-default="0">DON'T</b></span> <strong><span class="aFhideTxt">Don't </span><span class="aFup">r</span>edirect the Pages</strong> (excludes Front page)</label>
        </li>
        <li>
          <input class="aFswitch aFpre" type="checkbox" name="aFmobdtct_home" id="aFmobdtct_home" value="false" <?php checked( 'false', get_option('aFmobdtct_home')); ?> />
          <label class="aFswitch aFpre" for="aFmobdtct_home" ><span class="aFswitch" style="display:none;"><b data-default="1">DO</b><b class="wp-ui-primary" data-default="0">DON'T</b></span> <strong><span class="aFhideTxt">Don't </span><span class="aFup">r</span>edirect the Home page</strong> (the blog posts page)</label>
        </li>
        <li>
          <input class="aFswitch aFpre" type="checkbox" name="aFmobdtct_single" id="aFmobdtct_single" value="false" <?php checked( 'false', get_option('aFmobdtct_single')); ?> />
          <label class="aFswitch aFpre" for="aFmobdtct_single" ><span class="aFswitch" style="display:none;"><b data-default="1">DO</b><b class="wp-ui-primary" data-default="0">DON'T</b></span> <strong><span class="aFhideTxt">Don't </span><span class="aFup">r</span>edirect Posts</strong></label>
        </li>
        <li>
          <input class="aFswitch aFpre" type="checkbox" name="aFmobdtct_attachment" id="aFmobdtct_attachment" value="false" <?php checked( 'false', get_option('aFmobdtct_attachment')); ?> />
          <label class="aFswitch aFpre" for="aFmobdtct_attachment" ><span class="aFswitch" style="display:none;"><b data-default="1">DO</b><b class="wp-ui-primary" data-default="0">DON'T</b></span> <strong><span class="aFhideTxt">Don't </span><span class="aFup">r</span>edirect Attachments</strong></label>
        </li>
        <li>
          <input class="aFswitch aFpre" type="checkbox" name="aFmobdtct_author" id="aFmobdtct_author" value="false" <?php checked( 'false', get_option('aFmobdtct_author')); ?> />
          <label class="aFswitch aFpre" for="aFmobdtct_author" ><span class="aFswitch" style="display:none;"><b data-default="1">DO</b><b class="wp-ui-primary" data-default="0">DON'T</b></span> <strong><span class="aFhideTxt">Don't </span><span class="aFup">r</span>edirect Authors</strong></label>
        </li>
        <li>
          <input class="aFswitch aFpre" type="checkbox" name="aFmobdtct_category" id="aFmobdtct_category" value="false" <?php checked( 'false', get_option('aFmobdtct_category')); ?> />
          <label class="aFswitch aFpre" for="aFmobdtct_category" ><span class="aFswitch" style="display:none;"><b data-default="1">DO</b><b class="wp-ui-primary" data-default="0">DON'T</b></span> <strong><span class="aFhideTxt">Don't </span><span class="aFup">r</span>edirect Categories</strong></label>
        </li>
        <li>
          <input class="aFswitch aFpre" type="checkbox" name="aFmobdtct_date" id="aFmobdtct_date" value="false" <?php checked( 'false', get_option('aFmobdtct_date')); ?> />
          <label class="aFswitch aFpre" for="aFmobdtct_date" ><span class="aFswitch" style="display:none;"><b data-default="1">DO</b><b class="wp-ui-primary" data-default="0">DON'T</b></span> <strong><span class="aFhideTxt">Don't </span><span class="aFup">r</span>edirect Dates</strong></label>
        </li>
        <li>
          <input class="aFswitch aFpre" type="checkbox" name="aFmobdtct_tag" id="aFmobdtct_tag" value="false" <?php checked( 'false', get_option('aFmobdtct_tag')); ?> />
          <label class="aFswitch aFpre" for="aFmobdtct_tag" ><span class="aFswitch" style="display:none;"><b data-default="1">DO</b><b class="wp-ui-primary" data-default="0">DON'T</b></span> <strong><span class="aFhideTxt">Don't </span><span class="aFup">r</span>edirect Tags</strong></label>
        </li>
        <li>
          <input class="aFswitch aFpre" type="checkbox" name="aFmobdtct_search" id="aFmobdtct_search" value="false" <?php checked( 'false', get_option('aFmobdtct_search')); ?> />
          <label class="aFswitch aFpre" for="aFmobdtct_search" ><span class="aFswitch" style="display:none;"><b data-default="1">DO</b><b class="wp-ui-primary" data-default="0">DON'T</b></span> <strong><span class="aFhideTxt">Don't </span><span class="aFup">r</span>edirect search results</strong></label>
        </li>
      </ul>
      <p><strong>Mobile Website Link Shortcode:</strong><br />
      <span class="shortcode">[mobilesitelink text="Override" class="override" page="override"]</span><br />
      <span class="shortcode">[mobilesitebutton text="Override" class="override" page="override"]</span><br />
      <span class="description">(mobilesitebutton only appears on mobile devices)</span></p>
<?php submit_button(); ?>
      <p class="description"><strong>Note:</strong> This version of AddFunc Mobile Detect does not fully support subdomains in the Desktop Website URI field. This field is used to set the cookie for your desktop website, which tells it whether to redirect the device or not. However, you can still use a website that resides on a subdomain. To do this, omit all characters that come before the first period, but leave the period there (example: .your-website.com). Just be aware that this will set the cookie for all subdomains pertaining to the root domain name (so in our example, the cookie would be set for all of these: m.your-website.com, www.your-website.com, other.your-website.com, even-unregistered-subdomains.your-website.com, etc.).</p>
  </form>
      </div> <!-- post-body-content -->
      <!-- sidebar -->
      <div id="postbox-container-1" class="postbox-container">
        <h2></h2>
        <p></p>
      </div> <!-- #postbox-container-1 .postbox-container -->
    </div> <!-- #post-body .metabox-holder .columns-2 -->
    <br class="clear">
  </div> <!-- #poststuff -->
</div>