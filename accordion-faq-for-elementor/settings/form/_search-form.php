<div id="tab-7">
  <div class="row afaq_6310_padding_15_px">
    <h3 class="afaq-6310-tab-menu-settings">Search Settings</h3>
    <div class="afaq-6310-tab-6">
      <table class="table table-responsive afaq_6310_admin_table">
        <tr>
          <td>
            <b>Search Show/Hide</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
          </td>
          <td>
            <label class="switch">
              <input type="checkbox" <?php echo (isset($cssData['search_template_show_hide']) && $cssData['search_template_show_hide']) ? ' checked' : '' ?> name="search_template_show_hide" value="1" id="search_template_show_hide">
              <span class="slider round search_template_show_hide"></span>
            </label>
          </td>
        </tr>
      </table>
    </div>
    <div style="height: 1px; width: 100%; background: #FFF; float: left"></div>

    <div class="search_template_show_hide_div">
      <div class="afaq-6310-tab-6">
        <table class="table table-responsive afaq_6310_admin_table">
          <tr>
            <td><b>Search Placeholder Text</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
            <td>
              <input type="text" min="0" name="place_holder_text" value="<?php echo (isset($cssData['place_holder_text']) && $cssData['place_holder_text']  !== '') ? afaq_6310_scRemove($cssData['place_holder_text']) : 'Enter keywords eg: Foods, blog'; ?>" class="afaq-6310-form-input" id="place_holder_text" />
            </td>
          </tr>
          <tr>
            <td><b>Font Family</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
            <td>
              <input name="searce_font_family" id="searce_font_family" type="text" value="<?php echo $cssData['searce_font_family'] ?>" />
            </td>
          </tr>
          <tr>
            <td><b>Search Font Size</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
            <td>
              <input type="number" min="8" name="search_font_size_number" value="<?php echo (isset($cssData['search_font_size_number']) && $cssData['search_font_size_number']  !== '') ? $cssData['search_font_size_number'] : 12; ?>" class="afaq-6310-form-input" id="search_font_size_number" />
            </td>
          </tr>
          <tr>
            <td><b>Search Box Height </b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
            <td>
              <input type="number" min="0" name="search_box_height_number" value="<?php echo (isset($cssData['search_box_height_number']) && $cssData['search_box_height_number'] !== '') ? $cssData['search_box_height_number'] : 30; ?>" class="afaq-6310-form-input" id="search_box_height_number" />
            </td>
          </tr>
          <tr>
            <td>
              <b>Search Width</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
              
            </td>
            <td>
              <select name="search_width" class="afaq-6310-form-input afaq-6310-no-preview" id="search_width">
                <?php
                for ($i = 20; $i <= 100; $i += 5) {
                  if (isset($cssData['search_width']) && $cssData['search_width'] == $i) {
                    echo "<option selected value='{$i}'>{$i}%</option>";
                  } else {
                    echo "<option value='{$i}'>{$i}%</option>";
                  }
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td><b>Search Position</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
            <td>
              <select name="search_box_align" class="afaq-6310-form-input" id="search_box_align">
                <option value="center" <?php if ($cssData['search_box_align'] == 'center') echo " selected=''" ?>>Center</option>
                <option value="flex-start" <?php if ($cssData['search_box_align'] == 'flex-start') echo " selected=''" ?>>Left</option>
                <option value="flex-end" <?php if ($cssData['search_box_align'] == 'flex-end') echo " selected=''" ?>>Right</option>
              </select>
            </td>
          </tr>
        </table>
      </div>
      <div class="afaq-6310-tab-6">
        <table class="table table-responsive afaq_6310_admin_table">
          <tr>
            <td><b>Icon Size</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
            <td>
              <input type="number" min="8" name="search_icon_size_number" value="<?php echo (isset($cssData['search_icon_size_number']) && $cssData['search_icon_size_number']  !== '') ? $cssData['search_icon_size_number'] : 12; ?>" class="afaq-6310-form-input" step="1" id="search_icon_size_number" />
            </td>
          </tr>
           <tr>
            <td><b>Icon Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
            <td>
              <input type="text" name="search_icon_color" id="search_icon_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" value="<?php echo (isset($cssData['search_icon_color']) && $cssData['search_icon_color'] !== '') ? $cssData['search_icon_color'] : '#171717'; ?>">
            </td>
          </tr>
          <tr>
            <td><b>Icon Hover Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
            <td>
              <input type="text" name="search_icon_hover_color" id="search_icon_hover_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" value="<?php echo (isset($cssData['search_icon_hover_color']) && $cssData['search_icon_hover_color'] !== '') ? $cssData['search_icon_hover_color'] : '#806000'; ?>">
            </td>
          </tr>
          <tr>
            <td><b>Background Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
            <td>
              <input type="text" name="search_background_color" id="search_background_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" data-opacity='1' value="<?php echo (isset($cssData['search_background_color']) && $cssData['search_background_color'] !== '') ? $cssData['search_background_color'] : 'rgba(255, 255, 255, 1)'; ?>">
            </td>
          </tr>         
          <tr>
            <td><b>Border Width</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
            <td>
              <input type="number" min="0" name="search_border_width_number" value="<?php echo (isset($cssData['search_border_width_number']) && $cssData['search_border_width_number'] !== '') ? $cssData['search_border_width_number'] : 1; ?>" class="afaq-6310-form-input" step="1" id="search_border_width_number" />
            </td>
          </tr>
          <tr>
            <td><b> Border Radious</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
            <td>
              <input type="number" name="search_border_radious_number" value="<?php echo (isset($cssData['search_border_radious_number']) && $cssData['search_border_radious_number']  !== '') ? $cssData['search_border_radious_number'] : 23; ?>" class="afaq-6310-form-input" id="search_border_radious_number" />
            </td>
          </tr>
          <tr>
            <td><b> Border Color</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span></td>
            <td>
              <input type="text" name="search_border_color" id="search_border_color" class="afaq-6310-form-input afaq_6310_color_picker" data-format="rgb" value="<?php echo (isset($cssData['search_border_color']) && $cssData['search_border_color'] !== '') ? $cssData['search_border_color'] : '#330000'; ?>">
            </td>
          </tr>

        </table>
      </div>

    </div>
  </div>
</div>


<div id="afaq-6310-search-modal" class="afaq-6310-modal" style="display: none">
  <div class="afaq-6310-modal-content afaq-6310-modal-md">
    <form action="" method="post">
      <div class="afaq-6310-modal-header">
        Choose Template
        <div class="afaq-6310-close">&times;</div>
      </div>
      <div class="afaq-6310-modal-body-form">
        <div class="select-template">
          <div class="m-30-60">
            <div class="afaq-6310-search-template-preview">
              <div class="afaq-6310-search-template-preview-main">
                <input type="text" placeholder="enter your keyword" class="afaq-6310-search-template-input">
                <div class="afaq-6310-search-template-button"><i class="fas fa-search"></i></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="afaq-6310-modal-form-footer">
        <button type="button" name="close" class="afaq-6310-btn-danger afaq-6310-pull-right">Close</button>
      </div>
    </form>
    <br class="afaq-6310-clear" />
  </div>
</div>

<style>
  .afaq-6310-faq-template-<?php echo $ids; ?>-content img{
    max-width: 100% !important;
    height: auto;
  }
  .afaq-6310-faq-for-elementor-<?php echo $ids; ?> .afaq-6310-search-template {
    float: left;
    width: 100%;
    display: flex;
    margin-top: 5px;
    margin-bottom: 5px;
    justify-content: <?php echo $cssData['search_box_align'] ?>;
  }

  .afaq-6310-faq-for-elementor-<?php echo $ids; ?> .afaq-6310-search-template-main {
    float: left;
    width: <?php echo $cssData['search_width'] ?>%;
    border-radius: <?php echo (isset($cssData['search_border_radious_number']) && $cssData['search_border_radious_number']  !== '') ? $cssData['search_border_radious_number'] : 23; ?>px;
    overflow: hidden;
    border: <?php echo (isset($cssData['search_border_width_number']) && $cssData['search_border_width_number'] !== '') ? $cssData['search_border_width_number'] : 1; ?>px solid <?php echo (isset($cssData['search_border_color']) && $cssData['search_border_color'] !== '') ? $cssData['search_border_color'] : ''; ?> !important;
    background: <?php echo (isset($cssData['search_background_color']) && $cssData['search_background_color'] !== '') ? $cssData['search_background_color'] : 'rgba(255, 255, 255, 1)'; ?>;  
    margin-bottom: 5px;
  }

  .afaq-6310-faq-for-elementor-<?php echo $ids; ?> .afaq-6310-search-template-main .afaq-6310-search-template-input {
    float: left !important;
    outline: none !important;
    margin: 0 !important;
    width: calc(100% - <?php echo $cssData['search_box_height_number'] ?>px);
    line-height: <?php echo (isset($cssData['search_box_height_number']) && $cssData['search_box_height_number'] !== '') ? $cssData['search_box_height_number'] : 30  ?>px !important;
    min-height: <?php echo (isset($cssData['search_box_height_number']) && $cssData['search_box_height_number'] !== '') ? $cssData['search_box_height_number'] : 30  ?>px !important;
    font-size: <?php echo (isset($cssData['search_font_size_number']) && $cssData['search_font_size_number'] !== '') ? $cssData['search_font_size_number'] : 12 ?>px;
    border: none;
    background: <?php echo (isset($cssData['search_background_color']) && $cssData['search_background_color'] !== '') ? $cssData['search_background_color'] : 'rgba(255, 255, 255, 1)'; ?>;
    border-right: none !important;
    font-family: <?php echo str_replace("+", " ", $cssData['searce_font_family']); ?>;
  }

  .afaq-6310-faq-for-elementor-<?php echo $ids; ?> .afaq-6310-search-template-main .afaq-6310-search-template-input:focus,
  .afaq-6310-faq-for-elementor-<?php echo $ids; ?> .afaq-6310-search-template-main .afaq-6310-search-template-input:active {
    outline: none !important;
    box-shadow: 0 0 0 0 #FFF !important;
    border-right: none !important;
  }

  .afaq-6310-faq-for-elementor-<?php echo $ids; ?> .afaq-6310-search-template-main .afaq-6310-search-template-button {
    float: left;
    width: <?php echo (isset($cssData['search_box_height_number']) && $cssData['search_box_height_number'] !== '') ? $cssData['search_box_height_number'] : 30  ?>px !important;
    height: <?php echo (isset($cssData['search_box_height_number']) && $cssData['search_box_height_number'] !== '') ? $cssData['search_box_height_number'] : 30  ?>px !important;
    line-height: <?php echo (isset($cssData['search_box_height_number']) && $cssData['search_box_height_number'] !== '') ? $cssData['search_box_height_number'] : 30  ?>px !important;

    border-left: none !important;
    text-align: left;
    cursor: pointer;
    color: <?php echo (isset($cssData['search_icon_color']) && $cssData['search_icon_color'] !== '') ? $cssData['search_icon_color'] : '#171717'; ?>;
    font-size: <?php echo (isset($cssData['search_icon_size_number']) && $cssData['search_icon_size_number']  !== '') ? $cssData['search_icon_size_number'] : 12; ?>px;
    background: <?php echo (isset($cssData['search_background_color']) && $cssData['search_background_color'] !== '') ? $cssData['search_background_color'] : 'rgba(255, 255, 255, 1)'; ?>;
  }

  .afaq-6310-faq-for-elementor-<?php echo $ids; ?> .afaq-6310-search-template-main .afaq-6310-search-template-button:hover {
    color: <?php echo (isset($cssData['search_icon_hover_color']) && $cssData['search_icon_hover_color'] !== '') ? $cssData['search_icon_hover_color'] : '#171717'; ?>;
  }

  @media only screen and (max-width: 600px) {
    .afaq-6310-faq-for-elementor-<?php echo $ids; ?> .afaq-6310-search-template-main {
      width: 100%;
    }
  }
</style>

<script>
  jQuery(document).ready(function() {
    jQuery("body").on("change", "#search_template_show_hide", function() {
      if (jQuery(this).prop('checked') == true) {
        jQuery('.search_template_show_hide_div').show();
      } else {
        jQuery('.search_template_show_hide_div').hide();
        jQuery(".afaq-6310-search-template-main input").val('');
      }
    });

    <?php
    if (isset($cssData['search_template_show_hide']) && $cssData['search_template_show_hide']) {
      echo "jQuery('.search_template_show_hide_div').show();";
    } else {
      echo "jQuery('.search_template_show_hide_div').hide();";
    }

    if (isset($cssData['selected_search_template']) && $cssData['selected_search_template']) {
      echo "jQuery('.{$cssData['selected_search_template']}').show();";
    }
    ?>
  });

  jQuery(document).ready(function() {
    jQuery("body").on('keyup', '#place_holder_text', function() {
      var place_holder_text = jQuery(this).val();
      jQuery('.afaq-6310-faq-filter').attr('placeholder', place_holder_text);
    });

    jQuery(`
      #place_holder_text,
      #search_box_align,
      #search_width,
      #search_box_height_number,
      #search_font_size_number,
      #search_border_width_number,
      #search_icon_size_number,
      #search_icon_color,
      #search_icon_hover_color,
      #search_border_radious_number,
      #search_border_color,
      #search_background_color,
      #searce_font_family
`).on('change', function() {
      var search_box_align = jQuery('#search_box_align').val();
      var search_width = jQuery('#search_width').val();
      var search_box_height_number = jQuery('#search_box_height_number').val();
      var search_font_size_number = jQuery('#search_font_size_number').val();
      var search_border_width_number = jQuery('#search_border_width_number').val();
      var search_icon_size_number = jQuery('#search_icon_size_number').val();
      var search_icon_color = jQuery('#search_icon_color').val();
      var search_icon_hover_color = jQuery('#search_icon_hover_color').val();
      var search_border_radious_number = jQuery('#search_border_radious_number').val();
      var search_border_color = jQuery('#search_border_color').val();
      var search_background_color = jQuery('#search_background_color').val();
      var searce_font_family = jQuery('#searce_font_family').val();

      jQuery(`<style type='text/css'>.afaq-6310-faq-for-elementor-<?php echo $ids; ?> .afaq-6310-search-template {
   			justify-content: ${search_box_align};
   		}</style>`).appendTo(".afaq-6310-preview");

      jQuery(`<style type='text/css'>	  .afaq-6310-faq-for-elementor-<?php echo $ids; ?> .afaq-6310-search-template-main {  
        width: ${search_width}%;   
        border-radius: ${search_border_radious_number}px; 
        border: ${search_border_width_number}px solid ${search_border_color} !important;
        background:${search_background_color} !important;    
      }</style>`).appendTo(".afaq-6310-preview");

      jQuery(`<style type='text/css'>.afaq-6310-faq-for-elementor-<?php echo $ids; ?> .afaq-6310-search-template-main .afaq-6310-search-template-input {  
        width: calc(100% - ${search_box_height_number}px);   		
        line-height: ${search_box_height_number}px !important;
        min-height: ${search_box_height_number}px !important;
        font-size: ${search_font_size_number}px;   	
        background:${search_background_color} !important;
        font-family: ${searce_font_family};
        border-right: none !important;    
   		}</style>`).appendTo(".afaq-6310-preview");

      jQuery(`<style type='text/css'>.afaq-6310-faq-for-elementor-<?php echo $ids; ?> .afaq-6310-search-template-main .afaq-6310-search-template-button {   
   			width: ${search_box_height_number}px !important;
   			height: ${search_box_height_number}px !important;
   			line-height: ${search_box_height_number}px !important;
   			color: ${search_icon_color};
   			font-size: ${search_icon_size_number}px;
        background:${search_background_color} !important;
        border-left: none !important;
   		}</style>`).appendTo(".afaq-6310-preview");

      jQuery(`<style type='text/css'>.afaq-6310-faq-for-elementor-<?php echo $ids; ?> .afaq-6310-search-template-main .afaq-6310-search-template-button:hover {
   			color: ${search_icon_hover_color};
   		}</style>`).appendTo(".afaq-6310-preview");
      jQuery(`<style type='text/css'></style>`).appendTo(".afaq-6310-preview");
    });
  });
</script>