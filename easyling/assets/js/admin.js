( function( $ ) {

$(function onDomReady() {
	$('#EasylingSettingsForm').on( 'change', '#EasylingLocation, #EasylingProjectCode', function( e ) {
		updateLocationUrl();
		updateCustomLocationVisibility();
	} );
	$('#EasylingSettingsForm').on( 'input', '#EasylingCustomLocation', function( e ) {
		updateLocationUrl();
	} );
	updateLocationUrl();
	updateCustomLocationVisibility();

	var $debugInfo = $('#EasylingDebugInfo');
	var $debugInfoBtn = $('#EasylingDebugToggleBtn');
	$debugInfoBtn.on( 'click', function( e ) {
		e.preventDefault();
		$debugInfo.slideToggle();
		$debugInfoBtn.toggleClass('active');
	} );

	$('#EasylingTestConnectionBtn').on( 'click', function( e ) {
		e.preventDefault();
		testConnection();
	} );
});

function testConnection() {
	$('#EasylingTestConnectionBtn').attr('disabled', 'disabled');

    $.ajax({
      'type': 'post',
      'dataType': 'json',
      'url': Easyling.ajaxUrl,
      'data': {
        'action': Easyling.testConnectionAction,
        'nonce': Easyling.testConnectionNonce,
      }
    })
      .done(function onDone( data ) {
      	console.log('onDone', { data });
      	if (data.status) {
      		$('#EasylingConnectionStatus').removeClass('notice-error').addClass('notice-success');
      	} else {
      		$('#EasylingConnectionStatus').removeClass('notice-success').addClass('notice-error');
      	}
      	$('#EasylingConnectionStatus').show().html( data.message );
      })
      .fail(function onFail() {
      	console.log('onFail');
  		$('#EasylingConnectionStatus').removeClass('notice-success').addClass('notice-error');
      	$('#EasylingConnectionStatus').show().html( 'Unknown error occurred' );
      })
      .always(function onFail() {
		$('#EasylingTestConnectionBtn').removeAttr('disabled');
      })
    ;
}

function updateCustomLocationVisibility() {
	var locationHost = $('#EasylingLocation').val();
	locationHost = $.trim( locationHost );
	if (locationHost === 'custom') {
		$('#EasylingCustomLocationWrapper').addClass('active');
	} else {
		$('#EasylingCustomLocationWrapper').removeClass('active');
	}
}

function updateLocationUrl() {
	var projectCode = $('#EasylingProjectCode').val();
	var locationHost = $('#EasylingLocation').val();
	var customLocationHost = $('#EasylingCustomLocation').val();

	projectCode = $.trim( projectCode );
	locationHost = $.trim( locationHost );
	customLocationHost = $.trim( customLocationHost );
	locationHost = locationHost === 'custom' ? customLocationHost : locationHost;
	
	if ( ! locationHost || ! projectCode ) {
		$('#EasylingLocationLogin').attr( 'href', '#' );
		$('#EasylingLocationLogin').attr( 'onclick', 'return false' );
		return;
	}

	var url = 'https://' + locationHost;

	url += '/_el/dashboard/project/' + projectCode + '/settings';
	$('#EasylingLocationLogin').attr( 'href', url );
	$('#EasylingLocationLogin').removeAttr( 'onclick' );
}

})( jQuery );