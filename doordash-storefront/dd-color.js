;(function ($) {
	$(document).ready(function(){	
		

		function colorPickerUI(){
			var $active_el=false;
			var $ui=$('.--color-picker-ui');
			var $close=$ui.find('.--close');	
			var $overlay=$ui.find('.--color-picker-ui-overlay');
			var $$block=$ui.find('.--color-picker-ui-block');
			var $title=$ui.find('.-title3');
			var current_code=false;				
			$overlay.click(function(){
				$ui.removeClass("--active");
			});
			$close.click(function(){
				$ui.removeClass("--active");
			});
			$ui.click(function(){
				
			});

			$ui.on("open", function(e, json){
				console.log("open");
				console.log(json);
				$active_el=json.$el;
				$title.html(json.title);
				$ui.addClass("--active");
			});
			$ui.on("close", function(e, json){
				$ui.removeClass("--active");
			});
			$$block.each(function(){				
				var $block=$(this);
				var code=$block.data("code");
				$block.click(function(){
					current_code=code;
					$ui.trigger("close");
					if($active_el){
						$active_el.trigger("change", [{code:code}])
					}
				})
			});
		}
		colorPickerUI();		
	});    
})(jQuery);
