<div id="tab-6">
  <div class="row afaq_6310_padding_15_px">
    <h3 class="afaq-6310-tab-menu-settings">Category Settings</h3>
    <div class="afaq-6310-tab-6">
      <table class="table table-responsive afaq_6310_admin_table">
        <tr height="60px">
          <td>
            <b>Category Show/Hide</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
          </td>
          <td>
            <label class="switch">
              <input type="checkbox" <?php echo esc_attr((isset($cssData['category_template_show_hide']) && $cssData['category_template_show_hide']) ? ' checked' : '') ?> name="category_template_show_hide" value="1" id="category_template_show_hide">
              <span class="slider round category_template_show_hide"></span>
            </label>
          </td>
        </tr>
        <tr class="category_template_show_hide_div">
          <td>
            <b>Default Category Active/Inactive</b>
                  <span class="afaq-6310-pro">(Pro) <div class='afaq-6310-pro-text'>This feature is available on the pro version only. You can view changes in the admin panel, not in the output.</div></span>
          </td>
          <td>
            <label class="switch">
              <input type="checkbox" <?php echo esc_attr((isset($cssData['activate_default_category']) && $cssData['activate_default_category']) ? ' checked' : '') ?> name="activate_default_category" value="1" id="activate_default_category">
              <span class="slider round activate_default_category"></span>
            </label>
          </td>
        </tr>
      </table>
    </div>
    <div class="afaq-6310-tab-6 category_template_show_hide_div">
      <input type="hidden" name="selected_category_template" id="selected_category_template">
      <?php
      $category_template = 'Template-01';
      if (isset($cssData['selected_category_template']) && $cssData['selected_category_template']) {
        $category_template = ucwords(substr($cssData['selected_category_template'], -11));
      }
      ?>
      <div class="afaq-selected-template">You have selected: <span class="category-template-number"><?php echo esc_attr($category_template )?></span></div>
      <button class="afaq-6310-btn-primary" id="afaq-6310-category-template">Change Template</button>

      <div class="afaq-6310-category-template">
        <!-- <img src="<?php echo afaq_6310_plugin_dir_url  . 'assets/image/template-01.png';  ?>" /> -->
      </div>
    </div>
    <div style="height: 1px; width: 100%; background: #ccc; float: left"></div>

    <div class="category_template_show_hide_div">
      <?php
        include afaq_6310_plugin_url . "settings/form/category/_template-01.php";
        include afaq_6310_plugin_url . "settings/form/category/_template-02.php";
        include afaq_6310_plugin_url . "settings/form/category/_template-03.php";  
      ?>

      
    </div>
  </div>
</div>

<div id="afaq-6310-category-modal" class="afaq-6310-modal" style="display: none">
  <div class="afaq-6310-modal-content afaq-6310-modal-md">
    <form action="" method="post">
      <div class="afaq-6310-modal-header">
        Choose Template
        <div class="afaq-6310-close">&times;</div>
      </div>
      <div class="afaq-6310-modal-body-form">
      <?php
        include afaq_6310_plugin_url . "settings/form/category/_template-modal-01.php";
        include afaq_6310_plugin_url . "settings/form/category/_template-modal-02.php";
        include afaq_6310_plugin_url . "settings/form/category/_template-modal-03.php";
      ?>

      </div>
      <div class="afaq-6310-modal-form-footer">
        <button type="button" name="close" class="afaq-6310-btn-danger afaq-6310-pull-right">Close</button>
      </div>
    </form>
    <br class="afaq-6310-clear" />
  </div>
</div>

<script>
  jQuery(document).ready(function() {
    let faqMode = Number(jQuery(`#afaq_faq_mode`).val());
    let enableCollapsible = (jQuery('#enable_show_hide').prop('checked') == true) ? true : false;

    jQuery('body').on('click', '.active-category-template > div > div', function(){
      let catId = jQuery('.afaq-6310-faq-for-elementor').attr('data-category-template');
      let ids = jQuery('.afaq-6310-faq-for-elementor').attr('data-database-id');
      let iconClass = jQuery(`.afaq-6310-faq-for-elementor-${ids}`).attr('data-icon-class');
      let upArrow = jQuery(`.afaq-6310-faq-for-elementor-${ids}`).attr('data-up-arrow');
      let downArrow = jQuery(`.afaq-6310-faq-for-elementor-${ids}`).attr('data-down-arrow');
      let categoryTemId = jQuery(`.afaq-6310-faq-for-elementor-${ids}`).attr('data-category-template');

      jQuery(`.${iconClass} i`).attr('class', downArrow);
      jQuery(`.afaq-6310-category-template-${catId}-wrapper`).removeClass('afaq-6310-category-wrapper-active');
      jQuery(this).addClass('afaq-6310-category-wrapper-active');
      let className = jQuery(this).attr('data-category-class-name');
      jQuery(`.afaq-6310-faq-template-${ids}`).hide();

      //Folded and Collapsible Start
      let categoryClassName = jQuery(this).attr('data-category-class-name');
      if(jQuery(`#category_template_show_hide`).prop('checked') == true && jQuery(`#activate_default_category`).prop('checked') == true){
          jQuery(`.${iconClass} i`).attr('class', downArrow);
      } else if(jQuery(`#category_template_show_hide`).prop('checked') == true && jQuery(`#activate_default_category`).prop('checked') == false) {
        jQuery(`.afaq-6310-faq-template-${ids}`).hide();
        jQuery(`.${iconClass} i`).attr('class', downArrow);
      } 

      //FAQ Mode
      if(faqMode == 1){
        jQuery(`.afaq-6310-faq-template-${ids}-label-head`).removeClass(`afaq-6310-faq-template-${ids}-active`);
        jQuery(`.${iconClass} i`).attr('class', downArrow);
        jQuery(`.afaq-6310-faq-template-${ids}-content`).hide();
        //Setting tabs
        jQuery(`.${categoryClassName}:first .afaq-6310-faq-template-${ids}-label-head`).addClass(`afaq-6310-faq-template-${ids}-active`);
        jQuery(`.${categoryClassName}:first .${iconClass} i`).attr('class', upArrow);
        jQuery(`.${categoryClassName}:first .afaq-6310-faq-template-${ids}-content`).show();
      } 
      else if(faqMode == 2){
        jQuery(`.${categoryClassName} .afaq-6310-faq-template-${ids}-label-head`).addClass(`afaq-6310-faq-template-${ids}-active`);
        jQuery(`.${categoryClassName} .${iconClass} i`).attr('class', upArrow);
        jQuery(`.${categoryClassName} .afaq-6310-faq-template-${ids}-content`).show();
      } 
      else if(faqMode == 3){
        jQuery(`.afaq-6310-faq-template-${ids}-label-head`).removeClass(`afaq-6310-faq-template-${ids}-active`);
        jQuery(`.${iconClass} i`).attr('class', downArrow);
        jQuery(`.afaq-6310-faq-template-${ids}-content`).hide();
      }
      //Folded and Collapsible End

      jQuery(`.${className}`).show();
      jQuery('.active-search-template input').val('');
      dynamicCSS();
    });

    jQuery('body').on('click', '.select-this-category-template', function(event) {
      var ids = jQuery(this).attr('id');
      jQuery("#selected_category_template").val(ids);
      jQuery("#afaq-6310-category-modal").fadeOut(500);
      jQuery("body").css({
        "overflow": "initial"
      });
      jQuery(".category-template-01, .category-template-02, .category-template-03").hide();

      let categoryContent = wpm_6310_active_category_template(ids, "<?php echo $ids ?>", 'search');
      jQuery(".active-category-template").html(categoryContent);

      jQuery(".afaq-6310-faq-for-elementor").attr('data-category-template', ids.slice(-2));

      jQuery("." + ids).show();
      ids = (ids.substr(9) + '').replace(/^([a-z])|\s+([a-z])/g, function($1) {
        return $1.toUpperCase();
      });
      jQuery(".category-template-number").text(ids);
    });

    jQuery('body').on('click', '#afaq-6310-category-template', function(event) {
      jQuery("#afaq-6310-category-modal").fadeIn(500);
      jQuery("body").css({
        "overflow": "hidden"
      });
      return false;
    });

    jQuery("body").on("click", ".afaq-6310-close, .afaq-6310-btn-danger", function() {
      jQuery("#afaq-6310-category-modal").fadeOut(500);
      jQuery("body").css({
        "overflow": "initial"
      });
    });

    jQuery(window).click(function(event) {
      if (event.target == document.getElementById('afaq-6310-category-modal')) {
        jQuery("#afaq-6310-category-modal").fadeOut(500);
        jQuery("body").css({
          "overflow": "initial"
        });
      }
    });

    jQuery("body").on("change", "#activate_default_category", function() {
      let catId = (jQuery('.category-template-number').text()).slice(-2);
      let ids = jQuery('.afaq-6310-faq-for-elementor').attr('data-database-id');
      if (jQuery(this).prop('checked') == true) {
        jQuery(".afaq-6310-faq-for-elementor").attr('data-category-template', catId);
        jQuery(`.afaq-6310-category-template-${catId} .afaq-6310-category-template-${catId}-wrapper:first`).addClass('afaq-6310-category-wrapper-active');
        jQuery(`.afaq-6310-category-template-${catId} .afaq-6310-category-template-${catId}-wrapper:first`).trigger('click');
      } else {
        jQuery(".afaq-6310-faq-for-elementor").attr('data-category-template', '01');
        jQuery(`.afaq-6310-category-template-${catId} .afaq-6310-category-template-${catId}-wrapper`).removeClass('afaq-6310-category-wrapper-active');
        jQuery(`.afaq-6310-faq-template-${ids}`).hide();
      }
    });

    jQuery("body").on("change", "#category_template_show_hide", function() {
      let ids = jQuery('.afaq-6310-faq-for-elementor').attr('data-database-id');
      if (jQuery(this).prop('checked') == true) {
        jQuery('.category_template_show_hide_div, .active-category-template').show();
        jQuery(".afaq-6310-faq-for-elementor").attr('data-category-active', 1);
      } else {
        jQuery('.category_template_show_hide_div, .active-category-template').hide();
        jQuery(".afaq-6310-faq-for-elementor").attr('data-category-active', 0);
        if(jQuery(`#activate_default_category`).prop('checked') == false) {
          jQuery(`.afaq-6310-faq-template-${ids}`).hide();
        }
        else{
          jQuery(`.afaq-6310-faq-template-${ids}`).show();
        }
        let afaq_faq_mode = Number(jQuery('#afaq_faq_mode').val());
        if(afaq_faq_mode == 2) {
          let upArrow = jQuery(`.afaq-6310-faq-for-elementor-${ids}`).attr('data-up-arrow');
          let downArrow = jQuery(`.afaq-6310-faq-for-elementor-${ids}`).attr('data-down-arrow');
          let iconClass = jQuery(`.afaq-6310-faq-for-elementor-${ids}`).attr('data-icon-class');
          jQuery(`.afaq-6310-faq-template-${ids}-label-head`).addClass(`afaq-6310-faq-template-${ids}-active`);
          jQuery(`.afaq-6310-faq-template-${ids}-content`).show();
          jQuery(`.afaq-6310-faq-template-${ids}-label-head`).find(`.${iconClass} i`).attr('class', upArrow);
        }
        dynamicCSS();
      }
    });

    <?php

    if (isset($cssData['category_template_show_hide']) && $cssData['category_template_show_hide']) {
      echo "jQuery('.category_template_show_hide_div').show();";
    } else {
      echo "jQuery('.category_template_show_hide_div').hide();";
    }

    if(!isset($cssData['activate_default_category']) || $cssData['activate_default_category'] == 0){
      echo "jQuery('.afaq-6310-faq-template-{$ids}').hide();";
    }

    echo "jQuery('.category-template-01, .category-template-02, .category-template-03').hide();";
    if (isset($cssData['selected_category_template']) && $cssData['selected_category_template']) {
      echo "jQuery('.{$cssData['selected_category_template']}').show();";
    }
    else{
      echo "jQuery('.category-template-01, .afaq-6310-faq-template-{$ids}').show();";
    }
   
    if(!(isset($cssData['category_template_show_hide']) && $cssData['category_template_show_hide'] > 0)){
      echo "jQuery('.active-category-template').hide();";
    }
    
    ?>
  });

  function wpm_6310_active_category_template(selected_category_template, ids, placeholder) {
    if (selected_category_template != '') {
      if (selected_category_template == 'category-template-01') {
         return `<div class='afaq-6310-category-template-01'>
           <div class='afaq-6310-category-template-01-wrapper'>
             <div class='afaq-6310-category-template-01-left-icon'><i class='fas fa-user-cog'></i></div>
             <div class='afaq-6310-category-template-01-content-wrapper'>
               <div class='afaq-6310-category-template-01-title'> My Account</div>
               <div class='afaq-6310-category-template-01-description'>How to manage your account and it's features.</div>
             </div>
           </div>
           <div class='afaq-6310-category-template-01-wrapper'>
             <div class='afaq-6310-category-template-01-left-icon'><i class='fas fa-rocket'></i></div>
             <div class='afaq-6310-category-template-01-content-wrapper'>
               <div class='afaq-6310-category-template-01-title'> Getting Started</div>
               <div class='afaq-6310-category-template-01-description'>Articles to get you up and running, quick and easy.</div>
             </div>
           </div>
           <div class='afaq-6310-category-template-01-wrapper'>
             <div class='afaq-6310-category-template-01-left-icon'><i class='fas fa-receipt'></i></div>
             <div class='afaq-6310-category-template-01-content-wrapper'>
               <div class='afaq-6310-category-template-01-title'> Billing & Payments</div>
               <div class='afaq-6310-category-template-01-description'>Information about how we charge you for our services.</div>
             </div>
           </div>
           <div class='afaq-6310-category-template-01-wrapper'>
             <div class='afaq-6310-category-template-01-left-icon'><i class='fas fa-mobile-alt'></i></div>
             <div class='afaq-6310-category-template-01-content-wrapper'>
               <div class='afaq-6310-category-template-01-title'> Mobile App</div>
               <div class='afaq-6310-category-template-01-description'>Documentation and troubleshooting our mobile app.</div>
             </div>
           </div>
         </div>`;
      } else if (selected_category_template == 'category-template-02') {
         return `     
         <div class='afaq-6310-faq-category-table'>
           <div class='afaq-6310-faq-category-col'>
             <div class='afaq-6310-faq-category-template-02'>
               <div class='afaq-6310-faq-category-template-02-icon'><i class='fas fa-mobile-alt'></i></div>
               <div class='afaq-6310-faq-category-template-02-title'>Mobile phone</div>
             </div>
           </div>
     
           <div class='afaq-6310-faq-category-col'>
             <div class='afaq-6310-faq-category-template-02'>
               <div class='afaq-6310-faq-category-template-02-icon'><i class='fas fa-camera'></i></div>
               <div class='afaq-6310-faq-category-template-02-title'>camera</div>
             </div>
           </div>
     
           <div class='afaq-6310-faq-category-col'>
             <div class='afaq-6310-faq-category-template-02'>
               <div class='afaq-6310-faq-category-template-02-icon'><i class='fas fa-tv'></i></div>
               <div class='afaq-6310-faq-category-template-02-title'>Television</div>
             </div>
           </div>
           <div class='afaq-6310-faq-category-col'>
             <div class='afaq-6310-faq-category-template-02'>
               <div class='afaq-6310-faq-category-template-02-icon'><i class='fas fa-tv'></i></div>
               <div class='afaq-6310-faq-category-template-02-title'>Television</div>
             </div>
           </div>
         </div>`;
      }
      else if (selected_category_template == 'category-template-03') {
         return `<div class='afaq-6310-faq-category-table'>
           <div class='afaq-6310-faq-category-col'>
             <div class='afaq-6310-faq-category-template-03'>
               <div class='afaq-6310-faq-category-template-03-icon'>
                 <i class='fas fa-american-sign-language-interpreting'></i>
               </div>
               <div class='afaq-6310-faq-category-template-03-title'>
                 Mobile phone
               </div>
             </div>
           </div>
           <div class='afaq-6310-faq-category-col'>
             <div class='afaq-6310-faq-category-template-03'>
               <div class='afaq-6310-faq-category-template-03-icon'>
                 <i class='fas fa-mobile-alt'></i>
               </div>
               <div class='afaq-6310-faq-category-template-03-title'>
                 Mobile phone
               </div>
             </div>
           </div>
           <div class='afaq-6310-faq-category-col'>
             <div class='afaq-6310-faq-category-template-03'>
               <div class='afaq-6310-faq-category-template-03-icon'>
                 <i class='fas fa-air-freshener'></i>
               </div>
               <div class='afaq-6310-faq-category-template-03-title'>
                 AC
               </div>
             </div>
           </div>
           <div class='afaq-6310-faq-category-col'>
             <div class='afaq-6310-faq-category-template-03'>
               <div class='afaq-6310-faq-category-template-03-icon'>
                 <i class='fas fa-mobile-alt'></i>
               </div>
               <div class='afaq-6310-faq-category-template-03-title'>
                 TV
               </div>
             </div>
           </div>
         </div>`;
      }
   } else {
    return `
    <div class='afaq-6310-category-template-01'>
           <div class='afaq-6310-category-template-01-wrapper'>
             <div class='afaq-6310-category-template-01-left-icon'><i class='fas fa-user-cog'></i></div>
             <div class='afaq-6310-category-template-01-content-wrapper'>
               <div class='afaq-6310-category-template-01-title'> My Account</div>
               <div class='afaq-6310-category-template-01-description'>How to manage your account and it's features.</div>
             </div>
           </div>
           <div class='afaq-6310-category-template-01-wrapper'>
             <div class='afaq-6310-category-template-01-left-icon'><i class='fas fa-rocket'></i></div>
             <div class='afaq-6310-category-template-01-content-wrapper'>
               <div class='afaq-6310-category-template-01-title'> Getting Started</div>
               <div class='afaq-6310-category-template-01-description'>Articles to get you up and running, quick and easy.</div>
             </div>
           </div>
           <div class='afaq-6310-category-template-01-wrapper'>
             <div class='afaq-6310-category-template-01-left-icon'><i class='fas fa-receipt'></i></div>
             <div class='afaq-6310-category-template-01-content-wrapper'>
               <div class='afaq-6310-category-template-01-title'> Billing & Payments</div>
               <div class='afaq-6310-category-template-01-description'>Information about how we charge you for our services.</div>
             </div>
           </div>
           <div class='afaq-6310-category-template-01-wrapper'>
             <div class='afaq-6310-category-template-01-left-icon'><i class='fas fa-mobile-alt'></i></div>
             <div class='afaq-6310-category-template-01-content-wrapper'>
               <div class='afaq-6310-category-template-01-title'> Mobile App</div>
               <div class='afaq-6310-category-template-01-description'>Documentation and troubleshooting our mobile app.</div>
             </div>
           </div>
         </div>
    `;
   }
  }
</script>