/**
 * @preserve Copyright 2024 Pine Grove Software, LLC
 * AccurateCalculators.com
 * pine-grove.com
 * ch.AUTO-LOAN.gpl.js
 */


// localization conventions
import { Locales } from '../common/locales.gpl.js';

// string constants
import { AutoLoanCalculatorStrings as autoStrings } from '../strings/strs.AUTO-LOAN.gpl.js';

// global constants
import { Globals } from '../common/globals.gpl.js';

// utility functions
import { Utils } from '../common/utils.gpl.js';

const
	ROW_TYPE = 2,
	DATE_STR = 4,
	CF = 5, // cash flow
	INT = 8,
	PRIN = 9,
	BAL = 11,
	YEAR = 13,
	THOUSANDS = 1000;

// color constants for charts
const
	// Primary Color (Green) based off: --ac-theme-primary-color: #28a745;
	PRIMARY_COLOR = 'rgba(40, 167, 69, 1)',
	// Complementary Shade (Lighter Green)
	SECONDARY_COLOR = 'rgba(102, 201, 122, 1)';
	// Analogous (Blue)
	// THIRD_COLOR = 'rgba(40, 120, 167, 1)',
	// Analogous (Yellow)
	// FOURTH_COLOR = 'rgba(229, 194, 57, 1)',
	// Complementary (Red)
	// FIFTH_COLOR = 'rgba(204, 61, 61, 1)';

export class AutoLoanCharts {

	static annual_int = [];
	static annual_prin = [];
	static annual_pmt = [];
	static running_int = [];
	static running_prin = [];
	static running_pmt = [];
	static bal = [];
	static category = [];
	static kStr = Locales.moneyConventions.ccy_r === '' ? 'k' : ' k';

	static async importChartJSLibrary () {
		if (this.chartModule) {
			// Chart.js is already loaded.
			return true;
		}

		try {
			// Dynamically import the script
			this.chartModule = await import('../chartjs/chart.esm.js'); // chart module
			// Store the Chart constructor
			this.Chart = this.chartModule.default; // chart instance
			// Chart.js has been successfully imported.
			return true;
		} catch (error) {
			// eslint-disable-next-line no-console
			console.error('Failed to import Chart.js:', error);
			return false;
		}
	}


	// reset data arrays
	static clear () {
		this.L = 0;
		this.annual_int = [];
		this.annual_prin = [];
		this.annual_pmt = [];
		this.running_int = [];
		this.running_prin = [];
		this.running_pmt = [];
		this.bal = [];
		this.category = [];
	}

	static initAnnualTotalChart () {

		// stacked bar showing annual totals, line show annual payments
		let annualBarChartData = {
			labels: this.category, // year labels for x-axis
			datasets: [{
				type: 'line',
				// 'Payment',
				label: autoStrings.strs.s221,
				borderWidth: 1, // width in pixels
				borderColor: 'rgba(51,51,51,0.5)', // line color
				pointBackgroundColor: 'rgba(0,0,0,0.75)',
				data: this.annual_pmt // annual total payment
			}, {
				type: 'bar',
				// 'Principal',
				label: autoStrings.strs.s223,
				backgroundColor: PRIMARY_COLOR,
				data: this.annual_prin // annual principal totals
			}, {
				type: 'bar',
				// 'Interest',
				label: autoStrings.strs.s222,
				backgroundColor: SECONDARY_COLOR,
				data: this.annual_int // annual interest totals
			}]
		};

		// get a canvas to draw on
		var ctx = document.getElementById('canvas1').getContext('2d');

		// allocate and initialize a chart
		this.annualTotals = new this.Chart(ctx, {
			data: annualBarChartData,
			options: {
				plugins: {
					title: {
						display: true,
						text: this.chart0Title
					}
				},
				tooltips: {
					mode: 'label',
					callbacks: {
						label: function (tooltipItems) {
							return Utils.formatNumericValueWithSym(tooltipItems.yLabel, Locales.moneyConventions, 0);
						}
					}
				},
				responsive: true,
				scales: {
					x: {
						stacked: true
					},
					y: {
						stacked: true,
						beginAtZero: true,
						ticks: {
							callback: function (label) {
								return Utils.formatNumericValueWithSym(label / THOUSANDS, Locales.moneyConventions, 0) + AutoLoanCharts.kStr;
							}
						}
					}
				}
			}
		});

	} // initAnnualTotalChart


	static initAccumulatedTotalChart () {
		// stacked bar showing annual totals, lines show annual payments and balance
		let runningBarChartData = {
			labels: this.category, // years along the x-axis
			datasets: [{
				type: 'line',
				yAxisID: 'y-axis-1',
				// 'Balance',
				label: autoStrings.strs.s224,
				borderWidth: 1, // width in pixels
				borderColor: 'rgba(151,187,205,0.5)', // line color
				pointBackgroundColor: 'rgba(0,0,0,0.75)',
				data: this.bal
			}, {
				type: 'line',
				// 'Payment',
				label: autoStrings.strs.s221,
				yAxisID: 'y-axis-0',
				borderWidth: 1, // width in pixels
				borderColor: 'rgba(51,51,51,0.5)', // line color
				pointBackgroundColor: 'rgba(0,0,0,0.75)',
				data: this.running_pmt
			}, {
				yAxisID: 'y-axis-0',
				// 'Principal',
				label: autoStrings.strs.s223,
				backgroundColor: PRIMARY_COLOR,
				data: this.running_prin
			}, {
				yAxisID: 'y-axis-0',
				// 'Interest',
				label: autoStrings.strs.s222,
				backgroundColor: SECONDARY_COLOR,
				data: this.running_int
			}]

		};

		// get a canvas to draw on
		var ctx = document.getElementById('canvas2').getContext('2d');

		// allocate and initialize a chart
		this.runningTotals = new this.Chart(ctx, {
			type: 'bar',
			data: runningBarChartData,
			options: {
				plugins: {
					title: {
						display: true,
						text: this.chart1Title
					}
				},
				tooltips: {
					mode: 'label',
					callbacks: {
						label: function (tooltipItems) {
							return Utils.formatNumericValueWithSym(tooltipItems.yLabel, Locales.moneyConventions, 0);
						}
					}
				},
				responsive: true,
				scales: {
					x: {
						stacked: true
					},
					'y-axis-0': {
						stacked: true,
						beginAtZero: true,
						position: 'left',
						ticks: {
							beginAtZero: true,
							suggestedMax: this.running_pmt[this.running_pmt.length - 1],
							callback: function (label) {
								return Utils.formatNumericValueWithSym(label / THOUSANDS, Locales.moneyConventions, 0) + AutoLoanCharts.kStr;
							}
						}
					},
					'y-axis-1': {
						position: 'right',
						ticks: {
							callback: function (label) {
								return Utils.formatNumericValueWithSym(label / THOUSANDS, Locales.moneyConventions, 0) + AutoLoanCharts.kStr;
							}
						}
					}
				}
			}
		});

	} // initAccumulatedTotalChart


	/**
	 * Tooltip:
	 * 1. Calculate and Round Percentage: exactPercentage is the raw, unrounded percentage. roundedPercentage is rounded to the nearest tenth.
	 * 2. Track Cumulative Percentage: cumulativePercentage adds up the roundedPercentage values for each tooltip item.
	 * 3. Check for Last Element: If this is the last dataset item, calculate the discrepancy between cumulativePercentage and 100.
	 * 4. Apply Adjustment: Add the discrepancy to the last segment’s percentage to ensure the total equals exactly 100%.
	 */
	static initPIPieChart () {
		let pieDataArray = [this.prin, this.interest];
		// 'Total Principal', 'Total Interest'
		let pieLabelArray = [autoStrings.strs.s226, autoStrings.strs.s227];
		let pieColorArray = [PRIMARY_COLOR, SECONDARY_COLOR];
		let cumulativePercentage = 0; // Add this outside the label function if needed across multiple calls

		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: pieDataArray,
					backgroundColor: pieColorArray
				}],
				labels: pieLabelArray
			},
			options: {
				responsive: true,
				plugins: {
					title: {
						display: true,
						text: this.chart2Title
					},
					tooltip: {
						callbacks: {
							label: function (context) {
								let label1 = context.dataset.label || '';
								let label2 = '';

								if (context.parsed.y !== null) {
									label1 += ' ' + Utils.formatNumericValueWithSym(context.parsed, Locales.moneyConventions, 0);

									if (AutoLoanCharts.payments > 0) {
										// Calculate exact percentage for this slice
										let exactPercentage = (context.parsed / AutoLoanCharts.payments * 100);
										let roundedPercentage = Math.round(exactPercentage * 10) / 10; // Round to nearest tenth

										// Track cumulative percentage
										cumulativePercentage += roundedPercentage;

										// Check if this is the last element by comparing with total dataset count
										if (context.datasetIndex === context.chart.data.datasets[0].data.length - 1) {
											// Make final adjustment if cumulative percentage is off
											let discrepancy = 100 - cumulativePercentage;

											roundedPercentage += discrepancy; // Adjust last segment
										}

										label2 = ' ' + Utils.formatNumericValueWithSym(roundedPercentage, Locales.rateConventions, 1);
									}
								}
								return [label1, label2];
							}
						}
					}
				}
			}
		};

		// get a canvas to draw on
		var ctx = document.getElementById('canvas3').getContext('2d');

		// allocate and initialize a chart
		this.totalsPie = new this.Chart(ctx, config);

	} // initPIPieChart


	// initialize data structures needed for conventional loan charts
	static createLoanCharts (schedule) {
		const ELEVEN = 11;
		const THREE = 3;
		let L, i, j, transaction, bal;

		// init data structures
		j = 0;
		L = schedule.length - 1;
		// [KT] 11/13/2016 - check array is populated
		if (schedule.length > 0) {
			this.years = schedule[L][YEAR] - schedule[0][YEAR] + 1;

			for (i = 0; i <= L; i += 1) {
				transaction = schedule[i];
				if (transaction[ROW_TYPE] === Globals.ROW_TYPES.ANNUAL_TOTALS) {
					// if annual payments and year has no payment (when loan is originated), do not include.
					this.annual_pmt.push(Math.round(transaction[CF]));
					this.annual_int.push(Math.round(transaction[INT]));
					this.annual_prin.push(Math.round(transaction[PRIN]));
					// if less than or equal to 11 years or divisible by 3, show calendar year label
					if ((this.years <= ELEVEN) || (j % THREE === 0) || j === 0) {
						this.category.push(transaction[YEAR]);
					} else {
						this.category.push('');
					}
					j += 1;
				} else if (transaction[ROW_TYPE] === Globals.ROW_TYPES.RUNNING_TOTALS) {
					this.running_pmt.push(Math.round(transaction[CF]));
					this.running_int.push(Math.round(transaction[INT]));
					this.running_prin.push(Math.round(transaction[PRIN]));
					this.bal.push(bal);
				} else {
					// balance from a normal transaction
					bal = Math.round(transaction[BAL]);
				}
			} // for

			// init data for pie chart
			transaction = schedule[L];
			this.interest = transaction[INT];
			this.prin = transaction[PRIN];
			this.payments = transaction[CF];

			transaction = schedule[0];
			this.strDate = transaction[DATE_STR];  // EQ.dateMath.customDateStrFromDate(transaction.dTransDate);
			// last transaction date
			transaction = schedule[L - 2];
			this.strDate2 = transaction[DATE_STR];

			// Annual Principal and Interest Totals
			this.chart0Title = autoStrings.strs.s229;
			// Accumulated Principal and Interest with Remaining Balance
			this.chart1Title = autoStrings.strs.s230;
			// Total Principal and Interest
			this.chart2Title = autoStrings.strs.s231;
		} // L > 0

		this.initAnnualTotalChart();
		this.initAccumulatedTotalChart();
		this.initPIPieChart();
	} // createLoanCharts


	static async showCharts (schedule) {
		const isLibraryLoaded = await this.importChartJSLibrary();

		if (isLibraryLoaded) {
			this.createLoanCharts(schedule);
		} else {
			// eslint-disable-next-line no-console
			console.error('Cannot create charts without Chart.js library.');
		}
	}


	static destroy () {
		this.annualTotals.destroy();
		this.annualTotals = null;
		this.runningTotals.destroy();
		this.runningTotals = null;
		this.totalsPie.destroy();
		this.totalsPie = null;
		this.clear();
	}

};  // AutoLoanCharts
