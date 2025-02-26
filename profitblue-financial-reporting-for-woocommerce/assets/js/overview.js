const shipicker = new easepick.create({
    element: document.getElementById('overview-datepicker'),
    css: [
        profitblue.assetsUrl + "assets/css/easepick.css?ver=" + profitblue.version,
    ],
    RangePlugin: {
        repick: true,
        tooltip: false
    },
	LockPlugin: {
		minDate: new Date(profitblue.ThisMonthStart),
		maxDate: new Date(profitblue.ThisMonthEnd)
	},
    PresetPlugin: {
		customLabels: [],
        customPreset: {
			'Today': [new Date(profitblue.TodayStart), new Date(profitblue.TodayStart)],
			'Yesterday': [new Date(profitblue.YesterdayStart), new Date(profitblue.YesterdayStart)],
			'This Week': [new Date(profitblue.ThisWeekStart), new Date(profitblue.ThisWeekEnd)],
			'This Month': [new Date(profitblue.ThisMonthStart), new Date(profitblue.ThisMonthEnd)]			
		},
		position: 'left'
	},
    plugins: [
        "RangePlugin",
		"LockPlugin",
        "PresetPlugin"
    ],
	zIndex: 10,
	setup(shipicker) {
		shipicker.on('select', (e) => {
		   
			var targetUrl = document.getElementById( 'overview' ).getAttribute( 'data-url' );
			let selectedValue = document.getElementById('overview-datepicker').value;
			window.location.replace( targetUrl + '&period=' + selectedValue );

			let mode = document.getElementById( 'main-graph-mode' ).value;
			targetUrl += '&period=' + selectedValue + '&mode=' + mode;
			window.location.replace( targetUrl );

		});
	}
});



/**
 * Select 2 and load category data for overwiev
 * 
 */
jQuery(document).ready(function() {

	

    jQuery('.category-select').select2();
	jQuery('.category-select').select2().on('select2:select', function (event) {
		console.log( event.target.value );

		event.preventDefault();
		console.log( event.target );
		var term = event.target.value;
		var id = event.target.getAttribute( 'data-id' );
		var actionUrlBase = 'action=get_overwiev_category_data';
		
		let dateStart = event.target.getAttribute( 'data-start' );
		let dateEnd = event.target.getAttribute( 'data-end' );
		actionUrlBase += '&start=' + dateStart + '&end=' + dateEnd + '&term=' + term;		
		
		var request = new XMLHttpRequest();
		request.open('POST', profitblue.ajaxurl, true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
		request.onload = function () {
			if (this.status >= 200 && this.status < 400) {
			
				var value = JSON.parse( this.response );
				document.getElementById( 'overview-category-item-' + id ).innerHTML = value.html;	
				console.log( value.data );

			} else {
				// If fail
				console.log(this.response);
			}
		};
		request.onerror = function() {
			// Connection error
		};
		request.send( actionUrlBase + '&nonce=' + profitblue.nonce );

	});

 
	let drawAdsChartSource = document.getElementById( 'drawAdsChart' );
	if ( drawAdsChartSource ) {
		let drawAdsChartType = drawAdsChartSource.getAttribute( 'data-type' );
		let drawAdsChartData = drawAdsChartSource.getAttribute( 'data-ads-data' );

		if ( drawAdsChartType == 'days' ) {

			//Ads 
			google.charts.load('current', {'packages':['corechart', 'bar','line']});
			google.charts.setOnLoadCallback(drawAdsChart);

			function drawAdsChart() {
				var adsData = [
					['', '' ],
					drawAdsChartData
				];
				var adsChartData = google.visualization.arrayToDataTable( adsData );
				var adsChart = new google.visualization.ColumnChart(document.getElementById('overview-ad-data'));
				adsChart.draw(adsChartData);			
			}	

		} else {

			//Ads 
			google.charts.load('current', {'packages':['corechart', 'bar','line']});
			google.charts.setOnLoadCallback(drawAdsChart);

			function drawAdsChart(drawAdsChartData, drawAdsChartSource) {

				let dataString = drawAdsChartSource.getAttribute( 'data-string' );
				let label = drawAdsChartSource.getAttribute( 'data-label' );
				let columnsArray = drawAdsChartData.split(',');

				var adsData = new google.visualization.DataTable();
				adsData.addColumn('string', label);

				columnsArray.forEach(function(value) {
					adsData.addColumn('number', value.trim());
					adsData.addColumn({type:'string', role:'annotationText'});
				});

				adsData.addRows([dataString]);

				var options = {
					chart: {
						title: '',
						subtitle: ''
					},
					'height': 400,
					pointSize: 20,
					pointsVisible: true
				};


				var chart = new google.charts.Line(document.getElementById('overview-ad-data'));
				chart.draw(adsData, google.charts.Line.convertOptions(options));
			}
			
		}

	}


});

document.addEventListener( 'click', function( event ) {

	if ( event.target.classList.contains( 'overview-category-item-select' ) ) {

		event.preventDefault();
		console.log( event.target );
		if ( event.target.classList.contains( 'open' ) ) {
			event.target.classList.remove( 'open' );
		} else {
			event.target.classList.add( 'open' );
		}

	}

	if ( event.target.classList.contains( 'orders-overwiev-icon' ) ) {

		console.log( event.target );

		let orderId = event.target.getAttribute( 'data-id' );
		let orderLines = document.getElementsByClassName( 'item-details-' + orderId );

		if ( event.target.classList.contains( 'open' ) ) {
			event.target.classList.remove( 'open' );
			if ( orderLines.length > 0 ) {
				for (var i = 0; i < orderLines.length; i++) {
					orderLines[i].classList.remove( 'open' );
				}
			}
		} else {
			event.target.classList.add( 'open' );
			if ( orderLines.length > 0 ) {
				for (var i = 0; i < orderLines.length; i++) {
					orderLines[i].classList.add( 'open' );
				}
			}
		}						

	}


	if ( event.target.classList.contains( 'category-select-dropdown-item' ) ) {
		event.preventDefault();
		console.log( event.target );
		var term = event.target.getAttribute( 'data-term' );
		var id = event.target.getAttribute( 'data-id' );
		var actionUrlBase = 'action=get_best_seller_product';
		
		let dateStart = event.target.getAttribute( 'data-start' );
		let dateEnd = event.target.getAttribute( 'data-end' );
		actionUrlBase += '&start=' + dateStart + '&end=' + dateEnd + '&term=' + term;		
		
		var request = new XMLHttpRequest();
		request.open('POST', profitblue.ajaxurl, true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
		request.onload = function () {
			if (this.status >= 200 && this.status < 400) {
			
				var value = JSON.parse( this.response );
				document.getElementById( 'overview-category-item-' + id ).innerHTML = value.html;	

			} else {
				// If fail
				console.log(this.response);
			}
		};
		request.onerror = function() {
			// Connection error
		};
		request.send( actionUrlBase + '&nonce=' + profitblue.nonce );

	}
	

	
	if ( event.target.classList.contains( 'products-overwiev-tab' ) ) {

		event.preventDefault();
		var tabList = document.getElementsByClassName( 'products-overwiev-tab' );
		if ( tabList.length > 0 ) {
			for (var i = 0; i < tabList.length; i++) {
				tabList[i].classList.remove( 'active-item' );						
			}
		}
		event.target.classList.add( 'active-item' );
		var targetTab = event.target.getAttribute( 'data-tab' );
		var targetTabs = document.getElementsByClassName( 'products-overwiev-tab-target ' );
		if ( targetTabs.length > 0 ) {
			for (var i = 0; i < targetTabs.length; i++) {
				targetTabs[i].classList.remove( 'active-tab' );						
			}
		}
		document.getElementById( targetTab ).classList.add( 'active-tab' );

	}

	if ( event.target.classList.contains( 'overview-recalculate-button' ) ) {

		event.preventDefault();
		var countOrders = event.target.getAttribute( 'data-count' );
		console.log( countOrders );

		let modalcontent = document.getElementById( 'modal-content' );
		modalcontent.innerHTML = '<h2>Recalculate all orders data</h2>';
		modalcontent.innerHTML += '<p>Are you sure? This action cannot be undone.</p>';
		modalcontent.innerHTML += '<div class="modal-progress-bar" id="modal-progress-bar"><div class="modal-progress-bar-inner"><div class="modal-progress-value"></div></div></div>';
		modalcontent.innerHTML += '<div class="modal-save-button"><a href="#" class="btn modal-recalculate-orders" id="modal-recalculate-orders">Recalculate</a></div>';
		modalcontent.innerHTML += '<div class="modal-spinner" id="modal-spinner"><div class="modal-spinner-img"></div></div>';
		MicroModal.show( 'modal-quickview' );

	}

	if ( event.target.classList.contains( 'modal-recalculate-orders' ) ) {
		event.preventDefault();

		document.getElementById( 'modal-recalculate-orders' ).style.display = 'none';
		document.getElementById( 'modal-spinner' ).style.display = 'flex';

		proccess_order_recalculate();

	}

	if ( event.target.classList.contains( 'save-cogs-form' ) ) {

		event.preventDefault();
		let modalcontent = document.getElementById( 'modal-content' );
		let period = event.target.getAttribute( 'data-period' );
		let dates = '';
		let dateStart = event.target.getAttribute( 'data-start' );
		let dateEnd = event.target.getAttribute( 'data-end' );
		if ( dateStart ) {
			dates += ' data-start="' + dateStart + '"';
		}
		if ( dateEnd ) {
			dates += ' data-end="' + dateEnd + '"';
		}
		modalcontent.innerHTML = '';
		modalcontent.innerHTML = '<p class="are-you-sure">Are you sure you want to save new data?</p><div class="modal-save-button"><a href="#" class="btn modal-save-form" data-period="' + period + '" ' + dates + '>SAVE</a></div>';
		
		MicroModal.show( 'modal-quickview' );

	}

	if ( event.target.classList.contains( 'modal-save-form' ) ) {

		event.preventDefault();

		var actionUrlBase = 'action=save_cogs_products_data';
		let period = event.target.getAttribute( 'data-period' );
		let products = '';
		let items = document.getElementsByClassName( 'item-cogs' );
		if ( items.length > 0 ) {
			for (var i = 0; i < items.length; i++) {
				if ( items[i].value ) {
					var productId = items[i].getAttribute( 'data-product' );
					products += productId + '-' + items[i].value + '-';
					document.getElementById( 'item-cogs-' + productId ).classList.remove( 'no-cogs' );
				}		
			}
		}

		var actionUrl = actionUrlBase + '&period=' + period + '&products=' + products;

		if ( period == 'custom' ) {
			let dateStart = event.target.getAttribute( 'data-start' );
			let dateEnd = event.target.getAttribute( 'data-end' );
			actionUrl += '&start=' + dateStart + '&end=' + dateEnd;
		}
		
		var request = new XMLHttpRequest();
		request.open('POST', profitblue.ajaxurl, true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
		request.onload = function () {
			if (this.status >= 200 && this.status < 400) {
			
				console.log( this.response );				
				MicroModal.close( 'modal-quickview' );			

			} else {
				// If fail
				console.log(this.response);
			}
		};
		request.onerror = function() {
			// Connection error
		};
		request.send( actionUrl + '&nonce=' + profitblue.nonce );

	}

	if ( event.target.classList.contains( 'save-product-custom' ) ) {

		event.preventDefault();
		let customPeriod = document.getElementById( 'cogs-datepicker' ).value;
		console.log( customPeriod );
		if ( customPeriod ) {

			var actionUrlBase = 'action=save_cogs_custom_period';
			var actionUrl = actionUrlBase + '&period=' + customPeriod;
			sendRequest( actionUrl, 'product-overwiev-periods-custom' );

		} 

	}	

});
document.addEventListener( 'change', function( event ) {
	console.log( event.target );
});

document.getElementById( 'overview' ).addEventListener( 'change', function( event ) {
	
	console.log( event.target );

	if ( event.target.classList.contains( 'category-select' ) ) {

		console.log( event.target.value );

	}
	
	if ( event.target.classList.contains( 'product-datepicker-datepicker' ) ) {

		event.preventDefault();

		/*var targetUrl = document.getElementById( 'overview' ).getAttribute( 'data-url' );
		let selectedValue = event.target.value;
		console.log( selectedValue );
		window.location.replace( targetUrl + '&period=' + selectedValue );*/

	}
	if ( event.target.classList.contains( 'main-graph-mode' ) ) {

		console.log( 'test' );
	
		var targetUrl = document.getElementById( 'overview' ).getAttribute( 'data-url' );
		let selectedValue = document.getElementById('overview-datepicker').value;
		let mode = event.target.value;
		targetUrl += '&period=' + selectedValue + '&mode=' + mode;
		window.location.replace( targetUrl );
	
	}
});

function uploadCogs( event ) {

	console.log( event );

	let period = event.target.getAttribute( 'data-period' );
	console.log( period );

	/*let formData = new FormData(); 
  	formData.append( "file", fileupload.files[0] );

	var request = new XMLHttpRequest();
	request.open('POST', profitblue.ajaxurl, true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
	request.onload = function () {
		if (this.status >= 200 && this.status < 400) {
			
			console.log( this.response );
			// If successful
			var value = JSON.parse( this.response );
			if ( value.status == 'error' ) {
				modalcontent.innerHTML = value.html;
				MicroModal.show( 'modal-quickview' );
			} else {
				if ( target == 'modal' ) {
					modalcontent.innerHTML = value.html;
					MicroModal.show( 'modal-quickview' );
				} else {
					document.getElementById( target ).innerHTML = value.html;
				}
			}					

		} else {
			// If fail
			console.log(this.response);
		}
	};
	request.onerror = function() {
		// Connection error
	};
	request.send( actionUrl + '&nonce=' + profitblue.nonce );
*/
}


function sendRequest( actionUrl, target ) {

	console.log( actionUrl );

	var modalcontent = document.getElementById( 'modal-content' );
	var request = new XMLHttpRequest();
	request.open('POST', profitblue.ajaxurl, true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
	request.onload = function () {
		if (this.status >= 200 && this.status < 400) {
			
			console.log( this.response );
			// If successful
			var value = JSON.parse( this.response );
			if ( value.status == 'error' ) {
				modalcontent.innerHTML = value.html;
				MicroModal.show( 'modal-quickview' );
			} else {
				if ( target == 'modal' ) {
					modalcontent.innerHTML = value.html;
					MicroModal.show( 'modal-quickview' );
				} else {
					document.getElementById( target ).innerHTML = value.html;
				}
			}					

		} else {
			// If fail
			console.log(this.response);
		}
	};
	request.onerror = function() {
		// Connection error
	};
	request.send( actionUrl + '&nonce=' + profitblue.nonce );

	
}


function proccess_order_recalculate() {

	let actionUrl = 'action=recalculate_orders_data';

	let progressBar = document.getElementById( 'modal-progress-bar' );
	let modalcontent = document.getElementById( 'modal-content' );

	var request = new XMLHttpRequest();
	request.open('POST', profitblue.ajaxurl, true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
	request.onload = function () {
	if (this.status >= 200 && this.status < 400) {
	
		console.log( this.response );
		var value = JSON.parse( this.response );
		if ( value.status == 'continue' ) {
			progressBar.innerHTML = value.html;
			proccess_order_recalculate();
		} else {
			modalcontent.innerHTML = value.html;			
		}							

	} else {
		// If fail
		console.log(this.response);
	}
	};
	request.onerror = function() {
		// Connection error
	};
	request.send( actionUrl + '&nonce=' + profitblue.nonce );

}



google.charts.load('current', {packages: ['corechart', 'bar','line']});	
google.charts.setOnLoadCallback( drawColColors );

function drawColColors() {

	const mainGraphData = document.getElementById( 'mainGraphData' )

	let ordersByDateString = mainGraphData.getAttribute('data-orders-by-date');
	let formattedOrdersByDateString = "[" + ordersByDateString + "]";
	let ordersByDateArray = JSON.parse(formattedOrdersByDateString);

	const mainGraphActualYearLabel = mainGraphData.getAttribute( 'data-actual-year' );
	const mainGraphLastYearLabel = mainGraphData.getAttribute( 'data-last-year' );

	var data = new google.visualization.DataTable();
	data.addColumn('string', 'Date');
	data.addColumn('number', ' - ' + mainGraphLastYearLabel );
	data.addColumn('number', ' - ' + mainGraphActualYearLabel);
	data.addRows(ordersByDateArray);

	var options = {
		colors: ['#fe0000','#00bbfe'],
		chartArea: {
			width: '70%',
			left:'10%'
		}
	};

	var chart = new google.visualization.ColumnChart(document.getElementById('overview-main-graph-inner'));
	chart.draw(data, options);

	let profitDataSource = document.getElementById( 'profitData' );
	console.log(profitDataSource);
	let netProfitData = profitDataSource.getAttribute( 'data-net-profit' );
	let netProfitDataArray = netProfitData.split(/,(?![^\']*\'[^\']*$)/).map(item => item.trim().replace(/^'/, "").replace(/'$/, ""));
	netProfitDataArray[1] = parseFloat(netProfitDataArray[1]);

	let cogsData = profitDataSource.getAttribute( 'data-cogs' );
	let cogsDataArray = cogsData.split(/,(?![^\']*\'[^\']*$)/).map(item => item.trim().replace(/^'/, "").replace(/'$/, ""));
	cogsDataArray[1] = parseFloat(cogsDataArray[1]);

	let taxesData = profitDataSource.getAttribute( 'data-taxes' );
	let taxesDataArray = taxesData.split(/,(?![^\']*\'[^\']*$)/).map(item => item.trim().replace(/^'/, "").replace(/'$/, ""));
	taxesDataArray[1] = parseFloat(taxesDataArray[1]);

	let variableData = profitDataSource.getAttribute( 'data-variable' );
	let variableDataArray = variableData.split(/,(?![^\']*\'[^\']*$)/).map(item => item.trim().replace(/^'/, "").replace(/'$/, ""));
	variableDataArray[1] = parseFloat(variableDataArray[1]);

	let fixedData = profitDataSource.getAttribute( 'data-fixed' );
	let fixedDataArray = fixedData.split(/,(?![^\']*\'[^\']*$)/).map(item => item.trim().replace(/^'/, "").replace(/'$/, ""));
	fixedDataArray[1] = parseFloat(fixedDataArray[1]);

	var profitData = [
		['', '', { role: 'style' } ],
		netProfitDataArray,
		cogsDataArray,
		taxesDataArray,
		variableDataArray,
		fixedDataArray
	];
	console.log( profitData );

	var profitChartData = google.visualization.arrayToDataTable( profitData );
	var profitChart = new google.visualization.ColumnChart(document.getElementById('overview-analysis-net-content-data'));
    profitChart.draw(profitChartData);

	// Create the data table.
	var customAnalysisData = new google.visualization.DataTable();
	customAnalysisData.addColumn('string', 'Topping');
	customAnalysisData.addColumn('number', 'Slices');

	let fixedDataSource = document.getElementById( 'fixedData' );
	let fixedTypes = fixedDataSource.getAttribute( 'data-types' );
	let fixedColors = fixedDataSource.getAttribute( 'data-colors' );

	try {
		fixedTypes = JSON.parse(fixedTypes); 
		fixedColors = JSON.parse(fixedColors);
	} catch (e) {
		console.error('Error parsing data:', e);
	}
	
	console.log( fixedTypes );
	console.log( fixedColors );

	customAnalysisData.addRows(fixedTypes);
	

	// Set chart options
	var chartOptions = {
		'colors': fixedColors,
		legend: 'none',
		chartArea: {
			width: '500',
			height: '400',
			left: 0
		},		
	};

	// Instantiate and draw our chart, passing in some options.
	var chart = new google.visualization.PieChart(document.getElementById('overview-analysis-custom-content-data'));
	chart.draw(customAnalysisData, chartOptions);


}

let overviewDiv = document.getElementById( 'overview' );
let width = overviewDiv.offsetWidth;
console.log( width );
gridResize( width );
leastResize( width );
mostResize( width );

document.addEventListener( 'DOMContentLoaded', function () {
		new Splide( '#splide-main', {
			type   : 'slide',
			rewind: true,
			perPage: 5,
			perMove: 1,
			gap:'10px',
			start:0,
			pagination: false,
			arrows: 'splide__arrows your-class-arrows',
			arrow : 'splide__arrow your-class-arrow',
			prev  : 'splide__arrow--prev your-class-prev',
			next  : 'splide__arrow--next your-class-next'
		} ).mount();
		new Splide( '#splide-most', {
			type   : 'slide',
			rewind: true,
			perPage: 5,
			perMove: 1,
			gap:'10px',
			pagination: false,
			arrows: 'splide__arrows your-class-arrows',
			arrow : 'splide__arrow your-class-arrow',
			prev  : 'splide__arrow--prev your-class-prev',
			next  : 'splide__arrow--next your-class-next'
		} ).mount();
		new Splide( '#splide-least', {
			type   : 'slide',
			rewind: true,
			perPage: 5,
			perMove: 1,
			gap:'10px',
			pagination: false,
			arrows: 'splide__arrows your-class-arrows',
			arrow : 'splide__arrow your-class-arrow',
			prev  : 'splide__arrow--prev your-class-prev',
			next  : 'splide__arrow--next your-class-next'
		} ).mount();
});	

addEventListener("resize", (event) => {
	
	let targetDiv = document.getElementById( 'overview-product-sold-analysis' );
	let width = targetDiv.offsetWidth;	
	gridResize( width );
	leastResize( width );
	mostResize( width );

});

function gridResize( width ) {
	let grids = document.getElementsByClassName( 'splide-main' );
	if ( grids.length > 0 ) {
		for (var i = 0; i < grids.length; i++) {
			grids[i].style.width = ( width - 40 ) + 'px';			
		}
	}	
}

function leastResize( width ) {
	let grids = document.getElementsByClassName( 'splide-least' );
	if ( grids.length > 0 ) {
		for (var i = 0; i < grids.length; i++) {
			grids[i].style.width = ( width - 40 ) + 'px';			
		}
	}	
}
function mostResize( width ) {
	let grids = document.getElementsByClassName( 'splide-most' );
	if ( grids.length > 0 ) {
		for (var i = 0; i < grids.length; i++) {
			grids[i].style.width = ( width - 40 ) + 'px';			
		}
	}	
}

