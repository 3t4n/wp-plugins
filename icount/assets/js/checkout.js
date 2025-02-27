jQuery(function ($) {
	$('#paymentModal').hide();


	$(window)
		.on('message', event => {	
							
			const {source, data} = event.originalEvent;			
			const
				$wc = $('.icount_gateway_iframe_checkout'),
				thankyou_url = $wc.data('thankyou-url'),
				unique_name = 'icount_' + Math.round(Math.random() * 10000000),
			    $form = $('<form>');
		
			if (data.event_type == 'page_load') 			
				$('#paymentIframe').css('height', data.page_size.height + 'px');			
		
			if (data.event_type == 'page_size') 			
				$('#paymentIframe').css('height', data.page_size.height + 'px');							

			if (data.event_type == 'payment_cancel')
				$('#paymentModal').fadeOut();	

		
			if (data.event_type == 'payment_success') {				
					
						const {
							confirmation_code: confirmation_code = null,
							doctype: doctype = null,
							docnum: docnum = null,
						} = data.payment_info;
		
						$form
							.prop({
								method: 'post',
								action: thankyou_url,
								target: '_self',
							})
							.empty()
							.append(
								$('<input>')
									.prop({
										type: 'hidden',
										name: 'confirmation_code'
									})
									.val(confirmation_code)
							)
							.append(
								$('<input>')
									.prop({
										type: 'hidden',
										name: 'doctype'
									})
									.val(doctype)
							)
							.append(
								$('<input>')
									.prop({
										type: 'hidden',
										name: 'docnum'
									})
									.val(docnum)
							)
							.appendTo($wc)
							.submit();			
			}
		
		});
	
	
    $(document).on('click','.close-modal',function() {
        $('#paymentModal').fadeOut();
    });	

	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);

    var checkout = urlParams.get('ic_checkout');
	var order_id = urlParams.get('ic_order_id');
	var key = urlParams.get('ic_key');
	var path = urlParams.get('ic_path');
	var redir = urlParams.get('ic_redir');
	
	if (checkout !== null && order_id !==null && key !==null) {
		var checkout_url = 'https://app.icount.co.il/m/gen/' + checkout;
		var thankyou_url = path + '?key=' + key;
		
		var userAgentString = navigator.userAgent; 
		var chromeAgent = userAgentString.indexOf("Chrome") > -1;
		var safariAgent = userAgentString.indexOf("Safari") > -1; 
        if ((chromeAgent) && (safariAgent)) 
			safariAgent = false; 
		
		if(safariAgent || redir == '1') {			
			window.location.href = checkout_url;
			return;				
        } else {						
			$('#paymentIframe').attr('src', checkout_url); 
			$('body').prepend('<div class="icount_gateway_iframe_checkout" data-thankyou-url="' + thankyou_url + '"></div>');
			$('#paymentModal').fadeIn();
		}
	}
		
	
});

