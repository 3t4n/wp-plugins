
//select-dropdown-action
//select-dropdown-action-svg
document.addEventListener( 'click', function( event ) {

	if ( event.target.classList.contains( 'modal__overlay' ) ) {
		document.getElementById( 'modal-content' ).innerHTML = '';
	}

	if ( event.target.classList.contains( 'not-export' ) ) {
		event.preventDefault();
		alert( profitblue.notExport );
	}

	if ( event.target.classList.contains( 'csv-export-import' ) ) {
		event.preventDefault();
		alert( profitblue.notExport );
	}

	if ( event.target.classList.contains( 'modal__close' ) ) {
		document.getElementById( 'modal-content' ).innerHTML = '';
	}

	if ( event.target.classList.contains( 'select-dropdown-action' ) ) {
		let selectContainer = event.target.parentElement.parentElement;
		handleSelect( selectContainer );
	}
	if ( event.target.classList.contains( 'select-dropdown-action-svg' ) ) {
		let selectContainer = event.target.parentElement.parentElement.parentElement;
		handleSelect( selectContainer );
	}
	if ( event.target.classList.contains( 'select-dropdown-item' ) ) {

		let selectValue = event.target.getAttribute( 'data-value' );
		let selectText = event.target.innerHTML;
		let selectContainer = event.target.parentElement.parentElement.parentElement;
		let valueTarget = selectContainer.getElementsByClassName( 'selected-value-label' );
		let valueSelect = selectContainer.getElementsByTagName( 'select' );
		valueTarget[0].innerHTML = selectText;
		valueSelect[0].value = selectValue;
		handleSelect( selectContainer );

		if ( event.target.classList.contains( 'ccai-label' ) ) {
			  
			var targetId = event.target.parentElement.parentElement.parentElement.parentElement.getAttribute( 'data-id' );
			console.log( targetId );
			var input = document.getElementById( 'hidden-name-' + targetId );
			console.log( input );
			var hiddenLine = document.getElementById( 'hidden-line-' + targetId );
			console.log( hiddenLine );
			if ( selectValue == 'own-fixed-costs' ) {
				input.value = '';
				hiddenLine.classList.add( 'open' );
			} else if ( selectValue == 'own-variable-costs' ) {
				input.value = '';
				hiddenLine.classList.add( 'open' );
			} else if ( selectValue == 'own-income-costs' ) {
				input.value = '';
				hiddenLine.classList.add( 'open' );
			} else if ( selectValue == 'variable-ads' ) {
				input.value = '';
				hiddenLine.classList.add( 'open' );
			} else if ( selectValue == 'fixed-ads' ) {
				input.value = '';
				hiddenLine.classList.add( 'open' );
			} else {
				input.value = selectText;
				hiddenLine.classList.remove( 'open' );
			}
			
		}

	}

	if ( event.target.classList.contains( 'close-install-modal' ) ) {
		event.preventDefault();
		document.getElementById( 'install-modal' ).style.display = 'none'
	}

	if ( event.target.classList.contains( 'checkbox-input-handler' ) ) {
		let checkboxContainer = event.target.parentElement;
		let checkboxTarget = checkboxContainer.getElementsByClassName( 'checkbox-input' );
		if ( event.target.classList.contains( 'checked' ) ) {
			event.target.classList.remove( 'checked' );
			checkboxTarget[0].checked = false;
		} else {
			event.target.classList.add( 'checked' );
			checkboxTarget[0].checked = true;
		}
	}

	/**
	 * Wizard part
	 * 
	 */
	if (typeof wizard !== 'undefined') {		

		if ( event.target.classList.contains( 'skip-wizard' ) ) {
			skipwizard();
		}
		if ( event.target.classList.contains( 'wizard-next-step' ) ) {
			
			event.preventDefault();
			let buttonNext = document.getElementById( 'wizard-next-step' );
			let item = buttonNext.getAttribute( 'data-item' );
			let step = buttonNext.getAttribute( 'data-step' );
			let redirect = buttonNext.getAttribute( 'data-redirect' );
			let url = buttonNext.getAttribute( 'data-url' );
			let nextStep = ( parseFloat(step) + 1);
			
			buttonNext.setAttribute( 'data-step', nextStep );
			//saveActualStep(stepData.next_url);
			if ( redirect == 'no' ) {
				history.pushState('', document.title, url);
				wizardStepData(item, nextStep);
			} else if ( redirect == 'finish' ) {
				skipwizard();
				this.location.href = url;
			} else {
				this.location.href = url;
			}

		}

	}

});

window.addEventListener('load', function() {

	/**
	 * Instaltion part
	 */
	let instaltionTarget = document.getElementById( 'instaltionTarget' );
	if (typeof instaltionTarget !== 'undefined') {

		let step = instaltionTarget.getAttribute( 'data-step' );
		let modalContent = instaltionTarget.innerHTML;

		let modal = document.getElementById( 'install-modal' );
		console.log( step );
		let modalcontent = document.getElementById( 'install-modal-content' );
		
		modalcontent.innerHTML = '';
		modalcontent.innerHTML = modalContent;		
		modal.style.display = 'flex';
		
		runStep( step, modal, modalcontent );
			
		function runStep( step, modal, modalcontent ) {

			var actionUrl = 'action=profitblue_install';
			var request = new XMLHttpRequest();
			request.open('POST', profitblue.ajaxurl, true);
			request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
			request.onload = function () {
				if (this.status >= 200 && this.status < 400) {
				
					var value = JSON.parse( this.response );
					modalcontent.innerHTML = value.html;
					if ( value.status != 'finnish' ) {
						runStep( value.step, modal, modalcontent );										
					}

				} else {
					// If fail
					console.log(this.response);
				}
			};
			request.onerror = function() {
				// Connection error
			};
			request.send( actionUrl + '&step=' + step + '&nonce=' + profitblue.nonce );
		}

	}

	let missingOrders = document.getElementById( 'missingOrders' );
	if (typeof missingOrders !== 'undefined') {											
		let modal = document.getElementById( 'install-modal' );
		let modalcontent = document.getElementById( 'install-modal-content' );
		
		modalcontent.innerHTML = '';
		modalcontent.innerHTML = missingOrders.innerHTML;		
		modal.style.display = 'flex';
		
		runOrdersStep( modal, modalcontent );
			
	
		function runOrdersStep( modal, modalcontent ) {

			var actionUrl = 'action=profitblue_create_missing_orders';
			var request = new XMLHttpRequest();
			request.open('POST', profitblue.ajaxurl, true);
			request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
			request.onload = function () {
				if (this.status >= 200 && this.status < 400) {
				
					var value = JSON.parse( this.response );
					modalcontent.innerHTML = value.html;
					if ( value.status != 'finish' ) {									
						modalcontent.innerHTML = '';
						modalcontent.innerHTML = value.html;	
						runStep( modal, modalcontent );										
					} else {
						modalcontent.innerHTML = '';
						modalcontent.innerHTML = value.html;	
						modal.style.display = 'none';
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

	let wizardSource = document.getElementById( 'wizardSource' );

	if (typeof wizardSource !== 'undefined') {

		
		let wizard = wizardSource.getAttribute( 'data-wizard' );
		let wizardPart = wizardSource.getAttribute( 'data-wizard-part' );
		let wizardStep = wizardSource.getAttribute( 'data-wizard-step' );
		let userId = wizardSource.getAttribute( 'data-wizard-user' );	
		var body = document.body,
    	html = document.documentElement;

		var documentHeight = Math.max(
			body.scrollHeight, body.offsetHeight, 
			html.clientHeight, html.scrollHeight, html.offsetHeight
		);

		console.log(documentHeight);
		console.log(documentHeight);

		document.getElementById( 'wizard-overlay' ).style.height = documentHeight + 'px';
		document.getElementById( 'wizard-tooltip' ).style.display = 'block';

		if (wizard.hasOwnProperty(wizardPart)) {
			let partData = wizard[wizardPart];
			if (partData.steps && partData.steps.hasOwnProperty(wizardStep.toString())) {
				let stepData = partData.steps[wizardStep.toString()];
				moveTooltip(stepData);
			}
		}			
	}
});

function wizardStepData(wizardPart,wizardStep) {

	document.getElementById( 'wizard-overlay' ).style.display = 'block';
	
	if (wizard.hasOwnProperty(wizardPart)) {
		let partData = wizard[wizardPart];
		if (partData.steps && partData.steps.hasOwnProperty(wizardStep.toString())) {

			let stepData = partData.steps[wizardStep.toString()];
			console.log(stepData);
			console.log(stepData.next_url);

			let buttonNext = document.getElementById( 'wizard-next-step' );
			buttonNext.setAttribute( 'data-redirect', stepData.redirect );
			buttonNext.setAttribute( 'data-url', stepData.next_url );			
			moveTooltip(stepData);
						
		}
	}
}

function moveTooltip(stepData) {

	var targetDivs = null;
	var activeDivs = document.getElementsByClassName('wizard-active-div');
	var divsArray = Array.from(activeDivs);
	divsArray.forEach(function(div) {
    	div.classList.remove('wizard-active-div');
	});

	let toolTip = document.getElementById('wizard-tooltip');
	let triangle = document.getElementById('wizard-triangle');

	//Clear triangle class
	triangle.classList.remove('triangle-bottom-left');
	triangle.classList.remove('triangle-bottom-right');
	triangle.classList.remove('triangle-top-left');
	triangle.classList.remove('triangle-top-right');

	//Change content
	document.getElementById( 'wizard-tooltip-title' ).innerText = stepData.title;
	document.getElementById( 'wizard-tooltip-content' ).innerText = stepData.description;

	let toolTipHeight = toolTip.offsetHeight;
	let toolTipWidth = toolTip.offsetWidth;

	let stepClass = stepData.class;	
	targetDivs = document.getElementsByClassName( stepClass );
	if ( targetDivs.length > 0 ) {
		for (var iterator = 0; iterator < targetDivs.length; iterator++) {
			targetDivs[iterator].classList.add( 'wizard-active-div' );
		}

		//Change triangle position
		if ( stepData.triangle == 'lb' ) {
			triangle.classList.add('triangle-bottom-left');
		} else if ( stepData.triangle == 'rb' ) {
			triangle.classList.add('triangle-bottom-right');
		} else if ( stepData.triangle == 'lt' ) {
			triangle.classList.add('triangle-top-left');
		} else if ( stepData.triangle == 'rt' ) {
			triangle.classList.add('triangle-top-right');
		}

		//Calculate tooltip position
		let rect = targetDivs[0].getBoundingClientRect();
		let rectWidth = targetDivs[0].offsetWidth;
		let rectHeight = targetDivs[0].offsetHeight;
		//Element position from top
		let scrollTop = document.documentElement.scrollTop;
		let elementTop = rect.top + scrollTop;
		//Element position from left
		console.log( rect.left );
		let elementLeft= rect.left;

		console.log( stepData.top );

		if (stepData.top == 'top') {
			let toolTipTop = elementTop - toolTipHeight - 64;
			toolTip.style.top = toolTipTop + 'px';
			var yOffset = -220;
			var targetPosition = targetDivs[0].getBoundingClientRect().top;
			window.scrollTo({
				top: window.scrollY + targetPosition + yOffset,
				behavior: 'smooth'
			});
		} else if (stepData.top == 'bottom') {
			let toolTipTop = elementTop - rectHeight + parseInt( 70 );
			toolTip.style.top = toolTipTop + 'px';
			targetDivs[0].scrollIntoView({ behavior: 'smooth' }); 
		}

		if ( stepData.left == 'half' ) {
			let toolTipLeft = ( rect.left + ( targetDivs[0].offsetWidth / 2 ) ) - ( toolTipWidth / 2 );
			toolTip.style.left = toolTipLeft + 'px';
		} else if ( stepData.left == 'right' ) {									
			let leftOffset = toolTipWidth - (rectWidth / 2);
			let toolTipLeft = rect.left- leftOffset;
			toolTip.style.left = toolTipLeft + 'px';
		} else if ( stepData.left == 'left' ) {									
			let leftOffset = toolTipWidth - (rectWidth / 2);
			let toolTipLeft = rect.left;
			toolTip.style.left = toolTipLeft + 'px';
		} else if ( stepData.left == 'middle' ) {									
			let leftOffset = toolTipWidth - (rectWidth / 2);
			let toolTipLeft = window.innerWidth / 2;
			toolTip.style.left = toolTipLeft + 'px';
		}							

	}	
	
}

function skipwizard() {
	
	let actionUrlBase = 'action=save_wizard_end&user_id=' + userId;	
	var request = new XMLHttpRequest();
	request.open('POST', profitblue.ajaxurl, true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
	request.onload = function () {
		if (this.status >= 200 && this.status < 400) {
		
			document.getElementById( 'wizard-tooltip' ).style.display = 'none';
			document.getElementById( 'wizard-overlay' ).style.display = 'none';
			var value = JSON.parse( this.response );
			window.location.href = value.redirect;

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

function saveActualStep(stepUrl) {
	
	let actionUrlBase = 'action=save_wizard_step&user_id=' + userId;	
	var request = new XMLHttpRequest();
	request.open('POST', profitblue.ajaxurl, true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
	request.onload = function () {
		if (this.status >= 200 && this.status < 400) {			

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

function handleSelect( container ) {
	let dropdownTarget = container.getElementsByClassName( 'select-dropdown' );
	if ( dropdownTarget[0].classList.contains( 'open' ) ) {
		dropdownTarget[0].classList.remove( 'open' );
	} else {
		dropdownTarget[0].classList.add( 'open' );
	}
	let dropdownIcon = container.getElementsByClassName( 'select-dropdown-icon' );
	if ( dropdownIcon[0].classList.contains( 'active' ) ) {
		dropdownIcon[0].classList.remove( 'active' );
	} else {
		dropdownIcon[0].classList.add( 'active' );
	}
}

jQuery( document ).on( 'heartbeat-tick', function ( event, data ) {
	console.log( 'tick' );
	console.log(data);
});
jQuery( document ).on( 'heartbeat-send', function ( event, data ) {
	console.log( 'send' );
	console.log(data);
	
	if ( ! data.profitblueUpdate ) {
		return;
	}
	var string = '<div class="overview-notice" id="update-notice"><div class="overview-notice-inner"><p class="overview-notice-text">Your data was changed, database is updating. This process running on background, you can continue in work.</p></div></div>';
	var notice = document.getElementById( 'update-notice' );
	if ( notice.length > 0 ) {
		notice.remove;
	}
	if ( data.profitblueUpdate != 'all' ){
		
		var firstTitle =  document.getElementById( 'wpbody-content' ).getElementsByTagName( 'H2' );
		firstTitle[0].after( string );

	}
	
});