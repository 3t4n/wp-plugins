jQuery(window).load(function() {
    jQuery('.countdown_wrapper [data-countdown]').each(function () {
      var $this = jQuery(this),
        finalDate = jQuery(this).data('countdown');
      $this.countdown(finalDate, function (event) {
        $this.html(event.strftime('<span class="ht-count days"><span class="count-inner"><span class="time-count">%-D</span> <p>Days</p></span></span> <span class="ht-count hour"><span class="count-inner"><span class="time-count">%-H</span> <p>Hours</p></span></span> <span class="ht-count minutes"><span class="count-inner"><span class="time-count">%M</span> <p>Minutes</p></span></span> <span class="ht-count second"><span class="count-inner"><span class="time-count">%S</span> <p>Seconds</p></span></span>'));
      });
    });

});



(function($){
  "use strict"; 
  function testimonialActivation(){

    $('.testimonial-activation').each(function(){

      var $this = $(this);

      var autoplay = $this.data('autoplay') == true ? true : false;
      var autoplaySpeed = $this.data('speed') ? parseInt($this.data("speed")) : 1000;
      var arrows = $this.data('arrow') === true ? true : false;
      var dots = $this.data('dots') === true ? true : false;
      var loop = $this.data('loop') === true ? true : false;

      /*-- Four Row Post Carousel --*/
      var $slider = $this.slick({
        autoplay: autoplay,
        autoplaySpeed: autoplaySpeed,
        pauseOnFocus: false,
        pauseOnHover: false,
        infinite: loop,
        arrows: arrows,
        dots: dots,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
      });


    });

  };
  testimonialActivation();

})(jQuery);