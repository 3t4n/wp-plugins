  $ = jQuery.noConflict();
  /*****Load function start*****/
  $(window).load(function(){

    /*instagram structure*/
    setHeight();
    $("#instagram li img").each(function(i, elem) {
      var img = $(elem);
      var div = $("<div />").css({
      background: "url(" + img.attr("src") + ") center no-repeat",
      height:"100%",
      width:"100%"
      });
      img.replaceWith(div);
    });


  });

  var setHeight = function () {
    var height = $(window).height();
    var insta_height = height/3;
    $('#instagram li').css('height', (insta_height));
    $('.full-height').css('min-height', (height));
  };

      var accessToken,clientId,userName;
      accessToken = $('.instagram-sec').data('access');
      clientId = $('.instagram-sec').data('client');
      userName = $('.instagram-sec').data('user');
      $.fn.spectragram.accessData = {
          accessToken: accessToken,
          clientID: clientId
      };
      $('#instagram').spectragram('getUserFeed', {
          query: userName, //this gets adrianengine's photo feed
        max: 13,
        size: "medium"});
 jQuery(window).load(function(e){

 jQuery('.instagram-slider').slick({
     infinite: true,
     autoplaySpeed: 7000,
     arrows: false,
     slidesToShow: 6,
     autoplay: true,
     slidesToScroll: 2,
     responsive: [
         {
             breakpoint: 990,
             settings: {
                 slidesToShow: 3,
                 slidesToScroll: 3,
                 infinite: true,
             }
         },
         {
             breakpoint: 768,
             settings: {
                 slidesToShow: 2,
                 slidesToScroll: 2
             }
         },
         {
             breakpoint: 600,
             settings: {
                 slidesToShow: 1,
                 slidesToScroll: 1
             }
         }
     ]
 });
 });
