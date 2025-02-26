(function($){
"use strict";

var woos_container = '.woos-container';
var search_val = $(woos_container).attr("data-search");

$('form[name="woos-product-search"]').each(function(){
 
        var form          = $(this),
            search        = form.find('.search'),
            category      = form.find('.woos-search-category'),
            currentQuery  = '',
            timeout       = false;
 
        category.on('change',function(){
            currentQuery  = '';
            var query = search.val();
            productSearch(form,query,currentQuery,timeout);
        });
 
        search.keyup(function(){
            var query = $(this).val();
            productSearch(form,query,currentQuery,timeout);
        });
 
    });
    /**
    * Product Display Function
    * Feature added by : Joy Shaha <joysaha7302@gmail.com>
    * Date : 22.04.2020
    */
 function productSearch(form,query,currentQuery,timeout){
 
    var search   = form.find('.search'),
        category = form.find('.woos-search-category');
 
    form.next('.woos-search-results').html('').removeClass('active');
 
    query = query.trim();
 
    if (query.length >= 3) {
 
        if (timeout) {
            clearTimeout(timeout);
        }
 
        form.next('.woos-search-results').removeClass('empty');
 
        search.parent().addClass('loading');
        if (query != currentQuery) {
            timeout = setTimeout(function() {
 
                $.ajax({
                    url:woo_search_param.ajaxUrl,
                    type: 'post',
                    data: { action: 'woos_search_product_action', _ajax_nonce: woo_search_param.ajax_nonce, keyword: query, category: category.val() },
                    success: function(response) {
                        console.log(response);
                        currentQuery = query;
                        search.parent().removeClass('loading');
 
                        if (!form.next('.woos-search-results').hasClass('empty')) {
                            if (response.length) {
                                form.next('.woos-search-results').html('<ul class="woos-search-product-list">'+response+'</ul>').addClass('active');
                            } else {
                                form.next('.woos-search-results').html(woo_search_param.noResults).addClass('active');
                            }
                        }
                        clearTimeout(timeout);
                        timeout = false;
                    }
                });
 
            }, 500);
        }
    } else {
 
        search.parent().removeClass('loading');
        form.next('.woos-search-results').empty().removeClass('active').addClass('empty');
 
        clearTimeout(timeout);
        timeout = false;
 
    }
}

$(window).on('load', function() {
    init_mobile_class();
});
$(window).on('resize load', function() {
  set_form_small();
});
function set_form_small() {
    if ($(this).width() < 769) {
        $("body").addClass('page-small');
    } else {
        $("body").removeClass('page-small show-sidebar');
    }
  }
function is_mobile() {
     if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
         return true;
     }
     return false;
}
function init_mobile_class(){
    if(is_mobile() == true){
        $('.woos-container').addClass('mobile-page-small');
    }
}
})(jQuery);