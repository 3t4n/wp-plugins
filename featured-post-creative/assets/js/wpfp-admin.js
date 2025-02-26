( function( $ ) {

	"use strict";

	// Select Featured Post
	$( document ).on( 'click', '.wpfp-select-featured', function() {

		var current_obj	= $(this);
		var post_id		= $(this).attr('data-post-id');
		var feat_val	= 1;
		var nonce		= $(this).attr('data-nonce');

		if (current_obj.hasClass("dashicons-star-filled")){
			feat_val = 0;
		}

		var data = {
				action	: 'wpfp_update_featured_post',
				feat_id	: post_id,
				is_feat	: feat_val,
				nonce	: nonce,
			};

		$.post( ajaxurl, data, function(result) {

			if( result.success == 1 ) {
				if (feat_val == 0) {
					current_obj.removeClass("dashicons-star-filled").addClass("dashicons-star-empty");
				}else{
					current_obj.removeClass("dashicons-star-empty").addClass("dashicons-star-filled");
				}
			}
		});
	});

	/* WP Code Editor */
	if( Wpfp_Admin.code_editor == 1 && Wpfp_Admin.syntax_highlighting == 1) {
		jQuery('.wpfp-code-editor').each( function() {
			
			var cur_ele		= jQuery(this);
			var data_mode	= cur_ele.attr('data-mode');
			data_mode		= data_mode ? data_mode : 'css';

			if( cur_ele.hasClass('wpfp-code-editor-initialized') ) {
				return;
			}

			var editorSettings = wp.codeEditor.defaultSettings ? _.clone( wp.codeEditor.defaultSettings ) : {};
			editorSettings.codemirror = _.extend(
				{},
				editorSettings.codemirror,
				{
					indentUnit	: 2,
					tabSize		: 2,
					mode		: data_mode,
				}
			);
			var editor = wp.codeEditor.initialize( cur_ele, editorSettings );
			cur_ele.addClass('wpfp-code-editor-initialized');

			editor.codemirror.on( 'change', function( codemirror ) {
				cur_ele.val( codemirror.getValue() ).trigger( 'change' );
			});

			/* When post metabox is toggle */
			$(document).on('postbox-toggled', function( event, ele ) {
				if( $(ele).hasClass('closed') ) {
					return;
				}

				if( $(ele).find('.wpfp-code-editor').length > 0 ) {
					editor.codemirror.refresh();
				}
			});
		});
	}

	/* Click to Copy the Text */
	$(document).on('click', '.wpos-copy-clipboard', function() {
		var copyText = $(this);
		copyText.select();
		document.execCommand("copy");
	});
})( jQuery );