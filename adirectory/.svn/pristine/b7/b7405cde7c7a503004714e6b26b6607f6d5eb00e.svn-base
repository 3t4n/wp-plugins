(function ($) {
	function isValidURL(string) {
		try {
			new URL(string);
			return true;
		} catch (err) {
			return false;
		}
	}

	// non tag list action
	function adqs_tax_lists_action() {
		$('.adqs-taxonomyDropdown-items input[type="checkbox"]').each(
			function () {
				$(this).after(`<span class="dashicons dashicons-yes"></span>`);
			}
		);
		$('.adqs-taxonomyDropdown-items input[type="checkbox"]').on(
			'change',
			function () {
				const that = $(this);
				let selectedValues = [];
				that.closest('.adqs-taxonomyDropdown-items')
					.find('input[type="checkbox"]:checked')
					.each(function () {
						selectedValues.push($(this).val());
					});
				that.closest('.adqs-tax-multichebox')
					.find('input[type="hidden"]')
					.attr('value', selectedValues.join(','));
			}
		);

		$('.adqs-tax-multichebox input[type="text"]').on('keyup', function () {
			let searchTerm = $(this).val().toLowerCase();
			$(this)
				.closest('.adqs-tax-multichebox')
				.find('.adqs-checkbox')
				.each(function () {
					const checkbox = $(this);
					if (checkbox.text().toLowerCase().indexOf(searchTerm) > -1) {
						checkbox.show();
					} else {
						checkbox.hide();
					}
				});
		});

		$('.adqs-tax-multichebox input[type="text"]').focusin(function (e) {
			const that = $(this);
			thatMultichebox = that.closest('.adqs-tax-multichebox'),
			otherMultichebox = thatMultichebox.siblings('.adqs-tax-multichebox');
			thatMultichebox.find('input[type="text"]')
				.val('')
				.trigger('keyup');

			getHiddenVal = otherMultichebox.find('input[type="hidden"]').attr('value');
			if (getHiddenVal) {
				otherMultichebox.find('input[type="text"]').val(getHiddenVal);
			}

		});



		$('.adqs-tax-multichebox').on('click', function (e) {
			const that = $(this);
			$('.adqs-taxonomyDropdown-items').removeClass('adqs-active');
			that.find('.adqs-taxonomyDropdown-items').addClass('adqs-active');
			e.stopPropagation(); // Prevent this event from bubbling up to the document
		});

		// Remove class when clicking outside
		$(document).on('click', function () {
			const taxDropdown = $('.adqs-taxonomyDropdown-items');
			taxDropdown.removeClass('adqs-active');
			taxDropdown.each(function () {
				const that = $(this),
					thatMultichebox = that.closest('.adqs-tax-multichebox'),
					getHiddenVal = thatMultichebox
						.find('input[type="hidden"]')
						.attr('value');
				if (getHiddenVal) {
					thatMultichebox
						.find('input[type="text"]')
						.val(getHiddenVal);
				}
			});
		});

		// Remove class when clicking close button
		$('.adqs-tax-multichebox .adqs-dropdown-close').on(
			'click',
			function (e) {
				const that = $(this),
					thatMultichebox = that.closest('.adqs-tax-multichebox'),
					getHiddenVal = thatMultichebox
						.find('input[type="hidden"]')
						.attr('value');
				that.closest('.adqs-tax-multichebox')
					.find('.adqs-taxonomyDropdown-items')
					.removeClass('adqs-active');

				if (getHiddenVal) {
					thatMultichebox
						.find('input[type="text"]')
						.val(getHiddenVal);
				}
				e.stopPropagation();
			}
		);
		$('.adqs-tax-multichebox .adqs-dropdown-reset').on(
			'click',
			function (e) {
				const that = $(this),
					thatMultichebox = that.closest('.adqs-tax-multichebox');
				thatMultichebox.find('input[type="hidden"]').attr('value', '');
				thatMultichebox
					.find('input[type="checkbox"]')
					.prop('checked', false);
			}
		);
	}

	// non add fragment
	function adqs_filter_sidebar_toggle() {
		const selectors = `.qsd-prodcut-grid-with-side-bar-main:not(.adqs_layoutTypetop) .qsd-prodcut-grid-with-side-bar-titel`;

		$(selectors).on('click', function () {
			const that = $(this);
			$(selectors).not(that).next().slideUp();
			that.next().slideToggle();
		});

		$(
			'.qsd-prodcut-grid-with-side-bar-main:not(.adqs_layoutTypetop) .qsd-advancedTop_filter .qsd-prodcut-grid-with-side-bar-titel'
		).trigger('click');
	}
	// non add fragment
	function adqs_add_fragment_view() {
		const allSelectors = `.qsd-catagory-list-btn a, .page-numbers a, #adqs_allSortBy option, #adqs_ag_allSortBy option, .qsd-grid-list-btn-main a, .qsd-reset-btn`;

		$(allSelectors).each(function () {
			const that = $(this);
			const closestFragmentElement = that.closest('[data-ad-fragment]'); // Correct selector syntax
			const fragment = closestFragmentElement.data('ad-fragment');

			if (fragment && that.length > 0) {
				if (that.attr('href')) {
					that.attr('href', function (i, cVal) {
						if (isValidURL(cVal)) {
							return `${cVal}#${fragment}`;
						}
						return cVal;
					});
				}
				if (that.attr('value')) {
					that.attr('value', function (i, cVal) {
						if (isValidURL(cVal)) {
							return `${cVal}#${fragment}`;
						}
						return cVal;
					});
				}
			}
		});
	}

	// non ajax list grid view
	function adqs_non_ajax_list_grid_view() {
		$('.qsd-grid-list-btn-main .qsd-grid-list-btn').on(
			'click',
			function (e) {
				let that = $(this),
					targetWrapper = that
						.closest('.qsd-content-area')
						.find('.qsd-prodcut-grid-list-main'),
					btnMainWrap = that.closest('.qsd-grid-list-btn-main');
				$('.qsd-grid-list-btn-main .qsd-grid-list-btn').removeClass(
					'active'
				);
				that.addClass('active');

				if (
					btnMainWrap.data('listviewclass') &&
					that.hasClass('view-btn')
				) {
					e.preventDefault();

					if (that.hasClass('has-list-view')) {
						targetWrapper.addClass(
							btnMainWrap.data('listviewclass')
						);
					} else {
						targetWrapper.removeClass(
							btnMainWrap.data('listviewclass')
						);
					}
				}
			}
		);
	}

	// add listing tax searching
	function adqs_add_tax_searching() {
		$('.qsd-ad-search-tax input[type="search"]').on('keyup', function () {
			let searchTerm = $(this).val().toLowerCase();
			$(this)
				.closest('.adqs-form-inner')
				.find('.adqs-checkbox')
				.each(function () {
					const checkbox = $(this);
					if (
						checkbox.text().toLowerCase().indexOf(searchTerm) > -1
					) {
						checkbox.show();
					} else {
						checkbox.hide();
					}
				});
		});
	}

	// adqs widget tax see more
	function adqs_widget_tax_see_more() {
		$('.qsd-tax-see-more').each(function(){
			const seeMoreBtn = $(this),
			seeMoreText = seeMoreBtn.text(),
			seeLessText = seeMoreBtn.data('less-text');
			if(seeMoreBtn.closest('.qsd-widget-tax-wrap').find('.qsd-widget-tax > li:hidden').length > 0){
				seeMoreBtn.addClass('active');
			}

			$('.qsd-widget-tax > li:hidden').addClass('has-hidden');

			seeMoreBtn.on('click', function (e) {
				e.preventDefault();
				let that = $(this),
					thatWrap = that.closest('.qsd-widget-tax-wrap'),
					hiddenItems = thatWrap.find('.qsd-widget-tax > li.has-hidden');

				hiddenItems.slideToggle(function () {
					// Toggle text based on visibility
					if (hiddenItems.is(':visible')) {
						that.text(seeLessText);
					} else {
						that.text(seeMoreText);
					}
				});
			});
		});

	}


	/* Load all function after document ready */
	$(function () {
		if (typeof adqs_tax_lists_action === 'function') {
			adqs_tax_lists_action();
		}
		if (typeof adqs_filter_sidebar_toggle === 'function') {
			adqs_filter_sidebar_toggle();
		}
		if (typeof adqs_add_fragment_view === 'function') {
			adqs_add_fragment_view();
		}
		if (typeof adqs_non_ajax_list_grid_view === 'function') {
			adqs_non_ajax_list_grid_view();
		}
		if (typeof adqs_add_tax_searching === 'function') {
			adqs_add_tax_searching();
		}
		if (typeof adqs_widget_tax_see_more === 'function') {
			adqs_widget_tax_see_more();
		}
	});
})(jQuery);
