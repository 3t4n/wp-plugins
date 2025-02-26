jQuery(document).ready(function($) {

    if ($('body').find("#nofeature-message").length === 0) {
		$('h2').after('<div id="nofeature-message"></div>');
    }

	if ($('body').find("#postimagediv").length === 	1) {
		setInterval(detectWarnFeaturedImageMsg, 3000);
		detectWarnFeaturedImageMsg();
	}
	
    function detectWarnFeaturedImageMsg() {
		if( $('#postimagediv').find('img').length === 0 ) {
			$('#nofeature-message').addClass("error").html('<p><strong>Featured Image is not set.</strong> Please set featured image so you can publish your post.</p>');
			$('#publish').attr('disabled','disabled');
		} else {
			$('#nofeature-message').remove();
			$('#publish').removeAttr('disabled');
		}
	}

});
