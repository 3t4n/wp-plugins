(function ( $ ) {
	'use strict';

	$(function () {
		
		$('#age_okay_pro_table').on( 'click', 'li', function() {
			var parent = $('#age_okay_pro_table');
			var pos = $(this).index() + 2;
			parent.find('tr').find('td:not(:eq(0))').hide();
			parent.find('td:nth-child('+pos+')').css('display','table-cell');
			parent.find('tr').find('th:not(:eq(0))').hide();
			parent.find('li').removeClass('age_okay_pro_active');
			$(this).addClass('age_okay_pro_active');
		});
		
		function editor_resize() {
			if ( mobile_check.width() > 0 && editor_mobile == true ) {
				editor_element.insertAfter( editor_iframe );
				editor_mobile = false;
			} else if ( mobile_check.width() <= 0 && editor_mobile == false ) {
				editor_element.insertBefore( editor_iframe );
				editor_mobile = true;
			}
		}
			
		if ( $('#age_okay_editor_td').length > 0 ) {
			var editor_mobile = false;
			var editor_element = $('#age_okay_editor_td');
			var editor_iframe = $('#age_okay_editor_iframe_td');
			var mobile_check = $('#age_okay_mobile_check');
			editor_resize();
			$(window).resize(function() {
				editor_resize();
			});
		}
		
		if ( $('#age_okay_docs_table').length > 0 ) {
			var clone = $('.age_okay_docs_nav_box').clone(true);
			clone.addClass('age_okay_docs_nav_mobile');
			$('#age_okay_docs_content').prepend(clone);
		}
		
		$('body').on( 'click', '.age_okay_tooltip', function() {
			$(this).toggleClass('age_okay_tooltip_active');
		});

		// clicking on hamburger menu in editor page to open editor options
		$('#age_okay_hamburger').click(function() {
			$(this).toggleClass('age_okay_active').closest('#age_okay_editor_td').toggleClass('age_okay_active');
		});
		
		// load colour picker
		$('.age_okay_color_field').wpColorPicker({
			change: function (event, ui) {
				if ( $(this).hasClass('age_okay_color_opacityc') ) {
					var color = ui.color.toString();
					//var color = $(this).iris('color', true).toCSS('rgb');
					$(this).closest('.age_okay_color_opacityp').find('.age_okay_slider_display').css('background-color',color);
				} else if ( $(this).hasClass('age_okay_color_opacitygc') ) {
					generate_gradient( $(this) );
				}
			},
			/*clear: function( event ) {
				style_element.find('td:eq(0)').css('background-color','white');
			}*/
		});
		
		// load value for selects
		$('#age_okay_editor_content section select, #age_okay_default_lang select').each(function() {
			$(this).val( $(this).data('value') );
		});
		
		// disable base language inputs on languages page
		$('#age_okay_default_lang').find('input, select, textarea').prop('disabled', true);
		
		// generate the content for the gradient background style
		function generate_gradient( el ) {
			var parent = el.closest('.age_okay_color_opacitygp');
			var type = parent.find( '.age_okay_gradient_select' ).val();
			if ( type == 'radial' ) {
				var color = 'radial-gradient( ';
			} else {
				var color = 'linear-gradient( ' + type + ', ';
			}
			var color_array = new Array();
			parent.find('.age_okay_color_opacitygc').each(function() {
				color_array.push( $(this).iris('color', true) );
			});
			color = color + color_array.join( ',' ) + ' )';
			parent.find('.age_okay_slider_display').css('background', color);
			parent.find('#age_okay_gradient_final').val(color);
		}
		
		// open editor sections
		$('.age_okay_editor_labels').click(function() {
			if ( $(this).parent().hasClass('age_okay_active') ) {
				$(this).parent().removeClass('age_okay_active');
				return false;
			}
			$('#age_okay_editor_content').find('section.age_okay_active').removeClass('age_okay_active')
			$(this).parent().addClass('age_okay_active');
		});
		
		// show or hide sections based on background type
		$("input[name=back_type]:radio").change(function() {
			$('.age_okay_section_bs').addClass('age_okay_hidden');
			if ( $(this).val() == 'color' ) {
				$('#age_okay_section_bsc').removeClass('age_okay_hidden').find('.age_okay_editor_labels span').addClass('age_okay_hidden').end().find('.age_okay_editor_labels_bsc_back').removeClass('age_okay_hidden');
			} else if ( $(this).val() == 'gradient' ) {
				$('#age_okay_section_bsg').removeClass('age_okay_hidden');
			} else if ( $(this).val() != 'cthru' ) {
				if ( $(this).val() == 'image' || $(this).val() == 'pattern' ) {
					$('#age_okay_section_bsimg').removeClass('age_okay_hidden');
				}
				$('#age_okay_section_bsc').removeClass('age_okay_hidden').find('.age_okay_editor_labels span').addClass('age_okay_hidden').end().find('.age_okay_editor_labels_bsc_overlay').removeClass('age_okay_hidden');
			}
		});
		
		// slider update value
		$('.age_okay_slider').on('input change', function() {
			$(this).prev().css('opacity', $(this).val());
		});
		
		// generate gradient value
		$('.age_okay_gradient_select').change(function() {
			generate_gradient( $(this) );
		});
		
		// show and hide exit button section
		$("input[name=exit]:checkbox").change(function() {
			$(this).closest('.age_okay_editor_options').find('.age_okay_section_secondary').toggleClass('age_okay_hidden');
		});
		
		// show and hide exit button style section
		$("input[name=ebutton_style]:checkbox").change(function() {
			$(this).closest('.age_okay_section_secondary').find('.age_okay_section_secstyle').toggleClass('age_okay_hidden');
		});
		
		// show and hide verification details sections
		$("input[name=type]:radio").change(function() {
			$('.age_okay_section_vd').addClass('age_okay_hidden');
			if ( $(this).val() == 'check' ) {
				$('#age_okay_section_vdc').removeClass('age_okay_hidden');
			} else if ( $(this).val() == 'input' ) {
				$('#age_okay_section_vdi').removeClass('age_okay_hidden');
			}
		});
		
		// show and hide inputs based on exit target
		$('body').on('change','.age_okay_exit_target_select', function() {
			$(this).closest('.age_okay_section_secondary').find('.age_okay_section_securl, .age_okay_section_sectext').addClass('age_okay_hidden');
			// show url input
			if ( $(this).val() == 'url' ) {
				$(this).closest('.age_okay_section_secondary').find('.age_okay_section_securl').removeClass('age_okay_hidden');
			} else if ( $(this).val() == 'text' ) { //show textarea input
				$(this).closest('.age_okay_section_secondary').find('.age_okay_section_sectext').removeClass('age_okay_hidden');
			}
		});
		
		/*$('#age_okay_editor_content').one('change', 'input, select, textarea', function() {
			$('#age_okay_editor_buttons').addClass('age_okay_active');
		});
		
		$('.wp-color-result').one('click', function() {
			$('#age_okay_editor_buttons').addClass('age_okay_active');
		});*/
		
		// save preview or live data in editor page
		$('#age_okay_editor_buttons button').click(function() {
			var button = $(this);
			if ( ! button.parent().hasClass('age_okay_active') || button.prop('disabled') ) {
				return false;
			}
			button.prop('disabled', true).parent().removeClass('age_okay_active');
			
			var data = $('#age_okay_editor_content select, #age_okay_editor_content input, #age_okay_editor_content textarea').serializeArray();
			if ( $(this).hasClass('age_okay_editor_button_save') ) {
				var action = 'live';
				data.push({ name: 'action', value: 'age_okay_save' });
			} else {
				var action = 'preview';
				data.push({ name: 'action', value: 'age_okay_preview' });
			}
			
			$.ajax({
				type: "POST",
				url: ajaxurl,
				cache: false,
				data: data,
				dataType: 'json',
				success: function (result) {
					try {
						if ( result['result'] == 'age_okay' ) {
							$('#age_okay_iframe').attr('src', $('#age_okay_iframe').data('src') + '?age_okay_nocache=' + Date.now() + $('#age_okay_iframe').data('key') );
							$('.age_okay_title_status_span').addClass('age_okay_hidden');
							if( action == 'live' ) {
								$('.age_okay_title_status_span_live').removeClass('age_okay_hidden');
								$('#age_okay_discard_section').addClass('age_okay_hidden');
							} else {
								$('.age_okay_title_status_span_preview').removeClass('age_okay_hidden');
								$('#age_okay_discard_section').removeClass('age_okay_hidden');
							}
						} else {
							throw 0;
						}
					} catch (err) {
						alert( age_okay.save_error );
					}
					$('#age_okay_editor_buttons').addClass('age_okay_active');
					button.prop('disabled', false);
					
					/*$('#age_okay_editor_content').one('change', 'input, select, textarea', function(){
						$('#age_okay_editor_buttons').addClass('age_okay_active');
					});
					
					$('.wp-color-result').one('click', function(){
						$('#age_okay_editor_buttons').addClass('age_okay_active');
					});*/
				}
			});
		});
		
		// image upload functionality for editor page
		$('.age_okay_editor_button_image_upload').click(function(e) {
			e.preventDefault();
			var parent = $(this).closest('.age_okay_image_uploader');

			var custom_uploader = wp.media({
				title: age_okay.gallery_title,
				button: {
					text: age_okay.gallery_button
				},
				library: {
					type: [ 'image' ]
				},
				multiple: false  // Set this to true to allow multiple files to be selected
			})
			.on('select', function() {
				
				var attachment = custom_uploader.state().get('selection').first().toJSON();
				if ( attachment.sizes.medium ) {
					var url = attachment.sizes.medium.url;
				} else {
					var url = attachment.url
				}
				
				parent.find('.age_okay_image').attr('src', url).removeClass('age_okay_hidden');
				parent.find('.age_okay_image_url').val(attachment.id);

			})
			.open();
		});
		
		// remove images uploaded on editor page
		$('.age_okay_editor_button_image_remove').click(function() {
			$(this).closest('.age_okay_image_uploader').find('.age_okay_image').attr('src', 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==').addClass('age_okay_hidden');
			$(this).closest('.age_okay_image_uploader').find('.age_okay_image_url').val('');
		});
		
		// discard preview data
		$('#age_okay_editor_button_discard').click(function() {
			var button = $(this);
			if ( button.prop('disabled') ) {
				return false;
			}
			button.prop('disabled', true);
			
			$.ajax({
				type: "POST",
				url: ajaxurl,
				cache: false,
				data: { 'action':'age_okay_discard', 'editor_nonce':$('#editor_nonce').val() },
				dataType: 'json',
				success: function (result) {
					try {
						if ( result['result'] == 'age_okay' ) {
							window.location.reload(false);
						} else {
							throw 0;
						}
					} catch (err) {
						alert( age_okay.discard_error );
					}
					button.prop('disabled', false);
				}
			});
		});
		
		// show and hide options on settings page depending on where to load selection
		$("input[name=enabled]:radio").change(function() {
			$('.age_okay_settings .age_okay_enabled').addClass('age_okay_hidden');
			if ( $(this).val() == 'only' ) {
				$('.age_okay_enabled_only').removeClass('age_okay_hidden');
			} else if ( $(this).val() == 'except' ) {
				$('.age_okay_enabled_except').removeClass('age_okay_hidden');
			}
		});
		
		// save settings on settings page
		$('.age_okay_settings_save').click(function() {
			var button = $(this);
			if ( button.prop('disabled') ) {
				return false;
			}
			button.prop('disabled', true);
			
			var data = button.closest('.age_okay_settings').find('select, input, textarea').serializeArray();
			$.ajax({
				type: "POST",
				url: ajaxurl,
				cache: false,
				data: data,
				dataType: 'json',
				success: function (result) {
					try {
						if ( result['result'] == 'age_okay' ) {
							alert( age_okay.sets_saved );
						} else {
							throw 0;
						}
					} catch (err) {
						alert( age_okay.sets_save_error );
					}
					button.prop('disabled', false);
				}
			});
		});
		
		// create elements for pages/posts/cpts selected from dropdown on settings page
		$('.age_okay_post_select').change(function() {
			if ( $(this).val() == '' ) {
				return false;
			}
			var val = $(this).val();
			var name = $(this).find('option:selected').data('name');
			$(this).find('option:selected').prop('disabled', true);
			$(this).val('');
			$(this).closest('.age_okay_form_label').find('.age_okay_post_holder').append('<span class="aop_' + val + '">' + name + '<span class="age_okay_post_remove">X</span><input type="hidden" name="' + 
				$(this).data('type') + '[]" value="' + val + '"/></span>');
		});
		
		// remove selected elements on settings page
		$('.age_okay_post_holder').on('click','.age_okay_post_remove', function() {
			if ( $(this).closest('.age_okay_post_holder').prev().hasClass('age_okay_post_select') ) {
				var val = $(this).next().val();
				$(this).closest('.age_okay_post_holder').prev().find('option[value="' + val + '"]').prop('disabled', false);
			}
			$(this).parent().remove();
		});
		
		$('.age_okay_docs_nav_box a').click(function(e) {
			e.preventDefault();
			var target = $(this).attr('href');
			if ( $(window).width() > 768 ) {
				var offset = 50;
			} else {
				var offset = 0;
			}
			$('html, body').animate({
				scrollTop: $(target).offset().top - offset
			}, 400);
		});

	});

}(jQuery));
