
$(function(){
  $('.image img').fullscreenslides();
  var $container = $('#fullscreenSlideshowContainer');
  $container
    .bind("init", function() { 
      $container
        .append('<div class="ui" id="fs-close">&times;</div>')
        .append('<div class="ui" id="fs-loader">Loading...</div>')
        .append('<div class="ui" id="fs-prev">&larr;</div>')
        .append('<div class="ui" id="fs-next">&rarr;</div>')
        .append('<div class="ui" id="fs-caption"><span></span></div>');
      $('#fs-prev').click(function(){
        $container.trigger("prevSlide");
      });
      $('#fs-next').click(function(){
        $container.trigger("nextSlide");
      });
      $('#fs-close').click(function(){
        $container.trigger("close");
      });
    })
    .bind("startLoading", function() { 
      $('#fs-loader').show();
    })
    .bind("stopLoading", function() { 
      $('#fs-loader').hide();
    })
    .bind("startOfSlide", function(event, slide) { 
      $('#fs-caption span').text(slide.title);
      $('#fs-caption').show();
    })
    .bind("endOfSlide", function(event, slide) { 
      $('#fs-caption').hide();
    });
});
