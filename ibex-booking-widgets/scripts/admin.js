/**
 * Admin Page JS
 */
jQuery(document).ready(function( $ ) {
	
	// Basic Entities
	var htmlEntities = function(val){
		return val ? $('<div />').text(val).html() : '';
	};
	
	// Generators
	$('.ibw-generator-form').on('generate', function(){
		var base = $(this).data('base');
		var output = '[' + base;
		var allRequiredFilled = true;
		
		$(this).find('.generator-field').each(function(){
			
			var val = htmlEntities($.trim($(this).val()));
			
			if(val.length > 0){
				
				var reg = new RegExp($(this).data('format'));
				if(reg.test(val)){
					
					if($(this).data('defaultunit') && !isNaN(val)){
						val += $(this).data('defaultunit');
					}					
					
					output += ' ' + $(this).data('field') + '="' + val + '"';
				}
			}
			else {
				if($(this).data('required')){
					allRequiredFilled = false;
				}
			}
		});
		

		output += ']';
		
		if($(this).data('themeoverride') != '' && $(this).data('themeoverride') != undefined){
				output += $(this).data('themeoverride') + '[/' + base + ']';
		}
		
		if(!allRequiredFilled){
			output = $($(this).data('target')).data('original');
		}
				
		$($(this).data('target')).val(htmlEntities(output));
	}).trigger('generate');
	
	// Themer
	$('.ibw-theme-form').on('themechange', function(){
		console.log('blah');
		var target = $($(this).data('target'));
		var fields = [];
		$(this).find('.themefield').each(function(){
			var val = htmlEntities($.trim($(this).val()));
			if(val.length > 0){
				fields.push($(this).data('key') + ':"' + escape(val) + '"');
			}
		});
		
		target.data('themeoverride', fields.join(';'));
		target.trigger('generate');
	});
	
	$('.themefield').on('change', function(){
		$(this).parents('.ibw-theme-form').trigger('themechange');
	});
	
	
	$('.generator-field').on('change', function(){
		$(this).parents('.ibw-generator-form').trigger('generate');
	});
		
});