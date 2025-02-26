(function($){
	$(document).ready(function() {
		// add stylesheet
		$('head').prepend($('<link>').attr({
			rel: 'stylesheet',
			type: 'text/css',
			media: 'screen',
			href: abt_featured_heroes.stylesheet,
		}));
		
		
		$featured = $('#featured');
		$featuresNav = $('<ul id="features-nav"></ul>').insertAfter('#featured > ul.features');
		$featured.find('ul.features').cycle({
			fit:1,
			width: abt_featured_heroes.width,
			height: abt_featured_heroes.height,
			fx:			abt_featured_heroes.fx,
			speed:		abt_featured_heroes.speed,
			timeout:	abt_featured_heroes.timeout,
			pager:  '#features-nav',
			pagerAnchorBuilder: function(idx, slide) {
				var $slide = $(slide);
				var $num = idx + 1;
				return '<li><a href="#"><img src="' + $slide.find( ('thumbnail' == abt_featured_heroes.style ? '.thumb' : '.photo') + ' img').attr('src') + '" /></a></li>';
			}
		});
		/* center nav vertically */
		$featuresNav.fadeTo('fast', 0).css({ 'margin-top' : '-' + (Math.floor($featuresNav.height() / 2)) + 'px' });
		$featured.hover(function() {
			$featuresNav.stop().fadeTo('slow', 1);
		}, function() {
			$featuresNav.stop().fadeOut('slow', 0);
		});
	});
})(jQuery);