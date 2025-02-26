(function ($) {

	$(document).ready(function ($) {

		/**
		 * Global vars
		 *
		 * @since       1.0.0
		 * @type        {number}
		 */

			// Icon vars.
		var $iconPreviewList = $('.sio-preview__icons'),
			$iconSortingList = $('.sio-sort__icons'),
			$checkbox = $('.sio-switch input[type="checkbox"]'),
			$icon;

		// Icon field vars.
		var $iconAlignment = $('#alignment'),
			$iconBackground = $('#background'),
			$iconCustomBackground = $('#custom-background'),
			$iconShape = $('#shape'),
			$iconSize = $('#size'),
			$iconSpacing = $('#spacing');

		// Other vars.
		var $colourPicker = $('#sio-colour-picker'),
			$paletteReplacer = $('.sio-spectrum'),
			customColour = '',
			transitionSpeed = 400,
			emptyMessage = 'Oops. It looks like you have not activated any accounts yet.';

		/**
		 * Update global var after delay.
		 *
		 * @since       1.0.0
		 */
		setTimeout(function () {
			$icon = $('.sio-icon-editable');
		}, 400);

		/**
		 * Function to convert RGB to HEX.
		 *
		 * @since       1.0.0
		 * @param       orig
		 * @returns     {string}
		 */
		function rgb2hex(orig) {
			var rgb = orig.replace(/\s/g, '').match(/^rgba?\((\d+),(\d+),(\d+)/i);
			return (rgb && rgb.length === 4) ? '#' +
				('0' + parseInt(rgb[1], 10).toString(16)).slice(-2) +
				('0' + parseInt(rgb[2], 10).toString(16)).slice(-2) +
				('0' + parseInt(rgb[3], 10).toString(16)).slice(-2) : orig;
		}

		/**
		 * Handles the click event for the settings tabs.
		 *
		 * @since       1.0.0
		 */
		function settingsTabs() {

			var $tabContainer = $('.sio-tabs');
			var $tabHeading = $tabContainer.find('li'),
				$tabContent = $('.sio-tab-content'),
				activeClass = 'current';

			$tabHeading.on('click', function () {

				var tabID = $(this).attr('data-tab');

				$tabHeading.removeClass(activeClass);
				$tabContent.removeClass(activeClass);

				$(this).addClass(activeClass);
				$('#' + tabID).addClass(activeClass);

			});

			// Open tab content depending on hash in Url.
			var hash = window.location.hash;

			// Tab content panes.
			var $tabContent1 = $('#tab-1'),
				$tabContent2 = $('#tab-2'),
				$tabContent3 = $('#tab-3');

			// Remove current class from panes.
			$tabHeading.removeClass(activeClass);
			$tabContent.removeClass(activeClass);

			if ('#accounts' === hash) {

				$tabContainer.find('[data-tab="tab-1"]').addClass(activeClass);
				$tabContent1.addClass(activeClass);

			} else if ('#customise' === hash) {

				$tabContainer.find('[data-tab="tab-2"]').addClass(activeClass);
				$tabContent2.addClass(activeClass);

			} else if ('#display' === hash) {

				$tabContainer.find('[data-tab="tab-3"]').addClass(activeClass);
				$tabContent3.addClass(activeClass);

			} else {

				$tabContainer.find('[data-tab="tab-1"]').addClass(activeClass);
				$tabContent1.addClass(activeClass);

			}

		}

		/**
		 * Checks which accounts should display Url fields,
		 * depending on whether the former have been switched on by the user.
		 *
		 * @since       1.0.0
		 */
		function accountUrlFields() {

			function urlFieldProps() {

				var $field = $(this).parent().next().find('input');
				var id = $(this).attr('id');

				if ($(this).is(':checked')) {

					// Remove 'disabled' prop from field and add 'required'.
					$field.prop('disabled', false).prop('required', true);

					// Remove 'disabled' class from field parent.
					$field.parent().removeClass('disabled');

					// Remove 'disabled' class from title and icon.
					$field.parents('td').prev().find('.sio-heading-icon').removeClass('disabled');

					// Get to end of text in input when focusing.
					var inputLength = $field.val().length * 2;

					// Focus on Url field.
					$field.focus();
					$field[0].setSelectionRange(inputLength, inputLength);


				} else {

					// Add 'disabled' prop to field and remove 'required'.
					$field.prop('disabled', true).prop('required', false);

					// Add 'disabled' class to field parent.
					$field.parent().addClass('disabled');

					// Add 'disabled' class to title and icon.
					$field.parents('td').prev().find('.sio-heading-icon').addClass('disabled');

				}

			}

			// Check if Url input fields should be enabled or disabled.
			$.each($checkbox, urlFieldProps);

			// Update Url input state on checkbox change.
			$checkbox.on('change', urlFieldProps);

		}

		/**
		 * Show the settings page content using a fadeIn.
		 *
		 * @since       1.0.0
		 */
		function showSettingsWrap() {

			var $wrap = $('.sio-wrap');

			$wrap.fadeIn(transitionSpeed);

		}

		function getCustomColour() {

			if ($iconCustomBackground.val().length <= 0 && $paletteReplacer.length > 0) {

				customColour = $paletteReplacer.find('.sp-preview-inner').css('background-color');
				customColour = rgb2hex(customColour);

			} else {

				customColour = $iconCustomBackground.val();

			}

		}

		/**
		 * Colour picker for custom icon background.
		 *
		 * @since       1.0.0
		 */
		function iconColourPicker() {

			$colourPicker.spectrum({
				color: customColour,
				flat: false,
				showInput: true,
				className: 'sio-spectrum',
				showInitial: true,
				showPalette: true,
				showSelectionPalette: true,
				maxSelectionSize: 10,
				preferredFormat: 'hex',
				localStorageKey: 'sio.colour.picker',
				containerClassName: 'sio-colour-picker',
				hideAfterPaletteSelect: true,
				showButtons: false,
				move: function (color) {

					// Get colour picker value and apply to icon background.
					if ($('.sio-icon--custom').length > 0) {

						var colour = $colourPicker.spectrum('get');
						colour = colour.toHexString();

						$.each($icon, function () {

							$(this).css('background-color', '' + colour + '');

						});

						$iconCustomBackground.val(colour);

					}

				},
				change: function (color) {

					// Get colour picker value and apply to icon background.
					if ($('.sio-icon--custom').length > 0) {

						var colour = $colourPicker.spectrum('get');
						colour = colour.toHexString();

						$.each($icon, function () {

							$(this).css('background-color', '' + colour + '');

						});

						$iconCustomBackground.val(colour);

					}

				}
			});

		}

		/**
		 * Handles the icon customisation preview section.
		 *
		 * @since       1.0.0
		 */
		function iconPreview() {

			// Get saved customised values.
			var alignmentVal = $iconAlignment.find('option:selected').val(),
				backgroundVal = $iconBackground.find('option:selected').val(),
				shapeVal = $iconShape.find('option:selected').val(),
				sizeVal = $iconSize.find('option:selected').val(),
				spacingVal = $iconSpacing.find('option:selected').val();

			// Check for activated accounts and show the icon(s) in the preview section.
			function showActiveIcons() {

				// Update vars.
				alignmentVal = $iconAlignment.find('option:selected').val();
				backgroundVal = $iconBackground.find('option:selected').val();
				shapeVal = $iconShape.find('option:selected').val();
				sizeVal = $iconSize.find('option:selected').val();
				spacingVal = $iconSpacing.find('option:selected').val();

				// Empty preview list.
				$iconPreviewList.empty();

				// Create preview list.
				$.each($checkbox, function () {

					if ($(this).is(':checked')) {

						var id = $(this).attr('id');

						$iconPreviewList.addClass('sio-preview__icons--' + alignmentVal);
						$iconPreviewList.append('<li class="sio-icon--' + spacingVal + '"><span class="sio-icon sio-icon-editable sio-icon--' + id + ' sio-icon--' + backgroundVal + ' sio-icon--' + shapeVal + ' sio-icon--' + sizeVal + '"></span></li>');

						if (backgroundVal === 'custom') {
							$('.sio-icon-editable').css('background-color', customColour);
						}

					}

				});

				if ($iconPreviewList.is(':empty')) {
					$iconPreviewList.append('<li class="sio-empty">' + emptyMessage + '</li>');
				}

			}

			// Alignment customisation.
			function iconAlignmentCustomisation() {

				var value = $iconAlignment.val();

				$iconPreviewList.removeClass(function (index, className) {
					return (className.match(/(^|\s)sio-preview__icons--\S+/g) || []).join(' ');
				});

				$iconPreviewList.addClass('sio-preview__icons--' + value);

			}

			// Background customisation.
			function iconBackgroundCustomisation() {

				var value = $iconBackground.val();
				$icon = $('.sio-icon-editable');

				// Update icons.
				$.each($icon, function () {

					if ($(this).hasClass('sio-icon--custom')) {

						$(this).removeAttr('style');

					}

					$(this).removeClass(function (index, className) {

						return (className.match(/(^|\s)sio-icon--bg-\S+/g) || []).join(' ');

					});

					$(this).addClass('sio-icon--bg-' + value);

				});

				if (value !== 'custom') {

					$('.sio-spectrum').hide();

				} else {

					$('.sio-spectrum').show();

				}

			}

			// Shape customisation.
			function iconShapeCustomisation() {

				var value = $iconShape.val();
				$icon = $('.sio-icon-editable');

				$.each($icon, function () {

					$(this).removeClass(function (index, className) {
						return (className.match(/(^|\s)sio-icon--shape-\S+/g) || []).join(' ');
					});

					$(this).addClass('sio-icon--shape-' + value);

				});

			}

			// Size customisation.
			function iconSizeCustomisation() {

				var value = $iconSize.val();
				$icon = $('.sio-icon-editable');

				$.each($icon, function () {

					$(this).removeClass(function (index, className) {
						return (className.match(/(^|\s)sio-icon--size-\S+/g) || []).join(' ');
					});

					$(this).addClass('sio-icon--size-' + value);

				});

			}

			// Spacing customisation.
			function iconSpacingCustomisation() {

				var value = $iconSpacing.val();
				$icon = $('.sio-icon-editable');

				$.each($icon, function () {

					$(this).parent().removeClass(function (index, className) {
						return (className.match(/(^|\s)sio-icon--space-\S+/g) || []).join(' ');
					});

					$(this).parent().addClass('sio-icon--space-' + value);

				});

			}

			function checkColourPickerValue() {

				var backgroundValue = $iconBackground.val();
				$icon = $('.sio-icon-editable');

				// Check whether to show colour picker or not.
				if (backgroundValue === 'custom') {

					$paletteReplacer.show();

					$.each($icon, function () {

						$(this).css('background-color', customColour);

					});

					if ($iconCustomBackground.val().length <= 0) {

						$iconCustomBackground.val(customColour);

					}

				} else if (backgroundValue !== 'custom') {

					$paletteReplacer.hide();

				}

			}

			// Fire off the functions.
			showActiveIcons();
			iconAlignmentCustomisation();
			iconBackgroundCustomisation();
			iconShapeCustomisation();
			iconSizeCustomisation();
			iconSpacingCustomisation();
			checkColourPickerValue();

			// Update preview icons on checkbox change.
			$checkbox.on('change', function () {
				showActiveIcons();
			});

			// Fire off the functions on changing select field values.
			$iconAlignment.on('change', function () {
				iconAlignmentCustomisation();
			});

			$iconBackground.on('change', function () {
				iconBackgroundCustomisation();
				checkColourPickerValue();
			});

			$iconShape.on('change', function () {
				iconShapeCustomisation();
			});

			$iconSize.on('change', function () {
				iconSizeCustomisation();
			});

			$iconSpacing.on('change', function () {
				iconSpacingCustomisation();
			});

		}

		/**
		 * Icon sorting in Display section.
		 *
		 * @since       1.0.0
		 */
		function iconSorting() {

			var $posInput = $('input.sio-pos-input');

			// Customised values.
			var background = $iconBackground.val();
			var shape = $iconShape.val();
			var size = $iconSize.val();
			var customBackground = '';

			if (background === 'custom') {

				customBackground = ' style="background-color: ' + customColour + '"';

			}

			// Function for sorting numbers.
			function compareNumbers(a, b) {
				a = a.index;
				b = b.index;
				return a - b;
			}

			function sortIcons() {

				var icons = [];

				// Update customised values.
				background = $iconBackground.val();
				shape = $iconShape.val();
				size = $iconSize.val();

				// Check if container is empty.
				if (!$iconPreviewList.is(':empty')) {

					$iconSortingList.empty();
					$iconSortingList.append('<li class="sio-empty">' + emptyMessage + '</li>');

				}

				// Get array of icons activated in accounts section.
				$.each($posInput, function () {

					// Get ID and remove "_pos" for comparing to activated account IDs.
					var id = $(this).attr('id').replace('_pos', '');
					var value = $(this).val();

					if ($('input#' + id + '[type="checkbox"]').is(':checked')) {

						// Remove empty message from sorting list.
						$iconSortingList.find($('.sio-empty').remove());

						// Add default value to input.
						if (!$(this).val()) {
							$(this).val(1);
						}

						// Enable input.
						$(this).prop('disabled', false);

						// Push into array.
						icons.push({name: id, index: value});

					} else {

						// Remove value from input.
						$(this).val('');

						// Disable input, hide parent table row.
						$(this).prop('disabled', true);
						$(this).parents('tr').hide();

					}

				});

				// Sort icons into order.
				icons.sort(compareNumbers);

				// Add each icon to sorting section.
				for (var i = 0; i < icons.length; i++) {

					var id = icons[i].name;
					var markup = '<li id="sort-icon-' + id + '"><span class="sio-icon sio-icon-editable sio-icon--' + id + ' sio-icon--shape-' + shape + ' sio-icon--size-' + size + ' sio-icon--bg-' + background + '"' + customBackground + '"></span></li>';

					$iconSortingList.append(markup);

				}

			}

			// Sort icons.
			sortIcons();

			// jQuery UI Sortable.
			$iconSortingList.sortable({
				stop: function (ui) {

					$.each($('.ui-sortable-handle'), function () {

						// Get element id.
						var id = $(this).attr('id');

						// Get icon index.
						var index = ($(this).index()) + 1;

						// Prep id for matching to input field.
						id = id.replace('sort-icon-', '');

						// Update input field value based on new index.
						$('input#' + id + '_pos').val(index);

					});

				}
			});

			// Update icons on account checkbox change.
			$checkbox.on('change', function () {
				sortIcons();
			});

		}

		/**
		 * Check for hidden input fields in tables. We will then move them out of the tables and append them to the parent form.
		 * When we have done that, we can remove the original parent table row. This means that our odd/even row styling is consistent.
		 *
		 * @since       1.0.0
		 */
		function hiddenTableRows() {

			var $hiddenInput = $('.form-table').find('input[type="hidden"]');

			if ($hiddenInput.length > 0) {

				$.each($hiddenInput, function () {

					var $parent = $(this).parents('form');

					$(this).parents('tr').attr('class', 'remove-row');
					$(this).appendTo($parent);
					$('.remove-row').remove();

				});

			}

		}

		/**
		 * Fire off the functions.
		 *
		 * @since       1.0.0
		 */
		settingsTabs();
		accountUrlFields();
		getCustomColour();
		iconColourPicker();
		iconPreview();
		hiddenTableRows();
		iconSorting();

		/**
		 * Show settings after slight delay.
		 *
		 * @since       1.0.0
		 */
		setTimeout(function () {
			showSettingsWrap();
		}, 400);

	});

})(jQuery);
