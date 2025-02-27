/**
 * Custom jQuery for Custom Metaboxes and Fields
 */
jQuery(document).ready( function($) {
        
        /* --------------------------------------------------------------------------------------------------
         Alpha Color Picker
         ------------------------------------------------------------------------------------------------- */
        jQuery( 'input.alpha-colorpicker' ).alphaColorPicker();
	

	/* --------------------------------------------------------------------------------------------------
         Icon Picker
         ------------------------------------------------------------------------------------------------- */
        jQuery('.icon-picker').fontIconPicker({ emptyIcon: false, hasSearch: false }); // Load with default options


        /* --------------------------------------------------------------------------------------------------
         jQuery UI Tabs
         ------------------------------------------------------------------------------------------------- */
        jQuery( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
        jQuery( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
        

        /* --------------------------------------------------------------------------------------------------
         JQuery UI Sortable
         ------------------------------------------------------------------------------------------------- */
        jQuery( ".sortable" ).sortable({ axis: 'y' });


        /* --------------------------------------------------------------------------------------------------
         JQuery UI Slider
         ------------------------------------------------------------------------------------------------- */
        jQuery( ".slider" ).slider({
		min: 0,
		max: 1,
		step: 0.1,
		create: function () {
			jQuery(this).slider( "option", "value", jQuery( "#" + jQuery(this).data('slider') ).val() );
		},
		slide: function( event, ui ) {           
			jQuery( "#" + jQuery(this).data('slider') ).val( ui.value );
		}
	});


	/* --------------------------------------------------------------------------------------------------
         Group Functions
         ------------------------------------------------------------------------------------------------- */
        jQuery('.admin-wrap').on( 'click', '.add-group', function() {
                var self = jQuery(this),
                    id = self.attr('id').replace('_add', ''),
                    max = self.attr('data-count') ? self.attr('data-count') : -1;

		if( max > 0 ) {
			var current_count = jQuery('#' + id).find('.' + self.attr('data-count-class')).length;

			if( current_count < max ) {
				add_group( id );
			}

			if( current_count > max - 1 ) {
				self.addClass('tooltip');
			}
		} else {
			add_group( id );
		}
        });
        
        jQuery('.admin-wrap').on( 'click', '.delete-group', function() {
        	var tar = jQuery("#" + jQuery(this).attr('id').replace('delete_', ''));

        	jQuery('#' + tar.parent().attr('id') + '_add').removeClass('tooltip');
                tar.remove();
        });
        
        function unique() {
                return Math.round(new Date().getTime() + (Math.random() * 100));
        }
        
        function add_group( id ) {
                var $sample = jQuery("#" + id + "_"),
                    count = unique(),
                    regex = new RegExp( jQuery("#" + id).data('group-placeholder'), "g" ),
                    repeat = $sample.clone().html().replace(regex, count);

                jQuery('#' + id ).append(repeat);
              	jQuery('#' + id + '_' + count).find('.iconpicker-init').fontIconPicker({ emptyIcon: false });
        }

   
        /* --------------------------------------------------------------------------------------------------
         Media Uploader
         ------------------------------------------------------------------------------------------------- */
        jQuery('.uploader').on('click', '.upload_image_button', function(e) {
                e.preventDefault();
                
                var button = $(this),
                    upload_id = button.attr('id'),
                    lib = button.attr('data-lib'),
                    multiple = button.attr('data-multiple') == 'true' ? true : false,
                    input_id = button.attr('data-input-name');

                var custom_uploader = wp.media({
                        title: cmb_vars.mediaTitle,
                        button: {
                                text: cmb_vars.mediaButton
                        },
                        library: {
                                type: lib
                        },
                        frame: 'select',
                        multiple: multiple  // Set this to true to allow multiple files to be selected
                }).on('select', function() {
                        var selections = custom_uploader.state().get('selection');
                        selections.each(function(selection) {
                                attachment = selection.toJSON();
                                
                                if ( lib == 'image' ) {
                                        var size = (typeof (attachment.sizes["full"]) == 'undefined') ? attachment : attachment.sizes["full"],
                                            btn_parent = button.parent().parent().parent(),
                                            img_id = multiple == true ? upload_id + '_' + attachment.id : upload_id,
                                            input_name = multiple == true ? '[' + input_id + '][]' : '[' + input_id + ']';

                                        btn_parent.find(".image-preview").append('<li id="' + img_id + '">'
                                                                 + '<img src="' + size.url +'">'
                                                                 + '<a href="javascript:;" id="delete-' + img_id + '" class="cmb-button small-button delete-media" data-input-name="' + input_id + '">&times;</a>'
                                                                 + '<input type="hidden" id="' + input_id + '_' + attachment.id + '" name="' + cmb_vars.options + input_name + '" value="' + attachment.id + '">'
                                                                 + '</li>');

                                        if( multiple != true ) button.hide();
                                } else {
                                        button.after('<div id="' + upload_id + attachment.id + '"><span class="description">' + attachment.url + '</span><a href="javascript:;" id="delete-' + upload_id + attachment.id + '" class="cmb-button small-button delete-media" data-input-name="' + input_id + '">&times;</a></div>');
                                        button.parent().find('input').val(attachment.id);
                                        button.hide();
                                }
                        });
                })
                .open();
        });
        
        /* --------------------------------------------------------------------------------------------------
         Delete Media
         ------------------------------------------------------------------------------------------------- */
        jQuery('.admin-wrap').on( 'click', '.delete-media', function() {
                
                var button = $(this),
                    attach_id = button.attr('id').replace('delete-',''),
                    media = $('#' + attach_id),
                    input_id = button.data('input-name');
                    
                media.addClass('loading');
                (button.parent().parent().parent()).find('.uploader .cmb-button').show();
                media.remove();
                $('#' + input_id).val('');
        });


        /* --------------------------------------------------------------------------------------------------
         Conditional Show / Hide
         ------------------------------------------------------------------------------------------------- */
        jQuery('.select-change').change(function() {
                var self = jQuery(this),
                    id = self.attr('id'),
                    fields = jQuery('*[data-check-field*="' + id + '"]');

                if ( self.attr('type') == 'checkbox' ) {
                        var value = self.is(':checked') ? '1' : '0';
                } else {
                        var value = self.val();
                }
                
                fields.hide();

                if ( value.length > 0 ) {
                	for( var i = 0; i < fields.length; i++ ) {

                		var curr_fields = jQuery( fields[i] ),
                		    check_all = curr_fields.attr('data-check-field').indexOf(',') >= 0 ? curr_fields.attr('data-check-field').split(',') : [],
                		    show_field = false;

                		if( (curr_fields.attr('data-check-value')).indexOf(id + '-' + value) >= 0  ) {
                			show_field = true;
                		}

        			for( var k = 0; k < check_all.length; k++ ) {
        				if( check_all[ k ] != id ) {
        					var new_check = jQuery('#' + check_all[ k] );

        					if ( new_check.attr('type') == 'checkbox' ) {
				                        var new_value = new_check.is(':checked') ? '1' : '0';
				                } else {
				                        var new_value = new_check.val();
				                }
        					
        					if( (curr_fields.attr('data-check-value')).indexOf(check_all[ k ] + '-' + new_value) === -1  ) {
		                			show_field = false;
		                			break;
		                		}
        				}
        			}

                		if( show_field ) {
                			curr_fields.fadeIn(500);
                		}
                	}
                }
        });


        /* --------------------------------------------------------------------------------------------------
         Google Fonts Dropdown
         ------------------------------------------------------------------------------------------------- */
        jQuery('#font_family').change( function() {
                var self = jQuery(this).find(':selected'),
                    variants = self.data('variants'),
                    $variants = jQuery('#font_variant').empty(),
                    subsets = self.data('subsets'),
                    $subsets = jQuery('#font_subset').empty(),
                    backup = self.data('backup'),
                    $backup = jQuery('#font_backup');

                update_select($variants, variants);
                update_select($subsets, subsets);
                $backup.val('');
                
                if ( typeof backup != 'undefined' && backup.length > 0 ) {
                        $backup.val(backup);
                }
                
                function update_select(el, data) {
                        el.hide();
                        
                        if ( typeof data != 'undefined' && data.length > 0 ) {
                                data = data.split(',');
                                
                                for( var i = 0; i < data.length; i++ ) {
                                        el.append('<option value="' + data[i] + '">' + ucFirst( data[i] ) + '</option>');
                                }
                                el.show();
                        }
                }
        });


        /* --------------------------------------------------------------------------------------------------
         Delete Media
         ------------------------------------------------------------------------------------------------- */
        jQuery('.select-radio').click(function() {
                $(this).find('input[type="radio"]').attr('checked', 'checked');    
        });

        
        /* --------------------------------------------------------------------------------------------------
         Export / Import Functions
         ------------------------------------------------------------------------------------------------- */
        jQuery('.import-options').click(function(){

        	jQuery('#loginstyle_result').remove();

        	if( confirm( cmb_vars.confirm ) )  {
        		jQuery('#tabs').addClass('loading');

	                var self = jQuery(this);

	                jQuery.ajax({
	                        type : "post",
	                        dataType : "json",
	                        url : ajaxurl,
	                        data : {
	                                action: "loginstyle_import",
	                                nonce: self.attr('data-nonce'),
	                                file: self.attr('data-file')
	                        },
	                        success: function(response) {
	                                if( response.success ) {
	                                	window.location.href = document.location + '&template=success';
	                                } else if ( response.error ) {
	                                	jQuery('#tabs').before('<div id="loginstyle_result" class="error"><p><strong>' + response.error + '</strong></p></div>');
	                        		jQuery('#tabs').removeClass('loading');
	                                }
	                        }
	                });
		}
        });

        /* --------------------------------------------------------------------------------------------------
         Helper Functions
         ------------------------------------------------------------------------------------------------- */
        function ucFirst(string) {
		return string.charAt(0).toUpperCase() + string.slice(1);
	}
});
