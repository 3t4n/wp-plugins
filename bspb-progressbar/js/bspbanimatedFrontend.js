(function($) {
	var current_type = current_value.type;
	var drawOnScroll = current_value.drawOnScroll;


	var ScrollID = current_value.ScrollID;
console.log(ScrollID);
	if(current_type === 'horizontal'){
		cssanimate = 'width';
	}
	else if(current_type === 'vertical'){
		cssanimate = 'height';
	}

	$(window).scroll(function(){
    console.log($('#skills').offset().top < $(this).height() + $(this).scrollTop());
});

	var isMobile = window.matchMedia("only screen and (min-width: 320px) and (max-width: 480px)");
  $(document).ready(function() {

if (!isMobile.matche) {
        //Conditional script here

 $('.progress-bar').css(cssanimate,  '0%');
	//$('.value').text('0');
	 // $('.value').each(function(index,item){
	   //console.log("different");

	 ///    jQuery({someValue: (parseInt($(item).data('index')))}).animate({someValue: '0'}, {
   // duration: 2000,
  // easing:'swing', // can be anything
   // step: function() { // called on every step
        // Update the element's text with rounded-up value:

    //    $(item).text(Math.round(this.someValue) + "%" );
    //      }

//});

//});

	if (drawOnScroll ){

		//alert(drawOnScroll);




//--DOWN
var waypoint = new Waypoint({
  element: document.getElementById(ScrollID),
  handler: function(direction) {

    if(direction==='down'){
console.log("descendre skills");
//alert("descendre about");

	  $('.progress-bar').css(cssanimate,  function(){ return ($(this).attr('aria-valuenow')+'%')});


    $('.value').each(function(index,item){
	    //console.log("oui");
	    $(item).text("0 %" );
	     jQuery({someValue: 0}).animate({someValue: (parseInt($(item).data('index')))}, {
    duration: 2000,
   easing:'swing', // can be anything
    step: function() { // called on every step
        // Update the element's text with rounded-up value:

        $(item).text(Math.round(this.someValue) + "%");


    }
});

});
   // }
        }
     },
  offset: '75%'

});




var waypoint = new Waypoint({
  element: document.getElementById(ScrollID),
  handler: function(direction) {

    if(direction==='up'){

	  	   // alert("monter about");
console.log("monter skills");

	    //console.log("down");
	 $('.progress-bar').css(cssanimate,  '0%');
	//$('.value').text('0');
	  $('.value').each(function(index,item){
	    //console.log("oui");

	     jQuery({someValue: (parseInt($(item).data('index')))}).animate({someValue: '0'}, {
    duration: 2000,
   easing:'swing', // can be anything
    step: function() { // called on every step
        // Update the element's text with rounded-up value:

        $(item).text(Math.round(this.someValue) + "%" );
          }

});

});

    }
     },
  offset: '80%'

});


}
else {

		  $('.progress-bar').css(cssanimate,  function(){ return ($(this).attr('aria-valuenow')+'%')});


    $('.value').each(function(index,item){
	    //console.log("oui");
	    $(item).text("0 %" );
	     jQuery({someValue: 0}).animate({someValue: (parseInt($(item).data('index')))}, {
    duration: 2000,
   easing:'swing', // can be anything
    step: function() { // called on every step
        // Update the element's text with rounded-up value:

        $(item).text(Math.round(this.someValue) + "%");


    }
});

});
   // }
        }

		}
 });
})(jQuery);