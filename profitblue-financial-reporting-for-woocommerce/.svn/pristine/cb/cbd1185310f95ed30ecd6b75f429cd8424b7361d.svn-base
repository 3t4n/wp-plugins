const shipicker = new easepick.create({
    element: ".product-datepicker-datepicker",
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
		   
			var targetUrl = document.getElementById( 'product-overwiev' ).getAttribute( 'data-url' );
			let selectedValue = document.getElementById('overview-datepicker').value;
			window.location.replace( targetUrl + '&period=' + selectedValue );

			/*let mode = document.getElementById( 'main-graph-mode' ).value;
			targetUrl += '&period=' + selectedValue + '&mode=' + mode;
			window.location.replace( targetUrl );*/

		});
	}
})
window.addEventListener('DOMContentLoaded', (event) => {
	if ( document.getElementById( 'product-overwiev' ) ) {
		var count = document.getElementById( 'product-overwiev' ).getAttribute( 'data-notexists' );
		if ( count > 0 ) {
			create_products();
		}
	}
});
document.addEventListener( 'click', function( event ) {

	//Export modal
	if ( event.target.classList.contains( 'csv-export-products' ) ) {

		event.preventDefault();

		var modalWrap = document.getElementById( 'modal-quickview' );
		modalWrap.classList.add( 'cogs-popup' );
		var url = 'action=products_get_modal'
		var period = event.target.getAttribute( 'data-period' );
		url += '&period=' + period;
		
		sendRequest( url, 'modal' );		

	}

	//Load more button
	if ( event.target.classList.contains( 'paggination-more-button' ) ) {

		event.preventDefault();

		let actionUrlBase = 'action=load_more_products';
		let offset = event.target.getAttribute( 'data-current' );
		let periodType = event.target.getAttribute( 'data-periodtype' );
		let search = event.target.getAttribute( 'data-search' );
		if ( periodType == 'id' ) {
			let periodId = event.target.getAttribute( 'data-periodid' );
			actionUrlBase += '&offset='  + offset + '&period-id=' + periodId;
		} else{
			let periodYear = event.target.getAttribute( 'data-periodyear' );
			actionUrlBase += '&offset='  + offset + '&period-year=' + periodYear;
		}
		if ( event.target.getAttribute( 'data-url' ) ) {
			actionUrlBase += '&urlstring='  + event.target.getAttribute( 'data-url' );
		}
		if ( event.target.getAttribute( 'data-show' ) ) {
			actionUrlBase += '&show='  + event.target.getAttribute( 'data-show' );
		}
		if ( search != 'empty' ) {
			actionUrlBase += '&search='  + search;
		}
		
		
		var request = new XMLHttpRequest();
		request.open('POST', profitblue.ajaxurl, true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
		request.onload = function () {
			if (this.status >= 200 && this.status < 400) {
			
				//console.log( this.response );	
				var value = JSON.parse( this.response );
				if ( value.products == 'empty' ) {
					var paginationTarget = document.getElementById( 'product-pagination-container' );
					paginationTarget.innerHTML = value.pagination;
					var productListContent = document.getElementById( 'product-overwiev' ).innerHTML;
					document.getElementById( 'product-overwiev' ).innerHTML = productListContent + value.html;
				} else {
					var paginationTarget = document.getElementById( 'product-pagination-container' );
					paginationTarget.innerHTML = value.pagination;
					var productListContent = document.getElementById( 'product-overwiev' ).innerHTML;
					document.getElementById( 'product-overwiev' ).innerHTML = productListContent + value.html;
				}			

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
	
	//Load more button on product detail
	if ( event.target.classList.contains( 'product-orders' ) ) {

		event.preventDefault();

		let actionUrlBase = 'action=load_more_product_orders';
		let count = event.target.getAttribute( 'data-orders' );
		let productid = event.target.getAttribute( 'data-productid' );
		let startDate = event.target.getAttribute( 'data-start-date' );
		let endDate = event.target.getAttribute( 'data-end-date' );
		let items = document.getElementsByClassName( 'orders-overwiev-item' );
		let elementsWithClass = document.getElementsByClassName( 'orders-overwiev-item-details' );
		actionUrlBase += '&count='+count+'&items='+items.length+'&productid='+productid+'&startdate='+startDate+'&enddate='+endDate;
		var lastItem = elementsWithClass[elementsWithClass.length - 1];
		var request = new XMLHttpRequest();
		request.open('POST', profitblue.ajaxurl, true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
		request.onload = function () {
			if (this.status >= 200 && this.status < 400) {
			
				//console.log( this.response );	
				var value = JSON.parse( this.response );
				lastItem.insertAdjacentHTML('afterend', value.html);		
				if ( value.orders == 'empty' ) {
					document.getElementById( 'order-pagination-container' ).style.display = 'none';
				}

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

});

document.getElementById( 'product-overwiev' ).addEventListener( 'change', function( event ) {
	
	console.log( event.target );

	if ( event.target.classList.contains( 'main-graph-mode' ) ) {

		console.log( 'test' );
	
		var targetUrl = document.getElementById( 'product-overwiev' ).getAttribute( 'data-url' );
		let selectedValue = document.getElementById('overview-datepicker').value;
		let mode = event.target.value;
		targetUrl += '&period=' + selectedValue + '&mode=' + mode;
		window.location.replace( targetUrl );
	
	}
});

function sendRequest( actionUrl ) {

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
			if ( value.status == 'debug' ) {
				modalcontent.innerHTML = this.response;				
			}
			if ( value.status == 'error' ) {
				modalcontent.innerHTML = value.html;
			} else {
				modalcontent.innerHTML = value.html;
				if ( value.target == 'modal' ) {
					MicroModal.show( 'modal-quickview' );
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
	data.addColumn('number', ' - ' + mainGraphLastYearLabel);
	data.addColumn('number', ' - ' + mainGraphActualYearLabel );	
	data.addRows(ordersByDateArray);

	var options = {
		colors: ['#fe0000','#00bbfe'],
		chartArea: {
			width: '70%',
			left: 0
		}
	};

	var chart = new google.visualization.ColumnChart(document.getElementById('overview-main-graph-inner'));
	chart.draw(data, options);


}


// Listen for the scroll event on the window
window.addEventListener('scroll', function() {
	// Get the element you want to fix
	var divToFix = document.getElementById('product-overwiev-header');
  
	// Get the target element after which you want to fix the div
	var triggerElement = document.getElementById('product-overwiev');
  
	// Calculate the distance of the triggerElement from the top of the page
	var triggerTop = triggerElement.getBoundingClientRect().top + window.scrollY;
  
	// Check if the triggerElement is at the top of the page
	if (window.scrollY >= triggerTop) {
	  // Fix the div by setting it to position absolute and moving it with the scroll
	  divToFix.style.position = 'fixed';
	  divToFix.style.top = '32px';
	  var width = triggerElement.clientWidth;
	  divToFix.style.width = width + 'px';
	  divToFix.classList.add( 'fixed' );
	} else {
	  // Reset if we're not at the trigger point
	  divToFix.style.position = 'relative';
	  divToFix.style.top = '';
	  divToFix.style.width = 'auto';
	  divToFix.classList.remove( 'fixed' );
	}
});

function create_products() {

	var modalcontent = document.getElementById( 'modal-content' );
	let actionUrlBase = 'action=create_products';
	var request = new XMLHttpRequest();
	request.open('POST', profitblue.ajaxurl, true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
	request.onload = function () {
	
		if (this.status >= 200 && this.status < 400) {
		
			var value = JSON.parse( this.response );
			//console.log( this.value );	
			if ( value.remains == 'empty' ) {
				location.reload();
			} else {
				modalcontent.innerHTML = value.html;
				MicroModal.show( 'modal-quickview' );
				create_products();				
			}			

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