<?php
global $records_by_day;
?>

<div style="margin-bottom:20px; padding-top:10px;">

	<div id="flot_chart" style="width:100%;height:400px;"></div>

    <p>This shows the number of optins performed by day.</p>

	<script type="text/javascript">
	jQuery(function () {
		var d = [];
		
		<?php
		$one_day = 60 * 60 * 24 * 1;
		
		if( $records_by_day )
		{
			$iter = 0;
			
			$records_by_day = array_reverse( $records_by_day, true );
			
			foreach( $records_by_day as $key => $value )
			{
				$iter++;
				
				echo 'd.push( ['.$key.'000,'.count($value).'] );';
				
			}
		} ?>
	
		// first correct the timestamps - they are recorded as the daily
		// midnights in UTC+0100, but Flot always displays dates in UTC
		// so we have to add one hour to hit the midnights in the plot
		for (var i = 0; i < d.length; ++i)
		  d[i][0] += 60 * 60 * 1000;
	 
		// helper for returning the weekends in a period
		function weekendAreas(axes) {
			var markings = [];
			var d = new Date(axes.xaxis.min);
			// go to the first Saturday
			d.setUTCDate(d.getUTCDate() - ((d.getUTCDay() + 1)))
			d.setUTCSeconds(0);
			d.setUTCMinutes(0);
			d.setUTCHours(0);
			var i = d.getTime();
			do {
				// when we don't set yaxis, the rectangle automatically
				// extends to infinity upwards and downwards
				markings.push({ xaxis: { from: i, to: i + 1 * 24 * 60 * 60 * 1000 } });
				i += 2 * 24 * 60 * 60 * 1000;
			} while (i < axes.xaxis.max);
	 
			return markings;
		}
		
		var options = {
			threshold: { below: 10, color: "rgb(200, 20, 30)" },
			legend: { position: 'sw' },
			xaxis:
			{
				mode: "time",
				tickLength: 1,
				tickSize: [1, "day"],
				timeformat: "%b-%d"
			},	
			yaxis: 
			{ 
				tickDecimals: 0,
				//min: 1,
				//max: 100,
				//transform: function (v) { return -v; }
			},
			series: {
				lines: { show: true },
				points: { show: true },
				bars: { show: false, barWidth: 50.3, align:'center', fill: true }
			},	
			grid: { 
				markings: weekendAreas,
				backgroundColor: { colors: ["#fff", "#fff"] }
			}
			
		};
		
		var plot = jQuery.plot(jQuery("#flot_chart"), [{ label: "Optins per Day",  data: d}], options);
	});
	</script>
	
</div>