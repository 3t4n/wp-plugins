;(function ($) {
	$(document).ready(function(){
		var $main=$('#DDSOO_settings');
		var $settings=$main.find('.-settings');
		var $businessID=$main.find("#DDSOO_business_ID");
		var $storeID=$main.find("#DDSOO_store_ID");
		var $businessSlug=$main.find("#DDSOO_business_slug");
		var $properties=$('.DDSOO_properties');
		var $ds_properties=$main.find('.DDSOO_settings_properties');
		var $advanced_settings=$main.find('.--advanced-settings');
		var $$advanced=$main.find('.DDSOO_advanced ');

		var $advanced_input=$main.find('#DDSOO_advanced_input');
		

		function settings(){
			var properties={};			
			var $addremove=$settings.find('.--addremove');
			$addremove.click(function(){	
				$ds_properties.removeClass("-hidden");				
			});			
		}
		settings();
		function advanced_settings(){	
			var $view_btn=$advanced_settings.find('.--advanced-settings-view-btn');		
			var $hide_btn=$advanced_settings.find('.--advanced-settings-hide-btn');	
			$view_btn.click(function(){	
				$$advanced.removeClass("-hide"); 
				$view_btn.addClass("-hidden");
				$hide_btn.removeClass("-hidden");
				$advanced_input.val(1);
				//console.log("view_btn");				
			});	
			$hide_btn.click(function(){	
				$$advanced.addClass("-hide");
				$view_btn.removeClass("-hidden");
				$hide_btn.addClass("-hidden");
				$advanced_input.val("");
				
				//console.log("hide_btn");				
			});			
		}
		advanced_settings();

		
		function properties(){
			var properties={};
			var $$prop=$main.find('.--prop');
			var $close=$ds_properties.find('.--close');
			$close.click(function(){	
				$ds_properties.addClass("-hidden");				
			});				
			$$prop.each(function(){
				var $prop=$(this);
				var name=$prop.data("name");
				var $remove=$prop.find(".--prop-remove");
				var $add=$prop.find(".--prop-add");	
				var $property=$properties.find(".DDSOO_"+name);	
				var $publish=$properties.find(".DDSOO_"+name+"_publish input");			

				$remove.click(function(){
					$prop.removeClass("--published");
					$property.data("publish", false);				
					$property.removeClass("publish").addClass("hidden");
					$publish.val("hide");	
					console.log("remove " +name);
				});
				$add.click(function(){	
					$prop.addClass("--published");
					$property.data("publish", false);				
					$property.removeClass("hidden").addClass("publish");
					$publish.val("display");					
					console.log("add "+name);
				});
			});
			//console.log($properties.html());	
		}
		properties();
		function color(){	
			var $ui=$('.--color-picker-ui');		
			var $$color=$properties.find(".--color");	
			$$color.each(function(){
				var $prop=$(this);
				var $input=$prop.find("input");
				var $picker=$prop.find(".--color-picker");
				var title=$picker.data("title");
				$picker.click(function(){	
					var code=$input.val();				
					//console.log($input.val());
					$ui.trigger("open",[{code:code, $el:$prop, title:title}])
				});
				$prop.on("change",function(e, json){
					$input.val(json.code);
					$picker.css("background-color", json.code);
					if(json.code) $picker.addClass("--has-value"); else  $picker.removeClass("--has-value");
				})	
				$input.on("change",function(e, json){
					var val=$input.val();
					if(val) {
						$picker.addClass("--has-value"); 
						$picker.css("background-color", val);
					}else{						
						$picker.removeClass("--has-value");
						$picker.css("background-color", "");
					}					
				})				
			});
			//console.log($properties.html());	
		}
		color();
	});    
})(jQuery);
