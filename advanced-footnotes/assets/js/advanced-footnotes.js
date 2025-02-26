(function($){
"use strict";
	var advanced_footnotes = {
		options : {
			scrollGap : 0,
			scrollSpeed : 0,
		},
		init : function(){
			var optMeta = $('meta[name="afn-jsopts"]');
			if(optMeta.length){
				advanced_footnotes.options = Object.assign(advanced_footnotes.options, JSON.parse(optMeta.attr('content')));
			}

			$('.afn-footnotes-ref').off('click').on('click', function(e){
				e.preventDefault();
				var target = $($(this).attr('href')+":first");
				if(target.length){
					advanced_footnotes.scrollTo(target, advanced_footnotes.options.scrollSpeed);
				}
			})
		},
		scrollTo : function(target, time, endFunction){
			if(!advanced_footnotes.isDefined(time) || time === false){ var time = 800; };

			var targetY = target.offset().top - advanced_footnotes.options.scrollGap;

			if(time != false || time != 0){
				$("html, body").animate(
					{ scrollTop: targetY },
					time,
					'easeOutCubic'
				).promise().done(function(){
					if(advanced_footnotes.isDefined(endFunction) && $.isFunction(endFunction)){
						endFunction();
					}
				});
			}
			else{
				$("html, body").scrollTop(targetY);

				if(advanced_footnotes.isDefined(endFunction) && $.isFunction(endFunction)){
					endFunction();
				}
			}
		},
		isDefined : function(object){
			if (typeof object !== typeof undefined && object !== false) {
				return true;
			}
			else{ return false; }
		}
	}

	jQuery.extend(jQuery.easing, {
		easeOutCubic: function (x, t, b, c, d) {
			return c*((t=t/d-1)*t*t + 1) + b;
		},
	});

	$(document).ready(advanced_footnotes.init);
})(jQuery); 