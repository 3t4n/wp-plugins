jQuery(document).ready(function () {        

	if( jQuery('.demo-gauge').length ) {

		// it doesn`t insert it at the read, it runs in a better way spending less memory. explanation here: http://www.kirupa.com/forum/showthread.php?370037-How-to-insert-a-script-tag-into-head-element-using-jQuery
		jQuery("<script src='"+location.origin+"/wp-content/plugins/gauge-meter-slider/jqwidgets/jqxcore.js'></script>").appendTo("head");
		jQuery("<script src='"+location.origin+"/wp-content/plugins/gauge-meter-slider/jqwidgets/jqxdata.js'></script>").appendTo("head");
		jQuery("<script src='"+location.origin+"/wp-content/plugins/gauge-meter-slider/jqwidgets/jqxchart.js'></script>").appendTo("head");
		jQuery("<script src='"+location.origin+"/wp-content/plugins/gauge-meter-slider/jqwidgets/jqxgauge.js'></script>").appendTo("head");
		jQuery("<script src='"+location.origin+"/wp-content/plugins/gauge-meter-slider/jqwidgets/jqxbuttons.js'></script>").appendTo("head");
		jQuery("<script src='"+location.origin+"/wp-content/plugins/gauge-meter-slider/jqwidgets/jqxslider.js'></script>").appendTo("head");
		jQuery("<script src='"+location.origin+"/wp-content/plugins/gauge-meter-slider/scripts/demos.js'></script>").appendTo("head");

		jQuery('#gauge').jqxGauge({ startAngle: 0 });
		jQuery('#gauge').jqxGauge({ endAngle: 180 });
			
		jQuery('#gauge').jqxGauge({
			ranges: [{ startValue: 0, endValue: 4, style: { fill: '#4cb848', stroke: '#4cb848' }, startDistance: 0, endDistance: 0 },
					 { startValue: 4, endValue: 6, style: { fill: '#fad00b', stroke: '#fad00b' }, startDistance: 0, endDistance: 0 },
					 { startValue: 6, endValue: 10, style: { fill: '#e53d37', stroke: '#e53d37' }, startDistance: 0, endDistance: 0}],
			cap: { size: '5%', style: { fill: '#2e79bb', stroke: '#2e79bb'} },
			border: { style: { fill: '#8e9495', stroke: '#7b8384', 'stroke-width': 1 } },
			ticksMinor: { interval: 0.5, size: '5%' },
			ticksMajor: { interval: 1, size: '10%' },       
			labels: { position: 'outside', interval: 1 },
			pointer: { style: { fill: '#2e79bb' }, width: 5 },
			animationDuration: 1500,
			max: 10
		});
		jQuery('#slider').jqxSlider({ min: 0, max: 10, mode: 'fixed', ticksFrequency: 0.5, width: 150, value: 2.5,  showButtons: true });
		jQuery('#slider').mousedown(function () {
			jQuery('#gauge').jqxGauge('value', jQuery('#slider').jqxSlider('value'));
		});
		jQuery('#slider').on('slideEnd', function (e) {
			jQuery('#gauge').jqxGauge('value', e.args.value);
		});
		jQuery('#slider').on('mousewheel', function () {
			jQuery('#gauge').jqxGauge('value', jQuery('#slider').jqxSlider('value'));
		});
		jQuery('#gauge').jqxGauge('value', 2.5);
		
		
	}
	
});