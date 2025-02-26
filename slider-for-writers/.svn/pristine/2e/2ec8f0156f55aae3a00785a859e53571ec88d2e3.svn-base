(function ($) {
    jQuery(document).ready(function($){

        $(".dev7-caroufredsel-carousel img").colorbox({         
            href: function() {                                  
                var url = $(this).attr("data-img");             
                return url;                                     
            },                                                  
            rel: "caroufredsel-27",                             
            title: function() {                                 
                var url = $(this).attr("data-link");            
                var title = $(this).attr("title");              
                return title;
            },                                                  
        });

        $('.caroufredsel-wrapper.enable-lightbox .caroufredsel-carousel a.caroufredsel-link').colorbox({
            current: '{current} / {total}',
            opacity: 0.8,
            returnFocus: false,
            maxWidth: '90%',
            maxHeight: '90%',
            onComplete: function(){
                if($('#cboxTitle').html() == '') $('#cboxTitle').hide();
                else $('#cboxTitle').show();
                
                $('#cboxTitle').html(replaceURLWithHTMLLinks($('#cboxTitle').html()));
            }
        });
        
        function replaceURLWithHTMLLinks(text) {
            var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
            return text.replace(exp,"<a href='$1'>$1</a>"); 
        }
        
    });
    jQuery(document).ready(function($) {

        function runCarousel() {

            $(".dev7-caroufredsel-main").each(function() {
                var genericID = guid();
                var fx = $(this).data('fx');
                var easing = $(this).data('easing');
                var auto = $(this).data('autoplay');
                var duration = $(this).data('duration');
                var pauseOnHover = $(this).data('pause-on-hover');

                $(this).closest('.dev7-caroufredsel-wrapper').find('.dev7-caroufredsel-pag').attr('id',genericID);

                $(this).carouFredSel({
                    auto        : auto,
                    circular    : false,
                    responsive  : true,
                    items       : 1,
                    direction   : "left",
                    scroll      : {
                        items           : 1,
                        fx              : fx,
                        easing          : easing,
                        duration        : duration,                         
                        pauseOnHover    : pauseOnHover
                    },
                    pagination  : {
                        container       : ".dev7-caroufredsel-pag#"+genericID,
                        anchorBuilder   : false
                    }
                });

            });
        }

        $(".dev7-caroufredsel-main").imagesLoaded(runCarousel);
    });

    function guid() {
      function s4() {
        return Math.floor((1 + Math.random()) * 0x10000)
                   .toString(16)
                   .substring(1);
      }
      return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
             s4() + '-' + s4() + s4() + s4();
    }


})(jQuery);