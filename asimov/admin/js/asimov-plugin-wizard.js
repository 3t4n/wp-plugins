function findGetParameter(parameterName) {
	var result = null,
		tmp = [];
	location.search
		.substr(1)
		.split("&")
		.forEach(function (item) {
		  tmp = item.split("=");
		  if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
		});
	return result;
}

function handle_request_error(error) {
	console.log(error);
	alert("Error during request");
}

(function( $ ) {
	'use strict';
	
	
	 $(document).ready(function () {
		 
		//let stripe = Stripe('pk_test_51HxEVAJN7OLu4fFjyDksxp9EDjnAK2kfMqkwzQBayk2TE5azgu7WAqggnjZUlIQHpiBZjrUzjqAQeCOZIzUUfX2Q00Qg8xZL4u');
		
		var current_fs, next_fs, previous_fs; //fieldsets
		var opacity;
		
		var user_id = findGetParameter("ref");
		var subscription_id = findGetParameter("sub");
		
		var isLoggedIn = user_id !== null;
		var hasSubscription = subscription_id !== null;
		var gaConfigured = false;
		
		var local_url = LOCALIZED_VARS.rest_url;
		console.log(isLoggedIn, hasSubscription);

		var saveSubInfo = function(userId, subscriptionId) {
			var endpoint = "asimov-plugin/v1/save_info"
		  return fetch(local_url + endpoint, {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
				"X-WP-Nonce": LOCALIZED_VARS.nonce
			},
			body: JSON.stringify({
			  user_id: userId,
			  subscription_id: subscriptionId
			})
		  }).then(function(result) {
			return result.json();
		  });
		};
		
		if(hasSubscription) {
			saveSubInfo(user_id, subscription_id).then(function (data) {
				if(data.success) {
					current_fs = $("#fieldset-account");
					next_fs = current_fs.next();

					//Add Class Active
					$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

					//show the next fieldset
					next_fs.show();
					//hide the current fieldset with style
					current_fs.animate({ opacity: 0 }, {
						step: function (now) {
							// for making fielset appear animation
							opacity = 1 - now;

							current_fs.css({
								'display': 'none',
								'position': 'relative'
							});
							next_fs.css({ 'opacity': opacity });
						},
						duration: 900
					});
				}
			}).catch(handle_request_error);
		}

		

		$(".next").click(function () {
			console.log(isLoggedIn, user_id);
			if(isLoggedIn) {

				current_fs = $(this).parent();
				next_fs = $(this).parent().next();

				//Add Class Active
				$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

				//show the next fieldset
				next_fs.show();
				//hide the current fieldset with style
				current_fs.animate({ opacity: 0 }, {
					step: function (now) {
						// for making fielset appear animation
						opacity = 1 - now;

						current_fs.css({
							'display': 'none',
							'position': 'relative'
						});
						next_fs.css({ 'opacity': opacity });
					},
					duration: 900
				});
			}
		});

		$(".previous").click(function () {

			current_fs = $(this).parent();
			previous_fs = $(this).parent().prev();

			//Remove class active
			$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

			//show the previous fieldset
			previous_fs.show();

			//hide the current fieldset with style
			current_fs.animate({ opacity: 0 }, {
				step: function (now) {
					// for making fielset appear animation
					opacity = 1 - now;

					current_fs.css({
						'display': 'none',
						'position': 'relative'
					});
					previous_fs.css({ 'opacity': opacity });
				},
				duration: 600
			});
		});

		$('.radio-group .radio').click(function () {
			$(this).parent().find('.radio').removeClass('selected');
			$(this).addClass('selected');
		});

		$(".submit").click(function () {
			return false;
		});
		
		$("#goauth2").click(function () {
			window.location.href = LOCALIZED_VARS.remote_url + "/auth/goauth2?origin="+encodeURI(LOCALIZED_VARS.origin_url);
			
		});
		
		$("#ga-conf").click(function () {
			$(this).prop("disabled",true);
			var checkGA = function(viewId) {
				var endpoint = "asimov-plugin/v1/post_ga_info"
			  return fetch(local_url + endpoint, {
				method: "POST",
				headers: {
				  	"Content-Type": "application/json",
			  		"X-WP-Nonce": LOCALIZED_VARS.nonce
				},
				body: JSON.stringify({
				  ga_view_id: viewId,
				})
			  }).then(function(result) {
				return result.json();
			  });
			};
					
			var view_id = $("#ai_code").val();
			console.log(view_id);
			checkGA(view_id).then(function(data) {
				$("#ga-conf").prop("disabled", false);
				if(data.success || data.data === "GA_VIEW_EMPTY") {
					gaConfigured = true;
					current_fs = $("#ga-conf").parent();
					next_fs = current_fs.next();

					if(data.success)
						$("#analytics-success").modal('show');
					else
						$("#analytics-no-data").modal('show');
					//Add Class Active
					$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

					//show the next fieldset
					next_fs.show();
					//hide the current fieldset with style
					current_fs.animate({ opacity: 0 }, {
						step: function (now) {
							// for making fielset appear animation
							opacity = 1 - now;

							current_fs.css({
								'display': 'none',
								'position': 'relative'
							});
							next_fs.css({ 'opacity': opacity });
						},
						duration: 900
					});
				} else {
					$("#config-error").modal('show');
				}
			}).catch(handle_request_error);
		});
		/*
		$("#asimov-subscribe").click(function () {
			var createCheckoutSession = function(priceId) {
			  return fetch(remote_url+"/pay/checkout-session", {
				method: "POST",
				headers: {
				  "Content-Type": "application/json"
				},
				body: JSON.stringify({
				  priceId: priceId,
				  origin: encodeURI(window.location.href),
				  user_id: user_id
				})
			  }).then(function(result) {
				return result.json();
			  });
			};
			createCheckoutSession("price_1IFIIkJN7OLu4fFjiRUIDHES").then(function(data) {
			  // Call Stripe.js method to redirect to the new Checkout page
			  stripe
				.redirectToCheckout({
				  sessionId: data.sessionId
				})
				.then(function(result){
					console.log(result);
				});
			});
		});*/
		
		$("#wizard-end-btn").click(function () {
			window.location.href = LOCALIZED_VARS.plugin_url;
		});

		$("#ga-service-clip").click(function () {
			var ga_account = $(this).text();

			var dummy = document.createElement("input");
			document.body.appendChild(dummy);
			dummy.setAttribute("id", "dummy_id");
			document.getElementById("dummy_id").value = ga_account;

			dummy.select();
			dummy.setSelectionRange(0, 99999); /* For mobile devices */
			document.execCommand("copy");

			document.body.removeChild(dummy);
		});

		$("#restart-conf").click(function () {
			current_fs = $("#fs-view-id");
			console.log(current_fs);
			previous_fs = current_fs.prev().prev().prev();

			//Remove class active
			$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
			$("#progressbar li").eq($("fieldset").index(current_fs.prev())).removeClass("active");
			$("#progressbar li").eq($("fieldset").index(current_fs.prev().prev())).removeClass("active");

			//show the previous fieldset
			previous_fs.show();

			//hide the current fieldset with style
			current_fs.animate({ opacity: 0 }, {
				step: function (now) {
					// for making fielset appear animation
					opacity = 1 - now;

					current_fs.css({
						'display': 'none',
						'position': 'relative'
					});
					previous_fs.css({ 'opacity': opacity });
				},
				duration: 600
			});
			$("#config-error").modal('hide');
		});
	});

	$(document).on("click","#force-standard-models",function() {
		var current_fs = $("#ga-conf").parent();
		var next_fs = current_fs.next();

		$("#config-error").modal('hide');

		//Add Class Active
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

		//show the next fieldset
		next_fs.show();
		//hide the current fieldset with style
		current_fs.animate({ opacity: 0 }, {
			step: function (now) {
				// for making fielset appear animation
				var opacity = 1 - now;

				current_fs.css({
					'display': 'none',
					'position': 'relative'
				});
				next_fs.css({ 'opacity': opacity });
			},
			duration: 900
		});
	});

})( jQuery );

