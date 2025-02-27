<div class="imh_6310_tabs_panel_settings">
  <form method="post">
    <?php wp_nonce_field("imh_6310_nonce_field_form") ?>
    <input type="hidden" name="id" value="<?php echo esc_attr($ids) ?>" />
    <input type="hidden" name="main_image" value="<?php echo isset($cssData['main_image']) ? esc_attr($cssData['main_image']) : '' ?>" />
    <input type="hidden" name="json_data" id="imh_6310_json_field" value="<?php echo isset($cssData['json_data']) ? esc_attr($cssData['json_data']) : '' ?>" />
    <div class="imh-6310-tab-content">
      <div id="tab-1">
        <div class="row imh_6310_padding_15_px">
          <h3 class="imh-6310-tab-menu-settings">Image hotspot Settings</h3>
          <div class="imh-6310-col-50">
            <table class="table table-responsive imh_6310_admin_table">
              <tr height="50">
                <td>
                  <b>Hotspot Name</b>
                </td>
                <td>
                  <input type="text" class="imh-6310-form-input" required autocomplete="off" name="name" placeholder="Enter Hotspot name" value="<?php echo isset($styledata['name']) ? imh_6310_replace(esc_attr($styledata['name'])) : 'Hotspot 1' ?>">
                </td>
              </tr>
              <tr height="50">
                <td>
                  <b>Tooltip Display Type:</b><br />
                </td>
                <td>
                  <input type="radio" name="display_type" value="0" checked> Hover &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="display_type" value="1" <?php echo isset($styledata['display_type']) && ($styledata['display_type'] == 1) ? ' checked' : '' ?> disabled> Click
                </td>
              </tr>
              <tr>
                <td>
                <b>Custom CSS <span class="imh-6310-pro">(Pro)</span>:</b></b>
                </td>
                <td>
                  <textarea class="imh-6310-form-input" name="custom_css" rows="10"><?php echo isset($cssData['custom_css']) ? esc_attr($cssData['custom_css']) : '' ?></textarea>
                </td>
              </tr>
            </table>
          </div>
          <div class="imh-6310-col-50">
            <table class="table table-responsive imh_6310_admin_table">
              <tr height="50">
                <td>
                  <b>Display Zoom Feature <span class="imh-6310-pro">(Pro)</span>:</b><br />
                </td>
                <td>
                  <input type="radio" name="zoom_feature" value="1" checked>No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="zoom_feature" value="2" <?php echo isset($cssData['zoom_feature']) && ($cssData['zoom_feature'] == 2) ? ' checked' : '' ?>>Yes
                </td>
              </tr>
              <tr height="50" class="toggle-zoom-feature">
                <td>
                  <b>Display Device Type <span class="imh-6310-pro">(Pro)</span>:</b><br />
                </td>
                <td>
                  <select name="display_device" class="imh-6310-form-input">
                    <option value="1">Only Mobile</option>
                    <option value="2" <?php echo isset($cssData['display_device']) && ($cssData['display_device'] == 2) ? ' selected' : '' ?>>Only Desktop</option>
                    <option value="3" <?php echo isset($cssData['display_device']) && ($cssData['display_device'] == 3) ? ' selected' : '' ?>>Both Desktop & Mobile</option>
                  </select>
                </td>
              </tr>
              <tr height="50" class="toggle-zoom-feature">
                <td>
                  <b>Zoom In Icon <span class="imh-6310-pro">(Pro)</span>:</b><br />
                </td>
                <td style="display: flex; align-items: center; padding-top: 10px">
                  <input type="hidden" name="zoom_in_icon" value="<?php echo isset($cssData['zoom_in_icon']) && $cssData['zoom_in_icon'] ? esc_attr($cssData['zoom_in_icon']) : imh_6310_plugin_dir_url . 'assets/images/zoom-in.png' ?>" />
                  <img src="<?php echo isset($cssData['zoom_in_icon']) && $cssData['zoom_in_icon'] ? esc_attr($cssData['zoom_in_icon']) : imh_6310_plugin_dir_url . 'assets/images/zoom-in.png'; ?>" alt="" width="30" height="30">
                  <button class="imh-6310-btn-success imh-6310-zoom-icon">Upload Icon</button>
                </td>
              </tr>
              <tr height="50" class="toggle-zoom-feature">
                <td>
                  <b>Zoom Out Icon <span class="imh-6310-pro">(Pro)</span>:</b><br />
                </td>
                <td style="display: flex; align-items: center; padding-top: 10px">
                  <input type="hidden" name="zoom_out_icon" value="<?php echo isset($cssData['zoom_out_icon']) && $cssData['zoom_out_icon'] ? esc_attr($cssData['zoom_out_icon']) : imh_6310_plugin_dir_url . 'assets/images/zoom-out.png' ?>" />
                  <img src="<?php echo isset($cssData['zoom_out_icon']) && $cssData['zoom_out_icon'] ? esc_attr($cssData['zoom_out_icon']) : imh_6310_plugin_dir_url . 'assets/images/zoom-out.png' ?>" alt="" width="30" height="30">
                  <button class="imh-6310-btn-success imh-6310-zoom-icon">Upload Icon</button>
                </td>
              </tr>
              <tr height="50" class="toggle-zoom-feature">
                <td>
                  <b>Desktop Icon Size <span class="imh-6310-pro">(Pro)</span>:</b><br />
                </td>
                <td>
                  <input type="number" class="imh-6310-form-input" name="desktop_icon_size" value="<?php echo isset($cssData['desktop_icon_size']) ? esc_attr($cssData['desktop_icon_size']) : '30' ?>" />
                </td>
              </tr>
              <tr height="50" class="toggle-zoom-feature">
                <td>
                  <b>Mobile Icon Size <span class="imh-6310-pro">(Pro)</span>:</b><br />
                </td>
                <td>
                  <input type="number" class="imh-6310-form-input" name="mobile_icon_size" value="<?php echo isset($cssData['mobile_icon_size']) ? esc_attr($cssData['mobile_icon_size']) : '25' ?>" />
                </td>
              </tr>
              <tr height="50" class="toggle-zoom-feature">
                <td>
                  <b>Icon Position <span class="imh-6310-pro">(Pro)</span>:</b><br />
                </td>
                <td>
                  <select name="icon_position" class="imh-6310-form-input">
                    <option value="flex-start">Left</option>
                    <option value="center" <?php echo isset($cssData['icon_position']) && ($cssData['icon_position'] == 'center') ? ' selected' : '' ?>>Center</option>
                    <option value="flex-end" <?php echo isset($cssData['icon_position']) && ($cssData['icon_position'] == 'flex-end') ? ' selected' : '' ?>>Right</option>
                  </select>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <hr />
      <input type="submit" name="update_style_change" value="Save" class="imh-6310-btn-primary imh-6310-pull-right imh-6310-insert-ja-data" style="margin-right: 15px; margin-bottom: 10px; display: block" />
      <br class="imh-6310-clear" />
    </div>
  </form>
</div>