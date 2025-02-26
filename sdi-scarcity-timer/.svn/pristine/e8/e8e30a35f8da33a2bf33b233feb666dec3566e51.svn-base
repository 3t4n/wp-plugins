/**
 * @package sdi-scarcity
 * @version 0.1
 */

 (function($){

 	var sdiTimer = $('#sdi-timer'),
		timerStart = sdiTimer.data('timer-start'),
		timerEnd = sdiTimer.data('timer-end'),

 	SdiTimer = {

	 		init: function(){

	 			// Set the date when the campaign ends
				var remainingTime = new Date(timerEnd).getTime();

				SdiTimer.counter(remainingTime);
				// Update the counter down every 1 second
				setInterval(function() {
					SdiTimer.counter(remainingTime);
	 			}, 1000);
	 		},
	 		counter : function(remainingTime){

	 			// Get todays date and time
				var now = new Date().getTime();

				// Find the remaining time between now and the count down date
				var remaining = remainingTime - now;

				//Only show if the timer is active
				if (remaining > 0) {
					// Time calculations for days, hours, minutes and seconds
					var days = Math.floor(remaining / (1000 * 60 * 60 * 24));
					var hours = Math.floor((remaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
					var minutes = Math.floor((remaining % (1000 * 60 * 60)) / (1000 * 60));
					var seconds = Math.floor((remaining % (1000 * 60)) / 1000);

					if (days > 0) { 
						$('.time-remaining .sdi-d').removeClass('hidden').find('span').html(('0' + days).slice(-2));
					}
					if (hours > 0) { 
						$('.time-remaining .sdi-h').removeClass('hidden').find('span').html(('0' + hours).slice(-2)); 
					}
					if (minutes > 0) { 
						$('.time-remaining .sdi-m').removeClass('hidden').find('span').html(('0' + minutes).slice(-2)); 
					}
					if (seconds > 0) { 
						$('.time-remaining .sdi-s').removeClass('hidden').find('span').html(('0' + seconds).slice(-2)); 
					}
					$('#sdi-timer').removeClass('hidden');
				}
	 		}

	 	};

 	SdiTimer.init();

 })(jQuery);