jQuery(document).ready(function($){
    var settings = $(this).find("#academy_divi_carousel_settings");
    var slides_per_view  = Number(settings.attr('slides_per_view_dsk'));
    var slide_speed  = Number(settings.attr('slide_speed'));
    var autoplay  = settings.attr('slide_autoplay');
    var autoplay_speed  = Number(settings.attr('autoplay_speed'));
    var autoplay_options = {
        delay: autoplay_speed,
    };

    var slide_loop  = settings.attr('slide_loop');
    
    var naviagtion = settings.attr('slide_naviagtion');
    var navigation_options = {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    };
    
    var pagination = settings.attr('slide_pagination');
    var pagination_options = {
        el: '.swiper-pagination',
        type: 'bullets',
    };

    var slides_per_desktop  = Number(settings.attr('slides_per_view_dsk'));
    var slides_per_tab  = Number(settings.attr('slides_per_view_tab'));
    var slides_per_mobile  = Number(settings.attr('slides_per_view_mobile'));
    
    const swiper = new Swiper('.swiper', {
        slidesPerView: slides_per_view,
        speed: slide_speed,
        spaceBetween: 5,
        navigation: naviagtion == 'on' ? navigation_options : '',
        pagination: pagination == 'on' ? pagination_options : '',
        loop: slide_loop == 'on' ? slide_loop = true : slide_loop = false,
        autoplay: autoplay == 'on' ? autoplay_options : '',
        breakpoints: {
            320: {
                slidesPerView: slides_per_mobile ? slides_per_mobile : 1,
                spaceBetween: 5
            },
            640: {
                slidesPerView: slides_per_tab ? slides_per_tab : 2,
                spaceBetween: 5
            },
            1024: {
                slidesPerView: slides_per_desktop ? slides_per_desktop : 3,
                spaceBetween: 5
            }
        },
      });
});