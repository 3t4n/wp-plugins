jQuery(document).ready(function($) {

	var field_names_wrap = $(".cf7bot_form_field_names_wrap");
	var field_names_first = $(".cf7bot_form_field_names_wrap > .cf7bot_form_field_names.first_field");
	var cf7_field = $('.cf7bot input.cf7-field');
	var cf7_field_names = cf7bot_get_cf7_fields();

	if( cf7_field_names ) $('.cf7bot .cf7bot_form_field_names_wrap').html(cf7_field_names);

	$('.cf7bot span.mailtag').click(function(event) {

		var range = document.createRange();

		range.selectNodeContents(this);
		window.getSelection().addRange(range);

	});

	field_names_wrap.on("click", ".add_field", function(event) {
		
		event.preventDefault();

		var cloned = field_names_first.clone();

		cloned.removeClass("first_field");
		cloned.find("input").val("");
		cloned.append('<a href="#" class="button remove_field">Remove Field</a>');
		cloned.appendTo(field_names_wrap);
		cloned.hide();
		
		cloned.slideDown(150, function() {
			
			cloned.find("input").eq(0).focus();

		});

	});

	field_names_wrap.on("click", ".remove_field", function(event) {

		event.preventDefault();

		var parent_field = $(this).parent(".cf7bot_form_field_names");

		parent_field.slideUp(150, function() {

			parent_field.remove();
			
		});

	});

	function cf7bot_get_cf7_fields() {

		var mail_tags = $('#wpcf7-mail span.mailtag');
		var cf7_field_names = '';

		if( mail_tags.length > 0 ) {

			mail_tags.each(function(index, el) {

				var value = $(el).text();
				var tagName = value.replace('[','').replace(']','');
				var tagValue = '';
				tagValue = $('[data-field-name="'+tagName+'"]').val();

				//cf7_field_names += '<span class="mailtag code">' + value + '</span>';
				cf7_field_names += '<span class="cf7bot_form_field_names first_field">' +
					'<input name="cf7bot_hs_field[]" placeholder="Form Field Value" class="medium-text code hs-field " readonly value="'+tagName+'" type="text">' +
					'<i class="icon-arrow-right"></i>' +
					'<input name="cf7bot_cf7_field[]" placeholder="Bot Question" class="medium-text code cf7-field" value="'+tagValue+'" type="text">' +
					'</span>';

			});
		}
		return cf7_field_names;

	}

	/*
	* File Upload
	* */
    var icon_uploader = [];

    $('.remove_icon_cf7bot').click(function(e) {
        var that = $(this);
        $('#'+that.data('input')).val('');
        $('#'+that.data('image')).hide();
    });
    $('.upload_icon_cf7bot').click(function(e) {
		var that = $(this);
        //e.preventDefault();

        //If the uploader object has already been created, reopen the dialog
        if (icon_uploader[that.data('input')]) {
            icon_uploader[that.data('input')].open();
            return;
        }

        //Extend the wp.media object
        icon_uploader[that.data('input')] = wp.media.frames.file_frame = wp.media({
            title: that.attr('title'),
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        icon_uploader[that.data('input')].on('open', function() {
            var selection = icon_uploader[that.data('input')].state().get('selection');
            var selected = $('#'+that.data('input')).val(); // the id of the image
			console.log(selected);
            if (selected) {
                selection.add(wp.media.attachment(selected));
            }
        });
        icon_uploader[that.data('input')].on('select', function() {
            console.log(icon_uploader[that.data('input')].state().get('selection').toJSON());
            attachment = icon_uploader[that.data('input')].state().get('selection').first().toJSON();
            $('#'+that.data('input')).val(attachment.id);
            $('#'+that.data('image')).attr('src',attachment.url).show()
        });

        //Open the uploader dialog
        icon_uploader[that.data('input')].open();

    });

});