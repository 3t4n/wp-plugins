jQuery.noConflict();

jQuery(function() {

	if (jQuery('.caroles').length > 0) {

		// Write checkbox set's values into associated string (text/hidden) input
		jQuery('.caroles input[type=checkbox][data-rel-id]').change(function() {
			var rel_id = jQuery(this).attr('data-rel-id');
			var rel_val = jQuery('.caroles input[type=checkbox][data-rel-id="'+rel_id+'"]:checked').map(function() { return this.value; }).get().join(',')
			jQuery('#'+rel_id).val(rel_val);
		});

		// Tabbed admin content prep
		jQuery('.caroles #caroles-tab-sections > .caroles-tab-content').hide();
		jQuery('.caroles #caroles-tab-sections > .caroles-tab-content:first-of-type').show();
		
		// Tabbed admin content interaction
		jQuery('.caroles .nav-tab-wrapper a').click(function() {
			jQuery('.caroles .nav-tab-wrapper a').removeClass('nav-tab-active');
			jQuery(this).addClass('nav-tab-active');
			jQuery('.caroles #caroles-tab-sections > .caroles-tab-content').hide();
			jQuery('.caroles #caroles-tab-sections > .caroles-tab-content').eq(jQuery(this).index()).show();
			return false;
		});
	
	}

});