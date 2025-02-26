var Aladdin = {

	options : [],

	parseMenu : function() {
		
		var adminMenu = jQuery('#adminmenu').find('li a:not(.wp-has-submenu)');
		
		jQuery.each(adminMenu, function(){
			
			var option = {};	
			var title = jQuery(this).ignore('span').text();
			var link = jQuery(this).attr('href');
			var category = jQuery(this).parents('.wp-submenu').siblings('a').ignore('.plugin-count').text();
			
			option.display = title;
			option.value = title + " " + category;
			option.link = link;
			option.data = { 'category' : category };
			
			Aladdin.options.push(option);
			
		});	

	},

	initAutoComplete : function() {

		var aladdinText = jQuery('.aladdin-text');

		aladdinText.devbridgeAutocomplete({

			minChars: 2,	
			lookup: Aladdin.options,
			groupBy: 'category',
			autoSelectFirst : true,
			
			formatResult: function(suggestion, currentValue) {
				return '<strong>' + suggestion.display + '</strong>';
			},

			onSelect: function (suggestion) {
				jQuery(this).val('');
				window.location.href = suggestion.link;       
			}

		});

	},

	trackEvents : function() {

		var maxInterval = 500;
		var lastKeypress = 0;
		var aladdinWrap = jQuery('.aladdin-wrap');
		var aladdinText = jQuery('.aladdin-text');
		
		jQuery(document).keydown(function(e) {
			
			if (e.which == 16) {
		
				var thisKeypress = new Date();
				if ( thisKeypress - lastKeypress <= maxInterval ) {

					aladdinWrap.fadeIn(200);
					aladdinText.focus();				
					thisKeypress = 0;

				}
			
				lastKeypress = thisKeypress;

			}

			if (e.which == 27) {
				
				aladdinWrap.fadeOut(200);
					
			}

		});

		jQuery('html').click(function() {

			aladdinWrap.fadeOut(200);

		});

		aladdinText.click(function(e){

		    e.stopPropagation();

		});

	},

	init : function() {

		Aladdin.parseMenu();
		Aladdin.initAutoComplete();
		Aladdin.trackEvents();

	}

}

jQuery.fn.ignore = function(sel){

	return this.clone().find(sel||">*").remove().end();

};

jQuery(document).ready(function($) {

	Aladdin.init();

});