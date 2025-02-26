(function ($) {
	'use strict';

	$(document).ready(function () {

		/**
		 * Schema data manipulation.
		 * Getting data.
		 */
		if($('#wpasjsonid').length) {

			var script = document.getElementById('wpasjsonid'),
			obj = JSON.parse(script.firstChild.nodeValue),
			scorTitle = $('.wpas--rating-title').text(),
			allScor = $('.wpas--overall-score').text(),
			scorOv = $('.wpas--bl-txt').text(),
			imgSrc = $('.wpas--product-img img').attr('src');
			// Setting data.
			obj.name = scorTitle;
			if ($('.wpas--product-img').length) {
				obj.image = imgSrc;
			}
			obj.itemReviewed.name = scorTitle;
			obj.reviewBody = scorOv;
			obj.reviewRating.ratingValue = allScor;
			obj.itemReviewed.ratingValue = allScor;
			// Putting back the object.
			script.firstChild.nodeValue = JSON.stringify(obj);
		}

		/**
		 * Let the store key/value pairs in the browser.
		 */
		function loadTakenSeats() {

			var takenSeatsString = sessionStorage.takenSeats;
			return takenSeatsString
				? JSON.parse(takenSeatsString)
				: [];
		}

		function saveTakenSeats(takenSeats) {

			sessionStorage.takenSeats = JSON.stringify(takenSeats);
		}

		function takeSeat(seat) {

			var takenSeats = loadTakenSeats();
			takenSeats.push($(seat).attr('data-id'));
			saveTakenSeats(takenSeats);
		}

		function untakeSeat(seat) {

			var takenSeats = loadTakenSeats();
			takenSeats.pop($(seat).attr('data-id'));
			saveTakenSeats(takenSeats);
		}

		// Add a class afte giving rate.
		$.each(loadTakenSeats(), function (i, seat) {

			$('.wpas-star-rating').addClass('frhd--rated');
		});

		/**
		 * On click rating calculation.
		 */
		$('.wpas-star-rating input').click(function () {

			var theID = parseInt($('.wpas--rating-wrap').data('id'));
			var theVote = parseInt($('.wpas--rating-wrap').data('vote'));
			var thestar = parseInt($('.wpas--rating-wrap').data('star'));
			var ratingVal = parseInt($(this).val());

			$('.frhd-rate-count').text(theVote + 1);

			jQuery.ajax({
				url: ratingStar.ajaxurl,
				type: 'POST',
				data: {
					action: 'frhd_user_vote',
					post_id: theID,
					rating_val: (ratingVal + thestar),
					rating_vote: (theVote + 1)
				}
			});

			$('.wpas-star-rating-wrap').delay(1000).slideUp(1000);

			// Start session on this action.
			var seat = this;
			if (loadTakenSeats().indexOf($(seat).attr('data-id')) < 0) {

				takeSeat(seat);
			} else {

				untakeSeat(seat);
			}

		});

		// After all remove the rating section
		$('.frhd--rated').parent().remove();

	});

})(jQuery);