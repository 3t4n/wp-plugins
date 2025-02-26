// animation defaults
var defaults={
	// styling
	padding:'60px 0px 60px 0px',
	textAlign:'center',
	fontSize:'15px',
	foreColour:'#eee',
	maskColour:'#000',
	maskOpacity:0.4,

	// animation timing
	slideDuration:800,
	fadeInDuration:200,
	holdDuration:2000,
	fadeOutDuration:200
};
function getSetting(setting,options){

	if('undefined' == typeof options){
		return defaults[setting];
	}
	if('undefined' == typeof options[setting]){
		return defaults[setting];
	}
	else return options[setting];
}

function displayBannerAfter(selector, text, options, delay){
	if(!delay) delay=0;

	// copy text so as not to affect it
	var displayText = text.slice();

	setTimeout(function(){
		// display banner, and when done, run this (delayed) fun again
		displayBanner(selector, displayText, options, function(){
			displayBannerAfter(selector, text, options, delay);
		});
	}, delay);
}

function displayBanner(selector,text,options,callback){

	// load this banner text (we will recurse later)
	thisText=text.shift();

	// loop through all images, generating their captions
	jQuery(selector).each(function(){

		bannerID=(Math.round(10000*Math.random()));
		bannerText = jQuery(document.createElement('div'))
			.attr('id','banner_text_'+bannerID)
			.addClass('animated_banner_item banner_'+bannerID)
			.html('<div class="banner_captions">'+thisText+"</div>")
			.height('auto').width(jQuery(this).width())
			.css({
				position:'absolute',
				zIndex:10,
				opacity:1,
				backgroundColor:'transparent',
				color:getSetting('foreColour',options),
				padding:getSetting('padding',options), 
				fontSize:getSetting('fontSize',options),
				textAlign:getSetting('textAlign',options)
			})
			.prependTo(jQuery(this).parent())
			.css('top',jQuery(this).position().top)
			.hide();

		// refresh Cufon if present
		if(Cufon) Cufon.refresh();

// only if required

		// mask canvas
		bannerCanvas = jQuery(document.createElement('div'))
			.attr('id','banner_canvas_'+bannerID)
			.addClass('animated_banner_item banner_'+bannerID)
			.html('&nbsp;')
			.height('auto').width(jQuery(this).width())
			.css({
				zIndex:5,
				position:'absolute',
				backgroundColor:getSetting('maskColour',options),
				opacity:getSetting('maskOpacity',options)
			})
			.prependTo(jQuery(this).parent())
			.css('top',jQuery(this).position().top)
			.hide();

		// the text to place on the mask canvas
		bannerCanvasText = jQuery(document.createElement('div'))
			.html(thisText)
			.css({
				visibility:'hidden',
				fontSize:getSetting('fontSize',options),
				padding:getSetting('padding',options),
				textAlign:getSetting('textAlign',options)
			})
			.appendTo(bannerCanvas)
		;

		jQuery(bannerCanvas).slideDown(getSetting('slideDuration',options),function(){

			jQuery(bannerText)
				.fadeIn(getSetting('fadeInDuration',options))
				.delay(getSetting('holdDuration',options))
				.animate({marginLeft:'-200px', opacity:0,duration:getSetting('fadeOutDuration',options)},function(){
					jQuery(bannerCanvas).hide('slow',function(){
						if(text.length){
							displayBanner(selector,text,options,callback);
						}
						else{
							// destroy when done
							jQuery('.animated_banner_item').remove();

// currently this will only allow one banner per page, as when one
// finishes, it will remove all elements - check based on selector first, and remove
// only ours
//jQuery(selector+' div').remove();

							if(callback) callback();
						}
					});
				});
		});

	});
}
