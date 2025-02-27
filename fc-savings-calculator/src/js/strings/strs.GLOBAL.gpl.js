/**
 * -----------------------------------------------------------------------------
 * (c) 2016-2025 Pine Grove Software, LLC -- All rights reserved.
 * Contact: webmaster@AccurateCalculators.com
 * License: GPL2
 * www.AccurateCalculators.com
 * -----------------------------------------------------------------------------
 * Common code and global variables.
 * -----------------------------------------------------------------------------
 */

/**
 * @preserve Copyright 2016-2025 Pine Grove Software, LLC
 * AccurateCalculators.com
 * License: GPL2
 * strs.GLOBAL.gpl.js
 */

// to check for different values assigned to the same variable across different strs.*.gpl.js files, run:
// $ python src/py/string-var-conflicts.py

export class GlobalStrings {

	static get strs () {
		return {
		// TRANSLATORS: ISO's language code en=English
			s000: wp.i18n.__('en', '__TEXT_DOMAIN__'),
			s001: wp.i18n.__('Please use the backspace key to delete.', '__TEXT_DOMAIN__'),
			s002: wp.i18n.__('Left, up & down arrow keys are disabled. So are the home, end, pgup and pgdn keys.', '__TEXT_DOMAIN__'),
			s003: wp.i18n.__('Use backspace to delete.', '__TEXT_DOMAIN__'),
			s004: wp.i18n.__('If value is selected, just start typing new value to clear prior value.', '__TEXT_DOMAIN__'),
			s005: wp.i18n.__('When a number is selected (value shown in inverse), use right arrow key to clear selection without clearing value. Then backspace to edit.', '__TEXT_DOMAIN__'),
			s006: wp.i18n.__('TIP: Generally it is best to use the TAB or SHIFT-TAB keys to move from one input to the next or previous input.', '__TEXT_DOMAIN__'),
			s007: wp.i18n.__('TIP 2: Generally, editing a value is inefficient. Since values are auto selected, just type the number you want.', '__TEXT_DOMAIN__'),
			s008: wp.i18n.__('Do not type the thousand separator character.', '__TEXT_DOMAIN__'),
			s009: wp.i18n.__('(If using U.S. convention, that would be the comma.)', '__TEXT_DOMAIN__'),
			s010: wp.i18n.__('I\'m smart enough to enter them for you!', '__TEXT_DOMAIN__'),
			s011: wp.i18n.__('An unknown date calculation error occurred.', '__TEXT_DOMAIN__'),
			s012: wp.i18n.__('Please provide us with your inputs and settings so that we can fix this. Thank you.', '__TEXT_DOMAIN__'),
			s013: wp.i18n.__('Date is not valid - bad year.', '__TEXT_DOMAIN__'),
			s014: wp.i18n.__('Jan', '__TEXT_DOMAIN__'),
			s015: wp.i18n.__('Feb', '__TEXT_DOMAIN__'),
			s016: wp.i18n.__('Mar', '__TEXT_DOMAIN__'),
			s017: wp.i18n.__('Apr', '__TEXT_DOMAIN__'),
			s018: wp.i18n.__('May', '__TEXT_DOMAIN__'),
			s019: wp.i18n.__('Jun', '__TEXT_DOMAIN__'),
			s020: wp.i18n.__('Jul', '__TEXT_DOMAIN__'),
			s021: wp.i18n.__('Aug', '__TEXT_DOMAIN__'),
			s022: wp.i18n.__('Sept', '__TEXT_DOMAIN__'),
			s023: wp.i18n.__('Oct', '__TEXT_DOMAIN__'),
			s024: wp.i18n.__('Nov', '__TEXT_DOMAIN__'),
			s025: wp.i18n.__('Dec', '__TEXT_DOMAIN__'),
			// TRANSLATORS: global library, what needs to be solved for
			s030: wp.i18n.__('Unknown', '__TEXT_DOMAIN__'),
			// TRANSLATORS: global library, first char of 'Unknown' text (lower)
			s031: wp.i18n.__('u', '__TEXT_DOMAIN__'),
			// TRANSLATORS: global library, first char of 'Unknown' text (UPPER)
			s032: wp.i18n.__('U', '__TEXT_DOMAIN__'),
			s0414: wp.i18n.__('Dates must be the first of the month.', '__TEXT_DOMAIN__'),
			s0415: wp.i18n.__('An invalid JavaScript date object.', '__TEXT_DOMAIN__'),
			s0416: wp.i18n.__('Monthly', '__TEXT_DOMAIN__')
		};
	}

	// We can 'force' the translation data to be loaded by calling this method.
	// Useful for debugging if WordPress does not load them.
	// static fetchTranslations () {
	// 	const jsonUrl = 'http://localhost:8100/wp-content/plugins/ac-loan-calculator-plus/languages/ac-loan-calculator-de_DE-ac-i18n-hack.json';

	// 	console.log('Starting to fetch translations...');

	// 	return fetch(jsonUrl)
	// 		.then(response => {
	// 			// console.log('Fetch completed. Checking response status...');
	// 			if (!response.ok) {
	// 				// console.error(`Failed to load translations: ${response.statusText}`);
	// 				throw new Error(`Failed to load translations: ${response.statusText}`);
	// 			}
	// 			return response.json();
	// 		})
	// 		.then(data => {
	// 			// console.log('Fetched translation data:', data);

	// 			if (data && data.locale_data && data.locale_data.messages) {
	// 				setLocaleData(data.locale_data.messages, '__TEXT_DOMAIN__');
	// 				console.log('Translation data applied successfully.');
	// 			} else {
	// 				// console.error('Invalid translation data structure.');
	// 			}

	// 			console.log(__('Please use the backspace key to delete.', '__TEXT_DOMAIN__'));
	// 		})
	// 		.catch(error => {
	// 			console.error('Error fetching the JSON file:', error);
	// 		});
	// }
}

// GlobalStrings.fetchTranslations();
