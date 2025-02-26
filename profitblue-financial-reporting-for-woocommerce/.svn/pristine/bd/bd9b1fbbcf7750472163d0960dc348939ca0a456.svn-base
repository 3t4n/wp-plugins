const deactivate = document.getElementById( 'deactivate-profitblue-financial-reporting-for-woocommerce' );
if ( deactivate ) {
	deactivate.addEventListener( 'click', function (event) {
		event.preventDefault();
		let container = document.getElementById( 'quickview_modal__container' );
		container.style.minWidth = 'auto';
		container.style.width = '450px';
		container.style.padding = '0px';
		let cancelLink = document.getElementById( 'deactivate-profitblue-financial-reporting-for-woocommerce' );
		let cancelHref = cancelLink.getAttribute( 'href' );
		
		let modalcontent = document.getElementById( 'modal-content' );
		modalcontent.innerHTML = profitblue.content;
		
		let cancelButton = document.getElementById( 'run-deactivation' );
		cancelButton.setAttribute( 'href', cancelHref );

		MicroModal.show( 'modal-quickview' );
		
	});	
}

const cancel = document.getElementById( 'cancel-deactivation' );
if ( cancel ) {
	cancel.addEventListener( 'click', function () {
		let modalcontent = document.getElementById( 'modal-content' );
		MicroModal.hide();
		modalcontent.innerHTML = '';
	});	
}

document.addEventListener( 'click', function( event ) {

	if ( event.target.classList.contains( 'shipping-list-item-radio' ) ) {

		let radioItems = document.getElementsByClassName( 'shipping-list-item-radio' );
		let radioItemValue = event.target.getAttribute( 'data-value' );
		if ( radioItems.length > 0 ) {
			for (var i = 0; i < radioItems.length; i++) {
				radioItems[i].classList.remove( 'active' );				
			}
		}
		let radioInputs = document.getElementsByClassName( 'shipping-costs' );
		if ( radioInputs.length > 0 ) {
			for (var i = 0; i < radioInputs.length; i++) {
				radioInputs[i].checked  = false;				
			}
		}
		
		event.target.classList.add( 'active' );	
		if ( radioItemValue == 'remove' ) {
			let cancelLink = document.getElementById( 'deactivate-profitblue-financial-reporting-for-woocommerce' );
			let cancelHref = cancelLink.getAttribute( 'href' );
			let cancelButton = document.getElementById( 'run-deactivation' );
			cancelButton.setAttribute( 'href', cancelHref + '&profitblue-deactivation=remove' );
		} else {
			let cancelLink = document.getElementById( 'deactivate-profitblue-financial-reporting-for-woocommerce' );
			let cancelHref = cancelLink.getAttribute( 'href' );
			let cancelButton = document.getElementById( 'run-deactivation' );
			cancelButton.setAttribute( 'href', cancelHref );
		}
		

	}

});