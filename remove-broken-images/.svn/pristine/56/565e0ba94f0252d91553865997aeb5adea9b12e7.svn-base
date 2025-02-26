/* Remove Broken Images by Room 34 Creative Services, LLC - https://room34.com */

function r34rbi(elem) {

	// Hook to allow custom behavior when a missing image is found
	jQuery(document).trigger('r34rbi_missing_image');
	
	// Identify parent 'a' and ancestor '.wp-caption' elements
	var ancestor_caption = elem.closest('.wp-caption');
	var parent_link = elem.parent('a');

	// If ancestor caption exists, remove it entirely
	if (ancestor_caption.length > 0) { ancestor_caption.remove(); }
	
	// If parent link exists, remove it entirely
	else if (parent_link.length > 0) { parent_link.remove(); }
	
	// Just remove the image
	else if (elem.length > 0) { elem.remove(); }
	
	// Also remove meta tags pointing to image (only works with crawlers that evaluate JavaScript)
	jQuery(document).find('meta[property="og:image"][content="' + elem.attr('src') + '"], meta[property="twitter:image"][content="' + elem.attr('src') + '"]').remove();

}

jQuery(function() {

	// Images in DOM on initial load
	jQuery('img').on('error', function() { r34rbi(jQuery(this)); });
	
	// Images inserted into DOM by AJAX
	jQuery(document).ajaxComplete(function() {
		jQuery('img').on('error', function() { r34rbi(jQuery(this)); });
	});

	// Redirect on missing image
	if (
		typeof r34rbi_redirect_on_missing_image != 'undefined'
		&& r34rbi_redirect_on_missing_image != ''
		&& r34rbi_redirect_on_missing_image != location.href
	)
	{
		jQuery(document).on('r34rbi_missing_image', function() {
			location.replace(r34rbi_redirect_on_missing_image);
		});
	}

});
