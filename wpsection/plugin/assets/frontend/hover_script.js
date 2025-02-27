
//Folloing code is for Image Hover Effect 
jQuery(document).ready(function($) {

    // Add a class to the first image for styling purposes
    $('.wps_singleproduct_details .cart-wrapper').addClass('wps_singleproduct_variation');

}); 
    
    
//Folloing code is for Image Hover Effect 
jQuery(document).ready(function($) {

    // Add a class to the first image for styling purposes
    $('.woocommerce-product-gallery__wrapper .woocommerce-product-gallery__image:first-child').addClass('wps_thumb_gallery');

    // Prevent lightbox or popup
    $('.woocommerce-product-gallery__wrapper .woocommerce-product-gallery__image a').on('click', function(e) {
        e.preventDefault();
    });

    // Set clicked thumbnail image as featured image
    $('.woocommerce-product-gallery__wrapper .woocommerce-product-gallery__image a').on('click', function(e) {
        e.preventDefault();

        var newImageSrc = $(this).attr('href');
        var mainImage = $('.woocommerce-product-gallery__wrapper .woocommerce-product-gallery__image:first-child img');

        // Update the main image src and srcset attributes
        mainImage.attr('src', newImageSrc);
        mainImage.attr('srcset', newImageSrc);

        // Ensure the image is not zoomed
        // mainImage.css('transform', 'scale(1)');
    });

    // Handle hover effect in JavaScript
    $('.wps_thumb_gallery')
        .on('mouseover', function(){
            $(this).find('img').css({'transform': 'scale('+ $(this).attr('data-scale') +')'});
        })
        
        .on('mousemove', function(e){
            var $img = $(this).find('img');
            var containerWidth = $(this).width();
            var containerHeight = $(this).height();
            var mouseX = e.pageX - $(this).offset().left;
            var mouseY = e.pageY - $(this).offset().top;
            var transformOriginX = (mouseX / containerWidth) * 100;
            var transformOriginY = (mouseY / containerHeight) * 100;
            $img.css({'transform-origin': transformOriginX + '% ' + transformOriginY + '%'});
        });

    // Initialize the image setup
    $('.wps_thumb_gallery').each(function(){
        var $this = $(this);
        var imgSrc = $this.find('img').attr('src');
        $this.append('<div class="wps_thumb_gallery" style="background-image: url('+ imgSrc +');"></div>');
    });

});


    jQuery(document).ready(function($) {
    // Prevent lightbox or popup
    $('.woocommerce-product-gallery__wrapper .woocommerce-product-gallery__thumbnails a').on('click', function(e) {
        e.preventDefault();
    });

    // Set clicked thumbnail image as featured image
    $('.woocommerce-product-gallery__wrapper .woocommerce-product-gallery__thumbnails a').on('click', function(e) {
        e.preventDefault();

        var newImageSrc = $(this).attr('href');
        var mainImage = $('.woocommerce-product-gallery__wrapper .woocommerce-product-gallery__image').first();

        // Update the main image src and srcset attributes
        mainImage.attr('src', newImageSrc);
        mainImage.attr('srcset', newImageSrc);

        // Ensure the image is not zoomed
        mainImage.css('transform', 'scale(1)');
    });
});

    
//Above code is for Image Hover Effect 
    
    
    



    
    



