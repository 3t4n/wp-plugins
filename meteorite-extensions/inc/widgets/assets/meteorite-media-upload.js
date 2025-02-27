(function($){
	/* 
     * Important! SO Page Builder adds the HTML form only after clicking edit, so until then there is no $('.mt-media-uploader').
     * Therefore we need to call the functions again after the panel is open.
     * See https://siteorigin.com/docs/page-builder/widget-compatibility/
     **/
	$(document).on('panelsopen ready', function(e) {
		var dialog = $(e.target);
		// Check that this is for our widget class
		if( !dialog.has('.some-unique-widget-form-class') ) return;

		// Here we can setup our widget form.
		MeteoriteInitMediaUploader();
	});


function MeteoriteInitMediaUploader() {
	if ( $('.mt-media-uploader').length ) {
		$('.mt-media-uploader').each(function() {

			var fileFrame;
			var uploadUrl;
			var uploadImageHolder;
			var attachment;
			var removeButton;

			//set variables values
			uploadUrl           = $(this).find('.mt-media-upload-url');
			uploadImageHolder   = $(this).find('.mt-media-image-holder');
			removeButton        = $(this).find('.mt-media-remove-btn');

			if ( uploadImageHolder.find('img').attr('src') != "" ) {
				removeButton.show();
				MeteoriteInitMediaRemoveBtn(removeButton);
			}

			$(this).on( 'click', '.mt-media-upload-btn', function(e) {

				e.preventDefault();

				//if the media frame already exists, reopen it.
				if (fileFrame) {
					// fileFrame.open();
					return;
				}

				//create the media frame
				fileFrame = wp.media.frames.fileFrame = wp.media({
					title: "Choose An Image",
					button: {
						text: "Select"
					},
					library: {
						type: 'image'
					},
					multiple: false
				});

				//when an image is selected, run a callback
				fileFrame.on( 'select', function() {
					attachment = fileFrame.state().get('selection').first().toJSON();
					removeButton.show();
					MeteoriteInitMediaRemoveBtn(removeButton);
					//write to url field and img tag
					 if ( attachment.hasOwnProperty('url') ) {
						uploadUrl.val(attachment.url);
						uploadImageHolder.find('img').attr('src', attachment.url);
						uploadImageHolder.show();
					}
				});

				//open media frame
				fileFrame.open();
				return;
			});
		});
	}

	function MeteoriteInitMediaRemoveBtn(btn) {
		btn.on('click', function() {
			//remove image src and hide it's holder
			btn.siblings('.mt-media-image-holder').hide();
			btn.siblings('.mt-media-image-holder').find('img').attr('src', '');

			//hide butten
			btn.hide();

			//reset meta fields
			btn.siblings('.mt-media-meta-fields').find('input[type=hidden]').val('');
		});
	}
 }

})(jQuery);
