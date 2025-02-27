<?php $usr_map = $this->options; ?>

<form method="post" action="<?php echo esc_url(admin_url('/')); ?>admin.php?page=usr-map">
<div id="map-admin">

  <div id="map-header">
    <p class="map-shortcode"><?php esc_html_e( 'Insert this shortcode ', 'usr-map' ); ?><input type="text" value="[usr_map]" readonly> <?php esc_html_e( 'in any page or post to display the map.', 'usr-map' ); ?> &nbsp; | &nbsp; <span class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_html_e( 'Save Changes', 'usr-map' ); ?>"></span></p>
    <p class="map-sample">This is a free US map with clickable regions but it has all the features and functionalities in the premium map. You can purchase and install the <a href="https://www.wpmapplugins.com/interactive-us-map-wordpress-plugin.html"><strong>Premium US Map</strong></a> to get the US map with clickable states.</p>
  </div>

  <div id="map-page">

    <div class="map-col-lt">
      <div id="map-preview">
        <?php include 'map.php'; ?>
      </div>
    </div><!-- map-col-lt -->

    <!-- General Map Colors -->
    <div class="map-col-rt">
      <div class="map-settings">
        <div class="box-header shape-icon"><?php esc_html_e( 'General Settings', 'usr-map' ); ?></div>
        <div class="box-body">
          <div class="general-box"><span class="general-set i-border"><?php esc_html_e( 'Border Color', 'usr-map' ); ?></span>
            <input type="text" name="usrbrdrclr" value="<?php echo esc_attr($usr_map['usrbrdrclr']); ?>" class="color-field" />
          </div>
          <div class="general-box"><span class="general-set i-show-hide"><?php esc_html_e( 'Show the Names', 'usr-map' ); ?></span>
            <input type="checkbox" name="usrshowvisns" value="1" <?php if (isset($usr_map['usrshowvisns']) && $usr_map['usrshowvisns'] == '1') { echo esc_attr(" checked"); } ?>>
          </div>
          <div class="general-box"><span class="general-set i-abbs"><?php esc_html_e( 'Names Color', 'usr-map' ); ?></span>
            <input type="text" name="usrvisns" value="<?php echo esc_attr($usr_map['usrvisns']); ?>" class="color-field" />
          </div>
          <div class="general-box"><span class="general-set i-abbs"><?php esc_html_e( 'Names Hover Color', 'usr-map' ); ?></span>
            <input type="text" name="usrvisnshover" value="<?php echo esc_attr($usr_map['usrvisnshover']); ?>" class="color-field" />
          </div>
          <div class="general-box"><span class="general-set i-show-hide"><?php esc_html_e( 'Show the Lakes', 'usr-map' ); ?></span>
            <input type="checkbox" name="usrshowlakes" value="1" <?php if (isset($usr_map['usrshowlakes']) && $usr_map['usrshowlakes'] == '1') { echo esc_attr(" checked"); } ?>>
          </div>
          <div class="general-box"><span class="general-set i-lakes"><?php esc_html_e( 'Lakes Color', 'usr-map' ); ?></span>
            <input type="text" name="usrlakesfill" value="<?php echo esc_attr($usr_map['usrlakesfill']); ?>" class="color-field" />
          </div>
        </div><!-- box-body -->
      </div><!-- map-settings -->
    </div><!-- map-col-rt -->

  </div><!-- map-page -->

  <div class="map-settings areas-settings">
    <div class="box-header individ-i"><?php esc_html_e( 'Settings', 'usr-map' ); ?></div>
    <div class="box-body">

      <div class="map-area"><p class="area-name"><?php esc_html_e( 'STANDARD FEDERAL REGION [1]', 'usr-map' ); ?></p>
        <span class="chkbx"><input type="checkbox" name="enbl_1" value="1" <?php if (isset($usr_map['enbl_1']) && $usr_map['enbl_1'] == '1'){ echo esc_attr(" checked"); } ?>>&nbsp;<?php esc_html_e( 'Active', 'usr-map' ); ?></span>
        <div class="inner-content">
          <div class="area-clrs">
            <p><label><?php esc_html_e( 'Up Color', 'usr-map' ); ?></label><input type="text" name="upclr_1" value="<?php echo esc_attr($usr_map['upclr_1']); ?>" class="color-field" /></p>  
            <p><label><?php esc_html_e( 'Hover Color', 'usr-map' ); ?></label><input type="text" name="ovrclr_1" value="<?php echo esc_attr($usr_map['ovrclr_1']); ?>" class="color-field" /></p> 
            <p><label><?php esc_html_e( 'Click Color', 'usr-map' ); ?></label><input type="text" name="dwnclr_1" value="<?php echo esc_attr($usr_map['dwnclr_1']); ?>" class="color-field" /></p>
          </div>
          <div class="area-url">
            <p class="link"><label><?php esc_html_e( 'Link', 'usr-map' ); ?></label><input type="text" name="url_1" value="<?php echo esc_url($usr_map['url_1']); ?>" /></p>
            <p><label><?php esc_html_e( 'Target', 'usr-map' ); ?></label>
              <select name="turl_1">
                <option value="_self" <?php if ($usr_map['turl_1'] == '_self'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Same Page', 'usr-map' ); ?></option>
                <option value="_blank" <?php if ($usr_map['turl_1'] == '_blank'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'New Page', 'usr-map' ); ?></option>
                <option value="none" <?php if ($usr_map['turl_1'] == 'none'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Modal / None', 'usr-map' ); ?></option>
              </select>
            </p>
          </div>
          <div class="info"><p><textarea rows="3" name="info_1"><?php echo esc_textarea($usr_map['info_1']); ?></textarea></p></div>
        </div>
      </div>

      <div class="map-area"><p class="area-name"><?php esc_html_e( 'STANDARD FEDERAL REGION [2]', 'usr-map' ); ?></p>
        <span class="chkbx"><input type="checkbox" name="enbl_2" value="1" <?php if (isset($usr_map['enbl_2']) && $usr_map['enbl_2'] == '1'){ echo esc_attr(" checked"); } ?>>&nbsp;<?php esc_html_e( 'Active', 'usr-map' ); ?></span>
        <div class="inner-content">
          <div class="area-clrs">
            <p><label><?php esc_html_e( 'Up Color', 'usr-map' ); ?></label><input type="text" name="upclr_2" value="<?php echo esc_attr($usr_map['upclr_2']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Hover Color', 'usr-map' ); ?></label><input type="text" name="ovrclr_2" value="<?php echo esc_attr($usr_map['ovrclr_2']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Click Color', 'usr-map' ); ?></label><input type="text" name="dwnclr_2" value="<?php echo esc_attr($usr_map['dwnclr_2']); ?>" class="color-field" /></p>             
          </div>
          <div class="area-url">
            <p class="link"><label><?php esc_html_e( 'Link', 'usr-map' ); ?></label><input type="text" name="url_2" value="<?php echo esc_url($usr_map['url_2']); ?>" /></p>
            <p><label><?php esc_html_e( 'Target', 'usr-map' ); ?></label>
              <select name="turl_2">
                <option value="_self" <?php if ($usr_map['turl_2'] == '_self'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Same Page', 'usr-map' ); ?></option>
                <option value="_blank" <?php if ($usr_map['turl_2'] == '_blank'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'New Page', 'usr-map' ); ?></option>
                <option value="none" <?php if ($usr_map['turl_2'] == 'none'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Modal / None', 'usr-map' ); ?></option>
              </select>
            </p>
          </div>
          <div class="info"><p><textarea rows="3" name="info_2"><?php echo esc_textarea($usr_map['info_2']); ?></textarea></p></div>
        </div>
      </div>

      <div class="map-area"><p class="area-name"><?php esc_html_e( 'STANDARD FEDERAL REGION [3]', 'usr-map' ); ?></p>
        <span class="chkbx"><input type="checkbox" name="enbl_3" value="1" <?php if (isset($usr_map['enbl_3']) && $usr_map['enbl_3'] == '1'){ echo esc_attr(" checked"); } ?>>&nbsp;<?php esc_html_e( 'Active', 'usr-map' ); ?></span>
        <div class="inner-content">
          <div class="area-clrs">
            <p><label><?php esc_html_e( 'Up Color', 'usr-map' ); ?></label><input type="text" name="upclr_3" value="<?php echo esc_attr($usr_map['upclr_3']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Hover Color', 'usr-map' ); ?></label><input type="text" name="ovrclr_3" value="<?php echo esc_attr($usr_map['ovrclr_3']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Click Color', 'usr-map' ); ?></label><input type="text" name="dwnclr_3" value="<?php echo esc_attr($usr_map['dwnclr_3']); ?>" class="color-field" /></p>             
          </div>
          <div class="area-url">
            <p class="link"><label><?php esc_html_e( 'Link', 'usr-map' ); ?></label><input type="text" name="url_3" value="<?php echo esc_url($usr_map['url_3']); ?>" /></p>
            <p><label><?php esc_html_e( 'Target', 'usr-map' ); ?></label>
              <select name="turl_3">
                <option value="_self" <?php if ($usr_map['turl_3'] == '_self'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Same Page', 'usr-map' ); ?></option>
                <option value="_blank" <?php if ($usr_map['turl_3'] == '_blank'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'New Page', 'usr-map' ); ?></option>
                <option value="none" <?php if ($usr_map['turl_3'] == 'none'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Modal / None', 'usr-map' ); ?></option>
              </select>
            </p>
          </div>
          <div class="info"><p><textarea rows="3" name="info_3"><?php echo esc_textarea($usr_map['info_3']); ?></textarea></p></div>
        </div>
      </div>

      <div class="map-area"><p class="area-name"><?php esc_html_e( 'STANDARD FEDERAL REGION [4]', 'usr-map' ); ?></p>
        <span class="chkbx"><input type="checkbox" name="enbl_4" value="1" <?php if (isset($usr_map['enbl_4']) && $usr_map['enbl_4'] == '1'){ echo esc_attr(" checked"); } ?>>&nbsp;<?php esc_html_e( 'Active', 'usr-map' ); ?></span>
        <div class="inner-content">
          <div class="area-clrs">
            <p><label><?php esc_html_e( 'Up Color', 'usr-map' ); ?></label><input type="text" name="upclr_4" value="<?php echo esc_attr($usr_map['upclr_4']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Hover Color', 'usr-map' ); ?></label><input type="text" name="ovrclr_4" value="<?php echo esc_attr($usr_map['ovrclr_4']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Click Color', 'usr-map' ); ?></label><input type="text" name="dwnclr_4" value="<?php echo esc_attr($usr_map['dwnclr_4']); ?>" class="color-field" /></p>             
          </div>
          <div class="area-url">
            <p class="link"><label><?php esc_html_e( 'Link', 'usr-map' ); ?></label><input type="text" name="url_4" value="<?php echo esc_url($usr_map['url_4']); ?>" /></p>
            <p><label><?php esc_html_e( 'Target', 'usr-map' ); ?></label>
              <select name="turl_4">
                <option value="_self" <?php if ($usr_map['turl_4'] == '_self'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Same Page', 'usr-map' ); ?></option>
                <option value="_blank" <?php if ($usr_map['turl_4'] == '_blank'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'New Page', 'usr-map' ); ?></option>
                <option value="none" <?php if ($usr_map['turl_4'] == 'none'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Modal / None', 'usr-map' ); ?></option>
              </select>
            </p>
          </div>
          <div class="info"><p><textarea rows="3" name="info_4"><?php echo esc_textarea($usr_map['info_4']); ?></textarea></p></div>
        </div>
      </div>

      <div class="map-area"><p class="area-name"><?php esc_html_e( 'STANDARD FEDERAL REGION [5]', 'usr-map' ); ?></p>
        <span class="chkbx"><input type="checkbox" name="enbl_5" value="1" <?php if (isset($usr_map['enbl_5']) && $usr_map['enbl_5'] == '1'){ echo esc_attr(" checked"); } ?>>&nbsp;<?php esc_html_e( 'Active', 'usr-map' ); ?></span>
        <div class="inner-content">
          <div class="area-clrs">
            <p><label><?php esc_html_e( 'Up Color', 'usr-map' ); ?></label><input type="text" name="upclr_5" value="<?php echo esc_attr($usr_map['upclr_5']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Hover Color', 'usr-map' ); ?></label><input type="text" name="ovrclr_5" value="<?php echo esc_attr($usr_map['ovrclr_5']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Click Color', 'usr-map' ); ?></label><input type="text" name="dwnclr_5" value="<?php echo esc_attr($usr_map['dwnclr_5']); ?>" class="color-field" /></p>             
          </div>
          <div class="area-url">
            <p class="link"><label><?php esc_html_e( 'Link', 'usr-map' ); ?></label><input type="text" name="url_5" value="<?php echo esc_url($usr_map['url_5']); ?>" /></p>
            <p><label><?php esc_html_e( 'Target', 'usr-map' ); ?></label>
              <select name="turl_5">
                <option value="_self" <?php if ($usr_map['turl_5'] == '_self'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Same Page', 'usr-map' ); ?></option>
                <option value="_blank" <?php if ($usr_map['turl_5'] == '_blank'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'New Page', 'usr-map' ); ?></option>
                <option value="none" <?php if ($usr_map['turl_5'] == 'none'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Modal / None', 'usr-map' ); ?></option>
              </select>
            </p>
          </div>
          <div class="info"><p><textarea rows="3" name="info_5"><?php echo esc_textarea($usr_map['info_5']); ?></textarea></p></div>
        </div>
      </div>

      <div class="map-area"><p class="area-name"><?php esc_html_e( 'STANDARD FEDERAL REGION [6]', 'usr-map' ); ?></p>
        <span class="chkbx"><input type="checkbox" name="enbl_6" value="1" <?php if (isset($usr_map['enbl_6']) && $usr_map['enbl_6'] == '1'){ echo esc_attr(" checked"); } ?>>&nbsp;<?php esc_html_e( 'Active', 'usr-map' ); ?></span>
        <div class="inner-content">
          <div class="area-clrs">
            <p><label><?php esc_html_e( 'Up Color', 'usr-map' ); ?></label><input type="text" name="upclr_6" value="<?php echo esc_attr($usr_map['upclr_6']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Hover Color', 'usr-map' ); ?></label><input type="text" name="ovrclr_6" value="<?php echo esc_attr($usr_map['ovrclr_6']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Click Color', 'usr-map' ); ?></label><input type="text" name="dwnclr_6" value="<?php echo esc_attr($usr_map['dwnclr_6']); ?>" class="color-field" /></p>             
          </div>
          <div class="area-url">
            <p class="link"><label><?php esc_html_e( 'Link', 'usr-map' ); ?></label><input type="text" name="url_6" value="<?php echo esc_url($usr_map['url_6']); ?>" /></p>
            <p><label><?php esc_html_e( 'Target', 'usr-map' ); ?></label>
              <select name="turl_6">
                <option value="_self" <?php if ($usr_map['turl_6'] == '_self'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Same Page', 'usr-map' ); ?></option>
                <option value="_blank" <?php if ($usr_map['turl_6'] == '_blank'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'New Page', 'usr-map' ); ?></option>
                <option value="none" <?php if ($usr_map['turl_6'] == 'none'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Modal / None', 'usr-map' ); ?></option>
              </select>
            </p>
          </div>
          <div class="info"><p><textarea rows="3" name="info_6"><?php echo esc_textarea($usr_map['info_6']); ?></textarea></p></div>
        </div>
      </div>

      <div class="map-area"><p class="area-name"><?php esc_html_e( 'STANDARD FEDERAL REGION [7]', 'usr-map' ); ?></p>
        <span class="chkbx"><input type="checkbox" name="enbl_7" value="1" <?php if (isset($usr_map['enbl_7']) && $usr_map['enbl_7'] == '1'){ echo esc_attr(" checked"); } ?>>&nbsp;<?php esc_html_e( 'Active', 'usr-map' ); ?></span>
        <div class="inner-content">
          <div class="area-clrs">
            <p><label><?php esc_html_e( 'Up Color', 'usr-map' ); ?></label><input type="text" name="upclr_7" value="<?php echo esc_attr($usr_map['upclr_7']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Hover Color', 'usr-map' ); ?></label><input type="text" name="ovrclr_7" value="<?php echo esc_attr($usr_map['ovrclr_7']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Click Color', 'usr-map' ); ?></label><input type="text" name="dwnclr_7" value="<?php echo esc_attr($usr_map['dwnclr_7']); ?>" class="color-field" /></p>             
          </div>
          <div class="area-url">
            <p class="link"><label><?php esc_html_e( 'Link', 'usr-map' ); ?></label><input type="text" name="url_7" value="<?php echo esc_url($usr_map['url_7']); ?>" /></p>
            <p><label><?php esc_html_e( 'Target', 'usr-map' ); ?></label>
              <select name="turl_7">
                <option value="_self" <?php if ($usr_map['turl_7'] == '_self'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Same Page', 'usr-map' ); ?></option>
                <option value="_blank" <?php if ($usr_map['turl_7'] == '_blank'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'New Page', 'usr-map' ); ?></option>
                <option value="none" <?php if ($usr_map['turl_7'] == 'none'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Modal / None', 'usr-map' ); ?></option>
              </select>
            </p>
          </div>
          <div class="info"><p><textarea rows="3" name="info_7"><?php echo esc_textarea($usr_map['info_7']); ?></textarea></p></div>
        </div>
      </div>

      <div class="map-area"><p class="area-name"><?php esc_html_e( 'STANDARD FEDERAL REGION [8]', 'usr-map' ); ?></p>
        <span class="chkbx"><input type="checkbox" name="enbl_8" value="1" <?php if (isset($usr_map['enbl_8']) && $usr_map['enbl_8'] == '1'){ echo esc_attr(" checked"); } ?>>&nbsp;<?php esc_html_e( 'Active', 'usr-map' ); ?></span>
        <div class="inner-content">
          <div class="area-clrs">
            <p><label><?php esc_html_e( 'Up Color', 'usr-map' ); ?></label><input type="text" name="upclr_8" value="<?php echo esc_attr($usr_map['upclr_8']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Hover Color', 'usr-map' ); ?></label><input type="text" name="ovrclr_8" value="<?php echo esc_attr($usr_map['ovrclr_8']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Click Color', 'usr-map' ); ?></label><input type="text" name="dwnclr_8" value="<?php echo esc_attr($usr_map['dwnclr_8']); ?>" class="color-field" /></p>             
          </div>
          <div class="area-url">
            <p class="link"><label><?php esc_html_e( 'Link', 'usr-map' ); ?></label><input type="text" name="url_8" value="<?php echo esc_url($usr_map['url_8']); ?>" /></p>
            <p><label><?php esc_html_e( 'Target', 'usr-map' ); ?></label>
              <select name="turl_8">
                <option value="_self" <?php if ($usr_map['turl_8'] == '_self'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Same Page', 'usr-map' ); ?></option>
                <option value="_blank" <?php if ($usr_map['turl_8'] == '_blank'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'New Page', 'usr-map' ); ?></option>
                <option value="none" <?php if ($usr_map['turl_8'] == 'none'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Modal / None', 'usr-map' ); ?></option>
              </select>
            </p>
          </div>
          <div class="info"><p><textarea rows="3" name="info_8"><?php echo esc_textarea($usr_map['info_8']); ?></textarea></p></div>
        </div>
      </div>

      <div class="map-area"><p class="area-name"><?php esc_html_e( 'STANDARD FEDERAL REGION [9]', 'usr-map' ); ?></p>
        <span class="chkbx"><input type="checkbox" name="enbl_9" value="1" <?php if (isset($usr_map['enbl_9']) && $usr_map['enbl_9'] == '1'){ echo esc_attr(" checked"); } ?>>&nbsp;<?php esc_html_e( 'Active', 'usr-map' ); ?></span>
        <div class="inner-content">
          <div class="area-clrs">
            <p><label><?php esc_html_e( 'Up Color', 'usr-map' ); ?></label><input type="text" name="upclr_9" value="<?php echo esc_attr($usr_map['upclr_9']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Hover Color', 'usr-map' ); ?></label><input type="text" name="ovrclr_9" value="<?php echo esc_attr($usr_map['ovrclr_9']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Click Color', 'usr-map' ); ?></label><input type="text" name="dwnclr_9" value="<?php echo esc_attr($usr_map['dwnclr_9']); ?>" class="color-field" /></p>             
          </div>
          <div class="area-url">
            <p class="link"><label><?php esc_html_e( 'Link', 'usr-map' ); ?></label><input type="text" name="url_9" value="<?php echo esc_url($usr_map['url_9']); ?>" /></p>
            <p><label><?php esc_html_e( 'Target', 'usr-map' ); ?></label>
              <select name="turl_9">
                <option value="_self" <?php if ($usr_map['turl_9'] == '_self'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Same Page', 'usr-map' ); ?></option>
                <option value="_blank" <?php if ($usr_map['turl_9'] == '_blank'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'New Page', 'usr-map' ); ?></option>
                <option value="none" <?php if ($usr_map['turl_9'] == 'none'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Modal / None', 'usr-map' ); ?></option>
              </select>
            </p>
          </div>
          <div class="info"><p><textarea rows="3" name="info_9"><?php echo esc_textarea($usr_map['info_9']); ?></textarea></p></div>
        </div>
      </div>

      <div class="map-area"><p class="area-name"><?php esc_html_e( 'STANDARD FEDERAL REGION [10]', 'usr-map' ); ?></p>
        <span class="chkbx"><input type="checkbox" name="enbl_10" value="1" <?php if (isset($usr_map['enbl_10']) && $usr_map['enbl_10'] == '1'){ echo esc_attr(" checked"); } ?>>&nbsp;<?php esc_html_e( 'Active', 'usr-map' ); ?></span>
        <div class="inner-content">
          <div class="area-clrs">
            <p><label><?php esc_html_e( 'Up Color', 'usr-map' ); ?></label><input type="text" name="upclr_10" value="<?php echo esc_attr($usr_map['upclr_10']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Hover Color', 'usr-map' ); ?></label><input type="text" name="ovrclr_10" value="<?php echo esc_attr($usr_map['ovrclr_10']); ?>" class="color-field" /></p>              
            <p><label><?php esc_html_e( 'Click Color', 'usr-map' ); ?></label><input type="text" name="dwnclr_10" value="<?php echo esc_attr($usr_map['dwnclr_10']); ?>" class="color-field" /></p>             
          </div>
          <div class="area-url">
            <p class="link"><label><?php esc_html_e( 'Link', 'usr-map' ); ?></label><input type="text" name="url_10" value="<?php echo esc_url($usr_map['url_10']); ?>" /></p>
            <p><label><?php esc_html_e( 'Target', 'usr-map' ); ?></label>
              <select name="turl_10">
                <option value="_self" <?php if ($usr_map['turl_10'] == '_self'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Same Page', 'usr-map' ); ?></option>
                <option value="_blank" <?php if ($usr_map['turl_10'] == '_blank'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'New Page', 'usr-map' ); ?></option>
                <option value="none" <?php if ($usr_map['turl_10'] == 'none'){ echo esc_attr("selected"); } ?>><?php esc_html_e( 'Modal / None', 'usr-map' ); ?></option>
              </select>
            </p>
          </div>
          <div class="info"><p><textarea rows="3" name="info_10"><?php echo esc_textarea($usr_map['info_10']); ?></textarea></p></div>
        </div>
      </div>

    </div><!-- box-body / for areas -->
  </div><!-- map-settings / for areas -->

  <div class="map-settings margin-top-10">
    <div class="box-header bulk-i"><?php esc_html_e( 'Bulk Edit', 'usr-map' ); ?></div>
    <div class="box-body">
      <div class="map-area"><p class="area-name"><?php esc_html_e( 'COLORS', 'usr-map' ); ?></p>
        <div class="inner-content">
          <div class="area-clrs">
            <p><label><?php esc_html_e( 'Up Color', 'usr-map' ); ?></label><input type="text" name="upclr_all" value="<?php echo esc_attr($usr_map['upclr_1']); ?>" class="color-field" /></p>
            <p><label><?php esc_html_e( 'Hover Color', 'usr-map' ); ?></label><input type="text" name="ovrclr_all" value="<?php echo esc_attr($usr_map['ovrclr_1']); ?>" class="color-field" /></p> 
            <p><label><?php esc_html_e( 'Click Color', 'usr-map' ); ?></label><input type="text" name="dwnclr_all" value="<?php echo esc_attr($usr_map['dwnclr_1']); ?>" class="color-field" /></p>             
          </div><hr>
          <p><span class="submitbulk"><input type="submit" class="button button-primary" name="submit-clrs" value="Overwrite Colors"></span> <strong><?php esc_html_e( 'Note: Clicking this button will overwrite the colors of the entire map.', 'usr-map' ); ?></strong></p>
        </div>
      </div>
      <div class="map-area"><p class="area-name"><?php esc_html_e( 'LINK', 'usr-map' ); ?></p>
        <div class="inner-content">
          <div class="area-url">
            <p class="link"><label><?php esc_html_e( 'Link', 'usr-map' ); ?></label><input type="text" name="url_all" value="<?php echo esc_url($usr_map['url_1']); ?>" /></p>
            <p><label><?php esc_html_e( 'Target', 'usr-map' ); ?></label>
              <select name="turl_all">
                <option value="_self" <?php if ($usr_map['turl_1'] == '_self') { echo esc_attr("selected"); } ?>><?php esc_html_e( 'Same Page', 'usr-map' ); ?></option>
                <option value="_blank" <?php if ($usr_map['turl_1'] == '_blank') { echo esc_attr("selected"); } ?>><?php esc_html_e( 'New Page', 'usr-map' ); ?></option>
                <option value="none" <?php if ($usr_map['turl_1'] == 'none') { echo esc_attr("selected"); } ?>><?php esc_html_e( 'Modal / None', 'usr-map' ); ?></option>
              </select>
            </p>
          </div><hr>
          <p><span class="submitbulk"><input type="submit" class="button button-primary" name="submit-url" value="Overwrite Links"></span> <strong><?php esc_html_e( 'Note: Clicking this button will overwrite the links of all the regions.', 'usr-map' ); ?></strong></p>
        </div>
      </div>
      <div class="map-area"><p class="area-name"><?php esc_html_e( 'INFO.', 'usr-map' ); ?></p>
        <div class="inner-content">
          <div class="info">
            <p><textarea rows="3" name="info_all"><?php echo esc_textarea($usr_map['info_1']); ?></textarea></p>
          </div><hr>
          <p><span class="submitbulk"><input type="submit" class="button button-primary" name="submit-info" value="Overwrite Info."></span> <strong><?php esc_html_e( 'Note: Clicking this button will overwrite the info. of all the regions.', 'usr-map' ); ?></strong></p>
        </div>
      </div>
    </div><!-- box-body / for bulk -->
  </div><!-- map-settings / for bulk -->

  <input type="hidden" name="usr_map">
  <?php
  settings_fields(__FILE__);
  do_settings_sections(__FILE__);
  ?>

  <p class="restore-default-btn">
    <input type="submit" name="restore_default" class="button" value="<?php esc_html_e( 'Restore Default', 'usr-map' ); ?>">
  </p>

    <div class="scroll-top"><span class="scroll-top-icon"></span></div>
    <!--scroll-top script-->
    <script>
      jQuery(function(){jQuery(document).on( 'scroll', function(){ if (jQuery(window).scrollTop() > 100) {jQuery('.scroll-top').addClass('show');} else {jQuery('.scroll-top').removeClass('show');}});jQuery('.scroll-top').on('click', scrollToTop);});function scrollToTop() {verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;element = jQuery('body');offset = element.offset();offsetTop = offset.top -32;jQuery('html, body').animate({scrollTop: offsetTop}, 500, 'linear');}
    </script>

</div><!-- map-admin -->
</form>
