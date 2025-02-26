/*
The jQuery code in this file (lightbox.js) is an adaptation of the jQuery code I found in a tutorial written by David Ryan :

Copyright (c) 2009-2011, Daniel Ryan 
All rights reserved. 
Original code at : http://dryan.com/articles/jquery-lightbox-tutorial/
Copyright notice at : http://dryan.com/bsd-license.txt

Please note that even though David's code serves as a basis, I have made several modifications in it
*/

jQuery(document).ready(function(){
	lightbox();
});

function lightbox(){
	var links = jQuery('a[data-lightbox^="true"]').add(jQuery('a[rel^="lightbox"]'));
	var overlay = jQuery(jQuery('<div id="overlay"></div>'));
	var container = jQuery(jQuery('<div id="container"></div>'));
	var target = jQuery(jQuery('<div class="target"></div>'));
	var close = jQuery(jQuery('<a href="#close" class="close">&times;</a>'));
	var previous = jQuery(jQuery('<a href="#previous" class="previous">&laquo;</a>'));
	var next = jQuery(jQuery('<a href="#next" class="next">&raquo;</a>'));
	var titlezone = jQuery(jQuery('<div class="titlezone" style="display:none;"></div>'));
	
	jQuery('body').append(overlay).append(titlezone).append(container);
	container.append(close).append(target).append(previous).append(next);
	container.show().css({
	'top': Math.round( (jQuery(window).height() - jQuery(container).outerHeight() ) / 2) + 'px',
	'left': Math.round( (jQuery(window).width() - jQuery(container).outerWidth() ) / 2) + 'px',
	'margin-top':0,
	'margin-left':0,
	}).hide();
	
	close.click(function(event){
		event.preventDefault();
		overlay.add(container).fadeOut('normal');
		titlezone.fadeOut('normal');
	});
	
	overlay.click(function(event){
		event.preventDefault();
		overlay.add(container).fadeOut('normal');
		titlezone.fadeOut('normal');
	});
	
	previous.add(next).click(function(event){
		event.preventDefault();
		var current = parseInt(links.filter('.selected').attr('lb-position'), 10);
		var to = jQuery(this).is('.prev') ? links.eq(current - 1) : links.eq(current + 1);
		if(!to.size()){
			to = jQuery(this).is('.prev') ? links.eq(links.size() - 1) : links.eq(0);
		}
		if(to.size()){
			to.click();
		}
	});
	
	links.each(function(index){
		var link = jQuery(this);
		link.click(function(event){
			event.preventDefault();
			open(link.attr('href'));
			links.filter('.selected').removeClass('selected');
			link.addClass('selected');
		});
		link.attr({'lb-position':index});
	});
	
	function open(url){
		if(container.is(':visible')){
			target.children().fadeOut('normal', function(){
				target.children().remove();
			});
			loadImage(url);
		}
		
		else{
			target.children().remove();
			overlay.add(container).fadeIn('normal', function(){
				loadImage(url);
			});
		}
	}
	
	function loadImage(url){
		if(container.is('.loading')){
			return;
		}
		container.addClass('loading');
		var img = new Image();
		img.onload = function(){
			img.style.display = 'none';
			var maxWidth = (jQuery(window).width() - parseInt(container.css('padding-left'),10) - parseInt(container.css('padding-right'),10)) - 100;
			var maxHeight = (jQuery(window).height() - parseInt(container.css('padding-top'),10) - parseInt(container.css('padding-bottom'),10)) - 100;
			
			/*original_ratio = original_width / original_height
			designer_ratio = designer_width / designer_height
			if original_ratio > designer_ratio
				designer_height = designer_width / original_ratio
			else
				designer_width = designer_height * original_ratio*/
	
			if(img.width > maxWidth || img.height > maxHeight){
				var original_ratio = img.width / img.height;
				var new_width = img.width > maxWidth ? maxWidth : img.width;
				var new_height = img.height > maxHeight ? maxHeight : img.height;
				var designer_ratio = new_width / new_height;
				if(original_ratio > designer_ratio){
					new_height = new_width / original_ratio; 
				}else{
					new_width = new_height * original_ratio; 
				}
				img.width = new_width;
				img.height = new_height;
			}
			
			container.animate({
			'width': img.width,
			'height': img.height,
			'top': Math.round( (jQuery( window ).height() - img.height - parseInt( container.css( 'padding-top' ),10 ) - parseInt( container.css( 'padding-bottom' ),10 ) ) / 2 ) + 'px',
			'left':Math.round( (jQuery( window ).width() - img.width - parseInt( container.css( 'padding-left' ),10 ) - parseInt( container.css( 'padding-right' ),10 ) ) / 2 ) + 'px'},
			'normal', function(){
				target.append(img);
				jQuery(img).fadeIn('normal',function(){
					container.removeClass('loading');
				});
				var title = jQuery('a[href="'+url+'"]').children('img').attr('title');
				if (!title)
				{
					title = jQuery('a[href="'+url+'"]').children('img').attr('alt');
				}
				var titleinsert = jQuery(jQuery('<p class="lightbox-caption">'+title+'</p>'));
				if(jQuery('.titlezone').is(':empty')){
					titlezone.show().css({
					'width':'100%',
					'text-align':'center',
					'top': Math.round( (jQuery(window).height() - jQuery(container).outerHeight() ) / 2) + jQuery(container).outerHeight() + 5 + 'px',
					}).hide();
					titlezone.append(titleinsert).fadeIn('normal');
				}
				else{
					jQuery('.titlezone').empty();
					titlezone.show().css({
					'width':'100%',
					'text-align':'center',					
					'top': Math.round( (jQuery(window).height() - jQuery(container).outerHeight() ) / 2) + jQuery(container).outerHeight() + 5 + 'px',
					}).hide();
					titlezone.append(titleinsert).fadeIn('normal');
				}
			})
		}
		img.src=url;
	}
}
