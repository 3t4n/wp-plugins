jQuery(function($){
    $('#futura_custom_post_setting').multipleSelect();
    $('#futura_custom_post_not_show_setting').multipleSelect();
    $('#futura_custom_field_setting').multipleSelect();
    $('#futura_search_custom_post_setting').multipleSelect();

    if($('#futura_alalyze_setting_percentage').length){
        $('#futura_alalyze_setting_percentage input').on('keyup', function(){
            analyze_setting_calc($(this));
        });
        $('#futura_alalyze_setting_percentage input').on('change', function(){
            analyze_setting_calc($(this));
        });
    }

    $('#futura_min_tag_count').on('change', function(){
        var val = $(this).val();
        document.location.href = location.href+'&futura_min_tag_count='+val;
    });

    $('#futura_main_tags .futura_main_tag_list').on('click', function(){
        $('#futura_main_tags .futura_main_tag_list').removeClass('active');
        $(this).addClass('active');
        var id = $(this).attr("id");
        $('#futura_recommended_tags dl').hide();
        $('#futura_recommended_tags dl').each(function(){
            var val = $(this).data('id');
            if(val == id){ $(this).show();}
        });
    });

    function analyze_setting_calc(elem){
        if(elem.is("#futura_content_percentage")==false){
            var total_percent = get_total_alalyze_setting_percentage();
            var current_percent = parseInt($('#futura_alalyze_setting_percentage #futura_content_percentage').val());
            var new_percent = current_percent + (100-total_percent);
            if(new_percent < 0){new_percent = 0;}
            $("#futura_content_percentage").val(new_percent);                
        }
    }

    function get_total_alalyze_setting_percentage(){
        var total = 0;
        $('#futura_alalyze_setting_percentage input[type="number"]').each(function(){
            var value = parseInt($(this).val());
            if(isNaN(value)){
                value = 0;
            }
            total += value;
        });
        return total;
    }

});