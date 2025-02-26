(function ($) {
    $(document).ready(function () {

     var AjaxUrl = wpmi_variable.ajax_url;
     var admin_nonce = wpmi_variable.ajax_nonce;
     var smessage = wpmi_variable.success_msg;
     var enable_setting_msg = wpmi_variable.enable_setting_msg;
     var disable_setting_msg = wpmi_variable.disable_setting_msg;
     var select_icon_box = wpmi_variable.icon_box_text;
     var enable_icon_message = wpmi_variable.enable_icon_message;

    /*
    * Check if menu icon settings is enabled?
    */
    var wpmi_enabled_class = function() {
        if ( $('input#wpmi_enable_menu_icon:checked') && $('input#wpmi_enable_menu_icon:checked').length ) {
            $('body').addClass('wpmi-icon-active');
        } else {
            $('body').removeClass('wpmi-icon-active');
        }
    }

    $('input#wpmi_enable_menu_icon').on('change', function() {
        wpmi_enabled_class();
    });

    wpmi_enabled_class();

    $(".wp-menu-icon-settings-save").on('click', function(e) {
        e.preventDefault();
          var wpmi_icon_settings = JSON.stringify($( "[name^='icon_options']" ).serializeArray());
          $.ajax({
                    url: AjaxUrl,
                    type: 'post',
                    data: {
                        action: "wpmi_save_icon_settings",
                        menu_id: $('#menu').val(),
                        menu_icon_meta: wpmi_icon_settings,
                        admin_nonce: admin_nonce
                    },
                    beforeSend: function() {
                         $(".nav-menu-theme-wpmenuicon .wpmi-loader").css('display', 'block');
                    },
                    complete: function() {
                         $(".nav-menu-theme-wpmenuicon .wpmi-loader").css('display', 'none');
                         $(".nav-menu-theme-wpmenuicon .wpmi_success").show();
                    },
                    success: function(res) {
                      //console.log(res);
                       $(".nav-menu-theme-wpmenuicon .wpmi-loader").css('display', 'none');
                       $(".nav-menu-theme-wpmenuicon .wpmi_success").html(smessage).delay(5000).fadeOut('slow');

                    }
                });
         });

        /*
        * Add Menu Icon Button For Each Menu Item
        */
        $('#menu-to-edit li.menu-item').each(function() {
                var mitem = $(this);
                var menuid = $('input#menu').val();
                var menutitle = mitem.find('.menu-item-title').text();
                if (!menutitle) {
                    menutitle = mitem.find('.item-title').text();
                }
                var id = parseInt(mitem.attr('id').match(/[0-9]+/)[0], 10);
                var button = $('<span>').addClass('wpmi_icon_launch').html(select_icon_box).on('click', function () {
                if($('body').hasClass('wpmi-icon-active')){
                    var menu_depth = mitem.attr('class').match(/\menu-item-depth-(\d+)\b/)[1];
                    show_lightbox_icon_settings(id,menutitle,menu_depth,menuid);
                }else{
                    alert(enable_icon_message);
                }
              });
             $('.item-title', mitem).append(button);
        });

      function show_lightbox_icon_settings (id,menutitle,menu_depth,menuid) {
        $.ajax({
          url: AjaxUrl,
          type: 'post',
          data:{
            action: 'wpmi_show_lightbox_html',
            menu_item_id: id,
            menu_item_title: menutitle,
            menu_item_depth: menu_depth,
            menu_id: menuid,
            admin_nonce: admin_nonce
          },
          cache: false,
          beforeSend: function () {
              $('.wpmi_menu_icon_wrapper #wpmi_icon_settings_frame').css('display', 'block');
              $('.wpmi_menu_icon_wrapper .wpmi-overlay').css('display', 'block');
          },
          success: function (response) {
              var response = $(response);
              var pop_up_content = $('.wpmi_menu_icon_wrapper .wpmi_main_content').html(response);
              pop_up_content.closest('.wpmi_menu_icon_wrapper').fadeIn();

              fn_save_data(response,id,menutitle,menu_depth,menuid);
              $('.wpmi-color-picker').wpColorPicker();
              $('.icon-picker-input').iconPicker();
              $('.wpmi_menu_icon_wrapper .wpmi-overlay').css('z-index', '9999');
          }
        });
      }

      /*Pop-up Module close*/
      $('.wpmi_close_btn').on('click', function (e) {
         e.preventDefault();
          $(this).closest('.wpmi_menu_icon_wrapper').fadeOut();
      });
      $('.wpmi_menu_icon_wrapper .wpmi-overlay').on('click', function (e) {
         e.preventDefault();
          $(this).closest('.wpmi_menu_icon_wrapper').fadeOut();
      });

      $('body').on('change', '.wpmi-hanimationeffect', function () {
            var select_val  = $(this).val();
            $(this).closest('.wpmi-iconsettings-table').find('.wpmicon-animation-preview[class*="hvr-icon"]').removeClass(function(index,classes){
               return (classes.match (/(^|\s)hvr-icon\S+/g) || []).join(' ');
            });
            $(this).closest('.wpmi-iconsettings-table').find('.wpmicon-animation-preview').addClass(select_val);

      });

      /*
      * Icon Tab Settings Click
      */
      $('.nav-menus-php').on('click', 'ul.wpmi-nav-wrapper li', function () {
            var tab_id = $(this).attr('data-tab');
            $('ul.wpmi-nav-wrapper li').removeClass('wpmi_active');
            $('.wpmi-tab-content').removeClass('wpmi-active-content');
            $(this).addClass('wpmi_active');
            $("#" + tab_id).addClass('wpmi-active-content');
      });


      function fn_save_data(response,id,menutitle,menu_depth,menuid){
          var form = response.find('form');
            form.on('submit', function () {
                var wpmenuicon_item_save = $(this).serialize();
                $('.wpmi-save-form-wrapper .wpmicon-spinner.spinner').addClass('is-active');
                $.ajax({
                    url: AjaxUrl,
                    type: 'post',
                    data: {
                        action: "wpmi_icon_settings_save",
                        menu_item_id: id,
                        wpmenuicon_settings: wpmenuicon_item_save,
                        wp_nonce: admin_nonce
                    },
                    complete: function() {
                         $('.wpmicon-message').show();
                    },
                    success: function (save) {
                        $('.wpmi-save-form-wrapper .wpmicon-spinner.spinner').removeClass('is-active');
                        $(".wpmicon-message").delay(5000).fadeOut('slow');
                    }
                });
                return false;
            });
      }

       $('.nav-menus-php').on('change', '#wpmi_icon_settings_frame .wpmi-icon-type', function () {
         var icontype = $(this).val();
         if(icontype === 'available_font_icon'){
          $(this).closest('.wpmi-iconsettings-table').find('.wpmi-preavailable-settings').show();
          $(this).closest('.wpmi-iconsettings-table').find('.wpmi-custom-icon-settings').hide();
          $(this).closest('.wpmi-iconsettings-table').find('.wpmi-apsocialicons-settings').hide();
         }else if(icontype === 'apsocialicons'){
          $(this).closest('.wpmi-iconsettings-table').find('.wpmi-custom-icon-settings').hide();
          $(this).closest('.wpmi-iconsettings-table').find('.wpmi-preavailable-settings').hide();
          $(this).closest('.wpmi-iconsettings-table').find('.wpmi-apsocialicons-settings').show();
         }else if(icontype === 'custom'){
          $(this).closest('.wpmi-iconsettings-table').find('.wpmi-preavailable-settings').hide();
          $(this).closest('.wpmi-iconsettings-table').find('.wpmi-apsocialicons-settings').hide();
          $(this).closest('.wpmi-iconsettings-table').find('.wpmi-custom-icon-settings').show();
         }else{
          $(this).closest('.wpmi-iconsettings-table').find('.wpmi-preavailable-settings').hide();
          $(this).closest('.wpmi-iconsettings-table').find('.wpmi-apsocialicons-settings').hide();
          $(this).closest('.wpmi-iconsettings-table').find('.wpmi-custom-icon-settings').hide();
         }
       });

        $('.nav-menus-php').on('click', '.wpmi_custom_url_button', function (e) {
             e.preventDefault();
             var btnClicked = $( this );
             var image = wp.media({
             title: "Insert Custom Icon",
             button: {text: "Insert Custom Icon"},
             library: { type: 'image'},
             multiple: false
             }).open()
           .on('select', function(e){
            var uploaded_image = image.state().get('selection').first();
            var custon_icon_url = uploaded_image.toJSON().url;
            btnClicked.closest('.wpmi-custom-icon-settings').find('.wpmi-custom-icon-url').val(custon_icon_url);
            if (btnClicked.closest('.wpmi-custom-icon-settings').find('.wpmi-custom-icon-url').val(custon_icon_url) !== '') {
                btnClicked.closest('.wpmi-custom-icon-settings').find('.wpmi-image-preview').show();
            } else {
                btnClicked.closest('.wpmi-custom-icon-settings').find('.wpmi-image-preview').hide();
            }
            btnClicked.closest('.wpmi-custom-icon-settings').find('.wpmi-image-preview .wpmi-custom-imageicon').attr('src',custon_icon_url);
          });
        });


        $('.nav-menus-php').on('click', '.wpmi-remove-icon-preview', function (e) {
              e.preventDefault();
              $(this).parent().find('img').attr('src','');
              $(this).closest('.wpmi-custom-icon-settings').find('.wpmi-custom-icon-url').val('');
              $(this).parent().hide();
          });
  });//$(function () end
}(jQuery));
