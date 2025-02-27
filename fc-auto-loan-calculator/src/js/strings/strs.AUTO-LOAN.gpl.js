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
 * strs.AUTO-LOAN.gpl.js
 */

// to check for different values assigned to the same variable across different strs.*.gpl.js files, run:
// $ python src/py/string-var-conflicts.py

export class AutoLoanCalculatorStrings {

	static get strs () {
		return {
		// TRANSLATORS: ISO's language code en=English
		// s000: wp.gettext('en', '__TEXT_DOMAIN__')
		// TRANSLATORS: ISO's language code en=English
			s000: wp.i18n.__('en', '__TEXT_DOMAIN__'),
			// s001: wp.i18n.__('Please use the backspace key to delete.', '__TEXT_DOMAIN__'),
			// s002: wp.i18n.__('Left, up & down arrow keys are disabled. So are the home, end, pgup and pgdn keys.', '__TEXT_DOMAIN__'),
			// s003: wp.i18n.__('Use backspace to delete.', '__TEXT_DOMAIN__'),
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
			s026: wp.i18n.__('Error: dates out of sequence.', '__TEXT_DOMAIN__'),
			s027: wp.i18n.__('Exception', '__TEXT_DOMAIN__'),
			s028: wp.i18n.__('occurred when accessing', '__TEXT_DOMAIN__'),
			s029: wp.i18n.__('Invalid index', '__TEXT_DOMAIN__'),
			// from eq.AUTOLOAN-WIDGET.gpl.js
			s100: wp.i18n.__('Internal limit reached. Balance exceeds +/- 99 trillion.', '__TEXT_DOMAIN__'),
			s101: wp.i18n.__('YTD', '__TEXT_DOMAIN__'),
			s102: wp.i18n.__('Running Totals', '__TEXT_DOMAIN__'),
			// from sc.AUTOLOAN-WIDGET.gpl.js
			s2011: wp.i18n.__('Your Personalized Loan Schedule', '__TEXT_DOMAIN__'),
			s202: wp.i18n.__('Last payment amount decreased by', '__TEXT_DOMAIN__'),
			s203: wp.i18n.__('due to rounding', '__TEXT_DOMAIN__'),
			s204: wp.i18n.__('Last payment amount increased by', '__TEXT_DOMAIN__'),
			s2051: wp.i18n.__('Auto Loan Summary', '__TEXT_DOMAIN__'),
			// s206: wp.i18n.__('Car Price', '__TEXT_DOMAIN__'),
			s207: wp.i18n.__('Down Payment', '__TEXT_DOMAIN__'),
			s208: wp.i18n.__('Loan Amount', '__TEXT_DOMAIN__'),
			s209: wp.i18n.__('Number of Payments', '__TEXT_DOMAIN__'),
			s210: wp.i18n.__('Annual Interest Rate', '__TEXT_DOMAIN__'),
			s211: wp.i18n.__('Periodic Payment', '__TEXT_DOMAIN__'),
			s212: wp.i18n.__('Loan Date', '__TEXT_DOMAIN__'),
			s213: wp.i18n.__('1st Payment Due', '__TEXT_DOMAIN__'),
			s214: wp.i18n.__('Payment Frequency', '__TEXT_DOMAIN__'),
			s215: wp.i18n.__('Last Payment Due', '__TEXT_DOMAIN__'),
			s216: wp.i18n.__('Total Interest Due', '__TEXT_DOMAIN__'),
			s217: wp.i18n.__('Total All Payments', '__TEXT_DOMAIN__'),
			s218: wp.i18n.__('Auto Loan Payment Schedule', '__TEXT_DOMAIN__'),
			s219: wp.i18n.__('Year', '__TEXT_DOMAIN__'),
			s220: wp.i18n.__('Date', '__TEXT_DOMAIN__'),
			s221: wp.i18n.__('Payment', '__TEXT_DOMAIN__'),
			s222: wp.i18n.__('Interest', '__TEXT_DOMAIN__'),
			s223: wp.i18n.__('Principal', '__TEXT_DOMAIN__'),
			s224: wp.i18n.__('Balance', '__TEXT_DOMAIN__'),
			s225: wp.i18n.__('Calculation method: Normal', '__TEXT_DOMAIN__'),
			s226: wp.i18n.__('Total Principal', '__TEXT_DOMAIN__'),
			s227: wp.i18n.__('Total Interest', '__TEXT_DOMAIN__'),
			s228: wp.i18n.__('Pct. of Total Payments', '__TEXT_DOMAIN__'),
			s229: wp.i18n.__('Annual Principal and Interest Totals', '__TEXT_DOMAIN__'),
			s230: wp.i18n.__('Accumulated Principal and Interest with Remaining Balance', '__TEXT_DOMAIN__'),
			s231: wp.i18n.__('Total Principal and Interest', '__TEXT_DOMAIN__'),
			s232: wp.i18n.__('Loan', '__TEXT_DOMAIN__'),
			// interface.SHARED-WIDGET.gpl.js has no strings
			// interface.AUTOLOAN-WIDGET.gpl.js
			s4011: wp.i18n.__('One of the following: "Price", "Down Payment Amount" or "Loan Amount" must be "0".', '__TEXT_DOMAIN__'),
			s4021: wp.i18n.__('You may use our general purpose loan calculator if you don\'t want to consider purchase price.', '__TEXT_DOMAIN__'),
			s4031: wp.i18n.__('Only one of the following: "Price", "Down Payment" or "Loan Amount" can be "0".', '__TEXT_DOMAIN__'),
			// s404: wp-i18n.__('You may use our general purpose loan calculator if you don\'t want to consider purchase price.', '__TEXT_DOMAIN__'),
			s4051: wp.i18n.__('There are too many unknown values.', '__TEXT_DOMAIN__'),
			// s406: wp.i18n.__('Only one value may be "0."', '__TEXT_DOMAIN__'),
			s4071: wp.i18n.__('Auto Loan Calculator Help', '__TEXT_DOMAIN__'),
			s4081: wp.i18n.__('<p>Use this calculator to calculate loan details when the down payment is expressed as an amount.</p>', '__TEXT_DOMAIN__'),
			s4091: wp.i18n.__('<p>Unlike a general loan calculator, this calculator allows for two unknown values. In addition to solving for the monthly payment amount, it will also calculate the "Car Price", the "Down Payment Amount" or the "Loan Amount". Just enter a "0" (zero) for one of the three values and provide the other two.</p>', '__TEXT_DOMAIN__'),
			s410a: wp.i18n.__('<p>Note that the calculator calculates what percentage the down payment is of the price of the car. This is handy when a lender requires a borrower to provide a minimum percentage cash deposit.</p>', '__TEXT_DOMAIN__'),
			s411a: wp.i18n.__('<p class="tail">The term (duration) of the loan is expressed as a number of months.</p>', '__TEXT_DOMAIN__'),
			s412a: wp.i18n.__('<ul class="mono tail"><li>&nbsp;60 months = &nbsp;5 years</li><li>120 months = 10 years</li><li>180 months = 15 years</li><li>240 months = 20 years</li><li class="tail">360 months = 30 years</li></ul>', '__TEXT_DOMAIN__'),
			s413a: wp.i18n.__('<p class="small" style="font-size: 85%; line-height: 1.5; color:red; user-select: text">If you need the ability to print the amortization schedule, or more flexibility such as selecting different payment or compounding frequencies or the ability to calculate term or interest rate, please see the auto loan calculator here: <b>https://AccurateCalculators.com/auto-loan-calculator</b></p>', '__TEXT_DOMAIN__'),
			s414: wp.i18n.__('<p class="small" style="font-size: 85%; line-height: 1.5; color:red; user-select: text">If you want to set the loan closing date and first payment due date; select different payment or compounding frequencies; the ability to calculate term or interest rate; or the ability to export the schedule to Excel or Word, please see the auto loan calculator here: <b>https://AccurateCalculators.com/auto-loan-calculator</b></p>', '__TEXT_DOMAIN__'),
			s416a: wp.i18n.__('Monthly',	'__TEXT_DOMAIN__'),
			// TRANSLATORS: report's personalized title page
			s601a: wp.i18n.__('Your Personalized Car Loan Schedule',	'__TEXT_DOMAIN__'),
			// TRANSLATORS: report's personalized title page
			s603: wp.i18n.__('Prepared for',	'__TEXT_DOMAIN__') + ':',
			// TRANSLATORS: report's personalized title page
			s604: wp.i18n.__('Address',	'__TEXT_DOMAIN__') + ':',
			// TRANSLATORS: report's personalized title page
			s605: wp.i18n.__('City, State  ZIP',	'__TEXT_DOMAIN__') + ':',
			// TRANSLATORS: report's personalized title page
			s606: wp.i18n.__('Prepared On',	'__TEXT_DOMAIN__') + ':',
			// TRANSLATORS: report's personalized title page
			s607: wp.i18n.__('Prepared by',	'__TEXT_DOMAIN__') + ':',
			// TRANSLATORS: report's personalized title page
			s608: wp.i18n.__('Address',	'__TEXT_DOMAIN__') + ':',
			// TRANSLATORS: report's personalized title page
			s609: wp.i18n.__('Phone',	'__TEXT_DOMAIN__') + ':',
			// TRANSLATORS: report's personalized title page
			s610: wp.i18n.__('Email',	'__TEXT_DOMAIN__') + ':',
			// TRANSLATORS: report's personalized title page
			s611: wp.i18n.__('Website',	'__TEXT_DOMAIN__') + ':'
		};
	}
}
