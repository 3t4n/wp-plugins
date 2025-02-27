/**
 * @preserve Copyright 2024 Pine Grove Software, LLC
 * AccurateCalculators.com
 * pine-grove.com
 * eq.RETIRE-SAVINGS.gpl.js
 */

import { RetireSavingsCalculatorStrings as retireSavingsStrings } from '../strings/strs.RETIRE-SAVINGS.gpl.js';
// global constants
import { Globals } from '../common/globals.gpl.js';
// date utility functions
import { DateMath } from '../common/dateMath.gpl.js';
// other utility functions
import { Utils } from '../common/utils.gpl.js';


const
	SCHEDULE_INDEX = 0,
	DECM = 12, // december, NOT 0 based. 1..12
	INDEX_ADJUST = 3, // adjustment to remove last 2 total rows to get to last detail row

	// index (columns) values for 2 dimensional schedule array
	EVENT_DATE = 0, // YYYYMMDD, used for sorting
	LOAN_NO = 1,
	ROW_TYPE = 2,
	PER_STR = 3,
	DATE_STR = 4,
	CF = 5, // cash flow
	CREDIT = 6,
	DEBIT = 7,
	INT = 8,
	PRIN = 9,
	NET = 10, // net change
	BAL = 11,
	MONTH = 12,
	YEAR = 13;

export class RetireSavingsCalculation {

	/**
	 * Parameters for investment calculations.
	 * (not all properties always used by all time value of money calculations)
	 * @static
	 * @memberof RetireSavingsCalculation
	 * @property {number|null} currentAge
	 * @property {number|null} retireAge
	 * @property {number|null} nominalRate - The nominal annual interest rate for the loan.
	 * @property {number|null} n - The number of cash flow periods (the term).
	 * @property {number|null} cf - The cash flow amount per period.
	 * @property {number|null} pv - The present value of the loan.
	 * @property {number|null} fv - The future value of the loan.
	 * @property {string|null} pmtMthd - The payment method. When payments are made. At the start or end of each period.
	 * @property {string|null} amortMthd - The amortization method used for the loan.
	 * @property {number|null} pmtFreq - The ordinal value i.e. PMT_FREQUENCY.
	 * @property {number|null} cmpFreq - The ordinal value i.e. CMP_FREQUENCY.
	 * @property {Date|null} oDate - The origination or closing date of the loan.
	 * @property {Date|null} fDate - The first payment or cash flow date.
	 * @property {Date|null} lDate - The last payment or cash flow date.
	 */
	static retirement_params = {
		currentAge: null,
		retireAge: null,
		nominalRate: null,
		n: null,
		cf: null,
		pv: null,
		fv: null,
		pmtMthd: null,
		amortMthd: null,
		pmtFreq: null,
		cmpFreq: null,
		oDate: null,
		fDate: null,
		lDate: null
	};


	/**
	 * Summary details about cash flow.
	 *
	 * This object provides a comprehensive summary of various financial parameters related to cash flows,
	 * including debit and credit dates, totals, interest, and other relevant metrics.
	 * Exported values for schedule & charts
	 *
	 * @static
	 * @memberof AutoLoanCalculation
	 * @property {number[]} cf - Array of cash flow amounts.
	 * @property {string} firstDebitDateStr - The date of the first loan advance (debit) as a string.
	 * @property {string} firstCreditDateStr - The date of the first cash flow/payment (credit) as a string.
	 * @property {string[]} lastDebitDateStr - Array of strings representing the last debit dates.
	 * @property {string[]} lastCreditDateStr - Array of strings representing the last credit dates.
	 * @property {number[]} totalNDebits - Array of total numbers of debits (loan advances).
	 * @property {number[]} totalNCredits - Array of total numbers of credits (payments).
	 * @property {number[]} totalInterest - Array of total interest paid.
	 * @property {number[]} totalPmts - Array of total payments.
	 * @property {number[]} nominalRate - Array of nominal interest rates.
	 * @property {number} NYears - Number of years for the financial calculation.
	 * @property {number} pointsPct - Points percentage.
	 * @property {number} pointsMoney - Points in money.
	 * @property {number} amortMthd - Amortization method used.
	 * @property {number} DIY - Days-in-year used in calculations.
	 * @property {number} unadjustedBalance - The unadjusted cash flow balance.
	 * @property {number} cashFlowType - Type of cash flow, e.g., loan or investment.
	 * @property {number} xPmtTotal - Total of extra payments.
	 */
	static summary = {
		cf: [],
		firstDebitDateStr: '',
		firstCreditDateStr: '',
		lastDebitDateStr: [],
		lastCreditDateStr: [],
		totalNDebits: [],
		totalNCredits: [],
		totalInterest: [],
		totalPmts: [],
		nominalRate: [],
		NYears: 0,
		pointsPct: 0,
		pointsMoney: 0,
		amortMthd: 0,
		DIY: 0,
		unadjustedBalance: 0,
		cashFlowType: 0, // loan
		xPmtTotal: 0
	};


	static sourceScheduleData = [];

	/**
	 * Initialize the first and second cash flow dates.
	 * @param {Object} obj (required)
	 */
	static initDates (obj) {

		// set default dates
		// cash flow start date default to 1st of next month
		obj.oDate = DateMath.getFirstNextMonth(new Date());

		// if first cash flow date not initialized then set 1 month after start date
		if (obj.pmtMthd === Globals.PMT_METHOD.ARREARS) {
			obj.fDate = DateMath.getFirstNextMonth(obj.oDate);
		} else {
			obj.fDate = new Date(obj.oDate);
		}
	}


	/**
	 * Calculates the periodic rate based on the nominal rate and compounding frequency.
	 * @param {Object} obj - The input parameters for the rate calculation.
	 * @param {number} obj.nominalRate - The nominal annual interest rate.
	 * @param {number} obj.pmtFreq - The ordinal value of the payment frequency i.e. PMT_FREQUENCY.
	 * @returns {number} The periodic rate calculated by dividing the nominal rate by the compounding frequency.
	 */
	static calcPeriodicRate (obj) {
		return obj.nominalRate / Globals.PPY[obj.pmtFreq];
	}


	/**
	 * Calculates the interest amount for a given number of periods.
	 *
	 * The periodic rate is derived from the nominal annual rate divided by the number of payment or cash flow periods per year.
	 *
	 * @static
	 * @memberof calculation
	 * @param {number} periodicRate - The rate of interest per period.
	 * @param {number} pv - The principal amount.
	 * @param {number} periods - The number of periods.
	 * @returns {number} The interest amount for the specified number of periods.
	 */
	static calcInterest (periodicRate, pv, periods) {
		var s, fv;

		fv = pv;
		if (periodicRate !== 0) {
			// regular periods of the cash flow from fDate
			s = Math.pow(1 + periodicRate, periods);
			fv = fv * s;
		}
		return fv - pv; // interest

	} // calcInterest


	/**
	 * insertSubTotals()
	 * Insert subtotals into schedule based on declared fiscal year end
	 * Last month of year, i.e. before total rows 1..12
	 */
	static insertSubTotals (schedule) {
		var i, ytdCF = 0.0, ytdCredit = 0.0, ytdDebit = 0.0, ytdInterest = 0.0, ytdPrincipal = 0.0, ytdNetChange = 0.0, ytdXPmt = 0.0, runningCF = 0.0, runningCredit = 0.0, runningDebit = 0.0, runningInterest = 0.0, runningPrincipal = 0.0, runningNetChange = 0.0, runningXPmt = 0.0, totals = [];

		i = 0;
		do {

			i += 1; // totals can only be inserted after array row 1

			// note, pick up values from last row after loop exit
			ytdCF = Utils.roundNumber(schedule[i - 1][CF] + ytdCF);
			ytdCredit = Utils.roundNumber(schedule[i - 1][CREDIT] + ytdCredit);
			ytdDebit = Utils.roundNumber(schedule[i - 1][DEBIT] + ytdDebit);
			ytdInterest = Utils.roundNumber(schedule[i - 1][INT] + ytdInterest);
			ytdPrincipal = Utils.roundNumber(schedule[i - 1][PRIN] + ytdPrincipal);
			ytdNetChange = Utils.roundNumber(schedule[i - 1][NET] + ytdNetChange);
			runningCF = Utils.roundNumber(schedule[i - 1][CF] + runningCF);
			runningCredit = Utils.roundNumber(schedule[i - 1][CREDIT] + runningCredit);
			runningDebit = Utils.roundNumber(schedule[i - 1][DEBIT] + runningDebit);
			runningInterest = Utils.roundNumber(schedule[i - 1][INT] + runningInterest);
			runningPrincipal = Utils.roundNumber(schedule[i - 1][PRIN] + runningPrincipal);
			runningNetChange = Utils.roundNumber(schedule[i - 1][NET] + runningNetChange);
			if (schedule[i - 1][PER_STR].toUpperCase() === 'XPMT') {
				ytdXPmt = Utils.roundNumber(schedule[i - 1][PRIN] + ytdXPmt);
				runningXPmt = Utils.roundNumber(schedule[i - 1][PRIN] + runningXPmt);
			}

			// one test for when consecutive cash flows are in different calendar year and another test when cash flows are in same calendar year
			if (((schedule[i - 1][YEAR] !== schedule[i][YEAR] && (schedule[i - 1][MONTH] <= DECM || schedule[i][MONTH] > DECM))) || ((schedule[i - 1][YEAR] === schedule[i][YEAR] && (schedule[i - 1][MONTH] <= DECM && DECM < schedule[i][MONTH])))) {

				// insert the 2 total rows into schedule at fiscal year end
				totals = [];
				totals[EVENT_DATE] = schedule[i - 1][EVENT_DATE];
				totals[EVENT_DATE] = totals[EVENT_DATE].substr(0, totals[EVENT_DATE].length - INDEX_ADJUST) + '-99';
				totals[LOAN_NO] = SCHEDULE_INDEX;
				totals[ROW_TYPE] = Globals.ROW_TYPES.ANNUAL_TOTALS; // YTD total row marker
				// ' YTD:'
				totals[PER_STR] = schedule[i - 1][YEAR] + ' ' + retireSavingsStrings.strs.s101 + ':';
				totals[DATE_STR] = null;
				totals[CF] = ytdCF;
				totals[CREDIT] = ytdCredit;
				totals[DEBIT] = ytdDebit;
				totals[INT] = ytdInterest;
				totals[NET] = ytdNetChange;
				totals[PRIN] = ytdPrincipal;
				totals[BAL] = null;
				totals[MONTH] = DECM; // schedule[i - 1][MONTH];
				totals[YEAR] = schedule[i - 1][YEAR];

				// reset year-to-date
				ytdCF = 0;
				ytdCredit = 0.0;
				ytdDebit = 0.0;
				ytdInterest = 0.0; // schedule[0][INT];
				ytdPrincipal = 0.0;
				ytdNetChange = 0.0;
				ytdXPmt = 0.0;

				schedule.splice(i, 0, totals);
				i += 1; // increment for row just insert

				totals = [];
				totals[EVENT_DATE] = schedule[i - 1][EVENT_DATE];
				totals[EVENT_DATE] = totals[EVENT_DATE].substr(0, totals[EVENT_DATE].length - INDEX_ADJUST) + '-99';
				totals[LOAN_NO] = SCHEDULE_INDEX;
				totals[ROW_TYPE] = Globals.ROW_TYPES.RUNNING_TOTALS; // running total row marker
				// 'Running Totals:'
				totals[PER_STR] = retireSavingsStrings.strs.s102 + ':';
				totals[DATE_STR] = null;
				totals[CF] = runningCF;
				totals[CREDIT] = runningCredit;
				totals[DEBIT] = runningDebit;
				totals[INT] = runningInterest;
				totals[NET] = runningNetChange;
				totals[PRIN] = runningPrincipal;
				totals[BAL] = null;
				totals[MONTH] = DECM; // schedule[i - 1][MONTH];
				totals[YEAR] = schedule[i - 1][YEAR];

				schedule.splice(i, 0, totals);
				i += 1; // increment for row just insert
			}
		} while (i < schedule.length - 1);

		if (schedule[schedule.length - 1][ROW_TYPE] !== Globals.ROW_TYPES.RUNNING_TOTALS) {
			// pick up the values from the last row
			ytdCF = Utils.roundNumber(schedule[schedule.length - 1][CF] + ytdCF);
			ytdCredit = Utils.roundNumber(schedule[schedule.length - 1][CREDIT] + ytdCredit);
			ytdDebit = Utils.roundNumber(schedule[schedule.length - 1][DEBIT] + ytdDebit);
			ytdInterest = Utils.roundNumber(schedule[schedule.length - 1][INT] + ytdInterest);
			ytdPrincipal = Utils.roundNumber(schedule[schedule.length - 1][PRIN] + ytdPrincipal);
			ytdNetChange = Utils.roundNumber(schedule[schedule.length - 1][NET] + ytdNetChange);
			runningCF = Utils.roundNumber(schedule[schedule.length - 1][CF] + runningCF);
			runningCredit = Utils.roundNumber(schedule[schedule.length - 1][CREDIT] + runningCredit);
			runningDebit = Utils.roundNumber(schedule[schedule.length - 1][DEBIT] + runningDebit);
			runningInterest = Utils.roundNumber(schedule[schedule.length - 1][INT] + runningInterest);
			runningPrincipal = Utils.roundNumber(schedule[schedule.length - 1][PRIN] + runningPrincipal);
			runningNetChange = Utils.roundNumber(schedule[schedule.length - 1][NET] + runningNetChange);
			if (schedule[schedule.length - 1][PER_STR].toUpperCase() === 'XPMT') {
				ytdXPmt = Utils.roundNumber(schedule[schedule.length - 1][PRIN] + ytdXPmt);
				runningXPmt = Utils.roundNumber(schedule[schedule.length - 1][PRIN] + runningXPmt);
			}

			// add final set of total rows
			totals = [];
			totals[EVENT_DATE] = schedule[i][EVENT_DATE];
			// mangle the date
			totals[EVENT_DATE] = totals[EVENT_DATE].substr(0, totals[EVENT_DATE].length - INDEX_ADJUST) + '-99';
			totals[LOAN_NO] = SCHEDULE_INDEX;
			totals[ROW_TYPE] = Globals.ROW_TYPES.ANNUAL_TOTALS; // YTD total row marker
			// ' YTD:'
			totals[PER_STR] = schedule[schedule.length - 1][YEAR] + ' ' + retireSavingsStrings.strs.s101 + ':';
			totals[DATE_STR] = null;
			totals[CF] = ytdCF;
			totals[CREDIT] = ytdCredit;
			totals[DEBIT] = ytdDebit;
			totals[INT] = ytdInterest;
			totals[PRIN] = ytdPrincipal;
			totals[NET] = ytdNetChange;
			totals[BAL] = null;
			totals[MONTH] = DECM; // schedule[schedule.length - 1][MONTH];
			totals[YEAR] = schedule[schedule.length - 1][YEAR];
			schedule.push(totals);

			totals = [];
			totals[EVENT_DATE] = schedule[i][EVENT_DATE];
			// mangle the date
			totals[EVENT_DATE] = totals[EVENT_DATE].substr(0, totals[EVENT_DATE].length - INDEX_ADJUST) + '-99';
			totals[LOAN_NO] = SCHEDULE_INDEX;
			totals[ROW_TYPE] = Globals.ROW_TYPES.RUNNING_TOTALS; // running total row marker
			// 'Running Totals:'
			totals[PER_STR] = retireSavingsStrings.strs.s102 + ':';
			totals[DATE_STR] = null;
			totals[CF] = runningCF;
			totals[CREDIT] = runningCredit;
			totals[DEBIT] = runningDebit;
			totals[INT] = runningInterest;
			totals[PRIN] = runningPrincipal;
			totals[NET] = runningNetChange;
			totals[BAL] = null;
			totals[MONTH] = DECM;
			totals[YEAR] = schedule[schedule.length - 1][YEAR];
			schedule.push(totals);
		}

		this.summary.totalInterest[SCHEDULE_INDEX] = runningInterest;
		this.summary.totalPmts[SCHEDULE_INDEX] = runningCF;
		return null;

	} // insertSubTotals()


	/**
	 * initSavingsScheduleData()
	 * @param {Object} obj (required)
	 */
	static initSavingsScheduleData (obj, periodicRate) {
		const THIRD_CASH_FLOW = 2; // zero base
		let L, balance, deposit, withdrawal, cf, netChange, scheduledDateStr, periodYearString, nYears = 1, interestAccrued = 0, trans = [], priorDate = new Date(0), transDate = new Date(0), schedule = [];

		this.initDates(obj);

		this.summary.totalNDebits[SCHEDULE_INDEX] = 0; // withdrawal
		this.summary.totalNCredits[SCHEDULE_INDEX] = 0;
		this.summary.NYears = 0;
		this.summary.nominalRate[SCHEDULE_INDEX] = obj.nominalRate;
		this.summary.pmtFreq = obj.pmtFreq;
		this.summary.cmpFreq = obj.cmpFreq;
		this.summary.amortMthd = obj.amortMthd;

		obj.n = Math.ceil(obj.n);
		balance = obj.pv;
		netChange = obj.pv;
		if (balance > 0) {
			deposit = balance;
			withdrawal = 0.0;
			this.summary.totalNCredits[SCHEDULE_INDEX] += 1;
		} else if (balance < 0) {
			withdrawal = balance;
			deposit = 0.0;
			this.summary.totalNDebits[SCHEDULE_INDEX] += 1;
		} else {
			deposit = 0.0;
			withdrawal = 0.0;
		}
		// process origination
		priorDate.setTime(obj.oDate.getTime());
		scheduledDateStr = DateMath.dateToDateStr(priorDate, Globals.dateConventions);

		L = 0;
		periodYearString = 'Initial';

		schedule.push(['', '', Globals.ROW_TYPES.DETAIL, periodYearString, scheduledDateStr, balance, deposit, withdrawal, interestAccrued, null, netChange, balance, priorDate.getMonth() + 1, priorDate.getFullYear(), priorDate, priorDate.valueOf()]);

		L = 1;
		transDate.setTime(obj.fDate.getTime());
		scheduledDateStr = DateMath.dateToDateStr(transDate, Globals.dateConventions);

		cf = obj.cf; // cf may be credit (deposits) OR debits (withdrawals)
		if (cf > 0) {
			deposit = cf;
			withdrawal = 0.0;
			this.summary.totalNCredits[SCHEDULE_INDEX] += 1;
		} else if (cf < 0) {
			withdrawal = cf;
			deposit = 0.0;
			this.summary.totalNDebits[SCHEDULE_INDEX] += 1;
		} else {
			deposit = 0.0;
			withdrawal = 0.0;
		}

		interestAccrued = Utils.roundNumber(this.calcInterest(periodicRate, balance, 1));
		netChange = Utils.roundNumber(cf + interestAccrued);
		balance = Utils.roundNumber(balance + interestAccrued + obj.cf);
		periodYearString = L + ':' + nYears;

		// array index 1, record type 1, detail schedule row
		schedule.push(['', '', Globals.ROW_TYPES.DETAIL, periodYearString, scheduledDateStr, cf, deposit, withdrawal, interestAccrued, null, netChange, balance, transDate.getMonth() + 1, transDate.getFullYear(), transDate, transDate.valueOf()]);

		// process from the third cash flow to the end
		L = THIRD_CASH_FLOW;
		// all remaining periods have to be monthly
		// periods = 1;
		do {

			priorDate.setTime(transDate.getTime());
			transDate.setTime(DateMath.incPeriods(transDate, 1));

			interestAccrued = Utils.roundNumber(this.calcInterest(periodicRate, balance, 1));
			netChange = Utils.roundNumber(cf + interestAccrued);
			balance = Utils.roundNumber(balance + interestAccrued + obj.cf);
			scheduledDateStr = DateMath.dateToDateStr(transDate, Globals.dateConventions);

			if (withdrawal !== 0.0) {
				this.summary.totalNDebits[SCHEDULE_INDEX] += 1;
			}

			if (deposit !== 0.0) {
				this.summary.totalNCredits[SCHEDULE_INDEX] += 1;
			}

			if (L % Globals.PPY[obj.pmtFreq] === 1) {
				nYears += 1;
				this.summary.NYears = nYears;
			}
			periodYearString = L + ':' + nYears;
			// record type 1, detail schedule row
			schedule.push(['', '', Globals.ROW_TYPES.DETAIL, periodYearString, scheduledDateStr, cf, deposit, withdrawal, interestAccrued, null, netChange, balance, transDate.getMonth() + 1, transDate.getFullYear(), transDate, transDate.valueOf()]);
			L += 1;
		} while (L <= obj.n);

		trans = schedule[schedule.length - 1];
		this.summary.lastDebitDateStr[SCHEDULE_INDEX] = schedule[0][DATE_STR]; // loan date
		this.summary.lastCreditDateStr[SCHEDULE_INDEX] = trans[DATE_STR];
		this.summary.unadjustedBalance = balance;

		if (schedule.length > 0) {
			this.insertSubTotals(schedule);
		}
		return schedule;

	} // initSavingsScheduleData(obj, periodicRate)


	/**
	 * insertSubTotals()
	 * Insert subtotals into schedule based on declared fiscal year end
	 * Last month of year, i.e. before total rows 1..12
	 */
	// static insertSubTotals (schedule) {
	// 	var i, ytdCF = 0.0, ytdCredit = 0.0, ytdDebit = 0.0, ytdInterest = 0.0, ytdPrincipal = 0.0, ytdNetChange = 0.0, ytdXPmt = 0.0, runningCF = 0.0, runningCredit = 0.0, runningDebit = 0.0, runningInterest = 0.0, runningPrincipal = 0.0, runningNetChange = 0.0, runningXPmt = 0.0, totals = [];

	// 	i = 0;
	// 	do {

	// 		i += 1; // totals can only be inserted after array row 1

	// 		// note, pick up values from last row after loop exit
	// 		ytdCF = Utils.roundNumber(schedule[i - 1][CF] + ytdCF);
	// 		ytdCredit = Utils.roundNumber(schedule[i - 1][CREDIT] + ytdCredit);
	// 		ytdDebit = Utils.roundNumber(schedule[i - 1][DEBIT] + ytdDebit);
	// 		ytdInterest = Utils.roundNumber(schedule[i - 1][INT] + ytdInterest);
	// 		ytdPrincipal = Utils.roundNumber(schedule[i - 1][PRIN] + ytdPrincipal);
	// 		ytdNetChange = Utils.roundNumber(schedule[i - 1][NET] + ytdNetChange);
	// 		runningCF = Utils.roundNumber(schedule[i - 1][CF] + runningCF);
	// 		runningCredit = Utils.roundNumber(schedule[i - 1][CREDIT] + runningCredit);
	// 		runningDebit = Utils.roundNumber(schedule[i - 1][DEBIT] + runningDebit);
	// 		runningInterest = Utils.roundNumber(schedule[i - 1][INT] + runningInterest);
	// 		runningPrincipal = Utils.roundNumber(schedule[i - 1][PRIN] + runningPrincipal);
	// 		runningNetChange = Utils.roundNumber(schedule[i - 1][NET] + runningNetChange);
	// 		if (schedule[i - 1][PER_STR].toUpperCase() === 'XPMT') {
	// 			ytdXPmt = Utils.roundNumber(schedule[i - 1][PRIN] + ytdXPmt);
	// 			runningXPmt = Utils.roundNumber(schedule[i - 1][PRIN] + runningXPmt);
	// 		}

	// 		// one test for when consecutive cash flows are in different calendar year and another test when cash flows are in same calendar year
	// 		if (((schedule[i - 1][YEAR] !== schedule[i][YEAR] && (schedule[i - 1][MONTH] <= DECM || schedule[i][MONTH] > DECM))) || ((schedule[i - 1][YEAR] === schedule[i][YEAR] && (schedule[i - 1][MONTH] <= DECM && DECM < schedule[i][MONTH])))) {

	// 			// insert the 2 total rows into schedule at fiscal year end
	// 			totals = [];
	// 			totals[EVENT_DATE] = schedule[i - 1][EVENT_DATE];
	// 			totals[EVENT_DATE] = totals[EVENT_DATE].substr(0, totals[EVENT_DATE].length - INDEX_ADJUST) + '-99';
	// 			totals[LOAN_NO] = SCHEDULE_INDEX;
	// 			totals[ROW_TYPE] = Globals.ROW_TYPES.ANNUAL_TOTALS; // YTD total row marker
	// 			// ' YTD:'
	// 			totals[PER_STR] = schedule[i - 1][YEAR] + ' ' + strings.strs.s101 + ':';
	// 			totals[DATE_STR] = null;
	// 			totals[CF] = ytdCF;
	// 			totals[CREDIT] = ytdCredit;
	// 			totals[DEBIT] = ytdDebit;
	// 			totals[INT] = ytdInterest;
	// 			totals[NET] = ytdNetChange;
	// 			totals[PRIN] = ytdPrincipal;
	// 			totals[BAL] = null;
	// 			totals[MONTH] = DECM; // schedule[i - 1][MONTH];
	// 			totals[YEAR] = schedule[i - 1][YEAR];

	// 			// reset year-to-date
	// 			ytdCF = 0;
	// 			ytdCredit = 0.0;
	// 			ytdDebit = 0.0;
	// 			ytdInterest = 0.0; // schedule[0][INT];
	// 			ytdPrincipal = 0.0;
	// 			ytdNetChange = 0.0;
	// 			ytdXPmt = 0.0;

	// 			schedule.splice(i, 0, totals);
	// 			i += 1; // increment for row just insert

	// 			totals = [];
	// 			totals[EVENT_DATE] = schedule[i - 1][EVENT_DATE];
	// 			totals[EVENT_DATE] = totals[EVENT_DATE].substr(0, totals[EVENT_DATE].length - INDEX_ADJUST) + '-99';
	// 			totals[LOAN_NO] = SCHEDULE_INDEX;
	// 			totals[ROW_TYPE] = Globals.ROW_TYPES.RUNNING_TOTALS; // running total row marker
	// 			// 'Running Totals:'
	// 			totals[PER_STR] = strings.strs.s102 + ':';
	// 			totals[DATE_STR] = null;
	// 			totals[CF] = runningCF;
	// 			totals[CREDIT] = runningCredit;
	// 			totals[DEBIT] = runningDebit;
	// 			totals[INT] = runningInterest;
	// 			totals[NET] = runningNetChange;
	// 			totals[PRIN] = runningPrincipal;
	// 			totals[BAL] = null;
	// 			totals[MONTH] = DECM; // schedule[i - 1][MONTH];
	// 			totals[YEAR] = schedule[i - 1][YEAR];

	// 			schedule.splice(i, 0, totals);
	// 			i += 1; // increment for row just insert
	// 		}
	// 	} while (i < schedule.length - 1);

	// 	if (schedule[schedule.length - 1][ROW_TYPE] !== Globals.ROW_TYPES.RUNNING_TOTALS) {
	// 		// pick up the values from the last row
	// 		ytdCF = Utils.roundNumber(schedule[schedule.length - 1][CF] + ytdCF);
	// 		ytdCredit = Utils.roundNumber(schedule[schedule.length - 1][CREDIT] + ytdCredit);
	// 		ytdDebit = Utils.roundNumber(schedule[schedule.length - 1][DEBIT] + ytdDebit);
	// 		ytdInterest = Utils.roundNumber(schedule[schedule.length - 1][INT] + ytdInterest);
	// 		ytdPrincipal = Utils.roundNumber(schedule[schedule.length - 1][PRIN] + ytdPrincipal);
	// 		ytdNetChange = Utils.roundNumber(schedule[schedule.length - 1][NET] + ytdNetChange);
	// 		runningCF = Utils.roundNumber(schedule[schedule.length - 1][CF] + runningCF);
	// 		runningCredit = Utils.roundNumber(schedule[schedule.length - 1][CREDIT] + runningCredit);
	// 		runningDebit = Utils.roundNumber(schedule[schedule.length - 1][DEBIT] + runningDebit);
	// 		runningInterest = Utils.roundNumber(schedule[schedule.length - 1][INT] + runningInterest);
	// 		runningPrincipal = Utils.roundNumber(schedule[schedule.length - 1][PRIN] + runningPrincipal);
	// 		runningNetChange = Utils.roundNumber(schedule[schedule.length - 1][NET] + runningNetChange);
	// 		if (schedule[schedule.length - 1][PER_STR].toUpperCase() === 'XPMT') {
	// 			ytdXPmt = Utils.roundNumber(schedule[schedule.length - 1][PRIN] + ytdXPmt);
	// 			runningXPmt = Utils.roundNumber(schedule[schedule.length - 1][PRIN] + runningXPmt);
	// 		}

	// 		// add final set of total rows
	// 		totals = [];
	// 		totals[EVENT_DATE] = schedule[i][EVENT_DATE];
	// 		// mangle the date
	// 		totals[EVENT_DATE] = totals[EVENT_DATE].substr(0, totals[EVENT_DATE].length - INDEX_ADJUST) + '-99';
	// 		totals[LOAN_NO] = SCHEDULE_INDEX;
	// 		totals[ROW_TYPE] = Globals.ROW_TYPES.ANNUAL_TOTALS; // YTD total row marker
	// 		// ' YTD:'
	// 		totals[PER_STR] = schedule[schedule.length - 1][YEAR] + ' ' + strings.strs.s101 + ':';
	// 		totals[DATE_STR] = null;
	// 		totals[CF] = ytdCF;
	// 		totals[CREDIT] = ytdCredit;
	// 		totals[DEBIT] = ytdDebit;
	// 		totals[INT] = ytdInterest;
	// 		totals[PRIN] = ytdPrincipal;
	// 		totals[NET] = ytdNetChange;
	// 		totals[BAL] = null;
	// 		totals[MONTH] = DECM; // schedule[schedule.length - 1][MONTH];
	// 		totals[YEAR] = schedule[schedule.length - 1][YEAR];
	// 		schedule.push(totals);

	// 		totals = [];
	// 		totals[EVENT_DATE] = schedule[i][EVENT_DATE];
	// 		// mangle the date
	// 		totals[EVENT_DATE] = totals[EVENT_DATE].substr(0, totals[EVENT_DATE].length - INDEX_ADJUST) + '-99';
	// 		totals[LOAN_NO] = SCHEDULE_INDEX;
	// 		totals[ROW_TYPE] = Globals.ROW_TYPES.RUNNING_TOTALS; // running total row marker
	// 		// 'Running Totals:'
	// 		totals[PER_STR] = strings.strs.s102 + ':';
	// 		totals[DATE_STR] = null;
	// 		totals[CF] = runningCF;
	// 		totals[CREDIT] = runningCredit;
	// 		totals[DEBIT] = runningDebit;
	// 		totals[INT] = runningInterest;
	// 		totals[PRIN] = runningPrincipal;
	// 		totals[NET] = runningNetChange;
	// 		totals[BAL] = null;
	// 		totals[MONTH] = DECM;
	// 		totals[YEAR] = schedule[schedule.length - 1][YEAR];
	// 		schedule.push(totals);
	// 	}

	// 	this.summary.totalInterest[SCHEDULE_INDEX] = runningInterest;
	// 	this.summary.totalPmts[SCHEDULE_INDEX] = runningCF;
	// 	return null;

	// } // insertSubTotals()


	/**
	 * initLoanScheduleArray()
	 * @param {Object} obj (required)
	 */
	// static initLoanScheduleData (obj, periodicRate) {
	// 	const MAX_BALANCE = 99999999999995.50;
	// 	const THIRD_CASH_FLOW = 2; // zero base
	// 	let L, balance, pmt, deposit, withdrawal, scheduledDateStr, sortDateStr, periodYearString, periods, nYears = 1, interestAccrued = 0, principalPaid = 0, trans = [], priorDate = new Date(0), transDate = new Date(0), schedule = [];

	// 	this.initDates(obj);

	// 	this.summary.nominalRate[SCHEDULE_INDEX] = obj.nominalRate;
	// 	this.summary.pmtFreq = obj.pmtFreq;
	// 	this.summary.cmpFreq = obj.cmpFreq;
	// 	this.summary.amortMthd = obj.amortMthd;

	// 	// Assume regular length. Periods must be 1 or 0.
	// 	periods = DateMath.countMonths(obj.oDate, obj.fDate);

	// 	pmt = 0; // no payment with origination row, but first payment may be same date, however, in next schedule row

	// 	balance = obj.pv;
	// 	deposit = balance;
	// 	withdrawal = null;

	// 	// process origination
	// 	priorDate.setTime(obj.oDate.getTime());
	// 	scheduledDateStr = DateMath.dateToDateStr(priorDate, Globals.dateConventions);
	// 	this.summary.firstDebitDateStr = scheduledDateStr;
	// 	sortDateStr = DateMath.dateToDateStr(priorDate, Globals.sortConventions);
	// 	L = 0;
	// 	periodYearString = L + ':' + nYears;

	// 	schedule.push([sortDateStr, SCHEDULE_INDEX, Globals.ROW_TYPES.DETAIL, periodYearString, scheduledDateStr, pmt, deposit, withdrawal, interestAccrued, principalPaid, null, balance, priorDate.getMonth() + 1, priorDate.getFullYear(), priorDate, priorDate.valueOf()]);

	// 	// process 1st cash flow as special case...may not be regular length period
	// 	L = 1;
	// 	periodYearString = L + ':' + nYears;
	// 	pmt = -obj.cf; // payments are passed as debits, i.e. negative
	// 	transDate.setTime(obj.fDate.getTime());
	// 	scheduledDateStr = DateMath.dateToDateStr(transDate, Globals.dateConventions);
	// 	this.summary.firstCreditDateStr = scheduledDateStr;
	// 	sortDateStr = DateMath.dateToDateStr(transDate, Globals.sortConventions);

	// 	withdrawal = obj.cf;
	// 	deposit = null;

	// 	// 1 period of interest
	// 	interestAccrued = Utils.roundNumber(this.calcInterest(periodicRate, balance, periods));
	// 	principalPaid = Utils.roundNumber(pmt - interestAccrued);
	// 	balance = Utils.roundNumber(balance + interestAccrued + obj.cf);

	// 	schedule.push([sortDateStr, SCHEDULE_INDEX, Globals.ROW_TYPES.DETAIL, periodYearString, scheduledDateStr, pmt, deposit, withdrawal, interestAccrued, principalPaid, null, balance, transDate.getMonth() + 1, transDate.getFullYear(), transDate, transDate.valueOf()]);


	// 	// process from the third cash flow to the end
	// 	L = THIRD_CASH_FLOW;
	// 	// all remaining periods have to be monthly
	// 	periods = 1;
	// 	do {

	// 		priorDate.setTime(transDate.getTime());
	// 		transDate.setTime(DateMath.incPeriods(transDate, 1));

	// 		scheduledDateStr = DateMath.dateToDateStr(transDate, Globals.dateConventions);
	// 		sortDateStr = DateMath.dateToDateStr(transDate, Globals.sortConventions);

	// 		if (L % Globals.PPY[obj.pmtFreq] === 1) {
	// 			nYears += 1;
	// 		}
	// 		periodYearString = L + ':' + nYears;

	// 		// 1 period of interest
	// 		interestAccrued = Utils.roundNumber(this.calcInterest(periodicRate, balance, periods));
	// 		interestAccrued = Utils.roundNumber(interestAccrued);
	// 		principalPaid = Utils.roundNumber(pmt - interestAccrued);
	// 		balance = Utils.roundNumber(balance + interestAccrued + obj.cf);

	// 		// record type 1, detail schedule row
	// 		schedule.push([sortDateStr, SCHEDULE_INDEX, Globals.ROW_TYPES.DETAIL, periodYearString, scheduledDateStr, pmt, deposit, withdrawal, interestAccrued, principalPaid, null, balance, transDate.getMonth() + 1, transDate.getFullYear(), transDate, transDate.valueOf()]);

	// 		// [KT] 11/13/2016 - add arbitrary overflow check, 99 trillion
	// 		if (Math.abs(balance) > MAX_BALANCE) {
	// 			// 'Internal limit reached. Balance exceeds +/- 99 trillion.'
	// 			Utils.showMessageModal('<p>' + strings.strs.s100 + '</p>');
	// 			schedule = [];
	// 			return schedule;
	// 		}
	// 		L += 1;

	// 	} while (L <= obj.n && balance > 0);

	// 	trans = schedule[schedule.length - 1];
	// 	this.summary.unadjustedBalance = trans[BAL];
	// 	this.summary.cf[SCHEDULE_INDEX] = trans[CF]; // prior to any rounding
	// 	trans[CF] = trans[CF] + this.summary.unadjustedBalance;
	// 	trans[BAL] = trans[BAL] - this.summary.unadjustedBalance;
	// 	trans[PRIN] = trans[PRIN] + this.summary.unadjustedBalance;
	// 	this.summary.totalNDebits[SCHEDULE_INDEX] = L - 1;
	// 	this.summary.totalNCredits[SCHEDULE_INDEX] = 1;
	// 	this.summary.lastDebitDateStr[SCHEDULE_INDEX] = schedule[0][DATE_STR]; // loan date
	// 	this.summary.lastCreditDateStr[SCHEDULE_INDEX] = trans[DATE_STR];

	// 	if (schedule.length > 0) {
	// 		this.insertSubTotals(schedule);
	// 	}
	// 	return schedule;

	// } // initLoanScheduleArray(obj, periodicRate)


	/**
	 * Calculates the payment amount based on the payment method and other parameters.
	 * @param {Object} obj - The calculation parameters.
	 * @param {number} obj.pv - The present value of the loan or investment.
	 * @param {number} obj.n - The number of periods.
	 * @param {number} obj.nominalRate - The nominal interest rate.
	 * @param {number} obj.pmtMthd - The payment method (e.g., arrears or in advance).
	 * @returns {number} The calculated cash flow amount.
	 * @throws {Error} Throws an error if the payment method is invalid.
	 */
	static calc (obj) {
		var periodicRate, s, cf; // cash flow amount (payment amount)

		periodicRate = this.calcPeriodicRate(obj);
		if (obj.pmtMthd === Globals.PMT_METHOD.ARREARS) {
			s = Math.pow(1 + periodicRate, obj.n);
			cf = periodicRate * (obj.fv - obj.pv * s) / ((s - 1.0) * (1.0 + periodicRate * obj.pmtMthd));

			// cf = periodicRate * obj.pv;
			// cf = -(cf / (1 - Math.pow(1 + periodicRate, -obj.n)));
		} else {
			// s = 1 + periodicRate;
			// cf = (1 - Math.pow(s, -obj.n + 1)) / periodicRate;
			// cf = -(obj.pv / (cf + 1));
		}
		obj.cf = cf;
		this.sourceScheduleData = this.initSavingsScheduleData(obj, periodicRate);
		return cf;
	}
}


// ECMAScript 2022 (ES13): This release included the introduction of static class fields
// If we need better browser support, declare static properties outside the class definition
// LoanCalculation.loan_params = {
// 	nominalRate: null,
// 	n: null,
// 	cf: null,
// 	pv: null,
// 	fv: null,
// 	pmtMthd: null,
// 	amortMthd: null,
// 	oDate: null,
// 	fDate: null,
// 	lDate: null
// };