;(function ($) {

    $('.qs-dark-mode-color-inner-wrapper input[type="color"]').wpColorPicker();
    $('.qs-dark-mode-text-inner-wrapper input[type="color"]').wpColorPicker();
    $('.qs-dark-mode-advanced-option-container-switch_container_bg_color input[type="color"]').wpColorPicker();
    $('.qs-dark-mode-advanced-option-container-switch_container_bg_light_color input[type="color"]').wpColorPicker();

    var dash_tabs = {
        active: 0
    };
    

    if (typeof qs_dark_mode_obj !== 'undefined'){
        dash_tabs.active = parseInt(qs_dark_mode_obj.active) 
    }
    $('#qs-dark-mode-adpage-tabs').tabs(dash_tabs);

    $('#qs-dark-mode-settings-search').on('input',function(){
        var ele_val      = $(this).val().toLowerCase();
         var filter_col   = $('.qs-dark-mode-component-row .qs-dark-mode-col');

        $.each( filter_col, function( ) {
            var that_widgets = $(this);
            that_widgets.toggle(that_widgets.find('strong').text().toLowerCase().indexOf(ele_val) > -1);
        
        });
    });
   
    if($('.js-qs-dark-mode-select2-single').length){
     $('.js-qs-dark-mode-select2-single').select2();
    }

    // copy shortcode
    $('.qs-shortcode-copy-button').on('click',function(){

        $(this).text('copied').css({'font-style': 'italic'});
        let _copyText = $(this).siblings('input');
        _copyText.select().css({'border-color':'red'});

        let copyText = _copyText.val();
        let $_temp_ele = $("<input>");

        $("body").append($_temp_ele);
        $_temp_ele.val(copyText).select();
        document.execCommand("copy");
        $_temp_ele.remove();
        setTimeout(function(){ 
            $(this).text('copy').css({'font-style': 'normal'});
        }, 100)
    });

    // image upload

    $(document).on("click", ".qs-dark-mode-image-upload", function (e) {
       
        e.preventDefault();
        var $button = $(this);

        // Create the media frame.
        var file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select or upload image',
            library: { // remove these to show all
                type: 'image' // specific mime
            },
            button: {
                text: 'Select'
            },
            multiple: false // Set to true to allow multiple files to be selected
        });

        // When an image is selected, run a callback.
        file_frame.on('select', function () {
            // We set multiple to false so only get one image from the uploader
            var attachment = file_frame.state().get('selection').first().toJSON();
            $button.val(attachment.url);
            $button.next('.qs-dm-uploaded').attr('src',attachment.url);
            

        });

        // Finally, open the modal
        file_frame.open();
    });

    // custom color 
    $('#quomodo-dark-mode-option-theme_custom_color').on( 'click',function(){
        qs_dm_theme_custom_color();
    } );

   
    qs_dm_theme_custom_color();

    function qs_dm_theme_custom_color(){

        if( $('#quomodo-dark-mode-option-theme_custom_color:checked') ){
       
            if( $('#quomodo-dark-mode-option-theme_custom_color:checked').length ){
              $('.qs-control-container-theme_color_preset').hide();
            }else{
                $('.qs-control-container-theme_color_preset').show(); 
            }
          
        }
    }
    $('#quomodo-modules-schedule_dark_mode').on( 'click' , function(){
       
        qs_dm_theme_advanced_schedule();
    } );

    qs_dm_theme_advanced_schedule();
    function qs_dm_theme_advanced_schedule(){

        if( $('#quomodo-modules-schedule_dark_mode:checked') ){
       
            if( $('#quomodo-modules-schedule_dark_mode:checked').length ){
              $('.qs-dark-mode-advanced-option-container-schedule_dark_mode_end_time').show();
              $('.qs-dark-mode-advanced-option-container-schedule_dark_mode_start_time').show();
            }else{
                $('.qs-dark-mode-advanced-option-container-schedule_dark_mode_end_time').hide(); 
                $('.qs-dark-mode-advanced-option-container-schedule_dark_mode_start_time').hide(); 
            }
          
        }
    }


    // custom style 
    $('#quomodo-dark-mode-option-enable_switch_custom_style').on( 'click',function(){
       
        qs_dm_theme_switch_style();
    } );

    qs_dm_theme_switch_style();
    function qs_dm_theme_switch_style(){

        if( $('#quomodo-dark-mode-option-enable_switch_custom_style:checked') ){
              
            if( $('#quomodo-dark-mode-option-enable_switch_custom_style:checked').length ){
                $('#quomodo-dark-mode-option-enable_switch_custom_style').closest('.qs-dark-mode-swicth-row').nextAll('.qs-dark-mode-option-header').show();
                $('#quomodo-dark-mode-option-enable_switch_custom_style').closest('.qs-dark-mode-swicth-row').nextAll('.qs-dark-mode-text-wrapper').show();
                $('#quomodo-dark-mode-option-enable_switch_custom_style').closest('.qs-dark-mode-swicth-row').nextAll('.qs-dark-mode-switch-wrapper').show();
                $('#quomodo-dark-mode-option-enable_switch_custom_style').closest('.qs-dark-mode-swicth-row').nextAll('.qs-dark-mode-switch-color-wrapper').show();
            
            }else{
                $('#quomodo-dark-mode-option-enable_switch_custom_style').closest('.qs-dark-mode-swicth-row').nextAll('.qs-dark-mode-option-header').hide();
                $('#quomodo-dark-mode-option-enable_switch_custom_style').closest('.qs-dark-mode-swicth-row').nextAll('.qs-dark-mode-text-wrapper').hide();
                $('#quomodo-dark-mode-option-enable_switch_custom_style').closest('.qs-dark-mode-swicth-row').nextAll('.qs-dark-mode-switch-wrapper').hide();
                $('#quomodo-dark-mode-option-enable_switch_custom_style').closest('.qs-dark-mode-swicth-row').nextAll('.qs-dark-mode-switch-color-wrapper').hide();
            }
          
        }
    }
   
    if(qs_dark_mode_obj.js_active_version != 'pro' ){
        var pros =  document.querySelectorAll(' .qs-pro input , .qs-pro select , .qs-pro .wp-picker-container button');
    
        [].forEach.call(pros, function(input) {
            // do whatever
            input.disabled = true;
        });
    }
   
    var modal_action = $('.qs-pro, .qs-pro .wp-picker-container');
    var modal = $('#qs-dark-mode-modal-body');
    modal_action.on('click', function () {
        modal.show();
    });

    $('.qs-dark-mode-modal-close').on('click', function () {
        modal.fadeOut();
    });

    $('.qs-dark-mode-advanced-option-container-image_filter select').on('change',function(){

        var image_filter = $(this).val();

        if(image_filter == 'none'){

            $('.qs-adv-image_filter_value').hide();
            $('.qs-dark-mode-advanced-option-container-include_custom_element').hide();
            $('.qs-dark-mode-advanced-option-container-include_custom_element').hide();

        }else{

            $('.qs-adv-image_filter_value').show();
            $('.qs-dark-mode-advanced-option-container-include_custom_element').show();
            $('.qs-dark-mode-advanced-option-container-include_custom_element').show();

        }
    });

    $('.qs-dark-mode-advanced-option-container-exclude_pages select').on('change',function(){

        var exclude_filter = $(this).val();
        qs_dark_mode_check_custom_override_exclude_page(exclude_filter);
      
    });
    
    qs_dark_mode_check_custom_override_exclude_page($('.qs-dark-mode-advanced-option-container-exclude_pages select').val());
    
    function qs_dark_mode_check_custom_override_exclude_page(exclude_filter){

        if(exclude_filter.indexOf("page") !== -1 || exclude_filter.indexOf("blog") !== -1 || exclude_filter.indexOf("posts") !== -1 ){

            $('.qs-dark-mode-advanced-option-container-override_exclude_page_ids').show();
 
        }else{

            $('.qs-dark-mode-advanced-option-container-override_exclude_page_ids').hide();
  

        }
    }

    $('.qs-dark-mode-images-repeater').on('click', '.qs-gc-button', function(e) {
        e.preventDefault();
    
        var $this = $(this),
            $repeater = $this.closest('.qs-dark-mode-images-repeater').find('[data-repeatable]'),
            count = $repeater.length,
            $clone = $repeater.first().clone();
    
        $clone.find('[name]').each(function() {
            //this.name = this.name + '[' + count + ']';
            this.name = this.name;
        });
    
        $clone.find('label').each(function() {
            var $this = $(this);
            $this.attr('for', $this.attr('for') + '_' + count);
        });
    
        $clone.insertBefore($this);
    });

 
    $(document).on('click', '.qs-dark-mode-img-src-remove span', function(e) {
        e.preventDefault();
        var repeater = $(this).parents('.qs-swap-image-repeater').remove();
        
    });

    $(document).on('input', '.qs-dark-mode-range-inner-wrapper .qs-dark-mode-range-option', function(){
        $(this).next('.qs-dm-range-value').html($(this).val()+'px');
    });

    $(document).on('change','.qs-dark-mode-select-dropdown.menu_switch_position',function(){
        
        qs_dark_mode_header_menu_custom_area($(this).val());
        
    });
   
    qs_dark_mode_header_menu_custom_area($('.qs-dark-mode-select-dropdown.menu_switch_position').val());
    function qs_dark_mode_header_menu_custom_area(val=''){
        if(val !=''){

            $('.qs-dark-mode-text-option-container-menu_switch_position_top').parent().show();
            $('.qs-dark-mode-text-option-container-menu_switch_position_left').parent().show();

        }else{

            $('.qs-dark-mode-text-option-container-menu_switch_position_top').parent().hide();
            $('.qs-dark-mode-text-option-container-menu_switch_position_left').parent().hide(); 

        }
    }
    qs_front_keyboard_shortcut();
    $(document).on('click','#quomodo-dark-mode-gen-option-frontend_keyboard_shortcut_enable',function(e){
        qs_front_keyboard_shortcut();
    });

    function qs_front_keyboard_shortcut(){
        if($("#quomodo-dark-mode-gen-option-frontend_keyboard_shortcut_enable").is(':checked'))
        $('#qs-frontend_keyboard_shortcut').show();
        else
        $('#qs-frontend_keyboard_shortcut').hide();
    }
   
    
})(jQuery);