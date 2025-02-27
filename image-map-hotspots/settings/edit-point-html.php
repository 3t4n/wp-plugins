<div id="imh-6310-edit-point" class="imh-6310-modal imh-6310-hide">
  <div class="imh-6310-modal-content imh-6310-modal-lg">
    <div class="imh-6310-modal-header">
        Edit Marker Settings
      <div class="imh-6310-close">&times;</div>
    </div>

    <div class="toggle-wrap">
      <ul class="toggle-tabs">
        <li data-id="1" class="active-tab">Marker</li>
        <li data-id="2">Content</li>
        <li data-id="3">link</li>
      </ul>

      <div class="imh-6310-modal-body-form">
        <div class="tabbed-content-wrap">
          <div class="imh-6310-tab imh-6310-tab-1">
            <table border="0" width="100%" cellpadding="10" cellspacing="0">
              <tr>
                <td class='imh-6310-width-150'><label class="imh-6310-form-label" for="icons">Marker Type:</label></td>
                <td>
                  <input type="radio" name='icontype' class='imh-6310_icon_type' value='1' checked /> Font Awesome Icon
                  <input type="radio" name='icontype' class="imh-6310_icon_type" value='2' /> Custom Icon <span class="imh-6310-pro">(Pro)</span>
                  <input type="radio" name='icontype' class='imh-6310_icon_type' value='3' /> Text <span class="imh-6310-pro">(Pro)</span>
                </td>
              </tr>
              <tr height="40px" class="imh-6310-form-icon imh-6310-marker imh-6310-marker-type-1">
                <td class='imh-6310-width-150'><label class="imh-6310-form-label" for="icons">Icons:</label></td>
                <td>
                  <input type="text" name="icons" id="icons-1" class="imh-6310-form-input lg icons-1" placeholder="fas fa-map-marker-alt" data-value="fas fa-map-marker-alt" readonly="">
                  <div class="imh-6310-plus-icons" data-id='icons-1'><i class="fas fa-plus-circle"></i></div>
                  <div class="imh-6310-minus-icons" data-id='icons-2'><i class="fas fa-minus-circle"></i></div>
                  <div class="imh-selected-icon icons-1-selected"> <i class="fas fa-map-marker-alt"></i></div>
                </td>
              </tr>
              <tr height="40px" class="imh-6310-form-icon imh-6310-marker imh-6310-marker-type-1">
                <td class='imh-6310-width-150'><label class="imh-6310-form-label" for="icons">Hover Icons:</label></td>
                <td>
                  <input type="text" name="hovericons" id="icons-2" class="imh-6310-form-input lg icons-2" placeholder="fas fa-map-marker-alt" data-value="fas fa-map-marker-alt" readonly="">
                  <div class="imh-6310-plus-icons" data-id='icons-2'><i class="fas fa-plus-circle"></i></div>
                  <div class="imh-6310-minus-icons" data-id='icons-2'><i class="fas fa-minus-circle"></i></div>
                  <div class="imh-selected-icon icons-2-selected"> <i class="fas fa-map-marker-alt"></i></div>
                </td>
              </tr>
              <tr height="40px" class="imh-6310-form-icon imh-6310-marker imh-6310-marker-type-1">
                <td class='imh-6310-width-150'><label class="imh-6310-form-label" for="icons">Icon Color:</label></td>
                <td>
                  <input type="text" name="imh_6310_fontawesome_icon_color" class="imh_6310_fontawesome_icon_color imh-6310-form-input imh_6310_color_picker" data-format="rgb" data-opacity="0.8" data-value="rgba(255, 28, 3, 0.99)" >
                </td>
              </tr>
              <tr height="40px" class="imh-6310-form-icon imh-6310-marker imh-6310-marker-type-1">
                <td class='imh-6310-width-150'><label class="imh-6310-form-label" for="icons">Icon Hover Color:</label></td>
                <td>
                  <input type="text" name="imh_6310_fontawesome_icon_hover_color" class="imh-6310-form-input imh_6310_color_picker imh_6310_fontawesome_icon_hover_color" data-opacity="0.8" data-format="rgb" data-value="rgba(255, 28, 3, 0.99)">
                </td>
              </tr>  
              <tr height="40px" class="imh-6310-form-icon imh-6310-marker imh-6310-marker-type-1">
                <td class='imh-6310-width-150'><label class="imh-6310-form-label" for="icons">Icon Size in Desktop:</label></td>
                <td>
                  <input type="number" min='20' max="" name="imh-6310_icon_size" class="imh-6310-form-input imh-6310_icon_size" data-value="30">
                </td>
              </tr>           
              <tr height="40px" class="imh-6310-form-icon imh-6310-marker imh-6310-marker-type-1">
                <td class='imh-6310-width-150'><label class="imh-6310-form-label" for="icons">Icon Size in Mobile <span class="imh-6310-pro">(Pro)</span>:</label></td>
                <td>
                  <input type="number" min='0' max="" name="imh-6310_icon_size_in_mobile" class="imh-6310-form-input imh-6310_icon_size_in_mobile" data-value="20">
                </td>
              </tr> 
              <tr class="imh-6310-marker imh-6310-marker-type-2 imh-6310-hide">
                <td class='imh-6310-width-150'><label class="imh-6310-form-label" for="picture">Custom Icon/Image <span class="imh-6310-pro">(Pro)</span> :</label></td>
                <td>
                  <input type="text" name="image" id="imh-6310-image-edit-1" class="imh-6310-form-input imh-6310-image-edit-1" value="">
                  <input type="button" value="Upload Image" class="imh-6310-btn-default imh-6310-icon-upload custom-icon-image" data-id="imh-6310-image-edit-1">
                </td>
              </tr>
              <tr class="imh-6310-marker imh-6310-marker-type-2 imh-6310-hide">
                <td class='imh-6310-width-150'><label class="imh-6310-form-label" for="picture">Custom Hover Icon/Image <span class="imh-6310-pro">(Pro)</span> :</label></td>
                <td>
                  <input type="text" name="hoverimage" id="imh-6310-image-edit-2" class="imh-6310-form-input imh-6310-image-edit-2" value="">
                  <input type="button" value="Upload Hover Image" class="imh-6310-btn-default imh-6310-icon-upload custom-icon-image" data-id="imh-6310-image-edit-2">
                </td>
              </tr>
              <tr class="imh-6310-marker imh-6310-marker-type-2 imh-6310-hide">
                <td class='imh-6310-width-150'><label class="imh-6310-form-label">Image / icon Size in Mobile <span class="imh-6310-pro">(Pro)</span> :</label></td>
                <td>
                  <input type="number" min='0' max="" name="img_or_icon_size" class="imh-6310-form-input img_or_icon_size" data-value= "30">
                </td>
              </tr>
              <tr class="imh-6310-marker imh-6310-marker-type-2 imh-6310-hide">
                <td class='imh-6310-width-150'><label class="imh-6310-form-label">Image / icon Size in Mobile <span class="imh-6310-pro">(Pro)</span>:</label></td>
                <td>
                  <input type="number" min='0' max="" name="img_or_icon_size_in_mobile" class="imh-6310-form-input img_or_icon_size_in_mobile" data-value= "30">
                </td>
              </tr>
              <tr height="40px" class="imh-6310-marker imh-6310-marker-type-3 imh-6310-hide">
                <td class='imh-6310-width-150'><label class="imh-6310-form-label" for="icons">Text <span class="imh-6310-pro">(Pro)</span> :</label></td>
                <td>
                  <input type="text" name="icons" id="imh-6310_custom_enter_text" class="imh-6310-form-input lg imh-6310_custom_enter_text" data-value="Hover here">
                </td>
              </tr>
              <tr class="imh-6310-marker imh-6310-marker-type-3 imh-6310-hide">
                <td class='imh-6310-width-150'><b>Font Size <span class="imh-6310-pro">(Pro)</span> :</b></td>
                <td>
                  <input type="number" min="0" class="imh-6310-form-input imh_6310_custom_text_font_size"  data-value="16"  step="1" />
                </td>
              </tr>
              <tr class="imh-6310-marker imh-6310-marker-type-3 imh-6310-hide">
                <td><b>Font Color <span class="imh-6310-pro">(Pro)</span> :</b></td>
                <td>
                  <input type="text" class="imh-6310-form-input imh_6310_color_picker imh_6310_custom_text_font_color" data-format="rgb"  data-value="rgb(255, 255, 255)">
                </td>
              </tr>
              <tr class="imh-6310-marker imh-6310-marker-type-3 imh-6310-hide">
                <td><b>Background Color <span class="imh-6310-pro">(Pro)</span> :</b></td>
                <td>
                  <input type="text" class="imh-6310-form-input imh_6310_color_picker imh_6310_custom_text_font_bg_color" data-format="rgb" data-opacity="0.8"  data-value="rgba(2, 59, 92, 0.99)">
                </td>
              </tr>         
            </table>
            <table border="0" width="100%" cellpadding="10" cellspacing="0">
              <tr>
                <td class='imh-6310-width-150'><b>Blinking Tooltip:</b></td>
                <td>
                  <input type="radio" name='blinktype' class='imh-6310_blink_type' value='1' checked /> Yes
                  <span class="imh-6310-pro">(Pro)</span>
                  <input type="radio" name='blinktype' class="imh-6310_blink_type" value='2' />No <span class="imh-6310-pro">(Pro)</span>        
                  <div class="imh-6310-no-live-preview">Live Preview Not Available</div>        
                </td>
               
              </tr>
              <tr height="40px" class="imh-6310-form-icon imh_6310_icon_glow_color">
                <td class='imh-6310-width-150'><b>Color:</b></td>
                <td>
                  <input type="text" name="imh_6310_fontawesome_icon_glow_color" class="imh-6310-form-input imh_6310_color_picker imh_6310_fontawesome_icon_glow_color" data-format="rgb" data-opacity="0.8" data-value="rgb(255, 0, 0)">
                  <div class="imh-6310-no-live-preview">Live Preview Not Available</div>
                </td>
              </tr>        
            </table>
          </div>
          <div class="imh-6310-tab imh-6310-tab-2">
            <table border="0" width="100%" cellpadding="10" cellspacing="0">
              <tr>
                <td class='imh-6310-width-150'><b class="imh-6310-form-label">Element Type:</b></td>
                <td>
                  <input class='imh-6310-section-select' value='1' type="radio" name="popover_new" checked />Tooltip
                  <input class='imh-6310-section-select' value='2' type="radio" name="popover_new">Embedded code <span class="imh-6310-pro">(Pro)</span>
                  <input class='imh-6310-section-select' value='3' type="radio" name="popover_new">Custom code <span class="imh-6310-pro">(Pro)</span>
                </td>
              </tr>          
            </table>
            <div class="imh-6310-templates imh-6310-hide">
              <table border="0" width="100%" cellpadding="10" cellspacing="0">
                <tr class="">
                  <td class='imh-6310-width-150'><label class="imh-6310-form-label" for="picture"> Select Template:</label></td>
                  <td>
                    <div class="imh-6310-tooltip_img_section">
                      <div class="imh-6310-tooltip-img imh-6310-tooltip-img-css imh-6310-type-1" data-id='01'>
                        <img src="<?php echo imh_6310_plugin_dir_url . 'assets/images/1.png' ?>" data-template='template-01' alt="First Img">
                      </div>
                      <div class="imh-6310-tooltip-img-css imh-6310-tooltip-img-pro imh-6310-tooltip-img imh-6310-type-2 " data-id='02'>
                        <img src="<?php echo imh_6310_plugin_dir_url . 'assets/images/2.png' ?>" alt="First Img">
                      </div>
                      <div class="imh-6310-tooltip-img-css imh-6310-tooltip-img-pro imh-6310-type-1" data-id='03'>
                        <img src="<?php echo imh_6310_plugin_dir_url . 'assets/images/3.png' ?>" alt="First Img">
                      </div>
                      <div class="imh-6310-tooltip-img-css imh-6310-tooltip-img-pro imh-6310-type-1" data-id='04'>
                        <img src="<?php echo imh_6310_plugin_dir_url . 'assets/images/4.png' ?>" alt="First Img">
                      </div>
                      <div class="imh-6310-tooltip-img-css imh-6310-tooltip-img-pro imh-6310-type-1 " data-id='05'>
                        <img src="<?php echo imh_6310_plugin_dir_url . 'assets/images/5.png' ?>" alt="First Img">
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
            <div class="imh-6310-tooltip-link imh-6310-hide">
              <table border="0" width="100%" cellpadding="10" cellspacing="0">
                <tr>
                  <td class='imh-6310-width-150'><label class="imh-6310-form-label" for="picture">Title Content:</label></td>
                  <td>
                    <input type="text" class="imh_6310_link_text">
                  </td>
                </tr>

                <tr>
                  <td class='imh-6310-width-150'><label class="imh-6310-form-label" for="picture">Open in Popup <span class="imh-6310-pro">(Pro)</span> :</label></td>
                  <td>
                    <input name="imh-6310-open-popup" class="imh-6310-open-popup" value='2' type="radio" checked>Popup Embedded <span class="imh-6310-pro">(Pro)</span>
                    <input name="imh-6310-open-popup" class="imh-6310-open-popup" value='3' type="radio" checked>Popup Custom Code <span class="imh-6310-pro">(Pro)</span>
                    <input name="imh-6310-open-popup" class="imh-6310-open-popup" value='1' type="radio">No
                  </td>
                </tr>
                <tr class="tooltip-embedded imh-6310-hide">
                  <td class='imh-6310-width-150'><label class="imh-6310-form-label" for="picture"> Enter Embedded Code <span class="imh-6310-pro">(Pro)</span> :</label></td>
                  <td>
                    <textarea class="imh_6310_custom_code_popup-html" name="imh_6310_custom_code_popup" cols="90" rows="5" placeholder="This template avaiable on pro only." readonly ></textarea>
                  </td>
                </tr>
                <tr class="tooltip-custom-code imh-6310-hide">
                  <td class='imh-6310-width-150'><b>Popup Max Width</b> <span class="imh-6310-pro">(Pro)</span></td>
                  <td>
                    <input type="text" name="imh_6310_custom_popup_width" id="imh_6310_custom_popup_width" class="imh_6310_custom_popup_width" readonly>                  
                  </td>
                </tr> 
                <tr class="tooltip-custom-code imh-6310-hide">
                  <td class='imh-6310-width-150'><b>HTML Code</b> <span class="imh-6310-pro">(Pro)</span></td>
                  <td>
                    <textarea name="imh_6310_popup_custom_html" id="imh_6310_popup_custom_html" class="imh_6310_popup_custom_html" cols="90" rows="5" data-value='' readonly></textarea>
                    <a href="https://wpmart.org/image-hotspot-templates-01-10/" target="_blank" class='imh-6310-custom-code-url'>Get build in custom code for tooltip / popup</a>
                  </td>
                </tr> 
                <tr class="tooltip-custom-code imh-6310-hide">
                  <td class='imh-6310-width-150'><b>CSS Code</b> <span class="imh-6310-pro">(Pro)</span></td>
                  <td>
                    <textarea name="imh_6310_popup_custom_css" id="imh_6310_popup_custom_css" class="imh_6310_popup_custom_css" cols="90" rows="5" data-value='' readonly></textarea>
                  </td>
                </tr>
              </table>
            </div>
            <?php include imh_6310_plugin_url . "settings/template-settings.php"; ?>


          </div>
          <div class="imh-6310-tab imh-6310-tab-3">
            <table border="0" width="100%" cellpadding="10" cellspacing="0">
              <tr>
                <td class='imh-6310-width-150'><label class="imh-6310-form-label" for="picture">Do you Link Title?:</label></td>
                <td>
                  <input class='imh-6310_link_title_type' value='1' type="radio" name="link_title">Yes
                  <input class='imh-6310_link_title_type' value='2' type="radio" name="link_title" checked>No
                </td>
              </tr>
              <tr class="imh-6310_link">
                <td class='imh-6310-width-150'><label class="imh-6310-form-label" for="picture">Link with <span class="imh-6310-pro">(Pro)</span>:</label></td>
                <td>
                  <input name="imh-6310-link-position" class="imh-6310-link-position" value='1' type="radio" checked>Tooltip
                  <input name="imh-6310-link-position" class="imh-6310-link-position" value='2' type="radio">Pointer
                </td>
              </tr>
              <tr class="imh-6310_link">
                <td class='imh-6310-width-150'><label class="imh-6310-form-label" for="picture">Title Link Url:</label></td>
                <td>
                  <input type="text" class="imh_6310_custom_link_url" data-value= "www.wpmart.org">
                </td>
              </tr>
              <tr class="imh-6310_link">
                <td class='imh-6310-width-150'><label class="imh-6310-form-label" for="picture">Open new tab:</label></td>
                <td>
                  <input name="imh-6310-open-new-tab" class="imh-6310-open-new-tab" value='1' type="radio" checked>Yes
                  <input name="imh-6310-open-new-tab" class="imh-6310-open-new-tab" value='2' type="radio">No
                </td>
              </tr>              
            </table>
          </div>
        </div>
      </div>



    </div>
    <div class="imh-6310-modal-form-footer">
    <button type="button" name="close" class="imh-6310-btn-danger imh-6310-btn-close imh-6310-pull-right">Close</button>
      <input type="submit" name="submit" class="imh-6310-btn-primary imh-6310-pull-right imh-6310-margin-right-10 imh-6310-update-place-save" value="Done" />
    </div>
    <br class="imh-6310-clear" />
  </div>
</div>

<!-- Icon Modal Start -->
<div id="imh_6310_social_icon" class="imh-6310-modal imh-6310-display-none">
  <div class="imh-6310-modal-content imh-6310-modal-xl">
    <input type="hidden" name="rearrange_list" id="rearrange_list" value="" />
    <div class="imh-6310-modal-header">
      <span class="imh-6310-action-button">Choose your Icon</span>
      <input type="text" id="icon-filter" class="imh-6310-form-input" placeholder="Search Icon" />
      <span class="imh-6310-font-awesome-close">&times;</span>
    </div>
    <div class="imh-6310-modal-body-form">
      <ul class="imh-6310-choose-icon">
        <?php echo imh_6310_fa_icon_list('li', '</li>'); ?>
      </ul>
    </div>
    <div class="imh-6310-modal-form-footer">
      <button type="button" name="close" id="imh-6310-font-icon-close" class="imh-6310-btn-danger imh-6310-pull-right">Close</button>
    </div>
    <br class="imh-6310-clear" />
  </div>
</div>