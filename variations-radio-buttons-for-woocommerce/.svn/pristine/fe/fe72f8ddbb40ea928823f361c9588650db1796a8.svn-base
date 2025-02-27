/*global wc_add_to_cart_variation_params */
;(function ($, window, document, undefined) {
	/**
	 * VariationsRadioButtons extends WooCommerce VariationForm to support radio buttons for selection of variations
	 */
	var VariationsRadioButtons = function(form, variationForm)
	{
		this.form = form;
		this.fields = this.form.find('.variations input[type=radio],.variations select');
		this.variationData = this.form.data('product_variations');
		this.useAjax = false === this.variationData;

		this.init(variationForm);
	};

	VariationsRadioButtons.prototype.init = function(variationForm)
	{
		// inherit methods we need
		var VariationFormPrototype = Object.getPrototypeOf(variationForm);

		VariationsRadioButtons.prototype.findMatchingVariations = VariationFormPrototype.findMatchingVariations;
		VariationsRadioButtons.prototype.isMatch = VariationFormPrototype.isMatch;
		VariationsRadioButtons.prototype.addSlashes = VariationFormPrototype.addSlashes;

		VariationFormPrototype.isMatch = VariationsRadioButtons.prototype.isMatch;

		this.useAjax = variationForm.useAjax;

		var _this = this;

		this.form.off('click.wc-variation-form', '.reset_variations');
		this.form.off('change.wc-variation-form', '.variations select');
		this.form.off('update_variation_values.wc-variation-form');

		this.form.on('click.wc-variation-form', '.reset_variations', function (event) { _this.onReset(event); });
		this.form.on('change.wc-variation-form', '.variations input[type=radio],.variations select', function (event) { _this.onChange(event); });
		this.form.on('update_variation_values.wc-variation-form', function (event) { _this.onUpdateAttributes(event); });

		// Init after gallery.
		setTimeout(function() {
			_this.form.trigger('check_variations', _this.getChosenAttributes());
			//_this.syncAttributeToParentClass();
		}, 100);
	};

//	VariationsRadioButtons.prototype.syncAttributeToParentClass = function()
//	{
//		jQuery('.variations .selector').each(function() {
//			var element = jQuery(this);
//			var attribute = element.data('attribute');
//			element.parent().parent().addClass(attribute);
//		});
//	};

//	VariationsRadioButtons.prototype.isMatch = function(variationAttributes, attributes)
//	{
//		var match = false;
//		for (var attrName in variationAttributes) {
//			if (variationAttributes.hasOwnProperty(attrName)) {
//				var val1 = variationAttributes[attrName];
//				var val2 = attributes[attrName];

//				if (val1 == val2) {
//					match = true;
//				}
//			}
//		}
//		return match;
//	};

	VariationsRadioButtons.prototype.onReset = function(event)
	{
		event.preventDefault();

		this.fields.removeAttr('disabled checked');
		this.fields.parents('label').removeClass('disabled checked');
		this.fields.filter('select').val('');
		this.fields.find(':first').change();

		this.form.trigger('reset_data');
	};

	VariationsRadioButtons.prototype.onChange = function(event)
	{
		this.syncLabelClass(this.getAttributeName(jQuery(event.target)));

		this.form.find('input[name="variation_id"], input.variation_id').val('').change();
		this.form.find('.wc-no-matching-variations').remove();

		var chosenAttributes = this.getChosenAttributes();

		if (this.useAjax) {
			this.form.trigger('check_variations', chosenAttributes);
		} else {
			this.form.trigger('woocommerce_variation_select_change');
			this.form.trigger('check_variations', chosenAttributes);
		}

		// Custom event for when variation selection has been changed
		this.form.trigger('woocommerce_variation_has_changed');
	};

	VariationsRadioButtons.prototype.getMatchingOptionElements = function(optionElements, attrName, variations)
	{
		var matchingOptionElements = $();

		for (var num in variations) {
			if (typeof(variations[num]) === 'undefined' || !variations[num].variation_is_active) {
				continue;
			}

			var variationAttributes = variations[num].attributes;
			if (variationAttributes.hasOwnProperty(attrName)) {
				// Decode entities.
				var attrValue = $('<div/>').html(variationAttributes[attrName]).text();

				if (attrValue.length > 0) {
					var optionElement = optionElements.filter('[value="' + this.addSlashes(attrValue) + '"]');
					matchingOptionElements = matchingOptionElements.add(optionElement);	
				} else {
					matchingOptionElements = matchingOptionElements.add(optionElements);
				}
			}
		}

		return matchingOptionElements;
	};

	VariationsRadioButtons.prototype.updateRadioOptions = function(element, currentAttributes, numberOfAttributes)
	{
		if (element.hasClass('handled') || !element.is('input[type=radio]')) {
			return;
		}

		var attrName = this.getAttributeName(element);
		var optionElements = this.getFields(attrName);
		var currentAttrValue = optionElements.filter(':checked').attr('value') || '';
		optionElements.removeAttr('disabled checked');
		optionElements.parents('label').removeClass('disabled checked');
		optionElements.addClass('handled');

		// The attribute of this select field should not be taken into account when calculating its matching variations:
		// The constraints of this attribute are shaped by the values of the other attributes.
		var checkAttributes = $.extend(true, {}, currentAttributes);
		checkAttributes[attrName] = '';

		var variations = this.findMatchingVariations(this.variationData, checkAttributes);

		if (variations.length > 0) {
			if (numberOfAttributes > 1) {
				var matchingOptionElements = this.getMatchingOptionElements(optionElements, attrName, variations);
				var disabledOptionElements = optionElements.not(matchingOptionElements);
				disabledOptionElements.attr('disabled', 'disabled');
				disabledOptionElements.parents('label').addClass('disabled');
			}

			var currentOption = optionElements.filter('[value="' + this.addSlashes(currentAttrValue) + '"]');
			currentOption.prop('checked', 'checked');
			currentOption.parents('label').addClass('checked');
		}
	};

	VariationsRadioButtons.prototype.syncLabelClass = function(attrName)
	{
		this.getFields(attrName).each(function() {
			var element = jQuery(this);
			var labelElement = element.parents('label');
			if (element.is(':checked')) {
				labelElement.addClass('checked');
			} else {
				labelElement.removeClass('checked');
			}
		});
	};

	VariationsRadioButtons.prototype.getFields = function(attrName)
	{
		var escapedAttrName = this.addSlashes(attrName);
		var fields = this.fields.filter('[data-attribute_name="' + escapedAttrName + '"]');
		if (fields.length == 0) {
			fields = this.fields.filter('[name="' + escapedAttrName + '"]');
		}

		return fields;
	};

	VariationsRadioButtons.prototype.updateSelectOptions = function(element, currentAttributes, numberOfAttributes)
	{
		if (element.hasClass('handled') || !element.is('select')) {
			return;
		}

		var attrName = this.getAttributeName(element);
		var currentAttrValue = element.val() || '';

		if (!element.data('attribute_html')) {
			// save original options
			var refSelect = element.clone();
			refSelect.find('option').removeClass('attached enabled').removeAttr('disabled selected');
			element.data('attribute_html', refSelect.html());
		}
	
		element.html(element.data('attribute_html'));	
		element.addClass('handled');

		// The attribute of this select field should not be taken into account when calculating its matching variations:
		// The constraints of this attribute are shaped by the values of the other attributes.
		var checkAttributes = $.extend(true, {}, currentAttributes);
		checkAttributes[attrName] = '';

		var variations = this.findMatchingVariations(this.variationData, checkAttributes);
		
		if (variations.length > 0) {
			var optionElements = element.find('option');

			if (numberOfAttributes > 1) {
				var matchingOptionElements = this.getMatchingOptionElements(optionElements, attrName, variations);
				optionElements.filter('option:gt(0)').not(matchingOptionElements).remove();
				optionElements = element.find('option');
			}
			
			var currentOption = optionElements.filter('[value="' + this.addSlashes(currentAttrValue) + '"]');
			currentOption.prop('selected', 'selected');
			currentOption.addClass('attached enabled');
		}
	};

	VariationsRadioButtons.prototype.onUpdateAttributes = function(event)
	{
		if (this.useAjax) {
			return;
		}

		var _this = this;
		var attributes = this.getChosenAttributes();
		var currentAttributes = attributes.data;
		var numberOfAttributes = attributes.count;

		this.fields.removeClass('handled');
		this.fields.each(function(index, el) {
			var element = $(el);

			if (element.is('input[type=radio]')) {
				_this.updateRadioOptions(element, currentAttributes, numberOfAttributes);
			} else if (element.is('select')) {
				_this.updateSelectOptions(element, currentAttributes, numberOfAttributes);
			}
		});

		// Custom event for when variations have been updated.
		this.form.trigger('woocommerce_update_variation_values');
	};

	VariationsRadioButtons.prototype.getAttributeName = function(element)
	{
		return element.data('attribute_name') || element.attr('name');
	};

	VariationsRadioButtons.prototype.getChosenAttributes = function()
	{
		var _this = this;
		var data = {};
		var count = 0;
		var chosen = 0;

		this.fields.each(function() {
			var element = $(this);

			var attrName = _this.getAttributeName(element);
			var value = element.val() || '';

			if (typeof data[attrName] == 'undefined') {
				data[attrName] = '';
				count++;
			}

			var isChosen = false;
			if (element.is('input[type=radio]:checked')) {
				isChosen = true;
			} else if (element.is('select') && value.length > 0) {
				isChosen = true;
			}

			if (isChosen) {
				chosen++;
				data[attrName] = value;
			}
		});

		return {
			'count': count,
			'chosenCount': chosen,
			'data': data
		};
	};

	// Overwrites method from add-to-cart-variation.js and allows to have multiple sections with product image on the page. Useful for Elementor.
	$.fn.wc_variations_image_update = function( variation ) {
		var $form             = this,
			$product          = $form.closest( '.product' ),
			$product_gallery  = $product.find( '.images' ),
			$gallery_nav      = $product.find( '.flex-control-nav' ),
			$gallery_img      = $gallery_nav.find( 'li:eq(0) img' ),
			$product_img_wrap = $product_gallery.find( '.woocommerce-product-gallery__image, .woocommerce-product-gallery__image--placeholder' ),
			$product_img      = $product_img_wrap.find( '.wp-post-image' ),
			$product_link     = $product_img_wrap.find( 'a' ).eq( 0 );

		if ( variation && variation.image && variation.image.src && variation.image.src.length > 1 ) {
			// See if the gallery has an image with the same original src as the image we want to switch to.
			var galleryHasImage = $gallery_nav.find( 'li img[data-o_src="' + variation.image.gallery_thumbnail_src + '"]' ).length > 0;

			// If the gallery has the image, reset the images. We'll scroll to the correct one.
			if ( galleryHasImage ) {
				$form.wc_variations_image_reset();
			}

			// See if gallery has a matching image we can slide to.
			var slideToImage = $gallery_nav.find( 'li img[src="' + variation.image.gallery_thumbnail_src + '"]' );

			if ( slideToImage.length > 0 ) {
				slideToImage.trigger( 'click' );
				$form.attr( 'current-image', variation.image_id );
				window.setTimeout( function() {
					$( window ).trigger( 'resize' );
					$product_gallery.trigger( 'woocommerce_gallery_init_zoom' );
				}, 20 );
				return;
			}

			$product_img.wc_set_variation_attr( 'src', variation.image.src );
			$product_img.wc_set_variation_attr( 'height', variation.image.src_h );
			$product_img.wc_set_variation_attr( 'width', variation.image.src_w );
			$product_img.wc_set_variation_attr( 'srcset', variation.image.srcset );
			$product_img.wc_set_variation_attr( 'sizes', variation.image.sizes );
			$product_img.wc_set_variation_attr( 'title', variation.image.title );
			$product_img.wc_set_variation_attr( 'data-caption', variation.image.caption );
			$product_img.wc_set_variation_attr( 'alt', variation.image.alt );
			$product_img.wc_set_variation_attr( 'data-src', variation.image.full_src );
			$product_img.wc_set_variation_attr( 'data-large_image', variation.image.full_src );
			$product_img.wc_set_variation_attr( 'data-large_image_width', variation.image.full_src_w );
			$product_img.wc_set_variation_attr( 'data-large_image_height', variation.image.full_src_h );
			$product_img_wrap.wc_set_variation_attr( 'data-thumb', variation.image.src );
			$gallery_img.wc_set_variation_attr( 'src', variation.image.gallery_thumbnail_src );
			$product_link.wc_set_variation_attr( 'href', variation.image.full_src );
		} else {
			$form.wc_variations_image_reset();
		}

		window.setTimeout( function() {
			$( window ).trigger( 'resize' );
			$form.wc_maybe_trigger_slide_position_reset( variation );
			$product_gallery.trigger( 'woocommerce_gallery_init_zoom' );
		}, 20 );

		$(document).on('wc_variation_form', function(event, variationForm) {
			new VariationsRadioButtons(jQuery(event.target), variationForm);
		})	
	};

})(jQuery, window, document);
