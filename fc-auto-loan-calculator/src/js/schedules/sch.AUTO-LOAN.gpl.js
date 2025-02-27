/**
 * @preserve Copyright 2016-2025 Pine Grove Software, LLC
 * AccurateCalculators.com
 * pine-grove.com
 * sch.AUTO-LOAN.gpl.js
 */

// localization conventions
import { Locales } from '../common/locales.gpl.js';

// AutoLoanCalculatorStrings
import { AutoLoanCalculatorStrings as autoLoanStrings } from '../strings/strs.AUTO-LOAN.gpl.js';

import { StringBuffer as sb } from '../common/stringBuffer.gpl.js';

// utility functions
import { Utils } from '../common/utils.gpl.js';

// calculations
import { AutoLoanCalculation as alc } from '../calculations/eq.AUTO-LOAN.gpl.js';

// constants
import { Globals } from '../common/globals.gpl.js';


const ROW_TYPE = 2,
	PER_STR = 3,
	DATE_STR = 4,
	CF = 5, // cash flow
	INT = 8,
	PRIN = 9,
	BAL = 11,
	SCHEDULE_INDEX = 0;

export class HtmlAutoLoanSchedule {

	//
	// create HTML schedule
	//
	static formatLoanSchedule (schedule) {
		let L, i, strReportPage, strSchedule, rate, pmt, interest, prin, bal, num, freq, strDate, strDateFirst, strDateLast, periodYear, totalInterest, totalPI, transaction, roundingMsg, website, strUnadjustedBal;

		website = Globals.COPYRIGHT_HOLDER_DOMAIN;

		// print preview
		this.strOpenTag = '<!DOCTYPE html>';
		this.strHTMLHead = '<html lang="en"><head><meta charset="utf-8"/><meta name="viewport" content="width=device-width,initial-scale=1">';

		// Your Personalized Loan Schedule
		this.strHTMLTitle = '<title>' + autoLoanStrings.strs.s2011 + '</title>';

		// note screen styles
		this.strStyleScreen = '<style type="text/css" media="screen">';
		this.strStyleScreen += 'html,body{margin:0;padding:0;color:#333;height:100%;width:100%;min-width:320px;font-family:monospace; font-size:8px; font-weight:400; overflow: hidden; -webkit-user-select: none; user-select: none; } body{overflow-y: scroll} tr {line-height: 1.2} @media (min-width: 569px) {html,body{font-size:12px}} @media (min-width: 768px) {html,body{font-size:14px}} .label {font-family: "Roboto", sans-serif;} .medium {font-weight: 600; font-style: italic} .bold {font-weight: 700} .center {text-align: center} .left {text-align: left} .right {text-align: right} .wrapper {padding:0; width:100%} table {width: 90%; margin: 0 auto 20px auto; border-collapse:collapse;} #rpt tbody tr.totals, #rpt tbody tr:nth-child(even).totals {background-color: transparent;} #rpt tbody tr:nth-child(even) {background: #FCFFFF;} #rpt tbody tr:hover, #rpt tbody tr:hover.totals {background: #303E64; color: #fff; font-weight:400} #rpt tbody::after {content: ""; display: block; height: 29px;} .cHead {background: #303E64; color: #fff} td {padding: 5px 5px;} .spcr {width: 2%} .hCell {width: 24%} .rpt_title {width: 100%; font-size: 120%} .rpt_footer {width: 100%; font-style: italic; font-size: 90%;}  .btn {display: inline-block; margin-bottom: 0; font-weight: normal; vertical-align: middle; touch-action: manipulation; cursor: pointer; background-image: none; border: 1px solid transparent; white-space: nowrap; padding: 6px 12px; font-size: 100%; line-height: 1.42857143; border-radius: 4px; } .btn-primary {color: #fff; background-color: #303e64; border-color: #283353;} .btn-primary:focus, .btn-primary.focus {color: #ffffff; background-color: #1f2942; border-color: #000000; } .btn-primary:hover {color: #ffffff; background-color: #1f2942; border-color: #141a29; } .btn-primary:active, .btn-primary.active, .open > .dropdown-toggle.btn-primary { color: #ffffff; background-color: #1f2942; border-color: #141a29;} .btn-row {padding: 15px 0 5px; width:100%; margin-bottom:20px} td.brder {border-top: 1px solid #303E64} #btnPrint {margin-right:15px} #btnCopy {margin-left:15px} tr.empty {background-color: transparent !important; color:#333 !important;} .i {font-style: italic} .altColor{color:#00c} .rpt6col {width: 19%;} .rpt6colvnarrow {width: 7%;} .rpt6colnarrow {width: 15%;} .rpt6colwide {width: 21%;} .rpt7col {width: 16%;} .rpt7colvnarrow {width: 7%;} .rpt7colnarrow {width: 9%;} .rpt7colwide {width: 20%;} .rpt9col {width: 11%;} .rpt9colvnarrow {width: 6%;} .rpt9colnarrow {width: 11%;} .rpt9colwide {width: 13%;}  #rpt_page {width:82%; margin: 2rem auto; clear:both} #rpt_page .title {width: 100%; font-size: 120%; margin-top:2rem; margin-bottom:6rem; text-align:center} #rpt_page .row {margin-bottom:1rem} #rpt_page .left_col {width: 40%; float:left; text-align:left} #rpt_page .right_col {width: 60%; float:right; text-align:right} #rpt_page .top_group {margin-bottom:40rem;} .page_end {position:relative; margin-top:10in} .pg-brk {clear: both; page-break-after: always} .footer-msg {width: 90%; margin: 0 auto 20px auto} .fr {float:right} ';

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
			rate = Utils.formatNumericValueWithSym(alc.summary.nominalRate[SCHEDULE_INDEX] * 100, Locales.rateConventions, Locales.rateConventions.precision);


			// [KT] - 11/11/2016 - array index = 1 may not be first payment. Might be total rows after initial loan event in Dec.
			i = 1;
			do {
				transaction = schedule[i]; // first cash flow
				strDateFirst = transaction[DATE_STR];
				i += 1;
			} while (strDateFirst === null && i < schedule.length);


			pmt = Utils.formatNumericValueWithSym(transaction[CF], Locales.moneyConventions);
			freq = autoLoanStrings.strs.s416a; // monthly

			transaction = schedule[schedule.length - 1]; // running total details
			totalInterest = Utils.formatNumericValueWithSym(transaction[INT], Locales.moneyConventions);
			totalPI = Utils.formatNumericValueWithSym(transaction[CF], Locales.moneyConventions);
			// last cash flow details
			strDateLast = alc.summary.lastCreditDateStr[SCHEDULE_INDEX];
			num = Utils.formatNumericValueWithSym(alc.summary.totalNDebits[SCHEDULE_INDEX], Locales.numConventions, 0);

			strUnadjustedBal = Utils.formatNumericValueWithSym(alc.summary.unadjustedBalance, Locales.moneyConventions);
			if (alc.summary.unadjustedBalance < 0.0) {
				// Last payment amount decreased by ' + strUnadjustedBal + ' due to rounding
				roundingMsg = autoLoanStrings.strs.s202 + ' ' + strUnadjustedBal + ' ' + autoLoanStrings.strs.s203;
			} else if (alc.summary.unadjustedBalance > 0.0) {
				// Last payment amount increased by ' + strUnadjustedBal + ' due to rounding
				roundingMsg = autoLoanStrings.strs.s204 + ' ' + strUnadjustedBal + ' ' + autoLoanStrings.strs.s203;
			} else {
				roundingMsg = '';
			}

			strSchedule.append('<table>');
			strSchedule.append('<thead>');
			// Loan Summary
			strSchedule.append('<tr class="label rpt_title center bold i"><td colspan="6">' + autoLoanStrings.strs.s2051 + '</td></tr>');
			strSchedule.append('<tr class="empty"><td colspan="6"></td></tr>');
			strSchedule.append('</thead>');

			strSchedule.append('<tbody>');
			// strSchedule.append('<tr><td class="label hCell">Loan Amount:</td><td class="right">' + bal + '</td><td class="spcr">&nbsp;</td><td class="spcr">&nbsp;</td><td class="label hCell">Number of Payments:</td><td class="right">' + num + '</td></tr>');
			strSchedule.append('<tr><td class="label hCell">' + autoLoanStrings.strs.s208 + ':</td><td class="right">' + bal + '</td><td class="spcr">&nbsp;</td><td class="spcr">&nbsp;</td><td class="label hCell">' + autoLoanStrings.strs.s209 + ':</td><td class="right">' + num + '</td></tr>');

			// strSchedule.append('<tr><td class="label hCell">Annual Interest Rate:</td><td class="right">' + rate + '</td><td class="spcr">&nbsp;</td><td class="spcr">&nbsp;</td><td class="label hCell">Periodic Payment:</td><td class="right">' + pmt + '</td></tr>');
			strSchedule.append('<tr><td class="label hCell">' + autoLoanStrings.strs.s210 + ':</td><td class="right">' + rate + '</td><td class="spcr">&nbsp;</td><td class="spcr">&nbsp;</td><td class="label hCell">' + autoLoanStrings.strs.s211 + ':</td><td class="right">' + pmt + '</td></tr>');

			// strSchedule.append('<tr><td class="label hCell">Loan Date:</td><td class="right">' + strDate + '</td><td class="spcr">&nbsp;</td><td class="spcr">&nbsp;</td><td class="label hCell">1st Payment Due:</td><td class="right">' + strDateFirst + '</td></tr>');
			strSchedule.append('<tr><td class="label hCell">' + autoLoanStrings.strs.s212 + ':</td><td class="right">' + strDate + '</td><td class="spcr">&nbsp;</td><td class="spcr">&nbsp;</td><td class="label hCell">' + autoLoanStrings.strs.s213 + ':</td><td class="right">' + strDateFirst + '</td></tr>');

			// strSchedule.append('<tr><td class="label hCell">Payment Frequency:</td><td class="right">' + freq + '</td><td class="spcr">&nbsp;</td><td class="spcr">&nbsp;</td><td class="label hCell">Last Payment Due:</td><td class="right">' + strDateLast + '</td></tr>');
			strSchedule.append('<tr><td class="label hCell">' + autoLoanStrings.strs.s214 + ':</td><td class="right">' + freq + '</td><td class="spcr">&nbsp;</td><td class="spcr">&nbsp;</td><td class="label hCell">' + autoLoanStrings.strs.s215 + ':</td><td class="right">' + strDateLast + '</td></tr>');

			// strSchedule.append('<tr><td class="label hCell">Total Interest Due:</td><td class="right">' + totalInterest + '</td><td class="spcr">&nbsp;</td><td class="spcr">&nbsp;</td><td class="label hCell">Total All Payments:</td><td class="right">' + totalPI + '</td></tr>');
			strSchedule.append('<tr><td class="label hCell">' + autoLoanStrings.strs.s216 + ':</td><td class="right">' + totalInterest + '</td><td class="spcr">&nbsp;</td><td class="spcr">&nbsp;</td><td class="label hCell">' + autoLoanStrings.strs.s217 + ':</td><td class="right">' + totalPI + '</td></tr>');

			strSchedule.append('</tbody>');
			strSchedule.append('</table>');

			//c: cell
			strSchedule.append('<table id="rpt">');
			strSchedule.append('<thead>');
			// strSchedule.append('<tr class="label rpt_title center bold i"><td colspan="6">Payment Schedule</td></tr>');
			strSchedule.append('<tr class="label rpt_title center bold i"><td colspan="6">' + autoLoanStrings.strs.s218 + '</td></tr>');
			strSchedule.append('<tr class="empty"><td colspan="6"></td></tr>');

			// strSchedule.append('<tr class="label cHead"><td class="rpt6colvnarrow">#/Year</td><td class="rpt6colnarrow center">Date</td><td class="rpt6col right">Payment</td><td class="rpt6col right">Interest</td><td class="rpt6col right">Principal</td><td class="rpt6colwide right">Balance</td></tr>');
			strSchedule.append('<tr class="label cHead"><td class="rpt6colvnarrow">#/' + autoLoanStrings.strs.s219 + '</td><td class="rpt6colnarrow center">' + autoLoanStrings.strs.s220 + '</td><td class="rpt6col right">' + autoLoanStrings.strs.s221 + '</td><td class="rpt6col right">' + autoLoanStrings.strs.s222 + '</td><td class="rpt6col right">' + autoLoanStrings.strs.s223 + '</td><td class="rpt6colwide right">' + autoLoanStrings.strs.s224 + '</td></tr>');

			strSchedule.append('</thead>');

			strSchedule.append('<tbody>');

			// don't skip header row
			for (i = 0; i <= L; i += 1) {
				transaction = schedule[i];
				if (i > 0) {
					periodYear = transaction[PER_STR];
				} else {
					// Loan:
					periodYear = autoLoanStrings.strs.s232 + ':';
				}

				strDate = transaction[DATE_STR];
				pmt = Utils.formatNumericValueWithSym(transaction[CF], Locales.numConventions);
				interest = Utils.formatNumericValueWithSym(transaction[INT], Locales.numConventions);
				prin = Utils.formatNumericValueWithSym(transaction[PRIN], Locales.numConventions);
				bal = Utils.formatNumericValueWithSym(transaction[BAL], Locales.numConventions);

				if (transaction[ROW_TYPE] === Globals.ROW_TYPES.DETAIL) {
					strSchedule.append('<tr><td>' + periodYear + '</td><td class="center">' + strDate + '</td><td class="right">' + pmt + '</td><td class="right">' + interest + '</td><td class="right">' + prin + '</td><td class="right">' + bal + '</td></tr>');


				} else if (transaction[ROW_TYPE] === Globals.ROW_TYPES.ANNUAL_TOTALS) {
					// with line
					strSchedule.append('<tr class="totals medium"><td class="right" colspan="2">' + periodYear + '</td><td class="right brder">' + pmt + '</td><td class="right brder">' + interest + '</td><td class="right brder">' + prin + '</td><td></td></tr>');

				} else {
					strSchedule.append('<tr class="totals medium"><td class="right" colspan="2">' + periodYear + '</td><td class="right">' + pmt + '</td><td class="right">' + interest + '</td><td class="right">' + prin + '</td><td></td></tr>');

					// empty row
					strSchedule.append('<tr class="empty"><td colspan="6"></td></tr>');

				}

			} // for

			strSchedule.append('</tbody>');
			strSchedule.append('</table>');
			strSchedule.append('<div class="footer-msg"><span>' + roundingMsg + '</span><span class="fr">' + website + '</span></div>');

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

	}; // formatLoanSchedule
}
