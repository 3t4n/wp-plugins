// JavaScript Document

// fadein
jQuery(function ($) {
  var fadeIn = $('.sangoplus_fadein .c_linkto, .sangoplus_fadein a.linkto, .sangoplus_fadein a.reference, .sangoplus_fadein .related-posts ul li');
  $(window).scroll(function () {
    $(fadeIn).each(function () {
      var offset = $(this).offset().top;
      var scroll = $(window).scrollTop(); 
      var windowHeight = $(window).height();
      if (scroll > offset - windowHeight + 150) {
        $(this).addClass("scroll-in");
      }
    });
  });
});
