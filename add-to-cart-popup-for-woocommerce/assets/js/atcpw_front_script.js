function atcpwUpdateRefreshFragments( response ) {

    if( response.fragments ) {

        //Set fragments
        jQuery.each( response.fragments, function( key, value ) {
            jQuery( key ).replaceWith( value );
        });

        if( ( 'sessionStorage' in window && window.sessionStorage !== null ) ) {

            sessionStorage.setItem( wc_cart_fragments_params.fragment_name, JSON.stringify( response.fragments ) );
            localStorage.setItem( wc_cart_fragments_params.cart_hash_key, response.cart_hash );
            sessionStorage.setItem( wc_cart_fragments_params.cart_hash_key, response.cart_hash );

            if ( response.cart_hash ) {
                sessionStorage.setItem( 'wc_cart_created', ( new Date() ).getTime() );
            }
        }

        jQuery( document.body ).trigger( 'wc_fragments_refreshed' );
    }
}


function atcpwGetRefreshedFragments(){

    jQuery.ajax({
        url: ajax_postajax.ajaxurl,
        type: 'POST',
        data: {
            action: 'atcpw_get_refresh_fragments',
        },
        success: function( response ) {
            atcpwUpdateRefreshFragments(response);
        }
    })

}


jQuery(document).ready(function() {

	jQuery( document.body ).trigger( 'wc_fragment_refresh' );

    if(atcpw_popup.atcpw_trigger_class == "yes"){
        jQuery(".atcpw_trigger").click(function() {
            if(atcpw_popup.atcpw_auto_open=='yes'){
                jQuery(".atcpw_container_main").fadeIn(300);
                jQuery(".atcpw_container").css("opacity", "1");
                jQuery("body").addClass("atcpw_overlay");
            }
        });
    }

    setTimeout(function() {
        atcpwGetRefreshedFragments();
    }, 100);

    jQuery('body').on( 'added_to_cart', function() {
       
        if(atcpw_popup.atcpw_auto_open=='yes'){
            jQuery(".atcpw_container_main").fadeIn(300);
            jQuery(".atcpw_container").css("opacity", "1");
            jQuery("body").addClass("atcpw_overlay");
        }
    });

    jQuery(".atcpw_close_cart").click(function() {
	  	var boxWidth = jQuery(".atcpw_container").width();
        jQuery(".atcpw_container").css('opacity','0');
        jQuery(".atcpw_container_main").fadeOut(300);
        jQuery("body").removeClass("atcpw_overlay");
	});

	jQuery(".atcpw_cart_basket").click(function() {
        jQuery(".atcpw_container_main").fadeIn(300);
		jQuery(".atcpw_container").css("opacity", "1");
		jQuery("body").addClass("atcpw_overlay");
	});


	jQuery('body').on('change', 'input[name="update_qty"]', function() {
	    var pro_id = jQuery(this).closest('.atcpw_cart_prods').attr('product_id');
	    var qty = jQuery(this).val();
	    var c_key = jQuery(this).closest('.atcpw_cart_prods').attr('c_key');
		var pro_ida = jQuery(this);
		pro_ida.prop('disabled', true);
	    
        jQuery.ajax({
	        url:ajax_postajax.ajaxurl,
	        type:'POST',
	        data:'action=change_qty&c_key='+c_key+'&qty='+qty,
	        success : function(response) {
	        	pro_ida.prop('disabled', false);
	            jQuery( document.body ).trigger( 'wc_fragment_refresh' );
	        }
	    });
	});

    jQuery('body').on('click', '.atcpw_cart_empty_cation', function() {        
        jQuery.ajax({
            url:ajax_postajax.ajaxurl,
            type:'POST',
            data:'action=empty_cart_action',
            success : function(response) {
                jQuery( document.body ).trigger( 'wc_fragment_refresh' );
            }
        });
        return false;
    });

    var leftArrow = atcpw_urls.pluginsUrl + '/assets/images/left-arrow.svg';
    var rightArrow = atcpw_urls.pluginsUrl + '/assets/images/right-arrow.svg';

    jQuery('.atcpw_slider_inn').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        navText:["<img src='"+ leftArrow +"'>", "<img src='"+ rightArrow +"'>"],
        navClass:['owl-prev', 'owl-next'],
        dots: false,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    })


    jQuery('body').on( 'click', 'button.atcpw_plus, button.atcpw_minus', function() {
        
        jQuery('.atcpw_body').addClass('atcpw_loader');
        // return false;
        // Get current quantity values
        var qty  = jQuery( this ).closest( '.atcpw_cart_prods' ).find( '.atcpw_update_qty' );
        var val  = parseFloat(qty.val());
        var max  = 100000000000000;
        var min  = 1;
        var step = 1;

        // Change the value if plus or minus
        if ( jQuery( this ).is( '.atcpw_plus' ) ) {
           if ( max && ( max <= val ) ) {
              qty.val( max );
           } else {
              qty.val( val + step );
           }
        } else {
           if ( min && ( min >= val ) ) {
              qty.val( min );
           } else if ( val > 1 ) {
              qty.val( val - step );
           }
        }

        var updateQty  = jQuery( this ).closest( '.atcpw_cart_prods' ).find( '.atcpw_update_qty' );
        var updateVal  = parseFloat(updateQty.val());
        var pro_id = jQuery(this).closest('.atcpw_cart_prods').attr('product_id');
        var c_key = jQuery(this).closest('.atcpw_cart_prods').attr('c_key');
        var pro_ida = jQuery(this);
        pro_ida.prop('disabled', true);
        
        jQuery.ajax({
            url:ajax_postajax.ajaxurl,
            type:'POST',
            data:'action=change_qty&c_key='+c_key+'&qty='+updateVal,
            success : function(response) {
                pro_ida.prop('disabled', false);
                jQuery( document.body ).trigger( 'wc_fragment_refresh' );
                jQuery('.atcpw_body').removeClass('atcpw_loader');
            }
        });
    });
})


jQuery(document).on('click', '.atcpw_body a.atcpw_remove', function (e) {
    e.preventDefault();

    jQuery('.atcpw_body').addClass('atcpw_loader');

    var product_id = jQuery(this).attr("data-product_id"),
        cart_item_key = jQuery(this).attr("data-cart_item_key"),
        product_container = jQuery(this).parents('.atcpw_body');	

    jQuery.ajax({
        type: 'POST',
        dataType: 'json',
        url: ajax_postajax.ajaxurl,
        data: {
            action: "product_remove",
            product_id: product_id,
            cart_item_key: cart_item_key
        },
        success: function(response) {

            if ( ! response || response.error )
                return;

            var fragments = response.fragments;

            // Replace fragments
            if ( fragments ) {
                jQuery.each( fragments, function( key, value ) {
                    jQuery( key ).replaceWith( value );
                });
            }

            jQuery('.atcpw_body').removeClass('atcpw_loader');
        }
    });
});


jQuery(document).on('click', '.product_type_simple.add_to_cart_button', function () {
    var cart = jQuery('.atcpw_cart_basket');
    var imgtodrag = jQuery(this).closest('.product').find("img").eq(0);
    if (imgtodrag) {
        var imgclone = imgtodrag.clone()
            .offset({
            top: imgtodrag.offset().top,
            left: imgtodrag.offset().left
        }).css({
            'opacity': '0.8',
            'position': 'absolute',
            'height': '150px',
            'width': '150px',
            'z-index': '100'
        }).appendTo(jQuery('body')).animate({
            'top': cart.offset().top + 10,
            'left': cart.offset().left + 10,
            'width': 75,
            'height': 75
        },700);
        setTimeout(function () {
            cart.effect("shake", {
            times: 2
            }, 200);
        }, 1500);
        imgclone.animate({
            'width': 0,
            'height': 0
        }, function () {
            jQuery(".atcpw_container_main").fadeIn(300);
            jQuery(this).detach()
        });
    } 

});

window.onload = function(){
    var popup = document.getElementById('atcpw_container_main');
    document.onclick = function(e){
        if(e.target === popup){
            jQuery(".atcpw_container_main").fadeOut(300);
            jQuery(".atcpw_container").css("opacity", "0");
            jQuery("body").removeClass("atcpw_overlay");
        }
    };
};

(function ($) {
    $(document).on('click', '.atcpw_pslide_atc', function (e) {
        e.preventDefault();

        var $thisbutton = $(this),
            product_id = $thisbutton.attr('data-product_id'),
            product_qty =  $thisbutton.attr('data-quantity'),
            variation_id = $thisbutton.attr('variation-id'),
            product_container = $(this).parents('.atcpw_body');

        var data = {
            action: 'atcpw_prod_slider_ajax_atc',
            product_id: product_id,
            product_sku: '',
            quantity: product_qty,
            variation_id: variation_id,
        };

        $(document.body).trigger('adding_to_cart', [$thisbutton, data]);

        $.ajax({
            type: 'post',
            url: ajax_postajax.ajaxurl,
            data: data,
            beforeSend: function (response) {
                $('.atcpw_body').addClass('atcpw_loader');
            },
            complete: function (response) {
            },
            success: function (response) {
                if (response.error & response.product_url) {
                    window.location = response.product_url;
                    return;
                } else {
                    $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
                }
                $('.atcpw_body').removeClass('atcpw_loader');
            },
        });
        return false;
    });
})(jQuery);