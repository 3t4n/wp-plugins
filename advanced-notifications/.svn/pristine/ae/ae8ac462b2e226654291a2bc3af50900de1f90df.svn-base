jQuery(document).ready( function($) {
	// HIDE CHILDREN FIELDS
	function eis_hide_children_field(element) {
		element = typeof element !== 'undefined' ? element : false;
		if (element) {
			let parent_option_name = $(element).attr('data-option-name');
			if (typeof parent_option_name != 'undefined') {
				let parent_value = $(element).val();
				let children_option = $('[data-parent-option="'+parent_option_name+'"]');
				children_option.each(function(index,child) {
					$(child).addClass('hidden');
				});
			}
		}
	}
	// HIDE CHILD FIELDS
	function eis_hide_child_field(element) {
		element = typeof element !== 'undefined' ? element : false;
		if (!$(element).is('input, select')) {
			element = $(element).find('input, select')[0];
		}
		if (element) {
			let parent_option_name = $(element).closest('[data-option-name]').attr('data-option-name');
			if (typeof parent_option_name != 'undefined') {
				let parent_value = $(element).val();
				let children_option = $('[data-parent-option="'+parent_option_name+'"]');
				children_option.each(function(index,child) {
					let child_parent_show_value = $(child).attr('data-parent-value');
					let child_parent_hide_value = $(child).attr('data-hide-value');
					if (typeof child_parent_show_value != 'undefined') {
						if (jQuery.inArray(parent_value, child_parent_show_value.split(',')) !== -1) {
							$(child).removeClass('hidden');
							eis_hide_child_field(child);
						} else {
							$(child).addClass('hidden');
							eis_hide_children_field(child);
						}
					} else if (typeof child_parent_hide_value != 'undefined') {
						if (jQuery.inArray(parent_value, child_parent_hide_value.split(',')) !== -1) {
							$(child).addClass('hidden');
							eis_hide_children_field(child);
						} else {
							$(child).removeClass('hidden');
							eis_hide_child_field(child);
						}
					}
				});
			}
		}
	}
	$(document).on("input", ".eis-interface-settings input, .eis-interface-settings select", function(e){
		e.stopPropagation();
		eis_hide_child_field(this);
	});
	$(document).on("click", "input[name*=_display_eis_checkbox]", function(e) {
		if ($(this).is(":checked")) {
			$(this).parent().children("input[type=hidden]").val($(this).val());
		} else {
			$(this).parent().children("input[type=hidden]").val('no');
		}
	});
});
