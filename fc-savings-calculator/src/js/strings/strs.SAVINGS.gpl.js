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
 * strs.SAVINGS.gpl.js
 */

// to check for different values assigned to the same variable across different strs.*.gpl.js files, run:
// $ python src/py/string-var-conflicts.py

export class SavingsCalculatorStrings {

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
			s026: wp.i18n.__('Error: dates out of sequence.', '__TEXT_DOMAIN__'),
			s027: wp.i18n.__('Exception', '__TEXT_DOMAIN__'),
			s028: wp.i18n.__('occurred when accessing', '__TEXT_DOMAIN__'),
			s029: wp.i18n.__('Invalid index', '__TEXT_DOMAIN__'),
			// from eq.SAVINGS-WIDGET.gpl.js
			// s100: wp.i18n.__('Internal limit reached. Balance exceeds +/- 99 trillion.', '__TEXT_DOMAIN__'),
			s101: wp.i18n.__('YTD', '__TEXT_DOMAIN__'),
			s102: wp.i18n.__('Running Totals', '__TEXT_DOMAIN__'),
			// from sc.SAVINGS-WIDGET.gpl.js
			s2017: wp.i18n.__('Your Personalized Savings Schedule', '__TEXT_DOMAIN__'),
			// s202: wp.i18n.__('Last payment amount decreased by', '__TEXT_DOMAIN__'),
			// s203: wp.i18n.__('due to rounding', '__TEXT_DOMAIN__'),
			// s204: wp.i18n.__('Last payment amount increased by', '__TEXT_DOMAIN__'),
			// s205: wp.i18n.__('Retirement Plan Summary', '__TEXT_DOMAIN__'),
			s2057: wp.i18n.__('Cash Flow Summary', '__TEXT_DOMAIN__'),
			// s206: wp.i18n.__('Total Investment', '__TEXT_DOMAIN__'),
			s2065: wp.i18n.__('Total Savings', '__TEXT_DOMAIN__'),
			s207: wp.i18n.__('Number of Investments', '__TEXT_DOMAIN__'),
			s208: wp.i18n.__('Return on Investment (ROI)', '__TEXT_DOMAIN__'),
			s209: wp.i18n.__('Total Gain', '__TEXT_DOMAIN__'),
			s210: wp.i18n.__('Last Cash Flow Date', '__TEXT_DOMAIN__'),
			s211: wp.i18n.__('Years', '__TEXT_DOMAIN__'),
			// s212: wp.i18n.__('Loan Date', '__TEXT_DOMAIN__'),
			// s213: wp.i18n.__('1st Payment Due', '__TEXT_DOMAIN__'),
			// s214: wp.i18n.__('Payment Frequency', '__TEXT_DOMAIN__'),
			// s215: wp.i18n.__('Last Payment Due', '__TEXT_DOMAIN__'),
			// s216: wp.i18n.__('Total Interest Due', '__TEXT_DOMAIN__'),
			// s217: wp.i18n.__('Total All Payments', '__TEXT_DOMAIN__'),
			// s218: wp.i18n.__('Investment Schedule', '__TEXT_DOMAIN__'),
			s218: wp.i18n.__('Savings Schedule', '__TEXT_DOMAIN__'),
			s219: wp.i18n.__('Year', '__TEXT_DOMAIN__'),
			s220: wp.i18n.__('Date', '__TEXT_DOMAIN__'),
			s221: wp.i18n.__('Deposit', '__TEXT_DOMAIN__'),
			s222: wp.i18n.__('Interest', '__TEXT_DOMAIN__'),
			s223: wp.i18n.__('Net Change', '__TEXT_DOMAIN__'),
			s224: wp.i18n.__('Balance', '__TEXT_DOMAIN__'),
			// s225: wp.i18n.__('Calculation method: Normal', '__TEXT_DOMAIN__'),
			// s226: wp.i18n.__('Annual Investment', '__TEXT_DOMAIN__'),
			s2265: wp.i18n.__('Annual Savings', '__TEXT_DOMAIN__'),
			s227: wp.i18n.__('Annual Interest', '__TEXT_DOMAIN__'),
			s228: wp.i18n.__('Change in Balance', '__TEXT_DOMAIN__'),
			s2295: wp.i18n.__('Annual Savings and Interest Totals', '__TEXT_DOMAIN__'),
			s2305: wp.i18n.__('Accumulated Savings and Interest', '__TEXT_DOMAIN__'),
			s2315: wp.i18n.__('Amount Saved & Interest as Percentage of Total Value', '__TEXT_DOMAIN__'),
			// s232: wp.i18n.__('Loan', '__TEXT_DOMAIN__'),
			// s233: wp.i18n.__('"Net Change" is change from prior period i.e. prior balance plus investment, plus gain on investment (interest).', '__TEXT_DOMAIN__'),
			s234: wp.i18n.__('Running Investment', '__TEXT_DOMAIN__'),
			s2345: wp.i18n.__('Running Savings', '__TEXT_DOMAIN__'),
			s235: wp.i18n.__('Running Interest', '__TEXT_DOMAIN__'),
			s236: wp.i18n.__('Total Deposits', '__TEXT_DOMAIN__'),
			s237: wp.i18n.__('Total Interest Earned', '__TEXT_DOMAIN__'),
			s238: wp.i18n.__('Total Value', '__TEXT_DOMAIN__'),
			s239: wp.i18n.__('Pct. of Total', '__TEXT_DOMAIN__'),
			// s240: wp.i18n.__('Your Personalized Cash Flow Schedule', '__TEXT_DOMAIN__'),
			s241: wp.i18n.__('Number of Deposits', '__TEXT_DOMAIN__'),
			s242: wp.i18n.__('Interest Rate', '__TEXT_DOMAIN__'),
			s243: wp.i18n.__('Total Interest', '__TEXT_DOMAIN__'),
			s244: wp.i18n.__('Savings Schedule', '__TEXT_DOMAIN__'),
			s245: wp.i18n.__('Deposit', '__TEXT_DOMAIN__'),
			s246: wp.i18n.__('"Net Change" is change from prior period i.e. prior balance plus deposit, plus interest less withdrawal.', '__TEXT_DOMAIN__'),
			s247: wp.i18n.__('Annual Deposit and Interest Totals', '__TEXT_DOMAIN__'),
			s248: wp.i18n.__('Accumulated Deposit and Interest', '__TEXT_DOMAIN__'),
			s249: wp.i18n.__('Annual Deposit', '__TEXT_DOMAIN__'),
			s250: wp.i18n.__('Running Deposit', '__TEXT_DOMAIN__'),
			// interface.SHARED-WIDGET.gpl.js has no strings
			// interface.SAVINGS-WIDGET.gpl.js
			// s401: wp.i18n.__('One of the following: "Price", "Down Payment" or "Loan Amount" must be "0".', '__TEXT_DOMAIN__'),
			// s402: wp.i18n.__('You may use our general purpose loan calculator if you don\'t want to consider purchase price.', '__TEXT_DOMAIN__'),
			// s403: wp.i18n.__('Only one of the following: "Price", "Down Payment" or "Loan Amount" can be "0".', '__TEXT_DOMAIN__'),
			// s404: wp.i18n.__('You may use our general purpose loan calculator if you don\'t want to consider purchase price.', '__TEXT_DOMAIN__'),
			// s405: wp.i18n.__('There are too many unknown values.', '__TEXT_DOMAIN__'),
			// s406: wp.i18n.__('Only one value may be "0."', '__TEXT_DOMAIN__'),
			// s407: wp.i18n.__('There are unknown values.', '__TEXT_DOMAIN__'),
			// s408: wp.i18n.__('Please make sure all values are entered.', '__TEXT_DOMAIN__'),
			s410g: wp.i18n.__('Savings Calculator — calculate future value', '__TEXT_DOMAIN__'),
			s411g: wp.i18n.__('<p>This calculator easily answers the question "If I save "X" amount for "Y" months what will the value be at the end?"</p>', '__TEXT_DOMAIN__'),
			s412g: wp.i18n.__('<p>The user enters the "Periodic Savings Amount" (amount saved or invested every month); the "Number of Months" and the "Annual Interest Rate" or the annual rate of return one expects to earn on their investments.</p>', '__TEXT_DOMAIN__'),
			s413g: wp.i18n.__('<p>The calculator quickly creates a savings schedule and a set of charts that will help the user see the relationship between the amount invested and the return on the investment.</p>', '__TEXT_DOMAIN__'),
			s414g: wp.i18n.__('<p>The investment term is always expressed in months.</p>', '__TEXT_DOMAIN__'),
			s415g: wp.i18n.__('<ul class="mono tail"><li>&nbsp;60 months = &nbsp;5 years</li><li>120 months = 10 years</li><li>180 months = 15 years</li><li>240 months = 20 years</li><li class="tail">360 months = 30 years</li></ul>', '__TEXT_DOMAIN__'),
			// GPL
			s416: wp.i18n.__('<p class="small" style="font-size: 85%; line-height: 1.5; color:red; user-select: text">If you need a more advanced "Savings Calculator" - one that lets the user solve for the starting amount, the amount to invest, the interest rate, the term required to reach a goal or the future value; or if you would like to easily print the schedule; or if you need to pick a different investment frequency, then you may want to try the calculator located here: <b>https://AccurateCalculators.com/savings-calculator</b></p>', '__TEXT_DOMAIN__'),
			// non-GPL
			s417g: wp.i18n.__('<p class="small" style="font-size: 85%; line-height: 1.5; color:red; user-select: text">If you need a more advanced "Savings Calculator" - one that lets the user solve for the starting amount, the amount to invest, the interest rate, the term required to reach a goal or the future value; or if you need to pick a different investment frequency, then you may want to try the calculator located here: <b>https://AccurateCalculators.com/savings-calculator</b></p>', '__TEXT_DOMAIN__'),
			// TRANSLATORS: report's personalized title page
			s601g: wp.i18n.__('Your Personalized Savings Schedule',	'__TEXT_DOMAIN__'),
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
