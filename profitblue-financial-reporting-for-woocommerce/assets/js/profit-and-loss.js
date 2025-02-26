document.addEventListener( 'change', function( event ) {

	if ( event.target.classList.contains( 'cost-years' ) ) {
		
		event.preventDefault();
		let selectedValue = event.target.value;
		console.log( selectedValue );		
		var url = event.target.getAttribute( 'data-url' );
		window.location.replace( url + '&period=' + selectedValue );
				
	}
});

document.addEventListener( 'DOMContentLoaded', function () {

	let wrap = document.getElementById( 'profit-and-loss' );
	let width = wrap.offsetWidth;
	let monthWidth = document.getElementsByClassName( 'profit-and-loss-months-item' );
	let maxWidth = 0;
	if ( monthWidth.length > 0 ) {
		for ( var i = 0; i < monthWidth.length; i++ ) {
			maxWidth += monthWidth[i].offsetWidth;
		}
	}
	
		maxWidth = ( width - 400 ) - maxWidth;
		
		var startPosition = 0;
		//if ( width < 1400 ) {
			jQuery( '.profit-and-loss--months-inner' ).draggable( {
				axis: "x",
				start: function( event, ui ) {
					startPosition = ui.position.left;
				},
				drag: function( event, ui ) {
					var leftPosition = ui.position.left;
					if (leftPosition < maxWidth ) {
						ui.position.left = maxWidth;
					} else if ( leftPosition > -1 ) {
						ui.position.left = 0;
					}

				}
			});
		//}
	
});	

addEventListener("resize", (event) => {

	let wrap = document.getElementById( 'profit-and-loss' );
	let width = wrap.offsetWidth;
	if ( width > 1600 ) {
		document.getElementById( 'profit-and-loss--months-inner' ).classList.remove( 'ui-draggable-handle' );
		document.getElementById( 'profit-and-loss--months-inner' ).classList.remove( 'ui-draggable' );
	}
	tableResize( width );
	
});

function tableResize( width ) {
	let grids = document.getElementsByClassName( 'profit-and-loss-months' );
	if ( grids.length > 0 ) {
		for (var i = 0; i < grids.length; i++) {
			grids[i].style.width = ( width - 400 ) + 'px';			
		}
	}	
}

document.addEventListener( 'click', function( event ) {

	if ( event.target.classList.contains( 'pnl-export' ) ) {
		
		event.preventDefault();
		var data = [];
		var labelsArray = [];		
		var labelsWrap = document.getElementsByClassName( 'profit-and-loss-labels-inner' );
		var labels = labelsWrap[0].getElementsByTagName( 'div' );
		if ( labels.length > 0 ) {
			for (var i = 0; i < labels.length; i++) {
				labelsArray.push( labels[i].innerText );
			}
		}

		var monthsArray = [];
		var monthsWrap = document.getElementsByClassName( 'profit-and-loss-months-item' );

		if ( monthsWrap.length > 0 ) {
		
			for (var iterator = 0; iterator < monthsWrap.length; iterator++) {
			
				var months = monthsWrap[iterator].getElementsByTagName( 'div' );
				var monthData = [];
				if ( months.length > 0 ) {
					for (var i = 0; i < months.length; i++) {
						if ( months[i].classList.contains( 'profit-and-loss-month-label' ) ) {
							monthData.push( months[i].innerText );
						} else {
							var label = months[i].querySelector('.pnl-e');							
							var percent = months[i].querySelector('.pnl-p');
							monthData.push( label.innerText );
							if ( percent ) {
								monthData.push( percent.innerText );
							} else {
								monthData.push( '--' );
							}
						}
					}
				}
				monthsArray.push({ i : monthData });
			}

		}
		
		const now = new Date();
		const currentTime = now.getTime();
		data.push({'labels' : labelsArray, 'months' : monthsArray });
		var exportData = JSON.stringify( data );
		console.log( data );
		var actionUrlBase = 'action=export_pnl_data&time=' + currentTime;
		actionUrlBase += '&data=' + exportData;		
		
		var request = new XMLHttpRequest();
		request.open('POST', profitblue.ajaxurl, true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
		request.onload = function () {
			if (this.status >= 200 && this.status < 400) {
			
				var url = event.target.getAttribute( 'data-redirect' );
				window.location.replace( url + '&time=' + currentTime );

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
	
	if ( event.target.classList.contains( 'pnl-dropdown' ) ) {

		event.preventDefault();
		var targetClass = event.target.getAttribute( 'data-id' );
		var tabList = document.getElementsByClassName( targetClass );
		if ( event.target.classList.contains( 'closed' ) ) {
			event.target.classList.remove( 'closed' );
			if ( tabList.length > 0 ) {
				for (var i = 0; i < tabList.length; i++) {
					tabList[i].style.height = 'auto';						
					tabList[i].style.opacity = '1';
				}
			}
		} else {
			event.target.classList.add( 'closed' );
			for (var i = 0; i < tabList.length; i++) {
				tabList[i].style.height = '0px';
				tabList[i].style.opacity = '0';						
			}
		}
	
	}

});

document.addEventListener( 'change', function( event ) {
	if ( event.target.classList.contains( 'month-to-date' ) ) {
		var mode = event.target.value;
		var url = event.target.getAttribute( 'data-url' );
		window.location.replace( url + '&mode=' + mode );
	}
});