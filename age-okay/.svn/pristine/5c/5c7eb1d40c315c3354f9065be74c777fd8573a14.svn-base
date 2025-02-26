(function ( $ ) {
	'use strict';
	
	// add class to html in case default styles cause issues with hiding page behind verification screen
	if ( $('body').hasClass('age_okay_body') ) {
		$('html').addClass('age_okay_body');
	}
	
	// initiate verification screen
	// check if is not already showing or if preloader is showing
	if ( $('#age_okay_container').length <= 0 ) {
		var match = document.cookie.match( new RegExp('(^| )age_okay_verified=([^;]+)') );
		if ( match && window.location.hash != age_okay.debug_key ) {
			$('#age_okay_container').remove();
			$('html, body').removeClass( 'age_okay_body' );
			return false;
		}
		
		var data = [];
		data.push({ name: 'action', value: 'age_okay_init' });
		data.push({ name: 'post_id', value: age_okay.post_id });
		data.push({ name: 'page_id', value: age_okay.page_id });
		data.push({ name: 'page_url', value: age_okay.page_url });
		data.push({ name: 'lang', value: age_okay.lang });
		if ( typeof age_okay_sc !== 'undefined' ) {
			data.push({ name: 'sc_display', value: age_okay_sc.display });
		}
		if ( window.location.hash == age_okay.debug_key ) {
			data.push({ name: 'age_okay_debug', value: window.location.hash });
		}
		$.ajax({
			type: "POST",
			url: age_okay.ajax_url,
			cache: false,
			data: data,
			dataType: 'json',
			success: function (result) {
				try {
					if ( result['result'] == 'age_nokay' ) {
						// display verification screen
						$('#age_okay_container').remove();
						$('html, body').addClass( 'age_okay_body' );
						$('body').append( result['content'] );
						// hook events to the screen
						setup_events();
					} else if ( result['result'] == 'age_okay' ) {
						// remove preloader if it exists
						$('#age_okay_container').remove();
						$('html, body').removeClass( 'age_okay_body' );
					} else {
						throw 0;
					}
				} catch (err) {
					console.log( err );
					alert( age_okay.text_init1 + "\n\n" + age_okay.text_init2 + "\n\n(E1001)" );
					$('#age_okay_container').remove();
					$('html, body').removeClass( 'age_okay_body' );
				}
			},
			error: function ( jqXHR, textStatus, errorThrown ) {
				console.log( jqXHR );
				console.log( textStatus );
				console.log( errorThrown );
				alert( age_okay.text_init1 + "\n\n" + age_okay.text_init2 + "\n\n(E1002)" );
				$('#age_okay_container').remove();
				$('html, body').removeClass( 'age_okay_body' );
			}
		});
	} else {
		// hook events to the verification screen if it already exists
		setup_events();
	}
	
	// hook events to verification screen
	function setup_events() {
		var placeholder_fix = false;
		if ( $('.age_okay_date_input_container input.age_okay_input_text:eq(0)').length > 0 && $('.age_okay_date_input_container input.age_okay_input_text:eq(0)')[0].placeholder == undefined ) {
			placeholder_fix = true;
			$('.age_okay_date_input_container input').each(function() {
				$(this).val( $(this).attr('placeholder') );
			});
			
			$('.age_okay_input_text').focus(function() {
				if ( $(this).val() == $(this).attr('placeholder') ) {
					$(this).val('');
				}
			});
		}
		
		// fire on enter button being clicked
		$('.age_okay_button_yes').click(function(e) {
			e.preventDefault();
			
			var button = $(this);
			if ( button.hasClass('age_okay_active') ) {
				return false;
			} else {
				button.addClass('age_okay_active');
			}
			
			$('#age_okay_error').css( 'visibility', 'hidden' );
			
			var data = $('#age_okay_form').serializeArray();
			data.push({ name: 'post_id', value: age_okay.post_id });
			data.push({ name: 'page_id', value: age_okay.page_id });
			data.push({ name: 'lang', value: age_okay.lang });
			if ( window.location.hash == age_okay.debug_key ) {
				data.push({ name: 'age_okay_debug', value: window.location.hash });
			}
			$.ajax({
				type: "POST",
				url: age_okay.ajax_url,
				cache: false,
				data: data,
				dataType: 'json',
				success: function (result) {
					try {
						if ( result['result'] == 'age_okay' ) {
							// if verified hide verification screen
							$('html, body').removeClass( 'age_okay_body' );
							$('#age_okay_container').remove();
						} else if ( result['result'] == 'age_nokay' ) {
							// show error message
							$('#age_okay_error').html( result['content'] ).css( 'visibility', 'visible' );
						} else {
							throw 0;
						}
					} catch (err) {
						console.log( err );
						alert( age_okay.text_verify1 + "\n\n" + age_okay.text_verify2 + "\n\n(E1003)" );
						$('html, body').removeClass( 'age_okay_body' );
						$('#age_okay_container').remove();
					}
					button.removeClass('age_okay_active');
				},
				error: function ( jqXHR, textStatus, errorThrown ) {
					console.log( jqXHR );
					console.log( textStatus );
					console.log( errorThrown );
					alert( age_okay.text_verify1 + "\n\n" + age_okay.text_verify2 + "\n\n(E1004)" );
					$('html, body').removeClass( 'age_okay_body' );
					$('#age_okay_container').remove();
				}
			});
		});
		
		// tidy up when inputting date of birth
		var input_element = false;
		$('.age_okay_input_text').keydown(function() {
			input_element = $(this);
		});
		
		$('.age_okay_input_text').keyup(function() {
			var len = $(this).val().length;
			var next = false;
			if ( $(this).attr('name') == 'age_okay_input_day' && len > 1 ) {
				next = true;
			} else if ( $(this).attr('name') == 'age_okay_input_month' && len > 1 ) {
				next = true;
			} else if ( len > 3 ) {
				next = true;
			}
			if ( next == true ) {
				input_element.next().focus();
			}
		});

		$('.age_okay_input_text').blur(function() {
			if ( $(this).val() != '' ) {
				var val = ~~( $(this).val() );
				if ( $(this).attr('name') == 'age_okay_input_day' ) {
					if ( val > 31 ) {
						val = '31';
					} else if ( val < 1 ) {
						val = '01';
					} else if ( val < 10 ) {
						val = '0' + val;
					}
				} else if ( $(this).attr('name') == 'age_okay_input_month' ) {
					if ( val > 12 ) {
						val = '12';
					} else if ( val < 1 ) {
						val = '01';
					} else if ( val < 10 ) {
						val = '0' + val;
					}
				} else {
					var cur_year = new Date().getFullYear();
					var year_2dig = cur_year.toString().substr(-2);
					if ( val > cur_year ) {
						val = cur_year;
					} else if ( val > 999 ) {
						val = val;
					} else if ( val > 99 ) {
						val = '1' + val;
					} else if ( val > 9 ) {
						if ( val >= year_2dig ) {
							val = '19' + val;
						} else {
							val = '20' + val;
						}
					} else if ( val > 0 ) {
						val = '200' + val;
					} else {
						val = '2000';
					}
				}
				$(this).val( val );
			} else if ( placeholder_fix == true ) {
				$(this).val( $(this).attr('placeholder') );
			}
		});
		
		// action when exit button clicked
		$('.age_okay_button_no').click(function(e) {
			e.preventDefault();
			var type = $(this).data('type');
			var target = $(this).data('target');
			// if on editor page will alert action instead
			if ( window.location.hash == age_okay.debug_key ) {
				alert( type + ":\n" + target );
				return false;
			}
			if ( type == 'back' ) {
				if ( history.length != 0 ) {
					history.go(-1);
				} else {
					location.href = 'http://google.com';
				}
			} else if ( type == 'url' ) {
				location.href = target;
			} else {
				$('#age_okay_inner_relative').html( '<p class="age_okay_text">' + target + '</p>' );
			}
		});
	}

}(jQuery));
