let pickerStartDate = document.getElementById( 'ccai-form' ).getAttribute( 'data-first-date' );
let pickerEndDate = document.getElementById( 'ccai-form' ).getAttribute( 'data-last-date' );
var pickers = document.getElementsByClassName( 'datepicker' );
if ( pickers.length > 0 ) {
	for (var i = 0; i < pickers.length; i++) {

		new easepick.create({
			element: pickers[i],
			disallowLockDaysInRange: true,
			css: [
				profitblue.templatecssurl + "easepick.css",
			],
			LockPlugin: {
				minDate: pickerStartDate + "T00:00:00.000Z",
				maxDate: pickerEndDate + "T23:59:59.000Z"
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
		});

	}
}


document.addEventListener( 'click', function( event ) {

	if ( event.target.classList.contains( 'checkbox-input-handler' ) ) {

		let mainContainer = event.target.parentElement.parentElement.parentElement.parentElement;
		let targetContainer = event.target.parentElement.parentElement;
		let type = event.target.getAttribute( 'data-type' );
		let buttonTarget = targetContainer.getElementsByClassName( type + '-cost-line-tables' );
		let lineTarget = mainContainer.getElementsByClassName( type + '-cost-line-parts' );
		
		var id = event.target.getAttribute( 'data-id' );
		var amount = document.getElementById( type + '-amount-' + id ).value;

		if ( event.target.classList.contains( 'checked' ) ) {
			var id = event.target.getAttribute( 'data-id' );
			if ( type == 'income' ) {
				var pickerTarget = document.getElementById( 'income-datepicker-' + id );
			} else {
				var pickerTarget = document.getElementById( 'datepicker-' + id );
			}
			var pickerTargetValue = pickerTarget.value;
			var ccaiForm = document.getElementById( 'ccai-form' );
			var year = ccaiForm.getAttribute( 'data-year' );
			var datepickerDate = year + '-01-01 - ' + year + '-12-31' ; 
			pickerTarget.value = datepickerDate;
			lineTarget[0].classList.remove( 'closed' );
			buttonTarget[0].classList.remove( 'hide' );
			buttonTarget[0].innerHTML = buttonTarget[0].getAttribute( 'data-hide' );
			var partAmount = amount / 12;
			var inputs = lineTarget[0].getElementsByTagName( 'input' );
			if ( inputs.length > 0 ) {
				for (var i = 0; i < inputs.length; i++) {
					
					inputs[i].value = partAmount.toFixed(2);
				}
			}
		} else {
			lineTarget[0].classList.add( 'closed' );
			buttonTarget[0].classList.add( 'hide' );
			buttonTarget[0].innerHTML = buttonTarget[0].getAttribute( 'data-show' );
			var inputs = lineTarget[0].getElementsByTagName( 'input' );
			if ( inputs.length > 0 ) {
				for (var i = 0; i < inputs.length; i++) {
					inputs[i].value = '0';
				}
			}
		}

	}

	if ( event.target.classList.contains( 'fixed-cost-line-tables' ) ) {
		let mainContainer = event.target.parentElement.parentElement.parentElement;
		let lineTarget = mainContainer.getElementsByClassName( 'fixed-cost-line-parts' );
		if ( lineTarget[0].classList.contains( 'closed' ) ) {
			lineTarget[0].classList.remove( 'closed' );
			event.target.innerHTML = event.target.getAttribute( 'data-hide' );
		} else {
			lineTarget[0].classList.add( 'closed' );
			event.target.innerHTML = event.target.getAttribute( 'data-show' );
		}
	}

	if ( event.target.classList.contains( 'income-cost-line-tables' ) ) {
		let mainContainer = event.target.parentElement.parentElement.parentElement;
		let lineTarget = mainContainer.getElementsByClassName( 'income-cost-line-parts' );
		if ( lineTarget[0].classList.contains( 'closed' ) ) {
			lineTarget[0].classList.remove( 'closed' );
			event.target.innerHTML = event.target.getAttribute( 'data-hide' );
		} else {
			lineTarget[0].classList.add( 'closed' );
			event.target.innerHTML = event.target.getAttribute( 'data-show' );
		}
	}

	if ( event.target.classList.contains( 'fixed-more' ) ) {		
		event.preventDefault();
		let lines = document.getElementsByClassName( 'fixed-cost-line-wrap' );
		if ( lines.length > 2 ) {
			event.target.style.backgroundColor = '#f0f0f1';
			return;
		} else {
			event.target.style.backgroundColor = '#ffffff';
		}
		let actionUrl = 'action=get_fixed_line&count=' + lines.length;
		addLine( actionUrl, 'fixed-form', 'datepicker-' );
	}
	
	if ( event.target.classList.contains( 'variable-more' ) ) {		
		event.preventDefault();
		let lines = document.getElementsByClassName( 'variable-cost-line-wrap' );
		if ( lines.length > 2 ) {
			event.target.style.backgroundColor = '#f0f0f1';
			return;
		} else {
			event.target.style.backgroundColor = '#ffffff';
		}
		let actionUrl = 'action=get_variable_line&count=' + lines.length;
		addLine( actionUrl, 'variable-form', 'variable-datepicker-' );
	}

	if ( event.target.classList.contains( 'income-more' ) ) {		
		event.preventDefault();
		let lines = document.getElementsByClassName( 'income-cost-line-wrap' );
		if ( lines.length > 2 ) {
			event.target.style.backgroundColor = '#f0f0f1';
			return;
		} else {
			event.target.style.backgroundColor = '#ffffff';
		}
		let actionUrl = 'action=get_income_line&count=' + lines.length;
		addLine( actionUrl, 'income-form', 'income-datepicker-' );
	}
	if ( event.target.classList.contains( 'ccai-remove-line' ) ) {
		let target = event.target.getAttribute( 'data-line' );
		if ( target ) {
			document.getElementById( target ).parentElement.remove();
		}
	}
	///////////////////////////////////////////////////////////////////////
	if ( event.target.classList.contains( 'load-last-year' ) ) {

		event.preventDefault();

		let year = event.target.getAttribute( 'data-year' );
		
		var modalcontent = document.getElementById( 'modal-content' );
		modalcontent.innerHTML = '';
		modalcontent.innerHTML = '<p class="are-you-sure">' + profitblue.sureLastYear + '</p><div class="modal-save-button"><a href="#" class="btn ccai-load-last-year" data-year="' + year + '">' + profitblue.saveText + '</a></div>';
		
		MicroModal.show( 'modal-quickview' );

	}
	if ( event.target.classList.contains( 'ccai-load-last-year' ) ) {

		event.preventDefault();

		let year = event.target.getAttribute( 'data-year' );
		let actionUrlBase = 'action=save_last_year_ccai_data';
			
		var modalcontent = document.getElementById( 'modal-content' );
		var actionUrl = actionUrlBase + '&year=' + year;
		var request = new XMLHttpRequest();
		request.open('POST', profitblue.ajaxurl, true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
		request.onload = function () {
			if (this.status >= 200 && this.status < 400) {
			
				//console.log( this.response );	
				var value = JSON.parse( this.response );	
				if ( value.status = 'success' ) {
					window.location.replace( value.url );
				} else {
					modalcontent.innerHTML = value.html;
					MicroModal.show( 'modal-quickview' );
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
	///////////////////////////////////////////////////////////////////////
	if ( event.target.classList.contains( 'save-form' ) ) {

		event.preventDefault();

		let year = event.target.getAttribute( 'data-year' );

		/* Clear errors */
		let errorItems = document.getElementsByClassName( 'form-error' );
		if ( errorItems.length > 0 ) {
			for (var i = 0; i < errorItems.length; i++) {
				if ( errorItems[i].classList.contains( 'form-error' ) ) {
					errorItems[i].classList.remove( 'form-error' );
				}
			}
		}

		let actionUrlBase = 'action=save_acci_data';
		let formdata = [];
		let formError = false;

		/* Control fixed Form */
		let fixedItems = document.getElementsByClassName( 'fixed-cost-line-wrap' );
		if ( fixedItems.length > 0 ) {
			for (var i = 0; i < fixedItems.length; i++) {

				//Label
				var label = fixedItems[i].getElementsByTagName( 'select' );	
				if ( 'not-selected' == label[0].value ) {
					var parentDiv = label[0].parentElement;
					var targetDiv = parentDiv.getElementsByClassName( 'selected-value' );
					targetDiv[0].classList.add( 'form-error' );
					formError = true;
				} else {
					var labelValue = label[0].value;
				}

				//All inputs
				var inputs = fixedItems[i].getElementsByTagName( 'input' );
				if ( inputs.length > 0 ) {
					for (var iterator = 0; iterator < inputs.length; iterator++) {
						var inputName = inputs[iterator].getAttribute( 'name' );
						console.log( inputName );
						if ( 'amount' == inputName ) {
							if ( inputs[iterator].value > 0 ) {
								var amount = inputs[iterator].value;
							} else {
								inputs[iterator].classList.add( 'form-error' );
								formError = true;
							}
						}
						if ( 'name' == inputName ) {
							var name = inputs[iterator].value;							
						}
						if ( 'date' == inputName ) {
							if ( inputs[iterator].value ) {
								var date = inputs[iterator].value;
							} else {
								inputs[iterator].classList.add( 'form-error' );
								formError = true;
							}
						}
						if ( 'manually-recalculate' == inputName ) {
							if ( true == inputs[iterator].checked ) {
								var manuallyRecalculate = 'yes';
							} else {
								var manuallyRecalculate = 'no';
							}
						}
						if ( 'month-1' == inputName ) {
							var month1 = getMonthValue( inputs[iterator] );							
						}
						if ( 'month-2' == inputName ) {
							var month2 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-3' == inputName ) {
							var month3 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-4' == inputName ) {
							var month4 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-5' == inputName ) {
							var month5 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-6' == inputName ) {
							var month6 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-7' == inputName ) {
							var month7 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-8' == inputName ) {
							var month8 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-9' == inputName ) {
							var month9 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-10' == inputName ) {
							var month10 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-11' == inputName ) {
							var month11 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-12' == inputName ) {
							var month12 = getMonthValue( inputs[iterator] );
						}
					}
				}
				if ( formError == false ) {
					formdata.push({ 
						'type' 		: 'fixed',
						'label' 	: labelValue,
						'name' 		: name,
						'amount' 	: amount,
						'date' 		: date,
						'manually' 	: manuallyRecalculate,
						'month-1' 	: month1,
						'month-2' 	: month2,
						'month-3' 	: month3,
						'month-4' 	: month4,
						'month-5' 	: month5,
						'month-6' 	: month6,
						'month-7' 	: month7,
						'month-8' 	: month8,
						'month-9' 	: month9,
						'month-10' 	: month10,
						'month-11' 	: month11,
						'month-12' 	: month12
					});
				}
			}
		}

		/* Variable form */
		let variableItems = document.getElementsByClassName( 'variable-cost-line-wrap' );
		if ( variableItems.length > 0 ) {
			for (var i = 0; i < variableItems.length; i++) {

				//Label
				var label = variableItems[i].getElementsByTagName( 'select' );
				if ( 'not-selected' == label[0].value ) {
					var parentDiv = label[0].parentElement;
					var targetDiv = parentDiv.getElementsByClassName( 'selected-value' );
					targetDiv[0].classList.add( 'form-error' );
					formError = true;
				} else {
					var labelValue = label[0].value;
				}
				var type = label[1].value;

				//All inputs
				var inputs = variableItems[i].getElementsByTagName( 'input' );
				if ( inputs.length > 0 ) {
					for (var iterator = 0; iterator < inputs.length; iterator++) {
						var inputName = inputs[iterator].getAttribute( 'name' );
						if ( 'amount' == inputName ) {
							if ( inputs[iterator].value > 0 ) {
								var amount = inputs[iterator].value;
							} else {
								inputs[iterator].classList.add( 'form-error' );
								formError = true;
							}
						}
						if ( 'name' == inputName ) {
							var name = inputs[iterator].value;							
						}
						if ( 'date' == inputName ) {
							if ( inputs[iterator].value ) {
								var date = inputs[iterator].value;
							} else {
								inputs[iterator].classList.add( 'form-error' );
								formError = true;
							}
						}
					}
				}
				if ( formError == false ) {
					formdata.push({ 
						'type' : 'variable',
						'label' : labelValue,
						'name' : name,
						'amount-type' : type,
						'amount' : amount,
						'date' : date
					});
				}
			}
		}

		/* Income form */
		let incomeItems = document.getElementsByClassName( 'income-cost-line-wrap' );
		if ( incomeItems.length > 0 ) {
			for (var i = 0; i < incomeItems.length; i++) {
				
				//Label
				var label = incomeItems[i].getElementsByTagName( 'select' );	
				if ( 'not-selected' == label[0].value ) {
					var parentDiv = label[0].parentElement;
					var targetDiv = parentDiv.getElementsByClassName( 'selected-value' );
					targetDiv[0].classList.add( 'form-error' );
					formError = true;
				} else {
					var labelValue = label[0].value;
				}

				console.log( labelValue );

				//All inputs
				var inputs = incomeItems[i].getElementsByTagName( 'input' );
				if ( inputs.length > 0 ) {
					for (var iterator = 0; iterator < inputs.length; iterator++) {
						var inputName = inputs[iterator].getAttribute( 'name' );
						console.log( inputs[iterator].value );
						if ( 'amount' == inputName ) {
							if ( inputs[iterator].value > 0 ) {
								var amount = inputs[iterator].value;
							} else {
								inputs[iterator].classList.add( 'form-error' );
								formError = true;
							}
						}
						if ( 'name' == inputName ) {
							var name = inputs[iterator].value;							
						}
						if ( 'date' == inputName ) {
							if ( inputs[iterator].value ) {
								var date = inputs[iterator].value;
							} else {
								inputs[iterator].classList.add( 'form-error' );
								formError = true;
							}
						}
						if ( 'manually-recalculate' == inputName ) {
							if ( true == inputs[iterator].checked ) {
								var manuallyRecalculate = 'yes';
							} else {
								var manuallyRecalculate = 'no';
							}
						}
						console.log( inputName );
						console.log( 'month-1' == inputName );
						if ( 'month-1' == inputName ) {
							var month1 = getMonthValue( inputs[iterator] );							
						}
						if ( 'month-2' == inputName ) {
							var month2 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-3' == inputName ) {
							var month3 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-4' == inputName ) {
							var month4 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-5' == inputName ) {
							var month5 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-6' == inputName ) {
							var month6 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-7' == inputName ) {
							var month7 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-8' == inputName ) {
							var month8 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-9' == inputName ) {
							var month9 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-10' == inputName ) {
							var month10 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-11' == inputName ) {
							var month11 = getMonthValue( inputs[iterator] );
						}
						if ( 'month-12' == inputName ) {
							var month12 = getMonthValue( inputs[iterator] );
						}
						//console.log( inputName ); 
						//console.log( inputs[iterator].value );
					}
				}
				if ( formError == false ) {
					formdata.push({ 
						'type' : 'income',
						'label' : labelValue,
						'name' : name,
						'amount' : amount,
						'date' : date,
						'manually' : manuallyRecalculate,
						'month-1' : month1,
						'month-2' : month2,
						'month-3' : month3,
						'month-4' : month4,
						'month-5' : month5,
						'month-6' : month6,
						'month-7' : month7,
						'month-8' : month8,
						'month-9' : month9,
						'month-10' : month10,
						'month-11' : month11,
						'month-12' : month12
					});
				}
			}
		}
		if ( formdata.length > 0 ) {
			
			var modalcontent = document.getElementById( 'modal-content' );
			var data = JSON.stringify( formdata );
			var actionUrl = actionUrlBase + '&data=' + data + '&year=' + year;
			var request = new XMLHttpRequest();
			request.open('POST', profitblue.ajaxurl, true);
			request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
			request.onload = function () {
				if (this.status >= 200 && this.status < 400) {
				
					//console.log( this.response );	
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
	
	if ( event.target.classList.contains( 'month-number-item' ) ) {
		var id = event.target.getAttribute( 'data-id' );
		var type = event.target.getAttribute( 'data-type' );
		var amountTarget = document.getElementById( type + '-amount-' + id );
		var targetWrap = event.target.parentElement.parentElement.parentElement.parentElement;
		var allInputs = targetWrap.getElementsByTagName( 'input' );
		var total = 0;
		if ( allInputs.length > 0 ){
			for (var i = 0; i < allInputs.length; i++) {
				total += parseFloat( allInputs[i].value );
			}
		}
		amountTarget.value = total.toFixed(2);
	}

	

});


function sendRequest( actionUrl, target ) {

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

function addLine( actionUrl, target, datepickerTarget ) {

	var request = new XMLHttpRequest();
	request.open('POST', profitblue.ajaxurl, true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
	request.onload = function () {
		if (this.status >= 200 && this.status < 400) {
		
			//console.log( this.response );
			let targetDiv = document.getElementById( target );
			var value = JSON.parse( this.response );
			console.log( value.count );
			if ( value.status == 'error' ) {

			} else {
				let div = document.createElement( 'div' );
				targetDiv.appendChild( div );
				div.innerHTML = value.html;
				new easepick.create({
					element: document.getElementById( datepickerTarget + value.count ),
					disallowLockDaysInRange: true,
					css: [
						profitblue.templatecssurl + "easepick.css",
					],
					LockPlugin: {
						minDate: pickerStartDate + "T00:00:00.000Z",
						maxDate: pickerEndDate + "T23:59:59.000Z"
					},
					PresetPlugin: {
						customLabels: [],
						customPreset: {
							'Today': [new Date(profitblue.TodayStart), new Date(profitblue.TodayStart)],
							'Yesterday': [new Date(profitblue.YesterdayStart), new Date(profitblue.YesterdayStart)],
							'This Week': [new Date(profitblue.ThisWeekStart), new Date(profitblue.ThisWeekEnd)],
							'This Month': [new Date(profitblue.ThisMonthStart), new Date(profitblue.ThisMonthEnd)],
							'Last month': [new Date(profitblue.LastMonthStart), new Date(profitblue.LastMonthEnd)],
							'Last 7 days': [new Date(profitblue.LastSevenDays), new Date(profitblue.TodayStart)],
							'Last 30 days': [new Date(profitblue.LastThirtyDays), new Date(profitblue.TodayStart)],
							'Last 90 days': [new Date(profitblue.LastNinthyDays), new Date(profitblue.TodayStart)],
							'Q1': [new Date(profitblue.Q1Start), new Date(profitblue.Q1End)],
							'Q2': [new Date(profitblue.Q2Start), new Date(profitblue.Q2End)],
							'Q3': [new Date(profitblue.Q3Start), new Date(profitblue.Q3End)],
							'Q4': [new Date(profitblue.Q4Start), new Date(profitblue.Q4End)],
							'Last Year': [new Date(profitblue.FirstDayOfLastYear), new Date(profitblue.LastDayOfLastYear)],
							'This Year': [new Date(profitblue.FirstDayOfThisYear), new Date(profitblue.LastDayOfThisYear)]
						},
						position: 'left'
					},
					plugins: [
						"RangePlugin",
						"LockPlugin",
						"PresetPlugin"
					],
					zIndex: 10,
				});
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

function getMonthValue( input ) {
	if ( input.value > 0 ) {
		var month = input.value;
	} else {
		var month = 0;
	}
	return month;
}
