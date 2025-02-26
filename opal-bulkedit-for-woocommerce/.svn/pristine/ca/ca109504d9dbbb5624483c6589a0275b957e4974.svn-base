
(function( $ ) {

	"use strict";

	const DEF_ITEMS = 5;

	$.fn.replaceWithPush = function(a) {
		var $a = $(a);
	
		this.replaceWith($a);
		return $a;
	};

	function opbw_show_el($el) {
		$el.removeClass('opbw_hidden');
	}
	
	function opbw_hide_el($el) {
		$el.addClass('opbw_hidden');
	}

	function opbw_add_val_field($name, $after, $type = 'text') {
		let classValField = 'opbw_setting_field opbw_value_field',
			attr = '';
		if ($type == 'number') {
			attr += ' min="0"';
		}
		$(`<input ${attr} type="${$type}" class="${classValField}" name="${$name}" placeholder="${opbw_script.translate.placeholder.text_val}">`)
			.insertAfter($after);
	}

	function opbw_add_val_beetween_field($name, $after) {
		let classValField = 'opbw_setting_field opbw_value_field opbw_val_between_field';
		$(`<input tyle="text" class="${classValField}" name="${$name}_max" placeholder="${opbw_script.translate.placeholder.text_val_max}">`)
			.insertAfter($after);
		$(`<input tyle="text" class="${classValField}" name="${$name}_min" placeholder="${opbw_script.translate.placeholder.text_val_min}">`)
			.insertAfter($after);
	}

	function opbw_add_val_replace_field($name, $after) {
		let classValField = 'opbw_setting_field opbw_value_field opbw_val_replace_field';
		$(`<input tyle="text" class="${classValField}" name="${$name}_replace" placeholder="${opbw_script.translate.placeholder.text_val_replace}">`)
			.insertAfter($after);
		$(`<input tyle="text" class="${classValField}" name="${$name}_find" placeholder="${opbw_script.translate.placeholder.text_val_find}">`)
			.insertAfter($after);
	}

	function opbw_add_round_field($name, $after) {
		let classValField = 'opbw_setting_field opbw_field opbw_round_field';
		$(`<select class="${classValField}" name="${$name}_round">
				<option value="none">${opbw_script.translate.round_none}</option>
				<option value="up">${opbw_script.translate.round_up}</option>
				<option value="down">${opbw_script.translate.round_down}</option>
			</select>`)
			.insertAfter($after);
	}

	function opbw_parse_query($query, $variable) {
		var vars = $query.split("&");
		for (var i = 0; i < vars.length; i++) {
			var pair = vars[i].split("=");
			if (pair[0] == $variable)
				return pair[1];
		}
		return false;
	}

	function opbw_toast_mess($type, $message) {
		if (typeof $.toast === 'function') {
			$.toast({
				heading: $type == 'success' ? 'Success' : 'Error',
				text: $message,
				showHideTransition: 'slide',
				icon: $type,
				position: 'top-right',
				hideAfter: 6000
			})
		} else {
			alert($message);
		}
	}

	function opbw_set_items_per_page($number) {
		localStorage.setItem('opbw_items_per_page', $number);
	}

	function opbw_get_items_per_page() {
		var items_per_page = localStorage.getItem('opbw_items_per_page');
		if (!items_per_page || items_per_page == 'undefined') {
			return DEF_ITEMS;
		}
		return items_per_page;
	}

	function opbw_get_history_id() {
		var history_id = localStorage.getItem('opbw_history_id');
		if (!history_id || history_id == 'undefined') {
			return false;
		}
		return history_id;
	}
	
	function opbw_get_excluded_items() {
		var excluded_items = localStorage.getItem('opbw_excluded_items');
		if (!excluded_items || excluded_items == 'undefined') {
			excluded_items = [];
		}
		else {
			excluded_items = JSON.parse(excluded_items);
		}

		if (!Array.isArray(excluded_items)) {
			excluded_items = [];
		}

		excluded_items = excluded_items.map(Number);

		return excluded_items;
	}

	function opbw_get_excluded_media($mediaField, $excluded = null) {
		if (!$mediaField.length) return [];
		if ($mediaField.val() == '') return [];
		
		if ($excluded) {
			var arr = $mediaField.val().split(",");
			var filteredArray = arr.filter(function(item) {
				return item !== $excluded;
			});
			return filteredArray;
		} else {
			return $mediaField.val().split(",");
		}
	}

	function opbw_date_picker_select( datepicker ) {
		var option = $( datepicker ).next().is( '.hasDatepicker' )
				? 'minDate'
				: 'maxDate',
			otherDateField =
				'minDate' === option
					? $( datepicker ).next()
					: $( datepicker ).prev(),
			date = $( datepicker ).datepicker( 'getDate' );

		$( otherDateField ).datepicker( 'option', option, date );
		$( datepicker ).trigger( 'change' );
	}

	function opbw_ajax_preview_action($data, $excluded_all = false) {
		var box = $('#opbw-preview');

		if ($excluded_all) {
			$data['excluded_all'] = 1;
		}

		$.ajax({
			type: 'post',
			url: ajaxurl,
			data: $data,
			beforeSend: function() {
				box.addClass('loading');
			},
			success: function ($data) {
				if ($excluded_all) {
					localStorage.setItem('opbw_excluded_items', JSON.stringify($data.data));
				} else {
					$('#opbw-preview').replaceWith($data.data);
					opbwPreview.init_pagination_preview();
					opbwPreview.trigger_preview_search();
					opbwPreview.trigger_toggle_select_all();
					opbwPreview.trigger_toggle_bulk_checkbox();
					opbwPreview.trigger_apply_per_page();
					opbwPreview.trigger_confirm_preview();
					
					opbwFilter.trigger_back_step();
					opbwFilter.trigger_reset_form_filter();
	
					$( document.body ).trigger( 'init_tooltips' );
				}
				
			},
			error: function(xhr) { // if error occured
				alert("Error occured. Please try again!");
				box.removeClass('loading');
			},
			complete: function() {
				box.removeClass('loading');
			},
		});
	}

	/**
	 * ##########################################################################################
	 * Install Function
	 * ##########################################################################################
	 */
	var opbwInstall = {
		init_text_select_field: function() {
			if(!$('.text_select_field').length) return false;
			
			$('.text_select_field').on('change', function() {
				var val = $(this).val(),
					name = $(this).attr('name') + '_val',
					valField = $(this).next('.opbw_value_field');
			
				if ($.inArray(val, ['contains', 'not_contains', 'start_with', 'end_with']) === -1) {
					if (valField.length) valField.hide();
				} else {
					if (!valField.length) {
						opbw_add_val_field(name, $(this));
					} else {
						valField.show();
					}
				}
			});
		},

		init_number_select_field: function() {
			if(!$('.number_select_field').length) return false;
			
			$('.number_select_field').on('change', function() {
				var val = $(this).val(),
					name = $(this).attr('name') + '_val',
					valField = $(this).parent().find('.opbw_value_field:not(.opbw_val_between_field)'),
					valBetweenField = $(this).parent().find('.opbw_val_between_field');
			
				if ($.inArray(val, ['between', '>', '<', '>=', '<=', '==', '!=']) === -1) {
					if (valField.length) valField.hide();
					if (valBetweenField.length) valBetweenField.hide();
				} else {
					if (val == 'between') {
						valField.hide();
						if (!valBetweenField.length) {
							opbw_add_val_beetween_field(name, $(this));
						} else {
							valBetweenField.show();
						}
					} else {
						valBetweenField.hide();
						if (!valField.length) {
							opbw_add_val_field(name, $(this));
						} else {
							valField.show();
						}
					}
				
				}
			});
		},
	
		init_select2_settings: function($selector = null) {
			var $selector = !$selector ? $('.opbw_init_select2') : $selector;
			if (!$selector.length) return false;
			
			$selector.each(function() {
				var optionSelect2;
				if (!$(this).hasClass('opbw_ajax_select2')) {
					optionSelect2 = {};
				} else {
					var term = 'product';
					if ($(this).data('term')) {
						term = $(this).data('term');
					}
					optionSelect2 = {
						ajax: {
							url: opbw_script.ajaxurl,
							dataType: 'json',
							delay: 250,
							data: function (params) {
								return {
									term: term,
									q: params.term, // search query
									ajax_nonce_parameter: opbw_script.security_nonce,
									action: 'opbw_load_rule_apply_ajax'
								};
							},
							processResults: function( data ) {
								var options = [];
								if ( data ) {
									$.each( data, function( index, text ) {
										options.push( { id: text[0], text: text[1]  } );
									});
								}
								return {
									results: options
								};
							},
							cache: true
						},
						multiple: true,
						minimumInputLength: 1,
						// placeholder: 'Typing to select',
					};
				}
	
				// Init select2
				$(this).select2(optionSelect2);
			})
		},
		
		active_step: function($step) {
			$('#opqw-bulkedit .opbw-steps .step-item').each(function() {
				var $item_st = parseInt($(this).data('step'));
				if ($item_st <= $step) {
					$(this).addClass('active');
				}
				else {
					$(this).removeClass('active');
				}
			})
		},

		trigger_condition_field: function($box = null) {
			var fieldTrigger = $box ? $('.opbw_field_trigger', $box) : $('.opbw_field_trigger');
			if(!fieldTrigger.length) return false;

			fieldTrigger.on('change', function() {
				var name = $(this).attr('name'),
					valTrigger = $(this).val(),
					fieldCondition = $('.trigger-condition[data-condition="'+name+'"]');
				if (fieldCondition.length) {
					fieldCondition.each(function() {
						var conditionVal = $(this).data('condition-value'),
							toggleClass = $(this).data('class-toggle') ? $(this).data('class-toggle') : 'hidden_setting',
							show,
							def;
						if (conditionVal) {
							if (conditionVal.includes("!")) {
								def = conditionVal.split("!")[1].trim();
								show = valTrigger != def;	
							} else if (conditionVal.includes("|")) {
								def = conditionVal.split("|");
								show = (def.length > 1) ? $.inArray(valTrigger, def) != -1 : false;	
							} else {
								show = valTrigger == conditionVal;
							}

							if (show) {
								$(this).removeClass(toggleClass);
							} else {
								$(this).addClass(toggleClass);
							}
						} else {
							$(this).toggleClass(toggleClass);
						}
					})
				}
			});
		},
	};

	/**
	 * ##########################################################################################
	 * Filter Function
	 * ##########################################################################################
	 */
	var opbwFilter = {

		filter_template: '',

		init_filter: function() {
			this.set_filter_template();

			this.trigger_change_form_filter();
			this.trigger_reset_form_filter();
			this.trigger_submit_filter();
			
			opbwInstall.init_select2_settings();
			opbwInstall.init_text_select_field();
			opbwInstall.init_number_select_field();
			opbwInstall.trigger_condition_field();
		},

		set_filter_template: function() {
			if (this.filter_template == '') {
				this.filter_template = $('#opbw-filter').html();
			}
		},

		trigger_change_form_filter: function() {
			if(!$('#opbw-filter .opbw_field').length) return false;

			$('#opbw-filter .opbw_field').on('change', function() {
				if ($('#opbw-filter .opbw_reset_filter').hasClass('opbw_disable')) {
					$('#opbw-filter .opbw_reset_filter').removeClass('opbw_disable');
				}
			});
		},

		trigger_reset_form_filter: function() {
			if(!$('.opbw_reset_filter').length) return false;

			$('.opbw_reset_filter').on('click', function(e) {
				e.preventDefault();
				if ($(this).hasClass('opbw_disable')) return false;

				$('.opbw-box:not(#opbw-filter)').remove();
				$('#opbw-filter').show().html(opbwFilter.filter_template);
				
				// ReInit Tiptip
				if ($('#opbw-filter .woocommerce-help-tip').length) {
					$('#opbw-filter .woocommerce-help-tip').each(function() {
						if (!$(this).attr('data-tip') && $(this).attr('aria-label')) {
							$(this).attr('data-tip', $(this).attr('aria-label'));
						}
					});
				}
				$( document.body ).trigger( 'init_tooltips' );

				// ReInit Filter
				opbwFilter.init_filter();
				opbwInstall.active_step(1);
			});
		},

		trigger_back_step: function() {
			var backBtn = $('.opbw_back_step:not(.triggered)');
			if(!backBtn.length) return false;

			backBtn.on('click', function(e) {
				e.preventDefault();
				var step = $(this).data('stepback'),
					curBox = $(this).closest('.opbw-box');
				curBox.hide();
				curBox.prev('.opbw-box').show();
				curBox.remove();
				opbwInstall.active_step(step);
				$(this).addClass('triggered');
			});
		},

		trigger_submit_filter: function() {
			$('#opbw-filter .opbw-form').on('submit', function(e){
				e.preventDefault();
				var params = $(this).serialize(),
					box = $(this).closest('.opbw-box');

				$.ajax({ 
					url: opbw_script.ajaxurl,
					type: 'post',
					data: {
						action: 'opbw_handle_filter_form',
						ajax_nonce_parameter: opbw_script.security_nonce,

						items: opbw_get_items_per_page(),
						params: params
					},
					beforeSend: function() {
						box.addClass('loading');
					},
					success: function(data) {
						if (typeof data.success != 'undefined') {
							if (data.success) {
								$('#opbw-filter').hide();
								$('#opqw-bulkedit').append(data.data);

								// Remove Localstorage data
								localStorage.removeItem('opbw_excluded_items');
								
								opbwInstall.active_step(2);

								opbwPreview.init_pagination_preview();
								opbwPreview.trigger_preview_search();
								opbwPreview.trigger_toggle_select_all();
								opbwPreview.trigger_toggle_bulk_checkbox();
								opbwPreview.trigger_apply_per_page();
								opbwPreview.trigger_confirm_preview();

								opbwFilter.trigger_reset_form_filter();
								opbwFilter.trigger_back_step();

								$( document.body ).trigger( 'init_tooltips' );

							} else {
								opbw_toast_mess('error', data.data.message);
							}
						} else {
							opbw_toast_mess('error', 'Error occured. Please try again!');
						}
					},
					error: function(xhr) { // if error occured
						alert("Error occured. Please try again!");
						box.removeClass('loading');
					},
					complete: function() {
						box.removeClass('loading');
					},
				});
			
			});
		},		
	};

	/**
	 * ##########################################################################################
	 * Preview Function
	 * ##########################################################################################
	 */
	var opbwPreview = {
		trigger_confirm_preview: function() {
			$('#opbw_confirm_preview').on('click', function(e){
				e.preventDefault();
				var params = $('#opbw-filter .opbw-form').serialize(),
					box = $(this).closest('.opbw-box');

				$.ajax({ 
					url: opbw_script.ajaxurl,
					type: 'post',
					data: {
						action: 'opbw_handle_preview_confirm',
						ajax_nonce_parameter: opbw_script.security_nonce,

						history_id: opbw_get_history_id(),
						exclude_products: opbw_get_excluded_items(),
						params: params,
					},
					beforeSend: function() {
						box.addClass('loading');
					},
					success: function(data) {
						if (typeof data.success != 'undefined') {
							if (data.success) {
								$('.opbw-box').hide();

								// Handle Step Edit
								var boxEdit = $(data.data.edit_html);
								opbwInstall.trigger_condition_field(boxEdit);
								opbwEditor.init(boxEdit);

								$('#opqw-bulkedit').append(boxEdit);
								localStorage.setItem('opbw_history_id', data.data.history_id);
								opbwInstall.active_step(3);
								opbwFilter.trigger_back_step();

							} else {
								opbw_toast_mess('error', data.data.message);
							}
						} else {
							opbw_toast_mess('error', 'Error occured. Please try again!');
						}						
					},
					error: function(xhr) { // if error occured
						alert("Error occured. Please try again!");
						box.removeClass('loading');
					},
					complete: function() {
						box.removeClass('loading');
					},
				});
			
			});
		},

		trigger_apply_per_page: function() {
			if(!$('#opbw_apply_items').length) return false;

			$('#opbw_apply_items').on('click', function(e) {
				e.preventDefault();

				var items = $('#preview_items_per_page').val();
				items = parseInt(items);

				if (!items) return;
				if (items == opbw_get_items_per_page()) return;
				opbw_set_items_per_page(items);

				var	params = $('#opbw-filter .opbw-form').serialize(),
					data = {
						action: 'opbw_handle_filter_form',
						ajax_nonce_parameter: opbw_script.security_nonce,

						params: params,
						items: items,
						kw: $('#preview_search').val(),
						selected_all: $('#select_all_checked').is(":checked"),
						paged: '1'
					};

				opbw_ajax_preview_action(data);
			});
		},

		trigger_preview_search: function() {
			if(!$('#preview_search').length) return false;

			var timeout = null,
				params = $('#opbw-filter .opbw-form').serialize(),
				data = {
					action: 'opbw_handle_filter_form',
					ajax_nonce_parameter: opbw_script.security_nonce,

					params: params,
					items: opbw_get_items_per_page(),
					paged: '1'
				};

			$('#preview_search').on('keyup', function () {
				if (timeout !== null) {
					clearTimeout(timeout);
				}
				data['kw'] = $(this).val();
				timeout = setTimeout(function () {
					opbw_ajax_preview_action(data);
					localStorage.removeItem('opbw_excluded_items');
				}, 1000);
			});
		},
		
		trigger_toggle_select_all: function() {
			if(!$('#select_all_checked').length) return false;

			$('#select_all_checked').on('change', function(e) {
				e.preventDefault();

				if (!this.checked) {
					var	params = $('#opbw-filter .opbw-form').serialize(),
					data = {
						action: 'opbw_handle_filter_form',
						ajax_nonce_parameter: opbw_script.security_nonce,

						params: params,
						kw: $('#preview_search').val(),
						items: opbw_get_items_per_page(),
					};

					opbw_ajax_preview_action(data, true);
				}
				else {
					localStorage.removeItem('opbw_excluded_items');
				}

				if ($('.opbw-bulk-checkbox').length) {
					$('.opbw-bulk-checkbox').prop( "checked", this.checked );
				}
			});
		},
	
		trigger_toggle_bulk_checkbox: function() {
			if(!$('.opbw-bulk-checkbox').length) return false;

			var excluded_items = opbw_get_excluded_items();
			$('.opbw-bulk-checkbox').each(function() {
				var id = parseInt($(this).attr('id'));
				if ($.inArray(id, excluded_items) !== -1) {
					$(this).prop( "checked", false );
				}
			});

			$('.opbw-bulk-checkbox').on('change', function(e) {
				e.preventDefault();
				var id = parseInt($(this).attr('id')),
					excluded_items = opbw_get_excluded_items();

				if (!this.checked) {
					if ($.inArray(id, excluded_items) === -1) {
						excluded_items.push(id);
					}
				} else {
					excluded_items = excluded_items.filter(function(elem){
						return elem != id; 
					});
				}
				localStorage.setItem('opbw_excluded_items', JSON.stringify(excluded_items));
			});
		},

		init_pagination_preview: function() {
			if(!$('#opbw-preview .pagination-links').length) return false;

			var timer,
				delay = 500,
				params = $('#opbw-filter .opbw-form').serialize(),
				data = {
					action: 'opbw_handle_filter_form',
					ajax_nonce_parameter: opbw_script.security_nonce,
					
					params: params,
					items: opbw_get_items_per_page(),
					kw: $('#preview_search').val(),
				};

			$('#opbw-preview .pagination-links a').on('click', function(e) {
				e.preventDefault();
				var query = this.search.substring(1),
					paged = opbw_parse_query(query, 'paged') || '1';
				data['paged'] = paged;
				data['selected_all'] = $('#select_all_checked').is(":checked");
				opbw_ajax_preview_action(data);
			});

			$('#opbw-preview .pagination-links input[name=paged]').on('keyup', function (e) {
				if (13 == e.which)
					e.preventDefault();
				var paged = parseInt($(this).val()) || '1';
				data['paged'] = paged;
				data['selected_all'] = $('#select_all_checked').is(":checked");
				window.clearTimeout(timer);
				timer = window.setTimeout(function () {
					opbw_ajax_preview_action(data);
				}, delay);
			});
		},
	};

	/**
	 * ##########################################################################################
	 * Edit Function
	 * ##########################################################################################
	 */
	var opbwEditor = {
		edit_template: '',

		init: function($box) {
			this.set_edit_template($box);

			this.init_handle_media_input($box);
			this.init_handle_content_field($box);
			this.init_handle_price_field($box);
			this.init_handle_date_field($box);
			this.init_handle_number_field($box);
			this.init_handle_select2_field($box);		

			this.trigger_reset_form_edit($box);
			this.trigger_submit_editor($box);
		},

		set_edit_template: function($box) {
			if (this.edit_template == '') {
				this.edit_template = $box.html();
			}
		},

		init_handle_media_input: function($box) {
			var mediaFieldList = $('.opbw_media_field', $box);
			if(!mediaFieldList.length) return false;

			mediaFieldList.each(function() {
				var mediaField = $(this),
					multiple = mediaField.data('multiple') && mediaField.data('multiple') == '1';
				if (!mediaField.next('.opbw_media_action').length) {
					let mediaClass = 'opbw-flex opbw_flex_align_items_center opbw_media_action';
					if (multiple) {
						mediaClass += ' opbw_multiple_media';
					}
					let mediaAction = $(`
						<span class="${mediaClass}" style="gap: 10px">
							<span class="media_value">${opbw_script.translate.no_change}</span>
							<button type="button" class="update_media button button-small button-primary">${opbw_script.translate.media_update}</button>
							<button type="button" class="remove_media button button-small button-danger" style="display: none">${opbw_script.translate.remove_media}</button>
						</span>
					`);
	
					opbwEditor.trigger_update_media(mediaAction, mediaField, multiple);
	
					mediaAction.insertAfter(mediaField);
				}
			});
		},

		init_handle_content_field: function($box) {
			var fields = $('.opbw_content_field', $box);
			if(!fields.length) return false;

			fields.on('change', function() {
				var val = $(this).val(),
					name = $(this).attr('name') + '_val',
					valField = $(this).parent().find('.opbw_value_field:not(.opbw_val_replace_field)'),
					valReplaceField = $(this).parent().find('.opbw_val_replace_field');
			
				if (val == 'none') {
					if (valField.length) valField.hide();
					if (valReplaceField.length) valReplaceField.hide();
				} else {
					if (val == 'replace') {
						valField.hide();
						if (!valReplaceField.length) {
							opbw_add_val_replace_field(name, $(this));
						} else {
							valReplaceField.show();
						}
					} else {
						valReplaceField.hide();
						if (!valField.length) {
							opbw_add_val_field(name, $(this));
						} else {
							valField.show();
						}
					}
				
				}
			});
		},

		init_handle_price_field: function($box) {
			var fields = $('.opbw_price_field', $box);
			if(!fields.length) return false;

			fields.on('change', function() {
				var val = $(this).val(),
					name = $(this).attr('name') + '_val',
					valField = $(this).parent().find('.opbw_value_field:not(.opbw_round_field)'),
					valRoundField = $(this).parent().find('.opbw_round_field');
			
				if (val == 'none') {
					if (valField.length) valField.hide();
					if (valRoundField.length) valRoundField.hide();
				} else {
					
					if (!valField.length) {
						opbw_add_val_field(name, $(this));
					} else {
						valField.show();
					}

					if (val != 'flat_all') {
						if (!valRoundField.length) {
							opbw_add_round_field(name, $(this).parent().find('.opbw_value_field:not(.opbw_round_field)'));
						} else {
							valRoundField.show();
						}
					} else {
						valRoundField.hide();
					}
				
				}
			});
		},

		init_handle_date_field: function($box) {
			var startField = $('#sale_start', $box);
			var endField = $('#sale_end', $box);
			if(!startField.length) return false;
			if(!endField.length) return false;

			var start = startField.flatpickr({
				enableTime: false,
				dateFormat: "Y-m-d",
				altFormat: "Y-m-d",
				minDate: "today",
				onChange: function(selectedDates, dateStr, instance) {
					end.set('minDate', dateStr)
				}
			});

			var end = endField.flatpickr({
				enableTime: false,
				dateFormat: "Y-m-d",
				altFormat: "Y-m-d",
				minDate: "today",
				onChange: function(selectedDates, dateStr, instance) {
					start.set('maxDate', dateStr)
				}
			});
		},
		
		init_handle_number_field: function($box) {
			var fields = $('.opbw_number_field', $box);
			if(!fields.length) return false;

			fields.on('change', function() {
				var val = $(this).val(),
					name = $(this).attr('name') + '_val',
					valField = $(this).parent().find('.opbw_value_field');
			
				if (val == 'none') {
					if (valField.length) valField.hide();
				} else {
					if (!valField.length) {
						opbw_add_val_field(name, $(this), 'number');
					} else {
						valField.show();
					}
				}
			});
		},		

		init_handle_select2_field: function($box) {
			var fields = $('.opbw_init_select2', $box);
			if(!fields.length) return false;

			opbwInstall.init_select2_settings(fields);
		},
		
		trigger_update_media: function($box_media, $mediaField, $multiple = false) {
			if(!$('.update_media', $box_media).length) return false;
			if(!$('.media_value', $box_media).length) return false;

			const actionGallary = `
				<span class="gallery_action">
					<a class="edit-image" href="#">
						<i class="dashicons dashicons-update-alt"></i>
					</a>
					<a class="remove-image" href="#">
						<i class="dashicons dashicons-no-alt"></i>
					</a>
				</span>
			`;

			$('.update_media', $box_media).on('click', function() {
				var wpMedia;
				var mediaValue = $('.media_value', $box_media),
					btnUpdate = $(this),
					id = btnUpdate.attr('id');
			
				wpMedia = wp.media({
					title : opbw_script.translate.choose_media,
					multiple: $multiple,
					library: {
						type: [ 'image' ],
						exclude: $multiple ? opbw_get_excluded_media($mediaField) : []
					},
				});

				wpMedia.on('select', function() {
					if ($multiple) {
						var selection = wpMedia.state().get( 'selection' );
						var attachmentPreview,
							attachmentThumb,
							attachmentArr = [];

						selection.map( function( attachment, i ) {
							var attachment = attachment.toJSON();
							
							if ( attachment.sizes.thumbnail ) {
								attachmentThumb = attachment.sizes.thumbnail.url;
							} else {
								attachmentThumb = attachment.url;
							}
							attachmentArr.push(attachment.id);
			
							attachmentPreview = '<img width="50" height="50" style="object-fit: cover;" src="' + attachmentThumb + '">';				
							if (!$('.attachment', mediaValue).length) {
								mediaValue.empty();
							}
							mediaValue.append( '<div class="attachment" data-id="'+attachment.id+'">' + attachmentPreview + actionGallary + '</div>' );
						} );

						var galleryVal = $.merge(opbw_get_excluded_media($mediaField), attachmentArr);
						$mediaField.val(galleryVal.join(','));

						opbwEditor.trigger_edit_media($box_media, $mediaField);
						opbwEditor.trigger_remove_media($box_media, $mediaField);
						opbwEditor.trigger_remove_all_media($box_media, $mediaField);

					} else {
						var attachment = wpMedia.state().get('selection').first().toJSON();
						if(attachment.url) {
							var imgTag = $('img', mediaValue);
							if (imgTag.length) {
								imgTag.attr('src', attachment.url);
							} else {
								mediaValue.empty().append(`<img style="object-fit: cover;" src="${attachment.url}" width="100" height="100" />`);
							}
	
							$mediaField.val(attachment.id);
							btnUpdate.text(opbw_script.translate.change_media);
							opbwEditor.trigger_remove_all_media($box_media, $mediaField);
						}
					}
					$mediaField.change();
				});

				wpMedia.open();
			})
		},

		trigger_edit_media: function($box_media, $mediaField) {
			if(!$('.gallery_action .edit-image', $box_media).length) return false;

			var editBtn = $('.edit-image', $box_media),
				mediaValue = $('.media_value', $box_media),
				media_frame;
			
			editBtn.on('click', function(e) {
				e.preventDefault();
		
				var that = $( this ),
					id = that.closest('.attachment').attr('data-id');
		
				if ( media_frame ) {
					media_frame.close();
				}
		
				media_frame = wp.media.frames.media_frame = wp.media( {
					multiple: false,
					title : opbw_script.translate.choose_media,
					library: {
						type: 'image',
						exclude: opbw_get_excluded_media($mediaField, id)
					},
				} );
		
				media_frame.on( 'open', function() {
					var selection = media_frame.state().get( 'selection' ),
						attachment = wp.media.attachment( id );

					attachment.fetch();
					selection.add( attachment ? [ attachment ] : [] );
				} );
		
				media_frame.on( 'select', function() {
					var attachment = media_frame.state().get( 'selection' ).first().toJSON(),
						attachmentThumb;

					if (id != attachment.id) {
						if ( attachment.sizes.thumbnail ) {
							attachmentThumb = attachment.sizes.thumbnail.url;
						} else {
							attachmentThumb = attachment.url;
						}
			
						that.closest('.attachment').attr('data-id', attachment.id);
						that.closest('.attachment').find( 'img' ).attr( 'src', attachmentThumb );

						let strMediaVal = $mediaField.val();
						$mediaField.val(strMediaVal.replace(id, attachment.id));
					}
				} );
		
				media_frame.open();
			})
		},

		trigger_remove_media: function($box_media, $mediaField) {
			if(!$('.gallery_action .remove-image', $box_media).length) return false;

			var rmBtn = $('.remove-image', $box_media),
				mediaValue = $('.media_value', $box_media);
			
			rmBtn.on('click', function(e) {
				e.preventDefault();
				
				var that = $( this ),
					id = that.closest('.attachment').attr('data-id');
			
				that.closest('.attachment').fadeOut("fast", function() {
					$(this).remove();
					if (!$('.attachment', mediaValue).length) {
						mediaValue.empty().append(opbw_script.translate.no_change);
						if($('.remove_media', $box_media).length) {
							$('.remove_media', $box_media).hide();
						}
					}
				});

				let strMediaVal = opbw_get_excluded_media($mediaField, id);
				$mediaField.val(strMediaVal.join(','));
			})
		},

		trigger_remove_all_media: function($box_media, $mediaField) {
			if(!$('.remove_media', $box_media).length) return false;
			if(!$('.media_value', $box_media).length) return false;

			var removeBtn = $('.remove_media', $box_media),
				btnUpdate = $('.update_media', $box_media),
				mediaValue = $('.media_value', $box_media);
			
			removeBtn.show();
			removeBtn.on('click', function() {
				mediaValue.empty().append(opbw_script.translate.no_change);
				$mediaField.val('');
				$(this).hide();
				btnUpdate.text(opbw_script.translate.media_update);
			})
		},

		trigger_reset_form_edit: function($box) {
			var btnReset = $('.opbw_reset_edit', $box),
				editField = $('.opbw_field', $box);
			if(!btnReset.length) return false;
			if(!editField.length) return false;

			editField.on('change', function() {
				if (btnReset.hasClass('opbw_disable')) {
					btnReset.removeClass('opbw_disable');
				}
			});

			btnReset.on('click', function(e) {
				e.preventDefault();
				if ($(this).hasClass('opbw_disable')) return false;

				$box.show().html(opbwEditor.edit_template);
				
				// ReInit Edit
				opbwInstall.trigger_condition_field($box);
				opbwFilter.trigger_back_step();
				opbwEditor.init($box);
			});
		},

		trigger_submit_editor: function($box) {
			var formEditor = $('.opbw-form', $box),
				btnSubmit = $('#opbw_submit_editor', $box);
			if(!btnSubmit.length) return false;

			formEditor.on('submit', function(e){
				e.preventDefault();
				var params = $(this).serialize();

				$.ajax({ 
					url: opbw_script.ajaxurl,
					type: 'post',
					data: {
						action: 'opbw_handle_editor_form',
						ajax_nonce_parameter: opbw_script.security_nonce,
						params: params
					},
					beforeSend: function() {
						$box.addClass('loading');
					},
					success: function(data) {
						if (typeof data.success != 'undefined') {
							if (data.success) {
								$('.opbw-box').hide();

								// Handle Step Process
								var boxProcess = $(data.data.process_html);
								opbwInstall.trigger_condition_field(boxProcess);
								opbwProcess.init(boxProcess);

								$('#opqw-bulkedit').append(boxProcess);
								opbwInstall.active_step(4);
								opbwFilter.trigger_back_step();
								
							} else {
								opbw_toast_mess('error', data.data.message);
							}
						} else {
							opbw_toast_mess('error', 'Error occured. Please try again!');
						}	
					},
					error: function(xhr) { // if error occured
						alert("Error occured. Please try again!");
						$box.removeClass('loading');
					},
					complete: function() {
						$box.removeClass('loading');
					},
				});
			
			});
		},
		
	};

	/**
	 * ##########################################################################################
	 * Process Function
	 * ##########################################################################################
	 */
	var opbwProcess = {

		init: function($box) {
			this.init_handle_datetime_field($box);
			this.trigger_submit_process($box);
		},

		init_handle_datetime_field: function($box) {
			var fields = $('.opbw_datetime_field', $box);
			if(!fields.length) return false;

			fields.each( function () {
				var field = $(this);
				field.flatpickr({
					enableTime: true,
					dateFormat: "Y-m-d H:i:S",
					altFormat: "Y-m-d H:i:S",
					minDate: Date.now()
				});
			} );
		},

		trigger_submit_process: function($box) {
			var formProcess = $('.opbw-form', $box),
				btnSubmit = $('#opbw_submit_process', $box);
			if(!btnSubmit.length) return false;

			formProcess.on('submit', function(e){
				e.preventDefault();
				var $params = $(this).serialize();

				Swal.fire({
					title: opbw_script.translate.confirm_edit,
					text: opbw_script.translate.confirm_notice,
					icon: "warning",
					showCancelButton: true,
					cancelButtonColor: "#d33",
					cancelButtonText: opbw_script.translate.cancel_btn,
					confirmButtonText: opbw_script.translate.confirm_btn,
					confirmButtonColor: "#3085d6",
				}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({ 
							url: opbw_script.ajaxurl,
							type: 'post',
							data: {
								action: 'opbw_handle_process_form',
								ajax_nonce_parameter: opbw_script.security_nonce,
								params: $params
							},
							beforeSend: function() {
								$box.addClass('loading');
							},
							success: function(data) {
								if (typeof data.success != 'undefined') {
									if (data.success) {
										$('.opbw-box').hide();
			
										// Handle Finish
										var boxFinish = $(data.data.finish_html);

										// Toggle logs trigger
										if ($('#opbw_toggle_logs', boxFinish).length && $('#opbw_logs', boxFinish).length) {
											$('#opbw_toggle_logs', boxFinish).on('click', function(e) {
												e.preventDefault();
												$('#opbw_logs', boxFinish).slideToggle();
											});
										}

										$('#opqw-bulkedit').append(boxFinish);
										opbwInstall.active_step(5);
										opbwProcess.request_handle(data.data.history_id)
										
									} else {
										opbw_toast_mess('error', data.data.message);
									}
								} else {
									opbw_toast_mess('error', 'Error occured. Please try again!');
								}	
							},
							error: function(xhr) { // if error occured
								alert("Error occured. Please try again!");
								$box.removeClass('loading');
							},
							complete: function() {
								$box.removeClass('loading');
							},
						});
					}
				});
			
			});
		},

		request_handle: function($id, $batch = 1) {
			$.ajax({
				url: opbw_script.ajaxurl,
				type: 'post',
				data: {
					action: 'opbw_handle_run_edit',
					ajax_nonce_parameter: opbw_script.security_nonce,
					id: $id,
					batch: $batch
				},
				beforeSend: function() {},
				success: function(data) {
					if (typeof data.success != 'undefined') {
						if (data.success) {
							
							var percentage = data.data.percentage,
                            number_edited = data.data.number_edited,
                            logs = data.data.logs;

							// Handle progress bar
							$('#opbw-finish .progress-bar').css('width', percentage + '%');
							$('#opbw-finish .progress-bar span').text(percentage + '%');
							if (percentage == 100) {
								$('#opbw_history_link').removeClass('opbw_disable');
								opbw_toast_mess('success', opbw_script.translate.edit_success);
								// opbw_toast_mess('success', opbw_script.translate.edit_success_notice);
							}

							// Show number edited
							$('#opbw-finish .number_edited').text(number_edited);

							// Write logs
							if (logs && logs.length) {
								var logBox = $('#opbw_logs code ul');
								if ($('.nothing', logBox).length) {
									$('.nothing', logBox).remove();
								}
								logs.forEach(log => {
									logBox.append(`<li>${log}</li>`);
								});
							}

							// Handle batch
							if (data.data.next_batch) {
								opbwProcess.request_handle($id, data.data.next_batch)
							}
						} else {
							opbw_toast_mess('error', data.data.message);
						}
					} else {
						opbw_toast_mess('error', 'Error occured. Please try again!');
					}
				},
				error: function(xhr) { // if error occured
					alert("Error occured. Please try again!");
				},
				complete: function() {},
			});
		}
	};
	
	// Run
	localStorage.removeItem('opbw_history_id');
	opbwFilter.init_filter();

	$.fn.opbwFilter = opbwFilter;

})( jQuery );
