(function ($) {

$(document).ready(function(){

    $('.wp-block-column.background-image').each(function(){

        var this_href = $(this).attr('id');

        if (this_href != null){

            if (this_href.indexOf("/") >= 0){
                $(this).css('background-image', 'url(' + this_href + ')');
            }
        }

    });

}
);
})(jQuery);