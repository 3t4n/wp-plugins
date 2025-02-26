/*!
* Awesome Responsive Photo Gallery - v1.2 - 12 January, 2025
* @realwebcare - https://www.realwebcare.com/
*/
jQuery(document).ready(function($) {
	/* $('#awrpg-loading-image').bind('ajaxStart', function(){
		$(this).css("display","inline-block");
	}).bind('ajaxComplete', function(){
		$(this).css("display","none");
	}); */
	$("#arp_gallery").click(function() {
		$("#awrpg_new").slideDown("slow");
		$("#arp_gallery").hide();
		$('#awrpg-sidebar').hide();
		$("#add_new_gallery h2").text("Enter Gallery Name");
		$(".gallery_list").css("display","none");
	});

	// Show span tag on mouse over
	$(".gallery_name").mouseover(function(){
		var linkid = $(this).attr("id");
		$("td#" + linkid + " span").css("display","inline-block");
	});

	// Hide span tag on mouse out
	$(".gallery_name").mouseout(function(){
		var linkid = $(this).attr("id");
		$("td#" + linkid + " span").css("display","none");
	});

	// Add/Edit Awesome Gallery
	$('#add_gallery, #edit_gallery').on('click', function() {
		$.awrpgprocessgallery();
	});

	// Delete only a selected gallery
	$('#awrpg_added, #awrpg_edited').on('click', function() {
		$.awrpgdeletegallery();
	});
});

( function($) {
	"use strict";
	// Add/Edit Awesome Gallery
	$.awrpgprocessgallery = function () {
		var awgallery;

		$('body').on('click', '#add_gallery, #edit_gallery', function() {
			awgallery = $(this).attr('data-id');

			// Show the modal with the "process gallery" message
			$('#awrpg-modal').fadeIn().find('.awrpg-modal-content').html(`
				<p>${awrpgajax.process_message}</p>
				<img src="${awrpgajax.loading_image}" alt="Loading..." />
			`);

			$.ajax({
				type: 'POST',
				url: awrpgajax.ajaxurl,
				data: {
					action: 'awrpg_process_gallery_option',
					awsmgallery: awgallery,
					nonce: awrpgajax.nonce
				},
				success:function(data, textStatus, XMLHttpRequest){
					// Keep the "preview_message" visible for at least 2 seconds
					setTimeout(function() {
						// Update the modal with the success message
						$('#awrpg-modal .awrpg-modal-content').html(`<p>${awrpgajax.process_success}</p>`);
	
						// Hold the success message for 2 seconds
						setTimeout(function() {
							var linkid = '#awrpg_list';
							var replace_name = awgallery.replace(/_/g, ' ');
							var gallery_name = replace_name.replace(/^([a-z\u00E0-\u00FC])|\s+([a-z\u00E0-\u00FC])/g, function(m){ return m.toUpperCase() });
							$(linkid).html('');
							$("#arp_gallery").hide();
							// $('#awrpg-sidebar').hide();
							$('.get_started').hide();
							$(linkid).append(data);
							$("#add_new_gallery h2.gallery-header").text("Process " + gallery_name + " Options");
							$(".gallery_list").css("width","97%");
							// $(".postbox-container").css("width","75%");
							$('#tabs').tabs();	// Tabs
							$( "#gn-accordion" ).accordion({
								collapsible: true,
								active: false,
								heightStyle: "content"
							});
							$( "#gl-accordion" ).accordion({
								collapsible: true,
								active: false,
								heightStyle: "content"
							});
							$( "#lc-accordion" ).accordion({
								collapsible: true,
								active: false,
								heightStyle: "content"
							});
							$( "#jg-accordion" ).accordion({
								collapsible: true,
								active: false,
								heightStyle: "content"
							});
							$('#dialog_link, ul#icons li').hover(
								function() { $(this).addClass('ui-state-hover'); },
								function() { $(this).removeClass('ui-state-hover'); }
							);	//hover states on the static widgets
				
							$("#image_size").change(function() {
								var value = $(this).val();
								if(value === "custom") {
									$("#imageWidthHeight").slideDown("slow");
								} else {
									$("#imageWidthHeight").slideUp("slow");
								}
							});
							if($("#custom_size").is(":selected")) {
								$("#imageWidthHeight").css("display","block");
							}
				
							$("#border_style").change(function() {
								var value = $(this).val();
								if(value !== "none") {
									$("#thumbBorderWidth").slideDown("slow");
								} else {
									$("#thumbBorderWidth").slideUp("slow");
								}
							});
							if($("#none_on").is(":selected")) {
								$("#thumbBorderWidth").css("display","none");
							}
				
							$("#thumb_shadow").change(function() {
								var value = $(this).val();
								if(value === "true") {
									$("#thumbnailShadow").slideDown("slow");
								} else {
									$("#thumbnailShadow").slideUp("slow");
								}
							});
							if($("#shade_on").is(":selected")) {
								$("#thumbnailShadow").css("display","block");
							}
				
							$("#shareimg").change(function() {
								var value = $(this).val();
								if(value === "true") {
									$("#shareSocialMedia").slideDown("slow");
								} else {
									$("#shareSocialMedia").slideUp("slow");
								}
							});
							if($("#share_on").is(":selected")) {
								$("#shareSocialMedia").css("display","block");
							}
				
							$("#lc_iframe").change(function() {
								var value = $(this).val();
								if(value === "true") {
									$("#lcIframeElement").slideDown("slow");
								} else {
									$("#lcIframeElement").slideUp("slow");
								}
							});
							if($("#iframe_on").is(":selected")) {
								$("#lcIframeElement").css("display","block");
							}
				
							$("#lc_voption").change(function() {
								var value = $(this).val();
								if(value === "true") {
									$("#lcVideoOption").slideDown("slow");
								} else {
									$("#lcVideoOption").slideUp("slow");
								}
							});
							if($("#video_on").is(":selected")) {
								$("#lcVideoOption").css("display","block");
							}
				
							$("#jg_thumbnail").change(function() {
								var value = $(this).val();
								if(value === "true") {
									$("#jgalleryThumbnails").slideDown("slow");
								} else {
									$("#jgalleryThumbnails").slideUp("slow");
								}
							});
							if($("#thumb_on").is(":selected")) {
								$("#jgalleryThumbnails").css("display","block");
							}
				
							$('.overlay_color').wpColorPicker();
							$('.border_color').wpColorPicker();
							$('.shadow_color').wpColorPicker();
							$('.info_bg').wpColorPicker();
							$('.info_title').wpColorPicker();
							$('.info_caption').wpColorPicker();

							// Edit team member, member info and column settings
							$('#awrpg_process').on('click', function() {
								$.awrpggalleryoptions();
							});

							// Fade out the modal after a brief delay
							setTimeout(function() {
								$('#awrpg-modal').fadeOut();
							}, 1000); // 1 second delay after reload
						}, 1000); // Hold the success message for 2 seconds
					}, 2000); // Hold the "columns_success" message for 2 seconds
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.error('An error occurred:', textStatus, '-', errorThrown);

					// Update the modal with an error message
					$('#awrpg-modal .awrpg-modal-content').html(`
						<p>${awrpgajax.error_message}</p>
					`);
	
					// Hide the modal after 2 seconds
					setTimeout(function() {
						$('#awrpg-modal').fadeOut();
					}, 2000);
				}
			});
		});
	};

	// save member options
	$.awrpggalleryoptions = function () {
		// let submitted = false;
		var submitted = $('#submitted').val();
		// Get the form.
		const form = $('#awrpg_edit_form');
		// Get the messages div.
		const formMessages = $('#form-messages');
		// Bind the click event of the submit button
		form.off('submit').on('submit', function(event) {
			// Prevent the form from submitting normally
			event.preventDefault();
			// Get the form data
			const formData = $(this).serialize();
			const setGalleryURL = form.find('input[name="set_gallery"]').val();
			// const setGalleryURL = awrpgajax.ajaxurl; // Use localized data for consistency
			// console.log(setGalleryURL);

			// Show the modal with the "update gallery" message
			$('#awrpg-modal').fadeIn().find('.awrpg-modal-content').html(`
				<p>${awrpgajax.update_gallery}</p>
				<img src="${awrpgajax.loading_image}" alt="Loading" />
			`);

			// Submit the form via AJAX
			$.ajax({
				type: 'POST',
				// url: setGalleryURL,
				url: awrpgajax.ajaxurl, // Corrected URL
				data: formData + '&action=' + setGalleryURL, // Add action here
				success: function(response) {
					// Hold the "updating table" message for 2 seconds
					setTimeout(function() {
						// Update the modal with the success message
						$('#awrpg-modal .awrpg-modal-content').html(`
							<p>${awrpgajax.update_success}</p>
						`);

						// After 2 seconds, hide the modal and proceed
						setTimeout(function() {
							$('#awrpg-modal').fadeOut('slow', function() {
								// Make sure that the formMessages div has the 'success' class.
								$(formMessages).addClass('success').css('display', 'block');
								// Clear the form and retrieve it again.
								$(form).hide().fadeIn(1000);
								$('html, body').animate({ scrollTop: 0 }, 0);
								$('body').on('click', '.awrpg_close', function() {
									$(formMessages).fadeOut('slow');
								});

								if (submitted === 'no') {
									window.location.reload();
								}
							});
						}, 2000); // Hold the success message for 2 seconds
					}, 2000); // Hold the "updating table" message for 2 seconds
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.error('An error occurred:', textStatus, '-', errorThrown);

					// Update the modal with an error message
					$('#awrpg-modal .awrpg-modal-content').html(`
						<p>${awrpgajax.update_error}</p>
					`);
	
					// Hide the modal after 2 seconds
					setTimeout(function() {
						$('#awrpg-modal').fadeOut();
					}, 2000);
				}
			});
		});
	};

	// Delete only a selected gallery
	$.awrpgdeletegallery = function () {
		var awgallery;
		var customMessage = "Are you sure you want to delete this gallery?";

		$('body').on('click', '#awrpg_added, #awrpg_edited', function() {
			awgallery = $(this).attr('data-id');
	
			// Set the dynamic message in the modal
			$('#awrpg-confirm-modal .awrpg-modal-content p').text(customMessage);

			// Show the custom confirmation modal
			$('#awrpg-confirm-modal').fadeIn(400);

			// Handle the "Yes" button in the confirmation modal
			$('#awrpg-confirm-yes').off('click').on('click', function () {
				// Hide the confirmation modal
				$('#awrpg-confirm-modal').addClass('hide').delay(500).fadeOut(0);

				// Show the modal with the "deleting" message
				$('#awrpg-modal').fadeIn().find('.awrpg-modal-content').html(`
					<p>${awrpgajax.deleting_message}</p>
					<img src="${awrpgajax.loading_image}" alt="Loading..." />
				`);

				$.ajax({
					type: 'POST',
					url: awrpgajax.ajaxurl,
					data: {
						action: 'awrpg_delete_awesome_gallery',
						awsmgallery: awgallery,
						nonce: awrpgajax.nonce
					},
					success: function(data, textStatus, XMLHttpRequest) {
						// Hold the "creating_message" for 2 seconds
						setTimeout(function() {
							// After 2 seconds, update the modal with the success message
							$('#awrpg-modal .awrpg-modal-content').html(`<p>${awrpgajax.deleting_success}</p>`);
							
							// Reload the page after another 2 seconds (optional delay for success message visibility)
							setTimeout(function() {
								var linkid = '#awrpg_' + awgallery;
								$(linkid).remove();
								$(linkid).append(data);
								window.location.reload();
							}, 2000); // 2 seconds delay
						}, 2000); // Hold for 2 seconds
					},
					error: function(MLHttpRequest, textStatus, errorThrown) {
						// Update the modal with the error message
						$('#awrpg-modal .awrpg-modal-content').html(`<p>${awrpgajax.error_message}</p>`);
						setTimeout(function() {
							$('#awrpg-modal').fadeOut();
						}, 2000); // Hide the modal after 2 seconds
					}
				});
				e.preventDefault();
			});

			// Handle the "No" button in the confirmation modal
			$('#awrpg-confirm-no').off('click').on('click', function () {
				// Hide the confirmation modal
				$('#awrpg-confirm-modal').fadeOut();
				window.location.reload();
			});
		});
	};
})(jQuery);
