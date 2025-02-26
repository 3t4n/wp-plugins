jQuery(document).on('panelsopen', function(e) {
	jQuery('.so-panels-dialog-wrapper .so-content .color-picker').wpColorPicker();
});

			//CUSTOMIZER & WIDGET COLRPICKER FIELD
			( function( $ ){

					function initColorPicker( widget ) {
						widget.find( '.color-picker' ).wpColorPicker( {
							change: _.throttle( function() { // For Customizer
								$(this).trigger( 'change' );
							}, 2000 )
						});
					}

					function onFormUpdate( event, widget ) {
						initColorPicker( widget );
					}

					$( document ).on( 'widget-added widget-updated', onFormUpdate );

					$( document ).ready( function() {
						$( '#widgets-right .widget:has(.color-picker), .so-panels-dialog-wrapper .so-content .color-picker' ).each( function () {
							initColorPicker( $( this ) );
						} );
					} );

			}( jQuery ) );



//BLOCK WIDGET ACCORDION
jQuery(document).on( 'panelsopen', function(e) {
    jQuery('.so-panels-dialog-wrapper .so-content .block_accordion h4').toggle(function() {
      jQuery(this).parent().addClass('acc_active');
      jQuery(this).next().slideDown();
    },function(){
      jQuery(this).parent().removeClass('acc_active');
      jQuery(this).next().slideUp();
    });

});




			//REPEATER FIELD OPEN/CLOSE
			function repeatOpen(repeatparent){
				//console.log(repeatparent);
				var hidden = jQuery('#'+repeatparent).parent().find('input:eq(0)').is(":hidden");
				var visible = jQuery('#'+repeatparent).parent().find('input:eq(0)').is(":visible");
				if(hidden){
					jQuery('#'+repeatparent).parent().addClass('repeatopen');
				}
				if(visible){
					jQuery('#'+repeatparent).parent().removeClass('repeatopen');
				}
			}


			//BLOCK WIDGET ACCORDION
			jQuery(document).on( 'ready widget-updated widget-added', function() {
					jQuery('.block_accordion h4').toggle(function() {
						jQuery(this).parent().addClass('acc_active');
						jQuery(this).next().slideDown();
					},function(){
						jQuery(this).parent().removeClass('acc_active');
						jQuery(this).next().slideUp();
					});

			});



jQuery( document ).on( 'load ready widget-added widget-updated', function () {

	jQuery(document).on("click", ".remove-field", function(e) {
		jQuery(this).parent().remove();
	});
});



//Widget MEDIAPICKER PLUGIN
	 //MEDIA PICKER FUNCTION
	 function mediaPicker(pickerid){
		var custom_uploader;
		var row_id
        //e.preventDefault();
		row_id = jQuery('#'+pickerid).prev().attr('id');

        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
        	custom_uploader.open();
        	return;
        }

        //CREATE THE MEDIA WINDOW
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Insert Images',
            button: {
                text: 'Insert Images'
            },
			type: 'image',
            multiple: false
        });

        //"INSERT MEDIA" ACTION. PREVIEW IMAGE AND INSERT VALUE TO INPUT FIELD
		custom_uploader.on('select', function(){
		var selection = custom_uploader.state().get('selection');
			selection.map( function( attachment ) {
				attachment = attachment.toJSON();
				//INSERT THE SRC IN INPUT FIELD
				jQuery('#' + row_id).val(""+attachment.url+"").trigger('change');
					//APPEND THE PREVIEW IMAGE
					jQuery('#' + row_id).parent().find('.media-picker-preview, .media-picker-remove').remove();
					if(attachment.sizes.medium){
						jQuery('#' + row_id).parent().prepend('<img class="media-picker-preview" src="'+attachment.sizes.medium.url+'" /><i class="fa fa-times media-picker-remove"></i>');
					}else{
						jQuery('#' + row_id).parent().prepend('<img class="media-picker-preview" src="'+attachment.url+'" /><i class="fa fa-times media-picker-remove"></i>');
					}

			});
			jQuery(".media-picker-remove").on('click',function(e) {
				jQuery(this).parent().find('.media-picker').val('').trigger('change');
				jQuery(this).parent().find('.media-picker-preview, .media-picker-remove').remove();
			});
		});
        //OPEN THE MEDIA WINDOW
        custom_uploader.open();

    }


jQuery(document).on( 'ready widget-updated widget-added', function() {

	//jQuery(".media-picker-remove").unbind( "click" );
	jQuery(".media-picker-remove").on('click',function(e) {
		jQuery(this).parent().find('.media-picker').val('').trigger('change');
		jQuery(this).parent().find('.media-picker-preview, .media-picker-remove').remove();
	});

	//jQuery( ".media-picker-button").unbind( "click" );

});
