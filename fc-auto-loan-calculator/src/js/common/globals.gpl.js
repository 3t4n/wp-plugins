/**
 * -----------------------------------------------------------------------------
 * (c) 2016-2025 Pine Grove Software, LLC -- All rights reserved.
 * Contact: webmaster@AccurateCalculators.com
 * License: GPL2
 * www.AccurateCalculators.com
 * -----------------------------------------------------------------------------
 * shared consts and enumerated types - for all plugins
 * -----------------------------------------------------------------------------
 */

/**
 * @preserve Copyright 2016-2025 Pine Grove Software, LLC
 * AccurateCalculators.com
 * License: GPL2
 * globals.v2.gpl.js
 */


import { GlobalStrings as globalStrings } from '../strings/strs.GLOBAL.gpl.js';

// error strings
// An unknown date calculation error occurred.
// Please provide us with your inputs and settings so that we can fix this. Thank you.'
const INVALID_DATE_MATH_STR = globalStrings.strs.s013 + '\n' + globalStrings.strs.s014;
// 'Date is not valid - bad year.'
const INVALID_YEAR_STR = globalStrings.strs.s013;
// 'Dates must be the first of the month.'
const INVALID_DATE_STR = globalStrings.strs.s0414;
// 'An invalid JavaScript date object.'
const INVALID_DATE_OBJ_STR = globalStrings.strs.s0415;

const NMONTHS_IN_YEAR = 12;

export class Globals {

	static COPYRIGHT_HOLDER_DOMAIN = 'AccurateCalculators.com';

	/**
	 * default values
	 */
	static PCT = '%';

	static US_DECIMAL = '.';

	// 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'
	static MONTHS = [globalStrings.strs.s014, globalStrings.strs.s015, globalStrings.strs.s016, globalStrings.strs.s017, globalStrings.strs.s018, globalStrings.strs.s019, globalStrings.strs.s020, globalStrings.strs.s021, globalStrings.strs.s022, globalStrings.strs.s023, globalStrings.strs.s024, globalStrings.strs.s025];

	/* eslint-disable no-magic-numbers */
	static MIN_YEAR = 1970;

	static MIN_DATE = new Date(this.MIN_YEAR, 0, 1, 0, 0, 0, 0);

	// static MAX_YEAR = 2099;
	static MAX_YEAR = new Date().getFullYear() + Math.ceil(999 / 12);

	static MAX_DATE = new Date(this.MAX_YEAR, 11, 31, 0, 0, 0, 0);

	static INITIAL_CASH_FLOWS = 500;

	static DIY = 0; // static DAYS_IN_YEAR.THREE_SIXTY;
	/* eslint-enable no-magic-numbers */


	/**
	 * Number of periods per year for various payment frequencies.
	 *
	 * @static
	 * @memberof Globals
	 */
	static PPY = [undefined, undefined, undefined, undefined, undefined, undefined, NMONTHS_IN_YEAR];


	/**
	 * Number of compounding periods per year.
	 *
	 * @static
	 * @memberof Globals
	 */
	static CPY = [undefined, undefined, undefined, undefined, undefined, undefined, NMONTHS_IN_YEAR];

	static STR_FREQUENCIES	 = [undefined, undefined, undefined, undefined, undefined, undefined, globalStrings.strs.s0416];

	static INDIAN_RUPEE = '₹';

	/**
	 * Error messages for numeric text input
	 * formatted for HTML
	 */
	static get ERR_MSGS () {
		return {
		// noDelKey: 'Please use the backspace key to delete.',
			noDelKey: '<p>' + globalStrings.strs.s001 + '</p>',
			noCurKeys: '<p>' + globalStrings.strs.s002 + '</p><p>' + globalStrings.strs.s003 + '</p><p><b>' + globalStrings.strs.s004 + '</b></p><p>' + globalStrings.strs.s005 + '</p><p><b>' + globalStrings.strs.s006 + '</b>&nbsp;' + globalStrings.strs.s007 + '</p><p><b>' + globalStrings.strs.s008 + '</b>&nbsp;' + globalStrings.strs.s009 + '</p>',
			// 'Left, up & down arrow keys are disabled. So are the home, end, pgup and pgdn keys.\n\nUse backspace to delete.\n\nIf value is selected, just start typing new value to clear prior value.\n\nWhen a number is selected (value shown in inverse), use right arrow key to clear selection without clearing value. Then backspace to edit.\n\nTIP: Generally it is best to use the TAB or SHIFT-TAB keys to move from one input to the next or previous input.\n\nTIP 2: Generally, editing a value is inefficient. Since values are auto selected, just type the number you want.',
			noSeparators: '<p>' + globalStrings.strs.s008 + '</p><p>' + globalStrings.strs.s009 + '</p><p>' + globalStrings.strs.s010 + '</p>'
		// 'Do not type the thousand separator character.\n\n(If using US convention, that would be the comma.)\n\nI\'m smart enough to enter them for you!'
		};
	}


	// errors
	static erInvalidDateMath = new Error(INVALID_DATE_MATH_STR);
	static erInvalidYear = new Error(INVALID_YEAR_STR);
	static erInvalidDate = new Error(INVALID_DATE_STR);
	static erInvalidDateObj = new Error(INVALID_DATE_OBJ_STR);


	/**
	 * Enumerated ordinal value for monthly payment/cash flow frequency.
	 *
	 * @static
	 * @memberof Globals
	 * @property {number} MONTHLY - Monthly payment frequency/cash flow.
	 */
	static PMT_FREQUENCY = {
		MONTHLY: 6
	};


	/**
	 * Enumerated ordinal value for monthly compounding frequency.
	 *
	 * @static
	 * @memberof Globals
	 * @property {number} MONTHLY - Monthly compounding frequency.
	 */
	static CMP_FREQUENCY = {
		MONTHLY: 6
	};


	/**
	 * Enumerated ordinal values for payment (cash flow) methods.
	 *
	 * - ARREARS: Payment occurs at the end of the period.
	 * - ADVANCE: Payment occurs at the start of the period.
	 *
	 * @static
	 * @memberof Globals
	 * @property {number} ARREARS - method where payments/investments are made at the end of the period.
	 * @property {number} ADVANCE - method where payments/investments are made at the start of the period.
	 */
	static PMT_METHOD = {
		ARREARS: 0,
		ADVANCE: 1
	};


	/**
	 * Enumerated ordinal value for the normal amortization method.
	 *
	 * @static
	 * @memberof Globals
	 * @property {number} AM_NORMAL - normal amortization method.
	 */
	static AMORT_MTHD = {
		AM_NORMAL: 0
	};


	/**
	 * Enumerated types to identify a row's content in a report or schedule.
	 *
	 * @static
	 * @memberof ReportSchedule
	 * @property {number} DETAIL - Represents a detailed row with specific information.
	 * @property {number} ANNUAL_TOTALS - Represents a row summarizing annual totals.
	 * @property {number} RUNNING_TOTALS - Represents a row summarizing running totals.
	 */
	static ROW_TYPES = {
		DETAIL: 0,
		ANNUAL_TOTALS: 1,
		RUNNING_TOTALS: 2
	};

}
