jQuery( document ).ready(function(){
    /*************************************************************************
    * Color Picker
    *************************************************************************/
    jQuery('input.trigger-gol-colorpic').wpColorPicker();
    gol_admin_shortcode_generator();
});
function gol_admin_shortcode_generator(){
    var shobj = {
        shortcode_data_type        : 'type',
        shortcode_data_class       : 'class',
        shortcode_data_video_url   : 'video_url',
        shortcode_data_video_width : 'video_width',
        shortcode_data_title       : 'button_title',
        shortcode_data_text        : 'button_text',
    }
    jQuery('.trigger-shortcode-generator input').on('change, keyup', function(){
        var field_val = jQuery(this).val();
        var field_name = jQuery(this).attr('name');
        if( typeof field_val != 'undefined' && typeof field_name != 'undefined' && typeof shobj[ field_name ] != 'undefined' ){
            if( field_val ){
                var val_input = ' '+shobj[ field_name ]+'="'+field_val+'"';
            } else {
                var val_input = '';
            }
            jQuery('.trigger-shortcode-generator [data-name="'+field_name+'"]').html( val_input );
        }
    });
    jQuery('.trigger-shortcode-generator select').on('change', function(){
        var field_val = jQuery(this).val();
        var field_name = jQuery(this).attr('name');
        if( typeof field_val != 'undefined' && typeof field_name != 'undefined' && typeof shobj[ field_name ] != 'undefined' ){
            if( field_val ){
                var val_input = ' '+shobj[ field_name ]+'="'+field_val+'"';
            } else {
                var val_input = '';
            }
            jQuery('.trigger-shortcode-generator [data-name="'+field_name+'"]').html( val_input );
        }
    });
}
