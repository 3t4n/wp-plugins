(function ($) {

	function blocksolid_file_download(filename, text) {
		var element = document.createElement('a');
		element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
		element.setAttribute('download', filename);
		element.style.display = 'none';
		document.body.appendChild(element);
		element.click();
		document.body.removeChild(element);
	}

	$("#save_controlled_palette").on('click',(function(event) {

		event.preventDefault();
		var blocksolid_controlled_palette_content = "";

		$.ajax({
			url : blocksolid_ajax_object.ajax_url,
			type : 'post', //POST or GET
			data : {
				action : 'get_current_blocksolid_controlled_palette',
				security : blocksolid_ajax_object.security
			},
	        beforeSend: function() {
				//console.log("about to send");
	        },
	        success: function(response) {
				blocksolid_controlled_palette_content = response;
				blocksolid_file_download("blocksolid-example-palette.css",blocksolid_controlled_palette_content);
	        },
	        error: function() {
				console.log("error");
	        }
		});
    }));

	$("#blocksolid_export_settings").on('click',(function(event) {

		event.preventDefault();
		var blocksolid_export_settings_content = "";

		$.ajax({
			url : blocksolid_ajax_object.ajax_url,
			type : 'post', //POST or GET
			data : {
				action : 'blocksolid_export_settings',
				security : blocksolid_ajax_object.security
			},
	        beforeSend: function() {
				//console.log("about to send");
	        },
	        success: function(response) {
				blocksolid_export_settings_content = response;
				blocksolid_file_download("blocksolid-exported-settings.txt",blocksolid_export_settings_content);
	        },
	        error: function() {
				console.log("error");
	        }
		});
    }));

    $("#blocksolid_import_settings").on('click',(function(e) {
		e.preventDefault();
		var blocksolid_export_settings_content = "";

        var formData = new FormData();
        var importFiles = $('#blocksolid_settings_input')[0].files;

        // For EACH file, append to formData.
        // NOTE: Just appending all of importFiles doesn't transition well to PHP.
        $.each( importFiles, function( index, value ) {
            var name = 'file_' + index;
            formData.append( name, value )
        });

        formData.append( 'action', 'blocksolid_import_settings' );
        formData.append( 'security', blocksolid_ajax_object.security );

		$.ajax({
			url : blocksolid_ajax_object.ajax_url,
			type : 'post', //POST or GET
			data : formData,
            cache: false,
            dataType: 'text', // This replaces dataFilter: function() && JSON.parse( data ).
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
	        beforeSend: function() {
				$('#blocksolid_file_upload_message').html('Reading file...');
	        },
	        success: function(response) {
				blocksolid_export_settings_content = response;
                //console.log(blocksolid_export_settings_content);
                $('#blocksolid_file_upload_message').html(blocksolid_export_settings_content);

                if (blocksolid_export_settings_content == "Success"){
                    location.reload();
                }

	        },
	        error: function() {
				console.log("error");
	        }
		});
    }));

})(jQuery);