jQuery(function($) {
	var param_post_type;
	var param_cat;
	var param_tag;
	function getUrlParameter(name) {
		name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
		var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
		var results = regex.exec(location.search);
		return results === null
			? ''
			: decodeURIComponent(results[1].replace(/\+/g, ' '));
	}
	$(window).on('load', function() {
		param_post_type = getUrlParameter('post_types');
		param_cat = getUrlParameter('categories');
		param_tag = getUrlParameter('tags');
		$('form.search-form').each(function(i, v) {
			var param_post_type = getUrlParameter('post_types');
			var param_cat = getUrlParameter('categories');
			var param_tag = getUrlParameter('tags');
			if ($(v).width() < 480) {
				$(v).addClass('small');
			} else {
				$(v).addClass('large');
			}
			$(v).addClass('asc-active');

			$(v).css('position', 'relative');
			$(v).append(
				`<input type="hidden" name="post_types" value="${param_post_type}" />
			<input type="hidden" name="categories" value="${param_cat}" />
			<input type="hidden" name="tags" value="${param_tag}" />`
			);
		});

		$('.search-field').after(
			'<i class="asc-settings dashicons dashicons-admin-generic"></i>'
		);

		var query;
		var input = '';

		if (1 == ajax_object.options.enable_post_filter) {
			input += `<div class="acs-filter-container posttype">`;
			input += `<p>Filter by Post Type</p><ul>`;
			postType = param_post_type.split(',');

			var i = 0;
			$.each(ajax_object.post_type, function(index, value) {
				var checked = '';

				if ($.inArray(value, postType) > -1) {
					checked = 'checked';
				}
				input += `
				<li>
					<input class="acs-filter-posttype filter" input name="post_type" type="checkbox" value="${value}" ${checked} />&nbsp;${value
					.charAt(0)
					.toUpperCase()}${value.slice(1)}&nbsp;
				</li>
			`;
				i++;
			});
			input += `</ul></div>`;
		}

		if (1 == ajax_object.options.enable_category_filter) {
			input += '<div class="acs-filter-container category">';
			input += '<p>Filter by Categories</p><ul>';
			categories = param_cat.split(',');
			var i = 0;
			$.each(ajax_object.categories, function(index, value) {
				var checked = '';

				if ($.inArray(value.term_id.toString(), categories) > -1) {
					checked = 'checked';
				}
				input += `
			<li>
				<input class="acs-filter-category filter" input name="category" type="checkbox" value="${value.term_id}" ${checked} />&nbsp;${value.name}&nbsp;
			</li>
			`;
				i++;
			});
			input += '</ul></div>';
		}

		if (1 == ajax_object.options.enable_tags_filter) {
			input += `<div class="acs-filter-container tags">`;
			input += `<p>Filter by Tags</p><ul>`;
			tags = param_tag.split(',');
			var i = 0;
			$.each(ajax_object.tags, function(index, value) {
				var checked = '';
				if ($.inArray(value.term_id.toString(), tags) > -1) {
					checked = 'checked';
				}
				input += `
			<li>
				<input class="acs-filter-tags filter" input name="tag" type="checkbox" value="
			${value.term_id}" ${checked} />&nbsp;${value.name}&nbsp;
			</li>
			`;
				i++;
			});
			input += `</ul></div>`;
		}

		$('.search-field')
			.parents('form')
			.after(
				`<div id="ajax-autosearch" class="acs-container" style="display: none;"><form>${input}</form></div>`
			);
	});
	$('.search-field').on('keyup focus', function() {
		var $this = $(this);
		query = $(this).val();
		var post_type = [];
		var category = [];
		var tag = [];

		$.each($("input[name='post_type']:checked"), function() {
			post_type.push($(this).val());
		});

		$.each($("input[name='category']:checked"), function() {
			category.push($(this).val());
		});

		$.each($("input[name='tag']:checked"), function() {
			tag.push($(this).val());
		});

		if ('' == query) {
			$this
				.parents('form')
				.siblings('.asc-container')
				.remove();
			$('#ajax-autosearch').hide();
			return false;
		} else {
			if ($('#ajax-autosearch').length == 0) {
			} else {
				//$('#autocomplete-search').show();
			}
		}

		var data = {
			action: 'search',
			query: query,
			post_type: post_type,
			category: category,
			tag: tag
		};

		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajax_object.ajax_url, data, function(response) {
			$this
				.parents('form')
				.siblings('.asc-container')
				.remove();
			var $form = $this.parents('form');
			if ('' != query) {
				var result;
				result = render_results($form, ajax_object, response);
				$this.parents('form').after(result);
				if (0 == $('#autocomplete-close').length)
					$this.after(
						`<i id="autocomplete-close" class="dashicons dashicons-no"></i>`
					);
			} else {
				$this
					.parents('form')
					.siblings('.asc-container')
					.remove();
			}
		});
	});

	function render_results($form, ajax_object, response) {
		var width = $form.width();
		var $offsetTop = $form.offset().top;
		var $documentHeight = $(document).height();
		var $diff = $documentHeight - $offsetTop;
		var style = '';
		var container_class = ajax_object.options.layout;
		if ('grid-layout' == ajax_object.options.layout) {
			container_class = `${ajax_object.options.layout} ${ajax_object.options.column}`;
		}

		if ('0' == ajax_object.options.show_featured_image) {
			container_class += ' aas-image-off';
		}

		$form.siblings('.acs-container').css('top', '-180');
		style += `width: ${width}px;`;
		if ($diff < 250) {
			style += `top: -250px;`;
		}

		if ('' == response) {
			result = `
						<div class="asc-container ${container_class}" style="${style}">
							<div id="autocomplete-search-results" class="ajax-autosearch-results">
								${ajax_object.no_result_found}
							</div>
						</div>
					`;
		} else {
			var button = `
						<a class="asc-submit-button" href="#">
						${ajax_object.more_button}
						</a>
					`;
			result = `
						<div class="asc-container ${container_class}" style="${style}">
							<div id="autocomplete-search-results" class="ajax-autosearch-results">
								${response}
								${button}
							</div>
						</div>
					`;
		}
		return result;
	}

	$('body').on('click', '#autocomplete-close', function(e) {
		if ('autocomplete-close' == e.target.id) {
			$this = $('#' + e.target.id);
			$this
				.parents('form.search-form')
				.parents('section')
				.find('div#ajax-autosearch')
				.hide();
			$this
				.parents('form.search-form')
				.siblings('.asc-container')
				.remove();
			$this.prev('.search-field').val('');
			$this.remove();
			flag = false;
		}
	});

	$('body').on('change', '.filter', function(e) {
		var $this = $(this);
		var post_type = [];
		var category = [];
		var tag = [];

		$.each($("input[name='post_type']:checked"), function() {
			post_type.push($(this).val());
		});

		$.each($("input[name='category']:checked"), function() {
			category.push(parseInt($(this).val()));
		});

		$.each($("input[name='tag']:checked"), function() {
			tag.push(parseInt($(this).val()));
		});

		if ('' == query) {
			$this
				.parents('form')
				.siblings('.asc-container')
				.remove();
			$('#ajax-autosearch').hide();
			return false;
		} else {
			if ($('#ajax-autosearch').length == 0) {
			} else {
				//$('#autocomplete-search').show();
			}
		}

		var data = {
			action: 'search',
			query: query,
			post_type: post_type,
			category: category,
			tag: tag
		};
		$this = $(e.target)
			.parents('#ajax-autosearch')
			.siblings('form.search-form');

		$this.find("input[name='post_types']").val(post_type);
		$this.find("input[name='categories']").val(category);
		$this.find("input[name='tags']").val(tag);

		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajax_object.ajax_url, data, function(response) {
			$this.siblings('.asc-container').remove();
			var result;
			result = render_results($this, ajax_object, response);
			$this.after(result);
			if (0 == $('#autocomplete-close').length) {
				$this
					.children('input.search-field')
					.after(
						`<i id="autocomplete-close" class="dashicons dashicons-no"></i>`
					);
			}
		});
	});

	$('body').on('click', '.asc-settings', function() {
		var $form = $(this).parents('form.search-form');
		var $offsetTop = $form.offset().top;
		var $documentHeight = $(document).height();
		var $diff = $documentHeight - $offsetTop;
		if ($diff < 250) {
			$form.siblings('.acs-container').css('top', '-140px');
		}
		var width = $(this)
			.parents('form.search-form')
			.width();
		$form.siblings('.acs-container').css('width', width);

		$(this)
			.parents('form.search-form')
			.siblings('.acs-container')
			.toggle();
	});

	var params_array = [];
	$('body').on('click', '.asc-submit-button', function(e) {
		e.preventDefault();
		$(e.target)
			.parents('.asc-container')
			.siblings('form.search-form')
			.find(':input')
			.each(function(i, v) {
				var input_class = $(v).attr('class');

				if ('search-field' == input_class) {
					params_array.push($(v).val());
				} else if ('ajax-autosearch-filter-input' == input_class) {
					if ('' != $(v).val()) {
						params_array.push($(v).attr('name') + '=' + $(v).val());
					}
				}
			});
		window.location.href = ajax_object.home_url + params_array.join('&');
	});

	$('form.search-form').on('submit', function(e) {
		var $post_type_input = $(this).find('input[name="post_types"]');
		var $cat_input = $(this).find('input[name="categories"]');
		var $tag_input = $(this).find('input[name="tags"]');

		if ('' === $post_type_input.val()) {
			$post_type_input.remove();
		}
		if ('' === $cat_input.val()) {
			$cat_input.remove();
		}
		if ('' === $tag_input.val()) {
			$tag_input.remove();
		}
	});
});
