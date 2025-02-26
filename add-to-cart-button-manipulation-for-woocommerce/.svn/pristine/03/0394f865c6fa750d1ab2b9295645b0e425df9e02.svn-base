(function( $ ) {

		'use strict';

		jQuery(document).ready(function($){

				$( ".atcbm-time-countdown" ).each(function( index ) {

					var time 		= $(this).data('time');
					var format 	= $(this).data('format');

					if(format == ''){ format = 'yowdHMS';	}
					var etext ='';

					$(this).countdown({
						until: $.countdown.UTCDate(-(new Date().getTimezoneOffset()),new Date(time*1000)),
						format: format,
						onExpiry: refreshtime,
						expiryText: etext
					});

				});

				$('form.cart').submit( function() { clearInterval(refreshIntervalId); } );

		});

		function refreshtime(){
			jQuery('.atcbm-time').hide();
			setTimeout(function () {
					location.reload();
			}, 500 );
		}

})( jQuery );
