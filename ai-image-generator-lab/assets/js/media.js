/*!  This file in this program is included in minified and unminified versions, both located in the same directory.  Access unminified version by replacing the .min.js extension with .js  */

window.jQuery(document).ready(function($) {
	var resultsInterval = null, settingsSaveTimeout = null;
	
	window.wpzai_update_ui = function($container) {
		window.wpzai_update_quota($container);
		
		if (window.wpzAiImagesConfig && window.wpzAiImagesConfig.settings) {
			$container.find('.wpz-ai-prompt-modifier .wpz-ai-images-active').removeClass('wpz-ai-images-active');
			for (var setting in window.wpzAiImagesConfig.settings) {
				if (setting.substring(0, 9) === 'modifier_') {
					var modifier = setting.substring(9);
					var $modifier = $container.find('.wpz-ai-prompt-modifier[data-category="' + modifier + '"]:first');
					var $modifierValue = $modifier.find('[data-modifier="' + window.wpzAiImagesConfig.settings[setting] + '"]:first');
					
					if ($modifierValue.length) {
						$modifierValue.siblings().removeClass('wpz-ai-images-active').find('select').val('');
						$modifierValue.addClass('wpz-ai-images-active');
					} else {
						var $select = $modifier.find('select:first');
						if ($select.length) {
							$select.val(window.wpzAiImagesConfig.settings[setting]);
							var $li = $select.closest('li');
							$li.siblings().removeClass('wpz-ai-images-active');
							$li.addClass('wpz-ai-images-active').attr('data-modifier', window.wpzAiImagesConfig.settings[setting]);
						}
					}
					
					hideModifierRecursive($modifier, modifier, window.wpzAiImagesConfig.settings[setting]);
					$modifier.siblings('.wpz-ai-prompt-modifier[data-show-condition="' + modifier + '"][data-show-value="' + window.wpzAiImagesConfig.settings[setting] + '"]').removeClass('wpz-ai-images-hidden');
				} else {
					$container.find(':input[name="' + setting + '"]:first').val(window.wpzAiImagesConfig.settings[setting]).change();
					if (settingsSaveTimeout) {
						clearTimeout(settingsSaveTimeout);
						settingsSaveTimeout = null;
					}
				}
			}
		}
	}
	
	window.wpzai_update_quota = function($container) {
		var $quotaDisplay = $container.find('.wpz-ai-images-quota-notice span:first');
		if ($quotaDisplay.length) {
			$.post(
				$container.attr('data-api-url'),
				{
					action: 'quota',
					key: $container.attr('data-api-key')
				},
				function(response) {
					if (typeof response === 'object') {
						$quotaDisplay.text(response.quotaRemaining);
						if (parseInt(response.quotaRemaining)) {
							$container.find('.wpz-ai-images-quota-empty-notice').addClass('wpz-ai-images-hidden');
						} else {
							$container.find('.wpz-ai-images-quota-empty-notice').removeClass('wpz-ai-images-hidden');
							$container.find('.wpz-ai-generate-button').attr('disabled', true);
						}
					}
				},
				'json'
			);
		}
	}
	
	function queueSettingsSave($container) {
		if (settingsSaveTimeout) {
			clearTimeout(settingsSaveTimeout);
		}
		settingsSaveTimeout = setTimeout(function() {
			settingsSaveTimeout = null;
			
			// Update default in PHP if this changes
			var settings = {
				high_quality: parseInt($container.find('select[name="high_quality"]:first').val()),
				ratio: parseFloat($container.find('select[name="ratio"]:first').val()),
				width: parseInt($container.find('input[name="width"]:first').val()),
				height: parseInt($container.find('input[name="height"]:first').val()),
				edit_hd: $container.find('input[name="edit_hd"]:first').is(':checked') ? 1 : 0
			};
			$container.find('.wpz-ai-prompt-modifier .wpz-ai-images-active').each(function() {
				settings['modifier_' + $(this).closest('[data-category]').attr('data-category')] = $(this).attr('data-modifier')
			});
			$.post(
				window.wpzAiImagesConfig.ajaxurl,
				{
					action: 'wpz-ai-images-settings-save',
					nonce: $container.closest('[data-settings-save-nonce]').attr('data-settings-save-nonce'),
					settings: JSON.stringify(settings)
				},
				function() {
					window.wpzAiImagesConfig.settings = settings;
				}
			);
			
		}, 3000);
	}
	
	function getPrompt($container) {
		var prompt = [];
		$container.find('.wpz-ai-images-prompt-text table tbody td:first-child p').each(function() {
			var promptItem = {
				type: 'text',
				text: $(this).text()
			};
			var weight = parseInt($(this).closest('td').next().find('input').val());
			if (weight && weight > 1) {
				promptItem.weight = weight;
			}
			prompt.push(promptItem);
		});
		
		$container.find('.wpz-ai-prompt-modifier .wpz-ai-images-active').each(function() {
			var promptItem = {
				type: 'modifier',
				category: $(this).closest('.wpz-ai-prompt-modifier').attr('data-category'),
				modifier: $(this).attr('data-modifier')
			};
			prompt.push(promptItem);
		});
		
		return prompt;
	}
	
	$(document.body).on('click', '.wpz-ai-images-toggle h3 a', function() {
		$(this).parent().parent().toggleClass('wpz-ai-images-active').siblings().removeClass('wpz-ai-images-active');
		return false;
	});
	
	function shouldEnableGenerateButton($container) {
		var $quotaEmptyNotice = $container.find('.wpz-ai-images-quota-empty-notice');
		return !$quotaEmptyNotice.length || $quotaEmptyNotice.hasClass('wpz-ai-images-hidden');
	}
	
	function addPrompt($container, promptText) {
		var prompt = promptText.split(',');
		var $addRow = $container.find('table tbody tr:last-child');
		for (var i = 0; i < prompt.length; ++i) {
			var $newRow = $addRow.clone();
			$newRow.children(':first').empty()
				.append(
					$('<a>').attr({href: '#', title: 'Remove'}).append($('<span>').text('Remove')).addClass('wpz-ai-images-remove')
				)
				.append( $('<p>').text( prompt[i].trim() ) );
			$newRow.find('input:first').val(1).trigger('change');
			$newRow.insertBefore($addRow);
		}
		
		$addRow.closest('.wpz-ai-prompt-generator').find('.wpz-ai-generate-button:first').attr('disabled', !shouldEnableGenerateButton($container));
	}
	
	$(document.body).on('click', '.wpz-ai-images-sample-prompts a', function() {
		addPrompt($(this).closest('.wpz-ai-images-prompt-text'), $(this).text());
		return false;
	});
	
	$(document.body).on('click', '.wpz-ai-images-prompt-text .wpz-ai-images-add', function() {
		var $container = $(this).closest('.wpz-ai-images-prompt-text');
		var $addRow = $container.find('tbody tr:last-child');
		addPrompt($container, $addRow.find('textarea').val());
		
		$addRow.find('textarea:first').val('').trigger('input');
		$addRow.find('input:first').val(1).trigger('change');
	});
	
	$(document.body).on('input', '.wpz-ai-images-prompt-text textarea', function() {
		$(this).closest('table').find('.wpz-ai-images-add').attr('disabled', $(this).val() === '');
	});
	
	$(document.body).on('keyup', '.wpz-ai-images-prompt-text textarea', function(ev) {
		if (ev.originalEvent.keyCode == 13) {
			ev.preventDefault();
			$(this).closest('table').find('.wpz-ai-images-add').trigger('click');
		}
	});
	
	$(document.body).on('change', '.wpz-ai-images-prompt-text input', function() {
		var $input = $(this);
		var currentValue = $input.val();
		$input.siblings('.wpz-ai-images-decrease').attr('disabled', currentValue < 2);
		$input.siblings('.wpz-ai-images-increase').attr('disabled', currentValue > 4);
	});
	
	$(document.body).on('click', '.wpz-ai-images-prompt-text .wpz-ai-images-decrease', function() {
		var $input = $(this).siblings('input');
		var currentValue = $input.val();
		if (currentValue >= 2) {
			--currentValue;
			$input.val(currentValue).trigger('change');
		}
	});
	
	$(document.body).on('click', '.wpz-ai-images-prompt-text .wpz-ai-images-increase', function() {
		var $input = $(this).siblings('input');
		var currentValue = $input.val();
		if (currentValue <= 4) {
			++currentValue;
			$input.val(currentValue).trigger('change');
			if (currentValue > 4) {
				$(this).attr('disabled', true);
			}
			$(this).siblings('.wpz-ai-images-decrease').attr('disabled', null);
		}
	});
	
	function hideModifierRecursive($container, category, excludeModifier) {
		var $categoriesToHide = $container.siblings('.wpz-ai-prompt-modifier[data-show-condition="' + category + '"]' + (excludeModifier ? ':not([data-show-value="' + excludeModifier + '"])' : '')).addClass('wpz-ai-images-hidden');
		$categoriesToHide.find('.wpz-ai-images-active').removeClass('wpz-ai-images-active');
		$categoriesToHide.each(function() {
			hideModifierRecursive($container, $(this).attr('data-category'));
		});
	}
	
	
	$(document.body).on('click', '.wpz-ai-prompt-modifier a', function() {
		var $li = $(this).closest('li');
		var $container = $li.closest('.wpz-ai-prompt-modifier');
		var $form = $container.closest('.wpz-ai-images-form');
		var category = $container.attr('data-category');
		if ($li.hasClass('wpz-ai-images-active')) {
			$li.removeClass('wpz-ai-images-active');
			hideModifierRecursive($container, category);
		} else {
			var modifier = $li.attr('data-modifier');
			$li.siblings().removeClass('wpz-ai-images-active').find('select').val('');
			$li.addClass('wpz-ai-images-active');
			hideModifierRecursive($container, category, modifier);
			$container.siblings('.wpz-ai-prompt-modifier[data-show-condition="' + category + '"][data-show-value="' + modifier + '"]').removeClass('wpz-ai-images-hidden');
		}
		queueSettingsSave($form);
		return false;
	});
	
	$(document.body).on('change', '.wpz-ai-prompt-modifier .wpz-ai-images-other select', function() {
		var modifier = $(this).val();
		var $li = $(this).closest('li');
		var $container = $li.closest('.wpz-ai-prompt-modifier');
		var category = $container.attr('data-category');
		if (modifier) {
			$li.siblings().removeClass('wpz-ai-images-active');
			$li.addClass('wpz-ai-images-active').attr('data-modifier', modifier);
			hideModifierRecursive($container, category, modifier);
			$container.siblings('.wpz-ai-prompt-modifier[data-show-condition="' + category + '"][data-show-value="' + modifier + '"]').removeClass('wpz-ai-images-hidden');
		} else {
			$li.removeClass('wpz-ai-images-active');
			hideModifierRecursive($container, category);
		}
		queueSettingsSave($container.closest('.wpz-ai-images-form'));
	});
	
	
	$(document.body).on('change', '.wpz-ai-images-form select[name="high_quality"], .wpz-ai-images-form input[name="edit_hd"]', function() {
		queueSettingsSave($(this).closest('.wpz-ai-images-form'));
	});
	
	$(document.body).on('click', '.wpz-ai-prompt-output .wpz-ai-images-weight-add', function() {
		var $li = $(this).closest('li');
		var currentWeight = parseInt($li.attr('data-weight'));
		$li.attr('data-weight', currentWeight ? currentWeight + 1 : 2);
	});
	
	$(document.body).on('click', '.wpz-ai-prompt-output .wpz-ai-images-weight-subtract', function() {
		var $li = $(this).closest('li');
		var currentWeight = parseInt($li.attr('data-weight'));
		$li.attr('data-weight', currentWeight == 2 ? null : currentWeight - 1);
	});
	
	$(document.body).on('click', '.wpz-ai-images-prompt-text .wpz-ai-images-remove', function() {
		var $row = $(this).closest('tr');
		if ($row.siblings().length < 2) {
			$row.closest('.wpz-ai-prompt-generator').find('.wpz-ai-generate-button:first').attr('disabled', true);
		}
		$row.remove();
		return false;
	});
	
	function maybeFloor(val) {
		return (1 - (val % 1) < 0.0001) ? Math.ceil(val) : Math.floor(val);
	}
	
	function getMaxSize($elem) {
		return $elem.closest('.wpz-ai-images-upload-ui').hasClass('wpz-ai-images-pro') ? 2048 : 768;
	}
	
	$(document.body).on('click', '.wpz-ai-images-show', function() {
		$(this).siblings('.wpz-ai-images-upload-ui:first').removeClass('wpz-ai-images-hidden');
		$(this).remove();
	});
	
	$(document.body).on('change', '.wpz-ai-images-form select[name="ratio"]', function() {
		var $select = $(this);
		var ratio = parseFloat($select.val());
		var $form = $select.closest('.wpz-ai-images-form');
		var maxSize = getMaxSize($form);
		var $widthInput = $form.find('input[name="width"]:first');
		var $heightInput = $form.find('input[name="height"]:first');
		
		$widthInput.parent().toggleClass('wpz-ai-images-hidden', ratio !== 0);
		
		if (ratio) {
			var isHdMode = $heightInput.val() > 768 || ($heightInput.val() * ratio) > 768;
			var maxWidth = Math.min(maxSize, maybeFloor(maxSize * ratio));
			var maxHeight = Math.min(maxSize, maybeFloor(maxSize / ratio));
			var newWidth = Math.round($heightInput.val() * ratio);
			if (newWidth > maxWidth) {
				var newHeight = maybeFloor( maxWidth / ratio );
				$heightInput.val( newHeight );
				newWidth = Math.round(newHeight * ratio);
			} else if ( $heightInput.val() > maxHeight ) {
				$heightInput.val( maxHeight );
				newWidth = Math.round(maxHeight * ratio);
			}
			
			$widthInput.val( newWidth );
		} else {
			var isHdMode = $widthInput.val() > 768 || $heightInput.val() > 768;
		}
		
		$form.find('.wpz-ai-images-hd-notice:first').toggleClass('wpz-ai-images-hidden', $widthInput.val() <= 768 && $heightInput.val() <= 768);
		
		
		queueSettingsSave($form);
	});
	
	$(document.body).on('change', '.wpz-ai-images-form input[name="width"], .wpz-ai-images-form input[name="height"]', function() {
		if ($(this).attr('name') === 'height') {
			var changedHeight = true;
			var $heightInput = $(this);
			var $widthInput = $heightInput.closest('.wpz-ai-images-form').find('input[name="width"]:first');
		} else {
			var changedHeight = false;
			var $widthInput = $(this);
			var $heightInput = $widthInput.closest('.wpz-ai-images-form').find('input[name="height"]:first');
		}
		var maxSize = getMaxSize($heightInput);
		var ratio = parseFloat($heightInput.closest('.wpz-ai-images-form').find('select[name="ratio"]:first').val());
		
		if (ratio) {
			var isHdMode = $heightInput.val() > 768 || ($heightInput.val() * ratio) > 768;
			var maxHeight = Math.round( Math.min(maxSize, maxSize / ratio) );
			if ($heightInput.val() > maxHeight) {
				$heightInput.val(maxHeight);
			}
			$widthInput.val( Math.round(parseFloat($heightInput.val()) * ratio) );
		} else {
			var isHdMode = $widthInput.val() > 768 || $heightInput.val() > 768;
			if ($widthInput.val() > maxSize) {
				$widthInput.val(maxSize);
			}
			if ($heightInput.val() > maxSize) {
				$heightInput.val(maxSize);
			}
		}
		
		var $form = $heightInput.closest('.wpz-ai-images-form');
		$form.find('.wpz-ai-images-hd-notice:first').toggleClass('wpz-ai-images-hidden', !isHdMode);
		
		queueSettingsSave($form);
	});
	
	
	$(document.body).on('click', '.wpz-ai-clear-text-button', function() {
		$(this).closest('table').find('tbody tr:not(:last-child)').remove();
		$(this).closest('.wpz-ai-prompt-generator').find('.wpz-ai-generate-button:first').attr('disabled', true);
	});
	
	
	$(document.body).on('click', '.wpz-ai-images-preview .wpz-ai-images-arrow-previous, .wpz-ai-images-preview .wpz-ai-images-arrow-next', function() {
		var $preview = $(this).closest('.wpz-ai-images-preview');
		var goingBack = $(this).hasClass('wpz-ai-images-arrow-previous');
		var currentIndex = parseInt($preview.attr('data-index'));
		
		if (goingBack && !currentIndex) {
			return;
		}
		
		if (goingBack) {
			--currentIndex;
		} else {
			++currentIndex;
		}
		
		$preview.css('background-image', 'url(' +  $preview.attr('data-url-' + (currentIndex + 1)) + ')').attr('data-index', currentIndex);
		
		$preview.toggleClass('wpz-ai-images-preview-last', !$preview.is('[data-url-' + (currentIndex + 2) + ']'));
		
		return false;
	});
	
	$(document.body).on('keyup', function(ev) {
		var $preview = $('.wpz-ai-images-preview:visible');
		if ($preview.length && [27, 39, 37].indexOf(ev.originalEvent.keyCode) !== -1) {
			ev.preventDefault();
			switch (ev.originalEvent.keyCode) {
				case 27: // esc
					$preview.parent().remove();
					break;
				case 39: // ->
					if ( $preview.is('[data-url-' + (parseInt($preview.attr('data-index')) + 2) + ']') ) {
						$preview.find('.wpz-ai-images-arrow-next:first').trigger('click');
					}
					break;
				case 37: // <-
					if ( parseInt($preview.attr('data-index')) !== 0 ) {
						$preview.find('.wpz-ai-images-arrow-previous:first').trigger('click');
					}
					break;
			}
			
		}
	});
	
	function getImage($li) {
		$li.addClass('wpz-ai-images-uploading');
		$.post(
			window.wpzAiImagesConfig.ajaxurl,
			{
				action: 'wpz-ai-images-upload',
				url: $li.attr('data-url-get'),
				postId: (window.wp && window.wp.media && window.wp.media.model) ? window.wp.media.model.settings.post.id : 0,
				prompt: $li.closest('.wpz-ai-images-results').attr('data-prompt'),
				nonce: $li.closest('.wpz-ai-images-upload-ui').attr('data-get-nonce')
			},
			function(response) {
				if (response.success && response.data) {
					if (response.data.wait) {
						setTimeout(function() {
							getImage($li);
						}, 3000);
					} else if (window.wp && window.wp.media && window.wp.media.model) {
						var image = response.data;
						image.uploading = false;
						var imageAttachment = new window.wp.media.model.Attachment(image);
						window.wp.Uploader.queue.add(imageAttachment);
						window.wp.Uploader.queue.reset();
						
						$('.media-modal #menu-item-browse').trigger('click');
						
						$li.removeClass('wpz-ai-images-uploading');
						
					} else if (window.pagenow === 'media') {
						location.href = 'upload.php';
					}
				} else {
					$li.removeClass('wpz-ai-images-uploading');
				}
			},
			'json'
		).fail(function() {
			$li.removeClass('wpz-ai-images-uploading');
		}).always(function() {
			window.wpzai_update_quota($li.closest('.wpz-ai-images-upload-ui'));
		});
	}
	
	$(document.body).on('click', '.wpz-ai-images-results a, .wpz-ai-images-result-button-view', function() {
		var $li = $(this).closest('li');
		var $allLis = $li.parent().children();
		
		if (!$li.attr('data-url-preview') || $li.hasClass('wpz-ai-images-loading')) {
			return;
		}
		
		var previewDataAttrs = {
			'data-index': $li.index()
		};
		
		for (var i = 0; i < $allLis.length; ++i) {
			previewDataAttrs['data-url-' + (i + 1)] = $allLis.eq(i).attr('data-url-preview');
		}
		
		$('<div>')
			.addClass('wpz-ai-images-preview-container')
			.toggleClass('wpz-ai-images-free', $li.closest('.wpz-ai-images-free').length)
			.append(
				$('<div>')
					.addClass('wpz-ai-images-preview')
					.attr(previewDataAttrs)
					.css({
						'background-image': 'url(' +  $li.attr('data-url-preview') + ')',
						'max-width': $li.parent().attr('data-preview-width') + 'px'
					})
					.append(
						$('<div>').addClass('wpz-ai-images-buttons')
							.append(
								$('<button>').attr('type', 'button').addClass('button-primary').text('Get this image')
									.on('click', function() {
										var imageIndex = $(this).closest('.wpz-ai-images-preview').attr('data-index');
										$(this).closest('.wpz-ai-images-preview-container').remove();
										getImage($allLis.eq(imageIndex));
									})
							)
							.append(
								$('<button>').attr('type', 'button').addClass('button-secondary').text('Edit Image')
									.on('click', function() {
										var $ui = $li.closest('.wpz-ai-images-upload-ui');
										var imageIndex = $(this).closest('.wpz-ai-images-preview').attr('data-index');
										$ui.find('.wpz-ai-images-toggle.wpz-ai-images-edit-image:first')
											.removeClass('wpz-ai-images-hidden')
											.addClass('wpz-ai-images-active')
											.siblings('.wpz-ai-images-toggle').addClass('wpz-ai-images-hidden');
										
										$ui.find('.wpz-ai-images-edit-hd').hide();
										
										initImageEditor(
											$('<img>').attr('src', $allLis.eq(imageIndex).attr('data-url-preview')).appendTo(
												$ui.find('.wpz-ai-image-editor:first').empty()
											)
										);
										
										$ui.find('.wpz-ai-images-toggle.wpz-ai-images-edit-image textarea:first').val(
											$ui.find('.wpz-ai-images-results:first').attr('data-prompt')
										);
										
										$ui.find('.wpz-ai-generate-button:first').attr('disabled', true);
										$ui.find('.wpz-ai-back-button:first').removeClass('wpz-ai-images-hidden');
										
										$(this).closest('.wpz-ai-images-preview-container').remove();
									})
							)
							.append(
								$('<button>').attr('type', 'button').addClass('button-secondary').text('Close')
									.on('click', function() {
										$(this).closest('.wpz-ai-images-preview-container').remove();
									})
							)
							.append(
								$('<a>').addClass('wpz-ai-images-arrow-previous').attr({href: '#', title: 'Go to previous image'})
							)
							.append(
								$('<a>').addClass('wpz-ai-images-arrow-next').attr({href: '#', title: 'Go to next image'})
							)
					).append(
					$('<div>').addClass('wpz-ai-tooltip-box').append($('<span>').addClass('wpz-ai-tooltip-box-text-watermark').text('Downloaded files will not contain visible watermarks.'))
				)
					
			)
			.appendTo(document.body);
			return false;
	});
	
	function initImageEditor($img) {
		
		var currentMaskArea = null;
		
		$img.on('mousedown', function(ev) {
			if (ev.button === 0) {
				
				var imgOffset = $img.offset();
				
				currentMaskArea = {
					elem: $('<div>').addClass('wpz-ai-images-mask-area').insertAfter($img),
					x: ev.offsetX,
					y: ev.offsetY
				};
				
				var $dragArea = $('<div>').addClass('wpz-ai-images-mask-drag-area').insertAfter($img);
				
				$dragArea.on('mousemove', function(ev) {
					if (currentMaskArea) {
						var width = ev.offsetX - currentMaskArea.x;
						var height = ev.offsetY - currentMaskArea.y;
						
						currentMaskArea.elem.css({
							width: Math.abs(width) + "px",
							height: Math.abs(height) + "px",
							left: (width < 0 ? (currentMaskArea.x + width) : currentMaskArea.x) + "px",
							top: (height < 0 ? (currentMaskArea.y + height) : currentMaskArea.y) + "px"
						});
					}
				});
				
				$dragArea.on('mouseup mouseout', function(ev) {
					currentMaskArea = null;
					$dragArea.closest('.wpz-ai-images-form').find('.wpz-ai-generate-button:first').attr('disabled', !shouldEnableGenerateButton($dragArea));
					$dragArea.remove();
				});
				
				
			}
		});
		
		
	}
	
	
	$(document.body).on('click', '.wpz-ai-images-mask-area', function() {
		var $this = $(this);
		if (!$this.siblings('.wpz-ai-images-mask-area').length) {
			$this.closest('.wpz-ai-images-form').find('.wpz-ai-generate-button:first').attr('disabled', true);
		}
		$this.remove();
	});
	
	$(document.body).on('click', '.wpz-ai-back-button', function() {
		var $form = $(this).closest('.wpz-ai-images-form');
		$form.find('.wpz-ai-images-toggle').removeClass('wpz-ai-images-hidden');
		$form.find('.wpz-ai-images-toggle.wpz-ai-images-edit-image').addClass('wpz-ai-images-hidden');
		$form.find('.wpz-ai-generate-button:first').attr('disabled', $form.find('.wpz-ai-images-prompt-text tbody tr').length < 2 || !shouldEnableGenerateButton($form));
		$(this).addClass('wpz-ai-images-hidden');
	});
	
	$(document.body).on('click', '.wpz-ai-images-notice-close-button', function() {
		$(this).closest('.wpz-ai-images-notice').fadeOut();
	});
	
	
	$(document.body).on('click', '.wpz-ai-images-form .wpz-ai-generate-button', function() {
		var $container = $(this).closest('.wpz-ai-images-upload-ui');
		
		var noticeTimeout = setTimeout(function() {
			$container.find('.wpz-ai-images-results-container .wpz-ai-images-notice:first').fadeIn();
		}, 30000);
		
		
		var $feedback = $container.find('.wpz-ai-images-feedback');
		$feedback.hide();
		
		var prompt = getPrompt($container);
		
		console.log(prompt);
		
		var promptText = '';
		for (var i = 0; i < prompt.length; ++i) {
			if (prompt[i].type === 'text') {
				promptText += (promptText ? ' ' : '') + prompt[i].text;
			}
		}
		
		if (resultsInterval) {
			clearTimeout(resultsInterval);
			resultsInterval = null;
		}
		
		function doRequest(request) {
			$.post(
				$container.attr('data-api-url'),
				request,
				function(response) {
					if (response.urls) {
						var $results = $container.find('.wpz-ai-images-results');
						
						var $scrollFrame = $results.closest('.media-modal .media-frame-content, html').first();
						var scrollOffset = 0;
						var $scrollElement = $results.parent();
						
						$scrollFrame.scrollTop(0);
						
						while (!$scrollElement.is($scrollFrame) && !$scrollElement.has($scrollFrame).length) {
							scrollOffset += $scrollElement.position().top;
							$scrollElement = $scrollElement.offsetParent();
							
						}
						
						$scrollFrame.scrollTop( scrollOffset - 20 );
						
						$results.removeClass('wpz-ai-images-placeholders').attr({'data-prompt': promptText, 'data-preview-width': response.previewSize && response.previewSize.length ? response.previewSize[0] : 768});
						var $resultsLi = $results.children().addClass('wpz-ai-images-hidden');
						
						for (var i = 0; i < response.urls.length; ++i) {
							var $thisLi = $resultsLi.eq(i).removeClass('wpz-ai-images-hidden');
							$thisLi
								.attr('data-url-preview', response.urls[i].preview)
								.attr('data-url-get', response.urls[i].get)
								.addClass('wpz-ai-images-loading');
							var $img = $thisLi.find('img:first');
							$img.attr({ src: $img.attr('data-placeholder-src'), alt: 'Generated image placeholder' });
						}
						
						function getResults() {
							$results.children('.wpz-ai-images-loading:first').each(function() {
								var $this = $(this);
								$.get(
									$this.attr('data-url-preview'),
									null,
									function() {
										if (noticeTimeout) {
											clearTimeout(noticeTimeout);
											noticeTimeout = null;
										}
										
										$container.find('.wpz-ai-images-results-container .wpz-ai-images-notice:first').fadeOut();
										
										$this.removeClass('wpz-ai-images-loading');
										$this.find('img:first')
											.attr({ src: $this.attr('data-url-preview'), alt: 'Image result preview for ' + promptText })
											.closest('li')
											.each(function() {
												if (!$(this).children('.wpz-ai-images-result-buttons:first').length) {
													$('<div>')
														.addClass('wpz-ai-images-result-buttons')
														.append(
															$('<button>').addClass('wpz-ai-images-result-button-save').attr({
																type: 'button',
																title: 'Get this image'
															}).on('click', function() {
																getImage($(this).closest('li'));
															})
														)
														.append(
															$('<button>').addClass('wpz-ai-images-result-button-edit').attr({
																type: 'button',
																title: 'Edit image'
															}).on('click', function() {
																var $li = $(this).closest('li');
																var $ui = $li.closest('.wpz-ai-images-upload-ui');
																$ui.find('.wpz-ai-images-toggle.wpz-ai-images-edit-image:first')
																	.removeClass('wpz-ai-images-hidden')
																	.addClass('wpz-ai-images-active')
																	.siblings('.wpz-ai-images-toggle').addClass('wpz-ai-images-hidden');
																
																initImageEditor(
																	$('<img>').attr('src', $li.attr('data-url-preview')).appendTo(
																		$ui.find('.wpz-ai-image-editor:first').empty()
																	)
																);
																
																$ui.find('.wpz-ai-images-toggle.wpz-ai-images-edit-image textarea:first').val(
																	$ui.find('.wpz-ai-images-results:first').attr('data-prompt')
																);
																
																$ui.find('.wpz-ai-generate-button:first').attr('disabled', true);
																$ui.find('.wpz-ai-back-button:first').removeClass('wpz-ai-images-hidden');
															})
														)
														.append(
															$('<button>').addClass('wpz-ai-images-result-button-view').attr({
																type: 'button',
																title: 'View image'
															})
														)
														.appendTo(this);
												}
											});
										return;
									}
								).always(function() {
									if ($results.has('.wpz-ai-images-loading').length) {
										resultsInterval = setTimeout(getResults, 1000);
									} else {
										clearTimeout(resultsInterval);
										resultsInterval = null;
										
										$feedback.children().show().filter('.wpz-ai-images-feedback-complete:first').hide();
										$feedback.show();
									}
								});
							});
						}
						
						resultsInterval = setTimeout(getResults, 1000);
					}
				},
				'json'
			).fail(function(xhr) {
				switch (xhr.status) {
					case 451:
						alert('Your prompt text contains word(s) or phrase(s) which may violate our terms of use. Please try rewriting your prompt to remove any content that is not permitted on this service.');
						break;
					case 429:
						alert('You have reached the maximum number of requests that you may make at this time. Please try again later.');
						break;
					default:
						alert('Something went wrong when submitting your request. Please try again, and if the problem persists please wait a bit before submitting your request again.');
				}
			});
		}
		
		if ($container.has('.wpz-ai-images-toggle.wpz-ai-images-edit-image:not(.wpz-ai-images-hidden)').length) {
			var $editToggle = $container.find('.wpz-ai-images-toggle.wpz-ai-images-edit-image:first');
			
			var mask = $editToggle.find('.wpz-ai-images-mask-area').get().map(function(maskItem) {
				var $maskItem = $(maskItem);
				return [
					$maskItem.position().left / $maskItem.parent().width(),
					$maskItem.position().top / $maskItem.parent().height(),
					$maskItem.width() / $maskItem.parent().width(),
					$maskItem.height() / $maskItem.parent().height()
				];
			});
			
			console.log(mask);
			
			var request = {
				action: 'generate',
				key: $container.attr('data-api-key'),
				p: JSON.stringify([
					{
						type: 'text',
						text:  $editToggle.find('textarea:first').val()
					}
				]),
				q: $container.find('select[name="high_quality"]:first').val(),
				m: JSON.stringify(mask)
			};
			
			
			if ($editToggle.find('.wpz-ai-image-editor img:first').hasClass('wpz-ai-image-custom')) {
			
				if ($editToggle.find('input[name="edit_hd"]:checked:first').length) {
					request.eHd = 1;
				}
				
				var imgXhr = new XMLHttpRequest();
				imgXhr.open('GET', $editToggle.find('.wpz-ai-image-editor img:first').attr('src'));
				imgXhr.responseType = 'blob';
				imgXhr.onload = function() {
					var imgReader = new FileReader();
					imgReader.onload = function() {
						request.e = imgReader.result;
						doRequest(request);
					};
					imgReader.readAsDataURL(imgXhr.response);
				}
				imgXhr.send();
			} else {
				request.e = $editToggle.find('.wpz-ai-image-editor img:first').attr('src');
				doRequest(request);
			}
			
		} else {
			
			var request = {
				action: 'generate',
				key: $container.attr('data-api-key'),
				p: JSON.stringify(prompt),
				q: $container.find('select[name="high_quality"]:first').val(),
				w: $container.find('input[name="width"]:first').val(),
				h: $container.find('input[name="height"]:first').val()
			};
			
			doRequest(request);
		}
		
		return false;
	});
	
	
	$(document.body).on('mouseover focus', '.wpz-ai-images-feedback-stars button', function() {
		var $starLi = $(this).parent();
		while ($starLi.length) {
			$starLi.addClass('wpz-ai-images-active');
			$starLi = $starLi.prev();
		}
		
		$starLi = $(this).parent().next();
		
		
		while ($starLi.length) {
			$starLi.removeClass('wpz-ai-images-active');
			$starLi = $starLi.next();
		}
	});

	$(document.body).on('mouseout blur', '.wpz-ai-images-feedback-stars button', function() {
		var $stars = $(this).parent().parent();
		var value = parseInt($stars.attr('data-value'));
		
		if (value) {
			$stars.children(':lt(' + value + ')').addClass('wpz-ai-images-active');
			$stars.children(':gt(' + (value - 1) + ')').removeClass('wpz-ai-images-active');
		} else {
			$stars.children().removeClass('wpz-ai-images-active');
		}
		
	});

	$(document.body).on('click', '.wpz-ai-images-feedback-stars button', function() {
		var $stars = $(this).parent().parent().attr('data-value', $(this).parent().index() + 1);
	});



	$(document.body).on('click', '.wpz-ai-images-feedback-submit', function() {
		$(this).addClass('wpz-ai-iamges-loading').attr('disabled', true);
		var $feedback = $(this).closest('.wpz-ai-images-feedback');
		var rating = parseInt($feedback.find('.wpz-ai-images-feedback-stars:first').attr('data-value'));
		var feedbackText = $feedback.find('textarea:first').val();
		
		var imageUrl = $feedback.closest('.wpz-ai-images-upload-ui').find('.wpz-ai-images-results:first li:first').attr('data-url-preview').split('/');
		
		var request = {
			request: imageUrl[imageUrl.length - 3] + '-' + imageUrl[imageUrl.length - 2]
		};
		
		if (rating) {
			request.rating = rating / 5;
		}
		
		if (feedbackText) {
			request.feedback = feedbackText;
		}
		
		var feedbackUrl = $feedback.closest('.wpz-ai-images-upload-ui').attr('data-api-url');
		feedbackUrl = feedbackUrl.substring(0, feedbackUrl.lastIndexOf('/')) + '/feedback.php';
		
		$.post(
			feedbackUrl,
			request
		).always(function() {
			$feedback.children(':not(h4)').hide();
			$feedback.children('.wpz-ai-images-feedback-complete:first').show();
		});
	});
	
	
	if (window.wp && window.wp.media && window.wp.media.view && window.wp.media.view.MediaFrame && window.wp.media.view.MediaFrame.Select && window.wp.media.view.MediaFrame.Select.prototype.bindHandlers && window.wp.media.view.MediaFrame.Select.prototype.browseRouter) {
		
		var _bindHandlers = window.wp.media.view.MediaFrame.Select.prototype.bindHandlers;
		window.wp.media.view.MediaFrame.Select.prototype.bindHandlers = function() {
			this.on('content:render:wpzai', this.uploadContent, this);
			return _bindHandlers.apply(this, arguments);
		}
		
		var _browseRouter = window.wp.media.view.MediaFrame.Select.prototype.browseRouter;
		window.wp.media.view.MediaFrame.Select.prototype.browseRouter = function(view) {
			var result = _browseRouter.apply(this, arguments);
			if (view._views.upload) {
				view.set({
					wpzai: {
						text: 'Generate Image with AI',
						priority: 60
					}
				});
			}
			return result;
		}
	}
	
	$('#tmpl-attachment-details-two-column').each(function() {
		var template = $(this).html();
		var buttonInsertIndex = template.indexOf('</button>', template.indexOf('class="attachment-actions"')) + 9;
		template = template.substring(0, buttonInsertIndex) + '<button type="button" class="button wpz-ai-images-edit-image-button">Edit in AI Image Lab</button>' + template.substring(buttonInsertIndex);
		$(this).html(template);
	});
	
	$(document.body).on('click', '.wpz-ai-images-edit-image-button', function() {
	
		var imgUrl = $(this).closest('.media-frame-content').find('.attachment-details-copy-link:first').val();
		var $ui = $('.wpz-ai-images-upload-ui:first');
		
		if (!$ui.is(':visible')) {
			$('.wpz-ai-images-page-title-action').click();
		}
		
		$ui.find('.wpz-ai-images-toggle.wpz-ai-images-edit-image:first')
			.removeClass('wpz-ai-images-hidden')
			.addClass('wpz-ai-images-active')
			.siblings('.wpz-ai-images-toggle').addClass('wpz-ai-images-hidden');
		
		$ui.find('.wpz-ai-images-edit-hd').show();
		
		initImageEditor(
			$('<img>').attr('src', imgUrl).appendTo(
				$ui.find('.wpz-ai-image-editor:first').empty()
			).addClass('wpz-ai-image-custom')
		);
		
		$ui.find('.wpz-ai-images-toggle.wpz-ai-images-edit-image textarea:first').val('');
		
		$ui.find('.wpz-ai-generate-button:first').attr('disabled', true);
		$ui.find('.wpz-ai-back-button:first').removeClass('wpz-ai-images-hidden');
		
		wp.media.frame.close();
		

		var $scrollFrame = $ui.closest('.media-modal .media-frame-content, html').first();
		var scrollOffset = 0;
		var $scrollElement = $ui.find('.wpz-ai-images-form');
		
		$scrollFrame.scrollTop(0);
		
		while (!$scrollElement.is($scrollFrame) && !$scrollElement.has($scrollFrame).length) {
			scrollOffset += $scrollElement.position().top;
			$scrollElement = $scrollElement.offsetParent();
			
		}
		
		$scrollFrame.scrollTop( scrollOffset - 20 );
	});
});