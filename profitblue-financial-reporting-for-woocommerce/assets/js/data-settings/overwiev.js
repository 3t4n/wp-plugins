const shipicker = new easepick.create({
    element: document.getElementById('cogs-datepicker'),
    css: [
        profitblue.assetsUrl + "assets/css/easepick.css?ver=" + profitblue.version,
    ],
    RangePlugin: {
        repick: true,
        tooltip: false
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
		"PresetPlugin"
    ],
	zIndex: 10,
});

document.addEventListener( 'click', function( event ) {

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

document.onsubmit = function( event ) {

	event.preventDefault();
	console.log( event );

	var cogsUploadFile = document.getElementById('fileupload'); 
	var files = cogsUploadFile.files;
	var formData = new FormData();
	var file = files[0];
	formData.append( 'fileAjax', file, file.name );
	formData.append( 'action', 'importcogs' );
	var period = document.getElementById( 'period' ).value;
	formData.append( 'period', period );
	if ( 'custom' == period ) {
		var start = document.getElementById( 'start' ).value;
		formData.append( 'start', start );
		var end = document.getElementById( 'end' ).value;
		formData.append( 'end', end );
	}

	var request = new XMLHttpRequest();
	request.open('POST', profitblue.ajaxurl, true);
	request.setRequestHeader("enctype","multipart/form-data");
	request.onload = function () {
		if (this.status >= 200 && this.status < 400) {
		
			console.log( this.response );
			location.reload();
			
		} else {
			// If fail
			console.log(this.response);
		}
	};
	request.onerror = function() {
		// Connection error
	};
	request.send( formData + '&nonce=' + profitblue.nonce );

}


document.addEventListener( 'change', function( event ) {

	console.log( event.target );
	
	if ( event.target.classList.contains( 'cost-years' ) ) {

		event.preventDefault();

		let selectedValue = event.target.value;
		console.log( selectedValue );
		let pick = document.getElementsByClassName( 'product-period' );
		let customWrap = document.getElementById( 'product-overwiev-periods-custom' );
		if ( selectedValue == 'custom-range' ) {
			if ( pick[0].classList.contains( 'hidden' ) ) {
				pick[0].classList.remove( 'hidden' );
			} else {
				pick[0].classList.add( 'hidden' );
			}
			if ( customWrap.classList.contains( 'hidden' ) ) {
				customWrap.classList.remove( 'hidden' );
			} else {
				customWrap.classList.add( 'hidden' );
			}
		} else {

			var url = event.target.getAttribute( 'data-url' );
			//console.log( url + '&period=' + selectedValue );
			window.location.replace( url + '&period=' + selectedValue );

		}
		
		/*

		let wrap = document.getElementsByClassName( 'shipping-costs-wrap' );

		var actionUrl = 'action=render_shipping_costs&period=' + selectedValue;
		var request = new XMLHttpRequest();
		request.open('POST', profitblue.ajaxurl, true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
		request.onload = function () {
			if (this.status >= 200 && this.status < 400) {
			
				console.log( this.response );
				// If successful
				var value = JSON.parse( this.response );
				if ( value.status == 'error' ) {
					wrap[0].innerHTML = value.html;
				} else {
					wrap[0].innerHTML = value.html;
				}
				if ( value.range ) {
					pick[0].value = value.range;
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
