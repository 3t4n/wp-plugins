(function($, ksfrontend){
	"use strict";
	
	var KhoBish = {
		
		init: function() { 

			var widgets = {
				'xlmag-one.default' : KhoBish.magListsFunction,
				'xlmag-grid.default' : KhoBish.magListsFunction,
				'xlmag-list.default' : KhoBish.magListsFunction,
				'xlmag-two.default' : KhoBish.magListsFunction,
				'xlmag-wid-list.default' : KhoBish.magListsFunction,
				'khbmg4.default' : KhoBish.magListsFunction,
				'khbpstlyst.default' : KhoBish.magListsFunction,
				'khbpstlystb.default' : KhoBish.magListsFunction,
				'xlmag-23.default' : KhoBish.magListsFunction,
			};

			$.each( widgets, function( widget, callback ) {
				ksfrontend.hooks.addAction( 'frontend/element_ready/' + widget, callback );
			});
			
		},

		responsive_catlist: function(){
			$('.kb-filter-bar:not(.khrltd)').each(function(){
				var el 	= $(this);
				if (el.parent().hasClass('split')){
					return;
				}

					var LeftLabel 		= el.find('.leftpart');
					var RightFilter 		= el.find('.rightpart');
					var MoreWrap 		= el.find('.kb_more_list');
					var MainWidth 		= el.find('span.forwidth').width()+120;
					var elWidth 		= el.width();
					var LabelWidth 		= LeftLabel.outerWidth(true,true);
					var CalcWidth 			= (elWidth-LabelWidth-MainWidth);
					var SubCatWrap 	= RightFilter.find('.kb_subcats_list');
					var List2 			= el.find('.kb_more_list li');
					var li 				= SubCatWrap.find('li');
					var key				= li.length;
					var liW = 0;
					var s = -1;
					for(var i = 0;i<key;i++){
						if(CalcWidth > liW){
							liW += $(li[i]).outerWidth();
						}else{
							s++;
						}
						if(s !== -1){
							$(li[key-1-i]).removeClass('notneeded');
							$(List2[key-2-i]).removeClass('need');
						}
					}
					if(CalcWidth < liW){
						s++;
					}
					if(s === 0){
						$(li[key-1]).addClass('notneeded');	
						$(List2[key-2]).addClass('need');	
					}
					if(s>0){
						for(var a=0;a<s;a++){
							$(li[key-1-a]).addClass('notneeded');
							$(List2[key-2-a]).addClass('need');
						}
					}else{
						li.removeClass('notneeded');
						List2.removeClass('need');
					}

					if($(RightFilter.find('.kb_subcats_list li.notneeded')).length > 0){
						MoreWrap.removeClass('notneeded').css({display:'block'}).addClass('more');
					}else{
						MoreWrap.addClass('notneeded').css({display:'none'}).removeClass('more');
					}
			
					
			});
		},

		magListsFunction: function(){
			KhoBish.responsive_catlist();
			KhoBish.custom();
		},

		custom: function(){

	        if ($('.khobish-ajax-wrap').hasClass('mason-on')) {
	            var contain = $('.khobish-ajax-wrap.mason-on');
	            contain.imagesLoaded(function() {
	                contain.masonry({
	                    itemSelector: '.anim-fade',
	                    isAnimated: false,
	                    transitionDuration: '7.5s'
	                });
	            }); 
	        } 			
		},	
	};
	
	$( window ).on( 'elementor/frontend/init', KhoBish.init );
	$( window ).on('resize',function(){
		KhoBish.responsive_catlist();
	});

	KhoBish.responsive_catlist();

})(jQuery, window.elementorFrontend);