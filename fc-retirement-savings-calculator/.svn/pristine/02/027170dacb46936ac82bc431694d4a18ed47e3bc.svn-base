/**
 * -----------------------------------------------------------------------------
 * (c) 2016-2025 Pine Grove Software, LLC -- All rights reserved.
 * Contact: webmaster@AccurateCalculators.com
 * License: Commercial
 * www.AccurateCalculators.com
 * -----------------------------------------------------------------------------
 * interface for HTML retirement savings calculator plus plugin
 * -----------------------------------------------------------------------------
 */

/**
 * @preserve Copyright 2016-2025 Pine Grove Software, LLC
 * AccurateCalculators.com
 * License: Commercial
 * interface.RETIRE-SAVINGS-PLUS.gpl.js
 */


// RetirementSavingsCalculatorStrings
import { RetireSavingsCalculatorStrings as retireSavingsStrings } from '../strings/strs.RETIRE-SAVINGS.gpl.js';

// localization conventions
import { Locales } from '../common/locales.gpl.js';

// global constants
import { Globals } from '../common/globals.gpl.js';

// equation methods
import { RetireSavingsCalculation as rsc } from '../calculations/eq.RETIRE-SAVINGS.gpl.js';

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
import { HtmRetireSavingsSchedule as rss } from '../schedules/sch.RETIRE-SAVINGS.gpl.js';

// charts
import { RetireSavingsCharts } from '../charting/ch.RETIRE-SAVINGS.gpl.js';

// const DEFAULT_AMOUNT = 350_000.00;
// const DEFAULT_NUM_PAYMENTS = 360;
// const DEFAULT_RATE = 5.25

export class RetireSavingsCalculatorHtmlInterface {

	static currentAgeInput = null;
	static retireAgeInput = null;
	static pvInput = null;
	static rateInput = null;
	static fvInput = null;
	static schedule = []; // raw schedule data
	static displayScheduleData = []; // a formatted schedule
	static current_ccy_format = null;
	static current_date_format = null;
	static showingMessage = false;

	static modalConfigs = [
		{
			modalId: 'CURRENCYDATE',
			initModal: { buttonId: 'CCY-rs', modalElementId: 'CURRENCYDATE', callback: this.showCURRENCYDATEModal, context: this, initCallback: null },
			eventHandlers: [
				{ elementId: 'CURRENCYDATE_save', eventType: 'click', callback: this.onCURRENCYDATESaveClick, context: this }
			]
		},
		{
			// example for configuring a modal that will be opened and inialized using JavaScript - not in response to a 'click'
			modalId: 'RPT',
			initModal: { buttonId: 'btnSchedule-rs', modalElementId: 'RPT', callback: this.showSchedule.bind(this), context: this }
		},
		{
			modalId: 'CHART',
			initModal: { buttonId: 'btnCharts-rs', modalElementId: 'CHART', callback: this.showCharts.bind(this), context: this }
		},
		{
			modalId: 'HLP',
			// optional initCallback: property for static data initialization callback (help text is not static if more than one plugin is used on a page)
			initModal: { buttonId: 'btnHelp-rs', modalElementId: 'HLP', callback: this.showHLPModal, context: this, initCallback: null }
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
			RetireSavingsCharts.destroy();

			// Clear the active context on close
			delete chartModalElement.activeContext; // Unset the active context
		}
	}


	static clearResults () {
		document.getElementById('edCF-rs').value = Utils.formatNumericValueWithSym(0.0);
		document.getElementById('edNumPmts-rs').value = Utils.formatNumericValueWithSym(0, Locales.numConventions, 0);
		document.getElementById('edTotalInvested-rs').value = Utils.formatNumericValueWithSym(0.0);
		document.getElementById('edInterest-rs').value = Utils.formatNumericValueWithSym(0.0);
		document.getElementById('edFinalValue-rs').value = Utils.formatNumericValueWithSym(0.0);
		document.getElementById('edFVDate-rs').value = Locales.dateConventions.date_mask;	// don't show a date
	}

	/**
	 * clearGUI() -- reset GUI's values
	 */
	static clearGUI () {
		// main window
		this.currentAgeInput.setValue(0);
		this.retireAgeInput.setValue(0);
		this.pvInput.setValue(0.0);
		this.rateInput.setValue(0.0);
		this.fvInput.setValue(0.0);
		this.clearResults();
	} // clearGUI


	// print the calculator `div` element
	static print () {
		Utils.printCalculator('retire-savings-plugin'); // print the calculator via ID
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
		document.getElementById('hlp-title').innerHTML = retireSavingsStrings.strs.s411f;
		txt += retireSavingsStrings.strs.s412f;
		txt += retireSavingsStrings.strs.s413f;
		txt += retireSavingsStrings.strs.s414f;
		// txt += '<br>';
		txt += retireSavingsStrings.strs.s415f; // for GPL plugin

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
			this.currentAgeInput.resetConventions(ccy_format);
			this.retireAgeInput.resetConventions(ccy_format);
			this.pvInput.resetConventions(ccy_format);
			this.rateInput.resetConventions(ccy_format);
			this.fvInput.resetConventions(ccy_format);
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

		let obj = JSON.parse(JSON.stringify(rsc.retirement_params));

		obj.currentAge = this.currentAgeInput.getNumber();
		obj.retireAge = this.retireAgeInput.getNumber();
		obj.pv = this.pvInput.getNumber();
		// obj.cf = this.cfInput.getNumber();
		obj.nominalRate = this.rateInput.getNumber() / 100;
		obj.fv = this.fvInput.getNumber();

		// enumerated value for annual cash flow frequency
		obj.pmtFreq = Globals.PMT_FREQUENCY.MONTHLY;

		// enumerated value for annual compounding periods
		obj.cmpFreq = Globals.CMP_FREQUENCY.MONTHLY;

		// enumerated value
		obj.pmtMthd = Globals.PMT_METHOD.ARREARS;

		return obj;
	} // getInputs()


	/**
	 * calc() -- initialize CashInputs data structures for equation classes
	 */
	static calc () {
		const PERIODS_PER_YEAR = 12;
		let nInvestments, invested, interest, yrs;

		this.clearResults();
		let obj = this.getInputs();

		if (obj.currentAge <= 0) {
			// '"Current Age" must be greater than 0.'
			Utils.showMessageModal('<p>' + retireSavingsStrings.strs.s4016 + '</p>');
			return null;
		}
		if (obj.retireAge > obj.currentAge) {
			yrs = (obj.retireAge - obj.currentAge) + 1;
		} else {
			// '"Retirement Age" must be greater than "Current Age"'
			Utils.showMessageModal('<p>' + retireSavingsStrings.strs.s410f + '</p>');
			return null;
		}
		obj.n = yrs * PERIODS_PER_YEAR;

		obj.cf = rsc.calc(obj);
		this.schedule = rsc.sourceScheduleData;
		if (this.schedule.length > 0) {
			obj.fv = rsc.summary.unadjustedBalance;
			nInvestments = rsc.summary.totalNCredits;
			invested = rsc.summary.totalPmts[0];
			interest = rsc.summary.totalInterest[0];
			document.getElementById('edCF-rs').value = Utils.formatNumericValueWithSym(obj.cf);
			document.getElementById('edNumPmts-rs').value = Utils.formatNumericValueWithSym(nInvestments, Locales.numConventions, 0);
			document.getElementById('edTotalInvested-rs').value = Utils.formatNumericValueWithSym(Utils.roundNumber(invested, Locales.moneyConventions.precision), Locales.moneyConventions, Locales.moneyConventions.precision);
			document.getElementById('edInterest-rs').value = Utils.formatNumericValueWithSym(Utils.roundNumber(interest, Locales.moneyConventions.precision), Locales.moneyConventions, Locales.moneyConventions.precision);
			document.getElementById('edFinalValue-rs').value = Utils.formatNumericValueWithSym(obj.fv, Locales.moneyConventions, Locales.moneyConventions.precision);
			document.getElementById('edFVDate-rs').value = rsc.summary.lastCreditDateStr;
		}
		return this.schedule;
	} // calc()


	static showSchedule () {
		const rptModalElement = document.getElementById('RPT');

		rptModalElement.activeContext = this;

		this.displayScheduleData = [];
		this.schedule = this.calc();

		if (this.schedule.length > 0) {

			this.displayScheduleData = rss.formatRetirementSchedule(this.schedule, rsc.summary);

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

		this.schedule = this.calc();

		if (this.schedule.length > 0) {
			RetireSavingsCharts.showCharts(this.schedule);

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
	 * @memberof RetireSavingsCalculatorHtmlInterface
	 * @returns {void}
	 */
	static initInputs () {

		// for development purposes, use constants
		// this.pvInput.setValue(DEFAULT_AMOUNT);

		// for production - pickup site's configuration
		this.currentAgeInput.setValue(parseFloat(document.getElementById('edCurrentAge-rs').value) || 0);
		this.retireAgeInput.setValue(parseFloat(document.getElementById('edRetirementAge-rs').value) || 0);
		this.pvInput.setValue(parseFloat(document.getElementById('edPV-rs').value) || 0);
		this.rateInput.setValue(parseFloat(document.getElementById('edRate-rs').value) || 0);
		this.fvInput.setValue(parseFloat(document.getElementById('edFV-rs').value) || 0);

		this.clearResults();
	}


	/**
	 * init() -- init the GUI
	 */
	static initGUI () {

		// create new editors per GUI requirements
		this.currentAgeInput = new NE('edCurrentAge-rs', Locales.numConventions, 0);
		this.currentAgeInput.isNumEditor = true;
		this.retireAgeInput = new NE('edRetirementAge-rs', Locales.numConventions, 0);
		this.retireAgeInput.isNumEditor = true;
		this.pvInput = new NE('edPV-rs', Locales.moneyConventions, Locales.moneyConventions.precision);
		this.rateInput = new NE('edRate-rs', Locales.rateConventions, Locales.rateConventions.precision);
		this.rateInput.isRateEditor = true;
		this.fvInput = new NE('edFV-rs', Locales.moneyConventions, Locales.moneyConventions.precision);

		// add click event handlers
		Utils.addEventListenerToElement('click', 'btnCalc-rs', this.calc, this);
		Utils.addEventListenerToElement('click', 'btnClear-rs', this.clearGUI, this);
		Utils.addEventListenerToElement('click', 'btnPrint-rs', this.print, this);

		// add change event handlers here - if there were any

		Modals.initializeModals(this.modalConfigs);
		this.initializeModalEvents();

		Utils.initTooltips();

		this.initInputs();

		// Initialize the zoom buttons with specific IDs
		Utils.setupZoomButtons('shrink-rs', 'grow-rs', 'original-rs');

	} // initGUI

} // class RetireSavingsCalculatorHtmlInterface


// Initialize when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function () {
	// don't try to initialize the wrong plugin
	if (!document.getElementById('retire-savings-plugin')) {
		return;
	}

	RetireSavingsCalculatorHtmlInterface.initGUI();
});