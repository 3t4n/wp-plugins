/**
 * -----------------------------------------------------------------------------
 * (c) 2016-2025 Pine Grove Software, LLC -- All rights reserved.
 * Contact: webmaster@AccurateCalculators.com
 * License: Commercial
 * www.AccurateCalculators.com
 * -----------------------------------------------------------------------------
 * number editor
 * -----------------------------------------------------------------------------
 */

/**
 * @preserve Copyright 2016-2025 Pine Grove Software, LLC
 * AccurateCalculators.com
 * License: Commercial
 * editorNumeric.gpl.js
 */


// translation strings
import { GlobalStrings } from '../strings/strs.GLOBAL.gpl.js';

// localization conventions
import { Locales } from './locales.gpl.js';

import { Globals } from './globals.gpl.js';

import { Utils } from './utils.gpl.js';

const RATE_PRECISION = 4;
const NUM_PRECISION = 2;

//
// Start Numeric Editor
//
export class NE {
	conventions;

	/**
	 * Numeric Editor - event listeners for custom text input
	 * @constructor
	 * @param {string} id
	 * @param {Object} new_conventions
	 * @param {number} precision allows for override of conventions.precision
	 * @param {boolean} isTableEditor
	 * @return {Object}
	 */
	constructor (id, new_conventions, precision, isTableEditor = false) {
		let conventions;

		// assume not a valid object
		this.isValid = false;
		this.element = document.getElementById(id);
		if (this.element !== null) {
			this.id = id;
			if (!new_conventions || new_conventions === null) {
				// use defaults or user selected settings
				conventions = Locales.moneyConventions;
			} else {
				conventions = new_conventions;
			}
			this.ccy_format = conventions.ccy_format;
			this.precision = precision !== undefined ? precision : conventions.precision;
			this.sep = conventions.sep;
			this.dPnt = conventions.dPnt;
			this.ccy = conventions.ccy;
			this.ccy_r = conventions.ccy_r;
			this.PCT = '%';

			// Initialize handlers storage if not already present. If present then element has been initialize.
			if (!this.handlers) {
				this.handlers = {};
			}
			// if editor is contained in a html table element, then allow up/down keys etc.
			// Don't show instruction message and disable focus and blur events
			this.isTableEditor = isTableEditor;
			this.isValid = true;
			// required so resetConventions() works
			this.isNumEditor = false;
			this.isRateEditor = false;
			this.init();
		}
	}


	/**
	 * Numeric Editor - change field to interest rate editor (this.PCT appended to the right)
	 * Note, this preserves the local setting for sep & dPnt
	 */
	initRateEditor (precision = RATE_PRECISION) {
		this.ccy = '';
		this.ccy_r = this.PCT;
		this.precision = precision;
		this.isRateEditor = true;
	}


	/**
	 * Numeric Editor - change field to be a plain number editor (no currency or %)
	 * Note, this preserves the local setting for sep & dPnt
	 */
	initNumEditor (precision = NUM_PRECISION) {
		this.ccy = '';
		this.ccy_r = '';
		this.precision = precision;
		this.isNumEditor = true;
	};


	/**
	 * Numeric Editor - Initialize an event listener and store the handler
	 */
	addEvent (event, callback, caller) {
		const handler = (e) => callback.call(caller, e);

		this.element.addEventListener(event, handler, false);
		// Store handlers to enable removal
		if (!this.handlers) {
			this.handlers = {};
		}
		this.handlers[event] = handler;
	};


	/**
	 * Numeric Editor - init object
	 */
	init () {
		this.addEvent('focus', this.onCustomFocus, this);
		this.addEvent('blur', this.onCustomBlur, this);
		this.addEvent('keydown', this.onCustomKeyDown, this);
		this.addEvent('input', this.onCustomInput, this);
		this.addEvent('mouseup', this.onCustomMouseUp, this);
	};


	/**
	 * Numeric Editor - detach event listeners
	 */
	removeEvent (event) {
		if (this.handlers && this.handlers[event]) {
			this.element.removeEventListener(event, this.handlers[event], false);
			delete this.handlers[event]; // Remove the handler reference after removal
		}
	};


	/**
	 * Numeric Editor - deallocate object and clean up
	 */
	destroy () {
		// List all events to remove
		const events = ['focus', 'mouseup', 'keydown', 'input', 'blur'];

		// Loop through and remove each event
		events.forEach((event) => {
			this.removeEvent(event);
		});

		// Additional cleanup
		this.element = null;
		// Delete the handlers property - we may want to detect if element has already been initialized.
		delete this.handlers;
	};


	/**
	 * Numeric Editor - Remove local conventions from input's value. Convert to a number (with computer decimal '.').
	 * @return {number}
	 */
	parseNumStr () {
		return Utils.parseNumStr(this.element.value, this.precision, this.dPnt);
	};


	/**
	 * Numeric Editor - Remove local conventions from input's value. Convert to a number (with computer decimal '.').
	 * @return {number}
	 */
	getNumber () {
		return this.parseNumStr(this.element.value, this.precision, this.dPnt);
	};


	resetConventions (ccy_format) {
		let conventions;

		let current_value = this.getNumber();

		if (!ccy_format) {
		// no ccy_format, use global values
			this.ccy_format = Locales.moneyConventions.ccy_format;
		} else if (this.ccy_format !== ccy_format && Locales.CCY_CONVENTIONS[ccy_format] !== undefined) {
		// changing to user specified date_format
			this.ccy_format = ccy_format;
		} else {
			return; // nothing to do
		}

		conventions = Locales.CCY_CONVENTIONS[this.ccy_format];

		// make sure rate and number editors follow our rules
		if (this.isRateEditor) {
			conventions.ccy = '';
			conventions.ccy_r = '%';
		} else if (this.isNumEditor) {
			conventions.ccy = '';
			conventions.ccy_r = '';
		} else {
			// update precision for currency only
			this.precision = conventions.precision;
		}

		// Always set separators and decimal points as these are not editor-specific
		this.sep = conventions.sep;
		this.dPnt = conventions.dPnt;

		this.element.value = Utils.formatNumericValueWithSym(current_value, conventions, this.precision, this.ccy === Globals.INDIAN_RUPEE);

		return this.element.value;

	};


	/**
	 * Common numeric string formatting.
	 * Same results as: formatNumericValue
	 * Include formatting for Indian Rupee.
	 * Will format a string as it is being typed.
	 * That is, logic is applied on a character by character basis.
	 * No error checking. Assumes that 'value' is a valid number.
	 * Used by numeric editor. 'keydown' event handler validates 'value'.
	 */
	// formatNumericValueOnInput (value, sep, dPnt, precision, isIndianRupee = false) {
	formatNumericValueOnInput (value, sep, dPnt, precision) {
		// Direct return for lone minus sign or empty string to handle negative input initiation and user deleting value.
		if (value === '-' || value === '') {
			return value;
		}

		const isNegative = value.startsWith('-');

		value = isNegative ? value.substring(1) : value; // Remove minus if present for processing

		let [integerPart, decimalPart] = value.split(dPnt);

		// Remove non-digit characters safely
		integerPart = integerPart.replace(/\D/g, '');

		// Remove leading zeros from integerPart if it's longer than 1
		if (integerPart.length > 1) {
			integerPart = integerPart.replace(/^0+/, '');
		}

		// Default to '0' if integerPart is empty after removing leading zeros
		if (integerPart === '') {
			integerPart = '0';
		}

		let formattedIntegerPart = integerPart;
		let formattedValue = formattedIntegerPart;

		// Adjust logic for showing decimal point based on presence in input
		if (value.includes(dPnt) || decimalPart) {
			formattedValue += dPnt; // Show the decimal point if present in the input
			if (decimalPart) {
				decimalPart = decimalPart.substring(0, precision);
				formattedValue += decimalPart;
			}
		}

		// Prepend minus if the original value was negative, ensuring correct format for negative decimals
		formattedValue = isNegative ? '-' + formattedValue : formattedValue;

		return formattedValue;
	};


	/**
	 * val - element's value
	 * resonsible for handling the formating of the '<input>' element.
	 * This formats string in real time as user types
	 * 'val' is validated during 'keydown' event.
	 * Produces same results as 'formatNumericValue()' (which is not for char-by-char, realtime formatting)
	 */
	onCustomInputHelper (val) {
		// [KT] 09/17/2024 - logic changed for 'Plus' plugins
		// no value entered - just return, nothing to format.
		if (val === '') {
			return '';
		}
		// Continue with numeric formatting if the first character is not special or the logic above hasn't returned (e.g., for mid-string changes)
		return this.formatNumericValueOnInput(val, this.sep, this.dPnt, this.precision, this.ccy === Globals.INDIAN_RUPEE);
	};


	onCustomInput (e) {
		e.target.value = this.onCustomInputHelper(e.target.value);
	};


	/**
	 * 'keydown' applies logic for filtering the user's keystrokes. Rules are situational specific.
	 * @param {*} e
	 * @returns
	 */
	onCustomKeyDown (e) {
		const decimalChar = this.dPnt; // Ensure this is correctly set (e.g., '.')
		const navigationKeys = ['PageUp', 'PageDown', 'End', 'Home', 'ArrowLeft', 'ArrowUp', 'ArrowDown', 'Enter'];

		// Block the decimal point if precision is set to 0
		if (this.precision === 0 && e.key === decimalChar) {
			e.preventDefault(); // Prevent the decimal point from being entered
			//  could show user a message here
			return; // Exit early
		}

		// Handle the minus sign as a "change of intent" key
		if (e.key === '-') {
			return; // Exit early
		}

		// Clear the input if backspace is pressed
		if (e.key === 'Backspace') {
			this.element.value = ''; // Clear the input
			return;
		}

		if (e.key === 'Delete') {
			e.preventDefault(); // Block this key
			requestAnimationFrame(() => {
				setTimeout(() => {
					Utils.showMessageModal('<p>' + Globals.ERR_MSGS.noDelKey + '</p>');
				}, 0);
			});
			return;
		}

		if (e.key === this.sep) {
			e.preventDefault(); // Block this key
			requestAnimationFrame(() => {
				setTimeout(() => {
					// [KT] 04/22/2012 -- new message. NOTE: period key and decimal point key on numeric keypad return different keycode values
					Utils.showMessageModal('<p>' + Globals.ERR_MSGS.noSeparators + '</p>');
				}, 0);
			});
			return;
		}

		// Allow control keys, decimal character, and navigation keys if in table editor mode
		if (['Backspace', 'ArrowRight', 'Tab'].includes(e.key) ||
        e.key === decimalChar || (this.isTableEditor && navigationKeys.includes(e.key))) {
			return; // Allow these inputs
		}

		// Block navigation keys when not in table editor mode and display a warning
		if (navigationKeys.includes(e.key) && !this.isTableEditor) {
			e.preventDefault(); // Block these keys
			requestAnimationFrame(() => {
				setTimeout(() => {
					Utils.showMessageModal('<p>' + Globals.ERR_MSGS.noCurKeys + '</p>'); // Display warning
				}, 0);
			});
			return;
		}

		// Block non-numeric keys
		if (isNaN(parseFloat(e.key)) || !isFinite(e.key)) {
			e.preventDefault(); // Blocks any input that's not numeric or specifically allowed
		}
	};


	/**
	 * Capture input element's original value
	 */
	onCustomFocus () {
		// Store the current value of the input on focus for later comparison
		requestAnimationFrame(() => {
			setTimeout(() => {
				this.element.setAttribute('data-original-value', this.element.value);
			}, 0);
		});
	};


	/**
	 * Numeric Editor - onblur event handler
	 * -- assures precision
	 * -- append currency symbol
	 * Precision Adjustment: Ensures numeric inputs conform to the specified precision, padding with zeros where necessary,
	 * and guarantees an integer part is present to avoid formatting like '$.99'.
	 * Currency Symbol Application: Thoughtfully appends or prepends currency symbols,
	 * considering changes to the value since focus to avoid unnecessary repetitions.
	 * Enhanced Value Integrity: The added check for the integer part's presence before the decimal separator enhances
	 *  the function's reliability in producing correctly formatted output.
	 */
	onCustomBlurHelper (val) {

		// Adjust the input value based on precision...
		// Ensure a default value if empty, directly applying '0' if precision is not required,
		// or '0.00' (or equivalent based on precision) if precision is specified.
		if (val.length === 0) {
			val = this.precision > 0 ? '0' + this.dPnt + '0'.repeat(this.precision) : '0';
		}

		val = Utils.formatNumericValue(val, this.sep, this.dPnt, this.precision, this.ccy === Globals.INDIAN_RUPEE);

		// Concise approach to append/prepend currency symbols based on their presence.
		// Note, 'ccy_r' may equal '%'. See: initRateEditor
		return (this.ccy + val + this.ccy_r).trim();
	};


	onCustomBlur () {
		// FYI: setTimeout() does not work when <input> is in a table since 'this.element.value' will have changed.
		// Retrieve the original value stored at focus
		const originalValue = this.element.getAttribute('data-original-value');

		if (this.element.value !== originalValue) {
			this.element.value = this.onCustomBlurHelper(this.element.value);
		}
		return true;
	};


	/**
	 * Numeric Editor - onmouseup event hander - select content of input
	 * The handler sets the selectionStart and selectionEnd properties of the input element to select all its text.
	 */
	onCustomMouseUp (e) {
		// Select the text within the input element
		this.element.selectionStart = 0;
		this.element.selectionEnd = this.element.value.length;
		// Prevent the default mouse up action to ensure the selection is not disrupted
		e.preventDefault();
	};  // onCustomMouseUp


	/**
	 * Numeric Editor - Set a input element's value. Format using local conventions.
	 * Converts a US number to local number before formatting.
	 * @param {number|string} v string
	 */
	setValue (v) {
		if (typeof v === 'number') {
		// if v is a string, the string's conventions must match the editor's conventions
			v = Utils.formatNumericValue(v, this.sep, this.dPnt, this.precision, this.ccy === Globals.INDIAN_RUPEE);
			// Concise approach to append/prepend currency symbols based on their presence.
			// Note, 'ccy_r' may equal '%'. See: NE.prototype.initRateEditor
			this.element.value = (this.ccy + v + this.ccy_r).trim();
		} else {
			// if v is a string, the string's conventions must match the editor's conventions
			v = Utils.formatNumericValue(v, this.sep, this.dPnt, this.precision, this.ccy === Globals.INDIAN_RUPEE);
			// Concise approach to append/prepend currency symbols based on their presence.
			// Note, 'ccy_r' may equal '%'. See: NE.prototype.initRateEditor
			this.element.value = (this.ccy + v + this.ccy_r).trim();
		}
		return this.element.value;
	};
}
