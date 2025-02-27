<?php $wd_map = $this->options; ?>

<form method="post" action="<?php echo esc_url(admin_url('/')); ?>admin.php?page=wd-map">
<div id="map-admin">

  <div id="map-header">
    <p class="map-shortcode"><?php esc_html_e( 'Insert this shortcode ', 'wd-map' ); ?><input type="text" value="[wd_map]" readonly> <?php esc_html_e( 'in any page or post to display the map.', 'wd-map' ); ?> &nbsp; | &nbsp; <span class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_html_e( 'Save Changes', 'wd-map' ); ?>"></span></p>
  </div>

  <div id="map-page">

    <div class="map-col-lt">
      <p class="map-sample">Do you need an <a href="https://www.wpmapplugins.com/interactive-world-map-by-countries-wordpress-plugin.html">Interactive World Map by Countries</a>?</p>
      <div id="map-preview">
        <?php include 'map.php'; ?>
      </div>
    </div><!-- map-col-lt -->

    <!-- General Map Colors -->
    <div class="map-col-rt">
      <div class="map-settings">
        <div class="box-header shape-icon"><?php esc_html_e( 'General Settings', 'wd-map' ); ?></div>
        <div class="box-body">
          <div class="general-box"><span class="general-set i-border"><?php esc_html_e( 'Border Color', 'wd-map' ); ?></span>
            <input type="text" name="wdbrdrclr" value="<?php echo esc_attr($wd_map['wdbrdrclr']); ?>" class="color-field" />
          </div>
          <div class="general-box"><span class="general-set i-show-hide"><?php esc_html_e( 'Show the Names', 'wd-map' ); ?></span>
            <input type="checkbox" name="wdshowvisns" value="1" <?php if (isset($wd_map['wdshowvisns']) && $wd_map['wdshowvisns'] == '1') { echo esc_attr(" checked"); } ?>>
          </div>
          <div class="general-box"><span class="general-set i-abbs"><?php esc_html_e( 'Names Color', 'wd-map' ); ?></span>
            <input type="text" name="wdvisns" value="<?php echo esc_attr($wd_map['wdvisns']); ?>" class="color-field" />
          </div>
          <div class="general-box"><span class="general-set i-abbs"><?php esc_html_e( 'Names Hover Color', 'wd-map' ); ?></span>
            <input type="text" name="wdvisnshover" value="<?php echo esc_attr($wd_map['wdvisnshover']); ?>" class="color-field" />
          </div>
        </div><!-- box-body -->
      </div><!-- map-settings -->
    </div><!-- map-col-rt -->

  </div><!-- map-page -->

  <div class="map-settings areas-settings">
    <div class="box-header individ-i"><?php esc_html_e( 'Settings', 'wd-map' ); ?></div>
    <div class="box-body">

      <div class="map-area"><p class="area-name"><?php esc_html_e( 'AFRICA', 'wd-map' ); ?></p>
        <span class="chkbx"><input type="checkbox" name="enbl_1" value="1" <?php if (isset($wd_map['enbl_1']) && $wd_map['enbl_1'] == '1'){ echo esc_attr(" checked"); } ?>>&nbsp;<?php esc_html_e( 'Active', 'wd-map' ); ?></span>
        <div class="inner-content">
          <div class="area-clrs">
            <p><label><?php esc_html_e( 'Up Color', 'wd-map' ); ?></label><input type="text" name="upclr_1" value="<?php echo esc_attr($wd_map['upclr_1']); ?>" class="color-field" /></p>  
            <p><label><?php esc_html_e( 'Hover Color', 'wd-map' ); ?></label><input type="text" name="ovrclr_1" value="<?php echo esc_attr($wd_map['ovrclr_1']); ?>" class="color-field" /></p> 
            <p><label><?php esc_html_e( 'Click Color', 'wd-map' ); ?></label><input type="text" name="dwnclr_1" value="<?php echo esc_attr($wd_map['dwnclr_1']); ?>" class="color-field" /></p>
          </div>
          <div class="area-url">
            <p class="link"><label><?php esc_html_e( 'Link', 'wd-map' ); ?></label><input type="text" name="url_1" value="<?php echo esc_url($wd_map['url_1']); ?>" /></p>
            <p><label><?php esc_html_e( 'Target', 'wd-map' ); ?></label>
              <select name="turl_1">
                <option value="_self" <?php if ($wd_map['turl_1'] == '_self'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Same Page', 'wd-map' ); ?></option>
                <option value="_blank" <?php if ($wd_map['turl_1'] == '_blank'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'New Page', 'wd-map' ); ?></option>
                <option value="none" <?php if ($wd_map['turl_1'] == 'none'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Modal / None', 'wd-map' ); ?></option>
              </select>
            </p>
          </div>
          <div class="info"><p><textarea rows="3" name="info_1"><?php echo esc_textarea($wd_map['info_1']); ?></textarea></p></div>
        </div>
      </div>

      <div class="map-area"><p class="area-name"><?php esc_html_e( 'ASIA', 'wd-map' ); ?></p>
        <span class="chkbx"><input type="checkbox" name="enbl_2" value="1" <?php if (isset($wd_map['enbl_2']) && $wd_map['enbl_2'] == '1'){ echo esc_attr(" checked"); } ?>>&nbsp;<?php esc_html_e( 'Active', 'wd-map' ); ?></span>
        <div class="inner-content">
          <div class="area-clrs">
            <p><label><?php esc_html_e( 'Up Color', 'wd-map' ); ?></label><input type="text" name="upclr_2" value="<?php echo esc_attr($wd_map['upclr_2']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Hover Color', 'wd-map' ); ?></label><input type="text" name="ovrclr_2" value="<?php echo esc_attr($wd_map['ovrclr_2']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Click Color', 'wd-map' ); ?></label><input type="text" name="dwnclr_2" value="<?php echo esc_attr($wd_map['dwnclr_2']); ?>" class="color-field" /></p>             
          </div>
          <div class="area-url">
            <p class="link"><label><?php esc_html_e( 'Link', 'wd-map' ); ?></label><input type="text" name="url_2" value="<?php echo esc_url($wd_map['url_2']); ?>" /></p>
            <p><label><?php esc_html_e( 'Target', 'wd-map' ); ?></label>
              <select name="turl_2">
                <option value="_self" <?php if ($wd_map['turl_2'] == '_self'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Same Page', 'wd-map' ); ?></option>
                <option value="_blank" <?php if ($wd_map['turl_2'] == '_blank'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'New Page', 'wd-map' ); ?></option>
                <option value="none" <?php if ($wd_map['turl_2'] == 'none'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Modal / None', 'wd-map' ); ?></option>
              </select>
            </p>
          </div>
          <div class="info"><p><textarea rows="3" name="info_2"><?php echo esc_textarea($wd_map['info_2']); ?></textarea></p></div>
        </div>
      </div>

      <div class="map-area"><p class="area-name"><?php esc_html_e( 'EUROPE', 'wd-map' ); ?></p>
        <span class="chkbx"><input type="checkbox" name="enbl_3" value="1" <?php if (isset($wd_map['enbl_3']) && $wd_map['enbl_3'] == '1'){ echo esc_attr(" checked"); } ?>>&nbsp;<?php esc_html_e( 'Active', 'wd-map' ); ?></span>
        <div class="inner-content">
          <div class="area-clrs">
            <p><label><?php esc_html_e( 'Up Color', 'wd-map' ); ?></label><input type="text" name="upclr_3" value="<?php echo esc_attr($wd_map['upclr_3']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Hover Color', 'wd-map' ); ?></label><input type="text" name="ovrclr_3" value="<?php echo esc_attr($wd_map['ovrclr_3']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Click Color', 'wd-map' ); ?></label><input type="text" name="dwnclr_3" value="<?php echo esc_attr($wd_map['dwnclr_3']); ?>" class="color-field" /></p>             
          </div>
          <div class="area-url">
            <p class="link"><label><?php esc_html_e( 'Link', 'wd-map' ); ?></label><input type="text" name="url_3" value="<?php echo esc_url($wd_map['url_3']); ?>" /></p>
            <p><label><?php esc_html_e( 'Target', 'wd-map' ); ?></label>
              <select name="turl_3">
                <option value="_self" <?php if ($wd_map['turl_3'] == '_self'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Same Page', 'wd-map' ); ?></option>
                <option value="_blank" <?php if ($wd_map['turl_3'] == '_blank'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'New Page', 'wd-map' ); ?></option>
                <option value="none" <?php if ($wd_map['turl_3'] == 'none'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Modal / None', 'wd-map' ); ?></option>
              </select>
            </p>
          </div>
          <div class="info"><p><textarea rows="3" name="info_3"><?php echo esc_textarea($wd_map['info_3']); ?></textarea></p></div>
        </div>
      </div>

      <div class="map-area"><p class="area-name"><?php esc_html_e( 'NORTH AMERICA', 'wd-map' ); ?></p>
        <span class="chkbx"><input type="checkbox" name="enbl_4" value="1" <?php if (isset($wd_map['enbl_4']) && $wd_map['enbl_4'] == '1'){ echo esc_attr(" checked"); } ?>>&nbsp;<?php esc_html_e( 'Active', 'wd-map' ); ?></span>
        <div class="inner-content">
          <div class="area-clrs">
            <p><label><?php esc_html_e( 'Up Color', 'wd-map' ); ?></label><input type="text" name="upclr_4" value="<?php echo esc_attr($wd_map['upclr_4']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Hover Color', 'wd-map' ); ?></label><input type="text" name="ovrclr_4" value="<?php echo esc_attr($wd_map['ovrclr_4']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Click Color', 'wd-map' ); ?></label><input type="text" name="dwnclr_4" value="<?php echo esc_attr($wd_map['dwnclr_4']); ?>" class="color-field" /></p>             
          </div>
          <div class="area-url">
            <p class="link"><label><?php esc_html_e( 'Link', 'wd-map' ); ?></label><input type="text" name="url_4" value="<?php echo esc_url($wd_map['url_4']); ?>" /></p>
            <p><label><?php esc_html_e( 'Target', 'wd-map' ); ?></label>
              <select name="turl_4">
                <option value="_self" <?php if ($wd_map['turl_4'] == '_self'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Same Page', 'wd-map' ); ?></option>
                <option value="_blank" <?php if ($wd_map['turl_4'] == '_blank'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'New Page', 'wd-map' ); ?></option>
                <option value="none" <?php if ($wd_map['turl_4'] == 'none'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Modal / None', 'wd-map' ); ?></option>
              </select>
            </p>
          </div>
          <div class="info"><p><textarea rows="3" name="info_4"><?php echo esc_textarea($wd_map['info_4']); ?></textarea></p></div>
        </div>
      </div>

      <div class="map-area"><p class="area-name"><?php esc_html_e( 'OCEANIA', 'wd-map' ); ?></p>
        <span class="chkbx"><input type="checkbox" name="enbl_5" value="1" <?php if (isset($wd_map['enbl_5']) && $wd_map['enbl_5'] == '1'){ echo esc_attr(" checked"); } ?>>&nbsp;<?php esc_html_e( 'Active', 'wd-map' ); ?></span>
        <div class="inner-content">
          <div class="area-clrs">
            <p><label><?php esc_html_e( 'Up Color', 'wd-map' ); ?></label><input type="text" name="upclr_5" value="<?php echo esc_attr($wd_map['upclr_5']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Hover Color', 'wd-map' ); ?></label><input type="text" name="ovrclr_5" value="<?php echo esc_attr($wd_map['ovrclr_5']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Click Color', 'wd-map' ); ?></label><input type="text" name="dwnclr_5" value="<?php echo esc_attr($wd_map['dwnclr_5']); ?>" class="color-field" /></p>             
          </div>
          <div class="area-url">
            <p class="link"><label><?php esc_html_e( 'Link', 'wd-map' ); ?></label><input type="text" name="url_5" value="<?php echo esc_url($wd_map['url_5']); ?>" /></p>
            <p><label><?php esc_html_e( 'Target', 'wd-map' ); ?></label>
              <select name="turl_5">
                <option value="_self" <?php if ($wd_map['turl_5'] == '_self'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Same Page', 'wd-map' ); ?></option>
                <option value="_blank" <?php if ($wd_map['turl_5'] == '_blank'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'New Page', 'wd-map' ); ?></option>
                <option value="none" <?php if ($wd_map['turl_5'] == 'none'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Modal / None', 'wd-map' ); ?></option>
              </select>
            </p>
          </div>
          <div class="info"><p><textarea rows="3" name="info_5"><?php echo esc_textarea($wd_map['info_5']); ?></textarea></p></div>
        </div>
      </div>

      <div class="map-area"><p class="area-name"><?php esc_html_e( 'SOUTH AMERICA', 'wd-map' ); ?></p>
        <span class="chkbx"><input type="checkbox" name="enbl_6" value="1" <?php if (isset($wd_map['enbl_6']) && $wd_map['enbl_6'] == '1'){ echo esc_attr(" checked"); } ?>>&nbsp;<?php esc_html_e( 'Active', 'wd-map' ); ?></span>
        <div class="inner-content">
          <div class="area-clrs">
            <p><label><?php esc_html_e( 'Up Color', 'wd-map' ); ?></label><input type="text" name="upclr_6" value="<?php echo esc_attr($wd_map['upclr_6']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Hover Color', 'wd-map' ); ?></label><input type="text" name="ovrclr_6" value="<?php echo esc_attr($wd_map['ovrclr_6']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Click Color', 'wd-map' ); ?></label><input type="text" name="dwnclr_6" value="<?php echo esc_attr($wd_map['dwnclr_6']); ?>" class="color-field" /></p>             
          </div>
          <div class="area-url">
            <p class="link"><label><?php esc_html_e( 'Link', 'wd-map' ); ?></label><input type="text" name="url_6" value="<?php echo esc_url($wd_map['url_6']); ?>" /></p>
            <p><label><?php esc_html_e( 'Target', 'wd-map' ); ?></label>
              <select name="turl_6">
                <option value="_self" <?php if ($wd_map['turl_6'] == '_self'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Same Page', 'wd-map' ); ?></option>
                <option value="_blank" <?php if ($wd_map['turl_6'] == '_blank'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'New Page', 'wd-map' ); ?></option>
                <option value="none" <?php if ($wd_map['turl_6'] == 'none'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Modal / None', 'wd-map' ); ?></option>
              </select>
            </p>
          </div>
          <div class="info"><p><textarea rows="3" name="info_6"><?php echo esc_textarea($wd_map['info_6']); ?></textarea></p></div>
        </div>
      </div>

    </div><!-- box-body / for areas -->
  </div><!-- map-settings / for areas -->

  <div class="map-settings margin-top-10">
    <div class="box-header bulk-i"><?php esc_html_e( 'Bulk Edit', 'wd-map' ); ?></div>
    <div class="box-body">
      <div class="map-area"><p class="area-name"><?php esc_html_e( 'COLORS', 'wd-map' ); ?></p>
        <div class="inner-content">
          <div class="area-clrs">
            <p><label><?php esc_html_e( 'Up Color', 'wd-map' ); ?></label><input type="text" name="upclr_all" value="<?php echo esc_attr($wd_map['upclr_1']); ?>" class="color-field" /></p>
            <p><label><?php esc_html_e( 'Hover Color', 'wd-map' ); ?></label><input type="text" name="ovrclr_all" value="<?php echo esc_attr($wd_map['ovrclr_1']); ?>" class="color-field" /></p> 
            <p><label><?php esc_html_e( 'Click Color', 'wd-map' ); ?></label><input type="text" name="dwnclr_all" value="<?php echo esc_attr($wd_map['dwnclr_1']); ?>" class="color-field" /></p>             
          </div><hr>
          <p><span class="submitbulk"><input type="submit" class="button button-primary" name="submit-clrs" value="Overwrite Colors"></span> <strong><?php esc_html_e( 'Note: Clicking this button will overwrite the colors of the entire map.', 'wd-map' ); ?></strong></p>
        </div>
      </div>
      <div class="map-area"><p class="area-name"><?php esc_html_e( 'LINK', 'wd-map' ); ?></p>
        <div class="inner-content">
          <div class="area-url">
            <p class="link"><label><?php esc_html_e( 'Link', 'wd-map' ); ?></label><input type="text" name="url_all" value="<?php echo esc_url($wd_map['url_1']); ?>" /></p>
            <p><label><?php esc_html_e( 'Target', 'wd-map' ); ?></label>
              <select name="turl_all">
                <option value="_self" <?php if ($wd_map['turl_1'] == '_self') { echo esc_attr("selected"); } ?>><?php esc_html_e( 'Same Page', 'wd-map' ); ?></option>
                <option value="_blank" <?php if ($wd_map['turl_1'] == '_blank') { echo esc_attr("selected"); } ?>><?php esc_html_e( 'New Page', 'wd-map' ); ?></option>
                <option value="none" <?php if ($wd_map['turl_1'] == 'none') { echo esc_attr("selected"); } ?>><?php esc_html_e( 'Modal / None', 'wd-map' ); ?></option>
              </select>
            </p>
          </div><hr>
          <p><span class="submitbulk"><input type="submit" class="button button-primary" name="submit-url" value="Overwrite Links"></span> <strong><?php esc_html_e( 'Note: Clicking this button will overwrite the links of all the areas.', 'wd-map' ); ?></strong></p>
        </div>
      </div>
      <div class="map-area"><p class="area-name"><?php esc_html_e( 'INFO.', 'wd-map' ); ?></p>
        <div class="inner-content">
          <div class="info">
            <p><textarea rows="3" name="info_all"><?php echo esc_textarea($wd_map['info_1']); ?></textarea></p>
          </div><hr>
          <p><span class="submitbulk"><input type="submit" class="button button-primary" name="submit-info" value="Overwrite Info."></span> <strong><?php esc_html_e( 'Note: Clicking this button will overwrite the info. of all the areas.', 'wd-map' ); ?></strong></p>
        </div>
      </div>
    </div><!-- box-body / for bulk -->
  </div><!-- map-settings / for bulk -->

  <input type="hidden" name="wd_map">
  <?php
  settings_fields(__FILE__);
  do_settings_sections(__FILE__);
  ?>

  <p class="restore-default-btn">
    <input type="submit" name="restore_default" class="button" value="<?php esc_html_e( 'Restore Default', 'wd-map' ); ?>">
  </p>

    <div class="scroll-top"><span class="scroll-top-icon"></span></div>
    <!--scroll-top script-->
    <script>
      jQuery(function(){jQuery(document).on( 'scroll', function(){ if (jQuery(window).scrollTop() > 100) {jQuery('.scroll-top').addClass('show');} else {jQuery('.scroll-top').removeClass('show');}});jQuery('.scroll-top').on('click', scrollToTop);});function scrollToTop() {verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;element = jQuery('body');offset = element.offset();offsetTop = offset.top -32;jQuery('html, body').animate({scrollTop: offsetTop}, 500, 'linear');}
    </script>

</div><!-- map-admin -->
</form>
