/**
 * -----------------------------------------------------------------------------
 * (c) 2016-2025 Pine Grove Software, LLC -- All rights reserved.
 * Contact: webmaster@AccurateCalculators.com
 * License: Commercial
 * www.AccurateCalculators.com
 * -----------------------------------------------------------------------------
 * interface for HTML loan calculator plus plugin
 * -----------------------------------------------------------------------------
 */

/**
 * @preserve Copyright 2016-2025 Pine Grove Software, LLC
 * AccurateCalculators.com
 * License: Commercial
 * interface.LOAN-PLUS.gpl.js
 */

import { LoanCalculatorStrings as loanStrings } from '../strings/strs.LOAN.gpl.js';

// localization conventions
import { Locales } from '../common/locales.gpl.js';

// global constants
import { Globals } from '../common/globals.gpl.js';

// equation methods
import { LoanCalculation as lc } from '../calculations/eq.LOAN.gpl.js';

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
import { HtmlLoanSchedule as ls } from '../schedules/sch.LOAN.gpl.js';

// charts
import { LoanCharts } from '../charting/ch.LOAN.gpl.js';

// const DEFAULT_AMOUNT = 350_000.00;
// const DEFAULT_NUM_PAYMENTS = 360;
// const DEFAULT_RATE = 5.25

export class LoanCalculatorHtmlInterface {

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
			initModal: { buttonId: 'CCY-ln', modalElementId: 'CURRENCYDATE', callback: this.showCURRENCYDATEModal, context: this, initCallback: null },
			eventHandlers: [
				{ elementId: 'CURRENCYDATE_save', eventType: 'click', callback: this.onCURRENCYDATESaveClick, context: this }
			]
		},
		{
			// example for configuring a modal that will be opened and inialized using JavaScript - not in response to a 'click'
			modalId: 'RPT',
			initModal: { buttonId: 'btnSchedule-ln', modalElementId: 'RPT', callback: this.showSchedule.bind(this), context: this }
		},
		{
			modalId: 'CHART',
			initModal: { buttonId: 'btnCharts-ln', modalElementId: 'CHART', callback: this.showCharts.bind(this), context: this }
		},
		{
			modalId: 'HLP',
			// optional initCallback: property for static data initialization callback (help text is not static if more than one plugin is used on a page)
			initModal: { buttonId: 'btnHelp-ln', modalElementId: 'HLP', callback: this.showHLPModal, context: this, initCallback: null }
		},
		{
			modalId: 'MSG',
			initModal: { buttonId: null, modalElementId: 'MSG', callback: null },
			eventHandlers: [
				{ elementId: 'MSG_close', eventType: 'click', callback: this.onMSGCloseClick }
			]
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
			LoanCharts.destroy();

			// Clear the active context on close
			delete chartModalElement.activeContext; // Unset the active context
		}
	}


	static clearResults () {
		document.getElementById('edPmt-ln').value = Utils.formatNumericValueWithSym(0.0);
		document.getElementById('edInterest-ln').value = Utils.formatNumericValueWithSym(0.0);
		document.getElementById('edTotalPI-ln').value = Utils.formatNumericValueWithSym(0.0);
	}

	/**
	 * clearGUI() -- reset GUI's values
	 */
	static clearGUI () {
		// main window
		this.pvInput.setValue(0.0);
		this.numPmtsInput.setValue(0);
		this.rateInput.setValue(0.0);
		document.getElementById('selPmtMthd-ln').value = Globals.PMT_METHOD.ARREARS;
		this.clearResults();
	} // clearGUI


	// print the calculator `div` element
	static print () {
		Utils.printCalculator('loan-plugin');
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
		document.getElementById('hlp-title').innerHTML = loanStrings.strs.s4082;
		txt += loanStrings.strs.s4092;
		txt += loanStrings.strs.s410b;
		txt += loanStrings.strs.s411b;
		txt += loanStrings.strs.s412b;
		txt += '<br>';
		txt += loanStrings.strs.s413b; // for GPL plugin


		// update DOM once
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

		// Having this outside the activeContext test allows all plugins on a page to have their conventions updated.
		if (isCcyFormatChanged) {
			this.clearGUI();
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
		var selPmtMthd;

		let obj = JSON.parse(JSON.stringify(lc.loan_params));

		obj.pv = this.pvInput.getNumber();

		obj.n = this.numPmtsInput.getNumber();

		obj.nominalRate = this.rateInput.getNumber() / 100;

		obj.cf = 0;

		// enumerated value for annual cash flow frequency
		obj.pmtFreq = Globals.PMT_FREQUENCY.MONTHLY;

		// enumerated value for annual compounding periods
		obj.cmpFreq = Globals.CMP_FREQUENCY.MONTHLY;

		selPmtMthd = document.getElementById('selPmtMthd-ln');
		obj.pmtMthd = parseInt(selPmtMthd.value, 10);
		obj.amortMthd = Globals.AMORT_MTHD.AM_NORMAL;

		return obj;

	} // getInputs()


	/**
	 * calc() -- initialize CashInputs data structures for equation classes
	 */
	static calc () {
		let totPI, totI;

		this.clearResults();

		let obj = this.getInputs();

		if (obj.pv === 0 || obj.n === 0 || obj.nominalRate === 0) {
			// There are too many unknown values.
			// Enter "Loan Amount", "Number of Payments"\nand "Annual Interest Rate".
			Utils.showMessageModal('<p>' + loanStrings.strs.s4052 + '</p><p>' + loanStrings.strs.s4072 + '</p>');
			return []; // validation checks for an empty array
		}

		if (obj.cf === 0) {
			obj.cf = Utils.roundNumber(lc.calc(obj));
			if (obj.cf !== Infinity) {
				document.getElementById('edPmt-ln').value = Utils.formatNumericValueWithSym(-obj.cf);
			} else {
				obj.cf = 0;
			}
		}

		// schedule array
		this.schedule = lc.sourceScheduleData;

		if (this.schedule.length > 0) {
			totPI = this.schedule[this.schedule.length - 1][5];
			totI = this.schedule[this.schedule.length - 1][8];

			// results to GUI
			if (obj.cf !== 0) {
				document.getElementById('edInterest-ln').value = Utils.formatNumericValueWithSym(totI);
				document.getElementById('edTotalPI-ln').value = Utils.formatNumericValueWithSym(totPI);
			}
		}
		return this.schedule;
	} // calc()


	/**
	 * showSchedule() -- display the loan schedule
	 */
	static showSchedule () {
		const rptModalElement = document.getElementById('RPT');

		rptModalElement.activeContext = this;

		this.displayScheduleData = [];
		this.schedule = this.calc();

		if (this.schedule.length > 0) {

			this.displayScheduleData = ls.formatLoanSchedule(this.schedule, lc.summary);

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

		this.schedule = this.calc();

		if (this.schedule.length > 0) {
			LoanCharts.showCharts(this.schedule);

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
	 * @memberof LoanCalculatorHtmlInterface
	 * @returns {void}
	 */
	static initInputs () {

		// for development purposes
		// this.pvInput.setValue(DEFAULT_AMOUNT);
		// this.numPmtsInput.setValue(DEFAULT_NUM_PAYMENTS);
		// this.rateInput.setValue(DEFAULT_RATE);

		// for production - pickup site's configuration
		this.pvInput.setValue(parseFloat(document.getElementById('edPV-ln').value) || 0);
		this.numPmtsInput.setValue(parseFloat(document.getElementById('edNumPmts-ln').value) || 0);
		this.rateInput.setValue(parseFloat(document.getElementById('edRate-ln').value) || 0);

		document.getElementById('selPmtMthd-ln').value = Globals.PMT_METHOD.ARREARS;
		this.clearResults();
	}


	/**
	 * init() -- init the GUI
	 */
	static initGUI () {

		// create new editors per GUI requirements
		this.pvInput = new NE('edPV-ln', Locales.moneyConventions, Locales.moneyConventions.precision);

		this.numPmtsInput = new NE('edNumPmts-ln', Locales.numConventions, 0);
		this.numPmtsInput.isNumEditor = true;

		this.rateInput = new NE('edRate-ln', Locales.rateConventions, Locales.rateConventions.precision);
		this.rateInput.isRateEditor = true;

		// add click event handlers
		Utils.addEventListenerToElement('click', 'btnCalc-ln', this.calc, this);
		Utils.addEventListenerToElement('click', 'btnClear-ln', this.clearGUI, this);
		Utils.addEventListenerToElement('click', 'btnPrint-ln', this.print, this);

		// add change event handlers
		Utils.addEventListenerToElement('change', 'selPmtMthd-ln', Utils.updateSelectedAttribute, this);

		Modals.initializeModals(this.modalConfigs);
		this.initializeModalEvents();

		Utils.initTooltips();

		this.initInputs();

		// Initialize the zoom buttons with specific IDs
		Utils.setupZoomButtons('shrink-ln', 'grow-ln', 'original-ln');

	} // initGUI

} // class LoanCalculatorHtmlInterface


// Initialize when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function () {
	// don't try to initialize the wrong plugin
	if (!document.getElementById('loan-plugin')) {
		return;
	}

	LoanCalculatorHtmlInterface.initGUI();
});



// document.addEventListener('DOMContentLoaded', function () {
// 	// don't try to initialize the wrong plugin
// 	if (!document.getElementById('loan-plugin')) {
// 		return;
// 	}

// 	// Wait for translations to be fetched before initializing
// 	strings.fetchTranslations().then(() => {
// 		LoanCalculatorHtmlInterface.initGUI();
// 	}).catch(error => {
// 		// console.error('Error loading translations:', error);
// 		// Initialize GUI anyway, but without translations
// 		LoanCalculatorHtmlInterface.initGUI();
// 	});
// });
