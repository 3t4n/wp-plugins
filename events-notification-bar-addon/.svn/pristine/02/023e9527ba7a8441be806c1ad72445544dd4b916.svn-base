jQuery(document).ready(function ($) {
    var enba_height;
    var enba_height = $('.enba-wrapper').height();
    $(window).load(function() {
        var enba_height = $('.enba-wrapper').height();
       
       var enba_close;
       var enba_behavior = $('.enba-wrapper').data('enba-behavior');
       var enba_scrollH = $('.enba-wrapper').data('enba-scrollh');
       var enba_position = $('.enba-wrapper').data('enba-position');
      
       $('.enba-show-button').hide();
       if(enba_behavior == 'scroll'){
       
            $('.enba-wrapper').hide();
            $(window).scroll(function(){
               
                if ($(window).scrollTop() > enba_scrollH){ 
                    $('body').css('padding-top', '0px');
                   // $('body').css('padding-bottom', '0px');           
                    if(enba_close != 'yes'){
                        $('.enba-wrapper').show();
                    }               
                }
                else{
                   // if(enba_close == 'no'){                       
                       $('.enba-wrapper').hide();
                   // }
                 
                }
            });
       }
    
       if(enba_position == 'bottom'){  
        //if(enba_behavior != 'scroll'){
            $('body').css('padding-bottom', enba_height+'px');
            $('body').css('transition', 'padding-bottom 1s ease-in');
        //}
       
        $('.enba-show-button i').removeClass('enba-icon-down');  
        $('.enba-show-button i').addClass('enba-icon-up');
        $(".enba-wrapper").css({"bottom":"0", "display":"inline-block", "opacity":"1", "transition":"opacity 1s ease-in"});
        $(".enba-show-button").css("bottom","0");
       }
       else{
        $(".enba-show-button").css("top","0");
        $(".enba-wrapper").css({"top":"0", "display":"inline-block", "opacity":"1", "transition":"opacity 1s ease-in"});
        if(enba_behavior != 'scroll'){
            $('body').css('padding-top', enba_height+'px');
            $('body').css('transition', 'padding-top 1s ease-in');
        }
       
        $('.enba-show-button i').addClass('enba-icon-down');
        $('.enba-show-button i').removeClass('enba-icon-up');
       }
    
        $('.enba-close-button').click(function(){
            
            $(".enba-wrapper").slideUp();
            $('.enba-show-button').show("slow");
            enba_close = 'yes'; 
            if(enba_position == 'bottom'){  
                $('body').css('padding-bottom', '0px');
                $('body').css('transition', 'padding-bottom 1s ease-in');
            }
            else{
                $('body').css('padding-top', '0px');
                $('body').css('transition', 'padding-top 1s ease-in');
            }
           
                   
        });
        $('.enba-show-button').click(function(){
            $(".enba-wrapper").slideDown();
            enba_close = 'no';
            if(enba_position == 'bottom'){  
                $('body').css('padding-bottom', enba_height+'px');
                $('body').css('transition', 'padding-bottom 1s ease-in');
            }
            else{
                $('body').css('padding-top', enba_height+'px');
                $('body').css('transition', 'padding-top 1s ease-in');
            }
            
            $('.enba-show-button').hide();
           
                   
        });


  });
  
   
  

});