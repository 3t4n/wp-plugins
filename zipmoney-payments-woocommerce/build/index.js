/******/ (function() { // webpackBootstrap
	/******/ 	"use strict";
	/******/ 	var __webpack_modules__ = ({

		/***/ "./client/blocks/constants.js":
		/*!************************************!*\
		!*** ./client/blocks/constants.js ***!
		\************************************/
		/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

			__webpack_require__.r( __webpack_exports__ );
			/* harmony export */ __webpack_require__.d(
				__webpack_exports__,
				{
					/* harmony export */   "PAYMENT_METHOD_NAME": function() { return /* binding */ PAYMENT_METHOD_NAME; }
					/* harmony export */ }
			);
			const PAYMENT_METHOD_NAME = 'zipmoney';

			/***/ }),

	/***/ "@woocommerce/blocks-registry":
	/*!******************************************!*\
	  !*** external ["wc","wcBlocksRegistry"] ***!
	  \******************************************/
	/***/ (function(module) {

		module.exports = window["wc"]["wcBlocksRegistry"];

		/***/ }),

	/***/ "@woocommerce/settings":
	/*!************************************!*\
	  !*** external ["wc","wcSettings"] ***!
	  \************************************/
	/***/ (function(module) {

		module.exports = window["wc"]["wcSettings"];

		/***/ }),

	/***/ "@wordpress/element":
	/*!*********************************!*\
	  !*** external ["wp","element"] ***!
	  \*********************************/
	/***/ (function(module) {

		module.exports = window["wp"]["element"];

		/***/ }),

	/***/ "@wordpress/i18n":
	/*!******************************!*\
	  !*** external ["wp","i18n"] ***!
	  \******************************/
	/***/ (function(module) {

		module.exports = window["wp"]["i18n"];

		/***/ })

	/******/ 	});
	/************************************************************************/
	/******/ 	// The module cache
	/******/ 	var __webpack_module_cache__ = {};
	/******/
	/******/ 	// The require function
	/******/ 	function __webpack_require__(moduleId) {
		/******/ 		// Check if module is in cache
		/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
		/******/ 		if (cachedModule !== undefined) {
			/******/ 			return cachedModule.exports;
			/******/ 		}
		/******/ 		// Create a new module (and put it into the cache)
		/******/ 		var module = __webpack_module_cache__[moduleId] = {
			/******/ 			// no module.id needed
			/******/ 			// no module.loaded needed
			/******/ 			exports: {}
			/******/ 		};
		/******/
		/******/ 		// Execute the module function
		/******/ 		__webpack_modules__[moduleId]( module, module.exports, __webpack_require__ );
		/******/
		/******/ 		// Return the exports of the module
		/******/ 		return module.exports;
		/******/ 	}
	/******/
	/************************************************************************/
	/******/ 	/* webpack/runtime/compat get default export */
	/******/ ! function() {
		/******/ 		// getDefaultExport function for compatibility with non-harmony modules
		/******/ 		__webpack_require__.n = function(module) {
			/******/ 			var getter = module && module.__esModule ?
			/******/ 				function() { return module['default']; } :
			/******/ 				function() { return module; };
			/******/ 			__webpack_require__.d( getter, { a: getter } );
			/******/ 			return getter;
			/******/ 		};
		/******/ 	}();
	/******/
	/******/ 	/* webpack/runtime/define property getters */
	/******/ ! function() {
		/******/ 		// define getter functions for harmony exports
		/******/ 		__webpack_require__.d = function(exports, definition) {
			/******/ 			for (var key in definition) {
				/******/ 				if (__webpack_require__.o( definition, key ) && ! __webpack_require__.o( exports, key )) {
					/******/ 					Object.defineProperty( exports, key, { enumerable: true, get: definition[key] } );
					/******/ 				}
				/******/ 			}
			/******/ 		};
		/******/ 	}();
	/******/
	/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
	/******/ ! function() {
		/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call( obj, prop ); }
		/******/ 	}();
	/******/
	/******/ 	/* webpack/runtime/make namespace object */
	/******/ ! function() {
		/******/ 		// define __esModule on exports
		/******/ 		__webpack_require__.r = function(exports) {
			/******/ 			if (typeof Symbol !== 'undefined' && Symbol.toStringTag) {
				/******/ 				Object.defineProperty( exports, Symbol.toStringTag, { value: 'Module' } );
				/******/ 			}
			/******/ 			Object.defineProperty( exports, '__esModule', { value: true } );
			/******/ 		};
		/******/ 	}();
	/******/
	/************************************************************************/
	var __webpack_exports__ = {};
	// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
	! function() {
		/*!********************************!*\
		!*** ./client/blocks/index.js ***!
		\********************************/
		__webpack_require__.r( __webpack_exports__ );
		/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__                   = __webpack_require__( /*! @wordpress/element */ "@wordpress/element" );
		/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default           = /*#__PURE__*/__webpack_require__.n( _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ );
		/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__                      = __webpack_require__( /*! @wordpress/i18n */ "@wordpress/i18n" );
		/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default              = /*#__PURE__*/__webpack_require__.n( _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ );
		/* harmony import */ var _woocommerce_settings__WEBPACK_IMPORTED_MODULE_2__                = __webpack_require__( /*! @woocommerce/settings */ "@woocommerce/settings" );
		/* harmony import */ var _woocommerce_settings__WEBPACK_IMPORTED_MODULE_2___default        = /*#__PURE__*/__webpack_require__.n( _woocommerce_settings__WEBPACK_IMPORTED_MODULE_2__ );
		/* harmony import */ var _woocommerce_blocks_registry__WEBPACK_IMPORTED_MODULE_3__         = __webpack_require__( /*! @woocommerce/blocks-registry */ "@woocommerce/blocks-registry" );
		/* harmony import */ var _woocommerce_blocks_registry__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n( _woocommerce_blocks_registry__WEBPACK_IMPORTED_MODULE_3__ );
		/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_4__                           = __webpack_require__( /*! ./constants */ "./client/blocks/constants.js" );

		/**
		 * External dependencies
		 */

		/**
		 * Internal dependencies
		 */

		const settings = (0,_woocommerce_settings__WEBPACK_IMPORTED_MODULE_2__.getSetting)( 'zipmoney_data', {} );
		console.log( 'zip settings:'.settings );

		const defaultLabel = (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)( 'Zip now, pay later', 'zippayment' );

		const label = settings.title ? settings.title : defaultLabel;
		/**
	 *
		 * @typedef {import('@woocommerce/type-defs/registered-payment-method-props').RegisteredPaymentMethodProps} RegisteredPaymentMethodProps
		 */

		const saveZip = () => {
			return settings.savezip;
		};

		const SaveZipCheckbox             = () => {
			const [isChecked, setChecked] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useState)( saveZip );

			const handleChange       = event => {
				setChecked( ! isChecked );
				let formData         = new FormData();
				formData.append( "savezipaccount", ! isChecked );
				const requestOptions = {
					method: 'POST',
					body: formData
				};
				fetch( settings.sessionUrl, requestOptions ).then( response => response.json() );
			};

			(0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useEffect)(
				() => {
					Zip.Widget.render();
				},
				[]
			);

		if (settings.tokenisation === true) {
			return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(
				_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment,
				null,
				' ',
				(0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(
					"div",
					{
						class: "zip-overlay",
						onclick: "this.style.display = 'none';"
					},
					(0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(
						"div",
						{
							class: "zip-overlay-text"
						},
						"Creating charge, please wait..."
					)
				),
				(0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(
					"a",
					{
						id: "zipmoney-learn-more",
						class: "zip-hover",
						"zm-widget": "popup",
						"zm-popup-asset": "checkoutdialog"
					},
					"Learn More"
				),
				(0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(
					"input",
					{
						type: "checkbox",
						rel: "saveZipAccount",
						value: "{isChecked}",
						id: "saveZipAccount",
						checked: isChecked,
						onChange: handleChange,
						disabled: false
					}
				),
				(0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(
					"label",
					{
						className: "save-zip-account",
						htmlFor: "saveZipAccount"
					},
					"Save Zip Account for future purchases"
				)
			);
		}

		return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(
			_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment,
			null,
			' ',
			(0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(
				"div",
				{
					class: "zip-overlay",
					onclick: "this.style.display = 'none';"
				},
				(0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(
					"div",
					{
						class: "zip-overlay-text"
					},
					"Creating charge, please wait..."
				)
			),
			(0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(
				"a",
				{
					id: "zipmoney-learn-more",
					class: "zip-hover",
					"zm-widget": "popup",
					"zm-popup-asset": "checkoutdialog"
				},
				"Learn More"
			)
		);
		};
		/**
		 * Label component
		 *
		 * @param {*} props Props from payment API.
		 */

		const Label = props => {
			const {
				PaymentMethodLabel
			}       = props.components;
			return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(
				PaymentMethodLabel,
				{
					text: label
				}
			);
		};
		/**
		 * Zipmoney payment method config object.
		 */

		const zipMoneyPaymentMethod = {
			name: _constants__WEBPACK_IMPORTED_MODULE_4__.PAYMENT_METHOD_NAME,
			label: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)( Label, null ),
			content: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)( SaveZipCheckbox, null ),
			edit: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)( SaveZipCheckbox, null ),
			canMakePayment: () => true,
			paymentMethodId: _constants__WEBPACK_IMPORTED_MODULE_4__.PAYMENT_METHOD_NAME,
			supports: {
				features: ['products']
			},
			ariaLabel: label
		};
		(0,_woocommerce_blocks_registry__WEBPACK_IMPORTED_MODULE_3__.registerPaymentMethod)( zipMoneyPaymentMethod );
	}();
	/******/ })();
// # sourceMappingURL=index.js.map
