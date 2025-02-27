jQuery(document).ready(function() {
    //console.log(FGWWdata.showslider_item_desktop);
    //add to cart click action
    document.querySelectorAll('.fgw_gift_atc_btn a').forEach(function(anchor) {
		anchor.addEventListener('click', function(event) {
			event.preventDefault(); // Prevent the default action
			var redirectUrl = this.getAttribute('data-href'); // Get the URL from data-href
			if (redirectUrl) { // Ensure redirectUrl is not null or empty
				window.location.href = redirectUrl; // Redirect to the URL
			} else {
				console.warn('No redirect URL found');
			}
		});
	});
	
    jQuery('body').on('click', '.fgw_gift_btn', function() {

        if (jQuery(".fgw_gift_div").length > 0) {
            jQuery('html, body').animate({scrollTop: jQuery('.fgw_gift_div').offset().top - 100}, 'fast');
        } else {
            jQuery('body').addClass("fgw_body_gift");
            jQuery('#fgw_gifts_popup').css('display', 'block');
            jQuery('.fgw_gifts_popup_overlay').css("display", "block");
        }
        
        return false;
    });

    jQuery('body').on('click', '.fgw_gifts_popup_close', function() {
        jQuery("#fgw_gifts_popup").css("display", "none");
        jQuery('.fgw_gifts_popup_overlay').css("display", "none");
        jQuery('body').removeClass("fgw_body_gift");
    });

    jQuery('body').on('click', '.fgw_gifts_popup_overlay', function() {
        jQuery("#fgw_gifts_popup").css("display", "none");
        jQuery('.fgw_gifts_popup_overlay').css("display", "none");
        jQuery('body').removeClass("fgw_body_gift");
    });
    
    if (typeof window.wc !== 'undefined' && window.wc.blocksCheckout) {
        const { registerCheckoutFilters } = window.wc.blocksCheckout;
        const FGWP_modifyCartItemClass = ( defaultValue, extensions, args ) => {
            if (args && args.cartItem && args.cartItem.item_data) {
                console.log(args.cartItem.item_data);
                const keyToCheck = "Free";
                const valueToCheck = "Yes";
                if (FGWP_hasKeyValuePair(args.cartItem.item_data, keyToCheck, valueToCheck)) {
                    return defaultValue+ 'FGWP-gift-class';
                }
            }
            return defaultValue;
        };
        const FGWP_modifyCartItemPrice = ( defaultValue, extensions, args ) => {
            if (args && args.cartItem && args.cartItem.item_data) {
                console.log('defaultValue: ', defaultValue);
                const keyToCheck = "Free";
                const valueToCheck = "Yes";
                if (FGWP_hasKeyValuePair(args.cartItem.item_data, keyToCheck, valueToCheck)) {
                    return '<price/>Free';
                }
            }
            return defaultValue;
        };
        registerCheckoutFilters( 'free-gift-checkout', {
            cartItemClass: FGWP_modifyCartItemClass,
            cartItemPrice: FGWP_modifyCartItemPrice,
        });
        
    }

     if (typeof wp !== 'undefined' && wp.hooks) {
                wp.hooks.addAction("experimental__woocommerce_blocks-cart-set-item-quantity", "core/i18n",
                    function (name, functionName, callback, priority) {
                        // console.log("sdgfdg");
                        setTimeout(function(){
                            window.location.reload();
                        }, 3000);
                    },
                    10
                );

                wp.hooks.addAction("experimental__woocommerce_blocks-cart-remove-item", "core/i18n",
                    function (name, functionName, callback, priority) {
                        // console.log("sdgfdg");
                        setTimeout(function(){
                            window.location.reload();
                        }, 3000); 
                    },
                    10
                );
            }
        });

function FGWP_hasKeyValuePair(array, key, value) {
    for (let i = 0; i < array.length; i++) {
        if (array[i].key === key && array[i].value === value) {
            return true;
        }
    }
    return false;
}