document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('custom-modal');
    var closeModalBtn = document.getElementById('closeModalBtn');

    if (modal && closeModalBtn) {
        // Show the modal after 2 seconds
        setTimeout(function () {
            modal.style.display = 'block';
        }, 2000);

        // Close the modal when the close button is clicked
        closeModalBtn.addEventListener('click', function () {
            modal.style.display = 'none';
        });

        // Close the modal if the user clicks outside of it
        window.addEventListener('click', function (event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        });
    }
});


//Peoduct Quick View


(function($) {
	
	"use strict";


jQuery(document).ready(function($) {

    function handleVariationImage() {
        var $quickView = $('.wps_quick_view');
        var $variationForm = $quickView.find('.variations_form');

        // Initialize variation form
        $variationForm.wc_variation_form();

        // Trigger variation form events
        $variationForm.trigger('check_variations');
        $variationForm.trigger('reset_image');

        $variationForm.on('found_variation', function(event, variation) {
            var $mainImage = $quickView.find('.woocommerce-product-gallery__image img');
            var variationImageSrc = variation.image.src;
            var variationImageSrcset = variation.image.srcset;
            var variationImageSizes = variation.image.sizes;

            if (variationImageSrc) {
                $mainImage.attr('src', variationImageSrc);
            }

            if (variationImageSrcset) {
                $mainImage.attr('srcset', variationImageSrcset);
            }

            if (variationImageSizes) {
                $mainImage.attr('sizes', variationImageSizes);
            }
        });
    }

    $(".wpsection_quick_view_btn").on('click', function(event) {
        event.preventDefault();
        var $quickViewBtn = $(this);
        var data = {
            action: 'quick_view',
            id: $quickViewBtn.attr('href'),
            nonce: WpsectionAjax.nonce  ,
            beforeSend: function() {
                $('.quick_view_loading').addClass('loading');
            }
        };
        $.post(WpsectionAjax.ajaxurl, data, function(response) {
            $.magnificPopup.open({
                type: 'inline',
                preloader: true,
                removalDelay: 160,
                zoom: {
                    enabled: true,
                    duration: 50
                },
                mainClass: 'mfp-fade',
                items: {
                    src: response
                },
                callbacks: {
                    open: function() {
                        handleVariationImage();
                    }
                }
            });
            $('.quick_view_loading').removeClass('loading');
            $('body').addClass('quickview_enable');

            // Select the elements with the class "your-class"
            var elements_r = $('.wps_quick_view .woocommerce-product-gallery');

            // Remove the inline style from each selected element
            elements_r.removeAttr('style');
            var element = $('.wps_quick_view .woocommerce-product-gallery .woocommerce-product-gallery__wrapper');
            // Add the class "galler_box" to the selected element
            element.addClass('owl-carousel');
            var owl = $('.wps_quick_view .woocommerce-product-gallery__wrapper');
            owl.owlCarousel({
                autoplay: true,
                autoplayTimeout: 4000,
                loop: false,
                dots: false,
                items: 1,
                center: false,
                nav: true,
            });

            $('.wps_quick_view .mfp-close').on('click', function() {
                $('.wps_quick_view, .mfp-wrap').css('opacity', 0);
            });
 
            $('.product:not(.product-type-external) form.cart').on('submit', function (e) {
                e.preventDefault();
                var form = $(this);
                var formData = new FormData(form[0]);
                formData.append('add-to-cart', form.find('[name=add-to-cart]').val());
                $.ajax({
                    url: wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'ace_add_to_cart'),
                    data: formData,
                    type: 'POST',
                    processData: !1,
                    contentType: !1,
                    complete: function (response) {
                        response = response.responseJSON;
                        if (!response) {
                            return
                        }
                        if (response.error && response.product_url) {
                            window.location = response.product_url;
                            return
                        }
                        if (wc_add_to_cart_params.cart_redirect_after_add === 'yes') {
                            window.location = wc_add_to_cart_params.cart_url;
                            return
                        }
                        var $thisbutton = form.find('.single_add_to_cart_button');
                        $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
                        $('.woocommerce-error, .woocommerce-message, .woocommerce-info').remove();
                        $(response.fragments.notices_html).appendTo('.cart_notice').delay(3000).fadeOut(300)
                    }
                });
            });
            
        });
    });
});



})(window.jQuery);

//Custom Search
(function($) {
	
	"use strict";


jQuery(document).ready(function ($) {
    var searchResults = $('.wps_product_search #search-results');
    var searchInput = $('#search-input');

    // Function to close search results
    function closeSearchResults() {
        searchResults.removeClass('show');
    }

    // Function to reset the search input and close results
    function resetSearch() {
        searchInput.val('');
        closeSearchResults();
    }

    // Event handler for input changes
    searchInput.on('input', function () {
        var query = $(this).val();

        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'custom_search',
                query: query,
            },
            success: function (response) {
                // Assuming your search results are appended to the inner div with class "row"
                searchResults.find('.row').html(response);
                searchResults.addClass('show');

                // Set timeout to automatically close after 30 seconds
                setTimeout(closeSearchResults, 30000);
            },
        });
    });

 
	
    // Event handler for clicks outside the search box
    $(document).on('click', function (e) {
        if (!$(e.target).closest('.wps_product_search').length) {
            resetSearch();
        }
    });
	
    // Event handler for mouse leave
    $('.wps_product_search').on('mouseleave', function () {
        // Delay the resetSearch function by 2000 milliseconds (2 seconds)
        setTimeout(resetSearch, 2000);
    });

    // Event handler for clicks outside the search box
    $(document).on('click', function (e) {
        if (!$(e.target).closest('.wps_product_search').length) {
            resetSearch();
        }
    });	
	
	
	
	
	
	
});

})(window.jQuery);