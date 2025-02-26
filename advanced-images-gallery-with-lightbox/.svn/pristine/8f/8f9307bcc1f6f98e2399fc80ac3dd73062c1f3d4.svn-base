jQuery(document).ready(function(){
  jQuery(".SlickCarousel").slick({
      rtl:false, // If RTL Make it true & .slick-slide{float:right;}
      autoplay:false, 
      autoplaySpeed:5000, //  Slide Delay
      speed:800, // Transition Speed
      slidesToShow:4, // Number Of Carousel
      slidesToScroll:1, // Slide To Move 
      pauseOnHover:false,
      adaptiveHeight: false,
      infinite:false,
      dots:false,
      rows:0,
      pauseOnDotsHover:true,
      prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
      nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
      responsive:[
        {breakpoint:1200,settings:{
          slidesToShow:3,
        }},
        {breakpoint:991,settings:{
          slidesToShow:2,
        }},
        {breakpoint:641,settings:{
          slidesToShow:2,
        }},
        {breakpoint:481,settings:{
          slidesToShow:1,
        }},
      ],
    })
    .on('setPosition', function (event, slick) {
      slick.$slides.css('height', slick.$slideTrack.height() + 'px');
    });
  })