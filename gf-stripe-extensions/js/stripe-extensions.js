var GFStripeExtensions = {
	applepay: false,
	init: function() {
		var buttons = document.querySelectorAll('.gf-stripe-applepay');
		GFStripeExtensions.avaliable(function(result) {
			if (result) {
				GFStripeExtensions.applepay = true;
				for (i=0; i<buttons.length; i++) {
					GFStripeExtensions.createButton(buttons[i]);
				}
			}
		});
	},
	getAttribute: function(element, key, defaultvalue) {
		var value = element.getAttribute('data-' + key);
		return value === null ? defaultvalue : value;
	},
	initStripe: function(test) {
		Stripe.setPublishableKey(test ? GF_STRIPE_EXTENSION_TEST : GF_STRIPE_EXTENSION_LIVE);
	},
	avaliable: function(callback) {
		Stripe.applePay.checkAvailability(callback);
	},
	paymentRequest: function(amount, description, currency, country, test) {
		return {
			countryCode: country,
			currencyCode: currency,
			total: {
				label: description + (test?' (test)':''),
				amount: amount
			},
			requiredBillingContactFields: ['postalAddress'],
			requiredShippingContactFields: ['name', 'email']
		};
	},
	param: function(formData, key, value) {
		if (value !== null && value !== undefined) {
			formData.append(key, value);
		}
	},
	processPayment: function(callback, ev, amount, description, currency, recurring, internal) {
		var formData = new FormData();
		this.param(formData, 'amount', amount);
		this.param(formData, 'currency', currency);
		this.param(formData, 'description', internal && internal != '' ? internal : description);
		this.param(formData, 'recurring', recurring);

		//Should we just send token, or leave client to map it?
		this.param(formData, 'token', ev.token.id);
		this.param(formData, 'test', !ev.token.livemode);
		this.param(formData, 'email', ev.shippingContact.emailAddress);
		this.param(formData, 'firstname', ev.shippingContact.givenName);
		this.param(formData, 'lastname', ev.shippingContact.familyName);
		this.param(formData, 'phone', ev.shippingContact.phone);
		this.param(formData, 'ip', ev.token.client_ip);
		this.param(formData, 'name', ev.token.card.name);
		this.param(formData, 'address1', ev.token.card.address_line1);
		this.param(formData, 'address2', ev.token.card.address_line2);
		this.param(formData, 'city', ev.token.card.address_city);
		this.param(formData, 'state', ev.token.card.address_state);
		this.param(formData, 'zip', ev.token.card.address_zip);
		this.param(formData, 'country', ev.token.card.address_country);
		this.param(formData, 'cardnumber', ev.token.card.last4);
		this.param(formData, 'cardtype', ev.token.card.brand);
		this.param(formData, 'stripe_response', JSON.stringify(ev));
		
		fetch(GF_STRIPE_EXTENSION_URL+'/applepay', {
			method: 'POST',
			body: formData,
			//headers: {'content-type': 'multipart/form-data'}
		}).then(function(response) {
			return response.json();
		}).then(callback);
	},
	requestPayment: function(callback, amount, description, currency, country, recurring, test, internal, cancel) {
		//https://stripe.com/docs/stripe-js/v2#collecting-apple-pay-details
		description = description || 'Payment';
		currency = currency || 'USD';
		country = country || 'US';
		this.initStripe(test);
		var paymentRequest = this.paymentRequest(amount, description, currency, country, test);
		try {
			var session = Stripe.applePay.buildSession(paymentRequest,
				function(ev, completion) {
					GFStripeExtensions.processPayment(function(json) {
						if (json.status == 'ok') {
							completion(ApplePaySession.STATUS_SUCCESS);
						} else {
							completion(ApplePaySession.STATUS_FAILURE);
						}
							callback(json);
					}, ev, amount, description, currency, recurring, internal);
				},
				function(error) {
					console.log(error.message);
				}
			);
			session.oncancel = function() {
				console.log('User hit the cancel button in the payment window');
				cancel && cancel();
			};
			session.begin();	
		} catch (e) {
			console.log(e);
		}
	},
	buttonClick: function(button) {
		//onclick="GFStripeExtensions.buttonClick(this);"
		var id = button.getAttribute('id');
		var test = this.getAttribute(button, 'test') == 'true';
		var amount = this.getAttribute(button, 'amount', 1);
		var currency = this.getAttribute(button, 'currency', 'USD');
		var country = this.getAttribute(button, 'country', 'US');
		var url = this.getAttribute(button, 'url');
		var recurring = this.getAttribute(button, 'recurring');
		var internal = this.getAttribute(button, 'internal');
		var description = this.getAttribute(button, 'description', (recurring?'Recurring ':'') + 'Payment');
		GFStripeExtensions.requestPayment(function(json) {
			if (json.status == 'ok') {
				if (url && url != '') {
					location.href = url;
				}
			} else {
				console.log(json.error);
				alert(json.error);
			}
		}, amount, description, currency, country, recurring, test, internal);
	},
	createButton: function(button) {
		button.style.display = 'block';
		/*button.addEventListener('click', function(event) {
			GFStripeExtensions.buttonClick(button);
		});*/
	}
};

document.addEventListener('DOMContentLoaded', function() { 
	GFStripeExtensions.init();
}, false);