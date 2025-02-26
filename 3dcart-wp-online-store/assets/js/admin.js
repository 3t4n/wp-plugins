jQuery(function() {

	var $form = jQuery('#shift4shop_options');

	$form.submit(function(e) {

		var url = jQuery("#shift4shop_siteurl").val();
		var pattern = /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/;

		if(!pattern.test(url)) {
			alert('Please enter a valid URL.');
			e.preventDefault();
			return false;
		}
	});

});