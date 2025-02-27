/**
 * -----------------------------------------------------------------------------
 * (c) 2016-2025 Pine Grove Software, LLC -- All rights reserved.
 * Contact: webmaster@AccurateCalculators.com
 * License: GPL2
 * www.AccurateCalculators.com
 * -----------------------------------------------------------------------------
 * Utility functions common to all plugins.
 * see: https://unpkg.com/printd/printd.umd.min.js
 * -----------------------------------------------------------------------------
 */

/**
 * @preserve Copyright 2016-2025 Pine Grove Software, LLC
 * AccurateCalculators.com
 * License: GPL2
 * utils.gpl.js
 */

// localization conventions
import { Locales } from './locales.gpl.js';

import { Globals } from './globals.gpl.js';

import { Tooltip } from '../ac.bootstrap.esm.min.js';

import Modals from '../common/modals.gpl.js';

import Printd from '../printd.v2.2.js';


const CURRENCY_PRECISION = 2; // default precision

export class Utils {

	static #zoomLevel = 1;

	/**
	 * Rounds a number to the specified precision using conventional rounding.
	 * Defaults to precision 2 for U.S. money rounding. Replaces roundMoney()
	 * Note: For conventional rounding, 5 and large rounds closer to zero i.e. -1.005 rounds to -1.00
	 * @param {number} val - The value to round.
	 * @param {number} precision - The number of decimal places to round to.
	 * @returns {number} The rounded number.
	 * @throws {TypeError} If `val` or `precision` are not numbers.
	 */
	static roundNumber (val, precision = CURRENCY_PRECISION) {
		const BASE = 10;
		const OVERFLOW = 20;

		// Validate input
		if (typeof val !== 'number' || typeof precision !== 'number') {
			throw new TypeError('Both val and precision must be numbers.');
		}

		// Handle edge cases
		if (isNaN(val) || isNaN(precision)) {
			return NaN;
		}

		// Handle overflow
		if (!Number.isFinite(val) || !Number.isFinite(precision) || precision > OVERFLOW || precision < 0) {
			throw new RangeError('Ranger error: Precision must be a greater than or equal to 0 and less than or equal to 20. Value must be finite.');
		}

		// Conventional rounding logic
		const factor = Math.pow(BASE, precision);
		const epsilon = 0.0000000000001; // A small value to handle floating-point precision issues
		const scaledValue = val * factor;
		const roundedValue = Math.round(scaledValue + epsilon);

		return parseFloat((roundedValue / factor).toFixed(precision));
	} // roundNumber


	/**
	 * [KT] 04/03/2024 - new function, to replace other functions
	 * Default rounding to moneyConventions.precision places when precision isn't specified.
	 * No rounding when precision is explicitly set to null.
	 * Rounding to a specified number of decimal places when precision is provided.
	 * Passing a number as 'numStr' fails due to 'replace()'.
	 * For rounding a number, call roundNumber().
	 * Returns null for error, otherwise a number round to n precision if required.
	 * @param {String} numStr The numeric string to parse.
	 * @param {String} dPnt The decimal point character used in the numeric string.
	 * @param {number} precision The number rounded to # of decimal places
	 * @returns {number|null} The parsed number with the specified precision, or null on failure.
	 */
	static parseNumStr (numStr, precision = Locales.moneyConventions.precision, dPnt = Locales.moneyConventions.dPnt) {
		// Remove all characters except digits, minus sign, and the specified decimal point
		let cleanStr = numStr.replace(new RegExp(`[^\\d\\-${dPnt}]`, 'g'), '');

		// Replace the decimal point with a period for consistency if it's not already a period
		if (dPnt !== '.') {
			cleanStr = cleanStr.replace(new RegExp(`\\${dPnt}`, 'g'), '.');
		}

		// If the cleaning process results in an empty string, return null
		if (cleanStr === '') {
			return null;
		}

		// Attempt to convert to a number
		let num = Number(cleanStr);

		// Check for a valid number (this check is technically redundant due to the empty string check above,
		// but is kept for robustness in case the cleaning logic changes in the future)
		if (isNaN(num)) {
			return null;
		}

		// If precision is not null, apply rounding, otherwise return the number as is
		return precision !== null ? this.roundNumber(num, precision) : num;
	} // parseNumStr


	/**
	 * Common numeric string formatting.
	 * The arguments passed must matched those used to format the string
	 * The arguments DO NOT convert from one string format to another
 	 * @param {number|string} value number or string representation of a number (with/without currency symbols)
	 * @param {String=} sep thousands separator, uses numConventions.sep if argument not passed
	 * @param {String=} dPnt decimal character, uses numConventions.dPnt if argument not passed
	 * @param {number=} precision Pads or truncates(!) string, uses numConventions.precision if argument not passed
	 * @param {boolean=} isIndianRupee
	 * @returns {string} number string returned after cleaning without currency or '%' symbol
	 */
	static formatNumericValue (value, sep = Locales.numConventions.sep, dPnt = Locales.numConventions.dPnt, precision = Locales.numConventions.precision, isIndianRupee = false) {

		// Check if the value is a number and the desired decimal point is not '.'
		if (typeof value === 'number' && dPnt !== '.') {
			value = String(value); // convert to a string
			// Replace '.' with the desired decimal point character
			value = value.replace('.', dPnt);
		} else {
			value = String(value);
		}

		// Handle empty and lone minus sign cases upfront
		if (!value || value === '-') {
			return value;
		}

		const isNegative = value.startsWith('-');

		value = isNegative ? value.substring(1) : value; // Remove minus if present for processing

		let [integerPart, decimalPart = ''] = value.split(dPnt);

		// Remove non-digit characters from the integer part to handle previously formatted values
		integerPart = integerPart.replace(/\D/g, '');

		// Remove non-digit characters from the decimal part to handle previously formatted values ('%' ccy_r)
		decimalPart = decimalPart.replace(/\D/g, '');

		// Normalize the integer part by removing leading zeros (keeping at least one digit)
		integerPart = integerPart.replace(/^0+(?=\d)/, '') || '0';

		// Format the integer part based on the Indian Rupee condition
		let formattedIntegerPart = isIndianRupee ? integerPart.replace(/(\d+?)(?=(\d\d)+(\d)(?!\d))/g, `$1${sep}`) : integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, sep);

		// Format the decimal part based on the provided precision
		decimalPart = decimalPart.padEnd(precision, '0').substring(0, precision);

		// Reassemble the formatted value
		let formattedValue = formattedIntegerPart + (decimalPart ? dPnt + decimalPart : '');

		// Reapply the negative sign if applicable
		if (isNegative) {
			formattedValue = '-' + formattedValue;
		}

		return formattedValue;
	}


	/**
	 * Public facing function to covert a number to a string and to format the string.
	 * If rateConventions then ccy_r = '%'
	 * If numConventions then ccy = '' and ccy_r = '' thus no symbols are appended to the numeric string.
	 * @param {number|string} value number or string representation of a number (with/without currency symbols)
	 * @param {Object=} conventions formats per moneyConventions if not passed
	 * @param {number=} precision uses moneyConventions.precisioni is not passed
	 * @param {boolean=} isIndianRupee
	 * @returns
	 */
	static formatNumericValueWithSym (value, conventions = Locales.moneyConventions, precision = Locales.moneyConventions.precision, isIndianRupee = (Locales.moneyConventions.ccy === Globals.INDIAN_RUPEE)) {

		let s = (value !== Globals.UNKNOWN_STR && value !== Globals.SEE_SCHEDULE_STR) ? (conventions.ccy + this.formatNumericValue(value, conventions.sep, conventions.dPnt, precision, isIndianRupee) + conventions.ccy_r) : value;

		return s;
	}


	/**
	 * resetCcyConventions() changes the environment's default conventions
	 * switchNumConventions() changes the formating of a string between two conventions
	 * @param {string} numStr
	 * @param {*} from_ccy_format CCY_FORMATS
	 * @param {*} to_ccy_format CCY_FORMATS
	 * @returns
	 */
	static switchNumConventions (numStr, from_ccy_format, to_ccy_format) {

		if (typeof numStr !== 'string') {
			return null;
		}

		let fromConventions = Locales.CCY_CONVENTIONS[from_ccy_format];
		let toConventions = Locales.CCY_CONVENTIONS[to_ccy_format];

		// first, convert to a number per fromConventions
		let n = this.parseNumStr(numStr, fromConventions.precision, fromConventions.dPnt);

		// convert back to a string per toConventions
		numStr = this.formatNumericValueWithSym(n, toConventions, toConventions.precision, toConventions.ccy === Globals.INDIAN_RUPEE);

		return numStr;
	}


	/**
	 * Prints the contents of a page element specified by its ID.
	 *
	 * This method retrieves the element with the given ID and sends its contents to the printer.
	 * It is typically used to print the display of a calculator or any other content contained
	 * within a specified page element.
	 *
	 * @static
	 * @memberof Utils
	 * @param {string} id - The ID of the element whose contents will be printed.
	 * @throws {Error} Throws an error if the element with the specified ID is not found.
	 */
	static printCalculator (id) {

		// let the minifier optimize this string
		const cssText =
			// '/* General Styling */' +
			'body {' +
			'  background-color: transparent;' +
			'}' +
			// '/* Calculator Container */' +
			'.accuratecalculators.ac-calculator {' +
			'  font-family: Arial, sans-serif;' +
			'  border: none;' +
			// '/* Converted from 20px */' +
			'  padding: 15pt;' +
			// '/* Converted from 8px */' +
			'  border-radius: 6pt;' +
			'  max-width: 350pt;' +
			'  width: 100%;' +
			'  margin: 0 auto;' +
			'  display: grid;' +
			// '/* 5-column grid */' +
			'  grid-template-columns: repeat(5, 1fr);' +
			// '/* Converted from 10px */' +
			'  gap: 7.5pt;' +
			'  color: #000;' +
			'  background-color: transparent;' +
			'  align-items: center;' +
			'}' +
			// '/* Calculator Title */' +
			'.ac-calculator .calc-name {' +
			'  text-align: center;' +
			'  font-size: 16pt;' +
			// '/* Converted from 20px */' +
			'  margin-bottom: 15pt;' +
			// '/* Full width */' +
			'  grid-column: span 5;' +
			'}' +
			// '/* Calculator Title and Copyright Links */' +
			'.ac-calculator .cr a,' +
			'.ac-calculator .calc-name a {' +
			'  color: #000;' +
			'  text-decoration: none;' +
			'}' +
			// '/* Labels and Inputs */' +
			'.ac-calculator .label {' +
			// '/* Occupy the first 3 columns */' +
			'  grid-column: span 3;' +
			'  display: block;' +
			'}' +
			'.ac-calculator .calc-control {' +
			// '/* Occupy the final 2 columns */' +
			'  grid-column: span 2;' +
			'  width: 100%;' +
			// '/* Converted from 8px */' +
			'  padding: 6pt;' +
			'  border: none;' +
			// '/* fixed-width mono spaced font */' +
			'  font-family: "Courier New", Courier, monospace;' +
			'  background-color: transparent;' +
			'  color: #000;' +
			'  font-weight: bold;' +
			'}' +
			'.ac-calculator .label,' +
			'.ac-calculator .calc-control {' +
			'  margin-bottom: 5pt;' +
			'  font-size: 12pt;' +
			'}' +
			'.ac-calculator .calc-control.num {' +
			'  text-align: right;' +
			'}' +
			'.ac-calculator select.calc-control {' +
			'  -webkit-appearance: none;' +
			'  -moz-appearance: none;' +
			'  appearance: none;' +
			// '/* Remove the default arrow */' +
			'  text-align: right;' +
			'  padding-right: 0;' +
			// '/* hack so that select aligns to the right side of grid cell */' +
			'  box-sizing: content-box;' +
			// '/* Prevent overflow */' +
			'  min-width: 0;' +
			// '/* Ensure it doesn\'t exceed the container\'s width */' +
			'  max-width: 100%;' +
			// '/* Stretch to fill the grid cell */' +
			'  justify-self: stretch;' +
			'}' +
			// '/* Button Group */' +
			'.ac-calculator .btn-group {' +
			'  display: none;' +
			'}' +
			// '/* Footer */' +
			'.ac-calculator .calc-footer {' +
			'  text-align: center;' +
			'  margin-top: 20px;' +
			'  font-size: 0.9em;' +
			// '/* Full width */' +
			'  grid-column: span 5;' +
			'}' +
			'.ac-calculator .calc-footer .cr {' +
			'  display: block;' +
			'  margin-bottom: 5px;' +
			'}' +
			'.ac-calculator .calc-footer a {' +
			'  text-decoration: none;' +
			'}' +
			'.ac-calculator .localization {' +
			'  display: none;' +
			'}' +
			'.ac-calculator .msg,' +
			'.ac-calculator .btn {' +
			'  display: none;' +
			'}' +
			'.ac-calculator .bar {' +
			'  grid-column: span 5;' +
			'}';


		const d = new Printd();

		d.print( document.getElementById(id), [cssText] );
	}


	/**
	 * Adds an event listener to an element with the specified event type and callback function.
	 * Optionally binds the callback to a provided context to ensure the correct `this` reference.
	 *
	 * @param {string} eventType - The type of event to listen for (e.g., 'click', 'mouseover').
	 * @param {string} elementId - The ID of the element to which the event listener will be added.
	 * @param {Function} callback - The function to be called when the event is triggered.
	 * @param {Object} [context=null] - Optional. The context (`this` value) to bind to the callback function. Defaults to `null`.
	 * @throws {Error} Throws an error if the element with the specified ID is not found.
	 */
	static addEventListenerToElement (eventType, elementId, callback, context = null) {
		const element = document.getElementById(elementId);

		if (element) {
			const boundCallback = context ? callback.bind(context) : callback;

			element.addEventListener(eventType, boundCallback);
		} else {
			throw new Error(`Element with ID '${elementId}' not found.`);
		}
	}


	/**
	 * Initializes Bootstrap tooltips for elements with the `data-bs-toggle="tooltip"` attribute.
	 *
	 * This method will apply Bootstrap's tooltip functionality to all relevant elements on the page.
	 * It is typically used to enhance user interfaces by providing additional context or information
	 * when users hover over or focus on certain elements.
	 *
	 * @static
	 * @memberof Utils
	 */
	static initTooltips () {
		// Bootstrap v5.x tooltips - initialize
		let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));

		// Define a Set of IDs that require explicit tooltip hiding
		const buttonsToHideTooltipOnClick = new Set([
			'btnCalc-al', 'btnClear-al', 'btnPrint-al', 'btnHelp-al',
			'btnSchedule-al', 'btnCharts-al',
			'btnCalc-ln', 'btnClear-ln', 'btnPrint-ln', 'btnHelp-ln',
			'btnSchedule-ln', 'btnCharts-ln',
			'btnCalc-mtg', 'btnClear-mtg', 'btnPrint-mtg', 'btnHelp-mtg',
			'btnSchedule-mtg', 'btnCharts-mtg',
			'btnCalc-ra', 'btnClear-ra', 'btnPrint-ra', 'btnHelp-ra',
			'btnSchedule-ra', 'btnCharts-ra',
			'btnCalc-ne', 'btnClear-ne', 'btnPrint-ne', 'btnHelp-ne',
			'btnSchedule-ne', 'btnCharts-ne',
			'btnCalc-rs', 'btnClear-rs', 'btnPrint-rs', 'btnHelp-rs',
			'btnSchedule-rs', 'btnCharts-rs',
			'btnCalc-sv', 'btnClear-sv', 'btnPrint-sv', 'btnHelp-sv',
			'btnSchedule-sv', 'btnCharts-sv'
		]);

		tooltipTriggerList.forEach(function (tooltipTriggerEl) {
			const tooltip = new Tooltip(tooltipTriggerEl, {
				trigger: 'hover'
			});

			// If the button's ID is in the Set, add the click event
			if (tooltipTriggerEl.id && buttonsToHideTooltipOnClick.has(tooltipTriggerEl.id)) {
				tooltipTriggerEl.addEventListener('click', function () {
					tooltip.hide(); // Explicitly hide the tooltip on click
				});
			}
		});
	}


	/**
	 * [KT] 03/27/2024 - refactored to improve responsiveness, thus improving INP results.
	 * required for PrintD to print the selected item and not the default item
	 * @param {*} e
	 */
	static updateSelectedAttribute (e) {

		let sel = document.getElementById(e.target.id);

		requestAnimationFrame(() => {
			// Wrap the potentially intensive DOM manipulations in setTimeout
			setTimeout(() => {
				// remove 'selected' from prior user selection
				for (let i = 0; i < sel.length; i += 1) {
					sel[i].removeAttribute('selected');
				}
				// and add 'selected' to current selection
				sel[sel.selectedIndex].setAttribute('selected', 'selected');
			}, 0); // 0 ms delay to defer until the next event loop tick
		});
	};


	/**
	 * Displays a message in a modal.
	 *
	 * This static method is used to show a modal dialog with the provided message.
	 * The message is displayed prominently in the modal window.
	 *
	 * @static
	 * @memberof Utils
	 * @param {string} msg - The message to be displayed in the modal.
	 */
	static showMessageModal (msg) {

		const modal = Modals.modals['MSG'];

		if (modal) {

			const modalBody = document.getElementById('msg-content');

			modalBody.innerHTML = msg;

			modal.show();
		}
	} // showMessageModal


	static updateZoom (zoom) {
		if (zoom === undefined || zoom === null) {
			this.#zoomLevel = 1;
		} else {
			this.#zoomLevel = (this.#zoomLevel + zoom > 0.50 && this.#zoomLevel + zoom < 1.50) ? this.#zoomLevel + zoom : this.#zoomLevel;
		} // updateZoom

		const calcWrapElements = document.querySelectorAll('.ac-calc-wrap');

		calcWrapElements.forEach(element => {
			element.style.transform = `scale(${this.#zoomLevel})`;
			element.style.webkitTransform = `scale(${this.#zoomLevel})`;
			element.style.mozTransform = `scale(${this.#zoomLevel})`;
			element.style.msTransform = `scale(${this.#zoomLevel})`;
			element.style.oTransform = `scale(${this.#zoomLevel})`;
		});
	}


	static setupZoomButtons (shrinkBtnId, growBtnId, originalBtnId) {
		const shrinkButton = document.getElementById(shrinkBtnId);
		const growButton = document.getElementById(growBtnId);
		const originalButton = document.getElementById(originalBtnId);

		if (shrinkButton) {
			shrinkButton.addEventListener('click', this.updateZoom.bind(this, -0.1));
		}

		if (growButton) {
			growButton.addEventListener('click', this.updateZoom.bind(this, 0.1));
		}

		if (originalButton) {
			originalButton.addEventListener('click', this.updateZoom.bind(this, undefined));
		}
	}
}
