jQuery(document).ready(function(){
    if(jQuery('.gbql-buttons-wrap').length){
        jQuery('.gbql-buttons-wrap').GBQuickLaunchButtons();
    }
});


(function(jQuery) {

    jQuery.fn.extend({
        GBQuickLaunchButtons: function(options) {
            options = jQuery.extend( {}, jQuery.GBQuickLaunchButton.defaults, options );

            this.each(function() {
                new jQuery.GBQuickLaunchButton(jQuery(this),options);
                var item = jQuery(this);
                item.hover(function() {
                    jQuery(this).addClass('hovered');
                }, function() {
                    jQuery(this).removeClass('hovered');
                });

                if(!item.is(".mob")){
                    item.find(".gbql-main-button-con").bind('mouseenter click',function(e){
                        e.preventDefault();
                        if(!jQuery(this).closest(".gbql-buttons-wrap").is(".gbql-active")){
                            openGBQuickLaunchButtons(item);
                        }
                    });

                    item.find(".gbql-wrap-all").bind('mouseleave',function(e){
                        if(jQuery('.gbql-open .gbql-code-con').length){
                            let x = e.pageX;
                            let y = e.pageY;
                            let offset = jQuery('.gbql-open .gbql-code-con').offset();
                            let padding_left = parseInt(jQuery('.gbql-open .gbql-code-con').css('padding-left'), 10);
                            let padding_right = parseInt(jQuery('.gbql-open .gbql-code-con').css('padding-right'), 10);
                            let padding_top = parseInt(jQuery('.gbql-open .gbql-code-con').css('padding-top'), 10);
                            let padding_bottom = parseInt(jQuery('.gbql-open .gbql-code-con').css('padding-bottom'), 10);
                            let item_left = offset.left - padding_left;
                            let item_right = offset.left + jQuery('.gbql-open .gbql-code-con').width() + padding_right;
                            let item_top = offset.top - padding_top;
                            let item_bottom = offset.top + jQuery('.gbql-open .gbql-code-con').height() + padding_bottom;

                            if(!((x >= item_left && x <= item_right) && (y >= item_top && y <= item_bottom))){
                                setTimeout(function(){
                                    //check if mouse is on gbql-code-con
                                    if(!item.is(".hovered")){
                                        closeGBQuickLaunchButtons(item);
                                    }
                                },800);
                            }
                        }else{
                            setTimeout(function(){
                                //check if mouse is on gbql-code-con
                                if(!item.is(".hovered")){
                                    closeGBQuickLaunchButtons(item);
                                }
                            },800);
                        }
                    });
                }else{
                    item.find(".gbql-main-button-con").bind('touchstart',function(e){
                        e.preventDefault();
                        if(!jQuery(this).closest(".gbql-buttons-wrap").is(".gbql-active")){
                            openGBQuickLaunchButtons(item);
                        }else{
                            closeGBQuickLaunchButtons(item);
                        }
                    });
                }



                item.find(".gbql-buttons-con li.code").on("click","a",function(e){
                    e.preventDefault();
                    if(jQuery(this).closest("li.code").is(".gbql-open")){
                        jQuery(this).closest("li.code").removeClass("gbql-open");
                    }else{
                        jQuery(this).closest("li.code").addClass("gbql-open");
                    }
                });

                item.find(".gbql-buttons-con li.code.gbql-hover").on("mouseleave",function(){
                    jQuery(this).closest("li.code").removeClass("gbql-open");
                });
            });
            return this;
        }
    });

    // item is the element, options is the set of defaults + user options
    jQuery.GBQuickLaunchButton = function( item, options ) {
        var item_total_width = 0;
        item.find("ul.gbql-buttons-con > li").each(function(){
            var li_total_width = 0;
            li_total_width += parseInt(jQuery(this).find(".gbql-button").css("width"), 10);
            li_total_width += parseInt(jQuery(this).css("margin-left"), 10);
            li_total_width += parseInt(jQuery(this).css("margin-right"), 10);
            jQuery(this).attr("data-total-width",li_total_width);
            item_total_width += li_total_width;
        });
        item.find("ul.gbql-buttons-con").attr("data-total-width",item_total_width);
    };

    // option defaults
    jQuery.GBQuickLaunchButton.defaults = {
        //hash of default settings...
    };

    function openGBQuickLaunchButtons(item){
        var timer = parseInt(1000 / item.find("ul.gbql-buttons-con").find("li.gbql-button-wrap").length);
        item.addClass("gbql-active");
        item.find(".gbql-buttons-con").width(item.find(".gbql-buttons-con").attr("data-total-width"));
        item.find("ul.gbql-buttons-con").find("li.gbql-button-wrap").each(function(){
            jQuery(this).css({
                opacity : 0
            });
            if(item.is(".TR") || item.is(".BR")){
                jQuery(this).animate({
                    left : jQuery(this).attr("data-total-width") * jQuery(this).index(),
                    opacity : 1
                },timer);
            }else if(item.is(".custom")){
                if(jQuery(item).offset().left >= jQuery('body').width() / 2){
                    jQuery(this).animate({
                        left : jQuery(this).attr("data-total-width") * jQuery(this).index(),
                        opacity : 1
                    },timer);
                }else{
                    jQuery(this).animate({
                        right : jQuery(this).attr("data-total-width") * jQuery(this).index(),
                        opacity : 1
                    },timer);
                }
            }else{
                jQuery(this).animate({
                    right : jQuery(this).attr("data-total-width") * jQuery(this).index(),
                    opacity : 1
                },timer);
            }
        });
    }

    function closeGBQuickLaunchButtons(item){
        var timer = parseInt(1000 / item.find("ul.gbql-buttons-con").find("li.gbql-button-wrap").length);
        item.find("ul.gbql-buttons-con").find("li.gbql-button-wrap").each(function(){
            if(item.is(".TR") || item.is(".BR")){
                jQuery(this).animate({
                    left : "100%",
                    opacity : 0
                },timer);
            }else{
                jQuery(this).animate({
                    right : "100%",
                    opacity : 0
                },timer);
            }
        });
        setTimeout(function(){
            item.find(".gbql-buttons-con").width(0);
            item.removeClass("gbql-active");
            item.find(".gbql-open").removeClass("gbql-open");
        },1400);
    }

})(jQuery);