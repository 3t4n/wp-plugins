jQuery(document).ready(function(){
		
	jQuery('.awr-no-action-for-tools').hide();

	// On clic on radio, gray->black
	jQuery(".fdm-no-contact").on("click", function(event) {
	 	
	 	event.preventDefault();

	 	Swal.fire({
			icon: 'error',
			title: 'No contact found',
			text: 'No contact was found for this form!',
			/*footer: '<a href="">Why do I have this issue?</a>'*/
		})
	});

});