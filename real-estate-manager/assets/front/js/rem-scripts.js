jQuery(document).ready(function($) {

	// Apply Labeluty
	jQuery(".labelauty").labelauty();

	// Apply DropDown
	jQuery(function(){
		var $selects = jQuery('.ich-settings-main-wrap select');
		$selects.easyDropDown({
			onChange: function(selected){}
		});
	});



		
});