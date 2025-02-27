/**
 * -----------------------------------------------------------------------------
 * (c) 2016-2025 Pine Grove Software, LLC -- All rights reserved.
 * Contact: webmaster@AccurateCalculators.com
 * License: Commercial
 * www.AccurateCalculators.com
 * -----------------------------------------------------------------------------
 * interface for HTML  auto loan calculator plus plugin
 * -----------------------------------------------------------------------------
 */

/**
 * @preserve Copyright 2016-2025 Pine Grove Software, LLC
 * AccurateCalculators.com
 * License: Commercial
 * interface.AUTO-LOAN-PLUS.gpl.js
 */


import { AutoLoanCalculatorStrings as autoStrings } from '../strings/strs.AUTO-LOAN.gpl.js';

// localization conventions
import { Locales } from '../common/locales.gpl.js';

// global constants
import { Globals } from '../common/globals.gpl.js';

// equation methods
import { AutoLoanCalculation as alc } from '../calculations/eq.AUTO-LOAN.gpl.js';

// utility functions
import { Utils } from '../common/utils.gpl.js';

// numeric editor
import { NE } from '../common/editorNumeric.gpl.js';

/**
 * This plugin uses Bootstrap modals for its interface. To optimize performance and avoid duplicate
 * DOM entries, all plugins that rely on these modals share the same modal instances.
 *
 * If multiple plugins are installed on the same page, the modals are loaded only once. A shared
 * property, `Modals.modals`, is used to track modal instances and prevent duplicates.
 *
 * While this approach minimizes redundancy, it introduces additional complexity in the interface
 * modules. Event handlers and the call chain must account for shared modals and properly manage
 * execution contexts.
 *
 * To achieve this, each modal sets its `activeContext` property to the calling interface class
 * when opened. Event handlers are scoped to the `activeContext`, ensuring the code executes only
 * within the context of the class that initiated the modal.
 */
// modal initialization code
import Modals from '../common/modals.gpl.js';

// printable loan schedule
import { HtmlAutoLoanSchedule as ls } from '../schedules/sch.AUTO-LOAN.gpl.js';

// charts
import { AutoLoanCharts } from '../charting/ch.AUTO-LOAN.gpl.js';

export class AutoLoanCalculatorHtmlInterface {

	static priceInput = null;
	static dwnPmtInput = null;
	static pvInput = null;
	static numPmtsInput = null;
	static rateInput = null;
	static schedule = []; // raw schedule data
	static displayScheduleData = []; // a formatted schedule
	static current_ccy_format = null;
	static current_date_format = null;

	static modalConfigs = [
		{
			modalId: 'CURRENCYDATE',
			initModal: { buttonId: 'CCY-al', modalElementId: 'CURRENCYDATE', callback: this.showCURRENCYDATEModal, context: this, initCallback: null },
			eventHandlers: [
				{ elementId: 'CURRENCYDATE_save', eventType: 'click', callback: this.onCURRENCYDATESaveClick, context: this }
			]
		},
		{
			// example for configuring a modal that will be opened and inialized using JavaScript - not in response to a 'click'
			modalId: 'RPT',
			initModal: { buttonId: 'btnSchedule-al', modalElementId: 'RPT', callback: this.showSchedule.bind(this), context: this }
		},
		{
			modalId: 'CHART',
			initModal: { buttonId: 'btnCharts-al', modalElementId: 'CHART', callback: this.showCharts.bind(this), context: this }
		},
		{
			modalId: 'HLP',
			// optional initCallback: property for static data initialization callback (help text is not static if more than one plugin is used on a page)
			initModal: { buttonId: 'btnHelp-al', modalElementId: 'HLP', callback: this.showHLPModal, context: this, initCallback: null }
		},
		{
			modalId: 'MSG',
			initModal: { buttonId: null, modalElementId: 'MSG', callback: null }
		}
	];


	static initializeModalEvents () {

		// Set up show/hide event handlers for the RPT modal
		const rptModalElement = document.getElementById('RPT');

		if (rptModalElement) {
			rptModalElement.addEventListener('hide.bs.modal', this.onRPTModalClosing.bind(this));
		}

		// Set up show/hide event handlers for the CHART modal
		const chartModalElement = document.getElementById('CHART');

		if (chartModalElement) {
			chartModalElement.addEventListener('hide.bs.modal', this.onCHARTModalClosing.bind(this));
		}

		const helpModalElement = document.getElementById('HLP');

		if (helpModalElement) {
			helpModalElement.addEventListener('hide.bs.modal', this.onHLPModalClosing.bind(this));
		}

		const ccyDateModalElement = document.getElementById('CURRENCYDATE');

		if (ccyDateModalElement) {
			ccyDateModalElement.addEventListener('show.bs.modal', this.onCURRENCYDATEModalOpening.bind(this));
			ccyDateModalElement.addEventListener('hide.bs.modal', this.onCURRENCYDATEModalClosing.bind(this));
			ccyDateModalElement.addEventListener('hidden.bs.modal', this.onCURRENCYDATEModalClosed.bind(this));
		}
	}


	static onRPTModalClosing () {
		const rptModalElement = document.getElementById('RPT');

		if (document.activeElement instanceof HTMLElement) {
			document.activeElement.blur();
		}

		// Only remove event listener if this instance is the active context
		if (rptModalElement.activeContext === this) {

			// Clear the active context on close
			delete rptModalElement.activeContext; // Unset the active context
		}

	}


	static onCHARTModalClosing () {
		const chartModalElement = document.getElementById('CHART');

		if (document.activeElement instanceof HTMLElement) {
			document.activeElement.blur();
		}

		if (chartModalElement.activeContext === this) {
			AutoLoanCharts.destroy();

			// Clear the active context on close
			delete chartModalElement.activeContext; // Unset the active context
		}
	}


	static clearResults () {
		document.getElementById('selPmtMthd-al').value = Globals.PMT_METHOD.ARREARS;
		document.getElementById('edPmt-al').value = Utils.formatNumericValueWithSym(0.0);
		document.getElementById('edDwnPmtPct-al').value = Utils.formatNumericValueWithSym(0.0, Locales.rateConventions, 1);
		document.getElementById('edInterest-al').value = Utils.formatNumericValueWithSym(0.0);
		document.getElementById('edTotalPI-al').value = Utils.formatNumericValueWithSym(0.0);
	}


	/**
	 * clearGUI() -- reset GUI's values
	 */
	static clearGUI () {
		// main window
		this.priceInput.setValue(0.0);
		this.dwnPmtInput.setValue(0.0);
		this.pvInput.setValue(0.0);
		this.numPmtsInput.setValue(0);
		this.rateInput.setValue(0.0);
		this.clearResults();
	} // clearGUI


	// print the calculator `div` element
	static print () {
		Utils.printCalculator('autoloan-plugin'); // print the calculator via ID
	}


	/**
	 * Initialize currency and date format selection in modal.
	 * Show the modal.
	 * @param {*} modal
	 */
	static showCURRENCYDATEModal (modal) {
		const ccyModalElement = document.getElementById('CURRENCYDATE');

		ccyModalElement.activeContext = this;
		document.getElementById('ccy-select').value = Locales.moneyConventions.ccy_format;
		document.getElementById('date-select').value = Locales.dateConventions.date_format;
		modal.show();
	}


	/**
	 * showHLPModal() -- open help modal
	 * @param {*} modal
	 */
	static showHLPModal (modal) {
		let txt = '';

		const hlpModalElement = document.getElementById('HLP');

		hlpModalElement.activeContext = this;

		// initialize modal content here
		document.getElementById('hlp-title').innerHTML = autoStrings.strs.s4071;
		txt += autoStrings.strs.s4081;
		txt += autoStrings.strs.s4091;
		txt += autoStrings.strs.s410a;
		txt += autoStrings.strs.s411a;
		txt += autoStrings.strs.s412a;
		txt += '<br>';
		txt += autoStrings.strs.s413a;

		// update the DOM
		document.getElementById('hlp-content').innerHTML = txt;

		modal.show();
	}


	/**
	 * onCloseHLPModal()
	 * modal close, remove the text
	 * @param {*} modal
	 */
	static onHLPModalClosing () {
		const hlpModalElement = document.getElementById('HLP');

		if (document.activeElement instanceof HTMLElement) {
			document.activeElement.blur();
		}

		// clear DOM
		if (hlpModalElement.activeContext === this) {
			document.getElementById('hlp-content').innerHTML = '';
			// Clear the active context on close
			delete hlpModalElement.activeContext; // Unset the active context
		}
	}


	/**
	 * onCURRENCYDATESaveClick() -- save button click event handler
	 */
	static onCURRENCYDATESaveClick () {
		// const ccyModalElement = document.getElementById('CURRENCYDATE');
		let ccy_format = document.getElementById('ccy-select').value;
		let date_format = document.getElementById('date-select').value;
		let isCcyFormatChanged = (this.current_ccy_format !== ccy_format);
		let isDateFormatChanged = (this.current_date_format !== date_format);

		// We need to update the conventions for any on page plugin
		if (isCcyFormatChanged) {
			// resets the numConventions and rateConventions too.
			Locales.resetCcyConventions(ccy_format);
		}
		if (isDateFormatChanged) {
			Locales.resetDateConventions(date_format);
		}
		// }

		// Having this outside the activeContext test allows all plugins on a page to have their conventions updated.
		if (isCcyFormatChanged) {
			this.clearGUI();
			this.priceInput.resetConventions(ccy_format);
			this.dwnPmtInput.resetConventions(ccy_format);
			this.pvInput.resetConventions(ccy_format);
			this.numPmtsInput.resetConventions(ccy_format);
			this.rateInput.resetConventions(ccy_format);
		}
	} // onCURRENCYDATESaveClick


	static onCURRENCYDATEModalOpening () {
		this.current_ccy_format = document.getElementById('ccy-select').value;
		this.current_date_format = document.getElementById('date-select').value;
	}


	static onCURRENCYDATEModalClosing () {
		if (document.activeElement instanceof HTMLElement) {
			document.activeElement.blur();
		}
	}


	static onCURRENCYDATEModalClosed () {
		const ccyModalElement = document.getElementById('CURRENCYDATE');

		if (ccyModalElement.activeContext === this) {
			// Clear the active context on close
			delete ccyModalElement.activeContext; // Unset the active context
		}
	}

	/**
	 * onRPTPrintClick() -- print button click event handler
	 */
	static onRPTPrintClick () {
		Utils.printSchedule('rptFrame');
	}


	/**
	 * onMSGCloseClick() -- close button click event handler
	 * clear the message content
	 */
	static onMSGCloseClick () {
		const modalBody = document.getElementById('msg-content');

		modalBody.innerHTML = '';
	}

	// end modal coded.

	/**
	 * getInputs() -- get user inputs and initialize obj equation interface object
	 */
	static getInputs () {
		const PENNY = 0.01;
		let selPmtMthd, nunknowns = 0;

		let obj = JSON.parse(JSON.stringify(alc.auto_loan_params));

		obj.price = this.priceInput.getNumber();
		obj.downPmt = this.dwnPmtInput.getNumber();
		obj.pv = this.pvInput.getNumber();

		// can we calculate the amount of the loan? Validate inputs
		if (obj.price !== 0 && obj.downPmt !== 0 && obj.pv !== 0) {
			// Are the inputs valid? They may have already been calculated
			// pr - downPmt === loan amount, if the calculated loan amount is more than 0.01 greater than the input's loan amount, then fail.
			if (Math.abs(obj.pv - (obj.price - obj.downPmt)) > PENNY) {
				// alert('One of the following: "Price", "Down Payment Amount" or "Loan Amount" must be "0".\n\nYou may use our general purpose loan calculator if you don\'t want to consider purchase price.');
				Utils.showMessageModal('<p>' + autoStrings.strs.s4011 + '</p><p>' + autoStrings.strs.s4021 + '</p>');
				return null;
			}
		}

		// are there too many unknowns?
		if (obj.price === 0) {
			nunknowns += 1;
		}
		if (obj.downPmt === 0) {
			nunknowns += 1;
		}
		if (obj.pv === 0) {
			nunknowns += 1;
		}
		if (nunknowns > 1) {
			// alert('Only one of the following: "Price", "Down Payment Percent" or "Loan Amount" can be "0".\n\nYou may use our general purpose loan calculator if you don\'t want to consider purchase price.');
			Utils.showMessageModal('<p>' + autoStrings.strs.s4031 + '</p><p>' + autoStrings.strs.s4021 + '</p>');
			return null;
		}

		if (obj.pv === 0) {
			obj.pv = Utils.roundNumber(obj.price - obj.downPmt);
			this.pvInput.setValue(obj.pv);
		}

		if (obj.downPmt === 0) {
			obj.downPmt = obj.price - obj.pv;
			this.dwnPmtInput.setValue(Math.round(obj.downPmt));
		}

		if (obj.price === 0) {
			obj.price = Utils.roundNumber(obj.pv + obj.downPmt);
			this.priceInput.setValue(obj.price);
		}

		obj.pctDown = Utils.roundNumber((1 - (obj.pv / obj.price)) * 100, Locales.moneyConventions.precision);
		obj.n = this.numPmtsInput.getNumber();

		obj.nominalRate = this.rateInput.getNumber() / 100;

		obj.cf = 0;

		// cash flow's payment frequency
		obj.pmtFreq = Globals.PMT_FREQUENCY.MONTHLY;

		// cash flow's compound frequency
		obj.cmpFreq = Globals.CMP_FREQUENCY.MONTHLY;

		selPmtMthd = document.getElementById('selPmtMthd-al');
		obj.pmtMthd = parseInt(selPmtMthd.value, 10);
		obj.amortMthd = Globals.AMORT_MTHD.AM_NORMAL;

		return obj;

	} // getInputs()


	/**
	 * calc() -- initialize CashInputs data structures for equation classes
	 */
	static calc () {
		const CF = 5, INT = 8;
		let totPI, totI, nUnknowns = 0;

		this.clearResults();

		let obj = this.getInputs();

		if (obj === null) {
			return []; // empty schedule
		}

		if (obj.pv === 0) {
			nUnknowns += 1;
		}
		if (obj.n === 0) {
			nUnknowns += 1;
		}
		if (obj.nominalRate === 0) {
			nUnknowns += 1;
		}

		if (nUnknowns > 0) {
			// 'Only one of the following: "Price", "Down Payment" or "Loan Amount" can be "0".'
			// 'There are too many unknown values.'
			Utils.showMessageModal('<p>' + autoStrings.strs.s4051 + '</p>');
			return null;
		}

		if (obj.cf === 0) {
			obj.cf = -Utils.roundNumber(alc.calc(obj));
			if (obj.cf !== Infinity) {
				document.getElementById('edPmt-al').value = Utils.formatNumericValueWithSym(obj.cf);
			} else {
				obj.cf = 0;
			}
		}

		obj.pctDown = Utils.roundNumber(obj.downPmt / obj.price * 100, 1);

		// schedule array
		this.schedule = alc.sourceScheduleData;

		if (this.schedule.length > 0) {
			totPI = this.schedule[this.schedule.length - 1][CF];
			totI = this.schedule[this.schedule.length - 1][INT];

			// results to GUI
			if (obj.cf !== 0) {
				document.getElementById('edDwnPmtPct-al').value = Utils.formatNumericValueWithSym(obj.pctDown, Locales.rateConventions, 1);
				document.getElementById('edInterest-al').value = Utils.formatNumericValueWithSym(totI);
				document.getElementById('edTotalPI-al').value = Utils.formatNumericValueWithSym(totPI);
			}
		}
		return this.schedule;
	} // calc()


	static showSchedule () {
		const rptModalElement = document.getElementById('RPT');

		rptModalElement.activeContext = this;

		this.displayScheduleData = [];
		this.schedule = this.calc();

		if (this.schedule.length > 0) {

			this.displayScheduleData = ls.formatLoanSchedule(this.schedule, null);

			// Open report modal
			const rpt = Modals.modals['RPT'];

			if (rpt) {
				let oIframe = document.getElementById('rptFrame'); // modal's iframe

				oIframe.srcdoc = this.displayScheduleData;
				rpt.show();
			}
		}
	} // showSchedule


	static showCharts () {
		this.displayScheduleData = [];

		let schedule = this.calc();

		if (schedule.length > 0) {
			AutoLoanCharts.showCharts(schedule);

			// Open chart modal
			const charts = Modals.modals['CHART'];

			if (charts) {
				// Set this class as the active context on the modal element
				const chartModalElement = document.getElementById('CHART');

				chartModalElement.activeContext = this;
				charts.show();
			}
		}
	}


	/**
	 * initInputs() -- initialize the GUI's input fields - considers localization
	 * @static
	 * @memberof AutoLoanCalculatorHtmlInterface
	 * @returns {void}
	 */
	static initInputs () {

		// for development purposes, use constants
		// this.pvInput.setValue(DEFAULT_AMOUNT);
		// this.numPmtsInput.setValue(DEFAULT_NUM_PAYMENTS);
		// this.rateInput.setValue(DEFAULT_RATE);

		this.priceInput.setValue(parseFloat(document.getElementById('edPrice-al').value) || 0);
		this.dwnPmtInput.setValue(parseFloat(document.getElementById('edDwnPmt-al').value) || 0);
		this.pvInput.setValue(parseFloat(document.getElementById('edPV-al').value) || 0);
		this.numPmtsInput.setValue(parseFloat(document.getElementById('edNumPmts-al').value) || 0);
		this.rateInput.setValue(parseFloat(document.getElementById('edRate-al').value) || 0);

		document.getElementById('selPmtMthd-al').value = Globals.PMT_METHOD.ARREARS;
		this.clearResults();
	}


	/**
	 * init() -- init the GUI
	 */
	static initGUI () {

		// create new editors per GUI requirements
		// main window
		this.priceInput = new NE('edPrice-al', Locales.moneyConventions, Locales.moneyConventions.precision);
		this.dwnPmtInput = new NE('edDwnPmt-al', Locales.moneyConventions, Locales.moneyConventions.precision);
		this.pvInput = new NE('edPV-al', Locales.moneyConventions, Locales.moneyConventions.precision);
		this.numPmtsInput = new NE('edNumPmts-al', Locales.numConventions, 0);
		this.numPmtsInput.isNumEditor = true;
		this.rateInput = new NE('edRate-al', Locales.rateConventions, Locales.rateConventions.precision);
		this.rateInput.isRateEditor = true;

		// add click event handlers
		Utils.addEventListenerToElement('click', 'btnCalc-al', this.calc, this);
		Utils.addEventListenerToElement('click', 'btnClear-al', this.clearGUI, this);
		Utils.addEventListenerToElement('click', 'btnPrint-al', this.print, this);

		// add change event handlers
		Utils.addEventListenerToElement('change', 'selPmtMthd-al', Utils.updateSelectedAttribute, this);

		Modals.initializeModals(this.modalConfigs);
		this.initializeModalEvents();

		Utils.initTooltips();

		this.initInputs();

		// Initialize the zoom buttons with specific IDs
		Utils.setupZoomButtons('shrink-al', 'grow-al', 'original-al');

	} // initGUI

} // class AutoLoanCalculatorHtmlInterface


// Initialize when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function () {
	// don't try to initialize the wrong plugin
	if (!document.getElementById('autoloan-plugin')) {
		return;
	}

	AutoLoanCalculatorHtmlInterface.initGUI();
});