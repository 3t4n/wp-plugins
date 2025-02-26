$(window).scroll(function () {
  if ( $(this).scrollTop() > 100 && !$('.logo_header').hasClass('open') ) {
    $('.logo_header').addClass('open');
    $('.logo_header').slideDown();
   } else if ( $(this).scrollTop() <= 100 ) {
    $('.logo_header').removeClass('open');
    $('.logo_header').slideUp();
  }
});



