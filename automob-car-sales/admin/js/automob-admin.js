function openCity(evt, cityName) {
     evt.preventDefault();
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}


function am_load_ribbon ($) {
    $("#cmb2-metabox-_am_ribbon-metabox").append('<img id="am-ribbon-preview" src=""/>');
    am_populate_ribbon ($,$("#_am_ribbon").val());
}

function am_populate_ribbon ($,val) {
    if (val == "no_ribbon") 
    {
         $("#cmb2-metabox-_am_ribbon-metabox img#am-ribbon-preview").hide();
    }else
    {
        var ribbon_url = amSearchParams.ribbons_base_url+val+".png"; 
        $("#cmb2-metabox-_am_ribbon-metabox img#am-ribbon-preview").attr('src', ribbon_url).show();    
    }
}

jQuery(document).ready(function($) {
    am_load_ribbon ($);
    count = 0;
    $('.am-admin-tabcontent').each(function(index, el) {
        count++;
        if (count==1){
            $(el).show();     
        }
       $(el).html($('#'+$(el).attr('for')+' .inside').html());
       $('#'+$(el).attr('for')).remove();
    });

    count = 0;
    $('#am-admin-tabs ul.tab li a').each(function(index, el) {
        count++;
        if (count==1){
            $(el).addClass('active');     
        }
    });
    
    $("#am-btn-preview").click(function(event) {
        event.preventDefault();
        $("#post-preview").trigger('click');
    });

    $("#am-btn-update").click(function(event) {
        event.preventDefault();
        $("#publish").trigger('click'); 
    });

    $("#_am_ribbon").change(function(event) {
        am_populate_ribbon ($,$("#_am_ribbon").val());
    });

    $("input.cmb2-text-small").keypress(function (e) {
         //if the letter is not digit then display error and don't type anything
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            $errorMessage = '<span class="am-err-message">Digits Only</span>';
            if ($(this).parent().find('.am-err-message').length==0)
            {
                $(this).parent().append($errorMessage);
            }
            $(this).parent().find('.am-err-message').css('color', 'red').show().fadeOut("slow");
            return false;
        }
    });

    // $("body").on("input propertychange", "input.cmb2-text-small", function(event) {
    //     alert('digits');
    // });
    $("body").on("input propertychange", "#_am_specs-metabox-container select,#_am_specs-metabox-container input[type='text'],#cmb2-metabox-_am_pricing-metabox input[type='text']", function(event) {
        var targetElement = $(this);
        var meta_value = $(targetElement).val();
        var meta_key = $(targetElement).attr('name');
        var post_id = $('#am-post-tab').attr('post-id'); //get actual
        if (post_id>0){
            var preloader = $('<div id="am-ajax-animation" class="cssload-loader">Saving</div>');
           if ($(targetElement).parent().find('#am-ajax-animation').length==0){
            $(targetElement).parent().append(preloader);
           }
            
            $.ajax({
                url: amSearchParams.ajaxurl,
                dataType:'json',
                type: 'POST',
                data: {
                    'action': 'am_save_vehicle',
                    'post_id': post_id,
                    'meta_key': meta_key,
                    'meta_value': meta_value
                },
                success:function(response) {
                  $(preloader).remove();
                },
                error: function(errorThrown){
                    //show flash error message
                }
            }); 
        }
 

    });
});