jQuery(document).ready(function() {
    //console.log(OCGWWdata.showslider_item_desktop);
    jQuery('body').on('click', '.ocgw_gift_btn', function() {

        if (jQuery(".ocgw_gift_div").length > 0) {
            //jQuery('html, body').animate({scrollTop: jQuery('.ocgw_gift_div').offset().top - 100}, 'fast');
            jQuery(this).toggleClass('active');
            jQuery('.ocgw_gift_div').slideToggle(300);
        } else {
            jQuery('body').addClass("ocgw_body_gift");
            jQuery('#ocgw_gifts_popup').fadeIn(500);
            jQuery('.ocgw_gifts_popup_overlay').fadeIn(500);
            jQuery('.gw_gift').css("display", "block");
        }
        
        return false;
    }); 


    jQuery('body').on('click', '.ocgw_gifts_popup_close', function() {
        jQuery("#ocgw_gifts_popup").fadeOut(500);
        jQuery('.ocgw_gifts_popup_overlay').fadeOut(500);
        jQuery('body').removeClass("ocgw_body_gift");
    });

    jQuery('body').on('click', '.ocgw_gifts_popup_overlay', function() {
        jQuery("#ocgw_gifts_popup").fadeOut(500);
        jQuery('.ocgw_gifts_popup_overlay').fadeOut(500);
        jQuery('body').removeClass("ocgw_body_gift");
    });

  


    jQuery('body').on('click', '.gw_gift_product', function() {


        jQuery(this).find(".ocgw_prod").prop("checked", true);
        jQuery(".gw_gift_product.current_giftwrapper").removeClass('current_giftwrapper');
        jQuery(this).addClass("current_giftwrapper");

    });
    // jQuery('body').on('click', '.single_add_to_cart_button', function() {


    //    jQuery(".gift_add_single").trigger("click");

    // });
   




    setInterval(function() {

        jQuery('.gw_gift_slider').owlCarousel({
            
            margin:10,
            nav:true,
            dots: true,
            autoplay:true,
            autoplayTimeout:2500,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                }
            }
        })

    }, 1000);

    setInterval(function() {

        jQuery('.wg_gift_slider_pp').owlCarousel({
            // loop:true,
            margin:10,
            nav:true,
            dots: true,
            autoplay:true,
            autoplayTimeout:2500,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                }
            }
        })
    }, 1000);
    
    
});
