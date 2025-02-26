<div class="afaq_6310_tabs_panel_settings">
  <form method="post">
    <?php wp_nonce_field("afaq_6310_nonce_field_form") ?>
    <input type="hidden" name="id" value="<?php echo $styleId ?>" />
    <div class="afaq_6310_padding_15_px">
      <ul class="afaq-6310-nav-tab">
        <li class="afaq-6310-mytab active" id="tab1">General</li>
        <li class="afaq-6310-mytab" id="tab2">Title</li>
        <li class="afaq-6310-mytab" id="tab3">Description</li>
        <li class="afaq-6310-mytab" id="tab6">Category</li>
        <li class="afaq-6310-mytab" id="tab7">Search</li>
        <li class="afaq-6310-mytab" id="tab4">Details Link</li>
        <li class="afaq-6310-mytab" id="tab5">Custom CSS</li>
      </ul>
    </div>
    <div class="afaq-6310-tab-content">
    <div id="tab-1">
        <div class="row afaq_6310_padding_15_px">
          <h3 class="afaq-6310-tab-menu-settings">General Settings</h3>
          <div class="afaq-6310-tab-6">
            <table class="table table-responsive afaq_6310_admin_table">
              <tr>
                <td>
                  <b>Animation Duration</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                  
                </td>
                <td>
                  <select name="animation_duration" class="afaq-6310-form-input afaq-6310-no-preview" id="animation_duration">
                    <?php
                    for ($i = .1; $i <= 2.1; $i += .1) {
                      $temp = number_format($i, 1);
                      if ($cssData['animation_duration'] == $temp) {
                        echo "<option selected value='{$i}'>" . $temp . "</option>";
                      } else {
                        echo "<option value='{$i}'>" . $temp . "</option>";
                      }
                    }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  <b>FAQ Mode</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                  <div class="afaq-6310-sub-title">Expand or collapse FAQ option on page load.</div><div class="afaq-6310-pro" style="display: block;">*Live Preview not available</div>
                </td>
                <td>
                  <select name="afaq_faq_mode" class="afaq-6310-form-input" id="afaq_faq_mode">
                    <option value="1" <?php if ($cssData['afaq_faq_mode'] == '1') echo " selected=''" ?>>First Open</option>
                    <option value="2" <?php if ($cssData['afaq_faq_mode'] == '2') echo " selected=''" ?>>All Open</option>
                    <option value="3" <?php if ($cssData['afaq_faq_mode'] == '3') echo " selected=''" ?>>All Folded</option>
                  </select>
                </td>
              </tr> 
              <tr class="enable-collapsable">
                <td>
                  <b>Enable Collapsible</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                  <div class="afaq-6310-sub-title">Select event click or mouse over to expand FAQ.</div>
                </td>
                <td>
                  <label class="switch">
                    <input type="checkbox" <?php echo (isset($cssData['enable_show_hide']) && $cssData['enable_show_hide']) ? ' checked' : '' ?> name="enable_show_hide" value="1" id="enable_show_hide">
                    <span class="slider round icon_show_hide"></span>
                  </label>
                </td>
              </tr>
              <tr>
                <td>
                  <b>Icon Show/Hide</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                </td>
                <td>
                  <label class="switch">
                    <input type="checkbox" <?php echo (isset($cssData['icon_show_hide']) && $cssData['icon_show_hide']) ? ' checked' : '' ?> name="icon_show_hide" value="1" id="icon_show_hide">
                    <span class="slider round icon_show_hide"></span>
                  </label>
                </td>
              </tr>
                <tr class="title-act-field">
                <td><b>Icon Width</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" min="0" name="head_icon_width_number" value="<?php echo $cssData['head_icon_width_number'] ?>" class="afaq-6310-form-input" step="1" id="head_icon_width_number" />
                </td>
              </tr> 
              <tr class="title-act-field">
                <td><b>Icon Size</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" min="0" name="head_icon_font_size_number" value="<?php echo $cssData['head_icon_font_size_number'] ?>" class="afaq-6310-form-input" step="1" id="head_icon_font_size_number" />
                </td>
              </tr>
              <tr class="title-act-field">
                <td><b>Icon Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="title_icon_color" id="title_icon_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" value="<?php echo $cssData['title_icon_color'] ?>">
                </td>
              </tr>
              <tr class="title-act-field">
                <td><b>Icon Hover Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="icon_hover_color" id="icon_hover_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" value="<?php echo $cssData['icon_hover_color'] ?>">
                </td>
              </tr>
              <tr class="title-act-field">
                <td><b>Icon Background Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="icon_background_color" id="icon_background_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" value="<?php echo $cssData['icon_background_color'] ?>">
                </td>
              </tr>
                 <tr class="title-act-field">
                <td><b>Icon Background Hover Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="icon_background_hover_color" id="icon_background_hover_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" value="<?php echo $cssData['icon_background_hover_color'] ?>">
                </td>
              </tr>
              <tr class="title-act-field">
                <td><b>Angle Width</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" min="0" name="angle_width_number" value="<?php echo $cssData['angle_width_number'] ?>" class="afaq-6310-form-input" step="1" id="angle_width_number" />
                </td>
              </tr>     
              <tr class="title-act-field">
                <td><b>Angle from Left</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" min="0" name="angle_from_left_number" value="<?php echo $cssData['angle_from_left_number'] ?>" class="afaq-6310-form-input" step="1" id="angle_from_left_number" />
                </td>
              </tr>    
            </table>
          </div>
          <div class="afaq-6310-tab-6">
            <table class="table table-responsive afaq_6310_admin_table">
              <tr>
                <td><b> Indicator Active Icon</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="title_active_icon" id="title_active_icon" value="<?php echo $cssData['title_active_icon'] ?>" class="afaq-6310-form-input" placeholder="FAQ Icon"  style="width: calc(100% - 36px)" />
                  <div class="afaq-6310-plus-icon" data-id="title_active_icon"><i class="fas fa-plus-circle afaq-6310-plus"></i></div>
                </td>
              </tr>
              <tr>
                <td><b>Indicator Inactive Icon</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="title_inactive_icon" id="title_inactive_icon" value="<?php echo $cssData['title_inactive_icon'] ?>" class="afaq-6310-form-input" placeholder="FAQ Icon"  style="width: calc(100% - 36px)" />
                  <div class="afaq-6310-plus-icon" data-id="title_inactive_icon"><i class="fas fa-plus-circle afaq-6310-plus"></i></div>
                </td>
              </tr>
                <tr class="description-act-field">
                <td><b>Indicator Width</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" min="0" name="indicator_width_number" value="<?php echo $cssData['indicator_width_number'] ?>" class="afaq-6310-form-input" step="1" id="indicator_width_number" />
                </td>
              </tr>
              <tr class="description-act-field">
                <td><b>Indicator Size</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" min="0" name="indicator_font_size_number" value="<?php echo $cssData['indicator_font_size_number'] ?>" class="afaq-6310-form-input" step="1" id="indicator_font_size_number" />
                </td>
              </tr>
              <tr class="description-act-field">
                <td><b>Indicator Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="indicator_color" id="indicator_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" value="<?php echo $cssData['indicator_color'] ?>">
                </td>
              </tr>
              <tr class="description-act-field">
                <td><b>Indicator Hover Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="indicator_hover_color" id="indicator_hover_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" value="<?php echo $cssData['indicator_hover_color'] ?>">
                </td>
              </tr>
              <tr class="description-act-field">
                <td><b>Indicator Background Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="indicator_background_color" id="indicator_background_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" value="<?php echo $cssData['indicator_background_color'] ?>">
                </td>
              </tr>
              <tr class="description-act-field">
                <td><b>Indicator Background Hover Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="indicator_background_hover_color" id="indicator_background_hover_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" value="<?php echo $cssData['indicator_background_hover_color'] ?>">
                </td>
              </tr>

            </table>
          </div>
        </div>
      </div>
      <div id="tab-2">
        <div class="row">
          <h3 class="afaq-6310-tab-menu-settings">Title Settings</h3>
          <div class="afaq-6310-tab-6">
            <table class="table table-responsive afaq_6310_admin_table">
              <tr>
                <td><b>Line Height</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="title_line_height_number" id="title_line_height_number" min="0" type="number" value="<?php echo $cssData['title_line_height_number'] ?>" class="afaq-6310-form-input" />
                </td>
              </tr>
              
              <tr>
                <td><b>Title Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="title_font_color" id="title_font_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" value="<?php echo $cssData['title_font_color'] ?>">
                </td>
              </tr>
              <tr>
                <td><b>Title Hover Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="title_text_hover_color" id="title_text_hover_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" value="<?php echo $cssData['title_text_hover_color'] ?>">
                </td>
              </tr>
              <tr>
                <td><b> Background Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="title_bg_color" id="title_bg_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" data-opacity="0.8"  value="<?php echo $cssData['title_bg_color'] ?>">
                </td>
              </tr>
              <tr>
                <td><b>Background Hover Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="title_bg_hover_color" id="title_bg_hover_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" data-opacity="0.8" value="<?php echo $cssData['title_bg_hover_color'] ?>">
                </td>
              </tr>
              <tr>
                <td><b> Border Size</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" min="0" name="top_border_height_number" value="<?php echo $cssData['top_border_height_number'] ?>" class="afaq-6310-form-input" id="top_border_height_number" />
                </td>
              </tr>
              <tr>
                <td><b>Border Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="title_border_top_color" id="title_border_top_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" value="<?php echo $cssData['title_border_top_color'] ?>">
                </td>
              </tr>
            </table>
          </div>
          <div class="afaq-6310-tab-6">
            <table class="table table-responsive afaq_6310_admin_table">
            <tr>
                <td><b>Font Family</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="title_font_family" id="title_font_family" type="text" value="<?php echo $cssData['title_font_family'] ?>" />
                </td>
              </tr>
              <tr>
              <td><b>Font Size</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
              <td>
                <input type="number" min="8" name="title_font_size_number" value="<?php echo $cssData['title_font_size_number'] ?>" class="afaq-6310-form-input" step="1" id="title_font_size_number" />
              </td>
            </tr>
            <tr>
                <td><b>Font Weight</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <select name="title_font_weight" class="afaq-6310-form-input" id="title_font_weight">
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
              <tr>
                <td><b>Text Transform</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <select name="title_text_transform" class="afaq-6310-form-input" id="title_text_transform">
                    <option value="capitalize" <?php if ($cssData['title_text_transform'] == 'capitalize') echo " selected=''" ?>>Capitalize</option>
                    <option value="uppercase" <?php if ($cssData['title_text_transform'] == 'uppercase') echo " selected=''" ?>>Uppercase</option>
                    <option value="lowercase" <?php if ($cssData['title_text_transform'] == 'lowercase') echo " selected=''" ?>>Lowercase</option>
                    <option value="none" <?php if ($cssData['title_text_transform'] == 'none') echo " selected=''" ?>>As Input</option>

                  </select>
                </td>
              </tr>
              <tr>
                <td><b>Text Align</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <select name="title_text_align" class="afaq-6310-form-input" id="title_text_align">
                    <option value="center" <?php if ($cssData['title_text_align'] == 'center') echo " selected=''" ?>>Center</option>
                    <option value="flex-start" <?php if ($cssData['title_text_align'] == 'flex-start') echo " selected=''" ?>>Left</option>
                    <option value="flex-end" <?php if ($cssData['title_text_align'] == 'flex-end') echo " selected=''" ?>>Right</option>
                  </select>
                </td>
              </tr>  
               <tr>
                <td><b>Padding Top</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="title_padding_top_number" id="title_padding_top_number" min="0" type="number" value="<?php echo $cssData['title_padding_top_number'] ?>" class="afaq-6310-form-input" />
                </td>
              </tr>
              <tr>
                <td><b>Padding Bottom</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="title_padding_bottom_number" id="title_padding_bottom_number" min="0" type="number" value="<?php echo $cssData['title_padding_bottom_number'] ?>" class="afaq-6310-form-input" />
                </td>
              </tr>   
              <tr>
                <td><b>Padding Left</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="title_padding_left_number" id="title_padding_left_number" min="0" type="number" value="<?php echo $cssData['title_padding_left_number'] ?>" class="afaq-6310-form-input" />
                </td>
              </tr>

              <tr>
                <td><b>Padding Right</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="title_padding_right_number" id="title_padding_right_number" min="0" type="number" value="<?php echo $cssData['title_padding_right_number'] ?>" class="afaq-6310-form-input" />
                </td>
              </tr>                
            </table>
          </div>
        </div>
      </div>
      <div id="tab-3">
        <div class="row">
          <h3 class="afaq-6310-tab-menu-settings">Description Settings</h3>
          <div class="afaq-6310-tab-6">
            <table class="table table-responsive afaq_6310_admin_table">
            <tr class="description-act-field">
                <td>
                  <b>Fixed Content Height</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
                  <div class="afaq-6310-sub-title">to display Collapsible FAQ content in a limited amount of space.</div>
                </td>
                <td>
                  <label class="switch">
                    <input type="checkbox" <?php echo (isset($cssData['content_limit_show_hide']) && $cssData['content_limit_show_hide']) ? ' checked' : '' ?> name="content_limit_show_hide" value="1" id="content_limit_show_hide">
                    <span class="slider round icon_show_hide"></span>
                  </label>
                </td>
              </tr>
              <tr class="description-act-field description_scroll">
                  <td><b>Description Scroll </b><span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span><div class="afaq-6310-pro" style="display: block;">*Preview-on-change not available</div>
                  </td>
                <td>
                  <input type="number" min="0" name="description_scroll" value="<?php echo $cssData['description_scroll'] ?>" class="afaq-6310-form-input" step="1" id="description_scroll" />
                </td>
              </tr>
              <tr class="description-act-field">
                <td><b>Font Family</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="description_font_family" id="description_font_family" type="text" value="<?php echo $cssData['description_font_family'] ?>" />
                </td>
              </tr>         
              <tr class="description-act-field">
                <td><b>Font Size</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="number" min="0" name="description_font_size_number" value="<?php echo $cssData['description_font_size_number'] ?>" class="afaq-6310-form-input" step="1" id="description_font_size_number" />
                </td>
              </tr>
              <tr class="description-act-field">
                <td><b>Line Height</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="description_line_height_number" id="description_line_height_number" type="number" value="<?php echo $cssData['description_line_height_number'] ?>" class="afaq-6310-form-input" />
                </td>
              </tr>
              <tr class="description-act-field">
                <td><b>Font Weight</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <select name="description_font_weight" class="afaq-6310-form-input" id="description_font_weight">
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
              <tr class="description-act-field">
                <td><b>Text Transform</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <select name="description_text_transform" class="afaq-6310-form-input" id="description_text_transform">
                    <option value="capitalize" <?php if ($cssData['description_text_transform'] == 'capitalize') echo " selected=''" ?>>Capitalize</option>
                    <option value="uppercase" <?php if ($cssData['description_text_transform'] == 'uppercase') echo " selected=''" ?>>Uppercase</option>
                    <option value="lowercase" <?php if ($cssData['description_text_transform'] == 'lowercase') echo " selected=''" ?>>Lowercase</option>
                    <option value="none" <?php if ($cssData['description_text_transform'] == 'none') echo " selected=''" ?>>As Input</option>
                  </select>
                </td>
              </tr>
              <tr class="description-act-field">
                <td><b>Text Align</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <select name="description_text_align" class="afaq-6310-form-input" id="description_text_align">
                    <option value="center" <?php if ($cssData['description_text_align'] == 'center') echo " selected=''" ?>>Center</option>
                    <option value="left" <?php if ($cssData['description_text_align'] == 'left') echo " selected=''" ?>>Left</option>
                    <option value="right" <?php if ($cssData['description_text_align'] == 'right') echo " selected=''" ?>>Right</option>
                  </select>
                </td>
              </tr>   
            </table>
          </div>
          <div class="afaq-6310-tab-6">
            <table class="table table-responsive afaq_6310_admin_table">
            <tr class="description-act-field">
                <td><b>Font Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="description_font_color" id="description_font_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" value="<?php echo $cssData['description_font_color'] ?>">
                </td>
              </tr>
              <tr class="description-act-field">
                <td><b>Font Hover Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="description_text_hover_color" id="description_text_hover_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" value="<?php echo $cssData['description_text_hover_color'] ?>">
                </td>
              </tr>

              <tr class="description-act-field">
                <td><b>Background Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="description_font_background_color" id="description_font_background_color" class="afaq-6310-form-input afaq_6310_color_picker" data-opacity="0.08" data-format="rgb" data-opacity="0.8" value="<?php echo $cssData['description_font_background_color'] ?>">
                </td>
              </tr>
              <tr class="description-act-field">
                <td><b>Background Hover Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input type="text" name="description_background_hover_color" id="description_background_hover_color" class="afaq-6310-form-input afaq_6310_color_picker" data-opacity="0.08" data-format="rgb" data-opacity="0.8" value="<?php echo $cssData['description_background_hover_color'] ?>">
                </td>
              </tr>               
              <tr class="description-act-field">
                <td><b>Padding Left</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="description_padding_left_number" id="description_padding_left_number" type="number" value="<?php echo $cssData['description_padding_left_number'] ?>" class="afaq-6310-form-input" />
                </td>
              </tr>
              <tr class="description-act-field">
                <td><b>Padding Right</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="description_padding_right_number" id="description_padding_right_number" type="number" value="<?php echo $cssData['description_padding_right_number'] ?>" class="afaq-6310-form-input" />
                </td>
              </tr>
              <tr class="description-act-field">
                <td><b>Padding Top</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="description_padding_top_number" id="description_padding_top_number" type="number" value="<?php echo $cssData['description_padding_top_number'] ?>" class="afaq-6310-form-input" />
                </td>
              </tr>
              <tr class="description-act-field">
                <td><b>Padding Bottom</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="description_padding_bottom_number" id="description_padding_bottom_number" type="number" value="<?php echo $cssData['description_padding_bottom_number'] ?>" class="afaq-6310-form-input" />
                </td>
              </tr>
              <tr class="description-act-field">
                <td><b>Margin Bottom</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
                <td>
                  <input name="description_margin_bottom" id="description_margin_bottom" type="number" value="<?php echo $cssData['description_margin_bottom'] ?>" class="afaq-6310-form-input" />
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <?php  
        
         
        include afaq_6310_plugin_url . "settings/form/_category-form.php";
        include afaq_6310_plugin_url . "settings/form/_search-form.php";  
        include afaq_6310_plugin_url . "settings/form/_form-details-link.php"; 
      ?>

      <br class="afaq-6310-clear" />
      <br class="afaq-6310-clear" />
      <hr />
      <input type="submit" name="update_style_change" value="Save" class="afaq-6310-btn-primary afaq-6310-pull-right" style="margin-right: 15px; margin-bottom: 10px; display: block" />
      <br class="afaq-6310-clear" />
    </div>
  </form>
</div>
