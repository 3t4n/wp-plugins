jQuery(document).ready(function($) {

	function renderButton() {
	
		$('ul.foogallery-attachments-list li.attachment').each(function() {

			$(this).find('a.captions').remove();

			var self 		= $(this),
				container 	= self.find('.attachment-preview'),
				attachment 	= self.data('attachment-id'),
				post_id 	= $('li.add-attachment a').data('post-id'),
				url 		= 'admin-ajax.php?action=foogallery_captions&attachment='+ attachment +'&post='+ post_id;

			container.append('<a class="captions" href="'+ url +'"><span class="dashicons dashicons-id"></span></a>')

		});

	}

	$(window).on('load', renderButton);
	$(document).ajaxComplete(renderButton);

	$('ul.foogallery-attachments-list li.attachment').on('click', 'a.captions', function(e) {
		e.preventDefault();

		var modal = $('body').append('<div id="caption-modal" class="caption-modal"></div>');

		var modal = $('#caption-modal');

		modal.load($(this).attr('href'));
	});

	$('body').on('click', '#caption-modal .close', function() {
		$('#caption-modal').remove();
	});

	$('body').on('click', '#caption-modal .button', function() {

		var modal = $('#caption-modal'),
			post = modal.find('#foogallery-caption-post').val(),
			attachment = modal.find('#foogallery-caption-attachment').val(),
			captions = {};

		modal.find('.setting').each(function() {
			var key = $(this).data('setting'),
				content = $(this).find('input');

			if( content.length === 0 ) {
				content = $(this).find('textarea');
			}

			captions[key] = content.val();

		});

		var container = $('#foogallery_captions');

		if( container.length === 0 ) {
			$('#post-body-content').append('<div id="foogallery_captions" />');
			container = $('#foogallery_captions');
		}

		$.each(captions, function(key, value) {
			var input = container.find('input#foogallery-captions-'+attachment+'-'+ key);

			if( input.length === 0 ) {
				container.prepend('<input type="hidden" id="foogallery-captions-'+attachment+'-'+ key +'" name="foogallery_captions['+attachment+']['+ key +']" value="" />');
				input = container.find('input#foogallery-captions-'+attachment+'-'+ key);
			}

			input.val(value);
		});

		modal.find('.close').trigger('click');

	});

});