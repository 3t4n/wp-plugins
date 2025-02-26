const legendColor = {
	beforeDraw: function (chart) {
		chart.config.data.datasets.forEach(
			(dataset,i) => {
				if (dataset.pointBackgroundColor) {
					chart.legend.legendItems[i].fillStyle = dataset.pointBackgroundColor;
				}
			}
		);
	}
};

function ReportsController() {

}

ReportsController.prototype.init = function () {
	var avg_time_taken_to_resolve = new AvgTimeTakenToResolve();
	avg_time_taken_to_resolve.init();

	new NoofTicketsPerDay().init();
	new NoofRepliesPerDay().init();
	new NoofTicketsPerStatus().init();
	new NoofTicketsPerTag().init();
	new AvgReplyTimeByAgent().init();
	new AgentSatisficationScore().init();
}

ReportsController.prototype.getFilterData = function () {
	var filters = {};
	filters.created_at = [
		jQuery( 'input[name="created_at[from]"]' ).val(),
		jQuery( 'input[name="created_at[to]"]' ).val(),
	];

	filters['agent_id'] = jQuery( 'select[name=agents]' ).val();

	return filters;
};

function AvgTimeTakenToResolve() {
}

AvgTimeTakenToResolve.prototype.id = 'avg_time_taken_to_resolve';

AvgTimeTakenToResolve.prototype.chart = undefined;

AvgTimeTakenToResolve.prototype.init = function () {
	this.chart = new Chart(
		this.id,
		{
			type: 'bar',
			data: {
				datasets: [{
					label: 'Avg time taken',
					data: [
					]
				}],
			},
			plugins: [
			legendColor
		],
			options: {
				backgroundColor: [
				'red',
				'blue',
				'green',
				'orange'
				],
				parsing: {
					xAxisKey: 'agent_name',
					yAxisKey: 'response_time',
				}
			}
		}
	);

	this.subscribe();
};

AvgTimeTakenToResolve.prototype.subscribe = function () {
	jQuery( window ).on( 'wsdesk_update_report_chart', this.update_data.bind( this ) );
};

AvgTimeTakenToResolve.prototype.update_data = function (e, filter) {
	filter        = filter || {};
	filter.action = 'wsdesk_avg_time_taken_to_resolve';

	var self = this;
	jQuery.post(
		ajaxurl,
		filter,
		function (res) {
		self.chart.data.datasets[0].data = res;
		self.chart.update();
		}
	);
}

function NoofTicketsPerDay() {
}

NoofTicketsPerDay.prototype.id = 'no_of_tickets_per_day';

NoofTicketsPerDay.prototype.chart = undefined;

NoofTicketsPerDay.prototype.init = function () {
	this.create_chart();
	this.subscribe();
};

NoofTicketsPerDay.prototype.create_chart = function () {
	this.chart = new Chart(
		this.id,
		{
			type: 'line',
			data: {
				datasets: [{
					label: 'No of Tickets per Day',
					data: [
					]
				}],
			},
			plugins: [
			legendColor
		],
			options: {
				parsing: {
					xAxisKey: 'created_at',
					yAxisKey: 'count',
				}
			},
		}
	);

};

NoofTicketsPerDay.prototype.subscribe = function () {
	jQuery( window ).on( 'wsdesk_update_report_chart', this.update_data.bind( this ) );
};

NoofTicketsPerDay.prototype.update_data = function (e, filter) {
	filter        = filter || {};
	filter.action = 'wsdesk_no_of_tickets_per_agent_per_day';

	var self = this;
	jQuery.post(
		ajaxurl,
		filter,
		function (res) {
		self.chart.destroy();
		self.create_chart();
		res.forEach(
			function (set, i) {
			self.chart.data.datasets[i] = set;
			}
		);
		self.chart.update();
		}
	);
}

function NoofRepliesPerDay() {
}

NoofRepliesPerDay.prototype.id = 'no_of_replies_per_day';

NoofRepliesPerDay.prototype.chart = undefined;

NoofRepliesPerDay.prototype.init = function () {
	this.create_chart();
	this.subscribe();
};

NoofRepliesPerDay.prototype.create_chart = function () {
	this.chart = new Chart(
		this.id,
		{
			type: 'line',
			data: {
				datasets: [{
					label: 'No of Replies  per Day',
					data: [
					]
				}],
			},
			plugins: [
			legendColor
		],
			options: {
				parsing: {
					xAxisKey: 'created_at',
					yAxisKey: 'count',
				},
			}
		}
	);
};
NoofRepliesPerDay.prototype.subscribe    = function () {
	jQuery( window ).on( 'wsdesk_update_report_chart', this.update_data.bind( this ) );
};

NoofRepliesPerDay.prototype.update_data = function (e, filter) {
	filter        = filter || {};
	filter.action = 'wsdesk_no_of_replies_by_agent_per_day';

	var self = this;
	jQuery.post(
		ajaxurl,
		filter,
		function (res) {
		self.chart.destroy();
		self.create_chart();
		res.forEach(
			function (set, i) {
			self.chart.data.datasets[i] = set;
			}
		);
		self.chart.update();
		}
	);
}

function NoofTicketsPerStatus() {
}

NoofTicketsPerStatus.prototype.id = 'no_of_tickets_per_status';

NoofTicketsPerStatus.prototype.chart = undefined;

NoofTicketsPerStatus.prototype.init = function () {
	this.chart = new Chart(
		this.id,
		{
			type: 'pie',
			data: {
				datasets: [{
					data: [
					]
				}],
			},
		}
	);

	this.subscribe();
};

NoofTicketsPerStatus.prototype.subscribe = function () {
	jQuery( window ).on( 'wsdesk_update_report_chart', this.update_data.bind( this ) );
};

NoofTicketsPerStatus.prototype.update_data = function (e, filter) {
	filter        = filter || {};
	filter.action = 'wsdesk_no_of_tickets_per_status';

	var self   = this;
	var data   = [];
	var labels = [];
	var colors = [];

	jQuery.post(
		ajaxurl,
		filter,
		function (res) {
		res.forEach(
			function (row, i) {
			data[i]   = row.count;
			labels[i] = row.title;
			colors[i] = row.badge_color;
			}
		);
		self.chart.data.labels                      = labels;
		self.chart.data.datasets[0].data            = data;
		self.chart.data.datasets[0].backgroundColor = colors;
		self.chart.update();
		}
	);
}

function NoofTicketsPerTag() {
}

NoofTicketsPerTag.prototype.id = 'no_of_tickets_per_tag';

NoofTicketsPerTag.prototype.chart = undefined;

NoofTicketsPerTag.prototype.init = function () {
	this.chart = new Chart(
		this.id,
		{
			type: 'bar',
			data: {
				datasets: [{
					data: [
					]
				}],
			},
			options: {
				plugins: {
					legend: {
						display: false,
						labels: {
							color: 'rgb(255, 99, 132)'
						}
					}
				},
				backgroundColor: [
				'red',    // color for data at index 0
				'blue',   // color for data at index 1
				'green',  // color for data at index 2
				'black',  // color for data at index 3
				],
				parsing: {
					xAxisKey: 'title',
					yAxisKey: 'count',
				}
			}
		}
	);

	this.subscribe();
};

NoofTicketsPerTag.prototype.subscribe = function () {
	jQuery( window ).on( 'wsdesk_update_report_chart', this.update_data.bind( this ) );
};

NoofTicketsPerTag.prototype.update_data = function (e, filter) {
	filter        = filter || {};
	filter.action = 'wsdesk_no_of_tickets_per_tag';

	var self = this;
	jQuery.post(
		ajaxurl,
		filter,
		function (res) {
		self.chart.data.datasets[0].data = res;
		self.chart.update();
		}
	);
};

function AvgReplyTimeByAgent() {
}

AvgReplyTimeByAgent.prototype.id = 'agent_avg_reply_time';

AvgReplyTimeByAgent.prototype.chart = undefined;

AvgReplyTimeByAgent.prototype.init = function () {
	this.chart = new Chart(
		this.id,
		{
			type: 'bar',
			data: {
				datasets: [{
					axis: 'y',
					fill: false,
					data: [
					]
				}],
			},
			options: {
				plugins: {
					legend: {
						display: false,
					}
				},
				backgroundColor: [
				'red',    // color for data at index 0
				'blue',   // color for data at index 1
				'green',  // color for data at index 2
				'black',  // color for data at index 3
				],
				parsing: {
					xAxisKey: 'diff_in_minutes',
					yAxisKey: 'agent_name',
				},
				indexAxis: 'y'
			}
		}
	);

	this.subscribe();
};

AvgReplyTimeByAgent.prototype.subscribe = function () {
	jQuery( window ).on( 'wsdesk_update_report_chart', this.update_data.bind( this ) );
};

AvgReplyTimeByAgent.prototype.update_data = function (e, filter) {
	filter        = filter || {};
	filter.action = 'wsdesk_agent_avg_reply_time';

	var self = this;
	jQuery.post(
		ajaxurl,
		filter,
		function (res) {
		var labels = [];
		res.forEach(
			function (row, i) {
			labels[i] = row.agent_name;
			}
		);
		self.chart.data.labels           = labels;
		self.chart.data.datasets[0].data = res;
		self.chart.update();
		}
	);
};

function AgentSatisficationScore() {
}

AgentSatisficationScore.prototype.id = 'agent_satisfication_score';

AgentSatisficationScore.prototype.table = undefined;

AgentSatisficationScore.prototype.init = function () {
	this.table = jQuery( '#' + this.id );
	this.subscribe();
};

AgentSatisficationScore.prototype.subscribe = function () {
	jQuery( window ).on( 'wsdesk_update_report_chart', this.update_data.bind( this ) );
};

AgentSatisficationScore.prototype.emojis = [
	'&#128533',
	'&#128533',
	'&#128532',
	'&#128528',
	'&#128512',
	'&#128513',
];

AgentSatisficationScore.prototype.drawTable = function (data) {
	this.table.find( 'tbody' ).html( '' );

	var rows = '';
	var self = this;

	data.forEach(
		function (row) {
		var html = '<tr>';
		html    += '<td>' + row.agent_name + '</td>';
		html    += '<td>' + row.good + '</td>';
		html    += '<td>' + row.bad + '</td>';
		html    += '<td>' + row.total + '</td>';
		html    += '<td class="h4">' + self.emojis[Math.ceil( row.score / 20 )] + ' ' + row.score + '% </td>';
		html    += '</tr>';

		rows += html;
		}
	);

	this.table.find( 'tbody' ).html( rows );
};

AgentSatisficationScore.prototype.update_data = function (e, filter) {
	filter        = filter || {};
	filter.action = 'wsdesk_agent_satisfication_score';

	var self = this;
	jQuery.post(
		ajaxurl,
		filter,
		function (res) {
		self.drawTable( res );
		}
	);
};

window.ReportsController = ReportsController;
