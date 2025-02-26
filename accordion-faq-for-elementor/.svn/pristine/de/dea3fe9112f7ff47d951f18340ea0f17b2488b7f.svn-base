<!-- Modal for Activate Icon -->
<div id="afaq_6310_faq_icon" class="afaq-6310-modal" style="display: none">
   <div class="afaq-6310-modal-content afaq-6310-modal-xl">
      <form action="" method="post">
         <?php wp_nonce_field("afaq-6310-nonce-update-icon-order") ?>

         <input type="hidden" name="rearrange_list" id="rearrange_list" value="" />
         <div class="afaq-6310-modal-header">
            <span style="float: left; margin-right: 15px; color: #444;">Choose your Icon</span>
            <input type="text" id="icon-filter" class="afaq-6310-form-input-sm" placeholder="Search Icon" />
            <span class="afaq-6310-icon-close" style="float: right;">&times;</span>
         </div>
         <div class="afaq-6310-modal-body-form">
            <ul class="afaq-6310-choose-icon">
               <?php
               echo afaq_6310_fa_icon_list('li', '</li>');
               ?>
            </ul>
         </div>
         <div class="afaq-6310-modal-form-footer">
            <button type="button" name="close" id="afaq-6310-font-icon-close" class="afaq-6310-btn-danger afaq-6310-pull-right">Close</button>
         </div>
      </form>
      <br class="afaq-6310-clear" />
   </div>
</div>

<script>
  jQuery(document).ready(function() {
    let ids = jQuery(`.afaq-6310-faq-for-elementor`).attr('data-database-id');
    let iconClass = jQuery(`.afaq-6310-faq-for-elementor-${ids}`).attr('data-icon-class');
    let upArrow = jQuery(`.afaq-6310-faq-for-elementor-${ids}`).attr('data-up-arrow');
    let downArrow = jQuery(`.afaq-6310-faq-for-elementor-${ids}`).attr('data-down-arrow');
    let searchShowHide = Number(jQuery(`.afaq-6310-faq-for-elementor-${ids}`).attr('data-search-template-show-hide-id'));
    let categoryTemId = jQuery(`.afaq-6310-faq-for-elementor-${ids}`).attr('data-category-template');
    let faqMode = Number(jQuery(`#afaq_faq_mode`).val());
    let enableCollapsible = (jQuery('#enable_show_hide').prop('checked') == true) ? true : false;

    if(!searchShowHide || searchShowHide == 0){
      jQuery(`.afaq-6310-search-template-number-${ids}`).hide();
    }

    if(Number(jQuery('#afaq_faq_mode').val()) == 2){
      jQuery('.enable-collapsable').hide();
    }
    jQuery('body').on('change', '#afaq_faq_mode', function(){
      alert('It will not work on live preview. You need to save it to check the results.');
      if(Number(jQuery(this).val()) == 2){
        jQuery('.enable-collapsable').fadeOut(300);
      }
      else{
        jQuery('.enable-collapsable').fadeIn(300);
      }
    });

    // Button Show/Hide Start
    //Read more button default load
    if (jQuery(`#template_button`).prop('checked') == true) {
      jQuery(`.button-act-field, .afaq-6310-faq-template-${ids}-read-more-button`).show();
    } else {
      jQuery(`.button-act-field, .afaq-6310-faq-template-${ids}-read-more-button`).hide();
    }
    jQuery(`body`).on('click', '#template_button', function() {
      if (jQuery(`#template_button`).prop('checked') == true) {
        jQuery(`.button-act-field, .afaq-6310-faq-template-${ids}-read-more-button`).show();
      } else {
        jQuery(`.button-act-field, .afaq-6310-faq-template-${ids}-read-more-button`).hide();
      }
    });
    // Button Show/Hide End

    //Select font family
    jQuery(`#title_font_family, #description_font_family, #button_font_family, #searce_font_family, #category_01_title_font_family, #category_01_description_font_family`).fontselect();

    //Load default indicator
    jQuery(`.afaq-6310-faq-template-${ids}-active .${iconClass} i`).attr('class', upArrow);

    // Load Icon Selector Start
    var dataId = '';
    jQuery("#icon-filter").on("keyup", function() {
      var value = jQuery(this).val().toLowerCase();
      jQuery(".afaq-6310-choose-icon li").filter(function() {
        jQuery(this).toggle(jQuery(this).attr(`data-icon-name`).toLowerCase().indexOf(value) > -1);
      });
    });

    jQuery("body").on("click", "#afaq-6310-font-icon-close, .afaq-6310-icon-close", function() {
      jQuery("#afaq_6310_faq_icon").fadeOut(500);
      jQuery("body").css({
        "overflow": "auto"
      });
    });

    jQuery(window).click(function(event) {
      if (event.target == document.getElementById('afaq_6310_faq_icon')) {
        jQuery("#afaq_6310_faq_icon").fadeOut(500);
        jQuery("body").css({
          "overflow": "auto"
        });
      }
    });

    jQuery("body").on("click", ".afaq-6310-plus-icon", function() {
      if (jQuery(`#icon-filter`).val()) {
        jQuery(`#icon-filter`).val('');
        jQuery(".afaq-6310-choose-icon li").filter(function() {
          jQuery(this).toggle();
        });
      }
      dataId = jQuery(this).attr('data-id')
      jQuery("#afaq_6310_faq_icon").fadeIn(500);
      jQuery("body").css({
        "overflow": "hidden"
      });
      jQuery(`#icon-filter`).focus();
      return false;
    });

    jQuery("body").on("click", "ul.afaq-6310-choose-icon li", function() {
      let cls = jQuery(this).find(`i`).attr('class');
      if (dataId == 'title_inactive_icon') {
        var classList = jQuery(`.afaq-6310-faq-template-${ids}-label-head`);
        classList.each(function() {
          if (!jQuery(this).hasClass(`afaq-6310-faq-template-${ids}-active`)) {
            jQuery(this).find(`.${iconClass} i`).attr('class', cls);
          }
        });
        jQuery(`.afaq-6310-faq-for-elementor-${ids}`).attr('data-down-arrow', cls);
      } else if (dataId == 'title_active_icon') {
        jQuery(`.afaq-6310-faq-template-${ids}-active .${iconClass} i`).attr('class', cls);
        jQuery(`.afaq-6310-faq-for-elementor-${ids}`).attr('data-up-arrow', cls);
      }
      jQuery(`#${dataId}`).val(cls);
      jQuery("#afaq_6310_faq_icon").fadeOut(500);
      jQuery("body").css({
        "overflow": "auto"
      });
    });
    // Load Icon Selector End

    //FAQ Active/Inactive State
    var content = jQuery(`.afaq-6310-faq-template-${ids}-content`).hide();
    jQuery(`.afaq-6310-faq-template-${ids}-content:first`).show();
    var animation_duration = <?php echo $cssData['animation_duration']; ?>;
    jQuery(`body`).on('change', '#animation_duration', function(){
      animation_duration = jQuery(this).val();
    });
    jQuery(`body`).on('click', `.afaq-6310-faq-template-${ids}-label-head`, function() {
      upArrow = jQuery(`.afaq-6310-faq-for-elementor-${ids}`).attr('data-up-arrow');
      downArrow = jQuery(`.afaq-6310-faq-for-elementor-${ids}`).attr('data-down-arrow');  

      if(faqMode != 2 && !enableCollapsible){
        content.slideUp(animation_duration * 1000);
      }
      if (jQuery(this).hasClass(`afaq-6310-faq-template-${ids}-active`)) {
        jQuery(this).removeClass(`afaq-6310-faq-template-${ids}-active`);
        jQuery(this).find(`.${iconClass} i`).attr('class', downArrow);
        if(faqMode == 2){
          jQuery(this).siblings(`.afaq-6310-faq-template-${ids}-content`).slideUp(animation_duration * 1000);
        }
        else if(enableCollapsible) {
          jQuery(this).siblings(`.afaq-6310-faq-template-${ids}-content`).slideUp(animation_duration * 1000);
        }
      } else {
        if(faqMode != 2 && !enableCollapsible){
          jQuery(`.${iconClass} i`).attr('class', downArrow);
          jQuery(`.afaq-6310-faq-template-${ids}-label-head`).removeClass(`afaq-6310-faq-template-${ids}-active`);
        }
        jQuery(this).addClass(`afaq-6310-faq-template-${ids}-active`)
        jQuery(this).next().slideDown(animation_duration * 1000);
        jQuery(this).find(`.${iconClass} i`).attr('class', upArrow);
      }
    });

    //Filter FAQ of search section
    let categoryClassName = '';
    if(jQuery(`#category_template_show_hide`).prop('checked') == true && jQuery(`#activate_default_category`).prop('checked') == true){
        let selectedCatClass =  jQuery(`.afaq-6310-category-template-${categoryTemId}-wrapper:first`).attr('data-category-class-name');
        jQuery(`.afaq-6310-faq-template-${ids}:not(.${selectedCatClass})`).hide();
        jQuery(`.${iconClass} i`).attr('class', downArrow);
        categoryClassName = jQuery(`.afaq-6310-category-template-${categoryTemId}-wrapper:first`).attr('data-category-class-name');
    } else if(jQuery(`#category_template_show_hide`).prop('checked') == true && jQuery(`#activate_default_category`).prop('checked') == false) {
      categoryClassName = jQuery(`.afaq-6310-category-template-${categoryTemId}-wrapper:first`).attr('data-category-class-name');
      jQuery(`.afaq-6310-faq-template-${ids}`).hide();
      jQuery(`.${iconClass} i`).attr('class', downArrow);
    } else if(jQuery(`#category_template_show_hide`).prop('checked') == false ) {
      categoryClassName = `afaq-6310-faq-template-${ids}`;
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
    
    jQuery(".afaq-6310-faq-filter").on("keyup", function() {
      var value = jQuery(this).val().toLowerCase();     
      var ids = jQuery(this).attr('data-template-id');
      var databaseId = jQuery('.afaq-6310-faq-for-elementor').attr('data-category-template');

      jQuery(`.afaq-6310-faq-template-${ids}`).removeClass('afaq-6310-search-filter-class');
      if(value.length > 0) {
        jQuery(`.afaq-6310-category-template-${categoryTemId}-wrapper`).removeClass('afaq-6310-category-wrapper-active');
        jQuery(`.afaq-6310-faq-template-${ids}`).filter(function() {
          var title = jQuery(this).find(`.afaq-6310-faq-template-${ids}-head-title`).text().toLowerCase();
          var description = jQuery(this).find(`.afaq-6310-faq-template-${ids}-content-feature`).text().toLowerCase();
          jQuery(this).toggle(title.indexOf(value) > -1 || description.indexOf(value) > -1);
          if(title.indexOf(value) > -1 || description.indexOf(value) > -1){
            jQuery(this).addClass('afaq-6310-search-filter-class');
          }
        });
      }
      else if(jQuery(`#category_template_show_hide`).prop('checked') == true && jQuery(`#activate_default_category`).prop('checked') == true){
        jQuery(`.afaq-6310-category-template-${categoryTemId}-wrapper:first`).trigger('click');
        var firstClassName = jQuery(`.afaq-6310-category-template-${categoryTemId}-wrapper:first`).attr('data-category-class-name');
        jQuery(`.${firstClassName}`).filter(function() {
          var title = jQuery(this).find(`.afaq-6310-faq-template-${ids}-head-title`).text().toLowerCase();
          var description = jQuery(this).find(`.afaq-6310-faq-template-${ids}-content-feature`).text().toLowerCase();
          jQuery(this).toggle(title.indexOf(value) > -1 || description.indexOf(value) > -1);
          if(title.indexOf(value) > -1 || description.indexOf(value) > -1){
            jQuery(this).addClass('afaq-6310-search-filter-class');
          }
        });
      }
      else if(jQuery(`#category_template_show_hide`).prop('checked') == true && jQuery(`#activate_default_category`).prop('checked') == false){
        jQuery(`.afaq-6310-faq-template-${ids}`).hide();
      } else {
        //No category and no search value
        jQuery(
            `.afaq-6310-faq-template-${ids}`
          ).filter(function () {
            var title = jQuery(this)
                  .find(`.afaq-6310-faq-template-${ids}-head-title`)
                  .text()
                  .toLowerCase();
            var description = jQuery(this)
              .find(`.afaq-6310-faq-template-${ids}-content-feature`)
              .text()
              .toLowerCase();
            jQuery(this).toggle(
              title.indexOf(value) > -1 || description.indexOf(value) > -1
            );
            if (title.indexOf(value) > -1 || description.indexOf(value) > -1) {
              jQuery(this).addClass("afaq-6310-search-filter-class");
            }
          });
      }

      //FAQ Mode Start
      if(faqMode == 1){
        jQuery(`.afaq-6310-faq-template-${ids}-label-head`).removeClass(`afaq-6310-faq-template-${ids}-active`);
        jQuery(`.${iconClass} i`).attr('class', downArrow);
        jQuery(`.afaq-6310-faq-template-${ids}-content`).hide();
        //Setting tabs
        jQuery(`.afaq-6310-search-filter-class:first .afaq-6310-faq-template-${ids}-label-head`).addClass(`afaq-6310-faq-template-${ids}-active`);
        jQuery(`.afaq-6310-search-filter-class:first .${iconClass} i`).attr('class', upArrow);
        jQuery(`.afaq-6310-search-filter-class:first .afaq-6310-faq-template-${ids}-content`).show();
      } 
      else if(faqMode == 2){
        jQuery(`.afaq-6310-search-filter-class .afaq-6310-faq-template-${ids}-label-head`).addClass(`afaq-6310-faq-template-${ids}-active`);
        jQuery(`.afaq-6310-search-filter-class .${iconClass} i`).attr('class', upArrow);
        jQuery(`.afaq-6310-search-filter-class .afaq-6310-faq-template-${ids}-content`).show();
      } 
      else if(faqMode == 3){
        jQuery(`.afaq-6310-faq-template-${ids}-label-head`).removeClass(`afaq-6310-faq-template-${ids}-active`);
        jQuery(`.${iconClass} i`).attr('class', upArrow);
        jQuery(`.afaq-6310-faq-template-${ids}-content`).hide();
      }
       //FAQ Mode End
       dynamicCSS();
    });

    jQuery(`body`).on('click', '#search_template_show_hide', function() {
      if (jQuery(`#search_template_show_hide`).prop('checked') == true) {
        jQuery(`.afaq-6310-search-template-number-${ids}`).show();
      } else {
        jQuery(`.afaq-6310-search-template-number-${ids}`).hide();
      }
    });
  });
</script>