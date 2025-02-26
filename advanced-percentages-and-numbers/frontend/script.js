jQuery(window).ready(function(){

StatjoinsViewport('.toast-percentage, .toast-count-to-number');

 function StatjoinsViewport(elements){
	 jQuery(elements).each(function(){
	 
	  var    elementTranformation = parseInt(jQuery(this).css('transform').split(',')[5]);
	  if(elementTranformation){
	  var    elementPosition = jQuery(this).offset().top - elementTranformation;
	  }else{
	  var    elementPosition = jQuery(this).offset().top
	  }
      var    topOfWindow = jQuery(window).scrollTop();
	  var	 windowHeight = jQuery(window).height();
	  var	 BottomOfWindow = topOfWindow + windowHeight;
	  var    item = jQuery(this)
	 
	  jQuery(window).scroll(function(){
             topOfWindow = jQuery(window).scrollTop(),
		     windowHeight = jQuery(window).height(),
		     BottomOfWindow = topOfWindow + windowHeight
		 
		 
		 if( elementPosition < BottomOfWindow -200){
			 jQuery(item).addClass('toast-active-stat');
		 }
			 
		 });
		 
		  if( elementPosition < BottomOfWindow-200){
	    jQuery(this).addClass('toast-active-stat');
	 		} 
		 
		 });
		 }




jQuery('.toast-percentage').each(function(){

var width = jQuery(this).width();
jQuery(this).find('.percentage-number').css({'font-size': width / 4});
var item = jQuery(this);
var percentage = jQuery(this).attr('data-amount');
var index = 0;
var speed = jQuery(this).attr('data-speed');
var delay = jQuery(this).attr('data-delay');

jQuery(window).on('scroll', function(){

if(jQuery(item).hasClass('toast-active-stat') && ! jQuery(item).hasClass('activated')){


jQuery(item).addClass('activated')
numberGrow(item);
jQuery(item).find('.percentage-circle').css({'stroke-dasharray': percentage+', 100'})


}

})//ON SCROLL

if(jQuery(this).hasClass('toast-active-stat') && ! jQuery(item).hasClass('activated')){

setTimeout(function(){

jQuery(item).addClass('activated')
numberGrow(item);
jQuery(item).find('.percentage-circle').css({'stroke-dasharray': percentage+', 100'})

}, delay)

}

//GROW NUMBER (FOR PERCENTAGE)
function numberGrow(item){

setTimeout(function(){
if(index <= percentage){
jQuery(item).find('.percentage-number').text(index+'%');
index++;
numberGrow(item);
}
}, speed / percentage);

}


})

//GROW NUMBER STANDARD
jQuery('.toast-count-to-number').each(function(){
var counter = jQuery(this);
var number = parseInt(jQuery(this).text());
jQuery(this).text(0);
var started = false;
var delay = jQuery(this).attr('data-delay');
var speed = parseInt(jQuery(this).attr('data-speed'));
function CountToNumber(){
		setTimeout(function(){	
		jQuery(counter).prop('Counter',0).animate({
        Counter: number
    }, {
        duration: speed,
        easing: 'linear',
        step: function (now) {
            jQuery(counter).text(Math.ceil(now));
        }
    });
		}, delay)	
		}
		
		if(jQuery(counter).hasClass('toast-active-stat')){
			if(started === false){
			started = true;
			CountToNumber();	
			}
		}else{
			jQuery(counter).text('0')
		}	
		
		
		jQuery(window).on('scroll', function(){
if(jQuery(counter).hasClass('toast-active-stat')){
			if(started === false){
			started = true;
			CountToNumber();
			}else{
			}
}


	});


})


})