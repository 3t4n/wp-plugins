(function($, window, document) {
    'use strict';

	// This global variable is very crucial, do not alter it anyway.
	var ssearchify_wrapper = $('#jbid-smart-searchify').parent();

	// Fetch and return and page number.
	function get_cur_page_no() {
		var page_no = 1;
		var params = new URLSearchParams(location.search);

		if ( params.has('pn') ) {
			page_no = params.get('pn');
		}
		return page_no;
	}

	// Remove the query var from the URL.
	function clear_url_params( param_name ) {

		var qry_params = new URLSearchParams(location.search);

		if ( qry_params.has( param_name ) ) {
			qry_params.delete( param_name );
		}

		// Delete the page no.
		if ( qry_params.has( 'pn' ) ) {
			qry_params.delete('pn');
		}

		// Decode query vars to make url fluctuation with %20.
		qry_params = decodeURIComponent( qry_params );

		var loc_href = window.location.pathname;
		if ( '' != qry_params ) {
			loc_href = loc_href + '?' + qry_params;
		}

		window.history.pushState( null, null,  loc_href );

	}

    // Execute when dom is ready.
    $( document ).ready(function() {

		// Global variable required for ajax pagination.
		var input_state =  false;
		var cur_page_no = get_cur_page_no();

		// Process and update the page content on user actions.
		function process_the_user_action() {
			$('#jbid-cur-page').val(1);
			cur_page_no = 1;
			input_state = true;
			jbid_process_searchify( 'submit' );
		}

		// Process the filter form.
		function jbid_process_searchify( action ) {

			// Check if the ajax filtering is enabled or not.
			var ajax_filtering = false;
			var qry_vars = '';

			if ( '1' === $('#jbid-is-ajax').val() ) {
				ajax_filtering = true;
			}

			var select_wrap       = document.getElementsByClassName( 'select-wrap' );
            var checkbox_wrap     = document.getElementsByClassName( 'checkbox-wrap' );
            var radio_wrap        = document.getElementsByClassName( 'radio-wrap' );
            var multi_select_wrap = document.getElementsByClassName( 'multi-select-wrap' );

			// Restrict the select box from appending in the url.
			if ( multi_select_wrap.length && input_state ) {

				for ( var i = 0; i < multi_select_wrap.length; i++ ) {
					var select_input = multi_select_wrap[i].getElementsByTagName( 'select' );

					if ( select_input.length ) {
						for ( var j=0; j < select_input.length; j++ ) {
							var input_name = select_input[j].name;

							var input_val  = $('#'+ select_input[j].id ).val();

							// alert ( 'input value: ' + input_val );
							if ( '' != input_val ) {
								qry_vars += input_name + '=' + input_val + '&';
							}

						}
					}
				}
			}


			// Restrict the select box from appending in the url.
			if ( select_wrap.length && input_state ) {

				for ( var i = 0; i < select_wrap.length; i++ ) {
					var select_inputs = select_wrap[i].getElementsByTagName( 'select' );
					if ( select_inputs.length ) {
						var input_name = select_inputs[0].name;
						var input_val  = select_inputs[0].value;

						if ( '' != input_val ) {
							qry_vars += input_name + '=' + input_val + '&';
						} else if ( input_state && '' == input_val ) {

							// Clear the query vars from the url.
							clear_url_params( input_name );
						}
					}
				}
			}

			if ( checkbox_wrap.length ) {
				for ( var i = 0; i < checkbox_wrap.length; i++ ) {
					var selected_options = new Array();
                    var chks_inputs = checkbox_wrap[i].getElementsByTagName( 'input' );
					if ( chks_inputs.length ) {
						
						// @todo need to check if this split is required or not.
                        var input_name = chks_inputs[0].name.split("[]")[0];
						
						// Fetch checked selected values.
						for ( var j = 0; j < chks_inputs.length; j++ ) {
							if ( chks_inputs[j].checked ) {
								selected_options.push( chks_inputs[j].value );
							}
						}

						if ( selected_options.length > 0 ) {
							qry_vars += input_name + '=' + selected_options.join(",")  + '&';
						}

					} else {
                        var input_name = chks_inputs[0].name.split("[]")[0];
						qry_vars += input_name + '=&';  
					}

				}
			}

			if ( radio_wrap.length ) {
				for ( var i = 0; i < radio_wrap.length; i++ ) {
					var radio_inputs = radio_wrap[i].getElementsByTagName( 'input' );
					if ( radio_inputs.length ) {
						for ( var j = 0; j < radio_inputs.length; j++ ) {
							if ( radio_inputs[j].checked ) {
								console.log( radio_inputs );

								var input_name = radio_inputs[j].name;
								var input_val  = radio_inputs[j].value;
								qry_vars += input_name + '=' + input_val + '&';
								break;
							}
						}
						
					} else {
						var input_name = select_inputs[0].name;
						qry_vars += input_name + '=&';
					}
				}
			}

			// Remove the trailing &. 
			qry_vars = qry_vars.slice(0, -1);

			var cur_page = 1;
			if ( ajax_filtering ) {
				cur_page = + cur_page_no;
			} else {
				cur_page = + $('#jbid-cur-page').val();
			}

			if (
				$('#jbid-post-sortby').length &&
				input_state
			) {

				var jbid_sort_by = $('#jbid-post-sortby').val();

				if ( '' == qry_vars && '' != jbid_sort_by ) {
					qry_vars += 'sortby=' + jbid_sort_by;
				} else if ( '' != qry_vars && '' != jbid_sort_by ) {
					qry_vars += '&sortby=' + jbid_sort_by;
				} else if ( '' == jbid_sort_by ) {
					// Clear the query vars from the url.
					clear_url_params( 'sortby' );
				}

			}

			// Urls params to append to the url.
			var url_params = '';
			if ( 1 < cur_page ) {
					if ( '' ==  qry_vars ) {
						qry_vars += '?pn='+ cur_page;
						url_params = qry_vars;
					} else {
						qry_vars = '?' + qry_vars + '&pn='+ cur_page;
						url_params = qry_vars;
					}
			} else {
			
				if ( '' != qry_vars ) {
					// Prefix the query string with the ?.
					qry_vars = '?' + qry_vars;
					url_params = qry_vars;
				}
			}

			if ( 'reset' === action ) {
				// Clear the query vars.
				qry_vars = '';
			}

			if ( ajax_filtering ) {

				var ajax_container = $('#jbid-smart-searchify').parent();

					if ( '' ==  qry_vars ) {

						// Reset the url in the browser address bar.
						window.history.pushState( null, null, window.location.pathname );
						qry_vars = 'jbid_ss_id=' + $('#jbid-ssearchify-id').val();

					} else {

						// Trim out the ? from the query string used to append to the url.
						qry_vars = qry_vars.slice(1);
						qry_vars += '&jbid_ss_id=' + $('#jbid-ssearchify-id').val();
					}

					if ( 'reset' !== action ) {
						window.history.pushState( {}, '', url_params );
					}

					qry_vars += '&pathname=' + location.pathname;

					// Display the loader.
					$('#jbid-ajax-loader').addClass('active');

					// Fetch the data via ajax.
					$.ajax({
						url: jbid_fe_object.ajaxurl,
						type: 'post',
						data: {
							'action'  : 'get_searchify_rst',
							'data'    : qry_vars,
						},
						success: function( response ) {
							$('#jbid-ajax-loader').removeClass('active');
							// alert('response!!!');
							if ( true == response.success ) {
								ajax_container.html( response.data );
								ssearchify_wrapper.find('.multi-select').multiSelect();
							} else {
								// Display error handling.
							}

						},
					});

				// Hinders the form submission.
				return false;
			} else {

				var base_url = location.protocol + '//' + location.host + location.pathname;

				// Encode uri.
				var full_page = base_url + encodeURI( qry_vars );
				// var full_page = base_url + qry_vars;

				// Submit the form.
				window.location.href = full_page;
				return true;
			}

		}

		// Scroll the page to the specified position.
		function scroll_page_view() {
		
			var scroll_to = ssearchify_wrapper.offset().top - 70;
			console.log( scroll_to );
			setTimeout(function () {
				$('html,body').animate({
					scrollTop: scroll_to
				}, 'slow');
			}, 1200);
   		 }


        $(document).on( 'submit', '#jbid-searchify-frm', function(e) {
			e.preventDefault();
			e.stopPropagation();
			process_the_user_action();
        });

		if ( ! $('#jbid-sbm-btn').length ) {

			$(document).on( 'click', '#jbid-searchify-frm input[type=checkbox]', function(e) {
				process_the_user_action();
			});

			$(document).on( 'click', '#jbid-searchify-frm input[type=radio]', function(e) {
				process_the_user_action();
			});

			$(document).on( 'change', '#jbid-searchify-frm .select-wrap select', function(e) {
				process_the_user_action();
			});

			$(document).on( 'change', '#jbid-searchify-frm .multi-select-wrap select', function(e) {

				var cur_selections = $(this).val();

				// check if the value has prefixing(,), means the reset button clicked.
				if ( 0 === cur_selections.indexOf('0') ) {
					$('#jbid-searchify-frm .multi-select-wrap select').val('');
				}

				process_the_user_action();
			});

		}

		// Reset the multiselect combo box.
		$(document).on( 'change', '#jbid-searchify-frm .multi-select-wrap select', function(e) {

			var cur_selections = $(this).val();
			var input_id       = $(this).attr('id');

			// alert( 'input ID: ' + input_id );

			// check if the value has prefixing(,), means the reset button clicked.
			if ( 0 === cur_selections.indexOf('0') ) {

				// Unselect all options.
				$('#' + input_id + ' + .multi-select-container').find(':checkbox').prop('checked', false );

				// $(this).find("option:selected").prop("selected", false)
				$('#jbid-searchify-frm .multi-select-wrap select').val('');
			}

			// process_the_user_action();
		});

		$(document).on( 'change', '#jbid-post-sortby', function(e) {
			process_the_user_action();
		});

		if ( $('.ajax-paging').length ) {

			$(document).on( 'click', '.page-numbers', function( e ) {
				e.preventDefault();

				var qry_params = new URLSearchParams(location.search);

				// This var is used down the code, plz do not delete.
				var params = new URLSearchParams(location.search);

				qry_params.delete('pn');
				
				// @todo need to find why the input state retain there value.
				if ( '' != qry_params ) {
					input_state = true;
				}

				var cur_page = + cur_page_no;

				if ( $(this).hasClass('next') ) {
					cur_page = cur_page + 1;
				} else if ( $(this).hasClass('prev') ) {
					if ( '1' != cur_page ) {
						cur_page = cur_page - 1;
					}
				} else {
					cur_page = + $(this).html();
				}
				

				$('#jbid-cur-page').val( cur_page );

				// Update the current page no.
				cur_page_no = cur_page;

				if ( '1' == cur_page ) {
					params.delete('pn');
					
					var loc_href = window.location.pathname;

					if ( '' != params ) {
						loc_href = loc_href + '?' + params;
					}

					window.history.pushState( null, null,  loc_href );
				}
				scroll_page_view();
				jbid_process_searchify( 'submit' );
			});
		}

		$(document).on( 'click', '#jbid-reset-btn', function(e) {

			var cur_page = location.protocol + '//' + location.host + location.pathname;

			if ( '1' === $('#jbid-is-ajax').val() ) {

				window.history.pushState( null, null, window.location.pathname );

				// Reset the data to an initial state.
				$('#jbid-cur-page').val(1);

				input_state = false;
				cur_page_no = 1;

				// Reset the form.
				jbid_process_searchify('reset');

			} else{
				window.location.href = cur_page;
			}

		});

		$(document).on( 'click', '.filter-button', function(e) {
			$('.jbid-form-wrapper').slideToggle();
			$('.jbid-sortby-left').slideToggle();
        });

		// Refactor the layout of multiselect. 
		ssearchify_wrapper.find('.multi-select').multiSelect();

    }); // End of doc ready.
} )(jQuery, window, document);