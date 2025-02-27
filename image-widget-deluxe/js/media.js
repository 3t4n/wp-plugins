/**
 * Image Widget Deluxe.
 */
(function ($) {
	'use strict';

	var mediaUploader;

	/**
	 * Fire up the whole ting.
	 */
	$(document).on('widget-added ready', function () {
		setupToggleEvents();
		removeImage();
		sortElements();
	});

	/**
	 * Setup toggle events.
	 */
	function setupToggleEvents() {
		var toggle = document.querySelectorAll('.image-widget-deluxe--select-image');
		for (var i = 0; i < toggle.length; i++) {
			var isProcssed = toggle[i].getAttribute('data-iwd-processed');
			if (!isProcssed) {
				toggle[i].addEventListener('click', initMediaUpload, false);
				toggle[i].setAttribute('data-iwd-processed', '1');
			}
		}
	}

	/**
	 * Media Upload.
	 */
	function initMediaUpload(e) {
		e.preventDefault();

		var imageInputFieldId = e.target.getAttribute('data-image-id');
		var widgetTitleId = e.target.getAttribute('data-parent');
		var imageInputField = document.getElementById(imageInputFieldId);
		var previewImage = document.getElementById(imageInputFieldId + '-preview');
		var removeImage = document.getElementById(imageInputFieldId + '-remove');
		var imageInputFieldOptionsId = imageInputField.getAttribute('data-image-options');

		// Extend the wp.media object.
		mediaUploader = wp.media({
			title: ImageWidgetDeluxe.frame_title,
			button: {
				text: ImageWidgetDeluxe.button_title
			},
			multiple: false
		});

		// When a file is selected, grab the URL and set it as the text field's value.
		mediaUploader.on('select', function () {
			var attachment = mediaUploader.state().get('selection').first().toJSON();
			var optionsImage = document.getElementById(imageInputFieldOptionsId);

			// Update the image input field which we save the ID in.
			imageInputField.value = attachment.url + '?id=' + attachment.id;

			// Update the preview image.
			previewImage.src = attachment.url + '?id=' + attachment.id;
			previewImage.style.display = 'block';

			// Show the remove image.
			removeImage.style.display = 'block';

			// Show the image options.
			optionsImage.style.display = 'block';

			// Allows the user to save the changes by triggering a change so save widget becomes available.
			$('#' + widgetTitleId).trigger('change');
		});

		// Open the uploader dialog.
		mediaUploader.open();
	}

	/**
	 * Remove image.
	 */
	function removeImage() {
		var toggle = document.querySelectorAll('.image-widget-deluxe--remove-image');
		[].forEach.call(toggle, function (toggle) {
			toggle.addEventListener('click', function (e) {
				e.preventDefault();

				var imageInputFieldId = e.target.getAttribute('data-image-id');
				var imagePreview = document.getElementById(imageInputFieldId + '-preview');
				var image = document.getElementById(imageInputFieldId);
				var imageOptions = document.getElementById(image.getAttribute('data-image-options'));

				// Remove the image value.
				image.value = '';

				// Update the preview with the placeholder.
				imagePreview.src = 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D';
				image.style.display = 'none';
				imageOptions.style.display = 'none';

				// Hide the "remove image".
				e.target.style.display = 'none';
			});
		});
	}

	/**
	 * Sorting elements.
	 */
	function sortElements() {
		var sort = $('.widget-image-sortable');
		sort.sortable({
			placeholder: "ui-state-highlight",
			opacity: 0.8,
			cursor: 'move',
			update: function (event, ui) {
				var self = $(this);
				var order = self.sortable("toArray");
				self.next().val(order.join(","));
			}
		});
		sort.disableSelection();
	}

})(jQuery);
