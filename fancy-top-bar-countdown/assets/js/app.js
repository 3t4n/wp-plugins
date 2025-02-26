jQuery(function($){

    /*animate.css setup*/
    $('#countdown_page_time').addClass('animated bounceInRight');
    $('#nn-cooming-soon-page-count-down .message').addClass('animated bounceInLeft');
    $('#nn-cooming-soon-page-count-down .button').addClass('animated bounceInLeft');
    $('#nn-cooming-soon-page-count-down .img-product').addClass('animated fadeIn');
    $('#nn-cooming-soon-page-count-down .product').addClass('animated fadeIn');
    $('#nn-cooming-soon-page-count-down .video-wrap').addClass('animated bounceInRight');
    $('#nn-cooming-soon-page-count-down .link-list').addClass('animated fadeIn');
    $('#nn-cooming-soon-page-count-down .slider-product').addClass('animated fadeIn');
    $('#nn-cooming-soon-page-count-down .slider-product-nav').addClass('animated fadeIn');

    /*mb_YTPlayer setup*/
    $(".player").mb_YTPlayer();

    $('#nn-cooming-soon-page-count-down .slider-product').slick({
        autoplay: false,
        infinite: true,
        dots: false,
        fade: true,
        arrows: false
    });

    $('#nn-cooming-soon-page-count-down .slider-product-nav').slick({
        autoplay: false,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-product',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        arrows: false
    });
});