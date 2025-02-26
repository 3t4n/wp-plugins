<?php
wp_enqueue_media();
?>
<div class="anc_6310_tabs_panel_settings">
  <form method="post">
    <?php wp_nonce_field("anc_6310_nonce_field_form") ?>
    <input type="hidden" name="id" value="<?php echo esc_attr($styleId) ?>" />
    <div class="anc_6310_padding_15_px">
      <ul class="anc-6310-nav-tab">
        <li class="anc-6310-mytab active" id="tab1">General</li>
        <li class="anc-6310-mytab" id="tab2">Title</li>
        <li class="anc-6310-mytab" id="tab3">Icon</li>
        <li class="anc-6310-mytab" id="tab4">Description</li>
        <li class="anc-6310-mytab" id="tab5">Number</li>
        <li class="anc-6310-mytab" id="tab6">Button</li>
        <li class="anc-6310-mytab" id="tab7">Custom CSS</li>
      </ul>
    </div>
    <div class="anc-6310-tab-content">
      <div id="tab-1">
        <div class="row anc_6310_padding_15_px">
          <h3 class="anc-6310-tab-menu-settings">General Settings</h3>
          <div class="anc-6310-tab-6">
            <table width="100%">
              <?php anc_6310_items_per_row($cssData); ?>
              <tr height="45">
                <td>
                  <b>Animation Duration</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                  <div class="anc-6310-tooltip">(No preview available)</div>
                </td>
                <td>
                  <?php
                  anc_6310_animation_duration(isset($cssData['animation_duration']) && esc_attr($cssData['animation_duration']) !== '' ? esc_attr($cssData['animation_duration']) : 500);
                  ?>
                </td>
              </tr>
              <tr height="45">
                <td>
                  <b>Thousands separator</b>
                </td>
                <td>
                  <input type="text" name="thousands_separator" value="<?php echo isset($cssData['thousands_separator']) ? esc_html(anc_6310_special_character_remove($cssData['thousands_separator'])) : ',' ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Box Background Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="box_background_color" id="anc_6310_box_background_color" class="anc-6310-form-input anc_6310_color_picker" step="1" data-opacity=".8" data-format="rgb" value="<?php echo esc_attr($cssData['box_background_color']) ?>">
                </td>
              </tr>
              <tr height="45">
                <td width="55%"><b>Box Background Hover Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="box_background_hover_color" id="anc_6310_box_background_hover_color" class="anc-6310-form-input anc_6310_color_picker" data-opacity=".8" data-format="rgb" value="<?php echo esc_attr($cssData['box_background_hover_color']) ?>">
                </td>
              </tr>
              <tr height="45">
                <td><b>Box Radius</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" min="0" name="box_radius" value="<?php echo esc_attr($cssData['box_radius']) ?>" class="anc-6310-form-input" id="anc_6310_box_radius" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Box Border Width</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" min="0" name="box_border_width" value="<?php echo esc_attr($cssData['box_border_width']) ?>" class="anc-6310-form-input" id="anc_6310_box_border_width" />
                </td>

              </tr>

            </table>
          </div>
          <div class="anc-6310-tab-6">
            <table class="table table-responsive anc_6310_admin_table">
              <tr height="45">
                <td><b>Box Border Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="box_border_color" id="anc_6310_box_border_color" class="anc-6310-form-input anc_6310_color_picker" data-format="rgb" data-opacity=".8" value="<?php echo esc_attr($cssData['box_border_color']) ?>">
                </td>
              </tr>
              <tr height="45">
                <td width="55%"><b>Box Border Hover Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="box_border_hover_color" id="anc_6310_box_border_hover_color" class="anc-6310-form-input anc_6310_color_picker" data-opacity=".8" data-format="rgb" value="<?php echo esc_attr($cssData['box_border_hover_color']) ?>">
                </td>
              </tr>
              <tr height="45">
                <td><b>Image Overlay Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="image_overlay_color" id="anc_6310_image_overlay_color" class="anc-6310-form-input anc_6310_color_picker" data-format="rgb" data-opacity=".75" value="<?php echo esc_attr($cssData['image_overlay_color']) ?>">
                </td>
              </tr>
              <tr height="45">
                <td width="55%"><b>Image Overlay Hover Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="image_overlay_hover_color" id="anc_6310_image_overlay_hover_color" class="anc-6310-form-input anc_6310_color_picker" data-opacity=".75" data-format="rgb" value="<?php echo esc_attr($cssData['image_overlay_hover_color']) ?>">
                </td>
              </tr>
              <tr height="45">
                <td><b>Box Shadow Width</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" min="0" name="box_shadow_width" value="<?php echo esc_attr($cssData['box_shadow_width']) ?>" class="anc-6310-form-input" id="anc_6310_box_shadow_width" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Box Shadow Blur</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" min="0" name="box_shadow_blur" value="<?php echo esc_attr($cssData['box_shadow_blur']) ?>" class="anc-6310-form-input" id="anc_6310_box_shadow_blur" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Box Shadow Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="box_shadow_color" id="anc_6310_box_shadow_color" class="anc-6310-form-input anc_6310_color_picker" data-opacity=".2" data-format="rgb" value="<?php echo esc_attr($cssData['box_shadow_color']) ?>">
                </td>
              </tr>
              <tr height="45">
                <td><b>Box Shadow Hover Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="box_shadow_hover_color" id="anc_6310_box_shadow_hover_color" class="anc-6310-form-input anc_6310_color_picker" data-opacity=".4" data-format="rgb" value="<?php echo esc_attr($cssData['box_shadow_hover_color']) ?>">
                </td>
              </tr>
              <?php
              anc_6310_background_setting($bgType, $cssData);
              ?>
            </table>
          </div>
        </div>
      </div>
      <div id="tab-2">
        <div class="row">
          <h3 class="anc-6310-tab-menu-settings">Title Settings</h3>
          <div class="anc-6310-tab-6">
            <table class="table table-responsive anc_6310_admin_table">
              <tr height="45">
                <td width='55%'><b>Font Size</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" min="0" name="title_font_size" value="<?php echo esc_attr($cssData['title_font_size']) ?>" class="anc-6310-form-input" step="1" id="anc_6310_title_font_size" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Line Height</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="title_line_height" id="anc_6310_heading_line_height" type="number" value="<?php echo esc_attr($cssData['title_line_height']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Font Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="title_font_color" id="anc_6310_title_font_color" class="anc-6310-form-input anc_6310_color_picker" data-format="rgb" value="<?php echo esc_attr($cssData['title_font_color']) ?>">
                </td>
              </tr>
              <tr height="45">
                <td><b>Font Hover Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="title_font_hover_color" id="anc_6310_title_font_hover_color" class="anc-6310-form-input anc_6310_color_picker" data-format="rgb" value="<?php echo esc_attr($cssData['title_font_hover_color']) ?>">
                </td>
              </tr>
              <tr height="45">
                <td width='55%'><b>Font Weight</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <select name="title_font_weight" class="anc-6310-form-input" id="anc_6310_title_font_weight">
                    <option value="100" <?php if ($cssData['title_font_weight'] == '100') echo " selected=''" ?>>100</option>
                    <option value="200" <?php if ($cssData['title_font_weight'] == '200') echo " selected=''" ?>>200</option>
                    <option value="300" <?php if ($cssData['title_font_weight'] == '300') echo " selected=''" ?>>300</option>
                    <option value="400" <?php if ($cssData['title_font_weight'] == '400') echo " selected=''" ?>>400</option>
                    <option value="500" <?php if ($cssData['title_font_weight'] == '500') echo " selected=''" ?>>500</option>
                    <option value="600" <?php if ($cssData['title_font_weight'] == '600') echo " selected=''" ?>>600</option>
                    <option value="700" <?php if ($cssData['title_font_weight'] == '700') echo " selected=''" ?>>700</option>
                    <option value="800" <?php if ($cssData['title_font_weight'] == '800') echo " selected=''" ?>>800</option>
                    <option value="900" <?php if ($cssData['title_font_weight'] == '900') echo " selected=''" ?>>900</option>
                    <option value="normal" <?php if ($cssData['title_font_weight'] == 'normal') echo " selected=''" ?>>Normal</option>
                    <option value="bold" <?php if ($cssData['title_font_weight'] == 'bold') echo " selected=''" ?>>Bold</option>
                    <option value="lighter" <?php if ($cssData['title_font_weight'] == 'lighter') echo " selected=''" ?>>Lighter</option>
                    <option value="initial" <?php if ($cssData['title_font_weight'] == 'initial') echo " selected=''" ?>>Initial</option>
                  </select>
                </td>
              </tr>
              <tr height="45">
                <td width='55%'><b>Text Transform</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <select name="title_text_transform" class="anc-6310-form-input" id="anc_6310_title_text_transform">
                    <option value="capitalize" <?php if ($cssData['title_text_transform'] == 'capitalize') echo " selected=''" ?>>Capitalize</option>
                    <option value="uppercase" <?php if ($cssData['title_text_transform'] == 'uppercase') echo " selected=''" ?>>Uppercase</option>
                    <option value="lowercase" <?php if ($cssData['title_text_transform'] == 'lowercase') echo " selected=''" ?>>Lowercase</option>
                    <option value="none" <?php if ($cssData['title_text_transform'] == 'none') echo " selected=''" ?>>As Input</option>
                  </select>
                </td>
              </tr>
            </table>
          </div>
          <div class="anc-6310-tab-6">
            <table class="table table-responsive anc_6310_admin_table">
              <tr height="45">
                <td width='55%'><b>Text Align</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <select name="title_text_align" class="anc-6310-form-input" id="anc_6310_title_text_align">
                    <option value="center" <?php if ($cssData['title_text_align'] == 'center') echo " selected=''" ?>>Center</option>
                    <option value="left" <?php if ($cssData['title_text_align'] == 'left') echo " selected=''" ?>>Left</option>
                    <option value="right" <?php if ($cssData['title_text_align'] == 'right') echo " selected=''" ?>>Right</option>
                  </select>
                </td>
              </tr>
              <tr height="45">
                <td><b>Font Family</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="title_font_family" id="anc_6310_jquery_heading_font" type="text" value="<?php echo esc_attr($cssData['title_font_family']) ?>" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Margin Left</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="title_margin_left" id="anc_6310_title_margin_left" type="number" value="<?php echo esc_attr($cssData['title_margin_left']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Margin Right</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="title_margin_right" id="anc_6310_title_margin_right" type="number" value="<?php echo esc_attr($cssData['title_margin_right']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Margin Top</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="title_margin_top" id="anc_6310_title_margin_top" type="number" value="<?php echo esc_attr($cssData['title_margin_top']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Margin Bottom</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="title_margin_bottom" id="anc_6310_title_margin_bottom" type="number" value="<?php echo esc_attr($cssData['title_margin_bottom']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div id="tab-3">
        <div class="row">
          <h3 class="anc-6310-tab-menu-settings">Icon Settings</h3>
          <div class="anc-6310-tab-6">
            <table class="table table-responsive anc_6310_admin_table">
              <tr height="45">
                <td width='55%'><b>Icon Size</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" name="icon_size" value="<?php echo esc_attr($cssData['icon_size']) ?>" class="anc-6310-form-input" id="anc_6310_icon_size">
                </td>
              </tr>
              <tr height="45">
                <td><b>Icon Line Height</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" name="icon_line_height" value="<?php echo esc_attr($cssData['icon_line_height']) ?>" class="anc-6310-form-input" id="anc_6310_icon_line_height" />
                </td>
              </tr>
              <tr height="45">
                <td width='55%'><b>Icon Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="icon_color" id="anc_6310_icon_color" class="anc-6310-form-input anc_6310_color_picker" step="1" data-format="rgb" data-opacity=".8" value="<?php echo esc_attr($cssData['icon_color']) ?>">
                </td>
              </tr>
              <tr height="45">
                <td width='55%'><b>Icon Hover Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="icon_hover_color" id="anc_6310_icon_hover_color" class="anc-6310-form-input anc_6310_color_picker" data-opacity=".8" data-format="rgb" value="<?php echo esc_attr($cssData['icon_hover_color']) ?>">
                </td>
              </tr>
            </table>
          </div>
          <div class="anc-6310-tab-6">
            <table class="table table-responsive anc_6310_admin_table">
              <tr height="45">
                <td width='55%'><b>Margin Left</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="icon_margin_left" id="anc_6310_icon_margin_left" type="number" value="<?php echo esc_attr($cssData['icon_margin_left']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Margin Right</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="icon_margin_right" id="anc_6310_icon_margin_right" type="number" value="<?php echo esc_attr($cssData['icon_margin_right']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Margin Top</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="icon_margin_top" id="anc_6310_icon_margin_top" type="number" value="<?php echo esc_attr($cssData['icon_margin_top']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Margin Bottom</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="icon_margin_bottom" id="anc_6310_icon_margin_bottom" type="number" value="<?php echo esc_attr($cssData['icon_margin_bottom']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div id="tab-4">
        <div class="row">
          <h3 class="anc-6310-tab-menu-settings">Description Settings</h3>
          <div class="anc-6310-tab-6">
            <table class="table table-responsive anc_6310_admin_table" width="100%">
              <tr height="45">
                <td width="55%">
                  <b>Activate Description</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <label class="switch">
                    <input type="checkbox" <?php echo (isset($cssData['counter_description']) && esc_attr($cssData['counter_description'])) ? ' checked' : '' ?> name="counter_description" value="1" id="anc_6310_counter_description" class="anc-6310-form-input" />
                    <span class="slider round description_icon_show_hide"></span>
                  </label>
                </td>
              </tr>
              <tr height="45" class="description-act-field">
                <td width='55%'><b>Font Size</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" min="0" name="description_font_size" value="<?php echo esc_attr($cssData['description_font_size']) ?>" class="anc-6310-form-input" step="1" id="anc_6310_description_font_size" />
                </td>
              </tr>
              <tr height="45" class="description-act-field">
                <td><b>Line Height</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="description_line_height" id="anc_6310_description_line_height" type="number" value="<?php echo esc_attr($cssData['description_line_height']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45" class="description-act-field">
                <td><b>Font Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="description_font_color" id="anc_6310_description_font_color" class="anc-6310-form-input anc_6310_color_picker" data-format="rgb" value="<?php echo esc_attr($cssData['description_font_color']) ?>">
                </td>
              </tr>
              <tr height="45" class="description-act-field">
                <td><b>Font Hover Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="description_font_hover_color" id="anc_6310_description_font_hover_color" class="anc-6310-form-input anc_6310_color_picker" data-format="rgb" value="<?php echo esc_attr($cssData['description_font_hover_color']) ?>">
                </td>
              </tr>
              <tr height="45" class="description-act-field">
                <td width='55%'><b>Font Weight</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <select name="description_font_weight" class="anc-6310-form-input" id="anc_6310_description_font_weight">
                    <option value="100" <?php if ($cssData['description_font_weight'] == '100') echo " selected=''" ?>>100</option>
                    <option value="200" <?php if ($cssData['description_font_weight'] == '200') echo " selected=''" ?>>200</option>
                    <option value="300" <?php if ($cssData['description_font_weight'] == '300') echo " selected=''" ?>>300</option>
                    <option value="400" <?php if ($cssData['description_font_weight'] == '400') echo " selected=''" ?>>400</option>
                    <option value="500" <?php if ($cssData['description_font_weight'] == '500') echo " selected=''" ?>>500</option>
                    <option value="600" <?php if ($cssData['description_font_weight'] == '600') echo " selected=''" ?>>600</option>
                    <option value="700" <?php if ($cssData['description_font_weight'] == '700') echo " selected=''" ?>>700</option>
                    <option value="800" <?php if ($cssData['description_font_weight'] == '800') echo " selected=''" ?>>800</option>
                    <option value="900" <?php if ($cssData['description_font_weight'] == '900') echo " selected=''" ?>>900</option>
                    <option value="normal" <?php if ($cssData['description_font_weight'] == 'normal') echo " selected=''" ?>>Normal</option>
                    <option value="bold" <?php if ($cssData['description_font_weight'] == 'bold') echo " selected=''" ?>>Bold</option>
                    <option value="lighter" <?php if ($cssData['description_font_weight'] == 'lighter') echo " selected=''" ?>>Lighter</option>
                    <option value="initial" <?php if ($cssData['description_font_weight'] == 'initial') echo " selected=''" ?>>Initial</option>
                  </select>
                </td>
              </tr>
              <tr height="45" class="description-act-field">
                <td width='55%'><b>Text Transform</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <select name="description_text_transform" class="anc-6310-form-input" id="anc_6310_description_text_transform">
                    <option value="capitalize" <?php if ($cssData['description_text_transform'] == 'capitalize') echo " selected=''" ?>>Capitalize</option>
                    <option value="uppercase" <?php if ($cssData['description_text_transform'] == 'uppercase') echo " selected=''" ?>>Uppercase</option>
                    <option value="lowercase" <?php if ($cssData['description_text_transform'] == 'lowercase') echo " selected=''" ?>>Lowercase</option>
                    <option value="none" <?php if ($cssData['description_text_transform'] == 'none') echo " selected=''" ?>>As Input</option>
                  </select>
                </td>
              </tr>
            </table>
          </div>
          <div class="anc-6310-tab-6">
            <table class="table table-responsive anc_6310_admin_table">
              <tr height="45" class="description-act-field">
                <td width='55%'><b>Text Align</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <select name="description_text_align" class="anc-6310-form-input" id="anc_6310_description_text_align">
                    <option value="center" <?php if ($cssData['description_text_align'] == 'center') echo " selected=''" ?>>Center</option>
                    <option value="left" <?php if ($cssData['description_text_align'] == 'left') echo " selected=''" ?>>Left</option>
                    <option value="right" <?php if ($cssData['description_text_align'] == 'right') echo " selected=''" ?>>Right</option>
                  </select>
                </td>
              </tr>
              <tr height="45" class="description-act-field">
                <td><b>Font Family</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="description_font_family" id="anc_6310_jquery_description_font" type="text" value="<?php echo esc_attr($cssData['description_font_family']) ?>" />
                </td>
              </tr>
              <tr height="45" class="description-act-field">
                <td><b>Margin Left</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="description_margin_left" id="anc_6310_description_margin_left" type="number" value="<?php echo esc_attr($cssData['description_margin_left']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45" class="description-act-field">
                <td><b>Margin Right</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="description_margin_right" id="anc_6310_description_margin_right" type="number" value="<?php echo esc_attr($cssData['description_margin_right']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45" class="description-act-field">
                <td><b>Margin Top</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="description_margin_top" id="anc_6310_description_margin_top" type="number" value="<?php echo esc_attr($cssData['description_margin_top']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45" class="description-act-field">
                <td><b>Margin Bottom</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="description_margin_bottom" id="anc_6310_description_margin_bottom" type="number" value="<?php echo esc_attr($cssData['description_margin_bottom']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div id="tab-5">
        <div class="row">
          <h3 class="anc-6310-tab-menu-settings">Number Settings</h3>
          <div class="anc-6310-tab-6">
            <table class="table table-responsive anc_6310_admin_table">
              <tr height="45">
                <td width='55%'><b>Font Size</b></td>
                <td>
                  <input type="number" min="0" name="number_font_size" value="<?php echo esc_attr($cssData['number_font_size']) ?>" class="anc-6310-form-input" id="anc_6310_number_font_size" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Line Height</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="number_line_height" id="anc_6310_number_line_height" type="number" value="<?php echo esc_attr($cssData['number_line_height']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Font Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="number_font_color" id="anc_6310_number_font_color" class="anc-6310-form-input anc_6310_color_picker" data-format="rgb" value="<?php echo esc_attr($cssData['number_font_color']) ?>">
                </td>
              </tr>
              <tr height="45">
                <td><b>Font Hover Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="number_font_hover_color" id="anc_6310_number_font_hover_color" class="anc-6310-form-input anc_6310_color_picker" data-format="rgb" value="<?php echo esc_attr($cssData['number_font_hover_color']) ?>">
                </td>
              </tr>
              <tr height="45">
                <td width='55%'><b>Font Weight</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <select name="number_font_weight" class="anc-6310-form-input" id="anc_6310_number_font_weight">
                    <option value="100" <?php if ($cssData['number_font_weight'] == '100') echo " selected=''" ?>>100</option>
                    <option value="200" <?php if ($cssData['number_font_weight'] == '200') echo " selected=''" ?>>200</option>
                    <option value="300" <?php if ($cssData['number_font_weight'] == '300') echo " selected=''" ?>>300</option>
                    <option value="400" <?php if ($cssData['number_font_weight'] == '400') echo " selected=''" ?>>400</option>
                    <option value="500" <?php if ($cssData['number_font_weight'] == '500') echo " selected=''" ?>>500</option>
                    <option value="600" <?php if ($cssData['number_font_weight'] == '600') echo " selected=''" ?>>600</option>
                    <option value="700" <?php if ($cssData['number_font_weight'] == '700') echo " selected=''" ?>>700</option>
                    <option value="800" <?php if ($cssData['number_font_weight'] == '800') echo " selected=''" ?>>800</option>
                    <option value="900" <?php if ($cssData['number_font_weight'] == '900') echo " selected=''" ?>>900</option>
                    <option value="normal" <?php if ($cssData['number_font_weight'] == 'normal') echo " selected=''" ?>>Normal</option>
                    <option value="bold" <?php if ($cssData['number_font_weight'] == 'bold') echo " selected=''" ?>>Bold</option>
                    <option value="lighter" <?php if ($cssData['number_font_weight'] == 'lighter') echo " selected=''" ?>>Lighter</option>
                    <option value="initial" <?php if ($cssData['number_font_weight'] == 'initial') echo " selected=''" ?>>Initial</option>
                  </select>
                </td>
              </tr>
              <tr height="45">
                <td><b>Font Family</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="number_font_family" id="anc_6310_jquery_number_font" type="text" value="<?php echo esc_attr($cssData['number_font_family']) ?>" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Margin Left</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="number_margin_left" id="anc_6310_number_margin_left" type="number" value="<?php echo esc_attr($cssData['number_margin_left']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Margin Right</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="number_margin_right" id="anc_6310_number_margin_right" type="number" value="<?php echo esc_attr($cssData['number_margin_right']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Margin Top</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="number_margin_top" id="anc_6310_number_margin_top" type="number" value="<?php echo esc_attr($cssData['number_margin_top']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45">
                <td><b>Margin Bottom</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="number_margin_bottom" id="anc_6310_number_margin_bottom" type="number" value="<?php echo esc_attr($cssData['number_margin_bottom']) ?>" class="anc-6310-form-input" />
                </td>
              </tr>
            </table>
          </div>
          <div class="anc-6310-tab-6">
            <table class="table table-responsive anc_6310_admin_table" width="100%">
              <tr height="45">
                <td width="55%"><b>Activate Number Prefix</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <label class="switch">
                    <input type="checkbox" <?php echo (isset($cssData['prefix_icon_show_hide']) && esc_attr($cssData['prefix_icon_show_hide'])) ? ' checked' : '' ?> name="prefix_icon_show_hide" value="1" id="anc_6310_prefix_icon_show_hide" class="anc-6310-form-input" />
                    <span class="slider round prefix_icon_show_hide"></span>
                  </label>
                </td>
              </tr>
              <tr height="45" class="prefix-act-field">
                <td width='55%'><b>Font Size</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" min="0" name="number_prefix_font_size" value="<?php echo isset($cssData['number_prefix_font_size']) && esc_attr($cssData['number_prefix_font_size']) !== '' ? esc_attr($cssData['number_prefix_font_size']) : 20; ?>" class="anc-6310-form-input" id="anc_6310_number_prefix_font_size" />
                </td>
              </tr>
              <tr height="45" class="prefix-act-field">
                <td><b>Font Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="number_prefix_font_color" id="anc_6310_number_prefix_font_color" class="anc-6310-form-input anc_6310_color_picker" data-format="rgb" value="<?php echo isset($cssData['number_prefix_font_color']) && esc_attr($cssData['number_prefix_font_color']) !== '' ? esc_attr($cssData['number_prefix_font_color']) : 'rgb(255, 255, 255)'; ?>">
                </td>
              </tr>
              <tr height="45" class="prefix-act-field">
                <td><b>Font Hover Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="number_prefix_font_hover_color" id="anc_6310_number_prefix_font_hover_color" class="anc-6310-form-input anc_6310_color_picker" data-format="rgb" value="<?php echo isset($cssData['number_prefix_font_hover_color']) && esc_attr($cssData['number_prefix_font_hover_color']) !== '' ? esc_attr($cssData['number_prefix_font_hover_color']) : 'rgb(255, 255, 255)'; ?>">
                </td>
              </tr>
              <tr height="45" class="prefix-act-field">
                <td width='55%'><b>Font Weight</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <select name="number_prefix_font_weight" class="anc-6310-form-input" id="anc_6310_number_prefix_font_weight">
                    <option value="100" <?php if (isset($cssData['number_prefix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == '100') echo " selected=''" ?>>100</option>
                    <option value="200" <?php if (isset($cssData['number_prefix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == '200') echo " selected=''" ?>>200</option>
                    <option value="300" <?php if (isset($cssData['number_prefix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == '300') echo " selected=''" ?>>300</option>
                    <option value="400" <?php if (isset($cssData['number_prefix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == '400') echo " selected=''" ?>>400</option>
                    <option value="500" <?php if (isset($cssData['number_prefix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == '500') echo " selected=''" ?>>500</option>
                    <option value="600" <?php if (isset($cssData['number_prefix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == '600') echo " selected=''" ?>>600</option>
                    <option value="700" <?php if (isset($cssData['number_prefix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == '700') echo " selected=''" ?>>700</option>
                    <option value="800" <?php if (isset($cssData['number_prefix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == '800') echo " selected=''" ?>>800</option>
                    <option value="900" <?php if (isset($cssData['number_prefix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == '900') echo " selected=''" ?>>900</option>
                    <option value="normal" <?php if (isset($cssData['number_prefix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == 'normal') echo " selected=''" ?>>Normal</option>
                    <option value="bold" <?php if (isset($cssData['number_prefix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == 'bold') echo " selected=''" ?>>Bold</option>
                    <option value="lighter" <?php if (isset($cssData['number_prefix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == 'lighter') echo " selected=''" ?>>Lighter</option>
                    <option value="initial" <?php if (isset($cssData['number_prefix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == 'initial') echo " selected=''" ?>>Initial</option>
                  </select>
                </td>
              </tr>
              <tr height="45" class="prefix-act-field">
                <td><b>Font Family</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="number_prefix_font_family" id="anc_6310_jquery_number_prefix_font" type="text" value="<?php echo isset($cssData['number_prefix_font_family']) && esc_attr($cssData['number_prefix_font_family']) !== '' ? esc_attr($cssData['number_prefix_font_family']) : 'Amaranth'; ?>" />
                </td>
              </tr>
              <tr height="45" class="prefix-act-field">
                <td><b>Top/Bottom Position</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" name="number_prefix_position" id="anc_6310_number_prefix_position" class="anc-6310-form-input" value="<?php echo isset($cssData['number_prefix_position']) && esc_attr($cssData['number_prefix_position']) !== '' ? esc_attr($cssData['number_prefix_position']) : 2; ?>">
                </td>
              </tr>
              <tr height="45" class="prefix-act-field">
                <td><b>Margin Left</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="number_prefix_margin_left" id="anc_6310_number_prefix_margin_left" type="number" value="<?php echo isset($cssData['number_prefix_margin_left']) && esc_attr($cssData['number_prefix_margin_left']) !== '' ? esc_attr($cssData['number_prefix_margin_left']) : 0; ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45" class="prefix-act-field">
                <td><b>Margin Right</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="number_prefix_margin_right" id="anc_6310_number_prefix_margin_right" type="number" value="<?php echo isset($cssData['number_prefix_margin_right']) && esc_attr($cssData['number_prefix_margin_right']) !== '' ? esc_attr($cssData['number_prefix_margin_right']) : 0; ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45">
                <td width="55%"><b>Activate Number Suffix</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <label class="switch">
                    <input type="checkbox" <?php echo (isset($cssData['suffix_icon_show_hide']) && esc_attr($cssData['suffix_icon_show_hide'])) ? ' checked' : '' ?> name="suffix_icon_show_hide" value="1" id="anc_6310_suffix_icon_show_hide" class="anc-6310-form-input" />
                    <span class="slider round suffix_icon_show_hide"></span>
                  </label>
                </td>
              </tr>
              <tr height="45" class="suffix-act-field">
                <td width='55%'><b>Font Size</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" min="0" name="number_suffix_font_size" value="<?php echo isset($cssData['number_suffix_font_size']) && esc_attr($cssData['number_suffix_font_size']) !== '' ? esc_attr($cssData['number_suffix_font_size']) : 20; ?>" class="anc-6310-form-input" id="anc_6310_number_suffix_font_size" />
                </td>
              </tr>
              <tr height="45" class="suffix-act-field">
                <td><b>Font Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="number_suffix_font_color" id="anc_6310_number_suffix_font_color" class="anc-6310-form-input anc_6310_color_picker" data-format="rgb" value="<?php echo isset($cssData['number_suffix_font_color']) && esc_attr($cssData['number_suffix_font_color']) !== '' ? esc_attr($cssData['number_suffix_font_color']) : 'rgb(255, 255, 255)'; ?>">
                </td>
              </tr>
              <tr height="45" class="suffix-act-field">
                <td><b>Font Hover Color</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="number_suffix_font_hover_color" id="anc_6310_number_suffix_font_hover_color" class="anc-6310-form-input anc_6310_color_picker" data-format="rgb" value="<?php echo isset($cssData['number_suffix_font_hover_color']) && esc_attr($cssData['number_suffix_font_hover_color']) !== '' ? esc_attr($cssData['number_suffix_font_hover_color']) : 'rgb(255, 255, 255)'; ?>">
                </td>
              </tr>
              <tr height="45" class="suffix-act-field">
                <td width='55%'><b>Font Weight</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <select name="number_suffix_font_weight" class="anc-6310-form-input" id="anc_6310_number_suffix_font_weight">
                    <option value="100" <?php if (isset($cssData['number_suffix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == '100') echo " selected=''" ?>>100</option>
                    <option value="200" <?php if (isset($cssData['number_suffix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == '200') echo " selected=''" ?>>200</option>
                    <option value="300" <?php if (isset($cssData['number_suffix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == '300') echo " selected=''" ?>>300</option>
                    <option value="400" <?php if (isset($cssData['number_suffix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == '400') echo " selected=''" ?>>400</option>
                    <option value="500" <?php if (isset($cssData['number_suffix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == '500') echo " selected=''" ?>>500</option>
                    <option value="600" <?php if (isset($cssData['number_suffix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == '600') echo " selected=''" ?>>600</option>
                    <option value="700" <?php if (isset($cssData['number_suffix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == '700') echo " selected=''" ?>>700</option>
                    <option value="800" <?php if (isset($cssData['number_suffix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == '800') echo " selected=''" ?>>800</option>
                    <option value="900" <?php if (isset($cssData['number_suffix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == '900') echo " selected=''" ?>>900</option>
                    <option value="normal" <?php if (isset($cssData['number_suffix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == 'normal') echo " selected=''" ?>>Normal</option>
                    <option value="bold" <?php if (isset($cssData['number_suffix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == 'bold') echo " selected=''" ?>>Bold</option>
                    <option value="lighter" <?php if (isset($cssData['number_suffix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == 'lighter') echo " selected=''" ?>>Lighter</option>
                    <option value="initial" <?php if (isset($cssData['number_suffix_font_weight']) && esc_attr($cssData['number_prefix_font_weight']) == 'initial') echo " selected=''" ?>>Initial</option>
                  </select>
                </td>
              </tr>
              <tr height="45" class="suffix-act-field">
                <td><b>Font Family</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="number_suffix_font_family" id="anc_6310_jquery_number_suffix_font" type="text" value="<?php echo isset($cssData['number_suffix_font_family']) && esc_attr($cssData['number_suffix_font_family']) !== '' ? esc_attr($cssData['number_suffix_font_family']) : 'Amaranth'; ?>" />
                </td>
              </tr>
              <tr height="45" class="suffix-act-field">
                <td><b>Top/Bottom Position</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" name="number_suffix_position" id="anc_6310_number_suffix_position" class="anc-6310-form-input" value="<?php echo isset($cssData['number_suffix_position']) && esc_attr($cssData['number_suffix_position']) !== '' ? esc_attr($cssData['number_suffix_position']) : 2; ?>">
                </td>
              </tr>
              <tr height="45" class="suffix-act-field">
                <td><b>Margin Left</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="number_suffix_margin_left" id="anc_6310_number_suffix_margin_left" type="number" value="<?php echo isset($cssData['number_suffix_margin_left']) && esc_attr($cssData['number_suffix_margin_left']) !== '' ? esc_attr($cssData['number_suffix_margin_left']) : 0; ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45" class="suffix-act-field">
                <td><b>Margin Right</b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="number_suffix_margin_right" id="anc_6310_number_suffix_margin_right" type="number" value="<?php echo isset($cssData['number_suffix_margin_right']) && esc_attr($cssData['number_suffix_margin_right']) !== '' ? esc_attr($cssData['number_suffix_margin_right']) : 0; ?>" class="anc-6310-form-input" />
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div id="tab-6">
        <div class="row">
          <h3 class="anc-6310-tab-menu-settings">Button Settings</h3>
          <div class="anc-6310-tab-6">
            <table class="table table-responsive anc_6310_admin_table" width="100%">
              <tr height="45">
                <td width="55%">
                  <b>Activate Button </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <label class="switch">
                    <input type="checkbox" <?php echo (isset($cssData['counter_button']) && esc_attr($cssData['counter_button'])) ? ' checked' : '' ?> name="counter_button" value="1" id="anc_6310_counter_button" class="anc-6310-form-input" />
                    <span class="slider round button_icon_show_hide"></span>
                  </label>
                </td>
              </tr>
              <tr height="45" class="button-act-field">
                <td><b>Background Color </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <input type="text" name="button_background_color" id="anc_6310_button_background_color" class="anc-6310-form-input anc_6310_color_picker" step="1" data-opacity=".8" data-format="rgb" value="<?php echo isset($cssData['button_background_color']) && esc_attr($cssData['button_background_color']) !== '' ? esc_attr($cssData['button_background_color']) : 'rgba(0, 158, 226, 1)'; ?>">
                </td>
              </tr>
              <tr height="45" class="button-act-field">
                <td width="55%"><b>Background Hover Color </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <input type="text" name="button_background_hover_color" id="anc_6310_button_background_hover_color" class="anc-6310-form-input anc_6310_color_picker" data-opacity=".8" data-format="rgb" value="<?php echo isset($cssData['button_background_hover_color']) && esc_attr($cssData['button_background_hover_color']) !== '' ? esc_attr($cssData['button_background_hover_color']) : 'rgba(7, 144, 204, 0.8)'; ?>">
                </td>
              </tr>
              <tr height="45" class="button-act-field">
                <td width='55%'><b>Font Size </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <input type="number" min="0" name="button_font_size" value="<?php echo isset($cssData['button_font_size']) && esc_attr($cssData['button_font_size']) !== '' ? esc_attr($cssData['button_font_size']) : 13; ?>" class="anc-6310-form-input" step="1" id="anc_6310_button_font_size" />
                </td>
              </tr>
              <tr height="45" class="button-act-field">
                <td><b>Line Height </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <input name="button_line_height" id="anc_6310_button_line_height" type="number" value="<?php echo isset($cssData['button_line_height']) && esc_attr($cssData['button_line_height']) !== '' ? esc_attr($cssData['button_line_height']) : 25; ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45" class="button-act-field">
                <td><b>Font Color </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <input type="text" name="button_font_color" id="anc_6310_button_font_color" class="anc-6310-form-input anc_6310_color_picker" data-format="rgb" value="<?php echo isset($cssData['button_font_color']) && esc_attr($cssData['button_font_color']) !== '' ? esc_attr($cssData['button_font_color']) : 'rgb(255, 255, 255)'; ?>">
                </td>
              </tr>
              <tr height="45" class="button-act-field">
                <td><b>Font Hover Color </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <input type="text" name="button_font_hover_color" id="anc_6310_button_font_hover_color" class="anc-6310-form-input anc_6310_color_picker" data-format="rgb" value="<?php echo isset($cssData['button_font_hover_color']) && esc_attr(($cssData['button_font_hover_color'])) !== '' ? esc_attr($cssData['button_font_hover_color']) : 'rgb(255, 255, 255)'; ?>">
                </td>
              </tr>
              <tr height="45" class="button-act-field">
                <td width='55%'><b>Font Weight </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <select name="button_font_weight" class="anc-6310-form-input" id="anc_6310_button_font_weight">
                    <option value="100" <?php if (isset($cssData['button_font_weight']) && esc_attr($cssData['button_font_weight']) == '100') echo " selected=''" ?>>100</option>
                    <option value="200" <?php if (isset($cssData['button_font_weight']) && esc_attr($cssData['button_font_weight']) == '200') echo " selected=''" ?>>200</option>
                    <option value="300" <?php if (isset($cssData['button_font_weight']) && esc_attr($cssData['button_font_weight']) == '300') echo " selected=''" ?>>300</option>
                    <option value="400" <?php if (isset($cssData['button_font_weight']) && esc_attr($cssData['button_font_weight']) == '400') echo " selected=''" ?>>400</option>
                    <option value="500" <?php if (isset($cssData['button_font_weight']) && esc_attr($cssData['button_font_weight']) == '500') echo " selected=''" ?>>500</option>
                    <option value="600" <?php if (isset($cssData['button_font_weight']) && esc_attr($cssData['button_font_weight']) == '600') echo " selected=''" ?>>600</option>
                    <option value="700" <?php if (isset($cssData['button_font_weight']) && esc_attr($cssData['button_font_weight']) == '700') echo " selected=''" ?>>700</option>
                    <option value="800" <?php if (isset($cssData['button_font_weight']) && esc_attr($cssData['button_font_weight']) == '800') echo " selected=''" ?>>800</option>
                    <option value="900" <?php if (isset($cssData['button_font_weight']) && esc_attr($cssData['button_font_weight']) == '900') echo " selected=''" ?>>900</option>
                    <option value="normal" <?php if (isset($cssData['button_font_weight']) && esc_attr($cssData['button_font_weight']) == 'normal') echo " selected=''" ?>>Normal</option>
                    <option value="bold" <?php if (isset($cssData['button_font_weight']) && esc_attr($cssData['button_font_weight']) == 'bold') echo " selected=''" ?>>Bold</option>
                    <option value="lighter" <?php if (isset($cssData['button_font_weight']) && esc_attr($cssData['button_font_weight']) == 'lighter') echo " selected=''" ?>>Lighter</option>
                    <option value="initial" <?php if (isset($cssData['button_font_weight']) && esc_attr($cssData['button_font_weight']) == 'initial') echo " selected=''" ?>>Initial</option>
                  </select>
                </td>
              </tr>
              <tr height="45" class="button-act-field">
                <td width='55%'><b>Text Transform </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <select name="button_text_transform" class="anc-6310-form-input" id="anc_6310_button_text_transform">
                    <option value="capitalize" <?php if (isset($cssData['button_text_transform']) && esc_attr($cssData['button_text_transform']) == 'capitalize') echo " selected=''" ?>>Capitalize</option>
                    <option value="uppercase" <?php if (isset($cssData['button_text_transform']) && esc_attr($cssData['button_text_transform']) == 'uppercase') echo " selected=''" ?>>Uppercase</option>
                    <option value="lowercase" <?php if (isset($cssData['button_text_transform']) && esc_attr($cssData['button_text_transform']) == 'lowercase') echo " selected=''" ?>>Lowercase</option>
                    <option value="none" <?php if (isset($cssData['button_text_transform']) && esc_attr($cssData['button_text_transform']) == 'none') echo " selected=''" ?>>As Input</option>
                  </select>
                </td>
              </tr>
              <tr height="45" class="button-act-field">
                <td><b>Button Width </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <input type="number" min="0" name="button_width" value="<?php echo isset($cssData['button_width']) && esc_attr($cssData['button_width']) !== '' ? esc_attr($cssData['button_width']) : 110; ?>" class="anc-6310-form-input" id="anc_6310_button_width" />
                </td>
              </tr>
            </table>
          </div>
          <div class="anc-6310-tab-6">
            <table class="table table-responsive anc_6310_admin_table">
              <tr height="45" class="button-act-field">
                <td><b>Font Family </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <input name="button_font_family" id="anc_6310_jquery_button_font" type="text" value="<?php echo isset($cssData['button_font_family']) && esc_attr($cssData['button_font_family']) !== '' ? str_replace("+", " ", esc_attr($cssData['button_font_family'])) : 'arimo'; ?>" />
                </td>
              </tr>
              <tr height="45" class="button-act-field">
                <td width='55%'><b>Button Align </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <select name="button_align" class="anc-6310-form-input" id="anc_6310_button_align">
                    <option value="center" <?php if (isset($cssData['button_align']) && esc_attr($cssData['button_align']) == 'center') echo " selected=''" ?>>Center</option>
                    <option value="left" <?php if (isset($cssData['button_align']) && esc_attr($cssData['button_align']) == 'left') echo " selected=''" ?>>Left</option>
                    <option value="right" <?php if (isset($cssData['button_align']) && esc_attr($cssData['button_align']) == 'right') echo " selected=''" ?>>Right</option>
                  </select>
                </td>
              </tr>
              <tr height="45" class="button-act-field">
                <td width='55%'><b>Button Text Align </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <select name="button_text_align" class="anc-6310-form-input" id="anc_6310_button_text_align">
                    <option value="center" <?php if (isset($cssData['button_text_align']) && esc_attr($cssData['button_text_align']) == 'center') echo " selected=''" ?>>Center</option>
                    <option value="left" <?php if (isset($cssData['button_text_align']) && esc_attr($cssData['button_text_align']) == 'left') echo " selected=''" ?>>Left</option>
                    <option value="right" <?php if (isset($cssData['button_text_align']) && esc_attr($cssData['button_text_align']) == 'right') echo " selected=''" ?>>Right</option>
                  </select>
                </td>
              </tr>
              <tr height="45" class="button-act-field">
                <td width='55%'><b>Button Border Width </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <select name="button_border_width" class="anc-6310-form-input" id="anc_6310_button_border_width">
                    <option value="0px" <?php if (isset($cssData['button_border_width']) && esc_attr($cssData['button_border_width']) == '0px') echo " selected=''" ?>>None
                    </option>
                    <option value="1px" <?php if (isset($cssData['button_border_width']) && esc_attr($cssData['button_border_width']) == '1px') echo " selected=''" ?>>1px
                    </option>
                    <option value="2px" <?php if (isset($cssData['button_border_width']) && esc_attr($cssData['button_border_width']) == '2px') echo " selected=''" ?>>2px
                    </option>
                    <option value="3px" <?php if (isset($cssData['button_border_width']) && esc_attr($cssData['button_border_width']) == '3px') echo " selected=''" ?>>3px
                    </option>
                    <option value="4px" <?php if (isset($cssData['button_border_width']) && esc_attr($cssData['button_border_width']) == '4px') echo " selected=''" ?>>4px
                    </option>
                    <option value="5px" <?php if (isset($cssData['button_border_width']) && esc_attr($cssData['button_border_width']) == '5px') echo " selected=''" ?>>5px
                    </option>
                  </select>
                </td>
              </tr>
              <tr height="45" class="button-act-field">
                <td><b>Button Border Color </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <input type="text" name="button_border_color" id="anc_6310_button_border_color" class="anc-6310-form-input anc_6310_color_picker" data-format="rgb" value="<?php echo isset($cssData['button_border_color']) && $cssData['button_border_color'] !== '' ? esc_attr($cssData['button_border_color']) : 'rgb(255, 255, 255)'; ?>">
                </td>
              </tr>
              <tr height="45" class="button-act-field">
                <td><b>Button Border Hover Color </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <input type="text" name="button_border_hover_color" id="anc_6310_button_border_hover_color" class="anc-6310-form-input anc_6310_color_picker" data-format="rgb" value="<?php echo isset($cssData['button_border_hover_color']) && esc_attr($cssData['button_border_hover_color']) !== '' ? esc_attr($cssData['button_border_hover_color']) : 'rgb(255, 255, 255)'; ?>">
                </td>
              </tr>
              <tr height="45" class="button-act-field">
                <td><b>Button Border Radius </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <input type="number" name="button_border_radius" id="anc_6310_button_border_radius" class="anc-6310-form-input " value="<?php echo isset($cssData['button_border_radius']) && esc_attr($cssData['button_border_radius']) !== '' ? esc_attr($cssData['button_border_radius']) : 0; ?>">
                </td>
              </tr>
              <tr height="45" class="button-act-field">
                <td><b>Margin Top </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <input name="button_margin_top" id="anc_6310_button_margin_top" type="number" value="<?php echo isset($cssData['button_margin_top']) && esc_attr($cssData['button_margin_top']) !== '' ? esc_attr($cssData['button_margin_top']) : 20; ?>" class="anc-6310-form-input" />
                </td>
              </tr>
              <tr height="45" class="button-act-field">
                <td><b>Margin Bottom </b> <span class="anc-6310-pro">(Pro) <div class="anc-6310-pro-text">This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <input name="button_margin_bottom" id="anc_6310_button_margin_bottom" type="number" value="<?php echo isset($cssData['button_margin_bottom']) && esc_attr($cssData['button_margin_bottom']) !== '' ? esc_attr($cssData['button_margin_bottom']) : 10; ?>" class="anc-6310-form-input" />
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div id="tab-7">
        <h3 class="anc-6310-tab-menu-settings">Custom CSS Settings</h3>
        <p for="" style="width: calc(100% - 30px); margin: 0 15px 5px; font-size: 14px; padding-top: 15px; color: #000"><b>Add Your Custom CSS Code Here </b></p><br />
        <div class="css-area">
          <textarea class="codemirror-textarea" name="custom_css" rows="8" cols="50"><?php echo esc_html(anc_6310_special_character_remove($cssData['custom_css'])) ?></textarea>
        </div>
      </div>

      <br class="anc-6310-clear" />
      <br class="anc-6310-clear" />
      <hr />
      <input type="submit" name="update_style_change" value="Save" class="anc-6310-btn-primary anc-6310-pull-right" style="margin-right: 15px; margin-bottom: 10px; display: block" />
      <br class="anc-6310-clear" />
    </div>
  </form>
</div>