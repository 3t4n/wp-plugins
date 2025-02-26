document.addEventListener( 'click', function( event ) {

    if ( event.target.classList.contains( 'checkbox-switcher' ) ) {

        var id = event.target.getAttribute( 'data-id' );
        if ( event.target.classList.contains( 'active' ) ) {
            event.target.classList.remove( 'active' );
            document.getElementById( 'notifications-' + id ).checked = false;
        } else {
            event.target.classList.add( 'active' );
            document.getElementById( 'notifications-' + id ).checked = true;
        }


    }
    
    if ( event.target.classList.contains( 'save-form' ) ) {

		event.preventDefault();
		let modalcontent = document.getElementById( 'modal-content' );
		modalcontent.innerHTML = '';
		modalcontent.innerHTML = '<p class="are-you-sure">Are you sure you want to save new data?</p><div class="modal-save-button"><a href="#" class="btn modal-save-form">SAVE</a></div>';
		MicroModal.show( 'modal-quickview' );

    }

	if ( event.target.classList.contains( 'modal-save-form' ) ) {

		event.preventDefault();
		let actionUrlBase = 'action=save_notifications_data';
		let email = document.getElementById( 'notifications-email' );
        if ( email.value ) {
            actionUrlBase = actionUrlBase + '&email=' + email.value;
        }
        let daily = document.getElementById( 'notifications-daily' );
        if ( daily.checked ) {
            actionUrlBase = actionUrlBase + '&daily=' + daily.value;
        } else {
            actionUrlBase = actionUrlBase + '&daily=no';
        }
        let weekly = document.getElementById( 'notifications-weekly' );
        if ( weekly.checked ) {
            actionUrlBase = actionUrlBase + '&weekly=' + weekly.value;
        } else {
            actionUrlBase = actionUrlBase + '&weekly=no';
        }
        let monthly = document.getElementById( 'notifications-monthly' );
        if ( monthly.checked ) {
            actionUrlBase = actionUrlBase + '&monthly=' + monthly.value;
        } else {
            actionUrlBase = actionUrlBase + '&monthly=no';
        }
        let yearly = document.getElementById( 'notifications-yearly' );
        if ( yearly.checked ) {
            actionUrlBase = actionUrlBase + '&yearly=' + yearly.value;
        } else {
            actionUrlBase = actionUrlBase + '&yearly=no';
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
        request.send( actionUrlBase + '&nonce=' + profitblue.nonce );

    
		
	}

});

