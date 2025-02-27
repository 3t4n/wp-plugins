(function($){
    "use strict";
    
    $("body").on('click','.cww-connector-settings-tab .tab-wrap li', function(e){
        e.preventDefault();
        var self = $(this);
        var divNow = self.attr("data-id");

        $(".tab-pane").hide();
        $(".cww-connector-settings-tab .tab-wrap li").removeClass('active');
        self.closest('li').addClass('active');
        $("." + divNow + "").fadeIn();
    });

    $('body').on('click','.activecampaign-key-show', function(){
        
        if(  $('#cww_api_key').attr('type') == 'password' ){
            $('#cww_api_key').attr('type','text');
            $(this).children('.show').hide();
            $(this).children('.hide').show();
        }else{
            $('#cww_api_key').attr('type','password');
            $(this).children('.show').show();
            $(this).children('.hide').hide();
        }
        
    });


})(jQuery);