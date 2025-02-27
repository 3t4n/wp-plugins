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
 * strs.RETIRE-SAVINGS.gpl.js
 */

// to check for different values assigned to the same variable across different strs.*.gpl.js files, run:
// $ python src/py/string-var-conflicts.py

export class RetireSavingsCalculatorStrings {

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
			// from eq.RETIRE-SAVINGS-WIDGET.gpl.js
			// s100: wp.i18n.__('Internal limit reached. Balance exceeds +/- 99 trillion.', '__TEXT_DOMAIN__'),
			s101: wp.i18n.__('YTD', '__TEXT_DOMAIN__'),
			s102: wp.i18n.__('Running Totals', '__TEXT_DOMAIN__'),
			// from sc.RETIRE-SAVINGS-WIDGET.gpl.js
			s2016: wp.i18n.__('Your Personalized Retirement Schedule', '__TEXT_DOMAIN__'),
			// s202: wp.i18n.__('Last payment amount decreased by', '__TEXT_DOMAIN__'),
			// s203: wp.i18n.__('due to rounding', '__TEXT_DOMAIN__'),
			// s204: wp.i18n.__('Last payment amount increased by', '__TEXT_DOMAIN__'),
			s2056: wp.i18n.__('Retirement Plan Summary', '__TEXT_DOMAIN__'),
			s2066: wp.i18n.__('Total Investment', '__TEXT_DOMAIN__'),
			s207: wp.i18n.__('Number of Investments', '__TEXT_DOMAIN__'),
			s208: wp.i18n.__('Return on Investment (ROI)', '__TEXT_DOMAIN__'),
			s209: wp.i18n.__('Total Gain', '__TEXT_DOMAIN__'),
			s2095: wp.i18n.__('Gain on Investment', '__TEXT_DOMAIN__'),
			s210: wp.i18n.__('Last Cash Flow Date', '__TEXT_DOMAIN__'),
			s211: wp.i18n.__('Years', '__TEXT_DOMAIN__'),
			// s212: wp.i18n.__('Loan Date', '__TEXT_DOMAIN__'),
			// s213: wp.i18n.__('1st Payment Due', '__TEXT_DOMAIN__'),
			// s214: wp.i18n.__('Payment Frequency', '__TEXT_DOMAIN__'),
			// s215: wp.i18n.__('Last Payment Due', '__TEXT_DOMAIN__'),
			// s216: wp.i18n.__('Total Interest Due', '__TEXT_DOMAIN__'),
			// s217: wp.i18n.__('Total All Payments', '__TEXT_DOMAIN__'),
			s218: wp.i18n.__('Investment Schedule', '__TEXT_DOMAIN__'),
			s219: wp.i18n.__('Year', '__TEXT_DOMAIN__'),
			s220: wp.i18n.__('Date', '__TEXT_DOMAIN__'),
			s221: wp.i18n.__('Investment', '__TEXT_DOMAIN__'),
			s222: wp.i18n.__('Investment Gain', '__TEXT_DOMAIN__'),
			s223: wp.i18n.__('Net Change', '__TEXT_DOMAIN__'),
			s224: wp.i18n.__('Balance', '__TEXT_DOMAIN__'),
			// s225: wp.i18n.__('Calculation method: Normal', '__TEXT_DOMAIN__'),
			s226: wp.i18n.__('Annual Investment', '__TEXT_DOMAIN__'),
			s227: wp.i18n.__('Annual Interest', '__TEXT_DOMAIN__'),
			s2275: wp.i18n.__('Annual Investment Gain', '__TEXT_DOMAIN__'),
			s228: wp.i18n.__('Change in Balance', '__TEXT_DOMAIN__'),
			s229: wp.i18n.__('Annual Investment and Interest Totals', '__TEXT_DOMAIN__'),
			s230: wp.i18n.__('Accumulated Investment and Interest', '__TEXT_DOMAIN__'),
			s231: wp.i18n.__('Amount Invested & Interest as Percentage of Total Value', '__TEXT_DOMAIN__'),
			// s232: wp.i18n.__('Loan', '__TEXT_DOMAIN__'),
			s233: wp.i18n.__('"Net Change" is change from prior period i.e. prior balance plus investment, plus gain on investment (interest).', '__TEXT_DOMAIN__'),
			s234: wp.i18n.__('Running Investment', '__TEXT_DOMAIN__'),
			s235: wp.i18n.__('Running Interest', '__TEXT_DOMAIN__'),
			s2355: wp.i18n.__('Running Investment Gain', '__TEXT_DOMAIN__'),
			s236: wp.i18n.__('Total Deposits', '__TEXT_DOMAIN__'),
			s237: wp.i18n.__('Total Interest Earned', '__TEXT_DOMAIN__'),
			s238: wp.i18n.__('Total Value', '__TEXT_DOMAIN__'),
			s239: wp.i18n.__('Pct. of Total', '__TEXT_DOMAIN__'),
			s240: wp.i18n.__('Your Personalized Cash Flow Schedule', '__TEXT_DOMAIN__'),
			// interface.SHARED-WIDGET.gpl.js has no strings
			// interface.RETIRE-SAVINGS-WIDGET.gpl.js
			s4016: wp.i18n.__('Current age must be greater than 0.', '__TEXT_DOMAIN__'),
			// s402: wp.i18n.__('There are unknown values.', '__TEXT_DOMAIN__'),
			// s403: wp.i18n.__('Please make sure all values are entered.', '__TEXT_DOMAIN__'),
			// s404: wp.i18n.__('"Current Retirement Savings" can be 0.', '__TEXT_DOMAIN__'),
			// s405: wp.i18n.__('Your retirement age would be after age 100.', '__TEXT_DOMAIN__'),
			// s406: wp.i18n.__('Increase investment amount.', '__TEXT_DOMAIN__'),
			// s407: wp.i18n.__('Increase assumed rate of return.', '__TEXT_DOMAIN__'),
			// s408: wp.i18n.__('Increase current retirement savings.', '__TEXT_DOMAIN__'),
			// s409: wp.i18n.__('Or do any combination of all three.', '__TEXT_DOMAIN__'),
			s410f: wp.i18n.__('"Retirement Age" must be greater than "Current Age"', '__TEXT_DOMAIN__'),
			s411f: wp.i18n.__('Retirement Savings Calculator — calculate savings required to reach retirement goal', '__TEXT_DOMAIN__'),
			s412f: wp.i18n.__('<p>This calculator easily answers the question "Given the value of my current investments how much do I need to save each month to reach my retirement goal?"</p>', '__TEXT_DOMAIN__'),
			s413f: wp.i18n.__('<p>The user enters their "Current Age", their expected "Retirement Age", the "Annual Interest Rate (ROR)" (annualized Rate-of-Return one expects to earn) and "Amount At Retirement" (the goal amount).</p>', '__TEXT_DOMAIN__'),
			s414f: wp.i18n.__('<p class="tail">The calculator quickly calculates the required monthly investment amount and creates an investment schedule plus a set of charts that will help the user see the relationship between the amount invested and the return on the investment.</p>', '__TEXT_DOMAIN__'),
			s415f: wp.i18n.__('<p class="small" style="font-size: 85%; line-height: 1.5; color:red; user-select: text">If you need a more advanced "Retirement Calculator" - one that calculates many more unknowns and one that calculates assuming retirement <b>income</b> and not a final lump sum then try the calculator located here: <b>https://AccurateCalculators.com/retirement-calculator</b></p>', '__TEXT_DOMAIN__'),
			s416f: wp.i18n.__('', '__TEXT_DOMAIN__', '__TEXT_DOMAIN__'),
			s417f: wp.i18n.__('<p class="small" style="font-size: 85%; line-height: 1.5; color:red; user-select: text">Need more options including the ability to solve for other unknowns? Ability to create, in one schedule, the pre-retirement and post-retirement cashflow? Print the chart? Export to MS Word&trade; (.docx) or MS Excel&trade; (.xlsx) files? Please visit, <b>https://AccurateCalculators.com/retirement-calculator</b></p>', '__TEXT_DOMAIN__', '__TEXT_DOMAIN__'),
			// TRANSLATORS: report's personalized title page
			s601f: wp.i18n.__('Your Personalized Retirement Schedule',	'__TEXT_DOMAIN__'),
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
