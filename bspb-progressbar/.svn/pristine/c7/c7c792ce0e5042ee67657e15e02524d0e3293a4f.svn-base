(function($) {
	var current_type = current_value.type;
	var drawOnScroll = current_value.drawOnScroll;
	var drawOnScrollSpeed = current_value.drawOnScrollSpeed;

	var ScrollSelector = current_value.ScrollSelector;
console.log(ScrollSelector);


	var isMobile = window.matchMedia("only screen and (min-width: 320px) and (max-width: 480px)");
  $(document).ready(function() {
        //Conditional script here


if (!isMobile.matche) {

	if (drawOnScroll ){

			$.each($('.progress-bar'), function (index, value) {

          if ($(this).hasClass("horiz")){
              cssanimate = 'width';
           $(this).css(cssanimate, '0%');
        }
         if ($(this).hasClass("vert")){
              cssanimate = 'height';
           $(this).css(cssanimate, '0%');
        }
	});

	  $('.value').each(function(index,item){
		$(item).html("0 %" );
});



//--DOWN
var waypoint = new Waypoint({
  element: document.getElementById(ScrollSelector),
  handler: function(direction) {

    if(direction==='down'){
console.log("descendre skills");

			$.each($('.progress-bar'), function (index, value) {
          if ($(this).hasClass("horiz")){
	           console.log('horizontal');
              cssanimate = 'width';
           $(this).css(cssanimate,  function(){ return ($(this).attr('aria-valuenow')+'%')});
        }
         if ($(this).hasClass("vert")){
	           console.log('vertical');
              cssanimate = 'height';
           $(this).css(cssanimate,  function(){ return ($(this).attr('aria-valuenow')+'%')});
        }
});

$('.progress-bar .value').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: parseInt($(this).data('index'))
    }, {
        duration: parseInt(drawOnScrollSpeed),
        easing: 'swing',
        step: function (now) {
           $(this).html(Math.round(now) + "%" );
        }
    });
});
        }
     },
  offset: '75%'

});




var waypoint = new Waypoint({
  element: document.getElementById(ScrollSelector),
  handler: function(direction) {

    if(direction==='up'){

			$.each($('.progress-bar'), function (index, value) {
          if ($(this).hasClass("horiz")){
              cssanimate = 'width';
           $(this).css(cssanimate, '0%');
        }
         if ($(this).hasClass("vert")){
              cssanimate = 'height';
           $(this).css(cssanimate, '0%');
        }
});


$('.progress-bar .value').each(function () {


    $(this).prop('Counter',parseInt($(this).data('index'))).animate({
        Counter: 0
    }, {
        duration: parseInt(drawOnScrollSpeed),
        easing: 'swing',
        step: function (now) {
            $(this).html(Math.round(now) + "%" );
        }
    });
});

    }
     },
  offset: '80%'

});


}
else {
			$.each($('.progress-bar'), function (index, value) {
          if ($(this).hasClass("horiz")){
              cssanimate = 'width';
           $(this).css(cssanimate, $(this).attr('aria-valuenow')+'%');
        }
         if ($(this).hasClass("vert")){
              cssanimate = 'height';
           $(this).css(cssanimate, $(this).attr('aria-valuenow')+'%');
        }
	});


$('.progress-bar .value').each(function () {
    $(this).html(parseInt($(this).data('index')) + "%" );

    });

    }

		}
 });
})(jQuery);