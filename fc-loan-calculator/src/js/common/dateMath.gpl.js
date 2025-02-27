/**
 * -----------------------------------------------------------------------------
 * (c) 2016-2025 Pine Grove Software, LLC -- All rights reserved.
 * Contact: webmaster@AccurateCalculators.com
 * License: GPL2
 * www.AccurateCalculators.com
 * -----------------------------------------------------------------------------
 * date math functions
 * -----------------------------------------------------------------------------
 */

/**
 * @preserve Copyright 2016-2025 Pine Grove Software, LLC
 * AccurateCalculators.com
 * License: GPL2
 * dateMath.gpl.js
 */

// localization conventions
import { Locales } from './locales.gpl.js';

// constants
import { Globals } from './globals.gpl.js';


/**
 * Provides utilities for date calculations.
 * Plugins support monthly frequency with dates set to the first of the month.
 *
 * @class
 * @description
 * The `DateMath` class offers functionality to work with dates, such as adding or subtracting months
 * It is designed to handle operations involving dates set to the first of each month and other related date calculations.
 */
export class DateMath {


	/**
	 * Checks if the provided value is a valid `Date` object.
	 *
	 * This method returns `true` if the provided value is a `Date` object and represents a valid date.
	 * It returns `false` if the value is not a `Date` object, is `null`, `undefined`, or represents an invalid date.
	 *
	 * @static
	 * @memberof DateMath
	 * @param {Date} dt - The value to be checked for validity as a `Date` object.
	 * @returns {boolean} `true` if `dt` is a valid `Date` object, otherwise `false`.
	 */
	static isValidDateObj (dt) {
		return dt instanceof Date && !isNaN(dt.getTime()) ? true : false;
	}


	/**
	 * Converts a Date object to a string using the global date format mask, with an option to override the format.
	 * Validate date is within range.
	 * new_date_format allows function to return date object with conventions other than user's defaults
	 *
	 * @static
	 * @memberof DateMath
	 * @param {Date} date - The Date object to be converted to a string.
	 * @param {string} [new_date_format] - An optional string specifying the date format to override the global date format mask.
	 * @returns {string} The formatted date string.
	 */
	static dateToDateStr (date, new_date_format) {
		const TWO_CHARS = 2;
		let sep,
			date_format,
			dateStr,
			d,
			m,
			y = date.getFullYear();

		if (y < Globals.MIN_YEAR || y > Globals.MAX_YEAR) {
			// 'Date is not valid - bad year.'
			throw Globals.erInvalidYear;
		}

		if (new_date_format) {
			date_format = Locales.DATE_CONVENTIONS[new_date_format].date_format;
			sep = Locales.DATE_CONVENTIONS[new_date_format].date_sep;
		} else {
			date_format = Locales.dateConventions.date_format;
			sep = Locales.dateConventions.date_sep;
		}

		// guarantees leading 0 if needed
		m = ('0' + (date.getMonth() + 1)).slice(-TWO_CHARS);
		d = ('0' + date.getDate()).slice(-TWO_CHARS);

		switch (date_format) {
		case Locales.DATE_FORMATS.MDY:
			dateStr = m + sep + d + sep + y;
			break;
		case Locales.DATE_FORMATS.DMY:
		case Locales.DATE_FORMATS.DMY2:
		case Locales.DATE_FORMATS.DMY3:
			dateStr = d + sep + m + sep + y;
			break;
		case Locales.DATE_FORMATS.YMD:
		case Locales.DATE_FORMATS.YMD2:
		case Locales.DATE_FORMATS.YMD3:
			dateStr = y + sep + m + sep + d;
			break;
		}
		return dateStr;
	}; // dateToDateStr


	/**
	 * Returns the first date of the next month from a given date.
	 *
	 * This method calculates the first day of the month following the month of the provided date.
	 * If no date is provided, the current date is used. The returned date has the time set to midnight.
	 *
	 * @static
	 * @memberof DateMath
	 * @param {Date} [aDate=new Date()] - The date from which to calculate the first day of the next month. If not provided, defaults to the current date.
	 * @returns {Date} The first day of the next month with the time set to 00:00:00.000.
	 */
	static getFirstNextMonth (aDate = new Date()) {
		if (!this.isValidDateObj(aDate)) {
			// 'An invalid JavaScript date object.'
			throw Globals.erInvalidDateObj;
		}

		let d = new Date(aDate.getFullYear(), aDate.getMonth() + 1);

		d.setHours(0, 0, 0, 0);

		return d;
	};


	/**
	 * Returns a Date object representing today's date with the time component set to midnight (00:00:00).
	 *
	 * @static
	 * @memberof DateMath
	 * @returns {Date} A Date object set to today's date with the time component set to midnight.
	 */
	static getTodayMidnight () {
		const today = new Date();

		today.setHours(0, 0, 0, 0);
		return today;
	}


	/**
	 * Returns a new `Date` object with the date modified by the specified number of months.
	 *
	 * This method creates a new `Date` object by adding or subtracting the specified number of months to/from the provided date.
	 * The method handles month overflow and adjusts the day of the month accordingly.
	 *
	 * @static
	 * @memberof DateMath
	 * @param {Date} dt - The original `Date` object to which months will be added or subtracted.
	 * @param {number} months - The number of months to add (positive number) or subtract (negative number).
	 * @returns {Date} A new `Date` object with the date adjusted by the specified number of months.
	 */
	static #incMonthsHelper (d, months) {

		// destructive
		d.setMonth(d.getMonth() + months);

		return d;

	};


	/**
		 * incPeriods is non destructive
		 * but the inc helper functions are destructive (do not export helpers)
		 * @param {Date} aDate
		 * @param {number} n periods
		 * @param {number} f frequency
		 */
	static incPeriods (aDate, n) {
		// preserve value of 'aDate'

		let d = new Date(aDate.getTime());

		// defensive - all dates should be midnight
		d.setHours(0, 0, 0, 0);

		this.#incMonthsHelper(d, n);

		return d;

	}; // incPeriods


	/**
	 * Counts the number of months between two dates.
	 * This method assumes that the provided dates are always the first of the month.
	 * Because dates have to be the first of the month, we do not have to be concerned about day light savings time changes.
	 *
	 * @static
	 * @memberof DateMath
	 * @param {Date} fDate - The starting date, assumed to be the first of the month.
	 * @param {Date} lDate - The ending date, assumed to be the first of the month.
	 * @returns {number} The number of months between `fDate` and `lDate`.
	 */
	static countMonths (fDate, lDate) {
		const MONTHS_IN_YEAR = 12;

		if (fDate.getDate() !== 1 || lDate.getDate() !== 1) {
			// 'Dates must be the first of the month.'
			throw Globals.erInvalidDate;
		}

		// Calculate the year and month difference
		return (lDate.getFullYear() - fDate.getFullYear()) * MONTHS_IN_YEAR + (lDate.getMonth() - fDate.getMonth());
	}

}
