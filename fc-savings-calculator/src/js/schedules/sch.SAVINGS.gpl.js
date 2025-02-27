/**
 * @preserve Copyright 2016-2025 Pine Grove Software, LLC
 * AccurateCalculators.com
 * pine-grove.com
 * sch.SAVINGS.gpl.js
 */

// localization conventions
import { Locales } from '../common/locales.gpl.js';

// SavingsCalculatorStrings
import { SavingsCalculatorStrings as savingsStrings } from '../strings/strs.SAVINGS.gpl.js';

import { StringBuffer as sb } from '../common/stringBuffer.gpl.js';

// utility functions
import { Utils } from '../common/utils.gpl.js';

// calculations
import { SavingsCalculation as sc } from '../calculations/eq.SAVINGS.gpl.js';

// constants
import { Globals } from '../common/globals.gpl.js';

const ROW_TYPE = 2,
	PER_STR = 3,
	DATE_STR = 4,
	CREDIT = 6,
	INT = 8,
	NET = 10, // net change
	BAL = 11,
	YEAR = 13,
	SCHEDULE_INDEX = 0;

export class HtmlSavingsSchedule {

	static formatRetirementSchedule (schedule, summary) {
		let L, i, strReportPage, strSchedule, rate, dep, interest, netChange, bal, totalCredits, totalNCredits, strDate, strDateLast, periodYear, totalInterest, transaction, years, website;

		website = Globals.COPYRIGHT_HOLDER_DOMAIN;

		// print preview
		this.strOpenTag = '<!DOCTYPE html>';
		this.strHTMLHead = '<html lang="en"><head><meta charset="utf-8"/><meta name="viewport" content="width=device-width,initial-scale=1">';

		// Your Personalized Loan Schedule
		this.strHTMLTitle = '<title>' + savingsStrings.strs.s2017 + '</title>';

		// note screen styles
		this.strStyleScreen = '<style type="text/css" media="screen">';
		this.strStyleScreen += 'html,body{margin:0;padding:0;color:#333;height:100%;width:100%;min-width:320px;font-family:monospace; font-size:8px; font-weight:400; overflow: hidden; -webkit-user-select: none; user-select: none; } body{overflow-y: scroll} tr {line-height: 1.2} @media (min-width: 569px) {html,body{font-size:12px}} @media (min-width: 768px) {html,body{font-size:14px}} .label {font-family: "Roboto", sans-serif;} .medium {font-weight: 600; font-style: italic} .bold {font-weight: 700} .center {text-align: center} .left {text-align: left} .right {text-align: right} .wrapper {padding:0; width:100%} table {width: 90%; margin: 0 auto 20px auto; border-collapse:collapse;} #rpt tbody tr.totals, #rpt tbody tr:nth-child(even).totals {background-color: transparent;} #rpt tbody tr:nth-child(even) {background: #FCFFFF;} #rpt tbody tr:hover, #rpt tbody tr:hover.totals {background: #303E64; color: #fff; font-weight:400} #rpt tbody::after {content: ""; display: block; height: 29px;} .cHead {background: #303E64; color: #fff} td {padding: 5px 5px;} .rpt_title {width: 100%; font-size: 120%} .rpt_footer {width: 100%; font-style: italic; font-size: 90%;} tr.empty {background-color: transparent !important; color:#333 !important;} .i {font-style: italic} .altColor{color:#00c} .rpt6col {width: 19%;} .rpt6colvnarrow {width: 7%;} .rpt6colnarrow {width: 15%;} .rpt6colwide {width: 21%;} #rpt_page {width:82%; margin: 2rem auto; clear:both} #rpt_page .title {width: 100%; font-size: 120%; margin-top:2rem; margin-bottom:6rem; text-align:center} #rpt_page .row {margin-bottom:1rem} #rpt_page .left_col {width: 40%; float:left; text-align:left} #rpt_page .right_col {width: 60%; float:right; text-align:right} #rpt_page .top_group {margin-bottom:40rem;} .page_end {position:relative; margin-top:10in} .pg-brk {clear: both; page-break-after: always} .footer-msg {width: 90%; margin: 0 auto 20px auto} .fr {float:right} .label_col1, .label_col2 {width: 29%} .label_col2 {padding-left:0.5rem} .input_col1, .input_col2 {width: 19%} .input_col1 {padding-right:0.5rem} ';

		this.strStyleScreen += '</style>';
		this.strBodyOpen = '<body><div class="wrapper">';

		// closing div is for .wrapper
		this.strCloseTags = '</div></body></html>';

		strReportPage = new sb();
		strSchedule = new sb();
		L = schedule.length - 1;

		// [KT] 11/13/2016 - check for populated array
		if (schedule.length > 0) {
			transaction = schedule[0];
			strDate = transaction[DATE_STR];
			bal = Utils.formatNumericValueWithSym(transaction[BAL], Locales.moneyConventions);
			rate = Utils.formatNumericValueWithSym(sc.summary.nominalRate[SCHEDULE_INDEX] * 100, Locales.rateConventions, Locales.rateConventions.precision);

			transaction = schedule[schedule.length - 1]; // running total details
			totalCredits = Utils.formatNumericValueWithSym(transaction[CREDIT]);
			totalInterest = Utils.formatNumericValueWithSym(transaction[INT]);

			// last cash flow details
			strDateLast = summary.lastCreditDateStr[SCHEDULE_INDEX];
			totalNCredits = Utils.formatNumericValueWithSym(summary.totalNCredits[SCHEDULE_INDEX], Locales.numConventions, 0);

			// last detail row - first row
			years = schedule[L - 2][YEAR] - schedule[0][YEAR] + 1;

			strSchedule.append('<table>');
			strSchedule.append('<thead>');
			// Loan Summary
			strSchedule.append('<tr class="label rpt_title center bold i"><td colspan="6">' + savingsStrings.strs.s2057 + '</td></tr>');
			strSchedule.append('<tr class="empty"><td colspan="6"></td></tr>');
			strSchedule.append('</thead>');

			strSchedule.append('<tbody>');
			// strSchedule.append('<tr><td class="label hCell">Total Investment:</td><td class="right">' + totalCredits + '</td><td class="label hCell">Number of Investments:</td><td class="right">' + totalNCredits + '</td></tr>');
			strSchedule.append('<tr><td class="label label_col1">' + savingsStrings.strs.s2065 + ':</td><td class="right input_col1">' + totalCredits + '</td><td class="label label_col2">' + savingsStrings.strs.s207 + ':</td><td class="right input_col2">' + totalNCredits + '</td></tr>');

			// strSchedule.append('<tr><td class="label hCell">Interest Rate:</td><td class="right">' + rate + '</td><td class="label hCell">Total Gain:</td><td class="right">' + totalInterest + '</td></tr>');
			strSchedule.append('<tr><td class="label label_col1">' + savingsStrings.strs.s242 + ':</td><td class="right input_col1">' + rate + '</td><td class="label label_col2">' + savingsStrings.strs.s209 + ':</td><td class="right input_col2">' + totalInterest + '</td></tr>');

			// strSchedule.append('<tr><td class="label hCell">Last Cash Flow Date:</td><td class="right">' + strDateLast + '</td><td class="label hCell">Years:</td><td class="right">' + years + '</td></tr>');
			strSchedule.append('<tr><td class="label label_col1">' + savingsStrings.strs.s210 + ':</td><td class="right input_col1">' + strDateLast + '</td><td class="label label_col2">' + savingsStrings.strs.s211 + ':</td><td class="right input_col2">' + years + '</td></tr>');

			strSchedule.append('</tbody>');
			strSchedule.append('</table>');

			//c: cell
			strSchedule.append('<table id="rpt">');
			strSchedule.append('<thead>');
			// strSchedule.append('<tr class="label rpt_title center bold i"><td colspan="6">Payment Schedule</td></tr>');
			strSchedule.append('<tr class="label rpt_title center bold i"><td colspan="6">' + savingsStrings.strs.s218 + '</td></tr>');
			strSchedule.append('<tr class="empty"><td colspan="6"></td></tr>');

			// strSchedule.append('<tr class="label cHead"><td class="rpt6colvnarrow">#/Year</td><td class="rpt6colnarrow center">Date</td><td class="rpt6col right">Payment</td><td class="rpt6col right">Interest</td><td class="rpt6col right">Principal</td><td class="rpt6colwide right">Balance</td></tr>');
			strSchedule.append('<tr class="label cHead"><td class="rpt6colvnarrow">#/' + savingsStrings.strs.s219 + '</td><td class="rpt6colnarrow center">' + savingsStrings.strs.s220 + '</td><td class="rpt6col right">' + savingsStrings.strs.s221 + '</td><td class="rpt6col right">' + savingsStrings.strs.s222 + '</td><td class="rpt6col right">' + savingsStrings.strs.s223 + '</td><td class="rpt6colwide right">' + savingsStrings.strs.s224 + '</td></tr>');

			strSchedule.append('</thead>');

			strSchedule.append('<tbody>');

			// don't skip header row
			for (i = 0; i <= L; i += 1) {
				transaction = schedule[i];

				periodYear = transaction[PER_STR];

				strDate = transaction[DATE_STR];
				dep = Utils.formatNumericValueWithSym(transaction[CREDIT], Locales.numConventions, Locales.moneyConventions.precision);
				interest = Utils.formatNumericValueWithSym(transaction[INT], Locales.numConventions, Locales.moneyConventions.precision);
				netChange = Utils.formatNumericValueWithSym(transaction[NET], Locales.numConventions, Locales.moneyConventions.precision);
				bal = Utils.formatNumericValueWithSym(transaction[BAL], Locales.numConventions, Locales.moneyConventions.precision);

				if (transaction[ROW_TYPE] === Globals.ROW_TYPES.DETAIL) {
					strSchedule.append('<tr><td>' + periodYear + '</td><td class="center">' + strDate + '</td><td class="right">' + dep + '</td><td class="right">' + interest + '</td><td class="right">' + netChange + '</td><td class="right">' + bal + '</td></tr>');

				} else if (transaction[ROW_TYPE] === Globals.ROW_TYPES.ANNUAL_TOTALS) {
					// with line
					strSchedule.append('<tr class="totals medium"><td class="right" colspan="2">' + periodYear + '</td><td class="right brder">' + dep + '</td><td class="right brder">' + interest + '</td><td class="right brder">' + netChange + '</td><td></td></tr>');

				} else {
					strSchedule.append('<tr class="totals medium"><td class="right" colspan="2">' + periodYear + '</td><td class="right">' + dep + '</td><td class="right">' + interest + '</td><td class="right"></td><td></td></tr>');

					// empty row
					strSchedule.append('<tr class="empty"><td colspan="6"></td></tr>');
				}
			} // for

			strSchedule.append('</tbody>');
			strSchedule.append('</table>');
			// note, no rounding message for this schedule
			strSchedule.append('<div class="footer-msg"><span></span><span class="fr">' + website + '</span></div>');
		} // L !== 0

		// build report
		strReportPage.append(this.strOpenTag);
		strReportPage.append(this.strHTMLHead);
		strReportPage.append(this.strHTMLTitle);
		strReportPage.append(this.strStyleScreen);
		strReportPage.append(this.strBodyOpen);
		strReportPage.append(strSchedule.toString());
		strReportPage.append(this.strCloseTags);

		return strReportPage.toString(); // a schedule formatted as a valid web page

	}; // formatRetirementSchedule
}
