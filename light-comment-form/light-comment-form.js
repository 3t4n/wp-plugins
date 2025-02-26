jQuery(document).ready(function(){
	/* Initialization */
	// jQuery("input:not([value]),input[value='']",'#commentform').addClass('empty'); nestrādā
	jQuery("input, textarea",'#commentform').each(function(){
		if(jQuery(this).val()===''){
			jQuery(this).addClass('empty');
		}
	})

	/* Input event handling */
	jQuery('input, textarea','#commentform').on('input keyup', function() {
		jQuery(this).toggleClass('empty', !Boolean(jQuery(this).val()));
	});
})


