jQuery(function ($) {

    var length = $('.ajaxsearch').attr('data-length');
    var tag = $('.ajaxsearch').attr('search-by-tag');
    var category = $('.ajaxsearch').attr('search-by-category');
    var notFound = $('.ajaxsearch').attr('data-not-found');

    if ('true' == tag) {
        tag = true;
    }else{
        tag = false;
    }

    if ('true' == category) {
        category = true;
    }else{
        category = false;
    }

    $(".ajaxsearch").on('keyup', function(e) {

        var result = $(this).parent().find('.edd-search-result') ;

        var search_val = $(this).val(); 

        if(search_val.length < length ){
            $(result).html("");
        }
        else {

            $.ajax({
                url: edd_search_wp_ajax.ajaxurl,
                type:"post",
                dataType: "json",
                data: { 
                    action: 'edd_search_fetch_data',
                    security: edd_search_wp_ajax.ajaxnonce,
                    ajaxsearch: search_val,
                    tag: tag,
                    category: category
                },
                error:function(response){

                    $(result).html("");

                },
                success:function(response){
                    var output = '';

                    if (response.status == 1 ) {
                        output += '<ul>';
                        if (response.data) {
                            $.each(response.data,function( key, post ){   
                                output += '<li><a href="'+post['link']+'">'+post['title'] + '</a></li>';
                            });
                        }else{
                            output += '<li>'+ notFound +'</li>';

                        }
                        output += '</ul>';
                    }
                    else{
                        output += '<ul><li>'+response.error+'</li></ul>';
                    }

                    $(result).html(output);
                }

            });

        }

    });   
});