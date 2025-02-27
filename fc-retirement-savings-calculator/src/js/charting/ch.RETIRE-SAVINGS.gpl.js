/**
 * @preserve Copyright 2024 Pine Grove Software, LLC
 * AccurateCalculators.com
 * pine-grove.com
 * ch.RETIRE-SAVINGS.gpl.js
 */


// localization conventions
import { Locales } from '../common/locales.gpl.js';

// string constants
import { RetireSavingsCalculatorStrings as retireSavingsStrings } from '../strings/strs.RETIRE-SAVINGS.gpl.js';

// global constants
import { Globals } from '../common/globals.gpl.js';

// utility functions
import { Utils } from '../common/utils.gpl.js';

const
	ROW_TYPE = 2,
	DATE_STR = 4,
	CREDIT = 6,
	INT = 8,
	NET = 10, // net change
	BAL = 11,
	YEAR = 13,
	THOUSANDS = 1000;

// color constants for charts
const
	// Primary Color (Green) based off: --ac-theme-primary-color: #28a745;
	PRIMARY_COLOR = 'rgba(40, 167, 69, 1)',
	// Complementary Shade (Lighter Green)
	SECONDARY_COLOR = 'rgba(102, 201, 122, 1)';

export class RetireSavingsCharts {

	static annual_inv_gain = [];
	static annual_investment = [];
	static net_change = [];
	static running_inv_gain = [];
	static running_investment = [];
	static balance = [];
	static total_investment = 0;
	static total_inv_gain = 0;
	static category = [];
	static kStr = Locales.moneyConventions.ccy_r === '' ? 'k' : ' k';
	static chart0Title;
	static chart1Title;
	static chart2Title;

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
		this.annual_inv_gain = [];
		this.annual_investment = [];
		this.net_change = [];
		this.running_inv_gain = [];
		this.running_investment = [];
		this.balance = [];
		this.category = [];
	}


	static initAnnualTotalChart () {

		// stacked bar showing annual totals, line show annual payments
		let annualBarChartData = {
			labels: this.category, // year labels for x-axis
			datasets: [{
				type: 'line',
				// label: 'Change in Balance',
				label: retireSavingsStrings.strs.s228,
				borderWidth: 1, // width in pixels
				borderColor: 'rgba(51,51,51,0.5)', // line color
				pointBackgroundColor: 'rgba(0,0,0,0.75)',
				data: this.net_change
			}, {
				type: 'bar',
				// label: 'Annual Investment',
				label: retireSavingsStrings.strs.s226,
				backgroundColor: PRIMARY_COLOR,
				data: this.annual_investment
			}, {
				type: 'bar',
				// label: 'Annual Investment Gain',
				label: retireSavingsStrings.strs.s2275,
				backgroundColor: SECONDARY_COLOR,
				data: this.annual_inv_gain
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
								return Utils.formatNumericValueWithSym(label / THOUSANDS, Locales.moneyConventions, 0) + RetireSavingsCharts.kStr;
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
				// label: 'Balance',
				label: retireSavingsStrings.strs.s224,
				borderWidth: 1, // width in pixels
				borderColor: 'rgba(151,187,205,0.5)', // line color
				pointBackgroundColor: 'rgba(0,0,0,0.75)',
				data: this.balance
			}, {
				type: 'bar',
				// label: 'Running Investment',
				label: retireSavingsStrings.strs.s234,
				backgroundColor: PRIMARY_COLOR,
				data: this.running_investment
			}, {
				type: 'bar',
				// label: 'Running Investment Gain',
				label: retireSavingsStrings.strs.s2355,
				backgroundColor: SECONDARY_COLOR,
				data: this.running_inv_gain
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
					y: {
						stacked: true,
						beginAtZero: true,
						ticks: {
							callback: function (label) {
								return Utils.formatNumericValueWithSym(label / THOUSANDS, Locales.moneyConventions, 0) + RetireSavingsCharts.kStr;
							}
						}
					}
				}
			}
		});

	} // initAccumulatedTotalChart


	static initPIPieChart () {
		let pieDataArray = [this.total_investment, this.total_inv_gain];
		let endingBalance = this.balance[this.balance.length - 1];
		// 'Total Investment', 'Gain on Investment'
		let pieLabelArray = [retireSavingsStrings.strs.s2066, retireSavingsStrings.strs.s2095];
		let pieColorArray = [PRIMARY_COLOR, SECONDARY_COLOR];

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
							// Note: the chart type determines the structure of 'context'
							label: function (context) {
								let label1 = context.dataset.label || '';
								let label2 = '';

								if (context.parsed.y !== null) {
									label1 += ' ' + Utils.formatNumericValueWithSym(context.parsed, Locales.moneyConventions, 0);
									if (endingBalance > 0) {
										label2 = ' ' + Utils.formatNumericValueWithSym(Utils.roundNumber(context.parsed / endingBalance * 100, 1), Locales.rateConventions, 1);
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
	static createSavingsCharts (schedule) {
		const MAX_YEARS = 11; // show calendar year labels for 11 years or less
		const ALTERNATE_YEARS = 3; // show calendar year labels every 3 years
		var L, i, j, transaction, bal;

		// init data structures
		j = 0;
		L = schedule.length - 1;

		// [KT] 11/13/2016 - check array is populated
		if (L > 0) {
			this.years = schedule[L][YEAR] - schedule[0][YEAR] + 1;

			for (i = 0; i <= L; i += 1) {
				transaction = schedule[i];

				if (transaction[ROW_TYPE] === Globals.ROW_TYPES.ANNUAL_TOTALS) {
					this.annual_investment.push(Utils.roundNumber(transaction[CREDIT], 0));
					this.annual_inv_gain.push(Utils.roundNumber(transaction[INT], 0));
					this.net_change.push(Utils.roundNumber(transaction[NET], 0));
					// if less than or equal to 11 years or divisible by 3, show calendar year label
					if ((this.years <= MAX_YEARS) || (j % ALTERNATE_YEARS === 0) || j === 0) {
						this.category.push(transaction[YEAR]);
					} else {
						this.category.push('');
					}
					j += 1;
				} else if (transaction[ROW_TYPE] === Globals.ROW_TYPES.RUNNING_TOTALS) {
					this.running_investment.push(Utils.roundNumber(transaction[CREDIT], 0));
					this.running_inv_gain.push(Utils.roundNumber(transaction[INT], 0));
					this.balance.push(Utils.roundNumber(bal, 0));
				} else {
					// balance from a normal transaction so it can be pushed
					bal = transaction[BAL];
				}
			} // for

			// init data for pie chart
			transaction = schedule[L];
			this.total_inv_gain = transaction[INT];
			this.total_investment = transaction[CREDIT];
			// this.payments = transaction[DEBIT];

			transaction = schedule[0];
			this.strDate = transaction[DATE_STR];

			// Annual Investment and Interest Totals
			this.chart0Title = retireSavingsStrings.strs.s229;
			// Accumulated Investment and Interest
			this.chart1Title = retireSavingsStrings.strs.s230;
			// Amount Invested & Interest as Percentage of Total Value
			this.chart2Title = retireSavingsStrings.strs.s231;

		} // L > 0

		this.initAnnualTotalChart();
		this.initAccumulatedTotalChart();
		this.initPIPieChart();
	}

	static async showCharts (schedule) {
		const isLibraryLoaded = await this.importChartJSLibrary();

		if (isLibraryLoaded) {
			this.createSavingsCharts(schedule);
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

};  // RetireSavingsCharts
