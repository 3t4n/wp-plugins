jQuery('#txt_search').ready(function(){

    var fueto_text = 'Search by Fueto';
    var fueto_path = jQuery('#fueto_path').val();

    jQuery('.fueto_form').show();

    jQuery("span.fueto_input_box #txt_search").bind('focusin', function(){
        var bee = jQuery(this).next('a.fueto-bee');
        if(bee.data('hidden') != 1)
        {
            bee.hide();
        }
        else if( jQuery(this).val() == fueto_text )
        {
            jQuery(this).val('');
        }
    });

    jQuery("span.fueto_input_box #txt_search").bind('focusout', function(){
        var bee = jQuery(this).next('a.fueto-bee');
        if(bee.data('hidden') != 1)
        {
            bee.show();
        }
        else if( jQuery(this).val() == '' )
        {
            jQuery(this).val(fueto_text);
        }
    });

    
    set_last_search_fueto();
    activate_autocomplete_fueto(fueto_path);
    
    if( jQuery("body").hasClass('wp-admin') == false)
    {
        check_width_fueto(fueto_path, fueto_text);
    }
});

function set_last_search_fueto()
{
    var searched = decodeURIComponent((new RegExp('[?|&]' + 's' + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null;

    if(searched != null)
    {
        jQuery("span.fueto_input_box #txt_search").val(searched);
    }
}

function activate_autocomplete_fueto(fueto_path)
{
    var fueto_autocomplete = jQuery('#fueto_autocomplete').val();
    
    if(fueto_autocomplete == 1)
    {
        jQuery("span.fueto_input_box #txt_search").autocomplete({
            source: function( request, response )
            {
                jQuery.ajax({
                    url: fueto_path + 'includes/get_autocomplete.php',
                    dataType: "json",
                    data: {
                        txt: request.term
                    },
                    success: function( data ) {
                        response( jQuery.map( data.result, function( item ) {
                            
                            return {
                                label: item.title,
                                value: item.title,
                                link: item.link
                            }
                        }));
                    }
                    , error: function( data ) {
                    }
                });
            }
          , minLength: 3
          , select: function( event, ui ) {
                //this.form.submit();
                window.location.href = ui.item.link;
            }
        })
        .data( "autocomplete" )._renderItem = function( ul, item ) {
            var max_width = jQuery('#fueto_txt_width').val();
            if(item.label != '')
            {
                return jQuery( "<li link='"+item.link+"' style='width: "+max_width+"px;'></li>" )
                    .data( "item.autocomplete", item )
                    .append( "<a>" + item.label + "</a>" )
                    .appendTo( ul );                
            }

            return null;
        };
        
    }
}

function check_width_fueto(fueto_path, fueto_text)
{
    params = '';
    sep = '';
    
    jQuery("form.fueto_form").each(function(i){
        var plugin = jQuery(this).children('div.fueto_search_box');
        var parent = jQuery(this).parent();
        
        var plugin_width = plugin.outerWidth();
        var parent_width = parent.width();
        
        if(plugin_width > parent_width)
        {
            // Append to message
            params = sep + parent.get(0).tagName + ':' + parent.attr('id');
            sep = ';';

            hide_when_break_fueto(plugin, fueto_text);
        }
    });

    // Send warning to admins
    if( jQuery('#fueto_width_warning').val() != params)
    {
        jQuery.ajax({
            url: fueto_path + 'includes/set_warning_width.php',
            dataType: "json",
            data: {'params': params}
        });
    }
}

function hide_when_break_fueto(plugin, fueto_text)
{
        var parent = jQuery(plugin).parent('form.fueto_form');    

        var parent_width = parent.width();
        var plugin_width = parseInt( jQuery(plugin).width() );
        var plugin_text_width = parseInt( jQuery(plugin).find('#txt_search').width() );
        var plugin_padding_right = parseInt( jQuery(plugin).find('#txt_search').css('padding-right') );

        jQuery(plugin).css('width', plugin_width - plugin_padding_right );
        jQuery(plugin).find('a.fueto-bee').hide().data('hidden', 1);
        jQuery(plugin).find('#txt_search').css('padding-right', 0 );

        plugin_new_width = parseInt( jQuery(plugin).width() );

        if(plugin_new_width > parent_width)
        {
            parent.hide();
            var wp_search = parent.next('form#searchform');
            wp_search.find('#s').attr('placeholder', fueto_text);
            wp_search.find('label[for="s"]').html(fueto_text);
            wp_search.show();
        }
        
        jQuery(plugin).find('#txt_search').val(fueto_text);
        //jQuery(plugin).find('#txt_search').css('width', plugin_text_width + plugin_padding_right );
}