/* global faireAdminSettings */

'use strict';

(function ($) {
	const prefix = 'woocommerce_';
	const plugin = 'faire_wc_integration';

	/**
	 * Adds a DOM element with an ID, after one given.
	 *
	 * @param {Object} baseElement DOM Element after which the new element will be added.
	 * @param {string} elementId   ID for the new DOM element.
	 *
	 * @return {Object} New DOM element.
	 */
	const addMsgElement = (baseElement, elementId) => {
		let newElement = $(`#${elementId}`);
		if (!newElement.length) {
			newElement = baseElement
				.after(`<p id="${elementId}"></p>`)
				.next(`#${elementId}`);
		}

		return newElement;
	};

	/**
	 * Manages product sync mode fields.
	 */
	const manageProductSyncMode = () => {
		const { productsManualSyncLinkExistingMsg } =
			faireAdminSettings;

		const productSyncMode = $(`#${prefix}${plugin}_product_sync_mode`);

		const existingProductsFoundOnIntialSetup = $(
			`#${prefix}${plugin}_initial_setup_products_exist`
		);

		const allowSelectCheckProductLinkingWarning = () => {
			if ( productSyncMode.val() !== 'do_not_sync' ) {
				// Maybe display product linking warning 
				if ( parseInt(existingProductsFoundOnIntialSetup.val()) === 1 ) {
					if ( ! confirm( productsManualSyncLinkExistingMsg ) ) {
						return false;
					} else {
						existingProductsFoundOnIntialSetup.val(''); // turn off flag if user continued anyway
					}
				}
			}
			return true;
		};

		// Set visibility of product sync schedule fields.
		const setSyncScheduleFieldsVisibility = () => {
			$(
				`#${prefix}${plugin}_product_sync_schedule_num, #${prefix}${plugin}_product_sync_schedule_time`
			)
				.closest('tr')
				.toggle(productSyncMode.val() === 'sync_scheduled');
		};

		// Handle changes to product sync mode select field.
		productSyncMode.on('change', function (e) {
			if ( ! allowSelectCheckProductLinkingWarning() ) {
				productSyncMode.val( 'do_not_sync' ).trigger('change');
				e.preventDefault();
				return false;
			}
			setSyncScheduleFieldsVisibility();
		});

		setSyncScheduleFieldsVisibility();
	};

	const manageProductPricingPolicy = () => {
		const productPricePolicy = $(`.${prefix}${plugin}_product_pricing_policy`);
		const productPricePolicyChecked = $(`.${prefix}${plugin}_product_pricing_policy:checked`);
		const productWholeSaleMultiplier = $(`#${prefix}${plugin}_product_wholesale_multiplier`);
		const productWholeSalePercentage = $(`#${prefix}${plugin}_product_wholesale_percentage`);

		const setProductWholesaleFieldsVisibility = (target) => {
			productWholeSaleMultiplier
				.closest('tr')
				.toggle($(target).val() === 'wholesale_multiplier');

			productWholeSalePercentage
				.closest('tr')
				.toggle($(target).val() === 'wholesale_percentage');
		}

		// Handle click on product policy radio buttons.
		productPricePolicy.on('click', function () {
			setProductWholesaleFieldsVisibility(this);
		});

		setProductWholesaleFieldsVisibility(productPricePolicyChecked);
	}

	/**
	 * Manages product wholesale mapping.
	 */
	const manageProductWholesaleMapField = () => {
		const productWholesaleMapped = $(
			`#${prefix}${plugin}_product_wholesale_map`
		);

		// Set visibility of product wholesale map field.
		const setProductWholesaleMapFieldVisibility = function () {
			$(`#${prefix}${plugin}_product_wholesale_map_field`)
				.closest('tr')
				.toggle(productWholesaleMapped.is(':checked'));
		};

		// Handle click on product wholesale map checkbox.
		productWholesaleMapped.on('click', function () {
			setProductWholesaleMapFieldVisibility();
		});

		setProductWholesaleMapFieldVisibility();
	};

	/**
	 * Implements API connection test functionality.
	 */
	const testApiConnection = () => {
		const {
			ajaxUrl,
			nonceApiTestConnection,
			testingApiConnectionMsg,
			apiKeyEmptyError,
		} = faireAdminSettings;

		const testApiConnectionButton = $(
			`#${prefix}${plugin}_test_api_connection`
		);

		// Handles click on API connection test button.
		testApiConnectionButton.on('click', function () {
			if (testApiConnectionButton.prop('disabled')) {
				return;
			}

			// Add an element to display connection test messages.
			const connectionTestMsgElem = addMsgElement(
				$(this),
				'connection_test_msg'
			);

			// API key field should not be empty.
			const apiKeyField = $($(`#${prefix}${plugin}_api_key`));
			if (!apiKeyField.val().trim()) {
				// noinspection JSUnresolvedVariable
				connectionTestMsgElem.html(apiKeyEmptyError);
				testApiConnectionButton.prop('disabled', false);
				return;
			}

			// Start testing the API connection.
			connectionTestMsgElem.html(testingApiConnectionMsg);
			testApiConnectionButton.prop('disabled', true);

			$.post(
				ajaxUrl,
				{
					action: 'faire_test_api_connection',
					nonce: nonceApiTestConnection,
				},
				response => connectionTestMsgElem.html(response.data)
			)
			.fail(
				// noinspection JSUnresolvedVariable
				response => connectionTestMsgElem.html(response.responseJSON.data)
			)
			.always(
				() => testApiConnectionButton.prop('disabled', false)
			);
		});
	};

	/**
	 * Manages manual syncing of products.
	 */
	const manageProductsManualSync = () => {
		const { ajaxUrl, nonceManualSyncProducts, productsManualSyncMsg, productsManualSyncLinkExistingMsg } =
			faireAdminSettings;

		const productsManualSyncButton = $(
			`#${prefix}${plugin}_product_sync_manual`
		);

		const existingProductsFoundOnIntialSetup = $(
			`#${prefix}${plugin}_initial_setup_products_exist`
		);

		// Handles click on products sync button.
		productsManualSyncButton.on('click', function () {

			// Maybe display product linking warning 
			if ( parseInt(existingProductsFoundOnIntialSetup.val()) === 1 ) {
				if ( ! confirm( productsManualSyncLinkExistingMsg ) ) {
					return false;
				} else {
					existingProductsFoundOnIntialSetup.val(''); // turn off flag if user continued anyway
				}
			}

			// Add an element to display request results messages.
			const productsSyncMsgElem = addMsgElement(
				$(this),
				'products_manual_sync_msg'
			);

			// Start syncing products.
			productsSyncMsgElem.html(productsManualSyncMsg);
			productsManualSyncButton.prop('disabled', true);

			$.post(
				ajaxUrl,
				{
					action: 'faire_products_manual_sync',
					nonce: nonceManualSyncProducts,
				},
				response => {
					productsSyncMsgElem.html('');
					if (
						response.data !== undefined &&
						Array.isArray(response.data)
					) {
						productsSyncMsgElem.html(response.data.join('<br>'));
					}
				}
			)
			.fail(
				response => productsSyncMsgElem.val(
						response.data === undefined ? '' : response.data
					)
			)
			.always(
				() => productsManualSyncButton.prop('disabled', false)
			);
		});
	};

	/**
	 * Manages manual syncing of product taxonomy.
	 */
	const manageProductTaxonomyManualSync = () => {
		const {
			ajaxUrl,
			nonceManualSyncProductTaxonomy,
			productTaxonomyManualSyncMsg,
			productTaxonomyManualSyncSuccessMsg,
			productTaxonomyManualSyncFailMsg
		} = faireAdminSettings;

		const productTaxonomyManualSyncButton = $(
			`#${prefix}${plugin}_product_taxonomy_sync_manual`
		);

		// Handles click on taxonomy sync button.
		productTaxonomyManualSyncButton.on('click', function () {
			// Add an element to display request results messages.
			const productTaxonomySyncMsgElem = addMsgElement(
				$(this),
				'faire_product_taxonomy_manual_sync_msg'
			);

			// Start syncing product taxonomy.
			productTaxonomySyncMsgElem.html(productTaxonomyManualSyncMsg);
			productTaxonomyManualSyncButton.prop('disabled', true);

			$.post(
				ajaxUrl,
				{
					action: 'faire_product_taxonomy_manual_sync',
					nonce: nonceManualSyncProductTaxonomy,
				},
				response => {
					if ( response.data !== undefined && response.data.status === 'success' ) {
						productTaxonomySyncMsgElem.html(productTaxonomyManualSyncSuccessMsg);
					} else {
						productTaxonomySyncMsgElem.html(productTaxonomyManualSyncFailMsg);
					}
				}
			)
			.fail(
				response => {
					if (response.responseText !== undefined) {
						productTaxonomySyncMsgElem.html(productTaxonomyManualSyncFailMsg);
						// eslint-disable-next-line no-console
						console.error(response.responseText);
					}
				}
			)
			.always(
				() => productTaxonomyManualSyncButton.prop('disabled', false)
			);
		});
	}


	/**
	 * Manages manual product linking sync.
	 */
	 const manageProductLinkingManualSync = () => {
		const {
			ajaxUrl,
			nonceManualSyncProductLinking,
			productLinkingManualSyncMsg,
			productLinkingManualSyncFailed
		} = faireAdminSettings;

		const productLinkingManualSyncButton = $(
			`#${prefix}${plugin}_product_linking_sync_manual`
		);

		const downloadProductLinkingButton = $(
			`#${prefix}${plugin}_product_linking_create_products_csv`
		);

		const downloadVariationsLinkingButton = $(
			`#${prefix}${plugin}_product_linking_create_variations_csv`
		);

		const existingProductsFoundOnIntialSetup = $(
			`#${prefix}${plugin}_initial_setup_products_exist`
		);

		// Handles click on product linking sync button.
		productLinkingManualSyncButton.on('click', function () {
			
			// Add an element to display manual product linking sync messages.
			// Add an element to display connection test messages.
			const productLinkingSyncMsgElem = addMsgElement(
				$(this),
				'product_linking_sync_results'
			);

			const productLinkingSyncResults = $(
				`#${prefix}${plugin}_product_linking_sync_results`
			);

			// Start product linking.
			productLinkingSyncMsgElem.html(productLinkingManualSyncMsg);
			productLinkingManualSyncButton.prop('disabled', true);

			$.post(
				ajaxUrl,
				{
					action: 'faire_product_linking_manual_sync',
					nonce: nonceManualSyncProductLinking,
				},
				response => {
					productLinkingSyncMsgElem.html('');

					let message = ( response.data === undefined || response.data.message === undefined) ? '' : response.data.message;
					productLinkingSyncResults.val( message );

					//Enable disable download csv buttons 
					if ( response.data !== undefined ) {

						existingProductsFoundOnIntialSetup.val(''); //Reset product linking before sync flag 

						if ( response.data.products_csv === true ) {
							downloadProductLinkingButton.attr('disabled', false);
							downloadProductLinkingButton.addClass('button-secondary').removeClass('disabled');
						} else {
							downloadProductLinkingButton.attr('disabled', true);
							downloadProductLinkingButton.removeClass('button-secondary').addClass('disabled');
						}
						if ( response.data.variations_csv === true ) {
							downloadVariationsLinkingButton.attr('disabled', false); 
							downloadVariationsLinkingButton.addClass('button-secondary').removeClass('disabled');
						} else {
							downloadVariationsLinkingButton.attr('disabled', true); 
							downloadVariationsLinkingButton.removeClass('button-secondary').addClass('disabled');
						}
					}
				}
			)
			.fail(
				response => {
					if (response.responseJSON.data !== undefined) {
						productLinkingSyncMsgElem.html(response.responseJSON.data);
						return;
					}
					productLinkingSyncMsgElem.html(productLinkingManualSyncFailed);
					// eslint-disable-next-line no-console
					console.error(response);
				}
			)
			.always(() => productLinkingManualSyncButton.prop('disabled', false));
		});
	};

	/**
	 * Manages manual syncing of the brand.
	 */
	const manageBrandManualSync = () => {
		const {
			ajaxUrl,
			nonceManualSyncBrand,
			brandManualSyncMsg,
			brandManualSyncSuccessMsg,
			brandManualSyncFailMsg
		} = faireAdminSettings;

		const brandManualSyncButton = $(
			`#${prefix}${plugin}_brand_sync_manual`
		);

		const brandSyncInputLocaleElem = $(
			`#${prefix}${plugin}_brand_locale`
		);

		const brandSyncInputCurrencyElem = $(
			`#${prefix}${plugin}_brand_currency`
		);

		// Handles click on brand sync button.
		brandManualSyncButton.on('click', function () {
			// Add an element to display request results messages.
			const brandSyncMsgElem = addMsgElement(
				$(this),
				'faire_brand_manual_sync_msg'
			);

			// Start syncing brand.
			brandSyncMsgElem.html(brandManualSyncMsg);
			brandManualSyncButton.prop('disabled', true);

			$.post(
				ajaxUrl,
				{
					action: 'faire_brand_manual_sync',
					nonce: nonceManualSyncBrand,
				},
				response => {
					if ( response.data === undefined || response.data.status !== 'success' ) {
						brandSyncMsgElem.html(brandManualSyncFailMsg);
						return;
					}
					brandSyncMsgElem.html(brandManualSyncSuccessMsg);
			        if ( response.data.brand.locale !== undefined ) {
			            brandSyncInputLocaleElem.val( response.data.brand.locale );
			        }
			        if ( response.data.brand.currency !== undefined ) {
			            brandSyncInputCurrencyElem.val( response.data.brand.currency );
			        }
				}
			)
			.fail(
				response => {
					if (response.responseText !== undefined) {
						brandSyncMsgElem.html(brandManualSyncFailMsg);
						// eslint-disable-next-line no-console
						console.error(response.responseText);
					}
				}
			)
			.always(
				() => brandManualSyncButton.prop('disabled', false)
			);
		});
	}

	/**
	 * Manages manual syncing of orders.
	 */
	const manageOrdersManualSync = () => {
		const {
			ajaxUrl,
			nonceManualSyncOrders,
			ordersManualSyncMsg,
			ordersManualSyncFailed
		} = faireAdminSettings;

		const ordersManualSyncButton = $(
			`#${prefix}${plugin}_order_sync_manual`
		);

		// Handles click on orders sync button.
		ordersManualSyncButton.on('click', function () {
			// Add an element to display manual orders sync messages.
			// Add an element to display connection test messages.
			const ordersSyncMsgElem = addMsgElement(
				$(this),
				'order_sync_results'
			);

			const ordersSyncResults = $(
				`#${prefix}${plugin}_order_sync_results`
			);

			// Start syncing orders.
			ordersSyncMsgElem.html(ordersManualSyncMsg);
			ordersManualSyncButton.prop('disabled', true);

			$.post(
				ajaxUrl,
				{
					action: 'faire_orders_manual_sync',
					nonce: nonceManualSyncOrders,
				},
				response => {
					ordersSyncMsgElem.html('');
					ordersSyncResults.val(
						response.data === undefined ? '' : response.data
					)
				}
			)
			.fail(
				response => {
					if (response.responseJSON.data !== undefined) {
						ordersSyncMsgElem.html(response.responseJSON.data);
						return;
					}
					ordersSyncMsgElem.html(ordersManualSyncFailed);
					// eslint-disable-next-line no-console
					console.error(response);
				}
			)
			.always(() => ordersManualSyncButton.prop('disabled', false));
		});
	};

	/**
	 * Inits manage of settings for orders scheduled syncing.
	 */
	const manageOrdersSyncScheduleSettings = () => {
		const orderSyncMode = $(`#${prefix}${plugin}_order_sync_mode`);

		const setOrderScheduleSyncSettingsVisibility = function () {
			const visible = orderSyncMode.val() === 'sync_scheduled';

			$(`#${prefix}${plugin}_order_sync_schedule_num`)
				.closest('tr')
				.toggle(visible);
			$(`#${prefix}${plugin}_order_sync_schedule_time`)
				.closest('tr')
				.toggle(visible);
		};

		// Handle click on skip order scheduled syncing checkbox.
		orderSyncMode.on('change', function () {
			setOrderScheduleSyncSettingsVisibility();
		});

		setOrderScheduleSyncSettingsVisibility();
	};

	/**
	 * Manages finish setup button.
	 */
	const manageFinishSetupButton = () => {

		const finishSetupButton = $(
			`#${prefix}${plugin}_initial_setup`
		);

		const initialSetupInputName = `${prefix}${plugin}_initial_setup_trigger`;

		const formSubmitButton = $(
			`#mainform button[type=submit]`
		);

		// Handles click on products sync button.
		finishSetupButton.on('click', function () {

			// Add hidden input so we can trigger initial setup
			$('<input>').attr({
				type: 'hidden',
	    		name: initialSetupInputName,
				value: 'yes'
			}).insertAfter( formSubmitButton );

			// Submit form
			formSubmitButton.trigger('click');
		});
	};

	/**
	 * Manages Download product linking CSV button.
	 */
	 const manageDownloadProductLinkingCSVButton = () => {

		const downloadProductLinkingButton = $(
			`#${prefix}${plugin}_product_linking_create_products_csv`
		);

		// Handles click on  download csv button.
		downloadProductLinkingButton.on('click', function () {

			window.location = window.location + '&wc_faire_link_products_csv=yes';

		});
	};

	/**
	 * Manages Download variations linking CSV button.
	 */
	 const manageDownloadVariationsLinkingCSVButton = () => {

		const downloadVariationsLinkingButton = $(
			`#${prefix}${plugin}_product_linking_create_variations_csv`
		);

		// Handles click on download csv button.
		downloadVariationsLinkingButton.on('click', function () {

			window.location = window.location + '&wc_faire_link_variations_csv=yes';

		});
	};

	$(document).ready(() => {
		// Ensure current page is WooCommerce Faire integration settings.
		if (window.location.href.indexOf(`section=${plugin}`) === -1) {
			return;
		}

		// Inits manage product sync mode.
		manageProductSyncMode();
		manageProductPricingPolicy();
		// Inits manage product wholesale mapping.
		manageProductWholesaleMapField();
		// Inits manage products manual sync.
		manageProductsManualSync();
		// Inits manage products taxonomy manual sync.
		manageProductTaxonomyManualSync();
		// Inits manage products linking manual sync.
		manageProductLinkingManualSync();
		// Init download product linking csv button click.
		manageDownloadProductLinkingCSVButton();
		// Init download variations linking csv button click.
		manageDownloadVariationsLinkingCSVButton();
		// Inits manage brand manual sync.
		manageBrandManualSync();
		// Inits manage orders manual sync.
		manageOrdersManualSync();
		// Inits manage of settings for orders scheduled syncing.
		manageOrdersSyncScheduleSettings();
		// Inits API test connection functionality.
		testApiConnection();
		// Init finish setup button click.
		manageFinishSetupButton();
	});
})(window.jQuery);
