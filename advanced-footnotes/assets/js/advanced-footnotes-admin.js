(function($){
"use strict";

	var afn = {
		container : false,
		disablers : {},
		walkToggles : function(){
			afn.disablers = {};
			$('input[toggle-disable]', afn.container).each(function(){
				var input = $(this);
				if(input.is(':checked')){
					var disables = $(this).attr('toggle-disable').split(',');
					$.each(disables, function(nth, target){
						if(!afn.isDefined(afn.disablers[target])){
							afn.disablers[target] = [];
						}

						if(afn.disablers[target].indexOf(input.attr('id')) == -1){
							afn.disablers[target].push(input.attr('id'));
						}
					});
				}
			});

			$('input[toggle-enable]', afn.container).each(function(){
				var input = $(this);
				if(input.prop('checked') != true){
					var disables = $(this).attr('toggle-enable').split(',');
					$.each(disables, function(nth, target){
						if(!afn.isDefined(afn.disablers[target])){
							afn.disablers[target] = [];
						}

						if(afn.disablers[target].indexOf(input.attr('id')) == -1){
							afn.disablers[target].push(input.attr('id'));
						}
					});
				}
			});

			$('input[readonly]', afn.container).prop('readonly', false);
			$.each(afn.disablers, function(key, disabler){
				if(disabler.length > 0){
					$('input#'+key, afn.container).prop('readonly', true);
				}
			});

			//console.log(afn.disablers);
		},
		isDefined : function(object){
			if (typeof object !== typeof undefined && object !== false) {
				return true;
			}
			else{ return false; }
		},
	}
	
	$(document).ready(function(){
		afn.container = $('#advanced-footnotes-options');
		if(afn.container.length){
			afn.walkToggles();

			$('input[toggle-disable], input[toggle-enable]', afn.container).off('change').on('change', afn.walkToggles);
		}
	});

})(jQuery); 