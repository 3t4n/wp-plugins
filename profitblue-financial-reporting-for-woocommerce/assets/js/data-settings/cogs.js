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

	//console.log( event.target );
	
	if ( event.target.classList.contains( 'cogs-search' ) ) {
		this.getElementById( 'cogs-search-form' ).submit();
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
		modalcontent.innerHTML = '<p class="are-you-sure">' + profitblue.sureCogs + '</p><p class="are-you-sure">' + profitblue.sureCogsInfo + '</p><div class="modal-save-button"><a href="#" class="btn modal-save-form" data-period="' + period + '" ' + dates + '>SAVE</a></div>';
		
		MicroModal.show( 'modal-quickview' );

	}

	if ( event.target.classList.contains( 'modal-save-form' ) ) {

		event.preventDefault();

		var actionUrlBase = 'action=save_cogs_products_data';
		let period = event.target.getAttribute( 'data-period' );
		let products = '';
		let items = document.getElementsByClassName( 'changed' );
		
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
			
				//console.log( this.response );

				document.getElementById( 'modal-content' ).innerHTML = '<p class="modal-spinner-container"><span class="modal-spinner">' + profitblue.spinner + '</span></p>';
				
				var value = JSON.parse( this.response );
				if ( value.status == 'all' ) {
					MicroModal.close( 'modal-quickview' );
					//document.getElementById( 'modal-content' ).innerHTML = value.html;
				} else {
					document.getElementById( 'modal-content' ).innerHTML = '<p class="modal-spinner-container"><span class="modal-spinner">'  + profitblue.spinner +  '</span></p><p>' + profitblue.cogsInfo + '</p>' + value.html;
					processBatch ( value.count );
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

	if ( event.target.classList.contains( 'product-show-check' ) ) {

		var url = event.target.getAttribute( 'data-url' );
		//console.log( url );
		if ( event.target.classList.contains( 'active' ) ) {
			event.target.classList.remove( 'active' );
			this.location.href = url;
		} else {
			event.target.classList.add( 'active' );
			this.location.href = url + '&show=cogs';
		}
	}

	if ( event.target.classList.contains( 'save-product-custom' ) ) {

		event.preventDefault();
		let customPeriod = document.getElementById( 'cogs-datepicker' ).value;
		//console.log( customPeriod );
		if ( customPeriod ) { 

			var actionUrlBase = 'action=save_cogs_custom_period';
			var actionUrl = actionUrlBase + '&period=' + customPeriod;

			var modalcontent = document.getElementById( 'modal-content' );
			var request = new XMLHttpRequest();
			request.open('POST', profitblue.ajaxurl, true);
			request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
			request.onload = function () {
				if (this.status >= 200 && this.status < 400) {
					
					//console.log( this.response );
					// If successful
					var value = JSON.parse( this.response );
					if ( value.status == 'error' ) {
						modalcontent.innerHTML = value.html;
						MicroModal.show( 'modal-quickview' );
					} else {
												
						modalcontent.innerHTML = value.popup;
						MicroModal.show( 'modal-quickview' );
						document.getElementById( 'product-overwiev-periods-custom' ).innerHTML = value.html;

						processBatch ( value.count );						

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

	}

	//Load more button
	if ( event.target.classList.contains( 'paggination-more-button' ) ) {

		event.preventDefault();

		let actionUrlBase = 'action=load_more_cogs';
		let offset = event.target.getAttribute( 'data-current' );
		let periodType = event.target.getAttribute( 'data-type' );
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

		if ( event.target.getAttribute( 'data-search' ) ) {
			actionUrlBase += '&search='  + event.target.getAttribute( 'data-search' );
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
					var productListContent = document.getElementById( 'products-list' ).innerHTML;
					document.getElementById( 'products-list' ).innerHTML = productListContent + value.html;
				} else {
					var paginationTarget = document.getElementById( 'product-pagination-container' );
					paginationTarget.innerHTML = value.pagination;
					var productListContent = document.getElementById( 'products-list' ).innerHTML;
					document.getElementById( 'products-list' ).innerHTML = productListContent + value.html;
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

	if ( event.target.classList.contains( 'data-popup-delete' ) ) {

		event.preventDefault();

		let actionUrlBase = 'action=delete_cogs_data';
		let targetId = event.target.getAttribute( 'data-id' );
		var actionUrl = actionUrlBase + '&periodid=' + targetId;

		document.getElementById( 'data-item-date-' + targetId ).remove();
		
		
		var request = new XMLHttpRequest();
		request.open('POST', profitblue.ajaxurl, true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
		request.onload = function () {
			if (this.status >= 200 && this.status < 400) {
				var modalcontent = document.getElementById( 'modal-content' );
				var value = JSON.parse( this.response );				
				modalcontent.innerHTML = value.html;
				MicroModal.show( 'modal-quickview' );
				
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

	if ( event.target.classList.contains( 'data-item-delete' ) ) {

		event.preventDefault();
		let targetId = event.target.getAttribute( 'data-id' );
		let modalcontent = document.getElementById( 'modal-content' );
		
		modalcontent.innerHTML = '';
		modalcontent.innerHTML = '<p class="are-you-sure">' + profitblue.deleteCogs + '</p><p class="are-you-sure">' + profitblue.deleteCogsInfo + '</p><div class="modal-save-button"><a href="#" class="btn data-popup-delete" data-id="' + targetId + '">' + profitblue.deleteText + '</a></div>';
		
		MicroModal.show( 'modal-quickview' );

	}

});

document.onsubmit = function( event ) {

	console.log( event.target );
	//console.log( event.target.getAttribute( 'id' ) );
	
	if ( event.target.getAttribute( 'id' ) != 'cogs-search-form' ) {

		event.preventDefault();

		document.getElementById( 'bulk-cogs-overlay' ).classList.add( 'active' );
		let modalcontent = document.getElementById( 'modal-content' );

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
				var value = JSON.parse( this.response );				
				if ( value.status == 'all' ) {
					document.getElementById( 'bulk-cogs-overlay' ).classList.remove( 'active' );
					modalcontent.innerHTML = value.html;
					MicroModal.show( 'modal-quickview' );					
					//location.reload();
				} else if ( value.status == 'continue' ) {					
					modalcontent.innerHTML = value.html;
					MicroModal.show( 'modal-quickview' );
					processBatch ( value.count );
				}			
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

}

document.addEventListener( 'change', function( event ) {
	
	if ( event.target.classList.contains( 'item-cogs' ) ) {
		event.target.classList.add( 'changed' );
	}

});

function uploadCogs( event ) {

	//console.log( event );

	let period = event.target.getAttribute( 'data-period' );
	//console.log( period );

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

	var modalcontent = document.getElementById( 'modal-content' );
	var request = new XMLHttpRequest();
	request.open('POST', profitblue.ajaxurl, true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
	request.onload = function () {
		if (this.status >= 200 && this.status < 400) {
			
			//console.log( this.response );
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

function processBatch ( count ) {
	var actionUrl = 'action=process_cogs_batch&count=' + count;		
	var request = new XMLHttpRequest();
	request.open('POST', profitblue.ajaxurl, true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
	request.onload = function () {
		if (this.status >= 200 && this.status < 400) {
		
			var value = JSON.parse( this.response );
			if ( value.status == 'all' ) {
				document.getElementById( 'modal-content' ).innerHTML = value.html;
			} else {
				document.getElementById( 'modal-content' ).innerHTML = '<p class="modal-spinner-container"><span class="modal-spinner">'  + profitblue.spinner +  '</span></p>' + value.html;

				processBatch ( value.count )
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

// Listen for the scroll event on the window
window.addEventListener('scroll', function() {
	// Get the element you want to fix
	var divToFix = document.getElementById('product-lists-header');
  
	// Get the target element after which you want to fix the div
	var triggerElement = document.getElementById('products-list');
  
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