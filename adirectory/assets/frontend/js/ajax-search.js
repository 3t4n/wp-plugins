(function ($) {
	const isValidUrl = function (string) {
		try {
			new URL(string);
			return true;
		} catch (e) {
			return false;
		}
	};

	const getQueryParam = function (url, key) {
		const urlObj = new URL(url);
		const params = new URLSearchParams(urlObj.search);
		return params.get(key);
	};

	const updateQueryParam = function (key, value, url) {
		url = url || window.location.href;
		const urlObj = new URL(url);
		if (!value) {
			urlObj.searchParams.delete(key);
		} else {
			urlObj.searchParams.set(key, value);
		}

		return urlObj.toString();
	};

	const getQueryString = function (url) {
		url = url || window.location.href;
		const urlObj = new URL(url);
		return urlObj.searchParams.toString();
	};

	const getPageFromUrl = function (url) {
		url = url || window.location.href;
		const match = url.match(/(?:\/page\/|[?&]paged=)([1-9]\d*)/);
		if (match) {
			return Number(match[1]);
		}
		return 1;
	};

	function adqs_ajax_search() {
		if (!$('.adqs-ajax-search input[name="ls"]').length) {
			return;
		}

		const insertSearchVal = function () {
			$('.adqs-ajax-search-item').on('click', function () {
				let that = $(this),
					thatDataVal = that.data('title'),
					parentForm = that.closest('form');
				parentForm.find('input[name="ls"]').val(thatDataVal);
				parentForm.find('.adqs_ajax_search_results').html('');
			});
		};

		$('.adqs-ajax-search input[name="ls"]').on(
			'keyup',
			$.debounce(200, function () {
				const that = $(this),
					searchVal = that.val(),
					parentForm = that.closest('form'),
					categoryVal = parentForm.find(
						'select[name="category"] option'
					).length
						? parentForm
								.find('select[name="category"] option:selected')
								.val()
						: '',
					locationVal = parentForm.find(
						'select[name="location"] option'
					).length
						? parentForm
								.find('select[name="location"] option:selected')
								.val()
						: '',
					searchParent = parentForm.find('.adqs-ajax-search'),
					searchResults = parentForm.find(
						'.adqs_ajax_search_results'
					);

				if (searchParent.hasClass('adqsp-ajax-loading')) {
					return;
				}

				if (!searchVal || searchVal.length < 3) {
					searchParent.removeClass('adqsp-ajax-loading');
					searchResults.html('');
					return;
				} else {
					searchParent.addClass('adqsp-ajax-loading');
				}
				// ajax request
				$.ajax({
					type: 'GET',
					url: searchResults.data('ajax-url'),
					data: {
						searchVal: searchVal,
						categoryVal: categoryVal,
						locationVal: locationVal,
						directoryType: searchResults.data('directory-type')
							? searchResults.data('directory-type')
							: '',
						author_id: searchResults.data('author-id'),
						security: searchResults.data('ajax-security'),
						action: 'adqs_ajax_search',
					},
					success(response) {
						const data = response.data ? response.data : [],
							results_html = data.results_html
								? data.results_html
								: '';

						if (results_html) {
							searchResults.html(results_html);
							insertSearchVal();
						} else {
							searchResults.html('');
						}
					},
					complete() {
						searchParent.removeClass('adqsp-ajax-loading');
					},
					/* error(error) {
						console.log(error);
					}, */
				});
				return false;
			})
		);
	}

	/* Ajax Filters */
	function adqs_ajax_filters() {
		const $Area = function (selector, targetWrapper) {
			if (!selector.closest('.qsd-content-area').find(targetWrapper)) {
				return;
			}
			return selector.closest('.qsd-content-area').find(targetWrapper);
		};

		const mainContentWrapper = '.qsd-dl-wrapper',
			ajaxContentWrapper = '.qsd-dl-ajax-content',
			advancedFilterForm = $('.qsd-advancedTop_filter').closest('form');

		const ajaxFiltersLoader = function (thatSelector, page_number) {
			const mainContentWrapperS = $Area(thatSelector, mainContentWrapper),
				ajaxContentWrapperS = $Area(thatSelector, ajaxContentWrapper);

			if (
				!getQueryString().includes('directory_type') &&
				ajaxContentWrapperS.data('dir-type')
			) {
				let currentUrl = window.location.href;
				currentUrl = updateQueryParam(
					'directory_type',
					ajaxContentWrapperS.data('dir-type'),
					currentUrl
				);
				history.pushState(null, '', currentUrl);
			}

			if (mainContentWrapperS.hasClass('ajax-loading')) {
				return;
			}

			mainContentWrapperS.addClass('ajax-loading');

			setTimeout(function () {
				$.ajax({
					url: qsAjxFilter.ajaxurl,
					type: 'GET',
					data: {
						form_data: getQueryString(),
						base_url: ajaxContentWrapperS.data('base-url') || '',
						per_page: ajaxContentWrapperS.data('per-page') || 1,
						view_type:ajaxContentWrapperS.data('view-type'),
						short_by:ajaxContentWrapperS.data('short-by'),
						directory_type:ajaxContentWrapperS.data('dir-type'),
						category:ajaxContentWrapperS.data('category'),
						location:ajaxContentWrapperS.data('location'),
						tags:ajaxContentWrapperS.data('tags'),
						rating:ajaxContentWrapperS.data('rating'),
						display_listings:ajaxContentWrapperS.data('display-listings'),
						filter_layout:
							ajaxContentWrapperS.data('filter-layout') || 'top',
						pagination_type:
							ajaxContentWrapperS.data('pagination-type') || '',
						uniq_id:
							ajaxContentWrapperS.data('carousel-settings')
								?.uniq_id || '',
						paged: page_number || 1,
						security: qsAjxFilter.security,
						action: 'adqs_filters_listings',
					},
					success: function (response) {
						const htmlContent = response?.data?.html_content;
						ajaxContentWrapperS.html(htmlContent);
					},
					error: function () {
						console.log('error');
					},
					complete: function () {
						mainContentWrapperS.removeClass('ajax-loading');
					},
				});
			}, 50);
		};

		advancedFilterForm.on('submit', function (e) {
			e.preventDefault();

			// Collect form data
			const formData = $(this)
				.serializeArray()
				.filter((field) => field.value.trim() !== '')
				.map(
					(field) =>
						`${encodeURIComponent(field.name)}=${encodeURIComponent(field.value)}`
				)
				.join('&');

			// Update URL with query parameters
			const baseUrl = window.location.origin + window.location.pathname;
			const newUrl = formData ? `${baseUrl}?${formData}` : baseUrl;
			history.pushState(null, '', newUrl);

			ajaxFiltersLoader($(this));
		});

		const directoryTypeSelector = $('#qsd_directory_type.has-ajax a');
		directoryTypeSelector.on('click', function (e) {
			e.preventDefault();

			const that = $(this),
				directory_type = that.attr('href');

			directoryTypeSelector.removeClass('active');
			that.addClass('active');
			let currentUrl = window.location.href;
			advancedFilterForm
				.find('[name="directory_type"]')
				.val(directory_type);
			currentUrl = updateQueryParam(
				'directory_type',
				directory_type,
				currentUrl
			);
			history.pushState(null, '', currentUrl);

			if (advancedFilterForm.length) {
				advancedFilterForm.trigger('submit');
			} else {
				ajaxFiltersLoader(that);
			}
		});

		$('#adqs_allSortBy').on('change', function () {
			const that = $(this),
				sortBy = that.find('option:selected').val();
			let currentUrl = window.location.href;
			advancedFilterForm.find('[name="short_by"]').val(sortBy);
			currentUrl = updateQueryParam('short_by', sortBy, currentUrl);
			history.pushState(null, '', currentUrl);

			ajaxFiltersLoader(that);
		});

		// grid list view
		const gridListView = $('.qsd-grid-list-btn-main a.qsd-grid-list-btn');
		gridListView.on('click', function (e) {
			const that = $(this),
				viewType = that.attr('href');

			if (isValidUrl(viewType)) {
				return;
			}
			e.preventDefault();

			gridListView.removeClass('active');
			that.addClass('active');

			let currentUrl = window.location.href;
			advancedFilterForm
				.find('[name="view_type"]')
				.val(that.attr('href'));
			currentUrl = updateQueryParam(
				'view_type',
				that.attr('href'),
				currentUrl
			);
			history.pushState(null, '', currentUrl);

			ajaxFiltersLoader(that);
		});

		$(ajaxContentWrapper).on('click', 'a.page-numbers', function (e) {
			e.preventDefault();
			const that = $(this);
			let currentUrl = that.attr('href');
			if (currentUrl) {
				const queryString = getQueryString();

				currentUrl = currentUrl.split('?')[0];
				const newUrl = queryString
					? `${currentUrl}?${queryString}`
					: currentUrl;
				history.pushState(null, '', newUrl);

				ajaxFiltersLoader(that, getPageFromUrl(currentUrl));
			}
		});
	}

	/* Ajax Filters */
	function adqs_tax_ajax_filters() {
		const ajaxTaxFiltersLoader = function (thatSelector, page_number) {
			const mainTaxtWrapper = thatSelector.closest('.qsd-tax-ajax');

			if (
				!getQueryString().includes('directory_type') &&
				mainTaxtWrapper.data('dir-type')
			) {
				let currentUrl = window.location.href;
				currentUrl = updateQueryParam(
					'directory_type',
					mainTaxtWrapper.data('dir-type'),
					currentUrl
				);
				history.pushState(null, '', currentUrl);
			}

			if (
				mainTaxtWrapper
					.find('.qsd-taxt-content-area')
					.hasClass('ajax-loading')
			) {
				return;
			}

			mainTaxtWrapper
				.find('.qsd-taxt-content-area')
				.addClass('ajax-loading');

			setTimeout(function () {
				$.ajax({
					url: qsAjxFilter.ajaxurl,
					type: 'GET',
					data: {
						form_data: getQueryString(),
						base_url: mainTaxtWrapper.data('base-url') || '',
						per_page: mainTaxtWrapper.data('per-page') || 1,
						tax_name: mainTaxtWrapper.data('tax-name') || '',
						order: mainTaxtWrapper.data('order') || '',
						orderby: mainTaxtWrapper.data('orderby') || '',
						terms: mainTaxtWrapper.data('terms') || '',
						pagination_type:
							mainTaxtWrapper.data('pagination-type') || '',
						ajax_filter: mainTaxtWrapper.data('ajax-filter') || '',
						uniq_id:
							mainTaxtWrapper.data('carousel-settings')
								?.uniq_id || '',
						paged: page_number || 1,
						security: qsAjxFilter.security,
						action: 'adqs_tax_filters',
					},
					success: function (response) {
						const htmlContent = response?.data?.html_content;
						mainTaxtWrapper
							.find('.qsd-taxt-content-area')
							.html(htmlContent);
					},
					error: function () {
						console.log('error');
					},
					complete: function () {
						mainTaxtWrapper
							.find('.qsd-taxt-content-area')
							.removeClass('ajax-loading');
					},
				});
			}, 50);
		};

		$('.qsd-tax-ajax').on(
			'click',
			'.qsd-catagory-list-btn a',
			function (e) {
				e.preventDefault();

				const that = $(this),
					directory_type = getQueryParam(
						that.attr('href'),
						'directory_type'
					);

				that.closest('.qsd-catagory-list-btn')
					.find('a')
					.removeClass('active');
				that.addClass('active');
				let currentUrl = window.location.href;
				currentUrl = updateQueryParam(
					'directory_type',
					directory_type,
					currentUrl
				);
				history.pushState(null, '', currentUrl);

				ajaxTaxFiltersLoader(that);
			}
		);

		$('.qsd-tax-ajax').on('click', 'a.page-numbers', function (e) {
			e.preventDefault();
			const that = $(this);
			let currentUrl = that.attr('href');
			if (currentUrl) {
				const queryString = getQueryString();

				currentUrl = currentUrl.split('?')[0];
				const newUrl = queryString
					? `${currentUrl}?${queryString}`
					: currentUrl;
				history.pushState(null, '', newUrl);

				ajaxTaxFiltersLoader(that, getPageFromUrl(currentUrl));
			}
		});
	}

	/* Load all function after document ready */
	$(function () {
		if (typeof adqs_ajax_search === 'function') {
			adqs_ajax_search();
		}

		if ($('.qsd-dl-ajax-content').length) {
			if (typeof adqs_ajax_filters === 'function') {
				adqs_ajax_filters();
			}
		}

		if (typeof adqs_tax_ajax_filters === 'function') {
			adqs_tax_ajax_filters();
		}
	});
})(jQuery);
